@extends('app')

@section('title', 'dahsboard')

@section('content')
<div>
    Ini Dashboard
</div>


<table>
    <tr>
        <td>nama</td>
        <td>kelas</td>
        <td>jurusan</td>
    </tr>
    @foreach($data as $d)
    <tr>
        <td>{{ $d["nama"] }}</td>
        <td>{{ $d["kelas"] }}</td>
        <td>{{ $d["jurusan"] }}</td>
    </tr>
    @endforeach
</table>
@endsection