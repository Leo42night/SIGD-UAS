@extends('layouts.admin-kit')

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <style>
        #mapBox {
            height: 600px;
        }
    </style>
@endsection

@section('content')
    <h1 class="h3 mt-0">Mencari <strong>SPBU</strong></h1>
    <div class="row">
        <div class="col-12 d-flex">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h1 class="card-title"></h1>
                    <h6 class="card-subtitle text-muted">
                        Fitur Sistem Informasi Geografi
                    </h6>
                    <p class="card-text">Pilih Berdasarkan menu di bawah ini</p>
                    <button class="btn btn-primary" id="pr1">SPBU 1</button>
                    <button class="btn btn-primary" id="pr2">SPBU 2</button>
                    <button class="btn btn-primary" id="pr3">SPBU 3</button>
                    <button class="btn btn-warning ms-4" id="reset">Reset</button>
                </div>
            </div>
        </div>
    </div>
    <div id="mapBox"></div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
    <script type="text/javascript">
        const map = L.map("mapBox").setView(
            [-0.05545174198124447, 109.34945449188419],
            12
        );
        const tiles = L.tileLayer(
            "https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
            }
        ).addTo(map);

        var manusia = L.icon({
            iconUrl: 'img/human.png',
            iconSize: [50, 50],
        });

        var gas = L.icon({
            iconUrl: 'gas.png',
            iconSize: [50, 50],
        });

        var anda = [-0.05545174198124447, 109.34945449188419];
        var gas1 = [-0.05376903078249141, 109.3630338704059];
        var gas2 = [-0.07314920036638735, 109.37197961552062];
        var gas3 = [-0.033066287197507184, 109.33378495951881];

        var lokasiAnda = L.marker(anda, {
                icon: manusia,
                iconAnchor: [50, 25],
                draggable: true,
            })
            .bindPopup("Lokasi Anda")
            .addTo(map);

        var pertamina1 = L.marker(gas1, {
                icon: gas,
                iconAnchor: [50, 25],
            })
            .bindPopup("SPBU Pertamina 1")
            .addTo(map);

        var pertamina2 = L.marker(gas2, {
                icon: gas,
                iconAnchor: [50, 25],
            })
            .bindPopup("SPBU Pertamina 2")
            .addTo(map);

        var pertamina3 = L.marker(gas3, {
                icon: gas,
                iconAnchor: [50, 25],
            })
            .bindPopup("SPBU Pertamina 3")
            .addTo(map);

        function carigas1() {
            console.log(lokasiAnda);
            var route = L.Routing.control({
                waypoints: [L.latLng(lokasiAnda._latlng["lat"], lokasiAnda._latlng["lng"]), L.latLng(gas1[0], gas1[
                    1])],
            }).addTo(map);
        }

        function carigas2() {
            var route = L.Routing.control({
                waypoints: [
                    L.latLng(lokasiAnda._latlng["lat"], lokasiAnda._latlng["lng"]),
                    L.latLng(gas2[0], gas2[1]),
                ],
            }).addTo(map);
        }

        function carigas3() {
            var route = L.Routing.control({
                waypoints: [
                    L.latLng(lokasiAnda._latlng["lat"], lokasiAnda._latlng["lng"]),
                    L.latLng(gas3[0], gas3[1]),
                ],
            }).addTo(map);
        }

        function reset() {
            window.location.reload()
        }

        document.getElementById("pr1").addEventListener("click", carigas1);
        document.getElementById("pr2").addEventListener("click", carigas2);
        document.getElementById("pr3").addEventListener("click", carigas3);
        document.getElementById("reset").addEventListener("click", reset);
    </script>
@endpush
