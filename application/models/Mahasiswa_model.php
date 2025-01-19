<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // public function getMahasiswaByNim($nim) {
    //     // Mencari mahasiswa berdasarkan NIM
    //     $query = $this->db->get_where('mahasiswa', array('nim' => $nim));
    //     return $query->row_array();
    // }

    public function getMahasiswaByNim($nim) {
        // Mencari mahasiswa berdasarkan NIM
        $query = $this->db->get_where('mahasiswa', array('nim' => $nim));
        
        // Mengembalikan satu baris data sebagai array
        return $query->row_array();  // Gunakan row_array() karena hanya ingin satu mahasiswa
    }
    
}
