<?php
defined('BASEPATH') or exit('No direct script access
allowed');
class Akuntasi_model extends CI_Model
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
		$this->db->select("*");
		$this->db->from($this->table);
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
