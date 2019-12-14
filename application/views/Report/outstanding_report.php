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
                  <div class="form-group col-md-8 offset-md-2">
                    <select class="form-control select2 form-control-sm" data-placeholder="Select Company Name"  title="Select Company" name="company_id" id="company_id" required>
                      <option selected="selected" value="" >Select Company Name </option>
                      <?php foreach ($company_list as $list) { ?>
                      <option value="<?php echo $list->company_id; ?>" <?php if(isset($company_id)){ if($list->company_id == $company_id){ echo "selected"; } }  ?>><?php echo $list->company_name; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-8 offset-md-2">
                    <select class="form-control select2 form-control-sm" data-placeholder="Select Branch" title="Select Branch" name="branch_id" id="branch_id">
                      <option selected="selected"  value="">Select Branch</option>
                        <option  > Branch</option>
                    </select>
                  </div>


                  <div class="form-group col-md-8 offset-md-2">
                    <select class="form-control select2 form-control-sm" data-placeholder ="Select Service / Product" title="Select Service / Product" name="service_id" id="service_id">
                      <option selected="selected"  value="">Select Service / Product</option>
                      <?php foreach ($service_list as $list) { ?>
                      <option value="<?php echo $list->service_id; ?>" <?php if(isset($service_id)){ if($list->service_id == $service_id){ echo "selected"; } }  ?>><?php echo $list->service_name; ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="form-group col-md-8 offset-md-2">
                    <select class="form-control select2 form-control-sm" data-placeholder="Select Manager" title="Select Manager" name="" id="">
                      <option selected="selected"  value="">Select Manager</option>
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

                    <div class="col-12 table-responsive" id="result_tbl">
                      <table class="table table-botttom" id="exp_tbl" width="100%">
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

                        <thead>
                          <tr>
                            <th colspan="5"><p style="text-align:center">From Date : 12/12/2019 </p> </th>
                            <th colspan="5"><p style="text-align:center">To Date : 14/12/2019 </p> </th>
                          </tr>
                          <tr>
                            <th colspan="10"><p style="text-align:center"> Company Name : Lawprotectors </p> </th>
                          </tr>
                          <tr>
                            <th colspan="10"><p style="text-align:center"> Branch Name : Kolhapur </p> </th>
                          </tr>
                          <tr>
                            <th colspan="5"><p style="text-align:center"> Branch Name : Kolhapur </p> </th>
                            <th colspan="5"><p style="text-align:center"> Manager Name : Vaibhav </p> </th>
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
                          <?php $i = 0;
                          foreach ($outstanding_report_list as $details) {
                            $i++;
                            $service_id = $details->service_id;
                            ?>
                          <tr>
                            <?php //echo print_r($details).'<br><br>'; ?>
                            <td> <p style="text-align:center"><?php echo $i; ?></p></td>
                              <td> <p style="text-align:center"><?php echo $i; ?></p></td>
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
                            <td> <p style="text-align:center"><?php echo $details->TOTALAMOUNT; ?></p></td>
                            <td> <p style="text-align:center"><?php echo $details->RECEVIEDAMOUNT; ?></p></td>
                            <td> <p style="text-align:center"><?php echo $details->BALANCEAMOUNT; ?></p></td>
                          </tr>
                          <tr>

                          </tr>
                        <?php } ?>
                        <tr>
                          <td colspan="3"><p style="text-align:center"> <b>Total : </b> </p></td>
                          <td><p style="text-align:center">10000</p></td>
                          <td><p style="text-align:center">10000</p></td>
                          <td><p style="text-align:center">10000</p></td>
                          <td><p style="text-align:center">10000</p></td>
                          <td><p style="text-align:center">10000</p></td>
                          <td><p style="text-align:center">10000</p></td>
                          <td><p style="text-align:center">10000</p></td>
                        </tr>
                      </tbody>
                    </table>
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
    $('#company_id').on('change',function(){
      var company_id = $(this).val();
      $.ajax({
        url:'<?php echo base_url(); ?>Transaction/get_branch_by_company',
        type: 'POST',
        data: {"company_id":company_id},
        context: this,
        success: function(result){
          $('#branch_id').html(result);
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
