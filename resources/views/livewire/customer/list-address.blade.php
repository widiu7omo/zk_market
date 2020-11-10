<div>
    <header class="app-header bg-primary">
        <a href="javascript:history.go(-1)" class="btn-header">
            <i data-eva="arrow-back" data-eva-fill="#fff"></i></a>
        <h6 class="title-header"> Alamat </h6>
        <div class="header-right"><a href="#alamatModal" class="btn btn-outline-light btn-sm"
                                     data-toggle="modal">Tambah</a></div>
    </header> <!-- section-header.// -->
    <main class="app-content">
        <section class="padding-top">
            <h5 class="title-section padding-x">Daftar Alamat</h5>
            @if(count($addresses) == 0)
                <div class="d-flex p-5 mx-auto justify-content-center align-items-center">
                    <h6 class="text-center">Belum ada data alamat, Silahkan tambahkan alamat baru</h6>
                </div>
            @endif
            @foreach($addresses ?? [] as $key=> $address)
                <div class="box-selection mx-4">
                    <label class="custom-control custom-radio pl-0 pb-4">
                        <input type="radio" name="address" class="custom-control-input" value="{{$address->id}}">
                        <span class="title">Alamat {{$key+1}}</span><br>
                        <span class="text-muted">
                            <small>{{$address->alamat_lengkap}}</small>
                            <small>{{$address->rincian_alamat}}</small>
                        </span><br>
                        <form action="{{url('address/'.$address->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-outline-danger float-right">Delete</button>
                        </form>
                    </label>

                </div>
            @endforeach
        </section>
    </main>
    <div class="modal fade" id="alamatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{route('store_address')}}">
                @csrf
                <div class="modal-content vh-100">
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Pilih Lokasi Alamat Pengiriman</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="col-md-12 form-group">
                                <label class="form-label">Pin Peta</label>
                                <div class="input-group">
                                    <input placeholder="Pin Peta" type="text" name="location" class="form-control">
                                    <input type="hidden" name="lat">
                                    <input type="hidden" name="long">
                                    <input type="hidden" name="pemesan">
                                    <input type="hidden" name="nohppemesan">
                                    <input type="hidden" name="from" value="list-address">
                                    <input type="hidden" name="customer_id"
                                           value="{{session('customer_id')?session('customer_id'):''}}">
                                    <div class="input-group-append">
                                        <a href="{{route('pick_address',['source'=>'list-address'])}}"
                                           id="button-addon2" type="button"
                                           class="btn btn-outline-secondary"><i data-eva="pin"
                                                                                data-eva-fill="#b79780"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 form-group"><label class="form-label">Alamat Lengkap</label>
                                <textarea rows="5"
                                          placeholder="Alamat Lengkap contoh. Nomor Rumah, Nama jalan, RT/RW"
                                          type="text"
                                          class="form-control text-helper" name="alamat_lengkap"></textarea></div>
                            <div class="col-md-12 form-group"><label class="form-label">Keterangan Alamat</label>
                                <textarea rows="5"
                                          placeholder="Tambahkan Keterangan Alamat contoh. Disamping toko butik asmara, didepan Masjid Al-Amin"
                                          type="text"
                                          name="rincian_alamat"
                                          class="form-control text-helper"></textarea></div>
                        </div>
                    </div>
                    <div class="modal-footer p-0 border-0">
                        <div class="col-6 m-0 p-0">
                            <button type="button" class="btn border-top btn-lg btn-block rounded-0 mb-0 text-medium"
                                    data-dismiss="modal">Tutup
                            </button>
                        </div>
                        <div class="col-6 m-0 p-0">
                            <button type="submit" class="btn btn-primary btn-lg btn-block rounded-0 mb-0 text-medium">
                                Simpan
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@push('script')
    <script>
        $(document).ready(function () {
            $('#btn-choose-address').on('click', function () {
                var selectedAddress = $('input[name="address"]:checked').val();
                if (!selectedAddress) {
                    return Snackbar.show({actionTextColor: '#B09685', text: 'Pilih alamat terlebih dahulu'})
                }
                localStorage.setItem('selected_address', selectedAddress);
                document.location.href = "{{route('checkout')}}";
            })
            if (window.location.href.indexOf('#alamatModal') !== -1) {
                var modalAlamat = $('#alamatModal');
                var place = localStorage.getItem('alamat');
                if (place !== null) {
                    var decodedPlace = JSON.parse(place);
                    modalAlamat.find('input[name="location"]').val(typeof decodedPlace.name === "undefined" ? 'Alamat terpilih' : decodedPlace.name);
                    modalAlamat.find('input[name="lat"]').val(localStorage.getItem('lat'));
                    modalAlamat.find('input[name="long"]').val(localStorage.getItem('lng'));
                    modalAlamat.find('input[name="pemesan"]').val(localStorage.getItem('pemesan'));
                    modalAlamat.find('input[name="nohppemesan"]').val(localStorage.getItem('nohppemesan'));
                    var joinAlamat = decodedPlace.address_components.map(function (item) {
                        return item.long_name;
                    })
                    modalAlamat.find('textarea[name="alamat_lengkap"]').text((typeof decodedPlace.name === "undefined" ? '' : decodedPlace.name) + ' ' + joinAlamat.join(', '));
                }
                modalAlamat.modal('show');
            }
        })
    </script>
@endpush
