<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;

class PengaduanController extends Controller
{
    // Menampilkan daftar pengaduan
    public function index()
    {
        $pengaduan = Pengaduan::latest()->get();
        return view('pengaduan.pengaduan', compact('pengaduan'));
    }

    // Menampilkan form tambah pengaduan
    public function create()
    {
        return view('pengaduan.create');
    }

    // Menyimpan pengaduan ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama_gedung' => 'required|string|max:255',
            'nama_ruangan' => 'required|string|max:255',
            'nama_barang' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'keluhan' => 'required|string',
            'tanggal' => 'required|string',
            'lokasi' => 'required|string',
            'status_pengaduan' => 'required|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('pengaduan', 'public');
        }

        Pengaduan::create($data);

        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil dikirim.');
    }

    // Menampilkan detail pengaduan
    public function show($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        return view('pengaduan.show', compact('pengaduan'));
    }

    // Menampilkan form edit pengaduan
    public function edit($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        return view('pengaduan.edit', compact('pengaduan'));
    }

    // Mengupdate data pengaduan
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_gedung' => 'required|string|max:255',
            'nama_ruangan' => 'required|string|max:255',
            'nama_barang' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'keluhan' => 'required|string',
            'tanggal' => 'required|string',
            'lokasi' => 'required|string',
            'status_pengaduan' => 'required|string',
        ]);

        $pengaduan = Pengaduan::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('pengaduan', 'public');
        }

        $pengaduan->update($data);

        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil diperbarui.');
    }

    // Menghapus pengaduan
    public function destroy($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->delete();

        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil dihapus.');
    }
}