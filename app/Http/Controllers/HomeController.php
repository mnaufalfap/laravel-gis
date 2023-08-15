<?php

namespace App\Http\Controllers;

use App\Models\Locations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user()->name;
        return view('home', ['user' => $user]);
    }

    public function simple_map()
    {
        $user = Auth::user()->name;
        return view('leaflet.simple-map', ['user' => $user]);
    }

    public function marker()
    {
        $locations = Locations::all();
        $user = Auth::user()->name;
        return view('leaflet.marker', ['user' => $user, 'locations' => $locations]);
    }

    public function circle()
    {
        $user = Auth::user()->name;
        return view('leaflet.circle', ['user' => $user]);
    }

    public function polygon()
    {
        $user = Auth::user()->name;
        return view('leaflet.polygon', ['user' => $user]);
    }

    public function polyline()
    {
        $user = Auth::user()->name;
        return view('leaflet.poyline', ['user' => $user]);
    }

    public function rectangle()
    {
        $user = Auth::user()->name;
        return view('leaflet.rectangle', ['user' => $user]);
    }

    public function layers()
    {
        $user = Auth::user()->name;
        return view('leaflet.layer', ['user' => $user]);
    }

    public function layer_group()
    {
        $user = Auth::user()->name;
        return view('leaflet.layer_group', ['user' => $user]);
    }

    public function geojson()
    {
        $user = Auth::user()->name;
        return view('leaflet.geojson', ['user' => $user]);
    }

    public function getCoordinate()
    {
        $user = Auth::user()->name;
        return view('leaflet.get_coordinate', ['user' => $user]);
    }
}
