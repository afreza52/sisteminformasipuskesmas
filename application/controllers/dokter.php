<?php
class dokter extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
    }
    function index()
    {

        $data['dokter'] = $this->model->getDokter();
        $data['poliklinik'] = $this->db->get('poliklinik')->result_array();

        $this->form_validation->set_rules('nama', 'Nama Dokter', 'required');
        $this->form_validation->set_rules('spesialis', 'Spesialis', 'required');
        $this->form_validation->set_rules('nomor_telpon', 'No Telpon', 'required');
        $this->form_validation->set_rules('id_poliklinik', 'Poliklinik', 'required');

        if ($this->form_validation->run() == false) {
            $this->template->load('template', 'dokter/dokter_data', $data);

        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'spesialis' => $this->input->post('spesialis'),
                'nomor_telpon' => $this->input->post('nomor_telpon'),
                'id_poliklinik' => $this->input->post('id_poliklinik')
            ];
            $this->db->insert('dokter', $data);
            $this->session->set_flashdata('message2', '<div class="alert alert-success" role="alert">Dokter telah ditambhakan!</div>');
            redirect('dokter');
        }
    }
    function edit($id)
    {
        $data['dokter'] = $this->model->getDokter();
        $data['poliklinik'] = $this->db->get('poliklinik')->result_array();
        $data['dokter'] = $this->db->get_where('dokter', array('id_dokter' => $id))->row_array();

        $this->form_validation->set_rules('nama', 'Nama Dokter', 'required');
        $this->form_validation->set_rules('spesialis', 'Spesialis', 'required');
        $this->form_validation->set_rules('nomor_telpon', 'No Telpon', 'required');
        $this->form_validation->set_rules('id_poliklinik', 'Poliklinik', 'required');

        if ($this->form_validation->run() == false) {
            $this->template->load('template', 'dokter/dokter_data', $data);

        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'spesialis' => $this->input->post('spesialis'),
                'nomor_telpon' => $this->input->post('nomor_telpon'),
                'id_poliklinik' => $this->input->post('id_poliklinik')
            ];
            $this->db->where('id_dokter', $id);
            $this->db->update('dokter', $data);
            $this->session->set_flashdata('message2', '<div class="alert alert-success" role="alert">Dokter telah diubah!</div>');
            redirect('dokter');
        }
    }
    function delet($id)
    {
        $this->db->where('id_dokter', $id);
        $this->db->delete('dokter');
        $this->session->set_flashdata('message2', '<div class="alert alert-success" role="alert">Dokter telah dihapus!</div>');
        redirect('dokter');
    }
}