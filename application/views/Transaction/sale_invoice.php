<!DOCTYPE html>
<html>
<?php
$page = "add_user";
?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-center mt-2">
            <h1>SALE INVOICE</h1>
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
              <?php if(isset($update)){ ?>
                <form role="form" action="<?php echo base_url(); ?>Transaction/update_sale_invoice" method="post" autocomplete="off">
                  <input type="hidden" name="invoice_id" value="<?php echo $invoice_id; ?>">
              <?php } else{ ?>
                <form role="form" action="<?php echo base_url(); ?>Transaction/save_sale_invoice" method="post" autocomplete="off">
              <?php } ?>
              <input type="hidden" name="application_id" value="<?php echo $application_id; ?>">
                <div class="card-body row">
                  <div class="form-group col-md-8 offset-md-2 drop-sm">
                    <input type="text" class="form-control form-control-sm" name="" value="<?php echo $company_name; ?>" readonly>
                    <input type="hidden" name="company_id" value="<?php echo $company_id; ?>">
                  </div>
                  <div class="form-group col-md-8 offset-md-2 drop-sm">
                    <input type="text" class="form-control form-control-sm" name="" value="<?php echo $branch_name; ?>" readonly>
                    <input type="hidden" name="branch_id" value="<?php echo $branch_id; ?>">
                  </div>
                  <div class="form-group col-md-4 offset-md-2">
                    <input type="text" class="form-control form-control-sm" name="invoice_no" id="invoice_no" value="<?php if(isset($invoice_no)){ echo $invoice_no; } ?>" title="Invoice No."  placeholder="Invoice No." readonly>
                  </div>
                  <div class="form-group col-md-4">
                    <input type="text" class="form-control form-control-sm" name="invoice_date" id="date1" value="<?php if(isset($invoice_no)){ echo $invoice_no; } ?>"  data-target="#date1" data-toggle="datetimepicker" value="" title="Date" placeholder=" Date" required>
                  </div>
                  <div class="form-group col-md-8 offset-md-2 drop-sm">
                    <input type="text" class="form-control form-control-sm" name="party" id="party" value="<?php if(isset($party)) echo $party; ?>" placeholder="Party Name" title="Party Name" required>
                  </div>
                  <div class="form-group col-md-8 offset-md-2 drop-sm">
                    <input type="text" class="form-control form-control-sm" name="party_address" id="party_address" value="<?php if(isset($party_address)) echo $party_address; ?>" placeholder="Party Address" title="Party Address" required>
                  </div>
                  <div class="form-group col-md-4 offset-md-2">
                    <input type="text" class="form-control form-control-sm" name="party_statecode" id="party_statecode" value="<?php if(isset($party_statecode)){ echo $party_statecode; } ?>" title="Party Statecode"  placeholder="Party Statecode">
                  </div>
                  <div class="form-group col-md-4">
                  </div>
                  <div class="form-group col-md-4 offset-md-2">
                    <input type="text" class="form-control form-control-sm" name="po_no" id="po_no" value="<?php if(isset($po_no)){ echo $po_no; } ?>" title="PO No."  placeholder="PO No.">
                  </div>
                  <div class="form-group col-md-4">
                    <input type="text" class="form-control form-control-sm" name="po_date" value="<?php if(isset($po_date)){ echo $po_date; } ?>" id="date2" data-target="#date2" data-toggle="datetimepicker" value="" title="Date" placeholder=" Date" required>
                  </div>
                </div>
              <!-- </form> -->
              <div class=" w-100 text-right">
                <button type="button" id="add_row" class="btn btn-sm btn-primary mb-3 mr-1" width="150px">Add Row</button>
              </div>
              <div class="" style="overflow-x:auto;">
                <table id="myTable" class="table table-bordered table-striped tbl_add" style="">
                  <thead>
                  <tr>
                    <th class="sr_no">Sr. No.</th>
                    <th>DESCRIPTION</th>
                    <th>GST %</th>
                    <th>HSN/SAC</th>
                    <th>QTY</th>
                    <th>RATE</th>
                    <th>TOTAL</th>
                    <th>ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    if(isset($invoice_details_list)){
                    $i = 0;
                    $j = 0;
                    foreach ($invoice_details_list as $details) {
                    $j++;
                  ?>
                    <input type="hidden" name="input[<?php echo $i; ?>][invoice_details_id]" value="<?php echo $details->invoice_details_id; ?>">
                    <tr>
                      <td class="sr_no"><?php echo $j; ?></td>
                      <td class="td_w">
                      <textarea name="input[<?php echo $i; ?>][descr]" class="form-control form-control-sm " rows="2" cols="20"><?php echo $details->descr; ?></textarea>
                      </td>
                      <td class="td_w">
                        <input type="number" min="0" class="form-control form-control-sm gst_per" name="input[<?php echo $i; ?>][gst_per]" value="<?php echo $details->gst_per; ?>" placeholder="">
                        <input type="hidden" class="form-control form-control-sm gst_amount" name="input[<?php echo $i; ?>][gst_amount]" value="<?php echo $details->gst_amount; ?>" placeholder="">
                      </td>
                      <td class="td_w">
                        <input type="text" class="form-control form-control-sm " name="input[<?php echo $i; ?>][hsn]" value="<?php echo $details->hsn; ?>" placeholder="">
                      </td>
                      <td class="td_w">
                        <input type="number" min="0" class="form-control form-control-sm qty" name="input[<?php echo $i; ?>][qty]" value="<?php echo $details->qty; ?>" placeholder="">
                      </td>
                      <td class="td_w">
                        <input type="number" min="1.00" step="0.01" class="form-control form-control-sm rate" name="input[<?php echo $i; ?>][rate]" value="<?php echo $details->rate; ?>" placeholder="">
                      </td>
                      <td class="td_w">
                        <input type="number" min="1.00" step="0.01" class="form-control form-control-sm total" name="input[<?php echo $i; ?>][total]" value="<?php echo $details->total; ?>" placeholder="" readonly>
                      </td>
                      <td class="td_w"> <?php if($j > 1){ ?> <a><i class="fa fa-trash text-danger"></i></a> <?php } ?></td>
                    </tr>
                  <?php  $i++; } } else{ ?>
                    <tr>
                      <td class="sr_no">1</td>
                      <td class="td_w">
                      <textarea name="input[0][descr]" class="form-control form-control-sm " rows="2" cols="20"></textarea>
                      </td>
                      <td class="td_w">
                        <input type="number" min="0" class="form-control form-control-sm gst_per" name="input[0][gst_per]" value="" placeholder="">
                        <input type="hidden" class="form-control form-control-sm gst_amount" name="input[0][gst_amount]" value="" placeholder="">
                      </td>
                      <td class="td_w">
                        <input type="text" class="form-control form-control-sm " name="input[0][hsn]" value="" placeholder="">
                      </td>
                      <td class="td_w">
                        <input type="number" min="0" class="form-control form-control-sm qty" name="input[0][qty]" value="" placeholder="">
                      </td>
                      <td class="td_w">
                        <input type="number" min="1.00" step="0.01" class="form-control form-control-sm rate" name="input[0][rate]" value="" placeholder="">
                      </td>
                      <td class="td_w">
                        <input type="number" min="1.00" step="0.01" class="form-control form-control-sm total" name="input[0][total]" value="" placeholder="" readonly>
                      </td>
                      <td class="td_w"></td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
              <div class="row">
                <div class="col-md-6">
                </div>
                <div class="col-md-6 ">
                  <div class="form-group row pt-4 float-right">
                    <label for="inputEmail3" class="col-form-label mr-3">Basic Amount</label>
                    <div class="">
                      <input type="number" class="form-control" name="basic_amt" id="basic_amt" value="<?php if(isset($basic_amt)){ echo $basic_amt; } ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group row float-right">
                    <label for="inputEmail3" class="col-form-label mr-3">GST Amount</label>
                    <div class="">
                      <input type="number"  class="form-control" name="gst_amt" id="gst_amt" value="<?php if(isset($gst_amt)){ echo $gst_amt; } ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group row float-right">
                    <label for="inputEmail3" class=" col-form-label mr-3">Advance Payment</label>
                    <div class="">
                      <input type="number" class="form-control delivery_total" name="adv_amt" id="adv_amt" value="<?php if(isset($adv_amt)){ echo $adv_amt; } ?>" >
                    </div>
                  </div>
                  <div class="form-group row float-right">
                    <label for="inputEmail3" class=" col-form-label mr-3">Balance Payment</label>
                    <div class="">
                      <input type="number" class="form-control delivery_total" name="bal_amt" id="bal_amt" value="<?php if(isset($bal_amt)){ echo $bal_amt; } ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group row float-right">
                    <label for="inputEmail3" class=" col-form-label mr-3">Net Amount</label>
                    <div class="">
                      <input type="number" class="form-control delivery_total" name="net_amt" id="net_amt" value="<?php if(isset($net_amt)){ echo $net_amt; } ?>" readonly>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4 offset-md-5">
                  <?php if(isset($update)){ ?>
                    <button type="submit" class="btn btn-primary mr-3">Update</button>
                  <?php } else{ ?>
                    <button type="submit" class="btn btn-success mr-3">Save</button>
                  <?php }?>
                  <a href="<?php echo base_url(); ?>Dashboard" class="btn btn-default ">Cancel</a>
                </div>
              </div>
            </div>
            </form>
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
  <?php if(isset($update)){ ?>
  var i = <?php echo $i+1; ?>;
  var j = <?php echo $i; ?>;
<?php } else { ?>
  var i = 1;
  var j = 0;
<?php } ?>

    $('#add_row').click(function(){
    i++;
    j++;
    var row = '<tr>'+
      '<td class="sr_no">'+i+'</td>'+
      '<td class="td_w">'+
      '<textarea name="input['+j+'][descr]" class="form-control form-control-sm " rows="2" cols="20"></textarea>'+
      '</td>'+
      '<td class="td_w">'+
        '<input type="number" min="0" class="form-control form-control-sm gst_per" name="input['+j+'][gst_per]" value="" placeholder="">'+
        '<input type="hidden" class="form-control form-control-sm gst_amount" name="input['+j+'][gst_amount]" value="" placeholder="">'+
      '</td>'+
      '<td class="td_w">'+
        '<input type="text" class="form-control form-control-sm " name="input['+j+'][hsn]" value="" placeholder="">'+
      '</td>'+
      '<td class="td_w">'+
        '<input type="number" min="0" class="form-control form-control-sm qty" name="input['+j+'][qty]" value="" placeholder="">'+
      '</td>'+
      '<td class="td_w">'+
        '<input type="number" min="1.00" step="0.01" class="form-control form-control-sm rate" name="input['+j+'][rate]" value="" placeholder="">'+
      '</td>'+
      '<td class="td_w">'+
        '<input type="number" min="1.00" step="0.01" class="form-control form-control-sm total" name="input['+j+'][total]" value="" placeholder="" readonly>'+
      '</td>'+
      '<td class="td_w"><a> <i class="fa fa-trash text-danger"></i> </a></td>'+
    '</tr>';
    $('#myTable').append(row);
    });

    $('#myTable').on('click', 'a', function () {
      $(this).closest('tr').remove();

      var basic_amount = 0;
      $(".total").each(function() {
          var total = $(this).val();
          if(!isNaN(total) && total.length != 0) {
              basic_amount += parseFloat(total);
          }
      });
      // alert(basic_amount);
      $('#basic_amt').val(basic_amount.toFixed(2));
      //
      var gst_val = 0;
      $(".gst_amount").each(function() {
          var gst_amt = $(this).val();
          if(!isNaN(gst_amt) && gst_amt.length != 0) {
              gst_val += parseFloat(gst_amt);
          }
      });
      // alert(gst_val);
      $('#gst_amt').val(gst_val.toFixed(2));

      var total_amount = basic_amount + gst_val;
      total_amount = Math.ceil(total_amount);
      $('#net_amt').val(total_amount);
    });



    // Calculate Amount... Check Valid Quantity..
  $('#myTable').on('change', 'input.gst_per,input.qty, input.rate', function () {
    var gst =   $(this).closest('tr').find('.gst_per').val();
    var qty =   $(this).closest('tr').find('.qty').val();
    var rate =   $(this).closest('tr').find('.rate').val();
    if(gst == ''){
      gst = 0;
    }
    if(qty == ''){
      qty = 0;
    }
    if(rate == ''){
      rate = 0;
    }
    var gst = parseInt(gst);
    var qty = parseInt(qty);
    var rate = parseFloat(rate);

    var amount_without_gst = qty * rate;
    var gst_amount = (gst/100) * amount_without_gst;
    var amount_with_gst = amount_without_gst + gst_amount;

    $(this).closest('tr').find('.total').val(amount_without_gst.toFixed(2));
    $(this).closest('tr').find('.gst_amount').val(gst_amount.toFixed(2));

    var basic_amount = 0;
    $(".total").each(function() {
        var total = $(this).val();
        if(!isNaN(total) && total.length != 0) {
            basic_amount += parseFloat(total);
        }
    });
    // alert(basic_amount);
    $('#basic_amt').val(basic_amount.toFixed(2));
    //
    var gst_val = 0;
    $(".gst_amount").each(function() {
        var gst_amt = $(this).val();
        if(!isNaN(gst_amt) && gst_amt.length != 0) {
            gst_val += parseFloat(gst_amt);
        }
    });
    // alert(gst_val);
    $('#gst_amt').val(gst_val.toFixed(2));

    var total_amount = basic_amount + gst_val;
    // total_amount = Math.ceil(total_amount);
    // $('#net_amt').val(total_amount);
    $('#net_amt').val(total_amount.toFixed(0));

    var adv_amt =   $('#adv_amt').val();
    var net_amt =   $('#net_amt').val();
    if(adv_amt == ''){
      adv_amt = 0;
    }
    if(net_amt == ''){
      net_amt = 0;
    }
    var adv_amt = parseInt(adv_amt);
    var net_amt = parseInt(net_amt);
    var bal_amt = net_amt - adv_amt;
    $('#bal_amt').val(bal_amt.toFixed(2));
  });

  $('#adv_amt').change(function(){
    var adv_amt =   $('#adv_amt').val();
    var net_amt =   $('#net_amt').val();
    if(adv_amt == ''){
      adv_amt = 0;
    }
    if(net_amt == ''){
      net_amt = 0;
    }
    var adv_amt = parseInt(adv_amt);
    var net_amt = parseInt(net_amt);
    var bal_amt = net_amt - adv_amt;
    $('#bal_amt').val(bal_amt.toFixed(2));
  });
  </script>
</body>
</html>
