<?php
class Transaction_Model extends CI_Model{
  public function get_count_no($field_name, $tbl_name){
    $query = $this->db->select('MAX('.$field_name.') as num')
    // ->where('company_id', $company_id)
    ->from($tbl_name)
    ->get();
    $result =  $query->result_array();
    if($result){
      $old_num = $result[0]['num'];
    } else{
      $old_num = 0;
    }             //separating numeric part
    $value2 = $old_num + 1;                            //Incrementing numeric part
    // $value2 = "" . sprintf('%06s', $value2);               //concatenating incremented value
    return $value = $value2;
  }

  // Int Counter not depend on Company...
  public function get_count_no2($field_name, $tbl_name){
    $query = $this->db->select('MAX('.$field_name.') as num')
    ->from($tbl_name)
    ->get();
    $result =  $query->result_array();
    if($result){
      $old_num = $result[0]['num'];
    } else{
      $old_num = 0;
    }             //separating numeric part
    $value2 = $old_num + 1;                            //Incrementing numeric part
    // $value2 = "" . sprintf('%06s', $value2);               //concatenating incremented value
    return $value = $value2;
  }
  // Company wise Challan Number...
  public function get_count_no3($company_id,$field_name, $tbl_name){
    $query = $this->db->select('MAX('.$field_name.') as num')
    ->from($tbl_name)
    ->get();
    $result =  $query->result_array();
    if($result){
      $old_num = $result[0]['num'];
    } else{
      $old_num = 0;
    }             //separating numeric part
    $value2 = $old_num + 1;                            //Incrementing numeric part
    // $value2 = "" . sprintf('%06s', $value2);               //concatenating incremented value
    return $value = $value2;
  }

  //
  public function get_users_by_branch($roll_id,$branch_id){
    $this->db->select('user.user_id,user.roll_id,user.user_name,user.user_lastname,user.user_mobile,law_roll.roll_name');
    $this->db->from('law_user as user');
    if($roll_id != ''){
      $this->db->where('user.roll_id',$roll_id);
    }
    $this->db->where('user.branch_id',$branch_id);
    $this->db->where('user.user_status','active');
    $this->db->join('law_roll','user.roll_id = law_roll.roll_id','LEFT');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }
  // Application List...
  public function application_list($company_id,$status,$order){
    $this->db->select('application.*,application.application_id as appl_id,branch.*,service.*,trade.*,copy.*,other.*');
    $this->db->from('law_application as application');
    if($status){
      $this->db->where('application.application_status',$status);
    }
    $this->db->order_by('application.application_id',$order);
    $this->db->join('law_branch as branch','application.branch_id = branch.branch_id','LEFT');
    $this->db->join('law_service as service','application.service_id = service.service_id','LEFT');
    $this->db->join('law_trademark as trade','application.application_id = trade.application_id','LEFT');
    $this->db->join('law_copyright as copy','application.application_id = copy.application_id','LEFT');
    $this->db->join('law_otherservice as other','application.application_id = other.application_id','LEFT');
    // $this->db->join('law_trademark as appl','application.application_id = appl.application_id','LEFT');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function trade_mark_print_list($company_id,$status,$order){
    $this->db->select('application.*,branch.*,service.*,trade.*');
    $this->db->from('law_application as application');
    // $this->db->where('application.company_id',$company_id);
    if($status){
      $this->db->where('application.application_status',$status);
    }
    $this->db->where('application.service_id',1);
    $this->db->order_by('application.application_id',$order);
    $this->db->join('law_branch as branch','application.branch_id = branch.branch_id','LEFT');
    $this->db->join('law_service as service','application.service_id = service.service_id','LEFT');
    $this->db->join('law_trademark as trade','application.application_id = trade.application_id','LEFT');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }
  //Trdemark Details...
  public function trademark_details($application_id){
    $query = $this->db->select('application.*,branch.*,service.*,organization.*,trade.*,user_man.user_name as man_name,user_man.user_lastname as man_lname,user_tc.user_name as tc_name,user_tc.user_lastname as tc_lname,user_rc.user_name as rc_name,user_rc.user_lastname as rc_lname,')
    ->from('law_application as application')
    ->where('application.application_id',$application_id)
    ->join('law_branch as branch','application.branch_id = branch.branch_id','LEFT')
    ->join('law_service as service','application.service_id = service.service_id','LEFT')
    ->join('law_organization as organization','application.organization_id = organization.organization_id','LEFT')
    ->join('law_trademark as trade','application.application_id = trade.application_id','LEFT')
    ->join('law_user as user_man','application.manager_id = user_man.user_id','LEFT')
    ->join('law_user as user_tc','application.tc_id = user_tc.user_id','LEFT')
    ->join('law_user as user_rc','application.rc_id = user_rc.user_id','LEFT')
    ->get();
    $result = $query->result();
    return $result;
  }
  // Application Details...
  public function application_details($application_id){
    $query = $this->db->select('application.*,company.company_name,branch.*,service.*,organization.*,user_man.user_name as man_name,user_man.user_lastname as man_lname,user_tc.user_name as tc_name,user_tc.user_lastname as tc_lname,user_rc.user_name as rc_name,user_rc.user_lastname as rc_lname,')
    ->from('law_application as application')
    ->where('application.application_id',$application_id)
    ->join('law_branch as branch','application.branch_id = branch.branch_id','LEFT')
    ->join('law_service as service','application.service_id = service.service_id','LEFT')
    ->join('law_organization as organization','application.organization_id = organization.organization_id','LEFT')
    ->join('law_user as user_man','application.manager_id = user_man.user_id','LEFT')
    ->join('law_user as user_tc','application.tc_id = user_tc.user_id','LEFT')
    ->join('law_user as user_rc','application.rc_id = user_rc.user_id','LEFT')
    ->join('law_company as company','application.company_id = company.company_id','LEFT')
    ->get();
    $result = $query->result();
    return $result;
  }
  // Application Service Details...
  public function sevice_wise_appl_details($application_id,$tbl_name){
    $this->db->select('*');
    $this->db->from($tbl_name);
    $this->db->where('application_id',$application_id);
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
  }
  /*************************** Add Work ***********************/
  public function get_work_details($work_id){
    $this->db->select('work.*,law_company.company_name,law_branch.branch_name,law_user.user_name,law_user.user_lastname');
    $this->db->from('law_workdetails as work');
    $this->db->where('work.work_id',$work_id);
    $this->db->join('law_company','work.company_id = law_company.company_id','LEFT');
    $this->db->join('law_branch','work.branch_id = law_branch.branch_id','LEFT');
    $this->db->join('law_user','work.manager_id = law_user.user_id','LEFT');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function law_workdetails_doc($work_id){
    $this->db->select('*');
    $this->db->from('law_workdetails_doc');
    $this->db->where('work_id',$work_id);
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function get_payment_info($application_id){
    $this->db->select('*');
    $this->db->from('law_payment');
    $this->db->where('application_id',$application_id);
    $this->db->where('is_master',1);
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }
  public function get_received_amount($application_id){
    $this->db->select('SUM(RECEVIEDAMOUNT) as received_amount');
    $this->db->from('law_payment');
    $this->db->where('application_id',$application_id);
    $query = $this->db->get();
    $result = $query->result_array();
    return $result[0]['received_amount'];
  }

  public function receipt_list(){
    $this->db->select('law_payment.*,application.*,application.application_id as appl_id,trade.*,copy.*,other.*');
    $this->db->from('law_payment');
    $this->db->order_by('law_payment.payment_id','DESC');
    $this->db->join('law_application as application','law_payment.application_id = application.application_id','LEFT');
    $this->db->join('law_trademark as trade','application.application_id = trade.application_id','LEFT');
    $this->db->join('law_copyright as copy','application.application_id = copy.application_id','LEFT');
    $this->db->join('law_otherservice as other','application.application_id = other.application_id','LEFT');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }


  // public function pre_doc_list($application_id){
  //   $this->db->select('*');
  //   $this->db->from('law_doc_upload');
  //   $this->db->where('application_id',$application_id);
  //   $query = $this->db->get();
  //   $result = $query->result();
  //   return $result;
  // }

  public function pre_doc($application_id, $doc_type){
    $this->db->select('*');
    $this->db->from('law_doc_upload');
    $this->db->where('application_id',$application_id);
    $this->db->where('doc_type',$doc_type);
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
  }

  public function delete_doc_up_stat($application_id,$doc_type){
    $this->db->where('application_id', $application_id);
    $this->db->where('doc_type', $doc_type);
    $this->db->delete('law_doc_upload');
  }

  /************************************** Sale Invoice ****************************/
  // Sale Invoice List...
  public function sale_invoice_list(){
    $this->db->select('invoice.*,law_company.company_name');
    $this->db->from('law_invoice as invoice');
    // $this->db->where('work.work_id',$work_id);
    $this->db->join('law_company','invoice.company_id = law_company.company_id','LEFT');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function invice_details($invoice_id){
    $this->db->select('invoice.*,law_company.company_name,law_branch.branch_name');
    $this->db->from('law_invoice as invoice');
    $this->db->where('invoice.invoice_id',$invoice_id);
    $this->db->join('law_company','invoice.company_id = law_company.company_id','LEFT');
    $this->db->join('law_branch','invoice.branch_id = law_branch.branch_id','LEFT');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function get_advance_amt($application_id,$tbl_name){
    $this->db->select('RECEVIEDAMOUNT');
    $this->db->from($tbl_name);
    $this->db->where('application_id',$application_id);
    $query = $this->db->get();
    $result = $query->result_array();

    return $result[0]['RECEVIEDAMOUNT'];
  }

  public function invoice_details_list($invoice_id){
    $this->db->select('*');
    $this->db->from('law_invoice_details');
    $this->db->where('invoice_id',$invoice_id);
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }


}
?>
