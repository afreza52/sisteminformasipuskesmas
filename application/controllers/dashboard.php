<?php
class dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
    }
    function index()
    {
        $data['pasien'] = $this->db->get('pasien')->result_array();
        $data['dokter'] = $this->model->getDokter();
        $data['poliklinik'] = $this->db->get('poliklinik')->result_array();
        $this->template->load('template', 'dashboard', $data);
    }
    function getRegistrationsByMonth()
    {
        $data = $this->model->getRegistrationsByMonth();
        echo json_encode($data);
    }
}