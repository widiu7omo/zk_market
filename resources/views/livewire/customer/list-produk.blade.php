<div>
    {{-- The Master doesn't talk, he acts. --}}
    <header class="app-header bg-primary">
        <a href="javascript:history.go(-1)" class="btn-header"><i data-eva="arrow-back" data-eva-fill="#fff"></i></a>
        <h6 class="title-header"> Kategori </h6>
        <div class="header-right">
            <a href="{{route('search')}}" class="btn-header"><i data-eva="search" data-eva-fill="#fff"></i></a>
        </div>
    </header> <!-- section-header.// -->

    <div class="bg-primary padding-x padding-bottom">
        <h5 class="title-page text-white">{{ucfirst($category??'NULL')}}</h5>
    </div>
    @include('livewire.customer.components.alertbrowser')
    <main class="app-content">
        <section class="padding-x mt-3 d-flex justify-content-center align-items-stretch">
            @if(count($products) == 0)
                <div class="flex-1 mt-10">
                    <h6 class="text-center flex-1 font-weight-normal">Ups. Maaf
                        produk dalam kategori ini masih belum ada. Datang lagi ya?
                        😊</h6>
                </div>
            @endif
            <div class="row">
                @foreach($products as $product)
                    <div class="col-6 col-sm-6 col-md-4">
                        <a href="{{route('detail',['product'=>encrypt($product->id)])}}" class="product-sm mb-3">
                            <div class="img-wrap">
                                @if($product->gambar != null)
                                    <img alt="{{json_decode($product->gambar)[0]}}"
                                         src="{{asset('storage/'.json_decode($product->gambar)[0])}}">
                                @else
                                    <img alt="Tidak ada foto"
                                         src="#">
                                @endif
                            </div>
                            <div class="text-wrap">
                                <p class="title text-truncate">{{$product->nama}}</p>
                                <div class="price">Rp. {{number_format($product->harga,0,',','.')}}</div>
                                <!-- price-wrap.// -->
                            </div>
                        </a>
                    </div>
            @endforeach
            <!-- col.// -->
            </div> <!-- row end -->

        </section> <!-- section body .// -->

    </main>
</div>
