<?php
class laporan extends CI_Controller
{
    function pendaftaran()
    {
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $jenis_pasien = $this->input->post('jenis_pasien');

        $data['pendaftaran'] = $this->model->pendaftaranfilter($start_date,$end_date,$jenis_pasien);
        $this->template->load('template', 'laporan/pendaftaran', $data);

    }

    function cetakpendaftaran()
    {
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $jenis_pasien = $this->input->post('jenis_pasien');

        $data['pendaftaran'] = $this->model->pendaftaranfilter($start_date,$end_date,$jenis_pasien);
        $this->template->cetak('cetak', 'laporan/cetak_pendaftaran', $data);

    }
}