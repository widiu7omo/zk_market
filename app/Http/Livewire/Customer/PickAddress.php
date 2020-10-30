<?php

namespace App\Http\Livewire\Customer;

use App\Models\Pengaturan;
use Livewire\Component;

class PickAddress extends Component
{
    public $googleApiKey;

    public function mount()
    {
        $pengaturan = Pengaturan::first();
        $this->googleApiKey = $pengaturan->google_api;
    }

    public function render()
    {
        return view('livewire.customer.pick-address')->layout('layouts.customer')->slot('body');
    }
}
