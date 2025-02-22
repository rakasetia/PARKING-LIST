<?php

namespace App\Http\Controllers;

use App\Models\ParkirModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ParkirController extends Controller
{
    // 
    public function index()
    {
        $data_parkir = ParkirModel::paginate(10); 
        
        return view('parkingapp', compact('data_parkir'));
    }

    // 
    public function create()
    {
        return view('buatparkir'); 
    }

    // 
    public function store(Request $request)
    {
        $rules = [
            'jenis_kendaraan' => 'required',
            'nama_pemilik' => 'required',
            'plat_nomor' => 'required',
            'warna_kendaraan' => 'required',
            'foto_kendaraan' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto_pemilik' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $request->validate($rules);

        // Simpan data ke database
        $parkir = new ParkirModel();
        $parkir->jenis_kendaraan = $request->jenis_kendaraan;
        $parkir->nama_pemilik = $request->nama_pemilik;
        $parkir->plat_nomor = $request->plat_nomor;
        $parkir->warna_kendaraan = $request->warna_kendaraan;

        // Upload Foto Kendaraan
        if ($request->hasFile('foto_kendaraan')) {
            $imageName = time().'_kendaraan.'.$request->foto_kendaraan->extension();
            $request->foto_kendaraan->move(public_path('images/upload'), $imageName);
            $parkir->foto_kendaraan = $imageName;
        }

        // Upload Foto Pemilik
        if ($request->hasFile('foto_pemilik')) {
            $imageName = time().'_pemilik.'.$request->foto_pemilik->extension();
            $request->foto_pemilik->move(public_path('images/upload'), $imageName);
            $parkir->foto_pemilik = $imageName;
        }

        $parkir->save();

        return redirect()->route('parkir')->with('success', 'Data berhasil disimpan!');
    }

    //  Menampilkan form edit
    public function edit($id)
    {
        $parkir = ParkirModel::findOrFail($id);
        return view('editparkir', compact('parkir'));
    }

    //  Update data parkir
    public function update(Request $request, $id)
    {
        $rules = [
            'jenis_kendaraan' => 'required',
            'nama_pemilik' => 'required',
            'plat_nomor' => 'required',
            'warna_kendaraan' => 'required',
            'foto_kendaraan' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto_pemilik' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $request->validate($rules);

        $parkir = ParkirModel::findOrFail($id);
        $parkir->jenis_kendaraan = $request->jenis_kendaraan;
        $parkir->nama_pemilik = $request->nama_pemilik;
        $parkir->plat_nomor = $request->plat_nomor;
        $parkir->warna_kendaraan = $request->warna_kendaraan;

        // Upload Foto Kendaraan (jika ada)
        if ($request->hasFile('foto_kendaraan')) {
            $imageName = time().'_kendaraan.'.$request->foto_kendaraan->extension();
            $request->foto_kendaraan->move(public_path('images/upload'), $imageName);
            $parkir->foto_kendaraan = $imageName;
        }

        // Upload Foto Pemilik (jika ada)
        if ($request->hasFile('foto_pemilik')) {
            $imageName = time().'_pemilik.'.$request->foto_pemilik->extension();
            $request->foto_pemilik->move(public_path('images/upload'), $imageName);
            $parkir->foto_pemilik = $imageName;
        }

        $parkir->save();

        return redirect()->route('parkir')->with('success', 'Data berhasil diperbarui!');
    }

    //  Hapus data parkir
    public function destroy($id)
    {
        $parkir = ParkirModel::findOrFail($id);
        
        // Hapus gambar dari folder jika ada
        if ($parkir->foto_kendaraan) {
            unlink(public_path('images/upload/'.$parkir->foto_kendaraan));
        }
        if ($parkir->foto_pemilik) {
            unlink(public_path('images/upload/'.$parkir->foto_pemilik));
        }

        $parkir->delete();

        return redirect()->route('parkir')->with('success', 'Data berhasil dihapus!');
    }
}




