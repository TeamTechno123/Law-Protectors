<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller{
  public function __construct(){
    parent::__construct();
    $this->load->model('User_Model');
    $this->load->model('Transaction_Model');
    $this->load->model('Report_Model');
  }

/************************* Print ***********************/
  // TMA Application Print...
  public function form_tm($application_id){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $application_details = $this->Transaction_Model->trademark_details($application_id);
      if($application_details){
        foreach ($application_details as $info) {
          $data['application_id'] = $info->application_id;
          $data['application_no'] = $info->application_no;
          $data['application_date'] = $info->application_date;
          $data['branch_name'] = $info->branch_name;
          $data['service_name'] = $info->service_name;
          $data['organization_id'] = $info->organization_id;
          $data['organization_name'] = $info->organization_name;

          $data['NAME'] = $info->NAME;
          $data['IS_MSME_REQ'] = $info->IS_MSME_REQ;
          $data['ADDRESS'] = $info->ADDRESS;
          $data['STATE'] = $info->STATE;
          $data['MOBILE'] = $info->MOBILE;
          $data['AFF_DATE'] = $info->AFF_DATE;
          $data['COV_DATE'] = $info->COV_DATE;
          $data['SIGN_AUTH'] = $info->SIGN_AUTH;

          $data['BRAND'] = $info->BRAND;
          $data['SIGNIFICANCE'] = $info->SIGNIFICANCE;
          $data['AGE'] = $info->AGE;
          $data['FIRMADDRESS'] = $info->FIRMADDRESS;
          $data['ORGANIZATION'] = $info->ORGANIZATION;
          $data['NATIONALITY'] = $info->NATIONALITY;
          $data['FATHER'] = $info->FATHER;
          $data['ASSOCIATION'] = $info->ASSOCIATION;
          $data['MARK_0'] = $info->MARK_0;
          $data['MARK_1'] = $info->MARK_1;
          $data['MARK_2'] = $info->MARK_2;
          $data['MARK_3'] = $info->MARK_3;
          $data['MARK_4'] = $info->MARK_4;
          $data['TM'] = $info->TM;
          $data['SERVICES'] = $info->SERVICES;
          $data['PROPOSED'] = $info->PROPOSED;
          $data['INFORMATION'] = $info->INFORMATION;
          $data['PLACE'] = $info->PLACE;
          $data['DATE'] = $info->DATE;
          $data['TRADE'] = $info->TRADE;
          $data['TRADE_0'] = $info->TRADE_0;
          $data['TRADE_1'] = $info->TRADE_1;
          $data['TRADE_2'] = $info->TRADE_2;
          $data['TRADE_3'] = $info->TRADE_3;
          $data['ASSOCIATE_MARK'] = $info->ASSOCIATE_MARK;
          $data['PROPOSED_TO_BE'] = $info->PROPOSED_TO_BE;
          $data['LOGO'] = $info->LOGO;
        }
      }
      $this->load->view('Report/form_tm', $data);
    } else{
      header('location:'.base_url().'User');
    }
  }

  // Authorization Letter Print...
  public function auth_print($application_id){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $application_details = $this->Transaction_Model->trademark_details($application_id);
      if($application_details){
        foreach ($application_details as $info) {
          $data['application_id'] = $info->application_id;
          $data['application_no'] = $info->application_no;
          $data['application_date'] = $info->application_date;
          $data['company_name'] = $info->company_name;
          $data['company_address'] = $info->company_address;
          $data['company_lic1'] = $info->company_lic1;
          $data['branch_name'] = $info->branch_name;
          $data['service_name'] = $info->service_name;
          $data['organization_id'] = $info->organization_id;
          $data['organization_name'] = $info->organization_name;

          $data['NAME'] = $info->NAME;
          $data['IS_MSME_REQ'] = $info->IS_MSME_REQ;
          $data['ADDRESS'] = $info->ADDRESS;
          $data['STATE'] = $info->STATE;
          $data['MOBILE'] = $info->MOBILE;
          $data['AFF_DATE'] = $info->AFF_DATE;
          $data['COV_DATE'] = $info->COV_DATE;
          $data['SIGN_AUTH'] = $info->SIGN_AUTH;

          $data['BRAND'] = $info->BRAND;
          $data['SIGNIFICANCE'] = $info->SIGNIFICANCE;
          $data['AGE'] = $info->AGE;
          $data['FIRMADDRESS'] = $info->FIRMADDRESS;
          $data['ORGANIZATION'] = $info->ORGANIZATION;
          $data['NATIONALITY'] = $info->NATIONALITY;
          $data['FATHER'] = $info->FATHER;
          $data['ASSOCIATION'] = $info->ASSOCIATION;
          $data['MARK_0'] = $info->MARK_0;
          $data['MARK_1'] = $info->MARK_1;
          $data['MARK_2'] = $info->MARK_2;
          $data['MARK_3'] = $info->MARK_3;
          $data['MARK_4'] = $info->MARK_4;
          $data['TM'] = $info->TM;
          $data['SERVICES'] = $info->SERVICES;
          $data['PROPOSED'] = $info->PROPOSED;
          $data['INFORMATION'] = $info->INFORMATION;
          $data['PLACE'] = $info->PLACE;
          $data['DATE'] = $info->DATE;
          $data['TRADE_0'] = $info->TRADE_0;
          $data['TRADE_1'] = $info->TRADE_1;
          $data['TRADE_2'] = $info->TRADE_2;
          $data['TRADE_3'] = $info->TRADE_3;
          $data['ADV_NAME'] = $info->ADV_NAME;
          $data['BAR_COUN_NO'] = $info->BAR_COUN_NO;
        }
      }
      $this->load->view('Report/authorization', $data);
    } else{
      header('location:'.base_url().'User');
    }
  }

  public function affidavit($application_id){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $application_details = $this->Transaction_Model->trademark_details($application_id);
      if($application_details){
        foreach ($application_details as $info) {
          $data['application_id'] = $info->application_id;
          $data['application_no'] = $info->application_no;
          $data['application_date'] = $info->application_date;
          $data['company_name'] = $info->company_name;
          $data['company_address'] = $info->company_address;
          $data['company_lic1'] = $info->company_lic1;
          $data['branch_name'] = $info->branch_name;
          $data['service_name'] = $info->service_name;
          $data['organization_id'] = $info->organization_id;
          $data['organization_name'] = $info->organization_name;


          $data['NAME'] = $info->NAME;
          $data['IS_MSME_REQ'] = $info->IS_MSME_REQ;
          $data['ADDRESS'] = $info->ADDRESS;
          $data['STATE'] = $info->STATE;
          $data['MOBILE'] = $info->MOBILE;
          $data['AFF_DATE'] = $info->AFF_DATE;
          $data['COV_DATE'] = $info->COV_DATE;
          $data['SIGN_AUTH'] = $info->SIGN_AUTH;

          $data['BRAND'] = $info->BRAND;
          $data['SIGNIFICANCE'] = $info->SIGNIFICANCE;
          $data['AGE'] = $info->AGE;
          $data['FIRMADDRESS'] = $info->FIRMADDRESS;
          $data['ORGANIZATION'] = $info->ORGANIZATION;
          $data['NATIONALITY'] = $info->NATIONALITY;
          $data['FATHER'] = $info->FATHER;
          $data['ASSOCIATION'] = $info->ASSOCIATION;
          $data['MARK_0'] = $info->MARK_0;
          $data['MARK_1'] = $info->MARK_1;
          $data['MARK_2'] = $info->MARK_2;
          $data['MARK_3'] = $info->MARK_3;
          $data['MARK_4'] = $info->MARK_4;
          $data['TM'] = $info->TM;
          $data['SERVICES'] = $info->SERVICES;
          $data['PROPOSED'] = $info->PROPOSED;
          $data['INFORMATION'] = $info->INFORMATION;
          $data['PLACE'] = $info->PLACE;
          $data['DATE'] = $info->DATE;
          $data['TRADE'] = $info->TRADE;
          $data['TRADE_0'] = $info->TRADE_0;
          $data['TRADE_1'] = $info->TRADE_1;
          $data['TRADE_2'] = $info->TRADE_2;
          $data['TRADE_3'] = $info->TRADE_3;
        }
      }
      $this->load->view('Report/affidavite',$data);
    } else{
      header('location:'.base_url().'User');
    }
  }

  public function covering_letter($application_id){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $application_details = $this->Transaction_Model->trademark_details($application_id);
      if($application_details){
        foreach ($application_details as $info) {
          $data['application_id'] = $info->application_id;
          $data['application_no'] = $info->application_no;
          $data['application_date'] = $info->application_date;
          $data['company_name'] = $info->company_name;
          $data['company_address'] = $info->company_address;
          $data['branch_name'] = $info->branch_name;
          $data['service_name'] = $info->service_name;
          $data['organization_id'] = $info->organization_id;
          $data['organization_name'] = $info->organization_name;

          $data['NAME'] = $info->NAME;
          $data['IS_MSME_REQ'] = $info->IS_MSME_REQ;
          $data['ADDRESS'] = $info->ADDRESS;
          $data['STATE'] = $info->STATE;
          $data['MOBILE'] = $info->MOBILE;
          $data['AFF_DATE'] = $info->AFF_DATE;
          $data['COV_DATE'] = $info->COV_DATE;
          $data['SIGN_AUTH'] = $info->SIGN_AUTH;

          $data['BRAND'] = $info->BRAND;
          $data['SIGNIFICANCE'] = $info->SIGNIFICANCE;
          $data['AGE'] = $info->AGE;
          $data['FIRMADDRESS'] = $info->FIRMADDRESS;
          $data['ORGANIZATION'] = $info->ORGANIZATION;
          $data['NATIONALITY'] = $info->NATIONALITY;
          $data['FATHER'] = $info->FATHER;
          $data['ASSOCIATION'] = $info->ASSOCIATION;
          $data['MARK_0'] = $info->MARK_0;
          $data['MARK_1'] = $info->MARK_1;
          $data['MARK_2'] = $info->MARK_2;
          $data['MARK_3'] = $info->MARK_3;
          $data['MARK_4'] = $info->MARK_4;
          $data['TM'] = $info->TM;
          $data['SERVICES'] = $info->SERVICES;
          $data['PROPOSED'] = $info->PROPOSED;
          $data['INFORMATION'] = $info->INFORMATION;
          $data['PLACE'] = $info->PLACE;
          $data['DATE'] = $info->DATE;
          $data['TRADE_0'] = $info->TRADE_0;
          $data['TRADE_1'] = $info->TRADE_1;
          $data['TRADE_2'] = $info->TRADE_2;
          $data['TRADE_3'] = $info->TRADE_3;
        }
      }
      $payment_details = $this->User_Model->get_info('application_id', $application_id, 'law_payment');
      if(!$payment_details){ header('location:'.base_url().'Transaction/application_list');  }
      foreach ($payment_details as $info) {
        $data['BALANCEAMOUNT'] = $info->BALANCEAMOUNT;
      }
      $this->load->view('Report/covering_letter',$data);
    } else{
      header('location:'.base_url().'User');
    }
  }

  public function invoice_print($invoice_id){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($user_id == null){ header('location:'.base_url().'User'); }
    $data['invoice_details_list'] = $this->Transaction_Model->invoice_details_list($invoice_id);
    $invice_details = $this->Transaction_Model->invice_details($invoice_id);
    if(!$invice_details){ header('location:'.base_url().'Transaction/sale_invoice_list'); }
    foreach ($invice_details as $details) {
      $data['invoice_id'] = $invoice_id;
      $data['application_id'] = $details->application_id;
      $data['comp_id'] = $details->company_id;
      $data['branch_id'] = $details->branch_id;
      $data['branch_bank'] = $details->branch_bank;
      $data['branch_b_branch'] = $details->branch_b_branch;
      $data['branch_acc_no'] = $details->branch_acc_no;
      $data['branch_ifsc'] = $details->branch_ifsc;
      $data['branch_name'] = $details->branch_name;
      $data['invoice_no'] = $details->invoice_no;
      $data['invoice_date'] = $details->invoice_date;
      $data['party'] = $details->party;
      $data['party_address'] = $details->party_address;
      $data['party_statecode'] = $details->party_statecode;
      $data['po_no'] = $details->po_no;
      $data['po_date'] = $details->po_date;
      $data['basic_amt'] = $details->basic_amt;
      $data['gov_fees_amt'] = $details->gov_fees_amt;
      $data['gst_amt'] = $details->gst_amt;
      $data['adv_amt'] = $details->adv_amt;
      $data['bal_amt'] = $details->bal_amt;
      $data['net_amt'] = $details->net_amt;
      $data['tds_amt'] = $details->tds_amt;
    }
    $application_id = $details->application_id;
    $company_id2 = $details->company_id;
    $company_info = $this->User_Model->get_info('company_id', $company_id2, 'law_company');
    if($company_info){
      foreach($company_info as $info){
        $data['company_id'] = $info->company_id;
        $data['company_name'] = $info->company_name;
        $data['company_address'] = $info->company_address;
        $data['company_city'] = $info->company_city;
        $data['company_state'] = $info->company_state;
        $data['company_district'] = $info->company_district;
        $data['company_statecode'] = $info->company_statecode;
        $data['company_mob1'] = $info->company_mob1;
        $data['company_mob2'] = $info->company_mob2;
        $data['company_email'] = $info->company_email;
        $data['company_website'] = $info->company_website;
        $data['company_pan_no'] = $info->company_pan_no;
        $data['company_gst_no'] = $info->company_gst_no;
        $data['company_seal'] = $info->company_seal;
      }
      $payment_info = $this->User_Model->get_info('application_id', $application_id, 'law_payment');
      if(!$payment_info){ header('location:'.base_url().'Transaction/sale_invoice_list'); }
      foreach ($payment_info as $payment_info1) {
        $data['party_gst_no'] = $payment_info1->GSTNUMBER;
      }
      $this->load->view('Report/invoice_print',$data);
    }
  }

  public function application_report(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($user_id == null){ header('location:'.base_url().'User'); }
    $data['branch_list'] = $this->User_Model->get_list2('branch_id','ASC','law_branch');
    $data['service_list'] = $this->User_Model->get_list2('service_id','ASC','law_service');
    $data['company_list'] = $this->User_Model->get_list2('company_id','ASC','law_company');
    $data['manager_list'] = $this->Transaction_Model->get_users_by_branch('2','');
    $this->form_validation->set_rules('from_date', 'From Date', 'trim|required');
    $this->form_validation->set_rules('to_date', 'To Date', 'trim|required');
    if($this->form_validation->run() != FALSE){
      $from_date = $this->input->post('from_date');
      $to_date = $this->input->post('to_date');
      // $company_id2 = $this->input->post('company_id');
      $company_id2 = '';
      $manager_id = $this->input->post('manager_id');
      $branch_id = $this->input->post('branch_id');
      $service_id = $this->input->post('service_id');
      $status_name = $this->input->post('status_name');
      $rc_id = $this->input->post('rc_id');
      $tc_id = $this->input->post('tc_id');

      $data['from_date2'] = $from_date;
      $data['to_date2'] = $to_date;
      $data['manager_id2'] = $manager_id;
      $data['branch_id2'] = $branch_id;
      $data['service_id2'] = $service_id;
      $data['status_name2'] = $status_name;
      $data['rc_id'] = $rc_id;
      $data['tc_id'] = $tc_id;

      $data['application_report'] = 'load';
      $data['application_report_list'] = $this->Report_Model->application_report_list($from_date,$to_date,$company_id2,$manager_id,$branch_id,$service_id,$status_name,$rc_id,$tc_id);
    }
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('Report/application_report',$data);
    $this->load->view('Include/footer',$data);
  }

  public function collection_report(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($user_id == null){ header('location:'.base_url().'User'); }
    $data['company_list'] = $this->User_Model->get_list2('company_id','ASC','law_company');
    $this->form_validation->set_rules('target_id', 'Target', 'trim|required');
    // $this->form_validation->set_rules('company_id', 'company_id', 'trim|required');
    if($this->form_validation->run() != FALSE){
      $target_id = $this->input->post('target_id');
      $target_info = $this->User_Model->get_info('target_id', $target_id, 'law_target');
      foreach ($target_info as $target_info1) {
      }
      $from_date = $target_info1->target_from;
      $to_date = $target_info1->target_to;
      $manager_id = $this->input->post('manager_id');
      $rc_id = $this->input->post('rc_id');
      $tc_id = $this->input->post('tc_id');

      // $company_id2 = $this->input->post('company_id');
      $company_id2 = '';
      $branch_id = $this->input->post('branch_id');
      $data['manager_report'] = 'load';
      $data['from_date'] = $from_date;
      $data['target_id'] = $target_id;
      $data['to_date'] = $to_date;
      // $data['company_id2'] = $company_id2;
      $data['manager_id'] = $manager_id;
      $data['branch_id'] = $branch_id;
      $data['rc_id'] = $rc_id;
      $data['tc_id'] = $tc_id;
      if($branch_id == ''){
        $data['report_type'] = 'branchwise';
      }
      if($branch_id != ''){
        $data['report_type'] = 'userwise';
      }
      if($branch_id == '' && $rc_id != ''){
        $data['report_type'] = 'userwise';
        $data['branch_id'] = '';
      }
      if($branch_id == '' && $tc_id != ''){
        $data['report_type'] = 'userwise';
        $data['branch_id'] = '';
      }
      //$data['manager_report_list'] = $this->Report_Model->manager_report_list($from_date,$to_date,$company_id2,$branch_id,$manager_id);
    }

    $data['target_list'] = $this->User_Model->get_list2('target_id','ASC','law_target');
    $data['company_list'] = $this->User_Model->get_list2('company_id','ASC','law_company');
    $data['manager_list'] = $this->Transaction_Model->get_users_by_branch('2','');
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('Report/collection_report',$data);
    $this->load->view('Include/footer',$data);
  }

  public function outstanding_report(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($user_id == null){ header('location:'.base_url().'User'); }

    $data['branch_list'] = $this->User_Model->get_list2('branch_id','ASC','law_branch');
    $data['service_list'] = $this->User_Model->get_list2('service_id','ASC','law_service');
    $data['manager_list'] = $this->Transaction_Model->get_users_by_branch('2','');
    // $data['company_list'] = $this->User_Model->get_list2('company_id','ASC','law_company');
    $this->form_validation->set_rules('from_date', 'From Date', 'trim|required');
    $this->form_validation->set_rules('to_date', 'To Date', 'trim|required');
    if($this->form_validation->run() != FALSE){
      $from_date = $this->input->post('from_date');
      $to_date = $this->input->post('to_date');
      // $company_id2 = $this->input->post('company_id');
      $company_id2 = '';
      $manager_id = $this->input->post('manager_id');
      $branch_id = $this->input->post('branch_id');
      $service_id = $this->input->post('service_id');
      $rc_id = $this->input->post('rc_id');
      $tc_id = $this->input->post('tc_id');
      $data['outstanding_report'] = 'load';
      $data['from_date'] = $from_date;
      $data['to_date'] = $to_date;
      $data['company_id2'] = $company_id2;
      $data['manager_id'] = $manager_id;
      $data['branch_id'] = $branch_id;
      $data['rc_id'] = $rc_id;
      $data['tc_id'] = $tc_id;
      $data['service_id'] = $service_id;
      if($branch_id == '' && $service_id == ''){
        $data['report_type'] = 'branchwise';
      }
      if($branch_id != '' && $service_id == ''){
        $data['report_type'] = 'servicewise';
        $data['outstanding_service_wise_report'] = $this->Report_Model->outstanding_service_wise_report_list($from_date,$to_date,$company_id2,$branch_id,$rc_id,$tc_id,$service_id);
      }
      if($branch_id != '' && $service_id != ''){
        $data['report_type'] = 'service';
        $data['outstanding_service_wise_report'] = $this->Report_Model->outstanding_service_wise_report_list($from_date,$to_date,$company_id2,$branch_id,$rc_id,$tc_id,$service_id);
      }
      if(($rc_id != '' || $tc_id != '') && $service_id == ''){
        $data['report_type'] = 'servicewise';
        $data['outstanding_service_wise_report'] = $this->Report_Model->outstanding_service_wise_report_list($from_date,$to_date,$company_id2,$branch_id,$rc_id,$tc_id,$service_id);
      }
      if(($rc_id != '' || $tc_id != '') && $service_id != ''){
        $data['report_type'] = 'service';
        $data['outstanding_service_wise_report'] = $this->Report_Model->outstanding_service_wise_report_list($from_date,$to_date,$company_id2,$branch_id,$rc_id,$tc_id,$service_id);
      }

      //$data['outstanding_report_list'] = $this->Report_Model->outstanding_report_list($from_date,$to_date,$company_id,$branch_id,$service_id);
    }
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('Report/outstanding_report',$data);
    $this->load->view('Include/footer',$data);
  }

  public function invoice_report(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($user_id == null){ header('location:'.base_url().'User'); }
    $data['company_list'] = $this->User_Model->get_list2('company_id','ASC','law_company');
    $this->form_validation->set_rules('from_date', 'From Date', 'trim|required');
    $this->form_validation->set_rules('to_date', 'To Date', 'trim|required');
    if($this->form_validation->run() != FALSE){
      $from_date = $this->input->post('from_date');
      $to_date = $this->input->post('to_date');
      $company_id2 = $this->input->post('company_id');
      $data['invoice_report'] = 'load';
      $data['invoice_report_list'] = $this->Report_Model->invoice_report_list($from_date,$to_date,$company_id2);
    }
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('Report/invoice_report',$data);
    $this->load->view('Include/footer',$data);
  }

  public function legal_assistant_report(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($user_id == null){ header('location:'.base_url().'User'); }
    $this->form_validation->set_rules('from_date', 'From Date', 'trim|required');
    $this->form_validation->set_rules('to_date', 'To Date', 'trim|required');
    if($this->form_validation->run() != FALSE){
      $from_date = $this->input->post('from_date');
      $to_date = $this->input->post('to_date');
      $legal_user = $this->input->post('legal_user');
      $application_status = $this->input->post('application_status');
      $data['from_date'] = $from_date;
      $data['to_date'] = $to_date;
      $data['legal_user'] = $legal_user;
      $data['application_status'] = $application_status;
      $data['legal_report'] = 'load';
      $data['legal_report_list'] = $this->Report_Model->legal_report_list($from_date,$to_date,$legal_user,$application_status);
    }
    $data['legal_user_list'] = $this->User_Model->legal_user_list();
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('Report/legal_assistant_report',$data);
    $this->load->view('Include/footer',$data);
  }

  public function application_outstanding(){    
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($user_id == null){ header('location:'.base_url().'User'); }
    $status = '';
    $data['application_list'] = $this->Transaction_Model->application_list($company_id,$status,'DESC');
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('Report/application_outstanding',$data);
    $this->load->view('Include/footer',$data);
  }

}

?>
