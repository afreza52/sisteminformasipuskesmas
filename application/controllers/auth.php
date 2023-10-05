<?php

class Auth extends CI_Controller
{
    function login()
    {
        $this->load->view('login');
    }
    function process()
    {
        $username = $this->input->post('username');
        $query = $this->db->get_where('user', ['username' => $username], 1);

        if ($query->num_rows() > 0) {
            $user = $query->row();
            if (password_verify($this->input->post('password'), $user->password)) {
                $data = [
                    'id_user' => $user->id_user,
                    'role' => $user->role
                ];
                $this->session->set_userdata($data);

                redirect('dashboard');
            }
        }

        $this->session->set_flashdata('error', 'Maaf, login gagal, username / password salah');
        redirect('auth/login');
    }
    function logout()
    {
        $data = ['id_user', 'role'];
        $this->session->sess_destroy($data);
        redirect('auth/login');
    }
}