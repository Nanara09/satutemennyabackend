<?php

namespace App\Http\Controllers;
use App\Models\DataBuku;
use App\Models\JenisBuku;
use Illuminate\Http\Request;

class DataBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $jenisBuku = \App\Models\JenisBuku::all();

        return view('data_buku.index', compact('jenisBuku'));
    }

    public function getData()
    {
    return response()->json(
        DataBuku::with('jenisBuku')->latest()->get()
    );
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenisBuku = jenisBuku::all();

        return view('data_buku.create', compact('jenisBuku'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'jenis_buku_id' => 'required|exists:jenis_buku,id',
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|integer',
            'stok' => 'required|integer',
    ]);

    return response()->json(DataBuku::create($data));
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
        $buku = DataBuku::findOrFail($id);
        $jenisBuku = JenisBuku::all();

        return view('data_buku.edit', compact('buku','jenisBuku'));
    }

    /**
     * Update the specified resource in storage.
     */
   
    public function update(Request $request, $id)
{
    $data = $request->validate([
        'jenis_buku_id' => 'required|exists:jenis_buku,id',
        'judul' => 'required',
        'penulis' => 'required',
        'penerbit' => 'required',
        'tahun_terbit' => 'required|integer',
        'stok' => 'required|integer',
    ]);

    $buku = DataBuku::findOrFail($id);
    $buku->update($data);

    return response()->json([
        'message' => 'Buku berhasil diupdate',
        'data' => $buku
    ]);
}

    public function destroy($id)
    {
        $buku = DataBuku::findOrFail($id);
        $buku->delete();

        return response()->json(['message' => 'Berhasil dihapus']);
    }
}