<?php
// Last Updated by  Vinitha 06/08/2016 
$this->mcommon->getCheckUserPermissionHead('PQR add and edit',true);

if(isset($value) && !empty($value)){

  foreach($value->result() as $row){   

    // Basic block
    $pqr_id = $row->pqr_id;
    $pqr_no = $row->pqr_no;
    $inspection_date = $row->inspection_date;
    $wps_no = $row->wps_no;
    $process1 = $row->process1;
    $process2 = $row->process2;
    $process3 = $row->process3;
    $type_id = explode(',', $row->type_id);
    $code_id = explode(',', $row->code_id);
    $pqr_other  = $row->pqr_other;


    // Joints Block
    $joints_a = explode(',', $row->joints_a);
    $joints_b = explode(',', $row->joints_b);
    $joints_c = explode(',', $row->joints_c);
    $joints_d = explode(',', $row->joints_d);
    $joints_other = explode(',', $row->joints_other);
    $joints_image = explode(',', $row->joints_image);

    // Base Metals
    $company_id = $row->company_id;
    $pno_id = $row->pno_id;
    $to_pno_id = $row->to_pno_id;
    $group_no = $row->group_no;
    $to_group_no = $row->to_group_no;
    $material_spe = $row->material_spe;
    $to_material_spe = $row->to_material_spe;
    $thickness_test = $row->thickness_test;
    $tgu_no = $row->tgu_no;
    $to_tgu_no = $row->to_tgu_no;
    $base_heat_no = $row->base_heat_no;
    $base_to_heat_no = $row->base_to_heat_no;
    $diameter_id = $row->diameter_id;
    $base_others = $row->base_others;
    $base_to_others = $row->base_to_others;

    // Filler Metals
    $fno_id = explode('|', $row->fno_id);
    $a_no = explode('|', $row->a_no);
    $sfa_no = explode('|', $row->sfa_no);
    $aws_classfication = explode('|', $row->aws_classfication);
    $size_filler_metal = explode('|', $row->size_filler_metal);
    $filler_supply_metal = explode('|', $row->filler_supply_metal);
    $filler_flux_type = explode('|', $row->filler_flux_type);
    $filler_flux_trade = explode('|', $row->filler_flux_trade);
    $filler_electrode = explode('|', $row->filler_electrode);
    $filer_weld_thickness = explode('|', $row->filer_weld_thickness);
    $lot_no = explode('|', $row->lot_no);
    $fille_other = explode('|', $row->fille_other);

    $position_id = $row->position_id;
    $weld_progression = $row->weld_progression;
    $position_other = $row->position_other;
    $preheat_temp_min = $row->preheat_temp_min;
    $interpass_temp_max = $row->interpass_temp_max;


    $shielding_gas = $row->shielding_gas;
    $shielding_percent = $row->shielding_percent;
    $shielding_rate = $row->shielding_rate;
    $backing_gas = $row->backing_gas;
    $backing_percent = $row->backing_percent;
    $backing_rate = $row->backing_rate;
    $trailing_gas = $row->trailing_gas;
    $trailing_percent = $row->trailing_percent;
    $trailing_rate = $row->trailing_rate;

    $temp_range = $row->temp_range;
    $soak_period = $row->soak_period;
    $heat_rate_up_to = $row->heat_rate_up_to;
    $heat_rate_from = $row->heat_rate_from;
    $control_heat_rate = $row->control_heat_rate;
    $cooling_rate = $row->cooling_rate;
    $post_heat_other = $row->post_heat_other;

    $elec_current = explode('|', $row->elec_current);
    $elec_prolarity = explode('|', $row->elec_prolarity);
    $elec_amps = explode('|', $row->elec_amps);
    $elec_volts = explode('|', $row->elec_volts);
    $elec_arc = explode('|', $row->elec_arc);
    $elec_weld_bed = explode('|', $row->elec_weld_bed);
    $elec_waveform = explode('|', $row->elec_waveform);
    $elec_power = explode('|', $row->elec_power);
    $elec_type = explode('|', $row->elec_type);
    $elec_mode = explode('|', $row->elec_mode);
    $elec_size = explode('|', $row->elec_size);
    $elec_heat = explode('|', $row->elec_heat);
    $elec_other = explode('|', $row->elec_other);


    $weave_bead = $row->weave_bead;
    $cupsize_id = $row->cupsize_id;
    $pass_per_side = $row->pass_per_side;
    $s_m_electrode = $row->s_m_electrode;
    $work_distance = $row->work_distance;
    $cleaning_id = $row->cleaning_id;
    $thermal_process = $row->thermal_process;
    $techinqe_other = $row->techinqe_other;

    $layer = explode(',', $row->layer);
    $welder_process = explode(',', $row->welder_process);
    $classVal = explode(',', $row->classVal);
    $diameter = explode(',', $row->diameter);
    $typer_polority = explode(',', $row->typer_polority);
    $current_amperage_range = explode(',', $row->current_amperage_range);
    $current_voltage_range = explode(',', $row->current_voltage_range);
    $travel_speed_range = explode(',', $row->travel_speed_range);
    $heat_input = explode(',', $row->heat_input);
  
  }
}
?>
<!-- /.start form -->
<div id="main-wrapper">
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-white">
            <div class="panel-heading clearfix">
                <h4 class="panel-title"></h4>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-sm-12 col-xl-12">
                    <ul class="nav nav-pills">
                    <li class="tablinks nav-item active" data-id="companydetails">
                        <a class="nav-link" href="javascript:void(0);"><?php echo lang('mm_operation_pqr_company_details_label');?></a>
                    </li>
                    <li class="tablinks nav-item" data-id="joints">
                        <a class="nav-link" href="javascript:void(0);"><?php echo lang('mm_operation_pqr_joints_label');?></a>
                    </li>
                    <li class="tablinks nav-item" data-id="basemetals">
                        <a class="nav-link" href="javascript:void(0);"><?php echo lang('mm_operation_pqr_base_metals_label');?></a>
                    </li>
                    <li class="tablinks nav-item" data-id="filler">
                        <a class="nav-link" href="javascript:void(0);"><?php echo lang('mm_operation_pqr_filler_metals_label');?></a>
                    </li>
                    <li class="tablinks nav-item" data-id="position_preheat">
                        <a class="nav-link" href="javascript:void(0);"><?php echo lang('mm_operation_pqr_position_label');?> & <?php echo lang('mm_operation_pqr_preheat_label');?></a>
                    </li>
                    <li class="tablinks nav-item" data-id="post">
                        <a class="nav-link" href="javascript:void(0);"><?php echo lang('mm_operation_pqr_post_weld_heat_label');?></a>
                    </li>
                    <li class="tablinks nav-item" data-id="gas">
                        <a class="nav-link" href="javascript:void(0);"><?php echo lang('mm_operation_pqr_gas_label');?></a>
                    </li>
                    <li class="tablinks nav-item" data-id="electrical">
                        <a class="nav-link" href="javascript:void(0);"><?php echo lang('mm_operation_pqr_electrical_character_label');?></a>
                    </li>
                    <li class="tablinks nav-item" data-id="techniqe">
                        <a class="nav-link" href="javascript:void(0);"><?php echo lang('mm_operation_pqr_techique_label');?></a>
                    </li>
                    <li class="tablinks nav-item" data-id="welding_parameters">
                        <a class="nav-link" href="javascript:void(0);"><?php echo lang('mm_operation_pqr_welding_parameters_label');?></a>
                    </li>
                  
                  <!--   <li class="tablinks" data-id="tensile"><?php echo lang('mm_operation_pqr_tensile_test_label');?></li>
                    <li class="tablinks" data-id="guided"><?php echo lang('mm_operation_pqr_guided_ben_test_label');?></li>
                    <li class="tablinks" data-id="touchness"><?php echo lang('mm_operation_pqr_touchness_test_label');?></li>
                    <li class="tablinks" data-id="fillet"><?php echo lang('mm_operation_pqr_fillet_weld_test_label');?></li>
                    <li class="tablinks" data-id="other"><?php echo lang('mm_operation_pqr_other_tests_label');?></li> -->
                    </ul>
                </div>
          </div>
      </div>
</div>
</div>


<!-- form starts here -->
<div id="main-wrapper">
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-white">
            <div class="panel-heading clearfix">
                <h4 class="panel-title"></h4>
            </div>
            <div class="panel-body">
              <div class="row">
      <!--
        <h3 class="box-title m-b-0"><?php echo $form_tittle;?></h3>
        <p class="text-muted m-b-30 font-13"> <?php echo $form_tittle_small;?> </p>
      -->
        <div class="col-md-12 col-lg-12">
          <div class="col-sm-12 col-xs-12">
            <?php echo form_open_multipart($form_url); ?>
             <div class="clearfix"></div>
            <!-- Block Company Details -->
            <div class="row blockdiv" id="companydetails">
                <div class="col-sm-12 col-xs-12 box-title-head">
                  <h3 class="box-title"><?php echo lang('mm_operation_pqr_company_details_label');?></h3>
                </div>
                
                <!-- Procedure Qulation specification No -->
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('pqr_no')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_procedure_qulation_spec_no_label');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_pqr_procedure_qulation_spec_no_label');?>" id="pqr_no" name="pqr_no" value="<?php echo $pqr_no ;?>" autocomplete="off">
                    <?PHP if(form_error('pqr_no')){ echo '<span class="help-block">'.form_error('pqr_no').'</span>';} ?>
                    </div>
                </div>
                <!-- Inspection Date -->
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('inspection_date')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_inspection_date_label');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control date-picker" placeholder="<?php echo lang('mm_operation_pqr_inspection_date_label');?>" id="inspection_date" name="inspection_date" value="<?php echo $inspection_date ;?>" autocomplete="off">
                    <?PHP if(form_error('inspection_date')){ echo '<span class="help-block">'.form_error('inspection_date').'</span>';} ?>
                    </div>
                </div>
                <!-- Welding Procedure Specification No -->
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('wps_no')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_welding_procedure_spec_no_label');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_pqr_welding_procedure_spec_no_label');?>" id="wps_no" name="wps_no" value="<?php echo $wps_no ;?>" autocomplete="off">
                    <?PHP if(form_error('wps_no')){ echo '<span class="help-block">'.form_error('wps_no').'</span>';} ?>
                    </div>
                </div>
                <!-- Welding Process 1 -->
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('process1')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_welding_process_1_label');?><span class="text-danger">*</span></label>
                    <?php   
                      $attrib = 'class="form-control select2 block1_process" name="process1"  data-live-search="true" data-width="100%"  id="process1"';
                      echo form_dropdown('process_id', $drop_menu_process, set_value('process_id', (isset($process1)) ? $process1 : ''), $attrib);
                    ?>
                    <?PHP if(form_error('process1')){ echo '<span class="help-block">'.form_error('process1').'</span>';} ?>
                    </div>
                </div>
                <!-- Welding Process 2 -->
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_welding_process_2_label');?></label>
                    <?php   
                      $attrib = 'class="form-control select2 block1_process" name="process2"  data-live-search="true" data-width="100%"  id="process2"';
                      echo form_dropdown('process_id', $drop_menu_process, set_value('process_id', (isset($process2)) ? $process2 : ''), $attrib);
                    ?>                    
                    </div>
                </div>
                <!-- Welding Process 3 -->
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_welding_process_3_label');?></label>
                    <?php   
                      $attrib = 'class="form-control select2 block1_process" name="process3" data-live-search="true" data-width="100%"  id="process3"';
                      echo form_dropdown('process_id', $drop_menu_process, set_value('process_id', (isset($process3)) ? $process3 : ''), $attrib);
                    ?> 
                    </div>
                </div>
                <!-- Types -->
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('type_id')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_type_label');?><span class="text-danger">*</span></label>
                    <?php   
                      $attrib = 'class="form-control select2" multiple="multiple" name="type_id" data-live-search="true" data-width="100%"  id="type_id"';
                      echo form_dropdown('type_id', $drop_menu_type, set_value('type_id', (isset($type_id)) ? $type_id : ''), $attrib);
                    ?>
                    <?PHP if(form_error('type_id')){ echo '<span class="help-block">'.form_error('type_id').'</span>';} ?>
                    </div>
                </div>
                <!-- Code -->
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('code_id')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_code_label');?><span class="text-danger">*</span></label>
                    <?php   
                      $attrib = 'class="form-control select2" name="code_id" multiple="multiple" data-live-search="true" data-width="100%"  id="code_id"';
                      echo form_dropdown('code_id', $drop_menu_code, set_value('code_id', (isset($code_id)) ? $code_id : ''), $attrib);
                    ?>
                    <?PHP if(form_error('code_id')){ echo '<span class="help-block">'.form_error('code_id').'</span>';} ?>
                    </div>
                </div>
                <!-- Others -->
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_post_heat_others_label');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_pqr_post_heat_others_label');?>" id="pqr_other" name="pqr_other" value="<?php echo $pqr_other ;?>" autocomplete="off">
                    </div>
                </div>


                <!-- Post Weld Heat Treatment get yes or no -->
                <!-- <div class="col-sm-3 col-xs-3">
                    <div class="form-group <?PHP if(form_error('pwht')){ echo 'has-error';} ?>">
                        <label class="display-block">Pre Payment <span class="text-danger">*</span></label>
                        <label class="radio-inline">
                            <div class="choice"><input type="radio" name="pwht" class="styled" <?php if($pwht=='1'){?> checked="checked"  <?php }?>value="1" > Yes
                            </div>  
                        </label>
                        <label class="radio-inline">
                            <div class="choice"><input type="radio" name="pwht" class="styled" checked="" <?php if($pwht=='0'){?> checked="checked" <?php }?>  value="0">No
                            </div>                                                          
                        </label>
                    </div>
                </div> -->
                <!-- Next button -->
                <div class="col-sm-12 col-xs-12">
                    <button class="btn btn-info pull-right" type="button"  id="btnCompanyDetails" data-block="1" data-block-name="companydetails">Save & Next</button>
                </div>
            </div>
            <!-- Block Joints -->
            <div class="row blockdiv hide" id="joints">
                <div class="col-sm-12 col-xs-12 box-title-head">
                    <h3 class="box-title">
                        <?php echo lang('mm_operation_pqr_joints_label');?>
                        <button class="btn btn-primary pull-right img-btn" type="button" id="addJointImage">Add Image</button> 
                    </h3>
                </div>
                <!-- joints value -->
                <?php if(isset($value) &&  !empty($value)){ 
                    foreach($joints_a as $key => $value){
                ?>

                <div class="col-sm-12 col-xs-12 jointblockrepeat" data-rel="<?php echo $key ?>" id="jointblock<?php echo $key ?>">
                    <!-- get joint value block -->
                    <div class="col-sm-4 col-xs-4">                        
                        <div class="row variableDiv">
                            <div class="col-sm-5 col-xs-5">
                                <div class="form-group">
                                    <label for="joints_A"><?php echo lang('mm_operation_pqr_joint_groove_angle_label');?></label>
                                </div>
                            </div>
                            <div class="col-sm-5 col-xs-5">
                                <div class="form-group">
                                    <input type="text" class="form-control joints_A" placeholder="<?php echo lang('mm_operation_pqr_joint_groove_angle_label');?>" name="joints_A[]" value="<?php echo $value ?>" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row variableDiv">
                            <div class="col-sm-5 col-xs-5">
                                <div class="form-group">
                                    <label for="joints_B"><?php echo lang('mm_operation_pqr_joint_base_label');?></label>
                                </div>
                            </div>
                            <div class="col-sm-5 col-xs-5">
                                <div class="form-group">
                                    <input type="text" class="form-control joints_B" placeholder="<?php echo lang('mm_operation_pqr_joint_base_label');?>" name="joints_B[]" value="<?php echo $joints_b[$key] ?>" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row variableDiv">
                            <div class="col-sm-5 col-xs-5">
                                <div class="form-group">
                                    <label for="joints_C"><?php echo lang('mm_operation_pqr_joint_root_face_label');?></label>
                                </div>
                            </div>
                            <div class="col-sm-5 col-xs-5">
                                <div class="form-group">
                                    <input type="text" class="form-control joints_C" placeholder="<?php echo lang('mm_operation_pqr_joint_groove_angle_label');?>"  name="joints_C[]" value="<?php echo $joints_c[$key] ?>" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row variableDiv">
                            <div class="col-sm-5 col-xs-5">
                                <div class="form-group">
                                    <label for="joints_D"><?php echo lang('mm_operation_pqr_joint_root_gap_label');?></label>
                                </div>
                            </div>
                            <div class="col-sm-5 col-xs-5">
                                <div class="form-group">
                                    <input type="text" class="form-control joints_D" placeholder="<?php echo lang('mm_operation_pqr_joint_root_gap_label');?>" name="joints_D[]" value="<?php echo $joints_d[$key] ?>" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row variableDiv">
                            <div class="col-sm-5 col-xs-5">
                                <div class="form-group">
                                    <label for="joints_other"><?php echo lang('mm_operation_pqr_joint_other_label');?></label>
                                </div>
                            </div>
                            <div class="col-sm-5 col-xs-5">
                                <div class="form-group">
                                    <input type="text" class="form-control joints_other" placeholder="<?php echo lang('mm_operation_pqr_joint_other_label');?>"  name="joints_other[]" value="<?php echo $joints_other[$key] ?>" autocomplete="off">
                                </div>
                            </div>
                            <!-- displaying add button -->
                            <!-- <div class="col-sm-2 col-xs-2">
                                <span><button type="button" class="btn btn-success addVariable addbutton" data-id="3">+</button></span>
                            </div> -->
                        </div>
                    </div>
                    <!-- get joints image block -->
                    <div class="col-sm-6 col-xs-6">
                        <div class="col-sm-12 col-xs-12 joint_img_block">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_joint_image_label');?> <?php echo lang('mm_common_logo_size_label');?> <span class="text-danger">*</span></label>
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput"> 
                                        <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span>
                                    </div>
                                    <span class="input-group-addon btn btn-default btn-file"> 
                                        <span class="fileinput-new"><?php echo lang('mm_common_logo_name_label');?></span> 
                                        <span class="fileinput-exists"><?php echo lang('mm_common_logo_change_label');?></span>
                                        <input type="file" id="joint_photo<?php echo $key ?>" class="joints_image" name="joints_image[]" placeholder="<?php echo lang('mm_operation_pqr_joint_image_label');?>" >
                                    </span> 
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput"><?php echo lang('mm_Hrm_staffs_attachment');?></a>
                                </div>
                                <?php if($old_staffsphoto!=''){ ?> <img id="old_joint_img<?php echo $key ?>" src="<?php echo config_item('image_url').$joints_image[$key];?>" height="100" width="100"> <?php }?>
                            </div>
                            <img src="" class="joint_image_display joint_photo1" width="200px" />
                        </div>
                    </div>
                    <!-- close joint block -->
                    <div class="col-sm-2 col-xs-6">
                        <button type="button" class="btn btn-danger pull-right closeJointBlock">X</button>
                    </div>
                </div>

                <?php
                }
                }else{
                ?>
                <div class="col-sm-12 col-xs-12 jointblockrepeat" data-rel="1" id="jointblock1">
                    <!-- get joint value block -->
                    <div class="col-sm-4 col-xs-4">                        
                        <div class="row variableDiv">
                            <div class="col-sm-5 col-xs-5">
                                <div class="form-group">
                                    <label for="joints_A"><?php echo lang('mm_operation_pqr_joint_groove_angle_label');?></label>
                                </div>
                            </div>
                            <div class="col-sm-5 col-xs-5">
                                <div class="form-group">
                                    <input type="text" class="form-control joints_A" placeholder="<?php echo lang('mm_operation_pqr_joint_groove_angle_label');?>" name="joints_A[]" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row variableDiv">
                            <div class="col-sm-5 col-xs-5">
                                <div class="form-group">
                                    <label for="joints_B"><?php echo lang('mm_operation_pqr_joint_base_label');?></label>
                                </div>
                            </div>
                            <div class="col-sm-5 col-xs-5">
                                <div class="form-group">
                                    <input type="text" class="form-control joints_B" placeholder="<?php echo lang('mm_operation_pqr_joint_base_label');?>" name="joints_B[]" value="" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row variableDiv">
                            <div class="col-sm-5 col-xs-5">
                                <div class="form-group">
                                    <label for="joints_C"><?php echo lang('mm_operation_pqr_joint_root_face_label');?></label>
                                </div>
                            </div>
                            <div class="col-sm-5 col-xs-5">
                                <div class="form-group">
                                    <input type="text" class="form-control joints_C" placeholder="<?php echo lang('mm_operation_pqr_joint_groove_angle_label');?>"  name="joints_C[]" value="" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row variableDiv">
                            <div class="col-sm-5 col-xs-5">
                                <div class="form-group">
                                    <label for="joints_D"><?php echo lang('mm_operation_pqr_joint_root_gap_label');?></label>
                                </div>
                            </div>
                            <div class="col-sm-5 col-xs-5">
                                <div class="form-group">
                                    <input type="text" class="form-control joints_D" placeholder="<?php echo lang('mm_operation_pqr_joint_root_gap_label');?>" name="joints_D[]" value="" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row variableDiv">
                            <div class="col-sm-5 col-xs-5">
                                <div class="form-group">
                                    <label for="joints_other"><?php echo lang('mm_operation_pqr_joint_other_label');?></label>
                                </div>
                            </div>
                            <div class="col-sm-5 col-xs-5">
                                <div class="form-group">
                                    <input type="text" class="form-control joints_other" placeholder="<?php echo lang('mm_operation_pqr_joint_other_label');?>"  name="joints_other[]" value="" autocomplete="off">
                                </div>
                            </div>
                            <!-- displaying add button -->
                            <!-- <div class="col-sm-2 col-xs-2">
                                <span><button type="button" class="btn btn-success addVariable addbutton" data-id="3">+</button></span>
                            </div> -->
                        </div>
                    </div>
                    <!-- get joints image block -->
                    <div class="col-sm-6 col-xs-6">
                        <div class="col-sm-12 col-xs-12 joint_img_block">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_joint_image_label');?> <?php echo lang('mm_common_logo_size_label');?> <span class="text-danger">*</span></label>
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput"> 
                                        <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span>
                                    </div>
                                    <span class="input-group-addon btn btn-default btn-file"> 
                                        <span class="fileinput-new"><?php echo lang('mm_common_logo_name_label');?></span> 
                                        <span class="fileinput-exists"><?php echo lang('mm_common_logo_change_label');?></span>
                                        <input type="file" id="joint_photo1" class="joints_image" name="joints_image[]" placeholder="<?php echo lang('mm_operation_pqr_joint_image_label');?>" >
                                    </span> 
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput"><?php echo lang('mm_Hrm_staffs_attachment');?></a>
                                </div>
                                <?php if($old_staffsphoto!=''){ ?> <img src="<?php echo config_item('image_url').$old_staffsphoto;?>" height="100" width="100"> <?php }?>
                            </div>
                            <img src="" class="joint_image_display joint_photo1" width="200px" />
                        </div>
                    </div>
                    <!-- close joint block -->
                    <div class="col-sm-2 col-xs-6">
                        <button type="button" class="btn btn-danger pull-right closeJointBlock">X</button>
                    </div>
                </div>
                <?php } ?>  
                <div class="col-sm-12 col-xs-12">
                    <input type="hidden" name="joints_id" id="joints_id" />
                    <button class="btn btn-info pull-right" type="button" id="btnJoints">Save & Next</button>
                    <button class="btn btn-warning pull-left previous" type="button" data-btn="1"><i class="glyphicon glyphicon-chevron-left"></i> Previous</button>
                </div>
            </div>
            <!-- Block Base Mentals -->
            <div class="row blockdiv hide" id="basemetals">
                <div class="col-sm-12 col-xs-12 box-title-head">
                  <h3 class="box-title"><?php echo lang('mm_operation_pqr_base_metals_label');?></h3>
                </div>
                <div class="col-sm-12 col-xs-12">
                    <div class="row">
                        <!-- Company Details -->
                        <div class="col-sm-3 col-xs-3">
                          <div class="form-group <?PHP if(form_error('company_id')){ echo 'has-error';} ?>">
                            <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_company_name_label');?><span class="text-danger">*</span></label>
                            <?php   
                              $attrib = 'class="form-control select2" name="company_id"  data-live-search="true" data-width="100%"  id="company_id"';
                              echo form_dropdown('company_id', $drop_menu_company, set_value('company_id', (isset($company_id)) ? $company_id : ''), $attrib);
                              ?> 
                            <?PHP if(form_error('company_id')){ echo '<span class="help-block">'.form_error('company_id').'</span>';} ?>
                            </div>
                        </div>
                    </div>
                    <!-- Pno to Pno -->
                    <div class="row">
                        <div class="col-sm-3 col-xs-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_pno_label');?>-<?php echo lang('mm_operation_pqr_to_pno_label');?><span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-sm-8 col-xs-8">
                            <div class="row">
                                <div class="col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        <?php   
                                          $attrib = 'class="form-control select2" name="pno_id"  data-live-search="true" data-width="100%"  id="pno_id"';
                                          echo form_dropdown('pno_id', $drop_menu_pno, set_value('pno_id', (isset($pno_id)) ? $pno_id : ''), $attrib);
                                        ?> 
                                        <?PHP if(form_error('pno_id')){ echo '<span class="help-block">'.form_error('pno_id').'</span>';} ?>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        <?php   
                                          $attrib = 'class="form-control select2" name="to_pno_id"  data-live-search="true" data-width="100%"  id="to_pno_id"';
                                          echo form_dropdown('pno_id', $drop_menu_pno, set_value('pno_id', (isset($pno_id)) ? $pno_id : ''), $attrib);
                                        ?> 
                                        <?PHP if(form_error('to_pno_id')){ echo '<span class="help-block">'.form_error('to_pno_id').'</span>';} ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Group NO to Group No -->
                    <div class="row">
                        <div class="col-sm-3 col-xs-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_group_no_label');?>-<?php echo lang('mm_operation_pqr_to_group_no_label');?><span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-sm-8 col-xs-8">
                            <div class="row">
                                <div class="col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_pqr_group_no_label');?>" id="group_no" name="group_no" value="<?php echo $group_no ;?>" autocomplete="off">
                                        <?PHP if(form_error('group_no')){ echo '<span class="help-block">'.form_error('group_no').'</span>';} ?>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_pqr_to_group_no_label');?>" id="to_group_no" name="to_group_no" value="<?php echo $to_group_no ;?>" autocomplete="off">
                                        <?PHP if(form_error('to_group_no')){ echo '<span class="help-block">'.form_error('to_group_no').'</span>';} ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Material Specification -->
                    <div class="row">
                        <div class="col-sm-3 col-xs-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_material_spec_label');?><span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-sm-8 col-xs-8">
                            <div class="row">
                                <div class="col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_pqr_material_spec_label');?>" id="material_spe" name="material_spe" value="<?php echo $material_spe ;?>" autocomplete="off">
                                        <?PHP if(form_error('material_spe')){ echo '<span class="help-block">'.form_error('material_spe').'</span>';} ?>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_pqr_material_spec_label');?>" id="to_material_spe" name="to_material_spe" value="<?php echo $to_material_spe ;?>" autocomplete="off">
                                        <?PHP if(form_error('to_material_spe')){ echo '<span class="help-block">'.form_error('to_material_spe').'</span>';} ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Type or Grade or UNS Number -->
                    <div class="row">
                        <div class="col-sm-3 col-xs-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_tgu_no_label');?><span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-sm-8 col-xs-8">
                            <div class="row">
                                <div class="col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_pqr_tgu_no_label');?>" id="tgu_no" name="tgu_no" value="<?php echo $tgu_no ;?>" autocomplete="off">
                                        <?PHP if(form_error('tgu_no')){ echo '<span class="help-block">'.form_error('tgu_no').'</span>';} ?>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_pqr_tgu_no_label');?>" id="to_tgu_no" name="to_tgu_no" value="<?php echo $to_tgu_no ;?>" autocomplete="off">
                                        <?PHP if(form_error('to_tgu_no')){ echo '<span class="help-block">'.form_error('to_tgu_no').'</span>';} ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Diameter of test Coupon -->
                    <div class="row">
                        <div class="col-sm-3 col-xs-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_diameter_test_label');?><span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-sm-8 col-xs-8">
                            <div class="row">
                                <div class="col-sm-8 col-xs-8">
                                    <div class="form-group">
                                        <?php   
                                          $attrib = 'class="form-control select2" name="diameter_id"  data-live-search="true" data-width="100%"  id="diameter_id"';
                                          echo form_dropdown('diameter_id', $drop_menu_diameter, set_value('diameter_id', (isset($diameter_id)) ? $diameter_id : ''), $attrib);
                                        ?> 
                                        <?PHP if(form_error('diameter_id')){ echo '<span class="help-block">'.form_error('diameter_id').'</span>';} ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Thickness of test Coupon -->
                    <div class="row">
                        <div class="col-sm-3 col-xs-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_thickness_test_label');?><span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-sm-8 col-xs-8">
                            <div class="row">
                                <div class="col-sm-8 col-xs-8">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_pqr_thickness_test_label');?>" id="thickness_test" name="thickness_test" value="<?php echo $thickness_test ;?>" autocomplete="off">
                                        <?PHP if(form_error('thickness_test')){ echo '<span class="help-block">'.form_error('thickness_test').'</span>';} ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Heat No. -->
                    <div class="row">
                        <div class="col-sm-3 col-xs-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_heat_no_label');?><span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-sm-8 col-xs-8">
                            <div class="row">
                                <div class="col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_pqr_heat_no_label');?>" id="base_heat_no" name="base_heat_no" value="<?php echo $base_heat_no ;?>" autocomplete="off">
                                        <?PHP if(form_error('base_heat_no')){ echo '<span class="help-block">'.form_error('base_heat_no').'</span>';} ?>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_pqr_heat_no_label');?>" id="base_to_heat_no" name="base_to_heat_no" value="<?php echo $base_to_heat_no ;?>" autocomplete="off">
                                        <?PHP if(form_error('base_to_heat_no')){ echo '<span class="help-block">'.form_error('base_to_heat_no').'</span>';} ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Others -->
                    <div class="row">
                        <div class="col-sm-3 col-xs-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_others_label');?></label>
                            </div>
                        </div>
                        <div class="col-sm-8 col-xs-8">
                            <div class="row">
                                <div class="col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_pqr_others_label');?>" id="base_others" name="base_others" value="<?php echo $base_others ;?>" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_pqr_others_label');?>" id="base_to_others" name="base_to_others" value="<?php echo $base_to_others ;?>" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-info pull-right" type="button" id="btnBasemetals">Save & Next</button>
                    <button class="btn btn-warning pull-left previous" type="button" data-btn="2"><i class="glyphicon glyphicon-chevron-left"></i> Previous</button>
                </div>
            </div>
            <!-- Filler Metal -->
            <div class="row blockdiv hide" id="filler">
                <div class="col-sm-12 col-xs-12 box-title-head">
                  <h3 class="box-title"><?php echo lang('mm_operation_pqr_filler_metals_label');?></h3>
                </div>
                <div class="col-sm-12 col-xs-12">
                    
                    <table class="table table-bordered" id="mtable">
                        <tbody>
                            <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_process_label');?></label></td>
                                 <?php if(isset($value) &&  !empty($value)){ 
                                    foreach($fno_id as $k => $value){ ?>
                                    <td>
                                        <input type="text" class="form-control processVal" placeholder="<?php echo lang('mm_operation_pqr_process_label');?>" autocomplete="off" disabled>
                                    </td>
                                <?php } }else{ ?>
                                
                                    <td>
                                        <input type="text" class="form-control processVal" placeholder="<?php echo lang('mm_operation_pqr_process_label');?>" autocomplete="off" disabled>
                                    </td>
                                <?php }?>
                            </tr>
                            <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_filler_metal_fno_label');?><span class="text-danger">*</span></label></td>
                                <?php if(isset($value) &&  !empty($value)){ 
                                    foreach($fno_id as $k => $value){  $count = $k+2; ?>
                                    <td data-col="2" data-val="<?= $count ?>">
                                        <?php   
                                          $attrib = 'class="form-control select2 fno_id" name="fno_id[]" child="1" data-live-search="true" data-width="100%" style="width:100%;" ';
                                          echo form_dropdown('fno_id', $drop_menu_fno, set_value('fno_id', (isset($value)) ? $value : ''), $attrib);
                                          ?> 
                                        <?PHP if(form_error('fno_id')){ echo '<span class="help-block">'.form_error('fno_id').'</span>';} ?>
                                    </td>
                                <?php } }else{
                                ?>
                                    <td data-col="2" data-val="0">
                                        <?php   
                                          $attrib = 'class="form-control select2 fno_id" name="fno_id[]" child="1" data-live-search="true" data-width="100%" style="width:100%;" ';
                                          echo form_dropdown('fno_id', $drop_menu_fno, set_value('fno_id', (isset($fno_id)) ? $fno_id : ''), $attrib);
                                          ?> 
                                        <?PHP if(form_error('fno_id')){ echo '<span class="help-block">'.form_error('fno_id').'</span>';} ?>
                                    </td>
                                <?php }?>
                            </tr>
                             <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_weld_metal_analysis_no_label');?><span class="text-danger">*</span></label></td>
                                <?php if(isset($value) &&  !empty($value)){ 
                                    foreach($a_no as $k => $value){  $count = $k+2; ?>
                                        <td>
                                            <input type="text" class="form-control a_no" placeholder="<?php echo lang('mm_operation_pqr_weld_metal_analysis_no_label');?>" name="a_no[]" value="<?php echo $value ?>" autocomplete="off">
                                            <?PHP if(form_error('a_no')){ echo '<span class="help-block">'.form_error('a_no').'</span>';} ?>
                                        </td>
                                <?php }}else{ ?>
                                        <td>
                                            <input type="text" class="form-control a_no" placeholder="<?php echo lang('mm_operation_pqr_weld_metal_analysis_no_label');?>" name="a_no[]" value="" autocomplete="off">
                                            <?PHP if(form_error('a_no')){ echo '<span class="help-block">'.form_error('a_no').'</span>';} ?>
                                        </td>
                                <?php }?>
                            </tr>
                             <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_specification_no_label');?><span class="text-danger">*</span></label></td>
                                 <?php if(isset($value) &&  !empty($value)){ 
                                    foreach($sfa_no as $k => $value){  $count = $k+2; ?>
                                    <td>
                                        <input type="text" class="form-control sfa_no" placeholder="<?php echo lang('mm_operation_pqr_specification_no_label');?>" name="sfa_no[]" value="<?php echo $value ?>" autocomplete="off">
                                        <?PHP if(form_error('sfa_no')){ echo '<span class="help-block">'.form_error('sfa_no').'</span>';} ?>
                                    </td>
                                <?php }}else{ ?>
                                    <td>
                                        <input type="text" class="form-control sfa_no" placeholder="<?php echo lang('mm_operation_pqr_specification_no_label');?>" name="sfa_no[]" value="" autocomplete="off">
                                        <?PHP if(form_error('sfa_no')){ echo '<span class="help-block">'.form_error('sfa_no').'</span>';} ?>
                                    </td>
                                <?php }?>
                            </tr>
                             <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_aws_classfication_no_label');?><span class="text-danger">*</span></label></td>
                                 <?php if(isset($value) &&  !empty($value)){ 
                                    foreach($aws_classfication as $k => $value){  $count = $k+2; ?>
                                    <td>
                                        <input type="text" class="form-control aws_classfication" placeholder="<?php echo lang('mm_operation_pqr_aws_classfication_no_label');?>"  name="aws_classfication[]" value="<?php echo $value ?>" autocomplete="off">
                                        <?PHP if(form_error('aws_classfication')){ echo '<span class="help-block">'.form_error('aws_classfication').'</span>';} ?>
                                    </td>
                                <?php }}else{ ?>
                                    <td>
                                        <input type="text" class="form-control aws_classfication" placeholder="<?php echo lang('mm_operation_pqr_aws_classfication_no_label');?>"  name="aws_classfication[]" value="" autocomplete="off">
                                        <?PHP if(form_error('aws_classfication')){ echo '<span class="help-block">'.form_error('aws_classfication').'</span>';} ?>
                                    </td>
                                <?php }?>
                            </tr>
                             <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_size_filler_metal_label');?><span class="text-danger">*</span></label></td>
                                 <?php if(isset($value) &&  !empty($value)){ 
                                    foreach($size_filler_metal as $k => $value){  $count = $k+2; ?>
                                    <td>
                                        <input type="text" class="form-control size_filler_metal" placeholder="<?php echo lang('mm_operation_pqr_size_filler_metal_label');?>"  name="size_filler_metal[]" value="<?php echo $value ?>" autocomplete="off">
                                        <?PHP if(form_error('size_filler_metal')){ echo '<span class="help-block">'.form_error('size_filler_metal').'</span>';} ?>
                                    </td>
                                <?php }}else{ ?>
                                    <td>
                                        <input type="text" class="form-control size_filler_metal" placeholder="<?php echo lang('mm_operation_pqr_size_filler_metal_label');?>"  name="size_filler_metal[]" value="" autocomplete="off">
                                        <?PHP if(form_error('size_filler_metal')){ echo '<span class="help-block">'.form_error('size_filler_metal').'</span>';} ?>
                                    </td>
                                <?php }?>
                            </tr>
                             <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_filler_supply_metal_filler_label');?><span class="text-danger">*</span></label></td>
                                 <?php if(isset($value) &&  !empty($value)){ 
                                    foreach($filler_supply_metal as $k => $value){  $count = $k+2; ?>
                                    <td>
                                        <input type="text" class="form-control filler_supply_metal" placeholder="<?php echo lang('mm_operation_pqr_filler_supply_metal_filler_label');?>"  name="filler_supply_metal[]" value="<?php echo $value ?>" autocomplete="off">
                                        <?PHP if(form_error('filler_supply_metal')){ echo '<span class="help-block">'.form_error('filler_supply_metal').'</span>';} ?>
                                    </td>
                                    <?php }}else{ ?>
                                    <td>
                                        <input type="text" class="form-control filler_supply_metal" placeholder="<?php echo lang('mm_operation_pqr_filler_supply_metal_filler_label');?>"  name="filler_supply_metal[]" value="" autocomplete="off">
                                        <?PHP if(form_error('filler_supply_metal')){ echo '<span class="help-block">'.form_error('filler_supply_metal').'</span>';} ?>
                                    </td>
                                    <?php }?>
                            </tr>
                             <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_filler_Electrode_flux_label');?><span class="text-danger">*</span></label></td>
                                 <?php if(isset($value) &&  !empty($value)){ 
                                    foreach($filler_electrode as $k => $value){  $count = $k+2; ?>
                                    <td>
                                        <input type="text" class="form-control filler_electrode" placeholder="<?php echo lang('mm_operation_pqr_filler_Electrode_flux_label');?>"  name="filler_electrode[]" value="<?php echo $value ?>" autocomplete="off">
                                        <?PHP if(form_error('filler_electrode')){ echo '<span class="help-block">'.form_error('filler_electrode').'</span>';} ?>
                                    </td>
                                <?php }}else{ ?>
                                    <td>
                                        <input type="text" class="form-control filler_electrode" placeholder="<?php echo lang('mm_operation_pqr_filler_Electrode_flux_label');?>"  name="filler_electrode[]" value="" autocomplete="off">
                                        <?PHP if(form_error('filler_electrode')){ echo '<span class="help-block">'.form_error('filler_electrode').'</span>';} ?>
                                    </td>
                                <?php }?>
                                
                            </tr>
                             <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_filler_flux_type_form_label');?><span class="text-danger">*</span></label></td>
                                <?php if(isset($value) &&  !empty($value)){ 
                                    foreach($filler_flux_type as $k => $value){  $count = $k+2; ?>
                                    <td>
                                        <input type="text" class="form-control filler_flux_type" placeholder="<?php echo lang('mm_operation_pqr_filler_flux_type_form_label');?>"  name="filler_flux_type[]" value="<?php echo $value ?>" autocomplete="off">
                                        <?PHP if(form_error('filler_flux_type')){ echo '<span class="help-block">'.form_error('filler_flux_type').'</span>';} ?>
                                    </td>
                                <?php } }else{ ?>
                                    <td>
                                        <input type="text" class="form-control filler_flux_type" placeholder="<?php echo lang('mm_operation_pqr_filler_flux_type_form_label');?>"  name="filler_flux_type[]" value="" autocomplete="off">
                                        <?PHP if(form_error('filler_flux_type')){ echo '<span class="help-block">'.form_error('filler_flux_type').'</span>';} ?>
                                    </td>
                                <?php }?>
                            </tr>
                             <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_filler_flux_trade_label');?><span class="text-danger">*</span></label></td>
                                 <?php if(isset($value) &&  !empty($value)){ 
                                    foreach($filler_flux_trade as $k => $value){   ?>
                                    <td>
                                        <input type="text" class="form-control filler_flux_trade" placeholder="<?php echo lang('mm_operation_pqr_filler_flux_trade_label');?>"  name="filler_flux_trade[]" value="<?php echo $value ?>" autocomplete="off">
                                        <?PHP if(form_error('filler_flux_trade')){ echo '<span class="help-block">'.form_error('filler_flux_trade').'</span>';} ?>
                                    </td>
                                <?php } }else{ ?>
                                    <td>
                                        <input type="text" class="form-control filler_flux_trade" placeholder="<?php echo lang('mm_operation_pqr_filler_flux_trade_label');?>"  name="filler_flux_trade[]" value="" autocomplete="off">
                                        <?PHP if(form_error('filler_flux_trade')){ echo '<span class="help-block">'.form_error('filler_flux_trade').'</span>';} ?>
                                    </td>
                                <?php }?>
                            </tr>
                             <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_filler_weld_thickness_label');?><span class="text-danger">*</span></label></td>
                                <?php if(isset($value) &&  !empty($value)){ 
                                foreach($filer_weld_thickness as $k => $value){  $count = $k+2; ?>
                                    <td>
                                        <input type="text" class="form-control filer_weld_thickness" placeholder="<?php echo lang('mm_operation_pqr_filler_weld_thickness_label');?>"  name="filer_weld_thickness[]" value="<?php echo $value ?>" autocomplete="off">
                                        <?PHP if(form_error('filer_weld_thickness')){ echo '<span class="help-block">'.form_error('filer_weld_thickness').'</span>';} ?>
                                    </td>
                                <?php }}else{ ?>
                                <td>
                                    <input type="text" class="form-control filer_weld_thickness" placeholder="<?php echo lang('mm_operation_pqr_filler_weld_thickness_label');?>"  name="filer_weld_thickness[]" value="" autocomplete="off">
                                    <?PHP if(form_error('filer_weld_thickness')){ echo '<span class="help-block">'.form_error('filer_weld_thickness').'</span>';} ?>
                                </td>
                                <?php }?>
                            </tr>
                             <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_lot_no_label');?><span class="text-danger">*</span></label></td>
                                 <?php if(isset($value) &&  !empty($value)){ 
                                foreach($lot_no as $k => $value){  $count = $k+2; ?>
                                <td>
                                    <input type="text" class="form-control lot_no" placeholder="<?php echo lang('mm_operation_pqr_lot_no_label');?>"  name="lot_no[]" value="<?php echo $value ?>" autocomplete="off">
                                    <?PHP if(form_error('lot_no')){ echo '<span class="help-block">'.form_error('lot_no').'</span>';} ?>
                                </td>
                                <?php } }else{ ?>
                                <td>
                                    <input type="text" class="form-control lot_no" placeholder="<?php echo lang('mm_operation_pqr_lot_no_label');?>"  name="lot_no[]" value="" autocomplete="off">
                                    <?PHP if(form_error('lot_no')){ echo '<span class="help-block">'.form_error('lot_no').'</span>';} ?>
                                </td>
                                <?php }?>
                            </tr> 
                            <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_metal_other_label');?></label></td>
                                <?php if(isset($fille_other) &&  !empty($value)){ 
                                foreach($a_no as $k => $value){  $count = $k+2; ?>
                                    <td>
                                        <input type="text" class="form-control fille_other" placeholder="<?php echo lang('mm_operation_pqr_metal_other_label');?>"  name="fille_other[]" value="<?php echo $value ?>" autocomplete="off">
                                    </td>
                                <?php } } else{ ?>
                                    <td>
                                        <input type="text" class="form-control fille_other" placeholder="<?php echo lang('mm_operation_pqr_metal_other_label');?>"  name="fille_other[]" value="" autocomplete="off">
                                    </td>
                                <?php }?>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <input type="hidden" name="filler_id" id="filler_id" />
                <button class="btn btn-info pull-right" type="button" id="btnFillermetals">Save & Next</button>
                <button class="btn btn-warning pull-left previous" type="button" data-btn="3"><i class="glyphicon glyphicon-chevron-left"></i> Previous</button>
            </div>
            <!-- position preheat -->
            <div class="row blockdiv hide" id="position_preheat">
                <div class="col-sm-12 col-xs-12 box-title-head">
                  <h3 class="box-title"><?php echo lang('mm_operation_pqr_position_label');?></h3>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('position_id')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_position_groove_label');?><span class="text-danger">*</span></label>
                    <?php   
                      $attrib = 'class="form-control select2" name="position_id" data-live-search="true" data-width="100%"  id="position_id"';
                      echo form_dropdown('position_id', $drop_menu_position, set_value('position_id', (isset($position_id)) ? $position_id : ''), $attrib);
                    ?>
                    <?PHP if(form_error('position_id')){ echo '<span class="help-block">'.form_error('position_id').'</span>';} ?>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('weld_progression')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_weld_progression_label');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_pqr_weld_progression_label');?>" id="weld_progression" name="weld_progression" value="<?php echo $weld_progression ;?>" autocomplete="off">
                    <?PHP if(form_error('weld_progression')){ echo '<span class="help-block">'.form_error('weld_progression').'</span>';} ?>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('position_other')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_others_label');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_pqr_others_label');?>" id="position_other" name="position_other" value="<?php echo $position_other ;?>" autocomplete="off">
                    <?PHP if(form_error('position_other')){ echo '<span class="help-block">'.form_error('position_other').'</span>';} ?>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-12 col-xs-12 box-title-head">
                  <h3 class="box-title"><?php echo lang('mm_operation_pqr_preheat_label');?></h3>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('preheat_temp_min')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_preheat_temp_min_label');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_pqr_preheat_temp_min_label');?>" id="preheat_temp_min" name="preheat_temp_min" value="<?php echo $preheat_temp_min ;?>" autocomplete="off">
                    <?PHP if(form_error('preheat_temp_min')){ echo '<span class="help-block">'.form_error('preheat_temp_min').'</span>';} ?>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('interpass_temp_max')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_interpass_temp_max_label');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_pqr_interpass_temp_max_label');?>" id="interpass_temp_max" name="interpass_temp_max" value="<?php echo $interpass_temp_max ;?>" autocomplete="off">
                    <?PHP if(form_error('interpass_temp_max')){ echo '<span class="help-block">'.form_error('interpass_temp_max').'</span>';} ?>
                    </div>
                </div>
                <div class="col-sm-12 col-xl-12">
                    <button class="btn btn-info pull-right" type="button" id="btnposition_preheat">Save & Next</button>
                    <button class="btn btn-warning pull-left previous" type="button" data-btn="4"><i class="glyphicon glyphicon-chevron-left"></i> Previous</button>
                </div>
            </div>
            <!-- Post Weld Heat Treatment -->
            <div class="row blockdiv hide" id="post">
                <div class="col-sm-12 col-xs-12 box-title-head">
                  <h3 class="box-title"><?php echo lang('mm_operation_pqr_post_weld_heat_label');?></h3>
                </div>

                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('temp_range')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_temp_range_label');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_pqr_temp_range_label');?>" id="temp_range" name="temp_range" value="<?php echo $temp_range ;?>" autocomplete="off">
                    <?PHP if(form_error('temp_range')){ echo '<span class="help-block">'.form_error('temp_range').'</span>';} ?>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('soak_period')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_soak_period_label');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_pqr_soak_period_label');?>" id="soak_period" name="soak_period" value="<?php echo $soak_period ;?>" autocomplete="off">
                    <?PHP if(form_error('soak_period')){ echo '<span class="help-block">'.form_error('soak_period').'</span>';} ?>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('heat_rate_up_to')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_heat_rate_up_to_label');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_pqr_heat_rate_up_to_label');?>" id="heat_rate_up_to" name="heat_rate_up_to" value="<?php echo $heat_rate_up_to ;?>" autocomplete="off">
                    <?PHP if(form_error('heat_rate_up_to')){ echo '<span class="help-block">'.form_error('heat_rate_up_to').'</span>';} ?>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('heat_rate_from')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_heat_rate_from_label');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_pqr_heat_rate_from_label');?>" id="heat_rate_from" name="heat_rate_from" value="<?php echo $heat_rate_from ;?>" autocomplete="off">
                    <?PHP if(form_error('heat_rate_from')){ echo '<span class="help-block">'.form_error('heat_rate_from').'</span>';} ?>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('control_heat_rate')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_control_heat_rate_label');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_pqr_control_heat_rate_label');?>" id="control_heat_rate" name="control_heat_rate" value="<?php echo $control_heat_rate ;?>" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('cooling_rate')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_control_cooling_rate_label');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_pqr_control_cooling_rate_label');?>" id="cooling_rate" name="cooling_rate" value="<?php echo $cooling_rate ;?>" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('post_heat_other')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_post_heat_others_label');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_pqr_post_heat_others_label');?>" id="post_heat_other" name="post_heat_other" value="<?php echo $post_heat_other ;?>" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-12 col-xl-12">
                    <button class="btn btn-info pull-right" type="button" id="btnpost">Save & Next</button>
                    <button class="btn btn-warning pull-left previous" type="button" data-btn="5"><i class="glyphicon glyphicon-chevron-left"></i> Previous</button>
                </div>
            </div>
            <!-- Gas -->
            <div class="row blockdiv hide" id="gas">
                <div class="col-sm-12 col-xs-12 box-title-head">
                  <h3 class="box-title"><?php echo lang('mm_operation_pqr_gas_label');?></h3>
                </div>

                <table class="table">
                  <thead>
                    <tr>
                      <th>
                        <input type="text" class="form-control processGas" placeholder="<?php echo lang('mm_operation_pqr_process_label');?>" name="process_in_gas" value="<?php echo $process_in_gas ;?>" autocomplete="off" disabled>
                        
                      </th>
                      <th>
                        <?php echo lang('mm_operation_pqr_gas_td_label');?>
                      </th>
                      <th>
                        <?php echo lang('mm_operation_pqr_post_others_label');?>
                      </th>
                      <th>
                        <?php echo lang('mm_operation_pqr_flow_rate_cfh_label');?>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <?php echo lang('mm_operation_pqr_shielding_label');?>
                      </td>
                      <td>
                        <input type="text" class="form-control" id="shielding_gas" name="shielding_gas" value="<?php echo $shielding_gas ;?>" autocomplete="off">
                        <?PHP if(form_error('shielding_gas')){ echo '<span class="help-block">'.form_error('shielding_gas').'</span>';} ?>
                      </td>
                      <td>
                        <input type="text" class="form-control" id="shielding_percent" name="shielding_percent" value="<?php echo $shielding_percent ;?>" autocomplete="off">
                        <?PHP if(form_error('shielding_percent')){ echo '<span class="help-block">'.form_error('shielding_percent').'</span>';} ?>
                      </td>
                      <td>
                        <input type="text" class="form-control" id="shielding_rate" name="shielding_rate" value="<?php echo $shielding_rate ;?>" autocomplete="off">
                        <?PHP if(form_error('shielding_rate')){ echo '<span class="help-block">'.form_error('shielding_rate').'</span>';} ?>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <?php echo lang('mm_operation_pqr_backing_label');?>
                      </td>
                      <td>
                        <input type="text" class="form-control" id="backing_gas" name="backing_gas" value="<?php echo $backing_gas ;?>" autocomplete="off">
                        <?PHP if(form_error('backing_gas')){ echo '<span class="help-block">'.form_error('backing_gas').'</span>';} ?>
                      </td>
                      <td>
                        <input type="text" class="form-control" id="backing_percent" name="backing_percent" value="<?php echo $backing_percent ;?>" autocomplete="off">
                        <?PHP if(form_error('backing_percent')){ echo '<span class="help-block">'.form_error('backing_percent').'</span>';} ?>
                      </td>
                      <td>
                        <input type="text" class="form-control" id="backing_rate" name="backing_rate" value="<?php echo $backing_rate ;?>" autocomplete="off">
                        <?PHP if(form_error('backing_rate')){ echo '<span class="help-block">'.form_error('backing_rate').'</span>';} ?>
                      </td>
                    </tr>
                      <td>
                        <?php echo lang('mm_operation_pqr_trailing_label');?>
                      </td>
                     <td>
                        <input type="text" class="form-control" id="trailing_gas" name="trailing_gas" value="<?php echo $trailing_gas ;?>" autocomplete="off">
                        <?PHP if(form_error('trailing_gas')){ echo '<span class="help-block">'.form_error('trailing_gas').'</span>';} ?>
                      </td>
                      <td>
                        <input type="text" class="form-control" id="trailing_percent" name="trailing_percent" value="<?php echo $trailing_percent ;?>" autocomplete="off">
                        <?PHP if(form_error('trailing_percent')){ echo '<span class="help-block">'.form_error('trailing_percent').'</span>';} ?>
                      </td>
                      <td>
                        <input type="text" class="form-control" id="trailing_rate" name="trailing_rate" value="<?php echo $trailing_rate ;?>" autocomplete="off">
                        <?PHP if(form_error('trailing_rate')){ echo '<span class="help-block">'.form_error('trailing_rate').'</span>';} ?>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <div class="col-sm-12 col-xl-12">
                    <button class="btn btn-info pull-right" type="button" id="btngas">Save & Next</button>
                    <button class="btn btn-warning pull-left previous" type="button" data-btn="6"><i class="glyphicon glyphicon-chevron-left"></i> Previous</button>
                </div>
            </div>
            <!-- electrical character -->
            <div class="row blockdiv hide" id="electrical">
                <div class="col-sm-12 col-xs-12 box-title-head">
                  <h3 class="box-title"><?php echo lang('mm_operation_pqr_electrical_character_label');?></h3>
                </div>

                <div class="col-sm-12 col-xs-12">
                    <table class="table table-bordered" id="electrical_mtab">
                        <tbody>
                            <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_process_label');?></label></td>
                                <?php if(isset($value) &&  !empty($value)){ 
                                    foreach($elec_current as $k => $value){ $count = $k+2; ?>
                                    <td>
                                        <input type="text" name="electric_process[]" class="form-control electric_process" placeholder="<?php echo lang('mm_operation_pqr_process_label');?>" autocomplete="off" disabled>
                                    </td>
                                <?php } }else{ ?>
                                    <td>
                                        <input type="text" name="electric_process[]" class="form-control electric_process" placeholder="<?php echo lang('mm_operation_pqr_process_label');?>" autocomplete="off" disabled>
                                    </td>
                                <?php }?>
                            </tr>
                            <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_elec_currnet_label');?><span class="text-danger">*</span></label></td>
                                <?php if(isset($value) &&  !empty($value)){ 
                                    foreach($elec_current as $k => $value){ $count = $k+2; ?>
                                    <td data-col="1" data-val="<?= $count ?>">
                                        <input type="text" name="elec_current[]" class="form-control elec_current" placeholder="<?php echo lang('mm_operation_pqr_elec_currnet_label');?>" value="<?php echo $value; ?>" name="elec_current[]"  autocomplete="off">
                                        <?PHP if(form_error('elec_current')){ echo '<span class="help-block">'.form_error('elec_current').'</span>';} ?>
                                    </td>
                                <?php } }else{ ?>
                                    <td data-col="1" data-val="<?= $count ?>">
                                        <input type="text" name="elec_current[]" class="form-control elec_current" placeholder="<?php echo lang('mm_operation_pqr_elec_currnet_label');?>" name="elec_current[]"  autocomplete="off">
                                        <?PHP if(form_error('elec_current')){ echo '<span class="help-block">'.form_error('elec_current').'</span>';} ?>
                                    </td>
                                <?php }?>
                            </tr>
                             <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_elec_prolarity_label');?><span class="text-danger">*</span></label></td>
                                <?php if(isset($value) &&  !empty($value)){ 
                                    foreach($elec_prolarity as $k => $value){ ?>
                                    <td>
                                        <input type="text" name="elec_prolarity[]" class="form-control elec_prolarity" placeholder="<?php echo lang('mm_operation_pqr_elec_prolarity_label');?>" name="elec_prolarity[]" value="<?php echo $value; ?>" autocomplete="off">
                                        <?PHP if(form_error('elec_prolarity')){ echo '<span class="help-block">'.form_error('elec_prolarity').'</span>';} ?>
                                    </td>
                                <?php } }else{ ?>
                                    <td>
                                        <input type="text" name="elec_prolarity[]" class="form-control elec_prolarity" placeholder="<?php echo lang('mm_operation_pqr_elec_prolarity_label');?>" name="elec_prolarity[]"  autocomplete="off">
                                        <?PHP if(form_error('elec_prolarity')){ echo '<span class="help-block">'.form_error('elec_prolarity').'</span>';} ?>
                                    </td>
                                <?php }?>
                            </tr>
                             <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_elec_amps_label');?><span class="text-danger">*</span></label></td>
                                <?php if(isset($value) &&  !empty($value)){ 
                                    foreach($elec_amps as $k => $value){ ?>
                                    <td>
                                        <input type="text"  name="elec_amps[]" class="form-control elec_amps" placeholder="<?php echo lang('mm_operation_pqr_elec_amps_label');?>" name="elec_amps[]"  value="<?php echo $value; ?>" autocomplete="off">
                                        <?PHP if(form_error('elec_amps')){ echo '<span class="help-block">'.form_error('elec_amps').'</span>';} ?>
                                    </td>
                                <?php } }else{ ?>
                                    <td>
                                        <input type="text"  name="elec_amps[]" class="form-control elec_amps" placeholder="<?php echo lang('mm_operation_pqr_elec_amps_label');?>" name="elec_amps[]"  autocomplete="off">
                                        <?PHP if(form_error('elec_amps')){ echo '<span class="help-block">'.form_error('elec_amps').'</span>';} ?>
                                    </td>
                                <?php }?>
                            </tr>
                             <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_elec_volts_label');?><span class="text-danger">*</span></label></td>
                                <?php if(isset($value) &&  !empty($value)){ 
                                    foreach($elec_volts as $k => $value){ ?>
                                    <td>
                                        <input type="text" name="elec_volts[]" class="form-control elec_volts" value="<?php echo $value; ?>" placeholder="<?php echo lang('mm_operation_pqr_elec_volts_label');?>"  name="elec_volts[]" autocomplete="off">
                                        <?PHP if(form_error('elec_volts')){ echo '<span class="help-block">'.form_error('elec_volts').'</span>';} ?>
                                    </td>
                                <?php } }else{ ?>
                                    <td>
                                        <input type="text" name="elec_volts[]" class="form-control elec_volts" placeholder="<?php echo lang('mm_operation_pqr_elec_volts_label');?>"  name="elec_volts[]" autocomplete="off">
                                        <?PHP if(form_error('elec_volts')){ echo '<span class="help-block">'.form_error('elec_volts').'</span>';} ?>
                                    </td>
                                <?php }?>
                            </tr>
                             <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_elec_waveform_label');?><span class="text-danger">*</span></label></td>
                                <?php if(isset($value) &&  !empty($value)){ 
                                    foreach($elec_waveform as $k => $value){ ?>
                                    <td>
                                        <input type="text" name="elec_waveform[]" class="form-control elec_waveform" value="<?php echo $value; ?>" placeholder="<?php echo lang('mm_operation_pqr_elec_waveform_label');?>"  name="elec_waveform[]"  autocomplete="off">
                                        <?PHP if(form_error('elec_waveform')){ echo '<span class="help-block">'.form_error('elec_waveform').'</span>';} ?>
                                    </td>
                                <?php } }else{ ?>
                                    <td>
                                        <input type="text" name="elec_waveform[]" class="form-control elec_waveform" placeholder="<?php echo lang('mm_operation_pqr_elec_waveform_label');?>"  name="elec_waveform[]"  autocomplete="off">
                                        <?PHP if(form_error('elec_waveform')){ echo '<span class="help-block">'.form_error('elec_waveform').'</span>';} ?>
                                    </td>
                                <?php }?>
                            </tr>
                             <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_elec_power_label');?><span class="text-danger">*</span></label></td>
                                <?php if(isset($value) &&  !empty($value)){ 
                                    foreach($elec_power as $k => $value){ ?>
                                    <td>
                                        <input type="text" name="elec_power[]" class="form-control elec_power" placeholder="<?php echo lang('mm_operation_pqr_elec_power_label');?>"  name="elec_power[]" value="<?php echo $value; ?>" autocomplete="off">
                                        <?PHP if(form_error('elec_power')){ echo '<span class="help-block">'.form_error('elec_power').'</span>';} ?>
                                    </td>
                                <?php } }else{ ?>
                                    <td>
                                        <input type="text" name="elec_power[]" class="form-control elec_power" placeholder="<?php echo lang('mm_operation_pqr_elec_power_label');?>"  name="elec_power[]" autocomplete="off">
                                        <?PHP if(form_error('elec_power')){ echo '<span class="help-block">'.form_error('elec_power').'</span>';} ?>
                                    </td>
                                <?php }?>
                            </tr>
                             <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_elec_arc_label');?><span class="text-danger">*</span></label></td>
                                <?php if(isset($value) &&  !empty($value)){ 
                                    foreach($elec_arc as $k => $value){ ?>
                                    <td>
                                        <input type="text" name="elec_arc[]" class="form-control elec_arc" placeholder="<?php echo lang('mm_operation_pqr_elec_arc_label');?>"  name="elec_arc[]"  value="<?php echo $value; ?>" autocomplete="off">
                                        <?PHP if(form_error('elec_arc')){ echo '<span class="help-block">'.form_error('elec_arc').'</span>';} ?>
                                    </td>
                                <?php } }else{ ?>
                                    <td>
                                        <input type="text" name="elec_arc[]" class="form-control elec_arc" placeholder="<?php echo lang('mm_operation_pqr_elec_arc_label');?>"  name="elec_arc[]"  autocomplete="off">
                                        <?PHP if(form_error('elec_arc')){ echo '<span class="help-block">'.form_error('elec_arc').'</span>';} ?>
                                    </td>
                                <?php }?>
                            </tr>
                             <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_elec_weld_bed_label');?><span class="text-danger">*</span></label></td>
                                <?php if(isset($value) &&  !empty($value)){ 
                                    foreach($elec_weld_bed as $k => $value){ ?>
                                    <td>
                                        <input type="text" name="elec_weld_bed[]" class="form-control elec_weld_bed" placeholder="<?php echo lang('mm_operation_pqr_elec_weld_bed_label');?>"  name="elec_weld_bed[]" value="<?php echo $value; ?>" autocomplete="off">
                                        <?PHP if(form_error('elec_weld_bed')){ echo '<span class="help-block">'.form_error('elec_weld_bed').'</span>';} ?>
                                    </td>
                                <?php } }else{ ?>
                                    <td>
                                        <input type="text" name="elec_weld_bed[]" class="form-control elec_weld_bed" placeholder="<?php echo lang('mm_operation_pqr_elec_weld_bed_label');?>"  name="elec_weld_bed[]"  autocomplete="off">
                                        <?PHP if(form_error('elec_weld_bed')){ echo '<span class="help-block">'.form_error('elec_weld_bed').'</span>';} ?>
                                    </td>
                                <?php }?>
                            </tr>
                             <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_elec_type_label');?><span class="text-danger">*</span></label></td>
                                <?php if(isset($value) &&  !empty($value)){ 
                                    foreach($fno_id as $k => $value){ ?>
                                    <td>
                                        <input type="text" name="elec_type[]" class="form-control elec_type" value="<?php echo $value; ?>" placeholder="<?php echo lang('mm_operation_pqr_elec_type_label');?>"  name="elec_type[]"  autocomplete="off">
                                        <?PHP if(form_error('elec_type')){ echo '<span class="help-block">'.form_error('elec_type').'</span>';} ?>
                                    </td>
                                <?php } }else{ ?>
                                    <td>
                                        <input type="text" name="elec_type[]" class="form-control elec_type" placeholder="<?php echo lang('mm_operation_pqr_elec_type_label');?>"  name="elec_type[]"  autocomplete="off">
                                        <?PHP if(form_error('elec_type')){ echo '<span class="help-block">'.form_error('elec_type').'</span>';} ?>
                                    </td>
                                <?php }?>
                            </tr>
                             <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_elec_size_label');?><span class="text-danger">*</span></label></td>
                                <?php if(isset($value) &&  !empty($value)){ 
                                    foreach($elec_size as $k => $value){ ?>
                                    <td>
                                        <input type="text" name="elec_size[]" class="form-control elec_size" value="<?php echo $value; ?>" placeholder="<?php echo lang('mm_operation_pqr_elec_size_label');?>"  name="elec_size[]"  autocomplete="off">
                                        <?PHP if(form_error('elec_size')){ echo '<span class="help-block">'.form_error('elec_size').'</span>';} ?>
                                    </td>
                                <?php } }else{ ?>
                                    <td>
                                        <input type="text" name="elec_size[]" class="form-control elec_size" placeholder="<?php echo lang('mm_operation_pqr_elec_size_label');?>"  name="elec_size[]"  autocomplete="off">
                                        <?PHP if(form_error('elec_size')){ echo '<span class="help-block">'.form_error('elec_size').'</span>';} ?>
                                    </td>
                                <?php }?>
                                
                            </tr>
                             <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_elec_mode_label');?><span class="text-danger">*</span></label></td>
                                <?php if(isset($value) &&  !empty($value)){ 
                                    foreach($elec_mode as $k => $value){ ?>
                                    <td>
                                        <input type="text" name="elec_mode[]" class="form-control elec_mode" value="<?php echo $value; ?>" placeholder="<?php echo lang('mm_operation_pqr_elec_mode_label');?>"  name="elec_mode[]"  autocomplete="off">
                                        <?PHP if(form_error('elec_mode')){ echo '<span class="help-block">'.form_error('elec_mode').'</span>';} ?>
                                    </td>
                                <?php } }else{ ?>
                                    <td>
                                        <input type="text" name="elec_mode[]" class="form-control elec_mode" placeholder="<?php echo lang('mm_operation_pqr_elec_mode_label');?>"  name="elec_mode[]"  autocomplete="off">
                                        <?PHP if(form_error('elec_mode')){ echo '<span class="help-block">'.form_error('elec_mode').'</span>';} ?>
                                    </td>
                                <?php }?>
                            </tr> 
                            <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_elec_heat_label');?><span class="text-danger">*</span></label></td>
                                <?php if(isset($value) &&  !empty($value)){ 
                                    foreach($elec_heat as $k => $value){ ?>
                                    <td>
                                        <input type="text" name="elec_heat[]" class="form-control elec_heat" value="<?php echo $value; ?>" placeholder="<?php echo lang('mm_operation_pqr_elec_heat_label');?>"  name="elec_heat[]" autocomplete="off">
                                        <?PHP if(form_error('elec_heat')){ echo '<span class="help-block">'.form_error('elec_heat').'</span>';} ?>
                                    </td>
                                <?php } }else{ ?>
                                    <td>
                                        <input type="text" name="elec_heat[]" class="form-control elec_heat" placeholder="<?php echo lang('mm_operation_pqr_elec_heat_label');?>"  name="elec_heat[]" autocomplete="off">
                                        <?PHP if(form_error('elec_heat')){ echo '<span class="help-block">'.form_error('elec_heat').'</span>';} ?>
                                    </td>
                                <?php }?>
                            </tr> 
                            <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_elec_other_label');?></label></td>
                                <?php if(isset($value) &&  !empty($value)){ 
                                    foreach($elec_other as $k => $value){ ?>
                                    <td>
                                        <input type="text" name="elec_other[]" class="form-control elec_other" value="<?php echo $value; ?>" placeholder="<?php echo lang('mm_operation_pqr_elec_other_label');?>"  name="elec_other[]" value="<?php echo $value; ?>" autocomplete="off">
                                    </td>
                                <?php } }else{ ?>
                                    <td>
                                        <input type="text" name="elec_other[]" class="form-control elec_other" placeholder="<?php echo lang('mm_operation_pqr_elec_other_label');?>"  name="elec_other[]" autocomplete="off">
                                    </td>
                                <?php }?>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-12 col-xl-12">
                    <button class="btn btn-info pull-right" type="button" id="btnElectrical">Save & Next</button>
                    <button class="btn btn-warning pull-left previous" type="button" data-btn="7"><i class="glyphicon glyphicon-chevron-left"></i> Previous</button>
                </div>
              </div>

            <!-- Teachniqe -->
            <div class="row blockdiv hide" id="techniqe">
                <div class="col-sm-12 col-xs-12 box-title-head">
                  <h3 class="box-title"><?php echo lang('mm_operation_pqr_techique_label');?></h3>
                </div>

                <div class="col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-sm-3 col-xs-3">
                            <div class="form-group <?PHP if(form_error('travel_speed')){ echo 'has-error';} ?>">
                                <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_travel_speed_label');?><span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_pqr_travel_speed_label');?>" id="travel_speed" name="travel_speed" value="<?php echo $travel_speed ;?>" autocomplete="off">
                                <?PHP if(form_error('travel_speed')){ echo '<span class="help-block">'.form_error('travel_speed').'</span>';} ?>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-3">
                            <div class="form-group <?PHP if(form_error('weave_bead')){ echo 'has-error';} ?>">
                                <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_bead_label');?><span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_pqr_bead_label');?>" id="weave_bead" name="weave_bead" value="<?php echo $weave_bead ;?>" autocomplete="off">
                                <?PHP if(form_error('weave_bead')){ echo '<span class="help-block">'.form_error('weave_bead').'</span>';} ?>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-3">
                            <div class="form-group <?PHP if(form_error('cupsize_id')){ echo 'has-error';} ?>">
                                <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_orifice_gascup_size_label');?><span class="text-danger">*</span></label>
                                <?php   
                                  $attrib = 'class="form-control select2" name="cupsize_id"  data-live-search="true" data-width="100%"  id="cupsize_id"';
                                  echo form_dropdown('cupsize_id', $drop_menu_cup_size, set_value('cupsize_id', (isset($cupsize_id)) ? $cupsize_id : ''), $attrib);
                                ?> 
                                <?PHP if(form_error('cupsize_id')){ echo '<span class="help-block">'.form_error('cupsize_id').'</span>';} ?>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-3">
                            <div class="form-group <?PHP if(form_error('pass_per_side')){ echo 'has-error';} ?>">
                                <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_s_m_pass_per_side_label');?><span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_pqr_s_m_pass_per_side_label');?>" id="pass_per_side" name="pass_per_side" value="<?php echo $pass_per_side ;?>" autocomplete="off">
                                <?PHP if(form_error('pass_per_side')){ echo '<span class="help-block">'.form_error('pass_per_side').'</span>';} ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 col-xs-3">
                            <div class="form-group <?PHP if(form_error('s_m_electrode')){ echo 'has-error';} ?>">
                                <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_s_m_electrode_label');?><span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_pqr_s_m_electrode_label');?>" id="s_m_electrode" name="s_m_electrode" value="<?php echo $s_m_electrode ;?>" autocomplete="off">
                                <?PHP if(form_error('s_m_electrode')){ echo '<span class="help-block">'.form_error('s_m_electrode').'</span>';} ?>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-3">
                            <div class="form-group <?PHP if(form_error('work_distance')){ echo 'has-error';} ?>">
                                <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_work_distance_label');?><span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_pqr_work_distance_label');?>" id="work_distance" name="work_distance" value="<?php echo $work_distance ;?>" autocomplete="off">
                                <?PHP if(form_error('work_distance')){ echo '<span class="help-block">'.form_error('work_distance').'</span>';} ?>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-3">
                            <div class="form-group <?PHP if(form_error('cleaning_id')){ echo 'has-error';} ?>">
                                <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_method_cleaning_label');?><span class="text-danger">*</span></label>
                                <?php   
                                  $attrib = 'class="form-control select2" name="cleaning_id"  data-live-search="true" data-width="100%"  id="cleaning_id"';
                                  echo form_dropdown('cleaning_id', $drop_menu_cleaning, set_value('cleaning_id', (isset($cleaning_id)) ? $cleaning_id : ''), $attrib);
                                ?> 
                                <?PHP if(form_error('cleaning_id')){ echo '<span class="help-block">'.form_error('cleaning_id').'</span>';} ?>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-3">
                            <div class="form-group <?PHP if(form_error('thermal_process')){ echo 'has-error';} ?>">
                                <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_thermal_process_label');?><span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_pqr_thermal_process_label');?>" id="thermal_process" name="thermal_process" value="<?php echo $thermal_process ;?>" autocomplete="off">
                                <?PHP if(form_error('thermal_process')){ echo '<span class="help-block">'.form_error('thermal_process').'</span>';} ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 col-xs-3">
                            <div class="form-group <?PHP if(form_error('techinqe_other')){ echo 'has-error';} ?>">
                                <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_teachinqe_other_label');?></label>
                                <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_pqr_teachinqe_other_label');?>" id="techinqe_other" name="techinqe_other" value="<?php echo $techinqe_other ;?>" autocomplete="off">
                                <?PHP if(form_error('techinqe_other')){ echo '<span class="help-block">'.form_error('techinqe_other').'</span>';} ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-xl-12">
                    <button class="btn btn-info pull-right" type="button" id="btnTechinque">Save & Next</button>
                    <button class="btn btn-warning pull-left previous" type="button" data-btn="8"><i class="glyphicon glyphicon-chevron-left"></i> Previous</button>
                </div>
            </div>

            <!-- Welding Parameters -->
            <div class="row blockdiv hide" id="welding_parameters">
                <div class="col-sm-12 col-xs-12 box-title-head">
                  <h3 class="box-title"><?php echo lang('mm_operation_pqr_welding_parameters_label');?></h3>
                </div>

                <div class="col-sm-12 col-xs-12">
                    <table class="table table-bordered tablepqr_welding">
                  <thead>
                    <tr>
                        <th rowspan="2"><?php echo lang('mm_operation_pqr_r_n_label'); ?></th>
                        <th rowspan="2"><?php echo lang('mm_operation_pqr_layers_label'); ?></th>
                        <th rowspan="2"><?php echo lang('mm_operation_pqr_process_label'); ?></th>
                        <th colspan="2"><?php echo lang('mm_operation_pqr_filler_metal_label'); ?></th>
                        <th colspan="3"><?php echo lang('mm_operation_pqr_current_label'); ?></th>
                        <th rowspan="2"><?php echo lang('mm_operation_pqr_travel_speed_range_ipm_label'); ?></th>
                        <th rowspan="2"><?php echo lang('mm_operation_pqr_heat_input_jinch_label'); ?></th>
                        <th rowspan="2"></th>
                    </tr>
                    <tr>  
                      <th><?php echo lang('mm_operation_pqr_class_label'); ?></th>
                      <th><?php echo lang('mm_operation_pqr_diameter_label'); ?></th>
                      <th><?php echo lang('mm_operation_pqr_typer_polarity_label'); ?></th>
                      <th><?php echo lang('mm_operation_pqr_amperage_range_label'); ?></th>
                      <th><?php echo lang('mm_operation_pqr_voltage_range_label'); ?></th>
                      
                    </tr>
                  </thead>
                  <tbody class="welding_tbody">
                    <?php if(isset($value) &&  !empty($value)){ 
                    foreach($layer as $k => $value){ $count = $k+1; ?>
                        <tr class="tr_welding" data-child="<?php echo $count ?>">
                      <td class="tr_sno"><?php echo $count ?></td>
                      <td>
                        <select class="form-control select2 layer" name="layer[]" data-live-search="true" data-width="100%"  style="width:100%;">
                            <option value="">-- Select Layer --</option>
                            <option value="Root" <?php echo ($value == 'Root'?'selected':''); ?>>Root</option>
                            <option value="Hot" <?php echo ($value == 'Hot'?'selected':''); ?>>Hot</option>
                            <option value="Fill" <?php echo ($value == 'Fill'?'selected':''); ?>>Fill</option>
                            <option value="Cap" <?php echo ($value == 'Cap'?'selected':''); ?>>Cap</option>
                        </select>
                      </td>
                      <td>
                        <select class="from-control select2 welder_process" name="welder_process" data-child="1" data-live-search="true" data-width="100%" style="width:100%;">
                            <option value="">-- Select Process --</option>
                        </select>
                      </td>
                      <td>
                        <input type="text" class="form-control classVal" id="classVal1" name="class[]" value="<?php echo $classVal[$k]; ?>" autocomplete="off" disabled>
                      </td>
                      <td>
                        <input type="text" class="form-control diameter"  name="diameter[]" value="<?php echo $diameter[$k]; ?>" autocomplete="off">
                      </td>
                      <td>
                        <input type="text" class="form-control typer_polority" name="typer_polority[]" value="<?php echo $typer_polority[$k]; ?>" autocomplete="off">
                      </td>
                      <td>
                        <input type="text" class="form-control current_amperage_range" id="current_amperage_range1" name="current_amperage_range[]" value="<?php echo $current_amperage_range[$k]; ?>" autocomplete="off">
                      </td>
                      <td>
                        <input type="text" class="form-control current_voltage_range" id="current_voltage_range1" name="current_voltage_range[]" value="<?php echo $current_voltage_range[$k]; ?>" autocomplete="off">
                      </td>
                      <td>
                        <input type="text" class="form-control travel_speed_range" id="travel_speed_range1" name="travel_speed_range[]" value="<?php echo $travel_speed_range[$k]; ?>" autocomplete="off">
                      </td>
                      <td>
                        <input type="text" class="form-control heat_input" id="heat_input1" data-row-no="1" name="heat_input[]" value="<?php echo $heat_input[$k]; ?>" autocomplete="off">
                      </td>
                      <td>
                        <?php if((count($layer)-1) == $k && count($layer) != 6){ ?>
                            <button type="button" class="btn btn-info welding_row">+</button>
                        <?php } ?>
                      </td>
                    </tr>
                    <?php } }else{ ?>
                    <tr class="tr_welding" data-child="1">
                      <td class="tr_sno">1</td>
                      <td>
                        <select class="form-control select2 layer" name="layer[]" data-live-search="true" data-width="100%"  style="width:100%;">
                            <option value="">-- Select Layer --</option>
                            <option value="Root">Root</option>
                            <option value="Hot">Hot</option>
                            <option value="Fill">Fill</option>
                            <option value="Cap">Cap</option>
                        </select>
                      </td>
                      <td>
                        <select class="from-control select2 welder_process" name="welder_process" data-child="1" data-live-search="true" data-width="100%" style="width:100%;">
                            <option value="">-- Select Process --</option>
                        </select>
                      </td>
                      <td>
                        <input type="text" class="form-control classVal" id="layer1" name="class[]" value="" autocomplete="off" disabled>
                      </td>
                      <td>
                        <input type="text" class="form-control diameter"  name="diameter[]" value="" autocomplete="off">
                      </td>
                      <td>
                        <input type="text" class="form-control typer_polority" name="typer_polority[]" value="" autocomplete="off">
                      </td>
                      <td>
                        <input type="text" class="form-control current_amperage_range" id="current_amperage_range1" name="current_amperage_range[]" value="" autocomplete="off">
                      </td>
                      <td>
                        <input type="text" class="form-control current_voltage_range" id="current_voltage_range1" name="current_voltage_range[]" value="" autocomplete="off">
                      </td>
                      <td>
                        <input type="text" class="form-control travel_speed_range" id="travel_speed_range1" name="travel_speed_range[]" value="" autocomplete="off">
                      </td>
                      <td>
                        <input type="text" class="form-control heat_input" id="heat_input1" data-row-no="1" name="heat_input[]" value="" autocomplete="off">
                      </td>
                      <td>
                        <button type="button" class="btn btn-info welding_row">+</button>
                      </td>
                    </tr>
                    <?php }?>
                    
                    
                  </tbody>
                </table>
                <input type="hidden" name="pqr_id" id="pqr_id" value="<?php echo $pqr_id;?>">
                </div>
                <div class="col-sm-12 col-xl-12">
                    <button class="btn btn-info pull-right" type="button" id="btnWeldingparameters">Save & Next</button>
                    <button class="btn btn-warning pull-left previous" type="button" data-btn="9"><i class="glyphicon glyphicon-chevron-left"></i> Previous</button>
                </div>
                
            </div>
        </div>

           <!--  <div class="row blockdiv hide" id="tensile">
                <div class="col-sm-12 col-xs-12 box-title-head">
                  <h3 class="box-title"><?php echo lang('mm_operation_pqr_tensile_test_label');?></h3>
                </div>

                <table class="table table-bordered tablepqr">
                  <thead>
                    <tr>
                      <th><?php echo lang('mm_operation_pqr_specimen_no_label');?></th>
                      <th><?php echo lang('mm_operation_pqr_thickness_mm_label');?></th>
                      <th><?php echo lang('mm_operation_pqr_width_mm_label');?></th>
                      <th><?php echo lang('mm_operation_pqr_area_sq_mm_label');?></th>
                      <th><?php echo lang('mm_operation_pqr_ultimate_tensile_label');?></th>
                      <th><?php echo lang('mm_operation_pqr_ultimate_tensile_label');?></th>
                      <th><?php echo lang('mm_operation_pqr_fracture_location_label');?></th>
                      <th><?php echo lang('mm_operation_pqr_result_label');?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php for($i = 1; $i <=2; $i++){
                      ?>
                    <tr>
                      <td>
                        <input type="text" class="form-control" id="specimen_no<?php echo $i; ?>" name="specimen_no[]" value="" autocomplete="off">
                      </td>
                      <td>
                        <input type="text" class="form-control" id="thickness<?php echo $i; ?>" name="thickness[]" value="" autocomplete="off">
                      </td>
                      <td>
                        <input type="text" class="form-control" id="width<?php echo $i; ?>" name="width[]" value="" autocomplete="off">
                      </td>
                      <td>
                        <input type="text" class="form-control" id="area<?php echo $i; ?>" name="area[]" value="" autocomplete="off">
                      </td>
                      <td>
                        <input type="text" class="form-control" id="ultimate_tensile_load<?php echo $i; ?>" name="ultimate_tensile_load[]" value="" autocomplete="off">
                      </td>
                      <td>
                        <input type="text" class="form-control" id="ultimate_tensile_strength<?php echo $i; ?>" name="ultimate_tensile_strength[]" value="" autocomplete="off">
                      </td>
                      <td>
                        <input type="text" class="form-control" id="fracture_location<?php echo $i; ?>" name="fracture_location[]" value="" autocomplete="off">
                      </td>
                      <td>
                        <input type="text" class="form-control" id="tensile_test_result<?php echo $i; ?>" name="tensile_test_result[]" value="" autocomplete="off">
                      </td>
                    </tr>
                    <?php
                      }
                   ?>
                    <tr>
                      <td colspan="8" align="center"><?php echo lang('mm_operation_pqr_refer_to_fugro_label');?></td>
                    </tr>
                  </tbody>
                </table>
            </div>

            <div class="row blockdiv hide" id="guided">
                <div class="col-sm-12 col-xs-12 box-title-head">
                  <h3 class="box-title"><?php echo lang('mm_operation_pqr_guided_ben_test_label');?></h3>
                </div>

                <table class="table table-bordered tablepqr">
                  <thead>
                    <tr>
                      <th width="50%"><?php echo lang('mm_operation_pqr_type_figure_no_label');?></th>
                      <th width="50%"><?php echo lang('mm_operation_pqr_result_label');?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php for($i = 1; $i <=2; $i++){
                      ?>
                    <tr>
                      <td>
                        <input type="text" class="form-control" id="type_and_figure_no<?php echo $i; ?>" name="type_and_figure_no[]" value="" autocomplete="off">
                      </td>
                      <td>
                        <input type="text" class="form-control" id="ben_test_result<?php echo $i; ?>" name="ben_test_result[]" value="" autocomplete="off">
                      </td>
                    </tr>
                  <?php } ?>
                    <tr>
                      <td colspan="2" align="center"><?php echo lang('mm_operation_pqr_refer_to_fugro_label');?></td>
                    </tr>
                  </tbody>
                </table>
            </div>

            <div class="row blockdiv hide" id="touchness">
                <div class="col-sm-12 col-xs-12 box-title-head">
                  <h3 class="box-title"><?php echo lang('mm_operation_pqr_touchness_test_label');?></h3>
                </div>

                <table class="table table-bordered tablepqr">
                  <thead>
                    <tr>
                      <th rowspan="2"><?php echo lang('mm_operation_pqr_specimen_no_label');?></th>
                      <th rowspan="2"><?php echo lang('mm_operation_pqr_notch_location_label');?></th>
                      <th rowspan="2"><?php echo lang('mm_operation_pqr_notch_type_label');?></th>
                      <th rowspan="2"><?php echo lang('mm_operation_pqr_test_temp_label');?></th>
                      <th rowspan="2"><?php echo lang('mm_operation_pqr_impact_values_label');?></th>
                      <th colspan="2"><?php echo lang('mm_operation_pqr_lateral_exp_label');?></th>
                      <th colspan="2"><?php echo lang('mm_operation_pqr_drop_weight_label');?></th>
                    </tr>
                    <tr>
                      <th><?php echo lang('mm_operation_pqr_shear_label');?></th>
                      <th><?php echo lang('mm_operation_pqr_mils_label');?></th>
                      <th><?php echo lang('mm_operation_pqr_break_label');?></th>
                      <th><?php echo lang('mm_operation_pqr_no_break_label');?></th>
                    </tr>
                  </thead>
                  <tbody>
                    
                     <tr>
                      <td rowspan="3">
                        <input type="text" class="form-control" id="touchness_specimen_no<?php echo $i; ?>" name="touchness_specimen_no[]" value="" autocomplete="off">
                      </td>
                      <td>
                        <input type="text" class="form-control" id="notch_location<?php echo $i; ?>" name="notch_location[]" value="" autocomplete="off">
                      </td>
                      <td>
                        <input type="text" class="form-control" id="notch_type<?php echo $i; ?>" name="notch_type[]" value="" autocomplete="off">
                      </td>
                      <td>
                        <input type="text" class="form-control" id="test_temp<?php echo $i; ?>" name="test_temp[]" value="" autocomplete="off">
                      </td>
                      <td>
                        <input type="text" class="form-control" id="impact_values<?php echo $i; ?>" name="impact_values[]" value="" autocomplete="off">
                      </td>
                      <td>
                        <input type="text" class="form-control" id="lateral_exp_shear<?php echo $i; ?>" name="lateral_exp_shear[]" value="" autocomplete="off">
                      </td>
                      <td>
                        <input type="text" class="form-control" id="lateral_exp_mils<?php echo $i; ?>" name="lateral_exp_mils[]" value="" autocomplete="off">
                      </td>
                      <td  rowspan="3">
                        <input type="text" class="form-control" id="drop_break<?php echo $i; ?>" name="drop_break[]" value="" autocomplete="off">
                      </td>
                      <td  rowspan="3">
                        <input type="text" class="form-control" id="drop_no_break<?php echo $i; ?>" name="drop_no_break[]" value="" autocomplete="off">
                      </td>
                    </tr>
                    <tr>
                      <td colspan="7" align="center"><?php echo lang('mm_operation_pqr_refer_to_fugro_label');?></td>
                    </tr>
                    <tr>
                      <td></td><td></td><td></td><td></td><td></td><td></td>
                    </tr>
                  </tbody>
                </table>
            </div>

            <div class="row blockdiv hide" id="fillet">
                <div class="col-sm-12 col-xs-12 box-title-head">
                  <h3 class="box-title"><?php echo lang('mm_operation_pqr_fillet_weld_test_label');?></h3>
                </div>

                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('result_statificatory')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_pwht_label');?><span class="text-danger">*</span></label>
                    <div class="row">
                      <div class="col-sm-6 col-xs-6">
                        <div class="radio radio-success">
                          <input type="radio" name="result_statificatory" id="result_statificatory" value="<?php echo lang('mm_operation_pqr_yes_label');?>" <?php if($staffs_id !='') {if($result_statificatory=='Yes'){?> checked <?php }}else{?> checked <?php }?>>
                          <label for="result_statificatoryYes"> <?php echo lang('mm_operation_pqr_yes_label');?> </label>
                        </div>
                      </div>
                      <div class="col-sm-6 col-xs-6">
                        <div class="radio radio-danger">
                          <input type="radio" name="result_statificatory" id="result_statificatory" value="<?php echo lang('mm_operation_pqr_no_label');?>" <?php  if($result_statificatory =='No'){?> checked <?php }?>>
                          <label for="result_statificatoryNo"> <?php echo lang('mm_operation_pqr_no_label');?> </label>
                        </div>
                      </div>
                    </div>
                    <?PHP if(form_error('result_statificatory')){ echo '<span class="help-block">'.form_error('result_statificatory').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('penetration_into_partent_metal')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_penetration_partent_metal_label');?><span class="text-danger">*</span></label>
                    <div class="row">
                      <div class="col-sm-6 col-xs-6">
                        <div class="radio radio-success">
                          <input type="radio" name="penetration_into_partent_metal" id="penetration_into_partent_metal" value="<?php echo lang('mm_operation_pqr_yes_label');?>" <?php if($staffs_id !='') {if($penetration_into_partent_metal=='Yes'){?> checked <?php }}else{?> checked <?php }?>>
                          <label for="penetration_into_partent_metalYes"> <?php echo lang('mm_operation_pqr_yes_label');?> </label>
                        </div>
                      </div>
                      <div class="col-sm-6 col-xs-6">
                        <div class="radio radio-danger">
                          <input type="radio" name="penetration_into_partent_metal" id="penetration_into_partent_metal" value="<?php echo lang('mm_operation_pqr_no_label');?>" <?php  if($penetration_into_partent_metal =='No'){?> checked <?php }?>>
                          <label for="penetration_into_partent_metalNo"> <?php echo lang('mm_operation_pqr_no_label');?> </label>
                        </div>
                      </div>
                    </div>
                    <?PHP if(form_error('penetration_into_partent_metal')){ echo '<span class="help-block">'.form_error('penetration_into_partent_metal').'</span>';} ?>
                  </div>
                </div>

                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('maro_result')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_macro_result_label');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_pqr_macro_result_label');?>" id="maro_result" name="maro_result" value="N/A" autocomplete="off" disabled>
                    <?PHP if(form_error('maro_result')){ echo '<span class="help-block">'.form_error('maro_result').'</span>';} ?>
                    </div>
                </div>
              </div>

              <div class="row blockdiv hide" id="other">
                <div class="col-sm-12 col-xs-12 box-title-head">
                  <h3 class="box-title"><?php echo lang('mm_operation_pqr_other_tests_label');?></h3>
                </div>

                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('type_test')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_type_of_test_label');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_pqr_type_of_test_label');?>" id="type_test" name="type_test" value="<?php echo $type_test ;?>" autocomplete="off">
                    <?PHP if(form_error('type_test')){ echo '<span class="help-block">'.form_error('type_test').'</span>';} ?>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('deposit_analysis')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_deposit_analysis_label');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_pqr_deposit_analysis_label');?>" id="deposit_analysis" name="deposit_analysis" value="<?php echo $deposit_analysis ;?>" autocomplete="off">
                    <?PHP if(form_error('deposit_analysis')){ echo '<span class="help-block">'.form_error('deposit_analysis').'</span>';} ?>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('test_others')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_post_heat_others_label');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_pqr_post_heat_others_label');?>" id="test_others" name="test_others" value="<?php echo $test_others ;?>" autocomplete="off">
                    <?PHP if(form_error('test_others')){ echo '<span class="help-block">'.form_error('test_others').'</span>';} ?>
                    </div>
                </div>

                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('welder_staff_id')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_welder_name_label');?><span class="text-danger">*</span></label>
                    <?php   
                      $attrib = 'class="form-control select2" name="welder_staff_id"  data-live-search="true" data-width="100%"  id="welder_staff_id"';
                      echo form_dropdown('welder_staff_id', $drop_menu_staff_welder, set_value('welder_staff_id', (isset($welder_staff_id)) ? $welder_staff_id : ''), $attrib);
                      ?> 
                    <?PHP if(form_error('welder_staff_id')){ echo '<span class="help-block">'.form_error('welder_staff_id').'</span>';} ?>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('stamp_no')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_stamp_no_label');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_pqr_stamp_no_label');?>" id="stamp_no" name="stamp_no" value="<?php echo $stamp_no ;?>" autocomplete="off">
                    <?PHP if(form_error('stamp_no')){ echo '<span class="help-block">'.form_error('stamp_no').'</span>';} ?>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('conducted_by')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_test_conducted_by_label');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_pqr_test_conducted_by_label');?>" id="conducted_by" name="conducted_by" value="N/A" autocomplete="off">
                    <?PHP if(form_error('conducted_by')){ echo '<span class="help-block">'.form_error('conducted_by').'</span>';} ?>
                    </div>
                </div>

                 <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('laboratory_test_1')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_laboratory_test_no_label');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control"  id="laboratory_test_1" name="laboratory_test_1" value="N/A" autocomplete="off">
                    <?PHP if(form_error('laboratory_test_1')){ echo '<span class="help-block">'.form_error('laboratory_test_1').'</span>';} ?><br/>
                     <input type="text" class="form-control"  id="laboratory_test_2" name="laboratory_test_2" value="N/A" autocomplete="off">
                    <?PHP if(form_error('laboratory_test_2')){ echo '<span class="help-block">'.form_error('laboratory_test_2').'</span>';} ?><br/>
                     <input type="text" class="form-control"  id="laboratory_test_3" name="laboratory_test_3" value="N/A" autocomplete="off">
                    <?PHP if(form_error('laboratory_test_3')){ echo '<span class="help-block">'.form_error('laboratory_test_3').'</span>';} ?><br/>
                    </div>
                </div>
                <div class="col-sm-12">
                  <div class="text-right final_button">
                    <input type="hidden" name="pqr_id" value="<?php echo $pqr_id;?>">
                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit"><?php echo lang('btn_save');?></button>
                    <button type="reset" class="btn btn-inverse waves-effect waves-light m-r-10"><?php echo lang('btn_Reset');?></button>
                    <a href="<?php echo base_url().$form_cancel_url;?>" class="btn btn-warning waves-effect waves-light m-r-10"><?php echo lang('btn_Cancel');?></a>
                  </div>
                </div>
              </div>
            </div> -->
              
            <?php echo form_close(); ?>
     </div>
      </div>
    </div>



</div>
</div>
  <!-- /.end form -->
<script>

  $(document).ready(function(){


    var process = [];
    var processName = [];

    // array object to handle Process select
    var objProcess = {}; 
    var WeldingData = {};

    $('.tablinks').click(function(){
      $('.tablinks').removeClass('active');
      $('.blockdiv').addClass('hide');
      $(this).addClass('active');
      var id = $(this).attr('data-id');
      $('#'+id).removeClass('hide');
    });

    // For edit prepose get the process value manually here
    // Start here
    var displayProcess1 = $('#process1 option:selected').text();
    var displayProcess2 = $('#process2 option:selected').text();
    var displayProcess3 = $('#process3 option:selected').text();


    if(displayProcess1 != ''){

        $('.processVal').each(function(k){
            if(k == 0){ $(this).val(displayProcess1); layer_select_option('<?php echo $process1; ?>', 'process1', displayProcess1); 
                WeldingData[<?php echo $process1; ?>] = $('.aws_classfication:nth-child(1)').val();}
            if(k == 1){ $(this).val(displayProcess2); layer_select_option('<?php echo $process2; ?>', 'process2', displayProcess2);
                 WeldingData[<?php echo $process2; ?>] = $('.aws_classfication:nth-child(2)').val();}
            if(k == 2){ $(this).val(displayProcess3); layer_select_option('<?php echo $process3; ?>', 'process3', displayProcess3);
                 WeldingData[<?php echo $process3; ?>] = $('.aws_classfication:nth-child(3)').val();}
        });
        $('.electric_process').each(function(k){
            if(k == 0){ $(this).val(displayProcess1);}
            if(k == 1){ $(this).val(displayProcess2);}
            if(k == 2){ $(this).val(displayProcess3);}
        });
        $('.aws_classfication').each(function(k){
            if(k == 0){  WeldingData[<?php echo $process1; ?>] = $(this).val();}
            if(k == 1){ WeldingData[<?php echo $process2; ?>] = $(this).val();}
            if(k == 2){ WeldingData[<?php echo $process3; ?>] = $(this).val();}
        });

    }
    if( displayProcess1 != ''){
        var setWelderProcess = [<?php echo implode(',',$welder_process); ?>];
        $('.welder_process').each(function(k){
            $(this).val(setWelderProcess[k]);
        });
    }
    // end here

    $('#process_id').change(function(){
      var selectopt = $(this);
      if(selectopt.val() != ''){
        $(".processVal").val($("option:selected", selectopt).text());
      }else{
        $(".processVal").val('');
      }
    });

    $('#classfication_no').keyup(function(){
      var classval = $(this).val();
      $(".classVal").val(classval);
    });

    // show selected image
    function readURL(input, id) {
        if (input.files && input.files[0]) {

            var reader = new FileReader();
            reader.onload = function (e) {
                $("."+id).attr('src', e.target.result);
                // $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).on("change", ".joints_image", function(){
        readURL(this, $(this).attr("id"));
    });

    // add variable button function
    $(document).on('click', '.addVariable', function(){
        var id = $(this).parents('.jointblockrepeat').attr('id');
        $('#'+ id +' .variableDiv:last').clone().insertAfter('#'+ id +' div.variableDiv:last');
        $(this).after("<button type='button' class='btn btn-danger removeVariable'>-</button>");
        $(this).hide();
    });
    // remove variables function
    $(document).on('click', '.removeVariable', function(){
        $(this).closest('.variableDiv').remove();
    });

    // Clone hole image set in joints
    $(document).on('click', '#addJointImage', function(e){
        $(".jointblockrepeat:last").clone().insertAfter("div.jointblockrepeat:last");
        var count = $(".jointblockrepeat").length;

        $(".jointblockrepeat:last").attr("id", "jointblock"+count).attr("data-rel", count);
        $(".joints_image:last").attr("id", "joint_photo"+count);
        $(".joint_image_display:last").removeClass("joint_photo"+(count-1)).addClass("joint_photo"+count);
        $(".joint_photo"+count).attr("src", "");
        $(".closeJointBlock").css("display", "none");
        $(".closeJointBlock:last").css("display", "block");
    });
    // close the joint block
    $(document).on('click', '.closeJointBlock', function(){
        var r = confirm("Do you like to remove...!");
        if (r == true) {
            $(this).parents('.jointblockrepeat').remove();
            $(".closeJointBlock:last").css("display", "block");
            $(".closeJointBlock:first").css("display", "none");
        }
    });


    $('#pno_id').on('change', function(){
         $.ajax({
           url: '<?php echo base_url(); ?>operation/PQR/getGroupNo',
           type: 'POST',
           data: { pno_id:  $(this).val()},
           error: function() {
              alert('Something is wrong');
           },
           success: function(data) {
                var dataGroup = JSON.parse(data);
                $('#group_no').val(dataGroup['group_no']);
                $('#material_spe').val(dataGroup['specification_no']);
                if(dataGroup['dtg_name'] != ''){
                    $('#tgu_no').val(dataGroup['dtg_name']);
                }else{
                    $('#tgu_no').val(dataGroup['uns_number']);
                }
           }
        });
    });

    $('#to_pno_id').on('change', function(){
         $.ajax({
           url: '<?php echo base_url(); ?>operation/PQR/getGroupNo',
           type: 'POST',
           data: { pno_id:  $(this).val()},
           error: function() {
              alert('Something is wrong');
           },
           success: function(data) {
                var dataGroup = JSON.parse(data);
                $('#to_group_no').val(dataGroup['group_no']);
                $('#to_material_spe').val(dataGroup['specification_no']);
                if(dataGroup['dtg_name'] != ''){
                    $('#to_tgu_no').val(dataGroup['dtg_name']);
                }else{
                    $('#to_tgu_no').val(dataGroup['uns_number']);
                }
           }
        });
    });

    $(document).on('change', '.fno_id', function(){
        var count = $(this).parents("td").attr('data-col');
        var len = parseInt(count);
        $.ajax({
           url: '<?php echo base_url(); ?>operation/PQR/getFno',
           type: 'POST',
           data: { fno_id:  $(this).val()},
           error: function() {
              alert('Something is wrong'); 
           },
           success: function(data) {
                var dataGroup = JSON.parse(data);
                
                var process_id = $('#mtable tbody tr:nth-child(1) td:nth-child('+len+') .processVal').attr('data-process-id');
                WeldingData[process_id] = dataGroup['aws_classfication'].toString();
                $('#mtable tbody tr:nth-child(3) td:nth-child('+len+') .a_no').val(dataGroup['a_no'].toString());
                $('#mtable tbody tr:nth-child(4) td:nth-child('+len+') .sfa_no').val(dataGroup['sfa_no'].toString());
                $('#mtable tbody tr:nth-child(5) td:nth-child('+len+') .aws_classfication').val(dataGroup['aws_classfication'].toString()); 
           }
        });
    });

    $('#process1').on('change', function(){
        process['process1'] = $(this).val();
        layer_select_option($(this).val(), 'process1', $('#process1 option:selected').text());
        processName['process1'] = $('#process1 option:selected').text();
        $('#mtable tbody tr:nth-child(1) td:nth-child(2) .processVal:nth-child(1)')
            .val($("#process1 option:selected").text())
            .attr('data-process-id', $('#process1').val()).attr('data-child', 2);
        $('#electrical_mtab tbody tr:nth-child(1) td:nth-child(2) .electric_process:nth-child(1)').val($("#process1 option:selected").text());

    });

    $('#process2').on('change', function(){
        var key = 'process2';
        var value = $(this).val();
        layer_select_option($(this).val(), 'process2', $('#process2 option:selected').text());
        if(value != ''){
            process['process2'] = $(this).val();
            processName['process2'] = $('#process2 option:selected').text();
            tableTdCreate();
            $('#mtable tbody tr:nth-child(1) td:nth-child(3) .processVal:nth-child(1)')
                .val($("#process2 option:selected").text())
                .attr('data-process-id', $('#process2').val()).attr('data-child', 3);
            $('#electrical_mtab tbody tr:nth-child(1) td:nth-child(3) .electric_process:nth-child(1)')
                .val($("#process2 option:selected").text())
                .attr('data-process-id', $('#process2').val());
        }
    });
        
    $('#process3').on('change', function(){
        var key = 'process3';
        var value = $(this).val();
        layer_select_option($(this).val(), 'process3', $('#process3 option:selected').text());
        if(value != ''){
            process['process3'] = $(this).val();
            processName['process3'] = $('#process3 option:selected').text();
            tableTdCreate();
            $('#mtable tbody tr:nth-child(1) td:nth-child(3) .processVal:nth-child(1)')
                .val($("#process2 option:selected").text())
                .attr('data-process-id', $('#process2').val()).attr('data-child', 3);
            $('#mtable tbody tr:nth-child(1) td:nth-child(4) .processVal:nth-child(1)')
                .val($("#process3 option:selected").text())
                .attr('data-process-id', $('#process3').val()).attr('data-child', 4); 

            $('#electrical_mtab tbody tr:nth-child(1) td:nth-child(3) .electric_process:nth-child(1)')
                .val($("#process2 option:selected").text());
            $('#electrical_mtab tbody tr:nth-child(1) td:nth-child(4) .electric_process:nth-child(1)')
                .val($("#process3 option:selected").text());   
        }
    });
    
    $('#process1, #process2, #process3').on('change', function(){

        var processGas = $('#process1 option:selected').text();
        if($('#process2').val() != ''){
            processGas += ',' + $('#process2 option:selected').text();
        }
        if($('#process3').val() != ''){
            processGas += ',' + $('#process3 option:selected').text();
        }
        $('.processGas').val(processGas);
    });

    
    function layer_select_option(value, key, textVal){
    
        if(value != ''){
            objProcess[value] =  textVal;
        }
        var optionStr = '';
        optionStr += '<option value="">-- Select Process --</option>';
        $.each(objProcess, function(key, value){
            optionStr += '<option value="'+key+'">'+value+'</option>';
        });
        $('.welder_process').empty();
        $('.welder_process').html(optionStr);
    }

    $(document).on('change', '.welder_process', function(){
        var changeVal = $(this).val();
        var changeChild = $(this).parents('tr').attr('data-child');
        $('.welding_tbody tr:nth-child('+changeChild+') td:nth-child(4) .classVal').val(WeldingData[changeVal]);
    });

    function tableTdCreate(){
        $('.fno_id').select2("destroy");

          $('#mtable tbody tr').each(function(key){
                // $(this).children('td:last').attr('class','append'+key);
                var count = key+1;
            
                $("#mtable tbody tr:nth-child("+count+") td:nth-child(2)").clone(false)
                    .insertAfter('#mtable tbody tr:nth-child('+count+') td:last').attr('class','append'+key)
                    .attr('data-val', key)
                    .attr('data-col',($('#mtable tbody tr:nth-child('+count+') td').length));
                $('#mtable tbody tr:nth-child('+count+') td:nth-child(2)').children("select").select2();
            });
          $(".fno_id").select2({               
                allowClear:true 
            });
          // electrical character block
          $('#electrical_mtab tbody tr').each(function(key){
                // $(this).children('td:last').attr('class','append'+key);
                var count = key+1;
            
                $("#electrical_mtab tbody tr:nth-child("+count+") td:nth-child(2)").clone(false)
                    .insertAfter('#electrical_mtab tbody tr:nth-child('+count+') td:nth-child(2)').attr('class','append'+key)
                    .attr('data-val', key)
                    .attr('data-col',key == 1 ? 1+key : undefined);
                $('#electrical_mtab tbody tr:nth-child('+count+') td:nth-child(2)').children("select").select2();
            });
    }

    function tableTdRemove(child){
        $('#mtable tbody tr').each(function(key){
            var count = key+1;
            $("#mtable tbody tr:nth-child("+key+") td:nth-child("+child+")").html('a');
        });
    }

    $(document).on('click', '.welding_row', function(){
       
        var trcount = 0;
        var trcount = $('.welding_tbody tr').length;
        if(trcount < 6){
            $(".welding_tbody tr:last").find('.layer').select2('destroy');
            $(".welding_tbody tr:last").find('.welder_process').select2('destroy');

            $('.welding_tbody tr:last').clone().insertAfter('.welding_tbody tr:last').find("input:text").val("");
            
            $('.welding_tbody tr:last td:first').html(trcount+1);
            
            $('.welding_tbody tr:nth-child('+(trcount)+') td:last').html('');
            $('.welding_tbody tr:last').attr('data-child', (trcount+1));
            $('.welding_tbody tr:last td:nth-child(4) .classVal').attr('id', 'layer'+(trcount+1));

            // for calculation add dynamic ids
            $('.welding_tbody tr:last td:nth-child(7) .current_amperage_range').attr('id', 'current_amperage_range'+(trcount+1));
            $('.welding_tbody tr:last td:nth-child(8) .current_voltage_range').attr('id', 'current_voltage_range'+(trcount+1));
            $('.welding_tbody tr:last td:nth-child(9) .travel_speed_range').attr('id', 'travel_speed_range'+(trcount+1));
            $('.welding_tbody tr:last td:nth-child(10) .heat_input').attr('id', 'heat_input'+(trcount+1))
                    .attr('data-row-no', (trcount+1));

            $('.layer, .welder_process ').select2();

            if(trcount == 5){
                $('.welding_tbody tr:nth-child('+(trcount+1)+') td:last').html('');
            }
        }
    });


    $(document).on('focus', '.heat_input', function(){
        var row_no = $(this).attr('data-row-no');
        var current_amperage_range = $('#current_amperage_range'+row_no).val();
        var current_voltage_range = $('#current_voltage_range'+row_no).val();
        var travel_speed_range = $('#travel_speed_range'+row_no).val();
        var avg_voltage;
        var avg_amp;
        var avg_travel_speed;
        var total_voltage = 0;

        if(current_amperage_range != '' && current_voltage_range != '' && travel_speed_range != ''){
            // get avarage
            avg_amp = getAverage(current_amperage_range);
            avg_voltage = getAverage(current_voltage_range);
            avg_travel_speed = getAverage(travel_speed_range);
            total_voltage = getAvgAns(avg_voltage, avg_amp, avg_travel_speed);
            $('#heat_input'+row_no).val(total_voltage);
        }
    });

    function getAverage(value){
        var data = value;
        var splitArr = [];
        splitArr = data.split('-');
        return (parseFloat(splitArr[0])+parseFloat(splitArr[1]))/2;
    }

    function getAvgAns(avg_voltage, avg_amp, avg_travel_speed){
        var formula = ((avg_voltage * avg_amp * 60)/avg_travel_speed);
        return Math.round(formula);
    }
    // check the preheat value yes r no choice
    // $(document).on('click',"input[name='pwht']", function(){
    //     var radioValue = $("input[name='pwht']:checked").val();
    //     if(radioValue == 0){

    //     }else if(radioValue == 1){
    //         $('#post').trigger();
    //     }
    // });

    var pqr_id = $("#pqr_id").val();

    $('#btnCompanyDetails').on('click', function(){

        var pqr_no = $('#pqr_no').val();
        var inspection_date = $('#inspection_date').val();
        var wps_no = $('#wps_no').val();
        var process1 = $('#process1').val();
        var process2 = $('#process2').val();
        var process3 = $('#process3').val();
        var type_id = $('#type_id').val();
        var code_id = $('#code_id').val();
        var pqr_other = $('#pqr_other').val();
        var valid = 0;

        

        if(pqr_no == ''){ $('#pqr_no').addClass('invalid'); valid = 1;}else{$('#pqr_no').removeClass('invalid'); valid = 0;}
        if(inspection_date == ''){ $('#inspection_date').addClass('invalid'); valid = 1;}else{$('#inspection_date').removeClass('invalid'); valid = 0;}
        if(wps_no == ''){ $('#wps_no').addClass('invalid'); valid = 1;}else{$('#wps_no').removeClass('invalid'); valid = 0;}
        if(process1 != ''){ $('#process1').next().removeClass('invalid'); valid= 0;}else{$('#process1').next().addClass('invalid'); valid=1;}
        if(type_id != ''){ $('#type_id').next().removeClass('invalid'); valid= 0;}else{$('#type_id').next().addClass('invalid'); valid=1;}
        if(code_id != ''){ $('#code_id').next().removeClass('invalid'); valid= 0;}else{$('#code_id').next().addClass('invalid'); valid=1;}
        


        if(valid == 0){
            $.ajax({
                url : "<?php echo base_url(); ?>operation/pqr/create",
                type: 'POST',
                dataType: 'json',
                data : {
                    blockname: "companyDetails",
                    pqr_id : pqr_id,
                    pqr_no : pqr_no,
                    inspection_date : inspection_date,
                    wps_no : wps_no,
                    process1 : process1,
                    process2 : process2,
                    process3 : process3,
                    type_id : type_id,
                    code_id : code_id,
                    pqr_other : pqr_other

                },
                error: function(err){
                    console.log(err);
                },
                success : function(data){

                    if(data.success == 1){
                        $('#pqr_id').val(data.id);
                        $('.tablinks:nth-child(2)').trigger('click');
                    }
                }

            });
        }

    });

    $('#btnJoints').on('click', function(){
        // var fd = new FormData();
        // $('.joints_image').each(function(k){
        //     var files= $(this)[0].files[0];
        //      fd.append('files'+k,files);
        // });
        // $.ajax({
        //         type: 'post',
        //         url: '<?php echo base_url(); ?>operation/pqr/create?blockname=jointimages',
        //         contentType: false,
        //         processData: false,
        //         data: fd,
        //         // processData: false,
        //         error: function(err){
        //             console.log(err);
        //             alert('Something wrong..!');
        //         }, 
        //         success: function(data){
        //             console.log(data);
        //         }
        //     });
        // return false;
        var joints_A = [];
        var joints_B = [];
        var joints_C = [];
        var joints_D = [];
        var joints_other = [];
        var joints_image = [];

        var val_joints_A = $('.joints_A:first').val();
        var val_joints_B = $('.joints_B:first').val();
        var val_joints_C = $('.joints_C:first').val();
        
        var valid = 0;

        if(val_joints_A == '' && val_joints_B == '' && val_joints_C == ''){
            valid = 1;
        }

        // var form = $('form');
        // var formData = new FormData(form);

        if(valid == 0){
            $('.jointblockrepeat').each(function(k){
                joints_A[k] = $('.joints_A', this).val();
                joints_B[k] = $('.joints_B', this).val();
                joints_C[k] = $('.joints_C', this).val();
                joints_D[k] = $('.joints_D', this).val();
                joints_other[k] = $('.joints_other', this).val();

                // formData.append("files[]", $('.joints_image').files[k]);
           });

            // save the joint value first
            $.ajax({
                type: 'post',
                url: '<?php echo base_url(); ?>operation/pqr/create',
                data: {
                    blockname: "joints",
                    pqr_id: $('#pqr_id').val(),
                    joints_A : joints_A,
                    joints_B : joints_B,
                    joints_C : joints_C,
                    joints_D : joints_D,
                    joints_other : joints_other,
                },
                // processData: false,
                error: function(err){
                    console.log(err);
                    alert('Something wrong..!');
                }, 
                success: function(data){
                     $('#joints_id').val(data.id);
                    $('.tablinks:nth-child(3)').trigger('click');
                }
            });
        }
    });
  
    $('#btnBasemetals').on('click', function(){
        var company = $('#company_id').val();
        var pno_id = $('#pno_id').val();
        var to_pno_id = $('#to_pno_id').val();
        var group_no = $('#group_no').val();
        var to_group_no = $('#to_group_no').val();
        var material_spe = $('#material_spe').val();
        var to_material_spe = $('#to_material_spe').val();
        var thickness_test = $('#thickness_test').val();
        var tgu_no = $('#tgu_no').val();
        var to_tgu_no = $('#to_tgu_no').val();
        var diameter_id = $('#diameter_id').val();
        var base_heat_no = $('#base_heat_no').val();
        var base_to_heat_no = $('#base_to_heat_no').val();
        var base_others = $('#base_others').val();
        var base_to_others = $('#base_to_others').val();
        var valid = 0;

        if(company == ''){ $('#company_id').addClass('invalid'); valid = 1;}else{$('#company_id').removeClass('invalid'); valid = 0;}
        if(pno_id != ''){ $('#pno_id').next().removeClass('invalid'); valid= 0;}else{$('#pno_id').next().addClass('invalid'); valid=1;}
        if(to_pno_id != ''){ $('#to_pno_id').next().removeClass('invalid'); valid= 0;}else{$('#to_pno_id').next().addClass('invalid'); valid=1;}
        if(group_no == ''){ $('#group_no').addClass('invalid'); valid = 1;}else{$('#group_no').removeClass('invalid'); valid = 0;}
        if(to_group_no == ''){ $('#to_group_no').addClass('invalid'); valid = 1;}else{$('#to_group_no').removeClass('invalid'); valid = 0;}
        if(material_spe == ''){ $('#material_spe').addClass('invalid'); valid = 1;}else{$('#material_spe').removeClass('invalid'); valid = 0;}
        if(to_material_spe == ''){ $('#to_material_spe').addClass('invalid'); valid = 1;}else{$('#to_material_spe').removeClass('invalid'); valid = 0;}
        if(thickness_test == ''){ $('#thickness_test').addClass('invalid'); valid = 1;}else{$('#thickness_test').removeClass('invalid'); valid = 0;}
        if(tgu_no == ''){ $('#tgu_no').addClass('invalid'); valid = 1;}else{$('#tgu_no').removeClass('invalid'); valid = 0;}
        if(to_tgu_no == ''){ $('#to_tgu_no').addClass('invalid'); valid = 1;}else{$('#to_tgu_no').removeClass('invalid'); valid = 0;}
        if(base_heat_no == ''){ $('#base_heat_no').addClass('invalid'); valid = 1;}else{$('#base_heat_no').removeClass('invalid'); valid = 0;}
        if(base_to_heat_no == ''){ $('#base_to_heat_no').addClass('invalid'); valid = 1;}else{$('#base_to_heat_no').removeClass('invalid'); valid = 0;}
        if(diameter_id != ''){ $('#diameter_id').next().removeClass('invalid'); valid= 0;}else{$('#diameter_id').next().addClass('invalid'); valid=1;}


         // save the joint value first
        $.ajax({
            type: 'post',
            url: '<?php echo base_url(); ?>operation/pqr/create',
            data: {
                blockname: "basemetals",
                pqr_id: $('#pqr_id').val(),
                company_id : company,
                pno_id : pno_id,
                to_pno_id : to_pno_id,
                group_no : group_no,
                to_group_no : to_group_no,
                material_spe : material_spe,
                to_material_spe : to_material_spe,
                thickness_test : thickness_test,
                tgu_no : tgu_no,
                to_tgu_no : to_tgu_no,
                base_heat_no : base_heat_no,
                base_to_heat_no : base_to_heat_no,
                diameter_id : diameter_id,
                base_others : base_others,
                base_to_others : base_to_others
            },
            // processData: false,
            error: function(err){
                console.log(err);
                alert('Something wrong..!');
            }, 
            success: function(data){
                $('.tablinks:nth-child(4)').trigger('click');
            }
        });
    });

    $('#btnFillermetals').on('click', function(){

        var fno_id = [];
        var a_no = [];
        var sfa_no = [];
        var aws_classfication = [];
        var size_filler_metal = [];
        var filler_supply_metal = [];
        var filler_flux_type = [];
        var filler_flux_trade = [];
        var filler_electrode = [];
        var filer_weld_thickness = [];
        var lot_no = [];
        var fille_other = [];
        var valid = 0;

        $('.fno_id').each(function(k){
            if($(this).val() != ''){ $(this).next().removeClass('invalid'); valid= 0;}else{ $(this).next().addClass('invalid'); valid=1;}
            fno_id[k] = $(this).val();
        });

        $('.a_no').each(function(k){
            if($(this).val() == ''){ valid = 1; $(this).addClass('invalid');}else{ valid = 0; $(this).removeClass('invalid');}
            a_no[k] = $(this).val();
        });

        $('.sfa_no').each(function(k){
            if($(this).val() == ''){ valid = 1; $(this).addClass('invalid');}else{ valid = 0; $(this).removeClass('invalid');}
            sfa_no[k] = $(this).val();
        });

        $('.aws_classfication').each(function(k){
            if($(this).val() == ''){ valid = 1; $(this).addClass('invalid');}else{ valid = 0; $(this).removeClass('invalid');}
            aws_classfication[k] = $(this).val();
        });

        $('.size_filler_metal').each(function(k){
            if($(this).val() == ''){ valid = 1; $(this).addClass('invalid');}else{ valid = 0; $(this).removeClass('invalid');}
            size_filler_metal[k] = $(this).val();
        });

        $('.filler_supply_metal').each(function(k){
            if($(this).val() == ''){ valid = 1; $(this).addClass('invalid');}else{ valid = 0; $(this).removeClass('invalid');}
            filler_supply_metal[k] = $(this).val();
        });

        $('.filler_flux_type').each(function(k){
            if($(this).val() == ''){ valid = 1; $(this).addClass('invalid');}else{ valid = 0; $(this).removeClass('invalid');}
            filler_flux_type[k] = $(this).val();
        }); 

        $('.filler_electrode').each(function(k){
            if($(this).val() == ''){ valid = 1; $(this).addClass('invalid');}else{ valid = 0; $(this).removeClass('invalid');}
            filler_electrode[k] = $(this).val();
        });

        $('.filler_flux_trade').each(function(k){
            if($(this).val() == ''){ valid = 1; $(this).addClass('invalid');}else{ valid = 0; $(this).removeClass('invalid');}
            filler_flux_trade[k] = $(this).val();
        });

        $('.filer_weld_thickness').each(function(k){
            if($(this).val() == ''){ valid = 1; $(this).addClass('invalid');}else{ valid = 0; $(this).removeClass('invalid');}
            filer_weld_thickness[k] = $(this).val();
        });

        $('.lot_no').each(function(k){
            if($(this).val() == ''){ valid = 1; $(this).addClass('invalid');}else{ valid = 0; $(this).removeClass('invalid');}
            lot_no[k] = $(this).val();
        });
        $('.fille_other').each(function(k){
            fille_other[k] = $(this).val();
        });

        // Save Filler Metals block
        if(valid == 0){
            $.ajax({
                type: 'post',
                url: '<?php echo base_url(); ?>operation/pqr/create',
                data: {
                    blockname: "fillermetals",
                    pqr_id: $('#pqr_id').val(),
                    filler_id: $('filler_id').val(),
                    fno_id: fno_id,
                    a_no : a_no,
                    sfa_no: sfa_no,
                    aws_classfication: aws_classfication,
                    size_filler_metal: size_filler_metal,
                    filler_supply_metal: filler_supply_metal,
                    filler_flux_type: filler_flux_type,
                    filler_flux_trade: filler_flux_trade,
                    filler_electrode: filler_electrode,
                    filer_weld_thickness: filer_weld_thickness,
                    lot_no: lot_no,
                    fille_other: fille_other
                },
                // processData: false,
                error: function(err){
                    console.log(err);
                    alert('Something wrong..!');
                }, 
                success: function(data){
                    $('.tablinks:nth-child(5)').trigger('click');
                }
            });
        }
    });
    
    $('#btnposition_preheat').on('click', function(){
        var position_id = $('#position_id').val();
        var weld_progression = $('#weld_progression').val();
        var position_other = $('#position_other').val();
        var preheat_temp_min = $('#preheat_temp_min').val();
        var interpass_temp_max = $('#interpass_temp_max').val();
        var valid = 0;

        if(weld_progression == ''){ $('#weld_progression').addClass('invalid'); valid = 1;}else{$('#weld_progression').removeClass('invalid'); valid = 0;}
        if(interpass_temp_max == ''){ $('#interpass_temp_max').addClass('invalid'); valid = 1;}else{$('#interpass_temp_max').removeClass('invalid'); valid = 0;}
        if(preheat_temp_min == ''){ $('#preheat_temp_min').addClass('invalid'); valid = 1;}else{$('#preheat_temp_min').removeClass('invalid'); valid = 0;}
        if(position_id != ''){ $('#position_id').next().removeClass('invalid'); valid= 0;}else{$('#position_id').next().addClass('invalid'); valid=1;}
        
        if(valid == 0){
            $.ajax({
                url : "<?php echo base_url(); ?>operation/pqr/create",
                type: 'POST',
                dataType: 'json',
                data : {
                    blockname: "position_preheat",
                    pqr_id : $('#pqr_id').val(),
                    position_id : position_id,
                    weld_progression : weld_progression,
                    position_other : position_other,
                    preheat_temp_min : preheat_temp_min,
                    interpass_temp_max : interpass_temp_max
                },
                error: function(err){
                    console.log(err);
                },
                success : function(data){
                    if(data.success == 1){
                        $('.tablinks:nth-child(6)').trigger('click');
                    }
                }

            });
        }

    });

    $('#btnpost').on('click', function(){
        var temp_range = $('#temp_range').val();
        var soak_period = $('#soak_period').val();
        var heat_rate_up_to = $('#heat_rate_up_to').val();
        var heat_rate_from = $('#heat_rate_from').val();
        var control_heat_rate = $('#control_heat_rate').val();
        var cooling_rate = $('#cooling_rate').val();
        var post_heat_other = $('#post_heat_other').val();
        
        var valid = 0;

        if(temp_range == ''){ $('#temp_range').addClass('invalid'); valid = 1;}else{$('#temp_range').removeClass('invalid'); valid = 0;}
        if(soak_period == ''){ $('#soak_period').addClass('invalid'); valid = 1;}else{$('#soak_period').removeClass('invalid'); valid = 0;}
        if(heat_rate_up_to == ''){ $('#heat_rate_up_to').addClass('invalid'); valid = 1;}else{$('#heat_rate_up_to').removeClass('invalid'); valid = 0;}
        if(heat_rate_from == ''){ $('#heat_rate_from').addClass('invalid'); valid = 1;}else{$('#heat_rate_from').removeClass('invalid'); valid = 0;}
        if(control_heat_rate == ''){ $('#control_heat_rate').addClass('invalid'); valid = 1;}else{$('#control_heat_rate').removeClass('invalid'); valid = 0;}
        if(cooling_rate == ''){ $('#cooling_rate').addClass('invalid'); valid = 1;}else{$('#cooling_rate').removeClass('invalid'); valid = 0;}
        
        
        if(valid == 0){
            $.ajax({
                url : "<?php echo base_url(); ?>operation/pqr/create",
                type: 'POST',
                dataType: 'json',
                data : {
                    blockname: "postblock",
                    pqr_id: $('#pqr_id').val(),
                    temp_range :temp_range,
                    soak_period: soak_period,
                    heat_rate_up_to: heat_rate_up_to,
                    heat_rate_from: heat_rate_from,
                    control_heat_rate: control_heat_rate,
                    cooling_rate: cooling_rate,
                    post_heat_other: post_heat_other
                },
                error: function(err){
                    console.log(err);
                },
                success : function(data){

                    if(data.success == 1){
                        $('.tablinks:nth-child(7)').trigger('click');
                    }
                }

            });
        }

    });

    $('#btngas').on('click', function(){
        var shielding_gas = $('#shielding_gas').val();
        var shielding_percent = $('#shielding_percent').val();
        var shielding_rate = $('#shielding_rate').val();
        var backing_gas = $('#backing_gas').val();
        var backing_percent = $('#backing_percent').val();
        var backing_rate = $('#backing_rate').val();
        var trailing_gas = $('#trailing_gas').val();
        var trailing_percent = $('#trailing_percent').val();
        var trailing_rate = $('#trailing_rate').val();
        var valid = 0;

        if(shielding_gas == ''){ $('#shielding_gas').addClass('invalid'); valid = 1;}else{$('#shielding_gas').removeClass('invalid'); valid = 0;}
        if(shielding_percent == ''){ $('#shielding_percent').addClass('invalid'); valid = 1;}else{$('#shielding_percent').removeClass('invalid'); valid = 0;}
        if(shielding_rate == ''){ $('#shielding_rate').addClass('invalid'); valid = 1;}else{$('#shielding_rate').removeClass('invalid'); valid = 0;}
        
        
        if(valid == 0){
            $.ajax({
                url : "<?php echo base_url(); ?>operation/pqr/create",
                type: 'POST',
                dataType: 'json',
                data : {
                    blockname: "gasblock",
                    pqr_id: $('#pqr_id').val(),
                    shielding_gas : shielding_gas,
                    shielding_percent: shielding_percent,
                    shielding_rate: shielding_rate,
                    backing_gas: backing_gas,
                    backing_percent: backing_percent,
                    backing_rate: backing_rate,
                    trailing_gas: trailing_gas,
                    trailing_percent: trailing_percent,
                    trailing_rate: trailing_rate
                },
                error: function(err){
                    console.log(err);
                },
                success : function(data){
                    if(data.success == 1){
                       $('.tablinks:nth-child(8)').trigger('click');
                    }
                }

            });
        }

    });
    

    $('#btnElectrical').on('click', function(){
        var elec_current = [];
        var elec_prolarity = [];
        var elec_amps = [];
        var elec_volts = [];
        var elec_arc = [];
        var elec_weld_bed = [];
        var elec_waveform = [];
        var elec_power = [];
        var elec_type = [];
        var elec_size = [];
        var elec_mode = [];
        var elec_heat = [];
        var elec_other = [];
        var valid = 0;

        $('.elec_current').each(function(k){
            if($(this).val() == ''){ valid = 1; $(this).addClass('invalid');}else{ valid = 0; $(this).removeClass('invalid');}
            elec_current[k] = $(this).val();
        });

        $('.elec_prolarity').each(function(k){
            if($(this).val() == ''){ valid = 1; $(this).addClass('invalid');}else{ valid = 0; $(this).removeClass('invalid');}
            elec_prolarity[k] = $(this).val();
        });

        $('.elec_amps').each(function(k){
            if($(this).val() == ''){ valid = 1; $(this).addClass('invalid');}else{ valid = 0; $(this).removeClass('invalid');}
            elec_amps[k] = $(this).val();
        });

        $('.elec_volts').each(function(k){
            if($(this).val() == ''){ valid = 1; $(this).addClass('invalid');}else{ valid = 0; $(this).removeClass('invalid');}
            elec_volts[k] = $(this).val();
        });

        $('.elec_arc').each(function(k){
            if($(this).val() == ''){ valid = 1; $(this).addClass('invalid');}else{ valid = 0; $(this).removeClass('invalid');}
            elec_arc[k] = $(this).val();
        });

        
        $('.elec_weld_bed').each(function(k){
            if($(this).val() == ''){ valid = 1; $(this).addClass('invalid');}else{ valid = 0; $(this).removeClass('invalid');}
            elec_weld_bed[k] = $(this).val();
        });

        $('.elec_waveform').each(function(k){
            if($(this).val() == ''){ valid = 1; $(this).addClass('invalid');}else{ valid = 0; $(this).removeClass('invalid');}
            elec_waveform[k] = $(this).val();
        });

        $('.elec_power').each(function(k){
            if($(this).val() == ''){ valid = 1; $(this).addClass('invalid');}else{ valid = 0; $(this).removeClass('invalid');}
            elec_power[k] = $(this).val();
        });
        $('.elec_type').each(function(k){
            if($(this).val() == ''){ valid = 1; $(this).addClass('invalid');}else{ valid = 0; $(this).removeClass('invalid');}
            elec_type[k] = $(this).val();
        }); 

        $('.elec_size').each(function(k){
            if($(this).val() == ''){ valid = 1; $(this).addClass('invalid');}else{ valid = 0; $(this).removeClass('invalid');}
            elec_size[k] = $(this).val();
        });

        $('.elec_mode').each(function(k){
            if($(this).val() == ''){ valid = 1; $(this).addClass('invalid');}else{ valid = 0; $(this).removeClass('invalid');}
            elec_mode[k] = $(this).val();
        });

        $('.elec_heat').each(function(k){
            if($(this).val() == ''){ valid = 1; $(this).addClass('invalid');}else{ valid = 0; $(this).removeClass('invalid');}
            elec_heat[k] = $(this).val();
        });

        $('.elec_other').each(function(k){
            if($(this).val() == ''){ valid = 1; $(this).addClass('invalid');}else{ valid = 0; $(this).removeClass('invalid');}
            elec_other[k] = $(this).val();
        });
        

        // Save Filler Metals block
        if(valid == 0){
            $.ajax({
                type: 'post',
                url: '<?php echo base_url(); ?>operation/pqr/create',
                data: {
                    blockname: "electricalblock",
                    pqr_id: $('#pqr_id').val(),
                    elec_current: elec_current,
                    elec_prolarity : elec_prolarity,
                    elec_amps: elec_amps,
                    elec_volts: elec_volts,
                    elec_arc: elec_arc,
                    elec_weld_bed: elec_weld_bed,
                    elec_waveform: elec_waveform,
                    elec_power: elec_power,
                    elec_type: elec_type,
                    elec_size: elec_size,
                    elec_mode: elec_mode,
                    elec_heat: elec_heat,
                    elec_other: elec_other
                },
                // processData: false,
                error: function(err){
                    console.log(err);
                    alert('Something wrong..!');
                }, 
                success: function(data){
                    if(data.success == 1){
                        $('.tablinks:nth-child(9)').trigger('click');
                    }
                }
            });
        }
    });

    $('#btnTechinque').on('click', function(){
        var travel_speed = $('#travel_speed').val();
        var weave_bead = $('#weave_bead').val();
        var cupsize_id = $('#cupsize_id').val();
        var pass_per_side = $('#pass_per_side').val();
        var s_m_electrode = $('#s_m_electrode').val();
        var work_distance = $('#work_distance').val();
        var cleaning_id = $('#cleaning_id').val();
        var thermal_process = $('#thermal_process').val();
        var techinqe_other = $('#techinqe_other').val();
        var valid = 0;

        if(travel_speed == ''){ $('#travel_speed').addClass('invalid'); valid = 1;}else{$('#travel_speed').removeClass('invalid'); valid = 0;}
        if(weave_bead == ''){ $('#weave_bead').addClass('invalid'); valid = 1;}else{$('#weave_bead').removeClass('invalid'); valid = 0;}
        if(cupsize_id != ''){ $('#cupsize_id').next().removeClass('invalid'); valid= 0;}else{ $('#cupsize_id').next().addClass('invalid'); valid=1;}
        if(pass_per_side == ''){ $('#pass_per_side').addClass('invalid'); valid = 1;}else{$('#pass_per_side').removeClass('invalid'); valid = 0;}
        if(s_m_electrode == ''){ $('#s_m_electrode').addClass('invalid'); valid = 1;}else{$('#s_m_electrode').removeClass('invalid'); valid = 0;}
        if(work_distance == ''){ $('#work_distance').addClass('invalid'); valid = 1;}else{$('#work_distance').removeClass('invalid'); valid = 0;}
        if(cleaning_id != ''){ $('#cleaning_id').next().removeClass('invalid'); valid= 0;}else{ $('#cleaning_id').next().addClass('invalid'); valid=1;}
        if(thermal_process == ''){ $('#thermal_process').addClass('invalid'); valid = 1;}else{ $('#thermal_process').removeClass('invalid'); valid = 0;}
        
        
        if(valid == 0){
            $.ajax({
                url : "<?php echo base_url(); ?>operation/pqr/create",
                type: 'POST',
                dataType: 'json',
                data : {
                    blockname: "techinqueblock",
                    pqr_id: $('#pqr_id').val(),
                    weave_bead: weave_bead,
                    cupsize_id: cupsize_id,
                    pass_per_side: pass_per_side,
                    s_m_electrode: s_m_electrode,
                    work_distance: work_distance,
                    cleaning_id: cleaning_id,
                    thermal_process: thermal_process,
                    techinqe_other: techinqe_other
                },
                error: function(err){
                    console.log(err);
                },
                success : function(data){
                    if(data.success == 1){
                        window.location.href = '<?php echo base_url() ?>operation/pqr/';
                    }
                }

            });
        }

    });
    
    $('#btnWeldingparameters').on('click', function(){
        var layer = [];
        var welder_process = [];
        var classVal = [];
        var diameter = [];
        var typer_polority = [];
        var current_amperage_range = [];
        var current_voltage_range = [];
        var travel_speed_range = [];
        var heat_input = [];
        var valid = 0;

        $('.layer').each(function(k){
            if($(this).val() != ''){ $(this).next().removeClass('invalid'); valid= 0;}else{ $(this).next().addClass('invalid'); valid=1;}
            layer[k] = $(this).val();
        });

        $('.welder_process').each(function(k){
            if($(this).val() == ''){ valid = 1; $(this).addClass('invalid');}else{ valid = 0; $(this).removeClass('invalid');}
            welder_process[k] = $(this).val();
        });

        $('.classVal').each(function(k){
            if($(this).val() == ''){ valid = 1; $(this).addClass('invalid');}else{ valid = 0; $(this).removeClass('invalid');}
            classVal[k] = $(this).val();
        });

        $('.diameter').each(function(k){
            if($(this).val() == ''){ valid = 1; $(this).addClass('invalid');}else{ valid = 0; $(this).removeClass('invalid');}
            diameter[k] = $(this).val();
        });

        $('.typer_polority').each(function(k){
            if($(this).val() == ''){ valid = 1; $(this).addClass('invalid');}else{ valid = 0; $(this).removeClass('invalid');}
            typer_polority[k] = $(this).val();
        });

        $('.current_amperage_range').each(function(k){
            if($(this).val() == ''){ valid = 1; $(this).addClass('invalid');}else{ valid = 0; $(this).removeClass('invalid');}
            current_amperage_range[k] = $(this).val();
        });

        $('.current_voltage_range').each(function(k){
            if($(this).val() == ''){ valid = 1; $(this).addClass('invalid');}else{ valid = 0; $(this).removeClass('invalid');}
            current_voltage_range[k] = $(this).val();
        }); 

        $('.travel_speed_range').each(function(k){
            if($(this).val() == ''){ valid = 1; $(this).addClass('invalid');}else{ valid = 0; $(this).removeClass('invalid');}
            travel_speed_range[k] = $(this).val();
        });

        $('.heat_input').each(function(k){
            if($(this).val() == ''){ valid = 1; $(this).addClass('invalid');}else{ valid = 0; $(this).removeClass('invalid');}
            heat_input[k] = $(this).val();
        });

        if(valid == 0){
            $.ajax({
                type: 'post',
                url: '<?php echo base_url(); ?>operation/pqr/create',
                data: {
                    blockname: "weldingparametersblock",
                    pqr_id: $('#pqr_id').val(),
                    layer: layer,
                    welder_process: welder_process,
                    classVal: classVal,
                    diameter: diameter,
                    typer_polority: typer_polority,
                    current_amperage_range: current_amperage_range,
                    current_voltage_range: current_voltage_range,
                    travel_speed_range: travel_speed_range,
                    heat_input: heat_input,
                    blockfinished: 1
                },
                // processData: false,
                error: function(err){
                    console.log(err);
                    alert('Something wrong..!');
                }, 
                success: function(data){
                    $('.tablinks:nth-child(9)').trigger('click');
                }
            });
        }
    });





    $('.previous').on('click', function(){
        var blockno = $(this).attr('data-btn');
        $('.tablinks:nth-child('+blockno+')').trigger('click');
    });
   
    
  });

</script>

<script src="<?php echo base_url(); ?>js/pqr.js"></script>  