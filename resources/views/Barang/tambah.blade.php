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
<form action="{{ route('barang.kirim') }}" method="POST">
    @csrf
    @method('POST')
    <input type="text" name="name" id="name" placeholder="Masukkan Nama" required>
    <input type="number" name="harga" id="harga"  placeholder="Masukkan Harga" min="0" required>
    <input type="number" name="stok" id="harga" placeholder="Masukkan Stok" min="0" required>
    <input type="submit">
</form>