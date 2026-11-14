
console.log('BUKU.JS BERHASIL DIMUAT');

let dataTableBuku = null;
let metodeAktif = 'client';

// Pengaturan bahasa DataTables
const bahasaTabel = {
    search: "Cari:",
    lengthMenu: "Tampilkan _MENU_ data",
    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
    infoEmpty: "Tidak ada data",
    zeroRecords: "Data tidak ditemukan",
    emptyTable: "Belum ada data buku",
    paginate: {
        first: "Pertama",
        last: "Terakhir",
        next: "Selanjutnya",
        previous: "Sebelumnya"
    }
};

// READ: Menampilkan data buku
function tampilkanBuku(metode = 'client') {

    metodeAktif = metode;

    // Hapus DataTables sebelumnya
    if (dataTableBuku) {
        dataTableBuku.destroy();
        dataTableBuku = null;
    }

    // CLIENT-SIDE
    if (metode === 'client') {

        fetch('/data-buku')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Gagal mengambil data buku');
                }
                return response.json();
            })
            .then(data => {

                dataTableBuku = new DataTable('#tabel-data-buku', {
                    data: data,

                    columns: [
                        {
                            data: null,
                            render: (data, type, row, meta) =>
                                meta.row + meta.settings._iDisplayStart + 1
                        },
                        { data: 'judul' },
                        { data: 'penulis' },
                        { data: 'penerbit' },
                        { data: 'tahun_terbit' },
                        { data: 'stok' },
                        {
                            data: 'id',
                            orderable: false,
                            searchable: false,
                            render: function (id) {
                                return `
                                    <button class="btn btn-warning btn-sm"
                                        onclick="window.location.href='/buku/${id}/edit'">
                                        Edit
                                    </button>

                                    <button class="btn btn-danger btn-sm"
                                        onclick="hapusBuku(${id})">
                                        Hapus
                                    </button>
                                `;
                            }
                        }
                    ],

                    pageLength: 5,
                    language: bahasaTabel
                });
            })
            .catch(error => {
                console.error('Error Client-Side:', error);
            });

    } else {

        // SERVER-SIDE
        dataTableBuku = new DataTable('#tabel-data-buku', {

            processing: true,
            serverSide: true,

            ajax: {
                url: '/data-buku-server',
                type: 'GET',
                error: function (xhr) {
                    console.error('Error Server-Side:', xhr.responseText);
                }
            },

            columns: [
                {
                    data: 'nomor',
                    orderable: false,
                    searchable: false
                },
                { data: 'judul' },
                { data: 'penulis' },
                { data: 'penerbit' },
                { data: 'tahun_terbit' },
                { data: 'stok' },
                {
                    data: 'id',
                    orderable: false,
                    searchable: false,
                    render: function (id) {
                        return `
                            <button class="btn btn-warning btn-sm"
                                onclick="window.location.href='/buku/${id}/edit'">
                                Edit
                            </button>

                            <button class="btn btn-danger btn-sm"
                                onclick="hapusBuku(${id})">
                                Hapus
                            </button>
                        `;
                    }
                }
            ],

            pageLength: 5,
            language: bahasaTabel
        });
    }
}

// Memulai DataTables
function mulaiDataTables() {

    const pilihan = document.getElementById('metode-data');

    if (!pilihan) return;

    tampilkanBuku(pilihan.value);

    pilihan.addEventListener('change', function () {
        tampilkanBuku(this.value);
    });
}

// Menjalankan setelah halaman selesai dimuat
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', mulaiDataTables);
} else {
    mulaiDataTables();
}

// CREATE: Tambah buku
document.addEventListener('submit', function (e) {

    if (e.target.id === 'form-create') {

        e.preventDefault();

        const data = Object.fromEntries(new FormData(e.target));

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
        .then(async response => {

            const teks = await response.text();
            let hasil;

            try {
                hasil = JSON.parse(teks);
            } catch {
                throw new Error(
                    `Server error (${response.status}): ${teks.substring(0, 300)}`
                );
            }

            if (!response.ok) {
                const pesanValidasi = hasil.errors
                    ? Object.values(hasil.errors).flat().join('\n')
                    : hasil.message;

                throw new Error(
                    pesanValidasi || `Terjadi kesalahan (${response.status})`
                );
            }

            return hasil;
        })
        .then(() => {
            alert('Buku berhasil ditambahkan!');
            window.location.href = '/buku';
        })
        .catch(error => {
            console.error('Kesalahan CREATE:', error);
            alert(error.message);
        });
    }
});

// DELETE: Hapus buku
function hapusBuku(id) {

    if (!confirm('Yakin ingin menghapus buku ini?')) {
        return;
    }

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

        // Perbarui tabel sesuai metode yang sedang digunakan
        if (metodeAktif === 'server') {
            if (dataTableBuku) {
                dataTableBuku.ajax.reload(null, false);
            }
        } else {
            tampilkanBuku('client');
        }

    })
    .catch(error => {
        console.error(error);
        alert(error.message);
    });
}

// Agar fungsi hapusBuku bisa dipanggil dari HTML
window.hapusBuku = hapusBuku;
