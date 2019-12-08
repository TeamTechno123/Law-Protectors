<!DOCTYPE html>
<html>
<style media="screen">
  .checkbox label{
    font-weight: 400!important;
  }
</style>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 mt-1 text-center">
            <h4><?php echo $title; ?>  : Step One</h4>
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
              <form role="form" method="post" action="<?php echo base_url(); ?>/Transaction/save_other_service">
                <input type="hidden" name="application_id" value="<?php if(isset($application_id)){ echo $application_id; } ?>" >
                <input type="hidden" name="organization_id" value="<?php if(isset($organization_id)){ echo $organization_id; } ?>" >
                <div class="card-body row">
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="appl_org_name" id="appl_org_name" value="<?php if(isset($appl_org_name)){ echo $appl_org_name; } ?>" title="Name Of Organizatiom / Applicant" placeholder="Name Of Organizatiom / Applicant" required>
                  </div>
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="org_address" id="org_address" value="<?php if(isset($org_address)){ echo $org_address; } ?>" title="Regd Address Of Organizatiom / Applicant" placeholder="Regd Address Of Organizatiom / Applicant">
                  </div>
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="appl_address" id="appl_address" value="<?php if(isset($appl_address)){ echo $appl_address; } ?>" title="Regd Address Of Applicant" placeholder="Regd Address Of Applicant" required>
                  </div>

                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="appl_conatct" id="appl_conatct" value="<?php if(isset($appl_conatct)){ echo $appl_conatct; } ?>" title="Contact No." placeholder="Contact No." required>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="appl_email" id="appl_email" value="<?php if(isset($appl_email)){ echo $appl_email; } ?>" title="Email" placeholder="Email">
                  </div>


                  <div class="col-md-12">
                    <div class="checkbox " >
                    <label>Type Of Work : &nbsp;&nbsp;
                      <input type="checkbox" name="work_type1" value="Patent" <?php if(isset($work_type1) && $work_type1 != ''){ echo 'checked'; } ?>>&nbsp; Patent &nbsp;&nbsp;
                      <input type="checkbox" name="work_type2" value="Design" <?php if(isset($work_type2) && $work_type2 != ''){ echo 'checked'; } ?>> Design &nbsp;&nbsp;
                    </label>
                  </div>
                  </div>
                  <div class=" form-group col-md-12">
                <textarea name="req_details" id="req_details" class="form-control" title="Requirement Details" placeholder="Requirement Details" rows="6" cols="100"><?php if(isset($req_details)){ echo $req_details; } ?></textarea>
              </div>
                <div class="form-group col-md-6">
                  <input type="text" class="form-control form-control-sm" name="other_date" id="date1" data-target="#date1" data-toggle="datetimepicker" value="<?php if(isset($other_date)){ echo $other_date; } ?>" title="Date" placeholder="Date">
                </div>
                <div class="form-group col-md-6">
                  <input type="text" class="form-control form-control-sm" name="other_place" id="other_place" value="<?php if(isset($other_place)){ echo $other_place; } ?>" title="Place" placeholder="Place">
                </div>

                </div>


                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary  mr-3">Save & Next</button>
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


</body>
</html>
