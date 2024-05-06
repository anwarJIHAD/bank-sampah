<?php
function is_logged_in() //membatasi akses ke halaman admin
{
    $ci = get_instance();
    if (!$ci->session->userdata('NIP')) {
        redirect('auth');
    } else {
        $role = $ci->session->userdata('role');
        if ($role != "Admin") {
            redirect('Pegawai/Pegawai');
        }
    }
}
function is_logged_in2() //membatasi akses ke halaman user
{
    $ci = get_instance();
    if (!$ci->session->userdata('NIP')) {
        redirect('auth');
    } else {
        $role = $ci->session->userdata('role');
        if ($role == "Admin") {
            redirect('Admin/Admin/dashboard');

        }
    }
}

?>