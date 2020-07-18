<?php
// Last Updated by  Vinitha 06/08/2016 
if(isset($value) && !empty($value))
{
  foreach($value->result() as $row)
  {  
    $batchVI_id                           =  $row->batchVI_id;
    $batchVI_certified_welding_inspector  =  $row->batchVI_certified_welding_inspector;
    $batchVI_weld_thickness               =  $row->batchVI_weld_thickness;   
    $batchVI_ndt_contractor               =  $row->batchVI_ndt_contractor;   
    $batchVI_remarks                      =  $row->batchVI_remarks;  
      
  }
}
else
{
  $batchVI_id                           =  $this->input->post('batchVI_id');
  $batchVI_certified_welding_inspector  =  $this->input->post('batchVI_certified_welding_inspector');
  $batchVI_weld_thickness               =  $this->input->post('batchVI_weld_thickness');
  $batchVI_ndt_contractor               =  $this->input->post('batchVI_ndt_contractor');
  $batchVI_remarks                      =  $this->input->post('batchVI_remarks');



}
?>

<div class="modal-content">
  <div class="modal-header panel-heading clearfix">
    <h4 class="modal-title" id="myLargeModalLabel"><?php echo lang('mm_masters_batch_Modal_vi_title');?></h4>
  </div>
  <form ng-app="form-example" method="post" id="ajaxModelForm" action="javascript:" ui-jp="parsley">
    <div class="modal-body">
      <span id="modalMessage"></span>
      <!-- /.start form -->
      <div class="row">
        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('batchVI_certified_welding_inspector')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_cer_Ins');?></label> 
              <?php   
              $attrib = 'class="form-control select2" name="batchVI_certified_welding_inspector"  data-live-search="true" data-width="100%"  id="batchVI_certified_welding_inspector"';
              echo form_dropdown('batchVI_certified_welding_inspector', $drop_down_certified_welding_inspector, set_value('batchVI_certified_welding_inspector', (isset($batchVI_certified_welding_inspector)) ? $batchVI_certified_welding_inspector : ''), $attrib);
              ?> 
              <?PHP if(form_error('batchVI_certified_welding_inspector')){ echo '<span class="help-block">'.form_error('batchVI_certified_welding_inspector').'</span>';} ?>           
          </div>
        </div>
        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('batchVI_weld_thickness')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_weld_thickness');?></label>
            <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_weld_thickness');?>" id="batchVI_weld_thickness" name="batchVI_weld_thickness" value="<?php echo $batchVI_weld_thickness ;?>" autocomplete="off">
           <?PHP if(form_error('batchVI_weld_thickness')){ echo '<span class="help-block">'.form_error('batchVI_weld_thickness').'</span>';} ?>
          </div>
        </div>
        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('batchVI_ndt_contractor')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_NDT_Contractor');?></label>
              <?php   
              $attrib = 'class="form-control select2" name="batchVI_ndt_contractor"  data-live-search="true" data-width="100%"  id="batchVI_ndt_contractor"';
              echo form_dropdown('batchVI_ndt_contractor', $drop_down_ndtcontractor, set_value('batchVI_ndt_contractor', (isset($batchVI_ndt_contractor)) ? $batchVI_ndt_contractor : ''), $attrib);
              ?> 
              <?PHP if(form_error('batchVI_ndt_contractor')){ echo '<span class="help-block">'.form_error('batchVI_ndt_contractor').'</span>';} ?>           
          </div>
        </div>

      </div>
      <div class="row">
        <div class="col-sm-12 col-xs-12">
          <div class="form-group <?PHP if(form_error('batchVI_remarks')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_Weld_remarks');?></label>
            <textarea class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_Weld_remarks');?>" id="batchVI_remarks" name="batchVI_remarks" rows="3"><?php echo $batchVI_remarks;?></textarea>
            <?PHP if(form_error('batchVI_remarks')){ echo '<span class="help-block">'.form_error('batchVI_remarks').'</span>';} ?>
          </div>
        </div>
      </div>

      <div class="text-center">
        <input type="hidden" name="batchID" value="<?php echo $batchID;?>" />
        <input type="hidden" name="batchVI_id" value="<?php echo $batchVI_id;?>">

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
          url: "<?php echo site_url('masters/Batch/getupdateBatchVIModal'); ?>",
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