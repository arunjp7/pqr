<?php
  $user = $this->ion_auth->user()->row();
  $user_groups = $this->ion_auth->get_users_groups($user->id)->result_array();
  $user_group_id  = $user_groups[0]['id'];

  $getSubmenuAll = $this->mdropdown->getSubmenuAll();
?>

<ul class="nav navbar-nav navbar-right">
    
    <li  ><a href="<?php echo base_url(); ?>" <?php echo ($this->uri->segment(1)=='dashboard') ? 'class="waves-effect active"' : '';?>> <span class="hide-menu"><?php echo lang('mm_dashboard');?></span></a>
    </li>
    <!-- dynamic menu starts -->
    <?php
    if (isset($getSubmenuAll) && !empty($getSubmenuAll)) {
      foreach ($getSubmenuAll as $key => $value) {
        ?>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic <?php echo ($this->uri->segment(1)==$value['menu_active_name']) ? 'active' : '';?>" data-toggle="dropdown" aria-expanded="true">
                <span class="user-name"><?php echo $key;?><i class="fa fa-angle-down"></i></span>
            </a>
            <?php 
              if(isset($value['submenu']) && !empty($value['submenu'])) {
            ?>
            <ul class="dropdown-menu dropdown-list" role="menu">
                <?php 
                   foreach ($value['submenu'] as $rowSub => $valueSub) {
                ?>
                <li role="presentation"><a href="<?php echo ($valueSub['menu_path'] != '') ? base_url().$valueSub['menu_path'] : 'javascript:void(0);' ;?>"><?php echo $valueSub['menu_name'];?></a>
                </li>
                <?php
                }
                ?>
            </ul>
            <?php
              }
            ?>
        </li>
        <?php
          }
        }
        ?>
    <!-- dynamic menu end  -->

    <!-- profile menu  -->
                                                                      
    <li class="dropdown">
        <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
            <span class="user-name"><?php echo $user->first_name.' '.$user->last_name;?><i class="fa fa-angle-down"></i></span>
            <?php if($user->user_photo != '') { ?><img class="img-circle avatar" src="<?php echo config_item("image_url").$user->user_photo;?>" width="40" height="40" alt=""><?php }?>
        </a>
        <ul class="dropdown-menu dropdown-list" role="menu">
           <!--  <li role="presentation"><a href="<?php echo base_url().'auth/change_password/';?>"><i class="fa fa-user"></i><?php echo lang('mm_user_change_pwd');?></a></li> -->
            <li role="presentation"><a href="<?php echo base_url(); ?>logout"><i class="fa fa-sign-out m-r-xs"></i><?php echo lang('mm_logout');?></a></li>
        </ul>
    </li>
    
</ul><!-- Nav -->

