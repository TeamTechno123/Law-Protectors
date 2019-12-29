<?php
class Report_Model extends CI_Model{

  public function application_report_list($from_date,$to_date,$company_id2,$manager_id,$branch_id,$service_id,$status_name,$rc_id,$tc_id){

    if($manager_id != ''){
      $this->db->select('law_appl_user_rel.*,application.*,branch.*,service.*,law_organization.*,trade.*,copy.*,other.*');
      $this->db->from('law_appl_user_rel');
      
      if($rc_id == '' && $tc_id == ''){
      $this->db->where('law_appl_user_rel.user_id',$manager_id);
      }
      if($rc_id != ''){
        $this->db->where('law_appl_user_rel.user_id',$rc_id);  
      }
      if($tc_id != ''){
        $this->db->where('law_appl_user_rel.user_id',$tc_id);  
      }
      
      
    } else{
      $this->db->select('application.*,branch.*,service.*,law_organization.*,trade.*,copy.*,other.*');
      $this->db->from('law_application as application');
    }

    // $this->db->where('application.company_id',$company_id);
    if($status_name != ''){
      $this->db->where('application.application_status',$status_name);
    }
    if($branch_id != ''){
      $this->db->where('application.branch_id',$branch_id);
    }
    if($service_id != ''){
      $this->db->where('application.service_id',$service_id);
    }
    $this->db->where("str_to_date(application.application_date,'%d-%m-%Y') BETWEEN str_to_date('$from_date','%d-%m-%Y') AND str_to_date('$to_date','%d-%m-%Y')");

    if($manager_id != ''){
      $this->db->join('law_application as application','application.application_id = law_appl_user_rel.application_id','LEFT');
    }

    $this->db->join('law_branch as branch','application.branch_id = branch.branch_id','LEFT');
    $this->db->join('law_organization','application.organization_id = law_organization.organization_id','LEFT');
    $this->db->join('law_service as service','application.service_id = service.service_id','LEFT');
    $this->db->join('law_trademark as trade','application.application_id = trade.application_id','LEFT');
    $this->db->join('law_copyright as copy','application.application_id = copy.application_id','LEFT');
    $this->db->join('law_otherservice as other','application.application_id = other.application_id','LEFT');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }



  public function outstanding_branch_wise_report_list($from_date,$to_date,$company_id,$branch_id,$service_id){
    $this->db->select('application.*,service.*,SUM(payment.GSTAMOUNT) as GSTAMOUNT,SUM(payment.TOTALAMOUNT) as CONTRACTAMOUNT,SUM(payment.RECEVIEDAMOUNT) as RECEVIEDAMOUNT,SUM(payment.LP_AMOUNT) as LP_AMOUNT,SUM(payment.GOVT_FEES) as GOVT_FEES,SUM(payment.B2B) as B2B,SUM(payment.TDS) as TDS');
    $this->db->from('law_application as application');
    // $this->db->where('application.company_id',$company_id);
    $this->db->where('application.branch_id',$branch_id);
    $this->db->group_by('application.service_id');

    $this->db->where("str_to_date(payment.payment_date,'%d-%m-%Y') BETWEEN str_to_date('$from_date','%d-%m-%Y') AND str_to_date('$to_date','%d-%m-%Y')");
    $this->db->join('law_service as service','application.service_id = service.service_id','LEFT');
    $this->db->join('law_payment as payment','application.application_id = payment.application_id','LEFT');
    $query = $this->db->get();
    $result = $query->result();
    $q = $this->db->last_query();
    return $result;
  }

  public function outstanding_service_wise_report_list($from_date,$to_date,$company_id,$branch_id,$rc_id,$tc_id,$service_id){
    if($rc_id != ''){
      $this->db->select('law_appl_user_rel.*,application.*,branch.*,service.*,SUM(payment.GSTAMOUNT) as GSTAMOUNT,SUM(payment.TOTALAMOUNT) as CONTRACTAMOUNT,SUM(payment.RECEVIEDAMOUNT) as RECEVIEDAMOUNT,SUM(payment.LP_AMOUNT) as LP_AMOUNT,SUM(payment.GOVT_FEES) as GOVT_FEES,SUM(payment.B2B) as B2B,SUM(payment.TDS) as TDS');
      $this->db->from('law_appl_user_rel');
      $this->db->where('law_appl_user_rel.user_id',$rc_id);
    } elseif ($tc_id != ''){
      $this->db->select('law_appl_user_rel.*,application.*,branch.*,service.*,SUM(payment.GSTAMOUNT) as GSTAMOUNT,SUM(payment.TOTALAMOUNT) as CONTRACTAMOUNT,SUM(payment.RECEVIEDAMOUNT) as RECEVIEDAMOUNT,SUM(payment.LP_AMOUNT) as LP_AMOUNT,SUM(payment.GOVT_FEES) as GOVT_FEES,SUM(payment.B2B) as B2B,SUM(payment.TDS) as TDS');
      $this->db->from('law_appl_user_rel');
      $this->db->where('law_appl_user_rel.user_id',$tc_id);
    } else{
      $this->db->select('application.*,branch.*,service.*,SUM(payment.GSTAMOUNT) as GSTAMOUNT,SUM(payment.TOTALAMOUNT) as CONTRACTAMOUNT,SUM(payment.RECEVIEDAMOUNT) as RECEVIEDAMOUNT,SUM(payment.LP_AMOUNT) as LP_AMOUNT,SUM(payment.GOVT_FEES) as GOVT_FEES,SUM(payment.B2B) as B2B,SUM(payment.TDS) as TDS');
      $this->db->from('law_application as application');
    }




    // $this->db->where('application.company_id',$company_id);
    if($branch_id != ''){
      $this->db->where('application.branch_id',$branch_id);
    }
    if($rc_id != ''){
      $this->db->where('application.rc_id',$rc_id);
    }
    if($tc_id != ''){
      $this->db->where('application.tc_id',$tc_id);
    }
    if($service_id != ''){
      $this->db->where('application.service_id',$service_id);
    }
    $this->db->group_by('application.service_id');

    $this->db->where("str_to_date(payment.payment_date,'%d-%m-%Y') BETWEEN str_to_date('$from_date','%d-%m-%Y') AND str_to_date('$to_date','%d-%m-%Y')");
    if($rc_id != '' || $tc_id != ''){
      $this->db->join('law_application as application','application.application_id = law_appl_user_rel.application_id','LEFT');
    }
    $this->db->join('law_service as service','application.service_id = service.service_id','LEFT');
    $this->db->join('law_payment as payment','application.application_id = payment.application_id','LEFT');
    $this->db->join('law_branch as branch','application.branch_id = branch.branch_id','LEFT');
    $query = $this->db->get();
    $result = $query->result();
    $q = $this->db->last_query();
    return $result;
  }

  public function invoice_report_list($from_date,$to_date,$company_id){
    $this->db->select('application.*,invoice.*,payment.*');
    $this->db->from('law_invoice as invoice');
    $this->db->where('invoice.company_id',$company_id);
    $this->db->where("str_to_date(invoice.invoice_date,'%d-%m-%Y') BETWEEN str_to_date('$from_date','%d-%m-%Y') AND str_to_date('$to_date','%d-%m-%Y')");

    $this->db->join('law_application as application','invoice.application_id = application.application_id','LEFT');
    $this->db->join('law_payment as payment','invoice.application_id = payment.application_id','LEFT');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  // public function manager_report_list($from_date,$to_date,$company_id,$branch_id){
  //   $this->db->select('application.*,invoice.*,payment.*');
  //   $this->db->from('law_invoice as invoice');
  //   $this->db->where('invoice.company_id',$company_id);
  //   $this->db->where("str_to_date(invoice.invoice_date,'%d-%m-%Y') BETWEEN str_to_date('$from_date','%d-%m-%Y') AND str_to_date('$to_date','%d-%m-%Y')");
  //
  //   $this->db->join('law_application as application','invoice.application_id = application.application_id','LEFT');
  //   $this->db->join('law_payment as payment','invoice.application_id = payment.application_id','LEFT');
  //   $query = $this->db->get();
  //   $result = $query->result();
  //   return $result;
  // }


  public function get_target_amount($branch_id2,$target_id){
    $this->db->select('law_target_details.*,law_user.*');
    $this->db->from('law_target_details');
    $this->db->where('law_target_details.branch_id',$branch_id2);
    $this->db->where('law_target_details.target_id',$target_id);
    $this->db->where('law_user.roll_id',2);
    $this->db->join('law_user','law_target_details.user_id = law_user.user_id','LEFT');
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
  }

  public function get_target_report_amt($branch_id2,$from_date,$to_date){
    $this->db->select('application.*,SUM(payment.GSTAMOUNT) as GSTAMOUNT,SUM(payment.TOTALAMOUNT) as CONTRACTAMOUNT,SUM(payment.RECEVIEDAMOUNT) as RECEVIEDAMOUNT,SUM(payment.LP_AMOUNT) as LP_AMOUNT,SUM(payment.GOVT_FEES) as GOVT_FEES,SUM(payment.B2B) as B2B,SUM(payment.TDS) as TDS');
    $this->db->from('law_application as application');
    $this->db->where('application.branch_id',$branch_id2);
    $this->db->group_by('application.branch_id');
    $this->db->where("str_to_date(application.application_date,'%d-%m-%Y') BETWEEN str_to_date('$from_date','%d-%m-%Y') AND str_to_date('$to_date','%d-%m-%Y')");
    $this->db->join('law_payment as payment','application.application_id = payment.application_id','LEFT');
    $query = $this->db->get();
    $result = $query->result();
    $q = $this->db->last_query();
    return $result;
  }

  public function get_user_target_list($branch_id,$target_id){
    $this->db->select('law_user.*,law_target_details.*,law_roll.*');
    $this->db->from('law_user');
    $this->db->where('law_user.branch_id',$branch_id);
    $this->db->where('law_target_details.target_id',$target_id);
    $this->db->join('law_target_details','law_target_details.user_id = law_user.user_id','LEFT');
    $this->db->join('law_roll','law_roll.roll_id = law_user.roll_id','LEFT');
    $query = $this->db->get();
    $result = $query->result();
    $q = $this->db->last_query();
    return $q;
  }
  // used in collection report.
  public function get_user_target_list2($branch_id,$target_id,$rc_id,$tc_id){
    $this->db->select('law_user.*,law_target_details.*,law_roll.*');
    $this->db->from('law_target_details');
    $this->db->where('law_target_details.branch_id',$branch_id);
    $this->db->where('law_target_details.target_id',$target_id);
    $this->db->where('law_user.roll_id !=',5);
    if($rc_id != ''){
        $this->db->where('law_target_details.user_id',$rc_id);
    }
    if($tc_id != ''){
        $this->db->where('law_target_details.user_id',$tc_id);
    }
    $this->db->join('law_user','law_target_details.user_id = law_user.user_id','LEFT');
    $this->db->join('law_roll','law_roll.roll_id = law_user.roll_id','LEFT');
    $query = $this->db->get();
    $result = $query->result();
    $q = $this->db->last_query();
    return $result;
  }

  public function get_target_report_by_user_amt($user_id,$from_date,$to_date,$roll_id){
    $this->db->select('application.*,SUM(payment.GSTAMOUNT) as GSTAMOUNT,SUM(payment.TOTALAMOUNT) as CONTRACTAMOUNT,SUM(payment.RECEVIEDAMOUNT) as RECEVIEDAMOUNT,SUM(payment.LP_AMOUNT) as LP_AMOUNT,SUM(payment.GOVT_FEES) as GOVT_FEES,SUM(payment.B2B) as B2B,SUM(payment.TDS) as TDS');
    $this->db->from('law_application as application');
    if($roll_id == 2){
      $this->db->where('application.manager_id',$user_id);
      $this->db->group_by('application.manager_id');
    }
    if($roll_id == 3){
      $this->db->where('application.rc_id',$user_id);
      $this->db->group_by('application.rc_id');
    }
    if($roll_id == 4){
      $this->db->where('application.tc_id',$user_id);
      $this->db->group_by('application.tc_id');
    }
    $this->db->where("str_to_date(application.application_date,'%d-%m-%Y') BETWEEN str_to_date('$from_date','%d-%m-%Y') AND str_to_date('$to_date','%d-%m-%Y')");
    $this->db->join('law_payment as payment','application.application_id = payment.application_id','LEFT');
    $query = $this->db->get();
    $result = $query->result();
    $q = $this->db->last_query();
    return $result;
  }
}
?>
