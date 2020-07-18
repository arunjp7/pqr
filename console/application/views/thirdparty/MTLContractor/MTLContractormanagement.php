<?php
// Last Updated by  Vinitha 06/08/2016 
$this->mcommon->getCheckUserPermissionHead('MTLContractor add and edit',true);
if(isset($value) && !empty($value)) 
{
    foreach($value->result() as $row)
    {   
      $mtlContractor_id               =  $row->mtlContractor_id;
      $mtlContractor_name             =  $row->mtlContractor_name;
      $mtlContractor_abbr             =  $row->mtlContractor_abbr;       
      $mtlContractor_email            =  $row->mtlContractor_email;       
      $mtlContractor_phone            =  $row->mtlContractor_phone;       
      $mtlContractor_office_no        =  $row->mtlContractor_office_no;       
      $mtlContractor_fax              =  $row->mtlContractor_fax;       
      $mtlContractor_website          =  $row->mtlContractor_website;       
      $mtlContractor_address          =  $row->mtlContractor_address;       
      $mtlContractor_photo            =  $row->mtlContractor_photo;       
      $old_mtlContractorphoto         =  $row->mtlContractor_photo;       
    }
}
else
{
    $mtlContractor_id                 =  $this->input->post('mtlContractor_id');
    $mtlContractor_name               =  $this->input->post('mtlContractor_name');
    $mtlContractor_abbr               =  $this->input->post('mtlContractor_abbr');
    $mtlContractor_email              =  $this->input->post('mtlContractor_email');
    $mtlContractor_phone              =  $this->input->post('mtlContractor_phone');
    $mtlContractor_office_no          =  $this->input->post('mtlContractor_office_no');
    $mtlContractor_fax                =  $this->input->post('mtlContractor_fax');
    $mtlContractor_website            =  $this->input->post('mtlContractor_website');
    $mtlContractor_address            =  $this->input->post('mtlContractor_address');
    $mtlContractor_photo              =  $this->input->post('mtlContractor_photo');
    $old_mtlContractorphoto           =  $this->input->post('old_mtlContractorphoto');
 
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
                  <div class="form-group <?PHP if(form_error('mtlContractor_name')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_MTLContractor_name');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_Hrm_MTLContractor_name');?>" id="mtlContractor_name" name="mtlContractor_name" value="<?php echo $mtlContractor_name ;?>" autocomplete="off">
                   <?PHP if(form_error('mtlContractor_name')){ echo '<span class="help-block">'.form_error('mtlContractor_name').'</span>';} ?>
                  </div>
                </div> 
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('mtlContractor_email')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_MTLContractor_email');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_Hrm_MTLContractor_email');?>" id="mtlContractor_email" name="mtlContractor_email" value="<?php echo $mtlContractor_email ;?>" autocomplete="off">
                    <?PHP if(form_error('mtlContractor_email')){ echo '<span class="help-block">'.form_error('mtlContractor_email').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('mtlContractor_phone')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_MTLContractor_phone');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_Hrm_MTLContractor_phone');?>" id="mtlContractor_phone" name="mtlContractor_phone" value="<?php echo $mtlContractor_phone ;?>" autocomplete="off">
                    <?PHP if(form_error('mtlContractor_phone')){ echo '<span class="help-block">'.form_error('mtlContractor_phone').'</span>';} ?>
                  </div>
                </div>
                
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('mtlContractor_office_no')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_MTLContractor_office_no');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_Hrm_MTLContractor_office_no');?>" id="mtlContractor_office_no" name="mtlContractor_office_no" value="<?php echo $mtlContractor_office_no ;?>" autocomplete="off">
                    <?PHP if(form_error('mtlContractor_office_no')){ echo '<span class="help-block">'.form_error('mtlContractor_office_no').'</span>';} ?>
                  </div>
                </div>
              </div>
              <div class="row">
                
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('mtlContractor_fax')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_MTLContractor_fax');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_Hrm_MTLContractor_fax');?>" id="mtlContractor_fax" name="mtlContractor_fax" value="<?php echo $mtlContractor_fax ;?>" autocomplete="off">
                    <?PHP if(form_error('mtlContractor_fax')){ echo '<span class="help-block">'.form_error('mtlContractor_fax').'</span>';} ?>
                  </div>
                </div>

                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('mtlContractor_website')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_MTLContractor_website');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_Hrm_MTLContractor_website_placeholder');?>" id="mtlContractor_website" name="mtlContractor_website" value="<?php echo $mtlContractor_website ;?>" autocomplete="off">
                    <?PHP if(form_error('mtlContractor_website')){ echo '<span class="help-block">'.form_error('mtlContractor_website').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('mtlContractor_abbr')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_MTLContractor_abbr');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_Hrm_MTLContractor_abbr');?>" id="mtlContractor_abbr" name="mtlContractor_abbr" value="<?php echo $mtlContractor_abbr;?>" autocomplete="off">
                   <?PHP if(form_error('mtlContractor_abbr')){ echo '<span class="help-block">'.form_error('mtlContractor_abbr').'</span>';} ?>
                  </div>
                </div>              
                
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('mtlContractor_address')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_MTLContractor_address');?></label>
                    <textarea class="form-control" placeholder="<?php echo lang('mm_Hrm_MTLContractor_address');?>" id="mtlContractor_address" name="mtlContractor_address" rows="3"><?php echo $mtlContractor_address;?></textarea>
                    <?PHP if(form_error('mtlContractor_address')){ echo '<span class="help-block">'.form_error('mtlContractor_address').'</span>';} ?>
                  </div>
                </div>  
              </div>
              <div class="row">
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('mtlContractor_photo')){ echo 'has-error';} ?>">
                  <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_MTLContractor_logo');?> <?php echo lang('mm_common_logo_size_label');?> </label>
                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                      <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                      <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new"><?php echo lang('mm_common_logo_name_label');?></span> <span class="fileinput-exists"><?php echo lang('mm_common_logo_change_label');?></span>
                      <input type="file" id="mtlContractor_photo" name="mtlContractor_photo" >
                      </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput"><?php echo lang('mm_Hrm_staffs_attachment');?></a>
                    </div>
                    <?PHP if(form_error('mtlContractor_photo')){ echo '<span class="help-block">'.form_error('mtlContractor_photo').'</span>';} ?>
                    <?php if($old_mtlContractorphoto!=''){ ?> <img src="<?php echo config_item('image_url').$old_mtlContractorphoto;?>" height="100" width="100"> <?php }?>
                  </div>
                </div> 
                             
              </div>              
              <div class="text-right">
                <input type="hidden" name="mtlContractor_id" value="<?php echo $mtlContractor_id;?>">
                <input type="hidden" name="old_mtlContractorphoto" value="<?php echo $old_mtlContractorphoto;?>" />

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
