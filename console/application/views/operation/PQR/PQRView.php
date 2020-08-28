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
                    <div class="col-md-12" id="viewPQR">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td colspan="2">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Orignization Name:</th><td colspan="3"><?= $company_id ?></td>
                                            </tr>
                                            <tr>
                                                <th>Procedure Qualification Record No.:</th><td><?= $pqr_no ?></td><th>Date</th><td><?= $inspection_date ?></td>
                                            </tr>
                                            <tr>
                                                <th>WPS No.:</th><td colspan="3"><?= $wps_no; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Welding Process(es)</th><td colspan="3"><?= rtrim(implode(',', $process), ',') ?></td>
                                            </tr>
                                            <tr>
                                                <th>Types(Manual, Automatic, Semi-Automatic)</th><td colspan="3"><?= $type_id ?></td>
                                            </tr>
                                            <tr>
                                                <th>Code</th><td><?= $code_id ?></td><th>Others</th><td><?= $pqr_other ?></td>
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
                                                            <th>Groove Angle (A)</th><td><?= $value ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Base Metal Thickness (B)</th><td><?= $joints_b[$key] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Root Face (C)</th><td><?= $joints_c[$key] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Root Gap (D)</th><td><?= $joints_d[$key] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Other</th><td><?= $joints_other[$key] ?></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td></td>
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
                                                <th>P.No to P.No</th><td><?= $pno_id ?></td><td><?= $to_pno_id ?></td>
                                            </tr>
                                            <tr>
                                                <th>Group No. to Group No.</th><td><?= $group_no ?></td><td><?= $to_group_no ?></td>
                                            </tr>
                                            <tr>
                                                <th>Material Specification</th><td><?= $material_spe ?></td><td><?= $to_material_spe ?></td>
                                            </tr>
                                            <tr>
                                                <th>Type or Grade, or UNS Number</th><td><?= $tgu_no ?></td><td><?= $to_tgu_no ?></td>
                                            </tr>
                                            <tr>
                                                <th>Diameter of Test Coupon</th><td><?= $diameter_id ?></td><td><?= $diameter_id ?></td>
                                            </tr>
                                            <tr>
                                                <th>Thickness of test Coupon</th><td><?= $thickness_test ?></td><td><?= $thickness_test ?></td>
                                            </tr>
                                            <tr>
                                                <th>Heat No.</th><td><?= $base_heat_no ?></td><td><?= $base_to_heat_no ?></td>
                                            </tr>
                                            <tr>
                                                <th>Other</th><td><?= $base_others ?></td><td><?= $base_to_others ?></td>
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
                                                <td></td><th>Gas(es)</th><th>Mixture</th><th>Flow Rate</th>
                                            </tr>
                                            <tr>
                                                <th>Shielding</th><td><?= $shielding_gas ?></td><td><?= $shielding_percent ?></td><td><?= $shielding_rate ?></td>
                                            </tr>
                                             <tr>
                                                <th>Trailing</th><td><?= $backing_gas ?></td><td><?= $backing_percent ?></td><td><?= $backing_rate ?></td>
                                            </tr>
                                             <tr>
                                                <th>Backing</th><td><?= $trailing_gas ?></td><td><?= $trailing_percent ?></td><td><?= $trailing_rate ?></td>
                                            </tr>
                                             <tr>
                                                <th>Others</th><td><?= $other_gas ?></td><td><?= $other_gas ?></td><td><?= $other_gas ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                               
                                <tr>
                                    <td>
                                        <table class="table table-bordered">
                                            <caption style="text-align: center;color: #000;font-weight: bold;background: #cccccc7d;">Filler Metals</caption>
                                            <tr>
                                                <th>Process</th>
                                                <?php 
                                                    foreach($fno_id as $k => $value){
                                                ?>
                                                 <td><?= $process[$k] ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <th>Filler Metal No.</th>
                                                <?php 
                                                    foreach($fno_id as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <th>Weld Metal Analysis F-No.</th>
                                                <?php 
                                                    foreach($a_no as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <th>SFA Specification</th>
                                                <?php 
                                                    foreach($sfa_no as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <th>AWS Classification</th>
                                                <?php 
                                                    foreach($aws_classfication as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <th>Size of the Filler Metal</th>
                                                <?php 
                                                    foreach($size_filler_metal as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <th>Filler Metal Product Form</th>
                                                <?php 
                                                    foreach($filler_metal_product as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <th>Supplemental Filler Metal</th>
                                                <?php 
                                                    foreach($filler_supply_metal as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <th>Electrode Flux Classification</th>
                                                <?php 
                                                    foreach($filler_electrode as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <th>Flux Type</th>
                                                <?php 
                                                    foreach($filler_flux_type as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <th>Flux Trade Name</th>
                                                <?php 
                                                    foreach($filler_flux_trade as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <th>Weld Metal Thickness</th>
                                                <?php 
                                                    foreach($filer_weld_thickness as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <th>Lot No</th>
                                                <?php 
                                                    foreach($lot_no as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <th>Other</th>
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
                                                <th>Process</th><?php 
                                                    foreach($elec_current as $k => $value){
                                                ?>
                                                <td><?= $process[$k] ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <th>Current</th><?php 
                                                    foreach($elec_current as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <th>Polarity</th><?php 
                                                    foreach($elec_prolarity as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <th>Amps</th><?php 
                                                    foreach($elec_amps as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <th>Volts</th><?php 
                                                    foreach($elec_volts as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <th>Waveform Control</th><?php 
                                                    foreach($elec_arc as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <th>Power of Emergy</th><?php 
                                                    foreach($elec_weld_bed as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <th>Arc Time</th><?php 
                                                    foreach($elec_waveform as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <th>Weld Bead Length</th><?php 
                                                    foreach($elec_power as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <th>Tungsten Electrode Type</th><?php 
                                                    foreach($elec_type as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <th>Tungeten Electrode Size</th><?php 
                                                    foreach($elec_mode as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <th>Mode of Transfer for GMAW (FCAW)</th><?php 
                                                    foreach($elec_size as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <th>Heat Input</th><?php 
                                                    foreach($elec_heat as $k => $value){
                                                ?>
                                                <td><?= $value ?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <th>Other</th><?php 
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
                                                <th>Position(s)</th><td><?= $position_id ?></td>
                                            </tr>
                                            <tr>
                                                <th>Welding Progression</th><td><?= $weld_progression ?></td>
                                            </tr>
                                            <tr>
                                                <th>Other</th><td><?= $position_other ?></td>
                                            </tr>
                                        </table>
                                        <table class="table table-bordered">
                                            <caption style="text-align: center;color: #000;font-weight: bold;background: #cccccc7d;">Preheat</caption>
                                            <tr>
                                                <th>Preheat Temperature</th><td><?= $preheat_temp_min ?></td>
                                            </tr>
                                            <tr>
                                                <th>Interpass Temperature</th><td><?= $interpass_temp_max ?></td>
                                                </tr>
                                            <tr>
                                                <th>Other</th><td></td>
                                            </tr>
                                        </table>
                                        <table class="table table-bordered">
                                            <caption style="text-align: center;color: #000;font-weight: bold;background: #cccccc7d;">Postweld Heat Treatment</caption>
                                            <tr>
                                                <th>Temperature</th><td><?= $temp_range ?></td>
                                            </tr>
                                            <tr>
                                                <th>Time</th><td><?= $soak_period ?></td>
                                            </tr>
                                            <tr>
                                                <th>Unrestriced Heating Rate up to (&deg;C)</th><td><?= $heat_rate_up_to ?></td>
                                            </tr>
                                            <tr>
                                                <th>Unrestriced Heating Rate From (&deg;C)</th><td><?= $heat_rate_from ?></td>
                                            </tr>
                                            <tr>
                                                <th>Controlled Heating Rate (Max./Hr)</th><td><?= $control_heat_rate ?></td>
                                            </tr>
                                            <tr>
                                                <th>Controlled Cooling Rate (Max./Hr)</th><td><?= $cooling_rate ?></td>
                                            </tr>
                                            <tr>
                                                <th>Other</th><td><?= $post_heat_other ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-bordered">
                                            <caption style="text-align: center;color: #000;font-weight: bold;background: #cccccc7d;">Techniqe</caption>
                                            <tr>
                                                <th>Travel Speed</th><td><?= $travel_speed ?></td>
                                            </tr>
                                            <tr>
                                                <th>String or Weave Bead</th><td><?= $temp_range ?></td>
                                            </tr>
                                            <tr>
                                                <th>Oscillation</th><td><?= $soak_period ?></td>
                                            </tr>
                                            <tr>
                                                <th>Orifice or Gas Size</th><td><?= $heat_rate_up_to ?></td>
                                            </tr>
                                            <tr>
                                                <th>Multipass or Single pass(pre side)</th><td><?= $heat_rate_from ?></td>
                                            </tr>
                                            <tr>
                                                <th>Single or Multiple Electrode</th><td><?= $control_heat_rate ?></td>
                                            </tr>
                                            <tr>
                                                <th>Contact Tube to Work Distance</th><td><?= $cooling_rate ?></td>
                                            </tr>
                                            <tr>
                                                <th>Method of Cleaning</th><td><?= $cleaning_id ?></td>
                                            </tr>
                                            <tr>
                                                <th>Use of Thermal Processes</th><td><?= $thermal_process ?></td>
                                            </tr>
                                            <tr>
                                                <th>Other</th><td><?= $techinqe_other ?></td>
                                            </tr>
                                        </table>
                                    </td>   
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <table class="table table-bordered">
                                            <caption style="text-align: center;color: #000;font-weight: bold;background: #cccccc7d;">WELDING PARAMETERS</caption>
                                           
                                            <tr>
                                                <th rowspan="2" style="vertical-align:bottom;"><?php echo lang('mm_operation_pqr_r_n_label'); ?></th>
                                                <th rowspan="2" style="vertical-align:bottom;"><?php echo lang('mm_operation_pqr_layers_label'); ?></th>
                                                <th rowspan="2" style="vertical-align:bottom;"><?php echo lang('mm_operation_pqr_process_label'); ?></th>
                                                <th colspan="2"><?php echo lang('mm_operation_pqr_filler_metal_label'); ?></th>
                                                <th colspan="3"><?php echo lang('mm_operation_pqr_current_label'); ?></th>
                                                <th rowspan="2" style="vertical-align:bottom;"><?php echo lang('mm_operation_pqr_travel_speed_range_ipm_label'); ?></th>
                                                <th rowspan="2" style="vertical-align:bottom;"><?php echo lang('mm_operation_pqr_heat_input_jinch_label'); ?></th>
                                            </tr>
                                            <tr>  
                                              <th><?php echo lang('mm_operation_pqr_class_label'); ?></th>
                                              <th><?php echo lang('mm_operation_pqr_diameter_label'); ?></th>
                                              <th><?php echo lang('mm_operation_pqr_typer_polarity_label'); ?></th>
                                              <th><?php echo lang('mm_operation_pqr_amperage_range_label'); ?></th>
                                              <th><?php echo lang('mm_operation_pqr_voltage_range_label'); ?></th>
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