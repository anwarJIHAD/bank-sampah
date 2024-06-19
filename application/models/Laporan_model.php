<?php
defined('BASEPATH') or exit('No direct script access
allowed');
class Laporan_model extends CI_Model
{
	protected $table1 = 'transaksi';
	protected $table2 = 'transaksi_pelapak';
	protected $table3 = 'operasional';
	protected $table4 = 'penarikan_saldo';


	public function __construct()
	{
		parent::__construct();

	}
	public function total_transnasabah($id_nasabah, $start, $end)
	{
		$this->db->select_sum('pendapatan');
		if ($id_nasabah != '') {
			$this->db->where('id_nasabah', $id_nasabah);
		}
		if ($start != '' && $end != '') {
			$this->db->where('tanggal_transaksi >=', $start);
			$this->db->where('tanggal_transaksi <=', $end);
		}
		$query = $this->db->get('transaksi');
		if ($query->num_rows() > 0) {
			return $query->row()->pendapatan;
		}
		return 0;
	}
	public function fech_debitkredit($id, $start, $end)
	{
		$this->db->reset_query();  // Memastikan query builder bersih

		// Query untuk tabel1
		$this->db->select("pendapatan AS harga_, jenis AS jenis_, tanggal_transaksi AS tanggal_gabungan");
		$this->db->from($this->table1);
		if ($id != '') {
			$this->db->where('id_nasabah', $id);
		}
		if ($start != '' && $end != '') {
			$this->db->where('tanggal_transaksi >=', $start);
			$this->db->where('tanggal_transaksi <=', $end);
		}
		// $this->apply_search_conditions($query);  // Aplikasi kondisi pencarian
		$subQuery1 = $this->db->get_compiled_select();

		// Reset query builder
		$this->db->reset_query();

		// Query untuk tabel2
		$this->db->select("nominal AS harga_, keterangan AS jenis_, tanggal_penarikan AS tanggal_gabungan");
		$this->db->from($this->table4);
		if ($id != '') {
			$this->db->where('id_nasabah', $id);
		}
		if ($start != '' && $end != '') {
			$this->db->where('tanggal_transaksi >=', $start);
			$this->db->where('tanggal_transaksi <=', $end);
		}
		// $this->apply_search_conditions($query);
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
