<?php
defined('BASEPATH') or exit('No direct script access
allowed');
class Saldo_model extends CI_Model
{
	public $table = 'penarikan_saldo';
	public $id = 'penarikan_saldo.id_penarikan';
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

	public function getById($id)
	{
		$this->db->from($this->table);
		$this->db->where('id_penarikan', $id);
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
		// Mempersiapkan subquery untuk menghitung total secara terpisah
		$subquery_penarikan = $this->db->select('id_nasabah, COUNT(tanggal_penarikan) as jumlah_penarikan, SUM(nominal) as total_penarikan')
			->from('penarikan_saldo')
			->group_by('id_nasabah')
			->get_compiled_select();

		$subquery_transaksi = $this->db->select('id_nasabah, SUM(pendapatan) as total_pendapatan')
			->from('transaksi')
			->group_by('id_nasabah')
			->get_compiled_select();

		// Query utama
		$this->db->select('n.*, n.id_nasabah, COALESCE(p.jumlah_penarikan, 0) as jumlah_penarikan, COALESCE(tr.total_pendapatan, 0) - COALESCE(p.total_penarikan, 0) as saldo');
		$this->db->from('nasabah n');
		$this->db->join("($subquery_penarikan) p", 'n.id_nasabah = p.id_nasabah', 'left');
		$this->db->join("($subquery_transaksi) tr", 'n.id_nasabah = tr.id_nasabah', 'left');

		$this->db->group_by('n.id_nasabah'); // Group by berdasarkan id nasabah

		// Memfilter berdasarkan query jika ada
		if ($query != '') {
			$this->db->like('n.nama', $query);
		}

		$this->db->order_by('n.date_create', 'DESC'); // Mengurutkan berdasarkan tanggal pembuatan

		return $this->db->get();
	}


	function fetch_data_detail($query, $id)
	{
		$this->db->select('n.*, s.*'); // Menggunakan COUNT untuk menghitung jumlah transaksi
		$this->db->from('nasabah n');
		$this->db->join('penarikan_saldo s', 'n.id_nasabah = s.id_nasabah');
		if ($id != '') {
			$this->db->where('s.id_nasabah', $id);
		}
		// Mengubah inner join menjadi left join
		$this->db->group_by('s.tanggal_penarikan'); // Group by harus berdasarkan id_nasabah di tabel nasabah

		if ($query != '') {
			$this->db->like('s.nominal', $query);
			$this->db->like('s.keterangan', $query);
		}

		$this->db->order_by('s.date_create', 'DESC'); // Pastikan pengurutan dilakukan pada kolom yang tepat
		$result = $this->db->get();
		if (empty($result)) {
			return [];
		}

		return $result;


	}
}
