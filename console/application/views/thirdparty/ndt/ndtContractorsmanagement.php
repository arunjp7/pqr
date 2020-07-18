<?php
// Last Updated by  Vinitha 06/08/2016 
if(isset($value) && !empty($value))
{
    foreach($value->result() as $row)
    {   
      $ndtContractors_id               =  $row->ndtContractors_id;
      $ndtContractors_name             =  $row->ndtContractors_name;
      $ndtContractors_email            =  $row->ndtContractors_email;       
      $ndtContractors_phone            =  $row->ndtContractors_phone;   
      $ndtContractors_office_no        =  $row->ndtContractors_office_no;   
      $ndtContractors_fax              =  $row->ndtContractors_fax;   
      $ndtContractors_website          =  $row->ndtContractors_website;   
      $ndtContractors_abbreviations    =  $row->ndtContractors_abbreviations;   
      $ndtContractors_address          =  $row->ndtContractors_address;   
    }
}
else
{
    $ndtContractors_id                 =  $this->input->post('ndtContractors_id');
    $ndtContractors_name               =  $this->input->post('ndtContractors_name');
    $ndtContractors_email              =  $this->input->post('ndtContractors_email');
    $ndtContractors_phone              =  $this->input->post('ndtContractors_phone');
    $ndtContractors_office_no          =  $this->input->post('ndtContractors_office_no');
    $ndtContractors_fax                =  $this->input->post('ndtContractors_fax');
    $ndtContractors_website            =  $this->input->post('ndtContractors_website');
    $ndtContractors_abbreviations      =  $this->input->post('ndtContractors_abbreviations');
    $ndtContractors_address            =  $this->input->post('ndtContractors_address');
 
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
                  <div class="form-group <?PHP if(form_error('ndtContractors_name')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_thirdparty_ndtContractors_name');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_thirdparty_ndtContractors_name');?>" id="ndtContractors_name" name="ndtContractors_name" value="<?php echo $ndtContractors_name ;?>" autocomplete="off">
                   <?PHP if(form_error('ndtContractors_name')){ echo '<span class="help-block">'.form_error('ndtContractors_name').'</span>';} ?>
                  </div>
                </div> 
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('ndtContractors_email')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_thirdparty_ndtContractors_email');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_thirdparty_ndtContractors_email');?>" id="ndtContractors_email" name="ndtContractors_email" value="<?php echo $ndtContractors_email ;?>" autocomplete="off">
                    <?PHP if(form_error('ndtContractors_email')){ echo '<span class="help-block">'.form_error('ndtContractors_email').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('ndtContractors_phone')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_thirdparty_ndtContractors_phone');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_thirdparty_ndtContractors_phone');?>" id="ndtContractors_phone" name="ndtContractors_phone" value="<?php echo $ndtContractors_phone ;?>" autocomplete="off">
                    <?PHP if(form_error('ndtContractors_phone')){ echo '<span class="help-block">'.form_error('ndtContractors_phone').'</span>';} ?>
                  </div>
                </div>
                
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('ndtContractors_office_no')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_thirdparty_ndtContractors_office_no');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_thirdparty_ndtContractors_office_no');?>" id="ndtContractors_office_no" name="ndtContractors_office_no" value="<?php echo $ndtContractors_office_no ;?>" autocomplete="off">
                    <?PHP if(form_error('ndtContractors_office_no')){ echo '<span class="help-block">'.form_error('ndtContractors_office_no').'</span>';} ?>
                  </div>
                </div>
                
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('ndtContractors_fax')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_thirdparty_ndtContractors_fax');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_thirdparty_ndtContractors_fax');?>" id="ndtContractors_fax" name="ndtContractors_fax" value="<?php echo $ndtContractors_fax ;?>" autocomplete="off">
                    <?PHP if(form_error('ndtContractors_fax')){ echo '<span class="help-block">'.form_error('ndtContractors_fax').'</span>';} ?>
                  </div>
                </div>

                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('ndtContractors_website')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_thirdparty_ndtContractors_website');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_thirdparty_ndtContractors_website');?>" id="ndtContractors_website" name="ndtContractors_website" value="<?php echo $ndtContractors_website ;?>" autocomplete="off">
                    <?PHP if(form_error('ndtContractors_website')){ echo '<span class="help-block">'.form_error('ndtContractors_website').'</span>';} ?>
                  </div>
                </div>

                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('ndtContractors_abbreviations')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_thirdparty_ndtContractors_abbreviations');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_thirdparty_ndtContractors_abbreviations');?>" id="ndtContractors_abbreviations" name="ndtContractors_abbreviations" value="<?php echo $ndtContractors_abbreviations;?>" autocomplete="off">
                   <?PHP if(form_error('ndtContractors_abbreviations')){ echo '<span class="help-block">'.form_error('ndtContractors_abbreviations').'</span>';} ?>
                  </div>
                </div>              
                
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('ndtContractors_address')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_thirdparty_ndtContractors_address');?></label>
                    <textarea class="form-control" placeholder="<?php echo lang('mm_thirdparty_ndtContractors_address');?>" id="ndtContractors_address" name="ndtContractors_address" rows="3"><?php echo $ndtContractors_address;?></textarea>
                    <?PHP if(form_error('ndtContractors_address')){ echo '<span class="help-block">'.form_error('ndtContractors_address').'</span>';} ?>
                  </div>
                </div>   
                             
              </div>          
              <div class="text-right">
                <input type="hidden" name="ndtContractors_id" value="<?php echo $ndtContractors_id;?>">
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
