<?php
// Last Updated by  Vinitha 06/08/2016 
if(isset($value) && !empty($value))
{
  foreach($value->result() as $row)
  {  
    $batch_welderDetails_id                       =  $row->batch_welderDetails_id;
    $welderDetails_code                           =  $row->welderDetails_code;
    $welderDetails_welding_process1               =  $row->welderDetails_welding_process1;       
    $welderDetails_welding_process2               =  $row->welderDetails_welding_process2;   
    $welderDetails_position                       =  $row->welderDetails_position;   
    $welderDetails_vertical_progression           =  $row->welderDetails_vertical_progression;
    $welderDetails_backing                        =  $row->welderDetails_backing;       
    $welderDetails_base_metal_spec                =  $row->welderDetails_base_metal_spec;  
    $welderDetails_pNumber                        =  $row->welderDetails_pNumber;  
    $welderDetails_pipe_thickness                 =  $row->welderDetails_pipe_thickness;  
    $welderDetails_pipe_diaMeter                  =  $row->welderDetails_pipe_diaMeter;  
    $welderDetails_plate_thickness                =  $row->welderDetails_plate_thickness;  
    $welderDetails_joint_type                     =  $row->welderDetails_joint_type;  
    $welderDetails_groove_type                    =  $row->welderDetails_groove_type;  
    $welderDetails_weld_type                      =  $row->welderDetails_weld_type;  
    $welderDetails_filler_metal_spec              =  $row->welderDetails_filler_metal_spec;  
    $welderDetails_fNo                            =  $row->welderDetails_fNo;  
    $welderDetails_filler_metalDia                =  $row->welderDetails_filler_metalDia;  
    $welderDetails_consumable_insert              =  $row->welderDetails_consumable_insert;  
    $welderDetails_penetration                    =  $row->welderDetails_penetration;  
    $welderDetails_currrent_polarity              =  $row->welderDetails_currrent_polarity;  
    $welderDetails_shielding_gas1                 =  $row->welderDetails_shielding_gas1;  
    $welderDetails_shielding_gas2                 =  $row->welderDetails_shielding_gas2;  
    $welderDetails_shielding_gas_flow_rate        =  $row->welderDetails_shielding_gas_flow_rate;  
    $welderDetails_root_shielding_gas             =  $row->welderDetails_root_shielding_gas;  
    $welderDetails_tungsten_size                  =  $row->welderDetails_tungsten_size;  
    $welderDetails_WQT_witnessedBy                =  $row->welderDetails_WQT_witnessedBy;  
    $welderDetails_amperage                       =  $row->welderDetails_amperage;  
    //$welderDetails_thickness                      =  $row->welderDetails_thickness;  
    $welderDetails_voltage                        =  $row->welderDetails_voltage;  
    $welderDetails_electrode_class                =  $row->welderDetails_electrode_class;  
    $welderDetails_authorisedBy                   =  $row->welderDetails_authorisedBy; 
  }
}
else
{
  $batch_welderDetails_id                         =  $this->input->post('batch_welderDetails_id');
  $welderDetails_code                             =  $this->input->post('welderDetails_code');
  $welderDetails_welding_process1                 =  $this->input->post('welderDetails_welding_process1');
  $welderDetails_welding_process2                 =  $this->input->post('welderDetails_welding_process2');
  $welderDetails_position                         =  $this->input->post('welderDetails_position');
  $welderDetails_vertical_progression             =  $this->input->post('welderDetails_vertical_progression');
  $welderDetails_backing                          =  $this->input->post('welderDetails_backing');
  $welderDetails_base_metal_spec                  =  $this->input->post('welderDetails_base_metal_spec');
  $welderDetails_pNumber                          =  $this->input->post('welderDetails_pNumber');
  $welderDetails_pipe_thickness                   =  $this->input->post('welderDetails_pipe_thickness');
  $welderDetails_pipe_diaMeter                    =  $this->input->post('welderDetails_pipe_diaMeter');
  $welderDetails_plate_thickness                  =  $this->input->post('welderDetails_plate_thickness');
  $welderDetails_joint_type                       =  $this->input->post('welderDetails_joint_type');
  $welderDetails_groove_type                      =  $this->input->post('welderDetails_groove_type');
  $welderDetails_weld_type                        =  $this->input->post('welderDetails_weld_type');
  $welderDetails_filler_metal_spec                =  $this->input->post('welderDetails_filler_metal_spec');
  $welderDetails_fNo                              =  $this->input->post('welderDetails_fNo');
  $welderDetails_filler_metalDia                  =  $this->input->post('welderDetails_filler_metalDia');
  $welderDetails_consumable_insert                =  $this->input->post('welderDetails_consumable_insert');
  $welderDetails_penetration                      =  $this->input->post('welderDetails_penetration');
  $welderDetails_currrent_polarity                =  $this->input->post('welderDetails_currrent_polarity');
  $welderDetails_shielding_gas1                   =  $this->input->post('welderDetails_shielding_gas1');
  $welderDetails_shielding_gas2                   =  $this->input->post('welderDetails_shielding_gas2');
  $welderDetails_shielding_gas_flow_rate          =  $this->input->post('welderDetails_shielding_gas_flow_rate');
  $welderDetails_root_shielding_gas               =  $this->input->post('welderDetails_root_shielding_gas');
  $welderDetails_tungsten_size                    =  $this->input->post('welderDetails_tungsten_size');
  $welderDetails_WQT_witnessedBy                  =  $this->input->post('welderDetails_WQT_witnessedBy');
  $welderDetails_amperage                         =  $this->input->post('welderDetails_amperage');
  //$welderDetails_thickness                        =  $this->input->post('welderDetails_thickness');
  $welderDetails_voltage                          =  $this->input->post('welderDetails_voltage');
  $welderDetails_electrode_class                  =  $this->input->post('welderDetails_electrode_class');
  $welderDetails_authorisedBy                     =  $this->input->post('welderDetails_authorisedBy');
}
?>

<div class="modal-content">
  <div class="modal-header panel-heading clearfix">
    <h4 class="modal-title" id="myLargeModalLabel"><?php echo lang('mm_masters_batch_Modal_welder_details_title');?></h4>
  </div>
  <form ng-app="form-example" method="post" id="ajaxModelForm" action="javascript:" ui-jp="parsley">
    <div class="modal-body">
      <span id="modalMessage"></span>
      <!-- /.start form -->
      <div class="row">
        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('welderDetails_code')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_welder_details_code');?></label> 
              <?php   
              $attrib = 'class="form-control select2" name="welderDetails_code"  data-live-search="true" data-width="100%"  id="welderDetails_code"';
              echo form_dropdown('welderDetails_code', $drop_down_welderDetailsCode, set_value('welderDetails_code', (isset($welderDetails_code)) ? $welderDetails_code : ''), $attrib);
              ?> 
              <?PHP if(form_error('welderDetails_code')){ echo '<span class="help-block">'.form_error('welderDetails_code').'</span>';} ?>           
          </div>
        </div>

        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('welderDetails_welding_process1')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_welder_details_Welding_Process1');?></label> 
              <?php   
              $attrib = 'class="form-control select2" name="welderDetails_welding_process1"  data-live-search="true" data-width="100%"  id="welderDetails_welding_process1"';
              echo form_dropdown('welderDetails_welding_process1', $drop_down_Weldprocess1, set_value('welderDetails_welding_process1', (isset($welderDetails_welding_process1)) ? $welderDetails_welding_process1 : ''), $attrib);
              ?> 
              <?PHP if(form_error('welderDetails_welding_process1')){ echo '<span class="help-block">'.form_error('welderDetails_welding_process1').'</span>';} ?>           
          </div>
        </div>

        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('welderDetails_welding_process2')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_welder_details_Welding_Process2');?></label> 
              <?php   
              $attrib = 'class="form-control select2" name="welderDetails_welding_process2"  data-live-search="true" data-width="100%"  id="welderDetails_welding_process2"';
              echo form_dropdown('welderDetails_welding_process2', $drop_down_Weldprocess2, set_value('welderDetails_welding_process2', (isset($welderDetails_welding_process2)) ? $welderDetails_welding_process2 : ''), $attrib);
              ?> 
              <?PHP if(form_error('welderDetails_welding_process2')){ echo '<span class="help-block">'.form_error('welderDetails_welding_process2').'</span>';} ?>           
          </div>
        </div>


        
      </div>
      <div class="row">
        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('welderDetails_position')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_welder_details_position');?></label> 
              <?php   
              $attrib = 'class="form-control select2" name="welderDetails_position"  data-live-search="true" data-width="100%"  id="welderDetails_position"';
              echo form_dropdown('welderDetails_position', $drop_down_Weldposition, set_value('welderDetails_position', (isset($welderDetails_position)) ? $welderDetails_position : ''), $attrib);
              ?> 
              <?PHP if(form_error('welderDetails_position')){ echo '<span class="help-block">'.form_error('welderDetails_position').'</span>';} ?>           
          </div>
        </div>
        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('welderDetails_vertical_progression')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_welder_details_vertical_progression');?></label> 
              <?php   
              $attrib = 'class="form-control select2" name="welderDetails_vertical_progression"  data-live-search="true" data-width="100%"  id="welderDetails_vertical_progression"';
              echo form_dropdown('welderDetails_vertical_progression', $drop_down_Weldprogression, set_value('welderDetails_vertical_progression', (isset($welderDetails_vertical_progression)) ? $welderDetails_vertical_progression : ''), $attrib);
              ?> 
              <?PHP if(form_error('welderDetails_vertical_progression')){ echo '<span class="help-block">'.form_error('welderDetails_vertical_progression').'</span>';} ?>           
          </div>
        </div>

        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('welderDetails_backing')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_welder_details_backing');?></label> 
              <?php   
              $attrib = 'class="form-control select2" name="welderDetails_backing"  data-live-search="true" data-width="100%"  id="welderDetails_backing"';
              echo form_dropdown('welderDetails_backing', $drop_down_Backing, set_value('welderDetails_backing', (isset($welderDetails_backing)) ? $welderDetails_backing : ''), $attrib);
              ?> 
              <?PHP if(form_error('welderDetails_backing')){ echo '<span class="help-block">'.form_error('welderDetails_backing').'</span>';} ?>           
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('welderDetails_base_metal_spec')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_welder_details_base_metal_spec');?></label>
            <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_welder_details_base_metal_spec');?>" id="welderDetails_base_metal_spec" name="welderDetails_base_metal_spec" value="<?php echo $welderDetails_base_metal_spec ;?>" autocomplete="off">
           <?PHP if(form_error('welderDetails_base_metal_spec')){ echo '<span class="help-block">'.form_error('welderDetails_base_metal_spec').'</span>';} ?>
          </div>
        </div>

        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('welderDetails_pNumber')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_welder_details_p_number');?></label>
            <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_welder_details_p_number');?>" id="welderDetails_pNumber" name="welderDetails_pNumber" value="<?php echo $welderDetails_pNumber ;?>" autocomplete="off">
           <?PHP if(form_error('welderDetails_pNumber')){ echo '<span class="help-block">'.form_error('welderDetails_pNumber').'</span>';} ?>
          </div>
        </div>

        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('welderDetails_pipe_thickness')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_welder_details_pipe_thickness');?></label>
            <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_welder_Modal_welder_details_pipe_thickness');?>" id="welderDetails_pipe_thickness" name="welderDetails_pipe_thickness" value="<?php echo $welderDetails_pipe_thickness ;?>" autocomplete="off">
           <?PHP if(form_error('welderDetails_pipe_thickness')){ echo '<span class="help-block">'.form_error('welderDetails_pipe_thickness').'</span>';} ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('welderDetails_pipe_diaMeter')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_welder_details_pipe_diaMeter');?></label>
            <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_welder_details_pipe_diaMeter');?>" id="welderDetails_pipe_diaMeter" name="welderDetails_pipe_diaMeter" value="<?php echo $welderDetails_pipe_diaMeter ;?>" autocomplete="off">
           <?PHP if(form_error('welderDetails_pipe_diaMeter')){ echo '<span class="help-block">'.form_error('welderDetails_pipe_diaMeter').'</span>';} ?>
          </div>
        </div>

        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('welderDetails_plate_thickness')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_welder_details_plate_thickness');?></label>
            <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_welder_details_plate_thickness');?>" id="welderDetails_plate_thickness" name="welderDetails_plate_thickness" value="<?php echo $welderDetails_plate_thickness ;?>" autocomplete="off">
           <?PHP if(form_error('welderDetails_plate_thickness')){ echo '<span class="help-block">'.form_error('welderDetails_plate_thickness').'</span>';} ?>
          </div>
        </div>
        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('welderDetails_joint_type')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_welder_details_joint_type');?></label>
            <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_welder_details_joint_type');?>" id="welderDetails_joint_type" name="welderDetails_joint_type" value="<?php echo $welderDetails_joint_type ;?>" autocomplete="off">
           <?PHP if(form_error('welderDetails_joint_type')){ echo '<span class="help-block">'.form_error('welderDetails_joint_type').'</span>';} ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('welderDetails_groove_type')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_welder_details_groove_type');?></label> 
              <?php   
              $attrib = 'class="form-control select2" name="welderDetails_groove_type"  data-live-search="true" data-width="100%"  id="welderDetails_groove_type"';
              echo form_dropdown('welderDetails_groove_type', $drop_down_WeldGrooveType, set_value('welderDetails_groove_type', (isset($welderDetails_groove_type)) ? $welderDetails_groove_type : ''), $attrib);
              ?> 
              <?PHP if(form_error('welderDetails_groove_type')){ echo '<span class="help-block">'.form_error('welderDetails_groove_type').'</span>';} ?>           
          </div>
        </div>

        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('welderDetails_weld_type')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_welder_details_weld_type');?></label>
            <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_welder_details_weld_type');?>" id="welderDetails_weld_type" name="welderDetails_weld_type" value="<?php echo $welderDetails_weld_type ;?>" autocomplete="off">
           <?PHP if(form_error('welderDetails_weld_type')){ echo '<span class="help-block">'.form_error('welderDetails_weld_type').'</span>';} ?>
          </div>
        </div>

        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('welderDetails_filler_metal_spec')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_welder_details_filler_metal_spec');?></label>
            <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_welder_details_filler_metal_spec');?>" id="welderDetails_filler_metal_spec" name="welderDetails_filler_metal_spec" value="<?php echo $welderDetails_filler_metal_spec ;?>" autocomplete="off">
           <?PHP if(form_error('welderDetails_filler_metal_spec')){ echo '<span class="help-block">'.form_error('welderDetails_filler_metal_spec').'</span>';} ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('welderDetails_fNo')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_welder_details_FNo');?></label>
            <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_welder_details_FNo');?>" id="welderDetails_fNo" name="welderDetails_fNo" value="<?php echo $welderDetails_fNo ;?>" autocomplete="off">
           <?PHP if(form_error('welderDetails_fNo')){ echo '<span class="help-block">'.form_error('welderDetails_fNo').'</span>';} ?>
          </div>
        </div>

        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('welderDetails_filler_metalDia')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_welder_details_filler_metalDia');?></label>
            <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_welder_details_filler_metalDia');?>" id="welderDetails_filler_metalDia" name="welderDetails_filler_metalDia" value="<?php echo $welderDetails_filler_metalDia ;?>" autocomplete="off">
           <?PHP if(form_error('welderDetails_filler_metalDia')){ echo '<span class="help-block">'.form_error('welderDetails_filler_metalDia').'</span>';} ?>
          </div>
        </div>

        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('welderDetails_consumable_insert')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_welder_details_consumable_insert');?></label> 
              <?php   
              $attrib = 'class="form-control select2" name="welderDetails_consumable_insert"  data-live-search="true" data-width="100%"  id="welderDetails_consumable_insert"';
              echo form_dropdown('welderDetails_consumable_insert', $drop_down_ConsumableInsert, set_value('welderDetails_consumable_insert', (isset($welderDetails_consumable_insert)) ? $welderDetails_consumable_insert : ''), $attrib);
              ?> 
              <?PHP if(form_error('welderDetails_consumable_insert')){ echo '<span class="help-block">'.form_error('welderDetails_consumable_insert').'</span>';} ?>           
          </div>
        </div>
      </div>
      <div class="row">

        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('welderDetails_penetration')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_welder_details_penetration');?></label> 
              <?php   
              $attrib = 'class="form-control select2" name="welderDetails_penetration"  data-live-search="true" data-width="100%"  id="welderDetails_penetration"';
              echo form_dropdown('welderDetails_penetration', $drop_down_Weldpenetration, set_value('welderDetails_penetration', (isset($welderDetails_penetration)) ? $welderDetails_penetration : ''), $attrib);
              ?> 
              <?PHP if(form_error('welderDetails_penetration')){ echo '<span class="help-block">'.form_error('welderDetails_penetration').'</span>';} ?>           
          </div>
        </div>

        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('welderDetails_currrent_polarity')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_welder_details_currrent_polarity');?></label> 
              <?php   
              $attrib = 'class="form-control select2" name="welderDetails_currrent_polarity"  data-live-search="true" data-width="100%"  id="welderDetails_currrent_polarity"';
              echo form_dropdown('welderDetails_currrent_polarity', $drop_down_Weldpolarity, set_value('welderDetails_currrent_polarity', (isset($welderDetails_currrent_polarity)) ? $welderDetails_currrent_polarity : ''), $attrib);
              ?> 
              <?PHP if(form_error('welderDetails_currrent_polarity')){ echo '<span class="help-block">'.form_error('welderDetails_currrent_polarity').'</span>';} ?>           
          </div>
        </div>

        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('welderDetails_shielding_gas1')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_welder_details_shielding_gas1');?></label>
            <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_welder_details_shielding_gas1');?>" id="v" name="welderDetails_shielding_gas1" value="<?php echo $welderDetails_shielding_gas1 ;?>" autocomplete="off">
           <?PHP if(form_error('welderDetails_shielding_gas1')){ echo '<span class="help-block">'.form_error('welderDetails_shielding_gas1').'</span>';} ?>
          </div>
        </div>
      </div>
      <div class="row">

        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('welderDetails_shielding_gas2')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_welder_details_shielding_gas2');?></label>
            <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_welder_details_shielding_gas2');?>" id="welderDetails_shielding_gas2" name="welderDetails_shielding_gas2" value="<?php echo $welderDetails_shielding_gas2 ;?>" autocomplete="off">
           <?PHP if(form_error('welderDetails_shielding_gas2')){ echo '<span class="help-block">'.form_error('welderDetails_shielding_gas2').'</span>';} ?>
          </div>
        </div>

        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('welderDetails_shielding_gas_flow_rate')){ echo 'has-error';} ?>">  
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_welder_details_shielding_gas_flow_rate');?></label>
            <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_welder_details_shielding_gas_flow_rate');?>" id="welderDetails_shielding_gas_flow_rate" name="welderDetails_shielding_gas_flow_rate" value="<?php echo $welderDetails_shielding_gas_flow_rate ;?>" autocomplete="off">
           <?PHP if(form_error('welderDetails_shielding_gas_flow_rate')){ echo '<span class="help-block">'.form_error('welderDetails_shielding_gas_flow_rate').'</span>';} ?>
          </div>
        </div>

        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('welderDetails_root_shielding_gas')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_welder_details_root_shielding_gas');?></label>
            <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_welder_details_root_shielding_gas');?>" id="welderDetails_root_shielding_gas" name="welderDetails_root_shielding_gas" value="<?php echo $welderDetails_root_shielding_gas ;?>" autocomplete="off">
           <?PHP if(form_error('welderDetails_root_shielding_gas')){ echo '<span class="help-block">'.form_error('welderDetails_root_shielding_gass').'</span>';} ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('welderDetails_tungsten_size')){ echo 'has-error';} ?>">  
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_welder_details_tungsten_size');?></label>
            <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_welder_details_tungsten_size');?>" id="welderDetails_tungsten_size" name="welderDetails_tungsten_size" value="<?php echo $welderDetails_tungsten_size ;?>" autocomplete="off">
           <?PHP if(form_error('welderDetails_tungsten_size')){ echo '<span class="help-block">'.form_error('welderDetails_tungsten_size').'</span>';} ?>
          </div>
        </div>

        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('welderDetails_WQT_witnessedBy')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_welder_details_WQT_witnessedBy');?></label> 
              <?php   
              $attrib = 'class="form-control select2" name="welderDetails_WQT_witnessedBy"  data-live-search="true" data-width="100%"  id="welderDetails_WQT_witnessedBy"';
              echo form_dropdown('welderDetails_WQT_witnessedBy', $drop_down_WitnessedBy, set_value('welderDetails_WQT_witnessedBy', (isset($welderDetails_WQT_witnessedBy)) ? $welderDetails_WQT_witnessedBy : ''), $attrib);
              ?> 
              <?PHP if(form_error('welderDetails_WQT_witnessedBy')){ echo '<span class="help-block">'.form_error('welderDetails_WQT_witnessedBy').'</span>';} ?>           
          </div>
        </div>

        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('welderDetails_amperage')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_welder_details_amperage');?></label>
            <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_welder_details_amperage');?>" id="welderDetails_amperage" name="welderDetails_amperage" value="<?php echo $welderDetails_amperage ;?>" autocomplete="off">
           <?PHP if(form_error('welderDetails_amperage')){ echo '<span class="help-block">'.form_error('welderDetails_amperage').'</span>';} ?>
          </div>
        </div>

        
      </div>
      <div class="row">
        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('welderDetails_voltage')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_welder_details_voltage');?></label>
            <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_welder_details_voltage');?>" id="welderDetails_voltage" name="welderDetails_voltage" value="<?php echo $welderDetails_voltage ;?>" autocomplete="off">
           <?PHP if(form_error('welderDetails_voltage')){ echo '<span class="help-block">'.form_error('welderDetails_voltage').'</span>';} ?>
          </div>
        </div>

        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('welderDetails_electrode_class')){ echo 'has-error';} ?>"> 
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_welder_details_electrode_class');?></label>
            <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_welder_details_electrode_class');?>" id="welderDetails_electrode_class" name="welderDetails_electrode_class" value="<?php echo $welderDetails_electrode_class ;?>" autocomplete="off">
           <?PHP if(form_error('welderDetails_electrode_class')){ echo '<span class="help-block">'.form_error('welderDetails_electrode_class').'</span>';} ?>
          </div>
        </div>

        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('welderDetails_authorisedBy')){ echo 'has-error';} ?>"> 
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_welder_details_authorisedBy');?></label>
            <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_welder_details_authorisedBy');?>" id="welderDetails_authorisedBy" name="welderDetails_authorisedBy" value="<?php echo $welderDetails_authorisedBy ;?>" autocomplete="off">
           <?PHP if(form_error('welderDetails_authorisedBy')){ echo '<span class="help-block">'.form_error('welderDetails_authorisedBy').'</span>';} ?>
          </div>
        </div>
      </div>        

      <div class="text-center">
        <input type="hidden" name="batchID" value="<?php echo $batchID;?>" />
        <input type="hidden" name="batch_welderDetails_id" value="<?php echo $batch_welderDetails_id;?>">

        <input type="hidden" name="submit" value="1">

        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit"><?php echo lang('btn_save');?></button>
        <button type="submit" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal"><?php echo lang('btn_close_window');?></button>
      </div>
      <!-- /.end form -->
    </div>
  <?php echo form_close(); ?>
</div>

                            
<script type="text/javascript">

      jQuery(document).ready(function() 
      {
        //$('.modal .select2').select2('disable');

        // When the form is submitted
        $("#ajaxModelForm").submit(function()
        { 

            
          // 'this' refers to the current submitted form 
          var str = $(this).serialize();
          
          $.ajax({
          type: "POST",
          url: "<?php echo site_url('masters/Batch/getupdateWelderDetailsModal'); ?>",
          data: {postdata: str},
          dataType:"html",
            success: function(html1)
            {
            try
              {
                var data = JSON.parse(html1);
                if(data.result == "Success" || data.result == "Update"  || data.result == "ExistRecord" )
                {
                  var htmlText = '<div class="alert alert-'+data.res_type+'" successmessage">'+data.res+'</div>';
                  $('#modalMessage').html(htmlText);
                  //swal("Something Went Wrong");
                    //$('#BasicInformationNotification').removeClass('hide');
                    //$("[data-dismiss=modal]").trigger({ type: "click" });
                    //window.location.href = "<?php echo site_url(); ?>masters/Welder/";
                    //$('#BasicInformationNotification').html("<span class='text-semibold'>Type Updated Successfully..</span>");
                }
                else if(data.result == "Error")
                {

                  //swal("Something Went Wrong");

                  swal({
                    title: "Error",
                    text: "Something Went Wrong!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, Close it!",
                    closeOnConfirm: false
                  },
                  function(){
                    swal("Closeed!", "Your Details Check.", "success");

                     $('#BasicInformationNotification').removeClass('hide');
                    $("[data-dismiss=modal]").trigger({ type: "click" });

                    window.location.href = "<?php echo site_url(); ?>masters/Welder/";

                  });
                   
                    //$('#BasicInformationNotification').html("<span class='text-semibold'>Type Updated Successfully..</span>");
                }
              }
              catch(e)
              {
                //alert(e);
                $('#attributeVIDetailsModal').html(html1);
              }
            },
          });
          
        }); // end submit event        
    });
</script>