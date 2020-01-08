<!DOCTYPE html>
<html>
<?php
  $user_roll = $this->session->userdata('roll_id');
  $law_user_id = $this->session->userdata('law_user_id');
  // $user_info = $this->User_Model->get_info_arr('user_id', $law_user_id, 'law_user');
  // $roll_info = $this->User_Model->get_info_arr('roll_id', $user_roll, 'law_roll');
?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-center mt-2">
            <h1>Dashboard</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <hr>
        <h4 class="mb-3">Summary</h4>
        <div class="row">
        </div>
        <div class="row">
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title text-center">Service List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <tbody>
                    <?php foreach ($service_count_list as $service_count_list) { ?>
                      <tr>
                        <td><?php echo $service_count_list->service_name; ?></td>
                        <td><?php echo $service_count_list->count; ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card">
              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                  <?php
                  $i=0;
                  foreach ($service_list as $service_list) {
                    $i++;
                  ?>
                    <div class="carousel-item <?php if($i==1){ echo 'active'; } ?>">
                      <div class="card-header">
                        <h3 class="card-title text-center"><?php echo $service_list->service_name; ?> </h3>
                      </div>
                      <div class="card-body">
                        <table class="table table-bordered">
                          <tbody>
                            <tr>
                              <td>Open Application</td>
                              <td>
                                <?php
                                  $service_id = $service_list->service_id;
                                  echo $this->User_Model->count_service_status_user($user_roll,$law_user_id,$service_id,'Open');
                                ?>
                              </td>
                            </tr>
                            <tr>
                              <td>In Process</td>
                              <td>
                                <?php
                                  $service_id = $service_list->service_id;

                                  echo $this->User_Model->count_service_status_user($user_roll,$law_user_id,$service_id,'In Process');
                                ?>
                              </td>
                            </tr>
                            <tr>
                              <td>Ready To File</td>
                              <td>
                                <?php
                                  $service_id = $service_list->service_id;
                                  echo $this->User_Model->count_service_status_user($user_roll,$law_user_id,$service_id,'Ready To File');
                                ?>
                              </td>
                            </tr>
                            <tr>
                              <td>Filed Application</td>
                              <td>
                                <?php
                                  $service_id = $service_list->service_id;
                                  echo $this->User_Model->count_service_status_user($user_roll,$law_user_id,$service_id,'Filed Application');
                                ?>
                              </td>
                            </tr>
                            <tr>
                              <td>Application Closed</td>
                              <td>
                                <?php
                                  $service_id = $service_list->service_id;
                                  echo $this->User_Model->count_service_status_user($user_roll,$law_user_id,$service_id,'Application Closed');
                                ?>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  <?php } ?>

                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>

            </div>
          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
  <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
  <?php if($this->session->flashdata('change_password')){ ?>
  <script type="text/javascript">
    $(document).ready(function(){
      toastr.success('Password Changed Successfully.');
    })
  </script>
  <?php } ?>
</body>
</html>
