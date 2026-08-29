@extends('layout.app')

@section('sidebar')
@include('sidebar')
@endsection

@section('navbar')
@include('navbar')
@endsection

@section('content')
<table border="1">
    <tr>
        <td>Nama</td>
        <td>Deskripsi</td>
        <td>Harga</td>
        <td>Jumlah</td>
    </tr>
    @foreach ($data as $d)
    <tr>
        <td>{{$d['nama']}}</td>
        <td>{{$d['deskripsi']}}</td>
        <td>{{$d['harga']}}</td>
        <td>{{$d['jumlah']}}</td>
    </tr>
    @endforeach
</table>

<br>
<br>
<br>

    <table border="1">
    <tr>
        <td>Nama</td>
        <td>Deskripsi</td>
        <td>Harga</td>
        <td>Jumlah</td>
    </tr>
    @foreach ($produk as $p)
    <tr>
        <td>{{$p['nama']}}</td>
        <td>{{$p['deskripsi']}}</td>
        <td>{{$p['harga']}}</td>
        <td>{{$p['jumlah']}}</td>
    </tr>
    @endforeach
</table>
@endsection