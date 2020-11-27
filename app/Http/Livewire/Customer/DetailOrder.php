<?php

namespace App\Http\Livewire\Customer;

use App\Models\Pengaturan;
use App\Models\Pesanan;
use App\Models\StatusPesanan;
use Livewire\Component;

class DetailOrder extends Component
{
    public $dataOrder;
    public $statusPemesanan;
    public $nowa;

    public function mount($id)
    {
        $pengaturan = Pengaturan::first();
        $this->nowa = str_replace('+', '', $pengaturan->no_wa);
        $this->statusPemesanan = StatusPesanan::all();
        $this->dataOrder = Pesanan::findOrFail($id);
        session(['payment' => $this->dataOrder->pembayaran->id]);
    }

    public function render()
    {
        return view('livewire.customer.detail-order')->layout('layouts.customer')->slot('body');
    }
}
