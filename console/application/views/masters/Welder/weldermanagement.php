<?php
// Last Updated by  Vinitha 06/08/2016 
$this->mcommon->getCheckUserPermissionHead('Welder add and edit',true);
if(isset($value) && !empty($value))
{
    foreach($value->result() as $row)
    {   
      $welder_id               =  $row->welder_id;
      $welder_first_name       =  $row->welder_first_name;
      $welder_middle_name      =  $row->welder_middle_name;
      $welder_last_name        =  $row->welder_last_name;       
      $welder_test_no          =  $row->welder_test_no;   
      $welder_no               =  $row->welder_no;   
      $welderrefno             =  $row->welder_ref_no;   
      $welder_photo            =  $row->welder_photo;   
      $welder_iqama_no         =  $row->welder_iqama_no;
      $old_welderphoto         =  $row->welder_photo;       
   
    }
          

}
else
{
    $welder_first_name         =  $this->input->post('welder_first_name');
    $welder_middle_name        =  $this->input->post('welder_middle_name');
    $welder_last_name          =  $this->input->post('welder_last_name');
    $welderrefno               =  $this->input->post('welder_ref_no');
    $welder_test_no            =  $this->input->post('welder_test_no');
    $welder_no                 =  $this->input->post('welder_no');
    $welder_photo              =  $this->input->post('welder_photo');
    $welder_iqama_no           =  $this->input->post('welder_iqama_no');
    $old_welderphoto           =  $this->input->post('old_welderphoto');
 
}
$welder_ref_no= ($welderrefno != '') ? $welderrefno : $welder_ref_no;

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
                  <div class="form-group <?PHP if(form_error('welder_first_name')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_welder_first_name');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_welder_first_name');?>" id="welder_first_name" name="welder_first_name" value="<?php echo $welder_first_name ;?>" autocomplete="off">
                    <?PHP if(form_error('welder_first_name')){ echo '<span class="help-block">'.form_error('welder_first_name').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('welder_middle_name')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_welder_middle_name');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_welder_middle_name');?>" id="welder_middle_name" name="welder_middle_name" value="<?php echo $welder_middle_name ;?>" autocomplete="off">
                   <?PHP if(form_error('welder_middle_name')){ echo '<span class="help-block">'.form_error('welder_middle_name').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('welder_last_name')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_welder_last_name');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_welder_last_name');?>" id="welder_last_name" name="welder_last_name" value="<?php echo $welder_last_name ;?>" autocomplete="off">
                   <?PHP if(form_error('welder_last_name')){ echo '<span class="help-block">'.form_error('welder_last_name').'</span>';} ?>
                  </div>
                </div>


                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('welder_ref_no')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_welder_ref_no');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_welder_ref_no');?>" id="welder_ref_no" name="welder_ref_no" value="<?php echo $welder_ref_no ;?>" autocomplete="off" readonly>
                   <?PHP if(form_error('welder_ref_no')){ echo '<span class="help-block">'.form_error('welder_ref_no').'</span>';} ?>
                  </div>
                </div>               
              </div>
              <div class="row">
   
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('welder_test_no')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_welder_test_no');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_welder_test_no');?>" id="welder_test_no" name="welder_test_no" value="<?php echo $welder_test_no;?>" autocomplete="off">
                   <?PHP if(form_error('welder_test_no')){ echo '<span class="help-block">'.form_error('welder_test_no').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('welder_no')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_welder_no');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_welder_no');?>" id="welder_no" name="welder_no" value="<?php echo $welder_no ;?>" autocomplete="off">
                    <?PHP if(form_error('welder_no')){ echo '<span class="help-block">'.form_error('welder_no').'</span>';} ?>
                  </div>
                </div>

                
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('welder_iqama_no')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_welder_iqama_no');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_welder_iqama_no');?>" id="welder_iqama_no." name="welder_iqama_no" value="<?php echo $welder_iqama_no ;?>" autocomplete="off">
                   <?PHP if(form_error('welder_iqama_no')){ echo '<span class="help-block">'.form_error('welder_iqama_no').'</span>';} ?>
                  </div>
                </div> 

                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('welder_photo')){ echo 'has-error';} ?>">
                  <label for="exampleInputEmail1"><?php echo lang('mm_masters_welder_photo');?> <?php echo lang('mm_common_logo_size_label');?> </label>
                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                      <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                      <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new"><?php echo lang('mm_common_logo_name_label');?></span> <span class="fileinput-exists"><?php echo lang('mm_common_logo_change_label');?></span>
                      <input type="file" id="welder_photo" name="welder_photo" >
                      </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput"><?php echo lang('mm_masters_welder_photo');?></a>
                    </div>
                    <?PHP if(form_error('welder_photo')){ echo '<span class="help-block">'.form_error('welder_photo').'</span>';} ?>
                    <?php if($old_welderphoto!=''){ ?> <img src="<?php echo config_item('image_url').$old_welderphoto;?>" height="100" width="100"> <?php }?>
                  </div>
                </div>
             
              </div>               
              <div class="text-right">
                <input type="hidden" name="welder_id" value="<?php echo $welder_id;?>">
                 <input type="hidden" name="old_welderphoto" value="<?php echo $old_welderphoto;?>" />
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
