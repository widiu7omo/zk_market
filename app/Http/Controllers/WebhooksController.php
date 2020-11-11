<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pesanan;
use App\Models\StatusBayar;
use Illuminate\Http\Request;

class WebhooksController extends Controller
{
    public function ovo(Request $request, Pembayaran $pembayaran)
    {
        $response_xendit = json_decode($request->getContent());
        $dataUpdatePembayaran = [
            'status_pembayaran' => $response_xendit->status,
        ];
        if ($pembayaran->whereExternalId($response_xendit->external_id)->update($dataUpdatePembayaran)) {
            $dataPembayaran = $pembayaran->whereExternalId($response_xendit->external_id)->first();
            if ($response_xendit->status === 'COMPLETED') {
                Pesanan::whereId($dataPembayaran->pesanan_id)->update(['status_bayar_id' => StatusBayar::whereStatusBayar('sudah bayar')->first()->id]);
            }
            if ($response_xendit->status === 'FAILED') {
                Pesanan::whereId($dataPembayaran->pesanan_id)->update(['status_bayar_id' => StatusBayar::whereStatusBayar('gagal bayar')->first()->id]);
            }
        }
        return response()->json($response_xendit);
    }

    public function linkaja(Request $request, Pembayaran $pembayaran)
    {
        $response_xendit = json_decode($request->getContent());
        $dataUpdatePembayaran = [
            'status_pembayaran' => $response_xendit->status,
        ];
        if ($pembayaran->whereExternalId($response_xendit->external_id)->update($dataUpdatePembayaran)) {
            $dataPembayaran = $pembayaran->whereExternalId($response_xendit->external_id)->first();
            if ($response_xendit->status === 'COMPLETED') {
                Pesanan::whereId($dataPembayaran->pesanan_id)->update(['status_bayar_id' => StatusBayar::whereStatusBayar('sudah bayar')->first()->id]);
            } elseif ($response_xendit->status === 'EXPIRED') {
                Pesanan::whereId($dataPembayaran->pesanan_id)->update(['status_bayar_id' => StatusBayar::whereStatusBayar('kedaluwarsa')->first()->id]);
            } elseif ($response_xendit->status === 'FAILED') {
                Pesanan::whereId($dataPembayaran->pesanan_id)->update(['status_bayar_id' => StatusBayar::whereStatusBayar('gagal bayar')->first()->id]);
            }
        }
        return response()->json(['status' => 'success']);

    }

    public function qris()
    {
        return response()->json(['status' => 'success']);

    }
}
