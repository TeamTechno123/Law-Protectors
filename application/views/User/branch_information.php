<!DOCTYPE html>
<html>
<?php
  $page = "company_information";
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
            <h1>BRANCH INFORMATION</h1>
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
                <h3 class="card-title">Branch Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php if(isset($update)){ ?>
                <form action="<?php echo base_url(); ?>User/update_brach" method="post" enctype="multipart/form-data" role="form">
                  <input type="hidden" name="branch_id" value="<?php echo $branch_id; ?>">
              <?php }else{ ?>
                <form action="<?php echo base_url(); ?>User/save_branch" method="post" enctype="multipart/form-data" role="form">
              <?php } ?>
                <div class="card-body row">
                  <div class="form-group col-md-12">
                    <select class="form-control select2 form-control-sm" name="company_id" id="company_id" title="Select Company Name" style="width: 100%;" required>
                        <option selected="selected" value="" >Select Company Name </option>
                        <?php foreach ($company_list as $list) { ?>
                          <option value="<?php echo $list->company_id; ?>" <?php if(isset($company_id)){ if($list->company_id == $company_id){ echo "selected"; } }  ?>><?php echo $list->company_name; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="branch_name" id="branch_name" value="<?php if(isset($branch_name)){ echo $branch_name; } ?>" placeholder="Enter Branch Name" required>
                  </div>
                  <div class="form-group col-md-12">
                    <input type="email" class="form-control form-control-sm" name="branch_email" id="branch_email" value="<?php if(isset($branch_email)){ echo $branch_email; } ?>" placeholder="Enter Branch Email" required>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="branch_bank" id="branch_bank" value="<?php if(isset($branch_bank)){ echo $branch_bank; } ?>" placeholder="Enter Bank Name" required>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="branch_b_branch" id="branch_b_branch" value="<?php if(isset($branch_b_branch)){ echo $branch_b_branch; } ?>" placeholder="Enter Bank Branch Name" required>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="branch_acc_no" id="branch_acc_no" value="<?php if(isset($branch_acc_no)){ echo $branch_acc_no; } ?>" placeholder="Enter Account No." required>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="branch_ifsc" id="branch_ifsc" value="<?php if(isset($branch_ifsc)){ echo $branch_ifsc; } ?>" placeholder="Enter IFSC Code" required>
                  </div>
                <!-- /.card-body -->
                </div>
                <div class="card-footer">
                  <?php if(isset($update)){ ?>
                    <button type="submit" class="btn btn-primary">Update</button>
                  <?php }else{ ?>
                    <button type="submit" class="btn btn-success">Add</button>
                  <?php } ?>
                  <a href="<?php echo base_url(); ?>/User/branch_information_list" class="btn btn-default ml-4">Cancel</a>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
</body>
</html>
