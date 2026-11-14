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
        $jenisBuku = JenisBuku::all();

        return view('data_buku.index', compact('jenisBuku'));
    }

    public function getData()
    {
    return response()->json(
        DataBuku::with('jenisBuku')->latest()->get()
    );
    }


public function getDataServerSide(Request $request)
{
    // Mengambil semua data buku
    $query = DataBuku::query();

    // Menghitung jumlah seluruh data
    $recordsTotal = $query->count();

    // Pencarian
    $search = $request->input('search.value');

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('judul', 'like', "%{$search}%")
              ->orWhere('penulis', 'like', "%{$search}%")
              ->orWhere('penerbit', 'like', "%{$search}%")
              ->orWhere('tahun_terbit', 'like', "%{$search}%")
              ->orWhere('stok', 'like', "%{$search}%");
        });
    }

    // Menghitung data setelah pencarian
    $recordsFiltered = $query->count();

    // Pengurutan kolom
    $columns = [
        null,
        'judul',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'stok',
        null
    ];

    $orderColumn = $request->input('order.0.column');
    $orderDirection = $request->input('order.0.dir');

    if (
        isset($columns[$orderColumn]) &&
        $columns[$orderColumn] !== null
    ) {
        $direction = $orderDirection === 'desc' ? 'desc' : 'asc';

        $query->orderBy($columns[$orderColumn], $direction);
    }

    // Pagination
    $start = (int) $request->input('start', 0);
    $length = (int) $request->input('length', 10);

    $data = $query
        ->skip($start)
        ->take($length)
        ->get();

    // Menambahkan nomor urut
    $data->transform(function ($buku, $index) use ($start) {
        $buku->nomor = $start + $index + 1;
        return $buku;
    });

    // Mengirim hasil ke DataTables
    return response()->json([
        'draw' => (int) $request->input('draw'),
        'recordsTotal' => $recordsTotal,
        'recordsFiltered' => $recordsFiltered,
        'data' => $data
    ]);
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