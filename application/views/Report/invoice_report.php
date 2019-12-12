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
            <h4>Invoice Report</h4>
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
                    <select class="form-control select2 form-control-sm" title="Select Company" name="company_id" id="company_id" required>
                      <option selected="selected" value="" >Select Company Name </option>
                      <?php foreach ($company_list as $list) { ?>
                      <option value="<?php echo $list->company_id; ?>" <?php if(isset($company_id)){ if($list->company_id == $company_id){ echo "selected"; } }  ?>><?php echo $list->company_name; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="col-md-12 w-100 text-center mb-3">
                    <button type="submit" class="btn btn-success btn-sm">View</button>
                    <button type="submit" class="btn btn-default btn-sm ml-4">Cancel</button>
                  </div>
                </form>

                <br><br><br>
                <?php if(isset($invoice_report)){ ?>
                <section style="width:100%;" class="invoice" id="print_invoice">
                  <!-- title row -->
                  <div class="row">
                    <div class="col-12 table-responsive" id="result_tbl">
                      <table class="table table-botttom" id="exp_tbl"  width="100%">
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
                          <th> <p style="text-align:center">Sr. No.</p> </th>
                          <th> <p style="text-align:center">Bill No. </p> </th>
                          <th> <p style="text-align:center">Bill Date</p> </th>
                          <th> <p style="text-align:center">Party Name</p> </th>
                          <th> <p style="text-align:center">GST No.</p> </th>
                          <th> <p style="text-align:center">Bill Amount</p> </th>
                          <th> <p style="text-align:center">Type </p> </th>
                          <th> <p style="text-align:center">HSN Code</p> </th>
                          <th> <p style="text-align:center">Taxable Amt</p> </th>
                          <th> <p style="text-align:center">GST %</p> </th>
                          <th> <p style="text-align:center">SGST</p> </th>
                          <th> <p style="text-align:center">CGST</p> </th>
                          <th> <p style="text-align:center">IGST</p> </th>
                          <th> <p style="text-align:center">Tax Amt</p> </th>
                          <th> <p style="text-align:center">TDS Amt</p> </th>
                          </thead>
                        <tbody>
                          <?php $i = 0;
                            $tot_bill_amt = 0;
                            $tot_txbl_amt = 0;
                            $tot_cgst = 0;
                            $tot_sgst = 0;
                            $tot_igst = 0;
                            $tot_tds = 0;
                            foreach ($invoice_report_list as $details) {
                              $invoice_id = $details->invoice_id;
                              $gst_amt = $details->gst_amt;
                              $cgst = $gst_amt/2;
                              $bill_amount = $details->net_amt;
                              $txbl_amt = $details->basic_amt;
                              $tds_amt = $details->tds_amt;

                              $tot_bill_amt = $tot_bill_amt + $bill_amount;
                              $tot_txbl_amt = $tot_txbl_amt + $txbl_amt;
                              $tot_igst = $tot_igst + $gst_amt;
                              $tot_cgst = $tot_cgst + $cgst;
                              $tot_tds = $tot_tds + $tds_amt;
                              $i++;
                          ?>
                          <tr>
                            <td> <p style="text-align:center"><?php echo $i; ?></p></td>
                            <td> <p style="text-align:center"><?php echo $details->invoice_no; ?></p></td>
                            <td> <p style="text-align:center"><?php echo $details->invoice_date; ?></p></td>
                            <td> <p style="text-align:center"><?php echo $details->party; ?></p></td>
                            <td> <p style="text-align:center"><?php echo $details->GSTNUMBER; ?></p></td>
                            <td> <p style="text-align:center"><?php echo $details->net_amt; ?></p></td>
                            <td> <p style="text-align:center"><?php echo 'Sales'; ?></p></td>

                            <td><p style="text-align:center">
                              <?php $invoice_details_list = $this->Transaction_Model->invoice_details_list($invoice_id);
                                foreach ($invoice_details_list as $invoice_details) { ?>
                                <?php echo $invoice_details->hsn.'<br>'; ?>
                              <?php } ?></p>
                            </td>

                            <td> <p style="text-align:center"><?php echo $details->basic_amt; ?></p></td>
                            <td> <p style="text-align:center"><?php echo '18%'; ?></p></td>
                            <td> <p style="text-align:center"><?php echo $cgst; ?></p></td>
                            <td> <p style="text-align:center"><?php echo $cgst; ?></p></td>
                            <td> <p style="text-align:center"><?php echo $details->gst_amt; ?></p></td>
                            <td> <p style="text-align:center"><?php echo $details->gst_amt; ?></p></td>
                            <td> <p style="text-align:center"><?php echo $details->tds_amt; ?></p></td>
                          </tr>
                        <?php } ?>
                          <tr>
                            <td colspan="5"> <p style="text-align:center"> <b>Total : </b> </p></td>
                            <td colspan="3"> <p style="text-align:left"><?php echo $tot_bill_amt; ?></p></td>
                            <td colspan="2"> <p style="text-align:left"><?php echo $tot_txbl_amt; ?></p></td>
                            <td> <p style="text-align:center"><?php echo $tot_cgst; ?></p></td>
                            <td> <p style="text-align:center"><?php echo $tot_cgst; ?></p></td>
                            <td> <p style="text-align:center"><?php echo $tot_igst; ?></p></td>
                            <td> <p style="text-align:center"><?php echo $tot_igst; ?></p></td>
                            <td> <p style="text-align:center"><?php echo $tot_tds; ?></p></td>
                          </tr>
                      </tbody>
                    </table>
                      <!-- /.row -->
                    <br><br>
                    <!-- this row will not appear when printing -->
                </div>
            <!-- /.card-body -->
              </div>
            </section>
            <div class="row no-print">
              <div class="col-12">
                <br><br>
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
    // Get Item Info on Select...
    function printDiv(){
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
