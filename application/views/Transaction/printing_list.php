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
                   <th>Date</th>
                  <th>Application No.</th>
                  <th>Company Name</th>
                  <th>Brand Name</th>
                   <th>Class</th>
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
                  $PROPOSED_TO_BE = $list->PROPOSED_TO_BE;
                  $single_name = explode(',', $NAME);
                ?>
                <tr>
                 
                  <td><?php echo $list->application_date; ?></td>
                  <td><?php echo $list->application_no; ?></td>
                  <td><?php echo $list->ORGANIZATION ?></td>
                  <td><?php echo $list->BRAND; ?></td>
                  <td><?php echo $list->TM; ?></td>
                  <td><?php echo $list->application_status; ?></td>
                  <td>
                    <a target="_blank" href="<?php echo base_url(); ?>Report/form_tm/<?php echo $list->application_id; ?>"> <i class="fa fa-print"></i> </a>
                  </td>
                  <td>
                    <a target="_blank" href="<?php echo base_url(); ?>Report/auth_print/<?php echo $list->application_id; ?>"> <i class="fa fa-print"></i> </a>
                  </td>
                  <td>
                    <?php if($PROPOSED_TO_BE == ''){ ?>
                    <a target="_blank" href="<?php echo base_url(); ?>Report/affidavit/<?php echo $list->application_id; ?>"> <i class="fa fa-print"></i> </a>
                  <?php } ?>
                  </td>
                  <td>
                    <a target="_blank" href="<?php echo base_url(); ?>Report/covering_letter/<?php echo $list->application_id; ?>"> <i class="fa fa-print"></i> </a>
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
