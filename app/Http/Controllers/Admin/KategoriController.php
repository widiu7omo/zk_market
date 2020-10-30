<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $kategori = Kategori::where('kategori', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $kategori = Kategori::latest()->paginate($perPage);
        }

        return view('admin.kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.kategori.create');
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
            'kategori' => 'required|max:255'
        ]);
        $requestData = $request->all();
        if ($request->hasFile('file')) {
            $name = time() . "-" . $request->file('file')->getClientOriginalName();
            $request->file('file')->move(storage_path('app/public'), $name);
            $requestData['icon'] = $name;
        }
        Kategori::create($requestData);

        return redirect('admin/kategori')->with('flash_message', 'Kategori added!');
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
        $kategori = Kategori::findOrFail($id);

        return view('admin.kategori.show', compact('kategori'));
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
        $kategori = Kategori::findOrFail($id);

        return view('admin.kategori.edit', compact('kategori'));
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
            'kategori' => 'required|max:255'
        ]);
        $requestData = $request->all();
        if ($request->hasFile('file')) {
            $name = time() . "-" . $request->file('file')->getClientOriginalName();
            $request->file('file')->move(storage_path('app/public'), $name);
            $requestData['icon'] = $name;
        }
        $kategori = Kategori::findOrFail($id);
        $kategori->update($requestData);

        return redirect('admin/kategori')->with('flash_message', 'Kategori updated!');
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
        Kategori::destroy($id);

        return redirect('admin/kategori')->with('flash_message', 'Kategori deleted!');
    }
}
