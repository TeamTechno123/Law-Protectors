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
                    <th>Payment Status</th>
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
                      <?php if($list->payment_status == 'Uncleared'){ ?>
                        <a href="#" class="pay_status" id="<?php echo $list->appl_id; ?>" name="<?php echo $list->payment_status; ?>" received="<?php echo $list->pay_rec_by; ?>" data-toggle="modal" data-target="#modal-default">
                          <small class="badge badge-danger"><?php echo $list->payment_status; ?></small>
                        </a>
                      <?php } else{ ?>
                        <a href="#" class="pay_status" id="<?php echo $list->appl_id; ?>" name="<?php echo $list->payment_status; ?>" received="<?php echo $list->pay_rec_by; ?>"  data-toggle="modal" data-target="#modal-default">
                          <small class="badge badge-success"><?php echo $list->payment_status; ?></small>
                        </a>
                      <?php } ?>
                    </td>
                  </tr>
                  <?php } ?>
                  <tbody>
                </table>
              </div>
            </div>
            <!-- /.card-body -->

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
                          <input type="text" class="form-control form-control-sm" name="pay_rec_by" id="pay_rec_by" title="Received By" placeholder="Received By" required>
                        </div>
                        <div class="form-group col-md-12 ">
                          <select class="form-control form-control-sm" name="payment_status" id="payment_status">
                            <option value="">Select Status</option>
                            <option value="Uncleared">Uncleared</option>
                            <option value="Clear">Clear</option>
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

    $(".pay_status").click(function(){
      var application_id = $(this).attr('id');
      var payment_status = $(this).attr('name');
      var pay_rec_by = $(this).attr('received');

      $(".application_id").val(application_id);
      $("#payment_status").val(payment_status);
      $("#pay_rec_by").val(pay_rec_by);
    });

    $("#save_status").click(function(){
    var application_id = $("#application_id").val();
    var payment_status = $("#payment_status").val();
    var pay_rec_by = $("#pay_rec_by").val();
    if(payment_status == ''){
      $('#error_name').show();
      $('#error_name').html("Select Status");
    } else {
      // alert(payment_status);
      $('#error_name').hide();

      $.ajax({
        url: '<?php echo base_url(); ?>Transaction/update_pay_status',
        type: "POST",
        data: { "application_id":application_id,
                "payment_status":payment_status,
                "pay_rec_by":pay_rec_by
               },
        success: function (result) {
            window.location.href = "<?php echo base_url().'Transaction/payment_status_list'; ?>";
        }
      });
    }
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
