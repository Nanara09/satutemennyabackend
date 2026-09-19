<form action="{{ route('barang.kirim') }}" method="POST">
    @csrf

    <input type="text" name="name" id="name" placeholder="Masukkan Nama" required>
    <input type="number" name="harga" id="harga" placeholder="Masukkan Harga" min="0" required>
    <input type="number" name="stok" id="harga" placeholder="Masukkan Stok" min="0" required>
    <input type="submit">
</form>