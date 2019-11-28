<!DOCTYPE html>
<html>
<?php
$page = "application_information";
include('head.php');
?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <?php include('navbar.php'); ?>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <?php include('sidebar.php'); ?>
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
            <form action="<?php echo base_url(); ?>Transaction/save_application" method="post" role="form" enctype="multipart/form-data">
            <?php } else{ ?>
            <form action="<?php echo base_url(); ?>Transaction/edit_application_next" method="post" role="form" enctype="multipart/form-data">
              <input type="hidden" name="application_id" value="<?php echo $application_id; ?>">
            <?php } ?>
                <div class="card-body row">
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="application_no" id="application_no" value="<?php echo $application_no; ?>" placeholder="Application No." readonly>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="application_date" id="date1" value="<?php if(isset($application_date)){ echo $application_date; } ?>" data-target="#date1" data-toggle="datetimepicker" placeholder="Application Date">
                  </div>
                  <div class="form-group col-md-12">
                    <select class="form-control select2 form-control-sm" name="branch_id" id="branch_id" required>
                      <option selected="selected" value="">Select Branch</option>
                      <?php foreach ($branch_list as $list) { ?>
                        <option value="<?php echo $list->branch_id; ?>" <?php if(isset($branch_id)){ if($list->branch_id == $branch_id){ echo "selected"; } }  ?>><?php echo $list->branch_name; ?></option>
                      <?php } ?>
                    </select>
                  </div>


                  <div class="form-group col-md-12">
                    <select class="form-control select2 form-control-sm"  name="service_id" id="service_id" required <?php if(isset($update)){ echo 'disabled'; }?>>
                      <option selected="selected" value="">Select Product / Services</option>
                      <?php foreach ($service_list as $list) { ?>
                        <option value="<?php echo $list->service_id; ?>" <?php if(isset($service_id)){ if($list->service_id == $service_id){ echo "selected"; } }  ?>><?php echo $list->service_name; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-12">
                    <select class="form-control select2 form-control-sm"  name="organization_id" id="organization_id" required <?php if(isset($update)){ echo 'disabled'; }?>>
                      <option selected="selected" value="">Select Type of Organization</option>
                      <?php foreach ($organization_list as $list) { ?>
                        <option value="<?php echo $list->organization_id; ?>" <?php if(isset($organization_id)){ if($list->organization_id == $organization_id){ echo "selected"; } }  ?>><?php echo $list->organization_name; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <?php if(!isset($update)){ ?>
                  <div class="form-group col-md-6">
                    <input type="file" class="form-control form-control-sm" name="csv_file" id="csv_file" placeholder="" required>
                  </div>
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
  <!-- /.content-wrapper -->
  <?php include('footer.php'); ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php include('script.php') ?>
<script type="text/javascript">
  $('#add_terms').click(function(){
    var terms = $('.select2-selection__choice').val();
    // var res = terms.replace("×", ",");
    // $('#txt_terms').val(res);
    alert(terms);
  });

  $('#add_row').click(function(){
    var row = '<tr><td class="sr_no">1</td>'+
              '<td><select class="form-control select2 form-control-sm" style="width: 100%;"><option selected="selected">Alabama</option></select></td>'+
              '<td><select class="form-control select2 form-control-sm" style="width: 100%;"><option selected="selected">Alabama</option></select></td>'+
              '<td><select class="form-control select2 form-control-sm" style="width: 100%;"><option selected="selected">Alabama</option></select></td>'+
              '<td><select class="form-control select2 form-control-sm" style="width: 100%;"><option selected="selected">Alabama</option></select></td>'+
              '<td><select class="form-control select2 form-control-sm" style="width: 100%;"><option selected="selected">Alabama</option></select></td>'+
              '<td><select class="form-control select2 form-control-sm" style="width: 100%;"><option selected="selected">Alabama</option></select></td>'+
              '<td><select class="form-control select2 form-control-sm" style="width: 100%;"><option selected="selected">Alabama</option></select></td>'+
              '<td class="td_w"><input type="text" class="form-control form-control-sm" name="" id="" placeholder=""></td>'+
              '<td class="td_w"><input type="text" class="form-control form-control-sm" name="" id="" placeholder=""></td>'+
              '<td class="td_w"><input type="text" class="form-control form-control-sm" name="" id="" placeholder=""></td>'+
              '<td class="td_w"><input type="text" class="form-control form-control-sm" name="" id="" placeholder=""></td>'+
              '<td class="td_btn"><a> <i class="fa fa-trash text-danger"></i> </a></td>'+
              '</tr>';
    $('#myTable').append(row);
  });

  $('#myTable').on('click', 'a', function () {
    $(this).closest('tr').remove();
  });
</script>
</body>
</html>
