<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>

<div class="d-flex">
    <!-- Sidebar -->
    <div class="bg-dark text-white p-3 vh-100" style="width: 250px;">
        <div class="text-center mb-4">
            <img src="<?= base_url('assets/img/logo-amikom.png') ?>" alt="Logo Universitas" class="img-fluid" style="max-width: 80px;">
            <h5 class="mt-2">UNIVERSITAS AMIKOM YOGYAKARTA</h5>
        </div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-white" href="<?php echo base_url('admin') ?>">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="<?php echo base_url('admin/editmahasiswa') ?>">
                    <i class="fas fa-user-graduate"></i> Edit Mahasiswa
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="<?php echo base_url('auth/logout') ?>">
                    <i class="fas fa-sign-out-alt"></i> Keluar
                </a>
            </li>
        </ul>
    </div>

    <!-- Konten Utama -->
    <div class="container-fluid p-4" style="width: calc(100% - 250px);">
        <div class="card">
            <div class="card-header text-center">
                <h3>Selamat Datang di Dashboard Admin</h3>
            </div>
            <div class="card-body">
                <!-- Form Tambah Data Mahasiswa -->
                <h5>Tambah Data Mahasiswa</h5>
                <form action="<?php echo base_url('admin/tambah_mahasiswa'); ?>" method="POST">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="nim" class="form-label">NIM</label>
                            <input type="text" name="nim" id="nim" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="kelas" class="form-label">Kelas</label>
                            <input type="text" name="kelas" id="kelas" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>

                <hr>

                <!-- Tabel Data Mahasiswa -->
                <h5>Data Mahasiswa</h5>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($mahasiswa as $index => $mhs): ?>
                            <tr>
                                <td><?php echo $index + 1; ?></td>
                                <td><?php echo $mhs['nama']; ?></td>
                                <td><?php echo $mhs['nim']; ?></td>
                                <td><?php echo $mhs['kelas']; ?></td>
                                <td>
                                    <!-- Tombol Edit yang akan memicu modal -->
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?php echo $mhs['id']; ?>" data-nama="<?php echo $mhs['nama']; ?>" data-nim="<?php echo $mhs['nim']; ?>" data-kelas="<?php echo $mhs['kelas']; ?>">Edit</button>
                                    <!-- Tombol Hapus dengan konfirmasi -->
                                    <a href="<?php echo base_url('admin/hapus/' . $mhs['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Mahasiswa -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data Mahasiswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" action="<?php echo base_url('admin/update_mahasiswa'); ?>" method="POST">
                    <input type="hidden" name="id" id="edit-id">
                    <div class="mb-3">
                        <label for="edit-nama" class="form-label">Nama</label>
                        <input type="text" name="nama" id="edit-nama" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-nim" class="form-label">NIM</label>
                        <input type="text" name="nim" id="edit-nim" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-kelas" class="form-label">Kelas</label>
                        <input type="text" name="kelas" id="edit-kelas" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script>
    // Menyusun data mahasiswa untuk modal edit
    const editModal = document.getElementById('editModal')
    editModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget
        const id = button.getAttribute('data-id')
        const nama = button.getAttribute('data-nama')
        const nim = button.getAttribute('data-nim')
        const kelas = button.getAttribute('data-kelas')

        const modalId = editModal.querySelector('#edit-id')
        const modalNama = editModal.querySelector('#edit-nama')
        const modalNim = editModal.querySelector('#edit-nim')
        const modalKelas = editModal.querySelector('#edit-kelas')

        modalId.value = id
        modalNama.value = nama
        modalNim.value = nim
        modalKelas.value = kelas
    })
</script>

</body>
</html>
