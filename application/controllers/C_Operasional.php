<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Operasional extends SDA_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Operasional_model');

		$this->requiredLogin();
		preventAccessPengguna(
			array(
				AD
			)
		);
	}
	public function index()
	{

		$data['judul'] = "Halaman Operasional";
		$data['operasional'] = $this->Operasional_model->get();
		$this->load->view('pages/layout/header', $data);
		$this->load->view("pages/Operasional/operasional", $data);
		$this->load->view('pages/layout/footer', $data);
	}
	public function tambah()
	{
		$data['judul'] = "Halaman Tambah Operasional";
		$this->form_validation->set_rules('tgl', 'tgl', 'required', [
			'required' => 'tgl Operasional Wajib di isi'
		]);
		$this->form_validation->set_rules('keterangan', 'keterangan', 'required', [
			'required' => 'keterangan Wajib di isi'
		]);
		$this->form_validation->set_rules('harga', 'harga', 'required|trim|numeric', [
			'required' => 'harga Wajib di isi',
			'numeric' => 'harga hanya boleh berisi angka'
		]);



		if ($this->form_validation->run() == false) {
			$this->load->view('pages/layout/header', $data);
			$this->load->view("pages/Operasional/tambah_operasional", $data);
			$this->load->view('pages/layout/footer', $data);
		} else {
			$data = [
				'tanggal_pengeluaran' => $this->input->post('tgl'),
				'keterangan' => $this->input->post('keterangan'),
				'harga' => $this->input->post('harga'),
			];
			if ($this->Operasional_model->insert($data)) {
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
				Data Operasional Berhasil di tambahkan
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
				redirect('operasional');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
				Data Operasional gagal di tambahkan
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
				redirect('operasional');
			}




		}
	}
	public function edit($id)
	{
		$data['judul'] = "Halaman Edit Operasional";
		$data['Operasional'] = $this->Operasional_model->getById($id);

		$this->form_validation->set_rules('tgl', 'tgl', 'required', [
			'required' => 'tgl Operasional Wajib di isi'
		]);
		$this->form_validation->set_rules('keterangan', 'keterangan', 'required', [
			'required' => 'keterangan Wajib di isi'
		]);
		$this->form_validation->set_rules('harga', 'harga', 'required|trim|numeric', [
			'required' => 'harga Wajib di isi',
			'numeric' => 'harga hanya boleh berisi angka'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('pages/layout/header', $data);
			$this->load->view("pages/Operasional/edit_Operasional", $data);
			$this->load->view('pages/layout/footer', $data);
		} else {
			$data = [
				'tanggal_pengeluaran' => $this->input->post('tgl'),
				'keterangan' => $this->input->post('keterangan'),
				'harga' => $this->input->post('harga'),
			];
			if ($this->Operasional_model->update(['id_Operasional' => $id], $data)) {
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
				Data Operasional Berhasil dihapus
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
				redirect('operasional');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
				Data Operasional gagal di hapus
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
				redirect('operasional');
			}
			;

		}
	}
	public function hapus($id)
	{
		$this->Operasional_model->delete($id);
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
		Data Operasional Berhasil dihapus!!
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  </div>');
		redirect('operasional');
	}
	function fetch()
	{
		$output = '';
		$query = '';
		$this->load->model('Operasional_model');
		$data = $this->Operasional_model->fetch_data($query);

		if ($this->input->post('query')) {
			$query = $this->input->post('query');
			$data = $this->Operasional_model->fetch_data($query);

		}


		if (!empty($data)) {
			$i = 1;
			foreach ($data->result_array() as $us) {
				$output .= '
				<tr>
				<td class="small">
				' . $i . '
				</td>
				<td>' . $us['tanggal_pengeluaran'] . '</td>
				<td>' . $us['keterangan'] . '</td>
				<td><span class="badge rounded-pill bg-label-primary me-1">RP.' . $us['harga'] . '</span></td>
				<td class="text-center">
					<button style="padding: 0; border: none; background: none;"><a
							onclick="edit(' . $us['id_operasional'] . ', ' . '\'Operasional\'' . ')"
							class="btn btn-sm btn-outline-warning text"
							style="color:#55dbfd; font-size:10px;">
							Edit</a></button>
					<button style="padding: 0; border: none; background: none;"><a
							onclick="hapus(' . $us['id_operasional'] . ', ' . '\'Operasional\'' . ')"
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
