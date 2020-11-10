<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
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
            $pegawai = Pegawai::where('nama', 'LIKE', "%$keyword%")
                ->orWhere('jenis_kelamin', 'LIKE', "%$keyword%")
                ->orWhere('nohp', 'LIKE', "%$keyword%")
                ->orWhere('alamat', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $pegawai = Pegawai::latest()->paginate($perPage);
        }

        return view('admin.pegawai.index', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.pegawai.create');
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
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'nohp' => 'required',
            'alamat' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6'
        ]);
        $requestData = $request->all();
        $dataUser = [
            'name' => $requestData['nama'],
            'email' => $requestData['email'],
            'password' => Hash::make($requestData['password'])
        ];
        $requestData['email_verified_at'] = now();
        $user_id = User::insert($dataUser);
        unset($requestData['email']);
        unset($requestData['password']);
        unset($requestData['email_verified_at']);
        $requestData['user_id'] = $user_id;
        Pegawai::create($requestData);

        return redirect('admin/pegawai')->with('flash_message', 'Pegawai added!');
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
        $pegawai = Pegawai::findOrFail($id);

        return view('admin.pegawai.show', compact('pegawai'));
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

        $pegawai = Pegawai::findOrFail($id);

        return view('admin.pegawai.edit', compact('pegawai'));
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
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'nohp' => 'required',
            'alamat' => 'required'
        ]);
        if ($request->password !== null) {
            $this->validate($request, [
                'password' => 'required|confirmed|min:6'
            ]);
        }
        $requestData = $request->all();

        if ($request->password != null) {
            $user = User::whereEmail($requestData['email']);
            $user->update(['password' => Hash::make($requestData['password'])]);

        }
        unset($requestData['email']);
        unset($requestData['password']);
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->update($requestData);

        return redirect('admin/pegawai')->with('flash_message', 'Pegawai updated!');
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
        Pegawai::destroy($id);

        return redirect('admin/pegawai')->with('flash_message', 'Pegawai deleted!');
    }
}
