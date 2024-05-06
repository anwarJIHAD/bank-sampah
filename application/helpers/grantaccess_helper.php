<?php

defined('BASEPATH') or exit('No direct script access allowed');


function penggunaFoto($link = '')
{
    $CI = &get_instance();

    $default = base_url('assets/app/media/img/users/') . 'default.jpg';
    $url = $link ? $link : $CI->session->userdata('foto');

    $cek = $url ? true : false; //@file_get_contents($url);


    return $cek ? $url : $default;
}

function get_http_response_code($url)
{
    $headers = get_headers($url);
    return substr($headers[0], 9, 3);
}

function isPengguna($role = array())
{
    $CI = &get_instance();
    if ($CI->session->userdata('is_login')) {
        if (in_array(login_type, $role)) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function isResponden()
{
    $CI = &get_instance();
    if ($CI->session->userdata('is_responden')) {
        return true;
    } else {
        return false;
    }
}

function penggunaId()
{
    $CI = &get_instance();
    return $CI->session->userdata('id_user');
}
function memberId()
{
    $CI = &get_instance();
    return $CI->session->userdata('data_member')['member_id'];
}

function respondenId()
{
    $CI = &get_instance();
    return $CI->session->userdata('responden_id');
}

function penggunaName()
{
    $CI = &get_instance();
    return $CI->session->userdata('nama');
}

function preventAccessPengguna($role = array())
{
    if (!isPengguna($role)) notFound();
}
