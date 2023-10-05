<?php
class diagnosa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
    }
    function index()
    {
        $data['diagnosa'] = $this->db->get('diagnosa')->result_array();
        $this->form_validation->set_rules('kode_diagnosa', 'Kode Diagnosa', 'required');
        $this->form_validation->set_rules('penyakit', 'Nama Penyakit', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        if ($this->form_validation->run() == false) {

            $this->template->load('template', 'diagnosa/diagnosa_data', $data);

        } else {
            $data = [
                'kode' => $this->input->post('kode_diagnosa'),
                'nama' => $this->input->post('penyakit'),
                'deskripsi' => $this->input->post('deskripsi')
            ];

            $this->db->insert('diagnosa', $data);
            $this->session->set_flashdata('message2', '<div class="alert alert-success" role="alert">Diagnosa telah ditambhakan!</div>');
            redirect('diagnosa');
        }
    }
    function edit($id)
    {

        $this->form_validation->set_rules('kode_diagnosa', 'Kode Diagnosa', 'required');
        $this->form_validation->set_rules('penyakit', 'Nama Penyakit', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() == true) {
            $data = [
                'kode' => $this->input->post('kode_diagnosa'),
                'nama' => $this->input->post('penyakit'),
                'deskripsi' => $this->input->post('deskripsi')
            ];
            $this->db->where('id_diagnosa', $id);
            $this->db->update('diagnosa', $data);
            $this->session->set_flashdata('message2', '<div class="alert alert-success" role="alert">Diagnosa telah diUbah!</div>');
            redirect('diagnosa');
        }
    }
    function delet($id)
    {
        $this->db->where('id_diagnosa', $id);
        $this->db->delete('diagnosa');
        $this->session->set_flashdata('message2', '<div class="alert alert-success" role="alert">Diagnosa telah dihapus!</div>');
        redirect('diagnosa');
    }

}