<div class="content-wrapper" style="min-height: 926px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Currency Settings
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a class="active">Currency Settings</a></li>
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

              <?php

              if(get_option_value("site_currency")){
                ?>
                <div class="alert alert-info">
                  <?php echo "Saved Currency ISO: ".get_option_value("site_currency"); ?>
                </div>
                <?php
              }

              ?>
              <div class="panel panel-primary">
                <div class="panel-heading">
                  Currency Settings
                </div>
                <div class="panel-body">

                  <div class="row">
                    <div class="col-md-6">

                      <form class="validate-custom-form-error" action="<?php echo site_url('admin/settings/currency_submit') ?>" method="post" id="frm-currency-settings">

                        <div class="form-group">
                          <label for="dd_currency">Select Currency:</label>
                          <select class="form-control" name="dd_currency">
                            <option value="">Choose Currency</option>
                            <?php
                            if(count($currencies) > 0){
                              foreach ($currencies as $key => $value) {
                                ?>
                                <option value="<?php echo $value->iso ?>"><?php echo $value->name." (".$value->iso.")" ?></option>
                                <?php
                              }
                            }
                            ?>
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
