<?php
// Last Updated by  Vinitha 06/08/2016 
$this->mcommon->getCheckUserPermissionHead('NDTContractor add and edit',true);
if(isset($value) && !empty($value)) 
{
    foreach($value->result() as $row)
    {   
      $ndtContractor_id               =  $row->ndtContractor_id;
      $ndtContractor_name             =  $row->ndtContractor_name;
      $ndtContractor_abbr             =  $row->ndtContractor_abbr;       
      $ndtContractor_email            =  $row->ndtContractor_email;       
      $ndtContractor_phone            =  $row->ndtContractor_phone;       
      $ndtContractor_office_no        =  $row->ndtContractor_office_no;       
      $ndtContractor_fax              =  $row->ndtContractor_fax;       
      $ndtContractor_website          =  $row->ndtContractor_website;       
      $ndtContractor_address          =  $row->ndtContractor_address;       
      $ndtContractor_photo            =  $row->ndtContractor_photo;       
      $old_ndtContractorphoto         =  $row->ndtContractor_photo;       
    }
}
else
{
    $ndtContractor_id                 =  $this->input->post('ndtContractor_id');
    $ndtContractor_name               =  $this->input->post('ndtContractor_name');
    $ndtContractor_abbr               =  $this->input->post('ndtContractor_abbr');
    $ndtContractor_email              =  $this->input->post('ndtContractor_email');
    $ndtContractor_phone              =  $this->input->post('ndtContractor_phone');
    $ndtContractor_office_no          =  $this->input->post('ndtContractor_office_no');
    $ndtContractor_fax                =  $this->input->post('ndtContractor_fax');
    $ndtContractor_website            =  $this->input->post('ndtContractor_website');
    $ndtContractor_address            =  $this->input->post('ndtContractor_address');
    $ndtContractor_photo              =  $this->input->post('ndtContractor_photo');
    $old_ndtContractorphoto           =  $this->input->post('old_ndtContractorphoto');
 
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
                  <div class="form-group <?PHP if(form_error('ndtContractor_name')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_NDTContractor_name');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_Hrm_NDTContractor_name');?>" id="ndtContractor_name" name="ndtContractor_name" value="<?php echo $ndtContractor_name ;?>" autocomplete="off">
                   <?PHP if(form_error('ndtContractor_name')){ echo '<span class="help-block">'.form_error('ndtContractor_name').'</span>';} ?>
                  </div>
                </div> 
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('ndtContractor_email')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_NDTContractor_email');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_Hrm_NDTContractor_email');?>" id="ndtContractor_email" name="ndtContractor_email" value="<?php echo $ndtContractor_email ;?>" autocomplete="off">
                    <?PHP if(form_error('ndtContractor_email')){ echo '<span class="help-block">'.form_error('ndtContractor_email').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('ndtContractor_phone')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_NDTContractor_phone');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_Hrm_NDTContractor_phone');?>" id="ndtContractor_phone" name="ndtContractor_phone" value="<?php echo $ndtContractor_phone ;?>" autocomplete="off">
                    <?PHP if(form_error('ndtContractor_phone')){ echo '<span class="help-block">'.form_error('ndtContractor_phone').'</span>';} ?>
                  </div>
                </div>
                
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('ndtContractor_office_no')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_NDTContractor_office_no');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_Hrm_NDTContractor_office_no');?>" id="ndtContractor_office_no" name="ndtContractor_office_no" value="<?php echo $ndtContractor_office_no ;?>" autocomplete="off">
                    <?PHP if(form_error('ndtContractor_office_no')){ echo '<span class="help-block">'.form_error('ndtContractor_office_no').'</span>';} ?>
                  </div>
                </div>
              </div>
              <div class="row">
                
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('ndtContractor_fax')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_NDTContractor_fax');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_Hrm_NDTContractor_fax');?>" id="ndtContractor_fax" name="ndtContractor_fax" value="<?php echo $ndtContractor_fax ;?>" autocomplete="off">
                    <?PHP if(form_error('ndtContractor_fax')){ echo '<span class="help-block">'.form_error('ndtContractor_fax').'</span>';} ?>
                  </div>
                </div>

                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('ndtContractor_website')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_NDTContractor_website');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_Hrm_NDTContractor_website_placeholder');?>" id="ndtContractor_website" name="ndtContractor_website" value="<?php echo $ndtContractor_website ;?>" autocomplete="off">
                    <?PHP if(form_error('ndtContractor_website')){ echo '<span class="help-block">'.form_error('ndtContractor_website').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('ndtContractor_abbr')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_NDTContractor_abbr');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_Hrm_NDTContractor_abbr');?>" id="ndtContractor_abbr" name="ndtContractor_abbr" value="<?php echo $ndtContractor_abbr;?>" autocomplete="off">
                   <?PHP if(form_error('ndtContractor_abbr')){ echo '<span class="help-block">'.form_error('ndtContractor_abbr').'</span>';} ?>
                  </div>
                </div>              
                
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('ndtContractor_address')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_NDTContractor_address');?></label>
                    <textarea class="form-control" placeholder="<?php echo lang('mm_Hrm_NDTContractor_address');?>" id="ndtContractor_address" name="ndtContractor_address" rows="3"><?php echo $ndtContractor_address;?></textarea>
                    <?PHP if(form_error('ndtContractor_address')){ echo '<span class="help-block">'.form_error('ndtContractor_address').'</span>';} ?>
                  </div>
                </div>  
              </div>
              <div class="row">
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('ndtContractor_photo')){ echo 'has-error';} ?>">
                  <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_NDTContractor_logo');?> <?php echo lang('mm_common_logo_size_label');?> </label>
                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                      <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                      <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new"><?php echo lang('mm_common_logo_name_label');?></span> <span class="fileinput-exists"><?php echo lang('mm_common_logo_change_label');?></span>
                      <input type="file" id="ndtContractor_photo" name="ndtContractor_photo" >
                      </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput"><?php echo lang('mm_Hrm_staffs_attachment');?></a>
                    </div>
                    <?PHP if(form_error('ndtContractor_photo')){ echo '<span class="help-block">'.form_error('ndtContractor_photo').'</span>';} ?>
                    <?php if($old_ndtContractorphoto!=''){ ?> <img src="<?php echo config_item('image_url').$old_ndtContractorphoto;?>" height="100" width="100"> <?php }?>
                  </div>
                </div> 
                             
              </div>              
              <div class="text-right">
                <input type="hidden" name="ndtContractor_id" value="<?php echo $ndtContractor_id;?>">
                <input type="hidden" name="old_ndtContractorphoto" value="<?php echo $old_ndtContractorphoto;?>" />

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
