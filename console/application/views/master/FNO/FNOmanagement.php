<?php
// Last Updated by  Vinitha 06/08/2016 
$this->mcommon->getCheckUserPermissionHead('FNO add and edit',true);
if(isset($value) && !empty($value)){
  foreach($value->result() as $row){   
    $fno_id                          =  $row->fno_id;
    $fno_name                        =  $row->fno_name;
    $a_no                            =  $row->a_no;
    $sfa_no                          =  $row->sfa_no;
    $aws_classfication               =  $row->aws_classfication;
    $uns_no                          =  $row->uns_no;
  }
} else {
  $fno_id                            =  $this->input->post('fno_id');
  $fno_name                          =  $this->input->post('fno_name');
  $a_no                              =  $this->input->post('a_no');
  $sfa_no                            =  $this->input->post('sfa_no');
  $aws_classfication                 =  $this->input->post('aws_classfication');
  $uns_no                            =  $this->input->post('uns_no');
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
            <div class="col-sm-12 col-xs-12">
              <!-- P-No -->
              <div class="col-sm-3 col-xs-3">
                <div class="form-group <?PHP if(form_error('fno_name')){ echo 'has-error';} ?>">
                  <label for="exampleInputEmail1"><?php echo lang('mm_masters_fno_name');?><span class="text-danger">*</span></label>
                  <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_fno_name');?>" id="fno_name" name="fno_name" value="<?php echo $fno_name ;?>" autocomplete="off">
                  <?PHP if(form_error('fno_name')){ echo '<span class="help-block">'.form_error('fno_name').'</span>';} ?>
                </div>
              </div>
              <!-- A-no -->
              <div class="col-sm-3 col-xs-3">
                <div class="form-group <?PHP if(form_error('a_no')){ echo 'has-error';} ?>">
                  <label for="exampleInputEmail1"><?php echo lang('mm_masters_a_no_name');?><span class="text-danger">*</span></label>
                  <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_a_no_name');?>" id="a_no" name="a_no" value="<?php echo $a_no ;?>" autocomplete="off">
                  <?PHP if(form_error('a_no')){ echo '<span class="help-block">'.form_error('a_no').'</span>';} ?>
                </div>
              </div>
              <!-- SFA Specification -->
              <div class="col-sm-3 col-xs-3">
                <div class="form-group <?PHP if(form_error('sfa_no')){ echo 'has-error';} ?>">
                  <label for="exampleInputEmail1"><?php echo lang('mm_masters_fno_sfa');?><span class="text-danger">*</span></label>
                  <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_fno_sfa');?>" id="sfa_no" name="sfa_no" value="<?php echo $sfa_no ;?>" autocomplete="off">
                  <?PHP if(form_error('sfa_no')){ echo '<span class="help-block">'.form_error('sfa_no').'</span>';} ?>
                </div>
              </div>
               <!-- AWS Classfication-->
              <div class="col-sm-3 col-xs-3">
                <div class="form-group <?PHP if(form_error('aws_classfication')){ echo 'has-error';} ?>">
                  <label for="exampleInputEmail1"><?php echo lang('mm_masters_fno_aws_name');?><span class="text-danger">*</span></label>
                  <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_fno_aws_name');?>" id="aws_classfication" name="aws_classfication" value="<?php echo $aws_classfication ;?>" autocomplete="off">
                  <?PHP if(form_error('aws_classfication')){ echo '<span class="help-block">'.form_error('aws_classfication').'</span>';} ?>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-xs-12">
             
              <!-- UNS Number -->
              <div class="col-sm-3 col-xs-3">
                <div class="form-group">
                  <label for="exampleInputEmail1"><?php echo lang('mm_masters_fno_uns_no');?></label>
                  <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_fno_uns_no');?>" id="uns_no" name="uns_no" value="<?php echo $uns_no ;?>" autocomplete="off">
                  <?PHP if(form_error('uns_no')){ echo '<span class="help-block">'.form_error('uns_no').'</span>';} ?>
                </div>
              </div>
            </div>
          </div>              
          <div class="text-right">
            <input type="hidden" name="fno_id" value="<?php echo $fno_id;?>">
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
