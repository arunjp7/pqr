<?php
// Last Updated by  Vinitha 06/08/2016 
$this->mcommon->getCheckUserPermissionHead('Equipment add and edit',true);
if(isset($value) && !empty($value))
{
    foreach($value->result() as $row)
    {   
      $equipment_id                     =  $row->equipment_id;
      $equipment_category               =  $row->equipment_category;
      $equipment_serial_number          =  $row->equipment_serial_number;       
      $equipment_calibration_frequency  =  $row->equipment_calibration_frequency;   
      $equipment_status                 =  $row->equipment_status; 
      $equipment_test_equipment         =  $row->equipment_test_equipment;   
      $equipment_recommended_range      =  $row->equipment_recommended_range;   
      $equipment_alert_frequency        =  $row->equipment_alert_frequency;
      $equipment_least_count            =  $row->equipment_least_count; 
      $equipment_manufacturer           =  $row->equipment_manufacturer;       
      $equipment_range                  =  $row->equipment_range;       
      $equipment_acceptance_criteria    =  $row->equipment_acceptance_criteria;  
      $equipment_asset_tag_number       =  $row->equipment_asset_tag_number;       
      $equipment_purpose                =  $row->equipment_purpose;       
      $equipment_remarks                =  $row->equipment_remarks;       
   
    }     
}
else
{
    $equipment_category                 =  $this->input->post('equipment_category');
    $equipment_serial_number            =  $this->input->post('equipment_serial_number');
    $equipment_calibration_frequency    =  $this->input->post('equipment_calibration_frequency');
    $equipment_status                   =  $this->input->post('equipment_status');
    $equipment_test_equipment           =  $this->input->post('equipment_test_equipment');
    $equipment_recommended_range        =  $this->input->post('equipment_recommended_range');
    $equipment_alert_frequency          =  $this->input->post('equipment_alert_frequency');
    $equipment_least_count              =  $this->input->post('equipment_least_count');
    $equipment_manufacturer             =  $this->input->post('equipment_manufacturer');
    $equipment_range                    =  $this->input->post('equipment_range');
    $equipment_acceptance_criteria      =  $this->input->post('equipment_acceptance_criteria');
    $equipment_asset_tag_number         =  $this->input->post('equipment_asset_tag_number');
    $equipment_purpose                  =  $this->input->post('equipment_purpose');
    $equipment_remarks                  =  $this->input->post('equipment_remarks');
 
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
                  <div class="form-group <?PHP if(form_error('equipment_category')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_equipment_category');?><span class="text-danger">*</span></label>
                      <?php   
                      $attrib = 'class="form-control select2" name="equipment_category"  data-live-search="true" data-width="100%"  id="equipment_category"';
                      echo form_dropdown('equipment_category', $drop_down_Category, set_value('equipment_category', (isset($equipment_category)) ? $equipment_category : ''), $attrib);
                      ?> 
                      <?PHP if(form_error('equipment_category')){ echo '<span class="help-block">'.form_error('equipment_category').'</span>';} ?>           
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('equipment_serial_number')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_equipment_serial_number');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_equipment_serial_number');?>" id="equipment_serial_number" name="equipment_serial_number" value="<?php echo $equipment_serial_number ;?>" autocomplete="off">
                    <?PHP if(form_error('equipment_serial_number')){ echo '<span class="help-block">'.form_error('equipment_serial_number').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('equipment_calibration_frequency')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_equipment_calibration_frequency');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_equipment_calibration_frequency');?>" id="equipment_calibration_frequency" name="equipment_calibration_frequency" value="<?php echo $equipment_calibration_frequency ;?>" autocomplete="off">
                   <?PHP if(form_error('equipment_calibration_frequency')){ echo '<span class="help-block">'.form_error('equipment_calibration_frequency').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('equipment_status')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_equipment_status');?></label>
                      <?php   
                      $attrib = 'class="form-control select2" name="equipment_status"  data-live-search="true" data-width="100%"  id="equipment_status"';
                      echo form_dropdown('equipment_status', $drop_down_Status, set_value('equipment_status', (isset($equipment_status)) ? $equipment_status : ''), $attrib);
                      ?> 
                      <?PHP if(form_error('equipment_status')){ echo '<span class="help-block">'.form_error('equipment_status').'</span>';} ?>           
                  </div>
                </div> 
              </div> 
              <div class="row">
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('equipment_test_equipment')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_equipment_test_equipment');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_equipment_test_equipment');?>" id="equipment_test_equipment" name="equipment_test_equipment" value="<?php echo $equipment_test_equipment;?>" autocomplete="off">
                   <?PHP if(form_error('equipment_test_equipment')){ echo '<span class="help-block">'.form_error('equipment_test_equipment').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('equipment_recommended_range')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_equipment_recommended_range');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_equipment_recommended_range');?>" id="equipment_recommended_range" name="equipment_recommended_range" value="<?php echo $equipment_recommended_range;?>" autocomplete="off">
                   <?PHP if(form_error('equipment_recommended_range')){ echo '<span class="help-block">'.form_error('equipment_recommended_range').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('equipment_alert_frequency')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_equipment_alert_frequency');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_equipment_alert_frequency');?>" id="equipment_alert_frequency" name="equipment_alert_frequency" value="<?php echo $equipment_alert_frequency;?>" autocomplete="off">
                   <?PHP if(form_error('equipment_alert_frequency')){ echo '<span class="help-block">'.form_error('equipment_alert_frequency').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('equipment_least_count')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_equipment_least_count');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_equipment_least_count');?>" id="equipment_least_count" name="equipment_least_count" value="<?php echo $equipment_least_count;?>" autocomplete="off">
                   <?PHP if(form_error('equipment_least_count')){ echo '<span class="help-block">'.form_error('equipment_least_count').'</span>';} ?> 
                  </div>
                </div>
              </div>
              <div class="row">           
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('equipment_manufacturer')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_equipment_manufacturer');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_equipment_manufacturer');?>" id="equipment_manufacturer" name="equipment_manufacturer" value="<?php echo $equipment_manufacturer ;?>" autocomplete="off">
                    <?PHP if(form_error('equipment_manufacturer')){ echo '<span class="help-block">'.form_error('equipment_manufacturer').'</span>';} ?>
                  </div>
                </div>
                
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('equipment_range')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_equipment_range');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_equipment_range');?>" id="equipment_range" name="equipment_range" value="<?php echo $equipment_range ;?>" autocomplete="off">
                   <?PHP if(form_error('equipment_range')){ echo '<span class="help-block">'.form_error('equipment_range').'</span>';} ?>
                  </div>
                </div> 
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('equipment_acceptance_criteria')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_equipment_acceptance_criteria');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_equipment_acceptance_criteria');?>" id="equipment_acceptance_criteria" name="equipment_acceptance_criteria" value="<?php echo $equipment_acceptance_criteria;?>" autocomplete="off">
                   <?PHP if(form_error('equipment_acceptance_criteria')){ echo '<span class="help-block">'.form_error('equipment_acceptance_criteria').'</span>';} ?>
                  </div>
                </div> 
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('equipment_asset_tag_number')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_equipment_asset_tag_number');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_equipment_asset_tag_number');?>" id="equipment_asset_tag_number" name="equipment_asset_tag_number" value="<?php echo $equipment_asset_tag_number ;?>" autocomplete="off">
                   <?PHP if(form_error('equipment_asset_tag_number')){ echo '<span class="help-block">'.form_error('equipment_asset_tag_number').'</span>';} ?>
                  </div>
                </div> 
             
              </div> 

              <div class="row">              
              
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('equipment_purpose')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_equipment_purpose');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_equipment_purpose');?>" id="equipment_purpose" name="equipment_purpose" value="<?php echo $equipment_purpose ;?>" autocomplete="off">
                    <?PHP if(form_error('equipment_purpose')){ echo '<span class="help-block">'.form_error('equipment_purpose').'</span>';} ?>
                  </div>
                </div>
                
                <div class="col-sm-6 col-xs-6">
                  <div class="form-group <?PHP if(form_error('equipment_remarks')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_equipment_remarks');?></label>
                    <textarea class="form-control" placeholder="<?php echo lang('mm_masters_equipment_remarks');?>" id="equipment_remarks" name="equipment_remarks" rows="3"><?php echo $equipment_remarks;?></textarea><?PHP if(form_error('equipment_remarks')){ echo '<span class="help-block">'.form_error('equipment_remarks').'</span>';} ?>
                  </div>
                </div> 
             
              </div>

              <div class="text-right">
                <input type="hidden" name="equipment_id" value="<?php echo $equipment_id;?>">
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
