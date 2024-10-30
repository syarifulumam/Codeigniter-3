<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyModel extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Select data secara dinamis dari tabel tertentu
     *
     * @param string $table Nama tabel
     * @param array $columns Kolom yang ingin dipilih, defaultnya adalah semua kolom
     * @param array $conditions Kondisi `WHERE` dalam bentuk array
     * @param array $orderBy Pengurutan data, dengan format ['column' => 'ASC/DESC']
     * @param int $limit Batas jumlah data yang diambil
     * @param int $offset Offset untuk pagination
     * @return object|false Hasil query dalam bentuk object atau false jika tidak ada hasil
     */
    public function selectData($table, $columns = '*', $conditions = [], $orderBy = [], $limit = null, $offset = null) {
        // Memilih kolom, jika $columns adalah array maka pilih kolom spesifik
        if (is_array($columns)) {
            $this->db->select(implode(',', $columns));
        } else {
            $this->db->select($columns);
        }

        // Menentukan tabel
        $this->db->from($table);

        // Menambahkan kondisi `WHERE` jika ada
        if (!empty($conditions)) {
            $this->db->where($conditions);
        }

        // Menambahkan pengurutan data jika ada
        if (!empty($orderBy)) {
            foreach ($orderBy as $column => $direction) {
                $this->db->order_by($column, $direction);
            }
        }

        // Menambahkan limit dan offset jika ada
        if ($limit !== null) {
            $this->db->limit($limit, $offset);
        }

        // Eksekusi query dan mengembalikan hasil
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
}
