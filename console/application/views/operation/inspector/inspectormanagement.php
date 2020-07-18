<?php
// Last Updated by  Vinitha 06/08/2016
$this->mcommon->getCheckUserPermissionHead('Inspector add and edit',true);
if(isset($value) && !empty($value))
{
    foreach($value->result() as $row)
    {   
      $inspector_id                                  =  $row->inspector_id;
      $inspector_client                              =  $row->inspector_client;
      $inspector_project                             =  $row->inspector_project;       
      $inspector_job                                 =  $row->inspector_job;       
      $inspector_name                                =  $row->inspector_name;       
    }
}
else
{
    $inspector_id                                    =  $this->input->post('inspector_id');
    $inspector_client                                =  $this->input->post('inspector_client');
    $inspector_project                               =  $this->input->post('inspector_project');
    $inspector_job                                   =  $this->input->post('inspector_job');
    $inspector_name                                  =  $this->input->post('inspector_name');
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
                  <div class="form-group <?PHP if(form_error('inspector_client')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_inspector_client');?><span class="text-danger">*</span></label>
                    <?php   
                      $attrib = 'class="form-control select2" name="inspector_client"  data-live-search="true" data-width="100%"  id="inspector_client" onchange="load_project_clientBased(this.value)"';
                      echo form_dropdown('inspector_client', $drop_down_client, set_value('inspector_client', (isset($inspector_client)) ? $inspector_client : ''), $attrib);
                      ?>
                    <?PHP if(form_error('inspector_client')){ echo '<span class="help-block">'.form_error('inspector_client').'</span>';} ?>
                  </div>
                </div> 

                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('inspector_project')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_inspector_project');?><span class="text-danger">*</span></label>
                    <?php   
                      $attrib = 'class="form-control select2" name="inspector_project"  data-live-search="true" data-width="100%"  id="inspector_project" onchange="load_job_projectBased(this.value)"';
                      echo form_dropdown('inspector_project', $drop_down_project, set_value('inspector_project', (isset($inspector_project)) ? $inspector_project : ''), $attrib);
                      ?>
                    <?PHP if(form_error('inspector_project')){ echo '<span class="help-block">'.form_error('inspector_project').'</span>';} ?>
                  </div>
                </div> 

                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('inspector_job')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_inspector_job');?><span class="text-danger">*</span></label>
                    <?php   
                      $attrib = 'class="form-control select2" name="inspector_job"  data-live-search="true" data-width="100%"  id="inspector_job"';
                      echo form_dropdown('inspector_job', $drop_down_job, set_value('inspector_job', (isset($inspector_job)) ? $inspector_job : ''), $attrib);
                      ?>
                    <?PHP if(form_error('inspector_job')){ echo '<span class="help-block">'.form_error('inspector_job').'</span>';} ?>
                  </div>
                </div> 

                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('inspector_name')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_inspector_name');?><span class="text-danger">*</span></label>
                    <?php   
                      $attrib = 'class="form-control select2" name="inspector_name"  data-live-search="true" data-width="100%"  id="inspector_name"';
                      echo form_dropdown('inspector_name', $drop_down_inspector, set_value('inspector_name', (isset($inspector_name)) ? $inspector_name : ''), $attrib);
                      ?>
                    <?PHP if(form_error('inspector_name')){ echo '<span class="help-block">'.form_error('inspector_name').'</span>';} ?>
                  </div>
                </div>               
              </div>             
              <div class="text-right">
                <input type="hidden" name="inspector_id" value="<?php echo $inspector_id;?>">
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
  function load_project_clientBased(clientid)
  {
    $.ajax({
      type: "post",
      url: "<?php echo site_url('operation/Inspector/getProjectDropdownClientBased'); ?>", 
      data: {clientid:clientid},
      dataType:"html",
      success: function(html1){
        $('#inspector_project').html(html1);
      }
    });
  }
  function load_job_projectBased(projectid)
  {
    $.ajax({
      type: "post",
      url: "<?php echo site_url('operation/Inspector/getJobDropdownProjectBased'); ?>", 
      data: {projectid:projectid},
      dataType:"html",
      success: function(html1){
        $('#inspector_job').html(html1);
      }
    });
  }
</script>