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
              <h4>Legal Legal Assistant Document</h4>
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
                      <b>Uploaded Document</b>
                  </div>
                  <div class="form-group col-md-6 text-right">
                  </div>
                  <div class="form-group col-md-12">
                    <table id="myTable" width="100%">
                    <?php
                      if($doc_list){
                        $i = 0;
                      foreach ($doc_list as $list) {
                        $i++;
                    ?>
                    <tr >
                      <td class="mt-2 w-40">
                        <div class="form-group">

                          <?php echo $i.'. &nbsp;'.$list->leg_doc_title; ?>
                        </div>
                      </td>
                      <td class="mt-2 w-40">
                        <div class="form-group">
                      <a target="_blank" href="<?php echo base_url(); ?>assets/images/document/<?php echo $list->leg_doc_file; ?>"><?php echo $list->leg_doc_file; ?></a>
                        </div>
                      </td>
                    </tr>
                  <?php } }  ?>
                    </table>
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
