<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;

class ListOrder extends Component
{
    public function render()
    {
        return view('livewire.customer.list-order')->layout('layouts.customer')->slot('body');
    }
}
