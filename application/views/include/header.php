<header class="main-header">
  <!-- Logo -->
  <a href="<?php echo site_url('admin') ?>" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>O</b>WT</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>SP</b> Admin Panel</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">

        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo $this->session->userdata('image') ?>" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo $this->session->userdata('name') ?></span>
          </a>
          <ul class="dropdown-menu">

            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="<?php echo site_url('admin/profile-settings') ?>" class="btn btn-default btn-flat">Update Profile</a>
              </div>
              <div class="pull-right">
                <a href="<?php echo site_url('admin/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>

      </ul>
    </div>
  </nav>
</header>
