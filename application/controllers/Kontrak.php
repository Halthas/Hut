<?php
// Kerja Sama Controler : Handle Entire Perjanjian Kerja Sama Gas Medis Controller
defined('BASEPATH') or exit('No direct script access allowed');

class Kerja extends Admin_Controller {
  // Kerja Main Class Controller
  protected $role;
  public function __construct(){
    // Construct & Model
    parent::__construct();
    $this->role = 'ipsrs';
    $this->load->model(['master_model']);
  }

  public function index(){
    if (!get_permission($this->role, 'is_view')){
      access_denied();
    }
  }

  public function insert(){
    if (!get_permission($this->role, 'is_add') && !get_permission($this->role, 'is_edit')) {
      access_denied();
    }
  }

  public function publish(){
    if (!get_permission($this->role, 'is_add') && !get_permission($this->role, 'is_edit')) {
      access_denied();
    }
    $posts = $this->input->post();
  }

  public function KontrakOnly(){
    if (!get_permission($this->role, 'is_view')){
      access_denied();
    }
  }
}