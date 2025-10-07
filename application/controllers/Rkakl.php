<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rkakl extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
		$this->load->model(array('rkakl_model'));
    }
	
	public function get_header()
    {
		if (!get_permission('rkakl', 'is_add') || !get_permission('rkakl', 'is_edit')) {
            access_denied();
        }
		
		if (isset($_GET['searchTerm']) && !empty($_GET['searchTerm'])) {
			$searchTerm = $_GET['searchTerm'];
		} else {
			$searchTerm = null;
		}
		
		$portdata = $this->rkakl_model->get_header($searchTerm);
		
		$data = array();
        foreach($portdata as $row){
            $data[] = array("id" => $row->id, "text" => $row->code . ' - ' . $row->name);
        }
		
        echo json_encode($data);
    }
	
	public function get_header_sub()
    {
		if (!get_permission('rkakl', 'is_add') || !get_permission('rkakl', 'is_edit')) {
            access_denied();
        }
		
		if (isset($_GET['searchTerm']) && !empty($_GET['searchTerm'])) {
			$searchTerm = $_GET['searchTerm'];
		} else {
			$searchTerm = null;
		}
		
		$portdata = $this->rkakl_model->get_header_sub($searchTerm);
		
		$data = array();
        foreach($portdata as $row){
            $data[] = array("id" => $row->id, "text" => $row->name);
        }
		
        echo json_encode($data);
    }
	
	public function index()
    {
        if (!get_permission('rkakl', 'is_view')) {
            access_denied();
        }
		
		$this->data['headerelements'] = array(
            'css' => array(
                'vendor/datatables/extras/TableTools/RowGroup-1.0.2/css/rowGroup.bootstrap.min.css',
            ),
            'js' => array(
                'vendor/datatables/extras/TableTools/RowGroup-1.0.2/js/dataTables.rowGroup.min.js',
            ),
        );
        $this->data['title'] = 'Rencana Kerja dan Anggaran Kementerian Negara/Lembaga (RKA-KL)';
        $this->data['sub_page'] = 'rkakl/index';
        $this->data['main_menu'] = 'rkakl';
        $this->load->view('layout/index', $this->data);
    }
	
	public function rkakl_save()
    {
        if (!get_permission('rkakl', 'is_add') || !get_permission('rkakl', 'is_edit')) {
            access_denied();
        }
		
        $this->form_validation->set_rules('program', 'Program', 'trim|required');
        $this->form_validation->set_rules('kegiatan', 'Kegiatan', 'trim|required');
        $this->form_validation->set_rules('kegiatan_rencana_output', 'Kegiatan Rencana Output', 'trim|required');
        $this->form_validation->set_rules('rencana_output', 'Rencana Output', 'trim|required');
        $this->form_validation->set_rules('komponen', 'Komponen', 'trim|required');
        $this->form_validation->set_rules('header', 'Header', 'trim|required');
        $this->form_validation->set_rules('header_sub', 'Sub Header', 'trim|required');
        $this->form_validation->set_rules('rkakl_name', 'Nama', 'trim|required');
        $this->form_validation->set_rules('rkakl_volume', 'Volume', 'trim|required');
        $this->form_validation->set_rules('rkakl_satuan', 'Satuan', 'trim|required');
        $this->form_validation->set_rules('rkakl_harga', 'Harga Satuan', 'trim|required');
		
        if ($this->form_validation->run() !== false) {
            $data = $this->input->post();
			$this->rkakl_model->rkakl_save($data);
            $array = array('status' => 'success', 'error' => '', 'message' => translate('information_has_been_saved_successfully'));
        } else {
            $array = array('status' => 'error', 'error' => '', 'message' => 'Gagal menyimpan data');
        }
		
		echo json_encode($array);
    }
	
	public function rkakl_list()
    {
		$datatables = $this->rkakl_model->rkakl_list(true);
        $datatables = json_decode($datatables);
		
		$dt_data = array();

        if (!empty($datatables->data)) {
            foreach ($datatables->data as $key => $value) {
                $edit = '';
				if (get_permission('rkakl', 'is_edit')) {
					$edit .= '<button class="btn btn-circle icon btn-primary" data-placement="top" data-toggle="tooltip" data-original-title="' . translate('edit') . '" id="edit_rkakl" name="edit_rkakl" data_edit_rkakl="' . $value->rkakl_detil_uuid . '"><i class="fas fa-pen-nib"></i></button>';
				} else {
					$edit .= '';
				}
				
				$delete = '';
				if (get_permission('rkakl', 'is_delete')) {
					$delete .= btn_delete('rkakl/rkakl_delete/' . $value->rkakl_detil_uuid);
				} else {
					$delete .= '';
				}
				
				$view = '<button class="btn btn-circle icon btn-info" data-placement="top" data-toggle="tooltip" data-original-title="View" id="view_rkakl" name="view_rkakl" data_view_rkakl="' . $value->rkakl_detil_uuid . '"><i class="fas fa-info-circle"></i></button>';
				
				$row = array();
                $row[] = $value->rkakl_detil_uuid;
				$row[] = $value->program;
				$row[] = $value->kegiatan;
                $row[] = $value->kro;
                $row[] = $value->ro;
                $row[] = $value->komponen;
                $row[] = $value->rkakl_header;
                $row[] = $value->akun;
                $row[] = $value->rkakl_header_sub;
				$row[] = $value->rkakl_detil_name;
				$row[] = $value->rkakl_detil_volume_satuan;
				$row[] = number_format($value->rkakl_detil_harga_satuan, 0);
				$row[] = number_format($value->rkakl_detil_jumlah, 0);
                $row[] = $edit . $view . $delete;
                $dt_data[] = $row;
            }
        }
		
        $json_data = array(
            "draw" => intval($datatables->draw),
            "recordsTotal" => intval($datatables->recordsTotal),
            "recordsFiltered" => intval($datatables->recordsFiltered),
            "data" => $dt_data,
        );
        
        echo json_encode($json_data);
    }
	
	public function rkakl_detil()
    {
		if (!get_permission('rkakl', 'is_add') || !get_permission('rkakl', 'is_edit')) {
            access_denied();
        }
		
		$uuid = $this->input->post('data_edit_rkakl');
		$data = $this->rkakl_model->rkakl_detil($uuid);
        
        echo json_encode($data);
    }
	
	public function rkakl_delete($uuid)
    {
        if (!get_permission('rkakl', 'is_delete')) {
            access_denied();
        }
        
		$this->rkakl_model->rkakl_delete($uuid);
    }
}
