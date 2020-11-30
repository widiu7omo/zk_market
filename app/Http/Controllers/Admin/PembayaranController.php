<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use App\Models\Pesanan;
use App\Models\StatusBayar;
use App\Models\StatusPesanan;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|\Illuminate\Http\JsonResponse|View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $dateStart = $request->get('start');
        $dateEnd = $request->get('end');
        $perPage = 6;

        if (!empty($keyword)) {
            $pembayaran = Pembayaran::where('metode_pembayaran', 'LIKE', "%$keyword%")
                ->orWhere('status_pembayaran', 'LIKE', "%$keyword%")
                ->orWhere('amount', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
            if (!empty($dateStart)) {
                $pembayaran = Pembayaran::where('metode_pembayaran', 'LIKE', "%$keyword%")
                    ->orWhere('status_pembayaran', 'LIKE', "%$keyword%")
                    ->orWhere('amount', 'LIKE', "%$keyword%")->orWhereBetween('created_at', [$dateStart, $dateEnd])
                    ->latest()->paginate($perPage);
            }
        } else {
            $pembayaran = Pembayaran::latest()->paginate($perPage);
            if (!empty($dateStart)) {
                $pembayaran = Pembayaran::whereBetween('created_at', [$dateStart, $dateEnd])
                    ->latest()->paginate($perPage);
            }
        }

        //widget
        $pesanan = Pesanan::all();
        $sudahBayarId = StatusBayar::where('status_bayar', 'sudah bayar')->first();
        $belumBayarId = StatusBayar::where('status_bayar', 'belum bayar')->first();
        $gagalBayarId = StatusBayar::where('status_bayar', 'gagal bayar')->first();

        if (!isset($sudahBayarId->id) || !isset($belumBayarId->id) || !isset($gagalBayarId->id)) {
            return response()->json(['status' => 'error', 'message' => "Status bayar tidak sesuai. Pastikan status bayar memiliki nama 'sudah bayar','belum bayar' dan 'gagal bayar'"]);
        }
        $sudahBayarId = $sudahBayarId->id;
        $belumBayarId = $belumBayarId->id;
        $gagalBayarId = $gagalBayarId->id;
        $sudahBayar = $pesanan->filter(function ($pesanan) use ($sudahBayarId) {
            return $pesanan->status_bayar_id == $sudahBayarId;
        })->pluck('total_bayar')->toArray();
        $belumBayar = $pesanan->filter(function ($pesanan) use ($belumBayarId) {
            return $pesanan->status_bayar_id == $belumBayarId;
        })->pluck('total_bayar')->toArray();
        $gagalBayar = $pesanan->filter(function ($pesanan) use ($gagalBayarId) {
            return $pesanan->status_bayar_id == $gagalBayarId;
        })->pluck('total_bayar')->toArray();

        $pesananDibayar['jumlah'] = count($sudahBayar);
        $pesananDibayar['total'] = array_sum($sudahBayar);
        $pesananTertunda['jumlah'] = count($belumBayar);
        $pesananTertunda['total'] = array_sum($belumBayar);
        $pesananGagal['jumlah'] = count($gagalBayar);
        $pesananGagal['total'] = array_sum($gagalBayar);

        $transfer = $pesanan->filter(function ($pesanan) {
            return $pesanan->pembayaran->metode->metode != 'COD';
        })->pluck('id')->toArray();

        $cod = $pesanan->filter(function ($pesanan) {
            return $pesanan->pembayaran->metode->metode == 'COD';
        })->pluck('id')->toArray();

        $metodePembayaran['transfer'] = count($transfer);
        $metodePembayaran['cod'] = count($cod);
        $metodePembayaran['total_transaksi'] = count($pesanan);
        return view('admin.pembayaran.index', compact('pembayaran'))
            ->with(compact('pesananDibayar'))
            ->with(compact('pesananTertunda'))
            ->with(compact('pesananGagal'))
            ->with(compact('metodePembayaran'));
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
     * @return Application|Factory|Response|View
     */
    public function show($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        return view('admin.pembayaran.show', compact('pembayaran'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        if (isset($request->status)) {
            $statusBayar = StatusBayar::whereStatusBayar($request->status)->first();
            if ($statusBayar) {
                $pesanan = Pesanan::whereId($id);
                $dataPesanan = $pesanan->first();
                $pesanan->update(['status_bayar_id' => $statusBayar->id]);
                $statusPembayaran = $statusBayar->status_bayar === 'sudah bayar' ? 'SUCCESS' : 'FAILED';
                Pembayaran::wherePesananId($dataPesanan->id)->update(['status_pembayaran' => $statusPembayaran]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public
    function destroy($id)
    {
        //
    }
}
