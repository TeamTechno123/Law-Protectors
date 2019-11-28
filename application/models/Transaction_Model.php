<?php
class Transaction_Model extends CI_Model{
  public function get_count_no($company_id, $field_name, $tbl_name){
    $query = $this->db->select('MAX('.$field_name.') as num')
    ->where('company_id', $company_id)
    ->from($tbl_name)
    ->get();
    $result =  $query->result_array();
    if($result){
      $old_num = $result[0]['num'];
    } else{
      $old_num = 0;
    }             //separating numeric part
    $value2 = $old_num + 1;                            //Incrementing numeric part
    $value2 = "" . sprintf('%06s', $value2);               //concatenating incremented value
    return $value = $value2;
  }
  // Application List...
  public function application_list($company_id,$status,$order){
    $this->db->select('application.*,branch.*,service.*,appl.*');
    $this->db->from('law_application as application');
    $this->db->where('application.company_id',$company_id);
    if($status){
      $this->db->where('application.application_status',$status);
    }
    $this->db->order_by('application.application_id',$order);
    $this->db->join('law_branch as branch','application.branch_id = branch.branch_id','LEFT');
    $this->db->join('law_service as service','application.service_id = service.service_id','LEFT');
    $this->db->join('law_applicant as appl','application.application_id = appl.application_id','LEFT');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }
  // Application Details...
  public function application_details($application_id){
    $query = $this->db->select('application.*,branch.*,service.*,organization.*,appl.*')
    ->from('law_application as application')
    ->where('application.application_id',$application_id)
    ->join('law_branch as branch','application.branch_id = branch.branch_id','LEFT')
    ->join('law_service as service','application.service_id = service.service_id','LEFT')
    ->join('law_organization as organization','application.organization_id = organization.organization_id','LEFT')
    ->join('law_applicant as appl','application.application_id = appl.application_id','LEFT')
    ->get();
    $result = $query->result();
    return $result;
  }
}
?>
