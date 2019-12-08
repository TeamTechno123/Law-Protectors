<!DOCTYPE html>
<html>
<?php
  $page = "company_information";
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
            <h1>SERVICE / PRODUCT INFORMATION</h1>
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
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Service / Product Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php if(isset($update)){ ?>
                <form action="<?php echo base_url(); ?>User/update_service" method="post" enctype="multipart/form-data" role="form">
                  <input type="hidden" name="service_id" value="<?php echo $service_id; ?>">
              <?php }else{ ?>
                <form action="<?php echo base_url(); ?>User/save_service" method="post" enctype="multipart/form-data" role="form">
              <?php } ?>
                <div class="card-body row">
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="service_name" id="service_name" value="<?php if(isset($service_name)){ echo $service_name; } ?>" placeholder="Enter Service / Product Name" required>
                  </div>
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="service_alert_days" id="service_alert_days" value="<?php if(isset($service_alert_days)){ echo $service_alert_days; } ?>" placeholder="Alert Days of every" required>
                  </div>
                <!-- /.card-body -->
                <div class="form-group col-md-8">
                  <label for=""> List Of Document Uploadation Required For this Service</label>
                </div>
                <div class="form-group col-md-4">
                    <button type="button" id="add_row"  class="btn btn-success">Add Row</button>
                </div>
                <table id="myTable" width="70%">
                  <?php
                  if(isset($service_document)){
                    $str_arr = explode (",", $service_document);
                    $doc_count =  count($str_arr) - 1;
                    $i = 0;
                    for($i = 0; $i < $doc_count; $i++){
                    //echo $str_arr[$i].'<br>';

                  ?>
                  <tr>
                    <td width="80%">
                        <input type="text" class="form-control form-control-sm mt-2" name="input[<?php echo $i ?>][document]" value="<?php echo $str_arr[$i]; ?>" title="Enter Name Of Document" placeholder="Enter Name Of Document">
                    </td>
                    <td  width="20%" class="text-left pl-4">
                    <?php if($i != 0){ ?>
                      <a><i class="fa fa-trash text-danger"></i></a>
                    <?php } ?>
                    </td>
                  </tr>
                <?php } } else{ ?>
                  <tr>
                    <td width="80%">
                        <input type="text" class="form-control form-control-sm" name="input[0][document]" id="" title="Enter Name Of Document" placeholder="Enter Name Of Document">
                    </td>
                    <td  width="20%" class="text-left pl-4">
                    </td>
                  </tr>
                <?php } ?>
                </table>
              </div>


              <div class="card-footer">
                <?php if(isset($update)){ ?>
                  <button type="submit" class="btn btn-primary">Update</button>
                <?php }else{ ?>
                  <button type="submit" class="btn btn-success">Add</button>
                <?php } ?>
                <a href="<?php echo base_url(); ?>/User/service_information_list" class="btn btn-default ml-4">Cancel</a>
              </div>
              </form>
            </div>
          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
<script type="text/javascript">

<?php if(isset($service_document)){ ?>
var i = <?php echo $i-1; ?>;
<?php } else{ ?>
  var i = 0;
<?php } ?>


$('#add_row').click(function(){
  i++;
  var row = '<tr>'+
    '<td width="80%">'+
        '<input type="text" class="form-control form-control-sm mt-2" name="input['+i+'][document]" id="" title="Enter Name Of Document" placeholder="Enter Name Of Document">'+
    '</td>'+
    '<td  width="20%" class="text-left pl-4">'+
    '<a><i class="fa fa-trash text-danger"></i></a>'+
    '</td>'+
  '</tr>';
  $('#myTable').append(row);
});
$('#myTable').on('click', 'a', function () {
  $(this).closest('tr').remove();
});
</script>
</body>
</html>
