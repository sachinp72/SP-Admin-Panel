<div class="content-wrapper" style="min-height: 926px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Product
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a class="active">Add Product</a></li>
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
                  Add Product
                  <a id="btn-add-category" href="<?php echo site_url('admin/products') ?>" class="btn btn-warning pull-right btn-placement-class">Back</a>
                </div>
                <div class="panel-body">

                  <div class="row">
                    <div class="col-md-6">

                      <form class="validate-custom-form-error" action="<?php echo site_url('admin/product/submit-add-product') ?>" method="post" enctype="multipart/form-data" id="frm-add-product">


                        <input type="hidden" value="add" name="opt_type"/>

                        <div class="form-group">
                          <label for="dd_category">Category:</label>
                          <select class="form-control" required name="dd_add_product_category" id="dd_add_product_category">
                              <option value="">Select Category</option>
                              <?php
                               if(count($categories) > 0){
                                 foreach($categories as $index => $category){
                                   ?>
                                   <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                                   <?php
                                 }
                               }
                              ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="dd_brand">Brand:</label>
                          <select class="form-control" required name="dd_add_product_brand" id="dd_add_product_brand">
                              <option value="">Select Brand</option>
                              <?php
                               if(count($product) > 0){
                                 foreach($product as $index => $product){
                                   ?>
                                   <option value="<?php echo $product->id; ?>"><?php echo $product->name; ?></option>
                                   <?php
                                 }
                               }
                              ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="txt_name">Name:</label>
                          <input type="text" required class="form-control" id="txt_name" name="txt_name" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                          <label for="txt_description">Description:</label>
                          <textarea class="form-control" required id="txt_description" name="txt_description" placeholder="Enter Description"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="file_image">Product Image:</label>
                          <input type="file" class="form-control" id="file_image" name="file_image">
                          <br/>
                           <?php
                            $image_attributes = get_option_value("product_image_settings");
                            if(!empty($image_attributes)){
                              $image_attributes = unserialize($image_attributes);

                              echo "<b><i>Note*: Width: ".$image_attributes['width']."px, Height: ".$image_attributes['height']."px, upload size: ".$image_attributes['size']."kb </i></b>";
                            }

                          ?>
                        </div>
                        <div class="form-group">
                          <label for="txt_name">Amount (<?php echo get_option_value("site_currency"); ?>):</label>
                          <input type="number" min="1" required class="form-control" id="txt_amount" name="txt_amount" placeholder="Enter Amount">
                        </div>
                        <div class="form-group">
                          <label for="dd_status">Status:</label>
                          <select class="form-control" name="dd_status" id="dd_status">
                             <option value="1">Active</option>
                             <option value="0">Inactive</option>
                          </select>
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
