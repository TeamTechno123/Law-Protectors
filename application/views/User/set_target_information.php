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
            <h1>SET TARGET INFORMATION</h1>
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
                <h3 class="card-title">Set Target Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post">
                <!-- <input type="hidden" name="target_id" value="<?php if(isset($target_id)){ echo $target_id; } ?>"> -->
                <div class="card-body row">
                  <!-- <div class="form-group col-md-12 drop-lg"> -->

                  <input type="hidden" name="target_no" value="<?php if(isset($target_no)){ echo $target_no; } ?>">
                  <!-- </div> -->
                  <div class="form-group col-md-12 drop-lg">
                    <select class="form-control select2 " name="target_id" id="target_id" title="Select Target" style="width: 100%;" <?php if(isset($update)){ echo 'disabled'; } else{ echo 'required'; } ?>>
                      <option selected="selected" value="" >Select Target </option>
                      <?php foreach ($target_list as $list) { ?>
                      <option value="<?php echo $list->target_id; ?>" <?php if(isset($target_id)){ if($list->target_id == $target_id){ echo "selected"; } }  ?>><?php echo $list->target_title; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <!-- <div class="form-group col-md-12">
                    <input type="text" class="form-control" name="target_title" value="<?php if(isset($target_title)){ echo $target_title; } ?>" title="Title of Target" placeholder="Title of Target" required>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="target_from" id="date1" value="<?php if(isset($target_from)){ echo $target_from; } ?>" data-target="#date1" data-toggle="datetimepicker" title="From Date" placeholder="From Date" required>
                    <label class="text-red m-0 req-alert"> <?php echo form_error('target_from'); ?> </label>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="target_to" id="date2" value="<?php if(isset($target_to)){ echo $target_to; } ?>" data-target="#date2" data-toggle="datetimepicker" title="To Date" placeholder="To Date" required>
                    <label class="text-red m-0 req-alert"> <?php echo form_error('target_to'); ?> </label>
                  </div> -->
                  <div class="form-group col-md-12 drop-lg">
                    <select class="form-control select2 " name="branch_id" id="branch_id" title="Select Branch" style="width: 100%;" <?php if(isset($update)){ echo 'disabled'; } else{ echo 'required'; } ?>>
                      <option selected="selected" value="" >Select Branch </option>
                      <?php foreach ($branch_list as $list) { ?>
                      <option value="<?php echo $list->branch_id; ?>" <?php if(isset($branch_id)){ if($list->branch_id == $branch_id){ echo "selected"; } }  ?>><?php echo $list->branch_name; ?></option>
                      <?php } ?>
                    </select>
                    <label class="text-red m-0 req-alert"> <?php echo form_error('branch_id'); ?> </label>
                  </div>
                  <?php if(isset($target_details)){ ?>
                  <div class="form-group col-md-12 row" id="user_list">
                    <div class="form-group col-md-4 text-bold">
                      Roll
                    </div>
                    <div class="form-group col-md-4 text-bold">
                      Name of User
                    </div>
                    <div class="form-group col-md-4 text-bold">
                      Target Amount
                    </div>

                    <?php
                    $j = 0;
                    foreach ($target_details as $details) { ?>
                      <div class="form-group col-md-4">
                        <?php echo $details->roll_name; ?>
                        <input type="hidden" name="input[<?php echo $j ?>][target_details_id]" value="<?php echo $details->target_details_id; ?>">
                      </div>
                      <div class="form-group col-md-4">
                        <?php echo $details->user_name.' '.$details->user_lastname; ?>
                        <input type="hidden" name="input[<?php echo $j ?>][user_id]" value="<?php echo $details->user_id; ?>">
                      </div>
                      <div class="form-group col-md-4">
                        <input type="text" class="form-control" name="input[<?php echo $j ?>][target_amount]" value="<?php echo $details->target_amount; ?>" title="Target" placeholder="Target" required>
                      </div>
                    <?php $j++; } ?>

                  </div>
                  <?php } ?>
                  <div class="form-group col-md-12 row" id="user_list">
                  </div>
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
