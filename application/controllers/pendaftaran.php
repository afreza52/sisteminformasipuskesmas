<?php
class Pendaftaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        check_petugas();
    }
    function daftarbaru()
    {
        $data = [
            'poliklinik'=> $this->db->get('poliklinik')->result_array(),
            'norm'=> $this->model->norm()
        ]; 
        

        $this->form_validation->set_rules('no_rm', 'Nomor Rekam Medis', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nama_pasien', 'Nama Pasien', 'required');
        $this->form_validation->set_rules('nomor_telpon', 'Nomor Telpon', 'required');
        $this->form_validation->set_rules('id_poliklinik', 'Poliklinik', 'required');
        $this->form_validation->set_rules('id_dokter', 'Dokter', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('tanggal_pendaftaran', 'tanggal pendaftaran', 'required');

        if ($this->form_validation->run() == false) {
            $this->template->load('template', 'pendaftaran/daftar', $data);

        } else {
            $data1 = [
                'nomor_rekam_medis' => $this->input->post('no_rm'),
                'nik' => $this->input->post('nik'),
                'nama' => $this->input->post('nama_pasien'),
                'nomor_telpon' => $this->input->post('nomor_telpon'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'jenis_pasien' => $this->input->post('jenis_pasien'),
                'alamat' => $this->input->post('alamat'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
    
            ];
            $this->db->insert('pasien', $data1);
            $id_pasien = $this->db->insert_id();
            $data2 = [
                'tanggal_pendaftaran' => $this->input->post('tanggal_pendaftaran'),
                'id_pasien' => $id_pasien,
                'id_poliklinik' => $this->input->post('id_poliklinik'),
                'id_dokter' => $this->input->post('id_dokter'),
            ];
            $this->db->insert('pendaftaran', $data2);
            $id_pendaftaran = $this->db->insert_id();
            $data3 = [
                'id_pendaftaran' => $id_pendaftaran,
                'status' => 2
            ];
            $this->db->insert('pemeriksaan',$data3);
            $this->session->set_flashdata('message2', '<div class="alert alert-success" role="alert">Pendaftran Berhasil!</div>');
            redirect('pendaftaran/daftarbaru');
        }
    }
    public function getDokterByPoliklinik()
    {
        // Ambil id_poliklinik dari permintaan AJAX
        $id_poliklinik = $this->input->post('id_poliklinik');

        // Validasi id_poliklinik (pastikan sesuai dengan kebutuhan Anda)

        // Lakukan query untuk mengambil data dokter berdasarkan id_poliklinik
        $query = $this->db->query("SELECT dokter.*,dokter.nama as dokter FROM dokter WHERE id_poliklinik = ?", array($id_poliklinik));

        // Periksa apakah query berhasil dijalankan
        if ($query) {
            // Ambil hasil query dalam bentuk array
            $dokter = $query->result();

            // Kirim data dokter sebagai respons JSON
            echo json_encode($dokter);
        } else {
            // Jika query gagal, kirim respons error
            echo json_encode(array('error' => 'Gagal mengambil data dokter.'));
        }
    }

    function daftarlama()
    {
        $data['pasien'] = $this->db->get('pasien')->result_array();
        $data['dokter'] = $this->db->get('dokter')->result_array();
        $data['poliklinik'] = $this->db->get('poliklinik')->result_array();

       
        $this->form_validation->set_rules('id_pasien', 'Pasien', 'required');
        $this->form_validation->set_rules('id_poliklinik', 'Poliklinik', 'required');
        $this->form_validation->set_rules('id_dokter', 'Dokter', 'required');
        $this->form_validation->set_rules('tanggal_pendaftaran', 'tanggal pendaftaran', 'required');

        if ($this->form_validation->run() == false) {
            $this->template->load('template', 'pendaftaran/daftar1', $data);

        }else{
            $data2 = [
                'tanggal_pendaftaran' => $this->input->post('tanggal_pendaftaran'),
                'id_pasien' => $this->input->post('id_pasien'),
                'id_poliklinik' => $this->input->post('id_poliklinik'),
                'id_dokter' => $this->input->post('id_dokter')
            ];
            $this->db->insert('pendaftaran', $data2);
            $id_pendaftaran = $this->db->insert_id();
            $data3 = [
                'id_pendaftaran' => $id_pendaftaran,
                'status' => 2
            ];
            $this->db->insert('pemeriksaan',$data3);
            $this->session->set_flashdata('message2', '<div class="alert alert-success" role="alert">Pendaftran Berhasil!</div>');
            redirect('pendaftaran/daftarlama');
        }

    }
    function terdaftar()
    {
        $data['pendaftaran'] = $this->model->pendaftaran();
        $this->template->load('template', 'pendaftaran/terdaftar', $data);
    }
    function delet($id)
    {
        $this->db->where('id_pendaftaran', $id);
        $this->db->delete('pendaftaran');
        $this->session->set_flashdata('message2', '<div class="alert alert-success" role="alert">pendaftaran telah dihapus!</div>');
        redirect('pendaftaran');
    }
    function caripasien()
    {
        $id = $this->input->get('id');
        if ($id == '') {
            $data['val'] = 2;
        } else {
            $isi = $this->db->get_where('pasien', ['nomor_rekam_medis'=>$id])->row();
            if (empty($isi)) {
                $data['val'] = 0;
            } else {
                $data['val'] = 1;
                $data['data'] = $isi;
            }
        }
        $this->output->set_content_type('application/json');
        echo json_encode($data);
    }
    function get_current_time() {
        date_default_timezone_set('Asia/Jakarta');
        echo date('Y-m-d H:i:s');
    }
    // function simpanPasienBaru()
    // {
    //     $data1 = [
    //         'nik' => $this->input->post('nik'),
    //         'nama' => $this->input->post('nama_pasien'),
    //         'nomor_telpon' => $this->input->post('nomor_telpon'),
    //         'jenis_kelamin' => $this->input->post('jenis_kelamin'),
    //         'alamat' => $this->input->post('alamat'),
    //         'tanggal_lahir' => $this->input->post('tanggal_lahir'),

    //     ];
    //     $this->db->insert('pasien', $data1);
    //     $id_pasien = $this->db->insert_id();
    //     $data2 = [
    //         'tanggal_pendaftaran' => $this->input->post('tanggal_pendaftaran'),
    //         'id_pasien' => $id_pasien,
    //         'id_poliklinik' => $this->input->post('id_poliklinik'),
    //         'id_dokter' => $this->input->post('id_dokter'),
    //     ];
    //     $this->db->insert('pendaftaran', $data2);
    //     $id_pendaftaran = $this->db->insert_id();
    //     $data3 = [
    //         'id_pendaftaran' => $id_pendaftaran,
    //         'status' => 2
    //     ];
    //     $this->db->insert('pemeriksaan',$data3);
    //     $this->session->set_flashdata('message2', '<div class="alert alert-success" role="alert">Pendaftran Berhasil!</div>');
    //     redirect('pendaftaran/daftar');
    // }
    // function simpanPasienLama()
    // {
    //     $data2 = [
    //         'tanggal_pendaftaran' => $this->input->post('tanggal_pendaftaran'),
    //         'id_pasien' => $this->input->post('id_pasien'),
    //         'id_poliklinik' => $this->input->post('id_poliklinik'),
    //         'id_dokter' => $this->input->post('id_dokter')
    //     ];
    //     $this->db->insert('pendaftaran', $data2);
    //     $id_pendaftaran = $this->db->insert_id();
    //     $data3 = [
    //         'id_pendaftaran' => $id_pendaftaran,
    //         'status' => 2
    //     ];
    //     $this->db->insert('pemeriksaan',$data3);
    //     $this->session->set_flashdata('message2', '<div class="alert alert-success" role="alert">Pendaftran Berhasil!</div>');
    //     redirect('pendaftaran/daftar');
    // }

}