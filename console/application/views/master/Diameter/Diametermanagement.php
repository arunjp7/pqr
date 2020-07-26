  <?php
// Last Updated by  Vinitha 06/08/2016 
$this->mcommon->getCheckUserPermissionHead('Diameter add and edit',true);
if(isset($value) && !empty($value)){
  foreach($value->result() as $row){   
    $diameter_id                            =  $row->diameter_id;
    $diameter_name                          =  $row->diameter_name;
  }
} else {
  $diameter_id                              =  $this->input->post('diameter_id');
  $diameter_name                            =  $this->input->post('diameter_name');
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
                    <div class="col-sm-3 col-xs-3">
                      <div class="form-group <?PHP if(form_error('diameter_name')){ echo 'has-error';} ?>">
                        <label for="exampleInputEmail1"><?php echo lang('mm_masters_diameter_name');?><span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_diameter_name');?>" id="diameter_name" name="diameter_name" value="<?php echo $diameter_name ;?>" autocomplete="off">
                        <?PHP if(form_error('diameter_name')){ echo '<span class="help-block">'.form_error('diameter_name').'</span>';} ?>
                      </div>
                    </div>
                  </div>              
                  <div class="text-right">
                    <input type="hidden" name="diameter_id" value="<?php echo $diameter_id;?>">
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
