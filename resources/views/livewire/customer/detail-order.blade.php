<div>
    <header class="app-header bg-primary">
        <a href="{{url('orders')}}" class="btn-header">
            <i data-eva="arrow-back" data-eva-fill="#fff"></i></a>
        <h6 class="title-header"> Detail Transaksi #{{$dataOrder->id}} </h6>
        <div class="header-right">
            <a href="https://wa.me/{{$nowa??0}}">
                <i data-eva="phone-call" data-eva-fill="#fff"></i></a>
        </div>
    </header> <!-- section-header.// -->
    <main class="app-content vh-100">
        @if(session('status'))
            <div class="alert alert-{{session('status')['type']}} alert-dismissible fade show rounded-0" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <small>{{session('status')['message']}}</small>
            </div>
        @endif
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
            <small class="text-tiny text-muted pt-3 mt-4 ml-2" data-toggle="tooltip" data-placement="top" title="Silahkan reload halaman untuk melihat status pembayaran jika
                    sudah selesai
                    melakukan pembayaran. Tarik kebawah untuk reload halaman."><i
                    class="fa fa-info-circle"></i>&nbsp;<i>Klik disini untuk informasi pembayaran</i></small>
        </section>
        <hr class="divider">
        <section class="padding-top px-3 py-0 m-3" id="alamat-pesanan">
            <h6 class="border-bottom pb-1">Alamat Pengantaran</h6>
            <div class="text-muted">
                <i data-eva="pin"
                   data-eva-width="18px"
                   data-eva-fill="#B09685"></i>
                <small>&nbsp;{{$dataOrder->alamat->alamat_lengkap}}</small><br>
                <small>Keterangan :
                    <br>{{$dataOrder->alamat->rincian_alamat != ''?$dataOrder->alamat->rincian_alamat:'Tidak ada keterangan'}}
                </small>
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
                        <span><small>Rp. {{number_format($item->jumlah*$item->produk->harga,0,',','.')}}</small></span>
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
        <div style="max-width: 35rem;margin:auto;" class="fixed-bottom row">
            <a href="{{strtoupper($dataOrder->status_bayar->status_bayar) == 'SUDAH BAYAR'?null:route('payment')}}"
               class="btn btn-primary col-6 mb-0 rounded-0">{{strtoupper($dataOrder->status_bayar->status_bayar)}}</a>
            <a href="{{strtoupper($dataOrder->status_pesanan->status_pesanan) == 'PEMESANAN'?route('cancel/{id}',['id'=>Request::segment(2)]):null}}"
               class="btn btn-danger col-6 mb-0 rounded-0 {{strtoupper($dataOrder->status_pesanan->status_pesanan) != 'PEMESANAN'?'disabled':''}}">{{strtoupper('batal')}}</a>
        </div>
    </main>
</div>
