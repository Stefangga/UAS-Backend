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
            background-color: #f8f9fa; /* Warna latar belakang luar */
        }
        .sidebar {
            width: 250px;
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
            background-color: white; /* Latar belakang kotak utama */
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Efek bayangan */
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
    <div class="sidebar p-3 vh-100">
        <!-- Logo dan Nama Universitas -->
        <div class="text-center mb-4">
            <img src="<?= base_url('assets/img/logo-amikom.png') ?>" alt="Logo Universitas" class="img-fluid" style="max-width: 80px;">
            <h5 class="mt-2">UNIVERSITAS AMIKOM YOGYAKARTA</h5>
        </div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('mahasiswa') ?>">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('mahasiswa/rekapnilaimahasiswa') ?>">
                    <i class="fas fa-user-graduate"></i> Nilai Saya
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
                Selamat Datang di Dashboard Mahasiswa
            </div>
            <div class="card-body text-center">
                <!-- Tabel Data Mahasiswa -->
                <h5 class="mb-4">Nilai Saya</h5>
                <table class="table table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Kelas</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($mahasiswa)): ?>
                            <tr>
                                <td><?php echo $mahasiswa['nama']; ?></td>
                                <td><?php echo $mahasiswa['nim']; ?></td>
                                <td><?php echo $mahasiswa['kelas']; ?></td>
                                <td><?php echo $mahasiswa['nilai']; ?></td>
                            </tr>
                        <?php else: ?>
                            <tr>
                                <td colspan="4">Data tidak ditemukan</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>    
            </div>
        </div>
    </div>
</div>

<!-- Link Bootstrap JS dan Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
