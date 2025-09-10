<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_model extends CI_Model
{
    private $table = 'tabel_siswa';

    public function all() {
        return $this->db->order_by('id','DESC')->get($this->table)->result();
    }

    public function count_all() {
        return $this->db->count_all($this->table);
    }

    public function find($id) {
        return $this->db->get_where($this->table, ['id'=>$id])->row();
    }

    public function create($data) {
        return $this->db->insert($this->table,$data);
    }

    public function update($id,$data) {
        return $this->db->where('id',$id)->update($this->table,$data);
    }

    public function delete($id) {
        return $this->db->delete($this->table,['id'=>$id]);
    }
}
