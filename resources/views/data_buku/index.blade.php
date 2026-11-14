@extends('layouts_buku.app')

@section('title', 'Data Buku')

@section('content')

<h3>Data Buku</h3>

<div class="mb-3">
    <label for="metode-data" class="form-label">
    </label>

    <select id="metode-data" class="form-select" style="width: 200px;">
        <option value="client">Client-Side</option>
        <option value="server">Server-Side</option>
    </select>
</div>

<button onclick="tambahBuku()">
    <a href="/buku/create" class="btn btn-primary mb-3" style="color:white">
    Tambah Buku
    </a>
</button>

<div id="form-buku" class="card p-3 mb-3" style="display: none;">
    <h5>Tambah Buku</h5>

    <input type="hidden" id="buku-id">

    <div class="mb-2">
        <label>Jenis Buku</label>
        <select id="jenis_buku_id" class="form-control">
            <option value="">Pilih Jenis Buku</option>
            @foreach($jenisBuku as $jenis)
                <option value="{{ $jenis->id }}">
                    {{ $jenis->nama_jenis }}
                </option>
            @endforeach
        </select>
    </div>

    <input type="text" id="judul" class="form-control mb-2" placeholder="Judul Buku">
    <input type="text" id="penulis" class="form-control mb-2" placeholder="Penulis">
    <input type="text" id="penerbit" class="form-control mb-2" placeholder="Penerbit">
    <input type="number" id="tahun_terbit" class="form-control mb-2" placeholder="Tahun Terbit">
    <input type="number" id="stok" class="form-control mb-2" placeholder="Stok">

    <button class="btn btn-success" onclick="simpanBuku()">Simpan</button>
    <button class="btn btn-secondary mt-2" onclick="tutupForm()">Batal</button>
</div>

<table id="tabel-data-buku" class="table table-bordered table-striped">
    <thead class="table-primary">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody id="tabel-buku">
        <tr>
            <td colspan="7" class="text-center">Memuat data...</td>
        </tr>
    </tbody>
</table>

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.min.css">
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.4/js/dataTables.min.js"></script>
@endpush

@endsection