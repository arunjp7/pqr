
<div class="col-md-12">
    <div class="widget-wrap">
      <div class="white-box"> 
        <div class="widget-header block-header margin-bottom-0 clearfix">
            <div class="pull-left">
            <!--
                <h3 class="box-title m-b-0"><?php echo lang('create_user_heading');?></h3>
                 <p class="text-muted m-b-30 font-13"><?php echo lang('create_user_subheading');?></p>
            -->
            </div>
        </div>
        
        <div class="widget-container">
            <div class="widget-content">
                <div class="row">
                    <div class="col-md-12">
                    <?php
                      if($this->session->flashdata('res'))
                      {
                      ?>
                      <div class="alert alert-<?php echo $this->session->flashdata('res_type'); ?> successmessage">
                      <?php   echo $this->session->flashdata('res'); ?>
                      </div>
                      <?php
                      }
                    ?>
                    <?php echo form_open(uri_string());?>
                    <div class="row">
                      <div class="col-sm-4 col-xs-4">
                        <div class="form-group <?PHP if(form_error('first_name')){ echo 'has-error';} ?>">
                          <label for="exampleInputEmail1"><?php echo lang('create_user_fname_label');?></label>
                          <input type="text" class="form-control" placeholder="<?php echo lang('create_user_fname_label');?>"autocomplete="off" name="first_name" >
                          <?PHP if(form_error('first_name')){ echo '<span class="help-block">'.form_error('first_name').'</span>';} ?>
                        </div>
                      </div> 
                      <div class="col-sm-4 col-xs-4">
                        <div class="form-group <?PHP if(form_error('last_name')){ echo 'has-error';} ?>">
                        <label for="exampleInputEmail1"><?php echo lang('create_user_lname_label');?></label>
                        <input type="text" class="form-control" placeholder="<?php echo lang('create_user_lname_label');?>" id="last_name" name="last_name"  autocomplete="off">
                        <?PHP if(form_error('last_name')){ echo '<span class="help-block">'.form_error('last_name').'</span>';} ?>
                        </div>
                      </div> 
                      <div class="col-sm-4 col-xs-4">
                        <div class="form-group <?PHP if(form_error('phone')){ echo 'has-error';} ?>">
                        <label for="exampleInputEmail1"><?php echo lang('create_user_phone_label');?></label>
                        <input type="text" class="form-control" placeholder="<?php echo lang('create_user_phone_label');?>" id="phone" name="phone" autocomplete="off">
                        <?PHP if(form_error('phone')){ echo '<span class="help-block">'.form_error('phone').'</span>';} ?>
                        </div>
                      </div> 
                    </div>
                    <div class="row">
                      <div class="col-sm-4 col-xs-4">
                        <div class="form-group <?PHP if(form_error('email')){ echo 'has-error';} ?>">
                          <label for="exampleInputEmail1"><?php echo lang('create_user_email_label');?></label>
                          <input type="text" class="form-control" placeholder="<?php echo lang('create_user_email_label');?>" id="email" name="email" autocomplete="off">
                          <?PHP if(form_error('email')){ echo '<span class="help-block">'.form_error('email').'</span>';} ?>
                        </div>
                      </div>
                      <div class="col-sm-4 col-xs-4">
                        <div class="form-group <?PHP if(form_error('password')){ echo 'has-error';} ?>">
                          <label for="exampleInputEmail1"><?php echo lang('create_user_password_label');?></label>
                          <input type="password" class="form-control" placeholder="<?php echo lang('create_user_password_label');?>" id="password" name="password" autocomplete="off">
                          <?PHP if(form_error('password')){ echo '<span class="help-block">'.form_error('password_confirm').'</span>';} ?>
                        </div>
                      </div> 
                      <div class="col-sm-4 col-xs-4">
                        <div class="form-group <?PHP if(form_error('password_confirm')){ echo 'has-error';} ?>">
                          <label for="exampleInputEmail1"><?php echo lang('create_user_password_confirm_label');?></label>
                          <input type="password" class="form-control" placeholder="<?php echo lang('create_user_password_confirm_label');?>" id="password_confirm" name="password_confirm" autocomplete="off">
                          <?PHP if(form_error('password_confirm')){ echo '<span class="help-block">'.form_error('password_confirm').'</span>';} ?>
                        </div>
                      </div> 
                    </div>
                        
             
                        <div class="text-right">
          <input type="hidden" name="id" value="<?php echo $id;?>">
          <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit"><?php echo lang('btn_save');?></button>

          <button type="reset" class="btn btn-inverse waves-effect waves-light"><?php echo lang('btn_Cancel');?></button>
        </div>
                       
            <?php echo form_close();?>
                    </div>
                </div>
            </div>
        </div>
        
      </div>   
    </div>
</div>
