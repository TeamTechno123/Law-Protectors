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
  <?php if(isset($user_roll) && ($user_roll == 1 || $user_roll == 5)){ ?>
    .div1 {
      width:1600px;
      height: 20px;
    }
    .div2 {
      width:1600px;
      overflow: hidden;
    }
  <?php } else{ ?>
    .div1 {
      width:1200px;
      height: 20px;
    }
    .div2 {
      width:1200px;
      overflow: hidden;
    }
  <?php } ?>
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
            <h4>VIEW ALL APPLICATION INFORMATION</h4>
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
              <h3 class="card-title"><i class="fa fa-list"></i> List Application Information</h3>
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
                    <th>Status</th>
                    <?php if(isset($user_roll) && ($user_roll == 1 || $user_roll == 5)){ ?>
                    <th >Legal Upload</th>
                  <?php } ?>
                    <th class="sr_no">Application Upload</th>
                    <?php if(isset($user_roll) && ($user_roll == 1 || $user_roll == 5)){ ?>
                    <th class="sr_no">Invoice</th>
                    <th class="sr_no">Change Status</th>
                    <th class="sr_no">Action</th>
                  <?php } ?>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $i=0;
                  foreach ($application_list as $list) {
                    $service_id = $list->service_id;
                    $i++;
                  ?>
                  <tr>
                    <?php //echo print_r($list).'<br><br>';  ?>
                    <!-- <td class="sr_no"><?php echo $i; ?></td> -->
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
                      <?php echo $list->application_status;
                      $application_status = $list->application_status;
                      if($application_status == 'Legal In Process' || $application_status == 'Pending for Legal' || $application_status == 'Legal Completed' ){
                        $legal_user = $this->User_Model->get_info_arr('user_id', $list->legal_user, 'law_user');
                        echo '<br>('.$legal_user[0]['user_name'].' '.$legal_user[0]['user_lastname'].')';
                      }
                      ?>
                    </td>
                    <?php if(isset($user_roll) && ($user_roll == 1 || $user_roll == 5)){ ?>
                    <td >
                      <a href="<?php echo base_url(); ?>Transaction/legal_doc_view/<?php echo $list->appl_id; ?>"> <i class="fa fa-eye"></i> </a>
                    </td>
                  <?php } ?>

                    <td class="sr_no">
                      <a href="<?php echo base_url(); ?>Transaction/document_uploading_form/<?php echo $list->appl_id; ?>"> <i class="fa fa-upload"></i> </a>
                    </td>
                    <?php if(isset($user_roll) && ($user_roll == 1 || $user_roll == 5)){ ?>
                    <td class="sr_no">
                      <a href="<?php echo base_url(); ?>Transaction/sale_invoice/<?php echo $list->appl_id; ?>"> <i class="fa fa-plus"></i> </a>
                    </td>
                    <td class="sr_no">
                      <a href="<?php echo base_url(); ?>Transaction/change_status/<?php echo $list->appl_id; ?>"> <i class="fa fa-edit"></i> </a>
                    </td>
                    <td class="sr_no">
                      <a href="<?php echo base_url(); ?>Transaction/edit_application/<?php echo $list->appl_id; ?>"> <i class="fa fa-edit"></i> </a>
                      <?php if($user_roll == 1){ ?>
                        <a href="<?php echo base_url(); ?>Transaction/delete_application/<?php echo $list->appl_id; ?>" onclick="return confirm('Delete this Application');" class="ml-4"> <i class="fa fa-trash"></i> </a>
                      <?php } ?>
                    </td>
                    <?php } ?>
                  </tr>
                  <?php } ?>
                  <tbody>
                </table>
              </div>




              <!-- <div class="w-100" style="overflow-x:auto;" id="div1">
                <div class="" id="div1_sub">
                </div>
              </div>
              <div class="" style="overflow-x:auto;" id="div2">

              </div> -->


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
      // alert(tbl_width);
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
