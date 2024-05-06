<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Penjualan extends SDA_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Penjualan_model');
		$this->load->model('Penjualan_model');
		$this->load->model('Pelapak_model');
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

		$data['judul'] = "Halaman pelapak";
		$data['pelapak'] = $this->Penjualan_model->get();
		$this->load->view('pages/layout/header', $data);
		$this->load->view("pages/Pelapak/pelapak", $data);
		$this->load->view('pages/layout/footer', $data);
	}
	public function tambah_pelapak()
	{
		$data['judul'] = "Halaman Tambah Pelapak";
		$this->form_validation->set_rules('nama', 'nama', 'required', [
			'required' => 'nama pelapak Wajib di isi'
		]);
		$this->form_validation->set_rules('Alamat', 'Alamat', 'required', [
			'required' => 'Alamat Wajib di isi'
		]);
		$this->form_validation->set_rules('No_tlp', 'No_tlp', 'required|trim|numeric', [
			'required' => 'No_tlp Wajib di isi',
			'numeric' => 'No_tlp hanya boleh berisi angka'
		]);
		if ($this->form_validation->run() == false) {
			$this->load->view('pages/layout/header', $data);
			$this->load->view("pages/Pelapak/tambah_pelapak", $data);
			$this->load->view('pages/layout/footer', $data);
		} else {
			$data = [
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('Alamat'),
				'no_tlp' => $this->input->post('No_tlp'),
			];

			if ($this->Pelapak_model->insert($data)) {
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
			Data pelapak Berhasil di tambahkan
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');
				redirect('C_Penjualan');
			}
			echo 'gagal';



		}
	}
	public function edit_pelapak($id)
	{
		$data['judul'] = "Halaman Edit Pelapak";
		$data['pelapak'] = $this->Pelapak_model->getById($id);
		$this->form_validation->set_rules('nama', 'nama', 'required', [
			'required' => 'nama pelapak Wajib di isi'
		]);
		$this->form_validation->set_rules('Alamat', 'Alamat', 'required', [
			'required' => 'Alamat Wajib di isi'
		]);
		$this->form_validation->set_rules('No_tlp', 'No_tlp', 'required|trim|numeric', [
			'required' => 'No_tlp Wajib di isi',
			'numeric' => 'No_tlp hanya boleh berisi angka'
		]);
		if ($this->form_validation->run() == false) {
			$this->load->view('pages/layout/header', $data);
			$this->load->view("pages/Pelapak/edit_pelapak", $data);
			$this->load->view('pages/layout/footer', $data);
		} else {
			$data = [
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('Alamat'),
				'no_tlp' => $this->input->post('No_tlp'),
			];

			if ($this->Pelapak_model->update(['id_pelapak' => $id], $data)) {
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
			Data pelapak Berhasil di Edit
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');
				redirect('C_Penjualan');
			}
			echo 'gagal';



		}
	}
	public function hapus_pelapak($id)
	{
		if ($this->Penjualan_model->delete($id)) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
			Data Transaksi Berhasil dihapus!!
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		  </div>');
			redirect('C_Penjualan');
		}

	}

	public function tambah($id_pelapak)
	{
		$data['id_pelapak'] = $id_pelapak;
		$data['pelapak'] = $this->Pelapak_model->getById($id_pelapak);
		$data['sampah'] = $this->Sampah_model->get();
		$data['judul'] = "Halaman Tambah Penjualan";
		$this->form_validation->set_rules('tgl', 'tgl', 'required', [
			'required' => 'Tanggal Wajib di isi'
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
			$this->load->view("pages/Pelapak/tambah_transaksi", $data);
			$this->load->view('pages/layout/footer', $data);
		} else {

			$data = array();
			$jenis = $this->input->post('jenis_sampah');
			$id_pelapak = $this->input->post('id_pelapak');
			$tanggal_transaksi = $this->input->post('tgl');
			$berat = $this->input->post('berat');
			$harga = $this->input->post('harga');
			$pendapatan = $this->input->post('total_h');

			foreach ($jenis as $key => $value) {
				$data[$key]['id_pelapak'] = $id_pelapak;
				$data[$key]['tanggal_transaksi'] = $tanggal_transaksi;
				$data[$key]['id_sampah'] = $jenis[$key];
				$data[$key]['berat_sampah'] = $berat[$key];
				$data[$key]['harga/kg'] = $harga[$key];
				$data[$key]['pendapatan'] = $pendapatan[$key];
				$data[$key]['jenis'] = 'pelapak';
				$data[$key]['status'] = '1';

			}
			if ($this->Penjualan_model->insert($data)) {
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
				Data Penjualan Berhasil di tambahkan
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
				redirect('C_Penjualan/detail/' . $id_pelapak);
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
				Data transaksi gagal ditambahkan
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
				redirect('C_Transaksi/detail/' . $id_pelapak);
			}
		}
	}
	public function edit($id)
	{
		$data['judul'] = "Halaman edit transaksi";
		$data['Transaksi'] = $this->Penjualan_model->getById($id);
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
			$this->load->view("pages/Pelapak/edit_transaksi", $data);
			$this->load->view('pages/layout/footer', $data);
		} else {
			$data = [
				'id_sampah' => $this->input->post('kategori'),
				'berat_sampah' => $this->input->post('berat'),
				'harga/kg' => $this->input->post('harga/kg'),
				'pendapatan' => (int) $this->input->post('pendapatan'),
			];		
			$this->Penjualan_model->update(['id_transaksi_p' => $id], $data);
			$id_pelapak = $this->input->post('id_pelapak');
			$tgl = $this->input->post('tgl');
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
			Data Transaksi Penjualan Berhasil di Edit
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');
			redirect('C_Penjualan/detail2/' . $id_pelapak . '/' . $tgl);

		}
	}
	public function hapus($tgl, $id_pelapak)
	{

		$this->Penjualan_model->delete2($tgl, $id_pelapak);
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
		Data Transaksi Berhasil dihapus!!
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  </div>');
		redirect('C_Penjualan/detail/' . $id_pelapak);
	}
	function fetch()
	{
		$output = '';
		$query = '';
		$this->load->model('Penjualan_model');
		$data = $this->Penjualan_model->fetch_data($query, '');
		// var_dump($data->result_array());
		// die;

		if ($this->input->post('query')) {
			$query = $this->input->post('query');
			$data = $this->Penjualan_model->fetch_data($query, '');

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
				<a href="' . base_url('C_Penjualan/detail/' . $us['id_pelapak'] . '') . '" class="btn btn-sm btn-outline-primary text">
					<div style="color:#9055fd; font-size:10px;">Detail Transaksi</div>
				</a>
				<button style="padding: 0; border: none; background: none;"><a
							onclick="edit(' . $us['id_pelapak'] . ', ' . '\'pelapak\'' . ')"
							class="btn btn-sm btn-outline-warning text"
							style="color:#ffc107; font-size:10px;">
							Edit</a></button>
				<button style="padding: 0; border: none; background: none;"><a
							onclick="hapus(' . $us['id_pelapak'] . ', ' . '\'pelapak\'' . ')"
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
	public function detail($id_pelapak)
	{
		$data['judul'] = "Halaman detail transaksi";
		$data['pelapak'] = $this->Pelapak_model->getById($id_pelapak);
		$data['id_pelapak'] = $id_pelapak;
		$this->load->view('pages/layout/header', $data);
		$this->load->view("pages/Pelapak/detail_penjualan", $data);
		$this->load->view('pages/layout/footer', $data);
	}
	function fetch_detail($id)
	{
		$output = '';
		$query = '';
		$this->load->model('Penjualan_model');
		$data = $this->Penjualan_model->fetch_data_detail($query, $id);
		if ($this->input->post('query')) {
			$query = $this->input->post('query');
			$data = $this->Penjualan_model->fetch_data_detail($query, $id);

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
				<a href="' . base_url('C_Penjualan/detail2/' . $us['id_pelapak'] . '/' . $us['tanggal_transaksi']) . '" class="btn btn-sm btn-outline-primary text">
					<div style="color:#9055fd; font-size:10px;">Detail</div>
				</a>
				<button style="padding: 0; border: none; background: none;"><a
							onclick="hapus2(' . "'$tgl'" . ', ' . $us['id_pelapak'] . ',' . '\'pelapak\'' . ')"
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
	public function detail2($id_pelapak, $tgl)
	{
		$data['judul'] = "Halaman detail transaksi";
		$data['pelapak'] = $this->Pelapak_model->getById($id_pelapak);
		$data['transaksi'] = $this->Penjualan_model->getBytgl($id_pelapak, $tgl);
		$data['id_pelapak'] = $id_pelapak;
		$data['tanggal_transaksi'] = $tgl;
		$this->load->view('pages/layout/header', $data);
		$this->load->view("pages/Pelapak/detail_transaksi2", $data);
		$this->load->view('pages/layout/footer', $data);
	}
	function fetch_detail2($id)
	{
		$output = '';
		$query = '';
		$this->load->model('Penjualan_model');
		$tgl = $this->input->post('tgl');

		$data = $this->Penjualan_model->fetch_data_detail2($query, $id, $tgl);
		// var_dump($data);
		// die;
		if ($this->input->post('query')) {
			$query = $this->input->post('query');
			$data = $this->Penjualan_model->fetch_data_detail2($query, $id, $tgl);

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
				<a href="' . base_url('C_Penjualan/edit/' . $us['id_transaksi_p']) . '" class="btn btn-sm btn-outline-primary text">
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
		echo $data['harga_pelapak'];

	}

}
