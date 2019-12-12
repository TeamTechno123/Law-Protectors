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
            <h4>Branch Wise Collection Report</h4>
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
                  <div class="form-group col-md-4 offset-md-2">
                    <input type="text" class="form-control form-control-sm" name="from_date" id="date1" data-target="#date1" data-toggle="datetimepicker" title="From Date" placeholder="From Date" required>
                    <label class="text-red"> <?php echo form_error('from_date'); ?> </label>
                  </div>
                  <div class="form-group col-md-4">
                    <input type="text" class="form-control form-control-sm" name="to_date" id="date2" data-target="#date2" data-toggle="datetimepicker" title="To Date"  placeholder="To Date" required>
                    <label class="text-red"> <?php echo form_error('from_date'); ?> </label>
                  </div>
                  <div class="form-group col-md-4 offset-md-2">
                    <select class="form-control select2 form-control-sm" title="Select Company" name="party_id" id="party_id" required>
                      <option selected="selected" value="" >Select Company Name </option>
                    </select>
                  </div>
                  <div class="form-group col-md-4 ">
                    <select class="form-control select2 form-control-sm" title="Select Branch" name="item_info_id" id="item_info_id" required>
                      <option selected="selected">Select Branch</option>
                    </select>
                  </div>
                  <div class="col-md-10 w-100 text-center mb-3">
                      <button type="submit" class="btn btn-success btn-sm">View</button>
                      <button type="submit" class="btn btn-default btn-sm ml-4">Cancel</button>
                  </div>

                </form>

                <br><br><br>

                    <section style="width:100%;" class="invoice" id="print_invoice">
                      <!-- title row -->

                  <div class="row">
                    <div class="col-12 table-responsive">
                      <table class="table table-botttom"  width="100%">
                        <style media="print">
                        table {
                          border-collapse: collapse!important;
                          Width:100%!important;
                        }
                        table, tr, td, th{
                          border: 1px solid #000;
                          margin-left: auto;
                          margin-right: auto;
                          padding: 5px;
                        }
                      </style>
                      <style media="screen">
                        table {
                          border-collapse: collapse!important;
                          Width:100%!important;
                          margin-bottom: 0px!important;
                        }
                        .table thead th{
                            border: 1px solid #000;
                        }
                        table, tr, td, th{
                          border: 1px solid #000;
                          margin-left: auto;
                          margin-right: auto;
                          padding: 5px;
                        }
                      </style>
                        <thead>
                          <th> <p style="text-align:center">Sr. No.</p> </th>
                          <th> <p style="text-align:center">Company Name</p> </th>
                          <th> <p style="text-align:center">Branch </p> </th>
                          <th> <p style="text-align:center">Total Collection</p> </th>
                          <th> <p style="text-align:center">Total LP</p> </th>
                          <th> <p style="text-align:center">Total Govt.</p> </th>
                          <th> <p style="text-align:center">Total B2B</p> </th>
                          <th> <p style="text-align:center">Total TDS</p> </th>
                          </thead>
                        <tbody>
                          <tr>
                            <td> <p style="text-align:center">1</p></td>
                            <td> <p style="text-align:center">Lawprotectors</p></td>
                            <td> <p style="text-align:center">Pune</p></td>
                            <td> <p style="text-align:center">500000</p></td>
                            <td> <p style="text-align:center">1500</p></td>
                            <td> <p style="text-align:center">35000</p></td>
                            <td> <p style="text-align:center">50000</p></td>
                            <td> <p style="text-align:center">5000</p></td>
                          </tr>

                      </tbody>
                    </table>
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



  <script type="text/javascript">
    // Get Item Info on Select...


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
