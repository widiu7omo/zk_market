<div class="">
    <header class="app-header bg-primary">
        <a href="javascript:history.go(-1)" class="btn-header"><i data-eva="arrow-back" data-eva-fill="#fff"></i></a>
        <h6 class="title-header"> Profil</h6>
        <div class="header-right">
            @if(Auth::user())
                <form action="{{route('logout')}}" method="post" onsubmit="localStorage.clear()">
                    @csrf
                    <button class="btn btn-sm btn-outline-light">Logout</button>
                </form>
            @else
                <a class="btn btn-sm btn-outline-light" href="{{route('login')}}">Login</a>
            @endif
        </div>
    </header> <!-- section-header.// -->
    @if(!Auth::user()||Auth::user()->hasRole('Customer'))
        <main class="app-content">
            <section class="padding-x pb-3 bg-primary text-white">
                <figure class="icontext align-items-center mr-4" style="max-width: 300px;">
                    <img class="icon icon-md rounded-circle"
                         src="https://ui-avatars.com/api/?background=random&name={{Auth::user()->customer->nama ??'Belum Login'}}">
                    <figcaption class="text">
                        <p class="h5 title text-uppercase">{{Auth::user()->customer->nama ?? 'Belum Login'}}</p>
                        <p class="text-white-50">{{Auth::user()->customer->no_hp ??'Belum di atur'}}</p>
                    </figcaption>
                </figure>
            </section>
            @if(isset($customer->no_hp) && $customer->no_hp == '-')
                <div class="alert alert-warning rounded-0 alert-dismissible fade show mb-0" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Informasi</strong><br>
                    <small>Mohon mengisi nomor <i>handphone</i> anda demi kemudahan bertransaksi</small>
                </div>
            @endif
            @if(Auth::user())
                <section class="padding-around">
                    <ul class="row">
                        <li class="col-4">
                            <a href="{{url('orders')}}" class="btn-card-icontop btn">
                                <span class="icon"> <i style="color: #B09685" class="fa fa-shopping-basket"></i> </span>
                                <small class="text text-center"> Transaksi</small>
                            </a>
                        </li>
                        <li class="col-4">
                            <a href="{{route('list-address')}}" class="btn-card-icontop btn">
                                <span class="icon"> <i style="color: #B09685" class="fa fa-map-pin"></i> </span>
                                <small class="text text-center"> Alamat</small>
                            </a>
                        </li>
                        <li class="col-4">
                            <a href="#" class="btn-card-icontop btn">
                                <span class="icon"> <i style="color: #B09685" class="fa fa-question-circle"></i> </span>
                                <small class="text text-center"> Bantuan </small>
                            </a>
                        </li>
                    </ul>
                </section>
            @endif
            <hr class="divider">

            <section class="padding-top">
                <h5 class="title-section padding-x">Daftar Pesanan</h5>
                <nav class="nav-list">
                    <a class="btn-list" href="{{url('orders/process')}}">
                        <span class="float-right badge badge-warning">{{count($onProcess??[])}}</span>
                        <span class="text">Dalam Proses</span>
                    </a>
                    <a class="btn-list" href="{{url('orders/pengiriman')}}">
                        <span class="float-right badge badge-success">{{count($onTheWay??[])}}</span>
                        <span class="text">Pengiriman</span>
                    </a>
                    <a class="btn-list" href="{{url('orders/unpaid')}}">
                        <span class="float-right badge badge-secondary">{{count($unpaid??[])}}</span>
                        <small class="title"></small>
                        <span class="text">Belum Dibayar</span>
                    </a>
                </nav>
            </section>
            <hr class="divider">
            <section class="padding-top">
                @if(!Auth::user())
                    <div class="alert alert-warning-light alert-dismissible fade show rounded-0" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong class="pb-2">Informasi</strong><br>
                        Demi kenyamanan bertransaksi, silahkan <a href="{{route('login')}}"><strong>login</strong></a>
                        atau
                        <a href="{{route('login')}}"><strong>buat akun dengan google</strong></a> apabila belum
                        mempunyai
                        akun.
                        <br><small class="text-danger">* Silahkan datang ke toko ketika transaksi anda hilang karena
                            anda
                            tidak
                            melakukan
                            registrasi.</small>
                    </div>
                @endif
                @if(Auth::user())
                    <h5 class="title-section padding-x">Personal</h5>
                    <nav class="nav-list">
                        <a class="btn-list" href="#" id="akun">
                            <i class="icon-action fa fa-pen"></i>
                            <small class="title">Nama Akun</small>
                            <span class="text text-uppercase">{{Auth::user()->name}}</span>
                        </a>
                        <a class="btn-list" href="javascript:void(0)">
{{--                            <i class="icon-action fa fa-pen"></i>--}}
                            <small class="title">Email</small>
                            <span class="text">{{Auth::user()->email}}</span>
                        </a>
                        <a class="btn-list" href="#" id="nohp">
                            <i class="icon-action fa fa-pen"></i>
                            <small class="title">Nomor HP</small>
                            <span class="text">{{Auth::user()->customer->no_hp ?? 'Belum di atur'}}</span>
                        </a>
                    </nav>
                @endif
                <hr class="divider"/>
                <a class="padding-x btn-list" href="#">
                    <small class="title"></small>
                    <span class="text padding-x text-black-50">Tentang Aplikasi Zona Kopi Delivery</span>
                </a>
                <a class="padding-x btn-list d-flex align-items-center" href="https://wa.me/{{$nowa}}">
                    <span class="padding-x">
                    <svg aria-hidden="true" focusable="false" data-prefix="fab" height="25px" width="25px"
                         data-icon="whatsapp"
                         class="svg-inline--fa fa-whatsapp fa-w-14 text-success" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 448 512">
                        <path fill="currentColor"
                              d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"></path>
                    </svg>
                    </span>
                    <span>+{{$nowa}}</span>
                </a>
            </section>
            @if(!Auth::user())
                <div class="mx-3 my-5" style="bottom: 27px">
                    <a href="{{url('orders')}}" class="btn btn-block px-3 py-3 btn-primary text-medium shadow-lg">Klik
                        disini untuk
                        melihat daftar
                        pesanan anda.</a>
                </div>
            @endif
        </main>
        <!-- Modal -->
        <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content border-top-0 mx-3" style="border-radius: 14px !important;">
                    <div class="modal-header pb-2 pt-3">
                        <h6 class="modal-title" id="profileModalLabel">Modal title</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{route('updateprofile')}}">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group mb-0">
                                <input style="display: none" id="name" type="text" name="name" class="form-control"
                                       placeholder="Nama Pemesan">
                                <input style="display: none" id="email" type="text" name="email" class="form-control"
                                       placeholder="Nama Pemesan">
                                <input style="display: none" id="nohp" name="nohp" type="text"
                                       data-mask="0000-0000-0000" class="form-control" placeholder="Nomor Telepon">
                            </div>
                        </div>
                        <div class="modal-footer pb-2 pt-2">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
    @push('script')
        <script src="{{asset('vendor/jquery-mask/jquery.mask.min.js')}}"></script>
        <script>
            const modalLabel = $('#profileModalLabel');
            const name = $('input#name');
            const email = $('input#email');
            const nohp = $('input#nohp');
            $('#akun,#email,#nohp').on('click', function () {
                var currentValue = $(this).find('span').text();
                switch ($(this).prop('id')) {
                    case 'akun':
                        modalLabel.text('Edit Nama Akun');
                        name.show().val(currentValue);
                        email.hide();
                        nohp.hide();
                        break;
                    case 'nohp':
                        modalLabel.text('Edit Nomor Handphone');
                        name.hide();
                        email.hide();
                        nohp.show().val(currentValue);
                        break;
                }
                $('#profileModal').modal('show');
                return false;
            })
        </script>
    @endpush
</div>
