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
        <h1 class="text-2xl font-bold text-green-800 mb-6">Edit Pegawai</h1>

<form method="POST" action="/pegawai/{{ $pegawai->id }}">

    @csrf
    @method('PUT')

    <div class="mb-4">
    <label class="block font-medium mb-2">Departemen</label>

    <select name="departemen_id">

        @foreach ($departemens as $d)

            <option value="{{ $d->id }}"
                {{ $pegawai->departemen_id == $d->id ? 'selected' : '' }}>

                {{ $d->nama_departemen }}

            </option>

        @endforeach

    </select>

    <br><br>

    <div class="mb-4">
    <label class="block font-medium mb-2">Nama</label>

    <input type="text"
           name="nama_pegawai"
           value="{{ $pegawai->nama_pegawai }}" class="w-full border border-green-300 rounded-lg p-2" placeholder="Masukkan Nama Pegawai" required>

    <br><br>

    <label class="block font-medimu mb-2">Email</label>

    <input type="email"
           name="email"
           value="{{ $pegawai->email }}" class="w-full border border-green-300 rounded-lg p-2" placeholder="Masukkan Email" required>

    <label class="block font-medium mb-2">Jabatan</label>

    <input type="text"
           name="jabatan"
           value="{{ $pegawai->jabatan }}" class="w-full border border-green-300 rounded-lg p-2" placeholder="Masukkan Jabatan" required>

    <br><br>

    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
        Update
    </button>

</form>

<br>

<a href="/pegawai" class="bg-green-200 px-4 py-2 rounded-lg hover:bg-green-300">Kembali</a>
</body>
</html>