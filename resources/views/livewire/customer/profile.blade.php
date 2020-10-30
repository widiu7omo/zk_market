<div>
    <header class="app-header bg-primary">
        <a href="javascript:history.go(-1)" class="btn-header"><i data-eva="arrow-back" data-eva-fill="#fff"></i></a>
        <h6 class="title-header"> Profil</h6>
        <div class="header-right">
            @if(Auth::user())
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button class="btn-header">Logout</button>
                </form>
            @endif
        </div>
    </header> <!-- section-header.// -->
    <main class="app-content">

        <section class="padding-x pb-3 bg-primary text-white">
            <figure class="icontext align-items-center mr-4" style="max-width: 300px;">
                <img class="icon icon-md rounded-circle"
                     src="https://ui-avatars.com/api/?background=random&name={{$customer->nama ??'Belum Login'}}">
                <figcaption class="text">
                    <p class="h5 title">{{$customer->nama ?? 'Belum Login'}}</p>
                    <p class="text-white-50">{{$customer->no_hp ??'Belum Login'}}</p>
                </figcaption>
            </figure>
        </section>
        @if($customer->no_hp == '-')
            <div class="alert alert-warning rounded-0 alert-dismissible fade show mb-0" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Informasi</strong><br>
                Mohon mengisi nomor <i>handphone</i> anda demi kemudahan bertransaksi
            </div>
        @endif
        {{--        <section class="padding-around">--}}
        {{--            <ul class="row">--}}
        {{--                <li class="col-4">--}}
        {{--                    <a href="#" class="btn-card-icontop btn">--}}
        {{--                        <span class="icon"> <i class="fa fa-heart"></i> </span>--}}
        {{--                        <small class="text text-center"> Wishlist </small>--}}
        {{--                    </a>--}}
        {{--                </li>--}}
        {{--                <li class="col-4">--}}
        {{--                    <a href="#" class="btn-card-icontop btn">--}}
        {{--                        <span class="icon"> <i class="fa fa-shopping-basket"></i> </span>--}}
        {{--                        <small class="text text-center"> Purchases</small>--}}
        {{--                    </a>--}}
        {{--                </li>--}}
        {{--                <li class="col-4">--}}
        {{--                    <a href="#" class="btn-card-icontop btn">--}}
        {{--                        <span class="icon"> <i class="fa fa-wallet"></i> </span>--}}
        {{--                        <small class="text text-center"> Wallet</small>--}}
        {{--                    </a>--}}
        {{--                </li>--}}
        {{--            </ul>--}}
        {{--        </section>--}}

        <hr class="divider">

        <section class="padding-top">
            <h5 class="title-section padding-x">Daftar Pesanan</h5>
            <nav class="nav-list">
                <a class="btn-list" href="#">
                    <span class="float-right badge badge-warning">{{count($onProcess??[])}}</span>
                    <span class="text">Dalam Proses</span>
                </a>
                <a class="btn-list" href="#">
                    <span class="float-right badge badge-success">{{count($onTheWay??[])}}</span>
                    <span class="text">Pengiriman</span>
                </a>
                <a class="btn-list" href="#">
                    <span class="float-right badge badge-secondary">{{count($unpaid??[])}}</span>
                    <small class="title"></small>
                    <span class="text">Belum Dibayar</span>
                </a>
            </nav>
        </section>
        <hr class="divider">
        {{--        <section class="padding-top">--}}
        {{--            <h5 class="title-section padding-x">Account</h5>--}}
        {{--            <nav class="nav-list">--}}
        {{--                <a class="btn-list" href="#">--}}
        {{--                    <i class="icon-control fa fa-chevron-right"></i>--}}
        {{--                    <span class="text">Notifications</span>--}}
        {{--                </a>--}}
        {{--                <a class="btn-list" href="#">--}}
        {{--                    <i class="icon-control fa fa-chevron-right"></i>--}}
        {{--                    <span class="text">Settings</span>--}}
        {{--                </a>--}}
        {{--                <a class="btn-list" href="#">--}}
        {{--                    <i class="icon-control fa fa-chevron-right"></i>--}}
        {{--                    <span class="text">Support</span>--}}
        {{--                </a>--}}
        {{--            </nav>--}}
        {{--        </section>--}}

        <hr class="divider">
        <section class="padding-top">
            @if(!Auth::user())
            <div class="alert alert-warning-light alert-dismissible fade show rounded-0" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong class="pb-2">Informasi</strong><br>
                Demi kenyamanan bertransaksi, silahkan <a href="{{route('login')}}"><strong>login</strong></a> atau <a
                    href="{{route('register')}}"><strong>buat akun</strong></a> apabila belum mempunyai akun.
                <br><small class="text-danger">* Silahkan datang ke toko ketika transaksi anda hilang karena anda tidak
                    melakukan
                    registrasi.</small>
            </div>
            @endif
            @if(Auth::user())
                <h5 class="title-section padding-x">Personal</h5>
                <nav class="nav-list">
                    <a class="btn-list" href="page-profile-edit.html">
                        <i class="icon-action fa fa-pen"></i>
                        <small class="title">Nama Akun</small>
                        <span class="text">{{Auth::user()->name}}</span>
                    </a>
                    <a class="btn-list" href="page-profile-edit.html">
                        <i class="icon-action fa fa-pen"></i>
                        <small class="title">Email</small>
                        <span class="text">{{Auth::user()->email}}</span>
                    </a>
                </nav>
            @endif
        </section>
        <div class="mx-3 my-5" style="bottom: 27px">
            <a href="{{route('orders')}}" class="btn btn-block px-3 py-3 btn-primary text-medium shadow-lg">Klik
                disini untuk
                melihat daftar
                pesanan anda.</a>
        </div>
    </main>
</div>
