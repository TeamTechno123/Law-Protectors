<!DOCTYPE html>
<html>
<?php
$page = "application_list";
?>
<style>
  td{
    padding:2px 10px !important;
  }
</style>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 mt-1">
            <h4>VIEW ALL APPLICATION INFORMATION</h4>
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
              <h3 class="card-title"><i class="fa fa-list"></i> List Application Information</h3>
              <!--  -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Application No.</th>
                  <th>Date</th>
                  <th>Branch</th>
                  <th>Service</th>
                  <th>Status</th>
                  <th>Upload</th>
                  <th>Invoice</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i=0;
                foreach ($application_list as $list) {
                  $i++;
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $list->application_no; ?></td>
                  <td><?php echo $list->application_date; ?></td>
                  <td><?php echo $list->branch_name; ?></td>
                  <td><?php echo $list->service_name; ?></td>
                  <td><?php echo $list->application_status; ?></td>
                  <td>
                    <a href="<?php echo base_url(); ?>Transaction/document_uploading_form/<?php echo $list->application_id; ?>"> <i class="fa fa-upload"></i> </a>
                  </td>
                  <td>
                    <a href="<?php echo base_url(); ?>Transaction/sale_invoice/<?php echo $list->application_id; ?>"> <i class="fa fa-plus"></i> </a>
                  </td>
                  <td>
                    <a href="<?php echo base_url(); ?>Transaction/change_status/<?php echo $list->application_id; ?>"> <i class="fa fa-edit"></i> </a>
                  </td>
                  <td>
                    <a href="<?php echo base_url(); ?>Transaction/edit_application/<?php echo $list->application_id; ?>"> <i class="fa fa-edit"></i> </a>
                    <a href="<?php echo base_url(); ?>Transaction/delete_application/<?php echo $list->application_id; ?>" onclick="return confirm('Delete this Application');" class="ml-4"> <i class="fa fa-trash"></i> </a>
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
</body>
</html>
