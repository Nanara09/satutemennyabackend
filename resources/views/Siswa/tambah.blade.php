<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="min-h-screen bg-black">
    <form action="{{ route('siswa.kirim') }}" method="POST">
    @csrf

    <input type="text" name="name" id="name" placeholder="Masukkan Nama" required class="text-white">
    <input type="number" name="no_absen" id="no_absen" placeholder="Masukkan No Absen" min="0" required class="text-white">
    <input type="teks" name="jurusan" id="jurusan" placeholder="Masukkan Jurusan" required class="text-white">
    <input type="teks" name="kelas" id="kelas" placeholder="Masukkan Kelas" required class="text-white">
    <input type="teks" name="alamat" id="alamat" placeholder="Masukkan Alamat" required class="text-white">
    <input type="submit" class="rounded bg-blue-500 px-3 py-1 text-white hover:bg-blue-600">
</form>
</body>
</html>