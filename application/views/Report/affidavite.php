<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">

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
            margin-left: auto;
            margin-right: auto;
            }
    </style>

  </head>
  <!-- <body> -->
    <body onload="printDiv();">

      <div id='DivIdToPrint'>
        <?php
        $single_name = explode(',', $NAME);
        ?>
    <br><br><br> <br><br><br><br><br> <br><br> <br><br><br> <br><br> <br><br><br> <br><br> <br><br><br> <br><br>
     <br><br><br><br><br><br> <br><br>  <br><br><br><br><br><br>
    <div class="" style="padding:10px 40px; ">
      <h6  style="font-size:12px; line-height: 16px; margin-top: 0px; margin-bottom: 0px; font-family: times, serif; text-align:center;">AFFIDAVIT</h6>
      <p style="font-size:12px; line-height: 24px; margin: 0px;text-align:center; ">IN THE MATTER OF The Trade Marks  Act 1999 and Trade marks Rules 2017</p>
      <p style="font-size:12px; line-height: 16px; margin: 0px; text-align:center; ">And</p>
      <p style="font-size:12px; line-height: 24px; margin: 0px; text-align:center; ">Trade Mark <b> “<?php echo $BRAND; ?>”</b> In the class <?php echo $TM; ?></p>
      <p style="font-size:12px; line-height: 16px; margin: 0px; text-align:center; ">And</p>
      <p style="font-size:12px; line-height: 24px; margin: 0px; text-align:center; ">IN THE MATTER OF APPLICATION –  <b>  <?php echo $single_name[0]; ?></b></p>
      <p style="font-size:12px; line-height: 16px; text-align:justify; ">I, <?php echo $single_name[0]; ?>, aged <?php echo $AGE; ?> years, Citizen of India residing <?php echo $ADDRESS; ?>. do hereby solemnly and sincerely declare and state as follows: </p>
    </div>
      <br><br><br><br> <br><br>
      <div class="" style="padding:10px 30px; ">
      <p style="font-size:12px; text-align:center; ">:2: </p>
      <br>
      <p style="font-size:12px; text-align:justify; ">1.	I am running a business in my personal name, having its present address <?php echo $FIRMADDRESS; ?>. (hereinafter referred to as “my concern”), </p>

      <p style="font-size:12px; text-align:justify; ">I am authorized and competent to make this affidavit. The statements made here in under are partly based on my personal knowledge, partly on information derived by me from the records of my concern to which I have full access and which I believe to be true, and partly these are my submissions. </p>

      <p style="font-size:12px; text-align:justify; "> 3.	The said Trade Mark has been used in India continuously since <?php echo $PROPOSED; ?> in connection with the said goods and by reason of such use the said services bearing the Trade Mark have come to be understood as being <?php if(isset($TRADE_0)){ echo $TRADE_0.', '; } ?>
      <?php if(isset($TRADE_1)){ echo $TRADE_1.', '; } ?>
      <?php if(isset($TRADE_2)){ echo $TRADE_2.', '; } ?>
      <?php if(isset($TRADE_3)){ echo $TRADE_3.', '; } ?>
      <?php if(isset($TRADE_4)){ echo $TRADE_4.', '; } ?> by my concern.</p>
      <p style="font-size:12px; text-align:justify; ">4.	Sales of the said goods in India by my concern have been considerable and I give details thereof:  </p>

      <table>
        <style media="print">
        table {
          border-collapse: collapse;
          margin-left:auto;
          margin-right:auto;
        }

        table td, th{
        padding: 8px 13px;
        }
        table, td, th{
          border :1px solid #000;
        }
        </style>
        <tr>
          <th>YEAR</th>
          <th>AMOUNT(Rs.)</th>
        </tr>

        <?php
        $PROPOSED_DATE = strtotime($PROPOSED);
        $PROPOSED_year = date('Y',$PROPOSED_DATE);
        $curr_year = date('Y');
        $next_year = $curr_year+1;
        $k=0;
        for($i=$PROPOSED_year; $i<$next_year; $i++){
          $j = $i+1;
        ?>
        <tr>
          <td><?php echo $i.'-'.$j; ?></td>
          <td></td>
        </tr>
        <?php $k++; } ?>
      </table>

      <p style="font-size:12px; text-align:justify; ">5.	I have spent approximately Rs.________________/- (Rupees only) on account of advertising as follows. </p>
      <table>
        <style media="print">
        table {
          border-collapse: collapse;
          margin-left:auto;
          margin-right:auto;
        }

        table td, th{
        padding: 8px 13px;
        }
        table, td, th{
          border :1px solid #000;
        }
        </style>
        <tr>
          <th>YEAR</th>
          <th>AMOUNT(Rs.)</th>
        </tr>

        <?php
        $PROPOSED_DATE = strtotime($PROPOSED);
        $PROPOSED_year = date('Y',$PROPOSED_DATE);
        $curr_year = date('Y');
        $next_year = $curr_year+1;
        $k=0;
        for($i=$PROPOSED_year; $i<$next_year; $i++){
          $j = $i+1;
        ?>
        <tr>
          <td><?php echo $i.'-'.$j; ?></td>
          <td></td>
        </tr>
        <?php $k++; } ?>
      </table>
      <p style="font-size:12px; text-align:justify; ">6. Annexed hereto and collectively marked Exhibit A-1, are a bunch of invoices showing that goods bearing Trade Mark have been supplied to various clients and Exhibit A-2 has the copies of advertisement material in respect of the above trademark.</p>
      <p style="font-size:12px; text-align:justify; ">7. The said goods are of high standard and by reason of such and by the use of Trade Mark in relation to said goods the Trade Mark denotes to those trades a distinctive symbol of the <?php if(isset($TRADE_0)){ echo $TRADE_0.', '; } ?>
      <?php if(isset($TRADE_1)){ echo $TRADE_1.', '; } ?>
      <?php if(isset($TRADE_2)){ echo $TRADE_2.', '; } ?>
      <?php if(isset($TRADE_3)){ echo $TRADE_3.', '; } ?>
      <?php if(isset($TRADE_4)){ echo $TRADE_4.', '; } ?> by my concern. I believe that my concern is entitled to the registration of the Trade Mark in respect of the goods, the subject of this application.</p>
      </div>

      <div class="" style="padding:10px 30px; ">
        <br><br><br><br><br> <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <?php
        $af_date = strtotime($AFF_DATE);
        $day = date('dS',$af_date);
        $month = date('F',$af_date);
        $year = date('Y',$af_date);
         ?>
        <p style="font-size:12px; text-align:justify;">The statements made in paragraph 1, 2, & 3 are true to my knowledge, and the extracts in paragraph 4 & 5 are according to the available records of my concern, and those of 7 are my submissions to the Learned Registrar.</p>
        <p style="font-size:12px; text-align:justify;">SIGNED, SEALED AND DELIVERED this <?php echo $day; ?> day of <?php echo $month; ?> <?php echo $year; ?> by the said (Deponent)</p>
        <p style="font-size:12px;  "> <span style="text-align:left;">NOTARY PUBLIC</span>  <span style="float:right;">________________________________ </span>    </p>
          <p style="font-size:12px; text-align:right;  font-weight:bold;"> <?php echo $single_name[0]; ?></p>

          <p style="font-size:12px; text-align: right;  font-weight:bold;"> (Applicant)</p>
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
