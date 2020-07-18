<?php
// Last Updated by  Vinitha 06/08/2016 
$this->mcommon->getCheckUserPermissionHead('Radiographic Examination add and edit',true);
if(isset($value) && !empty($value)){
  foreach($value->result() as $row){   
    $radiographic_abbreviation_id                      =  $row->radiographic_abbreviation_id;
    $radiographic_examination_rt_technique             =  $row->radiographic_examination_rt_technique;
  }
} else {
  $radiographic_abbreviation_id                        =  $this->input->post('radiographic_abbreviation_id');
  $radiographic_examination_rt_technique               =  $this->input->post('radiographic_examination_rt_technique');
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
                  <div class="form-group <?PHP if(form_error('radiographic_examination_rt_technique')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_master_RadiographicExamination_rt_technique');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_master_RadiographicExamination_rt_technique');?>" id="radiographic_examination_rt_technique" name="radiographic_examination_rt_technique" value="<?php echo $radiographic_examination_rt_technique ;?>" autocomplete="off">
                    <?PHP if(form_error('radiographic_examination_rt_technique')){ echo '<span class="help-block">'.form_error('radiographic_examination_rt_technique').'</span>';} ?>
                  </div>  
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('radiographic_examination_source')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_master_RadiographicExamination_source');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_master_RadiographicExamination_source');?>" id="radiographic_examination_source" name="radiographic_examination_source" value="<?php echo $radiographic_examination_source ;?>" autocomplete="off">
                    <?PHP if(form_error('radiographic_examination_source')){ echo '<span class="help-block">'.form_error('radiographic_examination_source').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('radiographic_examination_source_size')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_master_RadiographicExamination_source_size');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_master_RadiographicExamination_source_size');?>" id="radiographic_examination_source_size" name="radiographic_examination_source_size" value="<?php echo $radiographic_examination_source_size ;?>" autocomplete="off">
                    <?PHP if(form_error('radiographic_examination_source_size')){ echo '<span class="help-block">'.form_error('radiographic_examination_source_size').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('radiographic_examination_source_activity')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_master_RadiographicExamination_source_activity');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_master_RadiographicExamination_source_activity');?>" id="radiographic_examination_source_activity" name="radiographic_examination_source_activity" value="<?php echo $radiographic_examination_source_activity ;?>" autocomplete="off">
                    <?PHP if(form_error('radiographic_examination_source_activity')){ echo '<span class="help-block">'.form_error('radiographic_examination_source_activity').'</span>';} ?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('radiographic_examination_lead_screen_front')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_master_RadiographicExamination_lead_screen_front');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_master_RadiographicExamination_lead_screen_front');?>" id="radiographic_examination_lead_screen_front" name="radiographic_examination_lead_screen_front" value="<?php echo $radiographic_examination_lead_screen_front ;?>" autocomplete="off">
                    <?PHP if(form_error('radiographic_examination_lead_screen_front')){ echo '<span class="help-block">'.form_error('radiographic_examination_lead_screen_front').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('radiographic_examination_lead_screen_back')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_master_RadiographicExamination_lead_screen_back');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_master_RadiographicExamination_lead_screen_back');?>" id="radiographic_examination_lead_screen_back" name="radiographic_examination_lead_screen_back" value="<?php echo $radiographic_examination_lead_screen_back ;?>" autocomplete="off">
                    <?PHP if(form_error('radiographic_examination_lead_screen_back')){ echo '<span class="help-block">'.form_error('radiographic_examination_lead_screen_back').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('radiographic_examination_sod')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_master_RadiographicExamination_sod');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_master_RadiographicExamination_sod');?>" id="radiographic_examination_sod" name="radiographic_examination_sod" value="<?php echo $radiographic_examination_sod ;?>" autocomplete="off">
                    <?PHP if(form_error('radiographic_examination_sod')){ echo '<span class="help-block">'.form_error('radiographic_examination_sod').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('radiographic_examination_ofd')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_master_RadiographicExamination_ofd');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_master_RadiographicExamination_ofd');?>" id="radiographic_examination_ofd" name="radiographic_examination_ofd" value="<?php echo $radiographic_examination_ofd ;?>" autocomplete="off">
                    <?PHP if(form_error('radiographic_examination_ofd')){ echo '<span class="help-block">'.form_error('radiographic_examination_ofd').'</span>';} ?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('radiographic_examination_exposure_time')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_master_RadiographicExamination_exposure_time');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_master_RadiographicExamination_exposure_time');?>" id="radiographic_examination_exposure_time" name="radiographic_examination_exposure_time" value="<?php echo $radiographic_examination_exposure_time ;?>" autocomplete="off">
                    <?PHP if(form_error('radiographic_examination_exposure_time')){ echo '<span class="help-block">'.form_error('radiographic_examination_exposure_time').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('radiographic_examination_iqi_designation')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_master_RadiographicExamination_iqi_designation');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_master_RadiographicExamination_iqi_designation');?>" id="radiographic_examination_iqi_designation" name="radiographic_examination_iqi_designation" value="<?php echo $radiographic_examination_iqi_designation ;?>" autocomplete="off">
                    <?PHP if(form_error('radiographic_examination_iqi_designation')){ echo '<span class="help-block">'.form_error('radiographic_examination_iqi_designation').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('radiographic_examination_film_density')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_master_RadiographicExamination_film_density');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_master_RadiographicExamination_film_density');?>" id="radiographic_examination_film_density" name="radiographic_examination_film_density" value="<?php echo $radiographic_examination_film_density ;?>" autocomplete="off">
                    <?PHP if(form_error('radiographic_examination_film_density')){ echo '<span class="help-block">'.form_error('radiographic_examination_film_density').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('radiographic_examination_welding_process')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_master_RadiographicExamination_welding_process');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_master_RadiographicExamination_welding_process');?>" id="radiographic_examination_welding_process" name="radiographic_examination_welding_process" value="<?php echo $radiographic_examination_welding_process ;?>" autocomplete="off">
                    <?PHP if(form_error('radiographic_examination_welding_process')){ echo '<span class="help-block">'.form_error('radiographic_examination_welding_process').'</span>';} ?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('radiographic_examination_location_iqi')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_master_RadiographicExamination_location_iqi');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_master_RadiographicExamination_location_iqi');?>" id="radiographic_examination_location_iqi" name="radiographic_examination_location_iqi" value="<?php echo $radiographic_examination_location_iqi ;?>" autocomplete="off">
                    <?PHP if(form_error('radiographic_examination_location_iqi')){ echo '<span class="help-block">'.form_error('radiographic_examination_location_iqi').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('radiographic_examination_location_marks')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_master_RadiographicExamination_location_marks');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_master_RadiographicExamination_location_marks');?>" id="radiographic_examination_location_marks" name="radiographic_examination_location_marks" value="<?php echo $radiographic_examination_location_marks ;?>" autocomplete="off">
                    <?PHP if(form_error('radiographic_examination_location_marks')){ echo '<span class="help-block">'.form_error('radiographic_examination_location_marks').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('radiographic_examination_film_class')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_master_RadiographicExamination_film_class');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_master_RadiographicExamination_film_class');?>" id="radiographic_examination_film_class" name="radiographic_examination_film_class" value="<?php echo $radiographic_examination_film_class ;?>" autocomplete="off">
                    <?PHP if(form_error('radiographic_examination_film_class')){ echo '<span class="help-block">'.form_error('radiographic_examination_film_class').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('radiographic_examination_film_brand')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_master_RadiographicExamination_film_brand');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_master_RadiographicExamination_film_brand');?>" id="radiographic_examination_film_brand" name="radiographic_examination_film_brand" value="<?php echo $radiographic_examination_film_brand ;?>" autocomplete="off">
                    <?PHP if(form_error('radiographic_examination_film_brand')){ echo '<span class="help-block">'.form_error('radiographic_examination_film_brand').'</span>';} ?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('radiographic_examination_film_processing')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_master_RadiographicExamination_film_processing');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_master_RadiographicExamination_film_processing');?>" id="radiographic_examination_film_processing" name="radiographic_examination_film_processing" value="<?php echo $radiographic_examination_film_processing ;?>" autocomplete="off">
                    <?PHP if(form_error('radiographic_examination_film_processing')){ echo '<span class="help-block">'.form_error('radiographic_examination_film_processing').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('radiographic_examination_iqi_wire')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_master_RadiographicExamination_iqi_wire');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_master_RadiographicExamination_iqi_wire');?>" id="radiographic_examination_iqi_wire" name="radiographic_examination_iqi_wire" value="<?php echo $radiographic_examination_iqi_wire ;?>" autocomplete="off">
                    <?PHP if(form_error('radiographic_examination_iqi_wire')){ echo '<span class="help-block">'.form_error('radiographic_examination_iqi_wire').'</span>';} ?>
                  </div>
                </div>
              </div>              
              <div class="text-right">
                <input type="hidden" name="radiographic_examination_id" value="<?php echo $radiographic_examination_id;?>">
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
