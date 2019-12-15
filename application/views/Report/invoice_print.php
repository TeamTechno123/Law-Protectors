<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Tax Invoice</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="<?php echo base_url('files/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('files/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('files/bower_components/Ionicons/css/ionicons.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('files/dist/css/AdminLTE.min.css'); ?>">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body >
<div class="wrapper">
  <!-- Main content -->
  <div class="row">
    <p style="text-align:center; font-size:17px; margin-top: 3px; margin-bottom: 5px;text-transform: uppercase;"> <b>Tax Invoice</b>  </p>
  </div>
  <table class="table table-bordered mb-0 invoice-table" Width="100%">
    <style media="print">
    table{
      border-collapse: collapse;
    }
    table, td, th{
    border :1px solid #000;
    padding-left: 10px;
    }

      .invoice-table tr, td, th{
          border: 1px solid #000!important;
      }
      .invoice-table{
        margin-bottom:0px!important;
        border: 1px solid #000!important;
        padding-bottom:0px!important;
      }
      .invoice-table p{
        line-height: 15px;
      }
      .pull-right{
        float: right!important;
      }
      hr{
          border-top: 1px solid #000!important;
      }
      p{
        margin-top: 3px;
        margin-bottom: 5px;
      }
    </style>
    <style media="screen">
    table{
      border-collapse: collapse;
    }

      .invoice-table tr, td, th{
          border: 1px solid #000!important;
            padding-left: 10px;
      }
      .invoice-table{
        margin-bottom:0px!important;
        border: 1px solid #000!important;
        padding-bottom:0px!important;
      }
      .invoice-table p{
        line-height: 15px;
      }
      .pull-right{
        float: right!important;
      }
      hr{
          border-top: 1px solid #000!important;
      }
      p{
        margin-top: 3px;
        margin-bottom: 5px;
      }
    </style>
    <tr >

      <td   colspan="6" >
        <?php if($comp_id == 1){ ?>
          <img style="padding-top:12px;" src="<?php echo base_url() ?>assets/images/LLP.jpg" alt="" width="100%">
        <?php } else{ ?>
          <img style="padding-top:12px;" src="<?php echo base_url() ?>assets/images/lp.jpg" alt="" width="100%">
        <?php } ?>
      </td>

      <!-- <td   colspan="6" >

    <div class="" style="text-align:center;">
    <h3 style="font-family: 'Arial Black', 'Arial Bold', Gadget, sans-serif; font-size:28px; font-weight:bold; text-transform:uppercase; margin-top:5px; margin-bottom:3px;" > <?php echo $company_name; ?></h3>
    <p style="margin-bottom:5px; line-height:20px; font-family: Calibri, Candara, Segoe, 'Segoe UI'; font-size: 16px; margin-top:5px;" > <b> <?php echo $company_address; ?></p>
    <p  style="margin-bottom:5px; font-family: Calibri, Candara, Segoe, 'Segoe UI'; font-size: 16px;">Mobile No: <?php echo $company_mob1; ?> &nbsp; | &nbsp; Email : <?php echo $company_email; ?></p>
    <p  style="margin-bottom:5px; font-family: Calibri, Candara, Segoe, 'Segoe UI'; font-size: 16px;"> GST No: <?php echo $company_gst_no; ?> &nbsp; | &nbsp; Website : <?php echo $company_website; ?> </p>

    </div>
      </td> -->
    </tr>
    <tr>
      <td colspan="4" Width="60%" >
        <p style="font-family: 'Arial Black', 'Arial Bold', Gadget, sans-serif; font-size:17px; font-weight:bold; text-transform:uppercase; margin-top:5px; margin-bottom:3px;" > <?php echo $company_name; ?></p>
        <p style="margin-bottom:5px; line-height:20px; font-family: Calibri, Candara, Segoe, 'Segoe UI'; font-size: 16px; margin-top:5px;" ><b>Address </b>: <b> <?php echo $company_address; ?></p>
        <!-- <p  style="margin-bottom:5px; font-family: Calibri, Candara, Segoe, 'Segoe UI'; font-size: 16px;">Mobile No: <?php echo $company_mob1; ?> &nbsp; | &nbsp; Email : <?php echo $company_email; ?></p> -->
        <p  style="margin-bottom:5px; font-family: Calibri, Candara, Segoe, 'Segoe UI'; font-size: 16px;"> GST No: <?php echo $company_gst_no; ?> </p>
          <hr style="margin-left:-10px;">
        <p style="text-align:center;"> <b> Billing details</b></p>
          <hr style="margin-left:-10px;">
        <p> <b><?php echo $party; ?></b>  </p>
        <p> <b>Address</b> : <?php echo $party_address; ?></p>
        <p> <b>GSTIN</b> : <?php echo $party_gst_no; ?> </p>
      </td>
      <td colspan="2" Width="40%" valign="top">
        <p style="padding-top:8px;"> <b>Invoice No</b> : <?php echo $invoice_no; ?></p>
        <p style="padding-top:8px;"> <b>Date </b> : <?php echo $invoice_date; ?></p>
        <p style="padding-top:8px;"> <b>PO No. </b> : <?php echo $po_no; ?></p>
        <p style="padding-top:8px;"> <b>PO Date </b> : <?php echo $po_date; ?></p>

        <p style="padding-top:8px;"><b>State Code</b> : <?php echo $company_statecode; ?> </p>
      </td>
    </tr>

  </table>

  <table class="table table-bordered invoice-tbl-2"  width="100%">
    <style media="print">
    /* @media print {
        table{
          margin: 0px;
        }
     } */
      .invoice-tbl-2{
      margin-top:0px;
      padding-top:0px;
      border-top:0px;
      border: 1px solid #000!important;
      border-top: 0px!important;
      margin-top: 0px!important;
      padding-top: 0px!important;
      vertical-align: top;
      }
      hr{
          border-top: 1px solid #000!important;
      }
        .invoice-tbl-2 tr, th, td{
          border: 1px solid #000!important;
          border-top: 0px!important;
        }
        .pull-right{
          float: right!important;
        }
    </style>
    <style media="screen">
    /* @media print {
        table{
          margin: 0px;
        }
     } */
      .invoice-tbl-2{
      margin-top:0px;
      padding-top:0px;
      border-top:0px;
      border: 1px solid #000!important;
      border-top: 0px!important;
      margin-top: 0px!important;
      padding-top: 0px!important;
      vertical-align: top;
      }
      hr{
          border-top: 1px solid #000!important;
      }
        .invoice-tbl-2 tr, th, td{
          border: 1px solid #000!important;
          border-top: 0px!important;
        }
        .pull-right{
          float: right!important;
        }
    </style>
    <tr>
      <th style="width: 10px; text-align:center;">Sr.No.</th>
      <th style="text-align:center;"> DESCRIPTION</th>
      <th style="text-align:center;">HSN/SAC</th>
      <th style="text-align:center;" width="12%">GST %</th>
      <th style="text-align:center;" Width="9%" >QTY </th>
      <th style="text-align:center;" >RATE</th>
      <th style="text-align:center;" >AMOUNT</th>
    </tr>
  <?php
    $i=0;
    foreach ($invoice_details_list as $list) {
    $i++;
  ?>
    <tr>
      <td style="text-align:center;"><?php echo $i; ?></td>
      <td style="text-align:center;"><?php echo $list->descr; ?></td>
      <td style="text-align:center;" > <?php echo $list->hsn; ?></td>
      <td style="text-align:center;" > <?php echo $list->gst_per; ?></td>
      <td style="text-align:center;"><?php echo $list->qty; ?></td>
      <td style="text-align:center;"><?php echo $list->rate; ?></td>
      <td style="text-align:center;"><?php echo $list->total; ?></td>
    </tr>
  <?php } ?>
  <?php
  $k=8-$i;
  for ($j=0; $j < $k ; $j++) { ?>
    <tr>
      <td style="text-align:center; height:15px;"></td>
      <td style="text-align:center;"></td>
      <td style="text-align:center;" ></td>
      <td style="text-align:center;" ></td>
      <td style="text-align:center;"></td>
      <td style="text-align:center;"></td>
      <td style="text-align:center;"></td>
    </tr>
  <?php } ?>
    <tr>
      <td colspan="4" rowspan="" valign="top">
        <p style="margin-top:10px;"><b>GST Amount : <?php echo $this->numbertowords->convert_number($gst_amt); ?> Only</b> </p><hr style="margin-left:-10px;">
        <p><b>Net Amount : <?php echo $this->numbertowords->convert_number($net_amt); ?> Only</b> </p>

      </td>
      <td colspan="2" Width="25%" valign="top">
        <p><b>Basic Amount</b> : </p> <hr style="margin-left:-10px;">
        <p><b>Govt. Fees</b> : </p> <hr style="margin-left:-10px;">
        <p><b>TDS Amount</b> : </p> <hr style="margin-left:-10px;">
        <?php
        $roundup = ($basic_amt + $gst_amt) - $net_amt;
        if($company_statecode == $party_statecode){
          $cgst = $gst_amt/2;
        ?>
        <p><b>CGST </b> : </p>  <hr style="margin-left:-10px;">
        <p><b>SGST </b> : </p>  <hr style="margin-left:-10px;">
      <?php } else{?>
        <p><b>IGST </b> : </p> <hr style="margin-left:-10px;">
      <?php } ?>

        <p><b>Rounding</b> :  </p>  <hr style="margin-left:-10px;">
        <p><b>Grand Total</b> :  </p>
      </td>
      <td colspan="1" Width="15%" valign="top">
        <p style="text-align:right; padding-right:15px;"><?php echo number_format($basic_amt,2); ?> </p> <hr style="margin-left:-10px;">
        <p style="text-align:right; padding-right:15px;"><?php echo number_format($gov_fees_amt,2); ?> </p> <hr style="margin-left:-10px;">
        <p style="text-align:right; padding-right:15px;"> <?php echo number_format($tds_amt,2); ?></p> <hr style="margin-left:-10px;">
        <?php
        $roundup = round($net_amt) - $net_amt;
        if($company_statecode == $party_statecode){
          $cgst = $gst_amt/2;
        ?>
        <p style="text-align:right; padding-right:15px;"> <?php echo $cgst; ?></p>  <hr style="margin-left:-10px;">
        <p style="text-align:right; padding-right:15px;"> <?php echo $cgst; ?></p>  <hr style="margin-left:-10px;">
      <?php } else{?>
        <p style="text-align:right; padding-right:15px;"> <?php echo $gst_amt; ?></p> <hr style="margin-left:-10px;">
      <?php } ?>

        <p style="text-align:right; padding-right:15px;"><?php echo number_format($roundup,2); ?> </p>  <hr style="margin-left:-10px;">
        <p style="text-align:right; padding-right:15px;"> <?php echo round($net_amt); ?> </p>
      </td>

    </tr>
    <tr>
      <td colspan="5">
          <p> <b>Bank Name</b> : &nbsp; <?php echo $branch_bank; ?></p>
          <p> <b>Account No</b> :  &nbsp; <?php echo $branch_acc_no; ?> </p>
          <p> <b>IFSC Code </b>&nbsp; : &nbsp; <?php echo $branch_ifsc; ?> </p>
          <p> <b>Declaration </b> : We declare that the invoice shows the actual price of the goods described and that all particulars are true and correct. </p>
      </td>
      <td colspan="2">
        <img src="<?php echo base_url() ?>assets/images/<?php echo $company_seal; ?>" alt="">
      </td>
    </tr>
  </table>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<script src="<?php echo base_url('files/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
<script type="text/javascript">
  window.print();
</script>
</body>
</html>
