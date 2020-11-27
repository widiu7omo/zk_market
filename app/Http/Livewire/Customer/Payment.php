<?php

namespace App\Http\Livewire\Customer;

use App\Models\MetodePembayaran;
use App\Models\Pembayaran;
use Livewire\Component;

class Payment extends Component
{

    public $payment;
    public $metode_pembayaran;
    public $isPaid = false;

    public function mount()
    {
        $this->payment = Pembayaran::findOrFail(session('payment'));
        $this->metode_pembayaran = MetodePembayaran::whereMetode($this->payment->metode_pembayaran)->first();
        if ($this->payment->bukti != null) {
            $this->isPaid = true;
        }
    }

    public function render()
    {
        return view('livewire.customer.payment')->layout('layouts.customer')->slot('body');
    }
}
