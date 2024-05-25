<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Dashboard extends SDA_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Operasional_model');
		$this->load->model('Dashboard_model');

		$this->requiredLogin();
		preventAccessPengguna(
			array(
				AD
			)
		);
	}
	public function index()
	{
		$data1 = $this->Operasional_model->fetch_data_akuntasi('');
		$totalKredit = 0;
		$totalDebit = 0;
		foreach ($data1->result_array() as $us) {
			$debit = 0;
			$kredit = 0;
			if ($us['jenis_'] == 'pelapak') {
				$debit = $us['harga_'];
			} else {
				$kredit = $us['harga_'];
			}
			$totalKredit += $kredit;
			$totalDebit += $debit;
		}
		$data['operasional'] = $this->Operasional_model->sumPendapatan();
		// var_dump($data['operasional']);
		// die;
		$data['debit'] = $totalDebit;
		$data['kredit'] = $totalKredit;
		$data['nasabah'] = $this->Dashboard_model->jumlah_nasabah();
		$data['sampah'] = $this->Dashboard_model->jumlah_sampah();
		$data['judul'] = "Halaman Dashboard";
		$data['judul'] = "Halaman Dashboard";
		$this->load->view('pages/layout/header', $data);
		$this->load->view("pages/Dashboard", $data);
		$this->load->view('pages/layout/footer', $data);
	}


}
