<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Alamat;
use App\Models\Pegawai;
use App\Models\Pengaturan;
use App\Models\Pesanan;
use App\Models\StatusBayar;
use App\Models\StatusPesanan;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class PesananController extends Controller
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
        $dateStart = $request->get('start');
        $dateEnd = $request->get('end');
        $perPage = 6;
        $statusPemesananId = StatusPesanan::whereStatusPesanan('pemesanan')->first()->id;
        $statusPembuatanId = StatusPesanan::whereStatusPesanan('pembuatan')->first()->id;
        $statusPengantaranId = StatusPesanan::whereStatusPesanan('pengantaran')->first()->id;
        $statusSelesaiId = StatusPesanan::whereStatusPesanan('sampai')->first()->id;
        $statusBatalId = StatusPesanan::whereStatusPesanan('batal')->first()->id;
        if (!empty($keyword)) {
            $pesanan = Pesanan::where('waktu_pesan', 'LIKE', "%$keyword%")
                ->orWhere('waktu_sampai', 'LIKE', "%$keyword%")
                ->orWhere('tanggal', 'LIKE', "%$keyword%")
                ->orWhere('id', 'LIKE', "%$keyword%")
                ->orWhere('total_bayar', 'LIKE', "%$keyword%")
                ->orWhere('catatan', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
            if (!empty($dateStart)) {
                $pesanan = Pesanan::where('waktu_pesan', 'LIKE', "%$keyword%")
                    ->orWhere('waktu_sampai', 'LIKE', "%$keyword%")
                    ->orWhere('tanggal', 'LIKE', "%$keyword%")
                    ->orWhere('id', 'LIKE', "%$keyword%")
                    ->orWhere('total_bayar', 'LIKE', "%$keyword%")
                    ->orWhere('catatan', 'LIKE', "%$keyword%")
                    ->orWhereBetween('created_at', [$dateStart, $dateEnd])
                    ->latest()->paginate($perPage);
            }
        } else {
            $pesanan = Pesanan::latest()->paginate($perPage);
            if (!empty($dateStart)) {
                $pesanan = Pesanan::whereBetween('created_at', [$dateStart, $dateEnd])
                    ->latest()->paginate($perPage);
            }
        }

        return view('admin.pesanan.index', compact('pesanan'))
            ->with(compact('statusPemesananId'))
            ->with(compact('statusPembuatanId'))
            ->with(compact('statusSelesaiId'))
            ->with(compact('statusBatalId'))
            ->with(compact('statusPengantaranId'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $pegawai = Pegawai::all();
        return view('admin.pesanan.create', compact('pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'waktu_pesan' => 'required',
            'waktu_sampai' => 'required',
            'tanggal' => 'required',
            'catatan' => 'required',
        ]);
        $requestData = $request->all();

        Pesanan::create($requestData);

        return redirect('admin/pesanan')->with('flash_message', 'Pesanan added!');
    }

    public function showByCustomer($id, Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 6;
        $statusPembuatanId = StatusPesanan::whereStatusPesanan('pembuatan')->first()->id;
        $statusSelesaiId = StatusPesanan::whereStatusPesanan('sampai')->first()->id;
        $address = Alamat::whereCustomerId($id)->get()->pluck('id');
        if (!empty($keyword)) {
            $pesanan = Pesanan::whereIn('alamat_id', $address)->orWhere('waktu_pesan', 'LIKE', "%$keyword%")
                ->orWhere('waktu_sampai', 'LIKE', "%$keyword%")
                ->orWhere('tanggal', 'LIKE', "%$keyword%")
                ->orWhere('id', 'LIKE', "%$keyword%")
                ->orWhere('total_bayar', 'LIKE', "%$keyword%")
                ->orWhere('catatan', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $pesanan = Pesanan::whereIn('alamat_id', $address)->paginate($perPage);
        }

        return view('admin.pesanan.index', compact('pesanan'))->with(compact('statusPembuatanId'))->with(compact('statusSelesaiId'));
    }

    public function showByPegawai($id, Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 6;
        $statusPembuatanId = StatusPesanan::whereStatusPesanan('pembuatan')->first()->id;
        $statusSelesaiId = StatusPesanan::whereStatusPesanan('sampai')->first()->id;
        $address = Alamat::whereCustomerId($id)->get()->pluck('id');
        if (!empty($keyword)) {
            $pesanan = Pesanan::wherePegawaiId($id)->orWhere('waktu_pesan', 'LIKE', "%$keyword%")
                ->orWhere('waktu_sampai', 'LIKE', "%$keyword%")
                ->orWhere('tanggal', 'LIKE', "%$keyword%")
                ->orWhere('id', 'LIKE', "%$keyword%")
                ->orWhere('total_bayar', 'LIKE', "%$keyword%")
                ->orWhere('catatan', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $pesanan = Pesanan::wherePegawaiId($id)->paginate($perPage);
        }

        return view('admin.pesanan.index', compact('pesanan'))->with(compact('statusPembuatanId'))->with(compact('statusSelesaiId'));
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
        $pesanan = Pesanan::findOrFail($id);
        $pengaturan = Pengaturan::first();
        return view('admin.pesanan.show', compact('pesanan'))->with(compact('pengaturan'));
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
        $pesanan = Pesanan::findOrFail($id);
        $statusPesanan = StatusPesanan::all();
        $statusPembayaran = StatusBayar::all();
        $userWhoPegawaiRole = User::whereHas('roles', function ($q) {
            return $q->where('name', 'Pegawai');
        })->get();
        $pegawai = Pegawai::whereIn('user_id', $userWhoPegawaiRole->pluck('id'))->get();
        return view('admin.pesanan.edit')->with(compact('pegawai'))->with(compact('pesanan'))->with(compact('statusPesanan'))->with(compact('statusPembayaran'));
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

        return redirect('admin/pesanan')->with('flash_message', 'Pesanan updated!');
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
        Pesanan::destroy($id);

        return redirect('admin/pesanan')->with('flash_message', 'Pesanan deleted!');
    }
}
