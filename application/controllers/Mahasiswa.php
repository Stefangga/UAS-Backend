<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {
    public function __construct() {
        parent::__construct();

        // Cek apakah user sudah login
        if ($this->session->userdata('is_logged_in') !== true) {
            redirect('auth/mahasiswa'); // Jika belum login, redirect ke halaman login
        }

        // Load model
        $this->load->model('Mahasiswa_model');
    }

    public function index() {
        $this->load->view('mahasiswa/dashboard');
    }

    public function rekapnilaimahasiswa() {
        // Ambil nim dari session yang sudah login
        $nim = $this->session->userdata('nim');
        
        // Ambil data mahasiswa berdasarkan nim
        $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaByNim($nim);
        
        // Pastikan data mahasiswa yang dikirim ke view adalah array, bukan string atau null
        if (empty($data['mahasiswa'])) {
            $data['mahasiswa'] = [];
        }
        
        // Tampilkan view dengan data mahasiswa
        $this->load->view('mahasiswa/nilaisaya', $data);
    }
    
}