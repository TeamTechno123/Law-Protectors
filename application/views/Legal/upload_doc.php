<!DOCTYPE html>
<html>

<style media="screen">
  .checkbox label{
    font-weight: 400!important;
  }
  #myTable td{
    width:33% !important;
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
              <h4>Application Document Upload</h4>
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
                <form method="post" enctype="multipart/form-data">
                <div class="card-body row">
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="application_id" id="application_id" value="<?php if(isset($application_id)){ echo $application_id; } ?>" title="Application Reference No." placeholder="Application Reference No." readonly>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="application_date" id="date1" data-target="#date1" data-toggle="datetimepicker" value="<?php if(isset($application_date)){ echo $application_date; } ?>" title="Application Date" placeholder="Application Date" readonly>
                  </div>
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="" id="" value="<?php if(isset($branch_name)){ echo $branch_name; } ?>" title="Branch Name" placeholder="Branch Name" readonly>
                  </div>
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="" id="" value="<?php if(isset($service_name)){ echo $service_name; } ?>" title="Product / Service Name" placeholder="Product / Service Name" readonly>
                  </div>
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="" id="" value="<?php if(isset($organization_name)){ echo $organization_name; } ?>" title="Organization Name" placeholder="Organization Name" readonly>
                  </div>
                  <div class="form-group col-md-6 ">
                      Upload Document
                  </div>
                  <div class="form-group col-md-6 text-right">
                      <button type="button" id="add_row"  class="btn btn-success btn-sm">Add More</button>
                  </div>
                  <div class="form-group col-md-12">
                    <table id="myTable" width="100%">
                    <?php
                      if($doc_list){
                      foreach ($doc_list as $list) {
                    ?>
                    <tr >
                      <td class="mt-2 w-40">
                        <div class="form-group">
                          <?php echo $list->leg_doc_title; ?>
                        </div>
                      </td>
                      <td class="mt-2 w-40">
                        <div class="form-group">
                      <a target="_blank" href="<?php echo base_url(); ?>assets/images/document/<?php echo $list->leg_doc_file; ?>"><?php echo $list->leg_doc_file; ?></a>
                        </div>
                      </td>
                      <td><a ><i id="<?php echo $list->leg_doc_id; ?>" class="fa fa-trash text-danger ml-4 del_img"></i></a></td>
                    </tr>
                  <?php } } else{ ?>
                      <tr >
                        <td class="pt-2 w-40">
                          <input type="text" class="form-control form-control-sm" name="leg_doc_title[]" value="" title="Document Name" placeholder="Document Name">
                        </td>
                        <td class="pt-2 w-40">
                          <input type="file" class="form-control form-control-sm" name="leg_doc_file[]" >
                        </td>
                        <td></td>
                      </tr>
                  <?php } ?>
                    </table>
                  </div>

                  <div class="form-group col-md-6 ">
                    <select class="form-control select2 form-control-sm" data-placeholder="Select Status" name="application_status" id="application_status" title="Select Status" style="width: 100%;" required>
                      <option selected="selected" value="" >Select Status</option>
                      <option <?php if(isset($application_status) && $application_status == 'Legal In Process'){ echo 'selected'; }?> >Legal In Process</option>
                      <option <?php if(isset($application_status) && $application_status == 'Pending for Legal'){ echo 'selected'; }?>>Pending for Legal</option>
                      <option <?php if(isset($application_status) && $application_status == 'Legal Completed'){ echo 'selected'; }?> >Legal Completed</option>
                    </select>
                  </div>

                  <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary  mr-3">Add</button>
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
  <script type="text/javascript">
  $('#add_row').click(function(){
    var row = '<tr>'+
      '<td class="pt-2 w-40">'+
        '<input type="text" class="form-control form-control-sm" name="leg_doc_title[]" value="" title="Document Name" placeholder="Document Name">'+
      '</td>'+
      '<td class="pt-2 w-40">'+
        '<input type="file" class="form-control form-control-sm" name="leg_doc_file[]" >'+
      '</td>'+
      '<td class="pt-2"><a><i class="fa fa-trash text-danger ml-4 rem_row"></i></a></td>'+
    '</tr>';
      $('#myTable').append(row);
  });
  $('#application_status').change(function(){
    var a = $(this).val();
    // alert();
    if(a == 'Filed Application'){
      $('.prn').css("display", "block");
    }
    else{
      $('.prn').css("display", "none");
    }
  });

  $('#myTable').on('click', '.rem_row', function () {
    $(this).closest('tr').remove();
  });

  $('.del_img').click(function(e){
    e.stopPropagation();
    var leg_doc_id = $(this).attr('id');
    // alert(leg_doc_id);
    $.ajax({
      url:'<?php echo base_url(); ?>User/delete_leg_up_doc',
      type: 'POST',
      data: {"leg_doc_id":leg_doc_id},
      context: this,
      success: function(result){
        window.location.replace("<?php echo base_url(); ?>Legal/upload_doc/<?php echo $application_id; ?>");
        // $('#branch_id').html(result);
      }
    });
    // e.stop
  });
  </script>

</body>
</html>
