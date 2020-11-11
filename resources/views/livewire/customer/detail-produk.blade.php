<div>
    {{-- In work, do what you enjoy. --}}
    <header class="app-header bg-primary">
        <a href="javascript:history.go(-1)" class="btn-header"><i data-eva="arrow-back" data-eva-fill="#fff"></i></a>
        <h5 class="title-header ml-2">Detail </h5>
        <div class="header-right">
            <a href="{{route('cart')}}" class="btn-header relative"> <i data-eva="shopping-cart"
                                                                        data-eva-fill="#fff"></i></a>
            <span style="top:13px;right: 20px;font-size: 10px" id="item-header-count"
                  class="badge badge-pill badge-danger absolute">0</span>
        </div>
    </header>
    <main class="app-content">

        <section class="gallery-wrap">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach(json_decode($product->gambar ?? '[]') as $key_gambar => $gambar)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{$key_gambar}}"
                            class="{{$key_gambar == 0?'active':null}}"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @foreach(json_decode($product->gambar ?? '[]') as $key_gambar => $gambar)
                        <div class="carousel-item {{$key_gambar== 0?'active':null}}">
                            <img class="d-block w-100" style="height: 300px" src="{{asset('storage/'.$gambar)}}"
                                 alt="{{$product->nama.'-'.$key_gambar}}">
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="padding-around">
            <p class="title-detail">{{$product->nama}}</p>
            <div class="price-wrap mb-3">
                @if($product->promosi == '0')
                    <span class="h5 price">Rp. {{number_format($product->harga,0,',','.')}}</span>
                @else
                    <span class="h5 price mr-2 text-danger"><del>Rp. {{number_format($product->harga,0,',','.')}}</del></span>
                    <span class="h5 price">Rp. {{number_format($product->harga_promo,0,',','.')}}</span>
                @endif
            </div> <!-- price-wrap.// -->
            <hr>
            <div class="rating-wrap mb-3">
                {{--                <ul class="rating-stars">--}}
                {{--                    <li style="width:80%" class="stars-active">--}}
                {{--                        <i class="fa fa-star"></i> <i class="fa fa-star"></i>--}}
                {{--                        <i class="fa fa-star"></i> <i class="fa fa-star"></i>--}}
                {{--                        <i class="fa fa-star"></i>--}}
                {{--                    </li>--}}
                {{--                    <li>--}}
                {{--                        <i class="fa fa-star"></i> <i class="fa fa-star"></i>--}}
                {{--                        <i class="fa fa-star"></i> <i class="fa fa-star"></i>--}}
                {{--                        <i class="fa fa-star"></i>--}}
                {{--                    </li>--}}
                {{--                </ul>--}}
                {{--                                <span class="label-rating text-muted">7/10</span>--}}
                <span class="label-rating text-muted">&#8226;  0 terjual</span>
            </div> <!-- rating-wrap.// -->


            <dl class="dlist-align">
                <dt class="text-muted">Status</dt>
                <dd>
                    <a href="#">{!! $product->status == '1'?'<span class="badge badge-pill badge-success">Tersedia</span>':'<span class="badge badge-pill badge-danger">Tidak Tersedia</span>' !!}</a>
                </dd>
            </dl>
            {{--            <dl class="dlist-align">--}}
            {{--                <dt class="text-muted">Color</dt>--}}
            {{--                <dd>Orange</dd>--}}
            {{--            </dl>--}}
            {{--            <dl class="dlist-align">--}}
            {{--                <dt class="text-muted">Size</dt>--}}
            {{--                <dd>120sm x 300sm</dd>--}}
            {{--            </dl>--}}
            {{--            <dl class="dlist-align">--}}
            {{--                <dt class="text-muted">Material</dt>--}}
            {{--                <dd>Cotton</dd>--}}
            {{--            </dl>--}}

            <article class="mt-3">
                <p>
                    {{$product->deskripsi}}
                </p>
            </article>


        </section>

        <hr class="divider my-3">
        <div class="d-flex justify-content-between">
            <h5 class="title-section">Produk terkait</h5>
            <a href="{{url('list/terlaris')}}" class="title-section-end">Lebih banyak...</a>
        </div>
        <section class="scroll-horizontal padding-x mb-4">
            @foreach($related_products ?? [] as $product)
                <div class="item">
                    <a href="{{route('detail',['product'=>encrypt($product->id)])}}" class="product-sm">
                        <div class="img-wrap" style="position: relative;height: 100px"><img
                                src="{{asset('storage/'.json_decode($product->gambar)[0])}}">
                            <div style="position: absolute;top:3px;left: 3px;"
                                 class="d-flex justify-content-start align-items-center">
                                @if($product->promosi == 1)
                                    <div class="badge badge-danger">Promo</div>
                                @endif
                            </div>
                        </div>
                        <div class="text-wrap position-relative">
                            <p class="title text-truncate" style="font-size: 13px">
                                @if($product->baru == 1)
                                    <img style="height: 30px;top:-20px" class="position-absolute"
                                         src="{{asset('images/new-label.svg')}}" alt="new-label">
                                @endif
                                {{$product->nama??'NULL'}}</p>
                            @if($product->promosi == 1)
                                <div class="price font-weight-bold" style="font-size: 12px">
                                    Rp. {{number_format($product->harga_promo??0,0,',','.')}}</div>
                                <div class="price-promo" style="font-size: 12px">
                                    <del>Rp. {{number_format($product->harga??0,0,',','.')}}</del>
                                </div>
                            @else
                                <div class="price font-weight-bold" style="font-size: 12px">
                                    Rp. {{number_format($product->harga??0,0,',','.')}}</div>
                        @endif
                        <!-- price-wrap.// -->
                        </div>
                    </a>
                </div>
            @endforeach
        </section>
    </main>
    <nav class="bar-bottom">
        <div>
            <div class="input-group input-spinner">
                <div class="input-group-prepend">
                    <button id="btn-rem" class="btn btn-light" style="font-size: 14px" type="button">
                        <i data-eva-height="20" data-eva-width="20" data-eva="minus-circle" data-eva-fill="#969696"></i>
                    </button>
                </div>
                <input type="text" id="total-cart" class="form-control" value="1">
                <div class="input-group-append">
                    <button id="btn-add" class="btn btn-light" style="font-size: 14px" type="button">
                        <i data-eva-height="20" data-eva-width="20" data-eva="plus-circle" data-eva-fill="#969696"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="flex-grow-1"><a href="javascript:void(0)" id="btn-add-cart" data-id="{{$product->id}}"
                                    class="btn w-100 btn-primary {{$product->status == '0'?'disabled':''}}"
                                    style="font-size: 14px">Tambah ke
                keranjang</a></div>
    </nav> <!-- nav-bottom -->
    @push('script')
        <script>
            $(document).ready(function () {
                const inputTotal = $('#total-cart');
                const cartOnDetail = localStorage.getItem('cart');
                var parsed;
                const detailHelper = {
                    setItemCount(total) {
                        $('span#item-header-count').text(total);
                    },
                    saveToCart() {
                        localStorage.setItem('cart', JSON.stringify(parsed));
                    },
                    updateCart() {
                        var totalItem = Object.keys(parsed);
                        this.setItemCount(totalItem.length);
                    }
                }
                if (cartOnDetail) {
                    parsed = JSON.parse(cartOnDetail);
                    const itemsCount = Object.keys(parsed);
                    detailHelper.setItemCount(itemsCount.length);
                } else {
                    localStorage.setItem('cart', JSON.stringify({}));
                }
                $('#btn-add').on('click', function () {
                    var totalVal = parseInt(inputTotal.val())
                    inputTotal.val(totalVal + 1);
                })
                $('#btn-rem').on('click', function () {
                    var totalVal = parseInt(inputTotal.val())
                    if (totalVal > 1) {
                        inputTotal.val(totalVal - 1);
                    }
                })
                $('#btn-add-cart').on('click', function () {
                    var id = $(this).data('id');
                    if (parsed[id]) {
                        var currentCount = parseInt(parsed[id].count);
                        var currentInputVal = parseInt(inputTotal.val());
                        parsed[id] = {count: currentCount + currentInputVal};
                    } else {
                        parsed[id] = {count: inputTotal.val()};
                    }
                    detailHelper.saveToCart(parsed);
                    detailHelper.updateCart();
                    Snackbar.show({actionTextColor: '#B09685', text: 'Anda telah memasukkan dalam keranjang',});
                })
            })
        </script>
    @endpush
</div>
