<!DOCTYPE html>
<html>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-center mt-2">
            <h1>Dashboard</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <hr>
        <h4 class="mb-3">Summary</h4>
        <div class="row">
          <!-- left column -->

          <div class="col-md-4 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $leg_pro_count; ?></h3>
                <p>Legal In Process</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo base_url() ?>Legal/application_list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-md-4 col-6">
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3><?php echo $leg_pending_count; ?></h3>
                <p>Pending for Legal</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo base_url() ?>Legal/pending_list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-md-4 col-6">
            <div class="small-box bg-green">
              <div class="inner">
                <h3><?php echo $leg_complete_count; ?></h3>
                <p>Legal Complete</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo base_url() ?>Legal/complete_list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
  <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
  <?php if($this->session->flashdata('change_password')){ ?>
  <script type="text/javascript">
    $(document).ready(function(){
      toastr.success('Password Changed Successfully.');
    })
  </script>
  <?php } ?>
</body>
</html>
