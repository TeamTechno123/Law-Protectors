<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{
  public function __construct(){
    parent::__construct();
    $this->load->model('User_Model');
  }
  public function logout(){
    $this->session->sess_destroy();
    header('location:'.base_url().'User');
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
      // echo print_r($login);
      if($login == null){
        $this->session->set_flashdata('msg','login_error');
        header('location:'.base_url().'User');
      }
      else{
        foreach ($login as $login){
          $this->session->set_userdata('law_user_id', $login['user_id']);
          $this->session->set_userdata('law_company_id', $login['company_id']);
          $this->session->set_userdata('roll_id', $login['roll_id']);
        }
        header('location:'.base_url().'User/dashboard');
      }
    }
  }

  public function dashboard(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $key = '';
      $data['branch_count'] = $this->User_Model->get_count('branch_id',$company_id,$key,'law_branch');
      $data['service_count'] = $this->User_Model->get_count('service_id',$company_id,$key,'law_service');
      $data['open_count'] = $this->User_Model->get_count('application_id',$company_id,'open','law_application');
      $data['pro_count'] = $this->User_Model->get_count('application_id',$company_id,'In Process','law_application');
      $this->load->view('User/dashboard',$data);
    } else{
      header('location:'.base_url().'User');
    }
  }

  /***************************** Company Information ************************/
  // Company list...
  public function company_information_list(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $data['company_list'] = $this->User_Model->get_list($company_id,'company_id','ASC','law_company');
      $this->load->view('User/company_information_list',$data);
    } else{
      header('location:'.base_url().'User');
    }
  }
  // Edit Company...
  public function edit_company($company_id){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $company_info = $this->User_Model->get_info('company_id', $company_id, 'law_company');
      if($company_info){
        foreach($company_info as $info){
          $data['update'] = 'update';
          $data['company_id'] = $info->company_id;
          $data['company_name'] = $info->company_name;
          $data['company_address'] = $info->company_address;
          $data['company_city'] = $info->company_city;
          $data['company_state'] = $info->company_state;
          $data['company_district'] = $info->company_district;
          $data['company_pincode'] = $info->company_pincode;
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
        $this->load->view('User/company_information',$data);
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
      $company_id = $this->input->post('company_id');
      $data = array(
        'company_name' => $this->input->post('company_name'),
        'company_address' => $this->input->post('company_address'),
        'company_city' => $this->input->post('company_city'),
        'company_state' => $this->input->post('company_state'),
        'company_district' => $this->input->post('company_district'),
        'company_pincode' => $this->input->post('company_pincode'),
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
      $this->User_Model->update_info('company_id', $company_id, 'law_company', $data);
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
      $this->load->view('User/branch_information');
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
      $data['branch_list'] = $this->User_Model->get_list($company_id,'branch_id','ASC','law_branch');
      $this->load->view('User/branch_information_list',$data);
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
        'company_id' => $company_id,
        'branch_name' => $this->input->post('branch_name'),
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
      if($branch_info){
        foreach($branch_info as $info){
          $data['update'] = 'update';
          $data['branch_id'] = $info->branch_id;
          $data['branch_name'] = $info->branch_name;
          $data['branch_status'] = $info->branch_status;
        }
        $this->load->view('User/branch_information',$data);
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
        'branch_name' => $this->input->post('branch_name'),
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

      $this->load->view('User/service_information');
    } else{
      header('location:'.base_url().'User');
    }
  }
  // Service List...
  public function service_information_list(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $data['service_list'] = $this->User_Model->get_list($company_id,'service_id','ASC','law_service');
      $this->load->view('User/service_information_list',$data);
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
      $data = array(
        'company_id' => $company_id,
        'service_name' => $this->input->post('service_name'),
        'service_alert_days' => $this->input->post('service_alert_days'),
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
        }
        $this->load->view('User/service_information',$data);
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
      $data = array(
        'service_name' => $this->input->post('service_name'),
        'service_alert_days' => $this->input->post('service_alert_days'),
      );
      $this->User_Model->update_info('service_id', $service_id, 'law_service', $data);
      header('location:'.base_url().'User/service_information_list');
    } else{
      header('location:'.base_url().'User');
    }
  }
  // Update Branch...
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

  public function add_user(){
    $this->load->view('User/add_user');
  }

 // dhananjay....

 public function user_information(){
   $user_id = $this->session->userdata('law_user_id');
   $company_id = $this->session->userdata('law_company_id');
   $roll_id = $this->session->userdata('roll_id');
   if($company_id){
     $this->load->view('User/add_user');
   } else{
     header('location:'.base_url().'User');
   }
 }
 // Service List...
 public function user_information_list(){
   $user_id = $this->session->userdata('law_user_id');
   $company_id = $this->session->userdata('law_company_id');
   $roll_id = $this->session->userdata('roll_id');
   if($company_id){
     $data['user_list'] = $this->User_Model->get_user_list($company_id);
     $this->load->view('User/user_information_list',$data);
   } else{
     header('location:'.base_url().'User');
   }
 }

 public function set_target(){
   $user_id = $this->session->userdata('law_user_id');
   $company_id = $this->session->userdata('law_company_id');
   $roll_id = $this->session->userdata('roll_id');
   if($company_id){
     $this->load->view('User/set_target_information');
   } else{
     header('location:'.base_url().'User');
   }
 }
}
?>
