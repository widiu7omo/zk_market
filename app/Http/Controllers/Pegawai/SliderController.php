<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
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
            $slider = Slider::where('keterangan', 'LIKE', "%$keyword%")
                ->orWhere('url', 'LIKE', "%$keyword%")
                ->orWhere('file', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $slider = Slider::latest()->paginate($perPage);
        }

        return view('pegawai.slider.index', compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pegawai.slider.create');
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
            'keterangan' => 'required',
            'file' => 'required'
        ]);
        $requestData = $request->all();
        if ($request->hasFile('file')) {
            $name = time() . "-" . $request->file('file')->getClientOriginalName();
            $request->file('file')->move(storage_path('app/public'), $name);
            $requestData['url'] = asset('storage/' . $name);
            $requestData['file'] = $name;
        }
        Slider::create($requestData);

        return redirect('pegawai/slider')->with('flash_message', 'Slider added!');
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
        $slider = Slider::findOrFail($id);

        return view('pegawai.slider.show', compact('slider'));
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
        $slider = Slider::findOrFail($id);

        return view('pegawai.slider.edit', compact('slider'));
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
            'keterangan' => 'required',
            'file' => 'required'
        ]);
        $requestData = $request->all();
        if ($request->hasFile('file')) {
            $name = time() . "-" . $request->file('file')->getClientOriginalName();
            $request->file('file')->move(storage_path('app/public'), $name);
            $requestData['url'] = asset('storage/' . $name);
            $requestData['file'] = $name;
        }
        $slider = Slider::findOrFail($id);
        $slider->update($requestData);

        return redirect('pegawai/slider')->with('flash_message', 'Slider updated!');
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
        Slider::destroy($id);

        return redirect('pegawai/slider')->with('flash_message', 'Slider deleted!');
    }
}
