<div>
    <header class="app-header bg-primary">
        <a href="javascript:window.location='{{route('cart')}}'" class="btn-header">
            <i data-eva="arrow-back" data-eva-fill="#fff"></i></a>
        <h6 class="title-header"> Konfirmasi Pemesanan </h6>
        <div class="header-right"></div>
    </header> <!-- section-header.// -->
    @include('livewire.customer.components.alertbrowser')
    <main class="app-content">
        <form action="{{route('pay')}}" id="form-checkout" method="POST">
            @csrf
            @if(session('status'))
                <div class="alert alert-{{session('status')['type']}} alert-dismissible rounded-0 fade show"
                     role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Informasi</strong><br>
                    <small>{{session('status')['message']}}</small>
                </div>
            @endif
            @if(Auth::user() && Auth::user()->customer->no_hp == '-')
                <div class="alert alert-warning rounded-0 alert-dismissible fade show mb-0" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Informasi</strong><br>
                    <small>Mohon melengkapi nomor <i>handphone</i> pada menu profil. <a href="{{url('profile')}}">Klik disini</a></small>
                </div>
            @endif
            <section class="padding-top">
                <h5 class="title-section">Data Pemesan</h5>
                <div class="form-group px-3">
                    <input type="text" id="pemesan" name="pemesan" class="form-control" placeholder="Nama Pemesan"
                           value="{{Auth::user()?Auth::user()->customer->nama:$name}}" {{Auth::user()?'readonly':''}}>
                    <input type="hidden" id="cart" name="cart">
                </div>
                <div class="form-group px-3">
                    <input type="text" id="nohppemesan" name="nohppemesan" data-mask="0000-0000-00000"
                           class="form-control" value="{{Auth::user()?Auth::user()->customer->no_hp:$nohp}}"
                           placeholder="Nomor Telepon" {{Auth::user()?'readonly':''}}>
                </div>
            </section>
            <hr class="divider">
            <section class="padding-top">
                <h5 class="title-section padding-x">Alamat</h5>
                <nav class="">
                    <div class="pl-3 btn-list d-flex justify-content-between align-items-center">
                        <div class="text-primary">Alamat Pengiriman</div>
                        <a href="{{route('address')}}" class="text-muted text-tiny" id="btn-address">Tambah &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i
                                class="ml-2 icon-control fa fa-chevron-right"></i></a>
                        <input type="hidden" name="alamat">
                        <input type="hidden" name="ongkir">
                    </div>
                    <div id="container-selected-address"
                         class="pl-3 btn-list d-flex justify-content-start flex-column align-items-start">
                        <small class="text-muted">Belum memilih alamat</small>
                    </div>
                </nav>
            </section>
            <hr class="divider">
            <section class="padding-top">
                <h5 class="title-section padding-x">Pembayaran</h5>
                <nav class="">
                    <div class="pl-3 btn-list d-flex justify-content-between align-items-center">
                        <div class="text-primary">Metode Pembayaran</div>
                        <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                           aria-controls="collapseExample" class="text-muted text-tiny">Pilih &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i
                                class="ml-2 icon-control fa fa-chevron-right"></i></a>
                    </div>
                </nav>
                <div class="collapse" id="collapseExample">
                    <ul class="list-group list-group-flush">
                        @foreach($pembayaran ?? [] as $metode)
                            <li class="list-group-item">
                                <label
                                    class="custom-control custom-radio d-flex align-items-center justify-content-start">
                                    <input type="radio" data-id="{{$metode->id}}" data-op="{{$metode->metode}}"
                                           value="{{$metode->metode}}-{{$metode->id}}" name="pay_method"
                                           class="custom-control-input">
                                    <span class="custom-control-label font-weight-bold">
                                <img height="28px" class="mr-4" src="{{asset('storage/'.$metode->icon)}}"
                                     alt="{{$metode->metode}}"></span>
                                    @if($metode->metode !== 'COD')
                                        <div class="row d-inline-block text-left">
                                            <span class="text-left col-6">Atas Nama: </span>
                                            <span class="col-6">{{$metode->holder}}</span>
                                        </div>
                                    @else
                                        <span class="uppercase">Bayar ditempat</span>
                                    @endif
                                </label>
                            </li>
                        @endforeach
                    </ul>
                    <input type="hidden" name="pay_option">
                    <input type="hidden" name="metode_id">
                    <div class="form-group px-3 mt-2">
                        <small class="text-muted text-justify font-weight-bold">Untuk pembayaran melalui bank, rekening
                            akan muncul setelah
                            menekan tombol Proses Pembayaran</small>
                    </div>
                </div>
            </section>
            <hr class="divider">
            <section class="padding-top">
                <h5 class="title-section padding-x">Catatan</h5>
                <div class="form-group px-3">
                    <textarea id="catatan" name="catatan" rows="4" class="form-control"
                              placeholder="Contoh: Gula sedikit saja"></textarea>
                </div>
            </section>
        </form>
        <hr class="divider">
        <section class="padding-top">
            <h5 class="title-section padding-x">Rincian</h5>
            <nav class="nav-list">
                <div class="btn-list">
                    <div id="container-item">

                    </div>
                    <small class="font-weight-bold my-1 text-warning">Ongkos Kirim <span id="total-ongkir"
                                                                                         class="float-right my-1">Rp. 0</span></small>
                    <hr class="m-0">
                    <small class="title my-1 text-black-50" style="font-weight: bolder">Total <span class="float-right"
                                                                                                    id="total-items">Rp. 0</span></small>
                </div>
            </nav>
        </section>
        <button id="proses_pesanan" style="max-width: 35rem;margin:auto;" class="btn btn-block btn-primary fixed-bottom rounded-0 mb-0"><i
                data-eva="credit-card"
                data-eva-fill="#fff"></i>&nbsp;Proses Pesanan
        </button>
    </main>
    @push('script')
        <script type="text/javascript"
                src="https://maps.google.com/maps/api/js?sensor=false&v=3&libraries=geometry"></script>
        <script src="{{asset('vendor/jquery-mask/jquery.mask.min.js')}}"></script>
        <script>
            const checkoutHelper = {
                shippingFee: 0,
                saveLocalStorage(key, value) {
                    localStorage.setItem(key, value);
                },
                retrieveAddress(id) {
                    $.ajax({
                        url: "{{url('address')}}/" + id + "/show",
                        method: "GET",
                        dataType: 'json',
                        success(res) {
                            var address = [];
                            address.push(`<small class="text-muted">${res.alamat_lengkap}</small>`);
                            address.push(`<small class="text-muted mt-1">${res.rincian_alamat !== null ? res.rincian_alamat : ''}</small>`);
                            $('#container-selected-address').html(address.join(''));
                            $('#btn-address').text('Ganti')
                        }
                    })
                },
                retrieveOngkir(callback) {
                    if (localStorage.getItem('store-location')) {
                        const latLongStore = JSON.parse(localStorage.getItem('store-location'));
                        const distance = checkoutHelper.getDistance(latLongStore);
                        $.get('{{route('ongkir')}}').then(function (data) {
                            if (typeof data.harga_ongkir != "undefined" && typeof data.tipe_ongkir != "undefined") {
                                if (data.tipe_ongkir === 'dinamis') {
                                    checkoutHelper.shippingFee = distance * data.harga_ongkir;
                                } else {
                                    checkoutHelper.shippingFee = data.harga_ongkir;
                                }
                                $('input[name="ongkir"]').val(checkoutHelper.shippingFee);
                                checkoutHelper.setOngkir();
                                callback();
                            }
                        })
                    }
                },
                setMethod(id, op) {
                    $('input[name="pay_option"]').val(op);
                    $('input[name="metode_id"]').val(id);
                },
                retrieveItems(items) {
                    const itemsCart = JSON.parse(items);
                    $.ajax({
                        url: "{{url('items')}}",
                        method: "POST",
                        data: {
                            items: Object.keys(itemsCart),
                        },
                        dataType: 'json',
                        success(res) {
                            if (typeof res.data !== "undefined") {
                                var total = 0;
                                const itemsHtml = res.data.map(function (item) {
                                    total = total + (item.promosi === 1 ? (item.harga_promo * itemsCart[item.id].count) : (item.harga * itemsCart[item.id].count));
                                    return `<small class="title my-1">${item.nama} X ${itemsCart[item.id].count} <span class="float-right">Rp. ${$.number((item.harga * itemsCart[item.id].count), 0, ',', '.')}</span></small>
                                           ${item.promosi === 1 ? ` <small class="title my-1">Promo <span class="float-right">- Rp. ${$.number((item.harga * itemsCart[item.id].count) - (item.harga_promo * itemsCart[item.id].count), 0, ',', '.')}</span></small>` : ''}`
                                })
                                checkoutHelper.retrieveOngkir(function () {
                                    total = total + parseFloat(checkoutHelper.shippingFee);
                                    $('#container-item').html(itemsHtml);
                                    $('#total-items').text(`Rp. ${$.number(total, 0, ',', '.')}`);
                                });
                            }
                        }
                    })
                },
                getDistance(lokasi_toko) {
                    const lat = localStorage.getItem('lat');
                    const lng = localStorage.getItem('lng');
                    if (lat !== null && lng !== null) {
                        const userLokasi = new google.maps.LatLng({lat: parseFloat(lat), lng: parseFloat(lng)});
                        const tokoLokasi = new google.maps.LatLng({
                            lat: parseFloat(lokasi_toko.lat),
                            lng: parseFloat(lokasi_toko.long)
                        })
                        const resultsDistance = google.maps.geometry.spherical.computeDistanceBetween(userLokasi, tokoLokasi);
                        const distance = resultsDistance / 1000;
                        if (isNaN(distance.toFixed(1))) {
                            return Snackbar.show({
                                actionTextColor: '#B09685',
                                text: 'Alamat diluar jangkauan / Belum menentukan alamat'
                            })
                        }
                        console.log(distance.toFixed(1) + ' Km')
                        return distance.toFixed(1);
                    }
                    return 0;
                },
                setOngkir() {
                    $('#total-ongkir').text('Rp. ' + $.number(checkoutHelper.shippingFee, 0, ',', '.'));
                },
                validationCheckout() {
                    const payOption = $('input[name="pay_method"]:checked');
                    if ($('input[name="pemesan"]').val() === '' && $('input[name="nohppemesan"]').val() === '') {
                        Snackbar.show({actionTextColor: '#B09685', text: 'Data Pemesan tidak boleh kosong'});
                        return false;
                    }
                    if ($('input[name="alamat"]').val() === '') {
                        Snackbar.show({actionTextColor: '#B09685', text: 'Alamat belum di pilih'});
                        return false;
                    }
                    if (payOption.length === 0) {
                        Snackbar.show({actionTextColor: '#B09685', text: 'Metode Pembayaran belum dipilih'});
                        return false;
                    }
                    return true;
                }
            }
            $(document).ready(function () {
                @if(!$name && !Auth::user())
                if (localStorage.getItem('pemesan')) $('#pemesan').val(localStorage.getItem('pemesan'));
                if (localStorage.getItem('nohppemesan')) $('#nohppemesan').val(localStorage.getItem('nohppemesan'));
                @endif
                if (localStorage.getItem('cart')) $('#cart').prop('readonly', false).val(localStorage.getItem('cart'));
                if (localStorage.getItem('catatan')) $('#catatan').prop('readonly', false).val(localStorage.getItem('catatan'));
                if (localStorage.getItem('pay_method')) {
                    $('input[name="pay_method"]').map(function (index, item) {
                        if ($(item).val() === localStorage.getItem('pay_method')) {
                            if ($(item).val() === 'qris') {
                                $('#addtional-payment').hide();
                                $('#addtional-payment-qr').show();
                            } else {
                                $('#addtional-payment').show();
                                $('#addtional-payment-qr').hide();
                            }
                            return $(item).prop('checked', true);
                        }
                    })
                    $('#collapseExample').addClass('show');
                }
                if (localStorage.getItem('selected_address')) {
                    $('input[name="alamat"]').val(localStorage.getItem('selected_address'))
                    checkoutHelper.retrieveAddress(localStorage.getItem('selected_address'))
                }
                if (localStorage.getItem('cart')) checkoutHelper.retrieveItems(localStorage.getItem('cart'))
                if (localStorage.getItem('pay_option') && localStorage.getItem('metode_id')) checkoutHelper.setMethod(localStorage.getItem('metode_id'), localStorage.getItem('pay_option'))
                if (localStorage.getItem('cart')) checkoutHelper.retrieveItems(localStorage.getItem('cart'))

            })

            $(document).on('change', 'input[name="pay_method"]', function () {
                checkoutHelper.saveLocalStorage($(this).prop('name'), $(this).val());
                checkoutHelper.saveLocalStorage('pay_option', $(this).data('op'));
                checkoutHelper.saveLocalStorage('metode_id', $(this).data('id'));
                checkoutHelper.setMethod($(this).data('id'), $(this).data('op'));
            })
            $('input#pemesan,input#nohppemesan').on('blur', function () {
                var pemesan = $('input#pemesan').val();
                var nohp = $('input#nohppemesan').val();
                if (pemesan !== '' && nohp !== '') {
                    $.ajax({
                        url: '{{url('savepemesan')}}',
                        method: 'POST',
                        data: {
                            pemesan, nohp
                        },
                        success(res) {
                            console.log(res);
                        }
                    })
                }
            })
            $('textarea#catatan').on('blur', function () {
                checkoutHelper.saveLocalStorage($(this).prop('id'), $(this).val());
            });
            $('#proses_pesanan').on('click', function () {
                $(this).prop('disabled', true);
                checkoutHelper.validationCheckout() ? $('#form-checkout').submit() : $(this).prop('disabled', false);
            })
        </script>
    @endpush
</div>
