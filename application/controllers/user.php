<?php
class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
    }
    // function index()
    // {
    //     $data['user'] = $this->db->get('user')->result_array();
    //     $this->template->load('template', 'user/index', $data);


    // }
    function index()
    {
        $data['user'] = $this->db->get('user')->result_array();
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[user.username]');
        $this->form_validation->set_rules('no_hp', 'NO Telpon', 'required|min_length[12]|max_length[12]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');
        $this->form_validation->set_rules(
            'passkonf',
            'Konfirmasi Password',
            'required|matches[password]',
            [
                'matches' => '%s Tidak sesuai dengan password'
            ]
        );
        $this->form_validation->set_rules('role', 'Role', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_message('min_length', '%s minimal 4 karakter');
        $this->form_validation->set_message('is_unique', '%s username sudah ada silahkan ganti');

        if ($this->form_validation->run() == false) {
            $this->template->load('template', 'user/index', $data);
        } else {

            $data = [
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'no_hp' => $this->input->post('no_hp'),
                'alamat' => $this->input->post('alamat'),
                'role' => $this->input->post('role'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message2', '<div class="alert alert-success" role="alert">User telah ditambhakan!</div>');
            redirect('user');
        }
    }

    function edit($id)
    {
        $data['user'] = $this->db->get('user')->result_array();
        $this->form_validation->set_rules('diperbarui', 'Diperbarui', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('username1', 'Username', 'required|min_length[5]|is_unique[user.username]');
        $this->form_validation->set_rules('no_hp', 'NO Telpon', 'required|min_length[12]|max_length[12]');
        if ($this->input->post('password')) {
            $this->form_validation->set_rules('password', 'Password', 'min_length[4]');
        }
        if ($this->input->post('passkonf')) {
            $this->form_validation->set_rules(
                'passkonf',
                'Konfirmasi Password',
                'matches[password]',
                [
                    'matches' => '%s Tidak sesuai dengan password'
                ]
            );
        }
        $this->form_validation->set_rules('role1', 'Role', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_message('required', '%s masih kosong,silahkan isi');
        $this->form_validation->set_message('min_length', '%s minimal 4 karakter');
        $this->form_validation->set_message('is_unique', '%s username sudah ada silahkan ganti');

        if ($this->form_validation->run() == false) {
            $this->template->load('template', 'user/index', $data);
        } else {
            $data = [
                'username' => $this->input->post('username1'),
                'nama' => $this->input->post('nama'),
                'no_hp' => $this->input->post('no_hp'),
                'alamat' => $this->input->post('alamat'),
                'diperbarui' => $this->input->post('diperbarui'),
                'role' => $this->input->post('role1')
            ];
            if (!empty($this->input->post('password'))) {
                $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            }
            $this->db->where('id_user', $id);
            $this->db->update('user', $data);
            $this->session->set_flashdata('message2', '<div class="alert alert-success" role="alert">User telah diubah!</div>');
            redirect('user');
        }
    }
    function username_check()
    {
        $post = $this->input->post(null, true);
        $query = $this->db->query("SELECT * FROM user WHERE username= '$post[username]' AND user_id != '$post[user_id]'");
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('username_check', '%s ini sudah dipakai');
            return false;
        } else {
            return true;
        }
    }
    function delete($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('user');
        $this->session->set_flashdata('message3', '<div class="alert alert-success" role="alert">User telah dihapus!</div>');
        redirect('user');
    }
}