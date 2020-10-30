<?php

namespace App\Http\Livewire\Customer;

use App\Models\Pesanan;
use App\Models\StatusPesanan;
use Illuminate\Http\Request;
use Livewire\Component;

class DetailOrder extends Component
{
    public $dataOrder;
    public $statusPemesanan;

    public function mount($id)
    {
        $this->statusPemesanan = StatusPesanan::all();
        $this->dataOrder = Pesanan::findOrFail($id);
        session(['payment' => $this->dataOrder->pembayaran->id]);
    }

    public function render()
    {
        return view('livewire.customer.detail-order')->layout('layouts.customer')->slot('body');
    }
}
