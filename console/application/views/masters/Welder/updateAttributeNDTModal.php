<?php
// Last Updated by  Vinitha 06/08/2016 
if(isset($value) && !empty($value))
{
  foreach($value->result() as $row)
  {  
    $ndt_welder_id                      =  $row->ndt_welder_id;
    $ndt_type                           =  $row->ndt_type;
    $ndt_technician_name                =  $row->ndt_technician_name;   
    $ndt_date                           =  $row->ndt_date;   
    $ndt_report_no                      =  $row->ndt_report_no;   
    $ndt_issued_date                    =  $row->ndt_issued_date;
    $ndt_test_result                    =  $row->ndt_test_result;       
    $ndt_remarks                        =  $row->ndt_remarks;  
      
  }
}
else
{
  $ndt_welder_id                        =  $this->input->post('ndt_welder_id');
  $ndt_type                             =  $this->input->post('ndt_type');
  $ndt_technician_name                  =  $this->input->post('ndt_technician_name');
  $ndt_date                             =  $this->input->post('ndt_date');
  $ndt_report_no                        =  $this->input->post('ndt_report_no');
  $ndt_issued_date                      =  $this->input->post('ndt_issued_date');
  $ndt_test_result                      =  $this->input->post('ndt_test_result');
  $ndt_remarks                          =  $this->input->post('ndt_remarks');



}
?>

<div class="modal-content">
  <div class="modal-header panel-heading clearfix">
    <h4 class="modal-title" id="myLargeModalLabel"><?php echo lang('mm_masters_welder_Modal_ndt_title');?></h4>
  </div>
  <form ng-app="form-example" method="post" id="ajaxModelForm" action="javascript:" ui-jp="parsley">
    <div class="modal-body">
      <span id="modalMessage"></span>
      <!-- /.start form -->
      <div class="row">
        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('ndt_type')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_welder_Modal_ndt_type');?></label> 
              <?php   
              $attrib = 'class="form-control select2" name="ndt_type"  data-live-search="true" data-width="100%"  id="ndt_type"';
              echo form_dropdown('ndt_type', $drop_down_ndttype, set_value('ndt_type', (isset($ndt_type)) ? $ndt_type : ''), $attrib);
              ?> 
              <?PHP if(form_error('ndt_type')){ echo '<span class="help-block">'.form_error('ndt_type').'</span>';} ?>           
          </div>
        </div>

        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('ndt_technician_name')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_welder_Modal_ndt_technician_name');?></label>
            <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_welder_Modal_ndt_technician_name');?>" id="ndt_technician_name" name="ndt_technician_name" value="<?php echo $ndt_technician_name ;?>" autocomplete="off">
           <?PHP if(form_error('ndt_technician_name')){ echo '<span class="help-block">'.form_error('ndt_technician_name').'</span>';} ?>
          </div>
        </div>

        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('ndt_date')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_welder_Modal_Weding_ndt_date');?></label>
            <div class="input-group">
              <input type="text" class="form-control datepicker-autoclose" name="ndt_date"  id="ndt_date"  placeholder="<?php echo lang('mm_masters_welder_Modal_Weding_ndt_date');?>" value="<?php echo ($ndt_date!='' && $ndt_date!='0000-00-00') ? date('d-m-Y',strtotime($ndt_date)) : '';?>"> 
              <span class="input-group-addon"><i class="icon-calender"></i></span> 
            </div>
            <?PHP if(form_error('ndt_date')){ echo '<span class="help-block">'.form_error('ndt_date').'</span>';} ?>
          </div>
        </div>
        
      </div>
      <div class="row">
        
        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('ndt_report_no')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_welder_Modal_ndt_report_no');?></label>
            <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_welder_Modal_ndt_report_no');?>" id="ndt_report_no" name="ndt_report_no" value="<?php echo $ndt_report_no ;?>" autocomplete="off">
           <?PHP if(form_error('ndt_report_no')){ echo '<span class="help-block">'.form_error('ndt_report_no').'</span>';} ?>
          </div>
        </div>

        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('ndt_issued_date')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_welder_Modal_ndt_issued_date');?></label>
            <div class="input-group">
              <input type="text" class="form-control datepicker-autoclose" name="ndt_issued_date"  id="ndt_issued_date"  placeholder="<?php echo lang('mm_masters_welder_Modal_ndt_issued_date');?>" value="<?php echo ($ndt_issued_date!='' && $ndt_issued_date!='0000-00-00') ? date('d-m-Y',strtotime($ndt_issued_date)) : '';?>"> 
              <span class="input-group-addon"><i class="icon-calender"></i></span> 
            </div>
            <?PHP if(form_error('ndt_issued_date')){ echo '<span class="help-block">'.form_error('ndt_issued_date').'</span>';} ?>
          </div>
        </div> 

        <div class="col-sm-4 col-xs-4">
          <div class="form-group <?PHP if(form_error('ndt_test_result')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_welder_Modal_NDTtest_result');?></label>
              <?php   
              $attrib = 'class="form-control select2" name="ndt_test_result"  data-live-search="true" data-width="100%"  id="ndt_test_result"';
              echo form_dropdown('ndt_test_result', $drop_down_testresult, set_value('ndt_test_result', (isset($ndt_test_result)) ? $ndt_test_result : ''), $attrib);
              ?> 
              <?PHP if(form_error('ndt_test_result')){ echo '<span class="help-block">'.form_error('ndt_test_result').'</span>';} ?>           
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 col-xs-12">
          <div class="form-group <?PHP if(form_error('ndt_remarks')){ echo 'has-error';} ?>">
            <label for="exampleInputEmail1"><?php echo lang('mm_masters_welder_Modal_ndt_remarks');?></label>
            <textarea class="form-control" placeholder="<?php echo lang('mm_masters_welder_Modal_ndt_remarks');?>" id="ndt_remarks" name="ndt_remarks" rows="3"><?php echo $ndt_remarks;?></textarea>
            <?PHP if(form_error('ndt_remarks')){ echo '<span class="help-block">'.form_error('ndt_remarks').'</span>';} ?>
          </div>
        </div>
      </div>

      <div class="text-center">
        <input type="hidden" name="welderID" value="<?php echo $welderID;?>" />
        <input type="hidden" name="ndt_welder_id" value="<?php echo $ndt_welder_id;?>">

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
          url: "<?php echo site_url('masters/Welder/getupdateAttributeNDTModal'); ?>",
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