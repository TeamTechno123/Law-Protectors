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
      $data['application_no'] = $this->Transaction_Model->get_count_no('application_no','law_application');
      $data['branch_list'] = $this->User_Model->get_list($company_id,'branch_id','ASC','law_branch');
      $data['service_list'] = $this->User_Model->get_list2('service_id','ASC','law_service');
      $data['organization_list'] = $this->User_Model->get_list2('organization_id','ASC','law_organization');
      $data['company_list'] = $this->User_Model->get_list2('company_id','ASC','law_company');

      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('Transaction/application_information', $data);
      $this->load->view('Include/footer', $data);
    } else{
      header('location:'.base_url().'User');
    }
  }

  public function get_branch_by_company(){
    $company_id = $this->input->post('company_id');
    $branch_list = $this->User_Model->get_list($company_id,'branch_id','ASC','law_branch');
    echo "<option value='' selected >Select Branch</option>";
  	foreach ($branch_list as $data) {
  		echo "<option class='cls_".$data->branch_id."' value=".$data->branch_id."> ".$data->branch_name." </option>";
  	}
  }

  public function get_users_by_branch(){
    $branch_id = $this->input->post('branch_id');
    $manager_list = $this->Transaction_Model->get_users_by_branch('2',$branch_id);
    $rc_list = $this->Transaction_Model->get_users_by_branch('3',$branch_id);
    $tc_list = $this->Transaction_Model->get_users_by_branch('4',$branch_id);
    $manager = "<option value='' selected >Select Manager</option>";
    foreach ($manager_list as $manager1) {
      $manager = $manager."<option value=".$manager1->user_id."> ".$manager1->user_name." ".$manager1->user_lastname."</option>";
  	}
    $data['manager'] = $manager;

    $rc = "<option value='' selected >Select RC</option>";
    foreach ($rc_list as $rc1) {
      $rc = $rc."<option value=".$rc1->user_id."> ".$rc1->user_name." ".$rc1->user_lastname."</option>";
  	}
    $data['rc'] = $rc;

    $tc = "<option value='' selected >Select TC</option>";
    foreach ($tc_list as $tc1) {
      $tc = $tc."<option value=".$tc1->user_id."> ".$tc1->user_name." ".$tc1->user_lastname."</option>";
  	}
    $data['tc'] = $tc;
    echo json_encode($data);
  }

  // Save Application...
  public function save_application(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $application_data = array(
        'company_id' => $this->input->post('company_id'),
        'application_no' => $this->input->post('application_no'),
        'application_date' => $this->input->post('application_date'),
        'branch_id' => $this->input->post('branch_id'),
        'manager_id' => $this->input->post('manager_id'),
        'tc_id' => $this->input->post('tc_id'),
        'rc_id' => $this->input->post('rc_id'),
        'service_id' => $this->input->post('service_id'),
        'organization_id' => $this->input->post('organization_id'),
      );
      $application_id = $this->User_Model->save_data('law_application', $application_data);
      $service_id = $this->input->post('service_id');
      $row['application_id'] = $application_id;
      $row2['is_master'] = 1;
      $row2['application_id'] = $application_id;
      if($service_id == 1){
        $this->User_Model->save_data('law_trademark', $row);
        $this->User_Model->save_data('law_payment', $row2);
      } elseif ($service_id == 2) {
        $this->User_Model->save_data('law_copyright', $row);
        $this->User_Model->save_data('law_payment', $row2);
      } else{
        $this->User_Model->save_data('law_otherservice', $row);
        $this->User_Model->save_data('law_payment', $row2);
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

      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('Transaction/application_list', $data);
      $this->load->view('Include/footer', $data);
    } else{
      header('location:'.base_url().'User');
    }
  }

  public function delete_application($application_id){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($user_id == null ){ header('location:'.base_url().'User'); }
    $appl_details = $this->User_Model->get_info('application_id', $application_id, 'law_application');
    foreach ($appl_details as $details) {
      $service_id = $details->service_id;
    }

    if($service_id == 1){
      $this->User_Model->delete_info('application_id', $application_id, 'law_trademark');
    }
    elseif ($service_id == 2) {
      $this->User_Model->delete_info('application_id', $application_id, 'law_copyright');
    } else{
      $this->User_Model->delete_info('application_id', $application_id, 'law_otherservice');
    }

    $this->User_Model->delete_info('application_id', $application_id, 'law_application');
    $this->User_Model->delete_info('application_id', $application_id, 'law_payment');
    $this->User_Model->delete_info('application_id', $application_id, 'law_doc_upload');
    header('location:'.base_url().'Transaction/application_list');
  }

  // Application List....
  public function application_list2($status_id){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      if($status_id == 1){ $status = 'Open'; }
      if($status_id == 2){ $status = 'In Process'; }
      if($status_id == 3){ $status = 'Ready To File'; }
      if($status_id == 4){ $status = 'Filed Application'; }
      if($status_id == 5){ $status = 'Application Closed'; }
      //$status = '';
      $data['application_list'] = $this->Transaction_Model->application_list($company_id,$status,'DESC');

      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('Transaction/application_list', $data);
      $this->load->view('Include/footer', $data);
    } else{
      header('location:'.base_url().'User');
    }
  }

  // Edit Application....
  public function edit_application($application_id){
    $user_id = $this->session->userdata('law_user_id');
    $company_id2 = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($user_id){
      $application_details = $this->Transaction_Model->application_details($application_id);
      if($application_details){
        foreach ($application_details as $info) {
          $data['update'] = 'update';
          $data['application_id'] = $application_id;
          $data['application_no'] = $info->application_no;
          $data['application_date'] = $info->application_date;

          $data['company_id'] = $info->com_id;

          $data['branch_id'] = $info->branch_id;
          $data['branch_name'] = $info->branch_name;
          $data['manager_id'] = $info->manager_id;
          $data['manager_name'] = $info->man_name.' '.$info->man_lname;
          $data['tc_id'] = $info->tc_id;
          $data['tc_name'] = $info->tc_name.' '.$info->tc_lname;
          $data['rc_id'] = $info->rc_id;
          $data['rc_name'] = $info->rc_name.' '.$info->rc_lname;

          $data['service_id'] = $info->service_id;
          $data['service_name'] = $info->service_name;
          $data['organization_id'] = $info->organization_id;
          $data['organization_name'] = $info->organization_name;
        }
      }
      $data['branch_list'] = $this->User_Model->get_list2('branch_id','ASC','law_branch');
      $data['service_list'] = $this->User_Model->get_list2('service_id','ASC','law_service');
      $data['organization_list'] = $this->User_Model->get_list2('organization_id','ASC','law_organization');
      $data['company_list'] = $this->User_Model->get_list2('company_id','ASC','law_company');

      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('Transaction/application_information', $data);
      $this->load->view('Include/footer', $data);
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
        'company_id' => $this->input->post('company_id'),
        'application_no' => $this->input->post('application_no'),
        'application_date' => $this->input->post('application_date'),
        'branch_id' => $this->input->post('branch_id'),
        'manager_id' => $this->input->post('manager_id'),
        'tc_id' => $this->input->post('tc_id'),
        'rc_id' => $this->input->post('rc_id'),
      );
      $this->User_Model->update_info('application_id', $application_id, 'law_application', $data);

      $organization_id = $this->input->post('organization_id');
      $this->session->set_userdata('organization_id',$organization_id);
      $this->session->set_userdata('application_id',$application_id);
      // echo $application_id;
      $service_id = $this->input->post('service_id');
      header('location:'.base_url().'Transaction/process_step_two');

    } else{
      header('location:'.base_url().'User');
    }
  }

/********************** Trade Mark *************************/
  // Step One...
  public function trade_mark_step_one(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $organization_id = $this->session->userdata('organization_id');
      $application_id = $this->session->userdata('application_id');

      $form_details = $this->User_Model->get_info('application_id', $application_id, 'law_trademark');

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
          $data['PROPOSED_TO_BE'] = $info->PROPOSED_TO_BE;
          $data['PROPOSED'] = $info->PROPOSED;
          $data['INFORMATION'] = $info->INFORMATION;
          $data['PLACE'] = $info->PLACE;
          $data['DATE'] = $info->DATE;
          $data['TRADE'] = $info->TRADE;
          // $data['TRADE_0'] = $info->TRADE_0;
          // $data['TRADE_1'] = $info->TRADE_1;
          // $data['TRADE_2'] = $info->TRADE_2;
          // $data['TRADE_3'] = $info->TRADE_3;
          $data['IS_MSME_REQ'] = $info->IS_MSME_REQ;
          $data['ASSOCIATE_MARK'] = $info->ASSOCIATE_MARK;
          $data['ADV_NAME'] = $info->ADV_NAME;
          $data['BAR_COUN_NO'] = $info->BAR_COUN_NO;
          $data['LOGO'] = $info->LOGO;
          $data['title'] = 'Trade Mark';
        }

        if($organization_id == 1){
          // $data['title'] = 'APPLICANT';
          $data['pl_name'] = 'Full Name of Applicant';
          $data['pl_nation'] = 'Nationality of Applicant';
          $data['pl_father'] = 'Father / Husabnt of Applicant';
          $data['pl_res_addr'] = 'Residential Address';
        }
        elseif ($organization_id == 2) {
          // $data['title'] = 'Government Department';
          $data['pl_name'] = 'Full Name of Director / Authorized Signatory';
          $data['pl_nation'] = 'Nationality of Chairman';
          $data['pl_association'] = 'Association of Chairman Full Name';
          $data['pl_res_addr'] = 'Residential Address of Chairman';
        }
        elseif ($organization_id == 3) {
          // $data['title'] = 'APPLICANT';
          $data['pl_name'] = 'Full Name of Karta';
          $data['pl_nation'] = 'Nationality of Karta';
          $data['pl_association'] = 'Association of Karta';
          $data['pl_res_addr'] = 'Residential Address';
        }
        elseif ($organization_id == 4) {
          // $data['title'] = 'LLP';
          $data['pl_name'] = 'Full Name of All Partner';
          $data['pl_nation'] = 'Nationality of Single Partner';
          $data['pl_association'] = 'Association of Authorized Partner';
          $data['pl_res_addr'] = 'Residential Address of Partner';
        }
        elseif ($organization_id == 5) {
          // $data['title'] = 'PROPRITORSHIP';
          $data['pl_name'] = 'Full Name of Propriter';
          $data['pl_nation'] = 'Nationality of Propriter';
          $data['pl_father'] = 'Father / Husabnt Name of Propriter';
          $data['pl_res_addr'] = 'Residential Address of Propriter';
        }
        elseif ($organization_id == 6) {
          // $data['title'] = 'REGD COMPANY';
          $data['pl_name'] = 'Full Name of Director';
          $data['pl_nation'] = 'Nationality of Director';
          // $data['pl_father'] = 'Father / Husabnt Of Applicant';
          $data['pl_res_addr'] = 'Residential Address of Director';
        }
        elseif ($organization_id == 7) {
          // $data['title'] = 'REGD PARTNERSHIP';
          $data['pl_name'] = 'Full Name of all Partener';
          $data['pl_nation'] = 'Nationality of Signing Authorized Partener';
          $data['pl_father'] = 'Father School Name of Partener';
          $data['pl_res_addr'] = 'Residential Address of Partener';
        }
        elseif ($organization_id == 8) {
          // $data['title'] = 'SOCIETY';
          $data['pl_name'] = 'Full Name of Chairman';
          $data['pl_nation'] = 'Nationality of Chairman';
          $data['pl_association'] = 'Association of Chairman Full Name';
          $data['pl_res_addr'] = 'Residential Address of Chairman';
        }
        elseif ($organization_id == 9) {
          // $data['title'] = 'TRUST';
          $data['pl_name'] = 'Full Name of Chairman';
          $data['pl_nation'] = 'Nationality of Chairman';
          // $data['pl_father'] = 'Father / Husabnt Of Applicant';
          $data['pl_association'] = 'Association of Chairman Full Name';
          $data['pl_res_addr'] = 'Residential Address of Chairman';
        }
        elseif ($organization_id == 10) {
          // $data['title'] = 'Unregistered Partnership';
          $data['pl_name'] = 'Full Name of all Partner';
          $data['pl_nation'] = 'Nationality of Signing authorize Partner';
          $data['pl_father'] = 'Father School Name of Partener';
          $data['pl_res_addr'] = 'Residential Address of Partener';
        }
        $this->load->view('Include/head', $data);
        $this->load->view('Include/navbar', $data);
        $this->load->view('Transaction/applicant_form_step1', $data);
        $this->load->view('Include/footer', $data);
      }
      else{
        header('location:'.base_url().'User/dashboard');
      }
    } else{
      header('location:'.base_url().'User');
    }
  }

  // Save Trademark...
  public function save_trademark(){
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
      // $TRADE_0 = $this->input->post('TRADE_0');
      // $TRADE_1 = $this->input->post('TRADE_1');
      // $TRADE_2 = $this->input->post('TRADE_2');
      // $TRADE_3 = $this->input->post('TRADE_3');

      if(!isset($MARK_0)){ $MARK_0 = '';}
      if(!isset($MARK_1)){ $MARK_1 = '';}
      if(!isset($MARK_2)){ $MARK_2 = '';}
      if(!isset($MARK_3)){ $MARK_3 = '';}
      if(!isset($MARK_4)){ $MARK_4 = '';}
      // if(!isset($TRADE_0)){ $TRADE_0 = '';}
      // if(!isset($TRADE_1)){ $TRADE_1 = '';}
      // if(!isset($TRADE_2)){ $TRADE_2 = '';}
      // if(!isset($TRADE_3)){ $TRADE_3 = '';}

      $PROPOSED_TO_BE = $this->input->post('PROPOSED_TO_BE');
      if(!isset($PROPOSED_TO_BE)){ $PROPOSED_TO_BE = '';}

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
      $uodate_data['TRADE'] = $this->input->post('TRADE');
      // $uodate_data['TRADE_0'] = $TRADE_0;
      // $uodate_data['TRADE_1'] = $TRADE_1;
      // $uodate_data['TRADE_2'] = $TRADE_2;
      // $uodate_data['TRADE_3'] = $TRADE_3;
      $uodate_data['BRAND'] = $this->input->post('BRAND');
      $uodate_data['SIGNIFICANCE'] = $this->input->post('SIGNIFICANCE');
      $uodate_data['TM'] = $this->input->post('TM');
      $uodate_data['SERVICES'] = $this->input->post('SERVICES');
      $uodate_data['PROPOSED_TO_BE'] = $PROPOSED_TO_BE;
      $uodate_data['PROPOSED'] = $this->input->post('PROPOSED');
      $uodate_data['INFORMATION'] = $this->input->post('INFORMATION');
      $uodate_data['DATE'] = $this->input->post('DATE');
      $uodate_data['PLACE'] = $this->input->post('PLACE');
      $uodate_data['IS_MSME_REQ'] = $this->input->post('IS_MSME_REQ');
      $uodate_data['ASSOCIATE_MARK'] = $this->input->post('ASSOCIATE_MARK');
      $uodate_data['ADV_NAME'] = $this->input->post('ADV_NAME');
      $uodate_data['BAR_COUN_NO'] = $this->input->post('BAR_COUN_NO');
      $LOGO_old = $this->input->post('old_logo');

      if($_FILES['LOGO']['name']){
        $time = time();
        $image_name = 'trade_'.$application_id.'_'.$time;
        $config['upload_path'] = 'assets/images/trade_logo/';
        $config['allowed_types'] = 'jpg|png|gif';
        $config['file_name'] = $image_name;
        $filename = $_FILES['LOGO']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        // $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('LOGO')){
          $uodate_data['LOGO'] = $image_name.'.'.$ext;
          // $tour_up_image = array(
          //   'LOGO' => $image_name.'.'.$ext,
          // );
          // $this->Admin_Model->update_tour_image($tour_id,$tour_up_image);
          if($LOGO_old != ''){
            unlink("assets/images/trade_logo/".$LOGO_old);
          }
          $this->session->set_flashdata('status','tour_image_update_success');
        }
        else{
          echo $error = $this->upload->display_errors();
          $this->session->set_flashdata('status',$this->upload->display_errors());
        }
      }

      $this->User_Model->update_info('application_id', $application_id, 'law_trademark', $uodate_data);
      // header('location:'.base_url().'Transaction/process_step_two');
      header('location:'.base_url().'Transaction/application_list');
    } else{
      header('location:'.base_url().'User');
    }
  }

/***************************** Copyright *******************/
  public function copyright_step_one(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($user_id == null ){ header('location:'.base_url().'User'); }

      $organization_id = $this->session->userdata('organization_id');
      $application_id = $this->session->userdata('application_id');

      $form_details = $this->User_Model->get_info('application_id', $application_id, 'law_copyright');

      // echo print_r($application_id);
      if($form_details){
        foreach ($form_details as $info) {
          $data['application_id'] = $application_id;
          $data['organization_id'] = $organization_id;
          $data['copy_title'] = $info->copy_title;
          $data['org_name'] = $info->org_name;
          $data['org_address'] = $info->org_address;
          $data['appl_address'] = $info->appl_address;
          $data['appl_name'] = $info->appl_name;
          $data['nationality'] = $info->nationality;
          $data['work1'] = $info->work1;
          $data['work2'] = $info->work2;
          $data['work3'] = $info->work3;
          $data['work4'] = $info->work4;
          $data['work5'] = $info->work5;
          $data['work6'] = $info->work6;
          $data['right1'] = $info->right1;
          $data['right2'] = $info->right2;
          $data['pro_containt1'] = $info->pro_containt1;
          $data['pro_containt2'] = $info->pro_containt2;
          $data['appl_age'] = $info->appl_age;
          $data['appl_details'] = $info->appl_details;
          $data['language'] = $info->language;
          $data['public_date'] = $info->public_date;
          $data['countries'] = $info->countries;
          $data['subject_matter'] = $info->subject_matter;
          $data['date'] = $info->date;
          $data['place'] = $info->place;
        }

        $this->load->view('Include/head', $data);
        $this->load->view('Include/navbar', $data);
        $this->load->view('Transaction/copyright_step1', $data);
        $this->load->view('Include/footer', $data);
      }
      else{
        header('location:'.base_url().'Transaction/application_list');
      }
  }

// Save Copyright... Update Row...
  public function save_copyright(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($user_id == null ){ header('location:'.base_url().'User'); }
    $organization_id = $this->session->userdata('organization_id');
    $application_id = $this->session->userdata('application_id');

    $work1 = $this->input->post('work1');
    $work2 = $this->input->post('work2');
    $work3 = $this->input->post('work3');
    $work4 = $this->input->post('work4');
    $work5 = $this->input->post('work5');
    $work6 = $this->input->post('work6');
    $right1 = $this->input->post('right1');
    $right2 = $this->input->post('right2');
    $pro_containt1 = $this->input->post('pro_containt1');
    $pro_containt2 = $this->input->post('pro_containt2');
    if(!isset($work1))( $work1 = '');
    if(!isset($work2))( $work2 = '');
    if(!isset($work3))( $work3 = '');
    if(!isset($work4))( $work4 = '');
    if(!isset($work5))( $work5 = '');
    if(!isset($work6))( $work6 = '');
    if(!isset($right1))( $right1 = '');
    if(!isset($right2))( $right2 = '');
    if(!isset($pro_containt1))( $pro_containt1 = '');
    if(!isset($pro_containt2))( $pro_containt2 = '');

    $update_data = array(
      'copy_title' => $this->input->post('copy_title'),
      'org_name' => $this->input->post('org_name'),
      'org_address' => $this->input->post('org_address'),
      'appl_address' => $this->input->post('appl_address'),
      'appl_name' => $this->input->post('appl_name'),
      'nationality' => $this->input->post('nationality'),
      'appl_age' => $this->input->post('appl_age'),
      'appl_details' => $this->input->post('appl_details'),
      'language' => $this->input->post('language'),
      'public_date' => $this->input->post('public_date'),
      'countries' => $this->input->post('countries'),
      'subject_matter' => $this->input->post('subject_matter'),
      'date' => $this->input->post('date'),
      'place' => $this->input->post('place'),
      'work1' => $work1,
      'work2' => $work2,
      'work3' => $work3,
      'work4' => $work4,
      'work5' => $work5,
      'work6' => $work6,
      'right1' => $right1,
      'right2' => $right2,
      'pro_containt1' => $pro_containt1,
      'pro_containt2' => $pro_containt2,
    );

    $this->User_Model->update_info('application_id', $application_id, 'law_copyright', $update_data);
    header('location:'.base_url().'Transaction/application_list');
  }

  public function process_step_two(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($user_id == null ){ header('location:'.base_url().'User'); }

    $organization_id = $this->session->userdata('organization_id');
    $application_id = $this->session->userdata('application_id');
    $application_details = $this->Transaction_Model->application_details($application_id);
    foreach ($application_details as $appl_details) {  }
    $service_name = $appl_details->service_name;
    $service_name = $appl_details->service_name;

    $payment_details = $this->Transaction_Model->get_payment_info($application_id);
    if(!$payment_details){ header('location:'.base_url().'Transaction/application_list');  }
    foreach ($payment_details as $info) {
      $data['application_id'] = $application_id;
      $data['organization_id'] = $organization_id;
      $data['title'] = $service_name;

      $data['payment_id'] = $info->payment_id;
      $data['CONTRACTAMOUNT'] = $info->CONTRACTAMOUNT;
      $data['GSTAMOUNT'] = $info->GSTAMOUNT;
      $data['TOTALAMOUNT'] = $info->TOTALAMOUNT;
      $data['RECEVIEDAMOUNT'] = $info->RECEVIEDAMOUNT;
      $data['BALANCEAMOUNT'] = $info->BALANCEAMOUNT;
      $data['GSTNUMBER'] = $info->GSTNUMBER;
      $data['LP_AMOUNT'] = $info->LP_AMOUNT;
      $data['GOVT_FEES'] = $info->GOVT_FEES;
      $data['TDS'] = $info->TDS;
      $data['B2B'] = $info->B2B;
      $data['PAYMENTMODE_0'] = $info->PAYMENTMODE_0;
      $data['PAYMENTMODE_1'] = $info->PAYMENTMODE_1;
      $data['CHEQUENUMBER'] = $info->CHEQUENUMBER;
      $data['CHQDATE'] = $info->CHQDATE;
      $data['BANKNAME'] = $info->BANKNAME;
      $data['CHEQUEAMOUNT'] = $info->CHEQUEAMOUNT;
      $data['GROUNDOFCONTRACT'] = $info->GROUNDOFCONTRACT;
    }

    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('Transaction/process_step2',$data);
    $this->load->view('Include/footer',$data);
  }

  public function save_process_step_two(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($user_id == null ){ header('location:'.base_url().'User'); }

      $application_id = $this->input->post('application_id');
      $organization_id = $this->input->post('organization_id');
      $payment_id = $this->input->post('payment_id');
      $application_details = $this->Transaction_Model->application_details($application_id);
      foreach ($application_details as $appl_details) {  }
      $service_name = $appl_details->service_name;
      $service_id = $appl_details->service_id;

      $PAYMENTMODE_0 = $this->input->post('PAYMENTMODE_0');
      $PAYMENTMODE_1 = $this->input->post('PAYMENTMODE_1');

      if(!isset($PAYMENTMODE_0))( $PAYMENTMODE_0 = '');
      if(!isset($PAYMENTMODE_1))( $PAYMENTMODE_1 = '');

      $uodate_data['CONTRACTAMOUNT'] = $this->input->post('CONTRACTAMOUNT');
      $uodate_data['GSTAMOUNT'] = $this->input->post('GSTAMOUNT');
      $uodate_data['TOTALAMOUNT'] = $this->input->post('TOTALAMOUNT');
      $uodate_data['RECEVIEDAMOUNT'] = $this->input->post('RECEVIEDAMOUNT');
      $uodate_data['BALANCEAMOUNT'] = $this->input->post('BALANCEAMOUNT');
      $uodate_data['LP_AMOUNT'] = $this->input->post('LP_AMOUNT');
      $uodate_data['GOVT_FEES'] = $this->input->post('GOVT_FEES');
      $uodate_data['TDS'] = $this->input->post('TDS');
      $uodate_data['B2B'] = $this->input->post('B2B');
      $uodate_data['GSTNUMBER'] = $this->input->post('GSTNUMBER');
      $uodate_data['PAYMENTMODE_0'] = $PAYMENTMODE_0;
      $uodate_data['PAYMENTMODE_1'] = $PAYMENTMODE_1;
      $uodate_data['CHEQUENUMBER'] = $this->input->post('CHEQUENUMBER');
      $uodate_data['CHQDATE'] = $this->input->post('CHQDATE');
      $uodate_data['BANKNAME'] = $this->input->post('BANKNAME');
      $uodate_data['CHEQUEAMOUNT'] = $this->input->post('CHEQUEAMOUNT');
      $uodate_data['GROUNDOFCONTRACT'] = $this->input->post('GROUNDOFCONTRACT');
      $uodate_data['payment_date'] = date('d-m-Y');
      $uodate_data['is_master'] = 1;

      $this->User_Model->update_info('payment_id', $payment_id, 'law_payment', $uodate_data);
      $app_data['application_status'] = 'In Process';
      $this->User_Model->update_info('application_id', $application_id, 'law_application', $app_data);

      if($service_id == 1){
        header('location:'.base_url().'Transaction/trade_mark_step_one');
      }
      elseif ($service_id == 2) {
        header('location:'.base_url().'Transaction/copyright_step_one');
      } else{
        header('location:'.base_url().'Transaction/other_service_step_one');
      }
      //header('location:'.base_url().'Transaction/application_list');
      // header('location:'.base_url().'Transaction/document_uploading_form/'.$application_id);
      // header('location:'.base_url().'Transaction/sale_invoice_list');
  }

/**************************** Othjer Services ****************************/
  public function other_service_step_one(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($user_id == null ){ header('location:'.base_url().'User'); }

    $organization_id = $this->session->userdata('organization_id');
    $application_id = $this->session->userdata('application_id');
    $application_details = $this->Transaction_Model->application_details($application_id);
    foreach ($application_details as $appl_details) {  }
    $service_name = $appl_details->service_name;

    $form_details = $this->User_Model->get_info('application_id', $application_id, 'law_otherservice');

    if(!$form_details){ header('location:'.base_url().'Transaction/application_list'); }
      foreach ($form_details as $info) {
        $data['application_id'] = $application_id;
        $data['organization_id'] = $organization_id;
        $data['title'] = $service_name;

        $data['appl_org_name'] = $info->appl_org_name;
        $data['org_address'] = $info->org_address;
        $data['appl_address'] = $info->appl_address;
        $data['appl_conatct'] = $info->appl_conatct;
        $data['appl_email'] = $info->appl_email;
        $data['title_of_work'] = $info->title_of_work;
        $data['req_details'] = $info->req_details;
        $data['other_date'] = $info->other_date;
        $data['other_place'] = $info->other_place;
      }

    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('Transaction/other_service_step1',$data);
    $this->load->view('Include/footer',$data);
  }

  // Save Other Services... Update Row...
  public function save_other_service(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($user_id == null ){ header('location:'.base_url().'User'); }

    $organization_id = $this->session->userdata('organization_id');
    $application_id = $this->session->userdata('application_id');
    $update_data = array(
      'appl_org_name' => $this->input->post('appl_org_name'),
      'org_address' => $this->input->post('org_address'),
      'appl_address' => $this->input->post('appl_address'),
      'appl_conatct' => $this->input->post('appl_conatct'),
      'appl_email' => $this->input->post('appl_email'),
      'title_of_work' => $this->input->post('title_of_work'),
      'req_details' => $this->input->post('req_details'),
      'other_date' => $this->input->post('other_date'),
      'other_place' => $this->input->post('other_place'),
    );
    $this->User_Model->update_info('application_id', $application_id, 'law_otherservice', $update_data);
    header('location:'.base_url().'Transaction/application_list');
    // header('location:'.base_url().'Transaction/process_step_two');
  }


  public function document_uploading_form($application_id){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($user_id == null ){ header('location:'.base_url().'User'); }
    $application_details = $this->Transaction_Model->application_details($application_id);
    if(!$application_details){ header('location:'.base_url().'Transaction/application_list'); }
    foreach ($application_details as $details) {
      $data['application_id'] = $application_id;
      $data['application_date'] = $details->application_date;
      $data['branch_name'] = $details->branch_name;
      $data['service_name'] = $details->service_name;
      $data['organization_name'] = $details->organization_name;
      $data['service_id'] = $details->service_id;
      $data['service_document'] = $details->service_document;
      $data['application_status'] = $details->application_status;
      $data['alert_days'] = $details->alert_days;
      $data['prn_no'] = $details->prn_no;
      $data['prn_date'] = $details->prn_date;
    }

    // echo $data['application_date'];
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('Transaction/document_uploading',$data);
    $this->load->view('Include/footer',$data);
  }

  public function save_document_upload(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($user_id == null ){ header('location:'.base_url().'User'); }
    $application_id = $this->input->post('application_id');
    $update_data = array(
      'alert_days' => $this->input->post('alert_days'),
      'prn_no' => $this->input->post('prn_no'),
      'prn_date' => $this->input->post('prn_date'),
      'application_status' => $this->input->post('application_status'),
    );
    // echo $application_id;
    $this->User_Model->update_info('application_id', $application_id, 'law_application', $update_data);

    if(isset($_FILES['doc_name']['name'])){
      $this->load->library('upload');
      $files = $_FILES;
      $cpt = count($_FILES['doc_name']['name']);
      for($i=0; $i<$cpt; $i++)
      {
        $doc_type = $_POST['doc_type'][$i];
        $j = $i+1;
        $time = time();
        $image_name = 'doc_'.$application_id.'_'.$j.'_'.$time;
          $_FILES['doc_name']['name']= $files['doc_name']['name'][$i];
          $_FILES['doc_name']['type']= $files['doc_name']['type'][$i];
          $_FILES['doc_name']['tmp_name']= $files['doc_name']['tmp_name'][$i];
          $_FILES['doc_name']['error']= $files['doc_name']['error'][$i];
          $_FILES['doc_name']['size']= $files['doc_name']['size'][$i];
          $config['upload_path'] = 'assets/images/document/';
          $config['allowed_types'] = 'gif|jpg|png';
          $config['file_name'] = $image_name;
          $config['overwrite']     = FALSE;
          $filename = $files['doc_name']['name'][$i];
          $ext = pathinfo($filename, PATHINFO_EXTENSION);
          $this->upload->initialize($config);
          if($this->upload->do_upload('doc_name')){
            $this->Transaction_Model->delete_doc_up_stat($application_id,$doc_type);
            $file_data['doc_type'] = $doc_type;
            $file_data['doc_name'] = $image_name.'.'.$ext;
            $file_data['application_id'] = $application_id;
            $file_data['doc_status'] = 1;
            $this->User_Model->save_data('law_doc_upload', $file_data);
          }
          else{
            $this->Transaction_Model->delete_doc_up_stat($application_id,$doc_type);
            $file_data['doc_type'] = $doc_type;
            $file_data['application_id'] = $application_id;
            $file_data['doc_name'] = '';
            $file_data['doc_status'] = 0;
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('status',$this->upload->display_errors());
            $this->User_Model->save_data('law_doc_upload', $file_data);
          }
      }
    }
    header('location:'.base_url().'Transaction/application_list');
  }

  public function change_status($application_id){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($user_id == null ){ header('location:'.base_url().'User'); }
    $application_details = $this->Transaction_Model->application_details($application_id);
    if(!$application_details){ header('location:'.base_url().'Transaction/application_list'); }
    foreach ($application_details as $details) {
      $data['application_id'] = $application_id;
      $data['application_date'] = $details->application_date;
      $data['branch_name'] = $details->branch_name;
      $data['service_name'] = $details->service_name;
      $data['organization_name'] = $details->organization_name;
      $data['service_id'] = $details->service_id;
      $data['service_document'] = $details->service_document;
      $data['application_status'] = $details->application_status;
      $data['alert_days'] = $details->alert_days;
      $data['prn_no'] = $details->prn_no;
      $data['prn_date'] = $details->prn_date;
      $data['change_status'] = 'yes';
    }

    // echo $data['application_date'];
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('Transaction/document_uploading',$data);
    $this->load->view('Include/footer',$data);
  }

  public function update_status(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($user_id == null ){ header('location:'.base_url().'User'); }
    $application_id = $this->input->post('application_id');
    $complete_status = $this->input->post('complete_status');
    if(!isset($complete_status)){
      $update_data = array(
        'application_status' => 'Filed Application',
      );
    } else{
      $update_data = array(
        'application_status' => 'Application Closed',
      );
    }


    $this->User_Model->update_info('application_id', $application_id, 'law_application', $update_data);
    header('location:'.base_url().'Transaction/application_list');
  }

/************************** Add Work Details ********************/

  public function add_work_details(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($user_id == null ){ header('location:'.base_url().'User'); }
    $data['vc_no'] = $this->Transaction_Model->get_count_no2('vc_no','law_workdetails');
    $data['company_list'] = $this->User_Model->get_list2('company_id','ASC','law_company');

    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('Transaction/add_work_details',$data);
    $this->load->view('Include/footer',$data);
  }

  public function save_work_details(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($user_id == null ){ header('location:'.base_url().'User'); }
      $save_data = array(
        'vc_no' => $this->input->post('vc_no'),
        'work_date' => $this->input->post('work_date'),
        'company_id' => $this->input->post('company_id'),
        'branch_id' => $this->input->post('branch_id'),
        'manager_id' => $this->input->post('manager_id'),
        'party_name' => $this->input->post('party_name'),
        'party_address' => $this->input->post('party_address'),
        'party_con1' => $this->input->post('party_con1'),
        'party_con2' => $this->input->post('party_con2'),
        'req_details' => $this->input->post('req_details'),
        'work_date2' => $this->input->post('work_date2'),
        'work_place' => $this->input->post('work_place'),
        'work_addedby' => $user_id,
      );
      $work_id = $this->User_Model->save_data('law_workdetails', $save_data);
      if($work_id){
        $this->load->library('upload');
        $files = $_FILES;
        $cpt = count($_FILES['doc_name']['name']);
        for($i=0; $i<$cpt; $i++)
        {
          $j = $i+1;
          $time = time();
          $image_name = 'work_'.$work_id.'_'.$j;
            $_FILES['doc_name']['name']= $files['doc_name']['name'][$i];
            $_FILES['doc_name']['type']= $files['doc_name']['type'][$i];
            $_FILES['doc_name']['tmp_name']= $files['doc_name']['tmp_name'][$i];
            $_FILES['doc_name']['error']= $files['doc_name']['error'][$i];
            $_FILES['doc_name']['size']= $files['doc_name']['size'][$i];
            $config['upload_path'] = 'assets/images/work_details/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = $image_name;
            $config['overwrite']     = FALSE;
            $filename = $files['doc_name']['name'][$i];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $this->upload->initialize($config);
            if($this->upload->do_upload('doc_name')){
              $file_data['work_doc_name'] = $image_name.'.'.$ext;
              $file_data['work_id'] = $work_id;
              $this->User_Model->save_data('law_workdetails_doc', $file_data);
            }
            else{
              $error = $this->upload->display_errors();
              $this->session->set_flashdata('status',$this->upload->display_errors());
            }
        }
      }
      header('location:'.base_url().'Transaction/work_details_list');
  }
  // Work Details List...
  public function work_details_list(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($user_id == null ){ header('location:'.base_url().'User'); }

    $data['work_list'] = $this->User_Model->get_list2('work_id','ASC','law_workdetails');
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('Transaction/work_details_list',$data);
    $this->load->view('Include/footer',$data);
  }
  // Edit Work Details...
  public function edit_work_details($work_id){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($user_id == null ){ header('location:'.base_url().'User'); }
    $data['company_list'] = $this->User_Model->get_list2('company_id','ASC','law_company');

    $work_details = $this->Transaction_Model->get_work_details($work_id);
    if(!$work_details){ header('location:'.base_url().'Transaction/work_details_list'); }
    foreach ($work_details as $details) {
      $data['update'] = 'update';
      $data['work_id'] = $work_id;
      $data['vc_no'] = $details->vc_no;
      $data['work_date'] = $details->work_date;
      $data['company_id'] = $details->company_id;
      $data['company_name'] = $details->company_name;
      $data['branch_id'] = $details->branch_id;
      $data['branch_name'] = $details->branch_name;
      $data['manager_id'] = $details->manager_id;
      $data['manager_name'] = $details->user_name.' '.$details->user_lastname;
      $data['party_name'] = $details->party_name;
      $data['party_address'] = $details->party_address;
      $data['party_con1'] = $details->party_con1;
      $data['party_con2'] = $details->party_con2;
      $data['req_details'] = $details->req_details;
      $data['work_date2'] = $details->work_date2;
      $data['work_place'] = $details->work_place;
    }

    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('Transaction/add_work_details',$data);
    $this->load->view('Include/footer',$data);
  }
  // Update Work Details...
  public function update_work_details(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($user_id == null ){ header('location:'.base_url().'User'); }
    $work_id = $this->input->post('work_id');
    $file_count = $this->input->post('file_count');
    $update_data = array(
      'work_date' => $this->input->post('work_date'),
      'company_id' => $this->input->post('company_id'),
      'branch_id' => $this->input->post('branch_id'),
      'manager_id' => $this->input->post('manager_id'),
      'party_name' => $this->input->post('party_name'),
      'party_address' => $this->input->post('party_address'),
      'party_con1' => $this->input->post('party_con1'),
      'party_con2' => $this->input->post('party_con2'),
      'req_details' => $this->input->post('req_details'),
      'work_date2' => $this->input->post('work_date2'),
      'work_place' => $this->input->post('work_place'),
      'work_addedby' => $user_id,
    );
    $this->User_Model->update_info('work_id', $work_id, 'law_workdetails', $update_data);
    $this->User_Model->delete_info('work_id', $work_id, 'law_workdetails_doc');
    foreach($_POST['input'] as $user){
      $user['work_id'] = $work_id;
      $this->db->insert('law_workdetails_doc', $user);
    }

    if(isset($_FILES['doc_name']['name'])){
      $this->load->library('upload');
      $files = $_FILES;
      $cpt = count($_FILES['doc_name']['name']);
      for($i=0; $i<$cpt; $i++)
      {
        $j = $i+1;
        $time = time();
        $image_name = 'work_'.$work_id.'_'.$time.'_'.$j;
        $_FILES['doc_name']['name']= $files['doc_name']['name'][$i];
        $_FILES['doc_name']['type']= $files['doc_name']['type'][$i];
        $_FILES['doc_name']['tmp_name']= $files['doc_name']['tmp_name'][$i];
        $_FILES['doc_name']['error']= $files['doc_name']['error'][$i];
        $_FILES['doc_name']['size']= $files['doc_name']['size'][$i];
        $config['upload_path'] = 'assets/images/work_details/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = $image_name;
        $config['overwrite']     = FALSE;
        $filename = $files['doc_name']['name'][$i];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $this->upload->initialize($config);
        if($this->upload->do_upload('doc_name')){
          $file_data['work_doc_name'] = $image_name.'.'.$ext;
          $file_data['work_id'] = $work_id;
          $this->User_Model->save_data('law_workdetails_doc', $file_data);
        }
        else{
          $error = $this->upload->display_errors();
          $this->session->set_flashdata('status',$this->upload->display_errors());
        }
      }
    }
    header('location:'.base_url().'Transaction/work_details_list');
  }

  public function delete_work_details(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($user_id == null ){ header('location:'.base_url().'User'); }
    $work_id = $this->input->post('work_id');
    $this->User_Model->delete_info('work_id', $work_id, 'law_workdetails');
    $this->User_Model->delete_info('work_id', $work_id, 'law_workdetails_doc');
    header('location:'.base_url().'Transaction/work_details_list');
  }

/********************************* Sale Invoice **************************/

  public function sale_invoice($application_id){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($user_id == null ){ header('location:'.base_url().'User'); }

    $application_details = $this->Transaction_Model->application_details($application_id);
    if(!$application_details){ header('location:'.base_url().'Transaction/application_list'); }
    foreach ($application_details as $details) {
      $data['company_name'] = $details->company_name;
      $data['company_id'] = $details->company_id;
      $data['branch_name'] = $details->branch_name;
      $data['branch_id'] = $details->branch_id;
    }
    $company_id2 = $details->company_id;
    $service_id = $details->service_id;
    if($service_id == 1){ $tbl_name = 'law_trademark'; }
    elseif ($service_id == 2) { $tbl_name = 'law_copyright'; }
    else{ $tbl_name = 'law_otherservice'; }
    $sevice_wise_appl_details = $this->Transaction_Model->sevice_wise_appl_details($application_id,$tbl_name);
    if(!$sevice_wise_appl_details){ header('location:'.base_url().'Transaction/application_list'); }
    if($service_id == 1){
      $data['party'] = $sevice_wise_appl_details[0]['ORGANIZATION'];
      $data['party_address'] = $sevice_wise_appl_details[0]['FIRMADDRESS'];
    }
    elseif ($service_id == 2) {
      $data['party'] = $sevice_wise_appl_details[0]['org_name'];
      $data['party_address'] = $sevice_wise_appl_details[0]['org_address'];
    }
    else{
      $data['party'] = $sevice_wise_appl_details[0]['appl_org_name'];
      $data['party_address'] = $sevice_wise_appl_details[0]['org_address'];
    }
    $data['invoice_no'] = $this->Transaction_Model->get_count_no3($company_id2,'invoice_no','law_invoice');
    $advance_amount = $this->Transaction_Model->get_advance_amt($application_id,'law_payment');
    $data['adv_amt'] = $advance_amount;
    $data['application_id'] = $application_id;
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('Transaction/sale_invoice',$data);
    $this->load->view('Include/footer',$data);
  }

  public function sale_invoice_list(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($user_id == null ){ header('location:'.base_url().'User'); }

    $data['sale_invoice_list'] = $this->Transaction_Model->sale_invoice_list();
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('Transaction/invoice_list',$data);
    $this->load->view('Include/footer',$data);
  }

  public function save_sale_invoice(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($user_id == null ){ header('location:'.base_url().'User'); }

    $save_data = array(
      'company_id' => $this->input->post('company_id'),
      'branch_id' => $this->input->post('branch_id'),
      'application_id' => $this->input->post('application_id'),
      'invoice_no' => $this->input->post('invoice_no'),
      'invoice_date' => $this->input->post('invoice_date'),
      'party' => $this->input->post('party'),
      'party_address' => $this->input->post('party_address'),
      'party_statecode' => $this->input->post('party_statecode'),
      'po_no' => $this->input->post('po_no'),
      'po_date' => $this->input->post('po_date'),
      'basic_amt' => $this->input->post('basic_amt'),
      'gov_fees_amt' => $this->input->post('gov_fees_amt'),
      'gst_amt' => $this->input->post('gst_amt'),
      'tds_amt' => $this->input->post('tds_amt'),
      'adv_amt' => $this->input->post('adv_amt'),
      'bal_amt' => $this->input->post('bal_amt'),
      'net_amt' => $this->input->post('net_amt'),
      'invoice_addedby' => $user_id,
    );

    $invoice_id = $this->User_Model->save_data('law_invoice', $save_data);
    foreach($_POST['input'] as $user){
      $user['invoice_id'] = $invoice_id;
      $this->db->insert('law_invoice_details', $user);
    }
    header('location:'.base_url().'Transaction/sale_invoice_list');
  }

  public function edit_invoice($invoice_id){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($user_id == null ){ header('location:'.base_url().'User'); }

    $invice_details = $this->Transaction_Model->invice_details($invoice_id);
    if(!$invice_details){ header('location:'.base_url().'Transaction/sale_invoice_list'); }
    foreach ($invice_details as $details) {
      $data['update'] = 'update';
      $data['invoice_id'] = $invoice_id;
      $data['application_id'] = $details->application_id;
      $data['company_id'] = $details->company_id;
      $data['company_name'] = $details->company_name;
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
      $data['gov_fees_amt'] = $details->gov_fees_amt;
      $data['gst_amt'] = $details->gst_amt;
      $data['tds_amt'] = $details->tds_amt;
      $data['adv_amt'] = $details->adv_amt;
      $data['bal_amt'] = $details->bal_amt;
      $data['net_amt'] = $details->net_amt;
    }
    $data['invoice_details_list'] = $this->Transaction_Model->invoice_details_list($invoice_id);
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('Transaction/sale_invoice',$data);
    $this->load->view('Include/footer',$data);
  }

  public function update_sale_invoice(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($user_id == null ){ header('location:'.base_url().'User'); }

    $invoice_id = $this->input->post('invoice_id');
    $invoice_data = array(
      'invoice_date' => $this->input->post('invoice_date'),
      'party' => $this->input->post('party'),
      'party_address' => $this->input->post('party_address'),
      'party_statecode' => $this->input->post('party_statecode'),
      'po_no' => $this->input->post('po_no'),
      'po_date' => $this->input->post('po_date'),
      'basic_amt' => $this->input->post('basic_amt'),
      'gov_fees_amt' => $this->input->post('gov_fees_amt'),
      'gst_amt' => $this->input->post('gst_amt'),
      'tds_amt' => $this->input->post('tds_amt'),
      'adv_amt' => $this->input->post('adv_amt'),
      'bal_amt' => $this->input->post('bal_amt'),
      'net_amt' => $this->input->post('net_amt'),
      'invoice_addedby' => $user_id,
    );
    $this->User_Model->update_info('invoice_id', $invoice_id, 'law_invoice', $invoice_data);
    foreach($_POST['input'] as $user){
      if(isset($user['invoice_details_id'])){
        $invoice_details_id = $user['invoice_details_id'];
        if(!isset($user['descr'])){
          $this->User_Model->delete_info('invoice_details_id', $invoice_details_id, 'law_invoice_details');
        }else{
            $this->User_Model->update_info('invoice_details_id', $invoice_details_id, 'law_invoice_details', $user);
        }
      }
      else{
        $user['invoice_id'] = $invoice_id;
        $this->db->insert('law_invoice_details', $user);
      }
    }
    header('location:'.base_url().'Transaction/sale_invoice_list');
  }

  // Delete Invoice...
  public function delete_invoice($invoice_id){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($user_id == null ){ header('location:'.base_url().'User'); }
      $this->User_Model->delete_info('invoice_id', $invoice_id, 'law_invoice');
        $this->User_Model->delete_info('invoice_id', $invoice_id, 'law_invoice_details');
      header('location:'.base_url().'Transaction/sale_invoice_list');
  }

  /************************ Receipt Payment **********************/
  public function add_receipt(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($user_id == null ){ header('location:'.base_url().'User'); }
    $this->form_validation->set_rules('RECEVIEDAMOUNT', 'Received Amount', 'trim|required');
    if($this->form_validation->run() != FALSE){
      $PAYMENTMODE_0 = $this->input->post('PAYMENTMODE_0');
      $PAYMENTMODE_1 = $this->input->post('PAYMENTMODE_1');
      if(!isset($PAYMENTMODE_0))( $PAYMENTMODE_0 = '');
      if(!isset($PAYMENTMODE_1))( $PAYMENTMODE_1 = '');

      $save_data['application_id'] = $this->input->post('application_id');
      $save_data['GSTAMOUNT'] = $this->input->post('GSTAMOUNT');
      $save_data['RECEVIEDAMOUNT'] = $this->input->post('RECEVIEDAMOUNT');
      $save_data['BALANCEAMOUNT'] = $this->input->post('BALANCEAMOUNT');
      $save_data['LP_AMOUNT'] = $this->input->post('LP_AMOUNT');
      $save_data['GOVT_FEES'] = $this->input->post('GOVT_FEES');
      $save_data['TDS'] = $this->input->post('TDS');
      $save_data['B2B'] = $this->input->post('B2B');
      $save_data['PAYMENTMODE_0'] = $PAYMENTMODE_0;
      $save_data['PAYMENTMODE_1'] = $PAYMENTMODE_1;
      $save_data['CHEQUENUMBER'] = $this->input->post('CHEQUENUMBER');
      $save_data['CHQDATE'] = $this->input->post('CHQDATE');
      $save_data['BANKNAME'] = $this->input->post('BANKNAME');
      $save_data['CHEQUEAMOUNT'] = $this->input->post('CHEQUEAMOUNT');
      $save_data['payment_date'] = date('d-m-Y');
      $this->User_Model->save_data('law_payment', $save_data);
      header('location:'.base_url().'Transaction/receipt_list');
    }
    $status = '';
    $data['application_list'] = $this->Transaction_Model->application_list($company_id,$status,'DESC');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Transaction/add_receipt', $data);
    $this->load->view('Include/footer', $data);
  }

  public function get_appl_amounts(){
    $application_id = $this->input->post('application_id');
    $payment_details = $this->Transaction_Model->get_payment_info($application_id);
    foreach ($payment_details as $p_details) {
      $contract_amount = $p_details->TOTALAMOUNT;
    }
    $pay_info = $this->Transaction_Model->get_payment_info_list($application_id);
    foreach ($pay_info as $pay_info) {
    }
    $outstanding_amount = $pay_info->BALANCEAMOUNT;
    // $received_amount = $this->Transaction_Model->get_received_amount($application_id);
    // $outstanding_amount = $contract_amount - $received_amount;


    $data['contract_amount'] = $contract_amount;
    $data['outstanding_amount'] = $outstanding_amount;
    echo json_encode($data);
  }

  public function receipt_list(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($user_id == null ){ header('location:'.base_url().'User'); }

    $data['receipt_list'] = $this->Transaction_Model->receipt_list();
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Transaction/receipt_list', $data);
    $this->load->view('Include/footer', $data);
  }

  public function edit_receipt($payment_id){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($user_id == null ){ header('location:'.base_url().'User'); }
    $payment_details = $this->User_Model->get_info('payment_id',$payment_id,'law_payment');
    if(!$payment_details){ header('location:'.base_url().'Transaction/application_list');  }
    foreach ($payment_details as $info) {
      $data['update'] = 'update';
      $data['application_id'] = $info->application_id;
      $data['payment_id'] = $info->payment_id;
      $data['GSTAMOUNT'] = $info->GSTAMOUNT;
      $data['TOTALAMOUNT'] = $info->TOTALAMOUNT;
      $data['RECEVIEDAMOUNT'] = $info->RECEVIEDAMOUNT;
      $data['BALANCEAMOUNT'] = $info->BALANCEAMOUNT;
      $data['LP_AMOUNT'] = $info->LP_AMOUNT;
      $data['GOVT_FEES'] = $info->GOVT_FEES;
      $data['TDS'] = $info->TDS;
      $data['B2B'] = $info->B2B;
      $data['PAYMENTMODE_0'] = $info->PAYMENTMODE_0;
      $data['PAYMENTMODE_1'] = $info->PAYMENTMODE_1;
      $data['CHEQUENUMBER'] = $info->CHEQUENUMBER;
      $data['CHQDATE'] = $info->CHQDATE;
      $data['BANKNAME'] = $info->BANKNAME;
      $data['CHEQUEAMOUNT'] = $info->CHEQUEAMOUNT;
    }
    $application_id = $info->application_id;
    $payment_details = $this->Transaction_Model->get_payment_info($application_id);
    foreach ($payment_details as $p_details) {
      $contract_amount = $p_details->TOTALAMOUNT;
    }
    $pay_info = $this->Transaction_Model->get_payment_info_list($application_id);
    foreach ($pay_info as $pay_info) {
    }
    $outstanding_amount = $pay_info->BALANCEAMOUNT;


    $this->form_validation->set_rules('RECEVIEDAMOUNT', 'Received Amount', 'trim|required');
    if($this->form_validation->run() != FALSE){
      $PAYMENTMODE_0 = $this->input->post('PAYMENTMODE_0');
      $PAYMENTMODE_1 = $this->input->post('PAYMENTMODE_1');
      if(!isset($PAYMENTMODE_0))( $PAYMENTMODE_0 = '');
      if(!isset($PAYMENTMODE_1))( $PAYMENTMODE_1 = '');

      $update_data['application_id'] = $this->input->post('application_id');
      $update_data['GSTAMOUNT'] = $this->input->post('GSTAMOUNT');
      $update_data['RECEVIEDAMOUNT'] = $this->input->post('RECEVIEDAMOUNT');
      $update_data['BALANCEAMOUNT'] = $this->input->post('BALANCEAMOUNT');
      $update_data['LP_AMOUNT'] = $this->input->post('LP_AMOUNT');
      $update_data['GOVT_FEES'] = $this->input->post('GOVT_FEES');
      $update_data['TDS'] = $this->input->post('TDS');
      $update_data['B2B'] = $this->input->post('B2B');
      $update_data['PAYMENTMODE_0'] = $PAYMENTMODE_0;
      $update_data['PAYMENTMODE_1'] = $PAYMENTMODE_1;
      $update_data['CHEQUENUMBER'] = $this->input->post('CHEQUENUMBER');
      $update_data['CHQDATE'] = $this->input->post('CHQDATE');
      $update_data['BANKNAME'] = $this->input->post('BANKNAME');
      $update_data['CHEQUEAMOUNT'] = $this->input->post('CHEQUEAMOUNT');
      $update_data['payment_date'] = date('d-m-Y');

      $this->User_Model->update_info('payment_id', $payment_id, 'law_payment', $update_data);
      header('location:'.base_url().'Transaction/receipt_list');
    }
    $data['contract_amount'] = $contract_amount;
    $data['outstanding_amount'] = $outstanding_amount;
    $status = '';
    $data['application_list'] = $this->Transaction_Model->application_list($company_id,$status,'DESC');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Transaction/add_receipt', $data);
    $this->load->view('Include/footer', $data);
  }

  // Delete Service...
  public function delete_receipt($payment_id){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($user_id == null ){ header('location:'.base_url().'User'); }
    $this->User_Model->delete_info('payment_id', $payment_id, 'law_payment');
    header('location:'.base_url().'Transaction/receipt_list');
  }


  /************ Printing List ******************/
  public function printing_list(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $status = "In Process";
      $data['application_list'] = $this->Transaction_Model->trade_mark_print_list($company_id,$status,'DESC');
      // echo print_r($data['application_list']);
      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('Transaction/printing_list', $data);
      $this->load->view('Include/footer', $data);
    } else{
      header('location:'.base_url().'User');
    }
  }
}
