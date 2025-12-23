<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::simplePaginate(10);
        return view('admin.vehicles.index', compact('vehicles'));
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        if (!$keyword) {
            return redirect('/admin/kendaraan');
        }

        $vehicles = Vehicle::where('vehicle_name', 'LIKE', '%' . $keyword . '%')->simplePaginate(10);

        return view('admin.vehicles.index', compact('vehicles', 'keyword'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'vehicle_name' => 'required',
            'pict' => 'max:2048',
            'brand' => 'required',
            'type' => 'required',
            'price' => 'required|min:1',
            'production_year' => 'required',
        ]);

        $pictName = 'photo.png';

        if ($request->hasFile('pict')) {
            $pict = $request->file('pict');
            $pictName = now()->format('d-m-Y') . '_' . $pict->hashName();
            $pict->move(public_path('images'), $pictName);
        }

        Vehicle::create([
            'vehicle_name' => $request->vehicle_name,
            'pict' => $pictName,
            'brand' => $request->brand,
            'type' => $request->type,
            'price' => $request->price,
            'production_year' => $request->production_year,
        ]);

        return redirect('/admin/kendaraan')->with('success', 'Tambah Data Berhasil!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'vehicle_name' => 'required',
            'pict' => 'max:2048',
            'brand' => 'required',
            'type' => 'required',
            'price' => 'required|min:1',
            'production_year' => 'required',
        ]);

        $product = Vehicle::find($id);
        $pictName = $product->pict;

        if ($request->hasFile('pict')) {
            if ($pictName && file_exists(public_path('images/' . $pictName))) {
                if($pictName != 'photo.png'){
                    unlink(public_path('images/' . $pictName));
                }
            }
            $pict = $request->file('pict');
            $pictName = now()->format('d-m-Y') . '_' . $pict->hashName();
            $pict->move(public_path('images'), $pictName);
        }

        $product->update([
            'vehicle_name' => $request->vehicle_name,
            'pict' => $pictName,
            'brand' => $request->brand,
            'type' => $request->type,
            'price' => $request->price,
            'production_year' => $request->production_year,
        ]);

        return redirect('/admin/kendaraan')->with('success', 'Ubah Data Berhasil!');
    }

    public function delete($id)
    {
        $product = Vehicle::find($id);
        $pictName = $product->pict;
        unlink(public_path('images/' . $pictName));
        $product->delete();
        return redirect('/admin/kendaraan')->with('success', 'Hapus Data Berhasil!');
    }
}
