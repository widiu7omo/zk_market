<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('customer/cart/index');
    }

    public function retrieveItems(Request $request)
    {
        if (isset($request->items)) {
            return response()->json(['status' => 'success', 'data' => Produk::exclude(['gambar', 'kategori_id', 'terlaris', 'deskripsi'])->whereIn('id', $request->items)->get()]);
        }
        return response()->json(['status' => 'error', 'message' => 'No Data Available']);
    }
}
