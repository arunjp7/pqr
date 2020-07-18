<?php
// Last Updated by  Vinitha 06/08/2016 
if(isset($value) && !empty($value))
{
    foreach($value->result() as $row)
    {   
      $designation_id               =  $row->designation_id;
      $designation_name             =  $row->designation_name;
      $designation_abbr             =  $row->designation_abbr;       
    }
}
else
{
    $designation_name               =  $this->input->post('designation_name');
    $designation_abbr               =  $this->input->post('designation_abbr');
 
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
                  <div class="form-group <?PHP if(form_error('designation_name')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_designation_name');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_Hrm_designation_name');?>" id="designation_name" name="designation_name" value="<?php echo $designation_name ;?>" autocomplete="off">
                    <?PHP if(form_error('designation_name')){ echo '<span class="help-block">'.form_error('designation_name').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('designation_abbr')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_designation_abbr');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_Hrm_designation_abbr');?>" id="designation_abbr" name="designation_abbr" value="<?php echo $designation_abbr ;?>" autocomplete="off">
                   <?PHP if(form_error('designation_abbr')){ echo '<span class="help-block">'.form_error('designation_abbr').'</span>';} ?>
                  </div>
                </div>              
              </div>              
              <div class="text-right">
                <input type="hidden" name="designation_id" value="<?php echo $designation_id;?>">
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
