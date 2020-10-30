<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function getDataProduk(Request $request)
    {
        if (isset($request->products)) {
            $products = Produk::select(['harga', 'harga_promo', 'nama', 'gambar', 'id', 'promosi'])->whereIn('id', $request->products)->get();
            return response()->json(['status' => 'success', 'data' => $products]);
        }
        return response()->json(['status' => 'error']);
    }
}
