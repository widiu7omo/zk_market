<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;

class NotFound extends Component
{
    public function render()
    {
        return view('livewire.customer.not-found')->layout('layouts.customer')->slot('body');
    }
}
