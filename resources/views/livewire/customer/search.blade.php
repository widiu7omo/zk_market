<div>
    <header class="app-header header-search bg-primary">
        <a href="javascript:window.location.href = '/'" class="btn-header">
            <svg fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <g data-name="Layer 2">
                    <g data-name="arrow-back">
                        <rect width="24" height="24" transform="rotate(90 12 12)" opacity="0"/>
                        <path
                            d="M19 11H7.14l3.63-4.36a1 1 0 1 0-1.54-1.28l-5 6a1.19 1.19 0 0 0-.09.15c0 .05 0 .08-.07.13A1 1 0 0 0 4 12a1 1 0 0 0 .07.36c0 .05 0 .08.07.13a1.19 1.19 0 0 0 .09.15l5 6A1 1 0 0 0 10 19a1 1 0 0 0 .64-.23 1 1 0 0 0 .13-1.41L7.14 13H19a1 1 0 0 0 0-2z"/>
                    </g>
                </g>
            </svg>
        </a>
        <input type="text" autofocus id="input-search" placeholder="Search" class="form-control input-dark border-0"
               wire:model="search">
    </header> <!-- section-header.// -->
    <main class="app-content">

        <section class="padding-x">
            <h6 class="title-sm">Pencarian {{$search}}</h6>

            <ul class="list-search-suggestion">
                @forelse($products as $product)
                    <li>
                        <a href="#" class="text">{{$product->nama}} </a>
                        <a href="#" class="btn-control float-right"> <i class="fa fa-times"></i> </a>
                    </li>
                @empty
                    <li>Produk tidak ditemukan</li>
                @endforelse
            </ul>

            <h6 class="title-sm">Pencarian Kategori</h6>

            @foreach($categories as $category)
                <a href="{{url('list/'.$category->kategori)}}" class="btn btn-light text-left mb-2"> <span
                        class="text">{{$category->kategori}}</span> <i
                        class="icon fa fa-chevron-right"></i> </a>
            @endforeach
        </section>

    </main>
</div>
@push('script')
    <script>
        $(document).ready(function () {
            $('#input-search').on('input', function () {
                var value = $(this).val();
                var currentUri = '{{url("/search?q=")}}';
                var newurl = encodeURI(currentUri + value);
                window.history.pushState({path: newurl}, '', newurl);
            })
        });
    </script>
@endpush
