<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <main class="app-content">

        <div class="bg-primary padding-x padding-bottom">
            <input type="text" placeholder="Mau pesan apa hari ini ?"
                   onfocus="window.location.href='{{route('search')}}'" class="form-control input-dark border-0">
        </div>
        @if(session('status'))
            <div class="p-2 bg-red-100 rounded text-sm text-center font-bold text-red-500 my-2">{{session('status')}}</div>
            <hr class="divider my-3">
        @endif
        <section class="padding-around scroll-horizontal">
            @foreach($sliders as $slider)
                <a href="#" class="item-slider card-banner rounded mr-2">
                    <div class="card-body bg-warning"
                         style="height:180px; background-image: url('{{asset('storage/'.$slider->file)}}');"></div>
                    <div class="text-bottom"><h6 class="title">{{$slider->keterangan}}</h6></div>
                </a>
            @endforeach
        </section>

        <hr class="divider my-3">
        <h5 class="title-section">Kategori</h5>
        <section class="padding-x">
            @foreach($categories->chunk(3) as $chunked)
                <div class="row mb-3">
                    @foreach($chunked as $category)
                        <div class="col-4">
                            <a href="{{url('/list/'.strtolower($category->kategori))}}" class="icontext">
                        <span class="icon icon-md rounded" style="background: #e8e8e8">
                            <img src="{{asset('storage/'.$category->icon)}}" alt="{{$category->icon}}">
                        </span>
                                <small class="icon-title">{{$category->kategori}}</small>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </section>
        <hr class="divider my-3">

        <div class="d-flex justify-content-between">
            <h5 class="title-section">Menu Baru</h5>
            <a href="{{url('list/baru')}}" class="title-section-end">Lebih banyak...</a>
        </div>
        <section class="scroll-horizontal  padding-x">
            @foreach($newestProducts as $product)
                <div class="item">
                    <a href="{{route('detail',['product'=>encrypt($product->id)])}}" class="product-sm">
                        <div class="img-wrap"><img style="position: relative"
                                                   src="{{asset('storage/'.json_decode($product->gambar)[0])}}">
                            <div style="position: absolute;top:3px;left: 3px;"
                                 class="d-flex justify-content-start align-items-center">
                                @if($product->promosi == 1)
                                    <div class="badge badge-danger">Promo</div>
                                @endif
                            </div>
                        </div>
                        <div class="text-wrap position-relative">
                            <p class="title text-truncate">
                                @if($product->baru == 1)
                                    <img style="height: 30px;top:-20px" class="position-absolute"
                                         src="{{asset('images/new-label.svg')}}" alt="new-label">
                                @endif
                                {{$product->nama}}</p>
                            @if($product->promosi == 1)
                                <div class="price font-weight-bold">
                                    Rp. {{number_format($product->harga_promo??0,0,',','.')}}</div>
                                <div class="price-promo">
                                    <del>Rp. {{number_format($product->harga??0,0,',','.')}}</del>
                                </div>
                            @else
                                <div class="price font-weight-bold">
                                    Rp. {{number_format($product->harga??0,0,',','.')}}</div>
                        @endif
                        <!-- price-wrap.// -->
                        </div>
                    </a>
                </div>
            @endforeach
        </section>

        <hr class="divider my-3">

        <div class="d-flex justify-content-between">
            <h5 class="title-section">Terlaris</h5>
            <a href="{{url('list/terlaris')}}" class="title-section-end">Lebih banyak...</a>
        </div>
        <section class="scroll-horizontal padding-x">
            @foreach($mostBuyProducts as $product)
                <div class="item">
                    <a href="{{route('detail',['product'=>encrypt($product->id)])}}" class="product-sm">
                        <div class="img-wrap" style="position: relative"><img
                                src="{{asset('storage/'.json_decode($product->gambar)[0])}}">
                            <div style="position: absolute;top:3px;left: 3px;"
                                 class="d-flex justify-content-start align-items-center">
                                @if($product->promosi == 1)
                                    <div class="badge badge-danger">Promo</div>
                                @endif
                            </div>
                        </div>
                        <div class="text-wrap position-relative">
                            <p class="title text-truncate">
                                @if($product->baru == 1)
                                    <img style="height: 30px;top:-20px" class="position-absolute"
                                         src="{{asset('images/new-label.svg')}}" alt="new-label">
                                @endif
                                {{$product->nama??'NULL'}}</p>
                            @if($product->promosi == 1)
                                <div class="price font-weight-bold">
                                    Rp. {{number_format($product->harga_promo??0,0,',','.')}}</div>
                                <div class="price-promo">
                                    <del>Rp. {{number_format($product->harga??0,0,',','.')}}</del>
                                </div>
                            @else
                                <div class="price font-weight-bold">
                                    Rp. {{number_format($product->harga??0,0,',','.')}}</div>
                        @endif
                        <!-- price-wrap.// -->
                        </div>
                    </a>
                </div>
            @endforeach
        </section>
        <hr class="divider my-3">

        <div class="d-flex justify-content-between">
            <h5 class="title-section">Sedang Promo Nih !!!</h5>
            <a href="{{url('list/promo')}}" class="title-section-end">Lebih banyak...</a>

        </div>
        <section class="scroll-horizontal padding-x">
            @foreach($promoProducts as $product)
                <div class="item">
                    <a href="{{route('detail',['product'=>encrypt($product->id)])}}" class="product-sm">
                        <div class="img-wrap">
                            <img style="position: relative"
                                 src="{{asset('storage/'.json_decode($product->gambar)[0])}}">
                            @if($product->promosi == 1)
                                <span style="position: absolute;top:3px;left: 3px;" class="badge badge-danger">Promo
                                </span>
                            @endif
                        </div>
                        <div class="text-wrap position-relative">
                            <p class="title text-truncate">
                                @if($product->baru == 1)
                                    <img style="height: 30px;top:-20px" class="position-absolute"
                                         src="{{asset('images/new-label.svg')}}" alt="new-label">
                                @endif
                                {{$product->nama??'NULL'}}</p>
                            @if($product->promosi == 1)
                                <div class="price font-weight-bold">
                                    Rp. {{number_format($product->harga_promo??0,0,',','.')}}</div>
                                <div class="price-promo">
                                    <del>Rp. {{number_format($product->harga??0,0,',','.')}}</del>
                                </div>
                            @else
                                <div class="price font-weight-bold">
                                    Rp. {{number_format($product->harga??0,0,',','.')}}</div>
                        @endif
                        <!-- price-wrap.// -->
                        </div>
                    </a>
                </div>
            @endforeach
        </section>
    </main>

</div>
