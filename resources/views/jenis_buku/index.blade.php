@extends('layouts_buku.app')

@section('title', 'Jenis Buku')

@section('content')

<h3>Jenis Buku</h3>

<button class="btn btn-primary mb-3" onclick="tambahJenis()">
    Tambah Jenis
</button>

<table class="table table-bordered table-striped">
    <thead class="table-primary">
        <tr>
            <th>No</th>
            <th>Nama Jenis</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody id="tabel-jenis">
        <tr>
            <td colspan="3" class="text-center">Memuat data...</td>
        </tr>
    </tbody>
</table>

@endsection