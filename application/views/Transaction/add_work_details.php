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
            <h4>ADD WORK DETAILS</h4>
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
              <?php  if(isset($update)){ ?>
                <form role="form" method="post" action="<?php echo base_url(); ?>Transaction/update_work_details" enctype="multipart/form-data">
                  <input type="hidden" name="work_id" value="<?php echo $work_id; ?>">
              <?php } else{ ?>
                <form role="form" method="post" action="<?php echo base_url(); ?>Transaction/save_work_details" enctype="multipart/form-data">
              <?php } ?>
                <div class="card-body row">
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="vc_no" id="vc_no" title="VC No." value="<?php if(isset($vc_no)){ echo $vc_no;} ?>" placeholder="VC No." readonly>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="work_date" id="date1" value="<?php if(isset($work_date)){ echo $work_date;} ?>" data-target="#date1" data-toggle="datetimepicker" title="Date" placeholder="Date" required>
                  </div>
                  <div class="form-group col-md-12 drop-sm">
                    <select class="form-control select2 form-control-sm" name="company_id" title="Select Company" id="company_id" required>
                      <option selected="selected" value="" >Select Company Name </option>
                      <?php foreach ($company_list as $list) { ?>
                      <option value="<?php echo $list->company_id; ?>" <?php if(isset($company_id)){ if($list->company_id == $company_id){ echo "selected"; } }  ?>><?php echo $list->company_name; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-12 drop-sm branch">
                    <select class="form-control select2 form-control-sm" name="branch_id" title="Select Branch" id="branch_id" style="width: 100%;" required>
                      <option selected="selected" value="" >Select Branch </option>
                      <?php if(isset($branch_id)){ ?>  <option selected="selected" value="<?php echo $branch_id ?>" ><?php echo $branch_name ?> </option> <?php } ?>
                    </select>
                  </div>

                  <div class="form-group col-md-12 drop-sm">
                    <select class="form-control select2 form-control-sm" name="manager_id" title="Select Manager" id="manager_id" style="width: 100%;" required>
                      <option selected="selected" value="" >Select Manager </option>
                      <?php if(isset($manager_id)){ ?>  <option selected="selected" value="<?php echo $manager_id ?>" ><?php echo $manager_name ?> </option> <?php } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="party_name" id="party_name" value="<?php if(isset($party_name)){ echo $party_name;} ?>" title="Name Of Party" placeholder="Name Of Party">
                  </div>
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="party_address" id="party_address" value="<?php if(isset($party_address)){ echo $party_address;} ?>" title="Address" placeholder="Address">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="party_con1" id="party_con1" value="<?php if(isset($party_con1)){ echo $party_con1;} ?>" title="Contact 1" placeholder="Contact 1">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="party_con2" id="party_con2" value="<?php if(isset($party_con2)){ echo $party_con2;} ?>" title="Contact 2" placeholder="Contact 2">
                  </div>

                  <div class=" form-group col-md-12">
                <textarea name="req_details" class="form-control" title="Requirement Details" placeholder="Requirement Details" rows="6" cols="100"><?php if(isset($req_details)){ echo $req_details;} ?></textarea>
              </div>
              <div class="form-group col-md-10 form-sm">
                <table id="myTable" width="100%">
                  <?php if(isset($update)){
                    $law_workdetails_doc = $this->Transaction_Model->law_workdetails_doc($work_id);
                    $file_count = 0;
                    foreach ($law_workdetails_doc as $doc) {
                      $file_count++;
                  ?>
                  <tr>
                    <td width="80%">
                      <img style="width:50px; height: 50px;" src="<?php echo base_url(); ?>assets/images/work_details/<?php echo $doc->work_doc_name; ?>" alt="">
                      <input type="hidden" name="input[<?php echo $file_count; ?>][work_doc_name]" value="<?php echo $doc->work_doc_name; ?>">
                      <!-- <input type="hidden" name="input[<?php echo $file_count; ?>][doc_id]" value="<?php echo $doc->work_doc_id; ?>"> -->
                        <!-- <input type="file" class="form-control form-control-sm" name="doc_name[]" value="<?php echo $doc->work_doc_name; ?>" id="" title="Contact 2" placeholder="Contact 2"> -->
                    </td>
                    <td><a><i class="fa fa-trash text-danger ml-4"></i></a></td>
                  </tr>
                <?php } } else { ?>
                    <tr>
                      <td width="80%">
                          <input type="file" class="form-control form-control-sm" name="doc_name[]" id="" title="Contact 2" placeholder="Contact 2">
                      </td>
                      <td></td>
                    </tr>
                  <?php } ?>
                </table>
              </div>
              <div class="form-group col-md-2">
                  <button type="button" id="add_row"  class="btn btn-success btn-sm">Add More</button>
              </div>
                <div class="form-group col-md-6">
                  <input type="text" class="form-control form-control-sm" name="work_date2" id="date2" value="<?php if(isset($work_date2)){ echo $work_date2;} ?>" data-target="#date2" data-toggle="datetimepicker" title="Date" placeholder="Date">
                </div>
                <div class="form-group col-md-6">
                  <input type="text" class="form-control form-control-sm" name="work_place" id="work_place" value="<?php if(isset($work_place)){ echo $work_place;} ?>" title="Place" placeholder="Place">
                </div>

                </div>
                <div class="col-md-6 offset-md-4">
                  <?php  if(isset($update)){ ?>
                    <input type="hidden" name="file_count" value="<?php echo $file_count; ?>">
                    <button type="submit" class="btn btn-primary mr-3">Update</button>
                  <?php } else{ ?>
                    <button type="submit" class="btn btn-success mr-3">Save</button>
                  <?php } ?>

                    <a href="" class="btn btn-default ">Cancel</a>
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

  <script type="text/javascript">
  var i=0;
  $('#add_row').click(function(){
    i++;
    var row = '<tr>'+
      '<td width="80%" class="pt-2">'+
          '<input type="file" class="form-control form-control-sm" name="doc_name[]" id="" title="Contact 2" placeholder="Contact 2">'+
      '</td>'+
      '<td><a><i class="fa fa-trash text-danger ml-4"></i></a><td>'
    '</tr>';
      $('#myTable').append(row);
  });
  $('#myTable').on('click', 'a', function () {
    $(this).closest('tr').remove();
  });
  </script>
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
          // $('#rc_id').html(data['rc']);
          // $('#tc_id').html(data['tc']);
        }
      });
    })

  </script>
</body>
</html>
