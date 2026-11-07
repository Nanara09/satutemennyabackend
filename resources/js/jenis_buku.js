function tampilkanJenis() {
    fetch('/data-jenis-buku')
        .then(response => response.json())
        .then(data => {
            let tabel = document.getElementById('tabel-jenis');

            if (!tabel) return;

            tabel.innerHTML = '';

            data.forEach((jenis, index) => {
                tabel.innerHTML += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${jenis.nama_jenis}</td>
                        <td>
                            <button class="btn btn-warning btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </td>
                    </tr>
                `;
            });

            if (data.length === 0) {
                tabel.innerHTML = `
                    <tr>
                        <td colspan="3" class="text-center">
                            Belum ada jenis buku
                        </td>
                    </tr>
                `;
            }
        });
}

document.addEventListener('DOMContentLoaded', tampilkanJenis);

function tambahBuku() {
    document.getElementById('form-buku').style.display = 'block';
}

function tutupForm() {
    document.getElementById('form-buku').style.display = 'none';
}

function simpanBuku() {
    fetch('/buku', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            jenis_buku_id: document.getElementById('jenis_buku_id').value,
            judul: document.getElementById('judul').value,
            penulis: document.getElementById('penulis').value,
            penerbit: document.getElementById('penerbit').value,
            tahun_terbit: document.getElementById('tahun_terbit').value,
            stok: document.getElementById('stok').value
        })
    })
    .then(response => response.json())
    .then(data => {
        alert('Buku berhasil ditambahkan!');
        tutupForm();
        tampilkanBuku();
    })
    .catch(error => {
        console.error(error);
        alert('Gagal menambahkan buku!');
    });
}