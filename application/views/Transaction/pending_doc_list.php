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
  .w_100{
    min-width:100px !important;
  }
  .w_200{
    min-width:300px !important;
  }
  .wrapper1, .wrapper2 {
    overflow-x: scroll;
    overflow-y:hidden;
  }
  <?php if(isset($user_roll) && ($user_roll == 1 || $user_roll == 5)){ ?>
    .div1 {
      width:1400px;
      height: 20px;
    }
    .div2 {
      width:1400px;
      overflow: hidden;
    }
  <?php } else{ ?>
    .div1 {
      width:1400px;
      height: 20px;
    }
    .div2 {
      width:1400px;
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
                    <th class="sr_no">Appl No.</th>
                    <th class="">Date</th>
                    <th class="sr_no">Branch</th>
                    <th>Org Type</th>
                    <th>Service</th>
                    <th>Org. Name</th>
                    <th class="sr_no">Status</th>
                    <th class="w_200">Pending Document</th>
                    <th>Add Comment</th>
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
                    <td class=""><?php echo $list->application_date; ?></td>
                    <td class="sr_no"><?php echo $list->branch_name; ?></td>
                    <td><?php echo $list->organization_name; ?></td>
                    <td><?php echo $list->service_name; ?></td>
                    <?php if($service_id == 1){ ?>
                      <td><?php echo $list->ORGANIZATION; ?></td>
                    <?php } elseif ($service_id == 2) { ?>
                      <td><?php echo $list->org_name; ?></td>
                    <?php } else{ ?>
                      <td><?php echo $list->appl_org_name; ?></td>
                    <?php } ?>
                    <td class="sr_no">
                      <?php echo $list->application_status;
                      $application_status = $list->application_status;
                      if($application_status == 'Legal In Process' || $application_status == 'Pending for Legal' || $application_status == 'Legal Completed' ){
                        $legal_user = $this->User_Model->get_info_arr('user_id', $list->legal_user, 'law_user');
                        echo '<br>('.$legal_user[0]['user_name'].' '.$legal_user[0]['user_lastname'].')';
                      }
                      ?>
                    </td>
                    <td class="w_200">
                      <?php
                      $pending_docs = $this->Transaction_Model->get_pending_docs($list->appl_id);
                      if($pending_docs){
                        foreach ($pending_docs as $docs) {
                          echo $docs->doc_type.', ';
                        }
                      } else{
                        $pending_docs2 = $this->User_Model->get_info_arr('service_id', $service_id, 'law_service');
                        echo $pending_docs2[0]['service_document'];
                      }
                      ?>
                    </td>
                    <td>
                      <button type="button" class="btn btn-sm btn-primary add_comment" id="<?php echo $list->appl_id; ?>" name="<?php echo $list->comment; ?>" data-toggle="modal" data-target="#modal-default">
                        <i class="fa fa-plus"></i>
                      </button><br>
                      <?php echo $list->comment; ?>
                    </td>
                  </tr>
                  <?php } ?>
                  <tbody>
                </table>
              </div>
              <input type="button" name="export" id="export_excel" onclick="Export()" class="btn btn-primary" value="Export to Excel">
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->

        <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Comment</h4>
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
                      <textarea class="form-control form-control-sm" name="comment" id="comment" rows="3" cols="80" title="Add Comment" placeholder="Add Comment" required></textarea>
                    </div>
                    <label class="text-red" id="error_name">  </label>
                  </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" id="save_comment" class="btn btn-primary">Save changes</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
  <!-- /.modal -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
  <script src="<?php echo base_url(); ?>assets/js/table2excel.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $(function(){
        $(".wrapper1").scroll(function(){
          $(".wrapper2").scrollLeft($(".wrapper1").scrollLeft());
        });
        $(".wrapper2").scroll(function(){
          $(".wrapper1").scrollLeft($(".wrapper2").scrollLeft());
        });
      });
    });

    $(".add_comment").click(function(){
      var application_id = $(this).attr('id');
      var comment = $(this).attr('name');

      $(".application_id").val(application_id);
      $("#comment").val(comment);
    });

    $("#save_comment").click(function(){
    var application_id = $("#application_id").val();
    var comment = $("#comment").val();
    if(comment == ''){
      $('#error_name').show();
      $('#error_name').html("Enter Comment");
    } else {
      $('#error_name').hide();
      $.ajax({
        url: '<?php echo base_url(); ?>Transaction/add_comment',
        type: "POST",
        data: {"application_id":application_id,
          "comment":comment
         },
        success: function (result) {
            window.location.href = "<?php echo base_url().'Transaction/pending_doc_list'; ?>";
        }
      });
    }
  });

    function Export() {
      $("#application_list").table2excel({
        filename: "pending_docs.xls"
      });
    }
  </script>

</body>
</html>
