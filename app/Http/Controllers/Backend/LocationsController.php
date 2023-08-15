<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Locations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LocationsController extends Controller
{
    public function index()
    {
        $user = Auth::user()->name;
        return view('backend.Locations.index', ['user' => $user]);
    }

    public function create()
    {
        $user = Auth::user()->name;
        return view('backend.Locations.create', ['user' => $user]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'alamat_lokasi' => 'required',
            'coordinate' => 'required',
            'tingkat_kerusakan' => 'required',
            'foto_lokasi' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // Storage::disk('public')->put($path, file_get_contents($foto_lokasi));

        $Locations = new Locations();
        $Locations->alamat_lokasi = $request->input('alamat_lokasi');
        $Locations->coordinates = $request->input('coordinate');
        $Locations->tingkat_kerusakan = $request->input('tingkat_kerusakan');
        //
        $foto_lokasi    = $request->file('foto_lokasi');
        $path           = 'images/';
        $filename       = date('Y-m-d') . "." . $foto_lokasi->getClientOriginalName();
        $foto_lokasi->move($path, $filename);

        $Locations->foto_lokasi = $filename;
        $Locations->save();

        if ($Locations) {
            return to_route('locations.index')->with('success', 'Data berhasil disimpan');
        } else {
            return to_route('locations.index')->with('error', 'Data gagal disimpan');
        }
    }

    public function edit(Locations $locations, $id)
    {
        $user = Auth::user()->name;
        $locations = Locations::findOrFail($id);
        return view('backend.Locations.edit', ['locations' => $locations, 'user' => $user]);
    }

    public function update(Request $request, Locations $locations, $id)
    {
        $locations = Locations::findOrFail($id);
        $locations->coordinates = $request->input('alamat_lokasi');
        $locations->coordinates = $request->input('coordinate');
        $locations->tingkat_kerusakan = $request->input('tingkat_kerusakan');
        //
        if ($request->input('foto_lokasi2') != '') {
            $locations->foto_lokasi = $request->input('foto_lokasi2');
            $locations->update();
        } else {
            $foto_lokasi    = $request->file('foto_lokasi');
            $path           = 'images/';
            $filename       = date('Y-m-d') . "." . $foto_lokasi->getClientOriginalName();
            $foto_lokasi->move($path, $filename);

            $locations->foto_lokasi = $filename;
            $locations->update();
        }

        if ($locations) {
            return to_route('locations.index')->with('success', 'Data berhasil diupdate');
        } else {
            return to_route('locations.index')->with('error', 'Data gagal diupdate');
        }
    }

    public function destroy($id)
    {
        $locations = Locations::findOrFail($id);
        $locations->delete();
        return redirect()->back();
    }
}
