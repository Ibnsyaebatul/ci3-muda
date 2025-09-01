<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Siap pakai helper/library kalau perlu
    }

    public function index()
    {
        $data = [
            'title' => 'Halaman Utama',
            'content_view' => 'halaman_utama'
        ];
        // Pakai layout header/footer biar rapi
        $this->load->view('partials/header', $data);
        $this->load->view($data['content_view'], $data);
        $this->load->view('partials/footer');
    }

    public function tentang_kami()
    {
        $data = [
            'title' => 'Tentang Kami',
            'content_view' => 'tentang_kami'
        ];
        $this->load->view('partials/header', $data);
        $this->load->view($data['content_view'], $data);
        $this->load->view('partials/footer');
    }
}