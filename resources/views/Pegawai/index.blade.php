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
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-green-800">Data Pegawai</h1>
        <a href="/pegawai/create" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">Tambah Pegawai</a>
        </div>
        <br><br>

    <div class="bg-white rounded-lg shadow p-5">

<table class="w-full text-left border-collapse">

    <thead>
    <tr class="bg-green-50">
        <th class="p-3 border">No</th>
        <th class="p-3 border">Nama</th>
        <th class="p-3 border">Email</th>
        <th class="p-3 border">Departemen</th>
        <th class="p-3 border">Jabatan</th>
        <th class="p-3 border">Aksi</th>
    </tr>
    </thead>

    @foreach ($pegawais as $p)
    <tr class="hover:bg-green-50">
        <td class="p-3 border">{{ $loop->iteration }}</td>
        <td class="p-3 border">{{ $p->nama_pegawai }}</td>
        <td class="p-3 border">{{ $p->email }}</td>
        <td class="p-3 border">{{ $p->departemen->nama_departemen }}</td>
        <td class="p-3 border">{{ $p->jabatan }}</td>
        

        <td>
            <a href="/pegawai/{{ $p->id }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Detail</a>
            <a href="/pegawai/{{ $p->id }}/edit" class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600">Edit</a>
             <form action="/pegawai/{{ $p->id }} "method="POST"style="display:inline">
                 @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                    Hapus
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
    </div>
    </div>
    <div class="mt-4">
        <a href="/laporan" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">Lihat Laporan</a>
    </div>
</body>
</html>