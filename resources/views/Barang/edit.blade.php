@error('name')
<p>error</p>
<p class="text-red-500">
    {{ $message }}
</p>
@enderror
@error('harga')
<p>error</p>
<p class="text-red-500">
    {{ $message }}
</p>
@enderror
@error('stok')
<p>error</p>
<p class="text-red-500">
    {{ $message }}
</p>
@enderror
<form action="{{ route('barang.update', $barang->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="name" id="name" value="{{ old('name', $barang->name) }}" placeholder="Masukkan Nama" required>
    <input type="number" name="harga" id="harga" value="{{ old('harga', $barang->harga) }}" placeholder="Masukkan Harga" min="0" required>
    <input type="number" name="stok" id="harga" value="{{ old('stok', $barang->stok) }}" placeholder="Masukkan Stok" min="0" required>
    <input type="submit">
</form>