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
            <h4>DOCUMENT UPLOADING</h4>
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
                        <div class="form-group col-md-8">
                          <img style="width:100px; height:100px;" src="<?php echo base_url(); ?>/assets/images/document/<?php echo $pre_doc[0]['doc_name']; ?>" alt="">
                        </div>
                    <?php  }else{ ?>
                      <div class="form-group col-md-8">
                        <input type="file" class="form-control form-control-sm" name="doc_name[]" id="" title="" placeholder="">
                        <input type="hidden" name="doc_type[]" value="<?php echo $str_arr[$i]; ?>">
                      </div>
                    <?php  }
                    }
                    else{ ?>
                      <div class="form-group col-md-8">
                        <input type="file" class="form-control form-control-sm" name="doc_name[]" id="" title="" placeholder="">
                        <input type="hidden" name="doc_type[]" value="<?php echo $str_arr[$i]; ?>">
                      </div>
                  <?php  }
                    ?>
                  <?php } }
                  //echo $application_status;
                  ?>

                  <?php if(isset($application_status) && ($application_status != 'Filed Application' && $application_status != 'Application Closed')){ ?>
                  <style media="screen">
                    .dis-no{
                      display: none;
                    }
                  </style>
                <?php } ?>
                    <div class="form-group col-md-6 ">
                      <select class="form-control select2 form-control-sm" name="application_status" id="application_status" title="Select Status" style="width: 100%;" required <?php if(isset($change_status)){ echo 'disabled'; } ?>>
                        <option selected="selected" value="" >Select Status </option>
                        <?php if(isset($application_status)){ ?> <option selected="selected"><?php echo $application_status; ?></option> <?php } ?>
                        <!-- <option>In Process</option> -->
                        <option>Ready To File</option>
                        <option>Filed Application</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <input type="number" min="1" class="form-control form-control-sm" name="alert_days" id="alert_days" value="<?php if(isset($alert_days)){ echo $alert_days; } ?>" title="Enter No. Of Days" placeholder="Enter No. Of Days" <?php if(isset($change_status)){ echo 'disabled'; } ?>>
                    </div>
                    <div class="form-group col-md-6 prn dis-no">
                      <input type="text" class="form-control form-control-sm" name="prn_no" id="prn_no" value="<?php if(isset($prn_no)){ echo $prn_no; } ?>" title="PRN No." placeholder="PRN No." <?php if(isset($change_status)){ echo 'disabled'; } ?>>
                    </div>
                    <div class="form-group col-md-6 prn dis-no">
                      <input type="text" class="form-control form-control-sm" name="prn_date" id="date2" data-target="#date2" data-toggle="datetimepicker" value="<?php if(isset($prn_date)){ echo $prn_date; } ?>" title="PRN Date" placeholder="PRN Date" <?php if(isset($change_status)){ echo 'disabled'; } ?>>
                    </div>
                    <?php if(isset($change_status)){ ?>
                      <div class="form-group col-md-6 prn dis-no">
                        <input type="checkbox" name="complete_status" id="complete_status" value="Application Closed" <?php if(isset($application_status) && $application_status == 'Application Closed'){ echo 'checked'; } ?>>
                        Application Closed
                      </div>
                    <?php } ?>
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
  });
  </script>

</body>
</html>
