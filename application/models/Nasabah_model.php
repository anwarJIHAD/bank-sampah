<?php
defined('BASEPATH') or exit('No direct script access
allowed');
class Nasabah_model extends CI_Model
{
	public $table = 'nasabah';
	public $id = 'nasabah.id_nasabah';
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
		$this->db->where('id_nasabah', $id);
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
		$this->db->select('n.*, n.id_nasabah, COALESCE(p.jumlah_penarikan, 0) as jumlah_penarikan, COALESCE(tr.total_pendapatan, 0) - COALESCE(p.total_penarikan, 0)+ COALESCE(n.saldo, 0)as saldo');
		$this->db->from('nasabah n');
		$this->db->join("($subquery_penarikan) p", 'n.id_nasabah = p.id_nasabah', 'left');
		$this->db->join("($subquery_transaksi) tr", 'n.id_nasabah = tr.id_nasabah', 'left');

		$this->db->group_by('n.id_nasabah'); // Group by berdasarkan id nasabah

		// Memfilter berdasarkan query jika ada
		if ($query != '') {
			$this->db->like('nama', $query);
			$this->db->or_like('alamat', $query);
			$this->db->or_like('no_tlp', $query);
			$this->db->or_like('saldo', $query);

		}
		$this->db->order_by('nama', 'DESC');
		return $this->db->get();


	}
}
