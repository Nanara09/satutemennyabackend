<!doctype html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  </head>
  <body class="min-h-screen bg-black">
    
    <h1 class="text-3xl font-bold font-serif text-white">
    Table siswa 
    </h1>
  <div class="border-base-content/25 w-full rounded-lg border"></div>
  <div class="w-full overflow-x-auto bg-center px-8 py-2">
<table class="border-2 border-white ">
  <thead>
  <tr>
        <td class="text-white mt-8">id</td>
        <td class="text-white mt-8">nama</td>
        <td class="text-white mt-8">no absen</td>
        <td class="text-white mt-8">jurusan</td>
        <td class="text-white mt-8">kelas</td>
        <td class="text-white mt-8">alamat</td>
        <td class="text-white mt-8">Action</td>
    </tr>
    </thead>
    @foreach ($siswa as $s)
        <tr class="row-hover">
            <td class="text-white mt-8">{{$s['id']}}</td>
            <td class="text-white" mt-8>{{$s['name']}}</td>
            <td class="text-white" mt-8>{{$s['no_absen']}}</td>
            <td class="text-white" mt-8>{{$s['jurusan']}}</td>
            <td class="text-white" mt-8>{{$s['kelas']}}</td>
            <td class="text-white" mt-8>{{$s['alamat']}}</td>
            <td>
                <a href="{{ route('siswa.edit', $s->id) }}" class="rounded bg-orange-500 px-3 py-1 text-white hover:bg-orange-600">Edit</a>
                <a href="{{ route('siswa.delete', $s->id) }}"  class="rounded bg-red-500 px-3 py-1 text-white hover:bg-red-600">Delete</a>
            </td>
        </tr>
    @endforeach
</table>

<a href="{{ route('siswa.tambah') }}"  class="rounded bg-blue-500 px-3 py-1 text-white hover:bg-blue-600">Tambah</a>
  </div>
  </body>
</html>
