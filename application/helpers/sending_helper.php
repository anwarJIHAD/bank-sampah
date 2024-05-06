<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Sending mail for CodeIgniter 3.x
 *
 * @package     CodeIgniter
 * @category    Helper
 * @version     1.0
 */

function send_mail($to, $subject, $body, $attach)
{
	$CI = get_instance();
	$CI->load->library('google_mail');

	$isEnable = true;

	$con = @fsockopen('mail.google.com', 80);

	if (!$isEnable) return true;

	if ($con) {
		$send = $CI->google_mail->sendGmail($to, $subject, $body, 'noreply@gmail.com', 'Pelayanan Publik', $Cc = false, $Bcc = false, $attach);
		return isset($send['status']) ? $send['status'] : false;
	} else {
		return false;
	}
}

function emailConfig()
{
	$config                 = array();

	$config['charset']      = 'utf-8';
	$config['useragent']    = 'Codeigniter';
	$config['protocol']     = "smtp";
	$config['mailtype']     = "html";
	$config['smtp_host']    = "ssl://smtp.gmail.com";
	$config['smtp_port']    = "465";
	$config['smtp_timeout'] = "60";
	$config['smtp_user']    = ''; //change this
	$config['smtp_pass']    = ''; //change this
	$config['crlf']         = "\r\n";
	$config['newline']      = "\r\n";
	$config['wordwrap']     = TRUE;

	return $config;
}
