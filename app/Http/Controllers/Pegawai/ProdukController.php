<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 6;

        if (!empty($keyword)) {
            $produk = Produk::where('nama', 'LIKE', "%$keyword%")
                ->orWhere('harga', 'LIKE', "%$keyword%")
                ->orWhere('harga_promo', 'LIKE', "%$keyword%")
                ->orWhere('deskripsi', 'LIKE', "%$keyword%")
                ->orWhere('gambar', 'LIKE', "%$keyword%")
                ->orWhere('kategori_id', 'LIKE', "%$keyword%")
                ->orWhere('terlaris', 'LIKE', "%$keyword%")
                ->orWhere('promosi', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $produk = Produk::latest()->paginate($perPage);
        }

        return view('pegawai.produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('pegawai.produk.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|max:255',
            'deskripsi' => 'required',
            'harga' => 'required',
            'harga_promo' => 'required',
            'status' => 'required',
            'promosi' => 'required',
            'terlaris' => 'required'
        ]);
        $requestData = $request->all();
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $image) {
                $name = time() . "-" . $image->getClientOriginalName();
                $image->move(storage_path('app/public'), $name);
                $data[] = $name;
            }
            $requestData['gambar'] = json_encode($data);
        }
        $requestData['harga'] = preg_replace('/[^0-9]/', '', $requestData['harga']);
        $requestData['harga_promo'] = preg_replace('/[^0-9]/', '', $requestData['harga_promo']);
//        dd($requestData);
        Produk::create($requestData);
        return redirect('pegawai/produk')->with('flash_message', 'Produk added!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return View
     */
    public function show($id)
    {
        $produk = Produk::findOrFail($id);

        return view('pegawai.produk.show', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return View
     */
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $kategori = Kategori::all();

        return view('pegawai.produk.edit', compact('produk'), compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     *
     * @return RedirectResponse|Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|max:255',
            'deskripsi' => 'required',
            'harga' => 'required',
            'harga_promo' => 'required',
            'status' => 'required',
            'promosi' => 'required',
            'terlaris' => 'required',
        ]);
        $requestData = $request->all();
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $image) {
                $name = time() . "-" . $image->getClientOriginalName();
                $image->move(storage_path('app/public'), $name);
                $data[] = $name;
            }
            $requestData['gambar'] = json_encode($data);
        }
        $requestData['harga'] = preg_replace('/[^0-9]/', '', $requestData['harga']);;
        $requestData['harga_promo'] = preg_replace('/[^0-9]/', '', $requestData['harga_promo']);;
        $produk = Produk::findOrFail($id);
        $produk->update($requestData);

        return redirect('pegawai/produk')->with('flash_message', 'Produk updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        Produk::destroy($id);

        return redirect('pegawai/produk')->with('flash_message', 'Produk deleted!');
    }
}
