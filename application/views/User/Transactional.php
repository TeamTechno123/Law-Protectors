<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transactional extends CI_Controller{

  // Transaction...

  public function application_information(){
    $this->load->view('Admin/application_information');
  }





  public function add_enquiry(){
    $this->load->view('Admin/add_enquiry');
  }
  public function applicant_form1(){
    $this->load->view('Admin/applicant_form_step1');
  }

  public function applicant_form2(){
    $this->load->view('Admin/applicant_form_step2');
  }

  public function huf_form1(){
    $this->load->view('Admin/huf_step1');
  }

  public function huf_form2(){
    $this->load->view('Admin/huf_step2');
  }
  public function lpp_form1(){
    $this->load->view('Admin/lpp_step1');
  }

  public function lpp_form2(){
    $this->load->view('Admin/lpp_step2');
  }
  public function propritorship_form1(){
    $this->load->view('Admin/propritorship_step1');
  }

  public function propritorship_form2(){
    $this->load->view('Admin/propritorship_step2');
  }
  public function regd_company_form1(){
    $this->load->view('Admin/regd_company_step1');
  }

  public function regd_company_form2(){
    $this->load->view('Admin/regd_company_step2');
  }
  public function regd_partnership_form1(){
    $this->load->view('Admin/regd_partnership_step1');
  }

  public function regd_partnership_form2(){
    $this->load->view('Admin/regd_partnership_step2');
  }
  public function society_form1(){
    $this->load->view('Admin/society_step1');
  }

  public function society_form2(){
    $this->load->view('Admin/society_step2');
  }

  public function form_tm(){
    $this->load->view('Admin/form_tm');
  }

  public function auth_print(){
    $this->load->view('Admin/authorization');
  }

  public function affidavit(){
    $this->load->view('Admin/affidavite');
  }

  public function covering_letter(){
    $this->load->view('Admin/covering_letter');
  }


}
