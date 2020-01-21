<!DOCTYPE html>
<html>
<?php
$page = "step_2";
?>
<style media="screen">
   label{
    font-weight: 400!important;
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
          <div class="col-sm-12 mt-1 text-center">
            <h4>Payment Reciept</h4>
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
            <div class="card">
            <!-- /.card-header -->
            <div class="card-body" >
              <form role="form" method="post" autocomplete="off">
                <div class="card-body row">

                  <div class="form-group col-md-6 ">
                    <input type="text" class="form-control form-control-sm" name="payment_no" id="payment_no" value="<?php if(isset($payment_no) ){ echo $payment_no;} ?>" title="Payment Reciept No." placeholder="Payment Reciept No." readonly required>
                  </div>
                  <div class="form-group col-md-6 ">
                    <input type="text" class="form-control form-control-sm" name="payment_date" value="<?php if(isset($payment_date)){ echo $payment_date;} else{ echo date('d-m-Y'); } ?>"  id="date2" data-target="#date2" data-toggle="datetimepicker"  title="Reciept Date" placeholder="Reciept Date">
                  </div>

                  <div class=" col-md-12 ">
                    <label for="" class=""> SELECT APPLICATION :</label>
                  </div>
                  <div class="form-group col-md-12 drop-sm">
                    <select class="form-control select2 form-control-sm" title="Select Application" name="application_id" id="application_id" required>
                      <option selected="selected" value="" >Select Application </option>
                      <?php foreach ($application_list as $list) {
                        $service_id = $list->service_id;
                      ?>
                      <option value="<?php echo $list->appl_id; ?>" <?php if(isset($application_id)){ if($list->appl_id == $application_id){ echo "selected"; } }  ?>>
                        <?php echo $list->application_no; ?>
                        [Org :
                        <?php if($service_id == 1){ ?>
                          <td><?php echo $list->ORGANIZATION; ?></td>
                        <?php } elseif ($service_id == 2) { ?>
                          <td><?php echo $list->org_name; ?></td>
                        <?php } else{ ?>
                          <td><?php echo $list->appl_org_name; ?></td>
                        <?php } ?>
                        ] [Appl :
                        <?php if($service_id == 1){ ?>
                          <td><?php echo $list->NAME; ?></td>
                        <?php } elseif ($service_id == 2) { ?>
                          <td><?php echo $list->appl_name; ?></td>
                        <?php } else{ ?>
                          <td><?php echo $list->appl_org_name; ?></td>
                        <?php } ?>
                        ]
                      </option>
                      <?php } ?>
                    </select>
                  </div>



                  <div class="form-group col-md-6 ">
                    <label class="text-success">Contract Amount : <span class="contract_amount"><?php if(isset($contract_amount)){ echo $contract_amount;} ?></span> </label>
                  </div>
                  <div class="form-group col-md-6 ">
                    <label class="text-danger">Outstanding Amount : <span class="outstanding_amount"><?php if(isset($outstanding_amount)){ echo $outstanding_amount;} ?></span> </label>
                  </div>

                  <div class=" col-md-6 ">
                    <label for="" class=""> RECEIVED AMOUNT :</label>
                  </div>
                  <div class=" col-md-6 ">
                    <label for="" class=""> GST AMOUNT : </label>
                  </div>

                  <div class="form-group col-md-6 ">
                    <input type="number" class="form-control form-control-sm" name="RECEVIEDAMOUNT" id="RECEVIEDAMOUNT" value="<?php if(isset($RECEVIEDAMOUNT) && $RECEVIEDAMOUNT != 0){ echo $RECEVIEDAMOUNT;} ?>" title="Received Amount" placeholder="Received Amount" required>
                  </div>
                  <div class="form-group col-md-6 ">
                    <input type="text" class="form-control form-control-sm" name="GSTAMOUNT" id="GSTAMOUNT" value="<?php if(isset($GSTAMOUNT) && $GSTAMOUNT != 0){ echo $GSTAMOUNT;} ?>" title="GST Amount" placeholder="GST Amount">
                  </div>

                  <div class=" col-md-6 ">
                    <label for="" class=""> BALANCE AMOUNT :</label>
                  </div>
                  <div class=" col-md-6 ">
                    <label for="" class=""> LP AMOUNT : </label>
                  </div>

                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="BALANCEAMOUNT" id="BALANCEAMOUNT" value="<?php if(isset($BALANCEAMOUNT) && $BALANCEAMOUNT != 0){ echo $BALANCEAMOUNT;} ?>" title="Balance Amount" placeholder="Balance Amount">
                  </div>
                  <div class="form-group col-md-6 ">
                    <input type="text" class="form-control form-control-sm" name="LP_AMOUNT" id="LP_AMOUNT" value="<?php if(isset($LP_AMOUNT) && $LP_AMOUNT != 0){ echo $LP_AMOUNT;} ?>" title="LP Amount" placeholder="LP Amount" required>
                  </div>

                  <div class=" col-md-6 ">
                    <label for="" class=""> GOVT FEES :</label>
                  </div>
                  <div class=" col-md-6 ">
                    <label for="" class=""> TDS AMOUNT : </label>
                  </div>

                  <div class="form-group col-md-6 ">
                    <input type="text" class="form-control form-control-sm" name="GOVT_FEES" id="GOVT_FEES" value="<?php if(isset($GOVT_FEES) && $GOVT_FEES != 0){ echo $GOVT_FEES;} ?>" title="Govt Fees" placeholder="Govt Fees" required>
                  </div>
                  <div class="form-group col-md-6 ">
                    <input type="text" class="form-control form-control-sm" name="TDS" id="TDS" value="<?php if(isset($TDS) && $TDS != 0){ echo $TDS;} ?>" title="TDS" placeholder="TDS">
                  </div>

                  <div class=" col-md-6 ">
                    <label for="" class=""> B2B AMOUNT :</label>
                  </div>
                  <div class=" col-md-6 "> </div>
                  <div class="form-group col-md-6 ">
                    <input type="text" class="form-control form-control-sm" name="B2B" id="B2B" value="<?php if(isset($B2B) && $B2B != 0){ echo $B2B;} ?>" title="B2B" placeholder="B2B">
                  </div>
                  <div class="col-md-12">
                    <div class="checkbox">
                      <label>Payment Mode :
                        &nbsp;<input name="PAYMENTMODE_0" value="By Cash" <?php if(isset($PAYMENTMODE_0) && $PAYMENTMODE_0 != ''){ echo 'checked';} ?> type="checkbox"> Cash
                        &nbsp;&nbsp;&nbsp;&nbsp;<input name="PAYMENTMODE_1" value="By Cheque" <?php if(isset($PAYMENTMODE_1) && $PAYMENTMODE_1 != ''){ echo 'checked';} ?> type="checkbox"> Chaque
                      </label>
                    </div>
                  </div>
                  <br>

                  <div class="col-md-12">
                    <label for="">Cheque Details : </label>
                  </div>
                  <br>

                   <div class=" col-md-3 ">
                    <label for="" class=""> CHEQUE NUMBER :</label>
                  </div>
                  <div class=" col-md-3 ">
                    <label for="" class=""> CHEQUE DATE :</label>
                  </div>
                  <div class=" col-md-3 ">
                    <label for="" class=""> BANK NAME :</label>
                  </div>
                  <div class=" col-md-3 ">
                    <label for="" class=""> CHEQUE AMOUNT :</label>
                  </div>
                  <div class="form-group col-md-3">
                    <input type="text" class="form-control form-control-sm" name="CHEQUENUMBER" id="CHEQUENUMBER" value="<?php if(isset($CHEQUENUMBER)){ echo $CHEQUENUMBER;} ?>" title="Cheque No." placeholder="Cheque No.">
                  </div>
                  <div class="form-group col-md-3 ">
                    <input type="text" class="form-control form-control-sm" name="CHQDATE" id="date1" data-target="#date1" data-toggle="datetimepicker" value="<?php if(isset($CHQDATE)){ echo $CHQDATE;} ?>" title="Cheque Date" placeholder="Cheque Date">
                  </div>
                  <div class="form-group col-md-3 ">
                    <input type="text" class="form-control form-control-sm" name="BANKNAME" id="BANKNAME" value="<?php if(isset($BANKNAME)){ echo $BANKNAME;} ?>" title="Bank Name" placeholder="Bank Name">
                  </div>
                  <div class="form-group col-md-3 ">
                    <input type="text" class="form-control form-control-sm" name="CHEQUEAMOUNT" id="CHEQUEAMOUNT" value="<?php if(isset($CHEQUEAMOUNT) && $CHEQUEAMOUNT != 0){ echo $CHEQUEAMOUNT;} ?>" title="Amount" placeholder="Amount">
                  </div>
                  <div class="form-group col-md-6"></div>
                  <br>
                  <div class="col-md-6 offset-md-4">
                    <?php if(isset($update)){ ?> <button type="submit" class="btn btn-primary  mr-3">Update</button>
                    <?php } else{ ?> <button type="submit" class="btn btn-success  mr-3">Save</button>
                    <?php } ?>
                    <a href="#" class="btn btn-default ">Cancel</a>
                  </div>
                </div>
              </form>
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
  <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
<script type="text/javascript">
  // Get Info on Select...
  $('#application_id').on('change',function(){
    var application_id = $(this).val();
    $.ajax({
      url:'<?php echo base_url(); ?>Transaction/get_appl_amounts',
      type: 'POST',
      data: {"application_id":application_id},
      context: this,
      success: function(result){
        var data = JSON.parse(result);
        $('.outstanding_amount').text(data['outstanding_amount']);
        $('.contract_amount').text(data['contract_amount']);
      }
    });
  });

  // $('#RECEVIEDAMOUNT').change(function(){
  //   var received = $(this).val();
  //   var outstanding_amount = $('.outstanding_amount').text();
  //   if(received == ''){
  //     received = 0;
  //   }
  //   if(outstanding_amount == ''){
  //     outstanding_amount = 0;
  //   }
  //   var received = parseFloat(received);
  //   var outstanding_amount = parseFloat(outstanding_amount);
  //   if(received > outstanding_amount){
  //     toastr.error('Invalide Amount');
  //     $(this).val('');
  //   }
  // });
</script>
</body>
</html>
