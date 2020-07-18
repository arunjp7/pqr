<?php
// Last Updated by  Vinitha 06/08/2016 
if(isset($staticFormDetails) && !empty($staticFormDetails))
{
  /*
  $trowAdditi = 1;
  foreach($staticFormDetails->result() as $row)
  { 
    $staticFormId = $row->static_form_id;
    $static_form_id[$trowAdditi]                 =  $row->static_form_id;
    $staticForm_welding_variables[$trowAdditi]   =  $row->staticForm_welding_variables;
    $staticForm_quali_test[$trowAdditi]          =  $row->staticForm_quali_test; 
    $staticForm_quali_range[$trowAdditi]         =  $row->staticForm_quali_range; 
    $staticForm_type[$trowAdditi]                =  $row->staticForm_type; 
    $staticForm_type_label[$trowAdditi]          =  $row->staticForm_type_label;
    $staticForm_type_label_value[$trowAdditi]    =  $row->staticForm_type_label_value;
    $staticForm_show_status[$trowAdditi]         =  $row->staticForm_show_status;
    $trowAdditi++;
  }
}
if(isset($testResults) && !empty($testResults))
{
    $trowTestRes = 0;
  foreach($testResults->result() as $row)
  { 
    $batchWPQ_test_type1[$trowTestRes]            =  $row->batchWPQ_test_type1;
    $batchWPQ_test_type1_result[$trowTestRes]     =  $row->batchWPQ_test_type1_result; 
    $batchWPQ_test_type2[$trowTestRes]            =  $row->batchWPQ_test_type2; 
    $batchWPQ_test_type2_result[$trowTestRes]     =  $row->batchWPQ_test_type2_result; 
    $trowTestRes++;
  }
}
if(isset($additionalDetails) && !empty($additionalDetails))
{
  foreach($additionalDetails->result() as $row)
  { 
    $batchWPQ_additional_notes                     =  $row->batchWPQ_additional_notes;
    $batchWPQ_additional_conducted_by              =  $row->batchWPQ_additional_conducted_by; 
    $batchWPQ_additional_date                      =  $row->batchWPQ_additional_date; 
  }
*/
  foreach($staticFormDetails->result() as $row)
  {
    $batchForm_welding_processes_lbl       =  $row->batchForm_welding_processes_lb;
    $batchForm_welding_processes_val       =  $row->batchForm_welding_processes_val;
    $batchForm_welding_processes_range     =  $row->batchForm_welding_processes_range;
    $batchForm_welding_type_lbl            =  $row->batchForm_welding_type_lbl;
    $batchForm_welding_type_val            =  $row->batchForm_welding_type_val;
    $batchForm_welding_type_range          =  $row->batchForm_welding_type_range;
    $batchForm_pno_groupno_lbl             =  $row->batchForm_pno_groupno_lbl;
    $batchForm_pno_groupno_val             =  $row->batchForm_pno_groupno_val;
    $batchForm_pno_groupno_range           =  $row->batchForm_pno_groupno_range;
    $batchForm_test_specimen_lbl           =  $row->batchForm_test_specimen_lbl;
    $batchForm_test_specimen_val           =  $row->batchForm_test_specimen_val;
    $batchForm_test_specimen_range         =  $row->batchForm_test_specimen_range;
    $batchForm_pipe_tube_lbl               =  $row->batchForm_pipe_tube_lbl;
    $batchForm_pipe_tube_val               =  $row->batchForm_pipe_tube_val;
    $batchForm_pipe_tube_range             =  $row->batchForm_pipe_tube_range;
    $batchForm_pipe_plate_lbl              =  $row->batchForm_pipe_plate_lbl;
    $batchForm_pipe_plate_val              =  $row->batchForm_pipe_plate_val;
    $batchForm_pipe_plate_range            =  $row->batchForm_pipe_plate_range;
    $batchForm_type_of_joint_lbl           =  $row->batchForm_type_of_joint_lbl;
    $batchForm_type_of_joint_val           =  $row->batchForm_type_of_joint_val;
    $batchForm_type_of_joint_range         =  $row->batchForm_type_of_joint_range;
    $batchForm_type_of_weld_lbl            =  $row->batchForm_type_of_weld_lbl;
    $batchForm_type_of_weld_val            =  $row->batchForm_type_of_weld_val;
    $batchForm_type_of_weld_range          =  $row->batchForm_type_of_weld_range;  
    $batchForm_joint_backing_lbl           =  $row->batchForm_joint_backing_lbl;
    $batchForm_joint_backing_val           =  $row->batchForm_joint_backing_val;
    $batchForm_joint_backing_range         =  $row->batchForm_joint_backing_range;
    $batchForm_filler_metal_spec_lbl       =  $row->batchForm_filler_metal_spec_lbl;
    $batchForm_filler_metal_spec_val       =  $row->batchForm_filler_metal_spec_val;
    $batchForm_filler_metal_spec_range     =  $row->batchForm_filler_metal_spec_range;
    $batchForm_filler_metal_aws_lbl        =  $row->batchForm_filler_metal_aws_lbl;
    $batchForm_filler_metal_aws_val        =  $row->batchForm_filler_metal_aws_val;
    $batchForm_filler_metal_aws_range      =  $row->batchForm_filler_metal_aws_range;
    $batchForm_filler_metal_fno_lbl        =  $row->batchForm_filler_metal_fno_lbl;
    $batchForm_filler_metal_fno_val        =  $row->batchForm_filler_metal_fno_val;
    $batchForm_filler_metal_fno_range      =  $row->batchForm_filler_metal_fno_range;
    $batchForm_filler_metal_brand_lbl      =  $row->batchForm_filler_metal_brand_lbl;
    $batchForm_filler_metal_brand_val      =  $row->batchForm_filler_metal_brand_val;
    $batchForm_filler_metal_brand_range    =  $row->batchForm_filler_metal_brand_range;
    $batchForm_deposit_weld_lbl            =  $row->batchForm_deposit_weld_lbl;
    $batchForm_deposit_weld_val            =  $row->batchForm_deposit_weld_val;
    $batchForm_deposit_weld_range          =  $row->batchForm_deposit_weld_range;
    $batchForm_consumable_insert_lbl       =  $row->batchForm_consumable_insert_lbl;
    $batchForm_consumable_insert_val       =  $row->batchForm_consumable_insert_val;
    $batchForm_consumable_insert_range     =  $row->batchForm_consumable_insert_range;
    $batchForm_filler_metal_product_lbl    =  $row->batchForm_filler_metal_product_lbl;
    $batchForm_filler_metal_product_val    =  $row->batchForm_filler_metal_product_val;
    $batchForm_filler_metal_product_range  =  $row->batchForm_filler_metal_product_range;
    $batchForm_welding_position_lbl        =  $row->batchForm_welding_position_lbl;
    $batchForm_welding_position_val        =  $row->batchForm_welding_position_val;
    $batchForm_welding_position_range      =  $row->batchForm_welding_position_range;
    $batchForm_vertical_progression_lbl    =  $row->batchForm_vertical_progression_lbl;
    $batchForm_vertical_progression_val    =  $row->batchForm_vertical_progression_val;
    $batchForm_vertical_progression_range  =  $row->batchForm_vertical_progression_range;
    $batchForm_insert_gas_lbl              =  $row->batchForm_insert_gas_lbl;
    $batchForm_insert_gas_val              =  $row->batchForm_insert_gas_val;
    $batchForm_insert_gas_range            =  $row->batchForm_insert_gas_range;
    $batchForm_transfer_mode_lbl           =  $row->batchForm_transfer_mode_lbl;
    $batchForm_transfer_mode_val           =  $row->batchForm_transfer_mode_val;
    $batchForm_transfer_mode_range         =  $row->batchForm_transfer_mode_range;
    $batchForm_current_type_lbl            =  $row->batchForm_current_type_lbl;
    $batchForm_current_type_val            =  $row->batchForm_current_type_val;
    $batchForm_current_type_range          =  $row->batchForm_current_type_range;
  }

  if(isset($testResults) && !empty($testResults))
  {
    foreach($testResults->result() as $row1)
    { 

      $batchForm_visual_inspection_result_lbl     =  $row1->batchForm_visual_inspection_result_lbl;
      $batchForm_visual_inspection_result_val     =  $row1->batchForm_visual_inspection_result_val;
      $batchForm_visual_inspection_result_report  =  $row1->batchForm_visual_inspection_result_report;
      $batchForm_radoigraphy_result_lbl           =  $row1->batchForm_radoigraphy_result_lbl;
      $batchForm_radoigraphy_result_val           =  $row1->batchForm_radoigraphy_result_val;
      $batchForm_radoigraphy_result_report        =  $row1->batchForm_radoigraphy_result_report;
      $batchForm_bend_result_lbl                  =  $row1->batchForm_bend_result_lbl;
      $batchForm_bend_result_val                  =  $row1->batchForm_bend_result_val;
      $batchForm_bend_result_report               =  $row1->batchForm_bend_result_report;
      $batchForm_fillet_fracture_result_lbl       =  $row1->batchForm_fillet_fracture_result_lbl;
      $batchForm_fillet_fracture_result_val       =  $row1->batchForm_fillet_fracture_result_val;
      $batchForm_fillet_fracture_result_report    =  $row1->batchForm_fillet_fracture_result_report;
      $batchForm_macro_examination_result_lbl     =  $row1->batchForm_macro_examination_result_lbl;
      $batchForm_macro_examination_result_val     =  $row1->batchForm_macro_examination_result_val;
      $batchForm_macro_examination_result_report  =  $row1->batchForm_macro_examination_result_report;
      $batchForm_other_test_result_lbl            =  $row1->batchForm_other_test_result_lbl;
      $batchForm_other_test_result_val            =  $row1->batchForm_other_test_result_val;
      $batchForm_other_test_result_report         =  $row1->batchForm_other_test_result_report;
    }
  }

}

else
{
  $batchForm_welding_processes_lbl       =  $this->input->post('batchForm_welding_processes_lbl');
  $batchForm_welding_processes_val       =  $this->input->post('batchForm_welding_processes_val');
  $batchForm_welding_processes_range     =  $this->input->post('batchForm_welding_processes_range');
  $batchForm_welding_type_lbl            =  $this->input->post('batchForm_welding_type_lbl');
  $batchForm_welding_type_val            =  $this->input->post('batchForm_welding_type_val');
  $batchForm_welding_type_range          =  $this->input->post('batchForm_welding_type_range');
  $batchForm_pno_groupno_lbl             =  $this->input->post('batchForm_pno_groupno_lbl');
  $batchForm_pno_groupno_val             =  $this->input->post('batchForm_pno_groupno_val');
  $batchForm_pno_groupno_range           =  $this->input->post('batchForm_pno_groupno_range');
  $batchForm_test_specimen_lbl           =  $this->input->post('batchForm_test_specimen_lbl');
  $batchForm_test_specimen_val           =  $this->input->post('batchForm_test_specimen_val');
  $batchForm_test_specimen_range         =  $this->input->post('batchForm_test_specimen_range');
  $batchForm_pipe_tube_lbl               =  $this->input->post('batchForm_pipe_tube_lbl');
  $batchForm_pipe_tube_val               =  $this->input->post('batchForm_pipe_tube_val');
  $batchForm_pipe_tube_range             =  $this->input->post('batchForm_pipe_tube_range');
  $batchForm_pipe_plate_lbl              =  $this->input->post('batchForm_pipe_plate_lbl');
  $batchForm_pipe_plate_val              =  $this->input->post('batchForm_pipe_plate_val');
  $batchForm_pipe_plate_range            =  $this->input->post('batchForm_pipe_plate_range');
  $batchForm_type_of_joint_lbl           =  $this->input->post('batchForm_type_of_joint_lbl');
  $batchForm_type_of_joint_val           =  $this->input->post('batchForm_type_of_joint_val');
  $batchForm_type_of_joint_range         =  $this->input->post('batchForm_type_of_joint_range');
  $batchForm_type_of_weld_lbl            =  $this->input->post('batchForm_type_of_weld_lbl');
  $batchForm_type_of_weld_val            =  $this->input->post('batchForm_type_of_weld_val');
  $batchForm_type_of_weld_range          =  $this->input->post('batchForm_type_of_weld_range');
  $batchForm_joint_backing_lbl           =  $this->input->post('batchForm_joint_backing_lbl');
  $batchForm_joint_backing_val           =  $this->input->post('batchForm_joint_backing_val');
  $batchForm_joint_backing_range         =  $this->input->post('batchForm_joint_backing_range');
  $batchForm_filler_metal_spec_lbl       =  $this->input->post('batchForm_filler_metal_spec_lbl');
  $batchForm_filler_metal_spec_val       =  $this->input->post('batchForm_filler_metal_spec_val');
  $batchForm_filler_metal_spec_range     =  $this->input->post('batchForm_filler_metal_spec_range');
  $batchForm_filler_metal_aws_lbl        =  $this->input->post('batchForm_filler_metal_aws_lbl');
  $batchForm_filler_metal_aws_val        =  $this->input->post('batchForm_filler_metal_aws_val');
  $batchForm_filler_metal_aws_range      =  $this->input->post('batchForm_filler_metal_aws_range');
  $batchForm_filler_metal_fno_lbl        =  $this->input->post('batchForm_filler_metal_fno_lbl');
  $batchForm_filler_metal_fno_val        =  $this->input->post('batchForm_filler_metal_fno_val');
  $batchForm_filler_metal_fno_range      =  $this->input->post('batchForm_filler_metal_fno_range');
  $batchForm_filler_metal_brand_lbl      =  $this->input->post('batchForm_filler_metal_brand_lbl');
  $batchForm_filler_metal_brand_val      =  $this->input->post('batchForm_filler_metal_brand_val');
  $batchForm_filler_metal_brand_range    =  $this->input->post('batchForm_filler_metal_brand_range');
  $batchForm_deposit_weld_lbl            =  $this->input->post('batchForm_deposit_weld_lbl');
  $batchForm_deposit_weld_val            =  $this->input->post('batchForm_deposit_weld_val');
  $batchForm_deposit_weld_range          =  $this->input->post('batchForm_deposit_weld_range');
  $batchForm_consumable_insert_lbl       =  $this->input->post('batchForm_consumable_insert_lbl');
  $batchForm_consumable_insert_val       =  $this->input->post('batchForm_consumable_insert_val');
  $batchForm_consumable_insert_range     =  $this->input->post('batchForm_consumable_insert_range');
  $batchForm_filler_metal_product_lbl    =  $this->input->post('batchForm_filler_metal_product_lbl');
  $batchForm_filler_metal_product_val    =  $this->input->post('batchForm_filler_metal_product_val');
  $batchForm_filler_metal_product_range  =  $this->input->post('batchForm_filler_metal_product_range');
  $batchForm_welding_position_lbl        =  $this->input->post('batchForm_welding_position_lbl');
  $batchForm_welding_position_val        =  $this->input->post('batchForm_welding_position_val');
  $batchForm_welding_position_range      =  $this->input->post('batchForm_welding_position_range');
  $batchForm_vertical_progression_lbl    =  $this->input->post('batchForm_vertical_progression_lbl');
  $batchForm_vertical_progression_val    =  $this->input->post('batchForm_vertical_progression_val');
  $batchForm_vertical_progression_range  =  $this->input->post('batchForm_vertical_progression_range');
  $batchForm_insert_gas_lbl              =  $this->input->post('batchForm_insert_gas_lbl');
  $batchForm_insert_gas_val              =  $this->input->post('batchForm_insert_gas_val');
  $batchForm_insert_gas_range            =  $this->input->post('batchForm_insert_gas_range');
  $batchForm_transfer_mode_lbl           =  $this->input->post('batchForm_transfer_mode_lbl');
  $batchForm_transfer_mode_val           =  $this->input->post('batchForm_transfer_mode_val');
  $batchForm_transfer_mode_range         =  $this->input->post('batchForm_transfer_mode_range');
  $batchForm_current_type_lbl            =  $this->input->post('batchForm_current_type_lbl');
  $batchForm_current_type_val            =  $this->input->post('batchForm_current_type_val');
  $batchForm_current_type_range          =  $this->input->post('batchForm_current_type_range');


  $batchForm_visual_inspection_result_lbl     =  $this->input->post('batchForm_visual_inspection_result_lbl');
  $batchForm_visual_inspection_result_val     =  $this->input->post('batchForm_visual_inspection_result_val');
  $batchForm_visual_inspection_result_report  =  $this->input->post('batchForm_visual_inspection_result_report');
  $batchForm_radoigraphy_result_lbl           =  $this->input->post('batchForm_radoigraphy_result_lbl');
  $batchForm_radoigraphy_result_val           =  $this->input->post('batchForm_radoigraphy_result_val');
  $batchForm_radoigraphy_result_report        =  $this->input->post('batchForm_radoigraphy_result_report');
  $batchForm_bend_result_lbl                  =  $this->input->post('batchForm_bend_result_lbl');
  $batchForm_bend_result_val                  =  $this->input->post('batchForm_bend_result_val');
  $batchForm_bend_result_report               =  $this->input->post('batchForm_bend_result_report');
  $batchForm_fillet_fracture_result_lbl       =  $this->input->post('batchForm_fillet_fracture_result_lbl');
  $batchForm_fillet_fracture_result_val       =  $this->input->post('batchForm_fillet_fracture_result_val');
  $batchForm_fillet_fracture_result_report    =  $this->input->post('batchForm_fillet_fracture_result_report');
  $batchForm_macro_examination_result_lbl     =  $this->input->post('batchForm_macro_examination_result_lbl');
  $batchForm_macro_examination_result_val     =  $this->input->post('batchForm_macro_examination_result_val');
  $batchForm_macro_examination_result_report  =  $this->input->post('batchForm_macro_examination_result_report');
  $batchForm_other_test_result_lbl            =  $this->input->post('batchForm_other_test_result_lbl');
  $batchForm_other_test_result_val            =  $this->input->post('batchForm_other_test_result_val');
  $batchForm_other_test_result_report         =  $this->input->post('batchForm_other_test_result_report');


/*
    batchForm_welding_processes_lbl, batchForm_welding_processes_val, batchForm_welding_processes_range,batchForm_welding_type_lbl,batchForm_welding_type_val,batchForm_welding_type_range,batchForm_pno_groupno_lbl,batchForm_pno_groupno_val,batchForm_pno_groupno_range,batchForm_test_specimen_lbl,batchForm_test_specimen_val,batchForm_test_specimen_range,batchForm_pipe_tube_lbl,batchForm_pipe_tube_val,batchForm_pipe_tube_range,batchForm_pipe_plate_lbl,batchForm_pipe_plate_val,batchForm_pipe_plate_range,batchForm_type_of_joint_lbl,batchForm_type_of_joint_val,batchForm_type_of_joint_range,batchForm_type_of_weld_lbl,batchForm_type_of_weld_val,batchForm_type_of_weld_range,batchForm_joint_backing_lbl,batchForm_joint_backing_val,batchForm_joint_backing_range,batchForm_filler_metal_spec_lbl,batchForm_filler_metal_spec_val,batchForm_filler_metal_spec_range,batchForm_filler_metal_aws_lbl,batchForm_filler_metal_aws_val,batchForm_filler_metal_aws_range,batchForm_filler_metal_fno_lbl,batchForm_filler_metal_fno_val,batchForm_filler_metal_fno_range,batchForm_filler_metal_brand_lbl,batchForm_filler_metal_brand_val,batchForm_filler_metal_brand_range,batchForm_deposit_weld_lbl,batchForm_deposit_weld_val,batchForm_deposit_weld_range,batchForm_consumable_insert_lbl,batchForm_consumable_insert_val,batchForm_consumable_insert_range,batchForm_filler_metal_product_lbl,batchForm_filler_metal_product_val,batchForm_filler_metal_product_range,batchForm_welding_position_lbl,batchForm_welding_position_val,batchForm_welding_position_range,batchForm_vertical_progression_lbl,batchForm_vertical_progression_val,batchForm_vertical_progression_range,batchForm_insert_gas_lbl,batchForm_insert_gas_val,batchForm_insert_gas_range,batchForm_transfer_mode_lbl,batchForm_transfer_mode_val,batchForm_transfer_mode_range,batchForm_current_type_lbl,batchForm_current_type_val,batchForm_current_type_range



batchForm_visual_inspection_result_lbl,batchForm_visual_inspection_result_val,batchForm_visual_inspection_result_report,batchForm_radoigraphy_result_lbl,batchForm_radoigraphy_result_val,batchForm_radoigraphy_result_report,batchForm_bend_result_lbl,batchForm_bend_result_val,batchForm_bend_result_report,batchForm_fillet_fracture_result_lbl,batchForm_fillet_fracture_result_val,batchForm_fillet_fracture_result_report,batchForm_macro_examination_result_lbl,batchForm_macro_examination_result_val,batchForm_macro_examination_result_report,batchForm_other_test_result_lbl,batchForm_other_test_result_val,batchForm_other_test_result_report
*/


}
$batch_ref_no= ($batchrefno != '') ? $batchrefno : $batch_ref_no;
$trowTestRes= ($trowTestRes != '') ? $trowTestRes : 3;

    $htmlValue = '';
    $position1g = '';
    $position2g = '';
    $position3g = '';
    $position4g = '';
    $position5g = '';
    $position6g = '';
    $position3gand4g = '';
    $position2g3gand4g = '';
    $position2gand5g = '';
    $positionspecialpositions = '';

    $position1f = '';
    $position2f = '';
    $position3f = '';
    $position2fr = '';
    $position4f = '';
    $position5f = '';
    $position3f4f = '';


    if($batchForm_welding_position_val == '1G'){ $position1g="Selected";}
    if($batchForm_welding_position_val == '2G'){ $position2g="Selected";}
    if($batchForm_welding_position_val == '3G'){ $position3g="Selected";}
    if($batchForm_welding_position_val == '4G'){ $position4g="Selected";}
    if($batchForm_welding_position_val == '5G'){ $position5g="Selected";}
    if($batchForm_welding_position_val == '6G'){ $position6g="Selected";}
    if($batchForm_welding_position_val == '3G and 4G'){ $position3gand4g="Selected";}
    if($batchForm_welding_position_val == '2G, 3G and 4G'){ $position2g3gand4g="Selected";}
    if($batchForm_welding_position_val == '2G and 5G'){ $position2gand5g="Selected";}
    if($batchForm_welding_position_val == 'Special Positions (SP)'){ $positionspecialpositions="Selected";}

    if($batchForm_welding_position_val == '1F'){ $position1f="Selected";}
    if($batchForm_welding_position_val == '2F'){ $position2f="Selected";}
    if($batchForm_welding_position_val == '3F'){ $position3f="Selected";}
    if($batchForm_welding_position_val == '2FR'){ $position2fr="Selected";}
    if($batchForm_welding_position_val == '4F'){ $position4f="Selected";}
    if($batchForm_welding_position_val == '5F'){ $position5f="Selected";}
    if($batchForm_welding_position_val == '3F and 4F'){ $position3f4f="Selected";}


    if($batchForm_test_specimen_val == 'Pipe' && $batchForm_type_of_weld_val == 'Groove'){
      
      $htmlValue = '<select name="batchForm_welding_position_val" class="form-control select2"  id="batchForm_welding_position_val" onchange="getval()"><option value="">--- Select ---</option><option value="1g" '.$position1g.'>1G</option><option value="2g" '.$position2g.'>2G</option><option value="5g" '.$position5g.'>5G</option><option value="6g" '.$position6g.'>6G</option><option value="2gand5g" '.$position2gand5g.'>2G and 5G</option><option value="specialpositions" '.$positionspecialpositions.'>Special Positions (SP)</option></select>';
    } else if($batchForm_test_specimen_val == 'Plate' && $batchForm_type_of_weld_val == 'Groove'){
      $htmlValue = '<select name="batchForm_welding_position_val" class="form-control select2" id="batchForm_welding_position_val" onchange="getval()"><option value="">--- Select ---</option><option value="1g" '.$position1g.'>1G</option><option value="2g" '.$position2g.'>2G</option><option value="3g" '.$position3g.'>3G</option><option value="4g" '.$position4g.'>4G</option><option value="3gand4g" '.$position3gand4g.'>3G and 4G</option><option value="2g3gand4g" '.$position2g3gand4g.'>2G, 3G and 4G</option><option value="specialpositions" '.$positionspecialpositions.'>Special Positions (SP)</option></select>';
    } else if($batchForm_test_specimen_val == 'Pipe' && $batchForm_type_of_weld_val == 'Fillet'){
      $htmlValue = '<select name="batchForm_welding_position_val" class="form-control select2" id="batchForm_welding_position_val" onchange="getval()"><option value="">--- Select ---</option><option value="1f" '.$position1f.'>1F</option><option value="2f" '.$position2f.'>2F</option><option value="2fr" '.$position2fr.'>2FR</option><option value="4f" '.$position4f.'>4F</option><option value="5f" '.$position5f.'>5F</option><option value="specialpositions" '.$positionspecialpositions.'>Special Positions (SP)</option></select>';
    } else if($batchForm_test_specimen_val == 'Plate' && $batchForm_type_of_weld_val == 'Fillet'){
      $htmlValue = '<select name="batchForm_welding_position_val" class="form-control select2" id="batchForm_welding_position_val" onchange="getval()"><option value="">--- Select ---</option><option value="1f" '.$position1f.'>1F</option><option value="2f" '.$position2f.'>2F</option><option value="3f" '.$position3f.'>3F</option><option value="4f" '.$position4f.'>4F</option><option value="3f4f" '.$position3f4f.'>3F and 4F</option><option value="specialpositions" '.$positionspecialpositions.'>Special Positions (SP)</option></select>';
    } else {
      $htmlValue = '<input type="text" class="form-control" placeholder="" id="batchForm_welding_position_val" name="batchForm_welding_position_val" value="'.$batchForm_test_specimen_val.'" autocomplete="off">';
    }

?>
  <!-- /.start form -->
  

  <div class="row">
    <div class="col-md-12">
      <div class="white-box">

      <?php
        if($this->session->flashdata('res'))
        {
          ?>
          <div class="alert alert-<?php echo $this->session->flashdata('res_type'); ?> successmessage">
            <a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?php   echo $this->session->flashdata('res'); ?>
          </div>
          <?php
        }
        ?>

      <!--
        <h3 class="box-title m-b-0"><?php echo $form_tittle;?></h3>
        <p class="text-muted m-b-30 font-13"> <?php echo $form_tittle_small;?> </p>
      -->
      <?php echo form_open_multipart($form_url); ?>
        <hr />
        <div class="row">
          <div class="col-sm-4 col-xs-4 center">
            <div class="form-group m-b-0">
              <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_wpq_top_welding_variables');?></label>
            </div>
          </div>
          <div class="col-sm-4 col-xs-4 center">
            <div class="form-group m-b-0">
              <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_wpq_top_quali_test');?></label>
            </div>
          </div>
          <div class="col-sm-4 col-xs-4 center">
            <div class="form-group m-b-0">
              <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_wpq_top_quali_range');?></label>
            </div>
          </div>                
        </div>
        <hr />


        <div class="row">
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="" id="batchForm_welding_processes_lbl" name="batchForm_welding_processes_lbl" value="<?php echo ($batchForm_welding_processes_lbl != '') ? $batchForm_welding_processes_lbl : 'Welding Process(es)';?>" autocomplete="off">
              <?PHP if(form_error('batchForm_welding_processes_lbl')){ echo '<span class="help-block">'.form_error('batchForm_welding_processes_lbl').'</span>';} ?>
            </div>
          </div>
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="" id="batchForm_welding_processes_val" name="batchForm_welding_processes_val" value="<?php echo $batchForm_welding_processes_val;?>" autocomplete="off">
              <?PHP if(form_error('batchForm_welding_processes_val')){ echo '<span class="help-block">'.form_error('batchForm_welding_processes_val').'</span>';} ?>
            </div>
          </div>
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <input type="text"  class="form-control" placeholder="" id="batchForm_welding_processes_range" name="batchForm_welding_processes_range" value="<?php echo $batchForm_welding_processes_range;?>" autocomplete="off">
              <?PHP if(form_error('batchForm_welding_processes_range')){ echo '<span class="help-block">'.form_error('batchForm_welding_processes_range').'</span>';} ?>
            </div>
          </div>              
        </div>
        <div class="row">
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="" id="batchForm_welding_type_lbl" name="batchForm_welding_type_lbl" value="<?php echo ($batchForm_welding_type_lbl != '') ? $batchForm_welding_type_lbl : 'Type (Manual, Sem-auto, Auto, Mechanized) used';?>" autocomplete="off">
              <?PHP if(form_error('batchForm_welding_type_lbl')){ echo '<span class="help-block">'.form_error('batchForm_welding_type_lbl').'</span>';} ?>
            </div>
          </div>                
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="" id="batchForm_welding_type_val" name="batchForm_welding_type_val" value="<?php echo $batchForm_welding_type_val;?>" autocomplete="off">
              <?PHP if(form_error('batchForm_welding_type_val')){ echo '<span class="help-block">'.form_error('batchForm_welding_type_val').'</span>';} ?>
            </div>
          </div>
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <input type="text"  class="form-control" placeholder="" id="batchForm_welding_type_range" name="batchForm_welding_type_range" value="<?php echo $batchForm_welding_type_range;?>" autocomplete="off">
              <?PHP if(form_error('batchForm_welding_type_range')){ echo '<span class="help-block">'.form_error('batchForm_welding_type_range').'</span>';} ?>
            </div>
          </div>                
        </div>

        <legend><?php echo lang('mm_masters_batch_form_base_metal_lbl');?></legend>

        <div class="row">
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="" id="batchForm_pno_groupno_lbl" name="batchForm_pno_groupno_lbl" value="<?php echo ($batchForm_pno_groupno_lbl != '') ? $batchForm_pno_groupno_lbl : 'Base Metals P-Number to P-Number / /Group to Group';?>" autocomplete="off">
              <?PHP if(form_error('batchForm_pno_groupno_lbl')){ echo '<span class="help-block">'.form_error('batchForm_pno_groupno_lbl').'</span>';} ?>
            </div>
          </div>                  
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="" id="batchForm_pno_groupno_val" name="batchForm_pno_groupno_val" value="<?php echo $batchForm_pno_groupno_val;?>" autocomplete="off">
              <?PHP if(form_error('batchForm_pno_groupno_val')){ echo '<span class="help-block">'.form_error('batchForm_pno_groupno_val').'</span>';} ?>
            </div>
          </div>
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <input type="text"  class="form-control" placeholder="" id="batchForm_pno_groupno_range" name="batchForm_pno_groupno_range" value="<?php echo $batchForm_pno_groupno_range;?>" autocomplete="off">
              <?PHP if(form_error('batchForm_pno_groupno_range')){ echo '<span class="help-block">'.form_error('batchForm_pno_groupno_range').'</span>';} ?>
            </div>
          </div>                
        </div>

        <div class="row">
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="" id="batchForm_test_specimen_lbl" name="batchForm_test_specimen_lbl" value="<?php echo ($batchForm_test_specimen_lbl != '') ? $batchForm_test_specimen_lbl : 'Test Specimen (Pipe / Plate)';?>" autocomplete="off">
              <?PHP if(form_error('batchForm_test_specimen_lbl')){ echo '<span class="help-block">'.form_error('batchForm_test_specimen_lbl').'</span>';} ?>
            </div>
          </div>                
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <select name="batchForm_test_specimen_val" class="form-control select2" data-live-search="true" data-width="100%" id="batchForm_test_specimen_val" tabindex="-1" onchange="myFunction()">
                <option value="">--- Select Test Specimen (Pipe / Plate)---</option>
                <option value="Pipe" <?php if($batchForm_test_specimen_val == 'Pipe'){ echo 'selected="selected"';}?>>Pipe</option>
                <option value="Plate" <?php if($batchForm_test_specimen_val == 'Plate'){ echo 'selected="selected"';}?>>Plate</option>
              </select>
              <?PHP if(form_error('batchForm_test_specimen_val')){ echo '<span class="help-block">'.form_error('batchForm_test_specimen_val').'</span>';} ?>
            </div>
          </div>
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <input type="text"  class="form-control" placeholder="" id="batchForm_test_specimen_range" name="batchForm_test_specimen_range" value="<?php echo $batchForm_test_specimen_range;?>" autocomplete="off" <?php echo ($batchForm_test_specimen_range != '') ? 'selected': '';?>>
              <?PHP if(form_error('batchForm_test_specimen_range')){ echo '<span class="help-block">'.form_error('batchForm_test_specimen_range').'</span>';} ?>
            </div>
          </div>                
        </div>

        <div class="row">
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">  
              <input type="text" class="form-control" placeholder="" id="batchForm_pipe_tube_lbl" name="batchForm_pipe_tube_lbl" value="<?php echo ($batchForm_pipe_tube_lbl != '') ? $batchForm_pipe_tube_lbl : 'Pipe / Tube Diameter';?>" autocomplete="off">
              <?PHP if(form_error('batchForm_pipe_tube_lbl')){ echo '<span class="help-block">'.form_error('batchForm_pipe_tube_lbl').'</span>';} ?>
            </div>
          </div>
                
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="" id="batchForm_pipe_tube_val" name="batchForm_pipe_tube_val" value="<?php echo $batchForm_pipe_tube_val;?>" autocomplete="off"  onkeyup="myFunction()">
              <?PHP if(form_error('batchForm_pipe_tube_val')){ echo '<span class="help-block">'.form_error('batchForm_pipe_tube_val').'</span>';} ?>
            </div>
          </div>
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <input type="text"  class="form-control" placeholder="" id="batchForm_pipe_tube_range" name="batchForm_pipe_tube_range" value="<?php echo $batchForm_pipe_tube_range;?>" autocomplete="off">
              <?PHP if(form_error('batchForm_pipe_tube_range')){ echo '<span class="help-block">'.form_error('batchForm_pipe_tube_range').'</span>';} ?>
            </div>
          </div>                                                                    
        </div>

        <div class="row">
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">  
              <input type="text" class="form-control" placeholder="" id="batchForm_pipe_plate_lbl" name="batchForm_pipe_plate_lbl" value="<?php echo ($batchForm_pipe_plate_lbl != '') ? $batchForm_pipe_plate_lbl : 'Pipe / Plate Tickness';?>" autocomplete="off">
              <?PHP if(form_error('batchForm_pipe_plate_lbl')){ echo '<span class="help-block">'.form_error('batchForm_pipe_plate_lbl').'</span>';} ?>
            </div>
          </div>
                
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="" id="batchForm_pipe_plate_val" name="batchForm_pipe_plate_val" value="<?php echo $batchForm_pipe_plate_val;?>" autocomplete="off"  onkeyup="myFunction()">
              <?PHP if(form_error('batchForm_pipe_plate_val')){ echo '<span class="help-block">'.form_error('batchForm_pipe_plate_val').'</span>';} ?>
            </div>
          </div>
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <input type="text"  class="form-control" placeholder="" id="batchForm_pipe_plate_range" name="batchForm_pipe_plate_range" value="<?php echo $batchForm_pipe_plate_range;?>" autocomplete="off">
              <?PHP if(form_error('batchForm_pipe_plate_range')){ echo '<span class="help-block">'.form_error('batchForm_pipe_plate_range').'</span>';} ?>
            </div>
          </div>                
        </div>

        <legend><?php echo lang('mm_masters_batch_form_joints_lbl');?></legend>

        <div class="row">
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">  
              <input type="text" class="form-control" placeholder="" id="batchForm_type_of_joint_lbl" name="batchForm_type_of_joint_lbl" value="<?php echo ($batchForm_type_of_joint_lbl != '') ? $batchForm_type_of_joint_lbl : 'Type of Joint (Butt, Lap, etc.)';?>" autocomplete="off">
              <?PHP if(form_error('batchForm_type_of_joint_lbl')){ echo '<span class="help-block">'.form_error('batchForm_type_of_joint_lbl').'</span>';} ?>
            </div>
          </div>
                
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="" id="batchForm_type_of_joint_val" name="batchForm_type_of_joint_val" value="<?php echo $batchForm_type_of_joint_val;?>" autocomplete="off">
              <?PHP if(form_error('batchForm_type_of_joint_val')){ echo '<span class="help-block">'.form_error('batchForm_type_of_joint_val').'</span>';} ?>
            </div>
          </div>
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <input type="text"  class="form-control" placeholder="" id="batchForm_type_of_joint_range" name="batchForm_type_of_joint_range" value="<?php echo $batchForm_type_of_joint_range;?>" autocomplete="off">
              <?PHP if(form_error('batchForm_type_of_joint_range')){ echo '<span class="help-block">'.form_error('batchForm_type_of_joint_range').'</span>';} ?>
            </div>
          </div>                
        </div>

        <div class="row">
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="" id="batchForm_type_of_weld_lbl" name="batchForm_type_of_weld_lbl" value="<?php echo ($batchForm_type_of_weld_lbl != '') ? $batchForm_type_of_weld_lbl : 'Type of Weld (Groove, Fillet)';?>" autocomplete="off">
              <?PHP if(form_error('batchForm_type_of_weld_lbl')){ echo '<span class="help-block">'.form_error('batchForm_type_of_weld_lbl').'</span>';} ?>
            </div>
          </div>
                
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <select name="batchForm_type_of_weld_val" class="form-control select2" data-live-search="true" data-width="100%" id="batchForm_type_of_weld_val" tabindex="-1" onchange="myFunction()">
                <option value="">--- Select Type of Weld (Groove, Fillet) ---</option>
                <option value="Groove" <?php if($batchForm_type_of_weld_val == 'Groove'){ echo 'selected="selected"';}?>>Groove</option>
                <option value="Fillet" <?php if($batchForm_type_of_weld_val == 'Fillet'){ echo 'selected="selected"';}?>>Fillet</option>
              </select>
              <?PHP if(form_error('batchForm_type_of_weld_val')){ echo '<span class="help-block">'.form_error('batchForm_type_of_weld_val').'</span>';} ?>
            </div>
          </div>
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <input type="text"  class="form-control" placeholder="" id="batchForm_type_of_weld_range" name="batchForm_type_of_weld_range" value="<?php echo $batchForm_type_of_weld_range;?>" autocomplete="off"  <?php echo ($batchForm_type_of_weld_range != '') ? 'selected': '';?>>
              <?PHP if(form_error('batchForm_type_of_weld_range')){ echo '<span class="help-block">'.form_error('batchForm_type_of_weld_range').'</span>';} ?>
            </div>
          </div>                
        </div>

        <div class="row">
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">  
              <input type="text" class="form-control" placeholder="" id="batchForm_joint_backing_lbl" name="batchForm_joint_backing_lbl" value="<?php echo ($batchForm_joint_backing_lbl != '') ? $batchForm_joint_backing_lbl : 'Backing (metal, weld metal, double-welded etc)';?>" autocomplete="off">
              <?PHP if(form_error('batchForm_joint_backing_lbl')){ echo '<span class="help-block">'.form_error('batchForm_joint_backing_lbl').'</span>';} ?>
            </div>
          </div>
                
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="" id="batchForm_joint_backing_val" name="batchForm_joint_backing_val" value="<?php echo $batchForm_joint_backing_val;?>" autocomplete="off">
              <?PHP if(form_error('batchForm_joint_backing_val')){ echo '<span class="help-block">'.form_error('batchForm_joint_backing_val').'</span>';} ?>
            </div>
          </div>
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <input type="text"  class="form-control" placeholder="" id="batchForm_joint_backing_range" name="batchForm_joint_backing_range" value="<?php echo $batchForm_joint_backing_range;?>" autocomplete="off">
              <?PHP if(form_error('batchForm_joint_backing_range')){ echo '<span class="help-block">'.form_error('batchForm_joint_backing_range').'</span>';} ?>
            </div>
          </div>                
        </div>

        <legend><?php echo lang('mm_masters_batch_form_filler_metal_lbl');?></legend>

        <div class="row">
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">  
              <input type="text" class="form-control" placeholder="" id="batchForm_filler_metal_spec_lbl" name="batchForm_filler_metal_spec_lbl" value="<?php echo ($batchForm_filler_metal_spec_lbl != '') ? $batchForm_filler_metal_spec_lbl : 'Filler Metal or Electrode specification (s) (SFA No.)';?>" autocomplete="off">
              <?PHP if(form_error('batchForm_filler_metal_spec_lbl')){ echo '<span class="help-block">'.form_error('batchForm_filler_metal_spec_lbl').'</span>';} ?>
            </div>
          </div>
                
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="" id="batchForm_filler_metal_spec_val" name="batchForm_filler_metal_spec_val" value="<?php echo $batchForm_filler_metal_spec_val;?>" autocomplete="off">
              <?PHP if(form_error('batchForm_filler_metal_spec_val')){ echo '<span class="help-block">'.form_error('batchForm_filler_metal_spec_val').'</span>';} ?>
            </div>
          </div>
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <input type="text"  class="form-control" placeholder="" id="batchForm_filler_metal_spec_range" name="batchForm_filler_metal_spec_range" value="<?php echo $batchForm_filler_metal_spec_range;?>" autocomplete="off">
              <?PHP if(form_error('batchForm_filler_metal_spec_range')){ echo '<span class="help-block">'.form_error('batchForm_filler_metal_spec_range').'</span>';} ?>
            </div>
          </div>                
        </div>
        <div class="row">
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">  
              <input type="text" class="form-control" placeholder="" id="batchForm_filler_metal_aws_lbl" name="batchForm_filler_metal_aws_lbl" value="<?php echo ($batchForm_filler_metal_aws_lbl != '') ? $batchForm_filler_metal_aws_lbl : 'Filler Metal or Electrode AWS classification';?>" autocomplete="off">
              <?PHP if(form_error('batchForm_filler_metal_aws_lbl')){ echo '<span class="help-block">'.form_error('batchForm_filler_metal_aws_lbl').'</span>';} ?>
            </div>
          </div>
                
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="" id="batchForm_filler_metal_aws_val" name="batchForm_joint_backing_val" value="<?php echo $batchForm_joint_backing_val;?>" autocomplete="off">
              <?PHP if(form_error('batchForm_joint_backing_val')){ echo '<span class="help-block">'.form_error('batchForm_joint_backing_val').'</span>';} ?>
            </div>
          </div>
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <input type="text"  class="form-control" placeholder="" id="batchForm_filler_metal_aws_range" name="batchForm_filler_metal_aws_range" value="<?php echo $batchForm_filler_metal_aws_range;?>" autocomplete="off">
              <?PHP if(form_error('batchForm_filler_metal_aws_range')){ echo '<span class="help-block">'.form_error('batchForm_filler_metal_aws_range').'</span>';} ?>
            </div>
          </div>                
        </div>
        <div class="row">
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">  
              <input type="text" class="form-control" placeholder="" id="batchForm_filler_metal_fno_lbl" name="batchForm_filler_metal_fno_lbl" value="<?php echo ($batchForm_filler_metal_fno_lbl != '') ? $batchForm_filler_metal_fno_lbl : 'Filler Metal F-Number(s)';?>" autocomplete="off">
              <?PHP if(form_error('batchForm_filler_metal_fno_lbl')){ echo '<span class="help-block">'.form_error('batchForm_filler_metal_fno_lbl').'</span>';} ?>
            </div>
          </div>
                
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="" id="batchForm_filler_metal_fno_val" name="batchForm_filler_metal_fno_val" value="<?php echo $batchForm_filler_metal_fno_val;?>" autocomplete="off">
              <?PHP if(form_error('batchForm_filler_metal_fno_val')){ echo '<span class="help-block">'.form_error('batchForm_filler_metal_fno_val').'</span>';} ?>
            </div>
          </div>
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <input type="text"  class="form-control" placeholder="" id="batchForm_filler_metal_fno_range" name="batchForm_filler_metal_fno_range" value="<?php echo $batchForm_filler_metal_fno_range;?>" autocomplete="off">
              <?PHP if(form_error('batchForm_filler_metal_fno_range')){ echo '<span class="help-block">'.form_error('batchForm_filler_metal_fno_range').'</span>';} ?>
            </div>
          </div>                
        </div>
        <div class="row">
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">  
              <input type="text" class="form-control" placeholder="" id="batchForm_filler_metal_brand_lbl" name="batchForm_filler_metal_brand_lbl" value="<?php echo ($batchForm_filler_metal_brand_lbl != '') ? $batchForm_filler_metal_brand_lbl : 'Filler Metal or Electrode Diameter / Brand Name';?>" autocomplete="off">
              <?PHP if(form_error('batchForm_filler_metal_brand_lbl')){ echo '<span class="help-block">'.form_error('batchForm_filler_metal_brand_lbl').'</span>';} ?>
            </div>
          </div>
                
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="" id="batchForm_filler_metal_brand_val" name="batchForm_filler_metal_brand_val" value="<?php echo $batchForm_filler_metal_brand_val;?>" autocomplete="off">
              <?PHP if(form_error('batchForm_filler_metal_brand_val')){ echo '<span class="help-block">'.form_error('batchForm_filler_metal_brand_val').'</span>';} ?>
            </div>
          </div>
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <input type="text"  class="form-control" placeholder="" id="batchForm_filler_metal_brand_range" name="batchForm_filler_metal_brand_range" value="<?php echo $batchForm_filler_metal_brand_range;?>" autocomplete="off">
              <?PHP if(form_error('batchForm_filler_metal_brand_range')){ echo '<span class="help-block">'.form_error('batchForm_filler_metal_brand_range').'</span>';} ?>
            </div>
          </div>                
        </div>
        <div class="row">
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">  
              <input type="text" class="form-control" placeholder="" id="batchForm_deposit_weld_lbl" name="batchForm_deposit_weld_lbl" value="<?php echo ($batchForm_deposit_weld_lbl != '') ? $batchForm_deposit_weld_lbl : 'Deposit Weld Metal Thickness';?>" autocomplete="off">
              <?PHP if(form_error('batchForm_deposit_weld_lbl')){ echo '<span class="help-block">'.form_error('batchForm_deposit_weld_lbl').'</span>';} ?>
            </div>
          </div>
                
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="" id="batchForm_deposit_weld_val" name="batchForm_deposit_weld_val" value="<?php echo $batchForm_deposit_weld_val;?>" autocomplete="off">
              <?PHP if(form_error('batchForm_deposit_weld_val')){ echo '<span class="help-block">'.form_error('batchForm_deposit_weld_val').'</span>';} ?>
            </div>
          </div>
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <input type="text"  class="form-control" placeholder="" id="batchForm_deposit_weld_range" name="batchForm_deposit_weld_range" value="<?php echo $batchForm_deposit_weld_range;?>" autocomplete="off">
              <?PHP if(form_error('batchForm_deposit_weld_range')){ echo '<span class="help-block">'.form_error('batchForm_deposit_weld_range').'</span>';} ?>
            </div>
          </div>                
        </div>
        <div class="row">
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">  
              <input type="text" class="form-control" placeholder="" id="batchForm_consumable_insert_lbl" name="batchForm_consumable_insert_lbl" value="<?php echo ($batchForm_consumable_insert_lbl != '') ? $batchForm_consumable_insert_lbl : 'Consumable insert (GTAW or PAW)';?>" autocomplete="off">
              <?PHP if(form_error('batchForm_consumable_insert_lbl')){ echo '<span class="help-block">'.form_error('batchForm_consumable_insert_lbl').'</span>';} ?>
            </div>
          </div>
                
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="" id="batchForm_consumable_insert_val" name="batchForm_consumable_insert_val" value="<?php echo $batchForm_consumable_insert_val;?>" autocomplete="off">
              <?PHP if(form_error('batchForm_consumable_insert_val')){ echo '<span class="help-block">'.form_error('batchForm_consumable_insert_val').'</span>';} ?>
            </div>
          </div>
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <input type="text"  class="form-control" placeholder="" id="batchForm_consumable_insert_range" name="batchForm_consumable_insert_range" value="<?php echo $batchForm_consumable_insert_range;?>" autocomplete="off">
              <?PHP if(form_error('batchForm_consumable_insert_range')){ echo '<span class="help-block">'.form_error('batchForm_consumable_insert_range').'</span>';} ?>
            </div>
          </div>                
        </div>
        <div class="row">
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">  
              <input type="text" class="form-control" placeholder="" id="batchForm_filler_metal_product_lbl" name="batchForm_filler_metal_product_lbl" value="<?php echo ($batchForm_filler_metal_product_lbl != '') ? $batchForm_filler_metal_product_lbl : 'Filler metal product form (GTAW or PAW)';?>" autocomplete="off">
              <?PHP if(form_error('batchForm_filler_metal_product_lbl')){ echo '<span class="help-block">'.form_error('batchForm_filler_metal_product_lbl').'</span>';} ?>
            </div>
          </div>
                
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="" id="batchForm_filler_metal_product_val" name="batchForm_filler_metal_product_val" value="<?php echo $batchForm_filler_metal_product_val;?>" autocomplete="off">
              <?PHP if(form_error('batchForm_filler_metal_product_val')){ echo '<span class="help-block">'.form_error('batchForm_filler_metal_product_val').'</span>';} ?>
            </div>
          </div>
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <input type="text"  class="form-control" placeholder="" id="batchForm_filler_metal_product_range" name="batchForm_filler_metal_product_range" value="<?php echo $batchForm_filler_metal_product_range;?>" autocomplete="off">
              <?PHP if(form_error('batchForm_filler_metal_product_range')){ echo '<span class="help-block">'.form_error('batchForm_filler_metal_product_range').'</span>';} ?>
            </div>
          </div>                
        </div>

        

        <legend><?php echo lang('mm_masters_batch_form_positions_lbl');?></legend>

        <div class="row">
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">  
              <input type="text" class="form-control" placeholder="" id="batchForm_welding_position_lbl" name="batchForm_welding_position_lbl" value="<?php echo ($batchForm_welding_position_lbl != '') ? $batchForm_welding_position_lbl : 'Welding Position (s)';?>" autocomplete="off">
              <?PHP if(form_error('batchForm_welding_position_lbl')){ echo '<span class="help-block">'.form_error('batchForm_welding_position_lbl').'</span>';} ?>
            </div>
          </div>
                
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <span id="batchForm_welding_position_valspan">
                <?php echo $htmlValue;?>
              </span>
              <?PHP if(form_error('batchForm_welding_position_val')){ echo '<span class="help-block">'.form_error('batchForm_welding_position_val').'</span>';} ?>
            </div>
          </div>
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <input type="text"  class="form-control" placeholder="" id="batchForm_welding_position_range" name="batchForm_welding_position_range" value="<?php echo $batchForm_welding_position_range;?>" autocomplete="off" <?php if($batchForm_welding_position_range) { echo 'readonly'; }?>>
              <?PHP if(form_error('batchForm_welding_position_range')){ echo '<span class="help-block">'.form_error('batchForm_welding_position_range').'</span>';} ?>
            </div>
          </div>                
        </div>
        <div class="row">
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">  
              <input type="text" class="form-control" placeholder="" id="batchForm_vertical_progression_lbl" name="batchForm_vertical_progression_lbl" value="<?php echo ($batchForm_vertical_progression_lbl != '') ? $batchForm_vertical_progression_lbl : 'Vertical progression (Uphill or Downhill)';?>" autocomplete="off">
              <?PHP if(form_error('batchForm_vertical_progression_lbl')){ echo '<span class="help-block">'.form_error('batchForm_vertical_progression_lbl').'</span>';} ?>
            </div>
          </div>
                
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="" id="batchForm_vertical_progression_val" name="batchForm_vertical_progression_val" value="<?php echo $batchForm_vertical_progression_val;?>" autocomplete="off">
              <?PHP if(form_error('batchForm_vertical_progression_val')){ echo '<span class="help-block">'.form_error('batchForm_vertical_progression_val').'</span>';} ?>
            </div>
          </div>
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <input type="text"  class="form-control" placeholder="" id="batchForm_vertical_progression_range" name="batchForm_vertical_progression_range" value="<?php echo $batchForm_vertical_progression_range;?>" autocomplete="off">
              <?PHP if(form_error('batchForm_vertical_progression_range')){ echo '<span class="help-block">'.form_error('batchForm_vertical_progression_range').'</span>';} ?>
            </div>
          </div>                
        </div>

        <legend><?php echo lang('mm_masters_batch_form_gas_lbl');?></legend>

        <div class="row">
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">  
              <input type="text" class="form-control" placeholder="" id="batchForm_insert_gas_lbl" name="batchForm_insert_gas_lbl" value="<?php echo ($batchForm_insert_gas_lbl != '') ? $batchForm_insert_gas_lbl : 'Inert gas backing (GMAW, GTAW, PAW) ';?>" autocomplete="off">
              <?PHP if(form_error('batchForm_insert_gas_lbl')){ echo '<span class="help-block">'.form_error('batchForm_insert_gas_lbl').'</span>';} ?>
            </div>
          </div>
                
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="" id="batchForm_insert_gas_val" name="batchForm_insert_gas_val" value="<?php echo $batchForm_insert_gas_val;?>" autocomplete="off">
              <?PHP if(form_error('batchForm_insert_gas_val')){ echo '<span class="help-block">'.form_error('batchForm_insert_gas_val').'</span>';} ?>
            </div>
          </div>
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <input type="text"  class="form-control" placeholder="" id="batchForm_insert_gas_range" name="batchForm_insert_gas_range" value="<?php echo $batchForm_insert_gas_range;?>" autocomplete="off">
              <?PHP if(form_error('batchForm_insert_gas_range')){ echo '<span class="help-block">'.form_error('batchForm_insert_gas_range').'</span>';} ?>
            </div>
          </div>                
        </div>

        <legend><?php echo lang('mm_masters_batch_form_electrical_lbl');?></legend>

        <div class="row">
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">  
              <input type="text" class="form-control" placeholder="" id="batchForm_transfer_mode_lbl" name="batchForm_transfer_mode_lbl" value="<?php echo ($batchForm_transfer_mode_lbl != '') ? $batchForm_transfer_mode_lbl : 'Transfer mode (spray/globular or pluse to short circuit-GMAW)';?>" autocomplete="off">
              <?PHP if(form_error('batchForm_transfer_mode_lbl')){ echo '<span class="help-block">'.form_error('batchForm_transfer_mode_lbl').'</span>';} ?>
            </div>
          </div>
                
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="" id="batchForm_transfer_mode_val" name="batchForm_transfer_mode_val" value="<?php echo $batchForm_transfer_mode_val;?>" autocomplete="off">
              <?PHP if(form_error('batchForm_transfer_mode_val')){ echo '<span class="help-block">'.form_error('batchForm_transfer_mode_val').'</span>';} ?>
            </div>
          </div>
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <input type="text"  class="form-control" placeholder="" id="batchForm_transfer_mode_range" name="batchForm_transfer_mode_range" value="<?php echo $batchForm_transfer_mode_range;?>" autocomplete="off">
              <?PHP if(form_error('batchForm_transfer_mode_range')){ echo '<span class="help-block">'.form_error('batchForm_transfer_mode_range').'</span>';} ?>
            </div>
          </div>                
        </div>
        <div class="row">
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">  
              <input type="text" class="form-control" placeholder="" id="batchForm_current_type_lbl" name="batchForm_current_type_lbl" value="<?php echo ($batchForm_current_type_lbl != '') ? $batchForm_current_type_lbl : 'Current Type / Polarity (AC, DCEN, DCEP)';?>" autocomplete="off">
              <?PHP if(form_error('batchForm_current_type_lbl')){ echo '<span class="help-block">'.form_error('batchForm_current_type_lbl').'</span>';} ?>
            </div>
          </div>
                
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="" id="batchForm_current_type_val" name="batchForm_current_type_val" value="<?php echo $batchForm_current_type_val;?>" autocomplete="off">
              <?PHP if(form_error('batchForm_current_type_val')){ echo '<span class="help-block">'.form_error('batchForm_current_type_val').'</span>';} ?>
            </div>
          </div>
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <input type="text"  class="form-control" placeholder="" id="batchForm_current_type_range" name="batchForm_current_type_range" value="<?php echo $batchForm_current_type_range;?>" autocomplete="off">
              <?PHP if(form_error('batchForm_current_type_range')){ echo '<span class="help-block">'.form_error('batchForm_current_type_range').'</span>';} ?>
            </div>
          </div>                
        </div>


        <div class="row">             
          <div class="text-center">
            <input type="hidden" name="batchID" value="<?php echo $batchID;?>">
            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit"><?php echo lang('btn_save');?></button>
            <a href="<?php echo base_url().$form_cancel_url;?>" class="btn btn-warning waves-effect waves-light m-r-10"><?php echo lang('btn_Cancel');?></a>
          </div>
        </div>
      <?php echo form_close(); ?>

      <?php echo form_open_multipart($form_url); ?>
        <hr />
          <div class="row">
            <div class="col-sm-6 col-xs-6">
              <div class="form-group m-b-0">
                <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_wpq_testResult_conducted');?></label>
              </div>
            </div>
            <div class="col-sm-3 col-xs-3">
              <div class="form-group m-b-0">
                <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_wpq_testResult_results');?></label>
              </div>
            </div>
            <div class="col-sm-3 col-xs-3">
              <div class="form-group m-b-0">
                <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_wpq_testResult_reportNo');?></label>
              </div>
            </div> 
          </div>
        <hr />

        <div class="row">
          <div class="col-sm-6 col-xs-6">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="<?php echo ($batchForm_visual_inspection_result_lbl != '') ? $batchForm_visual_inspection_result_lbl : 'Visual Inspection';?>" id="batchForm_visual_inspection_result_lbl" name="batchForm_visual_inspection_result_lbl" value="<?php echo ($batchForm_visual_inspection_result_lbl != '') ? $batchForm_visual_inspection_result_lbl : 'Visual Inspection';?>" autocomplete="off">
              <?PHP if(form_error('batchForm_visual_inspection_result_lbl')){ echo '<span class="help-block">'.form_error('batchForm_visual_inspection_result_lbl').'</span>';} ?>
            </div>
          </div>
          <div class="col-sm-3 col-xs-3">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_wpq_testResult_results');?>" id="batchForm_visual_inspection_result_val" name="batchForm_visual_inspection_result_val" value="<?php echo $batchForm_visual_inspection_result_val ;?>" autocomplete="off">
              <?PHP if(form_error('batchForm_visual_inspection_result_val')){ echo '<span class="help-block">'.form_error('batchForm_visual_inspection_result_val').'</span>';} ?>
            </div>
          </div>
          <div class="col-sm-3 col-xs-3">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_wpq_testResult_reportNo');?>" id="batchForm_visual_inspection_result_report" name="batchForm_visual_inspection_result_report" value="<?php echo $batchForm_visual_inspection_result_report ;?>" autocomplete="off">
              <?PHP if(form_error('batchForm_visual_inspection_result_report')){ echo '<span class="help-block">'.form_error('batchForm_visual_inspection_result_report').'</span>';} ?>
            </div>
          </div> 
        </div>

        <div class="row">
          <div class="col-sm-6 col-xs-6">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="<?php echo ($batchForm_radoigraphy_result_lbl != '') ? $batchForm_radoigraphy_result_lbl : 'Radoigraphy';?>" id="batchForm_radoigraphy_result_lbl" name="batchForm_radoigraphy_result_lbl" value="<?php echo ($batchForm_radoigraphy_result_lbl != '') ? $batchForm_radoigraphy_result_lbl : 'Radoigraphy';?>" autocomplete="off">
              <?PHP if(form_error('batchForm_radoigraphy_result_lbl')){ echo '<span class="help-block">'.form_error('batchForm_radoigraphy_result_lbl').'</span>';} ?>
            </div>
          </div>
          <div class="col-sm-3 col-xs-3">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_wpq_testResult_results');?>" id="batchForm_radoigraphy_result_val" name="batchForm_radoigraphy_result_val" value="<?php echo $batchForm_radoigraphy_result_val ;?>" autocomplete="off">
              <?PHP if(form_error('batchForm_radoigraphy_result_val')){ echo '<span class="help-block">'.form_error('batchForm_radoigraphy_result_val').'</span>';} ?>
            </div>
          </div>
          <div class="col-sm-3 col-xs-3">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_wpq_testResult_reportNo');?>" id="batchForm_radoigraphy_result_report" name="batchForm_radoigraphy_result_report" value="<?php echo $batchForm_radoigraphy_result_report ;?>" autocomplete="off">
              <?PHP if(form_error('batchForm_radoigraphy_result_report')){ echo '<span class="help-block">'.form_error('batchForm_radoigraphy_result_report').'</span>';} ?>
            </div>
          </div> 
        </div>

        <div class="row">
          <div class="col-sm-6 col-xs-6">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="<?php echo ($batchForm_bend_result_lbl != '') ? $batchForm_bend_result_lbl : 'Bend';?>" id="batchForm_bend_result_lbl" name="batchForm_bend_result_lbl" value="<?php echo ($batchForm_bend_result_lbl != '') ? $batchForm_bend_result_lbl : 'Bend';?>" autocomplete="off">
              <?PHP if(form_error('batchForm_bend_result_lbl')){ echo '<span class="help-block">'.form_error('batchForm_bend_result_lbl').'</span>';} ?>
            </div>
          </div>
          <div class="col-sm-3 col-xs-3">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_wpq_testResult_results');?>" id="batchForm_bend_result_val" name="batchForm_bend_result_val" value="<?php echo $batchForm_bend_result_val ;?>" autocomplete="off">
              <?PHP if(form_error('batchForm_bend_result_val')){ echo '<span class="help-block">'.form_error('batchForm_bend_result_val').'</span>';} ?>
            </div>
          </div>
          <div class="col-sm-3 col-xs-3">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_wpq_testResult_reportNo');?>" id="batchForm_bend_result_report" name="batchForm_bend_result_report" value="<?php echo $batchForm_bend_result_report ;?>" autocomplete="off">
              <?PHP if(form_error('batchForm_bend_result_report')){ echo '<span class="help-block">'.form_error('batchForm_bend_result_report').'</span>';} ?>
            </div>
          </div> 
        </div>
        <div class="row">
          <div class="col-sm-6 col-xs-6">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="<?php echo ($batchForm_fillet_fracture_result_lbl != '') ? $batchForm_fillet_fracture_result_lbl : 'Fillet Fracture';?>" id="batchForm_fillet_fracture_result_lbl" name="batchForm_fillet_fracture_result_lbl" value="<?php echo ($batchForm_fillet_fracture_result_lbl != '') ? $batchForm_fillet_fracture_result_lbl : 'Fillet Fracture';?>" autocomplete="off">
              <?PHP if(form_error('batchForm_fillet_fracture_result_lbl')){ echo '<span class="help-block">'.form_error('batchForm_fillet_fracture_result_lbl').'</span>';} ?>
            </div>
          </div>
          <div class="col-sm-3 col-xs-3">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_wpq_testResult_results');?>" id="batchForm_fillet_fracture_result_val" name="batchForm_fillet_fracture_result_val" value="<?php echo $batchForm_fillet_fracture_result_val ;?>" autocomplete="off">
              <?PHP if(form_error('batchForm_fillet_fracture_result_val')){ echo '<span class="help-block">'.form_error('batchForm_fillet_fracture_result_val').'</span>';} ?>
            </div>
          </div>
          <div class="col-sm-3 col-xs-3">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_wpq_testResult_reportNo');?>" id="batchForm_fillet_fracture_result_report" name="batchForm_fillet_fracture_result_report" value="<?php echo $batchForm_fillet_fracture_result_report ;?>" autocomplete="off">
              <?PHP if(form_error('batchForm_fillet_fracture_result_report')){ echo '<span class="help-block">'.form_error('batchForm_fillet_fracture_result_report').'</span>';} ?>
            </div>
          </div> 
        </div>

        <div class="row">
          <div class="col-sm-6 col-xs-6">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="<?php echo ($batchForm_macro_examination_result_lbl != '') ? $batchForm_macro_examination_result_lbl : 'Macro Examination';?>" id="batchForm_macro_examination_result_lbl" name="batchForm_macro_examination_result_lbl" value="<?php echo ($batchForm_macro_examination_result_lbl != '') ? $batchForm_macro_examination_result_lbl : 'Macro Examination';?>" autocomplete="off">
              <?PHP if(form_error('batchForm_macro_examination_result_lbl')){ echo '<span class="help-block">'.form_error('batchForm_macro_examination_result_lbl').'</span>';} ?>
            </div>
          </div>
          <div class="col-sm-3 col-xs-3">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_wpq_testResult_results');?>" id="batchForm_macro_examination_result_val" name="batchForm_macro_examination_result_val" value="<?php echo $batchForm_macro_examination_result_val ;?>" autocomplete="off">
              <?PHP if(form_error('batchForm_macro_examination_result_val')){ echo '<span class="help-block">'.form_error('batchForm_macro_examination_result_val').'</span>';} ?>
            </div>
          </div>
          <div class="col-sm-3 col-xs-3">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_wpq_testResult_reportNo');?>" id="batchForm_macro_examination_result_report" name="batchForm_macro_examination_result_report" value="<?php echo $batchForm_macro_examination_result_report ;?>" autocomplete="off">
              <?PHP if(form_error('batchForm_macro_examination_result_report')){ echo '<span class="help-block">'.form_error('batchForm_macro_examination_result_report').'</span>';} ?>
            </div>
          </div> 
        </div>

        <div class="row">
          <div class="col-sm-6 col-xs-6">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="<?php echo ($batchForm_other_test_result_lbl != '') ? $batchForm_other_test_result_lbl : 'Other Test';?>" id="batchForm_other_test_result_lbl" name="batchForm_other_test_result_lbl" value="<?php echo ($batchForm_other_test_result_lbl != '') ? $batchForm_other_test_result_lbl : 'Other Test';?>" autocomplete="off">
              <?PHP if(form_error('batchForm_other_test_result_lbl')){ echo '<span class="help-block">'.form_error('batchForm_other_test_result_lbl').'</span>';} ?>
            </div>
          </div>
          <div class="col-sm-3 col-xs-3">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_wpq_testResult_results');?>" id="batchForm_other_test_result_val" name="batchForm_other_test_result_val" value="<?php echo $batchForm_other_test_result_val ;?>" autocomplete="off">
              <?PHP if(form_error('batchForm_other_test_result_val')){ echo '<span class="help-block">'.form_error('batchForm_other_test_result_val').'</span>';} ?>
            </div>
          </div>
          <div class="col-sm-3 col-xs-3">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_wpq_testResult_reportNo');?>" id="batchForm_other_test_result_report" name="batchForm_other_test_result_report" value="<?php echo $batchForm_other_test_result_report ;?>" autocomplete="off">
              <?PHP if(form_error('batchForm_other_test_result_report')){ echo '<span class="help-block">'.form_error('batchForm_other_test_result_report').'</span>';} ?>
            </div>
          </div> 
        </div>

        

        
        <div class="row">             
          <div class="text-center">
            <input type="hidden" name="batchID" value="<?php echo $batchID;?>">
            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit1"><?php echo lang('btn_save');?></button>
            <button type="reset" class="btn btn-inverse waves-effect waves-light m-r-10"><?php echo lang('btn_Reset');?></button>
            <a href="<?php echo base_url().$form_cancel_url;?>" class="btn btn-warning waves-effect waves-light m-r-10"><?php echo lang('btn_Cancel');?></a>
          </div>
        </div>
        <hr />
      <?php echo form_close(); ?>
      <?php echo form_open_multipart($form_url); ?>

       <!-- <div class="row">
          <div class="col-sm-12 col-xs-12">-->
              <div class="row">
                <div class="col-sm-6 col-xs-6">
                  <div class="form-group <?PHP if(form_error('batchWPQ_additional_notes')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_wpq_notes');?></label>
                    <textarea class="form-control" placeholder="<?php echo lang('mm_masters_batch_wpq_notes');?>" id="batchWPQ_additional_notes" name="batchWPQ_additional_notes" rows="3"><?php echo $batchWPQ_additional_notes;?></textarea>
                    <?PHP if(form_error('batchWPQ_additional_notes')){ echo '<span class="help-block">'.form_error('batchWPQ_additional_notes').'</span>';} ?>
                  </div>
                </div> 
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('batchWPQ_additional_conducted_by')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_wpq_conducted_by');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_wpq_conducted_by');?>" id="batchWPQ_additional_conducted_by" name="batchWPQ_additional_conducted_by" value="<?php echo $batchWPQ_additional_conducted_by ;?>" autocomplete="off">
                    <?PHP if(form_error('batchWPQ_additional_conducted_by')){ echo '<span class="help-block">'.form_error('batchWPQ_additional_conducted_by').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('batchWPQ_additional_date')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_wpq_date');?></label>
                    <div class="input-group">
                      <input type="text" class="form-control datepicker-autoclose"  name="batchWPQ_additional_date"  placeholder="<?php echo lang('mm_masters_batch_wpq_date');?>" value="<?php echo ($batchWPQ_additional_date!='' && $batchWPQ_additional_date!='0000-00-00') ? date('m/d/Y',strtotime($batchWPQ_additional_date)) : '';?>"> 
                      <span class="input-group-addon"><i class="icon-calender"></i></span> 
                    </div>
                    <?PHP if(form_error('batchWPQ_additional_date')){ echo '<span class="help-block">'.form_error('batchWPQ_additional_date').'</span>';} ?>
                  </div>
                </div>
              </div> 
              <div class="row">             
                <div class="text-center">
                  <input type="hidden" name="batchID" value="<?php echo $batchID;?>">
                  <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit2"><?php echo lang('btn_save');?></button>
                  <button type="reset" class="btn btn-inverse waves-effect waves-light m-r-10"><?php echo lang('btn_Reset');?></button>
                  <a href="<?php echo base_url().$form_cancel_url;?>" class="btn btn-warning waves-effect waves-light m-r-10"><?php echo lang('btn_Cancel');?></a>
                </div>
              </div>
            
          <!--</div>
        </div>-->
      <?php echo form_close(); ?>
      </div>
    </div>
  </div>
  <style type="text/css">
    legend {
      font-size: 15px;
    }
  </style>
  <!-- /.end form -->
<script type="text/javascript">
var TO_FRACTION_64 = 0.015625
    var MM_TO_INCH = 25.4
    var INCH_TO_FEET = 12

    var simplifyFraction = function (numerator, _denominator) {
      var denominator = _denominator || 64
      // if there is no denominator then there is no fraction
      if (numerator < 1) {
        return ''
      }
      // fraction can't be broken further down:
      if (
        // a) if numerator is 1
        numerator === 1 ||
        // b) if numerator is prime number
        !((numerator % 2 === 0) || Math.sqrt(numerator) % 1 === 0)
      ) {
        return numerator + '/' + denominator
      }

      var newNumerator = numerator / 2
      var newDenominator = denominator / 2
      return simplifyFraction(newNumerator, newDenominator)
    }

    function toInch (_input) {
      var rawInches = Number(_input || input) / MM_TO_INCH;
      // integers
      console.log(rawInches);
      var integers = Math.floor(rawInches)
      // limit to 6 decimals to avoid conflicts
      var decimals = Number((rawInches % 1).toFixed(6))
      // fractionize for denominator 64
      var fraction64 = Math.round(decimals / TO_FRACTION_64)
      var simplifiedFraction = simplifyFraction(fraction64)
      var result = [integers, simplifiedFraction]
      return result.filter(function (r) { return r }).join(' ')
    }
  function myFunction(){

    var batchForm_test_specimen_val = $('#batchForm_test_specimen_val').val();
    var batchForm_type_of_weld_val = $('#batchForm_type_of_weld_val').val();

    if(batchForm_test_specimen_val != ''){
      $('#batchForm_test_specimen_range').val(batchForm_test_specimen_val);
      $('#batchForm_test_specimen_range').attr('readonly', true);
    }

    if(batchForm_type_of_weld_val != ''){
      $('#batchForm_type_of_weld_range').val(batchForm_type_of_weld_val);
      $('#batchForm_type_of_weld_range').attr('readonly', true);
    }

    var batchForm_test_specimen_valSmall = batchForm_test_specimen_val.toLowerCase();
    var batchForm_type_of_weld_valSmall = batchForm_type_of_weld_val.toLowerCase();
    var htmlValue = '';
    if(batchForm_test_specimen_valSmall == 'pipe' && batchForm_type_of_weld_valSmall == 'groove'){
      htmlValue = '<select name="batchForm_welding_position_val" class="form-control select2"  id="batchForm_welding_position_val" onchange="getval()"><option value="">--- Select ---</option><option value="1g">1G</option><option value="2g">2G</option><option value="5g">5G</option><option value="6g">6G</option><option value="2gand5g">2G and 5G</option><option value="specialpositions">Special Positions (SP)</option></select>';
    } else if(batchForm_test_specimen_valSmall == 'plate' && batchForm_type_of_weld_valSmall == 'groove'){
      htmlValue = '<select name="batchForm_welding_position_val" class="form-control select2" id="batchForm_welding_position_val" onchange="getval()"><option value="">--- Select ---</option><option value="1g">1G</option><option value="2g">2G</option><option value="3g">3G</option><option value="4g">4G</option><option value="3gand4g">3G and 4G</option><option value="2g3gand4g">2G, 3G and 4G</option><option value="specialpositions">Special Positions (SP)</option></select>';
    } else if(batchForm_test_specimen_valSmall == 'pipe' && batchForm_type_of_weld_valSmall == 'fillet'){
      htmlValue = '<select name="batchForm_welding_position_val" class="form-control select2" id="batchForm_welding_position_val" onchange="getval()"><option value="">--- Select ---</option><option value="1f">1F</option><option value="2f">2F</option><option value="2fr">2FR</option><option value="4f">4F</option><option value="5f">5F</option><option value="specialpositions">Special Positions (SP)</option></select>';
    } else if(batchForm_test_specimen_valSmall == 'plate' && batchForm_type_of_weld_valSmall == 'fillet'){
      htmlValue = '<select name="batchForm_welding_position_val" class="form-control select2" id="batchForm_welding_position_val" onchange="getval()"><option value="">--- Select ---</option><option value="1f">1F</option><option value="2f">2F</option><option value="3f">3F</option><option value="4f">4F</option><option value="3fand4f">3F and 4F</option><option value="specialpositions">Special Positions (SP)</option></select>';
    } else {
      htmlValue = '<input type="text" class="form-control" placeholder="" id="batchForm_welding_position_val" name="batchForm_welding_position_val" value="" autocomplete="off">';
    }
    $('#batchForm_welding_position_valspan').html(htmlValue);
    $('#batchForm_welding_position_range').val('');
    $('#batchForm_welding_position_range').attr('readonly', false);

  }
  function roundit(which){
return Math.round(which*100)/100;
}
  $( "#batchForm_pipe_tube_val" ).keyup(function( event ) {
    if ( event.which != 13) {
      var batchForm_pipe_tube_val = $('#batchForm_pipe_tube_val').val();
      //var res = batchForm_pipe_tube_val.split('"');

    //searchStr = batchForm_pipe_tube_val.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&');
    
    //str.replace(new RegExp(batchForm_pipe_tube_val, 'gi'), replaceStr);
      //ns = ns.replace(/([,.€])+/g, '.');
      //var convervalue = batchForm_pipe_tube_val.replace(/^-?\d*(\.\d+)?$/, "");
      var inch = batchForm_pipe_tube_val.replace(/[^0-9.-]/g, '.').replace(/(\..*)\./g, '$1').replace(/(?!^)-/g, '');

//console.log('inch');
//console.log(inch);

  var splitValue = inch.split('.',2);
  var splitValueSecond = 0;
    //console.log(splitValue[1]);

  if(splitValue[1] != undefined && splitValue[1] != null && splitValue[1] != ''){
    splitValueSecond = splitValue[1].split('',2);

  }

  //console.log('splitValue');
  //console.log(splitValue[0]);
  //console.log(splitValueSecond);




      //var x=$("#x").val();
      //var n=$("#n").val();
      //var d=$("#d").val();


      var x=splitValue[0];
      var n=(splitValueSecond[0] != undefined && splitValueSecond[0] != null && splitValueSecond[0] != '') ? splitValueSecond[0] : 0;
      var d=(splitValueSecond[1] != undefined && splitValueSecond[1] != null && splitValueSecond[1] != '') ? splitValueSecond[1] : 0;

      if( $.isNumeric(x) )
        x = parseFloat(x);
      else
        x = 0;
      if( $.isNumeric(n) && $.isNumeric(d) ) {

        n = parseInt(n);
        d = parseInt(d);

        if( d!=0 )
          x+= n/d;
      }

//console.log('xvalue');
//console.log(x);
    //var convervalue = 2.87*25.4;
    //var inch = batchForm_pipe_tube_val;
    //var convervalue = roundit(inch*2.54);

     //var convervalue =  toInch(2.875);
     var convervalue = x*25.4;
     convervalue = Math.round(convervalue);
     //var convervalue = 2.7/8 * 25.4;

    //console.log('convervalue');
    //console.log(convervalue);

/*
function calc0() {
      var x=$("#x").val();
      var n=$("#n").val();
      var d=$("#d").val();
      if( $.isNumeric(x) )
        x = parseFloat(x);
      else
        x = 0;
      if( $.isNumeric(n) && $.isNumeric(d) ) {
        n = parseInt(n);
        d = parseInt(d);
        if( d!=0 )
          x+= n/d;
      }
        
      var y = roundresult(x*25.4);
      var y2 = Math.floor(y/1000);
      var y3 = roundresult(y-y2*1000);
      var txt=x+"\" \u00D7 25.4\n";
      txt+="= "+y+'mm';
      $("#y").val(y);
      $("#y2").val(y2);
      $("#y3").val(y3);
      $("#TA").val(txt);
    }
*/
/*
console.log('x');
console.log(x);
console.log('n');
console.log(n);
console.log('d');
console.log(d);
console.log('convervalue');
console.log(convervalue);
console.log(Math.round(convervalue));
*/

      if(convervalue > 0 && convervalue <= 25){
        $('#batchForm_pipe_tube_range').val('Size Welded - Unlimited');
        $('#batchForm_pipe_tube_range').attr('readonly', true);
      } else if(convervalue > 25 && convervalue <= 73){
        $('#batchForm_pipe_tube_range').val('1" (25mm) - Unlimited');
        $('#batchForm_pipe_tube_range').attr('readonly', true);
      } else if(convervalue > 73){
        $('#batchForm_pipe_tube_range').val('2-7/8" (73mm) - Unlimited');
        $('#batchForm_pipe_tube_range').attr('readonly', true);
      } else {
        $('#batchForm_pipe_tube_range').val('');
        $('#batchForm_pipe_tube_range').attr('readonly', false);
      }
    }
  }).keydown(function( event ) {
    if ( event.which == 13) {
      event.preventDefault();
    }
  });

  $( "#batchForm_pipe_plate_val" ).keyup(function( event ) {
    if ( event.which != 13 && event.which != 32 ) {
      var batchForm_pipe_plate_val = $('#batchForm_pipe_plate_val').val();
      batchForm_pipe_plate_val = batchForm_pipe_plate_val.split('"');

     var convervalue = batchForm_pipe_plate_val[0]*25.4;
     var doubleValue = batchForm_pipe_plate_val[0]*2;
     convervalue = Math.round(convervalue);

      if(convervalue > 0 && convervalue < 13){
        $('#batchForm_pipe_plate_range').val(doubleValue);
        $('#batchForm_pipe_plate_range').attr('readonly', true);
      } else if(convervalue >= 13){
        $('#batchForm_pipe_plate_range').val('Maximum to be welded');
        $('#batchForm_pipe_plate_range').attr('readonly', true);
      } else {
        $('#batchForm_pipe_plate_range').val('');
        $('#batchForm_pipe_plate_range').attr('readonly', false);
      }
    }
  }).keydown(function( event ) {
    if ( event.which == 13 || event.which == 32  ) {
      event.preventDefault();
    }
  });

   
  $( "#batchForm_welding_position_val" ).keyup(function( event ) {
    if ( event.which != 13 && event.which != 32 ) {
      this.weldingValue();
    }
  }).keydown(function( event ) {
    if ( event.which == 13 || event.which == 32  ) {
      event.preventDefault();
    }
  });

  function getval(){    
    var batchForm_welding_position_val = $('#batchForm_welding_position_val').val();
    var batchForm_test_specimen_val = $('#batchForm_test_specimen_val').val();
    var batchForm_test_specimen_range = $('#batchForm_pipe_plate_val').val();
    var batchForm_type_of_weld_val = $('#batchForm_type_of_weld_val').val();

    var batchForm_test_specimen_valSmall = batchForm_test_specimen_val.toLowerCase();
    var batchForm_type_of_weld_valSmall = batchForm_type_of_weld_val.toLowerCase();

     batchForm_test_specimen_range = (batchForm_test_specimen_range != null && batchForm_test_specimen_range) ? batchForm_test_specimen_range.split('in') : '';

    if(batchForm_test_specimen_valSmall == 'pipe' && batchForm_type_of_weld_valSmall == 'groove'){

      if(batchForm_welding_position_val == '1g'){
        var position_range1g = 'F';

        $('#batchForm_welding_position_range').val(position_range1g);
        $('#batchForm_welding_position_range').attr('readonly', true);
      } else if(batchForm_welding_position_val == '2g'){
        var position_range2g = 'F, H';

        $('#batchForm_welding_position_range').val(position_range2g);
        $('#batchForm_welding_position_range').attr('readonly', true);
      } else if(batchForm_welding_position_val == '5g'){
        var position_range5g = '';

        /*if(batchForm_test_specimen_range != '' && batchForm_test_specimen_range > '24'){
          position_range5g = 'Groove Plate & Pipe Over 24in. (610mm) O.D - F, V, O, Plate and pipe - ALL';
        } else if(batchForm_test_specimen_range != '' && batchForm_test_specimen_range < '24'){
          position_range5g = 'Pipe ≤ 24 in. (610mm) O.D - F, V, O, Plate and pipe - ALL';
        } else {
          position_range5g = 'ALL';
        }*/

        position_range5g = 'Groove Plate & Pipe Over 24in. (610mm) O.D - F, V, O, Pipe ≤ 24 in. (610mm) O.D - F, V, O Fillet or Tack Plate and pipe - ALL';

        $('#batchForm_welding_position_range').val(position_range5g);
        $('#batchForm_welding_position_range').attr('readonly', true);
      } else if(batchForm_welding_position_val == '6g'){
        var position_range6g = 'ALL';

        $('#batchForm_welding_position_range').val(position_range6g);
        $('#batchForm_welding_position_range').attr('readonly', true);
      } else if(batchForm_welding_position_val == '2gand5g'){
        var position_range2g5g = 'ALL';

        $('#batchForm_welding_position_range').val(position_range2g5g);
        $('#batchForm_welding_position_range').attr('readonly', true);
      } else if(batchForm_welding_position_val == 'specialpositions'){
        var position_range = 'SP, F';

        $('#batchForm_welding_position_range').val(position_range);
        $('#batchForm_welding_position_range').attr('readonly', true);
      }  else {
        $('#batchForm_welding_position_range').val('');
        $('#batchForm_welding_position_range').attr('readonly', false);
      }

    } else if(batchForm_test_specimen_valSmall == 'plate' && batchForm_type_of_weld_valSmall == 'groove'){

      if(batchForm_welding_position_val == '1g'){
        var position_range1g = '';
        /*
        if(batchForm_test_specimen_range != '' && batchForm_test_specimen_range > '24'){
          position_range1g = 'Plate & Pipe Over 24in. (610mm) O.D - F, Plate and pipe - F';
        } else if(batchForm_test_specimen_range != '' && batchForm_test_specimen_range < '24'){
          position_range1g = 'Pipe ≤ 24 in. (610mm) O.D - F (Pipe 2-7/8 in. (73mm) O.D. and over), Plate and pipe - F';
        } else {
          position_range1g = 'F';
        }*/
        position_range1g = 'Groove Plate & Pipe Over 24in. (610mm) O.D - F Pipe ≤ 24 in. (610mm) O.D - F (Pipe 2-7/8 in. (73mm) O.D. and over) Fillet or Tack Plate and pipe - F';

        $('#batchForm_welding_position_range').val(position_range1g);
        $('#batchForm_welding_position_range').attr('readonly', true);
      } else if(batchForm_welding_position_val == '2g'){
        var position_range2g = '';
        /*
        if(batchForm_test_specimen_range != '' && batchForm_test_specimen_range > '24'){
          position_range2g = 'Plate & Pipe Over 24in. (610mm) O.D - F, H, Plate and pipe - F, H';
        } else if(batchForm_test_specimen_range != '' && batchForm_test_specimen_range < '24'){
          position_range2g = 'Pipe ≤ 24 in. (610mm) O.D - F, H (Pipe 2-7/8 in. (73mm) O.D. and over), Plate and pipe - F, H';
        } else {
          position_range2g = 'F, H';
        }
        */
        position_range2g = 'Groove Plate & Pipe Over 24in. (610mm) O.D - F, H Pipe ≤ 24 in. (610mm) O.D - F, H (Pipe 2-7/8 in. (73mm) O.D. and over) Fillet or Tack Plate and pipe - F, H';
        $('#batchForm_welding_position_range').val(position_range2g);
        $('#batchForm_welding_position_range').attr('readonly', true);
      } else if(batchForm_welding_position_val == '3g'){
        var position_range3g = '';
        /*
        if(batchForm_test_specimen_range != '' && batchForm_test_specimen_range > '24'){
          position_range3g = 'Plate & Pipe Over 24in. (610mm) O.D - F, V, Plate and pipe - F, H, V';
        } else if(batchForm_test_specimen_range != '' && batchForm_test_specimen_range < '24'){
          position_range3g = 'Pipe ≤ 24 in. (610mm) O.D - F (Pipe 2-7/8 in. (73mm) O.D. and over), Plate and pipe - F, H, V';
        } else {
          position_range3g = 'F, H, V';
        }*/
        position_range3g = 'Groove Plate & Pipe Over 24in. (610mm) O.D - F, V Pipe ≤ 24 in. (610mm) O.D - F (Pipe 2-7/8 in. (73mm) O.D. and over) Fillet or Tack Plate and pipe - F, H, V';
        $('#batchForm_welding_position_range').val(position_range3g);
        $('#batchForm_welding_position_range').attr('readonly', true);
      } else if(batchForm_welding_position_val == '4g'){
        var position_range4g = '';
        /*
        if(batchForm_test_specimen_range != '' && batchForm_test_specimen_range > '24'){
          position_range4g = 'Plate & Pipe Over 24in. (610mm) O.D - F, O, Plate and pipe - F, H, V';
        } else if(batchForm_test_specimen_range != '' && batchForm_test_specimen_range < '24'){
          position_range4g = 'Pipe ≤ 24 in. (610mm) O.D - F (Pipe 2-7/8 in. (73mm) O.D. and over), Plate and pipe - F, H, O';
        } else {
          position_range4g = 'F, H, O';
        }*/

        position_range4g = 'Groove Plate & Pipe Over 24in. (610mm) O.D - F, O Pipe ≤ 24 in. (610mm) O.D - F (Pipe 2-7/8 in. (73mm) O.D. and over) Fillet or Tack Plate and pipe - F, H, O';
        $('#batchForm_welding_position_range').val(position_range4g);
        $('#batchForm_welding_position_range').attr('readonly', true);
      } else if(batchForm_welding_position_val == '3gand4g'){
        var position_range3g4g = '';
        /*
        if(batchForm_test_specimen_range != '' && batchForm_test_specimen_range > '24'){
          position_range3g4g = 'Plate & Pipe Over 24in. (610mm) O.D - F, V, O, Plate and pipe - ALL';
        } else if(batchForm_test_specimen_range != '' && batchForm_test_specimen_range < '24'){
          position_range3g4g = 'Pipe ≤ 24 in. (610mm) O.D - F (Pipe 2-7/8 in. (73mm) O.D. and over), Plate and pipe - ALL';
        } else {
          position_range3g4g = 'ALL';
        }*/
        position_range3g4g = 'Groove Plate & Pipe Over 24in. (610mm) O.D - F, V, O Pipe ≤ 24 in. (610mm) O.D - F (Pipe 2-7/8 in. (73mm) O.D. and over) Fillet or Tack Plate and pipe - ALL';
        $('#batchForm_welding_position_range').val(position_range3g4g);
        $('#batchForm_welding_position_range').attr('readonly', true);
      } else if(batchForm_welding_position_val == '2g3gand4g'){
        var position_range2g3g4g = '';
        /*
        if(batchForm_test_specimen_range != '' && batchForm_test_specimen_range > '24'){
          position_range2g3g4g = 'Plate & Pipe Over 24in. (610mm) O.D - ALL, Plate and pipe - ALL';
        } else if(batchForm_test_specimen_range != '' && batchForm_test_specimen_range < '24'){
          position_range2g3g4g = 'Pipe ≤ 24 in. (610mm) O.D - F, H (Pipe 2-7/8 in. (73mm) O.D. and over), Plate and pipe - ALL';
        } else {
          position_range2g3g4g = 'ALL';
        }*/

        position_range2g3g4g = 'Groove Plate & Pipe Over 24in. (610mm) O.D - ALL Pipe ≤ 24 in. (610mm) O.D - F, H (Pipe 2-7/8 in. (73mm) O.D. and over) Fillet or Tack Plate and pipe - ALL'
        $('#batchForm_welding_position_range').val(position_range2g3g4g);
        $('#batchForm_welding_position_range').attr('readonly', true);
      } else if(batchForm_welding_position_val == 'specialpositions'){
        var position_range = 'SP, F';

        $('#batchForm_welding_position_range').val(position_range);
        $('#batchForm_welding_position_range').attr('readonly', true);
      } else {
        $('#batchForm_welding_position_range').val('');
        $('#batchForm_welding_position_range').attr('readonly', false);
      }


    } else if(batchForm_test_specimen_valSmall == 'pipe' && batchForm_type_of_weld_valSmall == 'fillet'){

      if(batchForm_welding_position_val == '1f'){
        var position_range1f = 'F';

        $('#batchForm_welding_position_range').val(position_range1f);
        $('#batchForm_welding_position_range').attr('readonly', true);
      } else if(batchForm_welding_position_val == '2f'){
        var position_range2f = 'F, H';

        $('#batchForm_welding_position_range').val(position_range2f);
        $('#batchForm_welding_position_range').attr('readonly', true);
      } else if(batchForm_welding_position_val == '2fr'){
        var position_range2fr = 'F, H';

        $('#batchForm_welding_position_range').val(position_range2fr);
        $('#batchForm_welding_position_range').attr('readonly', true);
      } else if(batchForm_welding_position_val == '4f'){
        var position_range4f = 'F, H, O';

        $('#batchForm_welding_position_range').val(position_range4f);
        $('#batchForm_welding_position_range').attr('readonly', true);
      } else if(batchForm_welding_position_val == '5f'){
        var position_range5f = 'ALL';

        $('#batchForm_welding_position_range').val(position_range5f);
        $('#batchForm_welding_position_range').attr('readonly', true);
      } else if(batchForm_welding_position_val == 'specialpositions'){
        var position_range = 'SP, F';

        $('#batchForm_welding_position_range').val(position_range);
        $('#batchForm_welding_position_range').attr('readonly', true);
      } else {
        $('#batchForm_welding_position_range').val('');
        $('#batchForm_welding_position_range').attr('readonly', false);
      }

    } else if(batchForm_test_specimen_valSmall == 'plate' && batchForm_type_of_weld_valSmall == 'fillet'){

      if(batchForm_welding_position_val == '1f'){
        var position_range1f = 'F (Pipe 2-7/8 in. (73mm) O.D. and over)';

        $('#batchForm_welding_position_range').val(position_range1f);
        $('#batchForm_welding_position_range').attr('readonly', true);
      } else if(batchForm_welding_position_val == '2f'){
        var position_range2f = 'F, H (Pipe 2-7/8 in. (73mm) O.D. and over)';

        $('#batchForm_welding_position_range').val(position_range2f);
        $('#batchForm_welding_position_range').attr('readonly', true);
      } else if(batchForm_welding_position_val == '3f'){
        var position_range3f = 'F, H, V (Pipe 2-7/8 in. (73mm) O.D. and over)';

        $('#batchForm_welding_position_range').val(position_range3f);
        $('#batchForm_welding_position_range').attr('readonly', true);
      } else if(batchForm_welding_position_val == '4f'){
        var position_range4f = 'F, H, O (Pipe 2-7/8 in. (73mm) O.D. and over)';

        $('#batchForm_welding_position_range').val(position_range4f);
        $('#batchForm_welding_position_range').attr('readonly', true);
      } else if(batchForm_welding_position_val == '3fand4f'){
        var position_range3f4f = 'ALL  (Pipe 2-7/8 in. (73mm) O.D. and over)';

        $('#batchForm_welding_position_range').val(position_range3f4f);
        $('#batchForm_welding_position_range').attr('readonly', true);
      } else if(batchForm_welding_position_val == 'specialpositions'){
        var position_range = 'SP, F (Pipe 2-7/8 in. (73mm) O.D. and over)';

        $('#batchForm_welding_position_range').val(position_range);
        $('#batchForm_welding_position_range').attr('readonly', true);
      } else {
        $('#batchForm_welding_position_range').val('');
        $('#batchForm_welding_position_range').attr('readonly', false);
      }

    } else {
      $('#batchForm_welding_position_range').val('');
      $('#batchForm_welding_position_range').attr('readonly', false);
    }
  }
  

  $( "#batchForm_vertical_progression_val" ).keyup(function( event ) {
    if ( event.which != 13 && event.which != 32 ) {
      var batchForm_vertical_progression_val = $('#batchForm_vertical_progression_val').val();
      var res = batchForm_vertical_progression_val.toLowerCase();
      if(res == 'uphill'){
        $('#batchForm_vertical_progression_range').val('Uphill');
        $('#batchForm_vertical_progression_range').attr('readonly', true);
      } else if(res == 'downhill'){
        $('#batchForm_vertical_progression_range').val('Downhill');
        $('#batchForm_vertical_progression_range').attr('readonly', true);
      } else {
        $('#batchForm_vertical_progression_range').val('');
        $('#batchForm_vertical_progression_range').attr('readonly', false);
      }
    }
  }).keydown(function( event ) {
    if ( event.which == 13 || event.which == 32  ) {
      event.preventDefault();
    }
  });
   
</script>
<style type="text/css">
  .center{
    text-align: center !important;
  }
</style>