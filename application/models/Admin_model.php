<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    // Konstruktor untuk load database
    public function __construct() {
        parent::__construct();
        $this->load->database(); // Pastikan database di-load
    }

    public function getAllMahasiswa() {
        return $this->db->get('mahasiswa')->result_array(); // Mengambil data dari tabel mahasiswa
    }

    public function insertMahasiswa($data) {
        $this->db->insert('mahasiswa', $data); // Menyisipkan data mahasiswa
    }

    public function updateMahasiswa($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('mahasiswa', $data);
    }

    public function hapusMahasiswa($id) {
        $this->db->where('id', $id);
        $this->db->delete('mahasiswa');
    }
}
