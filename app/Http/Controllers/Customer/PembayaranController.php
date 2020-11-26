<?php

namespace App\Http\Controllers\Customer;

use App\Events\PesananMasukEvent;
use App\Http\Controllers\Controller;
use App\Models\DetailPesanan;
use App\Models\MetodePembayaran;
use App\Models\Pembayaran;
use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\StatusBayar;
use App\Models\StatusPesanan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Xendit\Balance;
use Xendit\EWallets;
use Xendit\Exceptions\ApiException;
use Xendit\QRCode;
use Xendit\Xendit;

class PembayaranController extends Controller
{

    public function __construct()
    {
    }

    private function paymentTransfer($params, $pesananId)
    {
        $dataPembayaran = [
            'metode_pembayaran' => $params['metode'],
            'status_pembayaran' => 'PENDING',
            'amount' => $params['amount'],
            'external_id' => $params['external_id'],
            'pesanan_id' => $pesananId
        ];
//            dd($dataPembayaran);
        $statusPembayaran = Pembayaran::create($dataPembayaran);
        $status = $statusPembayaran ? ['type' => 'success', 'message' => 'Transaksi berhasil dibuat, Silahkan melakukan pembayaran.'] : ['type' => 'error', 'message' => 'Transaksi gagal dilaksanakan, Silahkan coba lagi.'];
        DB::commit();
        $dataDetailPesanan = new PesananMasukEvent(url('admin/pesanan/' . $pesananId));
        event($dataDetailPesanan);
        session(['payment' => $statusPembayaran->id]);
        return redirect()->route('payment')->with('status', $status);
    }

    private function paymentCOD($params, $pesananId)
    {
        $dataPembayaran = [
            'metode_pembayaran' => "COD",
            'status_pembayaran' => 'PENDING',
            'amount' => $params['amount'],
            'external_id' => $params['external_id'],
            'pesanan_id' => $pesananId
        ];
        $statusPembayaran = Pembayaran::create($dataPembayaran);
        $status = $statusPembayaran ? ['type' => 'success', 'message' => 'Transaksi berhasil dibuat, Silahkan melakukan pembayaran.'] : ['type' => 'error', 'message' => 'Transaksi gagal dilaksanakan, Silahkan coba lagi.'];
        DB::commit();
        $dataDetailPesanan = new PesananMasukEvent(url('admin/pesanan/' . $pesananId));
        event($dataDetailPesanan);
        session(['payment' => $statusPembayaran->id]);
        return redirect()->route('payment')->with('status', $status);
    }

    public function pay(Request $request)
    {
        $pembayaranBank = MetodePembayaran::all()->pluck('metode')->toArray();

        if (isset($request->cart)) {
            DB::beginTransaction();
            try {
                $cart = json_decode($request->cart);
                $productIds = array_keys((array)$cart);
                $products = Produk::whereIn('id', $productIds)->get();
                $total = 0;
                $dataDetailPesanan = [];
                $itemsDetail = [];
                $arrayCart = (array)$cart;
                foreach ($products as $product) {
                    $subtotal = (($product->promosi == 1 ? $product->harga_promo : $product->harga) * $arrayCart[$product->id]->count);
                    array_push($dataDetailPesanan, [
                        'produk_id' => $product->id,
                        'jumlah' => $arrayCart[$product->id]->count,
                        'subtotal' => $subtotal
                    ]);
                    array_push($itemsDetail, [
                        'id' => "$product->id",
                        'name' => $product->nama,
                        'price' => $product->promosi == 1 ? $product->harga_promo : $product->harga,
                        'quantity' => $arrayCart[$product->id]->count
                    ]);
                    $total = $total + $subtotal;
                }
                //ongkir
                $total = $total + ($request->ongkir ?? 0);
                $dataPesanan = [
                    'waktu_pesan' => Carbon::now()->format('H:i:s'),
                    'waktu_sampai' => '',
                    'tanggal' => Carbon::now()->format('d-m-Y'),
                    'total_bayar' => $total,
                    'total_ongkir' => $request->ongkir,
                    'catatan' => $request->catatan,
                    'status_pesanan_id' => StatusPesanan::whereStatusPesanan('pemesanan')->first()->id,
                    'status_bayar_id' => StatusBayar::whereStatusBayar('belum bayar')->first()->id,
                    'alamat_id' => $request->alamat,
                    'pegawai_id' => null
                ];
                $newPesanan = Pesanan::create($dataPesanan);
                if ($newPesanan) {
                    $newPesananId = $newPesanan->id;
                    foreach ($dataDetailPesanan as $key => $detail) {
                        $dataDetailPesanan[$key]['pesanan_id'] = $newPesananId;
                    }
                    $statusInsertDetailPesanan = DetailPesanan::insert($dataDetailPesanan);
                    if ($statusInsertDetailPesanan) {
                        if (in_array($request->pay_option, $pembayaranBank)) {
                            if ($request->pay_option === 'COD') {
                                $params = [
                                    'external_id' => 'cod-cod-' . time(),
                                    'amount' => $total,
                                    'metode' => 'COD'
                                ];
                                return $this->paymentCOD($params, $newPesananId);
                            } else {
                                $params = [
                                    'external_id' => 'transfer-' . $request->pay_option . '-' . time(),
                                    'amount' => $total,
                                    'metode' => $request->pay_option
                                ];
                                return $this->paymentTransfer($params, $newPesananId);
                            }
                        } else {
                            return 'Payment you choose are not in query';
                        }
//                        switch (strtoupper($request->pay_option)) {
//                            case 'OVO':
//                                $params = [
//                                    'external_id' => 'ewallet-ovo-' . time(),
//                                    'amount' => $total,
//                                    'phone' => str_replace('-', '', $request->nowallet),
//                                    'ewallet_type' => 'OVO'
//                                ];
//                                return $this->paymentEwallet($params, $newPesananId);
//                            case 'LINKAJA':
//                                $params = [
//                                    'external_id' => 'ewallet-linkaja-' . time(),
//                                    'amount' => $total,
//                                    'phone' => str_replace('-', '', $request->nowallet),
//                                    'items' => $itemsDetail,
//                                    'callback_url' => $this->linkAjaCallback,
//                                    'redirect_url' => $this->linkAjaRedirect . '/' . $newPesananId,
//                                    'ewallet_type' => 'LINKAJA'
//                                ];
//                                return $this->paymentEwallet($params, $newPesananId);
//                            case 'QRIS':
//                                $params = [
//                                    'external_id' => 'qr-qris-' . time(),
//                                    'amount' => $total,
//                                    'type' => 'DYNAMIC',
//                                    'callback_url' => $this->qrisCallback,
//                                ];
//                                return $this->paymentQRIS($params, $newPesananId);
//                            default:
//                                return 'Payment you choose are not in query';
//                        }
                    }
                }
            } catch (\Exception $e) {
                DB::rollBack();
            }
        }
    }
}
