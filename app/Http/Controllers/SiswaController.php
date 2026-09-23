<?php

namespace App\Http\Controllers;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function store_view()
    {
        return view('siswa.tambah');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = Siswa::all();

        return view('siswaview', compact('siswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $siswa = new Siswa();
        $siswa->name = $request->name;
        $siswa->no_absen = $request->no_absen;
        $siswa->jurusan = $request->jurusan;
        $siswa->kelas = $request->kelas;
        $siswa->alamat = $request->alamat;
        $siswa->save();

        return redirect('/siswa');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $siswa = Siswa::find($id);
        $siswa->name = $request->name;
        $siswa->no_absen = $request->no_absen;
        $siswa->jurusan = $request->jurusan;
        $siswa->kelas = $request->kelas;
        $siswa->alamat = $request->alamat;
        $siswa->save();

         return redirect('/siswa');
    }


        public function update_view($id)
    {
        $siswa = Siswa::find($id);
        return view('siswa.edit', compact('siswa'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $siswa = siswa::find($id);
        $siswa->delete();
        return redirect('/siswa');
    }
}
