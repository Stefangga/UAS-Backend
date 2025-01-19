<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();

        // Cek apakah user sudah login
        if ($this->session->userdata('is_logged_in') !== true) {
            redirect('auth/admin'); // Jika belum login, redirect ke halaman login
        }

        // Load model
        $this->load->model('Admin_model');
    }

    public function index() {
        $this->load->view('admin/dashboard');
    }

    public function editmahasiswa() {
        $data['mahasiswa'] = $this->Admin_model->getAllMahasiswa();
        $this->load->view('admin/editmahasiswa', $data);
    }

    public function tambah_mahasiswa() {
        // Validasi input
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nim', 'NIM', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/editmahasiswa');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'nim' => $this->input->post('nim'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'kelas' => $this->input->post('kelas')
            ];

            $this->Admin_model->insertMahasiswa($data);
            $this->session->set_flashdata('success', 'Data mahasiswa berhasil ditambahkan!');
            redirect('admin/editmahasiswa');
        }
    }

    // Fungsi untuk update data mahasiswa
    public function update_mahasiswa() {
        // Validasi input
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nim', 'NIM', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/editmahasiswa');
        } else {
            $id = $this->input->post('id');
            $data = [
                'nama' => $this->input->post('nama'),
                'nim' => $this->input->post('nim'),
                'kelas' => $this->input->post('kelas')
            ];

            $this->Admin_model->updateMahasiswa($id, $data);
            $this->session->set_flashdata('success', 'Data mahasiswa berhasil diperbarui!');
            redirect('admin/editmahasiswa');
        }
    }

    // Fungsi untuk menghapus data mahasiswa
    public function hapus($id) {
        $this->Admin_model->hapusMahasiswa($id);
        $this->session->set_flashdata('success', 'Data mahasiswa berhasil dihapus!');
        redirect('admin/editmahasiswa');
    }
}
