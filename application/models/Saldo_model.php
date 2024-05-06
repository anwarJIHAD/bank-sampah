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
		$this->db->select('n.*, n.id_nasabah, COUNT(DISTINCT DATE(t.tanggal_penarikan)) as jumlah_penarikan,(SUM(COALESCE(tr.pendapatan, 0)) - SUM(COALESCE(t.nominal, 0))) as saldo'); // Menggunakan COUNT untuk menghitung jumlah transaksi
		$this->db->from('nasabah n');
		$this->db->join('penarikan_saldo t', 'n.id_nasabah = t.id_nasabah', 'left');
		$this->db->join('transaksi tr', 'n.id_nasabah = tr.id_nasabah', 'left');

		// Mengubah inner join menjadi left join
		$this->db->group_by('n.id_nasabah'); // Group by harus berdasarkan id_nasabah di tabel nasabah

		if ($query != '') {
			$this->db->like('n.nama', $query); // Pastikan pencarian dilakukan pada kolom yang tepat
		}

		$this->db->order_by('n.date_create', 'DESC'); // Pastikan pengurutan dilakukan pada kolom yang tepat
		return $this->db->get();
	}
}
