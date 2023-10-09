<?php
class obat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
    }
    function index()
    {
        $data['obat'] = $this->db->get('obat')->result_array();
        $this->form_validation->set_rules('nama', 'Nama Obat', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');
        $this->form_validation->set_rules('dosis', 'Dosis', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal Kadaluwara', 'required');

        if ($this->form_validation->run() == false) {
            $this->template->load('template', 'obat/obat_data', $data);

        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'stok' => $this->input->post('stok'),
                'dosis' => $this->input->post('dosis'),
                'harga' => $this->input->post('harga'),
                'tanggal_kadaluwarsa' => $this->input->post('tanggal'),
            ];

            $this->db->insert('obat', $data);
            $this->session->set_flashdata('message2', '<div class="alert alert-success" role="alert">Obat telah ditambhakan!</div>');
            redirect('obat');
        }
    }
   
    function edit($id)
    {
        $this->form_validation->set_rules('nama', 'Nama Obat', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');
        $this->form_validation->set_rules('dosis', 'Dosis', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal Kadaluwara', 'required');

        if ($this->form_validation->run() == true) {
            $data = [
                'nama' => $this->input->post('nama'),
                'stok' => $this->input->post('stok'),
                'dosis' => $this->input->post('dosis'),
                'harga' => $this->input->post('harga'),
                'tanggal_kadaluwarsa' => $this->input->post('tanggal'),
            ];
            $this->db->where('id_obat', $id);
            $this->db->update('obat', $data);
            $this->session->set_flashdata('message2', '<div class="alert alert-success" role="alert">Obat telah diubah!</div>');
            redirect('obat');
        }
    }
    function delet($id)
    {
        $this->db->where('id_obat', $id);
        $this->db->delete('obat');
        $this->session->set_flashdata('message2', '<div class="alert alert-success" role="alert">obat telah dihapus!</div>');
        redirect('obat');
    }
    function cetakresep($id)
    {
        $data= [
            'cetakresep' =>$this->model->cetakresep(['id_pemeriksaan'=>$id]),
            'resep' => $this->model->resep(['id_pemeriksaan'=>$id])
        ];
        $this->template->cetak('cetak','obat/cetak_resep',$data);
    }
}