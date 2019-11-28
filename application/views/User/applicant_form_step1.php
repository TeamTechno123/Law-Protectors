<!DOCTYPE html>
<html>
<?php
$page = "step_1";
include('head.php');
?>
<style media="screen">
  .checkbox label{
    font-weight: 400!important;
  }
</style>
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
            <h4><?php if(isset($title)){ echo $title; } ?> : STEP ONE</h4>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-8  offset-md-2">
            <!-- general form elements -->
            <div class="card">
            <!-- /.card-header -->
            <div class="card-body" >
              <form role="form" action="<?php echo base_url(); ?>/Transaction/update_step_1" method="post">
                <input type="hidden" name="application_id" value="<?php echo $application_id; ?>">
                <input type="hidden" name="organization_id" value="<?php echo $organization_id; ?>">
                <div class="card-body row">
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="NAME" id="NAME" value="<?php if(isset($NAME)){ echo $NAME; } ?>" placeholder="<?php if(isset($pl_name)){ echo $pl_name; } ?>">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="NATIONALITY" id="NATIONALITY" value="<?php if(isset($NATIONALITY)){ echo $NATIONALITY; } ?>" placeholder="<?php if(isset($pl_nation)){ echo $pl_nation; } ?>">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="MOBILE" id="MOBILE" value="<?php if(isset($MOBILE)){ echo $MOBILE; } ?>" placeholder="Mobile Number">
                  </div>

                  <?php if(isset($organization_id) && $organization_id != 6 ){ ?>
                    <?php if(isset($organization_id) && ($organization_id == 2 || $organization_id == 3 || $organization_id == 4 || $organization_id == 8 || $organization_id == 9 ) ){ ?>
                      <div class="form-group col-md-12">
                        <input type="text" class="form-control form-control-sm" name="ASSOCIATION" id="ASSOCIATION" value="<?php if(isset($ASSOCIATION)){ echo $ASSOCIATION; } ?>" placeholder="<?php if(isset($pl_association)){ echo $pl_association; } ?>">
                      </div>
                    <?php } else{ ?>
                      <div class="form-group col-md-12">
                        <input type="text" class="form-control form-control-sm" name="FATHER" id="FATHER" value="<?php if(isset($FATHER)){ echo $FATHER; } ?>" placeholder="<?php if(isset($pl_father)){ echo $pl_father; } ?>">
                      </div>
                    <?php } ?>
                  <?php } ?>

                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="ADDRESS" id="ADDRESS" value="<?php if(isset($ADDRESS)){ echo $ADDRESS; } ?>" placeholder="<?php if(isset($pl_res_addr)){ echo $pl_res_addr; } ?>">
                  </div>
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="FIRMADDRESS" id="FIRMADDRESS" value="<?php if(isset($FIRMADDRESS)){ echo $FIRMADDRESS; } ?>" placeholder="Firm Address">
                  </div>

                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="ORGANIZATION" id="ORGANIZATION" value="<?php if(isset($ORGANIZATION)){ echo $ORGANIZATION; } ?>" placeholder="Organization Name">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="$STATE" id="$STATE" value="<?php if(isset($STATE)){ echo $STATE; } ?>" placeholder="State">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="AGE" id="AGE" value="<?php if(isset($AGE)){ echo $AGE; } ?>" placeholder="Age">
                  </div>
                  <div class="col-md-12">
                    <div class="checkbox">
                    <label> Category of Mark :
                      <input type="checkbox" name="MARK_0" value="Word Mark" <?php if(isset($MARK_0)){ echo 'checked'; } ?>> Wordmark
                      <input type="checkbox" name="MARK_1" value="Device" <?php if(isset($MARK_1)){ echo 'checked'; } ?>> Device
                      <input type="checkbox" name="MARK_2" value="Color" <?php if(isset($MARK_2)){ echo 'checked'; } ?>> Color
                      <input type="checkbox" name="MARK_3" value="Sound" <?php if(isset($MARK_3)){ echo 'checked'; } ?>> Sound
                      <input type="checkbox" name="MARK_4" value="Three Dimentional Mark" <?php if(isset($MARK_4)){ echo 'checked'; } ?>> Three Dimentional Mark
                    </label>
                  </div>
                  </div>

                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="BRAND" id="BRAND" value="<?php if(isset($BRAND)){ echo $BRAND; } ?>" placeholder="Mark Brand Name To Be Registered">
                  </div>
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="SIGNIFICANCE" id="SIGNIFICANCE" value="<?php if(isset($SIGNIFICANCE)){ echo $SIGNIFICANCE; } ?>" placeholder="Significance of Mark">
                  </div>
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="TM" id="TM" value="<?php if(isset($TM)){ echo $TM; } ?>" placeholder="TM Class">
                  </div>
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="SERVICES" id="SERVICES" value="<?php if(isset($SERVICES)){ echo $SERVICES; } ?>" placeholder="Goods Services Details">
                  </div>

                  <div class="col-md-12">
                    <div class="checkbox">
                      <label> Trade Discriptions :
                        <input type="checkbox" name="TRADE_0" value="Manufacturers" <?php if(isset($TRADE_0)){ echo 'checked'; } ?>> Manufacturers
                        <input type="checkbox" name="TRADE_1" value="Dealers" <?php if(isset($TRADE_1)){ echo 'checked'; } ?>> Dealers
                        <input type="checkbox" name="TRADE_2" value="Traders" <?php if(isset($TRADE_2)){ echo 'checked'; } ?>> Traders
                        <input type="checkbox" name="TRADE_3" value="Service Providers" <?php if(isset($TRADE_3)){ echo 'checked'; } ?>> Service Providers
                      </label>
                    </div>
                  </div>

                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="PROPOSED" id="date2" data-target="#date2" data-toggle="datetimepicker" value="<?php if(isset($PROPOSED)){ echo $PROPOSED; } ?>" placeholder="User Date Proposed to be" required>
                  </div>
                  <div class="form-group col-md-6 ">
                    <input type="text" class="form-control form-control-sm" name="INFORMATION" id="INFORMATION" value="<?php if(isset($INFORMATION)){ echo $INFORMATION; } ?>" placeholder="Information Provided Name">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="DATE" id="date1" data-target="#date1" data-toggle="datetimepicker" value="<?php if(isset($DATE)){ echo $DATE; } ?>" placeholder="Date">
                  </div>
                  <div class="form-group col-md-6 ">
                    <input type="text" class="form-control form-control-sm" name="PLACE" id="PLACE" value="<?php if(isset($PLACE)){ echo $PLACE; } ?>" placeholder="Place">
                  </div>

                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="AFF_DATE" id="date3" data-target="#date3" data-toggle="datetimepicker" value="<?php if(isset($AFF_DATE)){ echo $AFF_DATE; } ?>" placeholder="Affidavit Date">
                  </div>
                  <div class="form-group col-md-6 ">
                    <input type="text" class="form-control form-control-sm" name="COV_DATE" id="date4" data-target="#date4" data-toggle="datetimepicker" value="<?php if(isset($COV_DATE)){ echo $COV_DATE; } ?>" placeholder="Covering Letter Date">
                  </div>

                  <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary  mr-3">Update & Next</button>
                    <button type="submit" class="btn btn-default ">Cancel</button>
                  </div>
                </div>
              </form>

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
