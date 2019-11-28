<!DOCTYPE html>
<html>
<?php
$page = "application_list";
include('head.php');
?>
<style>
  td{
    padding:2px 10px !important;
  }
</style>
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
          <div class="col-sm-12 mt-1">
            <h4>Application List - Printing</h4>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
            <div class="card-header">
              <h3 class="card-title"><i class="fa fa-list"></i> &nbsp;Application List - Printing</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Date</th>
                  <th>Application No.</th>
                  <th>File Ref. No.</th>
                  <th>Party Name</th>
                  <th>Status</th>
                  <th>TMA Application</th>
                  <th>Autorization Letter</th>
                  <th>Affidavit Letter</th>
                  <th>Covering Letter</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i=0;
                foreach ($application_list as $list) {
                  $i++;
                  $NAME = $list->NAME;
                  $single_name = explode(',', $NAME);
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $list->application_date; ?></td>
                  <td><?php echo $list->application_no; ?></td>
                  <td><?php echo $list->FILE_REF_NO; ?></td>
                  <td><?php echo $single_name[0]; ?></td>
                  <td><?php echo $list->application_status; ?></td>
                  <td>
                    <a target="_blank" href="<?php echo base_url(); ?>Transaction/form_tm/<?php echo $list->application_id; ?>"> <i class="fa fa-print"></i> </a>
                  </td>
                  <td>
                    <a target="_blank" href="<?php echo base_url(); ?>Transaction/auth_print/<?php echo $list->application_id; ?>"> <i class="fa fa-print"></i> </a>
                  </td>
                  <td>
                    <a target="_blank" href="<?php echo base_url(); ?>Transaction/affidavit/<?php echo $list->application_id; ?>"> <i class="fa fa-print"></i> </a>
                  </td>
                  <td>
                    <a target="_blank" href="<?php echo base_url(); ?>Transaction/covering_letter/<?php echo $list->application_id; ?>"> <i class="fa fa-print"></i> </a>
                  </td>
                </tr>
                <?php } ?>
                <tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          </div>
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
