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
        <a href="#" class="d-block">Admin</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>User/dashboard" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Master
                <i class="right fas fa-angle-left"></i>
              </p>
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

      </ul>
    </li>

    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
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

          <!-- <li class="nav-item">
            <a href="<?php echo base_url(); ?>Transaction/applicant_form1" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Applicant Form Step One
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>Transaction/applicant_form2" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Applicant Form Step Two
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>Transaction/huf_form1" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                HUF Form Step One
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>Transaction/huf_form2" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                HUF Form Step Two
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url(); ?>Transaction/lpp_form1" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                LLP Form Step One
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>Transaction/lpp_form2" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                LLP Form Step Two
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url(); ?>Transaction/propritorship_form1" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Propritorship Form Step One
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>Transaction/propritorship_form2" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Propritorship Form Step Two
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url(); ?>Transaction/regd_company_form1" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                REGD Company Form Step One
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>Transaction/regd_company_form2" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                REGD Company Form Step Two
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url(); ?>Transaction/regd_partnership_form1" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                  REGD Partnership Form Step One
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>Transaction/regd_partnership_form2" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                  REGD Partnership Form Step Two
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url(); ?>Transaction/society_form1" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Society Form Step One
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>Transaction/society_form2" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Society Form Step Two
              </p>
            </a>
          </li> -->
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
<!-- <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-chart-pie"></i>
        <p>
          print Format
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview" style="display: none;">
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>Transaction/form_tm" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>
              From TM A
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>Transaction/auth_print" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>
              Authorization
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>Transaction/affidavit" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>
            Affidavit
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>Transaction/covering_letter" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>
              Covering letter
            </p>
          </a>
        </li>
        <ul>
      </li> -->
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
