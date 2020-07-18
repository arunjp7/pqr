<?php
// Last Updated by  Vinitha 06/08/2016
$this->mcommon->getCheckUserPermissionHead('Clients add and edit',true);
 
if(isset($value) && !empty($value))
{
    foreach($value->result() as $row)
    {   
      $client_id               =  $row->client_id;
      $client_name             =  $row->client_name;
      $client_email            =  $row->client_email;       
      $project_client_name     =  $row->project_client_name;      
      $client_phone            =  $row->client_phone;   
      $client_office_no        =  $row->client_office_no;   
      $client_fax              =  $row->client_fax;   
      $client_website          =  $row->client_website;   
      $client_abbreviations    =  $row->client_abbreviations;   
      $client_address          =  $row->client_address; 
      $client_photo            =  $row->client_photo;  
      $old_clientphoto         =  $row->client_photo;  
    }
}
else
{
    $client_id                 =  $this->input->post('client_id');
    $client_name               =  $this->input->post('client_name');
    $client_email              =  $this->input->post('client_email');
    $client_phone              =  $this->input->post('client_phone');
    $client_office_no          =  $this->input->post('client_office_no');
    $client_fax                =  $this->input->post('client_fax');
    $client_website            =  $this->input->post('client_website');
    $client_abbreviations      =  $this->input->post('client_abbreviations');
    $client_address            =  $this->input->post('client_address');
    $client_photo              =  $this->input->post('client_photo');
    $old_clientphoto           =  $this->input->post('old_clientphoto');

 
}

?>
  <!-- /.start form -->
  <div class="row">
    <div class="col-md-12">
      <div class="white-box">
      <!--
        <h3 class="box-title m-b-0"><?php echo $form_tittle;?></h3>
        <p class="text-muted m-b-30 font-13"> <?php echo $form_tittle_small;?> </p>
      -->
        <div class="row">
          <div class="col-sm-12 col-xs-12">
            <?php echo form_open_multipart($form_url); ?>
              <div class="row">
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('client_name')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_operation_client_name');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_client_name');?>" id="client_name" name="client_name" value="<?php echo $client_name ;?>" autocomplete="off">
                   <?PHP if(form_error('client_name')){ echo '<span class="help-block">'.form_error('client_name').'</span>';} ?>
                  </div>
                </div> 
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('client_email')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_operation_client_email');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_client_email');?>" id="client_email" name="client_email" value="<?php echo $client_email ;?>" autocomplete="off">
                    <?PHP if(form_error('client_email')){ echo '<span class="help-block">'.form_error('client_email').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('client_phone')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_operation_client_phone');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_client_phone');?>" id="client_phone" name="client_phone" value="<?php echo $client_phone ;?>" autocomplete="off">
                    <?PHP if(form_error('client_phone')){ echo '<span class="help-block">'.form_error('client_phone').'</span>';} ?>
                  </div>
                </div>
                
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('client_office_no')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_operation_client_office_no');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_client_office_no');?>" id="client_office_no" name="client_office_no" value="<?php echo $client_office_no ;?>" autocomplete="off">
                    <?PHP if(form_error('client_office_no')){ echo '<span class="help-block">'.form_error('client_office_no').'</span>';} ?>
                  </div>
                </div>
              </div>
              <div class="row">
                
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('client_fax')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_operation_client_fax');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_client_fax');?>" id="client_fax" name="client_fax" value="<?php echo $client_fax ;?>" autocomplete="off">
                    <?PHP if(form_error('client_fax')){ echo '<span class="help-block">'.form_error('client_fax').'</span>';} ?>
                  </div>
                </div>

                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('client_website')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_operation_client_website');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_client_website_placeholder');?>" id="client_website" name="client_website" value="<?php echo $client_website ;?>" autocomplete="off">
                    <?PHP if(form_error('client_website')){ echo '<span class="help-block">'.form_error('client_website').'</span>';} ?>
                  </div>
                </div>

                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('client_abbreviations')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_operation_client_abbreviations');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_client_abbreviations');?>" id="client_abbreviations" name="client_abbreviations" value="<?php echo $client_abbreviations;?>" autocomplete="off">
                   <?PHP if(form_error('client_abbreviations')){ echo '<span class="help-block">'.form_error('client_abbreviations').'</span>';} ?>
                  </div>
                </div>              
                
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('client_address')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_operation_client_address');?></label>
                    <textarea class="form-control" placeholder="<?php echo lang('mm_operation_client_address');?>" id="client_address" name="client_address" rows="3"><?php echo $client_address;?></textarea>
                    <?PHP if(form_error('client_address')){ echo '<span class="help-block">'.form_error('client_address').'</span>';} ?>
                  </div>
                </div>  
              </div>
              <div class="row">
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('client_photo')){ echo 'has-error';} ?>">
                  <label for="exampleInputEmail1"><?php echo lang('mm_operation_client_logo');?> <?php echo lang('mm_common_logo_size_label');?> </label>
                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                      <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                      <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new"><?php echo lang('mm_common_logo_name_label');?></span> <span class="fileinput-exists"><?php echo lang('mm_common_logo_change_label');?></span>
                      <input type="file" id="client_photo" name="client_photo" >
                      </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput"><?php echo lang('mm_Hrm_staffs_attachment');?></a>
                    </div>
                    <?PHP if(form_error('client_photo')){ echo '<span class="help-block">'.form_error('client_photo').'</span>';} ?>
                    <?php if($old_clientphoto!=''){ ?> <img src="<?php echo config_item('image_url').$old_clientphoto;?>" height="100" width="100"> <?php }?>
                  </div>
                </div> 
                             
              </div>          
              <div class="text-right">
                <input type="hidden" name="client_id" value="<?php echo $client_id;?>">
                <input type="hidden" name="old_clientphoto" value="<?php echo $old_clientphoto;?>" />
                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit"><?php echo lang('btn_save');?></button>
                <button type="reset" class="btn btn-inverse waves-effect waves-light m-r-10"><?php echo lang('btn_Reset');?></button>
                <a href="<?php echo base_url().$form_cancel_url;?>" class="btn btn-warning waves-effect waves-light m-r-10"><?php echo lang('btn_Cancel');?></a>
              </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.end form -->
