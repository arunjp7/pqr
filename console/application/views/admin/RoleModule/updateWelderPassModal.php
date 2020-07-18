<?php
// Last Updated by  Vinitha 06/08/2016 
if(isset($value) && !empty($value))
{
  foreach($value->result() as $row)
  {  
    $batch_welderPass_id                       =  $row->batch_welderPass_id;
    $welderPass_attProcess_name                =  $row->welderPass_attProcess_name;
    $welderPass_attProcess_value               =  $row->welderPass_attProcess_value;
    $welderPass_attProcessType_name            =  $row->welderPass_attProcessType_name;
    $welderPass_attProcessType_value           =  $row->welderPass_attProcessType_value; 
    $welderPass_attPosition_name               =  $row->welderPass_attPosition_name;
    $welderPass_attPosition_value              =  $row->welderPass_attPosition_value;  
    $welderPass_attPositionQul_name            =  $row->welderPass_attPositionQul_name;
    $welderPass_attPositionQul_value           =  $row->welderPass_attPositionQul_value;  
    $welderPass_attJointType_name              =  $row->welderPass_attJointType_name;
    $welderPass_attJointType_value             =  $row->welderPass_attJointType_value;  
    $welderPass_attTestThickness_name          =  $row->welderPass_attTestThickness_name;
    $welderPass_attTestThickness_value         =  $row->welderPass_attTestThickness_value;
    $welderPass_attTestDia_name                =  $row->welderPass_attTestDia_name;
    $welderPass_attTestDia_value               =  $row->welderPass_attTestDia_value;
    $welderPass_attRangeQul_name               =  $row->welderPass_attRangeQul_name;
    $welderPass_attRangeQul_value              =  $row->welderPass_attRangeQul_value;     
    $welderPass_attPGrpNo_name                 =  $row->welderPass_attPGrpNo_name;
    $welderPass_attPGrpNo_value                =  $row->welderPass_attPGrpNo_value;         
    $welderPass_attElectrodeClass_name         =  $row->welderPass_attElectrodeClass_name;
    $welderPass_attElectrodeClass_value        =  $row->welderPass_attElectrodeClass_value;        
    $welderPass_attFNo_name                    =  $row->welderPass_attFNo_name;
    $welderPass_attFNo_value                   =  $row->welderPass_attFNo_value;     
    $welderPass_attContractorRep_name          =  $row->welderPass_attContractorRep_name;
    $welderPass_attBacking_name                =  $row->welderPass_attBacking_name;
    $welderPass_attBacking_value               =  $row->welderPass_attBacking_value;     
 
  }
}
else
{
  $batch_welderPass_id                         =  $this->input->post('batch_welderPass_id');
  $welderPass_attProcess_name                  =  $this->input->post('welderPass_attProcess_name');
  $welderPass_attProcess_value                 =  $this->input->post('welderPass_attProcess_value');
  $welderPass_attProcessType_name              =  $this->input->post('welderPass_attProcessType_name');
  $welderPass_attProcessType_value             =  $this->input->post('welderPass_attProcessType_value');  
  $welderPass_attPosition_name                 =  $this->input->post('welderPass_attPosition_name');
  $welderPass_attPosition_value                =  $this->input->post('welderPass_attPosition_value');  
  $welderPass_attPositionQul_name              =  $this->input->post('welderPass_attPositionQul_name');
  $welderPass_attPositionQul_value             =  $this->input->post('welderPass_attPositionQul_value');  
  $welderPass_attJointType_name                =  $this->input->post('welderPass_attJointType_name');
  $welderPass_attJointType_value               =  $this->input->post('welderPass_attJointType_value');  
  $welderPass_attTestThickness_name            =  $this->input->post('welderPass_attTestThickness_name');
  $welderPass_attTestThickness_value           =  $this->input->post('welderPass_attTestThickness_value');
  $welderPass_attTestDia_name                  =  $this->input->post('welderPass_attTestDia_name');
  $welderPass_attTestDia_value                 =  $this->input->post('welderPass_attTestDia_value');  
  $welderPass_attRangeQul_name                 =  $this->input->post('welderPass_attRangeQul_name');
  $welderPass_attRangeQul_value                =  $this->input->post('welderPass_attRangeQul_value');  
  $welderPass_attPGrpNo_name                   =  $this->input->post('welderPass_attPGrpNo_name');
  $welderPass_attPGrpNo_value                  =  $this->input->post('welderPass_attPGrpNo_value');
  $welderPass_attFNo_name                      =  $this->input->post('welderPass_attFNo_name');
  $welderPass_attFNo_value                     =  $this->input->post('welderPass_attFNo_value');
  $welderPass_attContractorRep_name            =  $this->input->post('welderPass_attContractorRep_name');
  $welderPass_attBacking_name                  =  $this->input->post('welderPass_attBacking_name');
  $welderPass_attBacking_value                 =  $this->input->post('welderPass_attBacking_value');
      

}
?>

<div class="modal-content">
  <div class="modal-header panel-heading clearfix">
    <h4 class="modal-title" id="myLargeModalLabel"><?php echo lang('mm_masters_batch_Modal_welder_pass_title');?></h4>
  </div>
  <form ng-app="form-example" method="post" id="ajaxModelForm" action="javascript:" ui-jp="parsley">
    <div class="modal-body">
      <span id="modalMessage"></span>
      <!-- /.start form -->
      <div class="row">
        <div class="col-sm-6 col-xs-6">
          <div class="row">
            <div class="col-sm-3 col-xs-3">
              <label for="exampleInputEmail1"><strong><?php echo lang('mm_masters_batch_Modal_welder_pass_head_attribute');?></strong></label> 
            </div>
            <div class="col-sm-9 col-xs-9">
              <div class="row">
                <div class="col-sm-6 col-xs-6">
                  <label for="exampleInputEmail1"><strong><?php echo lang('mm_masters_batch_Modal_welder_pass_head_attribute_name');?></strong></label> 
                </div>
                <div class="col-sm-6 col-xs-6">
                  <label for="exampleInputEmail1"><strong><?php echo lang('mm_masters_batch_Modal_welder_pass_head_attribute_value');?></strong></label> 
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-xs-6">
          <div class="row">
            <div class="col-sm-3 col-xs-3">
              <label for="exampleInputEmail1"><strong><?php echo lang('mm_masters_batch_Modal_welder_pass_head_attribute');?></strong></label>
            </div>
            <div class="col-sm-9 col-xs-9">
              <div class="row">
                <div class="col-sm-6 col-xs-6">
                  <label for="exampleInputEmail1"><strong><?php echo lang('mm_masters_batch_Modal_welder_pass_head_attribute_name');?></strong></label>
                </div>
                <div class="col-sm-6 col-xs-6">
                  <label for="exampleInputEmail1"><strong><?php echo lang('mm_masters_batch_Modal_welder_pass_head_attribute_value');?></strong></label> 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr style="margin-top:10px; margin-bottom:10px" />
      <div class="row">
        <div class="col-sm-6 col-xs-6">
          <div class="row">
            <div class="col-sm-3 col-xs-3">
              <div class="form-group">
                <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_welder_pass_attProcess_label');?></label> 
              </div>
            </div>
            <div class="col-sm-9 col-xs-9">
              <div class="row">
                <div class="col-sm-6 col-xs-6">
                  <div class="form-group <?PHP if(form_error('welderPass_attProcess_name')){ echo 'has-error';} ?>">
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_welder_pass_attProcess_name');?>" id="welderPass_attProcess_name" name="welderPass_attProcess_name" value="<?php echo $welderPass_attProcess_name ;?>" autocomplete="off">
                    <?PHP if(form_error('welderPass_attProcess_name')){ echo '<span class="help-block">'.form_error('welderPass_attProcess_name').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-6 col-xs-6">
                  <div class="form-group <?PHP if(form_error('welderPass_attProcess_value')){ echo 'has-error';} ?>">
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_welder_pass_attProcess_value');?>" id="welderPass_attProcess_value" name="welderPass_attProcess_value" value="<?php echo $welderPass_attProcess_value ;?>" autocomplete="off">
                    <?PHP if(form_error('welderPass_attProcess_value')){ echo '<span class="help-block">'.form_error('welderPass_attProcess_value').'</span>';} ?> 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-xs-6">
          <div class="row">
            <div class="col-sm-3 col-xs-3">
              <div class="form-group">
                <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_welder_pass_attProcessType_label');?></label> 
              </div>
            </div>
            <div class="col-sm-9 col-xs-9">
              <div class="row">
                <div class="col-sm-6 col-xs-6">
                  <div class="form-group <?PHP if(form_error('welderPass_attProcessType_name')){ echo 'has-error';} ?>">
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_welder_pass_attProcessType_name');?>" id="welderPass_attProcessType_name" name="welderPass_attProcessType_name" value="<?php echo $welderPass_attProcessType_name ;?>" autocomplete="off">
                    <?PHP if(form_error('welderPass_attProcessType_name')){ echo '<span class="help-block">'.form_error('welderPass_attProcessType_name').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-6 col-xs-6">
                  <div class="form-group <?PHP if(form_error('welderPass_attProcessType_value')){ echo 'has-error';} ?>">
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_welder_pass_attProcessType_value');?>" id="welderPass_attProcessType_value" name="welderPass_attProcessType_value" value="<?php echo $welderPass_attProcessType_value ;?>" autocomplete="off">
                    <?PHP if(form_error('welderPass_attProcessType_value')){ echo '<span class="help-block">'.form_error('welderPass_attProcessType_value').'</span>';} ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 col-xs-6">
          <div class="row">
            <div class="col-sm-3 col-xs-3">
              <div class="form-group">
                <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_welder_pass_attPosition_label');?></label> 
              </div>
            </div>
            <div class="col-sm-9 col-xs-9">
              <div class="row">
                <div class="col-sm-6 col-xs-6">
                  <div class="form-group <?PHP if(form_error('welderPass_attPosition_name')){ echo 'has-error';} ?>">
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_welder_pass_attPosition_name');?>" id="welderPass_attPosition_name" name="welderPass_attPosition_name" value="<?php echo $welderPass_attPosition_name ;?>" autocomplete="off">
                    <?PHP if(form_error('welderPass_attPosition_name')){ echo '<span class="help-block">'.form_error('welderPass_attPosition_name').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-6 col-xs-6">
                  <div class="form-group <?PHP if(form_error('welderPass_attPosition_value')){ echo 'has-error';} ?>">
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_welder_pass_attPosition_value');?>" id="welderPass_attPosition_value" name="welderPass_attPosition_value" value="<?php echo $welderPass_attPosition_value ;?>" autocomplete="off">
                    <?PHP if(form_error('welderPass_attPosition_value')){ echo '<span class="help-block">'.form_error('welderPass_attPosition_value').'</span>';} ?> 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-xs-6">
          <div class="row">
            <div class="col-sm-3 col-xs-3">
              <div class="form-group">
                <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_welder_pass_attPositionQul_label');?></label> 
              </div>
            </div>
            <div class="col-sm-9 col-xs-9">
              <div class="row">
                <div class="col-sm-6 col-xs-6">
                  <div class="form-group <?PHP if(form_error('welderPass_attPositionQul_name')){ echo 'has-error';} ?>">
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_welder_pass_attPositionQul_name');?>" id="welderPass_attPositionQul_name" name="welderPass_attPositionQul_name" value="<?php echo $welderPass_attPositionQul_name ;?>" autocomplete="off">
                    <?PHP if(form_error('welderPass_attPositionQul_name')){ echo '<span class="help-block">'.form_error('welderPass_attPositionQul_name').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-6 col-xs-6">
                  <div class="form-group <?PHP if(form_error('welderPass_attPositionQul_value')){ echo 'has-error';} ?>">
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_welder_pass_attPositionQul_value');?>" id="welderPass_attPositionQul_value" name="welderPass_attPositionQul_value" value="<?php echo $welderPass_attPositionQul_value ;?>" autocomplete="off">
                    <?PHP if(form_error('welderPass_attPositionQul_value')){ echo '<span class="help-block">'.form_error('welderPass_attPositionQul_value').'</span>';} ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 col-xs-6">
          <div class="row">
            <div class="col-sm-3 col-xs-3">
              <div class="form-group">
                <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_welder_pass_attJointType_label');?></label> 
              </div>
            </div>
            <div class="col-sm-9 col-xs-9">
              <div class="row">
                <div class="col-sm-6 col-xs-6">
                  <div class="form-group <?PHP if(form_error('welderPass_attJointType_name')){ echo 'has-error';} ?>">
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_welder_pass_attJointType_name');?>" id="welderPass_attJointType_name" name="welderPass_attJointType_name" value="<?php echo $welderPass_attJointType_name ;?>" autocomplete="off">
                    <?PHP if(form_error('welderPass_attJointType_name')){ echo '<span class="help-block">'.form_error('welderPass_attJointType_name').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-6 col-xs-6">
                  <div class="form-group <?PHP if(form_error('welderPass_attJointType_value')){ echo 'has-error';} ?>">
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_welder_pass_attJointType_value');?>" id="welderPass_attJointType_value" name="welderPass_attJointType_value" value="<?php echo $welderPass_attJointType_value ;?>" autocomplete="off">
                    <?PHP if(form_error('welderPass_attJointType_value')){ echo '<span class="help-block">'.form_error('welderPass_attJointType_value').'</span>';} ?> 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-xs-6">
          <div class="row">
            <div class="col-sm-3 col-xs-3">
              <div class="form-group">
                <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_welder_pass_attTestThickness_label');?></label> 
              </div>
            </div>
            <div class="col-sm-9 col-xs-9">
              <div class="row">
                <div class="col-sm-6 col-xs-6">
                  <div class="form-group <?PHP if(form_error('welderPass_attTestThickness_name')){ echo 'has-error';} ?>">
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_welder_pass_attTestThickness_name');?>" id="welderPass_attTestThickness_name" name="welderPass_attTestThickness_name" value="<?php echo $welderPass_attTestThickness_name ;?>" autocomplete="off">
                    <?PHP if(form_error('welderPass_attTestThickness_name')){ echo '<span class="help-block">'.form_error('welderPass_attTestThickness_name').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-6 col-xs-6">
                  <div class="form-group <?PHP if(form_error('welderPass_attTestThickness_value')){ echo 'has-error';} ?>">
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_welder_pass_attTestThickness_value');?>" id="welderPass_attTestThickness_value" name="welderPass_attTestThickness_value" value="<?php echo $welderPass_attTestThickness_value ;?>" autocomplete="off">
                    <?PHP if(form_error('welderPass_attTestThickness_value')){ echo '<span class="help-block">'.form_error('welderPass_attTestThickness_value').'</span>';} ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6 col-xs-6">
          <div class="row">
            <div class="col-sm-3 col-xs-3">
              <div class="form-group">
                <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_welder_pass_attTestDia_label');?></label> 
              </div>
            </div>
            <div class="col-sm-9 col-xs-9">
              <div class="row">
                <div class="col-sm-6 col-xs-6">
                  <div class="form-group <?PHP if(form_error('welderPass_attTestDia_name')){ echo 'has-error';} ?>">
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_welder_pass_attTestDia_name');?>" id="welderPass_attTestDia_name" name="welderPass_attTestDia_name" value="<?php echo $welderPass_attTestDia_name ;?>" autocomplete="off">
                    <?PHP if(form_error('welderPass_attTestDia_name')){ echo '<span class="help-block">'.form_error('welderPass_attTestDia_name').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-6 col-xs-6">
                  <div class="form-group <?PHP if(form_error('welderPass_attTestDia_value')){ echo 'has-error';} ?>">
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_welder_pass_attTestDia_value');?>" id="welderPass_attTestDia_value" name="welderPass_attTestDia_value" value="<?php echo $welderPass_attTestDia_value ;?>" autocomplete="off">
                    <?PHP if(form_error('welderPass_attTestDia_value')){ echo '<span class="help-block">'.form_error('welderPass_attTestDia_value').'</span>';} ?> 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-xs-6">
          <div class="row">
            <div class="col-sm-3 col-xs-3">
              <div class="form-group">
                <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_welder_pass_attRangeQul_label');?></label> 
              </div>
            </div>
            <div class="col-sm-9 col-xs-9">
              <div class="row">
                <div class="col-sm-6 col-xs-6">
                  <div class="form-group <?PHP if(form_error('welderPass_attRangeQul_name')){ echo 'has-error';} ?>">
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_welder_pass_attRangeQul_name');?>" id="welderPass_attRangeQul_name" name="welderPass_attRangeQul_name" value="<?php echo $welderPass_attRangeQul_name ;?>" autocomplete="off">
                    <?PHP if(form_error('welderPass_attRangeQul_name')){ echo '<span class="help-block">'.form_error('welderPass_attRangeQul_name').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-6 col-xs-6">
                  <div class="form-group <?PHP if(form_error('welderPass_attRangeQul_value')){ echo 'has-error';} ?>">
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_welder_pass_attRangeQul_value');?>" id="welderPass_attRangeQul_value" name="welderPass_attRangeQul_value" value="<?php echo $welderPass_attRangeQul_value ;?>" autocomplete="off">
                    <?PHP if(form_error('welderPass_attRangeQul_value')){ echo '<span class="help-block">'.form_error('welderPass_attRangeQul_value').'</span>';} ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6 col-xs-6">
          <div class="row">
            <div class="col-sm-3 col-xs-3">
              <div class="form-group">
                <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_welder_pass_attPGrpNo_label');?></label> 
              </div>
            </div>
            <div class="col-sm-9 col-xs-9">
              <div class="row">
                <div class="col-sm-6 col-xs-6">
                  <div class="form-group <?PHP if(form_error('welderPass_attPGrpNo_name')){ echo 'has-error';} ?>">
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_welder_pass_attPGrpNo_name');?>" id="welderPass_attPGrpNo_name" name="welderPass_attPGrpNo_name" value="<?php echo $welderPass_attPGrpNo_name ;?>" autocomplete="off">
                    <?PHP if(form_error('welderPass_attPGrpNo_name')){ echo '<span class="help-block">'.form_error('welderPass_attPGrpNo_name').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-6 col-xs-6">
                  <div class="form-group <?PHP if(form_error('welderPass_attPGrpNo_value')){ echo 'has-error';} ?>">
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_welder_pass_attPGrpNo_value');?>" id="welderPass_attPGrpNo_value" name="welderPass_attPGrpNo_value" value="<?php echo $welderPass_attPGrpNo_value ;?>" autocomplete="off">
                    <?PHP if(form_error('welderPass_attPGrpNo_value')){ echo '<span class="help-block">'.form_error('welderPass_attPGrpNo_value').'</span>';} ?> 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-xs-6">
          <div class="row">
            <div class="col-sm-3 col-xs-3">
              <div class="form-group">
                <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_welder_pass_attElectrodeClass_label');?></label> 
              </div>
            </div>
            <div class="col-sm-9 col-xs-9">
              <div class="row">
                <div class="col-sm-6 col-xs-6">
                  <div class="form-group <?PHP if(form_error('welderPass_attElectrodeClass_name')){ echo 'has-error';} ?>">
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_welder_pass_attElectrodeClass_name');?>" id="welderPass_attElectrodeClass_name" name="welderPass_attElectrodeClass_name" value="<?php echo $welderPass_attElectrodeClass_name ;?>" autocomplete="off">
                    <?PHP if(form_error('welderPass_attElectrodeClass_name')){ echo '<span class="help-block">'.form_error('welderPass_attElectrodeClass_name').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-6 col-xs-6">
                  <div class="form-group <?PHP if(form_error('welderPass_attElectrodeClass_value')){ echo 'has-error';} ?>">
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_welder_pass_attElectrodeClass_value');?>" id="welderPass_attElectrodeClass_value" name="welderPass_attElectrodeClass_value" value="<?php echo $welderPass_attElectrodeClass_value ;?>" autocomplete="off">
                    <?PHP if(form_error('welderPass_attElectrodeClass_value')){ echo '<span class="help-block">'.form_error('welderPass_attElectrodeClass_value').'</span>';} ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 col-xs-6">
          <div class="row">
            <div class="col-sm-3 col-xs-3">
              <div class="form-group">
                <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_welder_pass_attFNo_label');?></label> 
              </div>
            </div>
            <div class="col-sm-9 col-xs-9">
              <div class="row">
                <div class="col-sm-6 col-xs-6">
                  <div class="form-group <?PHP if(form_error('welderPass_attFNo_name')){ echo 'has-error';} ?>">
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_welder_pass_attFNo_name');?>" id="welderPass_attFNo_name" name="welderPass_attFNo_name" value="<?php echo $welderPass_attFNo_name ;?>" autocomplete="off">
                    <?PHP if(form_error('welderPass_attFNo_name')){ echo '<span class="help-block">'.form_error('welderPass_attFNo_name').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-6 col-xs-6">
                  <div class="form-group <?PHP if(form_error('welderPass_attFNo_value')){ echo 'has-error';} ?>">
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_welder_pass_attFNo_value');?>" id="welderPass_attFNo_value" name="welderPass_attFNo_value" value="<?php echo $welderPass_attFNo_value ;?>" autocomplete="off">
                    <?PHP if(form_error('welderPass_attFNo_value')){ echo '<span class="help-block">'.form_error('welderPass_attFNo_value').'</span>';} ?> 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-xs-6">
          <div class="row">
            <div class="col-sm-3 col-xs-3">
              <div class="form-group">
                <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_welder_pass_attContractorRep_label');?></label> 
              </div>
            </div>
            <div class="col-sm-9 col-xs-9">
              <div class="row">
                <div class="col-sm-6 col-xs-6">
                  <div class="form-group <?PHP if(form_error('welderPass_attContractorRep_name')){ echo 'has-error';} ?>">
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_welder_pass_attContractorRep_name');?>" id="welderPass_attContractorRep_name" name="welderPass_attContractorRep_name" value="<?php echo $welderPass_attContractorRep_name ;?>" autocomplete="off">
                    <?PHP if(form_error('welderPass_attContractorRep_name')){ echo '<span class="help-block">'.form_error('welderPass_attContractorRep_name').'</span>';} ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6 col-xs-6">
          <div class="row">
            <div class="col-sm-3 col-xs-3">
              <div class="form-group">
                <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_welder_pass_attBacking_label');?></label> 
              </div>
            </div>
            <div class="col-sm-9 col-xs-9">
              <div class="row">
                <div class="col-sm-6 col-xs-6">
                  <div class="form-group <?PHP if(form_error('welderPass_attBacking_name')){ echo 'has-error';} ?>">
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_welder_pass_attBacking_name');?>" id="welderPass_attBacking_name" name="welderPass_attBacking_name" value="<?php echo $welderPass_attBacking_name ;?>" autocomplete="off">
                    <?PHP if(form_error('welderPass_attBacking_name')){ echo '<span class="help-block">'.form_error('welderPass_attBacking_name').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-6 col-xs-6">
                  <div class="form-group <?PHP if(form_error('welderPass_attBacking_value')){ echo 'has-error';} ?>">
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_welder_pass_attBacking_value');?>" id="welderPass_attBacking_value" name="welderPass_attBacking_value" value="<?php echo $welderPass_attBacking_value ;?>" autocomplete="off">
                    <?PHP if(form_error('welderPass_attBacking_value')){ echo '<span class="help-block">'.form_error('welderPass_attBacking_value').'</span>';} ?> 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center">
        <input type="hidden" name="batchID" value="<?php echo $batchID;?>" />
        <input type="hidden" name="batch_welderPass_id" value="<?php echo $batch_welderPass_id;?>">

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
          url: "<?php echo site_url('masters/Batch/getupdateWelderPassModal'); ?>",
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