<!DOCTYPE html>
<html>
<style media="screen">
  .checkbox label{
    font-weight: 400!important;
  }
</style>
<style media="screen">
   label{
    font-weight: 400!important;
    margin-bottom: 0.2rem;
  }
  .form-group{
    margin-bottom: 0.5rem;
  }
</style>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 mt-1 text-center">
            <h4><?php echo $title; ?></h4>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-10  offset-md-1">
            <!-- general form elements -->
            <div class="card">
            <!-- /.card-header -->
            <div class="card-body" >
              <form role="form" method="post" action="<?php echo base_url(); ?>/Transaction/save_other_service">
                <input type="hidden" name="application_id" value="<?php if(isset($application_id)){ echo $application_id; } ?>" >
                <input type="hidden" name="organization_id" value="<?php if(isset($organization_id)){ echo $organization_id; } ?>" >
                <input type="hidden" name="payment_id" value="<?php echo $payment_id; ?>">
                <div class="col-md-12 text-center mt-0">
                  <label><b>Payment Information</b></label>
                </div>
                <div class="card-body row">
                  <div class=" col-md-6 ">
                    <label for="" class="">Basic Amount :</label>
                  </div>
                  <div class=" col-md-6 ">
                    <label for="" class="">GST Amount : </label>
                  </div>
                  <div class="form-group col-md-6 ">
                    <input type="text" class="form-control form-control-sm" name="CONTRACTAMOUNT" id="CONTRACTAMOUNT" value="<?php if(isset($CONTRACTAMOUNT)){ echo $CONTRACTAMOUNT;} ?>" title="Contract Final Amount" placeholder="Basic Amount" required>
                  </div>
                  <div class="form-group col-md-6 ">
                    <input type="text" class="form-control form-control-sm" name="GSTAMOUNT" id="GSTAMOUNT" value="<?php if(isset($GSTAMOUNT) && $GSTAMOUNT != 0){ echo $GSTAMOUNT;} ?>" title="GST Amount" placeholder="GST Amount">
                  </div>
                  <div class=" col-md-6 ">
                    <label for="" class=""> Total Contract Amount :</label>
                  </div>
                  <div class=" col-md-6 ">
                    <label for="" class=""> Received Amount : </label>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="TOTALAMOUNT" id="TOTALAMOUNT" value="<?php if(isset($TOTALAMOUNT) && $TOTALAMOUNT != 0){ echo $TOTALAMOUNT;} ?>" title="Total Amount" placeholder="Total Contract Amount">
                  </div>
                  <div class="form-group col-md-6 ">
                    <input type="number" class="form-control form-control-sm" name="RECEVIEDAMOUNT" id="RECEVIEDAMOUNT" value="<?php if(isset($RECEVIEDAMOUNT) && $RECEVIEDAMOUNT != 0){ echo $RECEVIEDAMOUNT;} ?>" title="Received Amount" placeholder="Received Amount">
                  </div>
                  <div class=" col-md-6 ">
                    <label for="" class=""> Balance Amount :</label>
                  </div>
                  <div class=" col-md-6 ">
                    <label for="" class=""> GST Number : </label>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="BALANCEAMOUNT" id="BALANCEAMOUNT" value="<?php if(isset($BALANCEAMOUNT) && $BALANCEAMOUNT != 0){ echo $BALANCEAMOUNT;} ?>" title="Balance Amount" placeholder="Balance Amount">
                  </div>
                  <div class="form-group col-md-6 ">
                    <input type="text" class="form-control form-control-sm" name="GSTNUMBER" id="GSTNUMBER" value="<?php if(isset($GSTNUMBER)){ echo $GSTNUMBER;} ?>" title="GST Number" placeholder="GST Number">
                  </div>
                  <div class=" col-md-6 ">
                    <label for="" class=""> LP Amount :</label>
                  </div>
                  <div class=" col-md-6 ">
                    <label for="" class=""> Govt. Fees : </label>
                  </div>
                  <div class="form-group col-md-6 ">
                    <input type="text" class="form-control form-control-sm" name="LP_AMOUNT" id="LP_AMOUNT" value="<?php if(isset($LP_AMOUNT)){ echo $LP_AMOUNT;} ?>" title="LP Amount" placeholder="LP Amount" required>
                  </div>
                  <div class="form-group col-md-6 ">
                    <input type="text" class="form-control form-control-sm" name="GOVT_FEES" id="GOVT_FEES" value="<?php if(isset($GOVT_FEES)){ echo $GOVT_FEES;} ?>" title="Govt Fees" placeholder="Govt Fees" >
                  </div>
                  <div class=" col-md-6 ">
                    <label for="" class=""> TDS Amount :</label>
                  </div>
                  <div class=" col-md-6 ">
                    <label for="" class=""> B2B Amount : </label>
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
                    <label for="" class=""> Cheque Number :</label>
                  </div>
                  <div class=" col-md-3 ">
                    <label for="" class=""> Cheque Date :</label>
                  </div>
                  <div class=" col-md-3 ">
                    <label for="" class=""> Bank Name :</label>
                  </div>
                  <div class=" col-md-3 ">
                    <label for="" class=""> Cheque Amount :</label>
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
                    <label for="" class=""> Ground of Contact :</label>
                  </div>
                  <div class="form-group col-md-12 mb-0">
                    <input type="text" class="form-control form-control-sm" name="GROUNDOFCONTRACT" id="GROUNDOFCONTRACT" value="<?php if(isset($GROUNDOFCONTRACT)){ echo $GROUNDOFCONTRACT;} ?>" title="Enter Ground Of Contract" placeholder="Enter Ground Of Contract">
                  </div>
                  <div class="form-group col-md-12 mt-3">
                    <hr>
                  </div>

                  <div class="col-md-12 text-center mt-0 mb-3">
                    <label><b><?php echo $title; ?> Information</b></label>
                  </div>

                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="appl_org_name" id="appl_org_name" value="<?php if(isset($appl_org_name)){ echo $appl_org_name; } ?>" title="Name Of Organizatiom / Applicant" placeholder="Name Of Organizatiom / Applicant" required>
                  </div>
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="org_address" id="org_address" value="<?php if(isset($org_address)){ echo $org_address; } ?>" title="Regd Address Of Organizatiom / Applicant" placeholder="Regd Address Of Organizatiom / Applicant">
                  </div>
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="appl_address" id="appl_address" value="<?php if(isset($appl_address)){ echo $appl_address; } ?>" title="Regd Address Of Applicant" placeholder="Regd Address Of Applicant" required>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="appl_conatct" id="appl_conatct" value="<?php if(isset($appl_conatct)){ echo $appl_conatct; } ?>" title="Contact No." placeholder="Contact No." required>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="appl_email" id="appl_email" value="<?php if(isset($appl_email)){ echo $appl_email; } ?>" title="Email" placeholder="Email">
                  </div>
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="title_of_work" id="title_of_work" value="<?php if(isset($title_of_work)){ echo $title_of_work; } ?>" title="Title of Work" placeholder="Title of Work">
                  </div>
                  <div class=" form-group col-md-12">
                    <textarea name="req_details" id="req_details" class="form-control" title="Requirement Details" placeholder="Requirement Details" rows="6" cols="100"><?php if(isset($req_details)){ echo $req_details; } ?></textarea>
                  </div>
                <div class="form-group col-md-6">
                  <input type="text" class="form-control form-control-sm" name="other_date" id="date2" data-target="#date2" data-toggle="datetimepicker" value="<?php if(isset($other_date)){ echo $other_date; } ?>" title="Date" placeholder="Date">
                </div>
                <div class="form-group col-md-6">
                  <input type="text" class="form-control form-control-sm" name="other_place" id="other_place" value="<?php if(isset($other_place)){ echo $other_place; } ?>" title="Place" placeholder="Place">
                </div>
              </div>


                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary  mr-3">Save & Next</button>
                    <button type="submit" class="btn btn-default ">Cancel</button>
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
  <!-- /.content-wrapper -->


</body>
</html>
