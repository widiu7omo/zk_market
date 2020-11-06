<div>
    <nav class="nav-bottom">
        <a href="{{route('homepage')}}" class="nav-link {{$active== 'homepage'?'active':null}}">
            <i data-eva="shopping-bag" data-eva-fill="{{$active== 'homepage'?'#B09685':'#969696'}}"></i><span
                class="text">Beranda</span>
        </a>

        <a href="{{route('search')}}" class="nav-link {{$active== 'search'?'active':null}}">
            <i data-eva="search" data-eva-fill="{{$active== 'search'?'#B09685':'#969696'}}"></i><span
                class="text">Cari</span>
        </a>

        <a href="{{route('cart')}}" class="nav-link position-relative {{$active== 'cart'?'active':null}}">
            <i data-eva="shopping-cart" data-eva-fill="{{$active== 'cart'?'#B09685':'#969696'}}"></i><span class="text">Keranjang</span>
            <span id="cart-item" class="badge badge-danger badge-pill absolute">0</span>
        </a>

        <a href="{{route('profile')}}" class="nav-link {{$active== 'profile'?'active':null}}">
            <i data-eva="person" data-eva-fill="{{$active== 'profile'?'#B09685':'#969696'}}"></i><span class="text">Profil</span>
        </a>
    </nav>
</div>
