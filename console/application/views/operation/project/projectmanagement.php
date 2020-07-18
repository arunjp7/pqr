<?php
// Last Updated by  Vinitha 06/08/2016 
$this->mcommon->getCheckUserPermissionHead('Project add and edit',true);
if(isset($value) && !empty($value))
{
    foreach($value->result() as $row)
    {   
      $project_id                                     =  $row->project_id;
      $project_no                                     =  $row->project_no;
      $project_name                                   =  $row->project_name;       
      $project_client_name                            =  $row->project_client_name;      
      $project_request_number                         =  $row->project_request_number;   
      $project_representative_name                    =  $row->project_representative_name;   
      $project_representative_contact_no              =  $row->project_representative_contact_no;   
      $project_representative_alternate_contact_no    =  $row->project_representative_alternate_contact_no;   
      $project_representative_email                   =  $row->project_representative_email;   
    }
}
else
{
    $project_id                                        =  $this->input->post('project_id');
    $project_no                                        =  $this->input->post('project_no');
    $project_name                                      =  $this->input->post('project_name');
    $project_client_name                               =  $this->input->post('project_client_name');
    $project_request_number                            =  $this->input->post('project_request_number');
    $project_representative_name                       =  $this->input->post('project_representative_name');
    $project_representative_contact_no                 =  $this->input->post('project_representative_contact_no');
    $project_representative_alternate_contact_no       =  $this->input->post('project_representative_alternate_contact_no');
    $project_representative_email                      =  $this->input->post('project_representative_email');
 
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
                  <div class="form-group <?PHP if(form_error('project_no')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_project_no');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_project_no');?>" id="project_no" name="project_no" value="<?php echo $project_no ;?>" autocomplete="off">
                    <?PHP if(form_error('project_no')){ echo '<span class="help-block">'.form_error('project_no').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('project_name')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_project_name');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_project_name');?>" id="project_name" name="project_name" value="<?php echo $project_name ;?>" autocomplete="off">
                   <?PHP if(form_error('project_name')){ echo '<span class="help-block">'.form_error('project_name').'</span>';} ?>
                  </div>
                </div> 

                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('project_client_name')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_project_client_name');?><span class="text-danger">*</span></label>
                    <?php   
                      $attrib = 'class="form-control select2" name="project_client_name"  data-live-search="true" data-width="100%"  id="project_client_name"';
                      echo form_dropdown('project_client_name', $drop_down_client, set_value('project_client_name', (isset($project_client_name)) ? $project_client_name : ''), $attrib);
                      ?>
                    <?PHP if(form_error('project_client_name')){ echo '<span class="help-block">'.form_error('project_client_name').'</span>';} ?>
                  </div>
                </div>   
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('project_request_number')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_project_request_number');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_project_request_number');?>" id="project_request_number" name="project_request_number" value="<?php echo $project_request_number;?>" autocomplete="off">
                   <?PHP if(form_error('project_request_number')){ echo '<span class="help-block">'.form_error('project_request_number').'</span>';} ?>
                  </div>
                </div>              
              </div>
              <div class="row">
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('project_representative_name')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_project_representative_name');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_project_representative_name');?>" id="project_representative_name" name="project_representative_name" value="<?php echo $project_representative_name ;?>" autocomplete="off">
                    <?PHP if(form_error('project_representative_name')){ echo '<span class="help-block">'.form_error('project_representative_name').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('project_representative_contact_no')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_project_representative_contact_no');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_project_representative_contact_no');?>" id="project_representative_contact_no" name="project_representative_contact_no" value="<?php echo $project_representative_contact_no ;?>" autocomplete="off">
                   <?PHP if(form_error('project_representative_contact_no')){ echo '<span class="help-block">'.form_error('project_representative_contact_no').'</span>';} ?>
                  </div>
                </div> 

                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('project_representative_alternate_contact_no')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_project_representative_alternate_contact_no');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_project_representative_alternate_contact_no');?>" id="project_representative_alternate_contact_no" name="project_representative_alternate_contact_no" value="<?php echo $project_representative_alternate_contact_no;?>" autocomplete="off">
                    <?PHP if(form_error('project_representative_alternate_contact_no')){ echo '<span class="help-block">'.form_error('project_representative_alternate_contact_no').'</span>';} ?>
                  </div>
                </div>   
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('project_representative_email')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_project_representative_email');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_project_representative_email');?>" id="project_representative_email" name="project_representative_email" value="<?php echo $project_representative_email;?>" autocomplete="off">
                   <?PHP if(form_error('project_representative_email')){ echo '<span class="help-block">'.form_error('project_representative_email').'</span>';} ?>
                  </div>
                </div>              
              </div>              
              <div class="text-right">
                <input type="hidden" name="project_id" value="<?php echo $project_id;?>">
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
