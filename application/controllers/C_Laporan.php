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
		$this->form_validation->set_rules('jenis_data', 'jenis_data', 'required', [
			'required' => 'jenis_data Nasabah Wajib di isi'
		]);
		$this->form_validation->set_rules('format', 'format', 'required', [
			'required' => 'format Wajib di isi',
		]);
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

			$format = $this->input->post('format');
			if ($format == "PDF") {
				// $this->load->library('pdf11');
				if ($rentang_waktu == 'semua') {
					$this->load->library('M_pdf');
					if ($jenis == 'Transaksi Nasabah') {
						$data['transaksi'] = $this->Transaksi_model->Laporan_all();

						$data['priode'] = 'Seluruh';
						$data['total_trans'] = $this->Laporan_model->total_transnasabah();

						// menggunakan mpdf
						$html = $this->load->view('pages/Laporan/PDF_Nasabah', $data, TRUE);
						// echo ($html);
						// die;
						// Memuat HTML ke mPDF
						$this->m_pdf->pdf->WriteHTML($html);

						// Menyimpan PDF ke file
						$this->m_pdf->pdf->Output('example.pdf', 'I'); // 'I' untuk output ke browser, 'D' untuk download, 'F' untuk menyimpan file

						//menggunakan xaspdf
						// $html = $this->load->view('pages/Laporan/PDF_Nasabah', $data, TRUE);

						// pdf_create($html, 'sample');

						// $html = $this->load->view('pages/Laporan/PDF_Nasabah', $data, true);
						// $this->pdf11->createPDF($html, 'mypdf', false);
					} else if ($jenis == "Debit Kredit Nasabah") {
						// Tambahkan logika untuk "Debit Kredit Nasabah"
					} else if ($jenis == "Transaksi Penjualan") {
						// Tambahkan logika untuk "Transaksi Penjualan"
					} else if ($jenis == "Jurnal Akuntasi") {
						// Tambahkan logika untuk "Jurnal Akuntasi"
					} else if ($jenis == "Operasional") {
						// Tambahkan logika untuk "Operasional"
					} else {
						echo 'selesai';
					}
				}

			} else {
				// Logika untuk format selain PDF
			}



		}
	}

	function fetch()
	{
	}

}
