<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller{
  public function __construct(){
    parent::__construct();
    $this->load->model('User_Model');
    $this->load->model('Transaction_Model');
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
          // $data['CONTRACTAMOUNT'] = $info->CONTRACTAMOUNT;
          // $data['GSTAMOUNT'] = $info->GSTAMOUNT;
          // $data['TOTALAMOUNT'] = $info->TOTALAMOUNT;
          // $data['RECEVIEDAMOUNT'] = $info->RECEVIEDAMOUNT;
          // $data['BALANCEAMOUNT'] = $info->BALANCEAMOUNT;
          // $data['GSTNUMBER'] = $info->GSTNUMBER;
          // $data['CHEQUENUMBER'] = $info->CHEQUENUMBER;
          // $data['CHEQUEAMOUNT'] = $info->CHEQUEAMOUNT;
          // $data['BANKNAME'] = $info->BANKNAME;
          // $data['PAYMENTMODE_0'] = $info->PAYMENTMODE_0;
          // $data['PAYMENTMODE_1'] = $info->PAYMENTMODE_1;
          // $data['CHQDATE'] = $info->CHQDATE;
          // $data['GROUNDOFCONTRACT'] = $info->GROUNDOFCONTRACT;
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
          // $data['CONTRACTAMOUNT'] = $info->CONTRACTAMOUNT;
          // $data['GSTAMOUNT'] = $info->GSTAMOUNT;
          // $data['TOTALAMOUNT'] = $info->TOTALAMOUNT;
          // $data['RECEVIEDAMOUNT'] = $info->RECEVIEDAMOUNT;
          // $data['BALANCEAMOUNT'] = $info->BALANCEAMOUNT;
          // $data['GSTNUMBER'] = $info->GSTNUMBER;
          // $data['CHEQUENUMBER'] = $info->CHEQUENUMBER;
          // $data['CHEQUEAMOUNT'] = $info->CHEQUEAMOUNT;
          // $data['BANKNAME'] = $info->BANKNAME;
          // $data['PAYMENTMODE_0'] = $info->PAYMENTMODE_0;
          // $data['PAYMENTMODE_1'] = $info->PAYMENTMODE_1;
          // $data['CHQDATE'] = $info->CHQDATE;
          // $data['GROUNDOFCONTRACT'] = $info->GROUNDOFCONTRACT;
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
          // $data['CONTRACTAMOUNT'] = $info->CONTRACTAMOUNT;
          // $data['GSTAMOUNT'] = $info->GSTAMOUNT;
          // $data['TOTALAMOUNT'] = $info->TOTALAMOUNT;
          // $data['RECEVIEDAMOUNT'] = $info->RECEVIEDAMOUNT;
          // $data['BALANCEAMOUNT'] = $info->BALANCEAMOUNT;
          // $data['GSTNUMBER'] = $info->GSTNUMBER;
          // $data['CHEQUENUMBER'] = $info->CHEQUENUMBER;
          // $data['CHEQUEAMOUNT'] = $info->CHEQUEAMOUNT;
          // $data['BANKNAME'] = $info->BANKNAME;
          // $data['PAYMENTMODE_0'] = $info->PAYMENTMODE_0;
          // $data['PAYMENTMODE_1'] = $info->PAYMENTMODE_1;
          // $data['CHQDATE'] = $info->CHQDATE;
          // $data['GROUNDOFCONTRACT'] = $info->GROUNDOFCONTRACT;
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
          // $data['CONTRACTAMOUNT'] = $info->CONTRACTAMOUNT;
          // $data['GSTAMOUNT'] = $info->GSTAMOUNT;
          // $data['TOTALAMOUNT'] = $info->TOTALAMOUNT;
          // $data['RECEVIEDAMOUNT'] = $info->RECEVIEDAMOUNT;
          // $data['BALANCEAMOUNT'] = $info->BALANCEAMOUNT;
          // $data['GSTNUMBER'] = $info->GSTNUMBER;
          // $data['CHEQUENUMBER'] = $info->CHEQUENUMBER;
          // $data['CHEQUEAMOUNT'] = $info->CHEQUEAMOUNT;
          // $data['BANKNAME'] = $info->BANKNAME;
          // $data['PAYMENTMODE_0'] = $info->PAYMENTMODE_0;
          // $data['PAYMENTMODE_1'] = $info->PAYMENTMODE_1;
          // $data['CHQDATE'] = $info->CHQDATE;
          // $data['GROUNDOFCONTRACT'] = $info->GROUNDOFCONTRACT;
        }
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

    $company_info = $this->User_Model->get_info('company_id', $company_id, 'law_company');
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
      }
      $data['invoice_details_list'] = $this->Transaction_Model->invoice_details_list($invoice_id);
      $invice_details = $this->Transaction_Model->invice_details($invoice_id);
      if(!$invice_details){ header('location:'.base_url().'Transaction/sale_invoice_list'); }
      foreach ($invice_details as $details) {
        $data['invoice_id'] = $invoice_id;
        $data['application_id'] = $details->application_id;
        $data['branch_id'] = $details->branch_id;
        $data['branch_name'] = $details->branch_name;
        $data['invoice_no'] = $details->invoice_no;
        $data['invoice_date'] = $details->invoice_date;
        $data['party'] = $details->party;
        $data['party_address'] = $details->party_address;
        $data['party_statecode'] = $details->party_statecode;
        $data['po_no'] = $details->po_no;
        $data['po_date'] = $details->po_date;
        $data['basic_amt'] = $details->basic_amt;
        $data['gst_amt'] = $details->gst_amt;
        $data['adv_amt'] = $details->adv_amt;
        $data['bal_amt'] = $details->bal_amt;
        $data['net_amt'] = $details->net_amt;
      }
      $application_id = $details->application_id;
      $payment_info = $this->User_Model->get_info('application_id', $application_id, 'law_payment');
      if(!$payment_info){ header('location:'.base_url().'Transaction/sale_invoice_list'); }
      // echo print_r($payment_info);
      foreach ($payment_info as $payment_info1) {
        $data['party_gst_no'] = $payment_info1->GSTNUMBER;
      }
      // echo $data['party_gst_no'];
      $this->load->view('Report/invoice_print',$data);
    }
  }

}

?>
