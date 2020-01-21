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
                    <th class="sr_no">Reciept No.</th>
                    <th class="sr_no">Reciept Date</th>
                    <th>Org Name</th>
                    <th>Applicant Name</th>
                    <th class="sr_no">Received Amt</th>
                    <th class="sr_no">GST</th>
                    <th class="sr_no">LP</th>
                    <th class="sr_no">Govt Fees</th>
                    <th class="sr_no">TDS</th>
                    <th class="sr_no">B2B</th>
                    <th class="sr_no">Status</th>
                    <th class="sr_no">Action</th>
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
                    <td class="sr_no"><?php echo $list->payment_no; ?></td>
                    <td class="sr_no"><?php echo $list->payment_date; ?></td>
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


                    <td class="sr_no"><?php echo $list->RECEVIEDAMOUNT; ?></td>
                    <td class="sr_no"><?php echo $list->GSTAMOUNT; ?></td>
                    <td class="sr_no"><?php echo $list->LP_AMOUNT; ?></td>
                    <td class="sr_no"><?php echo $list->GOVT_FEES; ?></td>
                    <td class="sr_no"><?php echo $list->TDS; ?></td>
                    <td class="sr_no"><?php echo $list->B2B; ?></td>
                    <td class="sr_no">
                      <?php //echo $list->payment_status; ?>
                      <?php if($list->pay_status == 'Uncleared'){ ?>
                        <a href="#" class="pay_status" id="<?php echo $list->payment_id; ?>" name="<?php echo $list->pay_status; ?>" received="<?php echo $list->pay_rec; ?>" data-toggle="modal" data-target="#modal-default">
                          <small class="badge badge-danger"><?php echo $list->pay_status; ?></small>
                        </a>
                      <?php } else{ ?>
                        <a href="#" class="pay_status" id="<?php echo $list->payment_id; ?>" name="<?php echo $list->pay_status; ?>" received="<?php echo $list->pay_rec; ?>"  data-toggle="modal" data-target="#modal-default">
                          <small class="badge badge-success"><?php echo $list->pay_status; ?></small>
                        </a>
                      <?php } ?>
                    </td>
                    <td class="sr_no">
                      <a href="<?php echo base_url(); ?>Transaction/edit_receipt/<?php echo $list->payment_id; ?>"> <i class="fa fa-edit"></i> </a>
                      <!-- <a class="ml-2" target="_blank" href="<?php echo base_url(); ?>Report/invoice_print/<?php echo $list->payment_id; ?>"> <i class="fa fa-print"></i> </a> -->
                      <?php if($user_roll == 1){ ?>
                      <a class="ml-2" href="<?php echo base_url(); ?>Transaction/delete_receipt/<?php echo $list->payment_id; ?>" onclick="return confirm('Delete this Application');"> <i class="fa fa-trash"></i> </a>
                      <?php } ?>
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

        <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Change Status</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="" method="POST" accept-charset="utf-8">
                <div class="box-body">
                  <div class="form-group">
                    <input type="hidden" class="payment_id" name="payment_id" id="payment_id" value="">
                  </div>
                  <div class="row w-100 m-0">
                    <div class="form-group col-md-12 ">
                      <input type="text" class="form-control form-control-sm" name="pay_rec_by" id="pay_rec_by" title="Received By" placeholder="Received By" required>
                    </div>
                    <div class="form-group col-md-12 ">
                      <select class="form-control form-control-sm" name="payment_status" id="payment_status">
                        <option value="">Select Status</option>
                        <option value="Uncleared">Uncleared</option>
                        <option value="Clear">Clear</option>
                      </select>
                    </div>
                    <label class="text-red" id="error_name">  </label>
                  </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" id="save_status" class="btn btn-primary">Save changes</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
  <!-- /.modal -->

      </div><!-- /.container-fluid -->
    </section>
  </div>


  <script type="text/javascript">
    $(".pay_status").click(function(){
      var payment_id = $(this).attr('id');
      var payment_status = $(this).attr('name');
      var pay_rec_by = $(this).attr('received');

      $(".payment_id").val(payment_id);
      $("#payment_status").val(payment_status);
      $("#pay_rec_by").val(pay_rec_by);
    });

    $("#save_status").click(function(){
    var payment_id = $("#payment_id").val();
    var payment_status = $("#payment_status").val();
    var pay_rec_by = $("#pay_rec_by").val();
    if(payment_status == ''){
      $('#error_name').show();
      $('#error_name').html("Select Status");
    } else {
      // alert(payment_status);
      $('#error_name').hide();

      $.ajax({
        url: '<?php echo base_url(); ?>Transaction/update_rec_status',
        type: "POST",
        data: { "payment_id":payment_id,
                "payment_status":payment_status,
                "pay_rec_by":pay_rec_by
               },
        success: function (result) {
            window.location.href = "<?php echo base_url().'Transaction/receipt_list'; ?>";
        }
      });
    }
  });

  </script>
</body>
</html>
