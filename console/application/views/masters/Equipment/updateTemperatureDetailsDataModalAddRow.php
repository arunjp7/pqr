<div class="row" id="rowssid_<?php echo $in;?>">
            <div class="col-sm-1 col-xs-1">
              <div class="form-group">
                <input type="hidden" value="<?php echo $equipment_temperature_id[$in];?>" name="equipment_temperature_id[]" />
                <a href="javascript:void(0);" onclick="getupdateEquipmentTemperatureDetailsModal(<?php echo $in;?>,'')" class="btn btn-danger"  title="<?php echo lang('helper_common_delete_label');?>"><i class="glyphicon glyphicon-trash"></i></a>
              </div>
            </div>

            <div class="col-sm-11 col-xs-11">
              <div class="row">
                <div class="col-sm-4 col-xs-4">
                  <div class="form-group <?PHP if(form_error('equipment_temperature_degress')){ echo 'has-error';} ?>">
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_equipment_calibration_Modal_Temperature_degress');?>" id="equipment_temperature_degress" name="equipment_temperature_degress[]" value="<?php echo $equipment_temperature_degress[$in] ;?>" autocomplete="off">
                    <?PHP if(form_error('equipment_temperature_degress')){ echo '<span class="help-block">'.form_error('equipment_temperature_degress').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-4 col-xs-4">
                  <div class="form-group <?PHP if(form_error('equipment_temperature_ambient')){ echo 'has-error';} ?>">
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_equipment_calibration_Modal_Temperature_Ambient');?>" id="equipment_temperature_ambient" name="equipment_temperature_ambient[]" value="<?php echo $equipment_temperature_ambient[$in] ;?>" autocomplete="off">
                    <?PHP if(form_error('equipment_temperature_ambient')){ echo '<span class="help-block">'.form_error('equipment_temperature_ambient').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-4 col-xs-4">
                  <div class="form-group <?PHP if(form_error('equipment_temperature_dergrees')){ echo 'has-error';} ?>">
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_equipment_calibration_Modal_Temperature_Dergress');?>" id="equipment_temperature_dergrees" name="equipment_temperature_dergrees[]" value="<?php echo $equipment_temperature_dergrees[$in] ;?>" autocomplete="off">
                    <?PHP if(form_error('equipment_temperature_dergrees')){ echo '<span class="help-block">'.form_error('equipment_temperature_dergrees').'</span>';} ?>
                  </div>
                </div>
              </div>
            </div>

          </div>