<!DOCTYPE html>
<html>
<?php
  $user_roll = $this->session->userdata('roll_id');
  $law_user_id = $this->session->userdata('law_user_id');
  $user_info = $this->User_Model->get_info_arr('user_id', $law_user_id, 'law_user');
  $roll_info = $this->User_Model->get_info_arr('roll_id', $user_roll, 'law_roll');
?>
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
            <?php if(isset($change_status)){ ?>
              <h4>Change Status</h4>
            <?php } else{ ?>
              <h4>Document Upload</h4>
            <?php } ?>
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
              <?php if(isset($change_status)){ ?>
                <form role="form" action="<?php echo base_url(); ?>/Transaction/update_status" method="post" enctype="multipart/form-data">
              <?php } else{ ?>
                <form role="form" action="<?php echo base_url(); ?>/Transaction/save_document_upload" method="post" enctype="multipart/form-data">
              <?php } ?>
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

                  <?php if(!isset($change_status)){ ?>
                  <?php
                  if(isset($service_document)){
                    $str_arr = explode (",", $service_document);
                    $doc_count =  count($str_arr) - 1;
                    $i = 0;
                    for($i = 0; $i < $doc_count; $i++){
                  ?>
                    <div class="form-group col-md-4">
                      <label><?php echo $str_arr[$i]; ?> : </label>
                    </div>
                    <?php
                    $pre_doc = $this->Transaction_Model->pre_doc($application_id, $str_arr[$i]);
                    if($pre_doc){
                      if($pre_doc[0]['doc_status'] == 1){ ?>
                        <div class="form-group col-md-6">
                          <a target="_blank" href="<?php echo base_url(); ?>/assets/images/document/<?php echo $pre_doc[0]['doc_name']; ?>"><?php echo $pre_doc[0]['doc_name']; ?></a>
                        </div>
                        <?php if(isset($user_roll) && ($user_roll == 1 || $user_roll == 5)){ ?>
                        <div class="form-group col-md-2">
                          <a class="del_doc" id="<?php echo $pre_doc[0]['upload_id']; ?>" href="#"><i class="fa fa-trash text-danger"></i></a>
                        </div>
                      <?php } ?>
                    <?php  }else{ ?>
                      <div class="form-group col-md-8">
                        <?php if(isset($user_roll) && ($user_roll == 1 || $user_roll == 5)){ ?>
                        <input type="file" class="form-control form-control-sm" name="doc_name[]" id="" title="" placeholder="">
                        <input type="hidden" name="doc_type[]" value="<?php echo $str_arr[$i]; ?>">
                      <?php } ?>
                      </div>
                    <?php  }
                    }
                    else{ ?>
                      <div class="form-group col-md-8">
                      <?php if(isset($user_roll) && ($user_roll == 1 || $user_roll == 5)){ ?>
                        <input type="file" class="form-control form-control-sm" name="doc_name[]" id="" title="" placeholder="">
                        <input type="hidden" name="doc_type[]" value="<?php echo $str_arr[$i]; ?>">
                      <?php } ?>

                      </div>
                  <?php  }
                    ?>
                  <?php } }
                }
                  //echo $application_status;
                  ?>

                  <?php if(isset($application_status) && ($application_status != 'Filed Application' && $application_status != 'Application Closed')){ ?>
                  <style media="screen">
                    .dis-no{
                      display: none;
                    }
                  </style>
                <?php }
                // echo $user_roll;
                ?>
                    <div class="form-group col-md-6 ">
                      <select class="form-control select2 form-control-sm" data-placeholder="Select Status" name="application_status" id="application_status" title="Select Status" style="width: 100%;" required <?php if(isset($user_roll) && ($user_roll == 1 || $user_roll == 5)){ echo ''; } else{ echo 'disabled'; }?>>
                        <option value="" >Select Status </option>
                        <option <?php if(isset($application_status) && $application_status == 'In Process'){ echo 'selected '; } ?> >In Process</option>
                        <option <?php if(isset($application_status) && $application_status == 'Ready To File'){ echo 'selected '; } ?> >Ready To File</option>
                        <option <?php if(isset($application_status) && $application_status == 'Legal In Process'){ echo 'selected '; } if(!isset($change_status)){ echo ' disabled'; } ?> >Legal In Process</option>
                        <option <?php if(isset($application_status) && $application_status == 'Pending for Legal'){ echo 'selected '; }?> disabled>Pending for Legal</option>
                        <option <?php if(isset($application_status) && $application_status == 'Legal Completed'){ echo 'selected '; }?> disabled>Legal Completed</option>
                        <option <?php if(isset($application_status) && $application_status == 'Filed Application'){ echo 'selected '; } if(!isset($change_status)){ echo ' disabled'; } ?>>Filed Application</option>
                        <option <?php if(isset($application_status) && $application_status == 'Application Closed'){ echo 'selected '; } if(!isset($change_status)){ echo ' disabled'; } ?> >Application Closed</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6 ">
                      <div class="legal_user">
                        <select class="form-control select2 form-control-sm" data-placeholder="Select Legal Assistant" name="legal_user" id="legal_user" title="Select Legal Assistant" <?php if(isset($user_roll) && ($user_roll != 1 || $user_roll != 5)){ echo 'disabled'; }?>>
                          <option value="" >Select Legal Assistant </option>
                          <?php if(isset($legal_user_list)){
                            foreach ($legal_user_list as $legal_user_list) { ?>
                              <option value="<?php echo $legal_user_list->user_id; ?>" <?php if(isset($legal_user) && $legal_user == $legal_user_list->user_id){ echo 'selected'; } ?>><?php echo $legal_user_list->user_name.' '.$legal_user_list->user_lastname; ?></option>
                          <?php }
                          } ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <input type="number" min="0" class="form-control form-control-sm" name="alert_days" id="alert_days" value="<?php if(isset($alert_days)){ echo $alert_days; } ?>" title="Enter No. Of Days" placeholder="Enter No. Of Days" <?php if(isset($change_status)){ echo 'readonly'; } ?> <?php if(isset($user_roll) && ($user_roll != 1 || $user_roll != 5)){ echo 'disabled'; }?> >
                    </div>
                    <div class="form-group col-md-4 prn dis-no">
                      <input type="text" class="form-control form-control-sm" name="prn_no" id="prn_no" value="<?php if(isset($prn_no)){ echo $prn_no; } ?>" title="PRN No." placeholder="PRN No." <?php if(isset($change_status)){ echo 'readonly'; } ?> <?php if(isset($user_roll) && ($user_roll != 1 || $user_roll != 5)){ echo 'disabled'; }?>>
                    </div>
                    <div class="form-group col-md-4 prn dis-no">
                      <input type="text" class="form-control form-control-sm" name="prn_date" id="date2" data-target="#date2" data-toggle="datetimepicker" value="<?php if(isset($prn_date)){ echo $prn_date; } ?>" title="PRN Date" placeholder="PRN Date" <?php if(isset($change_status)){ echo 'readonly'; } ?> <?php if(isset($user_roll) && ($user_roll != 1 || $user_roll != 5)){ echo 'disabled'; }?>>
                    </div>
                    <?php if(isset($change_status)){ ?>
                      <div class="form-group col-md-6 prn dis-no d-none">
                        <input type="checkbox" name="complete_status" id="complete_status" value="Application Closed" <?php if(isset($application_status) && $application_status == 'Application Closed'){ echo 'checked'; } ?>>
                        Application Closed
                      </div>
                    <?php } ?>
                    <div class="form-group col-md-12">
                      <textarea class="form-control form-control-sm" name="name" rows="4" disabled ><?php echo $comment; ?></textarea>
                    </div>
                  <?php if(isset($user_roll) && ($user_roll == 1 || $user_roll == 5)){ ?>
                  <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary  mr-3">Add</button>
                    <button type="submit" class="btn btn-default ">Cancel</button>
                  </div>
                  <?php } ?>
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
  $(document).ready(function(){
    var application_status = $('#application_status').find("option:selected").val();
    // alert(application_status);
    if(application_status != 'Open' || application_status != 'In Process' || application_status != 'Ready To File'){
      $('.legal_user').css("display","block");
    } else{
      $('.legal_user').css("display","none");
    }

    if(application_status != 'Legal In Process'){
      $('#legal_user').attr('disabled',true);
    }

  });
  $('#add_row').click(function(){
    var row = '<tr><td width="100%"><div class="custom-file"><input type="file" class="custom-file-input" id="customFile" title="Browse Logo" placeholder="Logo"><label class="custom-file-label" for="customFile">Browse Logo</label></div></td></tr><br>';
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
    if(a == 'Legal In Process'){
      $('.legal_user').css("display","block");
      $('#legal_user').attr('disabled',false);
    } else{
      $('.legal_user').css("display","none");
    }
  });

  $('.del_doc').click(function(e){
    e.stopPropagation();
    var upload_id = $(this).attr('id');
    $.ajax({
      url:'<?php echo base_url(); ?>Transaction/delete_up_doc',
      type: 'POST',
      data: {"upload_id":upload_id},
      context: this,
      success: function(result){
        window.location.replace("<?php echo base_url(); ?>Transaction/document_uploading_form/<?php echo $application_id; ?>");
      }
    });
  });

  // $('#application_status').on('change',function(){
  //   var application_status = $('#application_status').find("option:selected").text();
  //
  //
  // });
  </script>

</body>
</html>
