<div>
    <header class="app-header bg-primary">
        <a href="javascript:history.go(-1)" class="btn-header">
            <i data-eva="arrow-back" data-eva-fill="#fff"></i></a>
        <h6 class="title-header"> Konfirmasi Pemesanan </h6>
        <div class="header-right"></div>
    </header> <!-- section-header.// -->
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
            <section class="padding-top">
                <h5 class="title-section">Data Pemesan</h5>
                <div class="form-group px-3">
                    <input type="text" id="pemesan" name="pemesan" class="form-control" placeholder="Nama Pemesan">
                    <input type="hidden" id="cart" name="cart">
                </div>
                <div class="form-group px-3">
                    <input type="text" id="nohppemesan" name="nohppemesan" data-mask="0000-0000-0000"
                           class="form-control"
                           placeholder="Nomor Telepon">
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
                        <li class="list-group-item">
                            <label class="custom-control custom-radio">
                                <input type="radio" value="ovo" name="pay_option" class="custom-control-input">
                                <span class="custom-control-label font-weight-bold">
                                <img height="28px" src="{{asset('images/ovo.svg')}}" alt="OVO"> &nbsp;OVO </span>
                            </label>
                        </li>
                        <li class="list-group-item">
                            <label class="custom-control custom-radio">
                                <input type="radio" value="linkaja" name="pay_option" class="custom-control-input">
                                <span class="custom-control-label font-weight-bold"><img height="28px"
                                                                                         src="{{asset('images/linkaja.svg')}}"
                                                                                         alt="LINKAJA"> &nbsp;LINKAJA </span>
                            </label>
                        </li>
                        <li class="list-group-item">
                            <label class="custom-control custom-radio">
                                <input type="radio" value="qris" name="pay_option" class="custom-control-input">
                                <span class="custom-control-label font-weight-bold"><img height="40px"
                                                                                         src="{{asset('images/qris.png')}}"
                                                                                         alt="QRIS"> &nbsp;Scan QRIS </span>
                            </label>
                        </li>
                    </ul>
                    <div id="addtional-payment" class="form-group px-3">
                        <input type="text" id="nowallet" name="nowallet" data-mask="0000-0000-0000"
                               class="form-control form-control-sm mt-2 mb-1" readonly
                               placeholder="Nomor Telepon">
                        <small class="text-muted text-justify">Pastikan nomor telepon yang anda masukkan sudah terdaftar
                            pada dompet digital yang telah anda pilih</small>
                    </div>
                    <div id="addtional-payment-qr" class="form-group px-3 mt-2" style="display: none">
                        <small class="text-muted text-justify font-weight-bold">Anda akan mendapatkan QR Code untuk
                            discan setelah
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
                    <small class="font-weight-bold my-1 text-warning">Ongkos Kirim <span
                            class="float-right my-1">Rp. 0</span></small>
                    <hr class="m-0">
                    <small class="title my-1 text-black-50" style="font-weight: bolder">Total <span class="float-right"
                                                                                                    id="total-items">Rp. 0</span></small>
                </div>
            </nav>
        </section>
        <button id="proses_pesanan" class="btn btn-block btn-primary fixed-bottom rounded-0 mb-0"><i
                data-eva="credit-card"
                data-eva-fill="#fff"></i>&nbsp;Proses Pesanan
        </button>
    </main>
    @push('script')
        <script src="{{asset('vendor/jquery-mask/jquery.mask.min.js')}}"></script>
        <script>
            const checkoutHelper = {
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
                            address.push(`<small class="text-muted mt-1">${res.rincian_alamat}</small>`);
                            $('#container-selected-address').html(address.join(''));
                            $('#btn-address').text('Ganti')
                        }
                    })
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
                                    total = total + (item.promosi === "0" ? (item.harga * itemsCart[item.id].count) : item.harga_promo * itemsCart[item.id].count)
                                    return `<small class="title my-1">${item.nama} X ${itemsCart[item.id].count} <span class="float-right">Rp. ${$.number((item.harga * itemsCart[item.id].count), 0, ',', '.')}</span></small>
                                           ${item.promosi !== '0' ? ` <small class="title my-1">Promo <span class="float-right">- Rp. ${$.number((item.harga * itemsCart[item.id].count) - (item.harga_promo * itemsCart[item.id].count), 0, ',', '.')}</span></small>` : ''}`
                                })
                                $('#container-item').html(itemsHtml);
                                $('#total-items').text(`Rp. ${$.number(total, 0, ',', '.')}`);
                            }
                        }
                    })
                }
            }
            $(document).ready(function () {
                if (localStorage.getItem('pemesan')) $('#pemesan').val(localStorage.getItem('pemesan'));
                if (localStorage.getItem('nohppemesan')) $('#nohppemesan').val(localStorage.getItem('nohppemesan'));
                if (localStorage.getItem('nowallet')) $('#nowallet').prop('readonly', false).val(localStorage.getItem('nowallet'));
                if (localStorage.getItem('cart')) $('#cart').prop('readonly', false).val(localStorage.getItem('cart'));
                if (localStorage.getItem('catatan')) $('#catatan').prop('readonly', false).val(localStorage.getItem('catatan'));
                if (localStorage.getItem('pay_option')) {
                    $('input[name="pay_option"]').map(function (index, item) {
                        if ($(item).val() === localStorage.getItem('pay_option')) {
                            if ($(item).val() === 'qris') {
                                $('#addtional-payment').hide();
                                $('#addtional-payment-qr').show();
                            } else {
                                $('#nowallet').prop('readonly', false).prop('placeholder', 'Nomor Telepon');
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
            })

            $(document).on('change', 'input[name="pay_option"]', function () {
                checkoutHelper.saveLocalStorage($(this).prop('name'), $(this).val());
                if ($(this).val() !== 'qris') {
                    var $selectedWallet = $(this).parent('label').text().replace(/ +?/g, '');
                    $('#nowallet').prop('readonly', false).prop('placeholder', 'Nomor Telepon ' + $selectedWallet);
                    $('#addtional-payment').show();
                    $('#addtional-payment-qr').hide();
                } else {
                    $('#addtional-payment').hide();
                    $('#addtional-payment-qr').show();
                }
            })
            $('input#pemesan,input#nohppemesan,input#nowallet,textarea#catatan').on('blur', function () {
                checkoutHelper.saveLocalStorage($(this).prop('id'), $(this).val());
            });
            $('#proses_pesanan').on('click', function () {
                $('#form-checkout').submit();
            })
        </script>
    @endpush
</div>