<!DOCTYPE html>
<html>
<?php
$page = "make_information_list";
?>
<style>
  td{
    padding:2px 10px !important;
  }
</style>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 mt-1">
            <h4>VIEW ALL USER INFORMATION</h4>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
            <div class="card-header">
              <h3 class="card-title"><i class="fa fa-list"></i> List User Information</h3>
              <div class="card-tools">
                <a href="<?php echo base_url(); ?>User/user_information" class="btn btn-sm btn-block btn-primary">Add User</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Company</th>
                  <th>Branch</th>
                  <th>Roll</th>
                  <th>User Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $i=0;
                  foreach ($user_list as $list) {
                    $i++;
                    $branch_id = $list->branch_id;
                  ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $list->company_name; ?></td>
                    <td>
                      <?php if(isset($branch_id) && $branch_id != 0) {
                        // echo $branch_id
                        $str_arr = explode (",", $branch_id);
                        foreach ($str_arr as $x) {
                          $branch = $this->User_Model->get_info_arr('branch_id', $x, 'law_branch');
                          echo $branch[0]['branch_name'].', ';
                        }
                      } ?>
                    </td>
                    <td><?php echo $list->roll_name; ?></td>
                    <td><?php echo $list->user_name.' '.$list->user_lastname; ?></td>
                    <td>
                      <a href="<?php echo base_url(); ?>User/edit_user/<?php echo $list->user_id; ?>"> <i class="fa fa-edit"></i> </a>
                      <?php if($user_roll == 1){ ?>
                      <a href="<?php echo base_url(); ?>User/delete_user/<?php echo $list->user_id; ?>" onclick="return confirm('Delete this Company');" class="ml-4"> <i class="fa fa-trash"></i> </a>
                      <?php } ?>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
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
</body>
</html>
