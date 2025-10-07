<?php
// Usages Controller : Handle Seluruh Pemakaian Terkait
defined('BASEPATH') or exit('No direct script access allowed');

class Usages extends Admin_Controller {
  // Controller Tabel Pemakaian Gas Medis
  protected $role;
  public function __construct(){
    // Construct & Model
    parent::__construct();
    $this->role = 'ipsrs';
    $this->load->model(['master_model']);
  }

  public function index(){
    // Function to Handle Main File of Tabel Pemakaian
    if (!get_permission($this->role, 'is_view')){
      access_denied();
    }
    // File Config
    $this->data['title'] = 'Tabel Pemakaian Gas Medis';
    $this->data['sub_page'] = 'usages/index';
    $this->data['main_menu'] = 'usages';
    $this->load->view('layout/index', $this->data);
  }
}