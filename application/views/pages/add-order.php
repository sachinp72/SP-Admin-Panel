<div class="content-wrapper" style="min-height: 926px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create Order
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a class="active">Create Order</a></li>
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
                  Create Order
                  <a href="<?php echo site_url('admin/orders') ?>" class="btn btn-warning pull-right btn-placement-class">Back</a>
                </div>
                <div class="panel-body">

                  <div class="row">
                    <div class="col-md-12">

                      <form class="validate-custom-form-error" action="<?php echo site_url('admin/order/submit-create-order') ?>" method="post" id="frm-create-order">

                      <h4>Buyer Information</h4>
                      <hr/>
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label for="txt_name">Name:</label>
                                <input type="text" required class="form-control" id="txt_name" name="txt_name" placeholder="Enter Name">
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label for="txt_email">Email:</label>
                                <input type="text" required class="form-control" id="txt_email" name="txt_email" placeholder="Enter Email">
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label for="txt_number">Contact Number:</label>
                                <input type="mobile" min="1" required class="form-control" id="mobile" name="mobile" placeholder="Enter Number">
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label for="txt_address">Address:</label>
                                <textarea class="form-control" name="txt_address" placeholder="Enter Address"></textarea>
                              </div>
                            </div>
                          </div>
                        </div>

                        <h4>Product Information</h4>
                        <hr/>

                        <button type="button" class="btn btn-warning pull-right" id="btn-add-more">Add More</button>
                        <br/>
                        <div class="row" id="row-add-more-products">
                          <div class="col-sm-12 dd_order_category ">
                            <div class="col-sm-2">
                             <label for="dd_order_category">Category:</label>
                             <select class="form-control dd_order_category" id="dd_order_category" name="dd_order_category[]">

    <option value="">Select Category</option>
    <?php if (count($categories) > 0): ?>
        <?php foreach ($categories as $cat): ?>
            <option value="<?php echo $cat->id; ?>"><?php echo $cat->name; ?></option>
        <?php endforeach; ?>
    <?php endif; ?>
</select>
</div>
                          
<div class="col-sm-2">
        <label for="dd_order_brand">Brand:</label>
        <select class="form-control dd_order_brand" id="dd_order_brand" name="dd_order_brand[]">
            <option value="">Select Brand</option>
        </select>
    </div>
                       

                            <div class="col-sm-2">
                              <label for="dd_order_product">Product:</label>
                              <select class="form-control dd_order_product" name="dd_order_product[]">
                                 <option value="">Select Product</option>
                              
                              </select>
                            </div>
                            <div class="col-sm-2">
                              <div class="form-group">
                                <label for="product_quantity">Quantity:</label>
                                 <input type="number" name="quantity" min="1" required class="form-control" id="product_quantity" value="1">
                              </div>
                            </div>
                           <div class="col-sm-2">
    <div class="form-group">
        <label for="total_amount">Amount (<?php echo get_option_value('site_currency'); ?>):</label>

    <input type="number" id="total_amount" name ="total_amount" class="form-control" readonly>


    </div>
</div>

                          </div>
                        </div>

                        <h4>Other Information</h4>
                        <hr/>
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="col-sm-4">
                              <div class="form-group">
                                <label for="txt_discount">Discount(%):</label>
                                <input type="number" required class="form-control" id="txt_discount" name="txt_discount" placeholder="Enter Discount">
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-group">
                                <label for="dd_payment_mode">Payment Mode:</label>
                                <select class="form-control" name="dd_payment_mode">
                                   <option value="cash">Cash</option>
                                   <option value="pending">Pending</option>
                                   <option value="online">Online Transfer</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-group">
                                <label for="dd_status">Status:</label>
                                <select class="form-control" name="dd_status">
                                   <option value="1">Active</option>
                                   <option value="0">Inactive</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit Order</button>
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
