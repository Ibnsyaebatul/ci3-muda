<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('Siswa_model','m');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['rows'] = $this->m->all();
        $data['total'] = $this->m->count_all();
        $this->load->view('siswa/index',$data);
    }

    public function tambah() {
        if ($this->input->post()) {
            $this->_rules();
            if ($this->form_validation->run()) {
                $this->m->create($this->_payload());
                redirect('siswa');
            }
        }
        $this->load->view('siswa/form');
    }

    public function edit($id) {
        $data['row'] = $this->m->find($id);
        if (!$data['row']) show_404();
        if ($this->input->post()) {
            $this->_rules();
            if ($this->form_validation->run()) {
                $this->m->update($id, $this->_payload());
                redirect('siswa');
            }
        }
        $this->load->view('siswa/form',$data);
    }

    public function hapus($id) {
        $this->m->delete($id);
        redirect('siswa');
    }

    private function _rules() {
        $this->form_validation->set_rules('nis','NIS','required');
        $this->form_validation->set_rules('nama','Nama','required');
        $this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required');
        $this->form_validation->set_rules('tempat_lahir','Tempat Lahir','required');
        $this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','required');
        $this->form_validation->set_rules('alamat','Alamat','required');
    }

    private function _payload() {
        return [
            'nis' => $this->input->post('nis',true),
            'nama' => $this->input->post('nama',true),
            'jenis_kelamin' => $this->input->post('jenis_kelamin',true),
            'tempat_lahir' => $this->input->post('tempat_lahir',true),
            'tanggal_lahir' => $this->input->post('tanggal_lahir',true),
            'alamat' => $this->input->post('alamat',true)
        ];
    }
}
