<?php
defined('BASEPATH') or exit('No direct script access
allowed');
class User_model extends CI_Model
{
	public $table = 'user';
	public $NIP = 'user.id_user';
	public function __construct()
	{
		parent::__construct();
	}
	public function get()
	{
		$this->db->from($this->table);
		$this->db->order_by('date_create', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getById_()
	{
		$this->db->select('a.*,u.*');
		$this->db->from('akses a');
		$this->db->join('user u', 'a.NIP = u.NIP');
		$this->db->where('u.status_user2', 'aktif');
		$this->db->order_by('u.date_create', 'desc'); // Mengurutkan hasil berdasarkan kolom 'tanggal' secara ascending

		$query = $this->db->get();
		return $query->result_array();
	}
	public function getByberkas()
	{
		$this->db->select('a.*, u.*, COUNT(b.NIP) as jumlah_berkas');
		$this->db->from('akses a');
		$this->db->join('user u', 'a.NIP = u.NIP');
		$this->db->join('pangkat b', 'u.NIP = b.NIP', 'left'); // Asumsi 'berkas' memiliki kolom 'NIP' dan 'id' adalah primary key dari 'berkas'
		$this->db->where('u.status_user2', 'aktif');
		$this->db->group_by('u.NIP'); // Grup berdasarkan NIP untuk menghitung jumlah berkas per pegawai
		$this->db->order_by('u.date_create', 'desc');

		$query = $this->db->get();
		return $query->result_array();
	}
	public function getByNon()
	{
		$this->db->select('a.*,u.*');
		$this->db->from('akses a');
		$this->db->join('user u', 'a.NIP = u.NIP');
		$this->db->where('u.status_user2', 'Non-Aktif');
		$this->db->order_by('u.date_create', 'desc'); // Mengurutkan hasil berdasarkan kolom 'tanggal' secara ascending

		$query = $this->db->get();
		return $query->result_array();
	}
	public function getBy()
	{
		$this->db->from($this->table);
		$this->db->where('NIP', $this->session->userdata('NIP'));
		$this->db->order_by('date_create', 'desc');
		$query = $this->db->get();
		return $query->row_array();
	}
	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
	public function getById($NIP)
	{
		$this->db->from($this->table);
		$this->db->where('NIP', $NIP);
		$this->db->order_by('date_create', 'desc');
		$query = $this->db->get();
		return $query->row_array();
	}
	public function insert($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->affected_rows();
	}
	public function delete($NIP)
	{
		$this->db->where($this->NIP, $NIP);
		$this->db->delete($this->table);
		return $this->db->affected_rows();
	}
	public function tuser()
	{
		$this->db->from($this->table);
		$query = $this->db->get();
		return $query->num_rows();
	}
}
