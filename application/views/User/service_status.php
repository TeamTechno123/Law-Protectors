<!DOCTYPE html>
<html>
<?php
$page = "set_target";
?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-center mt-2">
            <h1>Service Status</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-8 offset-md-2">
            <!-- general form elements -->
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Add Service Status</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post">
                <div class="card-body row">
                  <div class="form-group col-md-12">
                    <select class="form-control select2 form-control-sm"  name="service_id" id="service_id" required >
                      <?php if(isset($update)){ ?>
                        <option value="<?php echo $service_id; ?>" selected><?php echo $service_name; ?></option>
                      <?php } else { ?>
                      <option selected="selected" value="">Select Product / Services</option>
                      <?php foreach ($service_list as $list) { ?>
                        <option value="<?php echo $list->service_id; ?>" <?php if(isset($service_id)){ if($list->service_id == $service_id){ echo "selected"; } }  ?>><?php echo $list->service_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>

                  <div class="form-group col-md-8">
                    <label for=""> Add Status For This Service</label>
                  </div>
                  <div class="form-group col-md-4">
                      <button type="button" id="add_row"  class="btn btn-success">Add Row</button>
                  </div>
                  <!-- <?php print_r($status_list); ?> -->
                  <table id="myTable" width="100%">
                    <?php
                    if($status_list){
                     $i = 0; foreach ($status_list as $list) {  ?>
                       <input type="hidden" name="input[<?php echo $i; ?>][status_id]" value="<?php echo $list->status_id; ?>">
                      <tr>
                        <td width="70%">
                            <input type="text" class="form-control form-control-sm mt-2" name="input[<?php echo $i; ?>][status_name]" value="<?php echo $list->status_name; ?>" title="Enter Status" placeholder="Enter Status">
                        </td>
                        <td width="20%">
                            <input type="text" class="form-control form-control-sm mt-2" name="input[<?php echo $i; ?>][status_days]" value="<?php echo $list->status_days; ?>" title="Alert Days" placeholder="Alert Days">
                        </td>
                        <td  width="10%" class="text-left pl-4">
                          <?php if($i > 0){ ?>
                            <a><i class="fa fa-trash text-danger"></i></a>
                        <?php  } ?>
                        </td>
                      </tr>
                    <?php $i++; } } else{?>
                    <tr>
                      <td width="70%">
                          <input type="text" class="form-control form-control-sm mt-2" name="input[0][status_name]" title="Enter Status" placeholder="Enter Status">
                      </td>
                      <td width="20%">
                          <input type="text" class="form-control form-control-sm mt-2" name="input[0][status_days]" title="Alert Days" placeholder="Alert Days">
                      </td>
                      <td  width="10%" class="text-left pl-4">
                      </td>
                    </tr>
                  <?php } ?>
                  </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <?php if(isset($update)){ ?>
                    <button type="submit" class="btn btn-primary px-4">Update</button>
                  <?php } else{ ?>
                    <button type="submit" class="btn btn-success px-4">Add</button>
                  <?php } ?>
                  <a href="#" class="btn btn-default ml-4">Cancel</a>
                </div>
              </form>
            </div>

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>


  <script type="text/javascript">

  <?php if($status_list){ ?>
  var i = <?php echo $i-1; ?>;
  <?php } else{ ?>
    var i = 0;
  <?php } ?>


  $('#add_row').click(function(){
    i++;
    var row = '<tr>'+
      '<td width="70%">'+
          '<input type="text" class="form-control form-control-sm mt-2" name="input['+i+'][status_name]" title="Enter Status" placeholder="Enter Status">'+
      '</td>'+
      '<td width="20%">'+
          '<input type="text" class="form-control form-control-sm mt-2" name="input[0][status_days]" title="Alert Days" placeholder="Alert Days">'+
      '</td>'+
      '<td  width="10%" class="text-left pl-4">'+
      '<a><i class="fa fa-trash text-danger"></i></a>'+
      '</td>'+
    '</tr>';
    $('#myTable').append(row);
  });
  $('#myTable').on('click', 'a', function () {
    $(this).closest('tr').remove();
  });
  </script>


  <script type="text/javascript">
  $('#branch_id').on('change',function(){
    var branch_id = $(this).val();
    $.ajax({
      url:'<?php echo base_url(); ?>User/get_user_list_by_branch',
      type: 'POST',
      data: {"branch_id":branch_id},
      context: this,
      success: function(result){
        $('#user_list').html(result);
        // var data = JSON.parse(result)
        // $('#manager_id').html(data['manager']);
        // $('#rc_id').html(data['rc']);
        // $('#tc_id').html(data['tc']);
      }
    });
  })
  </script>
</body>
</html>
