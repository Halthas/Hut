<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vendor_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }
	
	public function vendor_save($data)
    {
		$uuid = $this->uuid->v4();
		$insert_data = array(
			'id' => $data['vendor_id'],
			'uuid' => $data['vendor_uuid'],
			'name' => $data['vendor_name'],
			'position' => $data['position'],
			'company_name' => $data['company_name'],
			'address' => $data['address'],
			'mobileno' => $data['mobileno'],
			'email' => $data['email'],
			'bank_acc' => $data['bank_acc'],
			'jenis_usaha_id' => $data['jenis_usaha'],
			'bank_id' => $data['bank']
	    );
	    
	    if (isset($data['vendor_uuid']) && !empty($data['vendor_uuid'])) {
			$insert_data['updated_at'] = date("Y-m-d H:i:s");
			$insert_data['updated_by'] = html_escape($this->session->userdata('name'));
			$this->db->where('uuid', $data['vendor_uuid']);
			$this->db->update('kontrak_penyedia', $insert_data);
		} else {
			$insert_data['uuid'] = $uuid;
			$insert_data['is_active'] = 1;
			$insert_data['created_at'] = date("Y-m-d H:i:s");
			$insert_data['created_by'] = html_escape($this->session->userdata('name'));
			$this->db->insert('kontrak_penyedia', $insert_data);
		}
		
		return $uuid;
    }

    public function vendor_list($requset = false)
    {
		$this->datatables->select('kontrak_penyedia.id AS penyedia_id, kontrak_penyedia.uuid AS penyedia_uuid, kontrak_penyedia.name AS penyedia_name, kontrak_penyedia.position AS penyedia_position, kontrak_penyedia.company_name AS penyedia_company_name, kontrak_penyedia.address AS penyedia_address, kontrak_penyedia.mobileno AS penyedia_mobileno, kontrak_penyedia.email AS penyedia_email, kontrak_penyedia.bank_acc AS penyedia_bank_acc, kontrak_penyedia.is_active AS penyedia_is_active, ref_jenis_usaha.name AS jenis_usaha_name, ref_bank.name AS bank_name');
		$this->datatables->from('kontrak_penyedia');
		$this->datatables->join('ref_jenis_usaha', 'kontrak_penyedia.jenis_usaha_id = ref_jenis_usaha.id');
		$this->datatables->join('ref_bank', 'kontrak_penyedia.bank_id = ref_bank.id');
		$this->datatables->where('kontrak_penyedia.is_active', 1);
		return $this->datatables->generate();
    }
	
	public function vendor_detil($uuid)
    {
        $this->db->select('kontrak_penyedia.id AS penyedia_id, kontrak_penyedia.uuid AS penyedia_uuid, kontrak_penyedia.name AS penyedia_name, kontrak_penyedia.position AS penyedia_position, kontrak_penyedia.company_name AS penyedia_company_name, kontrak_penyedia.address AS penyedia_address, kontrak_penyedia.mobileno AS penyedia_mobileno, kontrak_penyedia.email AS penyedia_email, kontrak_penyedia.bank_acc AS penyedia_bank_acc, kontrak_penyedia.is_active AS penyedia_is_active, kontrak_penyedia.jenis_usaha_id, ref_jenis_usaha.name AS jenis_usaha_name, kontrak_penyedia.bank_id, ref_bank.name AS bank_name');
		$this->db->from('kontrak_penyedia');
		$this->db->join('ref_jenis_usaha', 'kontrak_penyedia.jenis_usaha_id = ref_jenis_usaha.id');
		$this->db->join('ref_bank', 'kontrak_penyedia.bank_id = ref_bank.id');
        $this->db->where('kontrak_penyedia.uuid', $uuid);
        return $this->db->get()->row_array();
    }
	
	public function vendor_delete($uuid)
    {
		if (isset($uuid) && !empty($uuid)) {
			$data = array(
				'is_active' => 0,
				'deleted_at' => date("Y-m-d H:i:s"),
				'deleted_by' => html_escape($this->session->userdata('name'))
			);
			
			$this->db->where('uuid', $uuid);
			$this->db->update('kontrak_penyedia', $data);
		}
    }
}
