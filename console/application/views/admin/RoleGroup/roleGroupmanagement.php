<?php
// Last Updated by  Vinitha 06/08/2016 
$this->mcommon->getCheckUserPermissionHead('RoleGroup add and edit',true);
if(isset($value) && !empty($value))
{
  foreach($value->result() as $row) {   
    $id                   =  $row->id;
    $name             =  $row->name;
    $description                  =  $row->description;    
  }

  if(isset($role_group) && !empty($role_group)) {
    foreach($role_group->result() as $row) {   
      $module_id[$row->module_id]   =  $row->module_id;    
    }
  }

}
else
{
    $id               =  $this->input->post('id');
    $name                    =  $this->input->post('name');
    $description   =  $this->input->post('description');
    $module_id   =  $this->input->post('module_id');


}
$batch_ref_no= ($batchrefno != '') ? $batchrefno : $batch_ref_no;

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
                  <div class="form-group <?PHP if(form_error('name')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_rolegroup_name');?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_rolegroup_name');?>" id="name" name="name" value="<?php echo $name ;?>" autocomplete="off">
                   <?PHP if(form_error('name')){ echo '<span class="help-block">'.form_error('name').'</span>';} ?>
                  </div>
                </div> 


                <div class="col-sm-6 col-xs-6">
                  <div class="form-group <?PHP if(form_error('description')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('mm_masters_rolegroup_description');?><span class="text-danger">*</span></label>
                    <textarea class="form-control" placeholder="<?php echo lang('mm_masters_rolegroup_description');?>" id="description" name="description" rows="3"><?php echo $description;?></textarea><?PHP if(form_error('description')){ echo '<span class="help-block">'.form_error('description').'</span>';} ?>
                  </div>
                </div>

              </div>

              <div class="clearfix"></div>
              <hr />
              <div class="row">
                <h3 class="box-title">Page Details</h3>
              </div>

              <?php 
                if(isset($user_menu_module) && !empty($user_menu_module)){
                  foreach($user_menu_module as $row => $value){ 
                    ?>
                    <div class="row">
                      <div class="col-sm-12 col-xs-12">
                        <div class="collapse-group">
                          <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading<?php echo $row;?>">
                              <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" href="#collapse<?php echo $row;?>" aria-expanded="true" aria-controls="collapse<?php echo $row;?>" class="trigger collapsed">
                                  <?php echo $value['menu_area'];?>
                                </a>
                              </h4>
                            </div>
                            <?php
                              if(isset($value['sub']) && !empty($value['sub'])) {
                                ?>
                                <div id="collapse<?php echo $row;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $row;?>">
                                  <div class="panel-body">
                                    <?php
                                      foreach ($value['sub'] as $rowSub => $valueSub) {
                                        $txtID = ($valueSub['menu_parent'] == 0 ) ? $valueSub['menu_id'] : $valueSub['menu_parent'];

                                        ?>
                                        <table class="table table-striped">
                                          <thead>
                                            <tr>
                                              <th width="80%"><?php echo $valueSub['menu_name'];?></th>
                                              <th width="20%">
                                                <a href="javascript:void(0)" class="btn btn-success"  onclick="checkAll(<?php echo $txtID;?>)" title="Check All"><i class="glyphicon glyphicon-ok"></i></a>
                                                <a href="javascript:void(0)" onclick="unCheckAll(<?php echo $txtID;?>)" class="btn btn-danger" title="Un-Check All"><i class="glyphicon glyphicon-remove"></i></a>
                                              </th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td width="80%"><?php echo $valueSub['menu_name'];?> - Page View</td>
                                              <td width="20%">
                                                <input type="checkbox" name="module_id[<?php echo $valueSub['menu_id']; ?>]" value="<?php echo $valueSub['menu_id']; ?>" class="checkAll_<?php echo $menu_page_id?> js-switch <?php echo $txtID?>" data-color="#99d683" data-secondary-color="#f96262" <?php if($valueSub['menu_id']==$module_id[$valueSub['menu_id']]){?>checked<?php }?>/> 
                                              </td>
                                            </tr>
                                            <?php 
                                              if(isset($valueSub['subsub']) && !empty($valueSub['subsub'])) {
                                                foreach ($valueSub['subsub'] as $rowSubSub => $valueSubSub) {
                                                  ?>
                                                  <tr>
                                                    <td width="80%"><?php echo ucwords($valueSubSub['menu_name']);?></td>
                                                    <td width="20%">
                                                      <input type="checkbox" name="module_id[<?php echo $valueSubSub['menu_id']; ?>]"  value="<?php echo $valueSubSub['menu_id']; ?>" class="checkAll_<?php echo $valueSubSub['menu_id']?> js-switch <?php echo $txtID?>" data-color="#99d683" data-secondary-color="#f96262" <?php if($valueSubSub['menu_id']==$module_id[$valueSubSub['menu_id']]){?>checked<?php }?>/> 
                                                    </td>
                                                  </tr>
                                                  <?php 
                                                }
                                              }
                                            ?>
                                          </tbody>
                                        </table>
                                        <?php 
                                      }
                                    ?>
                                  </div>
                                </div>
                                <?php 
                              }                                  
                            ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php
                  }
                }
              ?>

              <div class="text-right">
                <input type="hidden" name="id" value="<?php echo $id;?>">
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


