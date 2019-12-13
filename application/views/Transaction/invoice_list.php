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
            <h4>Sale Invoice List</h4>
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
              <h3 class="card-title"><i class="fa fa-list"></i> List Sale Invoice</h3>
              <!--  -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Invoice No.</th>
                  <th>Company Name</th>
                  <th>Branch Name</th>
                  <th>Party</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i=0;
                foreach ($sale_invoice_list as $list) {
                  $i++;
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $list->invoice_no; ?></td>
                  <td><?php echo $list->company_name; ?></td>
                  <td><?php echo $list->branch_name; ?></td>
                  <td><?php echo $list->party; ?></td>
                  <td><?php echo $list->invoice_date; ?></td>
                  <td>
                    <a href="<?php echo base_url(); ?>Transaction/edit_invoice/<?php echo $list->invoice_id; ?>"> <i class="fa fa-edit"></i> </a>
                    <a class="ml-2" target="_blank" href="<?php echo base_url(); ?>Report/invoice_print/<?php echo $list->invoice_id; ?>"> <i class="fa fa-print"></i> </a>
                    <a class="ml-2" href="<?php echo base_url(); ?>Transaction/delete_invoice/<?php echo $list->invoice_id; ?>" onclick="return confirm('Delete this Application');"> <i class="fa fa-trash"></i> </a>
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
