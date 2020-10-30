<?php

namespace App\Http\Livewire\Customer;

use App\Models\Produk;
use Illuminate\Http\Request;
use Livewire\Component;

class DetailProduk extends Component
{
    public $product;

    public function mount(Request $request)
    {
        if (!$request->product) {
            return redirect()->route('notfound');
        }
        $this->product = Produk::find(decrypt($request->product));
    }

    public function render()
    {
        return view('livewire.customer.detail-produk')->layout('layouts.customer')->slot('body');
    }
}
