<?php
// Last Updated by  Vinitha 06/08/2016 
$this->mcommon->getCheckUserPermissionHead('JobNo add and edit',true);
if(isset($value) && !empty($value)){
  foreach($value->result() as $row){   
    $job_no_id                                  =  $row->job_no_id;
    $job_no                                     =  $row->job_no;
    $choose_project                             =  $row->choose_project;       
  }
} else {
  $job_no_id                                     =  $this->input->post('job_no_id');
  $job_no                                        =  $this->input->post('job_no');
  $choose_project                                =  $this->input->post('choose_project');
} 
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
                  <div class="form-group <?PHP if(form_error('job_no')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_job_no');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_job_no');?>" id="job_no" name="job_no" value="<?php echo $job_no ;?>" autocomplete="off">
                    <?PHP if(form_error('job_no')){ echo '<span class="help-block">'.form_error('job_no').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('choose_project')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_choose_project');?><span class="text-danger">*</span></label>
                    <select id="choose_project" name="choose_project" class="form-control select2 <?php if(form_error('choose_project')){ echo 'parsley-error';} ?>" data-live-search="true" data-width="100%">
                    <?php 
                      foreach ($drop_down_project as $key => $value)
                      {
                        ?>
                        <optgroup label="<?php echo $value['client_name'];?>">
                          <?php 
                          foreach ($value['sub'] as $key1 => $value1)
                          {
                            ?>
                            <option value="<?php echo $value1['project_id'];?>" <?php if($value1['project_id'] == $choose_project) { ?> selected <?php }?>><?php echo $value1['project_no'];?></option>
                            <?php 
                          }?>
                        </optgroup>
                        <?php
                      }
                      ?>
                    </select>

                    <?php   
                      //$attrib = 'class="form-control select2" name="choose_project"  data-live-search="true" data-width="100%"  id="choose_project"';
                      //echo form_dropdown('choose_project', $drop_down_project, set_value('choose_project', (isset($choose_project)) ? $choose_project : ''), $attrib);
                      ?>
                    <?PHP if(form_error('choose_project')){ echo '<span class="help-block">'.form_error('choose_project').'</span>';} ?>
                  </div>
                </div>               
              </div>             
              <div class="text-right">
                <input type="hidden" name="job_no_id" value="<?php echo $job_no_id;?>">
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
