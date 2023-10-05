<?php
class obat extends CI_Controller
{
    function index()
    {
        $data['obat'] = $this->db->get('obat')->result_array();
        $this->form_validation->set_rules('nama', 'Nama Obat', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');

        if ($this->form_validation->run() == false) {
            $this->template->load('template', 'obat/obat_data', $data);

        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'stok' => $this->input->post('stok')
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

        if ($this->form_validation->run() == true) {
            $data = [
                'nama' => $this->input->post('nama'),
                'stok' => $this->input->post('stok')
            ];
            $this->db->where('id_obat', $id);
            $this->db->update('obat', $data);
            $this->session->set_flashdata('message2', '<div class="alert alert-success" role="alert">Obat telah diubah!</div>');
            redirect('obat');
        }
    }
    function cetakresep()
    {
        $this->load->view('obat/cetak_resep');
    }
}