<?php
class Report_Model extends CI_Model{

  public function application_report_list($from_date,$to_date,$company_id,$branch_id,$service_id,$status){
    $this->db->select('application.*,branch.*,service.*,law_organization.*,trade.*,copy.*,other.*');
    $this->db->from('law_application as application');
    // $this->db->where('application.company_id',$company_id);
    if($status != ''){
      $this->db->where('application.application_status',$status);
    }
    if($branch_id != ''){
      $this->db->where('application.branch_id',$branch_id);
    }
    if($service_id != ''){
      $this->db->where('application.service_id',$service_id);
    }
    $this->db->where("str_to_date(application.application_date,'%d-%m-%Y') BETWEEN str_to_date('$from_date','%d-%m-%Y') AND str_to_date('$to_date','%d-%m-%Y')");
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

  public function outstanding_report_list($from_date,$to_date,$company_id,$branch_id,$service_id){
    $this->db->select('application.*,branch.*,service.*,law_organization.*,trade.*,copy.*,other.*,payment.*');
    $this->db->from('law_application as application');
    $this->db->where('application.company_id',$company_id);
    if($branch_id != ''){
      $this->db->where('application.branch_id',$branch_id);
    }
    if($service_id != ''){
      $this->db->where('application.service_id',$service_id);
    }
    $this->db->where("str_to_date(application.application_date,'%d-%m-%Y') BETWEEN str_to_date('$from_date','%d-%m-%Y') AND str_to_date('$to_date','%d-%m-%Y')");
    $this->db->join('law_branch as branch','application.branch_id = branch.branch_id','LEFT');
    $this->db->join('law_organization','application.organization_id = law_organization.organization_id','LEFT');
    $this->db->join('law_service as service','application.service_id = service.service_id','LEFT');
    $this->db->join('law_trademark as trade','application.application_id = trade.application_id','LEFT');
    $this->db->join('law_copyright as copy','application.application_id = copy.application_id','LEFT');
    $this->db->join('law_otherservice as other','application.application_id = other.application_id','LEFT');
    $this->db->join('law_payment as payment','application.application_id = payment.application_id','LEFT');
    $query = $this->db->get();
    $result = $query->result();
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

  public function manager_report_list($from_date,$to_date,$company_id,$branch_id,$manager_id){
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
}
?>
