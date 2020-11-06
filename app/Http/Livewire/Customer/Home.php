<?php

namespace App\Http\Livewire\Customer;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Slider;
use Livewire\Component;

class Home extends Component
{
    public $mostBuyProducts;
    public $newestProducts;
    public $promoProducts;
    public $categories;
    public $sliders;

    public function mount()
    {
        $this->mostBuyProducts = Produk::whereTerlaris('1')->limit(5)->get();
        $this->newestProducts = Produk::whereBaru('1')->limit(5)->get();
        $this->promoProducts = Produk::wherePromosi('1')->limit(5)->get();
        $this->categories = Kategori::with('produks')->get();
        $this->sliders = Slider::all();
    }

    public function render()
    {
        return view('livewire.customer.home')->layout('layouts.customer')->slot('body');
    }
}
