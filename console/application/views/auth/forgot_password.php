
<h3 class="box-title m-b-20"></h3>
<p></p></center>
<?php echo (isset($message))?$message:'';?>


	<form class="form-horizontal"  action="<?php echo base_url();?>recovery" method="post">
        <div class="form-group ">
          <div class="col-xs-12">
            <h3><?php echo lang('forgot_password_heading');?></h3>
            <p class="text-muted"><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>
          </div>
        </div>
        <div class="form-group ">
          <div class="col-xs-12">
            <input class="form-control" type="text" required="" name="identity" placeholder="<?php echo lang('login_identity_label');?>">
          </div>
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit"><?php echo lang('forgot_password_submit_btn');?></button>
          </div>
        </div>
        <div class="form-group">
        	<a href="<?php echo base_url();?>login" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Back to Login</a>
        </div>
      </form>
