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

                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="" id="" title="VC No." placeholder="VC No.">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="" id="" title="Date" placeholder="Date">
                  </div>
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="" id="" title="Name Of Party" placeholder="Name Of Party">
                  </div>
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="" id="" title="Address" placeholder="Address">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="" id="" title="Contact 1" placeholder="Contact 1">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="" id="" title="Contact 2" placeholder="Contact 2">
                  </div>

                  <div class=" form-group col-md-12">
                <textarea name="name" class="form-control" title="Requirement Details" placeholder="Requirement Details" rows="6" cols="100"></textarea>
              </div>
                <div class="form-group col-md-8">
              <table id="myTable" width="100%">
                <tr>
                  <td width="100%">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" title="Browse Logo" placeholder="Logo">
                        <label class="custom-file-label" for="customFile">Browse Logo</label>
                      </div>
                  </td>
                </tr>
              </table>
              </div>
              <div class="form-group col-md-4">
                  <button type="button" id="add_row"  class="btn btn-success">Add More</button>
              </div>
                <div class="form-group col-md-6">
                  <input type="text" class="form-control form-control-sm" name="" id="" title="Date" placeholder="Date">
                </div>
                <div class="form-group col-md-6">
                  <input type="text" class="form-control form-control-sm" name="" id="" title="Place" placeholder="Place">
                </div>

                </div>


                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary  mr-3">Save</button>
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
  </script>

</body>
</html>
