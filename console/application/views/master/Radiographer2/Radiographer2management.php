<?php
// Last Updated by  Vinitha 06/08/2016 
$this->mcommon->getCheckUserPermissionHead('Radiographer second add and edit',true);
if(isset($value) && !empty($value)){
  foreach($value->result() as $row){   
    $radiographer_second_id                      =  $row->radiographer_second_id;
    $radiographer_second_name                    =  $row->radiographer_second_name;
  }
} else {
  $radiographer_second_id                        =  $this->input->post('radiographer_second_id');
  $radiographer_second_name                      =  $this->input->post('radiographer_second_name');
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
                  <div class="form-group <?PHP if(form_error('radiographer_second_name')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_master_Radiographer2');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_master_Radiographer2');?>" id="radiographer_second_name" name="radiographer_second_name" value="<?php echo $radiographer_second_name ;?>" autocomplete="off">
                    <?PHP if(form_error('radiographer_second_name')){ echo '<span class="help-block">'.form_error('radiographer_second_name').'</span>';} ?>
                  </div>
                </div>
              </div>              
              <div class="text-right">
                <input type="hidden" name="radiographer_second_id" value="<?php echo $radiographer_second_id;?>">
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
