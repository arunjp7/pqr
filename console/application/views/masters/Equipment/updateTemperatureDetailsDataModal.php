<?php
// Last Updated by  Vinitha 06/08/2016 
if(isset($value) && !empty($value))
{
  $trowAdditi = 0;
  foreach($value->result() as $row)
  {  
    $equipment_temperature_id[]            =  $row->equipment_temperature_id;
    $equipment_temperature_degress[]       =  $row->equipment_temperature_degress;
    $equipment_temperature_ambient[]       =  $row->equipment_temperature_ambient;
    $equipment_temperature_dergrees[]      =  $row->equipment_temperature_dergrees;


    $trowAdditi++;
  }

  foreach($valueRecorder->result() as $row)
  {  
    //echo "<pre>";
    //print_r($row);
    $equipmentRecorderID                =  $row->equipmentRecorderID;
    $equipment_recorder_serial_no       =  $row->equipment_recorder_serial_no;
    $equipment_recorder_certificate_no  =  $row->equipment_recorder_certificate_no;
    $equipment_recorder_date_of_issue   =  $row->equipment_recorder_date_of_issue;
    $equipment_recorder_expiry_date     =  $row->equipment_recorder_expiry_date;
    $equipment_recorder_range           =  $row->equipment_recorder_range;
    $equipment_recorder_zero            =  $row->equipment_recorder_zero;
  }

}
else
{

  $equipmentRecorderID                =  $this->input->post('equipmentRecorderID');
  $equipment_recorder_serial_no       =  $this->input->post('equipment_recorder_serial_no');
  $equipment_recorder_certificate_no  =  $this->input->post('equipment_recorder_certificate_no');
  $equipment_recorder_date_of_issue   =  $this->input->post('equipment_recorder_date_of_issue');
  $equipment_recorder_expiry_date     =  $this->input->post('equipment_recorder_expiry_date');
  $equipment_recorder_range           =  $this->input->post('equipment_recorder_range');
  $equipment_recorder_zero            =  $this->input->post('equipment_recorder_zero');


  $equipment_temperature_id           =  $this->input->post('equipment_temperature_id');
  $equipment_temperature_degress      =  $this->input->post('equipment_temperature_degress');
  $equipment_temperature_ambient      =  $this->input->post('equipment_temperature_ambient');
  $equipment_temperature_dergrees     =  $this->input->post('equipment_temperature_dergrees');


  


  $trowAdditi             =  sizeof($this->input->post('additionalrow'));


}
$ci =&get_instance();

if($trowAdditi  ==  0){   $trowAdditi   = 0;  }

?>

<div class="modal-content">
  <div class="modal-header panel-heading clearfix">
    <h4 class="modal-title" id="myLargeModalLabel"><?php echo lang('mm_masters_equipment_Modal_additional_Pressure_Recorder_title');?></h4>
  </div>
  <div class="modal-body">
    <span id="modalMessage"></span>
    <form ng-app="form-example" method="post" id="ajaxModelForm" enctype="multipart/form-data" action="javascript:" ui-jp="parsley">
      <div class="row">
        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('equipment_recorder_serial_no')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_equipment_Modal_additional_Pressure_Recorder_serial_no');?></label>
            <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_equipment_Modal_additional_Pressure_Recorder_serial_no');?>" id="equipment_recorder_serial_no" name="equipment_recorder_serial_no" value="<?php echo $equipment_recorder_serial_no ;?>" autocomplete="off">
           <?PHP if(form_error('equipment_recorder_serial_no')){ echo '<span class="help-block">'.form_error('equipment_recorder_serial_no').'</span>';} ?>
          </div>
        </div>
        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('equipment_recorder_certificate_no')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_equipment_Modal_additional_Pressure_Recorder_certificate_no');?></label>
            <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_equipment_Modal_additional_Pressure_Recorder_certificate_no');?>" id="equipment_recorder_certificate_no" name="equipment_recorder_certificate_no" value="<?php echo $equipment_recorder_certificate_no ;?>" autocomplete="off">
           <?PHP if(form_error('equipment_recorder_certificate_no')){ echo '<span class="help-block">'.form_error('equipment_recorder_certificate_no').'</span>';} ?>
          </div>
        </div>
        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('equipment_recorder_date_of_issue')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_equipment_Modal_additional_Pressure_Recorder_date_of_issue');?></label>
            <div class="input-group">
              <input type="text" class="form-control datepicker-autoclose" name="equipment_recorder_date_of_issue"  id="equipment_recorder_date_of_issue"  placeholder="<?php echo lang('mm_masters_equipment_Modal_additional_Pressure_Recorder_date_of_issue');?>" value="<?php echo ($equipment_recorder_date_of_issue!='' && $equipment_recorder_date_of_issue!='0000-00-00') ? date('d-m-Y',strtotime($equipment_recorder_date_of_issue)) : '';?>"> 
              <span class="input-group-addon"><i class="icon-calender"></i></span> 
            </div>
            <?PHP if(form_error('equipment_recorder_date_of_issue')){ echo '<span class="help-block">'.form_error('equipment_recorder_date_of_issue').'</span>';} ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('equipment_recorder_expiry_date')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_equipment_Modal_additional_Pressure_Recorder_expiry_date');?></label>
            <div class="input-group">
              <input type="text" class="form-control datepicker-autoclose1" name="equipment_recorder_expiry_date"  id="equipment_recorder_expiry_date"  placeholder="<?php echo lang('mm_masters_equipment_Modal_additional_Pressure_Recorder_expiry_date');?>" value="<?php echo ($equipment_recorder_expiry_date!='' && $equipment_recorder_expiry_date!='0000-00-00') ? date('d-m-Y',strtotime($equipment_recorder_expiry_date)) : '';?>"> 
              <span class="input-group-addon"><i class="icon-calender"></i></span> 
            </div>
            <?PHP if(form_error('equipment_recorder_expiry_date')){ echo '<span class="help-block">'.form_error('equipment_recorder_expiry_date').'</span>';} ?>
          </div>
        </div>
        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('equipment_recorder_range')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_equipment_Modal_additional_Pressure_Recorder_range');?></label>
            <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_equipment_Modal_additional_Pressure_Recorder_range');?>" id="equipment_recorder_range" name="equipment_recorder_range" value="<?php echo $equipment_recorder_range ;?>" autocomplete="off">
           <?PHP if(form_error('equipment_recorder_range')){ echo '<span class="help-block">'.form_error('equipment_recorder_range').'</span>';} ?>
          </div>
        </div>
        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('equipment_recorder_zero')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_equipment_Modal_additional_Pressure_Recorder_zero');?></label>
            <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_equipment_Modal_additional_Pressure_Recorder_zero');?>" id="equipment_recorder_zero" name="equipment_recorder_zero" value="<?php echo $equipment_recorder_zero ;?>" autocomplete="off">
           <?PHP if(form_error('equipment_recorder_zero')){ echo '<span class="help-block">'.form_error('equipment_recorder_zero').'</span>';} ?>
          </div>
        </div>
        
      </div>  

      <div class="clear"></div>
      <div class="row">
        <div class="text-center">
          <!--<input type="hidden" name="equipmentID" value="<?php echo $equipmentID;?>" />-->

          <input type="hidden" name="equipmentRecorderID" value="<?php echo $equipmentRecorderID;?>">
          <input type="hidden" name="equipmentCalibrationID" value="<?php echo $equipmentCalibrationID;?>">


          <input type="hidden" name="submit1" value="1">

          <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit"><?php echo lang('btn_save');?></button>
          <button type="submit" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal"><?php echo lang('btn_close_window');?></button>
        </div>
      </div>

    <?php echo form_close(); ?>

    <form ng-app="form-example" method="post" id="ajaxModelForm1" enctype="multipart/form-data" action="javascript:" ui-jp="parsley">
      <hr />

      <div class="row" >
        <div class="col-sm-4"><h4 class="modal-title"><?php echo lang('mm_masters_equipment_Modal_Temperature_Recorder_title');?></h4></div>
        <div class="col-sm-8">
          <a href="javascript:void(0)" class="btn btn-primary waves-effect waves-light m-r-5 m-l-5 pull-left"  onclick="addNewAdditional()"><?php echo lang('btn_addNew');?>
          </a>
          
        </div>
      </div>


      <hr />
      <div class="row">
        <div class="col-sm-1 col-xs-1">
          <div class="form-group m-b-0">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_equipment_Temperature_delate');?></label>
          </div>
        </div>
        <div class="col-sm-11 col-xs-11">
          <div class="row">
            <div class="col-sm-4 col-xs-4">
              <div class="form-group m-b-0">
                <label for="exampleInputEmail1"><?php echo lang('mm_masters_equipment_calibration_Modal_Temperature_degress');?></label>
              </div>
            </div>
            <div class="col-sm-4 col-xs-4">
              <div class="form-group m-b-0">
                <label for="exampleInputEmail1"><?php echo lang('mm_masters_equipment_calibration_Modal_Temperature_Ambient');?></label>
              </div>
            </div>
            <div class="col-sm-4 col-xs-4">
              <div class="form-group m-b-0">
                <label for="exampleInputEmail1"><?php echo lang('mm_masters_equipment_calibration_Modal_Temperature_Dergress');?></label>
              </div>
            </div> 
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
            <div class="col-sm-1 col-xs-1">
              <div class="form-group">
                <input type="hidden" value="<?php echo $equipment_temperature_id[$in];?>" name="equipment_temperature_id[]" />
                <a href="javascript:void(0);" onclick="getConfirmdeleteTemperature(<?php echo $in;?>,'<?php echo base_url().'masters/Equipment/getupdateEquipmentTemperatureDetailsModal/'.$equipment_temperature_id[$in];?>')" class="btn btn-danger"  title="<?php echo lang('helper_common_delete_label');?>"><i class="glyphicon glyphicon-trash"></i></a>
              </div>
            </div>

            <div class="col-sm-11 col-xs-11">
              <div class="row">
                <div class="col-sm-4 col-xs-4">
                  <div class="form-group <?PHP if(form_error('equipment_temperature_degress')){ echo 'has-error';} ?>">
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_equipment_calibration_Modal_Temperature_degress');?>" id="equipment_temperature_degress" name="equipment_temperature_degress[]" value="<?php echo $equipment_temperature_degress[$in] ;?>" autocomplete="off">
                    <?PHP if(form_error('equipment_temperature_degress')){ echo '<span class="help-block">'.form_error('equipment_temperature_degress').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-4 col-xs-4">
                  <div class="form-group <?PHP if(form_error('equipment_temperature_ambient')){ echo 'has-error';} ?>">
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_equipment_calibration_Modal_Temperature_Ambient');?>" id="equipment_temperature_ambient" name="equipment_temperature_ambient[]" value="<?php echo $equipment_temperature_ambient[$in] ;?>" autocomplete="off">
                    <?PHP if(form_error('equipment_temperature_ambient')){ echo '<span class="help-block">'.form_error('equipment_temperature_ambient').'</span>';} ?>
                  </div>
                </div>
                <div class="col-sm-4 col-xs-4">
                  <div class="form-group <?PHP if(form_error('equipment_temperature_dergrees')){ echo 'has-error';} ?>">
                    <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_equipment_calibration_Modal_Temperature_Dergress');?>" id="equipment_temperature_dergrees" name="equipment_temperature_dergrees[]" value="<?php echo $equipment_temperature_dergrees[$in] ;?>" autocomplete="off">
                    <?PHP if(form_error('equipment_temperature_dergrees')){ echo '<span class="help-block">'.form_error('equipment_temperature_dergrees').'</span>';} ?>
                  </div>
                </div>
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
    <?php echo form_close(); ?>
  </div>
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
          url: "<?php echo site_url('masters/Equipment/getupdateEquipmentTemperatureDetailsModal'); ?>",
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

        $("#ajaxModelForm1").submit(function()
        { 

            
          // 'this' refers to the current submitted form 
          var str = $(this).serialize();
          
          $.ajax({
          type: "POST",
          url: "<?php echo site_url('masters/Equipment/getupdateEquipmentTemperatureDetailsModal'); ?>",
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
      url: "<?php echo site_url('masters/Equipment/getTemperatureContent'); ?>", 
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




function getConfirmdeleteTemperature(inv, url)
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