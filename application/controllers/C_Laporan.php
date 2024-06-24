<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Laporan extends SDA_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Nasabah_model');
		$this->load->model('Operasional_model');
		$this->load->model('Akuntasi_model');
		$this->load->model('Transaksi_model');
		$this->load->model('Laporan_model');
		$this->load->model('Pelapak_model');
		$this->load->helper('pdf');
		$this->requiredLogin();
		preventAccessPengguna(
			array(
				AD
			)
		);
	}
	public function index()
	{

		$data['judul'] = "Halaman Tambah Nasabah";
		$data['nasabah'] = $this->Nasabah_model->get();
		$data['pelapak'] = $this->Pelapak_model->get();
		// var_dump($data['Pelapak']);
		// die;
		$this->form_validation->set_rules('jenis_data', 'jenis_data', 'required', [
			'required' => 'jenis_data Nasabah Wajib di isi'
		]);
		// $this->form_validation->set_rules('format', 'format', 'required', [
		// 	'required' => 'format Wajib di isi',
		// ]);
		$this->form_validation->set_rules('rentang_waktu', 'rentang_waktu', 'required', [
			'required' => 'rentang_waktu Wajib di isi',
		]);
		if ($this->form_validation->run() == false) {
			$this->load->view('pages/layout/header', $data);
			$this->load->view("pages/Laporan/laporan", $data);
			$this->load->view('pages/layout/footer', $data);
		} else {

			$jenis = $this->input->post('jenis_data');
			$tanggal_mulai = $this->input->post('tanggal_mulai');
			$tanggal_selesai = $this->input->post('tanggal_selesai');

			$rentang_waktu = $this->input->post('rentang_waktu');
			$nama_nasabah = $this->input->post('nama_nasabah');
			$nama_pelapak = $this->input->post('nama_pelapak');

			$format = 'PDF';
			if ($format == "PDF") {
				// $this->load->library('pdf11');

				$this->load->library('M_pdf');
				//laporan untuk jenis nasabah
				if ($jenis == 'Transaksi Nasabah') {
					$data['transaksi'] = $this->Transaksi_model->Laporan_all($nama_nasabah, $tanggal_mulai, $tanggal_selesai);
					// pernasabah
					if ($nama_nasabah != '') {
						$data['nama_nasabah'] = $this->Nasabah_model->getById($nama_nasabah);
						//secara keseluruhan
					} else {
						$data['nama_nasabah'] = '';
					}
					//pertanggal
					if ($tanggal_mulai != '') {
						$data['priode'] = $tanggal_mulai . 's/d' . $tanggal_selesai;
						//tanggal keseluruhan
					} else {
						$data['priode'] = 'Seluruh';
					}
					$data['total_trans'] = $this->Laporan_model->total_transnasabah($nama_nasabah, $tanggal_mulai, $tanggal_selesai);
					// menggunakan mpdf
					$html = $this->load->view('pages/Laporan/PDF_Nasabah', $data, TRUE);
					// Memuat HTML ke mPDF
					$this->m_pdf->pdf->WriteHTML($html);

					// Menyimpan PDF ke file
					$this->m_pdf->pdf->Output('Laporan Transaksi Nasabah.pdf', 'I'); // 'I' untuk output ke browser, 'D' untuk download, 'F' untuk menyimpan file
				} else if ($jenis == "Debit Kredit Nasabah") {
					// Tambahkan logika untuk "Debit Kredit Nasabah"
					$data['transaksi'] = $this->Laporan_model->fech_debitkredit($nama_nasabah, $tanggal_mulai, $tanggal_selesai)->result_array();
					// var_dump($data['transaksi']);
					// die; 
					if ($nama_nasabah != '') {
						$data['nama_nasabah'] = $this->Nasabah_model->getById($nama_nasabah);
					} else {
						$data['nama_nasabah'] = '';
					}
					if ($tanggal_mulai != '') {
						$data['priode'] = $tanggal_mulai . 's/d' . $tanggal_selesai;

					} else {
						$data['priode'] = 'Seluruh';
					}
					$totalKredit = 0;
					$totalDebit = 0;
					if ($data['transaksi']) {
						foreach ($data['transaksi'] as $us) {
							$debit = 0;
							$kredit = 0;
							if ($us['jenis_'] == 'nasabah') {
								$debit = $us['harga_'];
							} else {
								$kredit = $us['harga_'];
							}
							$totalKredit += $kredit;
							$totalDebit += $debit;

						}
					}

					$data['debit_'] = $totalDebit;
					$data['kredit_'] = $totalKredit;
					// var_dump($data['debit']);
					// die;

					// menggunakan mpdf
					$html = $this->load->view('pages/Laporan/PDF_Debitkredit', $data, TRUE);
					// Memuat HTML ke mPDF
					$this->m_pdf->pdf->WriteHTML($html);

					// Menyimpan PDF ke file
					$this->m_pdf->pdf->Output('Laporan Transaksi Nasabah.pdf', 'I'); // 'I' untuk output ke browser, 'D' untuk download, 'F' untuk menyimpan file

				} else if ($jenis == "Transaksi Penjualan") {
					// Tambahkan logika untuk "Transaksi Penjualan"
					$data['transaksi'] = $this->Laporan_model->fect_penjualan($nama_pelapak, $tanggal_mulai, $tanggal_selesai)->result_array();
					// var_dump($data['transaksi']);
					// die;
					if ($nama_pelapak != '') {
						$data['nama_pelapak'] = $this->Pelapak_model->getById($nama_pelapak);
					} else {
						$data['nama_pelapak'] = '';
					}
					if ($tanggal_mulai != '') {
						$data['priode'] = $tanggal_mulai . 's/d' . $tanggal_selesai;
					} else {
						$data['priode'] = 'Seluruh';
					}
					$html = $this->load->view('pages/Laporan/PDF_Penjualan', $data, TRUE);
					// Memuat HTML ke mPDF
					$this->m_pdf->pdf->WriteHTML($html);

					// Menyimpan PDF ke file
					$this->m_pdf->pdf->Output('Laporan Transaksi Penjualan ke pelapak.pdf', 'I'); // 'I' untuk output ke browser, 'D' untuk download, 'F' untuk menyimpan file
				} else if ($jenis == "Jurnal Akuntasi") {
					// Tambahkan logika untuk "Jurnal Akuntasi"
					$data['transaksi'] = $this->Laporan_model->fect_akuntasi($tanggal_mulai, $tanggal_selesai)->result_array();
					if ($tanggal_mulai != '') {
						$data['priode'] = $tanggal_mulai . 's/d' . $tanggal_selesai;

					} else {
						$data['priode'] = 'Seluruh';
					}
					$totalKredit = 0;
					$totalDebit = 0;
					if ($data['transaksi']) {
						foreach ($data['transaksi'] as $us) {
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
						$data['debit_'] = $totalDebit;
						$data['kredit_'] = $totalKredit;
					}
					$html = $this->load->view('pages/Laporan/PDF_Akuntasi', $data, TRUE);
					// Memuat HTML ke mPDF
					$this->m_pdf->pdf->WriteHTML($html);

					// Menyimpan PDF ke file
					$this->m_pdf->pdf->Output('Laporan Jurnal Akuntasi.pdf', 'I');

				} else if ($jenis == "Operasional") {
					// Tambahkan logika untuk "Operasional"
					$data['transaksi'] = $this->Laporan_model->fect_operasional($tanggal_mulai, $tanggal_selesai);
					// var_dump($data['transaksi']);
					// die; 
					if ($nama_nasabah != '') {
						$data['nama_nasabah'] = $this->Nasabah_model->getById($nama_nasabah);
					} else {
						$data['nama_nasabah'] = '';
					}
					if ($tanggal_mulai != '') {
						$data['priode'] = $tanggal_mulai . 's/d' . $tanggal_selesai;

					} else {
						$data['priode'] = 'Seluruh';
					}
				} else {
					echo 'selesai';
				}
				$html = $this->load->view('pages/Laporan/PDF_Operasional', $data, TRUE);
				// Memuat HTML ke mPDF
				$this->m_pdf->pdf->WriteHTML($html);

				// Menyimpan PDF ke file
				$this->m_pdf->pdf->Output('Laporan operasional.pdf', 'I');


			} else {
				// Logika untuk format selain PDF
			}



		}
	}

	function fetch()
	{
	}

}
