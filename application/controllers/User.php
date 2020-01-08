<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{
  public function __construct(){
    parent::__construct();
    $this->load->model('User_Model');
    $this->load->model('Transaction_Model');
  }

  public function logout(){
    $this->session->sess_destroy();
    header('location:'.base_url().'User');
  }

  public function change_password(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if(!$user_id){ header('location:'.base_url().'User'); }
    $this->form_validation->set_rules('old_password', 'Old Password', 'trim|required');
    $this->form_validation->set_rules('new_password', 'New Password', 'trim|required');
    if($this->form_validation->run() != FALSE){
      $old_password = $this->input->post('old_password');
      $new_password = $this->input->post('new_password');
      $check_pwd = $this->User_Model->check_pwd($user_id,$old_password);
      if($check_pwd){
        $data['user_password'] = $new_password;
        $this->User_Model->update_info('user_id', $user_id, 'law_user', $data);
        $this->session->set_flashdata('change_password','success');
        header('location:'.base_url().'User/dashboard');
      } else{
        $this->session->set_flashdata('change_password','error');
      }
    }
    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('User/change_password');
    $this->load->view('Include/footer');
  }

  public function index(){
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');
    if ($this->form_validation->run() == FALSE) {
    	$this->load->view('User/login');
    }
    else{
      $email = $this->input->post('email');
      $password = $this->input->post('password');

      $login = $this->User_Model->check_login($email, $password);
      if($login == null){
        $this->session->set_flashdata('msg','login_error');
        header('location:'.base_url().'User');
      }
      else{
        foreach ($login as $login){
          $this->session->set_userdata('law_user_id', $login['user_id']);
          $user_id = $login['user_id'];
          $user_name = $login['user_name'].' '.$login['user_lastname'];
          $email = $login['user_email'];
          $roll_id2 = $login['roll_id'];
        }

        $otp = mt_rand(100000, 999999);
        $data['user_otp'] = $otp;
        $this->User_Model->update_info('user_id', $user_id, 'law_user', $data);
        $ip = $this->input->ip_address();
        $this->load->library('user_agent');
        $browser =  $this->agent->browser();
        $date = date('d-m-Y');
        $time = date("h:i:sA");

        // $from_email = $email;
        $from_email = 'info@lawprotectorsipr.in';
  		$formcontent='
  		 <p style="color:#698291; font-weight: normal; margin: 0; padding: 0; line-height: 20px; font-size: 16px;font-family: Georgia, serif; ">
  		 New Login Requert
  		 </p>
  		 <hr>
  		 <p style="color:#698291; font-weight: normal; margin: 0; padding: 0; line-height: 20px; font-size: 16px;font-family: Times, serif; ">
  		 Name of User:  '.$user_name.'
  		 </p>
  		 <p style="color:#698291; font-weight: normal; margin: 0; padding: 0; line-height: 20px; font-size: 16px;font-family: Times, serif; ">
  		 IP Address: '.$ip.'
  		 </p>
         <p style="color:#698291; font-weight: normal; margin: 0; padding: 0; line-height: 20px; font-size: 16px;font-family: Times, serif; ">
  			 Browser Name: '.$browser.'
  			 </p>
         <p style="color:#698291; font-weight: normal; margin: 0; padding: 0; line-height: 20px; font-size: 16px;font-family: Times, serif; ">
  			 OTP Code : '.$otp.'
  			 </p>
         <p style="color:#698291; font-weight: normal; margin: 0; padding: 0; line-height: 20px; font-size: 16px;font-family: Times, serif; ">
  			 Login Attempt Date and Time : '.$date.' '.$time.'
  			 </p>
  		 ';
      if($roll_id2 == 1){
        $recipient = "lawprotectors.rm@gmail.com,md.lawprotectors@gmail.com";
      } else{
        $recipient = "lawprotectors.login@gmail.com";
      }

  		$subject = 'Login Attemt By.'.$user_name;
  		$headers  = 'MIME-Version: 1.0' . "\r\n";
  		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  		$headers .= 'From: '.$from_email."\r\n".
  								'Reply-To: '.$from_email."\r\n" .
  								'X-Mailer: PHP/' . phpversion();
  		$send = mail($recipient, $subject, $formcontent, $headers);
  		if($send){
  			$this->session->set_flashdata('send_email_error','success');
  		}
  		else{
  			$this->session->set_flashdata('send_email_success','error');
  		}
        header('location:'.base_url().'User/otp');
      }
    }
  }

  public function otp(){
    $this->form_validation->set_rules('otp', 'OTP', 'trim|required');
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('User/otp');
    }
    else{
      $otp = $this->input->post('otp');
      $user_id = $this->session->userdata('law_user_id');
      $check_otp = $this->User_Model->check_otp($otp, $user_id);
      if($check_otp == null){
        $this->session->set_flashdata('msg','otp_error');
        header('location:'.base_url().'User/otp');
      }
      else{
        foreach ($check_otp as $check_otp){
          $this->session->set_userdata('law_user_id', $check_otp['user_id']);
          $this->session->set_userdata('law_company_id', $check_otp['company_id']);
          $this->session->set_userdata('roll_id', $check_otp['roll_id']);
        }
        if($check_otp['roll_id'] == 6){
          header('location:'.base_url().'Legal/dashboard');
        } else{
          header('location:'.base_url().'User/dashboard');
        }

      }
    }
  }

  public function dashboard(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id && $user_id && ($roll_id == 1 || $roll_id == 5)){
      $key = '';
      $data['branch_count'] = $this->User_Model->get_count2('branch_id',$key,'law_branch');
      $data['comp_count'] = $this->User_Model->get_count2('company_id',$key,'law_company');
      $data['user_count'] = $this->User_Model->get_count2('user_id',$key,'law_user');
      $data['service_count'] = $this->User_Model->get_count2('service_id',$key,'law_service');
      $data['open_count'] = $this->User_Model->get_count2('application_id','Open','law_application');
      $data['pro_count'] = $this->User_Model->get_count2('application_id','In Process','law_application');
      $data['ready_count'] = $this->User_Model->get_count2('application_id','Ready To File','law_application');
      $data['filled_count'] = $this->User_Model->get_count2('application_id','Filed Application','law_application');
      $data['closed_count'] = $this->User_Model->get_count2('application_id','Application Closed','law_application');
      $data['invoice_count'] = $this->User_Model->get_count2('invoice_id',$key,'law_invoice');

      $data['service_count_list'] = $this->User_Model->service_list_count();
      $data['service_list'] = $this->User_Model->get_list2('service_id','ASC','law_service');
      $data['page'] = 'dashboard';

      // $data['status_list'] = $this->User_Model->status_list_count();
      // echo print_r($data['service_list']);
      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('User/dashboard', $data);
      $this->load->view('Include/footer', $data);
    } elseif ($company_id && $user_id && ($roll_id == 2 || $roll_id == 3 || $roll_id == 4)) {
      $key = '';
      $data['branch_count'] = $this->User_Model->get_count2('branch_id',$key,'law_branch');
      $data['comp_count'] = $this->User_Model->get_count2('company_id',$key,'law_company');
      $data['user_count'] = $this->User_Model->get_count2('user_id',$key,'law_user');
      $data['service_count'] = $this->User_Model->get_count2('service_id',$key,'law_service');
      $data['open_count'] = $this->User_Model->get_count2('application_id','Open','law_application');
      $data['pro_count'] = $this->User_Model->get_count2('application_id','In Process','law_application');
      $data['ready_count'] = $this->User_Model->get_count2('application_id','Ready To File','law_application');
      $data['filled_count'] = $this->User_Model->get_count2('application_id','Filed Application','law_application');
      $data['closed_count'] = $this->User_Model->get_count2('application_id','Application Closed','law_application');
      $data['invoice_count'] = $this->User_Model->get_count2('invoice_id',$key,'law_invoice');


      $data['service_count_list'] = $this->User_Model->service_list_count_user($roll_id,$user_id);

      $data['service_list'] = $this->User_Model->get_list2('service_id','ASC','law_service');
      $data['page'] = 'dashboard';

      // $data['status_list'] = $this->User_Model->status_list_count();
      // echo print_r($data['service_list']);
      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('User/user_dashboard', $data);
      $this->load->view('Include/footer', $data);
    }
    else{
      // header('location:'.base_url().'User');
    }
  }

  /***************************** Company Information ************************/
  // Company list...
  public function company_information_list(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $data['company_list'] = $this->User_Model->get_list2('company_id','ASC','law_company');
      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('User/company_information_list', $data);
      $this->load->view('Include/footer', $data);
    } else{
      header('location:'.base_url().'User');
    }
  }
  // Edit Company...
  public function edit_company($company_id2){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){

      $company_info = $this->User_Model->get_info('company_id', $company_id2, 'law_company');
      if($company_info){
        foreach($company_info as $info){
          $data['update'] = 'update';
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
          $data['company_lic1'] = $info->company_lic1;
          $data['company_lic2'] = $info->company_lic2;
          $data['company_start_date'] = $info->company_start_date;
          $data['company_end_date'] = $info->company_end_date;
        }
        $this->load->view('Include/head', $data);
        $this->load->view('Include/navbar', $data);
        $this->load->view('User/company_information', $data);
        $this->load->view('Include/footer', $data);
      }
    } else{
      header('location:'.base_url().'User');
    }
  }
  // Update Company...
  public function update_company(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $company_id2 = $this->input->post('company_id');
      $data = array(
        'company_name' => $this->input->post('company_name'),
        'company_address' => $this->input->post('company_address'),
        'company_city' => $this->input->post('company_city'),
        'company_state' => $this->input->post('company_state'),
        'company_district' => $this->input->post('company_district'),
        'company_statecode' => $this->input->post('company_statecode'),
        'company_mob1' => $this->input->post('company_mob1'),
        'company_mob2' => $this->input->post('company_mob2'),
        'company_email' => $this->input->post('company_email'),
        'company_website' => $this->input->post('company_website'),
        'company_pan_no' => $this->input->post('company_pan_no'),
        'company_gst_no' => $this->input->post('company_gst_no'),
        'company_lic1' => $this->input->post('company_lic1'),
        'company_lic2' => $this->input->post('company_lic2'),
        'company_start_date' => $this->input->post('company_start_date'),
        'company_end_date' => $this->input->post('company_end_date'),
      );
      $this->User_Model->update_info('company_id', $company_id2, 'law_company', $data);
      header('location:'.base_url().'User/company_information_list');
    } else{
      header('location:'.base_url().'User');
    }
  }

  /******************************** Branch Information ****************************/
  // Add Branch...
  public function branch_information(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $data['company_list'] = $this->User_Model->get_list2('company_id','ASC','law_company');
      $data['user_roll'] = $roll_id;
      $this->load->view('Include/head',$data);
      $this->load->view('Include/navbar',$data);
      $this->load->view('User/branch_information',$data);
      $this->load->view('Include/footer',$data);
    } else{
      header('location:'.base_url().'User');
    }
  }
  // Bracnch List...
  public function branch_information_list(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $data['branch_list'] = $this->User_Model->get_list2('branch_id','ASC','law_branch');
      $data['user_roll'] = $roll_id;
      $this->load->view('Include/head',$data);
      $this->load->view('Include/navbar',$data);
      $this->load->view('User/branch_information_list',$data);
      $this->load->view('Include/footer',$data);
    } else{
      header('location:'.base_url().'User');
    }
  }
  // Save Branch...
  public function save_branch(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $data = array(
        'company_id' => $this->input->post('company_id'),
        'branch_name' => $this->input->post('branch_name'),
        'branch_bank' => $this->input->post('branch_bank'),
        'branch_b_branch' => $this->input->post('branch_b_branch'),
        'branch_acc_no' => $this->input->post('branch_acc_no'),
        'branch_ifsc' => $this->input->post('branch_ifsc'),
        'branch_addedby' => $user_id,
      );
      $this->User_Model->save_data('law_branch', $data);
      header('location:'.base_url().'User/branch_information_list');
    } else{
      header('location:'.base_url().'User');
    }
  }
  // Edit Branch...
  public function edit_branch($branch_id){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $branch_info = $this->User_Model->get_info('branch_id', $branch_id, 'law_branch');
      $data['company_list'] = $this->User_Model->get_list2('company_id','ASC','law_company');
      if($branch_info){
        foreach($branch_info as $info){
          $data['update'] = 'update';
          $data['branch_id'] = $info->branch_id;
          $data['company_id'] = $info->company_id;
          $data['branch_name'] = $info->branch_name;
          $data['branch_bank'] = $info->branch_bank;
          $data['branch_b_branch'] = $info->branch_b_branch;
          $data['branch_acc_no'] = $info->branch_acc_no;
          $data['branch_ifsc'] = $info->branch_ifsc;
          $data['branch_status'] = $info->branch_status;
        }
        $this->load->view('Include/head',$data);
        $this->load->view('Include/navbar',$data);
        $this->load->view('User/branch_information',$data);
        $this->load->view('Include/footer',$data);
      }
    } else{
      header('location:'.base_url().'User');
    }
  }
  // Update Branch...
  public function update_brach(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $branch_id = $this->input->post('branch_id');
      $data = array(
        'company_id' => $this->input->post('company_id'),
        'branch_name' => $this->input->post('branch_name'),
        'branch_bank' => $this->input->post('branch_bank'),
        'branch_b_branch' => $this->input->post('branch_b_branch'),
        'branch_acc_no' => $this->input->post('branch_acc_no'),
        'branch_ifsc' => $this->input->post('branch_ifsc'),
        'branch_addedby' => $user_id,
      );
      $this->User_Model->update_info('branch_id', $branch_id, 'law_branch', $data);
      header('location:'.base_url().'User/branch_information_list');
    } else{
      header('location:'.base_url().'User');
    }
  }
  // Update Branch...
  public function delete_branch($branch_id){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $this->User_Model->delete_info('branch_id', $branch_id, 'law_branch');
      header('location:'.base_url().'User/branch_information_list');
    } else{
      header('location:'.base_url().'User');
    }
  }

  /**************************** Service Information **********************/
  // Add Service...
  public function service_information(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('User/service_information');
      $this->load->view('Include/footer');
    } else{
      header('location:'.base_url().'User');
    }
  }
  // Service List...
  public function service_information_list(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($user_id){
      $data['service_list'] = $this->User_Model->get_list2('service_id','ASC','law_service');
      $this->load->view('Include/head',$data);
      $this->load->view('Include/navbar',$data);
      $this->load->view('User/service_information_list',$data);
      $this->load->view('Include/footer',$data);
    } else{
      header('location:'.base_url().'User');
    }
  }

  // Save Service...
  public function save_service(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $document = '';
      foreach($_POST['input'] as $data){
        $document = $document.''.$data['document'].',';
      }
      // echo $doc;
      $data = array(
        'company_id' => $company_id,
        'service_name' => $this->input->post('service_name'),
        'service_alert_days' => $this->input->post('service_alert_days'),
        'service_document' => $document,
      );
      $this->User_Model->save_data('law_service', $data);
      header('location:'.base_url().'User/service_information_list');
    } else{
      header('location:'.base_url().'User');
    }
  }
  // Edit Service...
  public function edit_service($service_id){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $service_info = $this->User_Model->get_info('service_id', $service_id, 'law_service');
      if($service_info){
        foreach($service_info as $info){
          $data['update'] = 'update';
          $data['service_id'] = $info->service_id;
          $data['service_name'] = $info->service_name;
          $data['service_name'] = $info->service_name;
          $data['service_alert_days'] = $info->service_alert_days;
          $data['service_document'] = $info->service_document;

        }
        $this->load->view('Include/head',$data);
        $this->load->view('Include/navbar',$data);
        $this->load->view('User/service_information',$data);
        $this->load->view('Include/footer',$data);
      }
    } else{
      header('location:'.base_url().'User');
    }
  }
  // Update Service...
  public function update_service(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $service_id = $this->input->post('service_id');
      $document = '';
      foreach($_POST['input'] as $data){
        $document = $document.''.$data['document'].',';
      }
      echo $document;
      $data = array(
        'service_name' => $this->input->post('service_name'),
        'service_alert_days' => $this->input->post('service_alert_days'),
        'service_document' => $document,
      );
      $this->User_Model->update_info('service_id', $service_id, 'law_service', $data);
      header('location:'.base_url().'User/service_information_list');
    } else{
      header('location:'.base_url().'User');
    }
  }
  // Delete Service...
  public function delete_service($service_id){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $this->User_Model->delete_info('service_id', $service_id, 'law_service');
      header('location:'.base_url().'User/service_information_list');
    } else{
      header('location:'.base_url().'User');
    }
  }

 // dhananjay....

 public function user_information(){
   $user_id = $this->session->userdata('law_user_id');
   $company_id = $this->session->userdata('law_company_id');
   $roll_id = $this->session->userdata('roll_id');
   if(!$company_id || !$user_id){ header('location:'.base_url().'User'); }
     $this->form_validation->set_rules('user_name', 'First Name', 'trim|required');
     $this->form_validation->set_rules('user_lastname', 'Last Name', 'trim|required');
     if ($this->form_validation->run() != FALSE) {
       $user_status = $this->input->post('user_status');
       if(!isset($user_status)){ $user_status = 'active'; }


       $branch_id = $this->input->post('branch_id');
       if($branch_id){  $branch = implode(", ", $branch_id); }
       else{ $branch = 0; }

       $save_data = array(
         'company_id' => $this->input->post('company_id'),
         'branch_id' => $branch,
         'roll_id' => $this->input->post('roll_id'),
         'user_name' => $this->input->post('user_name'),
         'user_lastname' => $this->input->post('user_lastname'),
         'user_mobile' => $this->input->post('user_mobile'),
         'user_email' => $this->input->post('user_email'),
         'user_password' => $this->input->post('user_password'),
         'user_status' => $user_status,
         'user_addedby' => $user_id,
       );
        $user_email = $this->input->post('user_email');
        $company_id2 = $this->input->post('company_id');
        $roll_id = $this->input->post('roll_id');

        $user_id2 = $this->User_Model->save_data('law_user', $save_data);
        // Add To Relation Table...
        $i = 0;
        if($branch_id){
          foreach ($branch_id as $a) {
            $rel_data = array(
              'user_id' => $user_id2,
              'branch_id' => $branch_id[$i],
              'roll_id' => $roll_id,
              'added_by' => $user_id,
            );
            $this->User_Model->save_data('law_user_branch_rel', $rel_data);
            $i++;
          }
        }

        header('location:'.base_url().'User/user_information_list');
     }
     $data['company_list'] = $this->User_Model->get_list2('company_id','ASC','law_company');
     $data['roll_list'] = $this->User_Model->get_list2('roll_id','ASC','law_roll');
     $data['branch_list'] = $this->User_Model->get_list2('branch_id','ASC','law_branch');
     $this->load->view('Include/head',$data);
     $this->load->view('Include/navbar',$data);
     $this->load->view('User/add_user',$data);
     $this->load->view('Include/footer',$data);
 }
 // Service List...
 public function user_information_list(){
   $user_id = $this->session->userdata('law_user_id');
   $company_id = $this->session->userdata('law_company_id');
   $roll_id = $this->session->userdata('roll_id');
   if($company_id){
     $data['user_list'] = $this->User_Model->get_user_list2($company_id);
     $data['user_roll'] = $roll_id;
     $this->load->view('Include/head',$data);
     $this->load->view('Include/navbar',$data);
     $this->load->view('User/user_information_list',$data);
     $this->load->view('Include/footer',$data);
   } else{
     header('location:'.base_url().'User');
   }
 }
 // Edit User...
 public function edit_user($user_id2){
   $user_id = $this->session->userdata('law_user_id');
   $company_id = $this->session->userdata('law_company_id');
   $roll_id = $this->session->userdata('roll_id');
   if(!$company_id || !$user_id){ header('location:'.base_url().'User'); }
   $this->form_validation->set_rules('user_name', 'First Name', 'trim|required');
   $this->form_validation->set_rules('user_lastname', 'Last Name', 'trim|required');
   if ($this->form_validation->run() != FALSE) {
     $user_status = $this->input->post('user_status');
     if(!isset($user_status)){ $user_status = 'active'; }
     $branch_id = $this->input->post('branch_id');
     if($branch_id){  $branch = implode(", ", $branch_id); }
     else{ $branch = 0; }
     $update_data = array(
       'company_id' => $this->input->post('company_id'),
       'branch_id' => $branch,
       'roll_id' => $this->input->post('roll_id'),
       'user_name' => $this->input->post('user_name'),
       'user_lastname' => $this->input->post('user_lastname'),
       'user_mobile' => $this->input->post('user_mobile'),
       'user_email' => $this->input->post('user_email'),
       'user_password' => $this->input->post('user_password'),
       'user_addedby' => $user_id,
       'user_status' => $user_status,
     );
     $roll_id2 = $this->input->post('roll_id');
       $this->User_Model->delete_info('user_id', $user_id2, 'law_user_branch_rel');
       $i = 0;
       if($branch_id){
         foreach ($branch_id as $a) {
           $rel_data = array(
             'user_id' => $user_id2,
             'branch_id' => $branch_id[$i],
             'roll_id' => $roll_id2,
             'added_by' => $user_id,
           );
           $this->User_Model->save_data('law_user_branch_rel', $rel_data);
           $i++;
         }
       }


     $this->User_Model->update_info('user_id', $user_id2, 'law_user', $update_data);
     header('location:'.base_url().'User/user_information_list');
   }
   $user_details = $this->User_Model->get_info('user_id', $user_id2, 'law_user');
   if($user_details == ''){ header('location:'.base_url().'User/user_information_list'); }
   foreach ($user_details as $details) {
     $data['update'] = 'update';
     $data['company_id'] = $details->company_id;
     $data['branch_id'] = $details->branch_id;
     $data['roll_id'] = $details->roll_id;
     $data['user_name'] = $details->user_name;
     $data['user_lastname'] = $details->user_lastname;
     $data['user_mobile'] = $details->user_mobile;
     $data['user_email'] = $details->user_email;
     $data['user_password'] = $details->user_password;
     $data['user_status'] = $details->user_status;
   }
   $branch_id = $details->branch_id;
   $branch_details = $this->User_Model->get_info('branch_id', $branch_id, 'law_branch');
   foreach ($branch_details as $branch_details) {
     $data['branch_name'] = $branch_details->branch_name;
   }
   // echo print_r($user_details);
   $data['company_list'] = $this->User_Model->get_list2('company_id','ASC','law_company');
   $data['roll_list'] = $this->User_Model->get_list2('roll_id','ASC','law_roll');
   $data['branch_list'] = $this->User_Model->get_list2('branch_id','ASC','law_branch');
   $this->load->view('Include/head',$data);
   $this->load->view('Include/navbar',$data);
   $this->load->view('User/add_user',$data);
   $this->load->view('Include/footer',$data);
 }

 public function delete_user($user_id2){
   $user_id = $this->session->userdata('law_user_id');
   $company_id = $this->session->userdata('law_company_id');
   $roll_id = $this->session->userdata('roll_id');
   if(!$user_id){ header('location:'.base_url().'User'); }
   $this->User_Model->delete_info('user_id', $user_id2, 'law_user');
   $this->User_Model->delete_info('user_id', $user_id2, 'law_user_branch_rel');
   header('location:'.base_url().'User/user_information_list');
 }

/******************************* Target **********************************/

public function target_range(){
  $user_id = $this->session->userdata('law_user_id');
  $company_id = $this->session->userdata('law_company_id');
  $roll_id = $this->session->userdata('roll_id');
  if($user_id == null ){ header('location:'.base_url().'User'); }
  $this->form_validation->set_rules('target_from', 'From Date', 'trim|required');
  $this->form_validation->set_rules('target_to', 'To Date', 'trim|required');
  if($this->form_validation->run() != FALSE){
    $save_data = array(
      'target_title' => $this->input->post('target_title'),
      'target_from' => $this->input->post('target_from'),
      'target_to' => $this->input->post('target_to'),
      'target_addedby' => $user_id,
    );
    $target_id = $this->User_Model->save_data('law_target', $save_data);
    foreach($_POST['input'] as $user){
      $user['target_id'] = $target_id;
      $this->db->insert('law_target_details', $user);
    }
    $this->session->flashdata('save_success','success');
    header('location:'.base_url().'User/target_range_list');
  }
  $this->load->view('Include/head');
  $this->load->view('Include/navbar');
  $this->load->view('User/target_range');
  $this->load->view('Include/footer');
}

public function target_range_list(){
  $user_id = $this->session->userdata('law_user_id');
  $company_id = $this->session->userdata('law_company_id');
  $roll_id = $this->session->userdata('roll_id');
  if($user_id == null ){ header('location:'.base_url().'User'); }
  $data['user_roll'] = $roll_id;
  $data['target_list'] = $this->User_Model->target_range_list();
  $this->load->view('Include/head',$data);
  $this->load->view('Include/navbar',$data);
  $this->load->view('User/target_range_list',$data);
  $this->load->view('Include/footer',$data);
}

public function edit_target_range($target_id){
  $user_id = $this->session->userdata('law_user_id');
  $company_id = $this->session->userdata('law_company_id');
  $roll_id = $this->session->userdata('roll_id');
  if($user_id == null ){ header('location:'.base_url().'User'); }
  $target_range = $this->User_Model->get_info('target_id', $target_id, 'law_target');
  if($target_range == ''){ header('location:'.base_url().'User/edit_target_range'); }
  foreach ($target_range as $details) {
    $data['target_title'] = $details->target_title;
    $data['target_from'] = $details->target_from;
    $data['target_to'] = $details->target_to;
  }
  $this->form_validation->set_rules('target_from', 'From Date', 'trim|required');
  $this->form_validation->set_rules('target_to', 'To Date', 'trim|required');
  if($this->form_validation->run() != FALSE){
    $update_data = array(
      'target_title' => $this->input->post('target_title'),
      'target_from' => $this->input->post('target_from'),
      'target_to' => $this->input->post('target_to'),
      'target_addedby' => $user_id,
    );
    $this->User_Model->update_info('target_id', $target_id, 'law_target', $update_data);
    $this->session->flashdata('update_success','success');
    header('location:'.base_url().'User/target_range_list');
  }

  $this->load->view('Include/head',$data);
  $this->load->view('Include/navbar',$data);
  $this->load->view('User/target_range',$data);
  $this->load->view('Include/footer',$data);
}
public function delete_target_range($target_id){
  $user_id = $this->session->userdata('law_user_id');
  $company_id = $this->session->userdata('law_company_id');
  $roll_id = $this->session->userdata('roll_id');
  if($user_id == null ){ header('location:'.base_url().'User'); }
  $this->User_Model->delete_info('target_id', $target_id, 'law_target');
  header('location:'.base_url().'User/target_range_list');
}


// Target Add and Save.............
 public function set_target(){
   $user_id = $this->session->userdata('law_user_id');
   $company_id = $this->session->userdata('law_company_id');
   $roll_id = $this->session->userdata('roll_id');
   if($company_id){
     $this->form_validation->set_rules('branch_id', 'Branch', 'trim|required');
     if($this->form_validation->run() != FALSE){
       $target_id = $this->input->post('target_id');
       $branch_id = $this->input->post('branch_id');
       $target_no = $this->input->post('target_no');
       foreach($_POST['input'] as $user){
         $user['target_id'] = $target_id;
         $user['branch_id'] = $branch_id;
         $user['target_no'] = $target_no;
         $this->db->insert('law_target_details', $user);
       }
       $this->session->flashdata('save_success','success');
       header('location:'.base_url().'User/target_list');
     }

     $data['branch_list'] = $this->User_Model->get_list2('branch_id','ASC','law_branch');
     $data['target_list'] = $this->User_Model->get_list2('target_id','ASC','law_target');
     $data['target_no'] = $this->Transaction_Model->get_count_no('target_no', 'law_target_details');
     $this->load->view('Include/head',$data);
     $this->load->view('Include/navbar',$data);
     $this->load->view('User/set_target_information',$data);
     $this->load->view('Include/footer',$data);

   } else{
     header('location:'.base_url().'User');
   }
 }

 public function target_list(){
   $user_id = $this->session->userdata('law_user_id');
   $company_id = $this->session->userdata('law_company_id');
   $roll_id = $this->session->userdata('roll_id');
   if($user_id == null ){ header('location:'.base_url().'User'); }
   $data['user_roll'] = $roll_id;
   $data['target_list'] = $this->User_Model->target_list();
   $this->load->view('Include/head',$data);
   $this->load->view('Include/navbar',$data);
   $this->load->view('User/target_list',$data);
   $this->load->view('Include/footer',$data);
 }

 public function edit_target($target_no){
   $user_id = $this->session->userdata('law_user_id');
   $company_id = $this->session->userdata('law_company_id');
   $roll_id = $this->session->userdata('roll_id');
   if($company_id){
     $this->form_validation->set_rules('target_no', 'From Date', 'trim|required');
     if($this->form_validation->run() != FALSE){
       $target_id = $this->input->post('target_id');
       $branch_id = $this->input->post('branch_id');
       $target_no = $this->input->post('target_no');

       foreach($_POST['input'] as $user){
         if(isset($user['target_details_id'])){
           $target_details_id = $user['target_details_id'];
           if(!isset($user['user_id'])){
             $this->User_Model->delete_info('target_details_id', $target_details_id, 'law_target_details');
           }else{
               $this->User_Model->update_info('target_details_id', $target_details_id, 'law_target_details', $user);
           }
         }
         else{
           $user['target_id'] = $target_id;
           $user['branch_id'] = $branch_id;
           $user['target_no'] = $target_no;
           $this->db->insert('law_target_details', $user);
         }
       }
       $this->session->flashdata('update_success','success');
       header('location:'.base_url().'User/target_list');
     }

     $data['branch_list'] = $this->User_Model->get_list2('branch_id','ASC','law_branch');

     $target_info = $this->User_Model->target_details($target_no);
     if($target_info == ''){ header('location:'.base_url().'User/target_list'); }
     $data['update'] = 'update';
     $data['target_id'] = $target_info[0]['target_id'];
     $data['target_no'] = $target_info[0]['target_no'];
     $data['target_title'] = $target_info[0]['target_title'];
     $data['target_from'] = $target_info[0]['target_from'];
     $data['target_to'] = $target_info[0]['target_to'];
     $data['branch_id'] = $target_info[0]['branch_id'];
     $target_id = $target_info[0]['target_id'];
     $data['target_details'] = $this->User_Model->target_details2($target_no);
     $data['target_list'] = $this->User_Model->get_list2('target_id','ASC','law_target');

     $this->load->view('Include/head',$data);
     $this->load->view('Include/navbar',$data);
     $this->load->view('User/set_target_information',$data);
     $this->load->view('Include/footer',$data);
   } else{
     header('location:'.base_url().'User');
   }
 }

 public function delete_target($target_no){
   $user_id = $this->session->userdata('law_user_id');
   $company_id = $this->session->userdata('law_company_id');
   $roll_id = $this->session->userdata('roll_id');
   if(!$user_id){ header('location:'.base_url().'User'); }
   $this->User_Model->delete_info('target_no', $target_no, 'law_target_details');
   header('location:'.base_url().'User/target_list');
 }

 public function get_user_list_by_branch(){
   $user_id = $this->session->userdata('law_user_id');
   $company_id = $this->session->userdata('law_company_id');
   $roll_id = $this->session->userdata('roll_id');
   if($user_id == null ){ header('location:'.base_url().'User'); }

   $branch_id = $this->input->post('branch_id');
   $user_list = $this->Transaction_Model->get_users_by_branch_rel('',$branch_id);
   if($user_list){
     echo '<div class="form-group col-md-4 text-bold">
       Roll
     </div>
     <div class="form-group col-md-4 text-bold">
       Name of User
     </div>
     <div class="form-group col-md-4 text-bold">
       Target Amount
     </div>
     ';
   }
   $i=0;
   foreach ($user_list as $list) {
     echo '
     <div class="form-group col-md-4">
       '.$list->roll_name.'
     </div>
     <div class="form-group col-md-4">
       '.$list->user_name.' '.$list->user_lastname.'
       <input type="hidden" name="input['.$i.'][user_id]" value="'.$list->user_id.'">
     </div>
     <div class="form-group col-md-4">
       <input type="text" class="form-control" name="input['.$i.'][target_amount]" title="Target" placeholder="Target" required>
     </div>';
     $i++;
   }
 }

 public function get_user_list_by_branch2(){
   $user_id = $this->session->userdata('law_user_id');
   $company_id = $this->session->userdata('law_company_id');
   $roll_id = $this->session->userdata('roll_id');
   if($user_id == null ){ header('location:'.base_url().'User'); }

   $branch_id = $this->input->post('branch_id');
   $user_list = $this->Transaction_Model->get_users_by_branch_rel2('',$branch_id);
   if($user_list){
     echo '<div class="form-group col-md-4 text-bold">
       Roll
     </div>
     <div class="form-group col-md-4 text-bold">
       Name of User
     </div>
     <div class="form-group col-md-4 text-bold">
       Target Amount
     </div>
     ';
   }
   $i=0;
   foreach ($user_list as $list) {
     echo '
     <div class="form-group col-md-4">
       '.$list->roll_name.'
     </div>
     <div class="form-group col-md-4">
       '.$list->user_name.' '.$list->user_lastname.'
       <input type="hidden" name="input['.$i.'][user_id]" value="'.$list->user_id.'">
     </div>
     <div class="form-group col-md-4">
       <input type="text" class="form-control" name="input['.$i.'][target_amount]" title="Target" placeholder="Target" required>
     </div>';
     $i++;
   }
 }

 public function delete_leg_up_doc(){
   $user_id = $this->session->userdata('law_user_id');
   $company_id = $this->session->userdata('law_company_id');
   $roll_id = $this->session->userdata('roll_id');
   if($user_id == null ){ header('location:'.base_url().'User'); }

   $leg_doc_id = $this->input->post('leg_doc_id');
   $doc_upload = $this->User_Model->get_info_arr('leg_doc_id', $leg_doc_id, 'law_leg_doc_up');
   $img = $doc_upload[0]['leg_doc_file'];
   $file = base_url().'assets/images/document/'.$img;
   unlink('assets/images/document/'.$img);
   // echo $file;
   $this->User_Model->delete_info('leg_doc_id', $leg_doc_id, 'law_leg_doc_up');
 }

 // Target Edit and Update..............



}
?>
