<?php

namespace App\Http\Livewire\Customer;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Slider;
use Livewire\Component;

class Home extends Component
{
    public $products;
    public $categories;
    public $sliders;
    public function mount(){
        $this->products = Produk::all();
        $this->categories = Kategori::with('produks')->get();
        $this->sliders = Slider::all();
    }
    public function render()
    {
        return view('livewire.customer.home')->layout('layouts.customer')->slot('body');
    }
}
