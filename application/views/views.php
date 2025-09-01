<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

    public function index()
    {
        // Data yang akan dikirim ke View
        $data['pesan'] = "Ini adalah halaman utama aplikasi kita.";

        // Memanggil View
        $this->load->view('halaman_utama', $data);
    }

    public function about()
    {
        echo "Halaman Tentang Kami";
    }
}
