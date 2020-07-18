

<?php echo (isset($message))?$message:'';?>



  <form class="user" method="post" id="loginform" action="<?php echo base_url();?>login">
    <input type="hidden" name="language" value="english">

    <div class="form-group">
      <input type="text" autocomplete="off" class="form-control" required="" name="identity" placeholder="<?php echo lang('login_identity_label');?>">
    </div>

    <div class="form-group">
      <input type="password" class="form-control" name="password" required="" placeholder="<?php echo lang('login_password_label');?>">
    </div>

    <div class="form-group">
      <select id="userpermissin" name="userpermissin" class="form-control select2">
      <?php 
        foreach ($user_groups as $key => $value)
        {
          ?>
          <option value="<?php echo $value['id'];?>" <?php if(in_array($value['id'], $groups)) { ?> selected <?php }?>><?php echo $value['description'];?></option>
          <?php
        }
        ?>
      </select>
    </div>

    <div class="form-group">
      <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
        <input type="checkbox" class="custom-control-input" id="customCheck">
        <label class="custom-control-label" for="customCheck">Remember
          Me</label>
          <a href="<?php echo base_url();?>recovery" class="text-dark" style="float: right;"><i class="fa fa-lock m-r-5"></i> <?php echo lang('login_forgot_password');?></a> 
      </div>
    </div>
    <div class="form-group">
      <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit"><?php echo lang('login_submit_btn');?></button>
    </div>
  </form>



  