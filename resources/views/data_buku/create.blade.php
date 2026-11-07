@extends('layouts_buku.app')

@section('title', 'Tambah Buku')

@section('content')

<h3>Tambah Buku</h3>

<form id="form-create">
    @csrf

    <div class="mb-3">
        <label>Jenis Buku</label>
        <select name="jenis_buku_id" class="form-control" required>
            <option value="">Pilih Jenis Buku</option>
            @foreach($jenisBuku as $jenis)
                <option value="{{ $jenis->id }}">
                    {{ $jenis->nama_jenis }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Judul Buku</label>
        <input type="text" name="judul" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Penulis</label>
        <input type="text" name="penulis" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Penerbit</label>
        <input type="text" name="penerbit" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Tahun Terbit</label>
        <input type="number" name="tahun_terbit" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Stok</label>
        <input type="number" name="stok" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="/buku" class="btn btn-secondary">Kembali</a>
</form>

@endsection