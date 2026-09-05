@extends('layout.app')

@section('sidebar')
@include('sidebar')
@endsection

@section('navbar')
@include('navbar')
@endsection

@section('content')
<table  class="table-auto border-4 border-collapse text-center font-serif border-indigo-200">
    <tr>
        <td class="border-4 border-indigo-200">Nama</td>
        <td class="border-4 border-indigo-200">Deskripsi</td>
        <td class="border-4 border-indigo-200">Harga</td>
        <td class="border-4 border-indigo-200">Jumlah</td>
    </tr>
    @foreach ($data as $d)
    <tr>
        <td class="border-4 border-indigo-200">{{$d['nama']}}</td>
        <td class="border-4 border-indigo-200">{{$d['deskripsi']}}</td>
        <td class="border-4 border-indigo-200">{{$d['harga']}}</td>
        <td class="border-4 border-indigo-200">{{$d['jumlah']}}</td>
    </tr>
    @endforeach
</table>

<br>
<br>
<br>

    <table class="table-auto border-collapse text-center font-serif border-4 border-indigo-200">
    <tr>
        <td class="border-4 border-indigo-200">Nama</td>
        <td class="border-4 border-indigo-200">Deskripsi</td>
        <td class="border-4 border-indigo-200">Harga</td>
        <td class="border-4 border-indigo-200">Jumlah</td>
    </tr>
    @foreach ($produk as $p)
    <tr>
        <td class="border-4 border-indigo-200">{{$p['nama']}}</td>
        <td class="border-4 border-indigo-200">{{$p['deskripsi']}}</td>
        <td class="border-4 border-indigo-200">{{$p['harga']}}</td>
        <td class="border-4 border-indigo-200">{{$p['jumlah']}}</td>
    </tr>
    @endforeach
</table>
@endsection