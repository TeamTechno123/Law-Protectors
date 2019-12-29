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
            <h4><?php if(isset($title)){ echo $title; } ?> : Step Two</h4>
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
              <form role="form" action="<?php echo base_url(); ?>/Transaction/save_process_step_two" method="post">
                <input type="hidden" name="application_id" value="<?php echo $application_id; ?>">
                <input type="hidden" name="organization_id" value="<?php echo $organization_id; ?>">
                <input type="hidden" name="payment_id" value="<?php echo $payment_id; ?>">

                <div class="card-body row">

                  <div class=" col-md-6 ">
                    <label for="" class=""> BASIC AMOUNT :</label>
                  </div>
                  <div class=" col-md-6 ">
                    <label for="" class=""> GST AMOUNT : </label>
                  </div>
                  <div class="form-group col-md-6 ">
                    <input type="text" class="form-control form-control-sm" name="CONTRACTAMOUNT" id="CONTRACTAMOUNT" value="<?php if(isset($CONTRACTAMOUNT)){ echo $CONTRACTAMOUNT;} ?>" title="Contract Final Amount" placeholder="Basic Amount" required>
                  </div>
                  <div class="form-group col-md-6 ">
                    <input type="text" class="form-control form-control-sm" name="GSTAMOUNT" id="GSTAMOUNT" value="<?php if(isset($GSTAMOUNT) && $GSTAMOUNT != 0){ echo $GSTAMOUNT;} ?>" title="GST Amount" placeholder="GST Amount">
                  </div>

                  <div class=" col-md-6 ">
                    <label for="" class=""> TOTAL CONTRACT AMOUNT :</label>
                  </div>
                  <div class=" col-md-6 ">
                    <label for="" class=""> RECEIVED AMOUNT : </label>
                  </div>

                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="TOTALAMOUNT" id="TOTALAMOUNT" value="<?php if(isset($TOTALAMOUNT) && $TOTALAMOUNT != 0){ echo $TOTALAMOUNT;} ?>" title="Total Amount" placeholder="Total Contract Amount">
                  </div>
                  <div class="form-group col-md-6 ">
                    <input type="number" class="form-control form-control-sm" name="RECEVIEDAMOUNT" id="RECEVIEDAMOUNT" value="<?php if(isset($RECEVIEDAMOUNT) && $RECEVIEDAMOUNT != 0){ echo $RECEVIEDAMOUNT;} ?>" title="Received Amount" placeholder="Received Amount">
                  </div>

                <div class=" col-md-6 ">
                    <label for="" class=""> BALANCE AMOUNT :</label>
                  </div>
                  <div class=" col-md-6 ">
                    <label for="" class=""> GST NUMBER : </label>
                  </div>

                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="BALANCEAMOUNT" id="BALANCEAMOUNT" value="<?php if(isset($BALANCEAMOUNT) && $BALANCEAMOUNT != 0){ echo $BALANCEAMOUNT;} ?>" title="Balance Amount" placeholder="Balance Amount">
                  </div>
                  <div class="form-group col-md-6 ">
                    <input type="text" class="form-control form-control-sm" name="GSTNUMBER" id="GSTNUMBER" value="<?php if(isset($GSTNUMBER)){ echo $GSTNUMBER;} ?>" title="GST Number" placeholder="GST Number">
                  </div>

                    <div class=" col-md-6 ">
                    <label for="" class=""> LP AMOUNT :</label>
                  </div>
                  <div class=" col-md-6 ">
                    <label for="" class=""> GOVT FEES : </label>
                  </div>

                  <div class="form-group col-md-6 ">
                    <input type="text" class="form-control form-control-sm" name="LP_AMOUNT" id="LP_AMOUNT" value="<?php if(isset($LP_AMOUNT)){ echo $LP_AMOUNT;} ?>" title="LP Amount" placeholder="LP Amount" required>
                  </div>

                  <div class="form-group col-md-6 ">
                    <input type="text" class="form-control form-control-sm" name="GOVT_FEES" id="GOVT_FEES" value="<?php if(isset($GOVT_FEES)){ echo $GOVT_FEES;} ?>" title="Govt Fees" placeholder="Govt Fees" >
                  </div>

                  <div class=" col-md-6 ">
                    <label for="" class=""> TDS AMOUNT :</label>
                  </div>
                  <div class=" col-md-6 ">
                    <label for="" class=""> B2B AMOUNT : </label>
                  </div>
                  <div class="form-group col-md-6 ">
                    <input type="text" class="form-control form-control-sm" name="TDS" id="TDS" value="<?php if(isset($TDS) && $TDS != 0){ echo $TDS;} ?>" title="TDS" placeholder="TDS">
                  </div>
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
                    <label for="" ><b></b>Cheque Details : </b></label>
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

                   <div class=" col-md-12 ">
                    <label for="" class=""> GROUND OF CONTRACT :</label>
                  </div>

                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="GROUNDOFCONTRACT" id="GROUNDOFCONTRACT" value="<?php if(isset($GROUNDOFCONTRACT)){ echo $GROUNDOFCONTRACT;} ?>" title="Enter Ground Of Contract" placeholder="Enter Ground Of Contract">
                  </div>

                  <div class="form-group col-md-6"></div>
                  <br>
                  <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary  mr-3">Update & Next</button>
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
<script type="text/javascript">

</script>
</body>
</html>
