<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Laporan Pegawai</title>
</head>
<body class="bg-green-100 min-h-screen">

    <div class="max-w-3xl mx-auto p-6">

        <div class="bg-white rounded-lg shadow p-6">

            <div class="flex justify-between items-center mb-6">

                <div>
                    <h1 class="text-2xl font-bold text-green-800">Laporan Jumlah Pegawai</h1>
                </div>
            </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">

            <thead>
                <tr class="bg-green-50">
                    <th class="p-3 border">No</th>
                    <th class="p-3 border">Nama Departemen</th>
                    <th class="p-3 border">Jumlah Pegawai</th>
                </tr>
            </thead>

            @foreach ($departemens as $d)
                <tr class="hover:bg-green-50">
                    <td class="p-3 border">{{ $loop->iteration }}</td>
                    <td class="p-3 border">{{ $d->nama_departemen }}</td>
                    <td class="p-3 border">{{ $d->pegawais_count }}</td>
                </tr>
            @endforeach

        </table>
    <br>
    <div class="mt-2">
        <a href="/pegawai" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">Kembali ke Data Pegawai</a>
    </div>
</body>
</html>