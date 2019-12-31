<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Legal extends CI_Controller{
  public function __construct(){
    parent::__construct();
    $this->load->model('User_Model');
    $this->load->model('Transaction_Model');
  }

  public function dashboard(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($user_id == null ){ header('location:'.base_url().'User'); }
    $key = '';
    $data['leg_pro_count'] = $this->User_Model->get_legal_count($user_id,'application_id','Legal In Process','law_application');
    $data['leg_pending_count'] = $this->User_Model->get_legal_count($user_id,'application_id','Pending for Legal','law_application');
    $data['leg_complete_count'] = $this->User_Model->get_legal_count($user_id,'application_id','Legal Completed','law_application');
    $data['page'] = 'dashboard';
    $this->load->view('Include/head', $data);
    $this->load->view('Include/legal_navbar', $data);
    $this->load->view('Legal/dashboard', $data);
    $this->load->view('Include/footer', $data);
  }

  public function application_list(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($user_id == null ){ header('location:'.base_url().'User'); }
    $data['title'] = 'Legal In Process Application List';
    $status = 'Legal In Process';
    $data['application_list'] = $this->Transaction_Model->application_list_legal($user_id,$company_id,$status,'ASC');
    $this->load->view('Include/head',$data);
    $this->load->view('Include/legal_navbar',$data);
    $this->load->view('Legal/application_list',$data);
    $this->load->view('Include/footer',$data);
  }

  public function pending_list(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($user_id == null ){ header('location:'.base_url().'User'); }
    $data['title'] = 'Pending for Legal Application List';
    $status = 'Pending for Legal';
    $data['application_list'] = $this->Transaction_Model->application_list_legal($user_id,$company_id,$status,'ASC');
    $this->load->view('Include/head',$data);
    $this->load->view('Include/legal_navbar',$data);
    $this->load->view('Legal/application_list',$data);
    $this->load->view('Include/footer',$data);
  }

  public function complete_list(){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($user_id == null ){ header('location:'.base_url().'User'); }
    $data['title'] = 'Legal Complete Application List';
    $status = 'Legal Completed';
    $data['application_list'] = $this->Transaction_Model->application_list_legal($user_id,$company_id,$status,'ASC');
    $this->load->view('Include/head',$data);
    $this->load->view('Include/legal_navbar',$data);
    $this->load->view('Legal/application_list',$data);
    $this->load->view('Include/footer',$data);
  }


  public function application_upload($application_id){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($user_id == null ){ header('location:'.base_url().'User'); }
    $application_details = $this->Transaction_Model->application_details($application_id);
    if(!$application_details){ header('location:'.base_url().'Legal/application_list'); }
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
    $this->load->view('Include/head',$data);
    $this->load->view('Include/legal_navbar',$data);
    $this->load->view('Legal/application_upload',$data);
    $this->load->view('Include/footer',$data);
  }

  public function upload_doc($application_id){
    $user_id = $this->session->userdata('law_user_id');
    $company_id = $this->session->userdata('law_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($user_id == null ){ header('location:'.base_url().'User'); }
    $application_details = $this->Transaction_Model->application_details($application_id);
    if(!$application_details){ header('location:'.base_url().'Legal/application_list'); }
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

    $this->form_validation->set_rules('application_status', 'application_status', 'trim|required');
    if($this->form_validation->run() != FALSE){
      if(isset($_FILES['leg_doc_file']['name'])){
        $leg_doc_title = $_POST['leg_doc_title'];
        $this->load->library('upload');
        $files = $_FILES;
        $cpt = count($_FILES['leg_doc_file']['name']);
        for($i=0; $i<$cpt; $i++)
        {
          $j = $i+1;
          $time = time();
          $image_name = 'leg_'.$application_id.'_'.$j.'_'.$time;
            $_FILES['leg_doc_file']['name']= $files['leg_doc_file']['name'][$i];
            $_FILES['leg_doc_file']['type']= $files['leg_doc_file']['type'][$i];
            $_FILES['leg_doc_file']['tmp_name']= $files['leg_doc_file']['tmp_name'][$i];
            $_FILES['leg_doc_file']['error']= $files['leg_doc_file']['error'][$i];
            $_FILES['leg_doc_file']['size']= $files['leg_doc_file']['size'][$i];
            $config['upload_path'] = 'assets/images/document/';
            $config['allowed_types'] = 'gif|jpg|png|pdf|docx|ppt';
            $config['file_name'] = $image_name;
            $config['overwrite']     = FALSE;
            $filename = $files['leg_doc_file']['name'][$i];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $this->upload->initialize($config);
            if($this->upload->do_upload('leg_doc_file')){
              $file_data['leg_doc_title'] = $leg_doc_title[$i];
              $file_data['leg_doc_file'] = $image_name.'.'.$ext;
              $file_data['application_id'] = $application_id;
              $file_data['leg_doc_addedby'] = $user_id;
              $this->User_Model->save_data('law_leg_doc_up', $file_data);
            }
            else{
              $error = $this->upload->display_errors();
              $this->session->set_flashdata('status',$this->upload->display_errors());
            }
        }
      }
      $up_data['application_status'] = $_POST['application_status'];
      $up_data['legal_user'] = $user_id;
      $this->User_Model->update_info('application_id', $application_id, 'law_application', $up_data);
      header('location:'.base_url().'Legal/application_list');
    }

    $data['doc_list'] = $this->User_Model->leg_doc_list($application_id);
    // print_r($data['doc_list']);
    $this->load->view('Include/head',$data);
    $this->load->view('Include/legal_navbar',$data);
    $this->load->view('Legal/upload_doc',$data);
    $this->load->view('Include/footer',$data);
  }
}
?>
