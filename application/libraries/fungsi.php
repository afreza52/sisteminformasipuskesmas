<?php
class fungsi
{

    protected $ci;

    function __construct()
    {
        $this->ci =& get_instance();

    }
    function user_login()
    {
        $id_user = $this->ci->session->userdata('id_user');
        $user_data = $this->ci->db->get('user', ['id_user' => $id_user])->row();
        return $user_data;
    }
    function count_dokter()
    {
        $this->ci->db->from('dokter');
        $result = $this->ci->db->count_all_results();

        return $result;
    }
    function count_pendaftaran()
    {
        $this->ci->db->from('pendaftaran');
        $result = $this->ci->db->count_all_results();

        return $result;
    }
    function count_poliklinik()
    {
        $this->ci->db->from('poliklinik');
        $result = $this->ci->db->count_all_results();

        return $result;
    }
    function count_pasien()
    {
        $this->ci->db->from('pasien');
        $result = $this->ci->db->count_all_results();

        return $result;
    }
}