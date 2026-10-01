<!doctype html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  </head>
  <body class="min-h-screen bg-black">
    
    <h1 class="text-3xl font-bold mb-6 font-serif text-white">
    Data Buku
    </h1>
  <div class="border-base-content/25 w-full rounded-lg border"></div>
  <div class="w-full overflow-x-auto">
<table class="w-full max-w-5xl bg-gray-900 rounded-xl overflow-hidden shadow-lg">
  <thead class="bg-gray-800">
  <tr>
        <td class="px-6 py-4 text-left text-sm font-semibold text-white">id</td>
        <td class="px-6 py-4 text-left text-sm font-semibold text-white">judul</td>
        <td class="px-6 py-4 text-left text-sm font-semibold text-white">penulis</td>
        <td class="px-6 py-4 text-left text-sm font-semibold text-white">tahun_terbit</td>
        <td class="px-6 py-4 text-left text-sm font-semibold text-white">stok</td>
        <td class="px-6 py-4 text-left text-sm font-semibold text-white">Action</td>
    </tr>
    </thead>
    @foreach ($buku as $b)
        <tr class="border-b border-gray-700 hover:bg-gray-800 transition">
            <td class="px-6 py-4 text-left text-sm font-semibold text-white">{{$b['id']}}</td>
            <td class="px-6 py-4 text-left text-sm font-semibold text-white">{{$b['judul']}}</td>
            <td class="px-6 py-4 text-left text-sm font-semibold text-white">{{$b['penulis']}}</td>
            <td class="px-6 py-4 text-left text-sm font-semibold text-white">{{$b['tahun_terbit']}}</td>
            <td class="px-6 py-4 text-left text-sm font-semibold text-white">{{$b['stok']}}</td>
            <td>
                <a href="{{ route('buku.edit', $b->id) }}" class="rounded bg-orange-500 px-3 py-1 text-white hover:bg-orange-600">Edit</a>
                <a href="{{ route('buku.delete', $b->id) }}"  class="rounded bg-red-500 px-3 py-1 text-white hover:bg-red-600">Delete</a>
            </td>
        </tr>
    @endforeach
</table>

<a href="{{ route('buku.tambah') }}"  class="rounded bg-blue-500 px-3 py-1 text-white hover:bg-blue-600">Tambah</a>
  </div>
  </body>
</html>
