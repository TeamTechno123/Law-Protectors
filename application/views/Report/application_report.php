<!DOCTYPE html>
<html>
<?php
$page = "party_list";
$user_roll = $this->session->userdata('roll_id');
$law_user_id = $this->session->userdata('law_user_id');
$user_info = $this->User_Model->get_info_arr('user_id', $law_user_id, 'law_user');
$roll_info = $this->User_Model->get_info_arr('roll_id', $user_roll, 'law_roll');
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
            <h4>Application List With Status Report</h4>
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
                    <label class="text-red"> <?php echo form_error('to_date'); ?> </label>
                  </div>

                <?php if(isset($user_roll) && ($user_roll != 3 && $user_roll != 4)){ ?>
                  <div class="form-group col-md-8 offset-md-2 drop-sm">
                    <select class="form-control select2 form-control-sm"  data-placeholder="Select Manager" title="Select Manager" name="manager_id" id="manager_id">
                      <option selected="selected" value="" >Select Manager </option>
                      <?php if(isset($user_roll) && ($user_roll == 1 || $user_roll == 5)){
                      foreach ($manager_list as $list) { ?>
                      <option value="<?php echo $list->user_id; ?>"><?php echo $list->user_name; ?></option>
                      <?php } } elseif ($user_roll == 2){ ?>
                        <option selected value="<?php echo $user_info[0]['user_id']; ?>"><?php echo $user_info[0]['user_name'].' '.$user_info[0]['user_lastname']; ?></option>
                      <?php } ?>
                   </select>
                  </div>
                  <div class="form-group col-md-8 offset-md-2 drop-sm">
                    <select class="form-control select2 form-control-sm" data-placeholder="Select Branch" title="Select Branch" name="branch_id" id="branch_id">
                      <option selected="selected"  value="">Select Branch</option>
                    </select>
                  </div>
                <?php } ?>


                  <div class="form-group col-md-4 offset-md-2">
                    <select class="form-control select2 form-control-sm" data-placeholder="Select RC" title="Select RC" name="rc_id" id="rc_id">
                      <option selected="selected"  value="">Select RC</option>
                      <?php  if ($user_roll == 3){ ?>
                        <option selected value="<?php echo $user_info[0]['user_id']; ?>"><?php echo $user_info[0]['user_name'].' '.$user_info[0]['user_lastname']; ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="form-group col-md-4">
                    <select class="form-control select2 form-control-sm" data-placeholder="Select TC" title="Select TC" name="tc_id" id="tc_id">
                      <option selected="selected"  value="">Select TC</option>
                      <?php  if ($user_roll == 4){ ?>
                        <option selected value="<?php echo $user_info[0]['user_id']; ?>"><?php echo $user_info[0]['user_name'].' '.$user_info[0]['user_lastname']; ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="form-group col-md-4 offset-md-2 drop-sm">
                    <select class="form-control select2 form-control-sm" title="Select Service / Product" name="service_id" id="service_id">
                      <option selected="selected"  value="">Select Service / Product</option>
                      <?php foreach ($service_list as $list) { ?>
                      <option value="<?php echo $list->service_id; ?>"><?php echo $list->service_name; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-4 drop-sm">
                    <select class="form-control select2 form-control-sm" title="Select Status" name="status_name" id="status_name">
                      <option selected="selected" value="">Select Status</option>
                      <option >Open</option>
                      <option >In Process</option>
                      <option >Ready To File</option>
                      <option >Filed Application</option>
                      <option >Application Closed</option>
                    </select>
                  </div>

                  <div class="form-group col-md-4 offset-md-2">
                    <select class="form-control select2 form-control-sm" data-placeholder="Select Report Type" title="Select Report Type" name="report_type" id="report_type">
                      <option selected="selected">Application Report</option>
                      <option >Application Collection Report</option>
                    </select>
                  </div>

                  <div class="col-md-12 w-100 text-center">
                      <button type="submit" class="btn btn-success btn-sm">View</button>
                      <a href="" class="btn btn-default btn-sm ml-4">Cancel</a>
                  </div>
                </form>
                <br><br><br>

                <?php if(isset($application_report)){ ?>
                <section style="width:100%;" class="invoice" id="print_invoice">
                  <div class="row">
                    <div class="col-12 table-responsive" id="result_tbl">

                      <?php if($report_type == 'Application Report'){ ?>
                      <table class="table table-botttom" id="exp_tbl" width="100%">
                        <style media="print">
                        #result_tbl table {
                          border-collapse: collapse!important;
                          Width:100%!important;
                        }
                        #result_tbl table, #result_tbl tr, #result_tbl td, #result_tbl th{
                          border: 1px solid #000;
                          margin-left: auto;
                          margin-right: auto;
                          padding: 5px;
                        }
                      </style>
                      <style media="screen">
                        #result_tbl table {
                          border-collapse: collapse!important;
                          Width:100%!important;
                          margin-bottom: 0px!important;
                        }
                        #result_tbl .table thead th{
                            border: 1px solid #000;
                        }
                        #result_tbl table, #result_tbl tr, #result_tbl td, #result_tbl th{
                          border: 1px solid #000;
                          margin-left: auto;
                          margin-right: auto;
                          padding: 5px;
                        }
                      </style>
                      <thead>
                        <tr>
                          <td colspan="9">From : <?php echo $from_date2; ?> To : <?php echo $to_date2; ?> </td>
                        </tr>
                        <?php if(isset($manager_id2) && $manager_id2 != ''){ ?>
                          <tr>
                            <td colspan="5">Manager :
                              <?php foreach ($manager_list as $list) {
                                if($manager_id2 == $list->user_id){
                                  echo $list->user_name.' '.$list->user_lastname;
                                }
                              } ?>
                           </td>
                           <td colspan="4">Branch :
                             <?php foreach ($branch_list as $list) {
                               if($branch_id2 == $list->branch_id){
                                 echo $list->branch_name;
                               }
                             } ?>
                          </td>
                          </tr>
                        <?php } ?>
                        <?php if(isset($service_id2) && $service_id2 != ''){ ?>
                          <tr>
                            <td colspan="5">Service :
                              <?php foreach ($service_list as $list) {
                                if($service_id2 == $list->service_id){
                                  echo $list->service_name;
                                }
                              } ?>
                           </td>
                           <td colspan="4">Status :
                             <?php echo $status_name2; ?>
                          </td>
                          </tr>
                        <?php } ?>

                        <th> <p style="text-align:center">Sr. No.</p> </th>
                        <th> <p style="text-align:center">Appl<sup>n</sup> No. </p> </th>
                        <th> <p style="text-align:center">Appl<sup>n</sup> date</p> </th>
                        <th> <p style="text-align:center">Branch</p> </th>
                        <th> <p style="text-align:center">Service</p> </th>
                        <th> <p style="text-align:center">Org<sup>n</sup> Type</p> </th>
                        <th> <p style="text-align:center">Org<sup>n</sup> Name</p> </th>
                        <th> <p style="text-align:center">Appl<sup>nt</sup> Name</p> </th>
                        <th> <p style="text-align:center">Status</p> </th>
                      </thead>
                      <tbody>
                        <?php $i = 0;
                        foreach ($application_report_list as $details) {
                          $i++;
                          $service_id = $details->service_id;
                          ?>
                        <tr>
                          <?php //echo print_r($details).'<br><br>'; ?>
                          <td> <p style="text-align:center"><?php echo $i; ?></p></td>
                          <td> <p style="text-align:center"><?php echo $details->application_no; ?></p></td>
                          <td> <p style="text-align:center"><?php echo $details->application_date; ?></p></td>
                          <td> <p style="text-align:center"><?php echo $details->branch_name; ?></p></td>
                          <td> <p style="text-align:center"><?php echo $details->service_name; ?></p></td>
                          <td> <p style="text-align:center"><?php echo $details->organization_name; ?></p></td>
                          <?php if($service_id == 1){ ?>
                            <td> <p style="text-align:center"><?php echo $details->ORGANIZATION; ?></p></td>
                            <td> <p style="text-align:center"><?php echo $details->NAME; ?></p></td>
                          <?php } elseif ($service_id == 2) { ?>
                            <td> <p style="text-align:center"><?php echo $details->org_name; ?></p></td>
                            <td> <p style="text-align:center"><?php echo $details->appl_name; ?></p></td>
                          <?php } else{ ?>
                            <td> <p style="text-align:center"><?php echo $details->appl_org_name; ?></p></td>
                            <td> <p style="text-align:center"><?php echo $details->appl_org_name; ?></p></td>
                          <?php } ?>
                          <td> <p style="text-align:center"><?php echo $details->application_status; ?></p></td>
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                  <?php } else{ ?>
                    <table class="table table-botttom" id="exp_tbl" width="100%">
                      <style media="print">
                      #result_tbl table {
                        border-collapse: collapse!important;
                        Width:100%!important;
                      }
                      #result_tbl table, #result_tbl tr, #result_tbl td, #result_tbl th{
                        border: 1px solid #000;
                        margin-left: auto;
                        margin-right: auto;
                        padding: 5px;
                      }
                    </style>
                    <style media="screen">
                      #result_tbl table {
                        border-collapse: collapse!important;
                        Width:100%!important;
                        margin-bottom: 0px!important;
                      }
                      #result_tbl .table thead th{
                          border: 1px solid #000;
                      }
                      #result_tbl table, #result_tbl tr, #result_tbl td, #result_tbl th{
                        border: 1px solid #000;
                        margin-left: auto;
                        margin-right: auto;
                        padding: 5px;
                      }
                    </style>
                    <thead>
                      <tr>
                        <td colspan="12">From : <?php echo $from_date2; ?> To : <?php echo $to_date2; ?> </td>
                      </tr>
                      <?php if(isset($manager_id2) && $manager_id2 != ''){ ?>
                        <tr>
                          <td colspan="6">Manager :
                            <?php foreach ($manager_list as $list) {
                              if($manager_id2 == $list->user_id){
                                echo $list->user_name.' '.$list->user_lastname;
                              }
                            } ?>
                         </td>
                         <td colspan="6">Branch :
                           <?php foreach ($branch_list as $list) {
                             if($branch_id2 == $list->branch_id){
                               echo $list->branch_name;
                             }
                           } ?>
                        </td>
                        </tr>
                      <?php } ?>
                      <?php if(isset($service_id2) && $service_id2 != ''){ ?>
                        <tr>
                          <td colspan="6">Service :
                            <?php foreach ($service_list as $list) {
                              if($service_id2 == $list->service_id){
                                echo $list->service_name;
                              }
                            } ?>
                         </td>
                         <td colspan="6">Status :
                           <?php echo $status_name2; ?>
                        </td>
                        </tr>
                      <?php } ?>

                      <th> <p style="text-align:center">Sr. No.</p> </th>
                      <th> <p style="text-align:center">Appl<sup>n</sup> No. </p> </th>
                      <th> <p style="text-align:center">Appl<sup>n</sup> date</p> </th>
                      <th> <p style="text-align:center">Org<sup>n</sup> Name</p> </th>
                      <th> <p style="text-align:center">Appl<sup>nt</sup> Name</p> </th>

                      <th> <p style="text-align:center">Total Clear</p> </th>
                      <th> <p style="text-align:center">Total Unclear</p> </th>

                      <th> <p style="text-align:center">Total LP</p> </th>
                      <th> <p style="text-align:center">Total Govt.</p> </th>
                      <th> <p style="text-align:center">Total GST</p> </th>
                      <th> <p style="text-align:center">Total B2B</p> </th>
                      <th> <p style="text-align:center">Total TDS</p> </th>
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
                      $tot_clear_amt = 0;
                      $tot_unclear_amt = 0;
                      foreach ($application_report_list as $details) {
                        $i++;
                        $service_id = $details->service_id;
                        $appl_id = $details->appl_id;

                        $payments = $this->Report_Model->get_application_report_amt($appl_id,$from_date2,$to_date2);

                        $payments_clear = $this->Report_Model->get_application_report_amt_clear($appl_id,$from_date2,$to_date2);

                        $payments_unclear = $this->Report_Model->get_application_report_amt_unclear($appl_id,$from_date2,$to_date2);




                        if($payments_clear){
                          foreach ($payments_clear as $payments1) {

                            $clear_amt = $payments1->RECEVIEDAMOUNT;
                            $GSTAMOUNT = $payments1->GSTAMOUNT;
                            $LP_AMOUNT = $payments1->LP_AMOUNT;
                            $GOVT_FEES = $payments1->GOVT_FEES;
                            $GSTAMOUNT = $payments1->GSTAMOUNT;
                            $B2B = $payments1->B2B;
                            $TDS = $payments1->TDS;
                          }
                        }
                        else{
                          $clear_amt = 0;
                          $GSTAMOUNT = 0;
                          $LP_AMOUNT = 0;
                          $GOVT_FEES = 0;
                          $GSTAMOUNT = 0;
                          $B2B = 0;
                          $TDS = 0;
                        }

                        if($payments_unclear){
                          foreach ($payments_unclear as $payments2) {
                            $unclear_amt = $payments2->RECEVIEDAMOUNT;
                          }
                        }
                        else{
                          $unclear_amt = 0;
                        }

                        $tot_clear_amt = $tot_clear_amt + $clear_amt;
                        $tot_LP_AMOUNT = $tot_LP_AMOUNT + $LP_AMOUNT;
                        $tot_GOVT_FEES = $tot_GOVT_FEES + $GOVT_FEES;
                        $tot_GSTAMOUNT = $tot_GSTAMOUNT + $GSTAMOUNT;
                        $tot_B2B = $tot_B2B + $B2B;
                        $tot_TDS = $tot_TDS + $TDS;
                        $tot_unclear_amt = $tot_unclear_amt + $unclear_amt;
                        ?>
                      <tr>
                        <?php //echo print_r($details).'<br><br>'; ?>
                        <td> <p style="text-align:center"><?php echo $i; ?> <?php //echo $appl_id; ?></p></td>
                        <td> <p style="text-align:center"><?php echo $details->application_no; ?></p></td>
                        <td> <p style="text-align:center"><?php echo $details->application_date; ?></p></td>
                        <?php if($service_id == 1){ ?>
                          <td> <p style="text-align:center"><?php echo $details->ORGANIZATION; ?></p></td>
                          <td> <p style="text-align:center"><?php echo $details->NAME; ?></p></td>
                        <?php } elseif ($service_id == 2) { ?>
                          <td> <p style="text-align:center"><?php echo $details->org_name; ?></p></td>
                          <td> <p style="text-align:center"><?php echo $details->appl_name; ?></p></td>
                        <?php } else{ ?>
                          <td> <p style="text-align:center"><?php echo $details->appl_org_name; ?></p></td>
                          <td> <p style="text-align:center"><?php echo $details->appl_org_name; ?></p></td>
                        <?php } ?>

                        <td> <p style="text-align:center"><?php echo $clear_amt; ?></p></td>
                        <td> <p style="text-align:center"><?php echo $unclear_amt; ?></p></td>

                        <td> <p style="text-align:center"><?php echo $LP_AMOUNT; ?></p></td>
                        <td> <p style="text-align:center"><?php echo $GOVT_FEES; ?></p></td>
                        <td> <p style="text-align:center"><?php echo $GSTAMOUNT; ?></p></td>
                        <td> <p style="text-align:center"><?php echo $B2B; ?></p></td>
                        <td> <p style="text-align:center"><?php echo $TDS; ?></p></td>

                      </tr>
                    <?php } ?>
                    <tr>
                      <?php //echo print_r($details).'<br><br>'; ?>
                      <td colspan="5"> <p style="text-align:center"> Total </p></td>


                      <td> <p style="text-align:center"><?php echo $tot_clear_amt; ?></p></td>
                      <td> <p style="text-align:center"><?php echo $tot_unclear_amt; ?></p></td>

                      <td> <p style="text-align:center"><?php echo $tot_LP_AMOUNT; ?></p></td>
                      <td> <p style="text-align:center"><?php echo $tot_GOVT_FEES; ?></p></td>
                      <td> <p style="text-align:center"><?php echo $tot_GSTAMOUNT; ?></p></td>
                      <td> <p style="text-align:center"><?php echo $tot_B2B; ?></p></td>
                      <td> <p style="text-align:center"><?php echo $tot_TDS; ?></p></td>

                    </tr>
                    </tbody>
                  </table>
                <?php } ?>

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
    // })
    //Branch List By Manager... On Page Load...
    $(document).ready(function(){
      var manager_id =  $('#manager_id').find("option:selected").val();
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

    // Branch List on select Manager..
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

    function Export() {
      $("#exp_tbl").table2excel({
        filename: "Application_Report.xls"
      });
    }
  </script>
</body>
</html>
