<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Akuntasi extends SDA_Controller
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

		$data['judul'] = "Halaman Akuntasi";
		$data['Akuntasi'] = $this->Operasional_model->get();
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
		$data['debit'] = $totalDebit;
		$data['kredit'] = $totalKredit;
		$this->load->view('pages/layout/header', $data);
		$this->load->view("pages/Akuntasi/akuntasi", $data);
		$this->load->view('pages/layout/footer', $data);
	}

	function fetch()
	{
		$output = '';
		$query = '';
		$this->load->model('Nasabah_model');
		$data = $this->Operasional_model->fetch_data_akuntasi($query);
		// var_dump($data);
		// die;
		if ($this->input->post('query')) {
			$query = $this->input->post('query');
			$data = $this->Operasional_model->fetch_data_akuntasi($query);

		}


		if (!empty($data)) {
			$i = 1;
			foreach ($data->result_array() as $us) {

				$keterangan = '';
				if ($us['jenis_'] == 'nasabah') {
					$keterangan = 'transaksi nasabah';
				} else if ($us['jenis_'] == 'pelapak') {
					$keterangan = 'Penjualan ke pelapak';
				} else {
					$keterangan = $us['jenis_'];
				}

				$debit = '';
				if ($us['jenis_'] == 'pelapak') {
					$debit = $us['harga_'];
				} else {
					$debit = '-';
				}

				$kredit = '';
				if ($us['jenis_'] == 'pelapak') {
					$kredit = '-';
				} else {
					$kredit = $us['harga_'];
				}

				$output .= '
				<tr>
				<td class="small">
				' . $i . '
				</td>
				<td>' . $us['tanggal_gabungan'] . '</td>
				<td>' . $keterangan . '</td>
				<td style="color:#006400;">Rp. ' . $debit . '</td>
				<td style="color:red;">Rp. ' . $kredit . '</td>
				
				
			</tr>
';
				$i += 1;
			}
		} else {
			$output .= '<tr>
							<td colspan="5">No Data Found</td>
						</tr>';
		}

		echo $output;
	}

}
