<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\StatusPesanan;
use Illuminate\Http\Request;

class StatusPesananController extends Controller
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
            $statuspesanan = StatusPesanan::where('status_pesanan', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $statuspesanan = StatusPesanan::latest()->paginate($perPage);
        }

        return view('admin.status-pesanan.index', compact('statuspesanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.status-pesanan.create');
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
			'status_pesanan' => 'required'
		]);
        $requestData = $request->all();
        
        StatusPesanan::create($requestData);

        return redirect('admin/status-pesanan')->with('flash_message', 'StatusPesanan added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $statuspesanan = StatusPesanan::findOrFail($id);

        return view('admin.status-pesanan.show', compact('statuspesanan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $statuspesanan = StatusPesanan::findOrFail($id);

        return view('admin.status-pesanan.edit', compact('statuspesanan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'status_pesanan' => 'required'
		]);
        $requestData = $request->all();
        
        $statuspesanan = StatusPesanan::findOrFail($id);
        $statuspesanan->update($requestData);

        return redirect('admin/status-pesanan')->with('flash_message', 'StatusPesanan updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        StatusPesanan::destroy($id);

        return redirect('admin/status-pesanan')->with('flash_message', 'StatusPesanan deleted!');
    }
}
