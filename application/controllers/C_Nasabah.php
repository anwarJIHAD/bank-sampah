<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Nasabah extends SDA_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Nasabah_model');

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
		$data['Nasabah'] = $this->Nasabah_model->get();
		$this->load->view('pages/layout/header', $data);
		$this->load->view("pages/nasabah/nasabah", $data);
		$this->load->view('pages/layout/footer', $data);
	}
	public function tambah()
	{
		$data['judul'] = "Halaman Tambah Nasabah";
		$this->form_validation->set_rules('nama', 'nama', 'required', [
			'required' => 'nama Nasabah Wajib di isi'
		]);
		$this->form_validation->set_rules('Alamat', 'Alamat', 'required', [
			'required' => 'Alamat Wajib di isi'
		]);
		$this->form_validation->set_rules('No_tlp', 'No_tlp', 'required|trim|numeric', [
			'required' => 'No_tlp Wajib di isi',
			'numeric' => 'No_tlp hanya boleh berisi angka'
		]);
		$this->form_validation->set_rules('saldo', 'saldo', 'required|trim|numeric', [
			'required' => 'saldo Wajib di isi',
			'numeric' => 'saldo hanya boleh berisi angka'
		]);


		if ($this->form_validation->run() == false) {
			$this->load->view('pages/layout/header', $data);
			$this->load->view("pages/Nasabah/tambah_nasabah", $data);
			$this->load->view('pages/layout/footer', $data);
		} else {
			$data = [
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('Alamat'),
				'no_tlp' => $this->input->post('No_tlp'),
				'saldo' => (int) $this->input->post('saldo'),
			];
			$this->Nasabah_model->insert($data);

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
			Data Nasabah Berhasil di tambahkan
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');
			redirect('C_Nasabah');

		}
	}
	public function edit($id)
	{
		$data['judul'] = "Halaman Tambah Nasabah";
		$data['Nasabah'] = $this->Nasabah_model->getById($id);

		$this->form_validation->set_rules('nama', 'nama', 'required', [
			'required' => 'nama Nasabah Wajib di isi'
		]);
		$this->form_validation->set_rules('Alamat', 'Alamat', 'required', [
			'required' => 'Alamat Wajib di isi'
		]);
		$this->form_validation->set_rules('No_tlp', 'No_tlp', 'required|trim|numeric', [
			'required' => 'No_tlp Wajib di isi',
			'numeric' => 'No_tlp hanya boleh berisi angka'
		]);
		$this->form_validation->set_rules('saldo', 'saldo', 'required|trim|numeric', [
			'required' => 'saldo Wajib di isi',
			'numeric' => 'saldo hanya boleh berisi angka'
		]);


		if ($this->form_validation->run() == false) {
			$this->load->view('pages/layout/header', $data);
			$this->load->view("pages/Nasabah/edit_nasabah", $data);
			$this->load->view('pages/layout/footer', $data);
		} else {
			$data = [
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('Alamat'),
				'no_tlp' => $this->input->post('No_tlp'),
				'saldo' => (int) $this->input->post('saldo'),
			];
			$this->Nasabah_model->update(['id_nasabah' => $id], $data);

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
			Data Nasabah Berhasil di Edit
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');
			redirect('C_Nasabah');

		}
	}
	public function hapus($id)
	{
		$this->Nasabah_model->delete($id);
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
		Data Nasabah Berhasil dihapus!!
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  </div>');
		redirect('C_Nasabah');
	}
	function fetch()
	{
		$output = '';
		$query = '';
		$this->load->model('Nasabah_model');
		$data = $this->Nasabah_model->fetch_data($query);

		if ($this->input->post('query')) {
			$query = $this->input->post('query');
			$data = $this->Nasabah_model->fetch_data($query);

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
				<td>' . $us['alamat'] . '</td>
				<td>' . $us['no_tlp'] . '</td>
				<td><span class="badge rounded-pill bg-label-primary me-1">RP.' . $us['saldo'] . '</span></td>
				<td class="text-center">
					<button style="padding: 0; border: none; background: none;"><a
							onclick="edit(' . $us['id_nasabah'] . ', ' . '\'nasabah\'' . ')"
							class="btn btn-sm btn-outline-warning text"
							style="color:#55dbfd; font-size:10px;">
							Edit</a></button>
					<button style="padding: 0; border: none; background: none;"><a
							onclick="hapus(' . $us['id_nasabah'] . ', ' . '\'nasabah\'' . ')"
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
