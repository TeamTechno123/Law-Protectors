<!DOCTYPE html>
<html>
<?php
$page = "application_information";
?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 mt-1 text-center">
            <h4>APPLICATION INFORMATION</h4>
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
            <div class="card">
            <!-- /.card-header -->
            <?php if(!isset($update)){ ?>
            <form action="<?php echo base_url(); ?>Transaction/save_application" method="post" role="form" enctype="multipart/form-data" autocomplete="off">
            <?php } else{ ?>
            <form action="<?php echo base_url(); ?>Transaction/edit_application_next" method="post" role="form" enctype="multipart/form-data" autocomplete="off">
            <input type="hidden" name="application_id" value="<?php echo $application_id; ?>">
            <?php } ?>
                <div class="card-body row">
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="application_no" id="application_no" value="<?php echo $application_no; ?>" title="Application No." placeholder="Application No." readonly>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="application_date" id="date1" data-target="#date1" data-toggle="datetimepicker" value="<?php if(isset($application_date)){ echo $application_date; } ?>" title="Application Date" placeholder="Application Date">
                  </div>
                  <div class="form-group col-md-12">
                    <select class="form-control select2 form-control-sm" name="company_id" title="Select Company" id="company_id" required>
                      <option selected="selected" value="" >Select Company Name </option>
                      <?php foreach ($company_list as $list) { ?>
                      <option value="<?php echo $list->company_id; ?>" <?php if(isset($company_id)){ if($list->company_id == $company_id){ echo "selected"; } }  ?>><?php echo $list->company_name; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-12 branch">
                    <select class="form-control select2 form-control-sm" name="branch_id" title="Select Branch" id="branch_id" style="width: 100%;" required>
                      <option selected="selected" value="" >Select Branch </option>
                      <?php if(isset($branch_id)){ ?>  <option selected="selected" value="<?php echo $branch_id ?>" ><?php echo $branch_name ?> </option> <?php } ?>
                    </select>
                  </div>

                  <div class="form-group col-md-12">
                    <select class="form-control select2 form-control-sm" name="manager_id" title="Select Manager" id="manager_id" style="width: 100%;" required>
                      <option selected="selected" value="" >Select Manager </option>
                      <?php if(isset($manager_id)){ ?>  <option selected="selected" value="<?php echo $manager_id ?>" ><?php echo $manager_name ?> </option> <?php } ?>
                    </select>
                  </div>

                  <div class="form-group col-md-6">
                    <select class="form-control select2 form-control-sm" name="tc_id" title="Select TC" id="tc_id" style="width: 100%;" required>
                      <option selected="selected" value="" >Select TC </option>
                      <?php if(isset($tc_id)){ ?>  <option selected="selected" value="<?php echo $tc_id ?>" ><?php echo $tc_name ?> </option> <?php } ?>
                    </select>
                  </div>

                  <div class="form-group col-md-6">
                    <select class="form-control select2 form-control-sm" name="rc_id" title="Select RC" id="rc_id" style="width: 100%;" required>
                        <option selected="selected" value="" >Select RC </option>
                        <?php if(isset($rc_id)){ ?>  <option selected="selected" value="<?php echo $rc_id ?>" ><?php echo $rc_name ?> </option> <?php } ?>
                      </select>
                  </div>


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
                  <div class="form-group col-md-12">
                    <select class="form-control select2 form-control-sm"  name="organization_id" id="organization_id" required <?php if(isset($update)){ echo 'readonly'; }?>>
                      <?php if(isset($update)){ ?>
                        <option value="<?php echo $organization_id; ?>" selected><?php echo $organization_name; ?></option>
                      <?php } else { ?>
                      <option selected="selected" value="">Select Type of Organization</option>
                      <?php foreach ($organization_list as $list) { ?>
                        <option value="<?php echo $list->organization_id; ?>" <?php if(isset($organization_id)){ if($list->organization_id == $organization_id){ echo "selected"; } }  ?>><?php echo $list->organization_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <?php if(!isset($update)){ ?>
                  <!-- <div class="form-group col-md-6">
                    <input type="file" class="form-control form-control-sm" name="csv_file" id="csv_file" placeholder="" required>
                  </div> -->
                  <?php } ?>

                </div>
                <div class="card-footer">
                  <?php if(!isset($update)){ ?>
                  <button type="submit" class="btn btn-success  mr-3">Save</button>
                  <?php } else{ ?>
                  <button type="submit" class="btn btn-primary  mr-3">Update & Next</button>
                  <?php } ?>
                  <a href="<?php echo base_url(); ?>User/dashboard" class="btn btn-default ">Cancel</a>
                </div>
              </form>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>

<!-- ./wrapper -->

<script type="text/javascript">
  $('#company_id').on('change',function(){
    var company_id = $(this).val();
    $.ajax({
      url:'<?php echo base_url(); ?>Transaction/get_branch_by_company',
      type: 'POST',
      data: {"company_id":company_id},
      context: this,
      success: function(result){
        $('#branch_id').html(result);
      }
    });
  })

  $('#branch_id').on('change',function(){
    var branch_id = $(this).val();
    $.ajax({
      url:'<?php echo base_url(); ?>Transaction/get_users_by_branch',
      type: 'POST',
      data: {"branch_id":branch_id},
      context: this,
      success: function(result){
        var data = JSON.parse(result)
        $('#manager_id').html(data['manager']);
        $('#rc_id').html(data['rc']);
        $('#tc_id').html(data['tc']);
      }
    });
  })

</script>
</body>
</html>
