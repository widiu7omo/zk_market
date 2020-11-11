<div>
    <header class="app-header bg-primary">
        <a href="javascript:history.go(-1)" class="btn-header">
            <i data-eva="arrow-back" data-eva-fill="#fff"></i></a>
        <h6 class="title-header"> Daftar Transaksi </h6>
        <div class="header-right">
        </div>
    </header> <!-- section-header.// -->
    <main class="app-content">
        <section class="padding-top">
            <h5 class="title-section padding-x">Transaksi</h5>
            @if(count($orders ?? []) == 0)
                <div class="d-flex p-5 mx-auto justify-content-center align-items-center">
                    <h6 class="text-center">Belum transaksi. Silahkan memesan :)</h6>
                </div>
            @endif
            @foreach($orders ?? [] as $key=> $order)
                <a href="{{url('detail_order/'.$order->pesanan->id)}}">
                    <div class="box-selection mx-3" style="border:rosybrown 1px solid">
                        <label class="custom-control custom-radio pl-0">
                            <span
                                class="title d-flex justify-content-between">Pesanan #{{$order->pesanan->id}} <span><small
                                        class="text-muted">{{$order->created_at->isoFormat('DD MMMM YYYY HH:mm')}}</small></span>
                        </span><br>
                            <span class="text-muted mt-3">
                            <small>Total Rp. {{number_format($order->amount,0,',','.')}}</small>
                        </span><br>
                            <span class="d-flex justify-content-between">
                        <small>Pembayaran
                            <strong>{{$order->metode_pembayaran}}</strong></small><small
                                    class="badge badge-pill badge-{{strtoupper($order->pesanan->status_bayar->status_bayar)=='BELUM BAYAR'|| strtoupper($order->pesanan->status_bayar->status_bayar)=='GAGAL BAYAR'?'danger':(strtoupper($order->pesanan->status_bayar->status_bayar)=='KEDALUWARSA'?'warning':'success')}}">{{strtoupper($order->pesanan->status_bayar->status_bayar)}}</small>
                        </span><br>
                            <small>Catatan: <br><span class="text-muted">{{$order->pesanan->catatan}}</span></small>
                        </label>
                    </div>
                </a>
            @endforeach
            {{--            <button id="btn-choose-address" class="btn rounded-0 mb-0 btn-primary btn-block fixed-bottom" type="button">--}}
            {{--                <i--}}
            {{--                    data-eva-fill="#fff" data-eva="checkmark-outline"></i> Konfirmasi--}}
            {{--            </button>--}}
        </section>
    </main>
</div>
