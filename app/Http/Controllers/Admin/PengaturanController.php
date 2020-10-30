<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Pengaturan;
use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $pengaturan = Pengaturan::whereName('default')->first();

        return view('admin.pengaturan.show', compact('pengaturan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.pengaturan.create');
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
            'nama_bisnis' => 'required',
            'no_wa' => 'required',
            'tipe_ongkir' => 'required',
            'alamat' => 'required',
            'lat' => 'required',
            'long' => 'required',
            'google_api' => 'required'
        ]);
        $requestData = $request->all();

        Pengaturan::create($requestData);

        return redirect('admin/pengaturan')->with('flash_message', 'Pengaturan added!');
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
        $pengaturan = Pengaturan::findOrFail($id);

        return view('admin.pengaturan.show', compact('pengaturan'));
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
        $pengaturan = Pengaturan::findOrFail($id);

        return view('admin.pengaturan.edit', compact('pengaturan'));
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
            'nama_bisnis' => 'required',
            'no_wa' => 'required',
            'tipe_ongkir' => 'required',
            'alamat' => 'required',
            'lat' => 'required',
            'long' => 'required',
            'google_api' => 'required'
        ]);
        $requestData = $request->all();

        $pengaturan = Pengaturan::findOrFail($id);
        $pengaturan->update($requestData);

        return redirect('admin/pengaturan')->with('flash_message', 'Pengaturan updated!');
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
        Pengaturan::destroy($id);

        return redirect('admin/pengaturan')->with('flash_message', 'Pengaturan deleted!');
    }
}
