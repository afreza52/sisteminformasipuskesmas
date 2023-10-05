<?php
class pasien extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
    }
    function index()
    {
        $data['pasien'] = $this->db->get('pasien')->result_array();
        $this->template->load('template', 'pasien/pasien_data', $data);
    }
    function edit($id)
    {
        $data1 = [
            'nik' => $this->input->post('nik'),
            'nama' => $this->input->post('nama'),
            'nomor_telpon' => $this->input->post('nomor_telpon'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat' => $this->input->post('alamat'),
            'jenis_pasien' => $this->input->post('jenis_pasien'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),

        ];
        $this->db->where('id_pasien', $id);
        $this->db->update('pasien', $data1);
        $this->session->set_flashdata('message2', '<div class="alert alert-success" role="alert">Data Pasein telah diubah!</div>');
        redirect('pasien');
    }
    function delete($id)
    {
        $this->db->where('id_pasien', $id);
        $this->db->delete('pasien');
        $this->session->set_flashdata('message2', '<div class="alert alert-success" role="alert">Data Pasein telah dihapus!</div>');
        redirect('pasien');
    }
}