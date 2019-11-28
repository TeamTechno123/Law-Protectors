<!DOCTYPE html>
<html>
<?php
  $page = "company_information";
  include('head.php');
?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <?php include('navbar.php'); ?>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <?php include('sidebar.php'); ?>
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
          <div class="col-md-10 offset-md-1">
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
                    <input type="text" class="form-control form-control-sm" name="branch_name" id="branch_name" value="<?php if(isset($branch_name)){ echo $branch_name; } ?>" placeholder="Enter Branch Name" required>
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
          <!--/.col (left) -->
          <!-- right column -->
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
  <!-- /.content-wrapper -->
  <?php include('footer.php'); ?>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php include('script.php') ?>
</body>
</html>
