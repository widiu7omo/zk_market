<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;

class Cart extends Component
{
    public function mount()
    {

    }

    public function render()
    {
        return view('livewire.customer.cart')->layout('layouts.customer')->slot('body');
    }
}
