<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\StatusBayar;
use Illuminate\Http\Request;

class StatusBayarController extends Controller
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
            $statusbayar = StatusBayar::where('status_bayar', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $statusbayar = StatusBayar::latest()->paginate($perPage);
        }

        return view('admin.status-bayar.index', compact('statusbayar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.status-bayar.create');
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
			'status_bayar' => 'required'
		]);
        $requestData = $request->all();
        
        StatusBayar::create($requestData);

        return redirect('admin/status-bayar')->with('flash_message', 'StatusBayar added!');
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
        $statusbayar = StatusBayar::findOrFail($id);

        return view('admin.status-bayar.show', compact('statusbayar'));
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
        $statusbayar = StatusBayar::findOrFail($id);

        return view('admin.status-bayar.edit', compact('statusbayar'));
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
			'status_bayar' => 'required'
		]);
        $requestData = $request->all();
        
        $statusbayar = StatusBayar::findOrFail($id);
        $statusbayar->update($requestData);

        return redirect('admin/status-bayar')->with('flash_message', 'StatusBayar updated!');
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
        StatusBayar::destroy($id);

        return redirect('admin/status-bayar')->with('flash_message', 'StatusBayar deleted!');
    }
}
