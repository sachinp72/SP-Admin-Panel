<div class="content-wrapper" style="min-height: 926px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profile Settings
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a class="active">Profile Settings</a></li>
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
                  Profile Settings
                </div>
                <div class="panel-body">

                  <div class="row">
                    <div class="col-md-6">

                      <form class="validate-custom-form-error" action="<?php echo site_url('admin/settings/profile_submit') ?>" method="post" enctype="multipart/form-data" id="frm-profile-settings">

                        <div class="form-group">
                          <label for="txt_name">Name:</label>
                          <input type="text" value="<?php echo $this->session->userdata('name') ?>" required class="form-control" id="txt_name" name="txt_name" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                          <label for="txt_email">Email:</label>
                          <input type="email" value="<?php echo $this->session->userdata('email') ?>" required class="form-control" id="txt_email" name="txt_email" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                          <label for="file_image">Profile Image:</label>
                          <input type="file" class="form-control" id="file_image" name="file_image">
                          <br/>
                          <?php
                           if($this->session->userdata('image')){
                             ?>
                               <img src="<?php echo $this->session->userdata('image'); ?>" style="height:100px;width:100px;"/>
                             <?php
                           }
                           ?>
                        </div>
                        <div class="form-group">
                          <label for="txt_password">Password:</label>
                          <input type="password" required class="form-control" id="txt_password" name="txt_password" placeholder="Enter Password">
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
