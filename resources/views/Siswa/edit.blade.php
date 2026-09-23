<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="min-h-screen bg-black">
    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST" class="block text-gray-500 md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
    @csrf
    @method('PUT')
    <input type="text" name="name" id="name" value="{{ old('name', $siswa->name) }}" placeholder="Masukkan Nama" required class="text-white">
    <input type="number" name="no_absen" id="no_absen" value="{{ old('no_absen', $siswa->no_absen) }}" placeholder="Masukkan no absen" min="0" required class="text-white">
    <input type="text" name="jurusan" id="jurusan" value="{{ old('jurusan', $siswa->jurusan) }}" placeholder="Masukkan Jurusan" required class="text-white">
    <input type="text" name="kelas" id="kelas" value="{{ old('kelas', $siswa->kelas) }}" placeholder="Masukkan Kelas" required class="text-white">
    <input type="text" name="alamat" id="alamat" value="{{ old('alamat', $siswa->alamat) }}" placeholder="Masukkan Alamat" required class="text-white">
    <input type="submit" class="rounded bg-blue-500 px-3 py-1 text-white hover:bg-blue-600">
</form>
</body>
</html>