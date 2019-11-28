<!DOCTYPE html>
<html>
<?php
$page = "step_2";
include('head.php');
?>
<style media="screen">
   label{
    font-weight: 400!important;
  }
</style>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <?php include('navbar.php'); ?>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <?php include('sidebar.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 mt-1 text-center">
            <h4><?php if(isset($title)){ echo $title; } ?> : STEP TWO</h4>
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
              <form role="form" action="<?php echo base_url(); ?>/Transaction/update_step_2" method="post">
                <input type="hidden" name="application_id" value="<?php echo $application_id; ?>">
                <input type="hidden" name="organization_id" value="<?php echo $organization_id; ?>">

                <div class="card-body row">
                  <div class="form-group col-md-6 ">
                    <input type="text" class="form-control form-control-sm" name="CONTRACTAMOUNT" id="CONTRACTAMOUNT" value="<?php if(isset($CONTRACTAMOUNT)){ echo $CONTRACTAMOUNT;} ?>" placeholder="Contract Final Amount">
                  </div>
                  <div class="form-group col-md-6 ">
                    <input type="text" class="form-control form-control-sm" name="GSTAMOUNT" id="GSTAMOUNT" value="<?php if(isset($GSTAMOUNT)){ echo $GSTAMOUNT;} ?>" placeholder="GST Amount">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="TOTALAMOUNT" id="TOTALAMOUNT" value="<?php if(isset($TOTALAMOUNT)){ echo $TOTALAMOUNT;} ?>" placeholder="Total Amount">
                  </div>
                  <div class="form-group col-md-6 ">
                    <input type="text" class="form-control form-control-sm" name="RECEVIEDAMOUNT" id="RECEVIEDAMOUNT" value="<?php if(isset($RECEVIEDAMOUNT)){ echo $RECEVIEDAMOUNT;} ?>" placeholder="Received Amount">
                  </div>

                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="BALANCEAMOUNT" id="BALANCEAMOUNT" value="<?php if(isset($BALANCEAMOUNT)){ echo $BALANCEAMOUNT;} ?>" placeholder="Balance Amount">
                  </div>
                  <div class="form-group col-md-6 ">
                    <input type="text" class="form-control form-control-sm" name="GSTNUMBER" id="GSTNUMBER" value="<?php if(isset($GSTNUMBER)){ echo $GSTNUMBER;} ?>" placeholder="GST Number">
                  </div>

                  <div class="col-md-12">
                    <div class="checkbox">
                      <label>Payment Mode :
                        &nbsp;<input name="PAYMENTMODE_0" value="By Cash" <?php if(isset($PAYMENTMODE_0)){ echo 'checked';} ?> type="checkbox"> Cash
                        &nbsp;&nbsp;&nbsp;&nbsp;<input name="PAYMENTMODE_1" value="By Cheque" <?php if(isset($PAYMENTMODE_1)){ echo 'checked';} ?> type="checkbox"> Chaque
                      </label>
                    </div>
                  </div>
                  <br>
                  <div class="col-md-12">
                    <label for="">Cheque Details : </label>
                  </div>
                  <br>
                  <div class="form-group col-md-3">
                    <input type="text" class="form-control form-control-sm" name="CHEQUENUMBER" id="CHEQUENUMBER" value="<?php if(isset($CHEQUENUMBER)){ echo $CHEQUENUMBER;} ?>" placeholder="Cheque No.">
                  </div>
                  <div class="form-group col-md-3 ">
                    <input type="text" class="form-control form-control-sm" name="CHQDATE" id="date1" data-target="#date1" data-toggle="datetimepicker" value="<?php if(isset($CHQDATE)){ echo $CHQDATE;} ?>" placeholder="Cheque Date">
                  </div>
                  <div class="form-group col-md-3 ">
                    <input type="text" class="form-control form-control-sm" name="BANKNAME" id="BANKNAME" value="<?php if(isset($BANKNAME)){ echo $BANKNAME;} ?>" placeholder="Bank Name ">
                  </div>
                  <div class="form-group col-md-3 ">
                    <input type="text" class="form-control form-control-sm" name="CHEQUEAMOUNT" id="CHEQUEAMOUNT" value="<?php if(isset($CHEQUEAMOUNT)){ echo $CHEQUEAMOUNT;} ?>" placeholder="Amount">
                  </div>

                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="GROUNDOFCONTRACT" id="GROUNDOFCONTRACT" value="<?php if(isset($GROUNDOFCONTRACT)){ echo $GROUNDOFCONTRACT;} ?>" placeholder="Enter Ground Of Contract">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="FILE_REF_NO" id="FILE_REF_NO" value="<?php if(isset($FILE_REF_NO)){ echo $FILE_REF_NO;} ?>" placeholder="File Reference Number">
                  </div>
                  <div class="form-group col-md-6"></div>
                  <div class="col-md-12">
                    <div class="checkbox">
                      <label>Is MSME Required :
                        &nbsp;<input name="IS_MSME_REQ" value="Yes" <?php if(isset($IS_MSME_REQ) && $IS_MSME_REQ == 'Yes'){ echo 'checked';} ?> type="radio"> Yes
                        &nbsp;&nbsp;&nbsp;&nbsp;<input name="IS_MSME_REQ" value="No" <?php if(isset($IS_MSME_REQ) && $IS_MSME_REQ == 'No'){ echo 'checked';} ?> type="radio"> No
                      </label>
                    </div>
                  </div>
                  <br>


                  <!-- <?php
                  $PROPOSED_DATE = strtotime($PROPOSED);
                  $PROPOSED_year = date('Y',$PROPOSED_DATE);
                  $curr_year = date('Y');
                  $next_year = $curr_year+1;
                  $k=0;
                  for($i=$PROPOSED_year; $i<$next_year; $i++){
                    $j = $i+1;
                  ?>
                    <div class="form-group col-md-2">
                      <input type="text" class="form-control form-control-sm" name="input['SALE_YR_AMT'][<?php echo $k; ?>]" value="<?php if(isset($SALE_YR_AMT1)){ echo $SALE_YR_AMT1;} ?>" placeholder="<?php echo $i.'-'.$j; ?>">
                    </div>
                  <?php $k++; } ?>
                   -->
                  <?php
                  $PROPOSED_DATE = strtotime($PROPOSED);
                  $PROPOSED_year = date('Y',$PROPOSED_DATE);
                  $year5 = $PROPOSED_year - 1;
                  $year4 = $PROPOSED_year - 2;
                  $year3 = $PROPOSED_year - 3;
                  $year2 = $PROPOSED_year - 4;
                  $year1 = $PROPOSED_year - 5;
                  ?>

                  <div class="col-md-12 mb-2">Sale amount year wise :  </div>
                  <div class="form-group col-md-2">
                    <input type="text" class="form-control form-control-sm" name="SALE_YR_AMT1" id="SALE_YR_AMT1" value="<?php if(isset($SALE_YR_AMT1)){ echo $SALE_YR_AMT1;} ?>" placeholder="<?php echo $year1.'-'.$year2; ?>">
                  </div>
                  <div class="form-group col-md-2">
                    <input type="text" class="form-control form-control-sm" name="SALE_YR_AMT2" id="SALE_YR_AMT2" value="<?php if(isset($SALE_YR_AMT2)){ echo $SALE_YR_AMT2;} ?>" placeholder="<?php echo $year2.'-'.$year3; ?>">
                  </div>
                  <div class="form-group col-md-2">
                    <input type="text" class="form-control form-control-sm" name="SALE_YR_AMT3" id="SALE_YR_AMT3" value="<?php if(isset($SALE_YR_AMT3)){ echo $SALE_YR_AMT3;} ?>" placeholder="<?php echo $year3.'-'.$year4; ?>">
                  </div>
                  <div class="form-group col-md-2">
                    <input type="text" class="form-control form-control-sm" name="SALE_YR_AMT4" id="SALE_YR_AMT4" value="<?php if(isset($SALE_YR_AMT4)){ echo $SALE_YR_AMT4;} ?>" placeholder="<?php echo $year4.'-'.$year5; ?>">
                  </div>
                  <div class="form-group col-md-2">
                    <input type="text" class="form-control form-control-sm" name="SALE_YR_AMT5" id="SALE_YR_AMT5" value="<?php if(isset($SALE_YR_AMT5)){ echo $SALE_YR_AMT5;} ?>" placeholder="<?php echo $year5.'-'.$PROPOSED_year; ?>">
                  </div>

                  <div class="col-md-12 mb-2">Advertisement amount year wise :  </div>
                  <div class="form-group col-md-2">
                    <input type="text" class="form-control form-control-sm" name="ADV_YR_AMT1" id="ADV_YR_AMT1" value="<?php if(isset($ADV_YR_AMT1)){ echo $ADV_YR_AMT1;} ?>" placeholder="<?php echo $year1.'-'.$year2; ?>">
                  </div>
                  <div class="form-group col-md-2">
                    <input type="text" class="form-control form-control-sm" name="ADV_YR_AMT2" id="ADV_YR_AMT2" value="<?php if(isset($ADV_YR_AMT2)){ echo $ADV_YR_AMT2;} ?>" placeholder="<?php echo $year2.'-'.$year3; ?>">
                  </div>
                  <div class="form-group col-md-2">
                    <input type="text" class="form-control form-control-sm" name="ADV_YR_AMT3" id="ADV_YR_AMT3" value="<?php if(isset($ADV_YR_AMT3)){ echo $ADV_YR_AMT3;} ?>" placeholder="<?php echo $year3.'-'.$year4; ?>">
                  </div>
                  <div class="form-group col-md-2">
                    <input type="text" class="form-control form-control-sm" name="ADV_YR_AMT4" id="ADV_YR_AMT4" value="<?php if(isset($ADV_YR_AMT4)){ echo $ADV_YR_AMT4;} ?>" placeholder="<?php echo $year4.'-'.$year5; ?>">
                  </div>
                  <div class="form-group col-md-2">
                    <input type="text" class="form-control form-control-sm" name="ADV_YR_AMT5" id="ADV_YR_AMT5" value="<?php if(isset($ADV_YR_AMT5)){ echo $ADV_YR_AMT5;} ?>" placeholder="<?php echo $year5.'-'.$PROPOSED_year; ?>">
                  </div>

                  <div class="form-group col-md-6">
                    <input type="file" class="form-control" name="" id="" placeholder="Logo">
                  </div>

                  <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary  mr-3">Update & Finish</button>
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
  <!-- /.content-wrapper -->
  <?php include('footer.php'); ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php include('script.php') ?>
<script type="text/javascript">
  $('#add_terms').click(function(){
    var terms = $('.select2-selection__choice').val();
    // var res = terms.replace("×", ",");
    // $('#txt_terms').val(res);
    alert(terms);
  });

  $('#add_row').click(function(){
    var row = '<tr><td class="sr_no">1</td>'+
              '<td><select class="form-control select2 form-control-sm" style="width: 100%;"><option selected="selected">Alabama</option></select></td>'+
              '<td><select class="form-control select2 form-control-sm" style="width: 100%;"><option selected="selected">Alabama</option></select></td>'+
              '<td><select class="form-control select2 form-control-sm" style="width: 100%;"><option selected="selected">Alabama</option></select></td>'+
              '<td><select class="form-control select2 form-control-sm" style="width: 100%;"><option selected="selected">Alabama</option></select></td>'+
              '<td><select class="form-control select2 form-control-sm" style="width: 100%;"><option selected="selected">Alabama</option></select></td>'+
              '<td><select class="form-control select2 form-control-sm" style="width: 100%;"><option selected="selected">Alabama</option></select></td>'+
              '<td><select class="form-control select2 form-control-sm" style="width: 100%;"><option selected="selected">Alabama</option></select></td>'+
              '<td class="td_w"><input type="text" class="form-control form-control-sm" name="" id="" placeholder=""></td>'+
              '<td class="td_w"><input type="text" class="form-control form-control-sm" name="" id="" placeholder=""></td>'+
              '<td class="td_w"><input type="text" class="form-control form-control-sm" name="" id="" placeholder=""></td>'+
              '<td class="td_w"><input type="text" class="form-control form-control-sm" name="" id="" placeholder=""></td>'+
              '<td class="td_btn"><a> <i class="fa fa-trash text-danger"></i> </a></td>'+
              '</tr>';
    $('#myTable').append(row);
  });

  $('#myTable').on('click', 'a', function () {
    $(this).closest('tr').remove();
  });
</script>
</body>
</html>
