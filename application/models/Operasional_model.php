<?php
defined('BASEPATH') or exit('No direct script access
allowed');
class Operasional_model extends CI_Model
{
	public $table = 'operasional';
	public $id = 'operasional.id_operasional';
	protected $table1 = 'transaksi';
	protected $table2 = 'transaksi_pelapak';
	protected $table3 = 'operasional';
	protected $table4 = 'penarikan_saldo';
	public function __construct()
	{
		parent::__construct();

	}
	public function get()
	{
		$this->db->from($this->table);
		$query = $this->db->get();
		$this->db->order_by('date_create', 'desc');
		$result = $query->result_array();

		if (empty($result)) {
			return [];
		}

		return $result;
	}
	public function sumPendapatan()
	{
		$this->db->select_sum('harga');  // Menggunakan select_sum untuk menghitung total pendapatan
		$this->db->from($this->table);             // Menentukan tabel yang diquery
		$query = $this->db->get();
		return $query->row()->harga;          // Melakukan query
	}
	public function tampil($NIP)
	{
		$this->db->select('p.*,u.nama');
		$this->db->from('pangkat p');
		$this->db->join('user u', 'p.NIP = u.NIP');
		$this->db->where('u.NIP', $NIP);
		$this->db->order_by('p.date_create', 'desc');
		$query = $this->db->get();
		return $query->result_array();

	}

	public function getById($id)
	{
		$this->db->from($this->table);
		$this->db->where('id_operasional', $id);
		$this->db->order_by('date_create', 'desc');
		$query = $this->db->get();
		$result = $query->row_array();
		if (empty($result)) {
			return [];
		}

		return $result;
	}
	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
	public function insert($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}
	public function delete($id)
	{
		$this->db->where($this->id, $id);
		$this->db->delete($this->table);
		return $this->db->affected_rows();
	}
	function fetch_data($query)
	{
		$this->db->select("*");
		$this->db->from($this->table);
		if ($query != '') {
			$this->db->like('tanggal_pengeluaran', $query);
			$this->db->or_like('keterangan', $query);
			$this->db->or_like('harga', $query);

		}
		$this->db->order_by('tanggal_pengeluaran', 'DESC');
		$result = $this->db->get();

		if (empty($result)) {
			return [];
		}

		return $result;
	}
	// function fetch_data_akuntasi($query)
	// {
	// 	// Query untuk tabel1
	// 	$this->db->select("pendapatan as harga_, jenis as jenis_,  tanggal_transaksi AS tanggal_gabungan");
	// 	$this->db->from($this->table1);
	// 	if ($query != '') {
	// 		$this->db->group_start();
	// 		$this->db->like('harga_', $query);
	// 		$this->db->or_like('jenis_', $query);
	// 		$this->db->or_like('tanggal_gabungan', $query);
	// 		$this->db->group_end();
	// 	}

	// 	$subQuery1 = $this->db->get_compiled_select();

	// 	// Query untuk tabel2
	// 	$this->db->select("pendapatan as harga_, jenis as jenis_, tanggal_transaksi AS tanggal_gabungan");
	// 	$this->db->from($this->table2);
	// 	if ($query != '') {
	// 		$this->db->group_start();
	// 		$this->db->like('harga_', $query);
	// 		$this->db->or_like('jenis_', $query);
	// 		$this->db->or_like('tanggal_gabungan', $query);
	// 		$this->db->group_end();
	// 	}

	// 	$subQuery2 = $this->db->get_compiled_select();

	// 	// Query untuk tabel3
	// 	$this->db->select("harga AS harga_, keterangan as jenis_,tanggal_pengeluaran AS tanggal_gabungan");
	// 	$this->db->from($this->table3);
	// 	if ($query != '') {
	// 		$this->db->group_start();
	// 		$this->db->like('harga_', $query);
	// 		$this->db->or_like('jenis_', $query);
	// 		$this->db->or_like('tanggal_gabungan', $query);
	// 		$this->db->group_end();
	// 	}

	// 	$subQuery3 = $this->db->get_compiled_select();

	// 	// Gabungan ketiga subquery
	// 	$finalQuery = "{$subQuery1} UNION ALL {$subQuery2} UNION ALL {$subQuery3} ORDER BY tanggal_gabungan DESC";
	// 	$result = $this->db->query($finalQuery);

	// 	if ($result !== FALSE && $result->num_rows() > 0) {
	// 		return $result;
	// 	}else{
	// 		return [];
	// 	}

	// }

	function fetch_data_akuntasi($query)
	{
		$this->db->reset_query();  // Memastikan query builder bersih

		// Query untuk tabel1
		$this->db->select("pendapatan AS harga_, jenis AS jenis_, tanggal_transaksi AS tanggal_gabungan");
		$this->db->from($this->table1);
		$this->apply_search_conditions($query);  // Aplikasi kondisi pencarian
		$subQuery1 = $this->db->get_compiled_select();

		// Reset query builder
		$this->db->reset_query();

		// Query untuk tabel2
		$this->db->select("pendapatan AS harga_, jenis AS jenis_, tanggal_transaksi AS tanggal_gabungan");
		$this->db->from($this->table2);
		$this->apply_search_conditions($query);
		$subQuery2 = $this->db->get_compiled_select();

		// Reset query builder
		$this->db->reset_query();

		// Query untuk tabel3
		$this->db->select("harga AS harga_, keterangan AS jenis_, tanggal_pengeluaran AS tanggal_gabungan");
		$this->db->from($this->table3);
		$this->apply_search_conditions($query);
		$subQuery3 = $this->db->get_compiled_select();

		// Gabungan ketiga subquery
		$finalQuery = "{$subQuery1} UNION ALL {$subQuery2} UNION ALL {$subQuery3} ORDER BY tanggal_gabungan DESC";
		$result = $this->db->query($finalQuery);

		if ($result !== FALSE && $result->num_rows() > 0) {
			return $result;  // Asalnya 'return $result;', tapi lebih baik dalam bentuk array
		} else {
			return [];
		}
	}

	private function apply_search_conditions($query)
	{
		if ($query != '') {
			$this->db->group_start();
			$this->db->like('harga_', $query);
			$this->db->or_like('jenis_', $query);
			// $this->db->or_like('tanggal_gabungan', $query);	  // Pertimbangkan kondisi tanggal yang lebih spesifik
			$this->db->group_end();
		}
	}

	function fetch_data_debitkredit($query,$id)
	{
		$this->db->reset_query();  // Memastikan query builder bersih

		// Query untuk tabel1
		$this->db->select("pendapatan AS harga_, jenis AS jenis_, tanggal_transaksi AS tanggal_gabungan");
		$this->db->from($this->table1);
		$this->db->where('id_nasabah', $id);
		$this->apply_search_conditions($query);  // Aplikasi kondisi pencarian
		$subQuery1 = $this->db->get_compiled_select();

		// Reset query builder
		$this->db->reset_query();

		// Query untuk tabel2
		$this->db->select("nominal AS harga_, keterangan AS jenis_, tanggal_penarikan AS tanggal_gabungan");
		$this->db->from($this->table4);
		$this->db->where('id_nasabah', $id);
		$this->apply_search_conditions($query);
		$subQuery2 = $this->db->get_compiled_select();
		// Gabungan ketiga subquery
		$finalQuery = "{$subQuery1} UNION ALL {$subQuery2} ORDER BY tanggal_gabungan DESC";
		$result = $this->db->query($finalQuery);

		if ($result !== FALSE && $result->num_rows() > 0) {
			return $result;  // Asalnya 'return $result;', tapi lebih baik dalam bentuk array
		} else {
			return [];
		}
	}

}
