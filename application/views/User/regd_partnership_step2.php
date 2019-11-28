<!DOCTYPE html>
<html>
<?php
$page = "party_list";
include('head.php');
?>
<style media="screen">
   label{
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
            <h4>REGD PARTNERSHIP : STEP TWO</h4>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-10 offset-md-1">
            <!-- general form elements -->
            <div class="card">
            <!-- <div class="card-header">
              <h3 class="card-title"><i class="fa fa-list"></i> List Party Information</h3>
              <div class="card-tools">
                <a href="party_information" class="btn btn-sm btn-block btn-primary">Add Party</a>
              </div>
            </div> -->
            <!-- /.card-header -->
            <div class="card-body" >
              <form role="form">
                <div class="card-body row">

                  <div class="form-group col-md-6 ">
                    <input type="text" class="form-control form-control-sm" name="" id="" placeholder="Contract Final Amount">
                  </div>
                  <div class="form-group col-md-6 ">
                    <input type="text" class="form-control form-control-sm" name="" id="" placeholder="GST Amount">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="" id="" placeholder="Total Amount">
                  </div>
                  <div class="form-group col-md-6 ">
                    <input type="text" class="form-control form-control-sm" name="" id="" placeholder="Received Amount">
                  </div>

                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="" id="" placeholder="Balance Amount">
                  </div>
                  <div class="form-group col-md-6 ">
                    <input type="text" class="form-control form-control-sm" name="" id="" placeholder="GST Number">
                  </div>


                    <div class="col-md-12">
                      <div class="checkbox">
                      <label>Payment Mode :
                        <input type="checkbox"> Cash
                        <input type="checkbox"> Chaque
                      </label>
                    </div>
                    </div>

                    <br>

                      <div class="col-md-12">
                        <label for="">Cash Details : </label>
                      </div>
                      <br>

                    <div class="form-group col-md-2">
                      <label>Rs. 2000 Notes : </label>
                      </div>
                    <div class="form-group col-md-2 ">
                      <input type="text" class="form-control form-control-sm" name="" id="" placeholder="text">
                    </div>

                    <div class="form-group col-md-2">
                      <label>Rs. 500 Notes : </label>
                      </div>
                    <div class="form-group col-md-2 ">
                      <input type="text" class="form-control form-control-sm" name="" id="" placeholder="text">
                    </div>

                    <div class="form-group col-md-2">
                      <label>Rs. 200 Notes : </label>
                      </div>
                    <div class="form-group col-md-2 ">
                      <input type="text" class="form-control form-control-sm" name="" id="" placeholder="text">
                    </div>

                    <div class="form-group col-md-2">
                      <label>Rs. 100 Notes : </label>
                      </div>
                    <div class="form-group col-md-2 ">
                      <input type="text" class="form-control form-control-sm" name="" id="" placeholder="text">
                    </div>

                    <div class="form-group col-md-2">
                      <label>Rs. 50 Notes : </label>
                      </div>
                    <div class="form-group col-md-2 ">
                      <input type="text" class="form-control form-control-sm" name="" id="" placeholder="text">
                    </div>

                    <div class="form-group col-md-2">
                      <label>Rs. 20 Notes : </label>
                      </div>
                    <div class="form-group col-md-2 ">
                      <input type="text" class="form-control form-control-sm" name="" id="" placeholder="text">
                    </div>

                    <div class="form-group col-md-2">
                      <label>Rs. 10 Notes : </label>
                      </div>
                    <div class="form-group col-md-2 ">
                      <input type="text" class="form-control form-control-sm" name="" id="" placeholder="text">
                    </div>

                    <div class="form-group col-md-2">

                      </div>
                    <div class="form-group col-md-2 ">
                      </div>

                    <div class="form-group col-md-2">
                      </div>
                    <div class="form-group col-md-2 ">
                      </div>

                      <div class="col-md-12">
                        <label for="">Cheque Details : </label>
                      </div>
                      <br>


                    <div class="form-group col-md-3">
                      <input type="text" class="form-control form-control-sm" name="" id="" placeholder="Cheque No.">
                    </div>
                    <div class="form-group col-md-3 ">
                      <input type="text" class="form-control form-control-sm" name="" id="" placeholder="Cheque Date">
                    </div>
                    <div class="form-group col-md-3 ">
                      <input type="text" class="form-control form-control-sm" name="" id="" placeholder="Bank Name ">
                    </div>
                    <div class="form-group col-md-3 ">
                      <input type="text" class="form-control form-control-sm" name="" id="" placeholder="Amount">
                    </div>

                    <div class="form-group col-md-12">
                      <input type="text" class="form-control form-control-sm" name="" id="" placeholder="Enter Ground Of Contract">
                    </div>




                    <div class="form-group col-md-6">
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Browse Logo</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      No file selected.
                    </div>




                  <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary  mr-3">Submit</button>
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
