<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Refferal extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
		$this->load->model(array('refferal_model'));
    }
	
	public function get_jenis_usaha()
    {
		if (!get_permission('jenis_usaha', 'is_view') || !get_permission('vendor', 'is_view')) {
            access_denied();
        }
		
		if (isset($_GET['searchTerm']) && !empty($_GET['searchTerm'])) {
			$searchTerm = $_GET['searchTerm'];
		} else {
			$searchTerm = null;
		}
		
		$portdata = $this->refferal_model->get_jenis_usaha($searchTerm);
		
		$data = array();
        foreach($portdata as $row){
            $data[] = array("id" => $row->id, "text" => $row->code . ' - ' . $row->name);
        }
		
        echo json_encode($data);
    }
	
	public function get_bank()
    {
		if (!get_permission('bank', 'is_view') || !get_permission('vendor', 'is_view')) {
            access_denied();
        }
		
		if (isset($_GET['searchTerm']) && !empty($_GET['searchTerm'])) {
			$searchTerm = $_GET['searchTerm'];
		} else {
			$searchTerm = null;
		}
		
		$portdata = $this->refferal_model->get_bank($searchTerm);
		
		$data = array();
        foreach($portdata as $row){
            $data[] = array("id" => $row->id, "text" => $row->name);
        }
		
        echo json_encode($data);
    }
	
	public function get_rencana_kinerja_program()
    {
		if (!get_permission('rencana_kinerja', 'is_view') || !get_permission('rkakl', 'is_view')) {
            access_denied();
        }
		
		if (isset($_GET['searchTerm']) && !empty($_GET['searchTerm'])) {
			$searchTerm = $_GET['searchTerm'];
		} else {
			$searchTerm = null;
		}
		
		$portdata = $this->refferal_model->get_rencana_kinerja_program($searchTerm);
		
		$data = array();
        foreach($portdata as $row){
            $data[] = array("id" => $row->id, "text" => $row->code . ' - ' . $row->name);
        }
		
        echo json_encode($data);
    }
	
	public function get_rencana_kinerja_kegiatan()
    {
		if (!get_permission('rencana_kinerja', 'is_view') || !get_permission('rkakl', 'is_view')) {
            access_denied();
        }
		
		if (isset($_GET['searchTerm']) && !empty($_GET['searchTerm'])) {
			$searchTerm = $_GET['searchTerm'];
		} else {
			$searchTerm = null;
		}
		
		$portdata = $this->refferal_model->get_rencana_kinerja_kegiatan($searchTerm);
		
		$data = array();
        foreach($portdata as $row){
            $data[] = array("id" => $row->id, "text" => $row->code . ' - ' . $row->name);
        }
		
        echo json_encode($data);
    }
	
	public function get_rencana_kinerja_kro()
    {
		if (!get_permission('rencana_kinerja', 'is_view') || !get_permission('rkakl', 'is_view')) {
            access_denied();
        }
		
		if (isset($_GET['searchTerm']) && !empty($_GET['searchTerm'])) {
			$searchTerm = $_GET['searchTerm'];
		} else {
			$searchTerm = null;
		}
		
		$portdata = $this->refferal_model->get_rencana_kinerja_kro($searchTerm);
		
		$data = array();
        foreach($portdata as $row){
            $data[] = array("id" => $row->id, "text" => $row->code . ' - ' . $row->name);
        }
		
        echo json_encode($data);
    }
	
	public function get_rencana_kinerja_ro()
    {
		if (!get_permission('rencana_kinerja', 'is_view') || !get_permission('rkakl', 'is_view')) {
            access_denied();
        }
		
		if (isset($_GET['searchTerm']) && !empty($_GET['searchTerm'])) {
			$searchTerm = $_GET['searchTerm'];
		} else {
			$searchTerm = null;
		}
		
		$portdata = $this->refferal_model->get_rencana_kinerja_ro($searchTerm);
		
		$data = array();
        foreach($portdata as $row){
            $data[] = array("id" => $row->id, "text" => $row->code . ' - ' . $row->name);
        }
		
        echo json_encode($data);
    }
	
	public function get_rencana_kinerja_komponen()
    {
		if (!get_permission('rencana_kinerja', 'is_view') || !get_permission('rkakl', 'is_view')) {
            access_denied();
        }
		
		if (isset($_GET['searchTerm']) && !empty($_GET['searchTerm'])) {
			$searchTerm = $_GET['searchTerm'];
		} else {
			$searchTerm = null;
		}
		
		$portdata = $this->refferal_model->get_rencana_kinerja_komponen($searchTerm);
		
		$data = array();
        foreach($portdata as $row){
            $data[] = array("id" => $row->id, "text" => $row->code . ' - ' . $row->name);
        }
		
        echo json_encode($data);
    }
	
	public function get_akun()
    {
		if (!get_permission('rencana_kinerja', 'is_view') || !get_permission('rkakl', 'is_view')) {
            access_denied();
        }
		
		if (isset($_GET['searchTerm']) && !empty($_GET['searchTerm'])) {
			$searchTerm = $_GET['searchTerm'];
		} else {
			$searchTerm = null;
		}
		
		$portdata = $this->refferal_model->get_akun($searchTerm);
		
		$data = array();
        foreach($portdata as $row){
            $data[] = array("id" => $row->id, "text" => $row->code . ' - ' . $row->name);
        }
		
        echo json_encode($data);
    }
}
