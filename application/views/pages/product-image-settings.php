<div class="content-wrapper" style="min-height: 926px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Product Image Settings
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a class="active">Product Image Settings</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">

                   <?php if($this->session->flashdata("success")): ?>
    <div class="alert alert-success">
        <?php echo $this->session->flashdata("success"); ?>
    </div>
<?php endif; ?>

              <?php if($this->session->flashdata("error")){
                ?>
                <div class="alert alert-danger">
                  <?php echo $this->session->flashdata("error"); ?>
                </div>
                <?php
              } ?>
              <div class="panel panel-primary">
                <div class="panel-heading">
                  Product Image Settings
                </div>
                <div class="panel-body">

                  <div class="row">
                    <div class="col-md-6">

                      <form class="validate-custom-form-error" action="<?php echo site_url('admin/settings/save_product_image_settings') ?>" method="post" id="frm-product-image-settings">

                        <?php

                        $product_image_attributes = get_option_value("product_image_settings");
                        $width = "";
                        $height = "";
                        $max_size = "";
                        $valid_extensions = array();
                        if(!empty($product_image_attributes)){
                          $product_image_attributes = unserialize($product_image_attributes);
                          $width = $product_image_attributes['width'];
                          $height = $product_image_attributes['height'];
                          $max_size = $product_image_attributes['size'];
                          $valid_extensions = $product_image_attributes['extensions'];
                        }
                        ?>
                        <div class="form-group">
                          <label for="txt_width">Image Width (Px):</label>
                          <input type="number" value="<?php echo $width; ?>" min="1" required class="form-control" id="txt_width" name="txt_width" placeholder="Enter Width">
                        </div>

                        <div class="form-group">
                          <label for="txt_height">Image Height (Px):</label>
                          <input type="number" min="1" value="<?php echo $height; ?>" required class="form-control" id="txt_height" name="txt_height" placeholder="Enter Height">
                        </div>

                        <div class="form-group">
                          <label for="txt_max_size">Image Size (KB):</label>
                          <input type="number" min="1" value="<?php echo $max_size; ?>" required class="form-control" id="txt_max_size" name="txt_max_size" placeholder="Enter Size">
                        </div>

                        <div class="form-group">
                          <label for="txt_image_extensions">Select Image Extensions:</label>

                          <?php

                          if(count($valid_extensions) > 0){

                            if(in_array("png",$valid_extensions)){
                              echo '<input type="checkbox" name="chk_ext[]" value="png" checked/> PNG';
                            }else{
                              echo '<input type="checkbox" name="chk_ext[]" value="png"/> PNG';
                            }

                            if(in_array("jpg",$valid_extensions)){
                              echo '<input type="checkbox" name="chk_ext[]" value="jpg" checked/> JPG';
                            }else{
                              echo '<input type="checkbox" name="chk_ext[]" value="jpg"/> JPG';
                            }

                            if(in_array("jpeg",$valid_extensions)){
                              echo '<input type="checkbox" name="chk_ext[]" value="jpeg" checked/> JPEG';
                            }else{
                              echo '<input type="checkbox" name="chk_ext[]" value="jpeg"/> JPEG';
                            }
                            ?>
                            <?php
                          }

                          ?>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
