<?php 
  $getSubmenuAll = $this->mdropdown->getSubmenuAll();
  //echo "fgfdg".count($getSubmenuAll);
/*echo "fsfgf";
  echo "<pre>";
  print_r($getSubmenuAll);
  print_r($this->uri->segment(1));
  echo "</pre>";
  exit;*/
?>
<!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <img src="img/logo/logo2.png">
        </div>
        <div class="sidebar-brand-text mx-3">RuangAdmin</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url(); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span><?php echo lang('mm_dashboard');?></span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Features
      </div>
      <?php
        if (isset($getSubmenuAll) && !empty($getSubmenuAll)) {
          foreach ($getSubmenuAll as $key => $value) {
      ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#<?php echo $key;?>"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <!-- <i class="far fa-fw fa-window-maximize"></i> -->
          <span><?php echo $key;?></span>
        </a>
        <div id="<?php echo $key;?>" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"><?php echo $key;?></h6>
            <?php
              if(isset($value['submenu']) && !empty($value['submenu'])) {
                foreach ($value['submenu'] as $rowSub => $valueSub) {
            ?>
            <a class="collapse-item" href="<?php echo ($valueSub['menu_path'] != '') ? base_url().$valueSub['menu_path'] : 'javascript:void(0);' ;?>"><?php echo $valueSub['menu_name'];?></a>
            <?php
                }
              }
            ?>
          </div>
        </div>
      </li>
      <?php
          }
        }
      ?>
      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin"></div>
    </ul>