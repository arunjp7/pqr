<?php
$this->mcommon->getCheckUserPermissionHead('Staffs add and edit',true);

// Last Updated by  Vinitha 06/08/2016 
if(isset($value) && !empty($value))
{
    foreach($value->result() as $row)
    {   
      $staffs_id                    =  $row->staffs_id;
      $user_id                      =  $row->user_id;

      $staffs_employee_id           =  $row->staffs_employee_id;
      $staffs_employee_name         =  $row->staffs_employee_name;       
      $staffs_employee_middle_name  =  $row->staffs_employee_middle_name;       
      $staffs_employee_last_name    =  $row->staffs_employee_last_name;       
      $staffs_gender                =  $row->staffs_gender;   
      $staffs_dob                   =  $row->staffs_dob; 
      $staffs_nationality           =  $row->staffs_nationality;       
      $staffs_photo                 =  $row->staffs_photo;  
      $old_staffsphoto              =  $row->staffs_photo;

      $staffs_phone_number          =  $row->staffs_phone_number;       
      $staffs_home_phone_number     =  $row->staffs_home_phone_number;       
      $staffs_mobile_phone_number   =  $row->staffs_mobile_phone_number;      
      $staffs_email                 =  $row->staffs_email;     
      $staffs_alternative_email     =  $row->staffs_alternative_email;     
      $staffs_address               =  $row->staffs_address;  
      $staffs_home_address          =  $row->staffs_home_address;

      $staffs_doj                   =  $row->staffs_doj;

      $staffs_designation           =  $row->staffs_designation;   

      $staffs_passport_no           =  $row->staffs_passport_no;       
      $staffs_passport_expiry_date  =  $row->staffs_passport_expiry_date;       
      $staffs_passport_attachment   =  $row->staffs_passport_attachment;       
      $old_staffspassportattachment =  $row->staffs_passport_attachment; 

      $staffs_iqama_number          =  $row->staffs_iqama_number;       
      $staffs_iqama_expairye_date   =  $row->staffs_iqama_expairye_date;   
      $staffs_iqama_attachment      =  $row->staffs_iqama_attachment;   
      $old_staffsiqamaattachment    =  $row->staffs_iqama_attachment; 

      $staffs_emplove_cv            =  $row->staffs_emplove_cv;   
      $old_staffsemplovecv          =  $row->staffs_emplove_cv;   

      $staffs_CWI_body              =  $row->staffs_CWI;  
      $staffs_CWI                   =  $row->staffs_CWI_body;  
      $staffs_CWI_no                =  $row->staffs_CWI_no;  
      $staffs_CWI_issued_date       =  $row->staffs_CWI_issued_date; 
      $staffs_CWI_date              =  $row->staffs_CWI_date; 
      $staffs_cwi_attachment        =  $row->staffs_cwi_attachment; 
      $old_staffscwiattachment      =  $row->staffs_cwi_attachment; 

      $staffs_certificate_no        =  $row->staffs_certificate_no;       
      $staffs_expiry_date           =  $row->staffs_expiry_date;       
      $staffs_certificate_issued_by =  $row->staffs_certificate_issued_by;       
      $staffs_certificate_attachment=  $row->staffs_certificate_attachment;       
      $old_staffscertificateattachment =  $row->staffs_certificate_attachment; 

      $staffs_resigned_date         =  $row->staffs_resigned_date;       
      $staffs_resigned_reason       =  $row->staffs_resigned_reason;       
      $staffs_resigned_attachment   =  $row->staffs_resigned_attachment;       
      $old_staffsresignedattachment =  $row->staffs_resigned_attachment;   

      //$staffs_department            =  explode(',', $row->staffs_department);       
       
      $staffs_show_status           =  $row->staffs_show_status;  
        

        

      //staffs_certificate_no,staffs_expiry_date,staffs_attachment,old_staffsattachment

    }
    foreach ($user as $key => $value) {
      $email                        =  $user->email;
    }

    foreach($userGroupsModule->result() as $row) {
      $user_id                   =  $row->user_id;
      $user_dorights[$row->group_id]   =  $row->group_id;
    }
}
else
{
    $staffs_id                      =  $this->input->post('staffs_id');
    $user_id                        =  $this->input->post('user_id');

    $staffs_employee_id             =  $this->input->post('staffs_employee_id');
    $staffs_employee_name           =  $this->input->post('staffs_employee_name');    
    $staffs_employee_middle_name    =  $this->input->post('staffs_employee_middle_name');
    $staffs_employee_last_name      =  $this->input->post('staffs_employee_last_name');
    $staffs_gender                  =  $this->input->post('staffs_gender');
    $staffs_dob                     =  $this->input->post('staffs_dob');
    $staffs_nationality             =  $this->input->post('staffs_nationality');
    $staffs_photo                   =  $this->input->post('staffs_photo');
    $old_staffsphoto                =  $this->input->post('old_staffsphoto');

    $staffs_phone_number            =  $this->input->post('staffs_phone_number');
    $staffs_home_phone_number       =  $this->input->post('staffs_home_phone_number');
    $staffs_mobile_phone_number     =  $this->input->post('staffs_mobile_phone_number');
    $staffs_email                   =  $this->input->post('staffs_email');
    $staffs_alternative_email       =  $this->input->post('staffs_alternative_email');
    $staffs_address                 =  $this->input->post('staffs_address');
    $staffs_home_address            =  $this->input->post('staffs_home_address');

    $staffs_doj                     =  $this->input->post('staffs_doj');

    $staffs_designation             =  $this->input->post('staffs_designation');

    $staffs_passport_no             =  $this->input->post('staffs_passport_no');
    $staffs_passport_expiry_date    =  $this->input->post('staffs_passport_expiry_date');
    $staffs_passport_attachment     =  $this->input->post('staffs_passport_attachment');
    $old_staffspassportattachment   =  $this->input->post('old_staffspassportattachment');

    $staffs_iqama_number            =  $this->input->post('staffs_iqama_number');
    $staffs_iqama_expairye_date     =  $this->input->post('staffs_iqama_expairye_date');
    $staffs_iqama_attachment        =  $this->input->post('staffs_iqama_attachment');
    $old_staffsiqamaattachment      =  $this->input->post('old_staffsiqamaattachment');

    $staffs_emplove_cv              =  $this->input->post('staffs_emplove_cv');
    $old_staffsemplovecv            =  $this->input->post('old_staffsemplovecv');

    $staffs_CWI_body                =  $this->input->post('staffs_CWI_body');
    $staffs_CWI                     =  $this->input->post('staffs_CWI');
    $staffs_CWI_no                  =  $this->input->post('staffs_CWI_no');
    $staffs_CWI_issued_date         =  $this->input->post('staffs_CWI_issued_date');
    $staffs_CWI_date                =  $this->input->post('staffs_CWI_date');
    $staffs_cwi_attachment          =  $this->input->post('staffs_cwi_attachment');
    $old_staffscwiattachment        =  $this->input->post('old_staffscwiattachment');

    $staffs_certificate_no          =  $this->input->post('staffs_certificate_no');
    $staffs_expiry_date             =  $this->input->post('staffs_expiry_date');
    $staffs_certificate_issued_by   =  $this->input->post('staffs_certificate_issued_by');
    $staffs_certificate_attachment  =  $this->input->post('staffs_certificate_attachment');
    $old_staffscertificateattachment=  $this->input->post('old_staffscertificateattachment');

    $staffs_resigned_date           =  $this->input->post('staffs_resigned_date');
    $staffs_resigned_reason         =  $this->input->post('staffs_resigned_reason');
    $staffs_resigned_attachment     =  $this->input->post('staffs_resigned_attachment');
    $old_staffsresignedattachment   =  $this->input->post('old_staffsresignedattachment');

    $email                          =  $this->input->post('email');
    $password                       =  $this->input->post('password');
    $staffs_show_status             =  $this->input->post('staffs_show_status');

    /*$staffs_department              =  $this->input->post('staffs_department');
    $groups                         =  $this->input->post('groups');*/

    $user_dorights                  =  $this->input->post('user_doright');
}
    $emailValDrop = '';
    $emailAlterValDrop = '';
    $dropDownDisapleVal = '';

    if($user_id != ''){
      $dropDownDisapleVal = 'disabled';
    }

    if($staffs_email == $email || $staffs_alternative_email == $email){

    if($staffs_email == $email){ $emailValDrop="Selected";}
    if($staffs_alternative_email == $email){ $emailAlterValDrop="Selected";}



      if($staffs_email != '' && $staffs_alternative_email == ''){
        $htmlValue = '<select name="email" class="form-control select2 select22" id="email" '.$dropDownDisapleVal.'><option value="">--- Select ---</option><option value="'.$staffs_email.'" '.$emailValDrop.'>'.$staffs_email.'</option></select>';
      } else if($staffs_email == '' && $staffs_alternative_email != ''){
        $htmlValue = '<select name="email" class="form-control select2 select22" id="email"  '.$dropDownDisapleVal.'><option value="">--- Select ---</option><option value="'.$staffs_alternative_email.'" '.$staffs_alternative_email.'>'.$staffs_alternative_email.'</option></select>';
      } else if($staffs_email != '' && $staffs_alternative_email != ''){
        $htmlValue = '<select name="email" class="form-control select2 select22" id="email"  '.$dropDownDisapleVal.'><option value="">--- Select ---</option><option value="'.$staffs_email.'" '.$emailValDrop.'>'.$staffs_email.'</option><option value="'.$staffs_alternative_email.'"  '.$staffs_alternative_email.'>'.$staffs_alternative_email.'</option></select>';
      } else {
        $htmlValue = '<input type="text" class="form-control" placeholder="'.lang('create_user_email_label').'" id="email" name="email" value="'.$email.'" autocomplete="off" readonly>';
      }
    }else{
      $htmlValue = '<input type="text" class="form-control" placeholder="'.lang('create_user_email_label').'" id="email" name="email" value="'.$email.'" autocomplete="off" readonly>';
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

              <div class="clearfix"></div>
              <div class="row box-title-head">
                <h3 class="box-title"><?php echo lang('mm_Hrm_staffs_employee_details_label');?></h3>
              </div>
              <div class="row">
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('staffs_employee_id')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_staffs_employee_id');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_Hrm_staffs_employee_id');?>" id="staffs_employee_id" name="staffs_employee_id" value="<?php echo $staffs_employee_id ;?>" autocomplete="off">
                    <?PHP if(form_error('staffs_employee_id')){ echo '<span class="help-block">'.form_error('staffs_employee_id').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('staffs_employee_name')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_staffs_employee_name');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_Hrm_staffs_employee_name');?>" id="staffs_employee_name" name="staffs_employee_name" value="<?php echo $staffs_employee_name ;?>" autocomplete="off">
                   <?PHP if(form_error('staffs_employee_name')){ echo '<span class="help-block">'.form_error('staffs_employee_name').'</span>';} ?>
                  </div>
                </div>

                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('staffs_employee_middle_name')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_staffs_employee_middle_name');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_Hrm_staffs_employee_middle_name');?>" id="staffs_employee_middle_name" name="staffs_employee_middle_name" value="<?php echo $staffs_employee_middle_name ;?>" autocomplete="off">
                   <?PHP if(form_error('staffs_employee_middle_name')){ echo '<span class="help-block">'.form_error('staffs_employee_middle_name').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('staffs_employee_last_name')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_staffs_employee_last_name');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_Hrm_staffs_employee_last_name');?>" id="staffs_employee_last_name" name="staffs_employee_last_name" value="<?php echo $staffs_employee_last_name ;?>" autocomplete="off">
                   <?PHP if(form_error('staffs_employee_last_name')){ echo '<span class="help-block">'.form_error('staffs_employee_last_name').'</span>';} ?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('staffs_gender')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_staffs_gender');?><span class="text-danger">*</span></label>
                    <div class="row">
                      <div class="col-sm-6 col-xs-6">
                        <div class="radio radio-success">
                          <input type="radio" name="staffs_gender" id="staffs_gender" value="Male" <?php if($staffs_id !='') {if($staffs_gender=='Male'){?> checked <?php }}else{?> checked <?php }?>>
                          <label for="staffs_genderMale"> <?php echo lang('helper_common_male_label');?> </label>
                        </div>
                      </div>
                      <div class="col-sm-6 col-xs-6">
                        <div class="radio radio-danger">
                          <input type="radio" name="staffs_gender" id="staffs_gender" value="Female" <?php  if($staffs_gender =='Female'){?> checked <?php }?>>
                          <label for="staffs_genderFeMale"> <?php echo lang('helper_common_female_label');?> </label>
                        </div>
                      </div>
                    </div>
                    <?PHP if(form_error('staffs_gender')){ echo '<span class="help-block">'.form_error('staffs_gender').'</span>';} ?>
                  </div>
                </div>
              
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('staffs_dob')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_staffs_DOB');?></label>
                    <div class="input-group">
                      <input type="text" class="form-control datepicker-autoclose"  name="staffs_dob"  placeholder="<?php echo lang('mm_Hrm_staffs_DOB');?>" value="<?php echo ($staffs_dob!='' && $staffs_dob!='0000-00-00') ? date('m/d/Y',strtotime($staffs_dob)) : '';?>"> 
                      <span class="input-group-addon"><i class="icon-calender"></i></span> 
                    </div>
                    <?PHP if(form_error('staffs_dob')){ echo '<span class="help-block">'.form_error('staffs_dob').'</span>';} ?>
                  </div>
                </div> 

                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('staffs_nationality')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_staffs_nationality');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_Hrm_staffs_nationality');?>" id="staffs_nationality" name="staffs_nationality" value="<?php echo $staffs_nationality ;?>" autocomplete="off">
                    <?PHP if(form_error('staffs_nationality')){ echo '<span class="help-block">'.form_error('staffs_nationality').'</span>';} ?>
                  </div>
                </div>

                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('staffs_photo')){ echo 'has-error';} ?>">
                  <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_staffs_photo');?> <?php echo lang('mm_common_logo_size_label');?> </label>
                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                      <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                      <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new"><?php echo lang('mm_common_logo_name_label');?></span> <span class="fileinput-exists"><?php echo lang('mm_common_logo_change_label');?></span>
                      <input type="file" id="staffs_photo" name="staffs_photo" >
                      </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput"><?php echo lang('mm_Hrm_staffs_attachment');?></a>
                    </div>
                    <?PHP if(form_error('staffs_photo')){ echo '<span class="help-block">'.form_error('staffs_photo').'</span>';} ?>
                    <?php if($old_staffsphoto!=''){ ?> <img src="<?php echo config_item('image_url').$old_staffsphoto;?>" height="100" width="100"> <?php }?>
                  </div>
                </div>
              </div>

              <div class="clearfix"></div>
              <hr />
              <div class="row box-title-head">
                <h3 class="box-title"><?php echo lang('mm_Hrm_staffs_contact_details_label');?></h3>
              </div>

              <div class="row">
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('staffs_phone_number')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_staffs_phone_number');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_Hrm_staffs_phone_number');?>" id="staffs_phone_number" name="staffs_phone_number" value="<?php echo $staffs_phone_number;?>" autocomplete="off">
                   <?PHP if(form_error('staffs_phone_number')){ echo '<span class="help-block">'.form_error('staffs_phone_number').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('staffs_home_phone_number')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_staffs_home_phone_number');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_Hrm_staffs_home_phone_number');?>" id="staffs_home_phone_number" name="staffs_home_phone_number" value="<?php echo $staffs_home_phone_number;?>" autocomplete="off">
                   <?PHP if(form_error('staffs_home_phone_number')){ echo '<span class="help-block">'.form_error('staffs_home_phone_number').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('staffs_mobile_phone_number')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_staffs_mobile_number');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_Hrm_staffs_mobile_number');?>" id="staffs_mobile_phone_number" name="staffs_mobile_phone_number" value="<?php echo $staffs_mobile_phone_number;?>" autocomplete="off">
                   <?PHP if(form_error('staffs_mobile_phone_number')){ echo '<span class="help-block">'.form_error('staffs_mobile_phone_number').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('staffs_email')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_staffs_email');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_Hrm_staffs_email');?>" id="staffs_email" name="staffs_email" value="<?php echo $staffs_email ;?>" autocomplete="off">
                   <?PHP if(form_error('staffs_email')){ echo '<span class="help-block">'.form_error('staffs_email').'</span>';} ?>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('staffs_alternative_email')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_staffs_alternative_email');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_Hrm_staffs_alternative_email');?>" id="staffs_alternative_email" name="staffs_alternative_email" value="<?php echo $staffs_alternative_email ;?>" autocomplete="off">
                   <?PHP if(form_error('staffs_alternative_email')){ echo '<span class="help-block">'.form_error('staffs_alternative_email').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('staffs_address')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_staffs_address');?></label>
                    <textarea class="form-control" placeholder="<?php echo lang('mm_Hrm_staffs_address');?>" id="staffs_address" name="staffs_address" rows="3"><?php echo $staffs_address;?></textarea>
                    <?PHP if(form_error('staffs_address')){ echo '<span class="help-block">'.form_error('staffs_address').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('staffs_home_address')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_staffs_home_address');?></label>
                    <textarea class="form-control" placeholder="<?php echo lang('mm_Hrm_staffs_home_address');?>" id="staffs_home_address" name="staffs_home_address" rows="3"><?php echo $staffs_home_address;?></textarea>
                    <?PHP if(form_error('staffs_home_address')){ echo '<span class="help-block">'.form_error('staffs_home_address').'</span>';} ?>
                  </div>
                </div> 
              </div>

              <div class="clearfix"></div>
              <hr />
              <div class="row box-title-head">
                <h3 class="box-title"><?php echo lang('mm_Hrm_staffs_joining_details_label');?></h3>
              </div>
              <div class="row">
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('staffs_doj')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_staffs_DOJ');?></label>
                    <div class="input-group">
                      <input type="text" class="form-control datepicker-autoclose"  name="staffs_doj"  placeholder="<?php echo lang('mm_Hrm_staffs_DOJ');?>" value="<?php echo ($staffs_doj!='' && $staffs_doj!='0000-00-00') ? date('m/d/Y',strtotime($staffs_doj)) : '';?>"> 
                      <span class="input-group-addon"><i class="icon-calender"></i></span> 
                    </div>
                    <?PHP if(form_error('staffs_doj')){ echo '<span class="help-block">'.form_error('staffs_doj').'</span>';} ?>
                  </div>
                </div>
              </div>


              <div class="clearfix"></div>
              <hr />
              <div class="row box-title-head">
                <h3 class="box-title"><?php echo lang('mm_Hrm_staffs_designation');?></h3>
              </div>

              <div class="row">
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('staffs_designation')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_staffs_designation');?><span class="text-danger">*</span> <a href="javascript:void(0)" title="<?php echo lang('mm_masters_staffs_add_Modal_label');?>" data-toggle="modal" data-target=".bs-example-modal-lg" data-backdrop="static" data-keyboard="false" onclick="addDesignationDataModal()"><?php echo lang('mm_masters_staffs_add_Modal_label');?></a></label>
                      <?php   
                      $attrib = 'class="form-control select2" name="staffs_designation"  data-live-search="true" data-width="100%"  id="staffs_designation"';
                      echo form_dropdown('staffs_designation', $drop_menu_designation, set_value('staffs_designation', (isset($staffs_designation)) ? $staffs_designation : ''), $attrib);
                      ?> 
                      <?PHP if(form_error('staffs_designation')){ echo '<span class="help-block">'.form_error('staffs_designation').'</span>';} ?>           
                  </div>
                </div>  
              </div>

              <div class="clearfix"></div>
              <hr />
              <div class="row box-title-head">
                <h3 class="box-title"><?php echo lang('mm_Hrm_staffs_passport_details_label');?></h3>
              </div>
              <div class="row">
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('staffs_passport_no')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_staffs_passport_no');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_Hrm_staffs_passport_no');?>" id="staffs_passport_no" name="staffs_passport_no" value="<?php echo $staffs_passport_no;?>" autocomplete="off">
                   <?PHP if(form_error('staffs_passport_no')){ echo '<span class="help-block">'.form_error('staffs_passport_no').'</span>';} ?>
                  </div>
                </div>  
              
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('staffs_passport_expiry_date')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_staffs_passport_expiry_date');?></label>
                    <div class="input-group">
                      <input type="text" class="form-control datepicker-autoclose"  name="staffs_passport_expiry_date"  placeholder="<?php echo lang('mm_Hrm_staffs_passport_expiry_date');?>" value="<?php echo ($staffs_passport_expiry_date!='' && $staffs_passport_expiry_date!='0000-00-00') ? date('m/d/Y',strtotime($staffs_passport_expiry_date)) : '';?>"> 
                      <span class="input-group-addon"><i class="icon-calender"></i></span> 
                    </div>
                    <?PHP if(form_error('staffs_passport_expiry_date')){ echo '<span class="help-block">'.form_error('staffs_passport_expiry_date').'</span>';} ?>
                  </div>
                </div>

                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('staffs_passport_attachment')){ echo 'has-error';} ?>">
                  <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_staffs_attachment');?> <?php echo lang('mm_common_logo_size_label');?> </label>
                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                      <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                      <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new"><?php echo lang('mm_common_logo_name_label');?></span> <span class="fileinput-exists"><?php echo lang('mm_common_logo_change_label');?></span>
                      <input type="file" id="staffs_passport_attachment" name="staffs_passport_attachment" >
                      </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput"><?php echo lang('mm_Hrm_staffs_attachment');?></a>
                    </div>
                    <?PHP if(form_error('staffs_passport_attachment')){ echo '<span class="help-block">'.form_error('staffs_passport_attachment').'</span>';} ?>
                    <?php if($old_staffspassportattachment!=''){ ?> <a href="<?php echo config_item('image_url').$old_staffspassportattachment;?>" target="_blank">View <?php echo lang('mm_Hrm_staffs_attachment');?></a><?php }?>
                  </div>
                </div>

              </div>

              <div class="clearfix"></div>
              <hr />
              <div class="row box-title-head">
                <h3 class="box-title"><?php echo lang('mm_Hrm_staffs_iqama_details_label');?></h3>
              </div>
              <div class="row">
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('staffs_iqama_number')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_staffs_iqama_number');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_Hrm_staffs_iqama_number');?>" id="staffs_iqama_number" name="staffs_iqama_number" value="<?php echo $staffs_iqama_number;?>" autocomplete="off">
                   <?PHP if(form_error('staffs_iqama_number')){ echo '<span class="help-block">'.form_error('staffs_iqama_number').'</span>';} ?>
                  </div>
                </div>
              
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('staffs_iqama_expairye_date')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_staffs_iqama_expairye_date');?></label>
                    <div class="input-group">
                      <input type="text" class="form-control datepicker-autoclose"  name="staffs_iqama_expairye_date"  placeholder="<?php echo lang('mm_Hrm_staffs_iqama_expairye_date');?>" value="<?php echo ($staffs_iqama_expairye_date!='' && $staffs_iqama_expairye_date!='0000-00-00') ? date('m/d/Y',strtotime($staffs_iqama_expairye_date)) : '';?>"> 
                      <span class="input-group-addon"><i class="icon-calender"></i></span> 
                    </div>
                    <?PHP if(form_error('staffs_iqama_expairye_date')){ echo '<span class="help-block">'.form_error('staffs_iqama_expairye_date').'</span>';} ?>
                  </div>
                </div>


                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('staffs_iqama_attachment')){ echo 'has-error';} ?>">
                  <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_staffs_attachment');?> <?php echo lang('mm_common_logo_size_label');?> </label>
                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                      <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                      <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new"><?php echo lang('mm_common_logo_name_label');?></span> <span class="fileinput-exists"><?php echo lang('mm_common_logo_change_label');?></span>
                      <input type="file" id="staffs_iqama_attachment" name="staffs_iqama_attachment" >
                      </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput"><?php echo lang('mm_Hrm_staffs_attachment');?></a>
                    </div>
                    <?PHP if(form_error('staffs_iqama_attachment')){ echo '<span class="help-block">'.form_error('staffs_iqama_attachment').'</span>';} ?>
                    <?php if($old_staffsiqamaattachment!=''){ ?> <a href="<?php echo config_item('image_url').$old_staffsiqamaattachment;?>" target="_blank">View <?php echo lang('mm_Hrm_staffs_attachment');?></a> <?php }?>
                  </div>
                </div>
              </div>


              <div class="clearfix"></div>
              <hr />
              <div class="row box-title-head">
                <h3 class="box-title"><?php echo lang('mm_Hrm_staffs_employee_cv_label');?></h3>
              </div>
              <div class="row">
             
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('staffs_emplove_cv')){ echo 'has-error';} ?>">
                  <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_staffs_attachment');?> <?php echo lang('mm_common_logo_size_label');?> </label>
                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                      <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                      <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new"><?php echo lang('mm_common_logo_name_label');?></span> <span class="fileinput-exists"><?php echo lang('mm_common_logo_change_label');?></span>
                      <input type="file" id="staffs_emplove_cv" name="staffs_emplove_cv" >
                      </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput"><?php echo lang('mm_Hrm_staffs_attachment');?></a>
                    </div>
                    <?PHP if(form_error('staffs_emplove_cv')){ echo '<span class="help-block">'.form_error('staffs_emplove_cv').'</span>';} ?>
                    <?php if($old_staffsemplovecv!=''){ ?> <a href="<?php echo config_item('image_url').$old_staffsemplovecv;?>" target="_blank">View <?php echo lang('mm_Hrm_staffs_attachment');?></a><?php }?>
                  </div>
                </div>
              </div>

              <div class="clearfix"></div>
              <hr />
              <div class="row box-title-head">
                <h3 class="box-title"><?php echo lang('mm_Hrm_staffs_international_certificates_label');?></h3>
              </div>

              <div class="row">
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('staffs_CWI')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_staffs_CWI_body');?></label>
                      <?php   
                      $attrib = 'class="form-control select2" name="staffs_CWI"  data-live-search="true" data-width="100%"  id="staffs_CWI" onchange="load_certification_bodyBased(this.value)"';
                      echo form_dropdown('staffs_CWI', $drop_menu_CWI, set_value('staffs_CWI', (isset($staffs_CWI)) ? $staffs_CWI : ''), $attrib);
                      ?> 
                      <?PHP if(form_error('staffs_CWI')){ echo '<span class="help-block">'.form_error('staffs_CWI').'</span>';} ?>           
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('staffs_CWI_body')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_staffs_CWI');?></label>
                      <?php   
                      $attrib = 'class="form-control select2" name="staffs_CWI_body"  data-live-search="true" data-width="100%"  id="staffs_CWI_body"';
                      echo form_dropdown('staffs_CWI_body', $drop_down_certification, set_value('staffs_CWI_body', (isset($staffs_CWI_body)) ? $staffs_CWI_body : ''), $attrib);
                      ?> 
                      <?PHP if(form_error('staffs_CWI_body')){ echo '<span class="help-block">'.form_error('staffs_CWI_body').'</span>';} ?>           
                  </div>
                </div>

                                

                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('staffs_CWI_no')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_staffs_CWI_no');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_Hrm_staffs_CWI_no');?>" id="staffs_CWI_no" name="staffs_CWI_no" value="<?php echo $staffs_CWI_no;?>" autocomplete="off">
                   <?PHP if(form_error('staffs_CWI_no')){ echo '<span class="help-block">'.form_error('staffs_CWI_no').'</span>';} ?>
                  </div>
                </div>

                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('staffs_CWI_issued_date')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_staffs_CWI_issued_date');?></label>
                    <div class="input-group">
                      <input type="text" class="form-control datepicker-autoclose"  name="staffs_CWI_issued_date"  placeholder="<?php echo lang('mm_Hrm_staffs_CWI_issued_date');?>" value="<?php echo ($staffs_CWI_issued_date!='' && $staffs_CWI_issued_date!='0000-00-00') ? date('m/d/Y',strtotime($staffs_CWI_issued_date)) : '';?>"> 
                      <span class="input-group-addon"><i class="icon-calender"></i></span> 
                    </div>
                    <?PHP if(form_error('staffs_CWI_issued_date')){ echo '<span class="help-block">'.form_error('staffs_CWI_issued_date').'</span>';} ?>
                  </div>
                </div>            
              </div>


              <div class="row">

                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('staffs_CWI_date')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_staffs_CWI_date');?></label>
                    <div class="input-group">
                      <input type="text" class="form-control datepicker-autoclose"  name="staffs_CWI_date"  placeholder="<?php echo lang('mm_Hrm_staffs_CWI_date');?>" value="<?php echo ($staffs_CWI_date!='' && $staffs_CWI_date!='0000-00-00') ? date('m/d/Y',strtotime($staffs_CWI_date)) : '';?>"> 
                      <span class="input-group-addon"><i class="icon-calender"></i></span> 
                    </div>
                    <?PHP if(form_error('staffs_CWI_date')){ echo '<span class="help-block">'.form_error('staffs_CWI_date').'</span>';} ?>
                  </div>
                </div>

                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('staffs_cwi_attachment')){ echo 'has-error';} ?>">
                  <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_staffs_attachment');?> <?php echo lang('mm_common_logo_size_label');?> </label>
                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                      <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                      <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new"><?php echo lang('mm_common_logo_name_label');?></span> <span class="fileinput-exists"><?php echo lang('mm_common_logo_change_label');?></span>
                      <input type="file" id="staffs_cwi_attachment" name="staffs_cwi_attachment" >
                      </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput"><?php echo lang('mm_Hrm_staffs_attachment');?></a>
                    </div>
                    <?PHP if(form_error('staffs_cwi_attachment')){ echo '<span class="help-block">'.form_error('staffs_cwi_attachment').'</span>';} ?>
                    <?php if($old_staffscwiattachment!=''){ ?> <a href="<?php echo config_item('image_url').$old_staffscwiattachment;?>" target="_blank">View <?php echo lang('mm_Hrm_staffs_attachment');?></a> <?php }?>
                  </div>
                </div>

              <!--
                <div class="col-sm-3 col-xs-3" id="catParent">
                  <div class="form-group <?PHP if(form_error('staffs_department[]')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_staffs_department');?><span class="text-danger">*</span></label>
                    <select id="staffs_department" name="staffs_department[]" class="form-control select2 <?php if(form_error('staffs_department[]')){ echo 'parsley-error';} ?>" multiple data-live-search="true" data-width="100%">
                    <?php 
                      foreach ($drop_menu_department as $key => $value)
                      {
                        ?>
                        <option value="<?php echo $key;?>" <?php if(in_array($key, $staffs_department)) { ?> selected <?php }?>><?php echo $value;?></option>
                        <?php
                      }
                      ?>
                    </select>
                    <?PHP if(form_error('staffs_department[]')){ echo '<span class="help-block">'.form_error('staffs_department[]').'</span>';} ?>
                  </div>
                </div>
              -->
              </div>

              <div class="clearfix"></div>
              <hr />
              <div class="row box-title-head">
                <h3 class="box-title"><?php echo lang('mm_Hrm_staffs_vision_label');?></h3>
              </div>
              <div class="row">
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('staffs_certificate_no')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_staffs_certificate_no');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_Hrm_staffs_certificate_no');?>" id="staffs_certificate_no" name="staffs_certificate_no" value="<?php echo $staffs_certificate_no ;?>" autocomplete="off">
                    <?PHP if(form_error('staffs_certificate_no')){ echo '<span class="help-block">'.form_error('staffs_certificate_no').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('staffs_expiry_date')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_staffs_expiry_date');?></label>
                    <div class="input-group">
                      <input type="text" class="form-control datepicker-autoclose"  name="staffs_expiry_date"  placeholder="<?php echo lang('mm_Hrm_staffs_expiry_date');?>" value="<?php echo ($staffs_expiry_date!='' && $staffs_expiry_date!='0000-00-00') ? date('m/d/Y',strtotime($staffs_expiry_date)) : '';?>"> 
                      <span class="input-group-addon"><i class="icon-calender"></i></span> 
                    </div>
                    <?PHP if(form_error('staffs_expiry_date')){ echo '<span class="help-block">'.form_error('staffs_expiry_date').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('staffs_certificate_issued_by')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_staffs_certificate_issued_by');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_Hrm_staffs_certificate_issued_by');?>" id="staffs_certificate_issued_by" name="staffs_certificate_issued_by" value="<?php echo $staffs_certificate_issued_by ;?>" autocomplete="off">
                    <?PHP if(form_error('staffs_certificate_issued_by')){ echo '<span class="help-block">'.form_error('staffs_certificate_issued_by').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('staffs_certificate_attachment')){ echo 'has-error';} ?>">
                  <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_staffs_attachment');?> <?php echo lang('mm_common_logo_size_label');?> </label>
                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                      <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                      <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new"><?php echo lang('mm_common_logo_name_label');?></span> <span class="fileinput-exists"><?php echo lang('mm_common_logo_change_label');?></span>
                      <input type="file" id="staffs_certificate_attachment" name="staffs_certificate_attachment" >
                      </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput"><?php echo lang('mm_Hrm_staffs_attachment');?></a>
                    </div>
                    <?PHP if(form_error('staffs_certificate_attachment')){ echo '<span class="help-block">'.form_error('staffs_certificate_attachment').'</span>';} ?>
                    <?php if($old_staffscertificateattachment!=''){ ?> <a href="<?php echo config_item('image_url').$old_staffscertificateattachment;?>" target="_blank">View <?php echo lang('mm_Hrm_staffs_attachment');?></a> <?php }?>
                  </div>
                </div>
              </div>

              <div class="clearfix"></div>
              <hr />
              <div class="row box-title-head">
                <h3 class="box-title"><?php echo lang('mm_Hrm_staffs_emolyee_resignation_details_label');?></h3>
              </div>

              <div class="row">
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('staffs_resigned_date')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_staffs_resigned_date');?></label>
                    <div class="input-group">
                      <input type="text" class="form-control datepicker-autoclose"  name="staffs_resigned_date"  placeholder="<?php echo lang('mm_Hrm_staffs_resigned_date');?>" value="<?php echo ($staffs_resigned_date!='' && $staffs_resigned_date!='0000-00-00') ? date('m/d/Y',strtotime($staffs_resigned_date)) : '';?>"> 
                      <span class="input-group-addon"><i class="icon-calender"></i></span> 
                    </div>
                    <?PHP if(form_error('staffs_resigned_date')){ echo '<span class="help-block">'.form_error('staffs_resigned_date').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('staffs_resigned_reason')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_staffs_resigned_reason');?></label>
                    <textarea class="form-control" placeholder="<?php echo lang('mm_Hrm_staffs_resigned_reason');?>" id="staffs_resigned_reason" name="staffs_resigned_reason" rows="3"><?php echo $staffs_resigned_reason;?></textarea>
                    <?PHP if(form_error('staffs_resigned_reason')){ echo '<span class="help-block">'.form_error('staffs_resigned_reason').'</span>';} ?>
                  </div>
                </div> 
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('staffs_resigned_attachment')){ echo 'has-error';} ?>">
                  <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_staffs_attachment');?> <?php echo lang('mm_common_logo_size_label');?> </label>
                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                      <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                      <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new"><?php echo lang('mm_common_logo_name_label');?></span> <span class="fileinput-exists"><?php echo lang('mm_common_logo_change_label');?></span>
                      <input type="file" id="staffs_resigned_attachment" name="staffs_resigned_attachment" >
                      </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput"><?php echo lang('mm_Hrm_staffs_attachment');?></a>
                    </div>
                    <?PHP if(form_error('staffs_resigned_attachment')){ echo '<span class="help-block">'.form_error('staffs_resigned_attachment').'</span>';} ?>
                    <?php if($old_staffsresignedattachment!=''){ ?> <a href="<?php echo config_item('image_url').$old_staffsresignedattachment;?>" target="_blank">View <?php echo lang('mm_Hrm_staffs_attachment');?></a> <?php }?>
                  </div>
                </div>
              </div> 

              <div class="clearfix"></div>
              <hr />
              <div class="row box-title-head">
                <h3 class="box-title"><?php echo lang('mm_Hrm_staffs_login_details_label');?></h3>
              </div>
              <div class="row">
                <!--<div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('email')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('create_user_email_label');?><?php if($user_id == '') {?><span class="text-danger">*</span><?php }?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('create_user_email_label');?>" id="email" name="email" value="<?php echo $email ;?>" autocomplete="off" readonly>
                    <?PHP if(form_error('email')){ echo '<span class="help-block">'.form_error('email').'</span>';} ?>
                  </div>
                </div>
                -->

                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('email')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('create_user_email_label');?><?php if($user_id == '') {?><span class="text-danger">*</span><?php }?></label>
                    <span id="emailspan">
                      <?php echo $htmlValue;?>
                    </span>
                    <?PHP if(form_error('email')){ echo '<span class="help-block">'.form_error('email').'</span>';} ?>
                  </div>
                </div>

                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('password')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('create_user_password_label');?><?php if($user_id == '') {?><span class="text-danger">*</span><?php }?></label>
                    <div class="input-group" id="show_hide_password">
                      <input type="password" class="form-control" placeholder="<?php echo lang('create_user_password_label');?>" id="password" name="password" value="<?php echo $password ;?>" autocomplete="off">

                    <div class="input-group-addon">
                      <a href="javascript:void(0);" id="eyehidden"><i class="fa fa-eye" aria-hidden="true"></i></a>
                    </div>
                  </div>

                   <?PHP if(form_error('password')){ echo '<span class="help-block">'.form_error('password').'</span>';} ?>
                  </div>
                </div>

                <!--<div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('groups')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('create_user_validation_groups_label');?><?php if($user_id == '') {?><span class="text-danger">*</span><?php }?>  <a href="javascript:void(0)" title="<?php echo lang('mm_masters_staffs_add_department_Modal_label');?>" data-toggle="modal" data-target=".bs-example-modal-lg" data-backdrop="static" data-keyboard="false" onclick="addDepartmentDataModal()"><?php echo lang('mm_masters_staffs_add_department_Modal_label');?></a> </label>
                    <select id="groups" name="groups" <?php if($user_id != '') { echo 'disabled="true"';}?>class="form-control select2 <?php if(form_error('groups')){ echo 'parsley-error';} ?>" data-live-search="true" data-width="100%">
                    <?php 
                      foreach ($user_groups as $key => $value)
                      {
                        if($value['id'] != '1'){
                          ?>
                          <option value="<?php echo $value['id'];?>" <?php if($value['id'] == $groups) { ?> selected <?php }?>><?php echo $value['description'];?></option>
                          <?php
                        }
                      }
                      ?>
                    </select>
                    <?PHP if(form_error('groups')){ echo '<span class="help-block">'.form_error('groups').'</span>';} ?>
                  </div>
                </div>-->

                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('staffs_show_status')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_staffs_status');?><span class="text-danger">*</span></label>
                      <?php   
                      $attrib = 'class="form-control select2" name="staffs_show_status"  data-live-search="true" data-width="100%"  id="staffs_show_status"';
                      echo form_dropdown('staffs_show_status', $drop_menu_Staff, set_value('staffs_show_status', (isset($staffs_show_status)) ? $staffs_show_status : ''), $attrib);
                      ?> 
                      <?PHP if(form_error('staffs_show_status')){ echo '<span class="help-block">'.form_error('staffs_show_status').'</span>';} ?>           
                  </div>
                </div>

              </div>

              <div class="clearfix"></div>
              <hr />
              <div class="row box-title-head">
                <h3 class="box-title"><?php echo lang('create_user_validation_groups_label');?><a href="javascript:void(0)" title="<?php echo lang('mm_masters_staffs_add_department_Modal_label');?>" data-toggle="modal" data-target=".bs-example-modal-lg" data-backdrop="static" data-keyboard="false" onclick="addDepartmentDataModal()"><?php echo lang('mm_masters_staffs_add_department_Modal_label');?></a> </h3>
              </div>
              <div class="row" id="groups">
                <?php 
                  foreach ($user_groups as $key => $value){
                    if($value['id'] != '1'){
                      ?>
                      <div class="col-sm-12 col-xs-12">
                        <div class="form-group">
                          <input type="checkbox" name="user_doright[<?php echo $value['id'];?>]" class="js-switch" data-color="#99d683" data-secondary-color="#f96262" value="<?php echo $value['id'];?>" <?php if(in_array($value['id'], $user_dorights)){?> checked <?php }?>/> &nbsp; <label for="exampleInputEmail1"><?php echo $value['description'];?></label>
                        </div>
                      </div>
                      <?php
                    }
                  }
                ?>
                <?PHP if(form_error('user_doright[]')){ echo '<span class="help-block">'.form_error('user_doright[]').'</span>';} ?>        
              </div>

              
              <div class="text-right">
                <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id;?>">
                <input type="hidden" name="staffs_id" value="<?php echo $staffs_id;?>">
                <input type="hidden" name="old_staffsphoto" value="<?php echo $old_staffsphoto;?>" />
                <input type="hidden" name="old_staffspassportattachment" value="<?php echo $old_staffspassportattachment;?>" />
                <input type="hidden" name="old_staffsiqamaattachment" value="<?php echo $old_staffsiqamaattachment;?>" />
                <input type="hidden" name="old_staffscwiattachment" value="<?php echo $old_staffscwiattachment;?>" />
                <input type="hidden" name="old_staffsemplovecv" value="<?php echo $old_staffsemplovecv;?>" />
                <input type="hidden" name="old_staffscertificateattachment" value="<?php echo $old_staffscertificateattachment;?>" />
                <input type="hidden" name="old_staffsresignedattachment" value="<?php echo $old_staffsresignedattachment;?>" />
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

  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false" id="CompanyModal">
    <div class="modal-dialog modal-lg" id="commonDetailsModal"></div>
  </div>

<style type="text/css">
  .panel-title .trigger:before {
    content: '\e082';
    font-family: 'Glyphicons Halflings';
    vertical-align: text-bottom;
  }

  .panel-title .trigger.collapsed:before {
    content: '\e081';
  }
</style>
<script type="text/javascript">
function load_certification_bodyBased(cbody)
  {
    $('#staffs_CWI_body').val('');
    $('#staffs_CWI_body').trigger('change'); // Notify any JS components that the value changed


    $.ajax({
      type: "post",
      url: "<?php echo site_url('auth/getCertificationTypeDropdownBased'); ?>", 
      data: {certificationBody:cbody},
      dataType:"html",
      success: function(html1){
        $('#staffs_CWI_body').html(html1);
      }
    });
  }

  $(".open-button").on("click", function() {
  $(this).closest('.collapse-group').find('.collapse').collapse('show');
});

$(".close-button").on("click", function() {
  $(this).closest('.collapse-group').find('.collapse').collapse('hide');
});


$('.switchery').on('change', function() {
  var $this = $(this);
  var clickCheckbox = document.querySelector('.switchery');

  if(clickCheckbox.checked){
    var checkedClass = $this.attr("id");
    $("."+checkedClass).prop('checked', false).trigger("click");
  }else{
    var unCheckedClass = $this.attr("id");
    $("."+unCheckedClass).prop('checked', true).trigger("click");
  }
});





/*
 $("input:checkbox").click(function () {
              console.log('checkbox');

    //$('input:checkbox').not(this).prop('checked', this.checked);
 });
*/
/*
 $("input:checkbox").each(function(){
    var $this = $(this);

                console.log($this);


    if($this.is(":checked")){
        //someObj.fruitsGranted.push($this.attr("id"));
            console.log('checkbox');

        var checkedClass = $this.attr("id");
        $('.'+checkedClass).not(this).prop('checked', this.checked);
    }else{
        //someObj.fruitsDenied.push($this.attr("id"));
        var unCheckedClass = $this.attr("id");
        $('.'+unCheckedClass).not(this).prop('checked', this.checked);
    }
});
*/
function addDesignationDataModal()
{
  var selectedDesignationID = $("#staffs_designation option:selected").val();
  //console.log(selectedDesignationID);

  $.ajax({
    type: "GET",
    url: "<?php echo site_url('auth/getAddUpdateDesignationModal'); ?>", 
    data: { selectedDesignationID:selectedDesignationID},
    dataType:"html",
    success: function(html1)
    {
      //alert(html1);
      //$('#commonDetailsModal').removeAttr('style');

      $('#commonDetailsModal').html(html1);
      
    },
  });
}

function addDepartmentDataModal()
{

  var selectedGroupsID = $("#groups option:selected").val();
  var userID = $("#user_id").val();
  //console.log(selectedGroupsID);
  $.ajax({
    type: "GET",
    url: "<?php echo site_url('auth/getAddUpdateDepartmentModal'); ?>", 
    data: { selectedGroupsID:selectedGroupsID, userID:userID},
    dataType:"html",
    success: function(html1)
    {
      //alert(html1);
      //$('#commonDetailsModal').removeAttr('style');

      $('#commonDetailsModal').html(html1);
      
    },
  });
}
$("#show_hide_password a").on('click', function(event) {
  event.preventDefault();
  if($('#show_hide_password input').attr("type") == "text"){
    $('#show_hide_password input').attr('type', 'password');
    $('#show_hide_password #eyehidden').html('<i class="fa fa-eye" aria-hidden="true"></i>');
  }else if($('#show_hide_password input').attr("type") == "password"){
    $('#show_hide_password input').attr('type', 'text');
    $('#show_hide_password #eyehidden').html('<i class="fa fa-eye-slash" aria-hidden="true"></i>');
  }
});


  $( "#staffs_email" ).keyup(function( event ) {
    if ( event.which != 13 && event.which != 32 ) {
      staffsEmail();    
    }
  }).keydown(function( event ) {
    if ( event.which == 13 || event.which == 32  ) {
      event.preventDefault();
    }
  });

  $( "#staffs_alternative_email" ).keyup(function( event ) {
    if ( event.which != 13 && event.which != 32 ) {
      staffsEmail();
    }
  }).keydown(function( event ) {
    if ( event.which == 13 || event.which == 32  ) {
      event.preventDefault();
    }
  });

  function staffsEmail(){
    var staffs_email_val = $('#staffs_email').val();
    var staffs_alternative_email_val = $('#staffs_alternative_email').val();
    var user_id_val = $('#user_id').val();
    var htmlValue = '';
    if(user_id_val == ''){
      if(staffs_email_val != '' && staffs_alternative_email_val == ''){
        htmlValue = '<select name="email" class="form-control select2 select22" id="email"><option value="">--- Select ---</option><option value="'+staffs_email_val+'">'+staffs_email_val+'</option></select>';
      } else if(staffs_email_val == '' && staffs_alternative_email_val != ''){
        htmlValue = '<select name="email" class="form-control select2 select22" id="email"><option value="">--- Select ---</option><option value="'+staffs_alternative_email_val+'">'+staffs_alternative_email_val+'</option></select>';
      } else if(staffs_email_val != '' && staffs_alternative_email_val != ''){
        htmlValue = '<select name="email" class="form-control select2 select22" id="email"><option value="">--- Select ---</option><option value="'+staffs_email_val+'">'+staffs_email_val+'</option><option value="'+staffs_alternative_email_val+'">'+staffs_alternative_email_val+'</option></select>';
      } else {
        htmlValue = '<input type="text" class="form-control" placeholder="<?php echo lang('create_user_email_label');?>" id="email" name="email" value="" autocomplete="off" readonly>';
      }
      $('#emailspan').html(htmlValue);
      $('.select22').trigger(); // Notify only Select2 of changes

    }else{
      htmlValue = '<input type="text" class="form-control" placeholder="<?php echo lang('create_user_email_label');?>" id="email" name="email" value="" autocomplete="off" readonly>';
      $('#emailspan').html(htmlValue);
    }    
  }


</script>


<style type="text/css">
  .box-title-head:after {
    content: "";
    position: absolute;
    left: 0;
    width: 9%;
    height: 4px;
    background: #ff4800;
  }
  
  .white-box .box-title {
    margin: 0px 0px 0px;
    font-weight: bold;
    text-transform: uppercase;
    font-size: 14px;
  }
  .box-title-head {
    margin-bottom: 15px;
  }
</style>