<?php
// Last Updated by  Vinitha 06/08/2016 
/*if(isset($value) && !empty($value))
{
    foreach($value->result() as $row)
    {   
      $id               =  $row->id;
      $name             =  $row->name;
    }
}
else
{
    $id                 =  $this->input->post('id');
    $name               =  $this->input->post('name');
 
}*/

if(isset($value) && !empty($value))
{
  foreach($value->result() as $row) {   
    $id                 =  $row->id;
    $name               =  $row->name;
    $description        =  $row->description;    
  }

  if(isset($role_group) && !empty($role_group)) {
    foreach($role_group->result() as $row) {   
      $module_id[$row->module_id]   =  $row->module_id;    
    }
  }

}
else
{
    $id                 =  $this->input->post('id');
    $name               =  $this->input->post('name');
    $description        =  $this->input->post('description');
    $module_id          =  $this->input->post('module_id');


}
?>
<div class="modal-content">
  <div class="modal-header panel-heading clearfix">
    <h4 class="modal-title" id="myLargeModalLabel"><?php echo lang('mm_masters_staffs_add_department_Modal_title');?></h4>
  </div>

  <form ng-app="form-example" method="post" id="ajaxModelForm" enctype="multipart/form-data" action="javascript:" ui-jp="parsley">
    <div class="modal-body">
      <span id="modalMessage"></span>

        <div class="row">
          <div class="col-sm-6 col-xs-6">
            <div class="form-group <?PHP if(form_error('name')){ echo 'has-error';} ?>">
              <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_name');?><span class="text-danger">*</span></label>
              <input type="text" class="form-control" placeholder="<?php echo lang('mm_Hrm_name');?>" id="name" name="name" value="<?php echo $name ;?>" autocomplete="off" required >
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

      <div class="clear"></div>

      <div class="text-center">
        <input type="hidden" name="id" value="<?php echo $id;?>">
        <input type="hidden" name="selectedGroupsID" value="<?php echo $selectedGroupsID;?>">
        <input type="hidden" name="userID" value="<?php echo $userID;?>">
        <input type="hidden" name="submit" value="1">

        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit"><?php echo lang('btn_save');?></button>
        <button type="submit" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal"><?php echo lang('btn_close_window');?></button>



      </div>

    </div>
  <?php echo form_close(); ?>
</div>


      

                            
<script type="text/javascript">
jQuery(document).ready(function() 
      {
        //$('.modal .select2').select2('disable');

        // When the form is submitted
        $("#ajaxModelForm").submit(function()
        { 

            
          // 'this' refers to the current submitted form 
          var str = $(this).serialize();
          
          $.ajax({
          type: "POST",
          url: "<?php echo site_url('auth/getAddUpdateDepartmentModal'); ?>",
          data: {postdata: str},
          dataType:"html",
            success: function(html1)
            {
            try
              {
                var data = JSON.parse(html1);
                if(data.result == "Success" || data.result == "Update"  || data.result == "ExistRecord" )
                {
                  var htmlText = '<div class="alert alert-'+data.res_type+'" successmessage">'+data.res+'</div>';
                  $('#modalMessage').html(htmlText);
                  $('#groups').html(data.datatablevalueForm);
                  $('#name').val('');


                  //jQuery("#dataTableList2").jqGrid('setGridParam',{datatype:'json'}).trigger('reloadGrid');

                  //swal("Something Went Wrong");
                    //$('#BasicInformationNotification').removeClass('hide');
                    //$("[data-dismiss=modal]").trigger({ type: "click" });
                    //window.location.href = "<?php echo site_url(); ?>masters/Welder/";
                    //$('#BasicInformationNotification').html("<span class='text-semibold'>Type Updated Successfully..</span>");
                }
                else if(data.result == "Error")
                {

                  //swal("Something Went Wrong");

                  swal({
                    title: "Error",
                    text: "Something Went Wrong!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, Close it!",
                    closeOnConfirm: false
                  },
                  function(){
                    swal("Closeed!", "Your Details Check.", "success");

                     $('#BasicInformationNotification').removeClass('hide');
                    $("[data-dismiss=modal]").trigger({ type: "click" });

                    window.location.href = "<?php echo site_url(); ?>masters/Welder/";

                  });
                   
                    //$('#BasicInformationNotification').html("<span class='text-semibold'>Type Updated Successfully..</span>");
                }
              }
              catch(e)
              {
                //alert(e);
                $('#attributeVIDetailsModal').html(html1);
              }
            },
          });
          
        }); // end submit event        
    });

  function addNewAdditional()
  {
    row = $('#additionalrow').val();
    $.ajax({
      type: "GET",
      url: "<?php echo site_url('masters/Equipment/getAdditionalContent'); ?>", 
      data: { i:row},
      dataType:"html",
      success: function(html)
      {
        i = Number(row)+1;
        $('#partAdditionalData').append(html);
        $('#additionalrow').val(i);
    
        //$('#itemsmultiid_'+i).selectpicker("refresh");
      },
    });
  }




function getConfirmdeleteAdditional(inv, url)
    {
      if(arguments[0] != null)
      {
        swal({
            title: "Are you sure?",
            text: "<?php echo lang('common_message_delete_javascrit_alert_message')?>",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: "<?php echo lang('common_message_alert_sure')?>",
            cancelButtonText:  "<?php echo lang('common_message_alert_cancel')?>",
            closeOnConfirm: false,
            closeOnCancel: false
         },
         function(isConfirm)
         {
           if (isConfirm)
           {
             
             if (url== undefined || url== '' || url== null){
                $('#rowssid_'+inv).remove();
                $('#additionalrow').val( Number($('#additionalrow').val()) - Number(1));
              }else if(url!= undefined || url!= '' || url!= null)
              {
                $.ajax({
                  type: "GET",
                  url: url, 
                  //data: { master_documentsDeleteID:master_documentsDeleteID},
                  dataType:"html",
                  beforeSend: function() {
                    //$('#CompanyModal').modal('show');
                    $.blockUI({ message: '<h5><img src="<?php echo base_url(); ?>img/busy.gif" /> Just a moment...</h5>' }); 
                    /*
                    $('#attributeDetailsModal').block({ 
                              message: '<h5><img src="<?php echo base_url(); ?>img/busy.gif" /> Just a moment...</h5>',
                              
                            });*/
                  },  
                  success: function(html1) {
                    //alert('jjjjjj')
                    //$('#CompanyModal').modal('show');
                    //$('#attributeDetailsModal').html(html1);

                    var parsedJson = JSON.parse(html1);
                      if(parsedJson.result == 'Success' || parsedJson.result == "Update"  || parsedJson.result == "ExistRecord")
                      {
                        var htmlText = '<div class="alert alert-'+parsedJson.res_type+' successmessage">'+parsedJson.res+'</div>';
                        $('#modalMessage').html(htmlText);
                        $('#partAdditionalData').html(parsedJson.datatablevalueForm);
                        swal("<?php echo lang('common_message_delete')?>", "", "success");
                      } else if(data.result == "Error"){

                      //swal("Something Went Wrong");

                      swal({
                        title: "Error",
                        text: "Something Went Wrong!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, Close it!",
                        closeOnConfirm: false
                      },
                      function(){
                        swal("Closeed!", "Your Details Check.", "success");

                         $('#BasicInformationNotification').removeClass('hide');
                        $("[data-dismiss=modal]").trigger({ type: "click" });

                        window.location.href = "<?php echo site_url(); ?>masters/Welder/";

                      });
                       
                        //$('#BasicInformationNotification').html("<span class='text-semibold'>Type Updated Successfully..</span>");
                    }  

                  },
                  error: function(xhr) { // if error occured
                    //console.log(xhr);
                      alert("Error occured.please try again");
                      //$('#CompanyModal').modal('show');
                      //$('#attributeDetailsModal').html(xhr.statusText + xhr.responseText);
                      $.unblockUI();
                  },
                  complete: function() {
                    $.unblockUI();
                    //$('#CompanyModal').unblock();
                  },
                });
                 //location.href = l;
               }

            } else 
            {
              swal("<?php echo lang('common_message_cancel')?>", "", "error");
              e.preventDefault();
            }
         });
       
      }
      else
      {
        return false;
      }
      return;
    }





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
