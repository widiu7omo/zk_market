<div>
    <header class="app-header bg-primary">
        <a href="javascript:history.go(-1)" class="btn-header">
            <i data-eva="arrow-back" data-eva-fill="#fff"></i></a>
        <h6 class="title-header"> Konfirmasi Pembayaran </h6>
        <div class="header-right">
            <i data-eva="shopping-bag" data-eva-fill="#fff"></i>
        </div>
    </header> <!-- section-header.// -->
    <main class="app-content">
        <section class="padding-top">
            <h5 class="title-section padding-x">Proses Pembayaran</h5>
            <small class="ml-3 b-3 text-muted">Tanggal {{$payment->created_at->isoFormat('DD MMMM YYYY HH:mm')}}</small>
            @if(session('status'))
                <div class="alert alert-{{session('status')['type']}} rounded-0 alert-dismissible fade show"
                     role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Info</strong><br>
                    {{session('status')['message']}}
                </div>
            @endif
            <div class="box-selection my-3 rounded-0">
                @if(isset($payment))
                    @if($payment->metode_pembayaran === 'OVO')
                        <strong>E-Wallet</strong>
                        <hr class="divider">
                        <h6 class="font-weight-bold pt-3 pl-3">Lakukan pembayaran pada aplikasi</h6>
                        <div class="alert alert-dark border-0" role="alert">
                            <h5 class="alert-heading mb-3">Menuggu pembayaran</h5>
                            <div class="card mb-2 shadow">
                                <div class="d-flex text-white justify-content-between bg-gray-light p-3 rounded"
                                     style="border:5px solid white;border-radius: 0.7rem !important;">
                                    <span>E-wallet</span><span>{{$payment->metode_pembayaran}}</span>
                                </div>
                                <div class="d-flex justify-content-between py-2 px-3 text-muted">
                                    <span>Total</span><span>Rp. {{number_format($payment->amount,0,',','.')}}</span>
                                </div>
                            </div>
                            <small class="text-sm">Silahkan cek aplikasi OVO anda untuk menyelesaikan proses
                                verifikasi
                                transaksi melalui OTP</small><br>
                            <small class="text-sm font-weight-bold">Akan kedaluarsa dalam 30 Detik</small>
                        </div>
                    @elseif($payment->metode_pembayaran === 'LINKAJA')
                        <h6 class="font-weight-bold text-center">Lakukan pembayaran pada aplikasi E-Wallet</h6>
                        <div class="alert alert-dark border-0" role="alert">
                            <h5 class="alert-heading">Menuggu Pembayaran</h5>
                            <div class="card mb-2 shadow">
                                <div class="d-flex text-white justify-content-between bg-gray-light p-3 rounded"
                                     style="border:5px solid white;border-radius: 0.7rem !important;">
                                    <span>E-wallet</span><span>{{$payment->metode_pembayaran}}</span>
                                </div>
                                <div class="d-flex justify-content-between py-2 px-3 text-muted">
                                    <span>Total</span><span>Rp. {{number_format($payment->amount,0,',','.')}}</span>
                                </div>
                                <div class="d-flex justify-content-between pt-2 px-3 text-muted">
                                    <a href="{{$payment->callback ?? ''}}"
                                       class="btn btn-primary btn-sm btn-block mb-1">Klik
                                        Disini</a>
                                </div>
                                <div class="d-flex justify-content-between px-3 mb-3 text-muted">
                                    <small class="text-muted">Klik untuk mengarahkan anda pada Link Aja</small>
                                </div>

                            </div>
                            <small>Batas waktu pembayaran adalah <strong>5 Menit</strong></small>
                        </div>
                    @elseif($payment->metode_pembayaran === 'QRIS')
                        <h5 class="font-weight-bold text-center">Silahkan melakukan
                            pembayaran</h5>
                        <div class="alert alert-dark border-0" role="alert">
                            <h6 class="alert-heading">Scan untuk membayar</h6>
                            <div class="card mb-2 shadow">
                                <img style="padding: 10px;width: 100%;"
                                     src="data:image/svg+xml;base64, {!! base64_encode(QrCode::format('svg')->size(500)->generate($payment->qrstring)) !!} ">
                            </div>
                            <small>Gunakan aplikasi E-Wallet / Mobile Banking Kesayangan anda</small>
                        </div>
                    @endif
                @else
                    <h6 class="font-weight-bold text-center">Transaksi tidak dapat di proses. Silahkan mengulangi
                        beberapa saat lagi.</h6>
                @endif
            </div>
            <div class="mx-3 my-5" style="bottom: 27px">
                <a href="{{route('orders')}}" class="btn btn-block px-3 py-3 btn-primary text-medium shadow-lg">Klik
                    disini untuk
                    melihat daftar
                    pesanan anda.</a>
            </div>
        </section>
    </main>
</div>
