<?php
// Last Updated by  Vinitha 06/08/2016 
$this->mcommon->getCheckUserPermissionHead('ECContractor add and edit',true);
if(isset($value) && !empty($value)) 
{
    foreach($value->result() as $row)
    {   
      $ecContractor_id               =  $row->ecContractor_id;
      $ecContractor_name             =  $row->ecContractor_name;
      $ecContractor_abbr             =  $row->ecContractor_abbr;       
      $ecContractor_email            =  $row->ecContractor_email;       
      $ecContractor_phone            =  $row->ecContractor_phone;       
      $ecContractor_office_no        =  $row->ecContractor_office_no;       
      $ecContractor_fax              =  $row->ecContractor_fax;       
      $ecContractor_website          =  $row->ecContractor_website;       
      $ecContractor_address          =  $row->ecContractor_address;       
      $ecContractor_photo            =  $row->ecContractor_photo;       
      $old_ecContractorphoto         =  $row->ecContractor_photo;       
    }
}
else
{
    $ecContractor_id                 =  $this->input->post('ecContractor_id');
    $ecContractor_name               =  $this->input->post('ecContractor_name');
    $ecContractor_abbr               =  $this->input->post('ecContractor_abbr');
    $ecContractor_email              =  $this->input->post('ecContractor_email');
    $ecContractor_phone              =  $this->input->post('ecContractor_phone');
    $ecContractor_office_no          =  $this->input->post('ecContractor_office_no');
    $ecContractor_fax                =  $this->input->post('ecContractor_fax');
    $ecContractor_website            =  $this->input->post('ecContractor_website');
    $ecContractor_address            =  $this->input->post('ecContractor_address');
    $ecContractor_photo              =  $this->input->post('ecContractor_photo');
    $old_ecContractorphoto           =  $this->input->post('old_ecContractorphoto');
 
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
                  <div class="form-group <?PHP if(form_error('ecContractor_name')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_ECContractor_name');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_Hrm_ECContractor_name');?>" id="ecContractor_name" name="ecContractor_name" value="<?php echo $ecContractor_name ;?>" autocomplete="off">
                   <?PHP if(form_error('ecContractor_name')){ echo '<span class="help-block">'.form_error('ecContractor_name').'</span>';} ?>
                  </div>
                </div> 
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('ecContractor_email')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_ECContractor_email');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_Hrm_ECContractor_email');?>" id="ecContractor_email" name="ecContractor_email" value="<?php echo $ecContractor_email ;?>" autocomplete="off">
                    <?PHP if(form_error('ecContractor_email')){ echo '<span class="help-block">'.form_error('ecContractor_email').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('ecContractor_phone')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_ECContractor_phone');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_Hrm_ECContractor_phone');?>" id="ecContractor_phone" name="ecContractor_phone" value="<?php echo $ecContractor_phone ;?>" autocomplete="off">
                    <?PHP if(form_error('ecContractor_phone')){ echo '<span class="help-block">'.form_error('ecContractor_phone').'</span>';} ?>
                  </div>
                </div>
                
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('ecContractor_office_no')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_ECContractor_office_no');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_Hrm_ECContractor_office_no');?>" id="ecContractor_office_no" name="ecContractor_office_no" value="<?php echo $ecContractor_office_no ;?>" autocomplete="off">
                    <?PHP if(form_error('ecContractor_office_no')){ echo '<span class="help-block">'.form_error('ecContractor_office_no').'</span>';} ?>
                  </div>
                </div>
              </div>
              <div class="row">
                
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('ecContractor_fax')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_ECContractor_fax');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_Hrm_ECContractor_fax');?>" id="ecContractor_fax" name="ecContractor_fax" value="<?php echo $ecContractor_fax ;?>" autocomplete="off">
                    <?PHP if(form_error('ecContractor_fax')){ echo '<span class="help-block">'.form_error('ecContractor_fax').'</span>';} ?>
                  </div>
                </div>

                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('ecContractor_website')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_ECContractor_website');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_Hrm_ECContractor_website_placeholder');?>" id="ecContractor_website" name="ecContractor_website" value="<?php echo $ecContractor_website ;?>" autocomplete="off">
                    <?PHP if(form_error('ecContractor_website')){ echo '<span class="help-block">'.form_error('ecContractor_website').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('ecContractor_abbr')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_ECContractor_abbr');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_Hrm_ECContractor_abbr');?>" id="ecContractor_abbr" name="ecContractor_abbr" value="<?php echo $ecContractor_abbr;?>" autocomplete="off">
                   <?PHP if(form_error('ecContractor_abbr')){ echo '<span class="help-block">'.form_error('ecContractor_abbr').'</span>';} ?>
                  </div>
                </div>              
                
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('ecContractor_address')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_ECContractor_address');?></label>
                    <textarea class="form-control" placeholder="<?php echo lang('mm_Hrm_ECContractor_address');?>" id="ecContractor_address" name="ecContractor_address" rows="3"><?php echo $ecContractor_address;?></textarea>
                    <?PHP if(form_error('ecContractor_address')){ echo '<span class="help-block">'.form_error('ecContractor_address').'</span>';} ?>
                  </div>
                </div>  
              </div>
              <div class="row">
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('ecContractor_photo')){ echo 'has-error';} ?>">
                  <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_ECContractor_logo');?> <?php echo lang('mm_common_logo_size_label');?> </label>
                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                      <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                      <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new"><?php echo lang('mm_common_logo_name_label');?></span> <span class="fileinput-exists"><?php echo lang('mm_common_logo_change_label');?></span>
                      <input type="file" id="ecContractor_photo" name="ecContractor_photo" >
                      </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput"><?php echo lang('mm_Hrm_staffs_attachment');?></a>
                    </div>
                    <?PHP if(form_error('ecContractor_photo')){ echo '<span class="help-block">'.form_error('ecContractor_photo').'</span>';} ?>
                    <?php if($old_ecContractorphoto!=''){ ?> <img src="<?php echo config_item('image_url').$old_ecContractorphoto;?>" height="100" width="100"> <?php }?>
                  </div>
                </div> 
                             
              </div>              
              <div class="text-right">
                <input type="hidden" name="ecContractor_id" value="<?php echo $ecContractor_id;?>">
                <input type="hidden" name="old_ecContractorphoto" value="<?php echo $old_ecContractorphoto;?>" />

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
