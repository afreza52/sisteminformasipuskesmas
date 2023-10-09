<?php
class pemeriksaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        check_dokter();
    }
    function index()
    {
        $data = [
            'pemeriksaan' => $this->model->getPemeriksaan(),
            'diagnosa' => $this->db->get('diagnosa')->result_array(),
            'obat' => $this->db->get('obat')->result_array(),
            'tindakan' => $this->db->get('tindakan')->result_array(),
        ];
        $this->template->load('template', 'pemeriksaan/pemeriksaan_data', $data);
    }
    function delet($id)
    {
        $this->db->where('id_pemeriksaan', $id);
        $this->db->delete('pemeriksaan');
        $this->session->set_flashdata('message2', '<div class="alert alert-success" role="alert">pemeriksaan telah dihapus!</div>');
        redirect('pemeriksaan');
    }
    function umum()
    {
        $data = [
            'pemeriksaan' => $this->model->getPemeriksaanPoli(['id_poliklinik' => 1]),
            'diagnosa' => $this->db->get('diagnosa')->result_array(),
            'obat' => $this->db->get('obat')->result_array(),
            'tindakan' => $this->db->get('tindakan')->result_array(),
        ];

        $this->template->load('template', 'pemeriksaan/poliumum', $data);
    }
    function gigi()
    {
        $data = [
            'pemeriksaan' => $this->model->getPemeriksaanPoli(['id_poliklinik' => 2]),
            'diagnosa' => $this->db->get('diagnosa')->result_array(),
            'obat' => $this->db->get('obat')->result_array(),
            'tindakan' => $this->db->get('tindakan')->result_array(),
        ];
        $this->template->load('template', 'pemeriksaan/poligigi', $data);
    }
    function mata()
    {
        $data = [
            'pemeriksaan' => $this->model->getPemeriksaanPoli(['id_poliklinik' => 4]),
            'diagnosa' => $this->db->get('diagnosa')->result_array(),
            'obat' => $this->db->get('obat')->result_array(),
            'tindakan' => $this->db->get('tindakan')->result_array(),
        ];
        $this->template->load('template', 'pemeriksaan/polimata', $data);
    }
    function anak()
    {
        $data = [
            'pemeriksaan' => $this->model->getPemeriksaanPoli(['id_poliklinik' => 3]),
            'diagnosa' => $this->db->get('diagnosa')->result_array(),
            'obat' => $this->db->get('obat')->result_array(),
            'tindakan' => $this->db->get('tindakan')->result_array(),
        ];
        $this->template->load('template', 'pemeriksaan/polianak', $data);
    }
    function lansia()
    {
        $data = [
            'pemeriksaan' => $this->model->getPemeriksaanPoli(['id_poliklinik' => 5]),
            'diagnosa' => $this->db->get('diagnosa')->result_array(),
            'obat' => $this->db->get('obat')->result_array(),
            'tindakan' => $this->db->get('tindakan')->result_array(),
        ];
        $this->template->load('template', 'pemeriksaan/polilansia', $data);
    }
    function KIA_MTBS_KB()
    {
        $data = [
            'pemeriksaan' => $this->model->getPemeriksaanPoli(['id_poliklinik' => 9]),
            'diagnosa' => $this->db->get('diagnosa')->result_array(),
            'obat' => $this->db->get('obat')->result_array(),
            'tindakan' => $this->db->get('tindakan')->result_array(),
        ];
        $this->template->load('template', 'pemeriksaan/polikia-mtbs-kb', $data);
    }
    function gizi()
    {
        $data = [
            'pemeriksaan' => $this->model->getPemeriksaanPoli(['id_poliklinik' => 10]),
            'diagnosa' => $this->db->get('diagnosa')->result_array(),
            'obat' => $this->db->get('obat')->result_array(),
            'tindakan' => $this->db->get('tindakan')->result_array(),
        ];
        $this->template->load('template', 'pemeriksaan/poligizi', $data);
    }
    function periksa()
    {
        $id = $this->input->post('id_pemeriksaan');
        $id_tindakan = $this->input->post('id_tindakan');
        $pasien = $this->input->post('pasien');
        $data = [
            'id_diagnosa' => $this->input->post('id_diagnosa'),
            'id_tindakan' => $id_tindakan,
            'catatan' => $this->input->post('catatan'),
            'status' => 1,
            'tanggal_pemeriksaan' => date('Y-m-d H:i:s')
        ];
        $this->db->where('id_pemeriksaan', $id);
        $this->db->update('pemeriksaan', $data);

        $tindakan = $this->db->get_where('tindakan', ['id_tindakan' => $id_tindakan]);
        $rowtindakan = $tindakan->row();
        $hargatindakan = $rowtindakan->harga;

        $hargaobat = 0;

        $resepData = $this->input->post('perobat');

        // Loop melalui data resep
        foreach ($resepData as $resepItem) {
            $query = $this->db->get_where('obat', ['nama' => $resepItem['obat']]);
            $row = $query->row();
            $id_obat = $row->id_obat;           
            $stok_obat_saat_ini = $row->stok;
            $harga_obat = $row->harga;

            $stok_obat_baru = $stok_obat_saat_ini - $resepItem['qty'];

            $this->db->where('id_obat', $id_obat);
            $this->db->update('obat', ['stok' => $stok_obat_baru]);

            $data1 = [
                'id_pemeriksaan' => $id,
                'id_obat' => $id_obat,
                'jumlah' => $resepItem['qty'],
                'satuan' => $resepItem['satuan'],
                'aturan_pakai' => $resepItem['aturan'],
                'tanggal_resep' => date('Y-m-d H:i:s')
            ];
            $this->db->insert('resep_obat', $data1);

            $hargaobat += ($harga_obat * $resepItem['qty']);
        }
        $totalharga = $hargatindakan + $hargaobat;


        $data2 = [
            'id_pemeriksaan' => $id,
            'total_biaya' => $totalharga,
            'status' => 1
        ];
        $this->db->insert('pembayaran', $data2);
        $this->session->set_flashdata('message2', '<div class="alert alert-success" role="alert">Data Pemeriksaan atas nama pasien '.$pasien.' telah diperiksa silahkan ke pembayaran untuk membayar!</div>');
        $response = ['message' => 'Data berhasil disimpan '];
        echo json_encode($response);
    }
    function periksamedis($id)
    {
      
        $data = [
            'periksamedis' =>$this->model->getPeriksaMedis(['id_pemeriksaan'=>$id]),
            'tindakan' =>$this->db->get('tindakan')->result_array(),
            'diagnosa' =>$this->db->get('diagnosa')->result_array(),
            'obat' =>$this->db->get('obat')->result_array(),
            'resep_obat' =>$this->db->get('resep_obat')->result_array(),
        ];
        $this->template->load('template', 'pemeriksaan/periksa_medis', $data);
    }
}