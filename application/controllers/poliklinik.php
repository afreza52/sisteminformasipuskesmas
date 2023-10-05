<?php
class poliklinik extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
    }
    function index()
    {
        $data['poliklinik'] = $this->db->get('poliklinik')->result_array();

        $this->form_validation->set_rules('nama', 'Nama Poliklinik', 'required');

        if ($this->form_validation->run() == false) {
            $this->template->load('template', 'poliklinik/poliklinik_data', $data);
        } else {
            $data = [
                'nama' => $this->input->post('nama')
            ];
            $this->db->insert('poliklinik', $data);
            $this->session->set_flashdata('message3', '<div class="alert alert-success" role="alert">Poliklinik telah ditambhakan!</div>');
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
                'nama' => $this->input->post('nama')
            ];
            $this->db->where('id_poliklinik', $id);
            $this->db->update('poliklinik', $data);
            $this->session->set_flashdata('message3', '<div class="alert alert-success" role="alert">Poliklinik telah diubah!</div>');
            redirect('poliklinik');
        }
    }
    function delet($id)
    {
        $this->db->where('id_poliklinik', $id);
        $this->db->delete('poliklinik');
        $this->session->set_flashdata('message3', '<div class="alert alert-success" role="alert">Poliklinik telah dihapus!</div>');
        redirect('poliklinik');
    }
}