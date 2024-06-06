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
		$this->form_validation->set_rules('tanggal_mulai', 'tanggal_mulai', 'required', [
			'required' => 'tanggal_mulai Wajib di isi'
		]);
		$this->form_validation->set_rules('tanggal_selesai', 'tanggal_selesai', 'required', [
			'required' => 'tanggal_selesai Wajib di isi'
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
			$format = $this->input->post('format');
			if ($format == "PDF") {
				$this->load->library('pdf11');

				if ($jenis == "Transaksi Nasabah") {
					$html = $this->load->view('pages/Laporan/PDF_Nasabah', $data, true);
					$this->pdf11->createPDF($html, 'mypdf', false);
				} else if ($jenis == "Transaksi Penjualan") {
					// Tambahkan logika untuk "Transaksi Penjualan"
				} else if ($jenis == "Debit Kredit Nasabah") {
					// Tambahkan logika untuk "Debit Kredit Nasabah"
				} else if ($jenis == "Jurnal Akuntasi") {
					// Tambahkan logika untuk "Jurnal Akuntasi"
				} else if ($jenis == "Operasional") {
					// Tambahkan logika untuk "Operasional"
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
                        Data Nasabah Berhasil di tambahkan
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>');
					redirect('C_Laporan');
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
