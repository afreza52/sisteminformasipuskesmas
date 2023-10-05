<?php
class Transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
    }

    function pembayaranbelumlunas()
    {
        $data = [
            'pembayaran1' => $this->model->pembayaran(['status' => 1]),
        ];
        $this->template->load('template', 'transaksi/pembayaran_data_belumlunas', $data);
    }
    function pembayaranlunas()
    {
        $data = [
            'pembayaran' => $this->model->pembayaran(['status' => 2]),
        ];
        $this->template->load('template', 'transaksi/pembayaran_data_lunas', $data);
    }
    function bayar($id)
    {
        $data = [
            'metode_pembayaran' => $this->input->post('metode'),
            'total_bayar' => $this->input->post('total_bayar'),
            'diskon' => $this->input->post('diskon'),
            'kembalian' => $this->input->post('kembalian'),
            'status' => 2,
            'tanggal_pembayaran' => date('Y:m:d H:i:s')
        ];
        $this->db->where('id_pembayaran', $id);
        $this->db->update('pembayaran', $data);
        $this->session->set_flashdata('message2', '<div class="alert alert-success" role="alert">Transaksi Pembayaran Berhasil</div>');
        redirect('pembayaranbelumlunas');
    }

}