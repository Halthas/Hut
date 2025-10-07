<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Refferal_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_jenis_usaha($searchTerm)
    {
        $this->db->select('*');
        $this->db->from('ref_jenis_usaha');
        $this->db->where('is_active', 1);
		$this->db->like('name', $searchTerm);
        return $this->db->get()->result();
    }

    public function get_bank($searchTerm)
    {
        $this->db->select('*');
        $this->db->from('ref_bank');
        $this->db->where('is_active', 1);
		$this->db->like('name', $searchTerm);
        return $this->db->get()->result();
    }

    public function get_rencana_kinerja_program($searchTerm)
    {
        $this->db->select('*');
        $this->db->from('ref_rencana_kinerja');
        $this->db->where('rencana_kinerja_kelompok_id', 3);
        $this->db->where('is_active', 1);
		$this->db->like('name', $searchTerm);
        return $this->db->get()->result();
    }

    public function get_rencana_kinerja_kegiatan($searchTerm)
    {
        $this->db->select('*');
        $this->db->from('ref_rencana_kinerja');
        $this->db->where('rencana_kinerja_kelompok_id', 4);
        $this->db->where('is_active', 1);
		$this->db->like('name', $searchTerm);
        return $this->db->get()->result();
    }

    public function get_rencana_kinerja_kro($searchTerm)
    {
        $this->db->select('*');
        $this->db->from('ref_rencana_kinerja');
        $this->db->where('rencana_kinerja_kelompok_id', 5);
        $this->db->where('is_active', 1);
		$this->db->like('name', $searchTerm);
        return $this->db->get()->result();
    }

    public function get_rencana_kinerja_ro($searchTerm)
    {
        $this->db->select('*');
        $this->db->from('ref_rencana_kinerja');
        $this->db->where('rencana_kinerja_kelompok_id', 6);
        $this->db->where('is_active', 1);
		$this->db->like('name', $searchTerm);
        return $this->db->get()->result();
    }

    public function get_rencana_kinerja_komponen($searchTerm)
    {
        $this->db->select('*');
        $this->db->from('ref_rencana_kinerja');
        $this->db->where('rencana_kinerja_kelompok_id', 7);
        $this->db->where('is_active', 1);
		$this->db->like('name', $searchTerm);
        return $this->db->get()->result();
    }

    public function get_akun($searchTerm)
    {
        $this->db->select('*');
        $this->db->from('ref_akun');
        $this->db->where('is_active', 1);
		$this->db->like('name', $searchTerm);
        return $this->db->get()->result();
    }
}
