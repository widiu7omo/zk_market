<div>
    <header class="app-header bg-primary">
        <a href="javascript:history.go(-1)" class="btn-header">
            <i data-eva="arrow-back" data-eva-fill="#fff"></i></a>
        <h6 class="title-header"> Detail Transaksi #{{$dataOrder->id}} </h6>
        <div class="header-right">
        </div>
    </header> <!-- section-header.// -->
    <main class="app-content">
        <hr class="divider">
        <section class="padding-top px-3 py-0 m-3" id="status-pesanan">
            <h6 class="border-bottom pb-1">Status Pemesanan</h6>
            @foreach($statusPemesanan as $status)
                <div class="">
                    <i data-eva="{{$status->id <= $dataOrder->status_pesanan_id?'checkmark-circle-2':'close-circle'}}"
                       data-eva-width="18px"
                       data-eva-fill="{{$status->id <= $dataOrder->status_pesanan_id?'#4dc90e':'#e82b13'}}"></i><small>&nbsp;{{ucfirst($status->status_pesanan)}}</small>
                </div>
            @endforeach
        </section>
        <hr class="divider">
        <section class="padding-top px-3 py-0 m-3" id="alamat-pesanan">
            <h6 class="border-bottom pb-1">Alamat Pengantaran</h6>
            <div class="text-muted">
                <i data-eva="pin"
                   data-eva-width="18px"
                   data-eva-fill="#B09685"></i>
                <small>&nbsp;{{$dataOrder->alamat->alamat_lengkap}}</small><br>
                <small>Keterangan : <br>{{$dataOrder->alamat->rincian_alamat}}</small>
            </div>
        </section>
        <hr class="divider">
        <section class="px-3 py-0 m-3">
            <h6 class="border-bottom pb-1">Detail Pesanan</h6>
            <div class="d-flex justify-content-between text-muted">
                <span><small>Tanggal</small></span>
                <span><small>{{$dataOrder->created_at->isoFormat('DD MMMM YYYY HH:mm')}}</small></span>
            </div>
            <small class="font-weight-bold text-muted">Item</small>
            <div>
                @foreach($dataOrder->detail_pesanans as $item)
                    <div class="d-flex justify-content-between text-muted">
                        <span><small>{{$item->produk->nama}} x {{$item->jumlah}}</small></span>
                        <span><small>Rp. {{number_format($item->subtotal,0,',','.')}}</small></span>
                    </div>
                    @if($item->produk->promosi == 1)
                        <div class="d-flex justify-content-between text-muted">
                            <span><small>Promo</small></span>
                            <span><small> - Rp. {{number_format(($item->jumlah*$item->produk->harga)-$item->subtotal,0,',','.')}}</small></span>
                        </div>
                    @endif
                @endforeach
                <div class="d-flex justify-content-between text-muted border-bottom pb-1">
                    <span><small>Ongkir</small></span>
                    <span><small>Rp. {{number_format($dataOrder->total_ongkir,0,',','.')}}</small></span>
                </div>
                <div class="d-flex justify-content-between font-weight-bold mt-4 mb-2">
                    <span class="text-medium">Total</span>
                    <span>Rp. {{number_format($dataOrder->pembayaran->amount,0,',','.')}}</span>
                </div>
            </div>
        </section>
        <hr class="divider">
        <section class="px-3 py-0 m-3">
            <div>
                <h6>Catatan:</h6>
                <span class="text-medium text-muted">{{$dataOrder->catatan}}</span>
            </div>
        </section>
        <div>
            <a href="{{strtoupper($dataOrder->status_bayar->status_bayar) == 'SUDAH BAYAR'?null:route('payment')}}"
               class="btn btn-block btn-primary fixed-bottom mb-0 rounded-0">{{strtoupper($dataOrder->status_bayar->status_bayar)}}</a>
        </div>
    </main>
</div>
