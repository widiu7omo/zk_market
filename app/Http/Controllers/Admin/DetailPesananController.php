<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\DetailPesanan;
use Illuminate\Http\Request;

class DetailPesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $detailpesanan = DetailPesanan::where('pesanan_id', 'LIKE', "%$keyword%")
                ->orWhere('produk_id', 'LIKE', "%$keyword%")
                ->orWhere('jumlah', 'LIKE', "%$keyword%")
                ->orWhere('subtotal', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $detailpesanan = DetailPesanan::latest()->paginate($perPage);
        }

        return view('admin.detail-pesanan.index', compact('detailpesanan'));
    }

    public function all($id)
    {
        $detailpesanan = DetailPesanan::wherePesananId($id)->paginate(25);
        return view('admin.detail-pesanan.index', compact('detailpesanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.detail-pesanan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'pesanan_id' => 'required',
            'produk_id' => 'required',
            'jumlah' => 'required',
            'subtotal' => 'required'
        ]);
        $requestData = $request->all();

        DetailPesanan::create($requestData);

        return redirect('admin/detail-pesanan')->with('flash_message', 'DetailPesanan added!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $detailpesanan = DetailPesanan::findOrFail($id);

        return view('admin.detail-pesanan.show', compact('detailpesanan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $detailpesanan = DetailPesanan::findOrFail($id);

        return view('admin.detail-pesanan.edit', compact('detailpesanan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'pesanan_id' => 'required',
            'produk_id' => 'required',
            'jumlah' => 'required',
            'subtotal' => 'required'
        ]);
        $requestData = $request->all();

        $detailpesanan = DetailPesanan::findOrFail($id);
        $detailpesanan->update($requestData);

        return redirect('admin/detail-pesanan')->with('flash_message', 'DetailPesanan updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        DetailPesanan::destroy($id);

        return redirect('admin/detail-pesanan')->with('flash_message', 'DetailPesanan deleted!');
    }
}
