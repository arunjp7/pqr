<?php
// Last Updated by  Vinitha 06/08/2016 
$this->mcommon->getCheckUserPermissionHead('Thickness add and edit',true);
if(isset($value) && !empty($value)){
  foreach($value->result() as $row){   
    $thickness_id                            =  $row->thickness_id;
    $thickness_name                          =  $row->thickness_name;
  }
} else {
  $thickness_id                              =  $this->input->post('thickness_id');
  $thickness_name                            =  $this->input->post('thickness_name');
} 
?>
  <!-- /.start form -->
<div id="main-wrapper">
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-white">
            <div class="panel-heading clearfix">
                <h4 class="panel-title"></h4>
            </div>
            <div class="panel-body">
              <div class="row">
                <?php echo form_open_multipart($form_url); ?>
                <div class="row">
                 <!-- Company Details -->
                    <div class="col-sm-3 col-xs-3">
                      <div class="form-group <?PHP if(form_error('diameter_id')){ echo 'has-error';} ?>">
                        <label for="exampleInputEmail1"><?php echo lang('mm_masters_diameter');?><span class="text-danger">*</span></label>
                        <?php   
                          $attrib = 'class="form-control select2" name="diameter_id"  data-live-search="true" data-width="100%"  id="diameter_id"';
                          echo form_dropdown('diameter_id', $drop_menu_diameter, set_value('diameter_id', (isset($diameter_id)) ? $diameter_id : ''), $attrib);
                          ?> 
                        <?PHP if(form_error('diameter_id')){ echo '<span class="help-block">'.form_error('diameter_id').'</span>';} ?>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-3 col-xs-3">
                      <div class="form-group <?PHP if(form_error('thickness_name')){ echo 'has-error';} ?>">
                        <label for="exampleInputEmail1"><?php echo lang('mm_masters_thickness_name');?><span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_thickness_name');?>" id="thickness_name" name="thickness_name" value="<?php echo $thickness_name ;?>" autocomplete="off">
                        <?PHP if(form_error('thickness_name')){ echo '<span class="help-block">'.form_error('thickness_name').'</span>';} ?>
                      </div>
                    </div>
                  </div>              
                  <div class="text-right">
                    <input type="hidden" name="thickness_id" value="<?php echo $thickness_id;?>">
                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit"><?php echo lang('btn_save');?></button>
                    <button type="reset" class="btn btn-secondary waves-effect waves-light m-r-10"><?php echo lang('btn_Reset');?></button>
                    <a href="<?php echo base_url().$form_cancel_url;?>" class="btn btn-warning waves-effect waves-light m-r-10"><?php echo lang('btn_Cancel');?></a>
                  </div>
                <?php echo form_close(); ?>
     </div>
      </div>
    </div>

</div>


    
  <!-- /.end form -->
