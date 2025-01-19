<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Pastikan database di-load
    }

    // Fungsi untuk mendapatkan semua mahasiswa
    public function getAllMahasiswa() {
        return $this->db->get('mahasiswa')->result_array();
    }

    // Fungsi untuk update nilai mahasiswa
    public function updateNilaiMahasiswa($id, $nilai) {
        $data = [
            'nilai' => $nilai
        ];

        // Update nilai mahasiswa berdasarkan ID
        $this->db->where('id', $id);
        $this->db->update('mahasiswa', $data);
    }
}
