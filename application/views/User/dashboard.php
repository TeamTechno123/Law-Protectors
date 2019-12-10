<!DOCTYPE html>
<html>
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
        <h4 class="mb-3">Master Summary</h4>
        <div class="row">
          <!-- left column -->
          <div class="col-md-3 col-6">
            <div class="small-box bg-red">
              <div class="inner">
                <h3><?php echo $comp_count; ?></h3>
                <p>Company Information</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo base_url() ?>User/company_information_list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $branch_count; ?></h3>
                <p>Branch Information</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo base_url() ?>User/branch_information_list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3><?php echo $service_count; ?></h3>
                <p>Service Information</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo base_url() ?>User/service_information_list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="small-box bg-green">
              <div class="inner">
                <h3><?php echo $user_count; ?></h3>
                <p> User Information</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo base_url() ?>User/user_information_list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- left column -->
          <div class="col-md-2 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $open_count; ?></h3>
                <p>Open  </p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo base_url() ?>Transaction/application_list2/1" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-md-2 col-6">
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3><?php echo $pro_count; ?></h3>
                <p>In Process  </p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo base_url() ?>Transaction/application_list2/2" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-md-2 col-6">
            <div class="small-box bg-red">
              <div class="inner">
                <h3><?php echo $ready_count; ?></h3>
                <p>Ready To File </p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo base_url() ?>Transaction/application_list2/3" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-md-2 col-6">
            <div class="small-box bg-green">
              <div class="inner">
                <h3><?php echo $filled_count; ?></h3>
                <p> Filled </p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo base_url() ?>Transaction/application_list2/4" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-md-2 col-6">
            <div class="small-box bg-green">
              <div class="inner">
                <h3><?php echo $closed_count; ?></h3>
                <p>Closed </p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo base_url() ?>Transaction/application_list2/5" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
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
                                  echo $this->User_Model->count_service_status($service_id,'Open');
                                ?>
                              </td>
                            </tr>
                            <tr>
                              <td>In Process</td>
                              <td>
                                <?php
                                  $service_id = $service_list->service_id;
                                  echo $this->User_Model->count_service_status($service_id,'In Process');
                                ?>
                              </td>
                            </tr>
                            <tr>
                              <td>Ready To File</td>
                              <td>
                                <?php
                                  $service_id = $service_list->service_id;
                                  echo $this->User_Model->count_service_status($service_id,'Ready To File');
                                ?>
                              </td>
                            </tr>
                            <tr>
                              <td>Filed Application</td>
                              <td>
                                <?php
                                  $service_id = $service_list->service_id;
                                  echo $this->User_Model->count_service_status($service_id,'Filed Application');
                                ?>
                              </td>
                            </tr>
                            <tr>
                              <td>Application Closed</td>
                              <td>
                                <?php
                                  $service_id = $service_list->service_id;
                                  echo $this->User_Model->count_service_status($service_id,'Application Closed');
                                ?>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  <?php } ?>

                    <!-- <div class="carousel-item active">
                      <div class="card-header">
                        <h3 class="card-title text-center">SERVICE LIST </h3>
                      </div>
                      <div class="card-body">
                        <table class="table table-bordered">
                          <tbody>
                            <tr>
                              <td>Open Application</td>
                              <td>Active</td>
                            </tr>
                            <tr>
                              <td>Open Application</td>
                              <td>Active</td>
                            </tr>
                            <tr>
                              <td>Open Application</td>
                              <td>Active</td>
                            </tr>
                            <tr>
                              <td>Open Application</td>
                              <td>Active</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div> -->





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
              <!-- <div class="card-header">
                <h3 class="card-title text-center">SERVICE LIST </h3>
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <td>Open Application</td>
                      <td>Active</td>
                    </tr>
                    <tr>
                      <td>Open Application</td>
                      <td>Active</td>
                    </tr>
                    <tr>
                      <td>Open Application</td>
                      <td>Active</td>
                    </tr>
                    <tr>
                      <td>Open Application</td>
                      <td>Active</td>
                    </tr>
                  </tbody>
                </table>
              </div> -->

            </div>
          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
</body>
</html>
