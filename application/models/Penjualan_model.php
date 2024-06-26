<?php
defined('BASEPATH') or exit('No direct script access
allowed');
class Penjualan_model extends CI_Model
{
	public $table = 'transaksi_pelapak';
	public $id = 'transaksi_pelapak.id_transaksi_p';
	public function __construct()
	{
		parent::__construct();
	}
	public function get()
	{
		$this->db->from($this->table);
		$query = $this->db->get();
		$this->db->order_by('date_create', 'desc');
		return $query->result_array();
	}
	public function get5()
	{

		$this->db->select('p.*, t.*,s.*'); // Menggunakan COUNT untuk menghitung jumlah transaksi
		$this->db->from('transaksi_pelapak t');
		$this->db->join('pelapak p', 'p.id_pelapak = t.id_pelapak', 'left');
		$this->db->join('sampah s', 's.id_sampah = t.id_sampah');
		$this->db->limit(5);  // Limit to 5 records
		$this->db->order_by('t.date_create', 'DESC'); // Pastikan pengurutan dilakukan pada kolom yang tepat
		$result = $this->db->get();

		if (empty($result)) {
			return [];
		}
		return $result->result_array();
	}

	public function getById($id)
	{
		$this->db->from($this->table);
		$this->db->where('id_transaksi_p', $id);
		$this->db->order_by('date_create', 'desc');
		$query = $this->db->get();
		return $query->row_array();
	}

	public function getByIdP($id)
	{
		$this->db->from($this->table);
		$this->db->where('id_pelapak', $id);
		$this->db->order_by('date_create', 'desc');
		$query = $this->db->get();
		$result = $query->row_array();
		if (empty($result)) {
			return [];
		}

		return $result;
	}
	public function getBytgl($id, $tgl)
	{
		$decodedString = urldecode($tgl);
		$this->db->from($this->table);
		$this->db->where('id_pelapak', $id);
		$this->db->where('tanggal_transaksi', $decodedString);
		$this->db->order_by('date_create', 'desc');
		$query = $this->db->get();
		$result = $query->result_array();

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
		$this->db->insert_batch($this->table, $data);
		return $this->db->insert_id();
	}
	public function delete($id)
	{
		$this->db->where($this->id, $id);
		$this->db->delete($this->table);
		return $this->db->affected_rows();
	}
	public function delete_pelapak($id)
	{
		$this->db->where('id_pelapak', $id);
		$this->db->delete($this->table);
		return $this->db->affected_rows();
	}
	public function delete2($tgl, $id_pelapak)
	{
		$decodedString = urldecode($tgl);
		$this->db->where('tanggal_transaksi', $decodedString);
		$this->db->where('id_pelapak', $id_pelapak);
		$this->db->delete($this->table);
		return $this->db->affected_rows();
	}
	function fetch_data($query, $id)
	{
		$this->db->select('p.*, COUNT(DISTINCT t.tanggal_transaksi) as jumlah_transaksi,'); // Menggunakan COUNT untuk menghitung jumlah transaksi
		$this->db->from('pelapak p');
		$this->db->join('transaksi_pelapak t', 't.id_pelapak = p.id_pelapak', 'left');
		if ($id != '') {
			$this->db->where('t.id_pelapak', $id);
		}
		// Mengubah inner join menjadi left join
		$this->db->group_by('p.id_pelapak'); // Group by harus berdasarkan id_nasabah di tabel nasabah

		if ($query != '') {
			$this->db->like('p.nama', $query); // Pastikan pencarian dilakukan pada kolom yang tepat
		}

		$this->db->order_by('p.date_create', 'DESC'); // Pastikan pengurutan dilakukan pada kolom yang tepat
		return $this->db->get();


	}
	function fetch_data_detail($query, $id)
	{
		$this->db->select('p.*, COUNT(t.id_sampah) as jumlah_sampah,SUM(t.berat_sampah) as berat,t.*,SUM(t.pendapatan) as pendapatan'); // Menggunakan COUNT untuk menghitung jumlah transaksi
		$this->db->from('pelapak p');
		$this->db->join('transaksi_pelapak t', 'p.id_pelapak = t.id_pelapak', 'left');
		if ($id != '') {
			$this->db->where('t.id_pelapak', $id);
		}
		// Mengubah inner join menjadi left join
		$this->db->group_by('t.tanggal_transaksi'); // Group by harus berdasarkan id_nasabah di tabel nasabah
		
		if ($query != '') {
			$this->db->like('t.tanggal_transaksi', $query); // Pastikan pencarian dilakukan pada kolom yang tepat
		}
		$this->db->order_by('t.date_create', 'DESC'); // Pastikan pengurutan dilakukan pada kolom yang tepat
		$result = $this->db->get();

		if (empty($result)) {
			return [];
		}
		return $result;
	}
	function fetch_data_detail2($query, $id, $tgl)
	{
		$this->db->select('p.*,s.*,t.*'); // Menggunakan COUNT untuk menghitung jumlah transaksi
		$this->db->from('transaksi_pelapak t');
		$this->db->join('pelapak p', 'p.id_pelapak = t.id_pelapak');
		$this->db->join('sampah s', 's.id_sampah = t.id_sampah');
		$decodedString = urldecode($tgl);

		$this->db->where('t.tanggal_transaksi', $decodedString);
		if ($id != '') {
			$this->db->where('t.id_pelapak', $id);
		}
		// Mengubah inner join menjadi left join
		if ($query != '') {
			$this->db->like('s.kategori', $query); // Pastikan pencarian dilakukan pada kolom yang tepat
		}

		$this->db->order_by('p.date_create', 'DESC'); // Pastikan pengurutan dilakukan pada kolom yang tepat
		return $this->db->get();


	}
}
