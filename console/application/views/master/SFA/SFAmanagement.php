<?php
// Last Updated by  Vinitha 06/08/2016 
$this->mcommon->getCheckUserPermissionHead('SFA add and edit',true);
if(isset($value) && !empty($value)){
  foreach($value->result() as $row){   
    $sfa_id                            =  $row->sfa_id;
    $sfa_name                          =  $row->sfa_name;
  }
} else {
  $sfa_id                              =  $this->input->post('sfa_id');
  $sfa_name                            =  $this->input->post('sfa_name');
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
              <div class="form-group <?PHP if(form_error('sfa_name')){ echo 'has-error';} ?>">
                <label for="exampleInputEmail1"><?php echo lang('mm_masters_sfa_name');?><span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_sfa_name');?>" id="sfa_name" name="sfa_name" value="<?php echo $sfa_name ;?>" autocomplete="off">
                <?PHP if(form_error('sfa_name')){ echo '<span class="help-block">'.form_error('sfa_name').'</span>';} ?>
              </div>
            </div>
          </div>              
          <div class="text-right">
            <input type="hidden" name="sfa_id" value="<?php echo $sfa_id;?>">
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
