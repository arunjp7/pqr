<?php
// Last Updated by  Vinitha 06/08/2016
$this->mcommon->getCheckUserPermissionHead('CompanyDetails add and edit',true);
 
if(isset($value) && !empty($value))
{
    foreach($value->result() as $row)
    {   
      $company_id               =  $row->company_id;
      $company_name             =  $row->company_name;
      $company_email            =  $row->company_email;       
      $company_phone            =  $row->company_phone;   
      $company_address          =  $row->company_address; 
      $company_logo            =  $row->company_logo;  
      $old_companylogo         =  $row->company_logo;  
    }
}
else
{
    $company_id                 =  $this->input->post('company_id');
    $company_name               =  $this->input->post('company_name');
    $company_email              =  $this->input->post('company_email');
    $company_phone              =  $this->input->post('company_phone');
    $company_address            =  $this->input->post('company_address');
    $company_logo              =  $this->input->post('company_logo');
    $old_companylogo           =  $this->input->post('old_companylogo');
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
                  <div class="form-group <?PHP if(form_error('company_name')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_companydetails_company_name');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_companydetails_company_name');?>" id="company_name" name="company_name" value="<?php echo $company_name ;?>" autocomplete="off">
                   <?PHP if(form_error('company_name')){ echo '<span class="help-block">'.form_error('company_name').'</span>';} ?>
                  </div>
                </div> 
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('company_email')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_companydetails_company_email');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_companydetails_company_email');?>" id="company_email" name="company_email" value="<?php echo $company_email ;?>" autocomplete="off">
                    <?PHP if(form_error('company_email')){ echo '<span class="help-block">'.form_error('company_email').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('company_phone')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_companydetails_table_label_company_phone');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_companydetails_table_label_company_phone');?>" id="company_phone" name="company_phone" value="<?php echo $company_phone ;?>" autocomplete="off">
                    <?PHP if(form_error('company_phone')){ echo '<span class="help-block">'.form_error('company_phone').'</span>';} ?>
                  </div>
                </div>
              </div>
              <div class="row">
                
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('company_address')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_companydetails_table_label_company_address');?></label>
                    <textarea class="form-control" placeholder="<?php echo lang('mm_masters_companydetails_table_label_company_address');?>" id="company_address" name="company_address" rows="3"><?php echo $company_address;?></textarea>
                    <?PHP if(form_error('company_address')){ echo '<span class="help-block">'.form_error('company_address').'</span>';} ?>
                  </div>
                </div>  
              </div>
              <div class="row">
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('company_logo')){ echo 'has-error';} ?>">
                  <label for="exampleInputEmail1"><?php echo lang('mm_operation_company_logo');?> <?php echo lang('mm_common_logo_size_label');?> </label>
                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                      <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                      <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new"><?php echo lang('mm_common_logo_name_label');?></span> <span class="fileinput-exists"><?php echo lang('mm_common_logo_change_label');?></span>
                      <input type="file" id="company_logo" name="company_logo" >
                      </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput"><?php echo lang('mm_Hrm_staffs_attachment');?></a>
                    </div>
                    <?PHP if(form_error('company_logo')){ echo '<span class="help-block">'.form_error('company_logo').'</span>';} ?>
                    <?php if($old_companylogo!=''){ ?> <img src="<?php echo config_item('image_url').$old_companylogo;?>" height="100" width="100"> <?php }?>
                  </div>
                </div> 
                             
              </div>          
              <div class="text-right">
                <input type="hidden" name="company_id" value="<?php echo $company_id;?>">
                <input type="hidden" name="old_companylogo" value="<?php echo $old_companylogo;?>" />
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
