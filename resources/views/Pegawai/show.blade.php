<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="max-w-6xl mx-auto py-6">
        <h1 class="text-2xl font-bold text-green-800">Detail Pegawai</h1>

<div class="bg-white rounded-lg shadow p-6">  
<div class="space-y-4">
<div>      
<p class="text-sm text-gray-500">
    Nama:
    {{ $pegawai->nama_pegawai }}
</p>

<p class="text-sm text-gray-500">
    Email:
    {{ $pegawai->email }}
</p>

<p class="text-sm text-gray-500">
    Departemen:
    {{ $pegawai->departemen->nama_departemen }}
</p>

<p class="text-sm text-gray-500">
    Jabatan:
    {{ $pegawai->jabatan }}
</p>
</div>
<br><br>

<a href="/pegawai" class="bg-green-200 px-4 py-2 rounded-lg hover:bg-green-300">
    Kembali
</a>
</div>
</div>
</div>
</body>
</html>