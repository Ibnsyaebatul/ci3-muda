<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_model extends CI_Model
{
    private $table = 'tabel_siswa';
    private $pk    = 'id';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function all() {
        return $this->db->order_by($this->pk,'DESC')->get($this->table)->result();
    }

    public function count_all() {
        return $this->db->count_all($this->table);
    }

    public function find($id) {
        return $this->db->get_where($this->table, [$this->pk => $id])->row();
    }

    public function create($data) {
        return $this->db->insert($this->table,$data);
    }

    public function update($id,$data) {
        return $this->db->where($this->pk,$id)->update($this->table,$data);
    }

    public function delete($id) {
        return $this->db->delete($this->table, [$this->pk=>$id]);
    }

    // cek NIS unik (kecuali id tertentu)
    public function nis_exists($nis, $ignore_id = null) {
        $this->db->where('nis', $nis);
        if ($ignore_id) $this->db->where($this->pk.' !=', $ignore_id);
        return $this->db->count_all_results($this->table) > 0;
    }
}
