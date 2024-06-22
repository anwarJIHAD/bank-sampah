<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_DebitKredit extends SDA_Controller
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
		$data['judul'] = "Halaman Nasabah";
		$this->load->view('pages/layout/header', $data);
		$this->load->view("pages/Debitkredit/debitkredit", $data);
		$this->load->view('pages/layout/footer', $data);
	}
	public function detail($id_nasabah)
	{
		$data['judul'] = "Halaman debit kredit";
		$data['Akuntasi'] = $this->Operasional_model->get();
		$data1 = $this->Operasional_model->fetch_data_debitkredit('', $id_nasabah);

		$totalKredit = 0;
		$totalDebit = 0;
		if ($data1) {
			foreach ($data1->result_array() as $us) {
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

		$data['debit'] = $totalDebit;
		$data['kredit'] = $totalKredit;
		$data['nasabah'] = $this->Nasabah_model->getById($id_nasabah);

		$data['id_nasabah'] = $id_nasabah;
		$this->load->view('pages/layout/header', $data);
		$this->load->view("pages/Debitkredit/detail_debitkredit", $data);
		$this->load->view('pages/layout/footer', $data);
	}
	function fetch()
	{
		$output = '';
		$query = '';
		$this->load->model('Transaksi_model');
		$data = $this->Transaksi_model->fetch_data($query, '');
		// var_dump($data->result_array());
		// die;

		if ($this->input->post('query')) {
			$query = $this->input->post('query');
			$data = $this->Transaksi_model->fetch_data($query, '');

		}

		// var_dump($data);
		// die;
		if (!empty($data)) {
			$i = 1;
			foreach ($data->result_array() as $us) {

				$output .= '
				<tr>
				<td class="small">
				' . $i . '
				</td>
				<td>' . $us['nama'] . '</td>
				<td class="text-center">
				<a href="' . base_url('C_Debitkredit/detail/' . $us['id_nasabah'] . '') . '" class="btn btn-sm btn-outline-primary text">
					<div style="color:#55dbfd; font-size:10px;">Lihat Debit & Kredit</div>
				</a>
				</td>
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
	function fetch_detail()
	{
		$output = '';
		$query = '';
		$id_nasabah = $this->input->post('id_nasabah');

		$this->load->model('Nasabah_model');
		$data = $this->Operasional_model->fetch_data_debitkredit($query, $id_nasabah);
		// var_dump($data);
		// die;
		if ($this->input->post('query')) {
			$query = $this->input->post('query');
			$data = $this->Operasional_model->fetch_data_debitkredit($query, $id_nasabah);
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
				if ($us['jenis_'] == 'nasabah') {
					$debit = $us['harga_'];
				} else {
					$debit = '-';
				}

				$kredit = '';
				if ($us['jenis_'] == 'nasabah') {
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
