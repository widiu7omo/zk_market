<?php

namespace App\Http\Livewire\Customer;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Livewire\Component;

class Search extends Component
{
    public Kategori $category;
    public Produk $product;
    public string $search = '';

    public function render()
    {
        return view('livewire.customer.search', [
            'categories' => Kategori::all(),
            'products'=>Produk::search('nama',$this->search)->limit(9)->get()
        ])->layout('layouts.customer')->slot('body');
    }
}
