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
    
}
