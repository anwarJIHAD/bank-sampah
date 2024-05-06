<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Transaksi extends SDA_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Transaksi_model');
		$this->load->model('Nasabah_model');
		$this->load->model('Sampah_model');

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
		$data['Nasabah'] = $this->Transaksi_model->get();
		$this->load->view('pages/layout/header', $data);
		$this->load->view("pages/Transaksi/transaksi", $data);
		$this->load->view('pages/layout/footer', $data);
	}
	public function tambah($id_nasabah)
	{
		$data['id_nasabah'] = $id_nasabah;
		$data['nasabah'] = $this->Nasabah_model->getById($id_nasabah);
		$data['sampah'] = $this->Sampah_model->get();
		$data['judul'] = "Halaman Tambah Nasabah";
		$this->form_validation->set_rules('tgl', 'tgl', 'required', [
			'required' => 'Tanggal  Wajib di isi'
		]);
		$this->form_validation->set_rules('jenis_sampah[]', 'jenis_sampah[]', 'required', [
			'required' => 'jenis_sampah Wajib di isi'
		]);
		$this->form_validation->set_rules('berat[]', 'berat[]', 'required|trim|numeric', [
			'required' => 'berat[] Wajib di isi',
			'numeric' => 'berat Sampah hanya boleh berisi angka'
		]);



		if ($this->form_validation->run() == false) {
			$this->load->view('pages/layout/header', $data);
			$this->load->view("pages/Transaksi/tambah_transaksi", $data);
			$this->load->view('pages/layout/footer', $data);
		} else {

			$data = array();
			$jenis = $this->input->post('jenis_sampah');
			$id_nasabah = $this->input->post('id_nasabah');
			$tanggal_transaksi = $this->input->post('tgl');
			$berat = $this->input->post('berat');
			$harga = $this->input->post('harga');
			$pendapatan = $this->input->post('total_h');

			foreach ($jenis as $key => $value) {
				$data[$key]['id_nasabah'] = $id_nasabah;
				$data[$key]['tanggal_transaksi'] = $tanggal_transaksi;
				$data[$key]['id_sampah'] = $jenis[$key];
				$data[$key]['berat_sampah'] = $berat[$key];
				$data[$key]['harga/kg'] = $harga[$key];
				$data[$key]['pendapatan'] = $pendapatan[$key];
				$data[$key]['jenis'] = 'nasabah';
				$data[$key]['status'] = '1';
			}
			if ($this->Transaksi_model->insert($data)) {
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
				Data transaksi Berhasil di tambahkan
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
				redirect('C_Transaksi/detail/' . $id_nasabah);
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
				Data transaksi gagal ditambahkan
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
				redirect('C_Transaksi/detail/' . $id_nasabah);
			}




		}
	}
	public function edit($id)
	{
		$data['judul'] = "Halaman edit transaksi";
		$data['Transaksi'] = $this->Transaksi_model->getById($id);
		$data['sampah'] = $this->Sampah_model->get();

		$this->form_validation->set_rules('kategori', 'kategori', 'required', [
			'required' => 'kategori Wajib di isi'
		]);
		$this->form_validation->set_rules('harga/kg', 'harga/kg', 'required|trim|numeric', [
			'required' => 'harga/kg Wajib di isi',
			'numeric' => 'harga/kg hanya boleh berisi angka'
		]);
		$this->form_validation->set_rules('berat', 'berat', 'required|trim|numeric', [
			'required' => 'berat Wajib di isi',
			'numeric' => 'berat hanya boleh berisi angka'
		]);


		if ($this->form_validation->run() == false) {
			$this->load->view('pages/layout/header', $data);
			$this->load->view("pages/Transaksi/edit_transaksi", $data);
			$this->load->view('pages/layout/footer', $data);
		} else {
			$data = [
				'id_sampah' => $this->input->post('kategori'),
				'berat_sampah' => $this->input->post('berat'),
				'harga/kg' => $this->input->post('harga/kg'),
				'pendapatan' => (int) $this->input->post('pendapatan'),
			];
			$this->Transaksi_model->update(['id_transaksi' => $id], $data);
			$id_nasabah = $this->input->post('id_nasabah');
			$tgl = $this->input->post('tgl');
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
			Data transaksi Berhasil di Edit
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');
			redirect('C_Transaksi/detail2/' . $id_nasabah . '/' . $tgl);

		}
	}
	public function hapus($tgl, $id_nasabah)
	{

		$this->Transaksi_model->delete2($tgl, $id_nasabah);
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
		Data Transaksi Berhasil dihapus!!
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  </div>');
		redirect('C_Transaksi/detail/' . $id_nasabah);
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
				<td>' . $us['jumlah_transaksi'] . '</td>
				<td class="text-center">
				<a href="' . base_url('C_Transaksi/detail/' . $us['id_nasabah'] . '') . '" class="btn btn-sm btn-outline-primary text">
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
		$this->load->view("pages/Transaksi/detail_transaksi", $data);
		$this->load->view('pages/layout/footer', $data);
	}
	function fetch_detail($id)
	{
		$output = '';
		$query = '';
		$this->load->model('Transaksi_model');
		$data = $this->Transaksi_model->fetch_data_detail($query, $id);

		if ($this->input->post('query')) {
			$query = $this->input->post('query');
			$data = $this->Transaksi_model->fetch_data_detail($query, $id);

		}
		if (!empty($data)) {
			$i = 1;
			foreach ($data->result_array() as $us) {
				$date = new DateTime();
				$tgl = $us['tanggal_transaksi'];
				$output .= '
				<tr>
				<td class="small">
				' . $i . '
				</td>
				<td>' . $us['tanggal_transaksi'] . '</td>
				<td>' . $us['jumlah_sampah'] . '</td>
				<td>' . $us['berat'] . '</td>
				<td>Rp.' . $us['pendapatan'] . '</td>
				<td class="text-center">
				<a href="' . base_url('C_Transaksi/detail2/' . $us['id_nasabah'] . '/' . $us['tanggal_transaksi']) . '" class="btn btn-sm btn-outline-primary text">
					<div style="color:#9055fd; font-size:10px;">Detail</div>
				</a>
				<button style="padding: 0; border: none; background: none;"><a
							onclick="hapus2(' . "'$tgl'" . ', ' . $us['id_nasabah'] . ',' . '\'nasabah\'' . ')"
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
	public function detail2($id_nasabah, $tgl)
	{
		$data['judul'] = "Halaman detail transaksi";
		$data['nasabah'] = $this->Nasabah_model->getById($id_nasabah);
		$data['transaksi'] = $this->Transaksi_model->getBytgl($id_nasabah, $tgl);
		$data['id_nasabah'] = $id_nasabah;
		$data['tanggal_transaksi'] = $tgl;
		$this->load->view('pages/layout/header', $data);
		$this->load->view("pages/Transaksi/detail_transaksi2", $data);
		$this->load->view('pages/layout/footer', $data);
	}
	function fetch_detail2($id)
	{
		$output = '';
		$query = '';
		$this->load->model('Transaksi_model');
		$tgl = $this->input->post('tgl');

		$data = $this->Transaksi_model->fetch_data_detail2($query, $id, $tgl);
		if ($this->input->post('query')) {
			$query = $this->input->post('query');
			$data = $this->Transaksi_model->fetch_data_detail2($query, $id, $tgl);

		}
		if (!empty($data)) {
			$i = 1;
			foreach ($data->result_array() as $us) {

				$output .= '
				<tr>
				<td class="small">
				' . $i . '
				</td>
				<td>' . $us['kategori'] . '</td>
				<td>' . $us['harga/kg'] . '</td>
				<td>' . $us['berat_sampah'] . '</td>
				<td>Rp.' . $us['pendapatan'] . '</td>	
				<td class="text-center">
				<a href="' . base_url('C_Transaksi/edit/' . $us['id_transaksi']) . '" class="btn btn-sm btn-outline-primary text">
					<div style="color:#ffc107; font-size:10px;">Edit</div>
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

	public function harga()
	{
		$id = $this->input->post('id');
		$data = $this->Sampah_model->getById($id);
		echo $data['harga_nasabah'];

	}

}
