<?php

namespace App\Http\Livewire\Customer;

use App\Models\Pembayaran;
use Livewire\Component;

class Payment extends Component
{

    public $payment;

    public function mount()
    {
        $this->payment = Pembayaran::findOrFail(session('payment'));
    }

    public function render()
    {
        return view('livewire.customer.payment')->layout('layouts.customer')->slot('body');
    }
}
