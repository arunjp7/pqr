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
      $contact_no               =  $row->contact_no;
      $abbreviation             =  $row->abbreviation;
      $alternate_contact_no     =  $row->alternate_contact_no;
      $company_fax              =  $row->fax;
      $company_website          =  $row->website;
      $company_address          =  $row->company_address; 
      $company_logo             =  $row->company_logo;  
      $old_companylogo          =  $row->company_logo;  
    }
}
else
{
    $company_id                 =  $this->input->post('company_id');
    $company_name               =  $this->input->post('company_name');
    $company_email              =  $this->input->post('company_email');
    $contact_no                 =  $this->input->post('contact_no');
    $alternate_contact_no       =  $this->input->post('alternate_contact_no');
    $company_fax                =  $this->input->post('company_fax');
    $abbreviation               =  $this->input->post('abbreviation');
    $company_website            =  $this->input->post('company_website');
    $company_address            =  $this->input->post('company_address');
    $company_logo               =  $this->input->post('company_logo');
    $old_companylogo            =  $this->input->post('old_companylogo');
}

?>
<div id="main-wrapper">
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-white">
            <div class="panel-heading clearfix">
                <h4 class="panel-title"></h4>
            </div>
            <div class="panel-body">
              <div class="col-md-12">
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
                  <div class="form-group <?PHP if(form_error('abbreviation')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_companydetails_abbreviations');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_companydetails_abbreviations');?>" id="abbreviation" name="abbreviation" value="<?php echo $abbreviation ;?>" autocomplete="off">
                   <?PHP if(form_error('abbreviation')){ echo '<span class="help-block">'.form_error('abbreviation').'</span>';} ?>
                  </div>
                </div> 
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('contact_no')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_companydetails_contact_no');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_companydetails_contact_no');?>" id="contact_no" name="contact_no" value="<?php echo $contact_no ;?>" autocomplete="off">
                   <?PHP if(form_error('contact_no')){ echo '<span class="help-block">'.form_error('contact_no').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_companydetails_alternate_contact_no');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_companydetails_alternate_contact_no');?>" id="alternate_contact_no" name="alternate_contact_no" value="<?php echo $alternate_contact_no ;?>" autocomplete="off">
                  </div>
                </div>
                
              </div>
              <div class="row">
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('company_email')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_companydetails_company_email');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_companydetails_company_email');?>" id="company_email" name="company_email" value="<?php echo $company_email ;?>" autocomplete="off">
                    <?PHP if(form_error('company_email')){ echo '<span class="help-block">'.form_error('company_email').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_companydetails_website');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_companydetails_website');?>" id="company_website" name="company_website" value="<?php echo $company_website ;?>" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_companydetails_fax');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_companydetails_fax');?>" id="company_fax" name="company_fax" value="<?php echo $company_fax ;?>" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('company_address')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_companydetails_table_label_company_address');?><span class="text-danger">*</span></label>
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
                      <input type="file" id="company_logo" name="company_logo" class="company_logo" >
                      </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput"><?php echo lang('mm_Hrm_staffs_attachment');?></a>
                    </div>
                    <?PHP if(form_error('company_logo')){ echo '<span class="help-block">'.form_error('company_logo').'</span>';} ?>
                    <?php if($old_companylogo!=''){ ?> <img src="<?php echo config_item('image_url').$old_companylogo;?>" class="logo_image_display" height="100" width="100"> <?php }?>
                     
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

<script>
  
    // show selected image
      function readURL(input, id) {

          if (input.files && input.files[0]) {

              var reader = new FileReader();
              reader.onload = function (e) {
                $(".logo_image_display") .attr('src', '');
                  $(".logo_image_display").attr('src', e.target.result);
                  // $('#profile-img-tag').attr('src', e.target.result);
              }
              reader.readAsDataURL(input.files[0]);
          }
      }
      $(document).on("change", ".company_logo", function(){

          readURL(this, $(this).attr("id"));
      });

  </script>
