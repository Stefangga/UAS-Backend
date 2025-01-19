<?php
// Pastikan Anda sudah menambahkan Bootstrap ke dalam project Anda.
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional: Link ke Font Awesome untuk ikon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>

<div class="d-flex">
    <!-- Sidebar -->
    <div class="bg-dark text-white p-3 vh-100" style="width: 250px;">
        <!-- Logo dan Nama Universitas -->
        <div class="text-center mb-4">
            <!-- Ganti 'logo.png' dengan path logo Anda -->
            <img src="<?= base_url('assets/img/logo-amikom.png')?>" alt="Logo Universitas" class="img-fluid" style="max-width: 80px;">
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
        <div class="card-header text-center bg-primary text-white" style="border-radius: 8px; padding: 20px; margin-bottom: 20px;">
    <h3>Selamat Datang di Dashboard Admin</h3>
    <p>Halo, Admin! Anda berhasil login ke dalam sistem.</p>
    <p>Ini adalah halaman utama dashboard Anda. Dari sini, Anda bisa mengelola data Dosen dan Mahasiswa.</p>
</div>

        </div>
    </div>
</div>

<!-- Link Bootstrap JS dan Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
