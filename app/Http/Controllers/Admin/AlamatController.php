<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Alamat;
use Illuminate\Http\Request;

class AlamatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 6;

        if (!empty($keyword)) {
            $alamat = Alamat::where('alamat_lengkap', 'LIKE', "%$keyword%")
                ->orWhere('rincian_alamat', 'LIKE', "%$keyword%")
                ->orWhere('lat', 'LIKE', "%$keyword%")
                ->orWhere('long', 'LIKE', "%$keyword%")
                ->orWhere('customer_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $alamat = Alamat::latest()->paginate($perPage);
        }

        return view('admin.alamat.index', compact('alamat'));
    }

    public function all($id)
    {
        $alamat = Alamat::whereCustomerId($id)->paginate(25);
        return view('admin.alamat.index', compact('alamat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.alamat.create');
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
            'alamat_lengkap' => 'required',
            'rincian_alamat' => 'required',
            'lat' => 'required',
            'long' => 'required'
        ]);
        $requestData = $request->all();

        Alamat::create($requestData);

        return redirect('admin/alamat')->with('flash_message', 'Alamat added!');
    }

    public function showByCustomer($id, Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 6;

        if (!empty($keyword)) {
            $alamat = Alamat::whereCustomerId($id)->orWhere('alamat_lengkap', 'LIKE', "%$keyword%")
                ->orWhere('rincian_alamat', 'LIKE', "%$keyword%")
                ->orWhere('lat', 'LIKE', "%$keyword%")
                ->orWhere('long', 'LIKE', "%$keyword%")
                ->orWhere('customer_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $alamat = Alamat::whereCustomerId($id)->paginate($perPage);
        }

        return view('admin.alamat.index', compact('alamat'));
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
        $alamat = Alamat::findOrFail($id);

        return view('admin.alamat.show', compact('alamat'));
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
        $alamat = Alamat::findOrFail($id);

        return view('admin.alamat.edit', compact('alamat'));
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
            'alamat_lengkap' => 'required',
            'rincian_alamat' => 'required',
            'lat' => 'required',
            'long' => 'required'
        ]);
        $requestData = $request->all();

        $alamat = Alamat::findOrFail($id);
        $alamat->update($requestData);

        return redirect('admin/alamat')->with('flash_message', 'Alamat updated!');
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
        Alamat::destroy($id);

        return redirect('admin/alamat')->with('flash_message', 'Alamat deleted!');
    }
}
