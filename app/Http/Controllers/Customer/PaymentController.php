<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\DetailPesanan;
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

class PaymentController extends Controller
{
    public $xenditApiKey;
    public $linkAjaCallback;
    public $linkAjaRedirect;
    public $qrisCallback;

    public function __construct()
    {
        $this->xenditApiKey = env('XENDIT_API', '');
        $this->linkAjaCallback = env('LINK_AJA_CALLBACK', '');
        $this->qrisCallback = env('QRIS_CALLBACK', '');
        $this->linkAjaRedirect = env('LINK_AJA_REDIRECT', '');
        Xendit::setApiKey($this->xenditApiKey);
    }

    private function initPayment()
    {
    }

    private function getBalance()
    {
        try {
            $currentBalance = Balance::getBalance('CASH');
            dd($currentBalance);
        } catch (ApiException $e) {
            return $e;
        }
    }

    private function paymentQRIS($dataPayment, $pesananId)
    {
//        $qr_code = \Xendit\QRCode::create($dataPayment);
//        dd($qr_code);
        $response = QRCode::create($dataPayment);
//        dd(session('payment'));
//        dd($response);
        if (!isset($response['error_code'])) {
            //insert ke pembayaran
            $dataPembayaran = [
                'metode_pembayaran' => "QRIS",
                'status_pembayaran' => 'PENDING',
                'amount' => $dataPayment['amount'],
                'callback' => $dataPayment['callback_url'] ?? '',
                'external_id' => $response['external_id'],
                'qrstring' => $response['qr_string'],
                'status_expired' => $response['status'],
                'pesanan_id' => $pesananId
            ];
//            dd($dataPembayaran);
            $statusPembayaran = Pembayaran::create($dataPembayaran);
            $status = $statusPembayaran ? ['type' => 'success', 'message' => 'Transaksi berhasil dibuat, Silahkan melakukan pembayaran.'] : ['type' => 'error', 'message' => 'Transaksi gagal dilaksanakan, Silahkan coba lagi.'];
            DB::commit();
            session(['payment' => $statusPembayaran->id]);
            return redirect()->route('payment')->with('status', $status);
        }
        return redirect('/checkout')->with('status', ['type' => 'danger', 'message' => 'Transaksi gagal di laksanakan. Silahkan coba beberapa saat lagi.' . $response['message']]);

    }

    private function paymentEwallet($dataPayment, $pesananId)
    {
        $response = EWallets::create($dataPayment);
        if ($response) {
            //insert ke pembayaran
            $dataPembayaran = [
                'metode_pembayaran' => $response['ewallet_type'],
                'status_pembayaran' => 'PENDING',
                'amount' => $dataPayment['amount'],
                'callback' => $response['checkout_url'] ?? '',
                'external_id' => $response['external_id'],
                'pesanan_id' => $pesananId
            ];
            $statusPembayaran = Pembayaran::create($dataPembayaran);
            $status = $statusPembayaran ? ['type' => 'success', 'message' => 'Transaksi berhasil dibuat, Silahkan melakukan pembayaran.'] : ['type' => 'error', 'message' => 'Transaksi gagal dilaksanakan, Silahkan coba lagi.'];
            DB::commit();
            session(['payment' => $statusPembayaran->id]);
            return redirect()->route('payment')->with('status', $status);
        }
        return redirect('/checkout')->with('status', ['type' => 'danger', 'message' => 'Transaksi gagal dilaksanakan. Silahkan coba beberapa saat lagi.']);
    }

    public function pay(Request $request)
    {
        if ($request->pay_option == 'ovo' || $request->pay_option == 'linkaja') {
            if (!isset($request->nowallet)) {
                return redirect('/checkout')->with('status', ['type' => 'danger', 'message' => 'Nomor telepon E-wallet tidak boleh kosong untuk pembayaran E-wallet']);
            }
        }

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
                        switch (strtoupper($request->pay_option)) {
                            case 'OVO':
                                $params = [
                                    'external_id' => 'ewallet-ovo-' . time(),
                                    'amount' => $total,
                                    'phone' => str_replace('-', '', $request->nowallet),
                                    'ewallet_type' => 'OVO'
                                ];
                                return $this->paymentEwallet($params, $newPesananId);
                            case 'LINKAJA':
                                $params = [
                                    'external_id' => 'ewallet-linkaja-' . time(),
                                    'amount' => $total,
                                    'phone' => str_replace('-', '', $request->nowallet),
                                    'items' => $itemsDetail,
                                    'callback_url' => $this->linkAjaCallback,
                                    'redirect_url' => $this->linkAjaRedirect . '/' . $newPesananId,
                                    'ewallet_type' => 'LINKAJA'
                                ];
                                return $this->paymentEwallet($params, $newPesananId);
                            case 'QRIS':
                                $params = [
                                    'external_id' => 'qr-qris-' . time(),
                                    'amount' => $total,
                                    'type' => 'DYNAMIC',
                                    'callback_url' => $this->qrisCallback,
                                ];
                                return $this->paymentQRIS($params, $newPesananId);
                            default:
                                return 'Payment you choose are not in query';
                        }
                    }
                }
            } catch (\Exception $e) {
                DB::rollBack();
            }
        }
    }
}
