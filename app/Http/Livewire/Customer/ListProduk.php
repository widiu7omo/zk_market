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
        switch ($name) {
            case 'baru':
                $this->category = 'Menu Baru';
                $this->products = Produk::whereBaru(1)->get();
                break;
            case 'terlaris':
                $this->category = 'Terlaris';
                $this->products = Produk::whereTerlaris(1)->get();
                break;
            case 'promo':
                $this->category = 'Promo';
                $this->products = Produk::wherePromosi(1)->get();
                break;
            default:
                $this->category = $name;
                $dataKategori = Kategori::whereKategori($name)->first();
                $this->products = Produk::whereKategoriId($dataKategori->id)->get();
        }
        if ($name === 'baru' || $name === 'terlaris' || $name === 'promo') {

        } else {

        }

    }

    public function render()
    {
        return view('livewire.customer.list-produk')->layout('layouts.customer')->slot('body');
    }
}
