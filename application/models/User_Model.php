<?php
class User_Model extends CI_Model{

  function check_login($email, $password){
    $query = $this->db->select('*')
        ->where('user_email', $email)
        ->where('user_password', $password)
        ->from('law_user')
        ->get();
      $result = $query->result_array();
      return $result;
  }

  public function get_count($id_type,$company_id,$key,$tbl_name){
    $this->db->select($id_type);
    if($key != ''){
      $this->db->where('application_status', $key);
    }
    $this->db->where('company_id', $company_id);
    $this->db->from($tbl_name);
      $query =  $this->db->get();
    $result = $query->num_rows();
    return $result;
  }
  public function get_count2($id_type,$key,$tbl_name){
    $this->db->select($id_type);
    if($key != ''){
      $this->db->where('application_status', $key);
    }
    $this->db->from($tbl_name);
      $query =  $this->db->get();
    $result = $query->num_rows();
    return $result;
  }

  public function save_data($tbl_name, $data){
    $this->db->insert($tbl_name, $data);
    $insert_id = $this->db->insert_id();
    return  $insert_id;
  }

  public function get_list($company_id,$id,$order,$tbl_name){
    $query = $this->db->select('*')
            ->where('company_id', $company_id)
            ->order_by($id, $order)
            ->from($tbl_name)
            ->get();
    $result = $query->result();
    return $result;
  }

  public function get_list2($id,$order,$tbl_name){
    $query = $this->db->select('*')
            ->order_by($id, $order)
            ->from($tbl_name)
            ->get();
    $result = $query->result();
    return $result;
  }

  public function get_user_list($company_id){
    $query = $this->db->select('*')
            // ->where('company_id', $company_id)
            ->where('is_admin', 0)
            ->from('law_user')
            ->get();
    $result = $query->result();
    return $result;
  }

  public function get_info($id_type, $id, $tbl_name){
    $query = $this->db->select('*')
            ->where($id_type, $id)
            ->from($tbl_name)
            ->get();
    $result = $query->result();
    return $result;
  }

  public function update_info($id_type, $id, $tbl_name, $data){
    $this->db->where($id_type, $id)
    ->update($tbl_name, $data);
  }

  public function delete_info($id_type, $id, $tbl_name){
    $this->db->where($id_type, $id)
    ->delete($tbl_name);
  }

  public function check_duplication($company_id,$value,$field_name,$table_name){
    $query = $this->db->select($field_name)
      ->where('company_id', $company_id)
      ->where($field_name,$value)
      ->from($table_name)
      ->get();
    $result = $query->num_rows();
    return $result;
  }

  public function status_list_count(){
    $this->db->select('application_status, COUNT(application_id) as count');
    $this->db->from('law_application');
    $this->db->group_by('application_status');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }
  public function service_list_count(){
    $this->db->select('COUNT(law_application.application_id) as count,law_service.service_name');
    $this->db->from('law_application');
    $this->db->group_by('law_application.service_id');
    $this->db->join('law_service','law_application.service_id = law_service.service_id','LEFT');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function count_service_status($service_id,$status){
    $this->db->select('COUNT(application_id) as count');
    $this->db->from('law_application');
    $this->db->where('service_id',$service_id);
    $this->db->where('application_status',$status);
    $query = $this->db->get();
    $result = $query->result_array();
    return $result[0]['count'];
  }

}
?>
