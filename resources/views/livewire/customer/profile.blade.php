<div class="">
    <header class="app-header bg-primary">
        <a href="javascript:history.go(-1)" class="btn-header"><i data-eva="arrow-back" data-eva-fill="#fff"></i></a>
        <h6 class="title-header"> Profil</h6>
        <div class="header-right">
            @if(Auth::user())
                <form action="{{route('logout')}}" method="post">
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
                    Mohon mengisi nomor <i>handphone</i> anda demi kemudahan bertransaksi
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
                        <a class="btn-list" href="#" id="email">
                            <i class="icon-action fa fa-pen"></i>
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
                    case 'email':
                        modalLabel.text('Edit E-Mail');
                        name.hide();
                        email.show().val(currentValue);
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
