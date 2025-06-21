

<div class="content-wrapper" style="min-height: 926px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Brands
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a class="active">List Brands</a></li>
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
                  Listing Brands
                  <button id="btn-add-brand" data-toggle="modal" data-target="#brand-modal" class="btn btn-warning pull-right btn-placement-class">Add Brand</button>
                </div>
                <div class="panel-body">
                  <table id="list-brands" class="display" style="width:100%">
                          <thead>
                              <tr>
                                  <th>Sr No</th>
                                  <th>Name</th>
                                  <th>Category</th>
                                  <th>Created at</th>
                                  <th>Status</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>

                        <?php foreach ($brands as $value): ?>
                              <tr>
                                  <td><?php echo ($value->{"id"}); ?></td>
                                  <td><?php echo ($value->{"name"}); ?></td>
                                  <td>
                                      <?php 
              
                                      $brand_data = $brand_controller->get_category_name($value->{"category_id"}); 
                                      
                                      if ($brand_data) {
                                          echo ($brand_data->name);
                                      } else {
                                          echo 'Unknown Category'; // Fallback if no category data is found
                                      }
                                      ?>
                                  </td>
                                  <td><?php echo ($value->{"created_at"}); ?></td>
                                  <td>
                                      <?php if ($value->status): ?>
                                          <button class="btn btn-success">Active</button>
                                      <?php else: ?>
                                          <button class="btn btn-danger">Inactive</button>
                                      <?php endif; ?>
                                  </td>
                                  <td>
                                      <button class="btn btn-warning edit-brand-button" data-toggle="modal" data-target="#update-brand-modal" data-id="<?php echo ($value->{"id"}); ?>">Edit</button>
                                      <button class="btn btn-danger brand-delete-button" data-id="<?php echo ($value->{"id"}); ?>">Delete</button>
                                  </td>
                              </tr>
                          <?php endforeach; ?>

   

                          </tbody>
                          <tfoot>
                            <th>Sr No</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Created at</th>
                            <th>Status</th>
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

  <!-- Modal -->
<div id="brand-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Brand</h4>
      </div>
      <div class="modal-body">
        <form class="validate-custom-form-error" id="brand-form-add" method="post">
          <div class="form-group">
            <label for="dd_category">Category:</label>
            <select class="form-control" name="dd_category" id="dd_category" required>
              <option value="">Choose Category</option>
              <?php if (count($categories) > 0) {
                foreach ($categories as $value) { ?>
                  <option value="<?php echo ($value->{"id"}); ?>"><?php echo ($value->{"name"}); ?></option>
              <?php } } ?>
            </select>
          </div>

          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" required id="name" name="name" placeholder="Brand name">
          </div>
          <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" name="status" id="status" required>
              <option value="1">Active</option>
              <option value="0">Inactive</option>
            </select>
          </div>

          <button type="submit" class="btn btn-success">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>


 <!-- Update brand Modal -->


     <!-- Update brand Modal -->
<div id="update-brand-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Brand data</h4>
      </div>
      <div class="modal-body">
      <form class="validate-custom-form-error" id="brand-form-edit" method="post">

    <input type="hidden" name="id" id="brandid"/>

    <div class="form-group">
        <label>Category:</label>
        <select class="form-control" name="category_id" id="catid" required>
            <option value="">Choose Category</option>
            <?php if (count($categories) > 0) {
                foreach ($categories as $value) { ?>
                    <option value="<?php echo($value->{"id"}); ?>"><?php echo ($value->{"name"}); ?></option>
            <?php } } ?>
        </select>
    </div>

    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="brandname" name="name" placeholder="Brand name" required>
    </div>

    <div class="form-group">
        <label for="status">Status:</label>
        <select class="form-control" name="status" id="dd_status" required>
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success" id="brand-form-edit">Submit</button>
</form>

      </div>
    </div>
  </div>
</div>
