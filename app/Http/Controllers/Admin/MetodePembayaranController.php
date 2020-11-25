<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\MetodePembayaran;
use Illuminate\Http\Request;

class MetodePembayaranController extends Controller
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
            $metodepembayaran = MetodePembayaran::where('metode', 'LIKE', "%$keyword%")
                ->orWhere('token', 'LIKE', "%$keyword%")
                ->orWhere('api', 'LIKE', "%$keyword%")
                ->orWhere('callback', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $metodepembayaran = MetodePembayaran::latest()->paginate($perPage);
        }

        return view('admin.metode-pembayaran.index', compact('metodepembayaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.metode-pembayaran.create');
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
            'metode' => 'required',
            'desc' => 'required',
            'file' => 'required',
        ]);
        $requestData = $request->all();
        if ($request->hasFile('file')) {
            $name = time() . "-" . $request->file('file')->getClientOriginalName();
            $request->file('file')->move(storage_path('app/public'), $name);
            $requestData['icon'] = $name;
        }
        MetodePembayaran::create($requestData);

        return redirect('admin/metode-pembayaran')->with('flash_message', 'MetodePembayaran added!');
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
        $metodepembayaran = MetodePembayaran::findOrFail($id);

        return view('admin.metode-pembayaran.show', compact('metodepembayaran'));
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
        $metodepembayaran = MetodePembayaran::findOrFail($id);

        return view('admin.metode-pembayaran.edit', compact('metodepembayaran'));
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
            'metode' => 'required',
            'desc' => 'required',
        ]);
        $requestData = $request->all();
        if ($request->hasFile('file')) {
            $name = time() . "-" . $request->file('file')->getClientOriginalName();
            $request->file('file')->move(storage_path('app/public'), $name);
            $requestData['icon'] = $name;
        }
        $metodepembayaran = MetodePembayaran::findOrFail($id);
        $metodepembayaran->update($requestData);

        return redirect('admin/metode-pembayaran')->with('flash_message', 'MetodePembayaran updated!');
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
        MetodePembayaran::destroy($id);

        return redirect('admin/metode-pembayaran')->with('flash_message', 'MetodePembayaran deleted!');
    }

    public function aktif($id)
    {
        $metode = MetodePembayaran::findOrFail($id);
        $metode->update(['status'=>'1']);
        return redirect('admin/metode-pembayaran')->with('flash_message', 'MetodePembayaran updated!');
    }

    public function nonaktif($id)
    {
        $metode = MetodePembayaran::findOrFail($id);
        $metode->update(['status'=>'0']);
        return redirect('admin/metode-pembayaran')->with('flash_message', 'MetodePembayaran updated!');
    }
}
