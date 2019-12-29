<?php
  $user_roll = $this->session->userdata('roll_id');
  $law_user_id = $this->session->userdata('law_user_id');
  $user_info = $this->User_Model->get_info_arr('user_id', $law_user_id, 'law_user');
  $roll_info = $this->User_Model->get_info_arr('roll_id', $user_roll, 'law_roll');
?>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
  </ul>
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-user"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <div class="text-center w-100 py-2"><b><?php echo $user_info[0]['user_name'].' '.$user_info[0]['user_lastname']; ?></b></div>
        <div class="dropdown-divider"></div>
        <a href="<?php echo base_url(); ?>User/change_password" class="dropdown-item">
          <i class="fas fa-key mr-2"></i> Change Password
        </a>
        <div class="dropdown-divider"></div>
        <a href="<?php echo base_url(); ?>User/logout" class="dropdown-item">
          <i class="fas fa-sign-out-alt mr-2"></i> Logout
        </a>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url(); ?>User/logout">
        <i class="fas fa-sign-out-alt"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
        <i class="fas fa-th-large"></i>
      </a>
    </li>
  </ul>
</nav>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="dist/img/AdminLTELogo.png" alt="" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">Lawprotectors</span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
      </div>
      <div class="info">
        <a href="#" class="d-block"><?php echo $user_info[0]['user_name'].' '.$user_info[0]['user_lastname']; ?></a>
        <a href="#" class="d-block">(<?php echo $roll_info[0]['roll_name']; ?>)</a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>User/dashboard" class="nav-link <?php if(isset($page) && $page=='dashboard'){ echo 'active'; } ?>">
            <i class="nav-icon fas fa-th"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <?php //if(isset($$user_roll) && $user_roll == 1){ ?>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link head">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>Master <i class="right fas fa-angle-left"></i> </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>User/company_information_list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Company Information
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>User/branch_information_list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Branch Information
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>User/service_information_list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Service Information
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>User/user_information_list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    User Information
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>User/target_range_list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Target Range
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>User/target_list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Target Information
                    <!-- set_target -->
                  </p>
                </a>
              </li>
            </ul>
          </li>
        <?php //} ?>


    <li class="nav-item has-treeview">
        <a href="#" class="nav-link head">
          <i class="nav-icon fas fa-chart-pie"></i>
          <p>
            Transaction
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview" style="display: none;">
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>Transaction/application_information" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Application Information
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>Transaction/application_list" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Application List
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>Transaction/work_details_list" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Add Work Details
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>Transaction/sale_invoice_list" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Invoice List
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>Transaction/receipt_list" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Receipt
              </p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item has-treeview">
      <a href="#" class="nav-link head">
        <i class="nav-icon fas fa-chart-pie"></i>
        <p>
          Report
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview" style="display: none;">
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>Report/application_report" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>
              Application Report
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>Report/collection_report" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>
              Collection Report
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>Report/outstanding_report" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>
            Outstanding Report
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>Report/invoice_report" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>
              Invoice Report
            </p>
          </a>
        </li>
      </ul>
      </li>
      <li class="nav-item">
        <a href="<?php echo base_url(); ?>Transaction/printing_list" class="nav-link">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Printing
          </p>
        </a>
      </li>

    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
