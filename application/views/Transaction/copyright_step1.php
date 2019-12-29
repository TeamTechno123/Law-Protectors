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
              <form role="form" method="post" action="<?php echo base_url(); ?>/Transaction/save_copyright">
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
                    <input type="text" class="form-control form-control-sm" name="copy_title" id="copy_title" value="<?php if(isset($copy_title)){ echo $copy_title; } ?>" title="Title Of Copyright" placeholder="Title Of Copyright" required>
                  </div>
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="org_name" id="org_name" value="<?php if(isset($org_name)){ echo $org_name; } ?>" title="Name Of Organizatiom / Applicant" placeholder="Name Of Organizatiom / Applicant" required>
                  </div>
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="org_address" id="org_address" value="<?php if(isset($org_address)){ echo $org_address; } ?>" title="Regd Address Of Organizatiom / Applicant" placeholder="Regd Address Of Organizatiom / Applicant">
                  </div>
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="appl_address" id="appl_address" value="<?php if(isset($appl_address)){ echo $appl_address; } ?>" title="Regd Address Of Applicant" placeholder="Regd Address Of Applicant">
                  </div>
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="appl_name" id="appl_name" value="<?php if(isset($appl_name)){ echo $appl_name; } ?>" title="Full Name Of Propritor / Applicant " placeholder="Full Name Of Propritor / Applicant ">
                  </div>
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="nationality" id="nationality" value="<?php if(isset($nationality)){ echo $nationality; } ?>" title="Nationality Of Authorised Signatory " placeholder="Nationality Of Authorised Signatory ">
                  </div>
                  <div class=" form-group col-md-4">
                    <div class="checkbox " >
                    <label><p style="margin-bottom:5px;"> <b> Nature Of Work : </b> </p>  </label>
                    </div>
                  </div>
                  <div class="form-group col-md-8">
                    <input type="checkbox" name="work1" value="Artistic" <?php if(isset($work1) && $work1 != ''){ echo 'checked'; } ?>>&nbsp; Artistic &nbsp;&nbsp;
                    <input type="checkbox" name="work2" value="Literacy" <?php if(isset($work2) && $work2 != ''){ echo 'checked'; } ?>> Literacy &nbsp;&nbsp;
                    <input type="checkbox" name="work3" value="Cinephotography Film" <?php if(isset($work3) && $work3 != ''){ echo 'checked'; } ?>> Cinephotography Film &nbsp;&nbsp; <br>
                    <input type="checkbox"   name="work4" value="Musical Work" <?php if(isset($work4) && $work4 != ''){ echo 'checked'; } ?>>&nbsp;  Musical Work &nbsp;&nbsp;
                    <input type="checkbox"  name="work5" value="Computer Software" <?php if(isset($work5) && $work5 != ''){ echo 'checked'; } ?>>&nbsp;  Computer Software &nbsp;&nbsp;
                    <input type="checkbox"  name="work6" value="Websites" <?php if(isset($work6) && $work6 != ''){ echo 'checked'; } ?>>&nbsp; Websites &nbsp;&nbsp;
                  </div>
                  <div class="form-group col-md-4">
                    <label> <p style="margin-bottom:5px; font-size:15px;"><b>All Right Should Be Given to : </b> </p>
                  </div>
                  <div class="form-group col-md-8">
                    <div class="checkbox " >
                      <input type="checkbox" name="right1" value="Publisher" <?php if(isset($right1) && $right1 != ''){ echo 'checked'; } ?>>&nbsp; Publisher &nbsp;&nbsp;
                      <input type="checkbox" name="right2" value="Applicant" <?php if(isset($right2) && $right2 != ''){ echo 'checked'; } ?>> Applicant &nbsp;&nbsp;
                      </label>
                    </div>
                  </div>

                  <div class="form-group col-md-4">
                    <label> <p style="margin-bottom:5px;"> <b> Providing The above In the form of  : </b> </p>
                  </div>
                  <div class="form-group col-md-8">
                    <div class="checkbox " >
                      <input type="checkbox" name="pro_containt1" value="Computer" <?php if(isset($pro_containt1) && $pro_containt1 != ''){ echo 'checked'; } ?>>&nbsp; Computer Disc CD &nbsp;&nbsp;
                      <input type="checkbox" name="pro_containt2" value="Print" <?php if(isset($pro_containt2) && $pro_containt2 != ''){ echo 'checked'; } ?>> Print &nbsp;&nbsp;
                      </label>
                    </div>
                  </div>

                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="appl_age" id="appl_age" value="<?php if(isset($appl_age) && $appl_age != 0){ echo $appl_age;} ?>" title="Age" placeholder="Age">
                  </div>
                  <div class="form-group col-md-12">
                    <textarea rows="3" class="form-control form-control-sm" name="appl_details" id="appl_details" title="Name Address Of Person involve in development " placeholder="Name, Address & Designation Of All Person Involved In Development / writing Of Above"><?php if(isset($appl_details)){ echo $appl_details; } ?></textarea>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="language" id="language" value="<?php if(isset($language)){ echo $language; } ?>" title="Language Of Work" placeholder="Language Of Work">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="public_date" id="date1" data-target="#date1" data-toggle="datetimepicker"  value="<?php if(isset($public_date)){ echo $public_date; } ?>" title="Date Of Publication" placeholder="Date Of Publication">
                  </div>
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="countries" id="countries" value="<?php if(isset($countries)){ echo $countries; } ?>" title="Name Of Countries Which it is Publish" placeholder="Name Of Countries Which it is Publish">
                  </div>

                  <div class="form-group col-md-6">
                    <label> <b> Enclose 5 Copies Of Subject Matter Of Copyright </b>  : </label>
                  </div>
                  <div class="form-group col-md-6">
                    <div class="checkbox">
                      <input type="radio" name="subject_matter" value="yes" checked <?php if(isset($subject_matter) && $subject_matter != 'yes'){ echo 'checked'; }?>> Yes &nbsp;
                      <input type="radio" name="subject_matter" value="no" <?php if(isset($subject_matter) && $subject_matter != 'no'){ echo 'checked'; }?>> No
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="date" id="date2" data-target="#date2" data-toggle="datetimepicker"  value="<?php if(isset($date)){ echo $date; } ?>" title="Date" placeholder="Date">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="place" id="place" value="<?php if(isset($place)){ echo $place; } ?>" title="Place" placeholder="Place">
                  </div>

                  <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary  mr-3">Save</button>
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
