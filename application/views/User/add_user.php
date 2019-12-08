<!DOCTYPE html>
<html>
<?php
$page = "add_user";
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
            <h1>USER INFORMATION</h1>
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
                <h3 class="card-title">User Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post">
                <div class="card-body row">
                  <div class="form-group col-md-12 drop-lg">
                    <select class="form-control select2" name="company_id" id="company_id" title="Select Company Name" data-placeholder="Select Company Name" style="width: 100%;" required>
                      <option selected="selected" value="" >Select Company Name </option>
                      <?php foreach ($company_list as $list) { ?>
                      <option value="<?php echo $list->company_id; ?>" <?php if(isset($company_id)){ if($list->company_id == $company_id){ echo "selected"; } }  ?>><?php echo $list->company_name; ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="col-md-12 drop-lg">
                    <div class="form-group">
                      <select class="form-control select2" name="branch_id" id="branch_id" data-placeholder="Select Branch" required>
                        <option selected="selected" value="" >Select Branch </option>
                        <?php foreach ($branch_list as $list) { ?>
                        <option value="<?php echo $list->branch_id; ?>" <?php if(isset($branch_id)){ if($list->branch_id == $branch_id){ echo "selected"; } }  ?>><?php echo $list->branch_name; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group col-md-12 drop-lg">
                    <select class="form-control select2" name="roll_id" title="Select Roll Name" data-placeholder="Select Roll Name" id="roll_id" style="width: 100%;" required>
                      <option selected="selected" value="" >Select Roll Name </option>
                      <?php foreach ($roll_list as $list) {
                        if($list->roll_id != 1){  ?>
                      <option value="<?php echo $list->roll_id; ?>" <?php if(isset($roll_id)){ if($list->roll_id == $roll_id){ echo "selected"; } }  ?>><?php echo $list->roll_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="user_name" id="user_name" value="<?php if(isset($user_name)){ echo $user_name; } ?>" title="First Name" placeholder="First Name" required>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="user_lastname" id="user_lastname" value="<?php if(isset($user_lastname)){ echo $user_lastname; } ?>" title="Last Name" placeholder="Last Name" required>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="number" class="form-control" name="user_mobile" id="user_mobile" value="<?php if(isset($user_mobile)){ echo $user_mobile; } ?>" title="Mobile No." placeholder="Mobile No." required>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="user_email" id="user_email" value="<?php if(isset($user_email)){ echo $user_email; } ?>" title="Email" placeholder="Email">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="password" class="form-control" name="user_password" id="user_password" value="<?php if(isset($user_password)){ echo $user_password; } ?>" title="Enter Password" placeholder="Enter Password" required>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="password" class="form-control" name="" id="" title="Confirm Password" value="<?php if(isset($user_password)){ echo $user_password; } ?>" placeholder="Confirm Password" required>
                  </div>
                  </div>
                    <div class="form-group col-md-6 pl-4">
                    <input type="checkbox" name="user_status" value="deactive"> Disable This User
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <?php if(isset($update)){ ?>
                    <button type="submit" class="btn btn-primary px-4">Update</button>
                  <?php } else{ ?>
                    <button type="submit" class="btn btn-success px-4">Add</button>
                  <?php } ?>
                  <a href="" class="btn btn-default ml-4">Cancel</a>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>

  <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
  <script type="text/javascript">
    <?php if($this->session->flashdata('check_email')){ ?>
    $(document).ready(function(){
      toastr.error('Email Id Exist.');
    });
    <?php } ?>
  </script>
</body>
</html>
