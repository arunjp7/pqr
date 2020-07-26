<?php
// Last Updated by  Vinitha 06/08/2016 
$this->mcommon->getCheckUserPermissionHead('AdminRole add and edit',true);
if(isset($value) && !empty($value)) {
  foreach($value->result() as $row) {   
    $menu_id               =  $row->menu_id;
    $menu_name             =  $row->menu_name;
    $menu_area             =  $row->menu_area;    
    $menu_link             =  $row->menu_link;    
    $menu_path             =  $row->menu_path;    
    $menu_active_name      =  $row->menu_active_name;    
    $menu_position         =  $row->menu_position;    
    $top_menu_position     =  $row->top_menu_position;    
    $menu_parent           =  $row->menu_parent;    
    $menu_status           =  $row->menu_status;    
  }
}else{
  $menu_id                 =  $this->input->post('menu_id');
  $menu_name               =  $this->input->post('menu_name');
  $menu_area               =  $this->input->post('menu_area');
  $menu_link               =  $this->input->post('menu_link');
  $menu_path               =  $this->input->post('menu_path');
  $menu_active_name        =  $this->input->post('menu_active_name');
  $menu_position           =  $this->input->post('menu_position');
  $top_menu_position       =  $this->input->post('top_menu_position');
  $menu_parent             =  $this->input->post('menu_parent');
  $menu_status             =  $this->input->post('menu_status');
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
                  <div class="form-group <?PHP if(form_error('menu_area')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_adminmodule_menu_area');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_adminmodule_menu_area');?>" id="menu_area" name="menu_area" value="<?php echo $menu_area ;?>" autocomplete="off" <?php if($menu_id != ''){ echo "readonly";}?>>
                   <?PHP if(form_error('menu_area')){ echo '<span class="help-block">'.form_error('menu_area').'</span>';} ?>
                  </div>
                </div>               
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('menu_name')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_adminmodule_menu_name');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_adminmodule_menu_name');?>" id="menu_name" name="menu_name" value="<?php echo $menu_name ;?>" autocomplete="off">
                   <?PHP if(form_error('menu_name')){ echo '<span class="help-block">'.form_error('menu_name').'</span>';} ?>
                  </div>
                </div> 
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('menu_link')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_adminmodule_menu_link');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_adminmodule_menu_link');?>" id="menu_link" name="menu_link" value="<?php echo $menu_link ;?>" autocomplete="off">
                   <?PHP if(form_error('menu_link')){ echo '<span class="help-block">'.form_error('menu_link').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('menu_path')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_adminmodule_menu_path');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_adminmodule_menu_path');?>" id="menu_path" name="menu_path" value="<?php echo $menu_path ;?>" autocomplete="off">
                   <?PHP if(form_error('menu_path')){ echo '<span class="help-block">'.form_error('menu_path').'</span>';} ?>
                  </div>
                </div>
              </div>

              <div class="row">                
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('menu_active_name')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_adminmodule_menu_active_name');?></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_adminmodule_menu_active_name');?>" id="menu_active_name" name="menu_active_name" value="<?php echo $menu_active_name ;?>" autocomplete="off">
                   <?PHP if(form_error('menu_active_name')){ echo '<span class="help-block">'.form_error('menu_active_name').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('menu_position')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_adminmodule_menu_position');?><span class="text-danger">*</span></label>
                    <input type="number" class="form-control" placeholder="<?php echo lang('mm_masters_adminmodule_menu_position');?>" id="menu_position" name="menu_position" value="<?php echo $menu_position ;?>" autocomplete="off">
                   <?PHP if(form_error('menu_position')){ echo '<span class="help-block">'.form_error('menu_position').'</span>';} ?>
                  </div>
                </div>

                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('top_menu_position')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_adminmodule_menu_position_top');?><span class="text-danger">*</span></label>
                    <input type="number" class="form-control" placeholder="<?php echo lang('mm_masters_adminmodule_menu_position_top');?>" id="top_menu_position" name="top_menu_position" value="<?php echo $top_menu_position ;?>" autocomplete="off">
                   <?PHP if(form_error('top_menu_position')){ echo '<span class="help-block">'.form_error('top_menu_position').'</span>';} ?>
                  </div>
                </div>

                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('menu_parent')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_adminmodule_menu_parent');?><span class="text-danger">*</span></label>
                      <select name="menu_parent" class="form-control select2" data-live-search="true" data-width="100%" tabindex="-1" id="menu_parent">
                          <option value="" <?php if($menu_parent == ''){ echo 'selected="selected"';}?>><?php echo lang("label_Select");?></option>
                          <option value="0" <?php if($menu_parent == '0'){ echo 'selected="selected"';}?>>Main Menu</option>
                        <?php 
                          foreach ($drop_down_parent as $key => $value) {
                            ?>
                            <option value="<?php echo $key;?>" <?php if($menu_parent == $key){ echo 'selected="selected"';}?>><?php echo $value;?></option>
                            <?php
                          }
                        ?>
                      </select>
                      <?PHP if(form_error('menu_parent')){ echo '<span class="help-block">'.form_error('menu_parent').'</span>';} ?>           
                  </div>
                </div>
              </div>
              <div class="row">

                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('menu_status')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_adminmodule_menu_status');?><span class="text-danger">*</span></label>
                      <?php   
                      $attrib = 'class="form-control select2" name="menu_status"  data-live-search="true" data-width="100%"  id="menu_status"';
                      echo form_dropdown('menu_status', $drop_menu_status, set_value('menu_status', (isset($menu_status)) ? $menu_status : ''), $attrib);
                      ?> 
                      <?PHP if(form_error('menu_status')){ echo '<span class="help-block">'.form_error('menu_status').'</span>';} ?>           
                  </div>
                </div>
              </div>


              <div class="text-right">
                <input type="hidden" name="menu_id" value="<?php echo $menu_id;?>">
                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit"><?php echo lang('btn_save');?></button>
                <button type="reset" class="btn btn-inverse waves-effect waves-light m-r-10"><?php echo lang('btn_Reset');?></button>
                <a href="<?php echo base_url().$form_cancel_url;?>" class="btn btn-warning waves-effect waves-light m-r-10"><?php echo lang('btn_Cancel');?></a>
              </div>
            <?php echo form_close(); ?>
        </div>
      </div>
    </div>
</div>
  <!-- /.end form -->
<script type="text/javascript">  
  function myFunction(){
    //var batch_report_template = $('#batch_report_template').attr('data-name');
    var batch_report_template = $('#batch_report_template').find(':selected').attr('data-name');

    $('#batch_acceptance_criteria').val(batch_report_template);
    $('#batch_acceptance_criteria').attr('readonly', true);

  }
</script>
<style type="text/css">
  .panel-title .trigger:before {
    content: '\e082';
    font-family: 'Glyphicons Halflings';
    vertical-align: text-bottom;
  }

  .panel-title .trigger.collapsed:before {
    content: '\e081';
  }
</style>
<script type="text/javascript">
  $(".open-button").on("click", function() {
  $(this).closest('.collapse-group').find('.collapse').collapse('show');
});

$(".close-button").on("click", function() {
  $(this).closest('.collapse-group').find('.collapse').collapse('hide');
});


function checkAll(id){
    $("."+id).prop('checked', false).trigger("click");

}
function unCheckAll(id) {
    $("."+id).prop('checked', true).trigger("click");
}
$('.switchery').on('change', function() {
  var $this = $(this);
  var clickCheckbox = document.querySelector('.switchery');

  if(clickCheckbox.checked){
    var checkedClass = $this.attr("id");
    $("."+checkedClass).prop('checked', false).trigger("click");
  }else{
    var unCheckedClass = $this.attr("id");
    $("."+unCheckedClass).prop('checked', true).trigger("click");
  }
});





/*
 $("input:checkbox").click(function () {
              console.log('checkbox');

    //$('input:checkbox').not(this).prop('checked', this.checked);
 });
*/
/*
 $("input:checkbox").each(function(){
    var $this = $(this);

                console.log($this);


    if($this.is(":checked")){
        //someObj.fruitsGranted.push($this.attr("id"));
            console.log('checkbox');

        var checkedClass = $this.attr("id");
        $('.'+checkedClass).not(this).prop('checked', this.checked);
    }else{
        //someObj.fruitsDenied.push($this.attr("id"));
        var unCheckedClass = $this.attr("id");
        $('.'+unCheckedClass).not(this).prop('checked', this.checked);
    }
});
*/
function addDesignationDataModal()
{
  var selectedDesignationID = $("#staffs_designation option:selected").val();
  //console.log(selectedDesignationID);

  $.ajax({
    type: "GET",
    url: "<?php echo site_url('auth/getAddUpdateDesignationModal'); ?>", 
    data: { selectedDesignationID:selectedDesignationID},
    dataType:"html",
    success: function(html1)
    {
      //alert(html1);
      //$('#commonDetailsModal').removeAttr('style');

      $('#commonDetailsModal').html(html1);
      
    },
  });
}

function addDepartmentDataModal()
{

  var selectedGroupsID = $("#groups option:selected").val();
  var userID = $("#user_id").val();
  //console.log(selectedGroupsID);
  $.ajax({
    type: "GET",
    url: "<?php echo site_url('auth/getAddUpdateDepartmentModal'); ?>", 
    data: { selectedGroupsID:selectedGroupsID, userID:userID},
    dataType:"html",
    success: function(html1)
    {
      //alert(html1);
      //$('#commonDetailsModal').removeAttr('style');

      $('#commonDetailsModal').html(html1);
      
    },
  });
}
$("#show_hide_password a").on('click', function(event) {
  event.preventDefault();
  if($('#show_hide_password input').attr("type") == "text"){
    $('#show_hide_password input').attr('type', 'password');
    $('#show_hide_password #eyehidden').html('<i class="fa fa-eye" aria-hidden="true"></i>');
  }else if($('#show_hide_password input').attr("type") == "password"){
    $('#show_hide_password input').attr('type', 'text');
    $('#show_hide_password #eyehidden').html('<i class="fa fa-eye-slash" aria-hidden="true"></i>');
  }
});
</script>


