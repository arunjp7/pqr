<?php
// Last Updated by  Vinitha 06/08/2016 
if(isset($datatablevalue) && !empty($datatablevalue))
{
  $trowAdditi = 0;
  foreach($datatablevalue as $row)
  {  
    $equipment_additional_id[]             =  $row['equipment_additional_id'];
    $equipment_additional_nominial_value[] =  $row['equipment_additional_nominial_value'];
    $equipment_additional_measured_value[] =  $row['equipment_additional_measured_value'];

    $trowAdditi++;
  }

}
$ci =&get_instance();

if($trowAdditi  ==  0){   $trowAdditi   = 0;  }

?>

<?php 
            $i=0;
            for($in=0; $in < $trowAdditi; $in++)
            {
              ?>
              <div class="row" id="rowssid_<?php echo $in;?>">
                <div class="col-sm-2 col-xs-2">
                  <div class="form-group">
                    <input type="hidden" value="<?php echo $equipment_additional_id[$in];?>" name="equipment_additional_id[]" />

                    <a href="javascript:void(0);" onclick="getConfirmdeleteAdditional(<?php echo $in;?>,'<?php echo base_url().'masters/Equipment/getupdateEquipmentAdditionalDetailsModal/'.$equipment_additional_id[$in];?>')" class="btn btn-danger"  title="<?php echo lang('helper_common_delete_label');?>"><i class="glyphicon glyphicon-trash"></i></a>
                  </div>
                </div>

                <div class="col-sm-5 col-xs-5">
                  <div class="form-group <?PHP if(form_error('equipment_additional_nominial_value')){ echo 'has-error';} ?>">
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_equipment_calibration_Modal_additional_nominial_value');?>" id="equipment_additional_nominial_value" name="equipment_additional_nominial_value[]" value="<?php echo $equipment_additional_nominial_value[$in] ;?>" autocomplete="off">
                    <?PHP if(form_error('equipment_additional_nominial_value')){ echo '<span class="help-block">'.form_error('equipment_additional_nominial_value').'</span>';} ?>
                  </div>
                </div>

                <div class="col-sm-5 col-xs-5">
                  <div class="form-group <?PHP if(form_error('equipment_additional_measured_value')){ echo 'has-error';} ?>">
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_equipment_additional_measured_value');?>" id="equipment_additional_measured_value" name="equipment_additional_measured_value[]" value="<?php echo $equipment_additional_measured_value[$in] ;?>" autocomplete="off">
                    <?PHP if(form_error('equipment_additional_measured_value')){ echo '<span class="help-block">'.form_error('equipment_additional_measured_value').'</span>';} ?>
                  </div>
                </div>
              </div>
              <?php 
            $i++;
            } 
          ?>