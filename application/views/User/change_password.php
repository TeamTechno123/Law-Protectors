<!DOCTYPE html>
<html>
<?php
$page = "set_target";
?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-center mt-2">
            <h1>Change Password</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-8 offset-md-2">
            <!-- general form elements -->
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Change Password</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post">
                <div class="card-body row">
                  <div class="form-group col-md-12">
                    <input type="password" class="form-control" name="old_password" id="old_password" value="" title="Old Password" placeholder="Old Password" required>
                  </div>
                  <div class="form-group col-md-12">
                    <input type="password" class="form-control" name="new_password" id="new_password" value="" title="New Password" placeholder="New Password" required>
                  </div>
                  <div class="form-group col-md-12">
                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" value="" title="Confirm New Password" placeholder="Confirm New Password" required>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary px-4">Update Password</button>
                  <a href="#" class="btn btn-default ml-4">Cancel</a>
                </div>
              </form>
            </div>
          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <!--/.col (right) -->
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
      toastr.error('Invalid Old Password.');
    })
  </script>
  <?php } ?>
</body>
</html>
