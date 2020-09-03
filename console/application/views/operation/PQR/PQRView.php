<?php
// Last Updated by  Vinitha 06/08/2016 
$this->mcommon->getCheckUserPermissionHead('PQR add and edit',true);

if(isset($value) && !empty($value)){

  foreach($value->result() as $row){   

    // Basic block
    $pqr_id = $row->pqr_id;
    $pqr_no = $row->pqr_no;
    $inspection_date = date('d-m-Y', strtotime($row->inspection_date));
    $wps_no = $row->wps_no;
    $process1 = $this->mcommon->getNameById($row->process1, 'jr_process', array('fieldName' => 'process_name', 'fieldId' => 'process_id'));
    $process2 = $this->mcommon->getNameById($row->process2, 'jr_process', array('fieldName' => 'process_name', 'fieldId' => 'process_id'));
    $process3 = $this->mcommon->getNameById($row->process3, 'jr_process', array('fieldName' => 'process_name', 'fieldId' => 'process_id'));
    $process = array($process1, $process2, $process3);
    $type_id = $this->mcommon->getNameById($row->type_id, 'jr_type', array('fieldName' => 'type_name', 'fieldId' => 'type_id')); 
    $code_id = $this->mcommon->getNameById($row->code_id, 'jr_code', array('fieldName' => 'code_name', 'fieldId' => 'code_id'));
    $pqr_other  = $row->pqr_other;


    // Joints Block
    $joints_a = explode(',', $row->joints_a);
    $joints_b = explode(',', $row->joints_b);
    $joints_c = explode(',', $row->joints_c);
    $joints_d = explode(',', $row->joints_d);
    $joints_other = explode(',', $row->joints_other);
    $joints_image = explode(',', $row->joints_image);

    // Base Metals
    $company_id = $this->mcommon->getNameById($row->company_id, 'jr_company_details', array('fieldName' => 'company_name', 'fieldId' => 'company_id'));
    $pno_id = $this->mcommon->getNameById($row->pno_id, 'jr_pno', array('fieldName' => 'pno_name', 'fieldId' => 'pno_id'));
    $to_pno_id = $this->mcommon->getNameById($row->to_pno_id, 'jr_pno', array('fieldName' => 'pno_name', 'fieldId' => 'pno_id'));
    $group_no = $row->group_no;
    $to_group_no = $row->to_group_no;
    $material_spe = $row->material_spe;
    $to_material_spe = $row->to_material_spe;
    $thickness_test = $row->thickness_test;
    $tgu_no = $row->tgu_no;
    $to_tgu_no = $row->to_tgu_no;
    $base_heat_no = $row->base_heat_no;
    $base_to_heat_no = $row->base_to_heat_no;
    $diameter_id = $this->mcommon->getNameById($row->diameter_id, 'jr_diameter', array('fieldName' => 'diameter_name', 'fieldId' => 'diameter_id'));
    $base_others = $row->base_others;
    $base_to_others = $row->base_to_others;

    // Filler Metals
    $fno_id = explode('|', $row->fno_id);
    $a_no = explode('|', $row->a_no);
    $sfa_no = explode('|', $row->sfa_no);
    $aws_classfication = explode('|', $row->aws_classfication);
    $size_filler_metal = explode('|', $row->size_filler_metal);
    $filler_metal_product = explode('|', $row->filler_metal_product);
    $filler_supply_metal = explode('|', $row->filler_supply_metal);
    $filler_flux_type = explode('|', $row->filler_flux_type);
    $filler_flux_trade = explode('|', $row->filler_flux_trade);
    $filler_electrode = explode('|', $row->filler_electrode);
    $filer_weld_thickness = explode('|', $row->filer_weld_thickness);
    $lot_no = explode('|', $row->lot_no);
    $fille_other = explode('|', $row->fille_other);

    $position_id = $this->mcommon->getNameById($row->position_id, 'jr_position', array('fieldName' => 'position_name', 'fieldId' => 'position_id'));
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

    $travel_speed = $row->travel_speed;
    $weave_bead = $row->weave_bead;
    $cupsize_id = $row->cupsize_id;
    $pass_per_side = $row->pass_per_side;
    $s_m_electrode = $row->s_m_electrode;
    $work_distance = $row->work_distance;
    $cleaning_id = $row->cleaning_id;
    $thermal_process = $row->thermal_process;
    $techinqe_other = $row->techinqe_other;

    $layer = explode(',', $row->layer);
    $welder_process = explode(',', $this->mcommon->getNameById($row->welder_process, 'jr_process', array('fieldName' => 'process_name', 'fieldId' => 'process_id')));
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



<!-- form starts here -->
<div id="main-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title"></h4>
                </div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <button type="button" id="printDoc" class="btn btn-primary pull-right">Print</button>
                    </div>
                    <div class="col-md-10" id="viewPQR">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td colspan="2">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td>Orignization Name:</td><td colspan="3"><?= $company_id ?></td>
                                            </tr>
                                            <tr>
                                                <td>Procedure Qualification Record No.:</td><td><?= $pqr_no ?></td><td>Date</td><td><?= $inspection_date ?></td>
                                            </tr>
                                            <tr>
                                                <td>WPS No.:</td><td colspan="3"><?= $wps_no; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Welding Process(es)</td><td colspan="3"><?= rtrim(implode(',', $process), ',') ?></td>
                                            </tr>
                                            <tr>
                                                <td>Types(Manual, Automatic, Semi-Automatic)</td><td colspan="3"><?= $type_id ?></td>
                                            </tr>
                                            <tr>
                                                <td>Code</td><td><?= $code_id ?></td><td>Others</td><td><?= $pqr_other ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <!-- Joints block -->
                                <tr>
                                    <td colspan="2">
                                        <table class="table">
                                            <caption style="text-align: center;color: #000;font-weight: bold;background: #cccccc7d;">JOINTS</caption>
                                            <?php 
                                                if(count($joints_a) != 0){
                                                    foreach($joints_a as $key => $value){
                                            ?>
                                            <tr>
                                                <td>
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <td>Groove Angle (A)</td><td><?= $value ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Base Metal Thickness (B)</td><td><?= $joints_b[$key] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Root Face (C)</td><td><?= $joints_c[$key] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Root Gap (D)</td><td><?= $joints_d[$key] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Other</td><td><?= $joints_other[$key] ?></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td style="text-align:center;"><?php if($joints_image[$key]!=''){ ?> <img id="old_joint_img<?php echo $key ?>" src="<?php echo config_item('image_url').$joints_image[$key];?>" height="200" width="200"> <?php }?></td>
                                            </tr>
                                            <?php 
                                                }
                                            }
                                            ?>
                                        </table>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td>
                                        <table class="table table-bordered">
                                            <caption style="text-align: center;color: #000;font-weight: bold;background: #cccccc7d;">BASE METAL</caption>
                                            <tr>
                                                <td></td><td></td><td></td>
                                            </tr>
                                            <tr>
                                                <td>P.No to P.No</td><td><?= $pno_id ?></td><td><?= $to_pno_id ?></td>
                                            </tr>
                                            <tr>
                                                <td>Group No. to Group No.</td><td><?= $group_no ?></td><td><?= $to_group_no ?></td>
                                            </tr>
                                            <tr>
                                                <td>Material Specification</td><td><?= $material_spe ?></td><td><?= $to_material_spe ?></td>
                                            </tr>
                                            <tr>
                                                <td>Type or Grade, or UNS Number</td><td><?= $tgu_no ?></td><td><?= $to_tgu_no ?></td>
                                            </tr>
                                            <tr>
                                                <td>Diameter of Test Coupon</td><td><?= $diameter_id ?></td><td><?= $diameter_id ?></td>
                                            </tr>
                                            <tr>
                                                <td>Thickness of test Coupon</td><td><?= $thickness_test ?></td><td><?= $thickness_test ?></td>
                                            </tr>
                                            <tr>
                                                <td>Heat No.</td><td><?= $base_heat_no ?></td><td><?= $base_to_heat_no ?></td>
                                            </tr>
                                            <tr>
                                                <td>Other</td><td><?= $base_others ?></td><td><?= $base_to_others ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-bordered">
                                            <caption style="text-align: center;color: #000;font-weight: bold;background: #cccccc7d;">GASES</caption>
                                            <tr>
                                                <td></td><td colspan="3" class="text-center">Percent Composition</td>
                                            </tr>
                                            <tr>
                                                <td></td><td>Gas(es)</td><td>Mixture</td><td>Flow Rate</td>
                                            </tr>
                                            <tr>
                                                <td>Shielding</td><td><?= $shielding_gas ?></td><td><?= $shielding_percent ?></td><td><?= $shielding_rate ?></td>
                                            </tr>
                                             <tr>
                                                <td>Trailing</td><td><?= $backing_gas ?></td><td><?= $backing_percent ?></td><td><?= $backing_rate ?></td>
                                            </tr>
                                             <tr>
                                                <td>Backing</td><td><?= $trailing_gas ?></td><td><?= $trailing_percent ?></td><td><?= $trailing_rate ?></td>
                                            </tr>
                                             <tr>
                                                <td>Others</td><td><?= $other_gas ?></td><td><?= $other_gas ?></td><td><?= $other_gas ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                               
                                <tr>
                                    <td>
                                        <table class="table table-bordered">
                                            <caption style="text-align: center;color: #000;font-weight: bold;background: #cccccc7d;">Filler Metals</caption>
                                            <tr>
                                                <td>Process</td>
                                                <?php 
                                                    foreach($fno_id as $k => $value){
                                                ?>
                                                 <td><?= $process[$k] ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>Filler Metal No.</td>
                                                <?php 
                                                    foreach($fno_id as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>Weld Metal Analysis F-No.</td>
                                                <?php 
                                                    foreach($a_no as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>SFA Specification</td>
                                                <?php 
                                                    foreach($sfa_no as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>AWS Classification</td>
                                                <?php 
                                                    foreach($aws_classfication as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>Size of the Filler Metal</td>
                                                <?php 
                                                    foreach($size_filler_metal as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>Filler Metal Product Form</td>
                                                <?php 
                                                    foreach($filler_metal_product as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>Supplemental Filler Metal</td>
                                                <?php 
                                                    foreach($filler_supply_metal as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>Electrode Flux Classification</td>
                                                <?php 
                                                    foreach($filler_electrode as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>Flux Type</td>
                                                <?php 
                                                    foreach($filler_flux_type as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>Flux Trade Name</td>
                                                <?php 
                                                    foreach($filler_flux_trade as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>Weld Metal Thickness</td>
                                                <?php 
                                                    foreach($filer_weld_thickness as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>Lot No</td>
                                                <?php 
                                                    foreach($lot_no as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>Other</td>
                                                <?php 
                                                    foreach($fille_other as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-bordered">
                                            <caption style="text-align: center;color: #000;font-weight: bold;background: #cccccc7d;">Electrical Characteristics</caption>
                                            <tr>
                                                <td>Process</td><?php 
                                                    foreach($elec_current as $k => $value){
                                                ?>
                                                <td><?= $process[$k] ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>Current</td><?php 
                                                    foreach($elec_current as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>Polarity</td><?php 
                                                    foreach($elec_prolarity as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>Amps</td><?php 
                                                    foreach($elec_amps as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>Volts</td><?php 
                                                    foreach($elec_volts as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>Waveform Control</td><?php 
                                                    foreach($elec_arc as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>Power of Emergy</td><?php 
                                                    foreach($elec_weld_bed as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>Arc Time</td><?php 
                                                    foreach($elec_waveform as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>Weld Bead Length</td><?php 
                                                    foreach($elec_power as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>Tungsten Electrode Type</td><?php 
                                                    foreach($elec_type as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>Tungeten Electrode Size</td><?php 
                                                    foreach($elec_mode as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>Mode of Transfer for GMAW (FCAW)</td><?php 
                                                    foreach($elec_size as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>Heat Input</td><?php 
                                                    foreach($elec_heat as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>Other</td><?php 
                                                    foreach($elec_other as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table class="table table-bordered">
                                            <caption style="text-align: center;color: #000;font-weight: bold;background: #cccccc7d;">Position</caption>
                                            <tr>
                                                <td>Position(s)</td><td><?= $position_id ?></td>
                                            </tr>
                                            <tr>
                                                <td>Welding Progression</td><td><?= $weld_progression ?></td>
                                            </tr>
                                            <tr>
                                                <td>Other</td><td><?= $position_other ?></td>
                                            </tr>
                                        </table>
                                        <table class="table table-bordered">
                                            <caption style="text-align: center;color: #000;font-weight: bold;background: #cccccc7d;">Preheat</caption>
                                            <tr>
                                                <td>Preheat Temperature</td><td><?= $preheat_temp_min ?></td>
                                            </tr>
                                            <tr>
                                                <td>Interpass Temperature</td><td><?= $interpass_temp_max ?></td>
                                                </tr>
                                            <tr>
                                                <td>Other</td><td></td>
                                            </tr>
                                        </table>
                                        <table class="table table-bordered">
                                            <caption style="text-align: center;color: #000;font-weight: bold;background: #cccccc7d;">Postweld Heat Treatment</caption>
                                            <tr>
                                                <td>Temperature</td><td><?= $temp_range ?></td>
                                            </tr>
                                            <tr>
                                                <td>Time</td><td><?= $soak_period ?></td>
                                            </tr>
                                            <tr>
                                                <td>Unrestriced Heating Rate up to (&deg;C)</td><td><?= $heat_rate_up_to ?></td>
                                            </tr>
                                            <tr>
                                                <td>Unrestriced Heating Rate From (&deg;C)</td><td><?= $heat_rate_from ?></td>
                                            </tr>
                                            <tr>
                                                <td>Controlled Heating Rate (Max./Hr)</td><td><?= $control_heat_rate ?></td>
                                            </tr>
                                            <tr>
                                                <td>Controlled Cooling Rate (Max./Hr)</td><td><?= $cooling_rate ?></td>
                                            </tr>
                                            <tr>
                                                <td>Other</td><td><?= $post_heat_other ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-bordered">
                                            <caption style="text-align: center;color: #000;font-weight: bold;background: #cccccc7d;">Techniqe</caption>
                                            <tr>
                                                <td>Travel Speed</td><td><?= $travel_speed ?></td>
                                            </tr>
                                            <tr>
                                                <td>String or Weave Bead</td><td><?= $temp_range ?></td>
                                            </tr>
                                            <tr>
                                                <td>Oscillation</td><td><?= $soak_period ?></td>
                                            </tr>
                                            <tr>
                                                <td>Orifice or Gas Size</td><td><?= $heat_rate_up_to ?></td>
                                            </tr>
                                            <tr>
                                                <td>Multipass or Single pass(pre side)</td><td><?= $heat_rate_from ?></td>
                                            </tr>
                                            <tr>
                                                <td>Single or Multiple Electrode</td><td><?= $control_heat_rate ?></td>
                                            </tr>
                                            <tr>
                                                <td>Contact Tube to Work Distance</td><td><?= $cooling_rate ?></td>
                                            </tr>
                                            <tr>
                                                <td>Method of Cleaning</td><td><?= $cleaning_id ?></td>
                                            </tr>
                                            <tr>
                                                <td>Use of Thermal Processes</td><td><?= $thermal_process ?></td>
                                            </tr>
                                            <tr>
                                                <td>Other</td><td><?= $techinqe_other ?></td>
                                            </tr>
                                        </table>
                                    </td>   
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <table class="table table-bordered">
                                            <caption style="text-align: center;color: #000;font-weight: bold;background: #cccccc7d;">WELDING PARAMETERS</caption>
                                           
                                            <tr>
                                                <td rowspan="2" style="vertical-align:bottom;"><?php echo lang('mm_operation_pqr_r_n_label'); ?></td>
                                                <td rowspan="2" style="vertical-align:bottom;"><?php echo lang('mm_operation_pqr_layers_label'); ?></td>
                                                <td rowspan="2" style="vertical-align:bottom;"><?php echo lang('mm_operation_pqr_process_label'); ?></td>
                                                <td colspan="2"><?php echo lang('mm_operation_pqr_filler_metal_label'); ?></td>
                                                <td colspan="3"><?php echo lang('mm_operation_pqr_current_label'); ?></td>
                                                <td rowspan="2" style="vertical-align:bottom;"><?php echo lang('mm_operation_pqr_travel_speed_range_ipm_label'); ?></td>
                                                <td rowspan="2" style="vertical-align:bottom;"><?php echo lang('mm_operation_pqr_heat_input_jinch_label'); ?></td>
                                            </tr>
                                            <tr>  
                                              <td><?php echo lang('mm_operation_pqr_class_label'); ?></td>
                                              <td><?php echo lang('mm_operation_pqr_diameter_label'); ?></td>
                                              <td><?php echo lang('mm_operation_pqr_typer_polarity_label'); ?></td>
                                              <td><?php echo lang('mm_operation_pqr_amperage_range_label'); ?></td>
                                              <td><?php echo lang('mm_operation_pqr_voltage_range_label'); ?></td>
                                            </tr>
                                            <?php 
                                                $i = 0;
                                                foreach($layer as $k => $value){
                                            ?>
                                            <tr>
                                                <td><?=  ++$i?></td>
                                                <td><?= $value ?></td>
                                                <td><?= $welder_process[$k] ?></td>
                                                <td><?= $classVal[$k] ?></td>
                                                <td><?= $diameter[$k] ?></td>
                                                <td><?= $typer_polority[$k] ?></td>
                                                <td><?= $current_amperage_range[$k] ?></td>
                                                <td><?= $current_voltage_range[$k] ?></td>
                                                <td><?= $travel_speed_range[$k] ?></td>
                                                <td><?= $heat_input[$k] ?></td>
                                            </tr>
                                            <?php 
                                                }
                                            ?>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <!-- /.end form -->


<script>
    $(document).ready(function(){
        $(document).on('click', '#printDoc',function(){
            
            var printContents = document.getElementById('viewPQR').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;

           
        });
    });
</script>