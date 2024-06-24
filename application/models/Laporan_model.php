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
			$this->db->where('tanggal_penarikan >=', $start);
			$this->db->where('tanggal_penarikan <=', $end);
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
	public function fect_penjualan($id, $start, $end)
	{
		$this->db->select('t.*,s.kategori,p.nama'); // Menggunakan COUNT untuk menghitung jumlah transaksi
		$this->db->from('transaksi_pelapak t');
		$this->db->join('pelapak p', 'p.id_pelapak = t.id_pelapak', 'left');
		$this->db->join('sampah s', 's.id_sampah = t.id_sampah', 'left');
		if ($start != '' && $end != '') {
			$this->db->where('t.tanggal_transaksi >=', $start);
			$this->db->where('t.tanggal_transaksi <=', $end);
		}
		if ($id != '') {
			$this->db->where('t.id_pelapak', $id);
		}

		$this->db->order_by('t.date_create', 'DESC');
		$query = $this->db->get();
		if (empty($query)) {
			return [];
		}

		return $query;
	}
	public function fect_akuntasi($start, $end)
	{
		$this->db->reset_query();  // Memastikan query builder bersih

		// Query untuk tabel1
		$this->db->select("pendapatan AS harga_, jenis AS jenis_, tanggal_transaksi AS tanggal_gabungan");
		$this->db->from($this->table1);
		if ($start != '' && $end != '') {
			$this->db->where('tanggal_transaksi >=', $start);
			$this->db->where('tanggal_transaksi <=', $end);
		}
		$subQuery1 = $this->db->get_compiled_select();

		// Reset query builder
		$this->db->reset_query();

		// Query untuk tabel2
		$this->db->select("pendapatan AS harga_, jenis AS jenis_, tanggal_transaksi AS tanggal_gabungan");
		$this->db->from($this->table2);
		if ($start != '' && $end != '') {
			$this->db->where('tanggal_transaksi >=', $start);
			$this->db->where('tanggal_transaksi <=', $end);
		}
		$subQuery2 = $this->db->get_compiled_select();

		// Reset query builder
		$this->db->reset_query();

		// Query untuk tabel3
		$this->db->select("harga AS harga_, keterangan AS jenis_, tanggal_pengeluaran AS tanggal_gabungan");
		$this->db->from($this->table3);
		if ($start != '' && $end != '') {
			$this->db->where('tanggal_pengeluaran >=', $start);
			$this->db->where('tanggal_pengeluaran <=', $end);
		}
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
	public function fect_operasional($start, $end){
		$this->db->select("*");
		$this->db->from($this->table3);
		if ($start != '' && $end != '') {
			$this->db->where('tanggal_pengeluaran >=', $start);
			$this->db->where('tanggal_pengeluaran <=', $end);
		}
		$query = $this->db->get();
		
		$this->db->order_by('date_create', 'desc');
		$result = $query->result_array();

		if (empty($result)) {
			return [];
		}

		return $result;
	}
	

}
