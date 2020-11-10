<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Alamat;
use App\Models\Pegawai;
use App\Models\Pengaturan;
use App\Models\Pesanan;
use App\Models\StatusBayar;
use App\Models\StatusPesanan;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|\Illuminate\Contracts\View\Factory|Response|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 6;
        $statusPembuatanId = StatusPesanan::whereStatusPesanan('pembuatan')->first()->id;
        $statusPengantaranId = StatusPesanan::whereStatusPesanan('pengantaran')->first()->id;

        if (!empty($keyword)) {
            $pesanan = Pesanan::wherePegawaiId(Auth::user()->pegawai->id)->orWhere('waktu_pesan', 'LIKE', "%$keyword%")
                ->orWhere('waktu_sampai', 'LIKE', "%$keyword%")
                ->orWhere('tanggal', 'LIKE', "%$keyword%")
                ->orWhere('id', 'LIKE', "%$keyword%")
                ->orWhere('total_bayar', 'LIKE', "%$keyword%")
                ->orWhere('catatan', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $pesanan = Pesanan::wherePegawaiId(Auth::user()->pegawai->id)->paginate($perPage);
        }

        return view('pegawai.pesanan.index', compact('pesanan'))->with(compact('statusPembuatanId'))->with(compact('statusPengantaranId'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|\Illuminate\Contracts\View\Factory|Response|\Illuminate\View\View
     */
    public function show($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $pengaturan = Pengaturan::first();
        return view('pegawai.pesanan.show', compact('pesanan'))->with(compact('pengaturan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|\Illuminate\Contracts\View\Factory|Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $statusPesanan = StatusPesanan::all();
        $statusPembayaran = StatusBayar::all();
        $userWhoPegawaiRole = User::whereHas('roles', function ($q) {
            return $q->where('name', 'Pegawai');
        })->get();
        $pegawai = Pegawai::whereIn('user_id', $userWhoPegawaiRole->pluck('id'))->get();
        return view('pegawai.pesanan.edit')->with(compact('pegawai'))->with(compact('pesanan'))->with(compact('statusPesanan'))->with(compact('statusPembayaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function update(Request $request, $id)
    {
        if (isset($request->tanggal) && !isset($request->status_pesanan_id)) {
            $this->validate($request, [
                'waktu_pesan' => 'required',
                'tanggal' => 'required',
                'catatan' => 'required',
            ]);
        }

        $requestData = $request->all();

        $pesanan = Pesanan::findOrFail($id);
        $pesanan->update($requestData);

        return redirect('pegawai/pesanan')->with('flash_message', 'Pesanan updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
