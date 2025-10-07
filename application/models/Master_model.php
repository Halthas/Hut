<?php
// Final OK !
defined('BASEPATH') or exit('No direct script access allowed');

class Master_model extends MY_Model {
  // Master Model Responsible on Entire Master Controller & Report Controller
  public function __construct(){
    // Construct & Data Table Library
    parent::__construct();
    $this->load->library('datatables');
  }

  private function ContentGenerator($options){
    // Generate Primary Key Content on Insert (Internal Helper)
    $length  = $options['length']  ?? 0;
    $useDate = $options['useDate'] ?? false;
    $suffix  = $options['suffix']  ?? null;
    return lockgenerator($length, $useDate, $suffix);
  }

  public function GlobalSelect($table, $cols="*", $datatable=false, $filter=[], $orders=[]){
    // Get Content on Various Output, Various Column & Table
    // Table Empty ? Fail
    if (empty($table)){
      return false;
    }
    // Content
    $this->db->select($cols)->from($table);
    if (!empty($filter)) $this->db->where($filter);
    if (!empty($orders)) $this->db->order_by(key($orders), current($orders));
    // Return Content in Datatable
    if ($datatable) return $this->datatables->generate();
    // Return Result
    $query = $this->db->get();
    $total = $query->num_rows();
    return ($total == 1) ? $query->row() : $query->result();
  }

  public function InsertUpdateData($table, $data, $primaryKey, $generateOptions = null){
    // Handle Insert or Update Data. Highly Depending on Primary Key Column
    // Empty Table or Data ? Fail !
    if (empty($table) || empty($data)) return false;

    // Control Insert or Update
    if (empty($data[$primaryKey])) {
      // Insert
      $data[$primaryKey] = !empty($generateOptions) ? $this->ContentGenerator($generateOptions) : $data[$primaryKey];
      return $this->db->insert($table, $data);
    } else {
      // Update
      return $this->db->where($primaryKey, $data[$primaryKey])->update($table, $data);
    }
  }

  public function InsertArray($table, $data){
    // Handle Insert Array Data
    if (empty($table) || empty($data)) return false;
    // Insert Array
    return $this->db->insert_batch($table, $data);
  }

  public function DeleteData($table, $column, $value, $data){
    // Controller to Perform Both Soft & Hard Delete on Table
    if (empty($data)) {
      // Data Empty ? Hard Delete
      return $this->db->where($column, $value)->delete($table);
    } else {
      // Otherwise, Soft Delete
      return $this->db->where($column, $value)->update($table, $data);
    }
  }
}
?>