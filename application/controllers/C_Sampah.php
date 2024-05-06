<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Sampah extends SDA_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
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

		$data['judul'] = "Halaman Kategori Sampah";
		$data['Sampah'] = $this->Sampah_model->get();
		$this->load->view('pages/layout/header', $data);
		$this->load->view("pages/Sampah/sampah", $data);
		$this->load->view('pages/layout/footer', $data);
	}
	public function tambah()
	{
		$data['judul'] = "Halaman Tambah Kategori Sampah";
		$this->form_validation->set_rules('kategori', 'kategori', 'required', [
			'required' => 'kategori sampah Wajib di isi'
		]);

		$this->form_validation->set_rules('harga_nasabah', 'harga_nasabah', 'required|trim|numeric', [
			'required' => 'harga Nasabah Wajib di isi',
			'numeric' => 'harga Nasabah hanya boleh berisi angka'
		]);
		$this->form_validation->set_rules('harga_unit', 'harga_unit', 'required|trim|numeric', [
			'required' => 'harga unit Wajib di isi',
			'numeric' => 'harga unit hanya boleh berisi angka'
		]);


		if ($this->form_validation->run() == false) {
			$this->load->view('pages/layout/header', $data);
			$this->load->view("pages/Sampah/tambah_sampah", $data);
			$this->load->view('pages/layout/footer', $data);
		} else {
			$data = [
				'kategori' => $this->input->post('kategori'),
				'harga_nasabah' => $this->input->post('harga_nasabah'),
				'harga_unit' => $this->input->post('harga_unit'),
			];
			if ($this->Sampah_model->insert($data)) {
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
				Data Kategori Sampah Berhasil di tambahkan
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
				redirect('C_Sampah');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
		Data Sampah gagal ditambahkan!!
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  </div>');
				redirect('C_Sampah');
			}





		}
	}
	public function edit($id)
	{
		$data['judul'] = "Halaman Tambah Sampah";
		$data['Sampah'] = $this->Sampah_model->getById($id);

		$this->form_validation->set_rules('kategori', 'kategori', 'required', [
			'required' => 'kategori sampah Wajib di isi'
		]);

		$this->form_validation->set_rules('harga_nasabah', 'harga_nasabah', 'required|trim|numeric', [
			'required' => 'harga Nasabah Wajib di isi',
			'numeric' => 'harga Nasabah hanya boleh berisi angka'
		]);
		$this->form_validation->set_rules('harga_unit', 'harga_unit', 'required|trim|numeric', [
			'required' => 'harga unit Wajib di isi',
			'numeric' => 'harga unit hanya boleh berisi angka'
		]);


		if ($this->form_validation->run() == false) {
			$this->load->view('pages/layout/header', $data);
			$this->load->view("pages/Sampah/edit_Sampah", $data);
			$this->load->view('pages/layout/footer', $data);
		} else {
			$data = [
				'kategori' => $this->input->post('kategori'),
				'harga_nasabah' => $this->input->post('harga_nasabah'),
				'harga_unit' => $this->input->post('harga_unit'),
			];
			$this->Sampah_model->update(['id_sampah' => $id], $data);

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
			Data Sampah Berhasil di ubah
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');
			redirect('C_Sampah');

		}
	}
	public function hapus($id)
	{
		$this->Sampah_model->delete($id);
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
		Data Sampah Berhasil dihapus!!
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  </div>');
		redirect('C_Sampah');
	}
	function fetch()
	{
		$output = '';
		$query = '';
		$this->load->model('Sampah_model');
		$data = $this->Sampah_model->fetch_data($query);

		if ($this->input->post('query')) {
			$query = $this->input->post('query');
			$data = $this->Sampah_model->fetch_data($query);

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
				<td>' . $us['harga_nasabah'] . '</td>
				<td>' . $us['harga_unit'] . '</td>
				<td class="text-center">
					<button style="padding: 0; border: none; background: none;"><a
							onclick="edit(' . $us['id_sampah'] . ', ' . '\'sampah\'' . ')"
							class="btn btn-sm btn-outline-warning text"
							style="color:#ffc107; font-size:10px;">Edit</a></button>
					<button style="padding: 0; border: none; background: none;"><a
							onclick="hapus(' . $us['id_sampah'] . ', ' . '\'sampah\'' . ')"
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
