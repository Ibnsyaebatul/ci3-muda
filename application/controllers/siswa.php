<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller CRUD Data Siswa (CodeIgniter 3)
 * Table : tabel_siswa (id, nis, nama, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat)
 * DB    : diabict_db
 */
class Siswa extends CI_Controller
{
    /** @var Siswa_model */
    private $m;

    public function __construct()
    {
        parent::__construct();
        // Model + lib/helper yang diperlukan
        $this->load->model('Siswa_model', 'm');
        $this->load->library(['form_validation', 'session']);
        $this->load->helper(['url', 'form', 'security']);
    }

    /** --------- READ (List) --------- */
    public function index()
    {
        $data = [
            'title' => 'Data Siswa',
            'rows'  => $this->m->all(),
            'total' => $this->m->count_all(),
        ];
        $this->render('siswa/index', $data);
    }

    /** --------- CREATE --------- */
    public function tambah()
    {
        $data = ['title' => 'Tambah Data Siswa'];

        if ($this->input->method() === 'post') {
            $this->rules('create');

            // enforce NIS unik saat tambah
            $this->form_validation->set_rules(
                'nis','NIS',
                'required|alpha_numeric|max_length[15]|is_unique[tabel_siswa.nis]'
            );

            if ($this->form_validation->run()) {
                $ok = $this->m->create($this->payload());
                $this->flashAndGo($ok ? 'Data berhasil ditambahkan.' : 'Gagal menambah data.', 'siswa');
                return;
            }
        }

        $this->render('siswa/form', $data);
    }

    /** --------- UPDATE --------- */
    public function edit($id = null)
    {
        $row = $this->m->find($id);
        if (!$row) { show_404(); return; }

        $data = ['title' => 'Edit Data Siswa', 'row' => $row];

        if ($this->input->method() === 'post') {
            $this->rules('update');

            // NIS harus unik kecuali milik record ini
            $postedNis = $this->input->post('nis', true);
            if ($this->m->nis_exists($postedNis, $id)) {
                $this->form_validation->set_rules(
                    'nis','NIS',
                    'required|alpha_numeric|max_length[15]|is_unique[tabel_siswa.nis]'
                );
            } else {
                $this->form_validation->set_rules(
                    'nis','NIS',
                    'required|alpha_numeric|max_length[15]'
                );
            }

            if ($this->form_validation->run()) {
                $ok = $this->m->update($id, $this->payload());
                $this->flashAndGo($ok ? 'Data berhasil diupdate.' : 'Gagal mengupdate data.', 'siswa');
                return;
            }
        }

        $this->render('siswa/form', $data);
    }

    /** --------- DELETE --------- */
    public function hapus($id = null)
    {
        if ($id !== null && $this->m->find($id)) {
            $ok = $this->m->delete($id);
            $this->session->set_flashdata('ok', $ok ? 'Data berhasil dihapus.' : 'Gagal menghapus data.');
        }
        redirect('siswa', 'location', 303);
    }

    /* ===========================================================
     *                    PRIVATE UTILITIES
     * ===========================================================
     */

    /** Layout wrapper */
    private function render(string $view, array $data = []): void
    {
        // Pastikan assets & layout sudah ada (lihat template yang sudah gue kasih sebelumnya)
        $this->load->view('layouts/header', $data);
        $this->load->view($view, $data);
        $this->load->view('layouts/footer');
    }

    /** Aturan validasi bersama */
    private function rules(string $mode): void
    {
        $this->form_validation->set_error_delimiters('<div class="error">','</div>');
        // NIS di-handle terpisah (beda antara create & update)
        $this->form_validation->set_rules('nama','Nama','required|max_length[30]');
        $this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required|in_list[PRIA,WANITA]');
        $this->form_validation->set_rules('tempat_lahir','Tempat Lahir','required|max_length[50]');
        $this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','required|regex_match[/^\d{4}-\d{2}-\d{2}$/]');
        $this->form_validation->set_rules('alamat','Alamat','required|max_length[100]');
    }

    /** Ambil payload POST dengan XSS filter */
    private function payload(): array
    {
        return [
            'nis'            => $this->input->post('nis', true),
            'nama'           => $this->input->post('nama', true),
            'jenis_kelamin'  => $this->input->post('jenis_kelamin', true),
            'tempat_lahir'   => $this->input->post('tempat_lahir', true),
            'tanggal_lahir'  => $this->input->post('tanggal_lahir', true),
            'alamat'         => $this->input->post('alamat', true),
        ];
    }

    /** Flash message + redirect */
    private function flashAndGo(string $msg, string $to): void
    {
        $this->session->set_flashdata('ok', $msg);
        redirect($to, 'location', 303);
    }
}
