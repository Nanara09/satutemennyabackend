<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Departemen;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    // MENAMPILKAN SEMUA PEGAWAI
    public function index()
    {
        $pegawais = Pegawai::with('departemen')->get();
        foreach ($pegawais as $pegawai) {
            $pegawai->departemen_nama = $pegawai->departemen ? $pegawai->departemen->nama_departemen : 'Tidak ada departemen';
        }
        return view('pegawai.index', compact('pegawais'));
    }

    // FORM TAMBAH
    public function create()
    {
        $departemens = Departemen::all();

        return view('pegawai.create', compact('departemens'));
    }

    // MENYIMPAN DATA BARU
    public function store(Request $request)
    {
        $request->validate([
            'departemen_id' => 'required|exists:departemens,id',
            'nama_pegawai' => 'required|string|max:255',
            'email' => 'required|email|unique:pegawais,email',
            'jabatan' => 'required|string|max:255',
        ]);

        Pegawai::create([
            'departemen_id' => $request->departemen_id,
            'nama_pegawai' => $request->nama_pegawai,
            'email' => $request->email,
            'jabatan' => $request->jabatan,
        ]);

        return redirect('/pegawai')
            ->with('success', 'Pegawai berhasil ditambahkan.');
     }

    // DETAIL
    public function show(string $id)
    {
        $pegawai = Pegawai::with('departemen')->findOrFail($id);

        return view('pegawai.show', compact('pegawai'));
    }

    // FORM EDIT
    public function edit(string $id)
    {
        $pegawai = Pegawai::with('departemen')->findOrFail($id);
        $departemens = Departemen::all();

        return view('pegawai.edit', compact(
            'pegawai',
            'departemens'
        ));

        return redirect('/pegawai')
            ->with('success', 'Pegawai berhasil diperbarui.');
    }

    // UPDATE
    public function update(Request $request, string $id)
    {
        $request->validate([
            'departemen_id' => 'required|exists:departemens,id',
            'nama_pegawai' => 'required|string|max:255',
            'email' => 'required|email|unique:pegawais,email,' . $id,
            'jabatan' => 'required|string|max:255',
        ]);

        $pegawai = Pegawai::findOrFail($id);

        $pegawai->update([
            'departemen_id' => $request->departemen_id,
            'nama_pegawai' => $request->nama_pegawai,
            'email' => $request->email,
            'jabatan' => $request->jabatan,
        ]);

        return redirect('/pegawai')
            ->with('success', 'Pegawai berhasil diperbarui.');
    }

    // DELETE
    public function destroy(string $id)
    {
        $pegawai = Pegawai::findOrFail($id);

        $pegawai->delete();

        return redirect('/pegawai')
            ->with('success', 'Pegawai berhasil dihapus.');
    }
}