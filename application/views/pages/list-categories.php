 

<div class="content-wrapper" style="min-height: 926px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Categories
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a class="active">List Categories</a></li>
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
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <?php
              } ?>


              <div class="panel panel-primary">
                <div class="panel-heading">
                  Listing Categories
                  <button id="btn-add-category" data-toggle="modal" data-target="#category-modal" class="btn btn-warning pull-right btn-placement-class">Add Category</button>
                </div>
                <div class="panel-body">
                  <table id="list-categories" class="display" style="width:100%">
                          <thead>
                              <tr>
                                  <th>Sr No</th>
                                  <th>Name</th>
                                  <th>Created at</th>
                                  <th>Status</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>

                      
    <?php foreach ($categories as $value): ?>
    <tr>
        <td><?php echo $value->{"id"} ?></td> <!-- Assuming you have a serial number -->
        <td><?php echo $value->{"name"} ?></td>
        <td><?php echo $value->{"created_at"}; ?></td>
        <td>
            <button class="btn <?php echo $value->{"status"} == 1 ? 'btn-success' : 'btn-danger'; ?>">
                <?php echo $value->{"status"} == 1 ? 'Active' : 'Inactive'; ?>
            </button>
        </td>

        <td>
          
            <button class="btn btn-warning edit-button" data-toggle="modal" data-id="<?php echo $value->{"id"}; ?>" data-target="#updateModal">Edit</button>
          
            <button class="btn btn-danger btn-delete-category delete-button" data-id="<?php echo $value->{"id"}; ?>">Delete</button> <!-- Fixed the closing quote -->
        </td>
    </tr>
<?php endforeach; ?>

   <!--  <tr>
        <td colspan="5">No categories found.</td>
    </tr>
 -->


                          </tbody>
                          <tfoot>
                            <th>Sr No</th>
                            <th>Name</th>
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
<div id="category-modal" class="modal fade" role="dialog" >
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" >Add Category</h4>
      </div>
      <div class="modal-body">
        <form class="validate-custom-form-error" id="catmodal" method="post">

            <input type="hidden" name="opt_type" id="opt_type" value="add"/>
            <input type="hidden" name="edit_id" id="edit_id" value=""/>

            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" required id="txt_add_name" name="name">
            </div>
            <div class="form-group">
              <label for="status">Status:</label>
              <select class="form-control" name="status" id="status">
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

  <!--Update Modal -->
<div id="updateModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Category</h4>
      </div>
      <div class="modal-body">
        <form class="validate-custom-form-error" id="updateForm" method="post" action="<?php echo site_url('ajax/update_category'); ?>">
            <input type="hidden" name="id" id="recordId"/>
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name" id="name" required>
            </div>
            <div class="form-group">
              <label for="status">Status:</label>
              <select class="form-control" name="status" id="status" required>
                 <option value="1">Active</option>
                 <option value="0">Inactive</option>
              </select>
            </div>
            <button type="submit" class="btn btn-success" id="updateForm">Submit</button>
          </form>
      </div>
    </div>
  </div>
</div>


