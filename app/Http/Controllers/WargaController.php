<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    // Fungsi menampilkan daftar warga (DENGAN FITUR SEARCH)
    public function index(Request $request)
    {
        // Ambil nilai input dari form pencarian (jika ada)
        $search = $request->input('search');

        // Query data: jika ada search, gunakan where, jika tidak, ambil semua
        $semuaWarga = Warga::when($search, function ($query, $search) {
            return $query->where('nama', 'like', "%{$search}%")
                         ->orWhere('nik', 'like', "%{$search}%");
        })->get();

        // Kirim $search ke view agar input tetap terisi setelah diklik cari
        return view('warga.index', compact('semuaWarga', 'search'));
    }

    // Fungsi menampilkan form tambah data
    public function create()
    {
        return view('warga.create');
    }

    // Fungsi menyimpan data ke database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama'       => 'required|string|max:255',
            'nik'        => 'required|string|unique:wargas,nik|max:20',
            'alamat'     => 'required|string',
            'status_pkh' => 'required|string',
        ]);

        $validatedData['user_id'] = auth()->id();

        Warga::create($validatedData);

        return redirect('/warga')->with('sukses', 'Data warga berhasil ditambahkan!');
    }

    // Fungsi menampilkan form edit
    public function edit($id)
    {
        $warga = Warga::findOrFail($id);
        return view('warga.edit', compact('warga'));
    }

    // Memproses update data
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama'       => 'required|string|max:255',
            'nik'        => 'required|string|max:20',
            'alamat'     => 'required|string',
            'status_pkh' => 'required|string',
        ]);

        $warga = Warga::findOrFail($id);
        $warga->update($validatedData);

        return redirect('/warga')->with('sukses', 'Data warga berhasil diupdate!');
    }

    // Fungsi menghapus data
    public function destroy($id)
    {
        $warga = Warga::findOrFail($id);
        $warga->delete();

        return redirect('/warga')->with('sukses', 'Data warga berhasil dihapus!');
    }
}