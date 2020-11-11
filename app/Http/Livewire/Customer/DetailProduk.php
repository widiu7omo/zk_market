<?php

namespace App\Http\Livewire\Customer;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Livewire\Component;

class DetailProduk extends Component
{
    public $product;
    public $related_products;

    public function mount(Request $request)
    {
        if (!$request->product) {
            return redirect()->route('notfound');
        }
        $this->product = Produk::find(decrypt($request->product));
        $this->related_products = Produk::whereKategoriId($this->product->kategori_id)->where('id', '!=', $this->product->id)->get();
    }

    public function render()
    {
        return view('livewire.customer.detail-produk')->layout('layouts.customer')->slot('body');
    }
}
