@extends('layouts_buku.app')

@section('title', 'Edit Buku')

@section('content')

<h3>Edit Buku</h3>

<form id="form-edit">
    @csrf

    <input type="hidden" id="id" value="{{ $buku->id }}">

    <div class="mb-3">
        <label>Jenis Buku</label>
        <select id="jenis_buku_id" class="form-control" required>
            @foreach($jenisBuku as $jenis)
                <option value="{{ $jenis->id }}"
                    {{ $buku->jenis_buku_id == $jenis->id ? 'selected' : '' }}>
                    {{ $jenis->nama_jenis }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Judul Buku</label>
        <input type="text" id="judul" class="form-control"
            value="{{ $buku->judul }}" required>
    </div>

    <div class="mb-3">
        <label>Penulis</label>
        <input type="text" id="penulis" class="form-control"
            value="{{ $buku->penulis }}" required>
    </div>

    <div class="mb-3">
        <label>Penerbit</label>
        <input type="text" id="penerbit" class="form-control"
            value="{{ $buku->penerbit }}" required>
    </div>

    <div class="mb-3">
        <label>Tahun Terbit</label>
        <input type="number" id="tahun_terbit" class="form-control"
            value="{{ $buku->tahun_terbit }}" required>
    </div>

    <div class="mb-3">
        <label>Stok</label>
        <input type="number" id="stok" class="form-control"
            value="{{ $buku->stok }}" required>
    </div>

<button type="submit" class="btn btn-warning">Update</button>
    <a href="/buku" class="btn btn-secondary">Kembali</a>
</form>

@endsection
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('form-edit');

    if (!form) return;

    form.addEventListener('submit', function(e) {
        e.preventDefault();

        let id = document.getElementById('id').value;

        let data = {
            jenis_buku_id: document.getElementById('jenis_buku_id').value,
            judul: document.getElementById('judul').value,
            penulis: document.getElementById('penulis').value,
            penerbit: document.getElementById('penerbit').value,
            tahun_terbit: document.getElementById('tahun_terbit').value,
            stok: document.getElementById('stok').value
        };

        fetch(`/buku/${id}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify(data)
        })
        .then(async response => {
        let hasil = await response.text();

        console.log('STATUS:', response.status);
        console.log('ISI RESPONS:', hasil);

        return hasil;
        })
        .then(() => {
            alert('Buku berhasil diupdate!');
            window.location.href = '/buku';
        })
        .catch(error => {
            console.error(error);
            alert(error.message);
        });
    });
});
</script>
@endpush