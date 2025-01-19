<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();

        // Load model
        $this->load->model('Mahasiswa_model');
    }
	public function index()
	{
		$this->load->view('auth/index');
	}
	public function admin() {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/admin');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // Cek apakah login sebagai admin
            if ($username === 'admin' && $password === 'admin') {
                $this->session->set_userdata('is_logged_in', true);
                redirect('admin');
            } else {
                // Jika login gagal, tampilkan pesan error
                $this->session->set_flashdata('error', 'Username atau Password salah');
                $this->load->view('auth/admin');
            }
        }
    }

    public function dosen() {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/dosen');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // Cek apakah login sebagai dosen
            if ($username === 'dosen' && $password === 'dosen') {
                $this->session->set_userdata('is_logged_in', true);
                redirect('dosen');
            } else {
                // Jika login gagal, tampilkan pesan error
                $this->session->set_flashdata('error', 'Username atau Password salah');
                $this->load->view('auth/dosen');
            }
        }
    }

	public function mahasiswa() {
        // Set aturan validasi untuk form
        $this->form_validation->set_rules('nim', 'NIM', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        // Cek apakah form valid
        if ($this->form_validation->run() == FALSE) {
            // Jika form tidak valid, muat ulang halaman login mahasiswa
            $this->load->view('auth/mahasiswa');
        } else {
            // Ambil data dari input
            $nim = $this->input->post('nim');
            $password = $this->input->post('password');

            // Cek apakah mahasiswa dengan NIM dan password ini ada di database
            $mahasiswa = $this->Mahasiswa_model->getMahasiswaByNim($nim);

            if ($mahasiswa && password_verify($password, $mahasiswa['password'])) {
                // Jika data valid, set session dan arahkan ke dashboard mahasiswa
                $this->session->set_userdata('is_logged_in', true);
                $this->session->set_userdata('nim', $nim); // Menyimpan NIM di session
                redirect('mahasiswa'); // Ganti dengan URL dashboard mahasiswa
            } else {
                // Jika login gagal, tampilkan pesan error
                $this->session->set_flashdata('error', 'NIM atau Password salah');
                $this->load->view('auth/mahasiswa');
            }
        }
    }


	public function logout() {
        // Hapus sesi saat logout
        $this->session->sess_destroy();
        redirect('auth');
    }
}
