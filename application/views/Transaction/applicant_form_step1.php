<!DOCTYPE html>
<html>
<?php
$page = "step_1";
?>
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
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 mt-1 text-center">
            <h4><?php if(isset($title)){ echo $title; } ?></h4>
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
              <form role="form" action="<?php echo base_url(); ?>/Transaction/save_trademark" method="post" autocomplete="off" enctype="multipart/form-data">
                <input type="hidden" name="application_id" value="<?php echo $application_id; ?>">
                <input type="hidden" name="organization_id" value="<?php echo $organization_id; ?>">
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
                    <input type="text" class="form-control form-control-sm" name="NAME" id="NAME" value="<?php if(isset($NAME)){ echo $NAME; } ?>" title="<?php if(isset($pl_name)){ echo $pl_name; } ?>" placeholder="<?php if(isset($pl_name)){ echo $pl_name; } ?>" required>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="NATIONALITY" id="NATIONALITY" value="<?php if(isset($NATIONALITY)){ echo $NATIONALITY; } ?>" title="<?php if(isset($pl_nation)){ echo $pl_nation; } ?>" placeholder="<?php if(isset($pl_nation)){ echo $pl_nation; } ?>">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="MOBILE" id="MOBILE" value="<?php if(isset($MOBILE)){ echo $MOBILE; } ?>" placeholder="Mobile Number">
                  </div>
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="SIGN_AUTH" id="SIGN_AUTH" value="<?php if(isset($SIGN_AUTH)){ echo $SIGN_AUTH; } ?>" placeholder="Signing Authority">
                  </div>
                  <?php if(isset($organization_id) && $organization_id != 6 ){ ?>
                    <?php if(isset($organization_id) && ($organization_id == 2 || $organization_id == 3 || $organization_id == 4 || $organization_id == 8 || $organization_id == 9 ) ){ ?>
                      <div class="form-group col-md-12">
                        <input type="hidden" class="form-control form-control-sm" name="ASSOCIATION" id="ASSOCIATION" value="<?php if(isset($ASSOCIATION)){ echo $ASSOCIATION; } ?>" title="<?php if(isset($pl_association)){ echo $pl_association; } ?>" placeholder="<?php if(isset($pl_association)){ echo $pl_association; } ?>">
                      </div>
                    <?php } else{ ?>
                      <div class="form-group col-md-12">
                        <input type="hidden" class="form-control form-control-sm" name="FATHER" id="FATHER" value="<?php if(isset($FATHER)){ echo $FATHER; } ?>" title="<?php if(isset($pl_father)){ echo $pl_father; } ?>" placeholder="<?php if(isset($pl_father)){ echo $pl_father; } ?>">
                      </div>
                    <?php } ?>
                  <?php } ?>

                  <!--<div class="form-group col-md-12">-->
                  <!--  <input type="text" class="form-control form-control-sm" name="ADDRESS" id="ADDRESS" value="<?php if(isset($ADDRESS)){ echo $ADDRESS; } ?>" title="<?php if(isset($pl_res_addr)){ echo $pl_res_addr; } ?>" placeholder="<?php if(isset($pl_res_addr)){ echo $pl_res_addr; } ?>">-->
                  <!--</div>-->

                  <?php if(isset($organization_id) && $organization_id !=1  ){ ?>
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="ORGANIZATION" id="ORGANIZATION" value="<?php if(isset($ORGANIZATION)){ echo $ORGANIZATION; } ?>" title="Organization Name" placeholder="Organization Name">
                  </div>
                <?php } ?>
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="FIRMADDRESS" id="FIRMADDRESS" value="<?php if(isset($FIRMADDRESS)){ echo $FIRMADDRESS; } ?>" title="Firm Address" placeholder="Firm Address">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="STATE" id="STATE" value="<?php if(isset($STATE)){ echo $STATE; } ?>" title="State" placeholder="State">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="number" min="5" class="form-control form-control-sm" name="AGE" id="AGE" value="<?php if(isset($AGE)){ echo $AGE; } ?>" title="Age" placeholder="Age">
                  </div>


                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="BRAND" id="BRAND" value="<?php if(isset($BRAND)){ echo $BRAND; } ?>" title="Mark Brand Name To Be Registered" placeholder="Mark Brand Name To Be Registered">
                  </div>
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="SIGNIFICANCE" id="SIGNIFICANCE" value="<?php if(isset($SIGNIFICANCE)){ echo $SIGNIFICANCE; } ?>"  title="Significance of Mark" placeholder="Significance of Mark">
                  </div>
                  <div class="form-group col-md-12">
                    <input type="number" min="1" max="45" class="form-control form-control-sm" name="TM" id="TM" value="<?php if(isset($TM)){ echo $TM; } ?>" title="TM Class" placeholder="TM Class">
                  </div>

                  <div class="form-group col-md-12">
                    <div class="checkbox">
                      <label> Category of Mark :
                        <input type="checkbox" name="MARK_0" value="Word Mark" <?php if(isset($MARK_0) && $MARK_0 != ''){ echo 'checked'; } ?>> Wordmark
                        <input type="checkbox" name="MARK_1" value="Device" <?php if(isset($MARK_1) && $MARK_1 != ''){ echo 'checked'; } ?>> Device
                        <input type="checkbox" name="MARK_2" value="Color" <?php if(isset($MARK_2) && $MARK_2 != ''){ echo 'checked'; } ?>> Color
                        <input type="checkbox" name="MARK_3" value="Sound" <?php if(isset($MARK_3) && $MARK_3 != ''){ echo 'checked'; } ?>> Sound
                        <input type="checkbox" name="MARK_4" value="Three Dimentional Mark" <?php if(isset($MARK_4)  && $MARK_4 != ''){ echo 'checked'; } ?>> Three Dimentional Mark
                      </label>
                    </div>
                  </div>

                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="SERVICES" id="SERVICES" value="<?php if(isset($SERVICES)){ echo $SERVICES; } ?>" title="Goods Services Details" placeholder="Goods Services Details">
                  </div>

                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="TRADE" id="TRADE" value="<?php if(isset($TRADE)){ echo $TRADE; } ?>" title="Trade Discriptions" placeholder="Trade Discriptions" readonly>
                  </div>
                  <div class="form-group col-md-4">
                    <input type="checkbox" name="PROPOSED_TO_BE" id="PROPOSED_TO_BE" value="Proposed To Be Used" <?php if(isset($PROPOSED_TO_BE) && $PROPOSED_TO_BE != ''){ echo 'checked'; } ?>> Proposed To Be Used
                  </div>
                  <div class="form-group col-md-4">
                    <input type="text" class="form-control form-control-sm" name="PROPOSED" id="date2" data-target="#date2" data-toggle="datetimepicker" value="<?php if(isset($PROPOSED)){ echo $PROPOSED; } ?>" title="User Date Proposed to be" placeholder="User Date Proposed to be">
                  </div>
                  <div class="form-group col-md-4 ">
                    <input type="text" class="form-control form-control-sm" name="INFORMATION" id="INFORMATION" value="<?php if(isset($INFORMATION)){ echo $INFORMATION; } ?>" title="Information Provided Name" placeholder="Information Provided Name">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="DATE" id="date3" data-target="#date3" data-toggle="datetimepicker" value="<?php if(isset($DATE)){ echo $DATE; } ?>" title="Date" placeholder="Date">
                  </div>
                  <div class="form-group col-md-6 ">
                    <input type="text" class="form-control form-control-sm" name="PLACE" id="PLACE" value="<?php if(isset($PLACE)){ echo $PLACE; } ?>" placeholder="Place">
                  </div>

                  <!--<div class="form-group col-md-6">-->
                  <!--  <input type="text" class="form-control form-control-sm" name="AFF_DATE" id="date3" data-target="#date3" data-toggle="datetimepicker" value="<?php if(isset($AFF_DATE)){ echo $AFF_DATE; } ?>" title="Affidavit Date" placeholder="Affidavit Date">-->
                  <!--</div>-->
                  <div class="form-group col-md-6 ">
                    <input type="text" class="form-control form-control-sm" name="COV_DATE" id="date4" data-target="#date4" data-toggle="datetimepicker" value="<?php if(isset($COV_DATE)){ echo $COV_DATE; } ?>" title="Covering Letter Date" placeholder="Covering Letter Date">
                  </div>
                  <div class="form-group col-md-6 ">
                      </div>
                  <!--<div class="col-md-12">-->
                  <!--  <div class="checkbox">-->
                  <!--    <label>Is MSME Required :-->
                  <!--      &nbsp;<input name="IS_MSME_REQ" value="Yes" <?php if(isset($IS_MSME_REQ) && $IS_MSME_REQ == 'Yes'){ echo 'checked';} ?> type="radio"> Yes-->
                  <!--      &nbsp;&nbsp;&nbsp;&nbsp;<input name="IS_MSME_REQ" value="No" <?php if(isset($IS_MSME_REQ) && $IS_MSME_REQ == 'No'){ echo 'checked';} ?> type="radio"> No-->
                  <!--    </label>-->
                  <!--  </div>-->
                  <!--</div>-->
                  <div class="form-group col-md-4">
                    <input type="text" class="form-control form-control-sm" name="ASSOCIATE_MARK" id="ASSOCIATE_MARK" value="<?php if(isset($ASSOCIATE_MARK)){ echo $ASSOCIATE_MARK; } ?>" title="Associate of Mark" placeholder="Associate of Mark">
                  </div>
                  <div class="form-group col-md-4">
                    <input type="text" class="form-control form-control-sm" name="ADV_NAME" id="ADV_NAME" value="<?php if(isset($ADV_NAME) && $ADV_NAME != ''){ echo $ADV_NAME; } else{ echo 'Lalasaheb Anna Atole'; } ?>" title="Advocate Name" placeholder="Advocate Name" readonly>
                  </div>
                  <div class="form-group col-md-4">
                    <input type="text" class="form-control form-control-sm" name="BAR_COUN_NO" id="BAR_COUN_NO" value="<?php if(isset($BAR_COUN_NO) && $BAR_COUN_NO != ''){ echo $BAR_COUN_NO; } else{ echo 'MAH/2728/2016'; } ?>" title="Bar Council No" placeholder="Bar Council No">
                  </div>

                  <div class="form-group col-md-6">
                    <input type="file" class="form-control form-control-sm" name="LOGO" id="LOGO" title="Trademark Logo" placeholder="Trademark Logo">
                    <input type="hidden" name="old_logo" value="<?php if(isset($LOGO)){ echo $LOGO; } ?>">
                  </div>
                  <?php if(isset($LOGO) && $LOGO != ''){ ?>
                  <div class="form-group col-md-6">
                    <img style="width:150px; height:80px;" src="<?php echo base_url(); ?>assets/images/trade_logo/<?php echo $LOGO; ?>" alt="">
                  </div>
                  <?php } ?>

                  <div class="form-group col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary  mr-3">Update</button>
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
  <script type="text/javascript">
  $(document).ready(function(){
    <?php if(isset($PROPOSED_TO_BE) && $PROPOSED_TO_BE != ''){ ?>
      $('#date2').attr('readonly', true);
    <?php } else{ ?>
      $('#date2').attr('readonly', false);
    <?php } ?>
  });
  </script>
<script type="text/javascript">
  $('#PROPOSED_TO_BE').on('change',function() {
    if(this.checked) {
      $('#date2').attr('readonly', true);
    } else{
      $('#date2').attr('readonly', false);
    }
  });
  $('#TM').on('change',function() {
    var tm = parseInt($('#TM').val());
    if(tm > 0 && tm <= 34){
      $('#TRADE').val('Manufacturers and Traders');
    } else if (tm > 34 && tm <= 45) {
      $('#TRADE').val('Service Providers');
    }
  });

</script>
</body>
</html>
