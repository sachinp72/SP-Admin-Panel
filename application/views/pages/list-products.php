<div class="content-wrapper" style="min-height: 926px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Products
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a class="active">List Products</a></li>
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
                  Listing Products
                  <?php
                  if($report){
                    ?>
                    <a href="<?php echo site_url('admin/reports') ?>" class="btn btn-warning pull-right btn-placement-class">Back</a>
                    <?php
                  }else{
                   ?>
                   <a href="<?php echo site_url('admin/product/add-product') ?>" class="btn btn-warning pull-right btn-placement-class">Add Product</a>
                   <?php
                  }
                   ?>

                </div>
                <div class="panel-body">
                  <table id="list-products" class="display" style="width:100%">
                          <thead>
                              <tr>
                                  <th>Sr No</th>
                                  <th>Image</th>
                                  <th>Name</th>
                                  <th>Category</th>
                                  <th>Brand</th>
                                  <th>Created at</th>
                                  <th>Status</th>
                                  <?php
                                  if(!$report){
                                    ?>
                                    <th>Action</th>
                                    <?php
                                  }
                                  ?>

                              </tr>
                          </thead>
                          <tbody>

                            <?php

                          if(count($products) > 0){
                            $count =1;
                            foreach($products as $index => $value){
                              ?>
                              <tr>
                                    <td><?php echo $count; ?></td>
                                    <td>
                                      <?php
                                        if(isset($value->image) && !empty($value->image)){
                                          ?>
                                          <img src="<?php echo $value->image ?>" style="height:80px;width:80px;" title="Product Image"/>
                                          <?php
                                        }else{
                                          ?>
                                          <img src="<?php echo base_url() ?>/assets/images/no-image.png" style="height:80px;width:80px;" title="Product Image"/>
                                          <?php
                                        }
                                      ?>

                                    </td>
                                    <td><?php echo $value->name ?></td>
                                    <td>
                                      <?php
                                      $cat_info = $product_controller->get_category_name($value->category_id);
                                      echo isset($cat_info->name) ? $cat_info->name : "No Category";
                                      ?></td>
                                    <td>
                                      <?php
                                      $brand_info = $product_controller->get_brand_name($value->brand_id);
                                      echo isset($brand_info->name) ? $brand_info->name : "No Brand";
                                      ?></td>
                                    <td><?php echo $value->created_at ?></td>
                                    <td><?php
                                    if($value->status){
                                      ?>
                                      <button class="btn btn-success">Active</button>
                                      <?php
                                    }else{
                                      ?>
                                      <button class="btn btn-danger">Inactive</button>
                                      <?php
                                    }
                                     ?></td>
                                     <?php
                                     if(!$report){
                                       ?>
                                     <td>
                                       <a class="btn btn-warning" href="<?php echo site_url('admin/product/edit-product/'.$value->id) ?>">Edit</a>
                                       <button class="btn btn-danger delete-product-button" data-id="<?php echo $value->id; ?>">Delete</button>
                                     </td>
                                     <?php
                                    }
                                     ?>
                                </tr>
                                <?php
                                $count++;
                            }
                          }
                          ?>

                          </tbody>
                          <tfoot>
                            <th>Sr No</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Created at</th>
                            <th>Status</th>
                            <?php
                            if(!$report){
                              ?>
                              <th>Action</th>
                              <?php
                            }
                            ?>
                          </tfoot>
                      </table>
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
