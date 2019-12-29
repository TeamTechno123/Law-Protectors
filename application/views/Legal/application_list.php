<!DOCTYPE html>
<html>
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
            </div>
            <!-- /.card-header -->
            <div class="card-body" >
              <div class="" style="overflow-x:auto;">
                <table id="application_list" class="table table-bordered table-striped tbl_add">
                  <thead>
                  <tr>
                    <th class="sr_no">Sr. No.</th>
                    <th class="sr_no">Application No.</th>
                    <th>Date</th>
                    <th>Org Type</th>
                    <th>Service</th>
                    <th>Status</th>
                    <th class="sr_no">Application Upload</th>
                    <th class="sr_no">Upload</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $i=0;
                  foreach ($application_list as $list) {
                    $service_id = $list->service_id;
                    $i++;
                  ?>
                  <tr>
                    <?php // print_r($list).'<br><br>';  ?>
                    <td class="sr_no"><?php echo $i; ?></td>
                    <td class="sr_no"><?php echo $list->application_no; ?></td>
                    <td><?php echo $list->application_date; ?></td>
                    <td><?php echo $list->organization_name; ?></td>
                    <td><?php echo $list->service_name; ?></td>
                    <td><?php echo $list->application_status; ?></td>
                    <td class="sr_no">
                      <a href="<?php echo base_url(); ?>Legal/application_upload/<?php echo $list->appl_id; ?>"> <i class="fa fa-eye"></i> </a>
                    </td>
                    <td class="sr_no">
                      <a href="<?php echo base_url(); ?>Legal/upload_doc/<?php echo $list->appl_id; ?>"> <i class="fa fa-upload"></i> </a>
                    </td>
                  </tr>
                  <?php } ?>
                  <tbody>
                </table>
              </div>
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
