<!DOCTYPE html>
<html>
<?php
$page = "application_list";
?>
<?php
  $user_roll = $this->session->userdata('roll_id');
  $law_user_id = $this->session->userdata('law_user_id');
  $user_info = $this->User_Model->get_info_arr('user_id', $law_user_id, 'law_user');
  $roll_info = $this->User_Model->get_info_arr('roll_id', $user_roll, 'law_roll');
?>

<style>
  td{
    padding:2px 10px !important;
  }
  #div1, #div1_sub{
    /* height: 30px; */
    overflow-y:hidden;
  }

  .wrapper1, .wrapper2 {
    overflow-x: scroll;
    overflow-y:hidden;
  }
    .div1 {
      width:1200px;
      height: 20px;
    }
    .div2 {
      width:1200px;
      overflow: hidden;
    }
</style>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 mt-1">
            <h4>Payment Status</h4>
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
            <div class="card-header">
              <h3 class="card-title"><i class="fa fa-list"></i> List Payment Status</h3>
              <!--  -->
            </div>
            <!-- /.card-header -->
            <div class="card-body" >
              <div class="wrapper1">
                <div class="div1"></div>
              </div>
              <div class="wrapper2">
                <table id="application_list" class="table table-bordered table-striped tbl_add div2">
                  <thead>
                  <tr>
                    <!-- <th class="sr_no">Sr. No.</th> -->
                    <th class="sr_no">Application No.</th>
                    <th>Date</th>
                    <th>Branch</th>
                    <th>Org Type</th>
                    <th>Service</th>
                    <th>Org. Name</th>
                    <th>Outstanding Amount</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $i=0;
                  foreach ($application_list as $list) {
                    $service_id = $list->service_id;
                    $i++;
                    $master_payment_info = $this->Transaction_Model->get_payment_info2($list->appl_id);
                    $received_amount = $this->Transaction_Model->get_received_amount($list->appl_id);
                    $outstanding_amount = $master_payment_info[0]['TOTALAMOUNT'] - $received_amount;
                  ?>
                  <tr>
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
                    <td> &#8377;
                      <?php echo $outstanding_amount; ?>
                    </td>
                  </tr>
                  <?php } ?>
                  <tbody>
                </table>
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
    $(document).ready(function(){
      var tbl_width = $('#application_list').width();
      $("#div1_sub").css("width", tbl_width);
      $(function(){
        $(".wrapper1").scroll(function(){
            $(".wrapper2")
                .scrollLeft($(".wrapper1").scrollLeft());
        });
        $(".wrapper2").scroll(function(){
            $(".wrapper1")
                .scrollLeft($(".wrapper2").scrollLeft());
        });
      });
    });

    // $(function(){
    //   $(".div1").scroll(function(){
    //     $(".div2").scroll($(".div1").scroll());
    //   });
    //   $(".div2").scroll(function(){
    //     $(".div1").scroll($(".div2").scroll());
    //   });
    // });
  </script>
</body>
</html>
