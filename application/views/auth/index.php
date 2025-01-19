<?php
// Pastikan Anda sudah menambahkan Bootstrap ke dalam project Anda.
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional: Link ke Font Awesome untuk ikon jika diperlukan -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <!-- Logo bagian atas -->
            <div class="text-center mb-4">
                <img src="<?= base_url('assets/img/logo-amikom.png')?>" alt="Logo" style="width: 150px;">
            </div>

            <div class="card">
                <div class="card-header text-center">
                    <h4>Pilih Jenis Login</h4>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        <a href="<?php echo base_url('auth/admin')?>" class="list-group-item list-group-item-action">
                            <i class="fas fa-user-shield"></i> Login sebagai Admin
                        </a>
                        <a href="<?php echo base_url('auth/dosen')?>" class="list-group-item list-group-item-action">
                            <i class="fas fa-chalkboard-teacher"></i> Login sebagai Dosen
                        </a>
                        <a href="<?php echo base_url('auth/mahasiswa')?>" class="list-group-item list-group-item-action">
                            <i class="fas fa-user-graduate"></i> Login sebagai Mahasiswa
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Link Bootstrap JS dan Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
