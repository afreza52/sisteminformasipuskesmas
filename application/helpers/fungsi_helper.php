<?php

function check_already_login()
{
    $ci =& get_instance();
    $user_session = $ci->session->userdata('id_user');
    if ($user_session) {
        redirect('dashboard');
    }
}
function check_not_login()
{
    $ci =& get_instance();
    $user_session = $ci->session->userdata('id_user');
    if (!$user_session) {
        redirect('auth');
    }
}
function check_admin()
{
    $ci =& get_instance();
    if ($ci->fungsi->user_login()->role != 1) {
        redirect('dashboard');
    }
}
function check_petugas()
{
    $ci =& get_instance();
    $role = $ci->fungsi->user_login()->role;
    if ($role != 1 && $role != 2) {
        redirect('dashboard');
    }
}
function check_dokter()
{
    $ci =& get_instance();
    $role = $ci->fungsi->user_login()->role;
    if ($role != 1 && $role != 3) {
        redirect('dashboard');
    }
}