<?php
// Last Updated by  Vinitha 06/08/2016 
if(isset($value) && !empty($value))
{
  foreach($value->result() as $row)
  {  
    $batchNDT_id                      =  $row->batchNDT_id;
    $batchNDT_ndt_type                =  $row->batchNDT_ndt_type;
    $batchNDT_technician_name         =  $row->batchNDT_technician_name;   
    $batchNDT_date                    =  $row->batchNDT_date;   
    $batchNDT_issued_date             =  $row->batchNDT_issued_date;
    $batchNDT_remarks                 =  $row->batchNDT_remarks;  
      
  }
}
else
{
  $ndt_welder_id                        =  $this->input->post('batchNDT__id');
  $ndt_type                             =  $this->input->post('batchNDT_ndt_type');
  $ndt_technician_name                  =  $this->input->post('batchNDT_technician_name');
  $ndt_date                             =  $this->input->post('batchNDT_date');
  $ndt_issued_date                      =  $this->input->post('batchNDT_issued_date');
  $ndt_remarks                          =  $this->input->post('batchNDT_remarks');



}
?>

<div class="modal-content">
  <div class="modal-header panel-heading clearfix">
    <h4 class="modal-title" id="myLargeModalLabel"><?php echo lang('mm_masters_batch_Modal_ndt_title');?></h4>
  </div>
  <form ng-app="form-example" method="post" id="ajaxModelForm" action="javascript:" ui-jp="parsley">
    <div class="modal-body">
      <span id="modalMessage"></span>
      <!-- /.start form -->
      <div class="row">
        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('batchNDT_ndt_type')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_ndt_type');?></label> 
              <?php   
              $attrib = 'class="form-control select2" name="batchNDT_ndt_type"  data-live-search="true" data-width="100%"  id="batchNDT_ndt_type"';
              echo form_dropdown('batchNDT_ndt_type', $drop_down_ndttype, set_value('batchNDT_ndt_type', (isset($batchNDT_ndt_type)) ? $batchNDT_ndt_type : ''), $attrib);
              ?> 
              <?PHP if(form_error('batchNDT_ndt_type')){ echo '<span class="help-block">'.form_error('batchNDT_ndt_type').'</span>';} ?>           
          </div>
        </div>

        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('batchNDT_technician_name')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_ndt_technician_name');?></label>
            <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_ndt_technician_name');?>" id="batchNDT_technician_name" name="batchNDT_technician_name" value="<?php echo $batchNDT_technician_name ;?>" autocomplete="off">
           <?PHP if(form_error('batchNDT_technician_name')){ echo '<span class="help-block">'.form_error('batchNDT_technician_name').'</span>';} ?>
          </div>
        </div>

        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('batchNDT_date')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_Weding_ndt_date');?></label>
            <div class="input-group">
              <input type="text" class="form-control datepicker-autoclose" name="batchNDT_date"  id="batchNDT_date"  placeholder="<?php echo lang('mm_masters_batch_Modal_Weding_ndt_date');?>" value="<?php echo ($batchNDT_date!='' && $batchNDT_date!='0000-00-00') ? date('d-m-Y',strtotime($batchNDT_date)) : '';?>"> 
              <span class="input-group-addon"><i class="icon-calender"></i></span> 
            </div>
            <?PHP if(form_error('batchNDT_date')){ echo '<span class="help-block">'.form_error('batchNDT_date').'</span>';} ?>
          </div>
        </div>
        
      </div>
      <div class="row">
        
        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('batchNDT_issued_date')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_ndt_issued_date');?></label>
            <div class="input-group">
              <input type="text" class="form-control datepicker-autoclose" name="batchNDT_issued_date"  id="batchNDT_issued_date"  placeholder="<?php echo lang('mm_masters_batch_Modal_ndt_issued_date');?>" value="<?php echo ($batchNDT_issued_date!='' && $batchNDT_issued_date!='0000-00-00') ? date('d-m-Y',strtotime($batchNDT_issued_date)) : '';?>"> 
              <span class="input-group-addon"><i class="icon-calender"></i></span> 
            </div>
            <?PHP if(form_error('batchNDT_issued_date')){ echo '<span class="help-block">'.form_error('batchNDT_issued_date').'</span>';} ?>
          </div>
        </div> 

        <div class="col-sm-8 col-xs-8">
          <div class="form-group <?PHP if(form_error('batchNDT_remarks')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_ndt_remarks');?></label>
            <textarea class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_ndt_remarks');?>" id="batchNDT_remarks" name="batchNDT_remarks" rows="3"><?php echo $batchNDT_remarks;?></textarea>
            <?PHP if(form_error('batchNDT_remarks')){ echo '<span class="help-block">'.form_error('batchNDT_remarks').'</span>';} ?>
          </div>
        </div>
      </div>

      <div class="text-center">
        <input type="hidden" name="batchID" value="<?php echo $batchID;?>" />
        <input type="hidden" name="batchNDT_id" value="<?php echo $batchNDT_id;?>">

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
          url: "<?php echo site_url('masters/Batch/getupdateBatchNDTModal'); ?>",
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
</script>