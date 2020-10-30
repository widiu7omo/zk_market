<div>
    <header class="app-header bg-primary">
        <a href="javascript:history.go(-1)" class="btn-header">
            <i data-eva="arrow-back" data-eva-fill="#fff"></i></a>
        <h6 class="title-header"> Pilih Alamat </h6>
        <div class="header-right">
        </div>
    </header>
    <section class="">
        <div class="w-100 bg-white px-2 py-2" id="pac-card">
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
            <div id="pac-container">
                <input id="pac-input" type="text" class="form-control text-medium"
                       placeholder="Cari Alamat / Tempat">
            </div>
        </div>
        <div id="map" style="width: 100%;height: 800px"></div>
        <div id="infowindow-content">
            <img src="" width="16" height="16" id="place-icon">
            <span id="place-name" class="title"></span><br>
            <span id="place-address"></span><br>
        </div>
    </section>
    @push('script')
        <script src="https://maps.google.com/maps/api/js?key={{$googleApiKey??'NULL'}}&libraries=places&amp;"></script>
        <script>
            var lat = 0;
            var long = 0;

            function showError(error) {
                switch (error.code) {
                    case error.PERMISSION_DENIED:
                        Snackbar.show({text: "User denied the request for Geolocation."});
                        break;
                    case error.POSITION_UNAVAILABLE:
                        Snackbar.show({text: "Location information is unavailable."});
                        break;
                    case error.TIMEOUT:
                        Snackbar.show({text: "The request to get user location timed out."});
                        break;
                    case error.UNKNOWN_ERROR:
                        Snackbar.show({text: "An unknown error occurred."});
                        break;
                }
            }

            let marker;
            let opts = {
                zoom: 4,
                center: {lat: -33, lng: 151},
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
            let myLatlng = {lat: -25.363, lng: 131.044};
            var geocoder = new google.maps.Geocoder;
            var infowindow = new google.maps.InfoWindow;
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    const pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    infowindow.setPosition(pos);
                    var stringPosition = `${pos.lat},${pos.lng}`;
                    geocodeLatLng(geocoder, maps, infowindow, stringPosition);
                    maps.setCenter(pos);
                    maps.setZoom(16);
                }, showError);
            } else {
                console.log("Geolocation is not supported by this browser.");
            }


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
                            infowindow.setContent(`${results[0].formatted_address}<br><a id="btn-pilih" href="{{url('address#alamatModal')}}" class="btn btn-sm btn-primary mt-2 p-1">Pilih</a>`);
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
    @endpush
</div>
