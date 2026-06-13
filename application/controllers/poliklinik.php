<?php
class poliklinik extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('fungsi');

        check_not_login();
    }
    function index()
    {
        $data['poliklinik'] = $this->db->get('poliklinik')->result_array();

        $this->form_validation->set_rules('nama', 'Nama Poliklinik', 'required|trim');

        if ($this->form_validation->run() == false) {
            // --- 1. NOTIFIKASI GAGAL KARENA VALIDASI FORM ---
            if (validation_errors()) {
                $this->session->set_flashdata('message3', '<div class="alert alert-danger" role="alert">Gagal menyimpan! Nama Poliklinik wajib diisi.</div>');
            }
            $this->template->load('template', 'poliklinik/poliklinik_data', $data);
        } else {
            // Memperbaiki array agar menangkap nama input yang benar dari form (nama_poliklinik)
            $insert_data = [
                'nama_poliklinik' => $this->input->post('nama'),
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => $this->fungsi->user_login()->nama,
                'active_st' => 1
            ];

            // Eksekusi ke database PostgreSQL
            $simpan = $this->db->insert('poliklinik', $insert_data);

            // --- 2. NOTIFIKASI BERDASARKAN HASIL INSERT DATABASE ---
            if ($simpan) {
                $this->session->set_flashdata('message3', '<div class="alert alert-success" role="alert">Poliklinik telah ditambahkan!</div>');
            } else {
                // Jika ditolak oleh PostgreSQL (misal karena masalah koneksi atau tipe data)
                $this->session->set_flashdata('message3', '<div class="alert alert-danger" role="alert">Gagal menyimpan data ke database server.</div>');
            }

            redirect('poliklinik');
        }
    }
    function edit($id)
    {
        $data['poliklinik'] = $this->db->get('poliklinik')->result_array();
        $data['poliklinik'] = $this->db->get_where('poliklinik', array('id_poliklinik' => $id))->row_array();

        $this->form_validation->set_rules('nama', 'Nama Poliklinik', 'required');

        if ($this->form_validation->run() == false) {
            $this->template->load('template', 'poliklinik/poliklinik_data', $data);
        } else {
            $data = [
                'nama_poliklinik' => $this->input->post('nama'),
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => $this->fungsi->user_login()->nama
            ];
            $this->db->where('id_poliklinik', $id);
            $this->db->update('poliklinik', $data);
            $this->session->set_flashdata('message3', '<div class="alert alert-success" role="alert">Poliklinik telah diubah!</div>');
            redirect('poliklinik');
        }
    }
    function delete($id)
    {
        $data = [
            'deleted_at' => date('Y-m-d H:i:s'),
            'deleted_by' => $this->fungsi->user_login()->nama,
            'active_st' => 0
        ];
        $this->db->where('id_poliklinik', $id);
        $this->db->update('poliklinik', $data);
        $this->session->set_flashdata('message3', '<div class="alert alert-success" role="alert">Poliklinik telah dihapus!</div>');
        redirect('poliklinik');
    }
}
