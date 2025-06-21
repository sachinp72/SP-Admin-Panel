<div class="content-wrapper" style="min-height: 926px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Footer Settings
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a class="active">Footer Settings</a></li>
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
                  Footer Settings
                </div>
                <div class="panel-body">

                  <div class="row">
                    <div class="col-md-6">

                      <form class="validate-custom-form-error" action="<?php echo site_url('admin/settings/footer_settings_submit') ?>" method="post" id="frm-footer-settings">

                        <?php
                        $footer_settings = get_option_value("site_footer_setting");
                        $link = "";
                        $name = "";
                        if(!empty($footer_settings)){
                          $footer_settings = unserialize($footer_settings);
                          $name = $footer_settings['name'];
                          $link = $footer_settings['link'];
                        }
                        ?>
                        <div class="form-group">
                          <label for="txt_link">Footer Link:</label>
                          <input type="text" value="<?php echo $link ?>" class="form-control" required name="txt_link" id="txt_link" placeholder="Enter Link"/>
                        </div>
                        <div class="form-group">
                          <label for="txt_name">Footer Organinzation Name:</label>
                          <input type="text" value="<?php echo $name ?>" class="form-control" required name="txt_name" id="txt_name" placeholder="Enter Organinzation name"/>
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
