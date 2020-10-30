<?php

namespace App\Http\Livewire\Customer;

use App\Models\Alamat;
use Livewire\Component;

class Address extends Component
{
    public $addresses = [];

    public function mount()
    {
        if (session('customer_id')) {
            $this->addresses = Alamat::whereCustomerId(session('customer_id'))->get();
        }
    }

    public function render()
    {
        return view('livewire.customer.address')->layout('layouts.customer')->slot('body');
    }
}
