<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Dosen</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional: Link ke Font Awesome untuk ikon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #6c757d, #f8f9fa); /* Gradasi warna luar */
            min-height: 100vh;
        }
        .sidebar {
            background-color: #343a40; /* Warna sidebar */
            color: white;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
        }
        .main-content {
            width: calc(100% - 250px);
            margin: auto;
        }
        .card {
            background-color: white; /* Warna kotak utama */
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Efek bayangan */
        }
        .card-header {
            background-color: #007bff; /* Warna header */
            color: white;
            text-align: center;
            padding: 15px;
            font-weight: bold;
            border-radius: 10px 10px 0 0;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f2f2f2; /* Warna striping tabel */
        }
        .table-striped tbody tr:nth-of-type(even) {
            background-color: #e9ecef; /* Warna alternatif */
        }
    </style>
</head>
<body>

<div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar p-3 vh-100" style="width: 250px;">
        <div class="text-center mb-4">
            <img src="<?= base_url('assets/img/logo-amikom.png') ?>" alt="Logo Universitas" class="img-fluid" style="max-width: 80px;">
            <h5 class="mt-2">UNIVERSITAS AMIKOM YOGYAKARTA</h5>
        </div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('dosen') ?>">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('dosen/editnilaimahasiswa') ?>">
                    <i class="fas fa-user-graduate"></i> Edit Nilai Mahasiswa
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('auth/logout') ?>">
                    <i class="fas fa-sign-out-alt"></i> Keluar
                </a>
            </li>
        </ul>
    </div>

    <!-- Konten Utama -->
    <div class="main-content p-4">
        <div class="card">
            <div class="card-header">
                Selamat Datang di Dashboard Dosen
            </div>
            <div class="card-body text-center">
                <h5>Nilai Mahasiswa</h5>
                <table class="table table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Kelas</th>
                            <th>Nilai</th>
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
                                <td><?php echo $mhs['nilai']; ?></td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editNilaiModal" data-id="<?php echo $mhs['id']; ?>" data-nilai="<?php echo $mhs['nilai']; ?>">
                                        Edit Nilai
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Nilai Mahasiswa -->
<div class="modal fade" id="editNilaiModal" tabindex="-1" aria-labelledby="editNilaiModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editNilaiModalLabel">Edit Nilai Mahasiswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('dosen/update_nilai'); ?>" method="POST">
            <input type="hidden" name="id" id="mhs_id">
            <div class="mb-3">
                <label for="mhs_nilai" class="form-label">Nilai</label>
                <input type="number" class="form-control" id="mhs_nilai" name="nilai" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Nilai</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Link Bootstrap JS dan Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

<script>
    var editButtons = document.querySelectorAll('[data-bs-toggle="modal"]');
    editButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            var id = event.currentTarget.getAttribute('data-id');
            var nilai = event.currentTarget.getAttribute('data-nilai');

            document.getElementById('mhs_id').value = id;
            document.getElementById('mhs_nilai').value = nilai;
        });
    });
</script>

</body>
</html>
