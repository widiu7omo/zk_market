<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <main class="app-content">

        <div class="bg-primary padding-x padding-bottom">
            <input type="text" placeholder="Mau pesan apa hari ini ?" class="form-control input-dark border-0">
        </div>

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
            <a href="" class="title-section-end">Lebih banyak...</a>
        </div>
        <section class="scroll-horizontal  padding-x">
            @foreach($products->random(count($products)) as $product)
                <div class="item">
                    <a href="{{route('detail',['product'=>encrypt($product->id)])}}" class="product-sm">
                        <div class="img-wrap"><img src="{{asset('storage/'.json_decode($product->gambar)[0])}}"></div>
                        <div class="text-wrap">
                            <p class="title text-truncate">{{$product->produk}}</p>
                            <div class="price">Rp. {{number_format($product->harga??0,0,',','.')}}</div>
                            <!-- price-wrap.// -->
                        </div>
                    </a>
                </div>
            @endforeach
        </section>

        <hr class="divider my-3">

        <div class="d-flex justify-content-between">
            <h5 class="title-section">Rekomendasi Buat Kamu</h5>
            <a href="" class="title-section-end">Lebih banyak...</a>
        </div>
        <section class="scroll-horizontal padding-x">
            @foreach($products as $product)
                <div class="item">
                    <a href="{{route('detail',['product'=>encrypt($product->id)])}}" class="product-sm">
                        <div class="img-wrap"><img src="{{asset('storage/'.json_decode($product->gambar)[0])}}"></div>
                        <div class="text-wrap">
                            <p class="title text-truncate">{{$product->nama??'NULL'}}</p>
                            <div class="price">Rp. {{number_format($product->harga??0,0,',','.')}}</div>
                            <!-- price-wrap.// -->
                        </div>
                    </a>
                </div>
            @endforeach
        </section>
        <hr class="divider my-3">

        <div class="d-flex justify-content-between">
            <h5 class="title-section">Sedang Promo Nih !!!</h5>
            <a href="" class="title-section-end">Lebih banyak...</a>

        </div>
        <section class="scroll-horizontal padding-x">
            @foreach($products as $product)
                <div class="item">
                    <a href="{{route('detail',['product'=>encrypt($product->id)])}}" class="product-sm">
                        <div class="img-wrap"><img src="{{asset('storage/'.json_decode($product->gambar)[0])}}"></div>
                        <div class="text-wrap">
                            <p class="title text-truncate">{{$product->nama??'NULL'}}</p>
                            <div class="price">Rp. {{number_format($product->harga??0,0,',','.')}}</div>
                            <!-- price-wrap.// -->
                        </div>
                    </a>
                </div>
            @endforeach
        </section>
    </main>

</div>
