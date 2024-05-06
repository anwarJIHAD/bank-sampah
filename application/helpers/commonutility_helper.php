<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * for create funtion that used bay all page
 */
$CI = &get_instance();
function echo_array($array = array())
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

function console($data)
{
    echo '<script>console.log(' . json_encode($data) . ')</script>';
}

function normalizeString($str = '')
{
    $str = strip_tags($str);
    $str = preg_replace('/[\r\n\t ]+/', ' ', $str);
    $str = preg_replace('/[\"\*\/\:\<\>\?\'\|]+/', ' ', $str);
    $str = strtolower($str);
    $str = html_entity_decode($str, ENT_QUOTES, "utf-8");
    $str = htmlentities($str, ENT_QUOTES, "utf-8");
    $str = preg_replace("/(&)([a-z])([a-z]+;)/i", '$2', $str);
    $str = str_replace(' ', '-', $str);
    $str = rawurlencode($str);
    $str = str_replace('%', '-', $str);
    return $str;
}

function titleUrl($title = '')
{
    return urldecode(strtolower(str_replace(' ', '-', trim($title))));
}

function encrypt($id = NULL)
{
    if (is_array($id)) return false;
    else {
        return rtrim(strtr(base64_encode($id), '+/', '-_'), '=');
    }
}

function decrypt($id = NULL)
{
    if (is_array($id)) return false;
    else {
        return (int) base64_decode(str_pad(strtr($id, '-_', '+/'), strlen($id) % 4, '=', STR_PAD_RIGHT));
    }
}

function upload_file($source = '', $upload_path = '', $allowed_types = '', $max_size = '', $new_name = '')
{
    $CI = &get_instance();

    if (!$source || !$upload_path || !$allowed_types || !$max_size) return 'Parameter Upload tidak lengkap';
    if (empty($_FILES[$source]['name'])) return 'Tidak ada file yang dipilih';

    if (!file_exists($upload_path)) {
        mkdir($upload_path, 0755, true);
    }

    // if ($max_size > ini_get("upload_max_filesize")*1000) return 'Setup MAX file terlalu besar'; // lebih besar dari max upload php ini
    $err = '';
    $config['upload_path']   = $upload_path; //buat folder dengan nama assets di root folder
    $config['allowed_types'] = $allowed_types;
    $config['max_size']      = $max_size;
    if ($new_name != '') $config['file_name'] = $new_name;

    $CI->load->library('upload');
    $CI->upload->initialize($config);

    if (!$CI->upload->do_upload($source)) {
        $err .= ($CI->upload->display_errors() == '<p>The file you are attempting to upload is larger than the permitted size.</p>' ? 'Pastikan ukuran file maksimum ' . $max_size . ' KB' : 'Pastikan format file ' . $allowed_types);
        return $err . $CI->upload->display_errors();
    } else {
        $uploadData = $CI->upload->data();
        return $uploadData;
    }
}

function resize_image($source = '', $destination = '', $new_name = '', $width = '', $height = '', $quality = '50%')
{
    $CI = &get_instance();

    if (!file_exists($destination)) {
        mkdir($destination, 0755, true);
    }

    $config['image_library']  = 'gd2';
    $config['source_image']   = $source;
    $config['create_thumb']   = FALSE;
    $config['maintain_ratio'] = $height ? FALSE : TRUE;
    $config['quality']        = $quality;
    $config['width']          = $width;
    if ($height) $config['height']         = $height;
    if ($new_name) $config['new_image']      = $destination . $new_name;
    $CI->load->library('image_lib');
    $CI->image_lib->initialize($config);
    if ($CI->image_lib->resize()) {
        return true;
    } else {
        // return $CI->image_lib->display_errors();
        return false;
    }
}

function clean_post($post_name = '')
{
    $CI = &get_instance();

    return trim(strip_tags($CI->input->post($post_name)));
}

function clean_script($post_name = '')
{
    $CI = &get_instance();

    return trim(str_replace('script>', 's c r i p t >', $CI->input->post($post_name)));
}

function client_ip()
{
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if (isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';

    return $ipaddress;
}

function cut_words($phrase, $max_words)
{
    $phrase_array = explode(' ', $phrase);
    if (count($phrase_array) > $max_words && $max_words > 0)
        $phrase = implode(' ', array_slice($phrase_array, 0, $max_words)) . '...';
    return $phrase;
}

function cut_char($pharse, $max_length)
{
    if (strlen($pharse) > $max_length) {
        return substr($pharse, 0, $max_length) . '...';
    } else {
        return $pharse;
    }
}

function slug($text)
{
    // replace non letter or digits by -
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    // trim
    $text = trim($text, '-');

    // remove duplicate -
    $text = preg_replace('~-+~', '-', $text);

    // lowercase
    $text = strtolower($text);

    if (empty($text)) {
        return 'n-a';
    }

    return $text;
}

function time_history($tanggal)
{
    $durasi  = duration($tanggal, date('Y-m-d H:i:s'));
    if ($durasi < 60) {
        $time = 'Just Now';
    } else if ($durasi < 3600) {
        $hasil = intval($durasi / 60);
        $time = $hasil . ' Mins Ago';
    } else if ($durasi < 86400) {
        $hasil = intval($durasi / 3600);
        $time = $hasil . ' Hrs Ago';
    } else if ($durasi < 604800) {
        $hasil = intval($durasi / 86400);
        $time = $hasil . ' Days Ago';
    } else {
        $time = 'At ' . date('d-M-Y H:i', strtotime($tanggal));
    }
    return $time;
}

function duration($start = "", $end = "")
{
    $strStart         = $start;
    $strEnd           = $end;

    $dteStart         = new DateTime($strStart);
    $dteEnd           = new DateTime($strEnd);

    $interval         = date_diff($dteStart, $dteEnd);

    $DaysToSecconds   = $interval->format('%a') * ((60 * 60) * 24);
    $HoursToSeconds   = $interval->format('%H') * (60 * 60);
    $MinutesToSeconds = $interval->format('%I') * 60;
    $SecondsToSeconds = $interval->format('%S');

    $TotalMinutes = $DaysToSecconds + $HoursToSeconds + $MinutesToSeconds + $SecondsToSeconds;
    return $TotalMinutes;
}

function tanggal($date, $dash = '-')
{
    $date = date('Y-m-d', strtotime($date));
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $date);

    return $pecahkan[2] . $dash . $bulan[(int)$pecahkan[1]] . $dash . $pecahkan[0];
}

function formatDate($format, $date)
{
    return date($format, strtotime($date));
}

function notFound()
{
    $CI = &get_instance();
    if ($CI->input->is_ajax_request()) {
        $json = array(
            'status' => false,
            'msg'    => 'Url Not Found'
        );
        echo json_encode($json);
        die;
    } else {
        show_404();
    }
}

function onlyAjax()
{
    $CI = &get_instance();
    if (!$CI->input->is_ajax_request()) {
        show_404();
    }
}

function convertNumberToRomawi($angka)
{
    $hsl = "";
    if ($angka < 1 || $angka > 5000) {
        // Statement di atas buat nentuin angka ngga boleh dibawah 1 atau di atas 5000
        $hsl = "Batas Angka 1 s/d 5000";
    } else {
        while ($angka >= 1000) {
            // While itu termasuk kedalam statement perulangan
            // Jadi misal variable angka lebih dari sama dengan 1000
            // Kondisi ini akan di jalankan
            $hsl .= "M";
            // jadi pas di jalanin , kondisi ini akan menambahkan M ke dalam
            // Varible hsl
            $angka -= 1000;
            // Lalu setelah itu varible angka di kurangi 1000 ,
            // Kenapa di kurangi
            // Karena statment ini mengambil 1000 untuk di konversi menjadi M
        }
    }


    if ($angka >= 500) {
        // statement di atas akan bernilai true / benar
        // Jika var angka lebih dari sama dengan 500
        if ($angka > 500) {
            if ($angka >= 900) {
                $hsl .= "CM";
                $angka -= 900;
            } else {
                $hsl .= "D";
                $angka -= 500;
            }
        }
    }
    while ($angka >= 100) {
        if ($angka >= 400) {
            $hsl .= "CD";
            $angka -= 400;
        } else {
            $angka -= 100;
        }
    }
    if ($angka >= 50) {
        if ($angka >= 90) {
            $hsl .= "XC";
            $angka -= 90;
        } else {
            $hsl .= "L";
            $angka -= 50;
        }
    }
    while ($angka >= 10) {
        if ($angka >= 40) {
            $hsl .= "XL";
            $angka -= 40;
        } else {
            $hsl .= "X";
            $angka -= 10;
        }
    }
    if ($angka >= 5) {
        if ($angka == 9) {
            $hsl .= "IX";
            $angka -= 9;
        } else {
            $hsl .= "V";
            $angka -= 5;
        }
    }
    while ($angka >= 1) {
        if ($angka == 4) {
            $hsl .= "IV";
            $angka -= 4;
        } else {
            $hsl .= "I";
            $angka -= 1;
        }
    }

    return ($hsl);
}

function penyebut($nilai)
{
    $nilai = abs($nilai);
    $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($nilai < 12) {
        $temp = " " . $huruf[$nilai];
    } else if ($nilai < 20) {
        $temp = penyebut($nilai - 10) . " belas";
    } else if ($nilai < 100) {
        $temp = penyebut($nilai / 10) . " puluh" . penyebut($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = penyebut($nilai / 100) . " ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = penyebut($nilai / 1000) . " ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = penyebut($nilai / 1000000) . " juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = penyebut($nilai / 1000000000) . " milyar" . penyebut(fmod($nilai, 1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = penyebut($nilai / 1000000000000) . " trilyun" . penyebut(fmod($nilai, 1000000000000));
    }
    return $temp;
}

function terbilang($nilai)
{
    if ($nilai < 0) {
        $hasil = "minus " . trim(penyebut($nilai));
    } else {
        $hasil = trim(penyebut($nilai));
    }
    return ucwords($hasil) . " Rupiah";
}

function jsonResult($status = false, $msg = '', $data = null)
{
    echo json_encode(array('status' => $status, 'msg' => $msg, 'data' => $data));
    die;
}

function folder($path)
{
    return './' . $path;
}

function addMediaDetail($media_id, $mediaData)
{
    $CI = &get_instance();
    $CI->load->model('Md_media_detail');

    // large
    list($width, $height, $type, $attr) = getimagesize(IMG_L . $mediaData['large']);
    $mediaLarge = array(
        'media_id'     => $media_id,
        'file_name'    => $mediaData['large'] ? $mediaData['large'] : '',
        'file_ext'     => pathinfo(IMG_L . $mediaData['large'], PATHINFO_EXTENSION),
        'jenis_ukuran' => 'large',
        'width'        => $width,
        'height'       => $height,
        'size'         => filesize(IMG_L . $mediaData['large']),
        'status'       => 1
    );
    $CI->Md_media_detail->addData($mediaLarge);

    list($width, $height, $type, $attr) = getimagesize(IMG_M . $mediaData['medium']);
    $mediaMedium = array(
        'media_id'     => $media_id,
        'file_name'    => $mediaData['medium'] ? $mediaData['medium'] : '',
        'file_ext'     => pathinfo(IMG_M . $mediaData['medium'], PATHINFO_EXTENSION),
        'jenis_ukuran' => 'medium',
        'width'        => $width,
        'height'       => $height,
        'size'         => filesize(IMG_M . $mediaData['medium']),
        'status'       => 1
    );
    $CI->Md_media_detail->addData($mediaMedium);

    list($width, $height, $type, $attr) = getimagesize(IMG_S . $mediaData['small']);
    $mediaSmall = array(
        'media_id'     => $media_id,
        'file_name'    => $mediaData['small'] ? $mediaData['small'] : '',
        'file_ext'     => pathinfo(IMG_S . $mediaData['small'], PATHINFO_EXTENSION),
        'jenis_ukuran' => 'small',
        'width'        => $width,
        'height'       => $height,
        'size'         => filesize(IMG_S . $mediaData['small']),
        'status'       => 1
    );
    $CI->Md_media_detail->addData($mediaSmall);
}

function getClientIpAndMac()
{
    $_IP_SERVER = $_SERVER['SERVER_ADDR'];
    $_IP_ADDRESS = $_SERVER['REMOTE_ADDR'];
    if ($_IP_ADDRESS == $_IP_SERVER) {
        ob_start();
        system('ipconfig /all');
        $_COMMAND  = ob_get_contents();
        ob_clean();
        $_SPLIT = strpos($_COMMAND, "Physical");
        $_RES = substr($_COMMAND, ($_SPLIT + 36), 17);
        return [
            'IP' => $_IP_ADDRESS,
            'MAC' => $_RES,
        ];
    } else {
        $_COMMAND = "arp -a $_IP_ADDRESS";
        ob_start();
        system($_COMMAND);
        $_RES = ob_get_contents();
        ob_clean();
        $_SPLIT = strstr($_RES, $_IP_ADDRESS);
        $_SPLIT_STRING = explode($_IP_ADDRESS, str_replace(" ", "", $_SPLIT));
        $_RES = @substr($_SPLIT_STRING[1], 0, 17);
        return [
            'IP' => $_IP_ADDRESS,
            'MAC' => $_RES,
        ];
    }
}
