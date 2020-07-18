<?php
// Last Updated by  Vinitha 06/08/2016 
$this->mcommon->getCheckUserPermissionHead('Batch add and edit',true);
if(isset($value) && !empty($value))
{
    foreach($value->result() as $row)
    {   
      $batch_id                   =  $row->batch_id;
      $batch_services             =  $row->batch_services;
      $batch_wps                  =  $row->batch_wps; 
      $batch_client_specification =  $row->batch_client_specification; 
      $batch_request_date         =  $row->batch_request_date; 
      $batch_project_clone        =  $row->batch_project_clone; 
      $batch_report_template      =  $row->batch_report_template; 
      $batchrefno                 =  $row->batch_ref_no;   
      $batch_acceptance_criteria  =  $row->batch_acceptance_criteria;   
      $welder_iqama_no            =  $row->welder_iqama_no;
      $batch_location             =  $row->batch_location;       
      $batch_pqr_no               =  $row->batch_pqr_no;       
      $batch_name                 =  $row->batch_name;       
      $jobNo                      =  $row->jobNo;       
   
    }
          

}
else
{
    $batch_services               =  $this->input->post('batch_services');
    $batch_wps                    =  $this->input->post('batch_wps');
    $batch_client_specification   =  $this->input->post('batch_client_specification');
    $batch_request_date           =  $this->input->post('batch_request_date');
    $batch_project_clone          =  $this->input->post('batch_project_clone');
    $batch_report_template        =  $this->input->post('batch_report_template');
    $batchrefno                   =  $this->input->post('batch_ref_no');
    $batch_acceptance_criteria    =  $this->input->post('batch_acceptance_criteria');
    $welder_no                    =  $this->input->post('welder_no');
    $batch_location               =  $this->input->post('batch_location');
    $batch_pqr_no                 =  $this->input->post('batch_pqr_no');
    $batch_name                   =  $this->input->post('batch_name');
    $jobNo                        =  $this->input->post('jobNo');
 
}
$batch_ref_no= ($batchrefno != '') ? $batchrefno : $batch_ref_no;

?>
  <!-- /.start form -->
  <div class="row">
    <div class="col-md-12">
      <div class="white-box">
      <!--
        <h3 class="box-title m-b-0"><?php echo $form_tittle;?></h3>
        <p class="text-muted m-b-30 font-13"> <?php echo $form_tittle_small;?> </p>
      -->
        
        <div class="row">
          <div class="col-sm-12 col-xs-12">
            <?php echo form_open_multipart($form_url); ?>
              <div class="row">
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('batch_services')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_services');?><span class="text-danger">*</span></label>
                      <?php   
                      $attrib = 'class="form-control select2" name="batch_services"  data-live-search="true" data-width="100%"  id="batch_services"';
                      echo form_dropdown('batch_services', $drop_down_Services, set_value('batch_services', (isset($batch_services)) ? $batch_services : ''), $attrib);
                      ?> 
                      <?PHP if(form_error('batch_services')){ echo '<span class="help-block">'.form_error('batch_servicesss').'</span>';} ?>           
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('batch_wps')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_wps');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_wps');?>" id="batch_wps" name="batch_wps" value="<?php echo $batch_wps ;?>" autocomplete="off">
                    <?PHP if(form_error('batch_wps')){ echo '<span class="help-block">'.form_error('batch_wps').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('batch_client_specification')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_client_specification');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_client_specification');?>" id="batch_client_specification" name="batch_client_specification" value="<?php echo $batch_client_specification ;?>" autocomplete="off">
                   <?PHP if(form_error('batch_client_specification')){ echo '<span class="help-block">'.form_error('batch_client_specification').'</span>';} ?>
                  </div>
                </div> 
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('batch_request_date')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_request_date');?></label>
                    <div class="input-group">
                      <input type="text" class="form-control datepicker-autoclose"  name="batch_request_date"  placeholder="<?php echo lang('mm_masters_batch_request_date');?>" value="<?php echo ($batch_request_date!='' && $batch_request_date!='0000-00-00') ? date('m/d/Y',strtotime($batch_request_date)) : '';?>"> 
                      <span class="input-group-addon"><i class="icon-calender"></i></span> 
                    </div>
                    <?PHP if(form_error('batch_request_date')){ echo '<span class="help-block">'.form_error('batch_request_date').'</span>';} ?>
                  </div>
                </div> 
              </div> 
              <div class="row">
                <!--<div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('batch_project_clone')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_project_clone');?></label>
                      <?php   
                      $attrib = 'class="form-control select2" name="batch_project_clone"  data-live-search="true" data-width="100%"  id="batch_project_clone"';
                      echo form_dropdown('batch_project_clone', $drop_down_project, set_value('batch_project_clone', (isset($batch_project_clone)) ? $batch_project_clone : ''), $attrib);
                      ?> 
                      <?PHP if(form_error('batch_project_clone')){ echo '<span class="help-block">'.form_error('batch_project_clone').'</span>';} ?>           
                  </div>
                </div>-->

                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('jobNo')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_jobNo');?><span class="text-danger">*</span></label>
                      <?php   
                      $attrib = 'class="form-control select2" name="jobNo"  data-live-search="true" data-width="100%"  id="jobNo"';
                      echo form_dropdown('jobNo', $drop_down_job, set_value('jobNo', (isset($jobNo)) ? $jobNo : ''), $attrib);
                      ?> 
                      <?PHP if(form_error('jobNo')){ echo '<span class="help-block">'.form_error('jobNo').'</span>';} ?>           
                  </div>
                </div>

                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('batch_report_template')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_report_template');?></label>
                      <select name="batchForm_test_specimen_val" class="form-control select2" data-live-search="true" data-width="100%" id="batch_report_template" tabindex="-1" id="batch_report_template" onchange="myFunction()">
                        <?php 
                          foreach ($drop_menu_reportTemplate as $key => $value) {
                            ?>
                            <option data-name="<?php echo $value;?>" value="<?php echo $key;?>" <?php if($batch_report_template == $key){ echo 'selected="selected"';}?>><?php echo $value;?></option>
                            <?php
                          }
                        ?>
                      </select>
                      <?php   
                      //$attrib = 'class="form-control select2" name="batch_report_template"  data-live-search="true" data-width="100%"  id="batch_report_template" onchange="myFunction()"';
                      //echo form_dropdown('batch_report_template', $drop_menu_reportTemplate, set_value('batch_report_template', (isset($batch_report_template)) ? $batch_report_template : ''), $attrib);
                      ?> 
                      <?PHP if(form_error('batch_report_template')){ echo '<span class="help-block">'.form_error('batch_report_template').'</span>';} ?>           
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('batch_ref_no')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_ref_no');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_ref_no');?>" id="batch_ref_no" name="batch_ref_no" value="<?php echo $batch_ref_no ;?>" autocomplete="off" readonly>
                   <?PHP if(form_error('batch_ref_no')){ echo '<span class="help-block">'.form_error('batch_ref_no').'</span>';} ?>
                  </div>
                </div> 
              
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('batch_acceptance_criteria')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_acceptance_criteria');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_acceptance_criteria');?>" id="batch_acceptance_criteria" name="batch_acceptance_criteria" value="<?php echo $batch_acceptance_criteria;?>" autocomplete="off">
                   <?PHP if(form_error('batch_acceptance_criteria')){ echo '<span class="help-block">'.form_error('batch_acceptance_criteria').'</span>';} ?>
                  </div>
                </div>
              </div>
              <div class="row">              
              
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('batch_location')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_location');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_location');?>" id="batch_location" name="batch_location" value="<?php echo $batch_location ;?>" autocomplete="off">
                    <?PHP if(form_error('batch_location')){ echo '<span class="help-block">'.form_error('batch_location').'</span>';} ?>
                  </div>
                </div>

                
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('batch_pqr_no')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_pqr_no');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_pqr_no');?>" id="batch_pqr_no" name="batch_pqr_no" value="<?php echo $batch_pqr_no ;?>" autocomplete="off">
                   <?PHP if(form_error('batch_pqr_no')){ echo '<span class="help-block">'.form_error('batch_pqr_no').'</span>';} ?>
                  </div>
                </div> 


                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('batch_name')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_name');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_name');?>" id="batch_name" name="batch_name" value="<?php echo $batch_name ;?>" autocomplete="off">
                   <?PHP if(form_error('batch_name')){ echo '<span class="help-block">'.form_error('batch_name').'</span>';} ?>
                  </div>
                </div> 

             
              </div>               
              <div class="text-right">
                <input type="hidden" name="batch_id" value="<?php echo $batch_id;?>">
                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit"><?php echo lang('btn_save');?></button>
                <button type="reset" class="btn btn-inverse waves-effect waves-light m-r-10"><?php echo lang('btn_Reset');?></button>
                <a href="<?php echo base_url().$form_cancel_url;?>" class="btn btn-warning waves-effect waves-light m-r-10"><?php echo lang('btn_Cancel');?></a>
              </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.end form -->
<script type="text/javascript">  
  function myFunction(){
    //var batch_report_template = $('#batch_report_template').attr('data-name');
    var batch_report_template = $('#batch_report_template').find(':selected').attr('data-name');

    $('#batch_acceptance_criteria').val(batch_report_template);
    $('#batch_acceptance_criteria').attr('readonly', true);

  }
</script>