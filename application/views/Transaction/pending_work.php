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
      width:1700px;
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
  .wrapper1{
    position : sticky;
    bottom: 0;
  }
</style>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 mt-1">
            <h4>Pending Work</h4>
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
            </div>
            <!-- /.card-header -->
            <div class="card-body" >
              <!-- <div class="wrapper1">
                <div class="div1"></div>
              </div> -->
              <div class="wrapper2">
                <table id="application_list" class="table table-bordered table-striped tbl_add div2">
                  <thead>
                    <tr>
                      <th class="sr_no">Application No.</th>
                      <th>Date</th>
                      <th>Branch</th>
                      <th>Org Type</th>
                      <th>Service</th>
                      <th>Org. Name</th>
                      <th>Status</th>
                      <th>Work Status</th>
                      <th >Legal Upload</th>
                      <th class="sr_no">Application Upload</th>
                      <th class="sr_no">Invoice</th>
                      <th class="sr_no">Change Status</th>
                      <th class="sr_no">Action</th>

                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $i=0;
                    foreach ($application_list as $list) {
                      $service_id = $list->service_id;
                      $organization_id = $list->organization_id;
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
                    <?php if($service_id == 1){
                      if($organization_id == 1){
                      ?>

                      <td><?php echo $list->NAME; ?></td>
                    <?php } else{ ?>
                      <td><?php echo $list->ORGANIZATION; ?></td>
                    <?php }
                     } elseif ($service_id == 2) { ?>
                      <td><?php echo $list->org_name; ?></td>
                    <?php } else{ ?>
                      <td><?php echo $list->appl_org_name; ?></td>
                    <?php } ?>
                    <td><?php echo $list->application_status; ?></td>
                    <td>
                      <?php if($list->application_status_progress == 'Pending'){ ?>
                        <a href="#" class="pay_status" id="<?php echo $list->appl_id; ?>" name="<?php echo $list->application_status_progress; ?>"  data-toggle="modal" data-target="#modal-default">
                          <small class="badge badge-danger"><?php echo $list->application_status_progress; ?></small>
                        </a>
                      <?php } else{ ?>
                        <a href="#" class="pay_status" id="<?php echo $list->appl_id; ?>" name="<?php echo $list->application_status_progress; ?>" data-toggle="modal" data-target="#modal-default">
                          <small class="badge badge-success"><?php echo $list->application_status_progress; ?></small>
                        </a>
                      <?php } ?>
                    </td>
                    <td >
                      <a href="<?php echo base_url(); ?>Transaction/legal_doc_view/<?php echo $list->appl_id; ?>"> <i class="fa fa-eye"></i> </a>
                    </td>
                    <td class="sr_no">
                      <a href="<?php echo base_url(); ?>Transaction/document_uploading_form/<?php echo $list->appl_id; ?>"> <i class="fa fa-upload"></i> </a>
                    </td>
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

        <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Change Status</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="" method="POST" accept-charset="utf-8">
                <div class="box-body">
                  <div class="form-group">
                    <input type="hidden" class="application_id" name="application_id" id="application_id" value="">
                  </div>
                  <div class="row w-100 m-0">
                    <div class="form-group col-md-12 ">
                      <select class="form-control form-control-sm" data-placeholder="Select Status" name="application_status_progress" id="application_status_progress">

                        <option value="Pending">Pending</option>
                        <option value="Complete">Complete</option>
                      </select>
                    </div>
                    <label class="text-red" id="error_name">  </label>
                  </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" id="save_status" class="btn btn-primary">Save changes</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
  <!-- /.modal -->

        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

    <div class="wrapper1">
      <div class="div1"></div>
    </div>
  </div>
  <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $(".content-wrapper").css("min-height", "100vh");
      $(function(){
        $(".wrapper1").scroll(function(){
          $(".wrapper2").scrollLeft($(".wrapper1").scrollLeft());
        });
        $(".wrapper2").scroll(function(){
          $(".wrapper1").scrollLeft($(".wrapper2").scrollLeft());
        });
      });
    });

    $(".pay_status").click(function(){
      var application_id = $(this).attr('id');
      var application_status_progress = $(this).attr('name');

      $(".application_id").val(application_id);
      $("#application_status_progress").val(application_status_progress);
    });

    $("#save_status").click(function(){
    var application_id = $("#application_id").val();
    var application_status_progress = $("#application_status_progress").val();
    if(application_status_progress == ''){
      $('#error_name').show();
      $('#error_name').html("Select Status");
    } else {
      $('#error_name').hide();

      $.ajax({
        url: '<?php echo base_url(); ?>Transaction/update_work_status',
        type: "POST",
        data: { "application_id":application_id,
                "application_status_progress":application_status_progress,
               },
        success: function (result) {
            window.location.href = "<?php echo base_url().'Transaction/pending_work'; ?>";
        }
      });
    }
  });
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
      <?php if($this->session->flashdata('email_success')){ ?>
        toastr.success('Email Sent Successfully');
      <?php } ?>
      <?php if($this->session->flashdata('email_error')){ ?>
        toastr.error('Email Not Sent');
      <?php } ?>
    });
  </script>

</body>
</html>
