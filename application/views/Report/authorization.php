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
  <body onload="printDiv();">
  <!-- <body> -->
      <div id='DivIdToPrint'>
        <?php
        $single_name = explode(',', $NAME);
        ?>
    <br><br><br> <br><br><br><br><br> <br><br> <br><br><br> <br><br> <br><br><br> <br><br> <br><br><br> <br><br>
     <br><br><br><br><br><br> <br><br>  <br><br>
    <h2  style="font-size:15px; line-height: 27px; margin-top: 0px; margin-bottom: 0px; font-family: times, serif; text-align:center;"> “ The Trade Marks Act 1999”</h2>

    <h3  style="font-size:13px; line-height: 16px; margin-top: 0px; margin-bottom: 0px; font-family: times, serif; text-align:center;"> Form Of Authorization Of An Attorney</h3>

    <h4  style="font-size:13px; line-height: 16px; margin-top: 0px; margin-bottom: 0px; font-family: times, serif; text-align:center; margin-left:275px;">     Attorney’s Code No: 14326 <br> Proprietor’s Code no:  </h4>

    <p style="font-size:13px; text-align:center;  font-style: italic; line-height: 16px;"  > (See Sec. 145; Rule 21)</p>


    <!--<p  style="font-size:13px; text-align:justify;  font-style: italic; padding:10px 20px;">I <?php if(isset($ASSOCIATION)){ echo $ASSOCIATION; } ?>, carrying on business at, <?php echo $FIRMADDRESS; ?>. hereby authorize Lawprotectors & their Advocates, Adv. <?php echo $ADV_NAME; ?>, Advocate, (Bar Council No. - <?php echo $BAR_COUN_NO; ?>) Trademark Attorneys and Advocates  of  Lawprotectors (Attorney code :<?php echo $company_lic1; ?>) and any other authorized by them ,having their address , Lawprotectors <?php echo $company_address; ?>. all or any of them, to act as my (or our) Attorney for registration of our trade mark(s) and request that all notices, requisitions and communications relating thereto may be sent to such Attorneys at the above address. I, hereby revoke all previous authorisations, if any, in respect of the above proceeding</p>-->


   <?php if(isset($organization_id) && ($organization_id == 1)){ ?>
    <p  style="font-size:13px; text-align:justify;  font-style: italic; padding:10px 20px;">I  <?php echo $single_name[0]; ?>  carrying on business at, <?php echo $FIRMADDRESS; ?>. hereby authorize Lawprotectors & their Advocates, Adv. <?php echo $ADV_NAME; ?>, Advocate, (Bar Council No. - <?php echo $BAR_COUN_NO; ?>) Trademark Attorneys and Advocates  of  Lawprotectors (Attorney code :<?php echo $company_lic1; ?>) and any other authorized by them ,having their address , Lawprotectors <?php echo $company_address; ?>. all or any of them, to act as my (or our) Attorney for registration of our trade mark(s) and request that all notices, requisitions and communications relating thereto may be sent to such Attorneys at the above address. I, hereby revoke all previous authorisations, if any, in respect of the above proceeding</p>
    <?php } elseif(isset($organization_id) && ($organization_id == 5)){ ?>
    <p  style="font-size:13px; text-align:justify;  font-style: italic; padding:10px 20px;">
        I <?php echo $single_name[0]; ?> , carrying on business as a proprietor under the name and style of <?php echo $ORGANIZATION; ?>, situated at, <?php echo $FIRMADDRESS; ?>.
        hereby authorize Lawprotectors & their Advocates, Adv. <?php echo $ADV_NAME; ?>, Advocate, (Bar Council No. - <?php echo $BAR_COUN_NO; ?>) Trademark Attorneys and Advocates  of  Lawprotectors (Attorney code :<?php echo $company_lic1; ?>) and any other authorized by them ,having their address , Lawprotectors <?php echo $company_address; ?>. all or any of them, to act as my (or our) Attorney for registration of our trade mark(s) and request that all notices, requisitions and communications relating thereto may be sent to such Attorneys at the above address. I, hereby revoke all previous authorisations, if any, in respect of the above proceeding</p>
   <?php } elseif(isset($organization_id) && ($organization_id == 3)){ ?>
        <p  style="font-size:13px; text-align:justify;  font-style: italic; padding:10px 20px;">I / We  <?php foreach ($single_name as $item) {  echo '<b>'.$item.'</b>';} ?> ( Karta of Hindu Undivided Family ) on behalf of <?php echo $ORGANIZATION; ?> , carrying on business at, <?php echo $FIRMADDRESS; ?>. hereby authorize Lawprotectors & their Advocates, Adv. <?php echo $ADV_NAME; ?>, Advocate, (Bar Council No. - <?php echo $BAR_COUN_NO; ?>) Trademark Attorneys and Advocates  of  Lawprotectors (Attorney code :<?php echo $company_lic1; ?>) and any other authorized by them ,having their address , Lawprotectors <?php echo $company_address; ?>. all or any of them, to act as my (or our) Attorney for registration of our trade mark(s) and request that all notices, requisitions and communications relating thereto may be sent to such Attorneys at the above address. I, hereby revoke all previous authorisations, if any, in respect of the above proceeding</p>
   <?php }else { ?>
    <p  style="font-size:13px; text-align:justify;  font-style: italic; padding:10px 20px;">I / We  <?php foreach ($single_name as $item) {  echo '<b>'.$item.'</b>';} ?> () on behalf of <?php echo $ORGANIZATION; ?> , carrying on business at, <?php echo $FIRMADDRESS; ?>. hereby authorize Lawprotectors & their Advocates, Adv. <?php echo $ADV_NAME; ?>, Advocate, (Bar Council No. - <?php echo $BAR_COUN_NO; ?>) Trademark Attorneys and Advocates  of  Lawprotectors (Attorney code :<?php echo $company_lic1; ?>) and any other authorized by them ,having their address , Lawprotectors <?php echo $company_address; ?>. all or any of them, to act as my (or our) Attorney for registration of our trade mark(s) and request that all notices, requisitions and communications relating thereto may be sent to such Attorneys at the above address. I, hereby revoke all previous authorisations, if any, in respect of the above proceeding</p>
    <?php } ?>
    
    
     <br><br><br>
    <p style="font-size:13px; text-align:right; font-weight:bold; padding-right:30px;"> Cont'd ....2</p>

    <br><br><br><br><br><br><br> <br><br><br><br><br> <br><br> <br><br><br> <br><br> <br><br><br><br><br>

    <p style="font-size:13px; text-align:center;">:2:</p> <br>
    <div class="" style="padding:10px 30px; ">
      <p style="font-size:13px; text-align:center;  font-style: italic;">All communications relating to this application may be sent to the following address in India:</p>

      <p style="font-size:13px; text-align:left;  font-weight:bold;">Law Protectors </p>
      <p style="font-size:13px; text-align:left;  font-weight:bold;">Adv. <?php echo $ADV_NAME; ?>, Constituted Attorneys for the Applicant</p>
      <p style="font-size:13px; text-align:left;  font-weight:bold;"><?php echo $company_address; ?></p>
      <p style="font-size:13px; text-align:left;  font-style: bold;">Dated this <?php echo $DATE; ?></p> <br><br><br><br>
     <?php if(isset($organization_id) && ($organization_id != 1)){ ?>
      <p style="font-size:13px;  "> <span style="text-align:left;"></span>  <span style="float:right;"><b> For <?php echo $ORGANIZATION; ?> </b></span>    </p><br>
      <?php } ?>
      <p style="font-size:13px; text-align:left;  ">To,</p>
      <p style="font-size:13px;  "> <span style="text-align:left;">The Registrar of Trade Mark,</span>  <span style="float:right;">________________________________ </span>    </p>
      <p style="font-size:13px;  "> <span style="text-align:left;"> The Office of the Trade Marks Registry, Mumbai.</span>  <span style="float:right; font-weight:bold; text-transform: uppercase;"> <?php echo $SIGN_AUTH; ?> </span></p>


        <p style="font-size:13px; float:right;  font-weight:bold;">
          (<?php
            if(isset($organization_id) && ($organization_id == 1)){ echo 'Applicant'; }
            elseif (isset($organization_id) && ($organization_id == 5 )){ echo 'Propritor'; }
            elseif (isset($organization_id) && ($organization_id == 9 )){ echo 'Name Of Signatory In Block Letters'; }
            elseif (isset($organization_id) && ($organization_id == 6 )){ echo 'Director'; }
            elseif (isset($organization_id) && ($organization_id == 4 || $organization_id == 7 || $organization_id == 10)){ echo 'Partner'; }
            elseif (isset($organization_id) && ($organization_id == 3 )){ echo 'Karta'; }
            else{ echo ''; }
          ?>)
        </p>

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
