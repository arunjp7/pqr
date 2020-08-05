<?php
// Last Updated by  Vinitha 06/08/2016 
$this->mcommon->getCheckUserPermissionHead('PQR add and edit',true);

if(isset($value) && !empty($value)){

  foreach($value->result() as $row){
    $pqr_no = $row->pqr_no;
    $company_id = $row->company_id;
    $process_id = $row->process_id;
    $type_id = $row->type_id;
    $material_id = $row->material_id;
    $to_material_id = $row->to_material_id;
    $pno_id = $row->pno_id;
    $grp_no = $row->grp_no;
    $to_pno_id = $row->to_pno_id;
    $to_grp_no = $row->to_grp_no;
    $thickness_test_coupon = $row->thickness_test_coupon;
    $diameter_test_coupon = $row->diameter_test_coupon;
    $cast_no = $row->cast_no;
    $weld_metal_analysis_no = $row->weld_metal_analysis_no;
    $sizeof_filler_metal = $row->sizeof_filler_metal;
    $f_no = $row->f_no;
    $sfa_id = $row->sfa_id;
    $classfication_no = $row->classfication_no;
    $filler_metal_product_form = $row->filler_metal_product_form;
    $electrode_brand_name = $row->electrode_brand_name;
    $lot_no = $row->lot_no;
    $deposited_weld_thickness = $row->deposited_weld_thickness;
    $position_groove = $row->position_groove;
    $weld_progression = $row->weld_progression;
    $position_other = $row->position_other;
    $preheat_temp_min = $row->preheat_temp_min;
    $interpass_temp_max = $row->interpass_temp_max;
    $temp_range = $row->temp_range;
    $soak_period = $row->soak_period;
    $heating_rate = $row->heating_rate;
    $cooling_rate = $row->cooling_rate;
    $post_heat_other = $row->post_heat_other;
    $shielding_gas = $row->shielding_gas;
    $shielding_percent = $row->shielding_percent;
    $shielding_rate = $row->shielding_rate;
    $backing_gas = $row->backing_gas;
    $backing_percent = $row->backing_percent;
    $backing_rate = $row->backing_rate;
    $trailing_gas = $row->trailing_gas;
    $trailing_percent = $row->trailing_percent;
    $trailing_rate = $row->trailing_rate;
    $travel_speed = $row->travel_speed;
    $bead = $row->bead;
    $cup_size = $row->cup_size;
    $per_side = $row->per_side;
    $electrode = $row->electrode;
    $cleaing = $row->cleaing;
    $tungesten_electrode = $row->tungesten_electrode;
    $result_statificatory = $row->result_statificatory;
    $penetration_into_partent_metal = $row->penetration_into_partent_metal;
    $maro_result = $row->maro_result;
    $type_test = $row->type_test;
    $deposit_analysis = $row->deposit_analysis;
    $test_others = $row->test_others;
    $welder_staff_id = $row->welder_staff_id;
    $stamp_no = $row->stamp_no;
    $conducted_by = $row->conducted_by;
    $laboratory_test_1 = $row->laboratory_test_1;
    $laboratory_test_2 = $row->laboratory_test_2;
    $laboratory_test_3 = $row->laboratory_test_3;
  }
   
} else {
  
    // $pqr_no = $this->input->post('pqr_no');
    $company_id = $this->input->post('company_id');
    $process_id = $this->input->post('process_id');
    $type_id = $this->input->post('type_id');
    $material_id = $this->input->post('material_id');
    $to_material_id = $this->input->post('to_material_id');
    $pno_id = $this->input->post('pno_id');
    $grp_no = $this->input->post('grp_no');
    $to_pno_id = $this->input->post('to_pno_id');
    $to_grp_no = $this->input->post('to_grp_no');
    $thickness_test_coupon = $this->input->post('thickness_test_coupon');
    $diameter_test_coupon = $this->input->post('diameter_test_coupon');
    $cast_no = $this->input->post('cast_no');
    $weld_metal_analysis_no = $this->input->post('weld_metal_analysis_no');
    $sizeof_filler_metal = $this->input->post('sizeof_filler_metal');
    $f_no = $this->input->post('f_no');
    $sfa_id = $this->input->post('sfa_id');
    $classfication_no = $this->input->post('classfication_no');
    $filler_metal_product_form = $this->input->post('filler_metal_product_form');
    $electrode_brand_name = $this->input->post('electrode_brand_name');
    $lot_no = $this->input->post('lot_no');
    $deposited_weld_thickness = $this->input->post('deposited_weld_thickness');
    $position_groove = $this->input->post('position_groove');
    $weld_progression = $this->input->post('weld_progression');
    $position_other = $this->input->post('position_other');
    $preheat_temp_min = $this->input->post('preheat_temp_min');
    $interpass_temp_max = $this->input->post('interpass_temp_max');
    $temp_range = $this->input->post('temp_range');
    $soak_period = $this->input->post('soak_period');
    $heating_rate = $this->input->post('heating_rate');
    $cooling_rate = $this->input->post('cooling_rate');
    $post_heat_other = $this->input->post('post_heat_other');
    $shielding_gas = $this->input->post('shielding_gas');
    $shielding_percent = $this->input->post('shielding_percent');
    $shielding_rate = $this->input->post('shielding_rate');
    $backing_gas = $this->input->post('backing_gas');
    $backing_percent = $this->input->post('backing_percent');
    $backing_rate = $this->input->post('backing_rate');
    $trailing_gas = $this->input->post('trailing_gas');
    $trailing_percent = $this->input->post('trailing_percent');
    $trailing_rate = $this->input->post('trailing_rate');
    $travel_speed = $this->input->post('travel_speed');
    $bead = $this->input->post('bead');
    $cup_size = $this->input->post('cup_size');
    $per_side = $this->input->post('per_side');
    $electrode = $this->input->post('electrode');
    $cleaing = $this->input->post('cleaing');
    $tungesten_electrode = $this->input->post('tungesten_electrode');
    $result_statificatory = $this->input->post('result_statificatory');
    $penetration_into_partent_metal = $this->input->post('penetration_into_partent_metal');
    $maro_result = $this->input->post('maro_result');
    $type_test = $this->input->post('type_test');
    $deposit_analysis = $this->input->post('deposit_analysis');
    $test_others = $this->input->post('test_others');
    $welder_staff_id = $this->input->post('welder_staff_id');
    $stamp_no = $this->input->post('stamp_no');
    $conducted_by = $this->input->post('conducted_by');
    $laboratory_test_1 = $this->input->post('laboratory_test_1');
    $laboratory_test_2 = $this->input->post('laboratory_test_2');
    $laboratory_test_3 = $this->input->post('laboratory_test_3');
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
         
              <div class="tabPqr">
               <ul>
                <li class="tablinks" data-id="companydetails"><?php echo lang('mm_operation_pqr_company_details_label');?></li>
                <li class="tablinks" data-id="joints"><?php echo lang('mm_operation_pqr_joints_label');?></li>
                <li class="tablinks" data-id="basemetals"><?php echo lang('mm_operation_pqr_base_metals_label');?></li>
                <li class="tablinks" data-id="filler"><?php echo lang('mm_operation_pqr_filler_metals_label');?></li>
                <li class="tablinks" data-id="position_preheat"><?php echo lang('mm_operation_pqr_position_label');?> & <?php echo lang('mm_operation_pqr_preheat_label');?></li>
                <li class="tablinks" data-id="post"><?php echo lang('mm_operation_pqr_post_weld_heat_label');?></li>
                <li class="tablinks" data-id="gas"><?php echo lang('mm_operation_pqr_gas_label');?></li>
                <li class="tablinks" data-id="electrical"><?php echo lang('mm_operation_pqr_electrical_character_label');?></li>
                <li class="tablinks" data-id="techniqe"><?php echo lang('mm_operation_pqr_techique_label');?></li>
                <li class="tablinks active" data-id="welding_parameters"><?php echo lang('mm_operation_pqr_welding_parameters_label');?></li>



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
            <div class="row blockdiv hide" id="companydetails">
                <div class="col-sm-12 col-xs-12 box-title-head">
                  <h3 class="box-title"><?php echo lang('mm_operation_pqr_company_details_label');?></h3>
                </div>
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
                      echo form_dropdown('process_id', $drop_menu_process, set_value('process_id', (isset($process_id)) ? $process_id : ''), $attrib);
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
                      echo form_dropdown('process_id', $drop_menu_process, set_value('process_id', (isset($process_id)) ? $process_id : ''), $attrib);
                    ?>                    
                    </div>
                </div>
                <!-- Welding Process 3 -->
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_welding_process_3_label');?></label>
                    <?php   
                      $attrib = 'class="form-control select2 block1_process" name="process3"  data-live-search="true" data-width="100%"  id="process3"';
                      echo form_dropdown('process_id', $drop_menu_process, set_value('process_id', (isset($process_id)) ? $process_id : ''), $attrib);
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
            </div>
            <!-- Block Joints -->
            <div class="row blockdiv hide" id="joints">
                <div class="col-sm-12 col-xs-12 box-title-head">
                    <h3 class="box-title">
                        <?php echo lang('mm_operation_pqr_base_metals_label');?>
                        <button class="btn btn-primary pull-right img-btn" type="button" id="addJointImage">Add Image</button> 
                    </h3>
                </div>
                <!-- joints value -->
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
                                    <input type="text" class="form-control valuedata1" placeholder="<?php echo lang('mm_operation_pqr_joint_groove_angle_label');?>" class="material_id" name="valuedata[]" value="<?php echo $material_id ;?>" autocomplete="off">
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
                                    <input type="text" class="form-control valuedata1" placeholder="<?php echo lang('mm_operation_pqr_joint_base_label');?>" class="material_id" name="valuedata[]" value="<?php echo $material_id ;?>" autocomplete="off">
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
                                    <input type="text" class="form-control valuedata1" placeholder="<?php echo lang('mm_operation_pqr_joint_groove_angle_label');?>" class="material_id" name="valuedata[]" value="<?php echo $material_id ;?>" autocomplete="off">
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
                                    <input type="text" class="form-control valuedata1" placeholder="<?php echo lang('mm_operation_pqr_joint_root_gap_label');?>" class="material_id" name="valuedata[]" value="<?php echo $material_id ;?>" autocomplete="off">
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
                                    <input type="text" class="form-control valuedata1" placeholder="<?php echo lang('mm_operation_pqr_joint_other_label');?>" class="material_id" name="valuedata[]" value="<?php echo $material_id ;?>" autocomplete="off">
                                </div>
                            </div>
                            <!-- displaying add button -->
                            <div class="col-sm-2 col-xs-2">
                                <span><button type="button" class="btn btn-success addVariable addbutton" data-id="3">+</button></span>
                            </div>
                        </div>
                    </div>
                    <!-- get joints image block -->
                    <div class="col-sm-6 col-xs-6">
                        <div class="col-sm-12 col-xs-12 joint_img_block">
                            <div class="form-group <?PHP if(form_error('material_id')){ echo 'has-error';} ?>">
                                <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_joint_image_label');?> <?php echo lang('mm_common_logo_size_label');?> <span class="text-danger">*</span></label>
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                  <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                  <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new"><?php echo lang('mm_common_logo_name_label');?></span> <span class="fileinput-exists"><?php echo lang('mm_common_logo_change_label');?></span>
                                  <input type="file" id="joint_photo1" class="joints_image" name="staffs_photo" placeholder="<?php echo lang('mm_operation_pqr_joint_image_label');?>" >
                                  </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput"><?php echo lang('mm_Hrm_staffs_attachment');?></a>
                                </div>
                                <?PHP if(form_error('staffs_photo')){ echo '<span class="help-block">'.form_error('staffs_photo').'</span>';} ?>
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
            </div>
            <!-- Block Base Mentals -->
            <div class="row blockdiv hide" id="basemetals">
                <div class="col-sm-12 col-xs-12 box-title-head">
                  <h3 class="box-title"><?php echo lang('mm_operation_pqr_base_metals_label');?></h3>
                </div>
                <div class="col-sm-12 col-xs-12">
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
                                        <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_pqr_material_spec_label');?>" id="material_id" name="material_id" value="<?php echo $material_id ;?>" autocomplete="off">
                                        <?PHP if(form_error('material_id')){ echo '<span class="help-block">'.form_error('material_id').'</span>';} ?>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_pqr_material_spec_label');?>" id="to_material_id" name="to_material_id" value="<?php echo $to_material_id ;?>" autocomplete="off">
                                        <?PHP if(form_error('to_material_id')){ echo '<span class="help-block">'.form_error('to_material_id').'</span>';} ?>
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
                                        <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_pqr_thickness_test_label');?>" id="material_id" name="material_id" value="<?php echo $material_id ;?>" autocomplete="off">
                                        <?PHP if(form_error('material_id')){ echo '<span class="help-block">'.form_error('material_id').'</span>';} ?>
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
                                        <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_pqr_heat_no_label');?>" id="material_id" name="material_id" value="<?php echo $material_id ;?>" autocomplete="off">
                                        <?PHP if(form_error('material_id')){ echo '<span class="help-block">'.form_error('material_id').'</span>';} ?>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_pqr_heat_no_label');?>" id="material_id" name="material_id" value="<?php echo $material_id ;?>" autocomplete="off">
                                        <?PHP if(form_error('material_id')){ echo '<span class="help-block">'.form_error('material_id').'</span>';} ?>
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
                                        <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_pqr_others_label');?>" id="material_id" name="material_id" value="<?php echo $material_id ;?>" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_pqr_others_label');?>" id="material_id" name="material_id" value="<?php echo $material_id ;?>" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                <td>
                                    <input type="text" class="form-control processVal" placeholder="<?php echo lang('mm_operation_pqr_process_label');?>" autocomplete="off" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_filler_metal_fno_label');?><span class="text-danger">*</span></label></td>
                                <td data-col="1" data-val="0">
                                    <?php   
                                      $attrib = 'class="form-control select2 fno_id" name="fno_id[]"  data-live-search="true" data-width="100%" style="width:100%;" ';
                                      echo form_dropdown('fno_id', $drop_menu_fno, set_value('fno_id', (isset($fno_id)) ? $fno_id : ''), $attrib);
                                      ?> 
                                    <?PHP if(form_error('fno_id')){ echo '<span class="help-block">'.form_error('fno_id').'</span>';} ?>
                                </td>
                            </tr>
                             <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_weld_metal_analysis_no_label');?><span class="text-danger">*</span></label></td>
                                <td>
                                    <input type="text" class="form-control a_no" placeholder="<?php echo lang('mm_operation_pqr_weld_metal_analysis_no_label');?>" name="a_no[]" value="<?php echo $a_no ;?>" autocomplete="off">
                                    <?PHP if(form_error('a_no')){ echo '<span class="help-block">'.form_error('a_no').'</span>';} ?>
                                </td>
                            </tr>
                             <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_specification_no_label');?><span class="text-danger">*</span></label></td>
                                <td>
                                    <input type="text" class="form-control sfa_no" placeholder="<?php echo lang('mm_operation_pqr_specification_no_label');?>" name="sfa_no[]" value="<?php echo $sfa_no ;?>" autocomplete="off">
                                    <?PHP if(form_error('sfa_no')){ echo '<span class="help-block">'.form_error('sfa_no').'</span>';} ?>
                                </td>
                            </tr>
                             <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_aws_classfication_no_label');?><span class="text-danger">*</span></label></td>
                                <td>
                                    <input type="text" class="form-control aws_classfication" placeholder="<?php echo lang('mm_operation_pqr_aws_classfication_no_label');?>"  name="aws_classfication[]" value="<?php echo $aws_classfication ;?>" autocomplete="off">
                                    <?PHP if(form_error('aws_classfication')){ echo '<span class="help-block">'.form_error('aws_classfication').'</span>';} ?>
                                </td>
                            </tr>
                             <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_size_filler_metal_label');?><span class="text-danger">*</span></label></td>
                                <td>
                                    <input type="text" class="form-control size_filler_metal" placeholder="<?php echo lang('mm_operation_pqr_size_filler_metal_label');?>"  name="size_filler_metal[]" value="<?php echo $size_filler_metal ;?>" autocomplete="off">
                                    <?PHP if(form_error('size_filler_metal')){ echo '<span class="help-block">'.form_error('size_filler_metal').'</span>';} ?>
                                </td>
                            </tr>
                             <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_filler_supply_metal_filler_label');?><span class="text-danger">*</span></label></td>
                                <td>
                                    <input type="text" class="form-control filler_supply_metal" placeholder="<?php echo lang('mm_operation_pqr_filler_supply_metal_filler_label');?>"  name="filler_supply_metal[]" value="<?php echo $filler_supply_metal ;?>" autocomplete="off">
                                    <?PHP if(form_error('filler_supply_metal')){ echo '<span class="help-block">'.form_error('filler_supply_metal').'</span>';} ?>
                                </td>
                            </tr>
                             <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_filler_Electrode_flux_label');?><span class="text-danger">*</span></label></td>
                                <td>
                                    <input type="text" class="form-control filler_electrode" placeholder="<?php echo lang('mm_operation_pqr_filler_Electrode_flux_label');?>"  name="filler_electrode[]" value="<?php echo $filler_electrode ;?>" autocomplete="off">
                                    <?PHP if(form_error('filler_electrode')){ echo '<span class="help-block">'.form_error('filler_electrode').'</span>';} ?>
                                </td>
                            </tr>
                             <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_filler_flux_type_form_label');?><span class="text-danger">*</span></label></td>
                                <td>
                                    <input type="text" class="form-control filler_flux_type" placeholder="<?php echo lang('mm_operation_pqr_filler_flux_type_form_label');?>"  name="filler_flux_type[]" value="<?php echo $filler_flux_type ;?>" autocomplete="off">
                                    <?PHP if(form_error('filler_flux_type')){ echo '<span class="help-block">'.form_error('filler_flux_type').'</span>';} ?>
                                </td>
                            </tr>
                             <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_filler_flux_trade_label');?><span class="text-danger">*</span></label></td>
                                <td>
                                    <input type="text" class="form-control filler_flux_trade" placeholder="<?php echo lang('mm_operation_pqr_filler_flux_trade_label');?>"  name="filler_flux_trade[]" value="<?php echo $filler_flux_trade ;?>" autocomplete="off">
                                    <?PHP if(form_error('filler_flux_trade')){ echo '<span class="help-block">'.form_error('filler_flux_trade').'</span>';} ?>
                                </td>
                            </tr>
                             <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_filler_weld_thickness_label');?><span class="text-danger">*</span></label></td>
                                <td>
                                    <input type="text" class="form-control filer_weld_thickness" placeholder="<?php echo lang('mm_operation_pqr_filler_weld_thickness_label');?>"  name="filer_weld_thickness[]" value="<?php echo $filer_weld_thickness ;?>" autocomplete="off">
                                    <?PHP if(form_error('filer_weld_thickness')){ echo '<span class="help-block">'.form_error('filer_weld_thickness').'</span>';} ?>
                                </td>
                            </tr>
                             <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_lot_no_label');?><span class="text-danger">*</span></label></td>
                                <td>
                                    <input type="text" class="form-control lot_no" placeholder="<?php echo lang('mm_operation_pqr_lot_no_label');?>"  name="lot_no[]" value="<?php echo $lot_no ;?>" autocomplete="off">
                                    <?PHP if(form_error('lot_no')){ echo '<span class="help-block">'.form_error('lot_no').'</span>';} ?>
                                </td>
                            </tr> 
                            <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_metal_other_label');?></label></td>
                                <td>
                                    <input type="text" class="form-control fille_other" placeholder="<?php echo lang('mm_operation_pqr_metal_other_label');?>"  name="fille_other[]" value="<?php echo $fille_other ;?>" autocomplete="off">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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
                        <input type="text" class="form-control" id="shielding_gas" name=" shielding_gas" value="<?php echo $shielding_gas ;?>" autocomplete="off">
                        <?PHP if(form_error('shielding_gas')){ echo '<span class="help-block">'.form_error('shielding_gas').'</span>';} ?>
                      </td>
                      <td>
                        <input type="text" class="form-control" id="shielding_percent" name=" shielding_percent" value="<?php echo $shielding_percent ;?>" autocomplete="off">
                        <?PHP if(form_error('shielding_percent')){ echo '<span class="help-block">'.form_error('shielding_percent').'</span>';} ?>
                      </td>
                      <td>
                        <input type="text" class="form-control" id="shielding_rate" name=" shielding_rate" value="<?php echo $shielding_rate ;?>" autocomplete="off">
                        <?PHP if(form_error('shielding_rate')){ echo '<span class="help-block">'.form_error('shielding_rate').'</span>';} ?>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <?php echo lang('mm_operation_pqr_backing_label');?>
                      </td>
                      <td>
                        <input type="text" class="form-control" id="backing_gas" name=" backing_gas" value="<?php echo $backing_gas ;?>" autocomplete="off">
                        <?PHP if(form_error('backing_gas')){ echo '<span class="help-block">'.form_error('backing_gas').'</span>';} ?>
                      </td>
                      <td>
                        <input type="text" class="form-control" id="backing_percent" name=" backing_percent" value="<?php echo $backing_percent ;?>" autocomplete="off">
                        <?PHP if(form_error('backing_percent')){ echo '<span class="help-block">'.form_error('backing_percent').'</span>';} ?>
                      </td>
                      <td>
                        <input type="text" class="form-control" id="backing_rate" name=" backing_rate" value="<?php echo $backing_rate ;?>" autocomplete="off">
                        <?PHP if(form_error('backing_rate')){ echo '<span class="help-block">'.form_error('backing_rate').'</span>';} ?>
                      </td>
                    </tr>
                      <td>
                        <?php echo lang('mm_operation_pqr_trailing_label');?>
                      </td>
                     <td>
                        <input type="text" class="form-control" id="trailing_gas" name=" trailing_gas" value="<?php echo $trailing_gas ;?>" autocomplete="off">
                        <?PHP if(form_error('trailing_gas')){ echo '<span class="help-block">'.form_error('trailing_gas').'</span>';} ?>
                      </td>
                      <td>
                        <input type="text" class="form-control" id="trailing_percent" name=" trailing_percent" value="<?php echo $trailing_percent ;?>" autocomplete="off">
                        <?PHP if(form_error('trailing_percent')){ echo '<span class="help-block">'.form_error('trailing_percent').'</span>';} ?>
                      </td>
                      <td>
                        <input type="text" class="form-control" id="trailing_rate" name=" trailing_rate" value="<?php echo $trailing_rate ;?>" autocomplete="off">
                        <?PHP if(form_error('trailing_rate')){ echo '<span class="help-block">'.form_error('trailing_rate').'</span>';} ?>
                      </td>
                    </tr>
                  </tbody>
                </table>
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
                                <td>
                                    <input type="text" class="form-control electric_process" placeholder="<?php echo lang('mm_operation_pqr_process_label');?>" autocomplete="off" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_elec_currnet_label');?><span class="text-danger">*</span></label></td>
                                <td data-col="1" data-val="0">
                                    <input type="text" class="form-control elec_current" placeholder="<?php echo lang('mm_operation_pqr_elec_currnet_label');?>" name="elec_current[]" value="<?php echo $elec_current ;?>" autocomplete="off">
                                    <?PHP if(form_error('elec_current')){ echo '<span class="help-block">'.form_error('elec_current').'</span>';} ?>
                                </td>
                            </tr>
                             <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_elec_prolarity_label');?><span class="text-danger">*</span></label></td>
                                <td>
                                    <input type="text" class="form-control elec_prolarity" placeholder="<?php echo lang('mm_operation_pqr_elec_prolarity_label');?>" name="elec_prolarity[]" value="<?php echo $elec_prolarity ;?>" autocomplete="off">
                                    <?PHP if(form_error('elec_prolarity')){ echo '<span class="help-block">'.form_error('elec_prolarity').'</span>';} ?>
                                </td>
                            </tr>
                             <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_elec_amps_label');?><span class="text-danger">*</span></label></td>
                                <td>
                                    <input type="text" class="form-control elec_amps" placeholder="<?php echo lang('mm_operation_pqr_elec_amps_label');?>" name="elec_amps[]" value="<?php echo $elec_amps ;?>" autocomplete="off">
                                    <?PHP if(form_error('elec_amps')){ echo '<span class="help-block">'.form_error('elec_amps').'</span>';} ?>
                                </td>
                            </tr>
                             <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_elec_volts_label');?><span class="text-danger">*</span></label></td>
                                <td>
                                    <input type="text" class="form-control aws_classfication" placeholder="<?php echo lang('mm_operation_pqr_elec_volts_label');?>"  name="aws_classfication[]" value="<?php echo $aws_classfication ;?>" autocomplete="off">
                                    <?PHP if(form_error('aws_classfication')){ echo '<span class="help-block">'.form_error('aws_classfication').'</span>';} ?>
                                </td>
                            </tr>
                             <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_elec_waveform_label');?><span class="text-danger">*</span></label></td>
                                <td>
                                    <input type="text" class="form-control elec_waveform" placeholder="<?php echo lang('mm_operation_pqr_elec_waveform_label');?>"  name="elec_waveform[]" value="<?php echo $elec_waveform ;?>" autocomplete="off">
                                    <?PHP if(form_error('elec_waveform')){ echo '<span class="help-block">'.form_error('elec_waveform').'</span>';} ?>
                                </td>
                            </tr>
                             <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_elec_power_label');?><span class="text-danger">*</span></label></td>
                                <td>
                                    <input type="text" class="form-control elec_power" placeholder="<?php echo lang('mm_operation_pqr_elec_power_label');?>"  name="elec_power[]" value="<?php echo $elec_power ;?>" autocomplete="off">
                                    <?PHP if(form_error('elec_power')){ echo '<span class="help-block">'.form_error('elec_power').'</span>';} ?>
                                </td>
                            </tr>
                             <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_elec_arc_label');?><span class="text-danger">*</span></label></td>
                                <td>
                                    <input type="text" class="form-control elec_arc" placeholder="<?php echo lang('mm_operation_pqr_elec_arc_label');?>"  name="elec_arc[]" value="<?php echo $elec_arc ;?>" autocomplete="off">
                                    <?PHP if(form_error('elec_arc')){ echo '<span class="help-block">'.form_error('elec_arc').'</span>';} ?>
                                </td>
                            </tr>
                             <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_elec_weld_bed_label');?><span class="text-danger">*</span></label></td>
                                <td>
                                    <input type="text" class="form-control elec_weld_bed" placeholder="<?php echo lang('mm_operation_pqr_elec_weld_bed_label');?>"  name="elec_weld_bed[]" value="<?php echo $elec_weld_bed ;?>" autocomplete="off">
                                    <?PHP if(form_error('elec_weld_bed')){ echo '<span class="help-block">'.form_error('elec_weld_bed').'</span>';} ?>
                                </td>
                            </tr>
                             <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_elec_type_label');?><span class="text-danger">*</span></label></td>
                                <td>
                                    <input type="text" class="form-control elec_type" placeholder="<?php echo lang('mm_operation_pqr_elec_type_label');?>"  name="elec_type[]" value="<?php echo $elec_type ;?>" autocomplete="off">
                                    <?PHP if(form_error('elec_type')){ echo '<span class="help-block">'.form_error('elec_type').'</span>';} ?>
                                </td>
                            </tr>
                             <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_elec_size_label');?><span class="text-danger">*</span></label></td>
                                <td>
                                    <input type="text" class="form-control elec_size" placeholder="<?php echo lang('mm_operation_pqr_elec_size_label');?>"  name="elec_size[]" value="<?php echo $elec_size ;?>" autocomplete="off">
                                    <?PHP if(form_error('elec_size')){ echo '<span class="help-block">'.form_error('elec_size').'</span>';} ?>
                                </td>
                            </tr>
                             <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_elec_mode_label');?><span class="text-danger">*</span></label></td>
                                <td>
                                    <input type="text" class="form-control elec_mode" placeholder="<?php echo lang('mm_operation_pqr_elec_mode_label');?>"  name="elec_mode[]" value="<?php echo $elec_mode ;?>" autocomplete="off">
                                    <?PHP if(form_error('elec_mode')){ echo '<span class="help-block">'.form_error('elec_mode').'</span>';} ?>
                                </td>
                            </tr> 
                            <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_elec_heat_label');?><span class="text-danger">*</span></label></td>
                                <td>
                                    <input type="text" class="form-control elec_heat" placeholder="<?php echo lang('mm_operation_pqr_elec_heat_label');?>"  name="elec_heat[]" value="<?php echo $elec_heat ;?>" autocomplete="off">
                                    <?PHP if(form_error('elec_heat')){ echo '<span class="help-block">'.form_error('elec_heat').'</span>';} ?>
                                </td>
                            </tr> 
                            <tr>
                                <td><label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_elec_other_label');?></label></td>
                                <td>
                                    <input type="text" class="form-control elec_other" placeholder="<?php echo lang('mm_operation_pqr_elec_other_label');?>"  name="elec_other[]" value="<?php echo $elec_other ;?>" autocomplete="off">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
              </div>

            <!-- Teachniqe -->
            <div class="row blockdiv hide" id="techniqe">
                <div class="col-sm-12 col-xs-12 box-title-head">
                  <h3 class="box-title"><?php echo lang('mm_operation_pqr_techique_label');?></h3>
                </div>

                <div class="col-sm-12 col-xs-12">
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
                    <div class="col-sm-3 col-xs-3">
                        <div class="form-group <?PHP if(form_error('techinqe_other')){ echo 'has-error';} ?>">
                            <label for="exampleInputEmail1"><?php echo lang('mm_operation_pqr_teachinqe_other_label');?></label>
                            <input type="text" class="form-control" placeholder="<?php echo lang('mm_operation_pqr_teachinqe_other_label');?>" id="techinqe_other" name="techinqe_other" value="<?php echo $techinqe_other ;?>" autocomplete="off">
                            <?PHP if(form_error('techinqe_other')){ echo '<span class="help-block">'.form_error('techinqe_other').'</span>';} ?>
                        </div>
                    </div>
                </div>
                
            </div>

            <!-- Welding Parameters -->
            <div class="row blockdiv" id="welding_parameters">
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
                    <tr class="tr_welding">
                      <td class="tr_sno">1</td>
                      <td>
                        <select class="form-control select2 layer" name="layer[]" data-live-search="true" data-width="100%" style="width:100%;">
                            <option value="">-- Select Layer --</option>
                            <option value="Root">Root</option>
                            <option value="Hot">Hot</option>
                            <option value="Fill">Fill</option>
                            <option value="Cap">Cap</option>
                        </select>
                      </td>
                      <td>
                        <select class="from-control select2 welder_process" name="welder_process" data-live-search="true" data-width="100%" style="width:100%;">
                            <option value="">-- Select Process --</option>
                        </select>
                      </td>
                      <td>
                        <input type="text" class="form-control classVal" name="class[]" value="" autocomplete="off" disabled>
                      </td>
                      <td>
                        <input type="text" class="form-control diameter"  name="diameter[]" value="" autocomplete="off">
                      </td>
                      <td>
                        <input type="text" class="form-control typer_polority" name="typer_polority[]" value="" autocomplete="off">
                      </td>
                      <td>
                        <input type="text" class="form-control current_amperage_range"  name="current_amperage_range[]" value="" autocomplete="off">
                      </td>
                      <td>
                        <input type="text" class="form-control current_voltage_range" name="current_voltage_range[]" value="" autocomplete="off">
                      </td>
                      <td>
                        <input type="text" class="form-control travel_speed_range" name="travel_speed_range[]" value="" autocomplete="off">
                      </td>
                      <td>
                        <input type="text" class="form-control heat_input" name="heat_input[]" value="" autocomplete="off">
                      </td>
                      <td>
                        <button type="button" class="btn btn-info welding_row">+</button>
                      </td>
                    </tr>
                    
                  </tbody>
                </table>
                </div>
            </div>

            <div class="row blockdiv hide" id="tensile">
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
            </div>
              
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

    $('.tablinks').click(function(){
      $('.tablinks').removeClass('active');
      $('.blockdiv').addClass('hide');
      $(this).addClass('active');
      var id = $(this).attr('data-id');
      $('#'+id).removeClass('hide');
    });

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
        console.log($(this).attr("id"));
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
                $('#material_id').val(dataGroup['specification_no']);
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
                $('#to_material_id').val(dataGroup['specification_no']);
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
        var len = parseInt(count)+1;
        $.ajax({
           url: '<?php echo base_url(); ?>operation/PQR/getFno',
           type: 'POST',
           data: { fno_id:  $(this).val()},
           error: function() {
              alert('Something is wrong'); 
           },
           success: function(data) {
                var dataGroup = JSON.parse(data);
                $('#mtable tbody tr:nth-child(3) td:nth-child('+len+') .a_no').val(dataGroup['a_no']);
                $('#mtable tbody tr:nth-child(4) td:nth-child('+len+') .sfa_no').val(dataGroup['sfa_no']);
                $('#mtable tbody tr:nth-child(5) td:nth-child('+len+') .aws_classfication').val(dataGroup['aws_classfication']);              
           }
        });
    });

    $('#process1').on('change', function(){
        process['process1'] = $(this).val();
        layer_select_option($(this).val(), 'process1', $('#process1 option:selected').text());
        processName['process1'] = $('#process1 option:selected').text();
        $('#mtable tbody tr:nth-child(1) td:nth-child(2) .processVal:nth-child(1)').val($("#process1 option:selected").text());
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
            $('#mtable tbody tr:nth-child(1) td:nth-child(3) .processVal:nth-child(1)').val($("#process2 option:selected").text());
            $('#electrical_mtab tbody tr:nth-child(1) td:nth-child(3) .electric_process:nth-child(1)').val($("#process2 option:selected").text());
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
            $('#mtable tbody tr:nth-child(1) td:nth-child(3) .processVal:nth-child(1)').val($("#process2 option:selected").text());
            $('#mtable tbody tr:nth-child(1) td:nth-child(4) .processVal:nth-child(1)').val($("#process3 option:selected").text()); 

            $('#electrical_mtab tbody tr:nth-child(1) td:nth-child(3) .electric_process:nth-child(1)').val($("#process2 option:selected").text());
            $('#electrical_mtab tbody tr:nth-child(1) td:nth-child(4) .electric_process:nth-child(1)').val($("#process3 option:selected").text());   
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

    var optionStr = '';
    optionStr += '<option value="">-- Select Process --</option>';
    function layer_select_option(value, key, textVal){
        
      console.log(process['process1']);
      console.log(processName['process1']);

    }
    function tableTdCreate(){
        $('.fno_id').select2("destroy");
          $('#mtable tbody tr').each(function(key){
                // $(this).children('td:last').attr('class','append'+key);
                var count = key+1;
            
                $("#mtable tbody tr:nth-child("+count+") td:nth-child(2)").clone(false)
                    .insertAfter('#mtable tbody tr:nth-child('+count+') td:nth-child(2)').attr('class','append'+key)
                    .attr('data-val', key)
                    .attr('data-col',key == 1 ? 1+key : undefined);
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
       $('.layer:last').select2("destroy");
        var trcount = 0;
        var thisRow = $( this ).closest( 'tr' )[0];
        $('.welding_tbody tr:last').clone().insertAfter('.welding_tbody tr:last').find( 'input:text' ).val( '' );
        
        var trcount = $('.welding_tbody tr').length;
        $('.welding_tbody tr:last td:first').html(trcount);
        $('.welding_tbody tr:nth-child('+(trcount-1)+') td:last').html('');

        $('.layer').select2();
       
    });

    // check the preheat value yes r no choice
    // $(document).on('click',"input[name='pwht']", function(){
    //     var radioValue = $("input[name='pwht']:checked").val();
    //     if(radioValue == 0){

    //     }else if(radioValue == 1){
    //         $('#post').trigger();
    //     }
    // });
   
  });


// fno_id
// a_no
// sfa_no
// aws_classfication
// size_filler_metal
// filler_supply_metal
// filler_electrode
// filler_flux_type
// filler_flux_trade
// filer_weld_thickness
// lot_no
// fille_other
</script>