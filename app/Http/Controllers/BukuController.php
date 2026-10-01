<?php

namespace App\Http\Controllers;
use App\Models\Buku;
use Illuminate\Http\Request;


class BukuController extends Controller
{
    public function store_view()
    {
        return view('buku.tambah');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = Buku::all();

        return view('buku', compact('buku'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "judul" => "required|string",
            "penulis" => "required|string",
            "tahun_terbit" => "required|numeric",
            "stok" => "required|integer|min:10",
        ]);
        Buku::create($validated);
        return redirect('/buku');
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
        $buku = Buku::find($id);
         $validated = $request->validate([
            "judul" => "required|string",
            "penulis" => "required|string",
            "tahun_terbit" => "required|numeric",
            "stok" => "required|integer|min:10",
        ]);
        $buku->update($validated);

         return redirect('/buku');
    }


        public function update_view($id)
    {
        $buku = Buku::find($id);
        return view('buku.edit', compact('buku'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buku = Buku::find($id);
        $buku->delete();
        return redirect('/buku');
    }
}
