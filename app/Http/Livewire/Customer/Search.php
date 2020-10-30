<?php

namespace App\Http\Livewire\Customer;

use App\Models\Kategori;
use Livewire\Component;

class Search extends Component
{
    public $categories;
    public function mount(){
        $this->categories = Kategori::all();
    }
    public function render()
    {
        return view('livewire.customer.search')->layout('layouts.customer')->slot('body');
    }
}
