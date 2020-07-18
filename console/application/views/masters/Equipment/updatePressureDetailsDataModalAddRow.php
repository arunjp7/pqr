<div class="row" id="rowssid_<?php echo $in;?>">
            <div class="col-sm-1 col-xs-1">
              <div class="form-group">
                <input type="hidden" value="<?php echo $equipment_pressure_id[$in];?>" name="equipment_pressure_id[]" />
                <a href="javascript:void(0);" onclick="getConfirmdeletePressure(<?php echo $in;?>,'<?php echo base_url().'masters/Equipment/getupdateEquipmentAdditionalDetailsModal/'.$equipment_pressure_id[$in];?>')" class="btn btn-danger"  title="<?php echo lang('helper_common_delete_label');?>"><i class="glyphicon glyphicon-trash"></i></a>
              </div>
            </div>

            <div class="col-sm-11 col-xs-11">
              <div class="row">
                <div class="col-sm-2 col-xs-2">
                  <div class="form-group <?PHP if(form_error('equipment_pressure_input1')){ echo 'has-error';} ?>">
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_equipment_calibration_Modal_Pressure_input');?>" id="equipment_pressure_input1" name="equipment_pressure_input1[]" value="<?php echo $equipment_pressure_input1[$in] ;?>" autocomplete="off">
                    <?PHP if(form_error('equipment_pressure_input1')){ echo '<span class="help-block">'.form_error('equipment_pressure_input1').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-2 col-xs-2">
                  <div class="form-group <?PHP if(form_error('equipment_pressure_output1')){ echo 'has-error';} ?>">
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_equipment_calibration_Modal_Pressure_output');?>" id="equipment_pressure_output1" name="equipment_pressure_output1[]" value="<?php echo $equipment_pressure_output1[$in] ;?>" autocomplete="off">
                    <?PHP if(form_error('equipment_pressure_output1')){ echo '<span class="help-block">'.form_error('equipment_pressure_output1').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-2 col-xs-2">
                  <div class="form-group <?PHP if(form_error('equipment_pressure_error1')){ echo 'has-error';} ?>">
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_equipment_calibration_Modal_Pressure_error');?>" id="equipment_pressure_error1" name="equipment_pressure_error1[]" value="<?php echo $equipment_pressure_error1[$in] ;?>" autocomplete="off">
                    <?PHP if(form_error('equipment_pressure_error1')){ echo '<span class="help-block">'.form_error('equipment_pressure_error1').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-2 col-xs-2">
                  <div class="form-group <?PHP if(form_error('equipment_pressure_input2')){ echo 'has-error';} ?>">
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_equipment_calibration_Modal_Pressure_input');?>" id="equipment_pressure_input2" name="equipment_pressure_input2[]" value="<?php echo $equipment_pressure_input2[$in] ;?>" autocomplete="off">
                    <?PHP if(form_error('equipment_pressure_input2')){ echo '<span class="help-block">'.form_error('equipment_pressure_input2').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-2 col-xs-2">
                  <div class="form-group <?PHP if(form_error('equipment_pressure_output2')){ echo 'has-error';} ?>">
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_equipment_calibration_Modal_Pressure_output');?>" id="equipment_pressure_output2" name="equipment_pressure_output2[]" value="<?php echo $equipment_pressure_output2[$in] ;?>" autocomplete="off">
                    <?PHP if(form_error('equipment_pressure_output2')){ echo '<span class="help-block">'.form_error('equipment_pressure_output2').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-2 col-xs-2">
                  <div class="form-group <?PHP if(form_error('equipment_pressure_error2')){ echo 'has-error';} ?>">
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_equipment_calibration_Modal_Pressure_error');?>" id="equipment_pressure_error2" name="equipment_pressure_error2[]" value="<?php echo $equipment_pressure_error2[$in] ;?>" autocomplete="off">
                    <?PHP if(form_error('equipment_pressure_error2')){ echo '<span class="help-block">'.form_error('equipment_pressure_error2').'</span>';} ?>
                  </div>
                </div>
              </div>
            </div>

          </div>