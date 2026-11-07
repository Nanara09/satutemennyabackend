<?php

namespace App\Http\Controllers;

use App\Models\JenisBuku;
use Illuminate\Http\Request;

class JenisBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        return view('jenis_buku.index');
    }

    public function getData()
    {
        return response()->json(
            JenisBuku::latest()->get()
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'nama_jenis' => 'required|max:100'
        ]);

        $jenis = JenisBuku::create([
            'nama_jenis' => $request->nama_jenis
        ]);

        return response()->json([
            'message' => 'Jenis buku berhasil ditambahkan',
            'data' => $jenis
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate([
            'nama_jenis' => 'required|max:100'
        ]);

        $jenis = JenisBuku::findOrFail($id);
        $jenis->update([
            'nama_jenis'=> $request->nama_jenis
        ]);

        return response()->json([
            'message' => 'Jenis buku berhasil diperbarui',
            'data'=> $jenis
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
          $jenis = JenisBuku::findOrFail($id);
        $jenis->delete();

        return response()->json([
            'message' => 'Jenis buku berhasil dihapus'
        ]);
    }
}
