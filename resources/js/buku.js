console.log('BUKU.JS BERHASIL DIMUAT');
function tampilkanBuku() {
    fetch('/data-buku')
        .then(response => response.json())
        .then(data => {
            let tabel = document.getElementById('tabel-buku');

            if (!tabel) return;

            tabel.innerHTML = '';

            data.forEach((buku, index) => {
                tabel.innerHTML += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${buku.judul}</td>
                        <td>${buku.penulis}</td>
                        <td>${buku.penerbit}</td>
                        <td>${buku.tahun_terbit}</td>
                        <td>${buku.stok}</td>
                        <td>
                            <button class="btn btn-warning btn-sm"
                                onclick="window.location.href='/buku/${buku.id}/edit'">
                                Edit
                            </button>

                            <button class="btn btn-danger btn-sm"
                                onclick="hapusBuku(${buku.id})">
                                Hapus
                            </button>
                        </td>
                    </tr>
                `;
            });

            if (data.length === 0) {
                tabel.innerHTML = `
                    <tr>
                        <td colspan="7" class="text-center">
                            Belum ada data buku
                        </td>
                    </tr>
                `;
            }
        });
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', tampilkanBuku);
} else {
    tampilkanBuku();
}

// CREATE: Tambah buku
document.addEventListener('submit', function (e) {
    console.log('FORM DIKLIK:', e.target.id);
    if (e.target.id === 'form-create') {
        e.preventDefault();

        let data = Object.fromEntries(new FormData(e.target));

        fetch('/buku', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector(
                    'meta[name="csrf-token"]'
                ).content
            },
            body: JSON.stringify(data)
        })
        .then(response => {
            if (!response.ok) throw new Error('Gagal menambahkan buku');
            return response.json();
        })
        .then(() => {
            alert('Buku berhasil ditambahkan!');
            window.location.href = '/buku';
        })
        .catch(error => alert(error.message));
    }
});

// DELETE: Hapus buku
function hapusBuku(id) {
    if (!confirm('Yakin ingin menghapus buku ini?')) return;

    fetch(`/buku/${id}`, {
        method: 'DELETE',
        headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector(
                'meta[name="csrf-token"]'
            ).content
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Gagal menghapus buku');
        }
        return response.json();
    })
    .then(() => {
        alert('Buku berhasil dihapus!');
        tampilkanBuku();
    })
    .catch(error => {
        console.error(error);
        alert(error.message);
    });
}

// Agar bisa dipanggil dari onclick di HTML
window.hapusBuku = hapusBuku;