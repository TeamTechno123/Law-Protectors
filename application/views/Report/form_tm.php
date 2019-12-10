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
        padding-top: 0px;
      }
      .bg-color{
        background-color: #d0d0d0;
      }
      td:nth-child(2) { background-color: #d0d0d0;
         -webkit-print-color-adjust: exact;
        }
      table, tr, td{
        border: 1px solid #000;
        text-align: left;
        margin-left: auto;
        margin-right: auto;
      }
    </style>
  </head>
  <body onload="printDiv();">
    <!-- <body> -->
    <input type='button' id='btn' value='Print' onclick='printDiv();'>
    <br>
    <div id='DivIdToPrint'>
    <h6  style="font-size:14px; line-height: 16px; margin-top: 0px; margin-bottom: 0px; font-family: times, serif; text-align:center;">FORM TM-A</h6>
    <h6  style="font-size:14px; line-height: 16px;  margin-top: 0px; margin-bottom: 0px; font-family: times, serif; text-align:center;">The Trade Marks Act, 1999</h6>
    <h6 style="font-size:14px; line-height: 16px;  margin-top: 0px; margin-bottom: 0px; font-family: times, serif; text-align:center;">Application for registration of a trademark</h6>
    <h6 style="font-size:14px; line-height: 16px;  margin-top: 0px; margin-bottom: 5px; font-family: times, serif; text-align:center;">Fee: (See First Schedule for Appropriate Fee)</h6>

    <table id="table1">
      <style media="print">
        table {
          border-collapse: collapse;
        }
        table td{
          padding-left: 10px;
          padding-right: 15px;
          padding-top: 0px;
        }
        td:nth-child(2) { background-color: #d0d0d0; }
        table, tr, td{
          border: 1px solid #000;
          text-align: left;
          margin-left: auto;
          margin-right: auto;
        }
      </style>

      <tr>
        <td> <p >1.</p> </td>
        <td class="bg-color"> <p style="font-size:12px; text-align:center;  font-weight:bold;" > NATURE OF THE APPLICATION:</p> </td>
        <td><?php if(isset($service_name)){ echo $service_name; } ?></td>
      </tr>

      <tr>
        <td><p >2.</p></td>
        <td> <p style="font-size:12px; text-align:center;  font-weight:bold;" > Whether application filed as </p></td>
        <td><?php
          if(isset($organization_id) && ($organization_id == 1)){ echo 'Individual'; }
          elseif (isset($organization_id) && ($organization_id == 3 || $organization_id == 5 )){ echo 'Sole Propritor'; }
          else{ echo 'Small Enterprises'; }
        ?></td>
      </tr>

      <tr>
        <td> <p ></p> </td>
        <td class="bg-color"> <p style="font-size:12px; text-align:center;  font-weight:bold;" > MSME SSI certificate Received: </p></td>
        <td><?php if(isset($IS_MSME_REQ)){ echo $IS_MSME_REQ; } ?></td>
      </tr>
      <?php
      $single_name = explode(',', $NAME);
      ?>
      <tr>
        <td  rowspan="5" valign="top" style="padding-top:5px;">3</td>
        <td style=" padding-bottom:0px;"> <p style="font-size:12px; text-align:center;  font-weight:bold;" > APPLICANT </p></td>
        <td style="padding-top:5px; padding-bottom:0px;">
          <?php
            if(isset($organization_id) && ($organization_id == 1)){ echo $single_name[0]; }
            else{ echo $ORGANIZATION; }
          ?>
          <br> <br> </td>
      </tr>

      <tr>
        <td colspan="2">[The applicant must choose either of the following categories
          1. Individual/Sole Proprietor, 2. Partnership Firm, 3. Body-Incorporate including Private Limited/Limited Company,
          4. Limited Liability Partnership,  Society, 6. Trust, 7. Government Department, 8. Association of Persons,
          9. Hindu Undivided Family.] <br> <br> </td>
      </tr>


      <tr>
        <td style="background-color: #d0d0d0;"> <p style="font-size:12px; text-align:center;  font-weight:bold;" > Name of Authorized Signatory: * </p></td>
        <td style="background-color: #fff;padding-top:5px; ">
          <?php foreach ($single_name as $item) {
              echo '<b>'.$item.'</b><br>';
          } ?>
        <br><br> </td>
      </tr>

      <tr>
        <td style="background-color: #d0d0d0;"> <p style="font-size:12px; text-align:center;  font-weight:bold;" > Address:* </p></td>
        <td style="background-color: #fff;"><?php if(isset($ADDRESS)){ echo $ADDRESS; } ?><br><br></td>
      </tr>

      <tr>
        <td style="background-color: #d0d0d0;"> <p style="font-size:12px; text-align:center;  font-weight:bold;" > State :* </p></td>
        <td style="background-color: #fff;"><?php if(isset($STATE)){ echo $STATE; } ?><br> <br>
        </td>
      </tr>

      <tr>
        <td  rowspan="4" valign="top" style="padding-top:5px;">4</td>
        <td> <p style="font-size:12px; text-align:center;  font-weight:bold;" > MARK TO BE REGISTERED: </p></td>
        <td style="padding-top:5px;">Logo + <?php if(isset($BRAND)){ echo $BRAND; } ?><br><br> </td>
      </tr>

      <tr>
        <td style="background-color: #d0d0d0;"> <p style="font-size:12px; text-align:center;  font-weight:bold;" > Category of mark:* </p></td>
        <td style="background-color: #fff;">
          <?php if(isset($MARK_0) && $MARK_0 != ''){ echo $MARK_0.', '; } ?>
          <?php if(isset($MARK_1) && $MARK_1 != ''){ echo $MARK_1.', '; } ?>
          <?php if(isset($MARK_2) && $MARK_2 != ''){ echo $MARK_2.', '; } ?>
          <?php if(isset($MARK_3) && $MARK_3 != ''){ echo $MARK_3.', '; } ?>
          <?php if(isset($MARK_4) && $MARK_4 != ''){ echo $MARK_4.', '; } ?><br><br> </td>
      </tr>

      <tr>
        <td colspan="2">1. Word mark (it includes  one or more words, letters,
           numerals or anything written in standard character) 2. Device mark (it includes any label,
           sticker, monogram, logo or any geometrical figure other than word mark),
           3. Colour (when the distinctiveness is claimed in the combination of colours with or without
           device),  4. Three dimensional trademark ( it includes shape or packaging of goods),  5. Sound. <br> <br>
        </td>
      </tr>

      <tr>
        <td style="background-color: #d0d0d0;"> <p style="font-size:12px; text-align:center;  font-weight:bold;" > Description  of the mark:* </p></td>
        <td style="background-color: #fff;padding-top:5px;">As Annexed<br><br>
        </td>
      </tr>

      <tr>
        <td> <p >5.</p> </td>
        <td> <p style="font-size:12px; text-align:center;  font-weight:bold;" > DESCRIPTION GOODS OR SERVICES: </p></td>
        <td><?php if(isset($SERVICES)){ echo $SERVICES; } ?></td>
      </tr>

      <tr>
        <td> <p >6.</p> </td>
        <td> <p style="font-size:12px; text-align:center;  font-weight:bold;" > Class : * </p></td>
        <td><?php if(isset($TM)){ echo $TM; } ?></td>
      </tr>

      <tr>
        <td> <p >7.</p> </td>
        <td> <p style="font-size:12px; text-align:center;  font-weight:bold;" > Trade Description : * </p></td>
        <td><?php if(isset($TRADE_0) && $TRADE_0 != ''){ echo $TRADE_0.', '; } ?>
        <?php if(isset($TRADE_1) && $TRADE_1 != ''){ echo $TRADE_1.', '; } ?>
        <?php if(isset($TRADE_2) && $TRADE_2 != ''){ echo $TRADE_2.', '; } ?>
        <?php if(isset($TRADE_3) && $TRADE_3 != ''){ echo $TRADE_3.', '; } ?>
        <?php if(isset($TRADE_4) && $TRADE_4 != ''){ echo $TRADE_4.', '; } ?></td>
      </tr>

      <tr>
        <td> <p >8.</p> </td>
        <td> <p style="font-size:12px; text-align:center;  font-weight:bold;" > STATEMENT AS TO USE OF MARK: </p></td>
        <td><?php if(isset($PROPOSED)){ echo $PROPOSED; } ?></td>
      </tr>

      <tr>
        <td> <p >9.</p> </td>
        <td> <p style="font-size:12px; text-align:center;  font-weight:bold;" > VERIFICATION: </p></td>
        <td>I hereby verify that above mentioned facts are true
          and correct to best of my knowledge and belief.
           </td>
      </tr>

      <tr>
        <td  rowspan="3" valign="top" style="padding-top:0px;">10.</td>
        <td> <p style="font-size:12px; text-align:center;  font-weight:bold;" > Signature: </p></td>
        <td> <br> <br> </td>
      </tr>

      <tr>
        <td style="background-color: #d0d0d0;"> <p style="font-size:12px; text-align:center;  font-weight:bold;" > Name: </p></td>
        <td style="background-color: #fff; padding-top:5px;"><?php if(isset($NAME)){ echo $single_name[0] ; } ?><br><br> </td>
      </tr>

      <tr>
        <td style="background-color: #d0d0d0;"> <p style="font-size:12px; text-align:center;  font-weight:bold;" > Designation: </p></td>
        <td style="background-color: #fff;">
          <?php
            if(isset($organization_id) && ($organization_id == 1)){ echo 'Applicant'; }
            elseif (isset($organization_id) && ($organization_id == 5 )){ echo 'Propritor'; }
            elseif (isset($organization_id) && ($organization_id == 6 )){ echo 'Director'; }
            elseif (isset($organization_id) && ($organization_id == 7 || $organization_id == 10)){ echo 'Partner'; }
            elseif (isset($organization_id) && ($organization_id == 3 )){ echo 'Karta'; }
            else{ echo ''; }
          ?>
        <br><br> </td>
      </tr>
      <tr>
        <td> <p >11.</p> </td>
        <td> <p style="font-size:12px; text-align:center;  font-weight:bold;" > ASSOCIATE OF MARK: </p></td>
        <td><?php echo $ASSOCIATE_MARK; ?></td>
      </tr>
    </table>
</div>

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
