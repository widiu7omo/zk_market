<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;

class DetailOrder extends Component
{
    public function render()
    {
        return view('livewire.customer.detail-order')->layout('layouts.customer')->slot('body');
    }
}
