<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Saldo extends SDA_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Nasabah_model');
		$this->load->model('Saldo_model');

		$this->requiredLogin();
		preventAccessPengguna(
			array(
				AD
			)
		);
	}
	public function index()
	{

		$data['judul'] = "Halaman Penarikan Saldo Nasabah";
		$data['Saldo'] = $this->Saldo_model->get();
		$this->load->view('pages/layout/header', $data);
		$this->load->view("pages/Saldo/saldo", $data);
		$this->load->view('pages/layout/footer', $data);
	}
	public function tambah($id)
	{
		$data['judul'] = "Halaman Tambah Penarikan";
		$data['id_nasabah'] = $id;
		$this->form_validation->set_rules('tanggal', 'tanggal', 'required', [
			'required' => 'tanggal Nasabah Wajib di isi'
		]);
		$this->form_validation->set_rules('keterangan', 'keterangan', 'required', [
			'required' => 'keterangan Wajib di isi'
		]);
		$this->form_validation->set_rules('nominal', 'nominal', 'required|trim|numeric', [
			'required' => 'nominal Wajib di isi',
			'numeric' => 'nominal hanya boleh berisi angka'
		]);


		if ($this->form_validation->run() == false) {
			$this->load->view('pages/layout/header', $data);
			$this->load->view("pages/Saldo/tambah_Saldo", $data);
			$this->load->view('pages/layout/footer', $data);
		} else {
			$data = [
				'tanggal_penarikan' => $this->input->post('tanggal'),
				'nominal' => $this->input->post('nominal'),
				'keterangan' => $this->input->post('keterangan'),
				'id_nasabah' => $this->input->post('id_nasabah'),
			];
			$this->Saldo_model->insert($data);

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
			Data Penarikan saldo nasabah Berhasil di tambahkan
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');
			redirect('C_Saldo/detail/' . $id);

		}
	}
	public function edit($id)
	{
		$data['judul'] = "Halaman Edit Penarikan";
		$data['Saldo'] = $this->Saldo_model->getById($id);

		$this->form_validation->set_rules('tanggal', 'tanggal', 'required', [
			'required' => 'tanggal Nasabah Wajib di isi'
		]);
		$this->form_validation->set_rules('keterangan', 'keterangan', 'required', [
			'required' => 'keterangan Wajib di isi'
		]);
		$this->form_validation->set_rules('nominal', 'nominal', 'required|trim|numeric', [
			'required' => 'nominal Wajib di isi',
			'numeric' => 'nominal hanya boleh berisi angka'
		]);

		$id_nasabah = $this->input->post('id_nasabah');

		if ($this->form_validation->run() == false) {
			$this->load->view('pages/layout/header', $data);
			$this->load->view("pages/Saldo/edit_saldo", $data);
			$this->load->view('pages/layout/footer', $data);
		} else {
			$data = [
				'tanggal_penarikan' => $this->input->post('tanggal'),
				'nominal' => $this->input->post('nominal'),
				'keterangan' => $this->input->post('keterangan'),
			];
			$this->Saldo_model->update(['id_penarikan' => $id], $data);

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
			Data Penarikan Berhasil di Edit
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');
			redirect('C_Saldo/detail/' . $id_nasabah);

		}
	}
	public function hapus($id, $id_nasabah)
	{

		$this->Saldo_model->delete($id);
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
		Data Penarikan Saldo Berhasil dihapus!!
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  </div>');
		redirect('C_Saldo/detail/' . $id_nasabah);

	}
	function fetch()
	{
		$output = '';
		$query = '';
		$data = $this->Saldo_model->fetch_data($query);
		if ($this->input->post('query')) {
			$query = $this->input->post('query');
			$data = $this->Saldo_model->fetch_data($query);

		}
		if (!empty($data)) {
			$i = 1;
			foreach ($data->result_array() as $us) {

				$output .= '
				<tr>
				<td class="small">
				' . $i . '
				</td>
				<td>' . $us['nama'] . '</td>
				<td>' . $us['jumlah_penarikan'] . '</td>
				<td><span class="badge rounded-pill bg-label-primary me-1">RP.' . $us['saldo'] . '</span></td>
				<td class="text-center">
				<a href="' . base_url('C_Saldo/detail/' . $us['id_nasabah'] . '') . '" class="btn btn-sm btn-outline-primary text">
				<div style="color:#9055fd; font-size:10px;">Detail</div>
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
	public function detail($id_nasabah)
	{
		$data['judul'] = "Halaman detail transaksi";
		$data['nasabah'] = $this->Nasabah_model->getById($id_nasabah);

		$data['id_nasabah'] = $id_nasabah;
		$this->load->view('pages/layout/header', $data);
		$this->load->view("pages/Saldo/detail_saldo", $data);
		$this->load->view('pages/layout/footer', $data);
	}
	function fetch_detail($id)
	{
		$output = '';
		$query = '';
		$this->load->model('Saldo_model');
		$data = $this->Saldo_model->fetch_data_detail($query, $id);

		if ($this->input->post('query')) {
			$query = $this->input->post('query');
			$data = $this->Saldo_model->fetch_data_detail($query, $id);

		}
		if (!empty($data)) {
			$i = 1;
			foreach ($data->result_array() as $us) {
				$date = new DateTime();
				$tgl = $us['tanggal_penarikan'];
				$output .= '
				<tr>
				<td class="small">
				' . $i . '
				</td>
				<td>' . $us['tanggal_penarikan'] . '</td>
				<td>' . $us['nominal'] . '</td>
				<td>' . $us['keterangan'] . '</td>
				<td class="text-center">
					<button style="padding: 0; border: none; background: none;"><a
							onclick="edit(' . $us['id_penarikan'] . ', ' . '\'saldo\'' . ')"
							class="btn btn-sm btn-outline-warning text"
							style="color:#ffc107; font-size:10px;">
							Edit</a></button>
					<button style="padding: 0; border: none; background: none;"><a
							onclick="hapus(' . $us['id_penarikan'] . ', ' . $us['id_nasabah'] . ')"
							class="btn btn-sm btn-outline-danger text-danger"
							style=" font-size:10px;">hapus</a></button>
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
}
