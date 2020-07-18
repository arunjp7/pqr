<?php
// Last Updated by  Vinitha 06/08/2016 
if(isset($value) && !empty($value))
{
  foreach($value->result() as $row)
  {  
    $vi_welder_id                     =  $row->vi_welder_id;
    $vi_certified_welding_inspector   =  $row->vi_certified_welding_inspector;
    $vi_weld_no                       =  $row->vi_weld_no;       
    $vi_weld_thickness                =  $row->vi_weld_thickness;   
    $vi_ndt_contractor                =  $row->vi_ndt_contractor;   
    $vi_test_date                     =  $row->vi_test_date;
    $vi_test_result                   =  $row->vi_test_result;       
    $vi_remarks                       =  $row->vi_remarks;  
      
  }
}
else
{
  $vi_welder_id                       =  $this->input->post('vi_welder_id');
  $vi_certified_welding_inspector     =  $this->input->post('vi_certified_welding_inspector');
  $vi_weld_no                         =  $this->input->post('vi_weld_no');
  $vi_weld_thickness                  =  $this->input->post('vi_weld_thickness');
  $vi_ndt_contractor                  =  $this->input->post('vi_ndt_contractor');
  $vi_test_date                       =  $this->input->post('vi_test_date');
  $vi_test_result                     =  $this->input->post('vi_test_result');
  $vi_remarks                         =  $this->input->post('vi_remarks');



}
?>

<div class="modal-content">
  <div class="modal-header panel-heading clearfix">
    <h4 class="modal-title" id="myLargeModalLabel"><?php echo lang('mm_masters_welder_Modal_vi_title');?></h4>
  </div>
  <form ng-app="form-example" method="post" id="ajaxModelForm" action="javascript:" ui-jp="parsley">
    <div class="modal-body">
      <span id="modalMessage"></span>
      <!-- /.start form -->
      <div class="row">
        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('vi_certified_welding_inspector')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_welder_Modal_cer_Ins');?></label> 
              <?php   
              $attrib = 'class="form-control select2" name="vi_certified_welding_inspector"  data-live-search="true" data-width="100%"  id="vi_certified_welding_inspector"';
              echo form_dropdown('vi_certified_welding_inspector', $drop_down_certified_welding_inspector, set_value('vi_certified_welding_inspector', (isset($vi_certified_welding_inspector)) ? $vi_certified_welding_inspector : ''), $attrib);
              ?> 
              <?PHP if(form_error('vi_certified_welding_inspector')){ echo '<span class="help-block">'.form_error('vi_certified_welding_inspector').'</span>';} ?>           
          </div>
        </div>

        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('vi_weld_no')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_welder_Modal_weld_no');?></label>
            <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_welder_Modal_weld_no');?>" id="vi_weld_no" name="vi_weld_no" value="<?php echo $vi_weld_no ;?>" autocomplete="off">
           <?PHP if(form_error('vi_weld_no')){ echo '<span class="help-block">'.form_error('vi_weld_no').'</span>';} ?>
          </div>
        </div>

        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('vi_weld_thickness')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_welder_Modal_weld_thickness');?></label>
            <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_welder_Modal_weld_thickness');?>" id="vi_weld_thickness" name="vi_weld_thickness" value="<?php echo $vi_weld_thickness ;?>" autocomplete="off">
           <?PHP if(form_error('vi_weld_thickness')){ echo '<span class="help-block">'.form_error('vi_weld_thickness').'</span>';} ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('vi_ndt_contractor')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_welder_Modal_NDT_Contractor');?></label>
              <?php   
              $attrib = 'class="form-control select2" name="vi_ndt_contractor"  data-live-search="true" data-width="100%"  id="vi_ndt_contractor"';
              echo form_dropdown('vi_ndt_contractor', $drop_down_ndtcontractor, set_value('vi_ndt_contractor', (isset($vi_ndt_contractor)) ? $vi_ndt_contractor : ''), $attrib);
              ?> 
              <?PHP if(form_error('vi_ndt_contractor')){ echo '<span class="help-block">'.form_error('vi_ndt_contractor').'</span>';} ?>           
          </div>
        </div>

        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('vi_test_date')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_welder_Modal_Weding_TestDate');?></label>
            <div class="input-group">
              <input type="text" class="form-control datepicker-autoclose" name="vi_test_date"  id="vi_test_date"  placeholder="<?php echo lang('mm_masters_welder_Modal_Weding_TestDate');?>" value="<?php echo ($vi_test_date!='' && $vi_test_date!='0000-00-00') ? date('d-m-Y',strtotime($vi_test_date)) : '';?>"> 
              <span class="input-group-addon"><i class="icon-calender"></i></span> 
            </div>
            <?PHP if(form_error('vi_test_date')){ echo '<span class="help-block">'.form_error('vi_test_date').'</span>';} ?>
          </div>
        </div> 

        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('vi_test_result')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_welder_Modal_VItest_result');?></label>
              <?php   
              $attrib = 'class="form-control select2" name="vi_test_result"  data-live-search="true" data-width="100%"  id="vi_test_result"';
              echo form_dropdown('vi_test_result', $drop_down_testresult, set_value('vi_test_result', (isset($vi_test_result)) ? $vi_test_result : ''), $attrib);
              ?> 
              <?PHP if(form_error('vi_test_result')){ echo '<span class="help-block">'.form_error('vi_test_result').'</span>';} ?>           
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 col-xs-12">
          <div class="form-group <?PHP if(form_error('vi_remarks')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_welder_Modal_Weld_remarks');?></label>
            <textarea class="form-control" placeholder="<?php echo lang('mm_masters_welder_Modal_Weld_remarks');?>" id="vi_remarks" name="vi_remarks" rows="3"><?php echo $vi_remarks;?></textarea>
            <?PHP if(form_error('vi_remarks')){ echo '<span class="help-block">'.form_error('vi_remarks').'</span>';} ?>
          </div>
        </div>
      </div>

      <div class="text-center">
        <input type="hidden" name="welderID" value="<?php echo $welderID;?>" />
        <input type="hidden" name="vi_welder_id" value="<?php echo $vi_welder_id;?>">

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
          url: "<?php echo site_url('masters/Welder/getupdateAttributeVIModal'); ?>",
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