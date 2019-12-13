<!DOCTYPE html>
<html>
<?php
$page = "invoice_list";
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
            <h4>Target List</h4>
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
            <div class="card-header row">
              <div class="col-md-6">
                <h3 class="card-title"><i class="fa fa-list"></i> Target List</h3>
              </div>
              <div class="col-md-6 text-right">
                <a href="<?php echo base_url(); ?>User/set_target" class="btn btn-primary btn-sm">Add Target</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Company</th>
                  <th>Branch</th>
                  <th>Title</th>
                  <th>From Date</th>
                  <th>To Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i=0;
                foreach ($target_list as $list) {
                  $i++;
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $list->company_name; ?></td>
                  <td><?php echo $list->branch_name; ?></td>
                  <td><?php echo $list->target_title; ?></td>
                  <td><?php echo $list->target_from; ?></td>
                  <td><?php echo $list->target_to; ?></td>
                  <td>
                    <a href="<?php echo base_url(); ?>User/edit_target/<?php echo $list->target_no; ?>"> <i class="fa fa-edit"></i> </a>
                    <a class="ml-2" href="<?php echo base_url(); ?>User/delete_target/<?php echo $list->target_no; ?>" onclick="return confirm('Delete this Target');"> <i class="fa fa-trash"></i> </a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
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
