<div class="col-md-12">
    <div class="widget-wrap">
      <div class="white-box"> 
        <div class="widget-header block-header margin-bottom-0 clearfix">
            <div class="pull-left">
                <h3 class="box-title m-b-0"><?php echo lang('change_password_heading');?></h3>
            </div>
        </div>
        
        <div class="widget-container">
            <div class="widget-content">
                <div class="row">
                        <div class="col-md-12">
                              <div id="infoMessage"><?php echo $message;?></div>
                              <?php echo form_open(uri_string());?>
                              <div class="row">
                              <div class="col-sm-4 col-xs-4">
                              <div class="form-group <?PHP if(form_error('old_password')){ echo 'has-error';} ?>">
                              <label for="exampleInputEmail1"><?php echo lang('change_password_old_password_label', 'old_password');?> </label>
                              <?php echo form_input($old_password);?>

                              </div>
                        </div> 
                        <div class="col-sm-4 col-xs-4">
                              <div class="form-group <?PHP if(form_error('min_password_length')){ echo 'has-error';} ?>">
                              <label for="exampleInputEmail1"><?php echo lang('change_password_new_password_label', $min_password_length);?></label>
                              <?php echo form_input($new_password);?>

                              </div>
                        </div> 
                        <div class="col-sm-4 col-xs-4">
                              <div class="form-group <?PHP if(form_error('new_password_confirm')){ echo 'has-error';} ?>">
                              <label for="exampleInputEmail1"> <?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm');?> </label>
                              <?php echo form_input($new_password_confirm);?>

                              </div>
                        </div> 
                  </div>
            </div>
            <div class="text-right">
                 
                  <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit"><?php echo  lang('mm_common_logo_confirm_label') .$form_button_name; ?></button>
                  <?php echo form_input($user_id);?>
            </div>
                       
            <?php echo form_close();?>
       </div>
      </div>
</div>
</div>

</div>   
</div>
</div>


