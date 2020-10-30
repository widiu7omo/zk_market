<?php

namespace App\Http\Livewire\Customer;

use App\Models\Kategori;
use App\Models\Produk;
use Livewire\Component;

class ListProduk extends Component
{
    public $products;
    public $category;

    public function mount($name)
    {
        $this->category = $name;
        $dataKategori = Kategori::whereKategori($name)->first();
        $this->products = Produk::whereKategoriId($dataKategori->id)->get();
    }

    public function render()
    {
        return view('livewire.customer.list-produk')->layout('layouts.customer')->slot('body');
    }
}
