<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 2.4.13
  </div>
  <?php
  $link = "#";
  $text = "Sample Organinzation";

  $footer_data = get_option_value("site_footer_setting");
  if(!empty($footer_data)){
    $footer_data = unserialize($footer_data);
    $link = $footer_data['link'];
    $text = $footer_data['name'];
  }
  ?>
  <strong>Copyright &copy; <?php echo date("Y") ?> <a href="<?php echo $link ?>" target="_blank"><?php echo $text; ?></a>.</strong> All rights
  reserved.
</footer>
