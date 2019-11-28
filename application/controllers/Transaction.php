<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller{
  public function __construct(){
    parent::__construct();
    $this->load->model('User_Model');
    $this->load->model('Transaction_Model');
  }

  /***************************** Application Information *************************/
  // Add Application...
  public function application_information(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $data['application_no'] = $this->Transaction_Model->get_count_no($company_id,'application_no','law_application');
      $data['branch_list'] = $this->User_Model->get_list($company_id,'branch_id','ASC','law_branch');
      $data['service_list'] = $this->User_Model->get_list($company_id,'service_id','ASC','law_service');
      $data['organization_list'] = $this->User_Model->get_list($company_id,'organization_id','ASC','law_organization');
      $this->load->view('User/application_information', $data);
    } else{
      header('location:'.base_url().'User');
    }
  }
  // Save Application...
  public function save_application(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $application_data = array(
        'company_id' => $company_id,
        'application_no' => $this->input->post('application_no'),
        'application_date' => $this->input->post('application_date'),
        'branch_id' => $this->input->post('branch_id'),
        'service_id' => $this->input->post('service_id'),
        'organization_id' => $this->input->post('organization_id'),
      );
      // $application_id = $this->User_Model->save_data('law_application', $application_data);

      $allowed =  array('csv');
      if(is_uploaded_file($_FILES['csv_file']['tmp_name'])){
        $filename = $_FILES['csv_file']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        if(!in_array($ext,$allowed) ) {
            echo 'error';
        }
        else{
          // Load CSV reader library
          $this->load->library('CSVReader');
          // Parse data from CSV file
          $csvData = $this->csvreader->parse_csv($_FILES['csv_file']['tmp_name']);
          // Insert/update CSV data into database

          if(!empty($csvData)){
            $application_id = $this->User_Model->save_data('law_application', $application_data);
            $value = 'undefined';
            $replacement = '';
            foreach($csvData as $row){
              // Change value undefined to null...
              $row = array_replace($row,
                    array_fill_keys(
                        array_keys($row, $value),
                        $replacement
                    )
                );
              // Pass Aplication Id...
              $row['application_id'] = $application_id;
              $this->User_Model->save_data('law_applicant', $row);
            }
          }
        }
      }
      header('location:'.base_url().'Transaction/application_list');
    } else{
      header('location:'.base_url().'User');
    }
  }
  // Application List....
  public function application_list(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $status = '';
      $data['application_list'] = $this->Transaction_Model->application_list($company_id,$status,'DESC');
      $this->load->view('User/application_list',$data);
    } else{
      header('location:'.base_url().'User');
    }
  }
  // Edit Application...
  public function edit_application($application_id){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $application_details = $this->Transaction_Model->application_details($application_id);
      if($application_details){
        foreach ($application_details as $info) {
          $data['update'] = 'update';
          $data['application_id'] = $info->application_id;
          $data['application_no'] = $info->application_no;
          $data['application_date'] = $info->application_date;
          $data['branch_id'] = $info->branch_id;
          $data['branch_name'] = $info->branch_name;
          $data['service_id'] = $info->service_id;
          $data['service_name'] = $info->service_name;
          $data['organization_id'] = $info->organization_id;
          $data['organization_name'] = $info->organization_name;
        }
      }
      $data['branch_list'] = $this->User_Model->get_list($company_id,'branch_id','ASC','law_branch');
      $data['service_list'] = $this->User_Model->get_list($company_id,'service_id','ASC','law_service');
      $data['organization_list'] = $this->User_Model->get_list($company_id,'organization_id','ASC','law_organization');
      $this->load->view('User/application_information',$data);
    } else{
      header('location:'.base_url().'User');
    }
  }

  // Edit Application Next...
  public function edit_application_next(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $application_id = $this->input->post('application_id');
      $data = array(
        'application_date' => $this->input->post('application_date'),
        'branch_id' => $this->input->post('branch_id'),
      );
      $this->User_Model->update_info('application_id', $application_id, 'law_application', $data);

      $application_details = $this->Transaction_Model->application_details($application_id);
      if($application_details){
        foreach ($application_details as $info) {
          $organization_id = $info->organization_id;
          $application_id = $info->application_id;
        }
        $this->session->set_userdata('organization_id',$organization_id);
        $this->session->set_userdata('application_id',$application_id);
        header('location:'.base_url().'Transaction/step_one');
      }
      else{
          header('location:'.base_url().'User/dashboard');
      }
    } else{
      header('location:'.base_url().'User');
    }
  }

  // Step One...
  public function step_one(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $organization_id = $this->session->userdata('organization_id');
      $application_id = $this->session->userdata('application_id');

      $form_details = $this->User_Model->get_info('application_id', $application_id, 'law_applicant');

      if($form_details){
        foreach ($form_details as $info) {
          $data['application_id'] = $application_id;
          $data['organization_id'] = $organization_id;
          $data['NAME'] = $info->NAME;
          $data['ADDRESS'] = $info->ADDRESS;
          $data['MOBILE'] = $info->MOBILE;
          $data['AFF_DATE'] = $info->AFF_DATE;
          $data['COV_DATE'] = $info->COV_DATE;
          $data['BRAND'] = $info->BRAND;
          $data['SIGNIFICANCE'] = $info->SIGNIFICANCE;
          $data['STATE'] = $info->STATE;
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
          $data['CONTRACTAMOUNT'] = $info->CONTRACTAMOUNT;
          $data['GSTAMOUNT'] = $info->GSTAMOUNT;
          $data['TOTALAMOUNT'] = $info->TOTALAMOUNT;
          $data['RECEVIEDAMOUNT'] = $info->RECEVIEDAMOUNT;
          $data['BALANCEAMOUNT'] = $info->BALANCEAMOUNT;
          $data['GSTNUMBER'] = $info->GSTNUMBER;
          $data['CHEQUENUMBER'] = $info->CHEQUENUMBER;
          $data['CHEQUEAMOUNT'] = $info->CHEQUEAMOUNT;
          $data['BANKNAME'] = $info->BANKNAME;
          $data['PAYMENTMODE_0'] = $info->PAYMENTMODE_0;
          $data['PAYMENTMODE_1'] = $info->PAYMENTMODE_1;
          $data['CHQDATE'] = $info->CHQDATE;
          $data['GROUNDOFCONTRACT'] = $info->GROUNDOFCONTRACT;
        }

        if($organization_id == 1){
          $data['title'] = 'APPLICANT';
          $data['pl_name'] = 'Full Name of Applicant';
          $data['pl_nation'] = 'Nationality of Applicant';
          $data['pl_father'] = 'Father / Husabnt of Applicant';
          $data['pl_res_addr'] = 'Residential Address';
        }
        elseif ($organization_id == 2) {
          $data['title'] = 'Government Department';
          $data['pl_name'] = 'Full Name of Director / Authorized Signatory';
          $data['pl_nation'] = 'Nationality of Chairman';
          $data['pl_association'] = 'Association of Chairman Full Name';
          $data['pl_res_addr'] = 'Residential Address of Chairman';
        }
        elseif ($organization_id == 3) {
          $data['title'] = 'APPLICANT';
          $data['pl_name'] = 'Full Name of Karta';
          $data['pl_nation'] = 'Nationality of Karta';
          $data['pl_association'] = 'Association of Karta';
          $data['pl_res_addr'] = 'Residential Address';
        }
        elseif ($organization_id == 4) {
          $data['title'] = 'LLP';
          $data['pl_name'] = 'Full Name of All Partner';
          $data['pl_nation'] = 'Nationality of Single Partner';
          $data['pl_association'] = 'Association of Authorized Partner';
          $data['pl_res_addr'] = 'Residential Address of Partner';
        }
        elseif ($organization_id == 5) {
          $data['title'] = 'PROPRITORSHIP';
          $data['pl_name'] = 'Full Name of Propriter';
          $data['pl_nation'] = 'Nationality of Propriter';
          $data['pl_father'] = 'Father / Husabnt Name of Propriter';
          $data['pl_res_addr'] = 'Residential Address of Propriter';
        }
        elseif ($organization_id == 6) {
          $data['title'] = 'REGD COMPANY';
          $data['pl_name'] = 'Full Name of Director';
          $data['pl_nation'] = 'Nationality of Director';
          // $data['pl_father'] = 'Father / Husabnt Of Applicant';
          $data['pl_res_addr'] = 'Residential Address of Director';
        }
        elseif ($organization_id == 7) {
          $data['title'] = 'REGD PARTNERSHIP';
          $data['pl_name'] = 'Full Name of all Partener';
          $data['pl_nation'] = 'Nationality of Signing Authorized Partener';
          $data['pl_father'] = 'Father School Name of Partener';
          $data['pl_res_addr'] = 'Residential Address of Partener';
        }
        elseif ($organization_id == 8) {
          $data['title'] = 'SOCIETY';
          $data['pl_name'] = 'Full Name of Chairman';
          $data['pl_nation'] = 'Nationality of Chairman';
          $data['pl_association'] = 'Association of Chairman Full Name';
          $data['pl_res_addr'] = 'Residential Address of Chairman';
        }
        elseif ($organization_id == 9) {
          $data['title'] = 'TRUST';
          $data['pl_name'] = 'Full Name of Chairman';
          $data['pl_nation'] = 'Nationality of Chairman';
          // $data['pl_father'] = 'Father / Husabnt Of Applicant';
          $data['pl_association'] = 'Association of Chairman Full Name';
          $data['pl_res_addr'] = 'Residential Address of Chairman';
        }
        elseif ($organization_id == 10) {
          $data['title'] = 'Unregistered Partnership';
          $data['pl_name'] = 'Full Name of all Partner';
          $data['pl_nation'] = 'Nationality of Signing authorize Partner';
          $data['pl_father'] = 'Father School Name of Partener';
          $data['pl_res_addr'] = 'Residential Address of Partener';
        }
        $this->load->view('User/applicant_form_step1',$data);
      }
      else{
        header('location:'.base_url().'User/dashboard');
      }
    } else{
      header('location:'.base_url().'User');
    }
  }

  public function update_step_1(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){

      $application_id = $this->input->post('application_id');
      $organization_id = $this->input->post('organization_id');

      $MARK_0 = $this->input->post('MARK_0');
      $MARK_1 = $this->input->post('MARK_1');
      $MARK_2 = $this->input->post('MARK_2');
      $MARK_3 = $this->input->post('MARK_3');
      $MARK_4 = $this->input->post('MARK_4');
      $TRADE_0 = $this->input->post('TRADE_0');
      $TRADE_1 = $this->input->post('TRADE_1');
      $TRADE_2 = $this->input->post('TRADE_2');
      $TRADE_3 = $this->input->post('TRADE_3');

      if(!isset($MARK_0))( $MARK_0 = '');
      if(!isset($MARK_1))( $MARK_1 = '');
      if(!isset($MARK_2))( $MARK_2 = '');
      if(!isset($MARK_3))( $MARK_3 = '');
      if(!isset($MARK_4))( $MARK_4 = '');
      if(!isset($TRADE_0))( $TRADE_0 = '');
      if(!isset($TRADE_1))( $TRADE_1 = '');
      if(!isset($TRADE_2))( $TRADE_2 = '');
      if(!isset($TRADE_3))( $TRADE_3 = '');

      if(isset($organization_id) && $organization_id != 6 ){
        if(isset($organization_id) && ($organization_id == 2 || $organization_id == 3 || $organization_id == 4 || $organization_id == 8 || $organization_id == 9 ) ){
          $uodate_data['ASSOCIATION'] = $this->input->post('ASSOCIATION');
        } else{
          $uodate_data['FATHER'] = $this->input->post('FATHER');
        }
      }

      $uodate_data['NAME'] = $this->input->post('NAME');
      $uodate_data['NATIONALITY'] = $this->input->post('NATIONALITY');
      $uodate_data['MOBILE'] = $this->input->post('MOBILE');
      $uodate_data['AFF_DATE'] = $this->input->post('AFF_DATE');
      $uodate_data['COV_DATE'] = $this->input->post('COV_DATE');
      $uodate_data['ADDRESS'] = $this->input->post('ADDRESS');
      $uodate_data['FIRMADDRESS'] = $this->input->post('FIRMADDRESS');
      $uodate_data['ORGANIZATION'] = $this->input->post('ORGANIZATION');
      $uodate_data['STATE'] = $this->input->post('STATE');
      $uodate_data['AGE'] = $this->input->post('AGE');
      $uodate_data['MARK_0'] = $MARK_0;
      $uodate_data['MARK_1'] = $MARK_1;
      $uodate_data['MARK_2'] = $MARK_2;
      $uodate_data['MARK_3'] = $MARK_3;
      $uodate_data['MARK_4'] = $MARK_4;
      $uodate_data['TRADE_0'] = $TRADE_0;
      $uodate_data['TRADE_1'] = $TRADE_1;
      $uodate_data['TRADE_2'] = $TRADE_2;
      $uodate_data['TRADE_3'] = $TRADE_3;
      $uodate_data['BRAND'] = $this->input->post('BRAND');
      $uodate_data['SIGNIFICANCE'] = $this->input->post('SIGNIFICANCE');
      $uodate_data['TM'] = $this->input->post('TM');
      $uodate_data['SERVICES'] = $this->input->post('SERVICES');
      $uodate_data['PROPOSED'] = $this->input->post('PROPOSED');
      $uodate_data['INFORMATION'] = $this->input->post('INFORMATION');
      $uodate_data['DATE'] = $this->input->post('DATE');
      $uodate_data['PLACE'] = $this->input->post('PLACE');

      $this->User_Model->update_info('application_id', $application_id, 'law_applicant', $uodate_data);
      header('location:'.base_url().'Transaction/step_two');
    } else{
      header('location:'.base_url().'User');
    }
  }

  // Step Two...
  public function step_two(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $organization_id = $this->session->userdata('organization_id');
      $application_id = $this->session->userdata('application_id');

      $form_details = $this->User_Model->get_info('application_id', $application_id, 'law_applicant');

      if($form_details){
        foreach ($form_details as $info) {
          $data['application_id'] = $application_id;
          $data['organization_id'] = $organization_id;

          $data['PROPOSED'] = $info->PROPOSED;
          $data['CONTRACTAMOUNT'] = $info->CONTRACTAMOUNT;
          $data['GSTAMOUNT'] = $info->GSTAMOUNT;
          $data['TOTALAMOUNT'] = $info->TOTALAMOUNT;
          $data['RECEVIEDAMOUNT'] = $info->RECEVIEDAMOUNT;
          $data['BALANCEAMOUNT'] = $info->BALANCEAMOUNT;
          $data['GSTNUMBER'] = $info->GSTNUMBER;
          $data['CHEQUENUMBER'] = $info->CHEQUENUMBER;
          $data['CHEQUEAMOUNT'] = $info->CHEQUEAMOUNT;
          $data['BANKNAME'] = $info->BANKNAME;
          $data['PAYMENTMODE_0'] = $info->PAYMENTMODE_0;
          $data['PAYMENTMODE_1'] = $info->PAYMENTMODE_1;
          $data['CHQDATE'] = $info->CHQDATE;
          $data['GROUNDOFCONTRACT'] = $info->GROUNDOFCONTRACT;


          $data['FILE_REF_NO'] = $info->FILE_REF_NO;
          $data['IS_MSME_REQ'] = $info->IS_MSME_REQ;
          $data['SALE_YR_AMT1'] = $info->SALE_YR_AMT1;
          $data['SALE_YR_AMT2'] = $info->SALE_YR_AMT2;
          $data['SALE_YR_AMT3'] = $info->SALE_YR_AMT3;
          $data['SALE_YR_AMT4'] = $info->SALE_YR_AMT4;
          $data['SALE_YR_AMT5'] = $info->SALE_YR_AMT5;
          $data['ADV_YR_AMT1'] = $info->ADV_YR_AMT1;
          $data['ADV_YR_AMT2'] = $info->ADV_YR_AMT2;
          $data['ADV_YR_AMT3'] = $info->ADV_YR_AMT3;
          $data['ADV_YR_AMT4'] = $info->ADV_YR_AMT4;
          $data['ADV_YR_AMT5'] = $info->ADV_YR_AMT5;

        }

        if($organization_id == 1){
          $data['title'] = 'APPLICANT';
        }
        elseif ($organization_id == 2) {
          $data['title'] = 'Government Department';
        }
        elseif ($organization_id == 3) {
          $data['title'] = 'APPLICANT';
        }
        elseif ($organization_id == 4) {
          $data['title'] = 'LLP';
        }
        elseif ($organization_id == 5) {
          $data['title'] = 'PROPRITORSHIP';
        }
        elseif ($organization_id == 6) {
          $data['title'] = 'REGD COMPANY';
        }
        elseif ($organization_id == 7) {
          $data['title'] = 'REGD PARTNERSHIP';
        }
        elseif ($organization_id == 8) {
          $data['title'] = 'SOCIETY';
        }
        elseif ($organization_id == 9) {
          $data['title'] = 'TRUST';
        }
        elseif ($organization_id == 10) {
          $data['title'] = 'Unregistered Partnership';
        }
        $this->load->view('User/applicant_form_step2',$data);
      }
      else{
        header('location:'.base_url().'User/dashboard');
      }
    } else{
      header('location:'.base_url().'User');
    }
  }

  public function update_step_2(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){

      $application_id = $this->input->post('application_id');
      $organization_id = $this->input->post('organization_id');

      $PAYMENTMODE_0 = $this->input->post('PAYMENTMODE_0');
      $PAYMENTMODE_1 = $this->input->post('PAYMENTMODE_1');

      if(!isset($PAYMENTMODE_0))( $PAYMENTMODE_0 = '');
      if(!isset($PAYMENTMODE_1))( $PAYMENTMODE_1 = '');

      $uodate_data['CONTRACTAMOUNT'] = $this->input->post('CONTRACTAMOUNT');
      $uodate_data['GSTAMOUNT'] = $this->input->post('GSTAMOUNT');
      $uodate_data['TOTALAMOUNT'] = $this->input->post('TOTALAMOUNT');
      $uodate_data['RECEVIEDAMOUNT'] = $this->input->post('RECEVIEDAMOUNT');
      $uodate_data['BALANCEAMOUNT'] = $this->input->post('BALANCEAMOUNT');
      $uodate_data['GSTNUMBER'] = $this->input->post('GSTNUMBER');
      $uodate_data['PAYMENTMODE_0'] = $PAYMENTMODE_0;
      $uodate_data['PAYMENTMODE_1'] = $PAYMENTMODE_1;
      $uodate_data['CHEQUENUMBER'] = $this->input->post('CHEQUENUMBER');
      $uodate_data['CHQDATE'] = $this->input->post('CHQDATE');
      $uodate_data['BANKNAME'] = $this->input->post('BANKNAME');
      $uodate_data['CHEQUEAMOUNT'] = $this->input->post('CHEQUEAMOUNT');
      $uodate_data['GROUNDOFCONTRACT'] = $this->input->post('GROUNDOFCONTRACT');

      $uodate_data['FILE_REF_NO'] = $this->input->post('FILE_REF_NO');
      $uodate_data['IS_MSME_REQ'] = $this->input->post('IS_MSME_REQ');
      $uodate_data['SALE_YR_AMT1'] = $this->input->post('SALE_YR_AMT1');
      $uodate_data['SALE_YR_AMT2'] = $this->input->post('SALE_YR_AMT2');
      $uodate_data['SALE_YR_AMT3'] = $this->input->post('SALE_YR_AMT3');
      $uodate_data['SALE_YR_AMT4'] = $this->input->post('SALE_YR_AMT4');
      $uodate_data['SALE_YR_AMT5'] = $this->input->post('SALE_YR_AMT5');
      $uodate_data['ADV_YR_AMT1'] = $this->input->post('ADV_YR_AMT1');
      $uodate_data['ADV_YR_AMT2'] = $this->input->post('ADV_YR_AMT2');
      $uodate_data['ADV_YR_AMT3'] = $this->input->post('ADV_YR_AMT3');
      $uodate_data['ADV_YR_AMT4'] = $this->input->post('ADV_YR_AMT4');
      $uodate_data['ADV_YR_AMT5'] = $this->input->post('ADV_YR_AMT5');

      // foreach($_POST['input'] as $key)
      // {
      //   // $user['delivery_id'] = $delivery_id;
      //   // echo print_r($_POST['input']);
      //   // $this->db->insert('uni_delivery_trans', $user);
      //   // $i++;
      //   echo $key['SALE_YR_AMT'];
      // }



      $this->User_Model->update_info('application_id', $application_id, 'law_applicant', $uodate_data);
      $app_data['application_status'] = 'In Process';
      $this->User_Model->update_info('application_id', $application_id, 'law_application', $app_data);


      header('location:'.base_url().'Transaction/application_list');
    } else{
      header('location:'.base_url().'User');
    }
  }

  public function printing_list(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $status = "In Process";
      $data['application_list'] = $this->Transaction_Model->application_list($company_id,$status,'DESC');
      $this->load->view('User/printing_list',$data);
    } else{
      header('location:'.base_url().'User');
    }
  }

  // prints...

  public function form_tm($application_id){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $application_details = $this->Transaction_Model->application_details($application_id);
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
          // $uodate_data['IS_MSME_REQ'] = $this->input->post('IS_MSME_REQ');


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
          $data['CONTRACTAMOUNT'] = $info->CONTRACTAMOUNT;
          $data['GSTAMOUNT'] = $info->GSTAMOUNT;
          $data['TOTALAMOUNT'] = $info->TOTALAMOUNT;
          $data['RECEVIEDAMOUNT'] = $info->RECEVIEDAMOUNT;
          $data['BALANCEAMOUNT'] = $info->BALANCEAMOUNT;
          $data['GSTNUMBER'] = $info->GSTNUMBER;
          $data['CHEQUENUMBER'] = $info->CHEQUENUMBER;
          $data['CHEQUEAMOUNT'] = $info->CHEQUEAMOUNT;
          $data['BANKNAME'] = $info->BANKNAME;
          $data['PAYMENTMODE_0'] = $info->PAYMENTMODE_0;
          $data['PAYMENTMODE_1'] = $info->PAYMENTMODE_1;
          $data['CHQDATE'] = $info->CHQDATE;
          $data['GROUNDOFCONTRACT'] = $info->GROUNDOFCONTRACT;
        }
      }
      $this->load->view('User/form_tm',$data);
    } else{
      header('location:'.base_url().'User');
    }
  }

  public function auth_print($application_id){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $application_details = $this->Transaction_Model->application_details($application_id);
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
          // $uodate_data['IS_MSME_REQ'] = $this->input->post('IS_MSME_REQ');


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
          $data['CONTRACTAMOUNT'] = $info->CONTRACTAMOUNT;
          $data['GSTAMOUNT'] = $info->GSTAMOUNT;
          $data['TOTALAMOUNT'] = $info->TOTALAMOUNT;
          $data['RECEVIEDAMOUNT'] = $info->RECEVIEDAMOUNT;
          $data['BALANCEAMOUNT'] = $info->BALANCEAMOUNT;
          $data['GSTNUMBER'] = $info->GSTNUMBER;
          $data['CHEQUENUMBER'] = $info->CHEQUENUMBER;
          $data['CHEQUEAMOUNT'] = $info->CHEQUEAMOUNT;
          $data['BANKNAME'] = $info->BANKNAME;
          $data['PAYMENTMODE_0'] = $info->PAYMENTMODE_0;
          $data['PAYMENTMODE_1'] = $info->PAYMENTMODE_1;
          $data['CHQDATE'] = $info->CHQDATE;
          $data['GROUNDOFCONTRACT'] = $info->GROUNDOFCONTRACT;
        }
      }
      $this->load->view('User/authorization',$data);
    } else{
      header('location:'.base_url().'User');
    }
  }

  public function affidavit($application_id){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $application_details = $this->Transaction_Model->application_details($application_id);
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
          // $uodate_data['IS_MSME_REQ'] = $this->input->post('IS_MSME_REQ');


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
          $data['CONTRACTAMOUNT'] = $info->CONTRACTAMOUNT;
          $data['GSTAMOUNT'] = $info->GSTAMOUNT;
          $data['TOTALAMOUNT'] = $info->TOTALAMOUNT;
          $data['RECEVIEDAMOUNT'] = $info->RECEVIEDAMOUNT;
          $data['BALANCEAMOUNT'] = $info->BALANCEAMOUNT;
          $data['GSTNUMBER'] = $info->GSTNUMBER;
          $data['CHEQUENUMBER'] = $info->CHEQUENUMBER;
          $data['CHEQUEAMOUNT'] = $info->CHEQUEAMOUNT;
          $data['BANKNAME'] = $info->BANKNAME;
          $data['PAYMENTMODE_0'] = $info->PAYMENTMODE_0;
          $data['PAYMENTMODE_1'] = $info->PAYMENTMODE_1;
          $data['CHQDATE'] = $info->CHQDATE;
          $data['GROUNDOFCONTRACT'] = $info->GROUNDOFCONTRACT;
        }
      }
      $this->load->view('User/affidavite',$data);
    } else{
      header('location:'.base_url().'User');
    }
  }

  public function covering_letter($application_id){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $application_details = $this->Transaction_Model->application_details($application_id);
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
          // $uodate_data['IS_MSME_REQ'] = $this->input->post('IS_MSME_REQ');

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
          $data['CONTRACTAMOUNT'] = $info->CONTRACTAMOUNT;
          $data['GSTAMOUNT'] = $info->GSTAMOUNT;
          $data['TOTALAMOUNT'] = $info->TOTALAMOUNT;
          $data['RECEVIEDAMOUNT'] = $info->RECEVIEDAMOUNT;
          $data['BALANCEAMOUNT'] = $info->BALANCEAMOUNT;
          $data['GSTNUMBER'] = $info->GSTNUMBER;
          $data['CHEQUENUMBER'] = $info->CHEQUENUMBER;
          $data['CHEQUEAMOUNT'] = $info->CHEQUEAMOUNT;
          $data['BANKNAME'] = $info->BANKNAME;
          $data['PAYMENTMODE_0'] = $info->PAYMENTMODE_0;
          $data['PAYMENTMODE_1'] = $info->PAYMENTMODE_1;
          $data['CHQDATE'] = $info->CHQDATE;
          $data['GROUNDOFCONTRACT'] = $info->GROUNDOFCONTRACT;
        }
      }
      $this->load->view('User/covering_letter',$data);
    } else{
      header('location:'.base_url().'User');
    }
  }



  public function add_enquiry(){
    $this->load->view('User/add_enquiry');
  }
  public function applicant_form1(){
    $this->load->view('User/applicant_form_step1');
  }

  public function applicant_form2(){
    $this->load->view('User/applicant_form_step2');
  }

  public function huf_form1(){
    $this->load->view('User/huf_step1');
  }

  public function huf_form2(){
    $this->load->view('User/huf_step2');
  }
  public function lpp_form1(){
    $this->load->view('User/lpp_step1');
  }

  public function lpp_form2(){
    $this->load->view('User/lpp_step2');
  }
  public function propritorship_form1(){
    $this->load->view('User/propritorship_step1');
  }

  public function propritorship_form2(){
    $this->load->view('User/propritorship_step2');
  }
  public function regd_company_form1(){
    $this->load->view('User/regd_company_step1');
  }

  public function regd_company_form2(){
    $this->load->view('User/regd_company_step2');
  }
  public function regd_partnership_form1(){
    $this->load->view('User/regd_partnership_step1');
  }

  public function regd_partnership_form2(){
    $this->load->view('User/regd_partnership_step2');
  }
  public function society_form1(){
    $this->load->view('User/society_step1');
  }

  public function society_form2(){
    $this->load->view('User/society_step2');
  }


}
