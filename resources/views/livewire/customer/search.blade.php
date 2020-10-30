<div>
    <header class="app-header header-search bg-primary">
        <a href="javascript:history.go(-1)" class="btn-header"><i data-eva="arrow-back" data-eva-fill="#fff"></i></a>
        <input type="text" autofocus placeholder="Search" class="form-control input-dark border-0" wire:model="search">
    </header> <!-- section-header.// -->
    <main class="app-content">

        <section class="padding-x">
            <h6 class="title-sm">Pencarian Sebelumnya</h6>

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
            {{--$('#input-pencarian').on('input', function () {--}}
            {{--    var query = $(this).val();--}}
            {{--    var newurl = encodeURI('<?php echo site_url("pencarian?query=") ?>' + query);--}}
            {{--    window.history.pushState({path: newurl}, '', newurl);--}}
            {{--    $.ajax({--}}
            {{--        type: "POST",--}}
            {{--        dataType: 'json',--}}
            {{--        url: "<?php echo site_url('pencarian/temukan') ?>",--}}
            {{--        data: {--}}
            {{--            query--}}
            {{--        },--}}
            {{--        success: function (res) {--}}
            {{--            if (res.data.length !== 0) {--}}
            {{--                var resultHtml = res.data.map(function (result) {--}}
            {{--                    return `<a href="<?php echo site_url('beranda/detail_produk/') ?>${result.slug_p}" class="text-dark"><div class="d-flex align-items-center border-bottom p-3"><img height="48px" width="48px" src="<?php echo base_url('file/') ?>${result.gambar}" class="img-fluid rounded shadow-sm mr-3"><span class="font-weight-bold">${result.nama_produk}<p class="small text-muted m-0">${result.deskripsi}</p></span></div></a>`;--}}
            {{--                })--}}
            {{--                $('#results').html(resultHtml).prop('style', '');--}}
            {{--            } else {--}}
            {{--                $('#results').html('<h6 style="text-align:center;">Tidak ditemukan untuk pencarian ' + query).prop('style', "height: 100vh;display: flex;align-items: center;justify-content: center;");--}}
            {{--            }--}}
            {{--        }--}}
            {{--    });--}}
            {{--})--}}
        });
    </script>
@endpush
