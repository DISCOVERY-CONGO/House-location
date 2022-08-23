@extends('dealers.layout.dealer')

@section('title', "Administration des appartements")

@section('content')
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between g-3">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Creation des appartements</h3>
                </div>
                <div class="nk-block-head-content">
                    <a href="{{ route('commissioner.houses.index') }}"
                       class="btn btn-outline-light btn-sm bg-white d-none d-sm-inline-flex">
                        <em class="icon ni ni-arrow-left"></em>
                        <span>Back</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="nk-block">
            <div class="card">
                <div class="card-aside-wrap">
                    <div class="card-inner card-inner-lg">
                        <div class="row mb-2">
                            <div class="img-fluid">
                                <div id="maid" style="height: 250px; width: 920px;border-radius: 5px"></div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-7">
                                @include('backend.components.errors')
                                @include('dealers.domain.houses._form')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    @parent
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"/>
@endsection

@section('scripts')
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        let mapCenter = [
            {{ request('latitude', config('leaflet.map_center_latitude')) }},
            {{ request('longitude', config('leaflet.map_center_longitude')) }}
        ];
        let map = L.map('maid').setView(mapCenter, {{ config('leaflet.zoom_level') }});
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        let marker = L.marker(mapCenter).addTo(map);

        function updateMarker(lat, lng) {
            marker
                .setLatLng([lat, lng])
                .bindPopup("Your location :  " + marker.getLatLng().toString())
                .openPopup();
            return false;
        }

        map.on('click', function (e) {
            let latitude = e.latlng.lat.toString().substring(0, 15);
            let longitude = e.latlng.lng.toString().substring(0, 15);
            $('#latitude').val(latitude);
            $('#longitude').val(longitude);
            updateMarker(latitude, longitude);
        });
        let updateMarkerByInputs = () => {
            return updateMarker($('#latitude').val(), $('#longitude').val());
        }
        $('#latitude').on('input', updateMarkerByInputs);
        $('#longitude').on('input', updateMarkerByInputs);
    </script>
@endsection