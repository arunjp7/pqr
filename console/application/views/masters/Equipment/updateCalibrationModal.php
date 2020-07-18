<?php
// Last Updated by  Vinitha 06/08/2016 
if(isset($value) && !empty($value))
{
  foreach($value->result() as $row)
  {  
    $equipment_calibration_id              =  $row->equipment_calibration_id;
    $equipment_calibration_report_number   =  $row->equipment_calibration_report_number;
    $equipment_calibration_date            =  $row->equipment_calibration_date;       
    $equipment_calibration_by              =  $row->equipment_calibration_by;   
    $equipment_calibration_due_date        =  $row->equipment_calibration_due_date;   
      
  }
}
else
{
  $equipment_calibration_id                 =  $this->input->post('equipment_calibration_id');
  $equipment_calibration_report_number      =  $this->input->post('equipment_calibration_report_number');
  $equipment_calibration_date               =  $this->input->post('equipment_calibration_date');
  $equipment_calibration_by                 =  $this->input->post('equipment_calibration_by');
  $equipment_calibration_due_date           =  $this->input->post('equipment_calibration_due_date');



}
?>

<div class="modal-content">
  <div class="modal-header panel-heading clearfix">
    <h4 class="modal-title" id="myLargeModalLabel"><?php echo lang('mm_masters_equipment_calibration_Modal_title');?></h4>
  </div>
  <form ng-app="form-example" method="post" id="ajaxModelForm" action="javascript:" ui-jp="parsley">
    <div class="modal-body">
      <span id="modalMessage"></span>
      <!-- /.start form -->
      <div class="row">
        

        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('equipment_calibration_report_number')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_mastersequipment_calibration_Modal_report_number');?></label>
            <input type="text" class="form-control" placeholder="<?php echo lang('mm_mastersequipment_calibration_Modal_report_number');?>" id="equipment_calibration_report_number" name="equipment_calibration_report_number" value="<?php echo $equipment_calibration_report_number ;?>" autocomplete="off">
           <?PHP if(form_error('equipment_calibration_report_number')){ echo '<span class="help-block">'.form_error('equipment_calibration_report_number').'</span>';} ?>
          </div>
        </div>


        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('equipment_calibration_date')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_equipment_calibration_Modal_calibration_date');?></label>
            <div class="input-group">
              <input type="text" class="form-control datepicker-autoclose" name="equipment_calibration_date"  id="equipment_calibration_date"  placeholder="<?php echo lang('mm_masters_equipment_calibration_Modal_calibration_date');?>" value="<?php echo ($equipment_calibration_date!='' && $equipment_calibration_date!='0000-00-00') ? date('d-m-Y',strtotime($equipment_calibration_date)) : '';?>"> 
              <span class="input-group-addon"><i class="icon-calender"></i></span> 
            </div>
            <?PHP if(form_error('equipment_calibration_date')){ echo '<span class="help-block">'.form_error('equipment_calibration_date').'</span>';} ?>
          </div>
        </div> 

        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('equipment_calibration_by')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_equipment_calibration_Modal_calibration_by');?></label>
            <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_equipment_calibration_Modal_calibration_by');?>" id="equipment_calibration_by" name="equipment_calibration_by" value="<?php echo $equipment_calibration_by ;?>" autocomplete="off">
           <?PHP if(form_error('equipment_calibration_by')){ echo '<span class="help-block">'.form_error('equipment_calibration_by').'</span>';} ?>
          </div>
        </div>


      </div>
      <div class="row">

        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('equipment_calibration_due_date')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_equipment_calibration_Modal_calibration_due_date');?></label>
            <div class="input-group">
              <input type="text" class="form-control datepicker-autoclose" name="equipment_calibration_due_date"  id="equipment_calibration_due_date"  placeholder="<?php echo lang('mm_masters_equipment_calibration_Modal_calibration_due_date');?>" value="<?php echo ($equipment_calibration_due_date!='' && $equipment_calibration_due_date!='0000-00-00') ? date('d-m-Y',strtotime($equipment_calibration_due_date)) : '';?>"> 
              <span class="input-group-addon"><i class="icon-calender"></i></span> 
            </div>
            <?PHP if(form_error('equipment_calibration_due_date')){ echo '<span class="help-block">'.form_error('equipment_calibration_due_date').'</span>';} ?>
          </div>
        </div> 
      </div>

      <div class="text-center">
        <input type="hidden" name="equipmentID" value="<?php echo $equipmentID;?>" />
        <input type="hidden" name="equipment_calibration_id" value="<?php echo $equipment_calibration_id;?>">

        <input type="hidden" name="submit" value="1">

        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit"><?php echo lang('btn_save');?></button>
        <button type="submit" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal"><?php echo lang('btn_close_window');?></button>
      </div>
      <!-- /.end form -->
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
          url: "<?php echo site_url('masters/Equipment/getupdateCalibrationDetailsModal'); ?>",
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
                  jQuery("#dataTableList2").jqGrid('setGridParam',{datatype:'json'}).trigger('reloadGrid');

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


        $("#equipment_calibration_date").datepicker({
                todayHighlight: true,
                dateFormat: "dd-mm-yyyy",
                minDate: 0,
                autoclose:true,
                onSelect: function (date) {
                    var date2 = $('#equipment_calibration_date').datepicker('getDate');
                    date2.setDate(date2.getDate() + 1);
                    $('#equipment_calibration_due_date').datepicker('setDate', date2);
                    //sets minDate to dt1 date + 1
                    $('#equipment_calibration_due_date').datepicker('option', 'minDate', date2);
                }
              });


              
              $('#equipment_calibration_due_date').datepicker({
                  dateFormat: "dd-mm-yyyy",
                  autoclose:true,
                  onClose: function () {
                      var dt1 = $('#equipment_calibration_date').datepicker('getDate');
                      var dt2 = $('#equipment_calibration_due_date').datepicker('getDate');
                      //check to prevent a user from entering a date below date of dt1
                      if (dt2 <= dt1) {
                          var minDate = $('#equipment_calibration_due_date').datepicker('option', 'minDate');
                          $('#equipment_calibration_due_date').datepicker('setDate', minDate);
                      }
                  }
              });
                    
    });
</script>