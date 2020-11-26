<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="nama_bisnis" class="tracking-wide uppercase text-sm font-bold text-gray-700">{{ 'Nama Bisnis' }}
        <input required type="text" id="nama_bisnis" name="nama_bisnis" placeholder="Input nama_bisnis"
               value="{{ isset($pengaturan->nama_bisnis) ? $pengaturan->nama_bisnis : ''}}"
               class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('%1$s') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('%1$s') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

        {!! $errors->first('nama_bisnis', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="no_wa" class="tracking-wide uppercase text-sm font-bold text-gray-700">{{ 'No Wa' }}
        <input required type="text" id="no_wa" name="no_wa" placeholder="Input no_wa" data-mask="0000-0000-0000"
               value="{{ isset($pengaturan->no_wa) ? $pengaturan->no_wa : ''}}"
               class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('%1$s') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('%1$s') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

        {!! $errors->first('no_wa', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<fieldset class="p-2 pt-0 w-full md:w-6/12">
    <legend class="tracking-wide uppercase text-sm font-bold text-gray-700">{{ 'Tipe Ongkir' }}</legend>
    <div class="my-4 flex flex-row flex-wrap w-full">
        <div class="flex items-center m-2 p-3 rounded-lg bg-gray-200">
            <input id="dinamis" name="tipe_ongkir" type="radio"
                   value="dinamis"
                   class="form-radio h-4 w-4 text-brown transition duration-200 ease-in-out" {{ isset($pengaturan->tipe_ongkir) && $pengaturan->tipe_ongkir === 'dinamis'?'checked':''}}>
            <label for="dinamis" class="ml-3">
                <span class="block text-sm leading-5 font-bold text-gray-500 uppercase">Dinamis</span>
            </label>
        </div>
        <div class="flex items-center m-2 p-3 rounded-lg bg-gray-200">
            <input id="statis" name="tipe_ongkir" type="radio"
                   value="statis"
                   class="form-radio h-4 w-4 text-brown transition duration-200 ease-in-out" {{ isset($pesanan->status_bayar_id) && $pesanan->status_bayar_id === 'statis'?'checked':''}}>
            <label for="statis" class="ml-3">
                    <span
                        class="block text-sm leading-5 font-bold text-gray-500 uppercase">Statis</span>
            </label>
        </div>
        <small class="text-gray-500"><i>tipe ongkir <strong class="uppercase">dinamis</strong> berdasarkan jarak KM dari
                toko ke lokasi pengantaran</i></small>
        <small class="text-gray-500"><i>tipe ongkir <strong class="uppercase">statis</strong> sesuai harga yang tertera
                pada harga ongkir</i></small>
    </div>
    {!! $errors->first('tipe_ongkir', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
</fieldset>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="alamat" class="tracking-wide uppercase text-sm font-bold text-gray-700">{{ 'Alamat' }}
        <input required type="text" id="alamat" name="alamat" placeholder="Input alamat"
               value="{{ isset($pengaturan->alamat) ? $pengaturan->alamat : ''}}"
               class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('%1$s') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('%1$s') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

        {!! $errors->first('alamat', '<small class="normal-case font-normal text-red-600 leading-5">:message</small>') !!}
    </label>
</div>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="harga_ongkir" class="tracking-wide uppercase text-sm font-bold text-gray-700">{{ 'Harga Ongkir' }}
        <input required type="text" id="harga_ongkir" name="harga_ongkir" placeholder="Input google_api"
               value="{{ isset($pengaturan->harga_ongkir) ? $pengaturan->harga_ongkir : 0}}"
               class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('harga_ongkir') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('harga_ongkir') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

    </label>
</div>
<div class="p-2 pt-0 w-full md:w-6/12">
    <label for="google_api" class="tracking-wide uppercase text-sm font-bold text-gray-700">{{ 'Google Api' }}
        <input required type="text" id="google_api" name="google_api" placeholder="Input google_api"
               value="{{ isset($pengaturan->google_api) ? $pengaturan->google_api : ''}}"
               class="px-3 py-3 mt-2 placeholder-gray-400 {{ $errors->has('%1$s') ? 'text-red-700' : 'text-gray-700'}} relative bg-white rounded text-sm shadow focus:outline-none border-2 {{ $errors->has('%1$s') ? 'border-red-600' : 'border-white'}} focus:border-transparent w-full transition duration-200 ease-in-out"/>

    </label>
</div>
<div class="p-2 pt-0 w-full md:w-full">
    <label for="lat" class="tracking-wide uppercase text-sm font-bold text-gray-700">{{ 'Lokasi Bisnis' }}<br>
        <small class="text-gray-500 font-normal text-xs normal-case"><i>Cara 1 klik dimanapun dalam peta, kemudian tekan tombol pilih</i></small><br>
        <small class="text-gray-500 font-normal text-xs normal-case"><i>Cara 2 cari alamat pojok kanan atas, ketikkan nama tempat, kemudian tekan tombol
                pilih</i></small><br>
        <small class="text-gray-500 font-normal text-xs normal-case"><i>Cara 3 klik marker, kemudian tekan tombol pilih</i></small>
        <input type="hidden" id="lat" name="lat"
               value="{{ isset($pengaturan->lat) ? $pengaturan->lat : ''}}"/>
        <input type="hidden" id="long" name="long"
               value="{{ isset($pengaturan->long) ? $pengaturan->long : ''}}"/>

    </label>
</div>
<div style="height: 400px;" class="w-full p-2 mb-4">
    <div class="w-100 px-2 py-2" id="pac-card">
        <div>
            <div id="type-selector" class="pac-controls" style="display: none">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="radio"
                           name="type"
                           id="changetype-all"
                           checked="checked">
                    <label class="custom-control-label"
                           for="changetype-all">Semua</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="radio"
                           name="type"
                           id="changetype-establishment">
                    <label class="custom-control-label"
                           for="changetype-establishment">Gedung/Tempat</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="radio"
                           name="type"
                           id="changetype-address">
                    <label class="custom-control-label"
                           for="changetype-address">Alamat</label>
                </div>
            </div>
        </div>
        <div id="pac-container" style="display: none">
            <input id="pac-input" type="text" class="p-3 font-lg rounded bg-gray-200 shadow-outline"
                   style="width: 200px"
                   placeholder="Cari Alamat / Tempat">
        </div>
    </div>
    <div id="map" style="border-radius: 14px;height: 400px;width: 100%"></div>
</div>

<div class="p-2 pt-0 w-full">
    <input
        class="uppercase tracking-wide text-sm py-3 px-3 bg-brown-lighter hover:bg-brown-dark shadow-lg rounded-lg text-gray-100 font-bold"
        type="submit" value="{{ 'Simpan' }}">
</div>
@push('style')
    <link href="{{asset('vendor/snackbar/snackbar.min.css')}}" rel="stylesheet" type="text/css"/>
@endpush
@push('script')
    <script src="{{asset('vendor/snackbar/snackbar.min.js')}}" type="text/javascript"></script>
    <script
        src="https://maps.google.com/maps/api/js?key={{$pengaturan->google_api??'NULL'}}&libraries=places&amp;"></script>
    <script>
        var lat = 0;
        var long = 0;

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    Snackbar.show({actionTextColor: '#B09685', text: "User denied the request for Geolocation."});
                    break;
                case error.POSITION_UNAVAILABLE:
                    Snackbar.show({actionTextColor: '#B09685', text: "Location information is unavailable."});
                    break;
                case error.TIMEOUT:
                    Snackbar.show({actionTextColor: '#B09685', text: "The request to get user location timed out."});
                    break;
                case error.UNKNOWN_ERROR:
                    Snackbar.show({actionTextColor: '#B09685', text: "An unknown error occurred."});
                    break;
            }
        }

        let marker;
        let opts = {
            zoom: 17,
            center: {lat: -{!! $pengaturan->lat ?? 0 !!}, lng: {!! $pengaturan->long ?? 0 !!}},
            disableDefaultUI: true
        }
        let maps = new google.maps.Map(document.getElementById('map'), opts);
        var myloc = new google.maps.Marker({
            clickable: false,
            icon: new google.maps.MarkerImage('//maps.gstatic.com/mapfiles/mobile/mobileimgs2.png',
                new google.maps.Size(22, 22),
                new google.maps.Point(0, 18),
                new google.maps.Point(11, 11)),
            shadow: null,
            zIndex: 999,
            map: maps
        });
        let myLatlng = {lat: -{!! $pengaturan->lat ?? 0 !!}, lng: {!! $pengaturan->long ?? 0 !!}};
        var geocoder = new google.maps.Geocoder;
        var infowindow = new google.maps.InfoWindow;
        $('#pac-container').show();
        var stringPosition = `-{!! $pengaturan->lat ?? 0 !!},{!! $pengaturan->long ?? 0 !!}`;
        geocodeLatLng(geocoder, maps, infowindow, stringPosition);
        maps.setZoom(17);


        //=======================SAAT PETA DI KLIK======================================================
        maps.addListener('click', function (mapsMouseEvent) {
            let latLng = mapsMouseEvent.latLng.toString();
            saveCoordinateToLocStorage(latLng);
            let filterLatLng = latLng.slice(1, latLng.length - 1);
            geocodeLatLng(geocoder, maps, infowindow, filterLatLng);
        });
        var card = document.getElementById('pac-card');
        var input = document.getElementById('pac-input');
        var types = document.getElementById('type-selector');

        maps.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

        var autocomplete = new google.maps.places.Autocomplete(input);

        autocomplete.bindTo('bounds', maps);

        autocomplete.setFields(
            ['address_components', 'geometry', 'icon', 'name']);

        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);
        marker = new google.maps.Marker({
            map: maps,
            anchorPoint: new google.maps.Point(0, -29)
        });
        //=======================SAAT MENCARI LOKASI DAN MEMILIH LOKASI=========================================
        autocomplete.addListener('place_changed', function (e) {
            infowindow.close();
            marker.setVisible(false);
            var place = autocomplete.getPlace();
            if (!place.geometry) {

                window.alert("No details available for input: '" + place.name + "'");
                return;
            }

            if (place.geometry.viewport) {
                maps.fitBounds(place.geometry.viewport);
            } else {
                maps.setCenter(place.geometry.location);
                maps.setZoom(17);  // Why 17? Because it looks good.
            }
            saveCoordinateToLocStorage(place.geometry.location.toString());
            geocodeLatLng(geocoder, maps, infowindow, `${place.geometry.location.lat()},${place.geometry.location.lng()}`);
            marker.setPosition(place.geometry.location);
            marker.setVisible(true);

            var address = '';
            if (place.address_components) {
                address = [
                    (place.address_components[0] && place.address_components[0].short_name || ''),
                    (place.address_components[1] && place.address_components[1].short_name || ''),
                    (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
            }
            infowindowContent.children['place-icon'].src = place.icon;
            infowindowContent.children['place-name'].textContent = place.name;
            infowindowContent.children['place-address'].textContent = address;
            localStorage.setItem('alamat', JSON.stringify(place));
            infowindow.open(map, marker);
        });

        function setupClickListener(id, types) {
            var radioButton = document.getElementById(id);
            radioButton.addEventListener('click', function () {
                autocomplete.setTypes(types);
            });
        }

        setupClickListener('changetype-all', []);
        setupClickListener('changetype-address', ['address']);
        setupClickListener('changetype-establishment', ['establishment']);

        function geocodeLatLng(geocoder, map, infowindow, input) {
            saveCoordinateToLocStorage(input);
            var latlngStr = input.split(',', 2);
            var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};
            geocoder.geocode({'location': latlng}, function (results, status) {
                if (status === 'OK') {
                    if (results[0]) {
                        map.panTo(latlng);
                        smoothZoom(map, 17, map.getZoom());
                        if (marker && marker.setMap) {
                            console.log(marker.setMap);
                            marker.setMap(null);
                        }
                        marker = new google.maps.Marker({
                            position: latlng,
                            map: map
                        });
                        infowindow.setContent(`<p class="mb-4">${results[0].formatted_address}</p><a id="btn-pilih" href="javascript:saveLatLng()" class="px-2 py-1 shadow font-bold uppercase text-white bg-brown-lighter rounded fixed bottom-0 relative">Pilih</a>`);
                        localStorage.setItem('alamat', JSON.stringify(results[0]));
                        infowindow.open(map, marker);
                    } else {
                        window.alert('No results found');
                    }
                } else {
                    window.alert('Geocoder failed due to: ' + status);
                }
            });
        }

        function saveLatLng() {
            $('input#lat').val(localStorage.getItem('lat'));
            $('input#long').val(localStorage.getItem('lng'));
            Snackbar.show({text: 'Berhasil mengatur lokasi peta bisnis', actionTextColor: '#B09685'})
        }

        function saveCoordinateToLocStorage(coordinates) {
            let filterLatLng = coordinates.slice(1, coordinates.length - 1);
            let splitLatLng = filterLatLng.split(',');
            console.log(splitLatLng);
            let lat = parseFloat(splitLatLng[0]);
            let lng = parseFloat(splitLatLng[1]);
            localStorage.setItem('lat', lat);
            localStorage.setItem('lng', lng);
        }


        function smoothZoom(map, max, cnt) {
            if (cnt >= max) {
                return;
            } else {
                z = google.maps.event.addListener(map, 'zoom_changed', function (event) {
                    google.maps.event.removeListener(z);
                    smoothZoom(map, max, cnt + 1);
                });
                setTimeout(function () {
                    map.setZoom(cnt)
                }, 80);
            }
        }
    </script>
    <script src="{{asset('vendor/autonumeric/autoNumeric.min.js')}}"></script>
    <script>
        new AutoNumeric('#harga_ongkir', {
            currencySymbol: 'Rp. ',
            digitGroupSeparator: '.',
            decimalCharacter: ',',
            allowDecimalPadding: false,
        });
    </script>
@endpush
