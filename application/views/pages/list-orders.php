<div class="content-wrapper" style="min-height: 926px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Orders
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a class="active">List Orders</a></li>
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
                  Listing Orders
                  <?php
                  if($report){
                    ?>
                    <a href="<?php echo site_url('admin/reports') ?>" class="btn btn-warning pull-right btn-placement-class">Back</a>
                    <?php
                  }else{
                    ?>
                    <a id="btn-add-order" href="<?php echo site_url('admin/order/add-order') ?>" class="btn btn-warning pull-right btn-placement-class">Create Order</a>
                    <?php
                  }
                   ?>
                </div>
                <div class="panel-body">
                  <table id="list-orders" class="display" style="width:100%">
                          <thead>
                              <tr>
                                  <th>Sr No</th>
                                  <th>Customer Information</th>
                                  <th>Total Products</th>
                                  <th>Total Amount</th>
                                  <th>Discount(%)</th>
                                  <th>Created at</th>
                                  <th>Payment Status</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>

                            <?php
                            if(count($buyers) > 0){
                              $count = 1;
                              foreach($buyers as $index => $buyer){

                                $order_info = $order_controller->get_buyer_product_info($buyer->id);

                                ?>
                                <tr>
                                  <td><?php echo $count; ?></td>
                                  <td><?php echo "Name: ".$buyer->name."<br/>Email: ".$buyer->email."<br/>Phone: ".$buyer->mobile; ?></td>
                                  <td>
                                    <?php echo $order_info->total_products; ?>
                                  </td>
                                  <td>
                                    <?php echo $order_info->total_amount; ?>
                                  </td>
                                  <td><?php echo $buyer->discount_percentage; ?></td>
                                  <td><?php echo $buyer->created_at; ?></td>
                                  <td><?php echo ucfirst($buyer->payment_mode); ?></td>
                                  <td>
                                    <a href="<?php echo site_url('admin/order/invoice-detail/'.$buyer->id) ?>" class="btn btn-success">Invoice Detail</a>
                                  
                                    <button class="btn btn-danger delete-buyer-button" data-id="<?php echo $buyer->id; ?>">Delete</button> <!-- Corrected data-id -->
                                  </td>
                                  
                                </tr>
                                <?php
                                $count++;
                              }
                            }

                            ?>

                          </tbody>
                          <tfoot>
                            <th>Sr No</th>
                            <th>Customer Information</th>
                            <th>Total Products</th>
                            <th>Total Amount</th>
                            <th>Discount(%)</th>
                            <th>Created at</th>
                            <th>Payment Status</th>
                            <th>Action</th>
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
