<?php

namespace App\Http\Livewire\Customer\Components;

use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Navbar extends Component
{
    public $active;
    public function mount(){
        $this->active = Route::currentRouteName();
    }
    public function render()
    {
        return view('livewire.customer.components.navbar');
    }
}
