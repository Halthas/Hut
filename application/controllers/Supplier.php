<?php
// Supplier Controller : Handle Entire Supplier Data
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends Admin_Controller {
  // Supplier Main Class Controller
  protected $role;
  public function __construct(){
    // Construct & Model
    parent::__construct();
    $this->role = 'ipsrs';
    $this->load->model(['master_model']);
  }

  public function SupplierOnly(){
    // Controller to Handle Supplier Select Option
    if (!get_permission($this->role, 'is_view')){
      access_denied();
    }
    // Column to Detail
    $suppliers = $this->master_model->GlobalSelect("kontrak_penyedia", "id, company_name", false, ["is_active" => 1]);
    $result = array();
    foreach ($suppliers as $value) {
      $value = (array) $value;
      // Insert to Array
      $result[] = array("id" => $value['id'], "text" => $value["company_name"]);
    }
    echo json_encode($result);
  }
}