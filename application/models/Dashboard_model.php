<?php
defined('BASEPATH') or exit('No direct script access
allowed');
class Dashboard_model extends CI_Model
{
    // public $table = 'akses';
    // public $NIP = 'akses.id_akses';
    public function __construct()
    {
        parent::__construct();
    }
    public function jumlah_nasabah()
    {
        return $this->db->count_all('nasabah');
    }
	public function jumlah_sampah()
    {
        return $this->db->count_all('sampah');
    }
	public function getTransaksiNasabah($tahun, $month)
	{
		$this->db->select('month(tanggal_transaksi)');
		$this->db->from('transaksi'); // Ganti 'nama_tabel' dengan nama tabel Anda
		if ($tahun != '') {
			$this->db->where('YEAR(tanggal_transaksi)', $tahun);
		}
		// 'tanggal' adalah nama kolom tanggal dalam tabel
		$this->db->where('month(tanggal_transaksi)', $month); // 'tanggal' adalah nama kolom tanggal dalam tabel
		$query = $this->db->get();
		return $query->num_rows();
	}
    
	public function getTransaksiPelapak($tahun, $month)
	{
		$this->db->select('month(tanggal_transaksi)');
		$this->db->from('transaksi_pelapak'); // Ganti 'nama_tabel' dengan nama tabel Anda
		if ($tahun != '') {
			$this->db->where('YEAR(tanggal_transaksi)', $tahun);
		}
		// 'tanggal' adalah nama kolom tanggal dalam tabel
		$this->db->where('month(tanggal_transaksi)', $month); // 'tanggal' adalah nama kolom tanggal dalam tabel
		$query = $this->db->get();
		return $query->num_rows();
	}
}
