<?php
// Last Updated by  Vinitha 06/08/2016 
if(isset($value) && !empty($value))
{
  $trowAdditi = 0;
  foreach($value->result() as $row)
  {  
    $equipment_additional_id[]             =  $row->equipment_additional_id;
    $equipment_additional_nominial_value[] =  $row->equipment_additional_nominial_value;
    $equipment_additional_measured_value[] =  $row->equipment_additional_measured_value;

    $trowAdditi++;
  }

}
else
{

  $equipment_additional_id               =  $this->input->post('equipment_additional_id');
  $equipment_additional_nominial_value   =  $this->input->post('equipment_additional_nominial_value');
  $equipment_additional_measured_value   =  $this->input->post('equipment_additional_measured_value');

  
  $trowAdditi             =  sizeof($this->input->post('additionalrow'));


}
$ci =&get_instance();

if($trowAdditi  ==  0){   $trowAdditi   = 0;  }

?>

<div class="modal-content">
  <div class="modal-header panel-heading clearfix">
    <h4 class="modal-title" id="myLargeModalLabel"><?php echo lang('mm_masters_equipment_Modal_additional_title');?></h4>
  </div>

  <form ng-app="form-example" method="post" id="ajaxModelForm" enctype="multipart/form-data" action="javascript:" ui-jp="parsley">
    <div class="modal-body">
      <span id="modalMessage"></span>

      <div class="row" >
        <div class="col-sm-12">
          <a href="javascript:void(0)" class="btn btn-success waves-effect waves-light m-r-5 m-l-5 pull-left"  onclick="addNewAdditional()"><?php echo lang('btn_addNew');?>
          </a>
          
          <a href="javascript:void(0)" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal"><?php echo lang('btn_close_window');?></a>
        </div>
      </div>


      <hr />
      <div class="row">
        <div class="col-sm-2 col-xs-2">
          <div class="form-group m-b-0">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_equipment_additional_delate');?></label>
          </div>
        </div>
        <div class="col-sm-5 col-xs-5">
          <div class="form-group m-b-0">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_equipment_calibration_Modal_additional_nominial_value');?></label>
          </div>
        </div>
        <div class="col-sm-5 col-xs-5">
          <div class="form-group m-b-0">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_equipment_additional_measured_value');?></label>
          </div>
        </div>
      </div>
      <hr />

      <span id="partAdditionalData">
      <?php 
        $i=0;
        for($in=0; $in < $trowAdditi; $in++)
        {
          ?>
          <div class="row" id="rowssid_<?php echo $in;?>">
            <div class="col-sm-2 col-xs-2">
              <div class="form-group">
                <input type="hidden" value="<?php echo $equipment_additional_id[$in];?>" name="equipment_additional_id[]" />
                <a href="javascript:void(0);" onclick="getConfirmdeleteAdditional(<?php echo $in;?>,'<?php echo base_url().'masters/Equipment/getupdateEquipmentAdditionalDetailsModal/'.$equipment_additional_id[$in];?>')" class="btn btn-danger"  title="<?php echo lang('helper_common_delete_label');?>"><i class="glyphicon glyphicon-trash"></i></a>
              </div>
            </div>

            <div class="col-sm-5 col-xs-5">
              <div class="form-group <?PHP if(form_error('equipment_additional_nominial_value')){ echo 'has-error';} ?>">
                <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_equipment_calibration_Modal_additional_nominial_value');?>" id="equipment_additional_nominial_value" name="equipment_additional_nominial_value[]" value="<?php echo $equipment_additional_nominial_value[$in] ;?>" autocomplete="off">
                <?PHP if(form_error('equipment_additional_nominial_value')){ echo '<span class="help-block">'.form_error('equipment_additional_nominial_value').'</span>';} ?>
              </div>
            </div>

            <div class="col-sm-5 col-xs-5">
              <div class="form-group <?PHP if(form_error('equipment_additional_measured_value')){ echo 'has-error';} ?>">
                <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_equipment_additional_measured_value');?>" id="equipment_additional_measured_value" name="equipment_additional_measured_value[]" value="<?php echo $equipment_additional_measured_value[$in] ;?>" autocomplete="off">
                <?PHP if(form_error('equipment_additional_measured_value')){ echo '<span class="help-block">'.form_error('equipment_additional_measured_value').'</span>';} ?>
              </div>
            </div>
          </div>
          <?php 
        $i++;
        } 
      ?>      
      </span>
      <div class="clear"></div>

      <div class="text-center">
        <!--<input type="hidden" name="equipmentID" value="<?php echo $equipmentID;?>" />-->
        <input type="hidden" name="additionalrow" id="additionalrow" value="<?PHP echo $i?>" />

        <input type="hidden" name="equipmentCalibrationID" value="<?php echo $equipmentCalibrationID;?>">

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
          url: "<?php echo site_url('masters/Equipment/getupdateEquipmentAdditionalDetailsModal'); ?>",
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
                  $('#partAdditionalData').html(data.datatablevalueForm);

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


 
</script>