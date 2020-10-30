<div>
    <header class="app-header bg-primary">
        <a href="javascript:history.go(-1)" class="btn-header">
            <i data-eva="arrow-back" data-eva-fill="#fff"></i></a>
        <h6 class="title-header"> Konfirmasi Pembayaran </h6>
        <div class="header-right">
        </div>
    </header> <!-- section-header.// -->
    <main class="app-content">
        <section class="padding-top">
            <h5 class="title-section padding-x">Status Pembayaran</h5>
            @if(count($addresses ?? []) == 0)
                <div class="d-flex p-5 mx-auto justify-content-center align-items-center">
                    <h6 class="text-center">Belum ada alamat yang dipilih, Silahkan tambahkan alamat baru</h6>
                </div>
            @endif
            @foreach($addresses ?? [] as $key=> $address)
                <div class="box-selection mx-3">
                    <label class="custom-control custom-radio pl-0">
                        <input type="radio" name="address" class="custom-control-input" value="{{$address->id}}">
                        <div class="title">Alamat {{$key+1}}</div>
                        <div class="text-muted">
                            <small>{{$address->alamat_lengkap}}</small>
                            <small>{{$address->rincian_alamat}}</small>
                        </div>
                    </label>
                </div>
            @endforeach
            {{--            <button id="btn-choose-address" class="btn rounded-0 mb-0 btn-primary btn-block fixed-bottom" type="button">--}}
            {{--                <i--}}
            {{--                    data-eva-fill="#fff" data-eva="checkmark-outline"></i> Konfirmasi--}}
            {{--            </button>--}}
        </section>
    </main>
</div>
