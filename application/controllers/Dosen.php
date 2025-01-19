<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {
    public function __construct() {
        parent::__construct();

        // Cek apakah user sudah login
        if ($this->session->userdata('is_logged_in') !== true) {
            redirect('auth/dosen'); // Jika belum login, redirect ke halaman login
        }

        // Load model
        $this->load->model('Dosen_model');
    }

    public function index() {
        $this->load->view('dosen/dashboard');
    }

    public function editnilaimahasiswa() {
        $data['mahasiswa'] = $this->Dosen_model->getAllMahasiswa();
        $this->load->view('dosen/editnilaimahasiswa', $data);
    }

    public function update_nilai() {
        $id = $this->input->post('id');
        $nilai = $this->input->post('nilai');

        // Pastikan nilai valid
        if ($nilai >= 0 && $nilai <= 100) {
            // Lakukan update nilai di database
            $this->Dosen_model->updateNilaiMahasiswa($id, $nilai);
            // Set flashdata untuk menunjukkan pesan sukses
            $this->session->set_flashdata('success', 'Nilai mahasiswa berhasil diperbarui.');
        } else {
            // Set flashdata untuk menunjukkan pesan error
            $this->session->set_flashdata('error', 'Nilai harus diantara 0 dan 100.');
        }

        // Redirect kembali ke halaman edit nilai mahasiswa
        redirect('dosen/editnilaimahasiswa');
    }
}