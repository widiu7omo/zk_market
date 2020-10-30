<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;

class Checkout extends Component
{
    public function render()
    {
        return view('livewire.customer.checkout')->layout('layouts.customer')->slot('body');
    }
}
