<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://fonts.googleapis.com/css?family=Bitter&display=swap" rel="stylesheet">
    <style media="screen">
    p {
    font-family: 'Bitter', serif;
  }
    table {
      border-collapse: collapse;
    }

    table td{
      padding-left: 10px;
      padding-right: 15px;
      padding-top: 10px;
    }

    td:nth-child(2) { background-color: #d0d0d0; }
    table, tr, td{

            border: 1px solid #000;
            text-align: left;

            }
    </style>
  </head>
  <!-- <body> -->
  <body onload="printDiv();">
  <div id='DivIdToPrint'>
    <?php
    $single_name = explode(',', $NAME);
    ?>
    <div class=""  style="padding:10px 30px; ">

      <p style="font-size:12px; text-align:right;">Date: <?php echo $COV_DATE; ?></p>
      <p style="font-size:12px; text-align:left;"> <br><br><br><br><br><br> To, </p>
      <p style="font-size:12px; text-align:left;"><?php echo $ORGANIZATION; ?></p>
      <p style="font-size:12px; text-align:left;">Address: <?php echo $FIRMADDRESS; ?> </p>

      <p style="font-size:12px; text-align:left;">Cell: <?php echo $MOBILE; ?> </p>

      <p style="font-size:12px; text-align:left;">Kind Attn : <?php echo $single_name[0]; ?> </p>
      <p style="font-size:12px; text-align:left; padding-top:10px; padding-bottom:10px;">Sub: Trademark of “<?php echo $BRAND; ?>” in class <?php echo $TM; ?> under the Trademarks Act 1999 and Trademarks Rules 2017. </p>
      <p style="font-size:12px; text-align:left;">Respected Sir /Madam, </p>
      <p style="font-size:12px; text-align:justify;">As per Trademark Act 1999 and Trademarks Rules 2017 we have prepared an application for Trade mark Registration of the above Subject matter.  </p>
      <p style="font-size:12px; text-align:justify;">Kindly sign the document & give it to us as early as possible, so that we can file the same in trademark registry to obtain Provisional Registration no and to carry on with further Proceedings. </p>
      <p style="font-size:12px; text-align:justify;">Let’s have long mutual beneficial relationship. </p> <br>
      <p style="font-size:12px; text-align:left;">Thanking You, </p>
      <p style="font-size:12px; text-align:left; padding-bottom:8px;">Yours faithfully, </p>
      <p style="font-size:12px; text-align:left;">For Law Protectors. </p> <br>
      <p style="font-size:12px; text-align:left;">Authorised Signatory </p>
      <p style="font-size:12px; text-align:left;  padding-bottom:8px;">(020) 26051325/ 3325/ 9575/ 9576.     </p>
      <p style="font-size:12px; text-align:left;">NOTE : For TM A Filing the documents required are as follows:</p>
      <table>
        <style media="print">
        table {
          border-collapse: collapse;
          margin-left: 50px;
          font-size: 12px !important;

        }

        table td, th{
        padding: 8px 30px;
        }
        table, td, th{
          border :1px solid #999;
        }
        .wdt{
          min-width: 100px !important;
        }
        </style>

        <tr>
          <td>1</td>
          <td>Logo Of Your Brand</td>
          <td class="wdt"></td>
        </tr>
        <tr>
          <td>2</td>
          <td>User Evidences</td>
          <td class="wdt"></td>
        </tr>
        <?php
          $i = 2;
        if(isset($IS_MSME_REQ) && $IS_MSME_REQ == 'Yes'){
          $i = 3;
        ?>
        <tr>
          <td>3</td>
          <td>MSME</td>
          <td class="wdt"></td>
        </tr>
        <?php } ?>
        <?php if(isset($BALANCEAMOUNT) && $BALANCEAMOUNT > 0){
          $i++;
        ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td>Balance Payment</td>
          <td class="wdt"><?php echo $BALANCEAMOUNT; ?></td>
        </tr>
        <?php } ?>

      </table>
      <p style="font-size:12px; text-align:left;">•	IMP NOTE : The column in which there is no right tick mark, you have to submit that documents.  </p>

    </div>
  </div>
    <input type='button' id='btn' value='Print' onclick='printDiv();'>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript">
     function printDiv()
    {

    var divToPrint=document.getElementById('DivIdToPrint');

    var newWin=window.open('','Print-Window');

    newWin.document.open();

    newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

    newWin.document.close();

    setTimeout(function(){newWin.close();},10);

    }
    </script>
  </body>
</html>
