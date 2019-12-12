<!DOCTYPE html>
<html>
<?php
$page = "receipt_list";
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
            <h4>Payment Reciept List</h4>
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
                <h3 class="card-title"><i class="fa fa-list"></i> List Payment Reciept</h3>
              </div>
              <div class="col-md-6 text-right">
                <a href="<?php echo base_url(); ?>Transaction/add_receipt" class="btn btn-sm btn-primary">Add Receipt</a>
              </div>
              <!--  -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="" style="overflow-x:auto;">
                <table id="example1" class="table table-bordered table-striped tbl_add">
                  <thead>
                  <tr>
                    <th class="sr_no">Sr. No.</th>
                    <th class="sr_no">Application No.</th>
                    <th>Org Name</th>
                    <th>Applicant Name</th>
                    <th class="td_w">Date</th>
                    <th class="sr_no">Received Amt</th>
                    <th class="sr_no">GST</th>
                    <th class="sr_no">LP</th>
                    <th class="sr_no">Govt Fees</th>
                    <th class="sr_no">TDS</th>
                    <th class="sr_no">B2B</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $i=0;
                  foreach ($receipt_list as $list) {
                    $i++;
                    $service_id = $list->service_id;
                  ?>
                  <tr>
                    <td class="sr_no"><?php echo $i; ?></td>
                    <td class="sr_no"><?php echo $list->application_no; ?></td>
                    <?php if($service_id == 1){ ?>
                      <td><?php echo $list->ORGANIZATION; ?></td>
                      <td><?php echo $list->NAME; ?></td>
                    <?php } elseif ($service_id == 2) { ?>
                      <td><?php echo $list->org_name; ?></td>
                      <td><?php echo $list->appl_name; ?></td>
                    <?php } else{ ?>
                      <td><?php echo $list->appl_org_name; ?></td>
                      <td><?php echo $list->appl_org_name; ?></td>
                    <?php } ?>

                    <td class="td_w"><?php echo $list->payment_date; ?></td>
                    <td class="sr_no"><?php echo $list->RECEVIEDAMOUNT; ?></td>
                    <td class="sr_no"><?php echo $list->GSTAMOUNT; ?></td>
                    <td class="sr_no"><?php echo $list->LP_AMOUNT; ?></td>
                    <td class="sr_no"><?php echo $list->GOVT_FEES; ?></td>
                    <td class="sr_no"><?php echo $list->TDS; ?></td>
                    <td class="sr_no"><?php echo $list->B2B; ?></td>
                    <td>
                      <a href="<?php echo base_url(); ?>Transaction/edit_receipt/<?php echo $list->payment_id; ?>"> <i class="fa fa-edit"></i> </a>
                      <!-- <a class="ml-2" target="_blank" href="<?php echo base_url(); ?>Report/invoice_print/<?php echo $list->payment_id; ?>"> <i class="fa fa-print"></i> </a> -->
                      <a class="ml-2" href="<?php echo base_url(); ?>Transaction/delete_receipt/<?php echo $list->payment_id; ?>" onclick="return confirm('Delete this Application');"> <i class="fa fa-trash"></i> </a>
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
