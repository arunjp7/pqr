<?php
// Last Updated by  Vinitha 06/08/2016 
if(isset($value) && !empty($value))
{
    foreach($value->result() as $row)
    {   
      $designation_id               =  $row->designation_id;
      $designation_name             =  $row->designation_name;
      $designation_abbr             =  $row->designation_abbr;       
    }
}
else
{
    $designation_id                 =  $this->input->post('designation_id');
    $designation_name               =  $this->input->post('designation_name');
    $designation_abbr               =  $this->input->post('designation_abbr');
 
}
?>
<div class="modal-content">
  <div class="modal-header panel-heading clearfix">
    <h4 class="modal-title" id="myLargeModalLabel"><?php echo lang('mm_Hrm_designation_manage_toptitle');?></h4>
  </div>

  <form ng-app="form-example" method="post" id="ajaxModelForm" enctype="multipart/form-data" action="javascript:" ui-jp="parsley">
    <div class="modal-body">
      <span id="modalMessage"></span>

        <div class="row">
          <div class="col-sm-4 col-xs-4">
            <div class="form-group <?PHP if(form_error('designation_name')){ echo 'has-error';} ?>">
              <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_designation_name');?><span class="text-danger">*</span></label>
              <input type="text" class="form-control" placeholder="<?php echo lang('mm_Hrm_designation_name');?>" id="designation_name" name="designation_name" value="<?php echo $designation_name ;?>" autocomplete="off" required >
              <?PHP if(form_error('designation_name')){ echo '<span class="help-block">'.form_error('designation_name').'</span>';} ?>
            </div>
          </div>
          <div class="col-sm-4 col-xs-4">
            <div class="form-group <?PHP if(form_error('designation_abbr')){ echo 'has-error';} ?>">
              <label for="exampleInputEmail1"><?php echo lang('mm_Hrm_designation_abbr');?><span class="text-danger">*</span></label>
              <input type="text" class="form-control" placeholder="<?php echo lang('mm_Hrm_designation_abbr');?>" id="designation_abbr" name="designation_abbr" value="<?php echo $designation_abbr ;?>" autocomplete="off" required >
             <?PHP if(form_error('designation_abbr')){ echo '<span class="help-block">'.form_error('designation_abbr').'</span>';} ?>
            </div>
          </div>              
        </div>

      <div class="clear"></div>

      <div class="text-center">
        <input type="hidden" name="designation_id" value="<?php echo $designation_id;?>">
        <input type="hidden" name="selectedDesignationID" value="<?php echo $selectedDesignationID;?>">
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
          url: "<?php echo site_url('auth/getAddUpdateDesignationModal'); ?>",
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
                  $('#staffs_designation').html(data.datatablevalueForm);
                  $('#designation_name').val('');
                  $('#designation_abbr').val('');

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