
<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * for create funtion that used bay all page
 */
$CI = &get_instance();

function concatBreadCrumb($link, $anchor)
{
    return '<li class="m-nav__separator">-</li>
                <li class="m-nav__item">
                    <a href="' . ($link != 'javascript:;' ? base_url() : '') . $link . '" class="m-nav__link">
                        <span class="m-nav__link-text">' . $anchor . '</span>
                    </a>
                </li>';
}
function protoBreadCrumb($link, $anchor)
{
    return ' <li><a href="' . ($link != 'javascript:;' ? base_url() : '') . $link . '">' . $anchor . '</a></li>';
}

function link_halaman($slug = '', $id='')
{
    return base_url($slug . '/' . $id);
}

function cover_halaman($image = '')
{
    if (file_exists(folder($image)) && !is_dir($image)) {
        return base_url($image);
    } else {
        return base_url('assets/app/media/img/halaman/cover_default.jpg');
    }
}
