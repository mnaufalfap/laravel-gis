<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Web Gis Application</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Tinos:ital,wght@0,400;0,700;1,400;1,700&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&amp;display=swap" rel="stylesheet" />
        {{-- Maps --}}
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
        <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
        <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />

        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <style>
            #map {
                width: 100%;
                height: 80vh;
            }
        </style>
    </head>
    <body>
        <!-- Background Video-->
        <video class="bg-video" playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop"><source src="assets/mp4/bg.mp4" type="video/mp4" /></video>
        <!-- Masthead-->
        <div class="masthead">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col">
                            <div>
                                <h1 class="fst-italic" style="color: white">
                                    Web Gis Application
                                </h1>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div id="map"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <!-- Social Icons-->
        <!-- For more icon options, visit https://fontawesome.com/icons?d=gallery&p=2&s=brands-->
        <div class="social-icons">
            <div class="d-flex flex-row flex-lg-column justify-content-center align-items-center h-100 mt-3 mt-lg-0">
                @if (Route::has('login'))
                
                    @auth
                        <a class="btn btn-dark m-3" href="{{ url('/home') }}"><i class="fa-solid fa-house-user"></i></a>
                    @else
                        <a class="btn btn-dark m-3" href="{{ route('login') }}" title="Login Admin"><i class="fa-solid fa-right-to-bracket"></i></a>
                        @if (Route::has('register'))
                            <a class="btn btn-dark m-3" href="{{ route('register') }}" title="Register Admin"><i class="fa-solid fa-user-plus"></i></a>
                        @endif
                    @endauth

            @endif
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
        <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
        <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
        {{-- Code --}}
        <script>
            var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            });

            var Stadia_Dark = L.tileLayer(
                'https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png', {
                    maxZoom: 20,
                    attribution: '&copy; <a href="https://stadiamaps.com/">Stadia Maps</a>, &copy; <a href="https://openmaptiles.org/">OpenMapTiles</a> &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'
                });

            var Esri_WorldStreetMap = L.tileLayer(
                'https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', {
                    attribution: 'Tiles &copy; Esri &mdash; Source: Esri, DeLorme, NAVTEQ, USGS, Intermap, iPC, NRCAN, Esri Japan, METI, Esri China (Hong Kong), Esri (Thailand), TomTom, 2012'
                });

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
                'Esri': Esri_WorldStreetMap
            }

            const overLayers = {
                'Rusak Ringan': ringan,
                'Rusak Sedang': sedang,
                'Rusak Parah': parah
            }

            const layerControl = L.control.layers(baseLayers, overLayers).addTo(map)

            //Routing Machine and Djikstra
            // let latLng1 = L.latLng(-5.370612374835074,105.25503158569337)
            // let latLng2 = L.latLng(-5.377192289645698,105.27245521545412)
            // let latLng1 = L.latLng(-5.3764421991227085, 105.24848127547655)
            // let latLng2 = L.latLng(-5.375913411046684, 105.24027718614742)

            //Nuju -> SDI
            // let latLng1 = L.latLng(-5.3764421991227085, 105.24848127547655)
            
            let latLng1 = L.latLng(-5.378739, 105.245421)
            let latLng2 = L.latLng(-5.375913411046684, 105.24027718614742)

            L.Routing.control({
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
            }).addTo(map);
        </script>
    </body>
</html>
