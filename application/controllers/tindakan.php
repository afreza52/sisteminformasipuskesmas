<?php
class tindakan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
    }
    function index()
    {
        $data['tindakan'] = $this->db->get('tindakan')->result_array();
        $this->form_validation->set_rules('kode_tindakan', 'Kode tindakan', 'required');
        $this->form_validation->set_rules('tindakan', 'Nama tindakan', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        if ($this->form_validation->run() == false) {

            $this->template->load('template', 'tindakan/tindakan_data', $data);

        } else {
            $data = [
                'kode' => $this->input->post('kode_tindakan'),
                'nama' => $this->input->post('tindakan'),
                'deskripsi' => $this->input->post('deskripsi'),
                'harga' => $this->input->post('harga')
            ];

            $this->db->insert('tindakan', $data);
            $this->session->set_flashdata('message2', '<div class="alert alert-success" role="alert">tindakan telah ditambhakan!</div>');
            redirect('tindakan');
        }
    }
    function edit($id)
    {

        $this->form_validation->set_rules('kode_tindakan', 'Kode tindakan', 'required');
        $this->form_validation->set_rules('tindakan', 'Nama tindakan', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() == true) {
            $data = [
                'kode' => $this->input->post('kode_tindakan'),
                'nama' => $this->input->post('tindakan'),
                'deskripsi' => $this->input->post('deskripsi'),
                'harga' => $this->input->post('harga')
            ];
            $this->db->where('id_tindakan', $id);
            $this->db->update('tindakan', $data);
            $this->session->set_flashdata('message2', '<div class="alert alert-success" role="alert">tindakan telah diUbah!</div>');
            redirect('tindakan');
        }
    }
    function delet($id)
    {
        $this->db->where('id_tindakan', $id);
        $this->db->delete('tindakan');
        $this->session->set_flashdata('message2', '<div class="alert alert-success" role="alert">tindakan telah dihapus!</div>');
        redirect('tindakan');
    }

}