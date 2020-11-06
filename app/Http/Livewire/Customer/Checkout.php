<?php

namespace App\Http\Livewire\Customer;

use App\Models\Customer;
use Livewire\Component;

class Checkout extends Component
{
    public $name;
    public $nohp;

    public function mount()
    {
        if (session('customer_id')) {
            $customer = Customer::findOrFail(session('customer_id'));
            $this->name = $customer->nama;
            $this->nohp = $customer->no_hp;
        }
    }

    public function render()
    {
        return view('livewire.customer.checkout')->layout('layouts.customer')->slot('body');
    }
}
