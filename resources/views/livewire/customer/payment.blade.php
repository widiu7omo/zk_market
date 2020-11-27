<div>
    <header class="app-header bg-primary">
        <a href="javascript:window.location='{{url('orders')}}'" class="btn-header">
            <i data-eva="arrow-back" data-eva-fill="#fff"></i></a>
        <h6 class="title-header"> Konfirmasi Pembayaran </h6>
        <a href="{{url('orders')}}" class="header-right">
            <i data-eva="shopping-bag" data-eva-fill="#fff"></i>
        </a>
    </header> <!-- section-header.// -->
    <main class="app-content">
        <section class="padding-top">
            <h5 class="title-section pt-3 pb-1 m-0">Detail Pembayaran</h5>
            <small class="ml-3 b-3 text-muted">Transaksi
                tanggal {{$payment->created_at->isoFormat('DD MMMM YYYY HH:mm')}}</small>
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
                    @if($payment->metode_pembayaran === 'COD')
                        <h6 class="pt-3 pl-3">Pembayaran melalui kurir</h6>
                        <div class="alert alert-dark border-0" role="alert">
                            <img style="width: 100%" src="{{asset('deliver.svg')}}" alt="Deliver">
                            <h5 class="alert-heading mb-3"></h5>
                            <div class="card mb-2 shadow">
                                <div class="d-flex text-white justify-content-center bg-gray-light p-3 rounded"
                                     style="border:5px solid white;border-radius: 0.7rem !important;">
                                    <span><strong>Horeee !!! Pesanan Berhasil</strong></span>
                                </div>
                                <div class="d-flex justify-content-center py-2 px-3 text-muted">
                                    <small class="text-sm text-center">Tunggu kurir kami datang ya ?</small><br>
                                </div>
                            </div>
                        </div>
                    @else
                        <h6 class="font-weight-bold text-center">Pembayaran melalui transfer bank</h6>
                        <div class="alert alert-dark border-0" role="alert">
                            <img style="width: 100%" src="{{asset('transfer.svg')}}" alt="Deliver">
                            <h5 class="alert-heading"></h5>
                            <div class="card mb-2 shadow">
                                <div class="m-3 rounded justify-content-center bg-gray-light ">
                                    <div
                                        class="d-flex text-white p-2 justify-content-between align-items-center rounded">
                                        <div style="font-size: 1.2rem;font-weight: bold">Bank Transfer</div>
                                        <div><img style="height: 40px"
                                                  src="{{asset('storage/'.$metode_pembayaran->icon)}}"
                                                  alt="{{$metode_pembayaran->metode}}"></div>
                                    </div>
                                    <div class="h6 d-flex p-2 pb-0 mb-0 justify-content-between text-white pt-2"
                                         style="border-top: 3px white solid !important;"><span>No. Rekening</span>
                                        <span>{{$metode_pembayaran->kode}}</span></div>
                                    <div class="text-sm px-2 pb-2 d-flex justify-content-between text-white font-sm">
                                        <span>Atas Nama</span><span>{{$metode_pembayaran->holder ?? ''}}</span></div>
                                </div>
                                <div class="d-flex justify-content-between py-2 px-3 text-muted">
                                    <span>Total</span><span>Rp. {{number_format($payment->amount,0,',','.')}}</span>
                                </div>
                                <div class="d-flex justify-content-between pt-2 px-3 text-muted">
                                    <a href="{{$isPaid?'#':'#uploadModal'}}" data-toggle="modal"
                                       class="btn btn-primary btn-sm btn-block mb-1">{{$isPaid?'Anda sudah mengupload bukti transfer':'Upload bukti transfer'}}</a>
                                </div>
                                <div class="d-flex justify-content-between px-3 mb-3 text-muted">
                                    @if(!$isPaid)
                                        <small class="text-muted">Klik untuk memilih foto bukti transfer</small>
                                    @endif
                                </div>

                            </div>
                        </div>
                    @endif
                @else
                    <h6 class="font-weight-bold text-center">Transaksi tidak dapat di proses. Silahkan mengulangi
                        beberapa saat lagi.</h6>
                @endif
            </div>
            <div class="mx-3 my-5" style="bottom: 27px">
                <a href="{{url('orders')}}" class="btn btn-block px-3 py-3 btn-primary text-medium shadow-lg">Klik
                    disini untuk
                    melihat daftar
                    pesanan anda.</a>
            </div>
        </section>
    </main>
    <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{route('store_address')}}">
                @csrf
                <div class="modal-content vh-100">
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Upload bukti transfer</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            <div id="drag-drop-area" style="max-width: 100% !important;"></div>
                        </div>
                    </div>
                    <div class="modal-footer p-0 border-0">
                        <div class="col-6 m-0 p-0">
                            <button type="button" class="btn border-top btn-lg btn-block rounded-0 mb-0 text-medium"
                                    data-dismiss="modal">Tutup
                            </button>
                        </div>
                        <div class="col-6 m-0 p-0">
                            <button type="submit" class="btn btn-primary btn-lg btn-block rounded-0 mb-0 text-medium">
                                Simpan
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@push('style')
    <link href="https://releases.transloadit.com/uppy/v1.22.0/uppy.min.css" rel="stylesheet">
@endpush
@push('script')
    <script src="https://releases.transloadit.com/uppy/v1.22.0/uppy.min.js"></script>
    <script src="https://releases.transloadit.com/uppy/locales/v1.16.9/id_ID.min.js"></script>
    <script>
        var uppy = Uppy.Core()
            .use(Uppy.Dashboard, {
                inline: true,
                locale: Uppy.locales.id_ID,
                target: '#drag-drop-area',
                allowMultipleUploads: false
            })
            .use(Uppy.XHRUpload, {endpoint: '{{route('upload')}}', fieldName: 'file'})

        uppy.on('complete', (result) => {
            console.log('Upload complete! We’ve uploaded these files:', result.successful)
        })
    </script>
    <script>
        localStorage.clear();
    </script>
@endpush
