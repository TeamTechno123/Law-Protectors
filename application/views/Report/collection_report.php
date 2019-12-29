<!DOCTYPE html>
<html>
<?php
$page = "party_list";
?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 mt-1 text-center">
            <h4>Collection Report</h4>
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
            <!-- /.card-header -->
            <div class="card-body" >
              <form role="form" method="post" autocomplete="off">
                <div class="card-body row">
                  <div class="form-group col-md-8  offset-md-2">
                    <select class="form-control select2 " name="target_id" id="target_id" title="Select Target" style="width: 100%;" <?php if(isset($update)){ echo 'disabled'; } else{ echo 'required'; } ?>>
                      <option selected="selected" value="" >Select Target </option>
                      <?php foreach ($target_list as $list) { ?>
                      <option value="<?php echo $list->target_id; ?>" ><?php echo $list->target_title; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <!-- <div class="form-group col-md-8 offset-md-2">
                    <select class="form-control select2 form-control-sm" data-placeholder="Select Company Name" title="Select Company" name="company_id" id="company_id">
                      <option selected="selected" value="" >Select Company Name </option>
                      <?php foreach ($company_list as $list) { ?>
                      <option value="<?php echo $list->company_id; ?>" ><?php echo $list->company_name; ?></option>
                      <?php } ?>
                    </select>
                  </div> -->
                  <div class="form-group col-md-4 offset-md-2">
                    <select class="form-control select2 form-control-sm" data-placeholder="Select Manager" title="Select Manager" name="manager_id" id="manager_id">
                      <option selected="selected"  value="">Select Manager</option>
                      <?php foreach ($manager_list as $list) { ?>
                      <option value="<?php echo $list->user_id; ?>" ><?php echo $list->user_name.' '.$list->user_lastname; ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="form-group col-md-4">
                    <select class="form-control select2 form-control-sm" data-placeholder="Select Branch" title="Select Branch" name="branch_id" id="branch_id">
                      <option selected="selected"  value="">Select Branch</option>
                      <!-- <?php foreach ($branch_list as $list) { ?>
                      <option value="<?php echo $list->branch_id; ?>"><?php echo $list->branch_name; ?></option>
                      <?php } ?> -->
                    </select>
                  </div>
                  
                  
                  <div class="form-group col-md-4 offset-md-2">
                    <select class="form-control select2 form-control-sm" data-placeholder="Select RC" title="Select RC" name="rc_id" id="rc_id">
                      <option selected="selected"  value="">Select RC</option>
                      
                    </select>
                  </div>

                  <div class="form-group col-md-4">
                    <select class="form-control select2 form-control-sm" data-placeholder="Select TC" title="Select TC" name="tc_id" id="tc_id">
                      <option selected="selected"  value="">Select TC</option>
                      
                    </select>
                  </div>

                  <!-- <div class="form-group col-md-4 offset-md-2">
                    <select class="form-control select2 form-control-sm" data-placeholder="Select RC" title="Select RC" name="rc_id" id="rc_id">
                      <option selected="selected"  value="">Select RC</option>
                    </select>
                  </div>
                  <div class="form-group col-md-4 ">
                    <select class="form-control select2 form-control-sm" data-placeholder="Select TC" title="Select TC" name="tc_id" id="tc_id">
                      <option selected="selected"  value="">Select TC</option>
                    </select>
                  </div> -->

                  <div class="col-md-10 w-100 text-center mb-3">
                      <button type="submit" class="btn btn-success btn-sm">View</button>
                      <button type="submit" class="btn btn-default btn-sm ml-4">Cancel</button>
                  </div>
                </form>

                <br><br><br>
                    <section style="width:100%;" class="invoice" id="print_invoice">
                      <!-- title row -->
                  <div class="row">
                    <div class="col-md-12">
                        <p style="text-align:center; font-size:18px;"> Collection Report </p>
                    </div>
                    <div class="col-12 table-responsive" id="result_tbl">
                      <style media="print">
                    .table-responsive table {
                        border-collapse: collapse!important;
                        Width:100%!important;
                      }
                    .table-responsive table, #result_tbl tr, #result_tbl td, #result_tbl th{
                        border: 1px solid #000;
                        margin-left: auto;
                        margin-right: auto;
                        padding: 5px;
                      }
                    </style>
                    <style media="screen">
                    .table-responsive table {
                        border-collapse: collapse!important;
                        Width:100%!important;
                        margin-bottom: 0px!important;
                      }
                    .table-responsive .table thead th{
                          border: 1px solid #000;
                      }
                    .table-responsive table, #result_tbl tr, #result_tbl td, #result_tbl th{
                        border: 1px solid #000;
                        margin-left: auto;
                        margin-right: auto;
                        padding: 5px;
                      }
                    </style>

                    <?php if(isset($report_type) && $report_type == 'branchwise'){
                      if(isset($manager_id) && $manager_id != ''){
                        $branch_list = $this->Transaction_Model->get_branch_by_manager($manager_id);;
                      } else {
                        $branch_list = $this->User_Model->get_list2('branch_id','ASC','law_branch');
                      }


                      // $company_info = $this->User_Model->get_info('company_id', $company_id2, 'law_company');
                      //
                      // foreach ($company_info as $company_info1) {
                      //  $company_name = $company_info1->company_name;
                      // }
                      ?>
                      <table class="table table-botttom" id="exp_tbl" width="100%">
                        <thead>
                          <!-- <tr>
                            <th colspan="10"><p style="text-align:center"> Company Name : <?php echo $company_name; ?> </p> </th>
                          </tr> -->
                          <tr>
                            <th colspan="10"><p style="text-align:center">Target Range  : <?php echo $from_date; ?> To <?php echo $to_date; ?></p> </th>
                          </tr>

                          <tr>
                            <th> <p style="text-align:center">Sr. No.</p> </th>
                            <th> <p style="text-align:center">Branch Name </p> </th>
                            <th> <p style="text-align:center">Target</p> </th>
                            <th> <p style="text-align:center">Contract Total</p> </th>
                            <th> <p style="text-align:center">Total Collection</p> </th>
                            <th> <p style="text-align:center">Total LP</p> </th>
                            <th> <p style="text-align:center">Total Govt.</p> </th>
                            <th> <p style="text-align:center">Total GST</p> </th>
                            <th> <p style="text-align:center">Total B2B</p> </th>
                            <th> <p style="text-align:center">Total TDS</p> </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $tot_target = 0;
                          $tot_CONTRACTAMOUNT = 0;
                          $tot_RECEVIEDAMOUNT = 0;
                          $tot_GSTAMOUNT = 0;
                          $tot_LP_AMOUNT = 0;
                          $tot_GOVT_FEES = 0;
                          $tot_GSTAMOUNT = 0;
                          $tot_B2B = 0;
                          $tot_TDS = 0;
                          $sr_no = 0;
                          foreach ($branch_list as $branch_list1) {
                            $sr_no++;
                            $branch_id2 = $branch_list1->branch_id;
                            $target_amount = $this->Report_Model->get_target_amount($branch_id2,$target_id);
                            if($target_amount){ $target_amt = $target_amount[0]['target_amount']; }
                            else{ $target_amt = 0; }
                            $payments = $this->Report_Model->get_target_report_amt($branch_id2,$from_date,$to_date);
                            if($payments){
                              foreach ($payments as $payments1) {
                                $CONTRACTAMOUNT = $payments1->CONTRACTAMOUNT;
                                $RECEVIEDAMOUNT = $payments1->RECEVIEDAMOUNT;
                                $GSTAMOUNT = $payments1->GSTAMOUNT;
                                $LP_AMOUNT = $payments1->LP_AMOUNT;
                                $GOVT_FEES = $payments1->GOVT_FEES;
                                $GSTAMOUNT = $payments1->GSTAMOUNT;
                                $B2B = $payments1->B2B;
                                $TDS = $payments1->TDS;
                              }
                            }
                            else{
                              $CONTRACTAMOUNT = 0;
                              $RECEVIEDAMOUNT = 0;
                              $GSTAMOUNT = 0;
                              $LP_AMOUNT = 0;
                              $GOVT_FEES = 0;
                              $GSTAMOUNT = 0;
                              $B2B = 0;
                              $TDS = 0;
                            }
                            $tot_target = $tot_target + $target_amt;
                            $tot_CONTRACTAMOUNT = $tot_CONTRACTAMOUNT + $CONTRACTAMOUNT;
                            $tot_RECEVIEDAMOUNT = $tot_RECEVIEDAMOUNT + $RECEVIEDAMOUNT;
                            $tot_LP_AMOUNT = $tot_LP_AMOUNT + $LP_AMOUNT;
                            $tot_GOVT_FEES = $tot_GOVT_FEES + $GOVT_FEES;
                            $tot_GSTAMOUNT = $tot_GSTAMOUNT + $GSTAMOUNT;
                            $tot_B2B = $tot_B2B + $B2B;
                            $tot_TDS = $tot_TDS + $TDS;
                          ?>
                          <tr>
                            <td> <p style="text-align:center"><?php echo $sr_no; ?></p></td>
                            <td> <p style="text-align:center"><?php echo $branch_list1->branch_name; ?></p></td>
                            <td> <p style="text-align:center"><?php echo $target_amt; ?></p></td>
                            <td> <p style="text-align:center"><?php echo $CONTRACTAMOUNT; ?></p></td>
                            <td> <p style="text-align:center"><?php echo $RECEVIEDAMOUNT; ?></p></td>
                            <td> <p style="text-align:center"><?php echo $LP_AMOUNT; ?></p></td>
                            <td> <p style="text-align:center"><?php echo $GOVT_FEES; ?></p></td>
                            <td> <p style="text-align:center"><?php echo $GSTAMOUNT; ?></p></td>
                            <td> <p style="text-align:center"><?php echo $B2B; ?></p></td>
                            <td> <p style="text-align:center"><?php echo $TDS; ?></p></td>
                          </tr>
                          <?php  } ?>
                          <td colspan="2"> <p style="text-align:center"> <b>Total</b> </p></td>
                          <td> <p style="text-align:center"><?php echo $tot_target; ?></p></td>
                          <td> <p style="text-align:center"><?php echo $tot_CONTRACTAMOUNT; ?></p></td>
                          <td> <p style="text-align:center"><?php echo $tot_RECEVIEDAMOUNT; ?></p></td>
                          <td> <p style="text-align:center"><?php echo $tot_LP_AMOUNT; ?></p></td>
                          <td> <p style="text-align:center"><?php echo $tot_GOVT_FEES; ?></p></td>
                          <td> <p style="text-align:center"><?php echo $tot_GSTAMOUNT; ?></p></td>
                          <td> <p style="text-align:center"><?php echo $tot_B2B; ?></p></td>
                          <td> <p style="text-align:center"><?php echo $tot_TDS; ?></p></td>
                        </tbody>
                      </table>
                    <?php  } ?>

                    <?php if(isset($report_type) && $report_type == 'userwise'){



                      $user_list = $this->Report_Model->get_user_target_list2($branch_id,$target_id,$rc_id,$tc_id);
                      $branch_info = $this->User_Model->get_info('branch_id', $branch_id, 'law_branch');
                      
                    //   echo print_r($user_list).'<br><br>';
                      
                      
                      // $company_info = $this->User_Model->get_info('company_id', $company_id2, 'law_company');
                      foreach ($branch_info as $branch_info1) {
                       $branch_name = $branch_info1->branch_name;
                      }
                      // foreach ($company_info as $company_info1) {
                      //  $company_name = $company_info1->company_name;
                      // }
                      ?>
                    <table class="table table-botttom" id="exp_tbl" width="100%">
                      <tbody>
                        <tr>
                          <th colspan="11"><p style="text-align:center">Target Range  : <?php echo $from_date; ?> To <?php echo $to_date; ?></p> </th>
                        </tr>
                        <!-- <tr>
                          <th colspan="11"><p style="text-align:center"> Company Name : <?php echo $company_name; ?> </p> </th>
                        </tr> -->
                        <tr>
                          <th colspan="11"><p style="text-align:center"> Branch Name : <?php echo $branch_name; ?> </p> </th>
                        </tr>
                        <tr>
                          <th> <p style="text-align:center">Sr. No.</p> </th>
                          <th> <p style="text-align:center">Role Name </p> </th>
                          <th> <p style="text-align:center">Name Of Employee </p> </th>
                          <th> <p style="text-align:center">Target</p> </th>
                          <th> <p style="text-align:center">Contract Total</p> </th>
                          <th> <p style="text-align:center">Total Collection</p> </th>
                          <th> <p style="text-align:center">Total LP</p> </th>
                          <th> <p style="text-align:center">Total Govt.</p> </th>
                          <th> <p style="text-align:center">Total GST</p> </th>
                          <th> <p style="text-align:center">Total B2B</p> </th>
                          <th> <p style="text-align:center">Total TDS</p> </th>
                        </tr>
                        <?php

                        $i=0;
                        $tot_target = 0;
                        $tot_CONTRACTAMOUNT = 0;
                        $tot_RECEVIEDAMOUNT = 0;
                        $tot_GSTAMOUNT = 0;
                        $tot_LP_AMOUNT = 0;
                        $tot_GOVT_FEES = 0;
                        $tot_GSTAMOUNT = 0;
                        $tot_B2B = 0;
                        $tot_TDS = 0;
                        foreach ($user_list as $user_list1) {
                          $i++;
                          $user_id = $user_list1->user_id;
                          $roll_id = $user_list1->roll_id;
                          $target_amount = $user_list1->target_amount;
                          $user_amount = $this->Report_Model->get_target_report_by_user_amt($user_id,$from_date,$to_date,$roll_id);

                          if($user_amount){
                            foreach ($user_amount as $user_amount1) {
                              $CONTRACTAMOUNT = $user_amount1->CONTRACTAMOUNT;
                              $RECEVIEDAMOUNT = $user_amount1->RECEVIEDAMOUNT;
                              $GSTAMOUNT = $user_amount1->GSTAMOUNT;
                              $LP_AMOUNT = $user_amount1->LP_AMOUNT;
                              $GOVT_FEES = $user_amount1->GOVT_FEES;
                              $GSTAMOUNT = $user_amount1->GSTAMOUNT;
                              $B2B = $user_amount1->B2B;
                              $TDS = $user_amount1->TDS;
                            }
                          }
                          else{
                            $CONTRACTAMOUNT = 0;
                            $RECEVIEDAMOUNT = 0;
                            $GSTAMOUNT = 0;
                            $LP_AMOUNT = 0;
                            $GOVT_FEES = 0;
                            $GSTAMOUNT = 0;
                            $B2B = 0;
                            $TDS = 0;
                          }
                          $tot_target = $tot_target + $target_amount;
                          $tot_CONTRACTAMOUNT = $tot_CONTRACTAMOUNT + $CONTRACTAMOUNT;
                          $tot_RECEVIEDAMOUNT = $tot_RECEVIEDAMOUNT + $RECEVIEDAMOUNT;
                          $tot_GSTAMOUNT = $tot_GSTAMOUNT + $GSTAMOUNT;
                          $tot_LP_AMOUNT = $tot_LP_AMOUNT + $LP_AMOUNT;
                          $tot_GOVT_FEES = $tot_GOVT_FEES + $GOVT_FEES;
                          $tot_GSTAMOUNT = $tot_GSTAMOUNT + $GSTAMOUNT;
                          $tot_B2B = $tot_B2B + $B2B;
                          $tot_TDS = $tot_TDS + $TDS;

                         ?>
                        <tr>
                          <td> <p style="text-align:center"><?php echo $i; ?></p></td>
                          <td> <p style="text-align:center"><?php echo $user_list1->roll_name; ?></p></td>
                          <td> <p style="text-align:center"><?php echo $user_list1->user_name.' '.$user_list1->user_lastname; ?></p></td>
                          <td> <p style="text-align:center"><?php echo $user_list1->target_amount; ?></p></td>

                          <td> <p style="text-align:center"><?php echo $CONTRACTAMOUNT; ?></p></td>
                          <td> <p style="text-align:center"><?php echo $RECEVIEDAMOUNT; ?></p></td>
                          <td> <p style="text-align:center"><?php echo $LP_AMOUNT; ?></p></td>
                          <td> <p style="text-align:center"><?php echo $GOVT_FEES; ?></p></td>
                          <td> <p style="text-align:center"><?php echo $GSTAMOUNT; ?></p></td>
                          <td> <p style="text-align:center"><?php echo $B2B; ?></p></td>
                          <td> <p style="text-align:center"><?php echo $TDS; ?></p></td>

                        </tr>
                      <?php } ?>
                        <tr>
                          <td colspan="3"> <p style="text-align:center"> <b>Total</b> </p></td>
                          <td> <p style="text-align:center"><?php echo $tot_target; ?></p></td>
                          <td> <p style="text-align:center"><?php echo $tot_CONTRACTAMOUNT; ?></p></td>
                          <td> <p style="text-align:center"><?php echo $tot_RECEVIEDAMOUNT; ?></p></td>
                          <td> <p style="text-align:center"><?php echo $tot_LP_AMOUNT; ?></p></td>
                          <td> <p style="text-align:center"><?php echo $tot_GOVT_FEES; ?></p></td>
                          <td> <p style="text-align:center"><?php echo $tot_GSTAMOUNT; ?></p></td>
                          <td> <p style="text-align:center"><?php echo $tot_B2B; ?></p></td>
                          <td> <p style="text-align:center"><?php echo $tot_TDS; ?></p></td>
                        </tr>
                    </tbody>
                    </table>
                  <?php } ?>



                      <!-- /.row -->
                    </section>
                    <br><br>
                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                      <div class="col-12">
                        <br><br>
                        <!-- <a href="<?php echo base_url() ?>Report/stock_report_print" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a> -->
                        <a onclick='printDiv();' class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                      </div>
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


  <script src="<?php echo base_url(); ?>assets/js/table2excel.js"></script>
  <script type="text/javascript">
    // Get Item Info on Select...
    $('#manager_id').on('change',function(){
      var manager_id = $(this).val();
      $.ajax({
        url:'<?php echo base_url(); ?>Transaction/get_branch_by_manager',
        type: 'POST',
        data: {"manager_id":manager_id},
        context: this,
        success: function(result){
          $('#branch_id').html(result);
        }
      });
    });
    
    $('#branch_id').on('change',function(){
      var branch_id = $(this).val();
      $.ajax({
        url:'<?php echo base_url(); ?>Transaction/get_users_by_branch_rel',
        type: 'POST',
        data: {"branch_id":branch_id},
        context: this,
        success: function(result){
          var data = JSON.parse(result)
          // $('#manager_id').html(data['manager']);
          $('#rc_id').html('<option selected="selected"  value="">Select RC</option>'+data['rc']);
          $('#tc_id').html('<option selected="selected"  value="">Select TC</option>'+data['tc']);
        }
      });
    });
    
    $('#rc_id').on('change',function(){
        var rc_id = $(this).val();
        if(rc_id != ''){
            // alert();
            $('#tc_id').attr('disabled',true);
        }
    });
    
    $('#tc_id').on('change',function(){
        var tc_id = $(this).val();
        if(tc_id != ''){
            // alert();
            $('#rc_id').attr('disabled',true);
        }
    });
    
    function printDiv()
    {
      var divToPrint=document.getElementById('print_invoice');
      var newWin=window.open('','Print-Window');
      newWin.document.open();
      newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
      newWin.document.close();
      setTimeout(function(){newWin.close();},10);
    }
  </script>
</body>
</html>
