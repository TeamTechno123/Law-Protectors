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

  function check_otp($otp, $user_id){
    $query = $this->db->select('*')
        ->where('user_otp', $otp)
        ->where('user_id', $user_id)
        ->from('law_user')
        ->get();
    $result = $query->result_array();
    return $result;
  }

  function check_pwd($user_id,$old_password){
    $query = $this->db->select('user_id')
        ->where('user_password', $old_password)
        ->where('user_id', $user_id)
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
    $this->db->select('law_user.*,law_branch.*,law_company.*,law_roll.*');
    $this->db->from('law_user');
    $this->db->where('law_user.is_admin', 0);
    $this->db->join('law_branch','law_user.branch_id = law_branch.branch_id','LEFT');
    $this->db->join('law_company','law_user.company_id = law_company.company_id','LEFT');
    $this->db->join('law_roll','law_user.roll_id = law_roll.roll_id','LEFT');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function get_user_list2($company_id){
    $this->db->select('law_user.*,law_company.*,law_roll.*');
    $this->db->from('law_user');
    $this->db->where('law_user.is_admin', 0);
    $this->db->join('law_company','law_user.company_id = law_company.company_id','LEFT');
    $this->db->join('law_roll','law_user.roll_id = law_roll.roll_id','LEFT');
    $query = $this->db->get();
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

  public function get_info_arr($id_type, $id, $tbl_name){
    $query = $this->db->select('*')
            ->where($id_type, $id)
            ->from($tbl_name)
            ->get();
    $result = $query->result_array();
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
      // ->where('company_id', $company_id)
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

  public function target_list(){
    $this->db->select('law_target_details.*,law_branch.*,law_company.company_name,law_target.*');
    $this->db->from('law_target_details');
    $this->db->group_by('law_target_details.target_no');
    $this->db->join('law_branch','law_target_details.branch_id = law_branch.branch_id','LEFT');
    $this->db->join('law_company','law_company.company_id = law_branch.company_id','LEFT');
    $this->db->join('law_target','law_target.target_id = law_target_details.target_id','LEFT');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function target_range_list(){
    $this->db->select('law_target.*,law_branch.*,law_company.company_name');
    $this->db->from('law_target');
    $this->db->join('law_branch','law_target.branch_id = law_branch.branch_id','LEFT');
    $this->db->join('law_company','law_company.company_id = law_branch.company_id','LEFT');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function target_info($target_id){
    $this->db->select('law_target.*,law_branch.*,law_company.company_name');
    $this->db->from('law_target');
    $this->db->where('law_target.target_id',$target_id);
    $this->db->join('law_branch','law_target.branch_id = law_branch.branch_id','LEFT');
    $this->db->join('law_company','law_company.company_id = law_branch.company_id','LEFT');
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
  }

  public function target_details($target_no){
    $this->db->select('law_target_details.*,law_target.*,law_branch.*');
    $this->db->from('law_target_details');
    $this->db->where('law_target_details.target_no',$target_no);
    $this->db->limit(1);
    $this->db->join('law_target','law_target_details.target_id = law_target.target_id','LEFT');
    $this->db->join('law_branch','law_target_details.branch_id = law_branch.branch_id','LEFT');
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
  }

  public function target_details2($target_no){
    $this->db->select('law_target_details.*,law_user.roll_id,law_user.user_name,law_user.user_lastname,law_roll.*');
    $this->db->from('law_target_details');
    $this->db->where('law_target_details.target_no',$target_no);
    $this->db->join('law_user','law_target_details.user_id = law_user.user_id','LEFT');
    $this->db->join('law_roll','law_user.roll_id = law_roll.roll_id','LEFT');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function leg_doc_list($application_id){
    $this->db->select('*');
    $this->db->from('law_leg_doc_up');
    $this->db->where('application_id',$application_id);
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  // public function target_details3($target_no){
  //   $this->db->select('law_target_details.*');
  //   $this->db->from('law_target_details');
  //   $this->db->where('law_target_details.target_no',$target_no);
  //   $this->db->limit(1);
  //   $this->db->join('law_target','law_target_details.target_id = law_target.target_id','LEFT');
  //   $this->db->join('law_branch','law_target_details.branch_id = law_branch.branch_id','LEFT');
  //   $query = $this->db->get();
  //   $result = $query->result_array();
  //   return $result;
  // }
}
?>
