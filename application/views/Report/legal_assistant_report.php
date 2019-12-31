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
            <h4>Legal Assistant Report</h4>
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

                  <div class="form-group col-md-4 offset-md-2">
                    <select class="form-control select2 form-control-sm" data-placeholder="Select Legal Assistant" name="legal_user" id="legal_user" title="Select Legal Assistant" required>
                      <option value="" >Select Legal Assistant </option>
                      <?php if(isset($legal_user_list)){
                        foreach ($legal_user_list as $legal_user_list) { ?>
                          <option value="<?php echo $legal_user_list->user_id; ?>" ><?php echo $legal_user_list->user_name.' '.$legal_user_list->user_lastname; ?></option>
                      <?php }
                      } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <select class="form-control select2 form-control-sm" data-placeholder="Select Application Status" name="application_status" id="application_status" title="Select Application Status">
                      <option value="" >Select Application Status </option>
                      <option>Legal In Process</option>
                      <option>Pending for Legal</option>
                      <option>Legal Completed</option>
                    </select>
                  </div>
                  <div class="col-md-12 w-100 text-center mb-3">
                    <button type="submit" class="btn btn-success btn-sm">View</button>
                    <button type="submit" class="btn btn-default btn-sm ml-4">Cancel</button>
                  </div>
                </form>

                <br><br><br>
                <?php if(isset($legal_report)){ ?>

                <section style="width:100%;" class="invoice" id="print_legal">
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
                          text-align: center;
                        }
                      </style>
                        <p style="text-align:center; margin:0;">Legal Assistant Report</p><hr>
                        <p style="text-align:center; margin:0;">From: <?php echo $from_date; ?> To: <?php echo $from_date; ?>
                        </p><hr>
                        <p style="text-align:center; margin:0;">
                          Legal Assistant : <?php $legal_user_de = $this->User_Model->get_info_arr('user_id', $legal_user, 'law_user');
                          echo $legal_user_de[0]['user_name'].' '.$legal_user_de[0]['user_lastname']; ?>
                        </p><hr>

                        <thead>

                          <th class="sr_no">Sr. No.</th>
                          <th class="sr_no">Application No.</th>
                          <th><p style="text-align:center">Date</p></th>
                          <th><p style="text-align:center">Branch</p></th>
                          <th><p style="text-align:center">Org Type</p></th>
                          <th><p style="text-align:center">Service</p></th>
                          <th><p style="text-align:center">Org. Name</p></th>
                          <th><p style="text-align:center">Status</p></th>

                          </thead>
                        <tbody>
                          <?php $i = 0;
                            foreach ($legal_report_list as $list) {
                              $service_id = $list->service_id;
                              $i++;
                          ?>
                          <tr>
                            <td class="sr_no"><?php echo $i; ?></td>
                            <td class="sr_no"><?php echo $list->application_no; ?></td>
                            <td><?php echo $list->application_date; ?></td>
                            <td><?php echo $list->branch_name; ?></td>
                            <td><?php echo $list->organization_name; ?></td>
                            <td><?php echo $list->service_name; ?></td>
                            <?php if($service_id == 1){ ?>
                              <td><?php echo $list->ORGANIZATION; ?></td>
                            <?php } elseif ($service_id == 2) { ?>
                              <td><?php echo $list->org_name; ?></td>
                            <?php } else{ ?>
                              <td><?php echo $list->appl_org_name; ?></td>
                            <?php } ?>
                            <td>
                              <?php echo $list->application_status; ?>
                            </td>
                          </tr>
                        <?php } ?>
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
      var divToPrint=document.getElementById('print_legal');
      var newWin=window.open('','Print-Window');
      newWin.document.open();
      newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
      newWin.document.close();
      setTimeout(function(){newWin.close();},10);
    }

    function Export() {
      $("#exp_tbl").table2excel({
        filename: "Legal_Assistant_Report.xls"
      });
    }

    $(function(){
  $(".wrapper1").scroll(function(){
    $(".wrapper2").scrollLeft($(".wrapper1").scrollLeft());
  });
  $(".wrapper2").scroll(function(){
    $(".wrapper1").scrollLeft($(".wrapper2").scrollLeft());
  });
});
  </script>
</body>
</html>
