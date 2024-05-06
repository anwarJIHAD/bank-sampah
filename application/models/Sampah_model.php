<?php
defined('BASEPATH') or exit('No direct script access
allowed');
class Sampah_model extends CI_Model
{
	public $table = 'sampah';
	public $id = 'sampah.id_sampah';
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
		$this->db->where('id_sampah', $id);
		$this->db->order_by('date_create', 'desc');
		$query = $this->db->get();
		return $query->row_array();
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
			$this->db->like('kategori', $query);
			$this->db->or_like('harga_nasabah', $query);
			$this->db->or_like('harga_unit', $query);
		}
		$this->db->order_by('date_create', 'DESC');
		return $this->db->get();


	}
}
