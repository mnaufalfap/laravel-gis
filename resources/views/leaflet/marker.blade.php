@extends('layouts.dashboard-volt')

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />

    <style>
        #map {
            height: 800px;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Mapping Locations</div>
                    <div class="card-body">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('javascript')
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script>
        var osm = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        });

        var Stadia_Dark = L.tileLayer(
            'https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png', {
                maxZoom: 20,
                attribution: '&copy; <a href="https://stadiamaps.com/">Stadia Maps</a>, &copy; <a href="https://openmaptiles.org/">OpenMapTiles</a> &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'
            });

        // var Esri_WorldStreetMap = L.tileLayer(
        //     'https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', {
        //         attribution: 'Tiles &copy; Esri &mdash; Source: Esri, DeLorme, NAVTEQ, USGS, Intermap, iPC, NRCAN, Esri Japan, METI, Esri China (Hong Kong), Esri (Thailand), TomTom, 2012'
        //     });

        const ringan = L.layerGroup();
        const sedang = L.layerGroup();
        const parah = L.layerGroup();

        var map = L.map('map', {
            center: [-5.372680, 105.260610],
            zoom: 14,
            layers: [osm, ringan, sedang, parah]
        })

        var iconMarker = L.icon({
            iconUrl:'{{ asset('iconMarkers/marker.png') }}',
            iconSize:[50,50],
        })

        var iconMarker2 = L.icon({
            iconUrl:'{{ asset('iconMarkers/marker-start.png') }}',
            iconSize:[50,50],
        })

        var iconMarker3 = L.icon({
            iconUrl:'{{ asset('iconMarkers/marker-finish.png') }}',
            iconSize:[50,50],
        })
        
        @foreach($locations as $location)
            var marker = L.marker([{{ $location->coordinates }}], {
                icon: iconMarker,
                draggable: false
            })
            .bindPopup('<img src="{{ asset('images/' . $location->foto_lokasi) }}" width="80px">' +
                '<b>&ensp;{{ $location->nama_lokasi }}</b><br><br>' +
                'Alamat : {{ $location->alamat_lokasi }}<br>' +
                'Tingkat Kerusakan : <b>{{ $location->tingkat_kerusakan }}</b>')
            .addTo(
                @if ($location->tingkat_kerusakan == 'Ringan')
                    ringan
                @elseif ($location->tingkat_kerusakan == 'Sedang')
                    sedang
                @else
                    parah
                @endif
            );
        @endforeach

        const baseLayers = {
            'Openstreetmap': osm,
            'StadiaDark': Stadia_Dark,
            //'Esri': Esri_WorldStreetMap
        }

        const overLayers = {
            'Rusak Ringan': ringan,
            'Rusak Sedang': sedang,
            'Rusak Parah': parah
        }

        const layerControl = L.control.layers(baseLayers, overLayers).addTo(map)

       
        // var marker = L.marker([-5.372680, 105.260610], {
        //     icon: iconMarker2,
        //     draggable: true
        // }).addTo(map);

        // var marker2 = L.marker([-5.372680, 105.270610], {
        //     icon: iconMarker3,
        //     draggable: true
        // }).addTo(map);

        //get coordinates
        // marker.on('dragend',function(){
        //     var coordinate = marker.getLatLng();
        //     marker.setLatLng(coordinate,{
        //         draggable:true
        //     })
        // })

        // marker2.on('dragend',function(){
        //     var coordinate2 = marker2.getLatLng();
        //     marker2.setLatLng(coordinate2,{
        //         draggable:true
        //     })
        // })

        // let latLng1 = L.latLng(coordinate.lat, coordinate.lng)
        // let latLng2 = L.latLng(coordinate2.lat, coordinate2.lng)

        //Nuju -> SDI
        // let latLng1 = L.latLng(-5.3764421991227085, 105.24848127547655)
        // let latLng2 = L.latLng(-5.375913411046684, 105.24027718614742)

        //alternatif jln purnawirawan (untuk perhitungan djiktra 1)
        let latLng1 = L.latLng(-5.378739, 105.245421)
        let latLng2 = L.latLng(-5.375913411046684, 105.24027718614742)

        //untung suropati (untuk djikstra 2)
        // let latLng3 = L.latLng(-5.370612374835074,105.25503158569337)
        // let latLng4 = L.latLng(-5.377192289645698,105.27245521545412)

        //custom waypoint untuk Djikstra rute 1
        let wp1 = new L.Routing.Waypoint(latLng1);
        let wp2 = new L.Routing.Waypoint(latLng2);

        //custom waypoint untuk Djikstra rute 2
        // let wp3 = new L.Routing.Waypoint(latLng3);
        // let wp4 = new L.Routing.Waypoint(latLng4);

        //Routing control untuk djikstra 1
        var control = L.Routing.control({
            waypoints: [latLng1,latLng2],
            routeWhileDragging: true,
            geocoder: L.Control.Geocoder.nominatim(),
            showAlternatives: true,
            altLineOptions: {
                styles: [
                    {color: 'black', opacity: 0.15, weight: 9},
                    {color: 'white', opacity: 0.8, weight: 6},
                    {color: 'blue', opacity: 0.5, weight: 2}
                ]
            }
        });
        control.addTo(map);

        //Routing control untuk djikstra 2
        // var control2 = L.Routing.control({
        //     waypoints: [latLng3,latLng4],
        //     routeWhileDragging: true,
        //     geocoder: L.Control.Geocoder.nominatim(),
        //     showAlternatives: true,
        //     altLineOptions: {
        //         styles: [
        //             {color: 'black', opacity: 0.15, weight: 9},
        //             {color: 'white', opacity: 0.8, weight: 6},
        //             {color: 'blue', opacity: 0.5, weight: 2}
        //         ]
        //     }
        // });
        // control2.addTo(map);

        //Perhitungan djikstra 1 (sementara blm digunakan)
        // let routeUs = L.Routing.osrmv1();
        // routeUs.route([wp1,wp2],(err,routes)=>{
        //     if(!err){
        //         let best = 1000000000000000;
        //         let longroute = 0;
        //         let bestRoute = 0;
        //         for(i in routes) {
        //             if(routes[i].summary.totalDistance < best){
        //                 bestRoute = i;
        //                 best = routes[i].summary.totalDistance;
        //             }
        //         }
        //         console.log('best route', routes[bestRoute])
        //         L.Routing.line(routes[bestRoute],{
        //             styles : [
        //                 {color: 'grey', weight: 9}
        //             ]
        //         }).addTo(map)
        //     }
        // })

        //Perhitungan djikstra 2 (sementara blm digunakan)
        // let routeUs2 = L.Routing.osrmv1();
        // routeUs2.route([wp3,wp4],(err,routes)=>{
        //     if(!err){
        //         let best = 1000000000000000;
        //         let longroute = 0;
        //         let bestRoute = 0;
        //         for(i in routes) {
        //             if(routes[i].summary.totalDistance < best){
        //                 bestRoute = i;
        //                 best = routes[i].summary.totalDistance;
        //             }
        //         }
        //         console.log('best route', routes[bestRoute])
        //         L.Routing.line(routes[bestRoute],{
        //             styles : [
        //                 {color: 'grey', weight: 9}
        //             ]
        //         }).addTo(map)
        //     }
        // })
    </script>
@endpush
