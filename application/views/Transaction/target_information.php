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
            <h4>SET TARGET INFORMATION</h4>
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
                    <input type="text" class="form-control form-control-sm" name="" id="" title="From Date " placeholder="From Date ">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="" id="" title="To Date" placeholder="To Date">
                  </div>

                  <div class="form-group col-md-12">
                    <select class="form-control select2 form-control-sm" name="gst_slab" title="Select Branch Name" id="gst_slab" style="width: 100%;" required>
                        <option selected="selected" value="" >Select Branch Name </option>
                          <option></option>
                      </select>
                    </div>

                    <div class="form-group col-md-6">
                      <input type="text" class="form-control form-control-sm" name="" id="" title="Manager Target" placeholder="Manager Target">
                    </div>
                    <div class="form-group col-md-6">

                    </div>
                    <div class="form-group col-md-6">
                      <input type="text" class="form-control form-control-sm" name="" id="" title="RC Target" placeholder="RC Target">
                    </div>
                    <div class="form-group col-md-6">
                      <input type="text" class="form-control form-control-sm" name="" id="" title="TC Target" placeholder="TC Target">
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


</body>
</html>
