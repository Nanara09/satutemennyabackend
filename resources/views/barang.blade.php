<table border="1">
    <tr>
        <td>id</td>
        <td>nama</td>
        <td>harga</td>
        <td>stock</td>
        <td>Action</td>
    </tr>
    @foreach ($barang as $b)
        <tr>
            <td>{{$b['id']}}</td>
            <td>{{$b['name']}}</td>
            <td>{{$b['harga']}}</td>
            <td>{{$b['stok']}}</td>
            <td>
                <a href="{{ route('barang.edit', $b->id) }}">Edit</a>
                <a href="{{ route('barang.delete', $b->id) }}">Delete</a>
            </td>
        </tr>
    @endforeach
</table>

<a href="{{ route('barang.tambah') }}">Tambah</a>