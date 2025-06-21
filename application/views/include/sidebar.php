<?php
  $active_menu = $this->uri->segment(2);
?>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel" style="margin-bottom:20px;">
      <div class="pull-left image">
        <?php
         if($this->session->userdata("image")){
           ?>
           <img src="<?php echo $this->session->userdata("image") ?>" class="img-circle" alt="User Image">
           <?php
         }
        ?>

      </div>
      <div class="pull-left info">
        <p><?php echo $this->session->userdata("name"); ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li>
        <a href="<?php echo site_url('admin') ?>" class="<?php if(empty($active_menu)){ ?>menu-active<?php  } ?>">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>

      <li>
        <a href="<?php echo site_url('admin/categories') ?>">
          <i class="fa fa-dashboard"></i> <span>Categories</span>
        </a>
      </li>

      <li>
        <a href="<?php echo site_url('admin/brands') ?>" class="<?php if(!empty($active_menu) && $active_menu == "brands"){ ?>menu-active<?php  } ?>">
          <i class="fa fa-dashboard"></i> <span>Brands</span>
        </a>
      </li>

      <li>
        <a href="<?php echo site_url('admin/products') ?>" class="<?php if(!empty($active_menu) && $active_menu == "products"){ ?>menu-active<?php  } ?>">
          <i class="fa fa-dashboard"></i> <span>Products</span>
        </a>
      </li>

      <li>
        <a href="<?php echo site_url('admin/orders') ?>" class="<?php if(!empty($active_menu) && $active_menu == "orders"){ ?>menu-active<?php  } ?>">
          <i class="fa fa-dashboard"></i> <span>Orders</span>
        </a>
      </li>

      <li>
        <a href="<?php echo site_url('admin/reports') ?>" class="<?php if(!empty($active_menu) && $active_menu == "reports"){ ?>menu-active<?php  } ?>">
          <i class="fa fa-dashboard"></i> <span>Reports</span>
        </a>
      </li>

      <li class="treeview">
        <a href="javascript:void(0)" class="<?php if(!empty($active_menu) && ($active_menu == "profile-settings" || $active_menu == "footer-settings" || $active_menu == "product-image-settings" || $active_menu == "currency-settings")){ ?>menu-active<?php  } ?>">
          <i class="fa fa-share"></i> <span>Settings</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo site_url('admin/profile-settings') ?>"><i class="fa fa-circle-o"></i> Profile Setting</a></li>
          <li><a href="<?php echo site_url('admin/currency-settings') ?>"><i class="fa fa-circle-o"></i> Currency Setting</a></li>
          <li><a href="<?php echo site_url('admin/product-image-settings') ?>"><i class="fa fa-circle-o"></i> Product Image Setting</a></li>
          <li><a href="<?php echo site_url('admin/footer-settings') ?>"><i class="fa fa-circle-o"></i> Footer Setting</a></li>

        </ul>
      </li>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
