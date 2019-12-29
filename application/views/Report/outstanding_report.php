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
            <h4>Outstanding  Report</h4>
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
                  <div class="form-group col-md-4 offset-md-2 ">
                    <input type="text" class="form-control form-control-sm" name="from_date" id="date1" data-target="#date1" data-toggle="datetimepicker" title="From Date" placeholder="From Date" required>
                    <label class="text-red"> <?php echo form_error('from_date'); ?> </label>
                  </div>
                  <div class="form-group col-md-4 ">
                    <input type="text" class="form-control form-control-sm" name="to_date" id="date2" data-target="#date2" data-toggle="datetimepicker" title="To Date"  placeholder="To Date" required>
                    <label class="text-red"> <?php echo form_error('from_date'); ?> </label>
                  </div>
                  <!-- <div class="form-group col-md-8 offset-md-2">
                    <select class="form-control select2 form-control-sm" data-placeholder="Select Company Name"  title="Select Company" name="company_id" id="company_id" required>
                      <option selected="selected" value="" >Select Company Name </option>
                      <?php foreach ($company_list as $list) { ?>
                      <option value="<?php echo $list->company_id; ?>" <?php if(isset($company_id)){ if($list->company_id == $company_id){ echo "selected"; } }  ?>><?php echo $list->company_name; ?></option>
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
                      <?php foreach ($manager_list as $list) { ?>
                      <option value="<?php echo $list->user_id; ?>" ><?php echo $list->user_name.' '.$list->user_lastname; ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="form-group col-md-4">
                    <select class="form-control select2 form-control-sm" data-placeholder="Select TC" title="Select TC" name="tc_id" id="tc_id">
                      <option selected="selected"  value="">Select TC</option>
                      <!-- <?php foreach ($branch_list as $list) { ?>
                      <option value="<?php echo $list->branch_id; ?>"><?php echo $list->branch_name; ?></option>
                      <?php } ?> -->
                    </select>
                  </div>

                  <div class="form-group col-md-8 offset-md-2">
                    <select class="form-control select2 form-control-sm" data-placeholder ="Select Service / Product" title="Select Service / Product" name="service_id" id="service_id">
                      <option selected="selected"  value="">Select Service / Product</option>
                      <?php foreach ($service_list as $list) { ?>
                      <option value="<?php echo $list->service_id; ?>" ><?php echo $list->service_name; ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="col-md-12 w-100 text-center">
                    <button type="submit" class="btn btn-success btn-sm">View</button>
                    <button type="submit" class="btn btn-default btn-sm ml-4">Cancel</button>
                  </div>
                </form>
                <br><br><br>
                <?php if(isset($outstanding_report)){ ?>
                <section style="width:100%;" class="invoice" id="print_invoice">
                      <!-- title row -->
                  <div class="row">
                    <div class="col-md-12">
                        <p style="text-align:center; font-size:18px;"> Outstanding Report </p>
                    </div>
                    <div class="col-md-12">
                        <p class="mb-0" style="text-align:center; font-size:18px;"> From : <?php echo $from_date; ?> To : <?php echo $to_date; ?> </p>
                    </div>
                    <style media="print">
                    .table-responsive table {
                      border-collapse: collapse!important;
                      Width:100%!important;
                    }
                    .table-responsive table, .table-responsive tr, .table-responsive td, .table-responsive th{
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
                    .table-responsive table, .table-responsive tr, .table-responsive td, .table-responsive th{
                      border: 1px solid #000;
                      margin-left: auto;
                      margin-right: auto;
                      padding: 5px;
                    }
                    </style>
                    <div class="col-12 table-responsive" id="result_tbl">
                      <?php
                      if(isset($report_type) && $report_type == 'branchwise'){
                        if(isset($manager_id) && $manager_id != ''){
                           foreach ($manager_list as $list) {
                              if($manager_id == $list->user_id){
                                echo '<p style="text-align:center"> Manager Name : '.$list->user_name.' '.$list->user_lastname.' </p>';
                              }
                            }
                        }
                        // $branch_list = $this->User_Model->get_list($company_id2,'branch_id','ASC','law_branch');
                        if(isset($manager_id) && $manager_id != ''){
                          $branch_list = $this->Transaction_Model->get_branch_by_manager($manager_id);;
                        } else {
                          $branch_list = $this->User_Model->get_list2('branch_id','ASC','law_branch');
                        }

                        foreach ($branch_list as $branch_list1) {
                          $branch_id2 = $branch_list1->branch_id;
                      ?>
                      <br>
                      <table class="table table-botttom" id="exp_tbl" width="100%" >
                        <thead>


                          <tr>
                            <th colspan="10"><p style="text-align:center"> Branch Name : <?php echo $branch_list1->branch_name; ?> </p> </th>
                          </tr>
                          <tr>
                            <th> <p style="text-align:center">Sr. No.</p> </th>
                            <th> <p style="text-align:center">Service Name</th>
                            <th> <p style="text-align:center">Contract Total</th>
                            <th> <p style="text-align:center">Recieved Total</p> </th>
                            <th> <p style="text-align:center">Balance Total</p> </th>
                            <th> <p style="text-align:center">Total LP</p> </th>
                            <th> <p style="text-align:center">GOVT Fee</p> </th>
                            <th> <p style="text-align:center">GST</p> </th>
                            <th> <p style="text-align:center">B2B</p> </th>
                            <th> <p style="text-align:center">TDS</p> </th>
                          </tr>
                          </thead>
                          <tbody>
                            <?php
                            $outstanding_report_list = $this->Report_Model->outstanding_branch_wise_report_list($from_date,$to_date,$company_id2,$branch_id2,$service_id);
                            ?>
                            <?php $i = 0;
                            $tot_CONTRACTAMOUNT = 0;
                            $tot_RECEVIEDAMOUNT = 0;
                            $tot_GSTAMOUNT = 0;
                            $tot_LP_AMOUNT = 0;
                            $tot_GOVT_FEES = 0;
                            $tot_GSTAMOUNT = 0;
                            $tot_B2B = 0;
                            $tot_TDS = 0;
                            $tot_bal = 0;
                            foreach ($outstanding_report_list as $details) {
                              $i++;
                              $bal = $details->CONTRACTAMOUNT - $details->RECEVIEDAMOUNT;
                              $tot_CONTRACTAMOUNT = $tot_CONTRACTAMOUNT + $details->CONTRACTAMOUNT;
                              $tot_RECEVIEDAMOUNT = $tot_RECEVIEDAMOUNT + $details->RECEVIEDAMOUNT;
                              $tot_LP_AMOUNT = $tot_LP_AMOUNT + $details->LP_AMOUNT;
                              $tot_GOVT_FEES = $tot_GOVT_FEES + $details->GOVT_FEES;
                              $tot_GSTAMOUNT = $tot_GSTAMOUNT + $details->GSTAMOUNT;
                              $tot_B2B = $tot_B2B + $details->B2B;
                              $tot_TDS = $tot_TDS + $details->TDS;
                              $tot_bal = $tot_bal + $bal;
                              ?>
                            <tr>
                              <?php //echo print_r($details).'<br><br>'; ?>
                              <td> <p style="text-align:center"><?php echo $i; ?></p></td>
                              <td> <p style="text-align:center"><?php echo $details->service_name; ?></p></td>
                              <td> <p style="text-align:center"><?php echo $details->CONTRACTAMOUNT; ?></p></td>
                              <td> <p style="text-align:center"><?php echo $details->RECEVIEDAMOUNT; ?></p></td>
                              <td> <p style="text-align:center"><?php echo $bal; ?></p></td>
                              <td> <p style="text-align:center"><?php echo $details->LP_AMOUNT; ?></p></td>
                              <td> <p style="text-align:center"><?php echo $details->GOVT_FEES; ?></p></td>
                              <td> <p style="text-align:center"><?php echo $details->GSTAMOUNT; ?></p> </p></td>
                              <td> <p style="text-align:center"><?php echo $details->B2B; ?></p></td>
                              <td> <p style="text-align:center"><?php echo $details->TDS; ?></p></td>
                            </tr>
                          <?php } ?>
                          <tr>
                            <td colspan="3"><p style="text-align:center"> <b>Total : </b> </p></td>
                            <td><p style="text-align:center"><?php echo $tot_RECEVIEDAMOUNT; ?></p></td>
                            <td><p style="text-align:center"><?php echo $tot_bal; ?></p></td>
                            <td><p style="text-align:center"><?php echo $tot_LP_AMOUNT; ?></p></td>
                            <td><p style="text-align:center"><?php echo $tot_GOVT_FEES; ?></p></td>
                            <td><p style="text-align:center"><?php echo $tot_GSTAMOUNT; ?></p></td>
                            <td><p style="text-align:center"><?php echo $tot_B2B; ?></p></td>
                            <td><p style="text-align:center"><?php echo $tot_TDS; ?></p></td>
                          </tr>

                          </tbody>
                          </table>
                      <?php } } ?>
                      <?php if(isset($report_type) && ($report_type == 'servicewise' || $report_type == 'service') ){
                        // echo $branch_id;
                        $branch_details = $this->User_Model->get_info('branch_id', $branch_id, 'law_branch');
                        foreach ($branch_details as $branch_details1) {
                          $branch_name = $branch_details1->branch_name;
                        }
                        ?>
                        <table class="table table-botttom" id="exp_tbl" width="100%">
                          <thead>
                            <?php if(isset($manager_id) && $manager_id != ''){ ?>
                              <tr>
                                <td colspan="10">
                                  <?php foreach ($manager_list as $list) {
                                    if($manager_id == $list->user_id){
                                      echo '<p style="text-align:center"> Manager : '.$list->user_name.' '.$list->user_lastname.' </p>';
                                    }
                                  } ?>
                               </td>
                              </tr>
                            <?php } ?>

                            <tr>
                              <th colspan="10"><p style="text-align:center"> Branch Name : <?php echo $branch_name; ?> </p> </th>
                            </tr>
                            <?php if($report_type == 'service'){
                              $service_details = $this->User_Model->get_info('service_id', $service_id, 'law_service');
                              foreach ($service_details as $service_details1) {
                                $service_name = $service_details1->service_name;
                              }
                              ?>
                              <th colspan="10"><p style="text-align:center"> Service Name : <?php echo $service_name; ?> </p> </th>
                            <?php } ?>
                            <tr>
                              <th> <p style="text-align:center">Sr. No.</p> </th>
                              <th> <p style="text-align:center">Service Name</th>
                              <th> <p style="text-align:center">Contract Total</th>
                              <th> <p style="text-align:center">Recieved Total</p> </th>
                              <th> <p style="text-align:center">Balance Total</p> </th>
                              <th> <p style="text-align:center">Total LP</p> </th>
                              <th> <p style="text-align:center">GOVT Fee</p> </th>
                              <th> <p style="text-align:center">GST</p> </th>
                              <th> <p style="text-align:center">B2B</p> </th>
                              <th> <p style="text-align:center">TDS</p> </th>
                            </tr>
                            </thead>
                          <tbody>
                            <?php $i = 0;
                            $tot_CONTRACTAMOUNT = 0;
                            $tot_RECEVIEDAMOUNT = 0;
                            $tot_GSTAMOUNT = 0;
                            $tot_LP_AMOUNT = 0;
                            $tot_GOVT_FEES = 0;
                            $tot_GSTAMOUNT = 0;
                            $tot_B2B = 0;
                            $tot_TDS = 0;
                            $tot_bal = 0;
                            foreach ($outstanding_service_wise_report as $details) {
                              $i++;
                              $bal = $details->CONTRACTAMOUNT - $details->RECEVIEDAMOUNT;
                              $tot_CONTRACTAMOUNT = $tot_CONTRACTAMOUNT + $details->CONTRACTAMOUNT;
                              $tot_RECEVIEDAMOUNT = $tot_RECEVIEDAMOUNT + $details->RECEVIEDAMOUNT;
                              $tot_LP_AMOUNT = $tot_LP_AMOUNT + $details->LP_AMOUNT;
                              $tot_GOVT_FEES = $tot_GOVT_FEES + $details->GOVT_FEES;
                              $tot_GSTAMOUNT = $tot_GSTAMOUNT + $details->GSTAMOUNT;
                              $tot_B2B = $tot_B2B + $details->B2B;
                              $tot_TDS = $tot_TDS + $details->TDS;
                              $tot_bal = $tot_bal + $bal;
                              ?>
                            <tr>
                              <?php //echo print_r($details).'<br><br>'; ?>
                              <td> <p style="text-align:center"><?php echo $i; ?></p></td>
                              <td> <p style="text-align:center"><?php echo $details->service_name; ?></p></td>
                              <td> <p style="text-align:center"><?php echo $details->CONTRACTAMOUNT; ?></p></td>
                              <td> <p style="text-align:center"><?php echo $details->RECEVIEDAMOUNT; ?></p></td>
                              <td> <p style="text-align:center"><?php echo $bal; ?></p></td>
                              <td> <p style="text-align:center"><?php echo $details->LP_AMOUNT; ?></p></td>
                              <td> <p style="text-align:center"><?php echo $details->GOVT_FEES; ?></p></td>
                              <td> <p style="text-align:center"><?php echo $details->GSTAMOUNT; ?></p> </p></td>
                              <td> <p style="text-align:center"><?php echo $details->B2B; ?></p></td>
                              <td> <p style="text-align:center"><?php echo $details->TDS; ?></p></td>
                            </tr>
                            <tr>

                            </tr>
                          <?php } ?>
                          <tr>
                            <td colspan="3"><p style="text-align:center"> <b>Total : </b> </p></td>
                            <td><p style="text-align:center"><?php echo $tot_RECEVIEDAMOUNT; ?></p></td>
                            <td><p style="text-align:center"><?php echo $tot_bal; ?></p></td>
                            <td><p style="text-align:center"><?php echo $tot_LP_AMOUNT; ?></p></td>
                            <td><p style="text-align:center"><?php echo $tot_GOVT_FEES; ?></p></td>
                            <td><p style="text-align:center"><?php echo $tot_GSTAMOUNT; ?></p></td>
                            <td><p style="text-align:center"><?php echo $tot_B2B; ?></p></td>
                            <td><p style="text-align:center"><?php echo $tot_TDS; ?></p></td>
                          </tr>
                        </tbody>
                      </table>
                      <?php } ?>
                      <!-- /.row -->
                    <!-- this row will not appear when printing -->
                </div>
            <!-- /.card-body -->
              </div>
            </section>
            <div class="row no-print">
              <div class="col-12">
                <br><br>
                <!-- <a href="<?php echo base_url() ?>Report/stock_report_print" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a> -->
                <a onclick='printDiv();' class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                <input type="button" name="export" id="export_excel" onclick="Export()" class="btn btn-primary" value="Export to Excel">
              </div>
            </div>
            <?php } ?>
          <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>


<script src="<?php echo base_url(); ?>assets/js/table2excel.js"></script>
  <script type="text/javascript">
    // Get Branch Info on Select...
    // $('#company_id').on('change',function(){
    //   var company_id = $(this).val();
    //   $.ajax({
    //     url:'<?php echo base_url(); ?>Transaction/get_branch_by_company',
    //     type: 'POST',
    //     data: {"company_id":company_id},
    //     context: this,
    //     success: function(result){
    //       $('#branch_id').html(result);
    //     }
    //   });
    // });

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
    })

    function printDiv()
    {
      var divToPrint=document.getElementById('print_invoice');
      var newWin=window.open('','Print-Window');
      newWin.document.open();
      newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
      newWin.document.close();
      setTimeout(function(){newWin.close();},10);
    }

    function Export() {
      $("#exp_tbl").table2excel({
        filename: "Outstanding_Report.xls"
      });
    }
  </script>
</body>
</html>
