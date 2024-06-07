<?php
defined('BASEPATH') or exit('No direct script access
allowed');
class Laporan_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}
	public function total_transnasabah()
	{
		$this->db->select_sum('pendapatan');
		$query = $this->db->get('transaksi');
		if ($query->num_rows() > 0) {
			return $query->row()->pendapatan;
		}
		return 0;
	}
}
