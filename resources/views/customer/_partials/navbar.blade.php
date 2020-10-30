<nav class="nav-bottom">
    <a href="{{route('home.index')}}" class="nav-link active">
        <i data-eva="shopping-bag" data-eva-fill="#B09685"></i><span class="text">Beranda</span>
    </a>

    <a href="{{route('search.index')}}" class="nav-link">
        <i data-eva="search" data-eva-fill="#969696"></i><span class="text">Cari</span>
    </a>

    <a href="{{route('cart.index')}}" class="nav-link position-relative">
        <i data-eva="shopping-cart" data-eva-fill="#969696"></i><span class="text">Keranjang</span>
        <span id="cart-item" class="badge badge-danger badge-pill absolute">3</span>
    </a>

    <a href="{{route('profile.index')}}" class="nav-link">
        <i data-eva="person" data-eva-fill="#969696"></i><span class="text">Profil</span>
    </a>
</nav>
