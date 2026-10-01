<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="min-h-screen bg-black">
    @error('judul')
<p>error</p>
<p class="text-red-500">
    {{ $message }}
</p>
@enderror
@error('penulis')
<p>error</p>
<p class="text-red-500">
    {{ $message }}
</p>
@enderror
@error('tahun_terbit')
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
    <form action="{{ route('buku.update', $buku->id) }}" method="POST" >
    @csrf
    @method('PUT')
    <input type="text" name="judul" id="judul" value="{{ old('judul', $buku->judul) }}" placeholder="Masukkan Judul Buku" required class="text-white">
    <input type="text" name="penulis" id="penulis" value="{{ old('penulis', $buku->penulis) }}" placeholder="Masukkan penulis" required class="text-white">
    <input type="number" name="tahun_terbit" id="tahun_terbit" value="{{ old('tahun_terbit', $buku->tahun_terbit) }}" placeholder="Masukkan Tahun Terbit" length="4" required class="text-white">
    <input type="number" name="stok" id="stok" value="{{ old('stok', $buku->stok) }}" placeholder="Masukkan Stok" min="0" required class="text-white">
    <input type="submit" class="rounded bg-blue-500 px-3 py-1 text-white hover:bg-blue-600">
</form>
</body>
</html>
