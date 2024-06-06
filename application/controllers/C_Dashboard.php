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
		$this->load->model('Nasabah_model');
		$this->load->model('Transaksi_model');
		$this->load->model('Penjualan_model');
		$this->load->model('Pelapak_model');

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
		$data['top5_nasabah'] = $this->Transaksi_model->get5();
		$data['top5_Pelapak'] = $this->Penjualan_model->get5();
		
		$data['sampah'] = $this->Dashboard_model->jumlah_sampah();
		$data['transaksi_nasabah'] = $this->Dashboard_model->jumlah_transaksi_nasabah();
		$data['transaksi_pelapak'] = $this->Dashboard_model->jumlah_transaksi_pelapak();
		$data['jumlah_pelapak'] = $this->Dashboard_model->jumlah_pelapak();
		$data['judul'] = "Halaman Dashboard";
		$data['judul'] = "Halaman Dashboard";
		$tahun_sekarang = date('Y');
		$tahun_range = range($tahun_sekarang, $tahun_sekarang - 20, -1);
		$data['tahun'] = $tahun_range;
		$this->load->view('pages/layout/header', $data);
		$this->load->view("pages/Dashboard", $data);
		$this->load->view('pages/layout/footer', $data);
	}
	public function getTransNas()
	{
		$tahun = $this->input->get('tahun'); // Ambil tahun dari permintaan GET
		try {
			// Lakukan filter data sesuai dengan tahun untuk cuti
			$month_1 = '01';
			$month_2 = '02';
			$month_3 = '03';
			$month_4 = '04';
			$month_5 = '05';
			$month_6 = '06';
			$month_7 = '07';
			$month_8 = '08';
			$month_9 = '09';
			$month_10 = '10';
			$month_11 = '11';
			$month_12 = '12';

			$data['month_1'] = $this->Dashboard_model->getTransaksiNasabah($tahun, $month_1);
			$data['month_2'] = $this->Dashboard_model->getTransaksiNasabah($tahun, $month_2);
			$data['month_3'] = $this->Dashboard_model->getTransaksiNasabah($tahun, $month_3);
			$data['month_4'] = $this->Dashboard_model->getTransaksiNasabah($tahun, $month_4);
			$data['month_5'] = $this->Dashboard_model->getTransaksiNasabah($tahun, $month_5);
			$data['month_6'] = $this->Dashboard_model->getTransaksiNasabah($tahun, $month_6);
			$data['month_7'] = $this->Dashboard_model->getTransaksiNasabah($tahun, $month_7);
			$data['month_8'] = $this->Dashboard_model->getTransaksiNasabah($tahun, $month_8);
			$data['month_9'] = $this->Dashboard_model->getTransaksiNasabah($tahun, $month_9);
			$data['month_10'] = $this->Dashboard_model->getTransaksiNasabah($tahun, $month_10);
			$data['month_11'] = $this->Dashboard_model->getTransaksiNasabah($tahun, $month_11);
			$data['month_12'] = $this->Dashboard_model->getTransaksiNasabah($tahun, $month_12);


			// Kirim data dalam format JSON
			header('Content-Type: application/json');
			echo json_encode($data);
		} catch (Exception $e) {
			// Tangkap kesalahan dan kirim pesan kesalahan dalam format JSON
			header('HTTP/1.1 500 Internal Server Error');
			header('Content-Type: application/json');
			echo json_encode(array('error' => $e->getMessage()));
		}
	}

	public function getTransPel()
	{
		$tahun = $this->input->get('tahun'); // Ambil tahun dari permintaan GET
		try {
			// Lakukan filter data sesuai dengan tahun untuk cuti
			$month_1 = '01';
			$month_2 = '02';
			$month_3 = '03';
			$month_4 = '04';
			$month_5 = '05';
			$month_6 = '06';
			$month_7 = '07';
			$month_8 = '08';
			$month_9 = '09';
			$month_10 = '10';
			$month_11 = '11';
			$month_12 = '12';

			$data['month_1'] = $this->Dashboard_model->getTransaksiPelapak($tahun, $month_1);
			$data['month_2'] = $this->Dashboard_model->getTransaksiPelapak($tahun, $month_2);
			$data['month_3'] = $this->Dashboard_model->getTransaksiPelapak($tahun, $month_3);
			$data['month_4'] = $this->Dashboard_model->getTransaksiPelapak($tahun, $month_4);
			$data['month_5'] = $this->Dashboard_model->getTransaksiPelapak($tahun, $month_5);
			$data['month_6'] = $this->Dashboard_model->getTransaksiPelapak($tahun, $month_6);
			$data['month_7'] = $this->Dashboard_model->getTransaksiPelapak($tahun, $month_7);
			$data['month_8'] = $this->Dashboard_model->getTransaksiPelapak($tahun, $month_8);
			$data['month_9'] = $this->Dashboard_model->getTransaksiPelapak($tahun, $month_9);
			$data['month_10'] = $this->Dashboard_model->getTransaksiPelapak($tahun, $month_10);
			$data['month_11'] = $this->Dashboard_model->getTransaksiPelapak($tahun, $month_11);
			$data['month_12'] = $this->Dashboard_model->getTransaksiPelapak($tahun, $month_12);


			// Kirim data dalam format JSON
			header('Content-Type: application/json');
			echo json_encode($data);
		} catch (Exception $e) {
			// Tangkap kesalahan dan kirim pesan kesalahan dalam format JSON
			header('HTTP/1.1 500 Internal Server Error');
			header('Content-Type: application/json');
			echo json_encode(array('error' => $e->getMessage()));
		}
	}


}
