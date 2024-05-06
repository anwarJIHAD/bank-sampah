<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SDA_Controller extends CI_Controller
{

	/**
	 * variable untuk keperluan SEO
	 */
	protected $siteName = 'Sistem Bank Sampah';
	protected $metaAuthor = 'banksampah.com';
	protected $metaAppId = '';
	protected $metaImage = array();
	protected $metaUrl = array();
	protected $metaTitle = array(
		'default' => 'Sistem Informasi Bank Sampah',
	);
	protected $metaDescription = array(
		'default' => 'Sistem Informasi Bank Sampah',
	);
	protected $metKeyword = array(
		'default' => 'bank sampah, sampah, sampah,  banksampah',
	);


	/**
	 * @var array data2 yang akan di tampilkan di setiap halaman
	 */
	protected $recentBerita = array();


	public function __construct()
	{
		date_default_timezone_set("Asia/Jakarta");

		parent::__construct();
		define('SITE_NAME', $this->siteName);
		define('SITE_LOGO', base_url('assets/app/media/img/logos/logo.png'));
		define('PATH_FOTO', ('uploads/foto/'));
		define('PATH_MEDIA', ('uploads/media/'));
		define('IMG', PATH_MEDIA . ('img/'));
		define('IMG_S', PATH_MEDIA . ('small/'));
		define('IMG_M', PATH_MEDIA . ('medium/'));
		define('IMG_L', PATH_MEDIA . ('large/'));
		define('FILE', PATH_MEDIA . ('files/'));
		define('SA', 'Super Administrator');
		define('UB', 'User Biasa');
		define('AD', 'admin');



		define('is_login', $this->session->userdata('is_login'));

		$this->load->helper('commonutility');
		$this->load->helper('grantaccess');
		$this->load->helper('sending');
		$this->load->helper('template');

		// $this->load->library('datatables');
		// $this->load->library('pagination');

		$this->load->model('User_model');


		define('time_now', date('Y-m-d H:i:s'));
		define('day_now', date('Y-m-d'));

		define('login_type', $this->session->userdata('login_type'));
	}

	function requiredLogin()
	{
		if (!$this->session->userdata('is_login'))
			redirect('Auth');
	}





	function adddLog($action = '', $desc = '', $pengguna_id = NULL)
	{
		$_CLIENT = getClientIpAndMac();
		$this->Md_log->addData([
			'owner' => 'pengguna',
			'owner_id' => (!$pengguna_id ? penggunaId() : $pengguna_id),
			'tgl' => date('Y-m-d'),
			'jenis_aksi' => $action,
			'keterangan' => $desc,
			'jam' => date('H:i:s'),
			'ip' => $_CLIENT['IP'],
			'mac_address' => $_CLIENT['MAC'],
			'status' => 1,
		]);
	}

	function addLogResp($action = '', $desc = '', $responden_id = NULL)
	{
		$_CLIENT = getClientIpAndMac();
		$this->Md_log->addData([
			'owner' => 'responden',
			'owner_id' => respondenId(),
			'tgl' => date('Y-m-d'),
			'jenis_aksi' => $action,
			'keterangan' => $desc,
			'jam' => date('H:i:s'),
			'ip' => $_CLIENT['IP'],
			'mac_address' => $_CLIENT['MAC'],
			'status' => 1,
		]);
	}
}
