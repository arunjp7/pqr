<?php
// Last Updated by  Vinitha 06/08/2016 
if(isset($value) && !empty($value))
{
  foreach($value->result() as $row)
  {  
    $batchNDT_attachement_id               =  $row->batchNDT_attachement_id;
    $batchNDT_attachement_type_name        =  $row->batchNDT_attachement_type_name;
    $batchNDT_attachement_file_name        =  $row->batchNDT_attachement_file_name;   
    $batchNDT_old_attachement_file_name    =  $row->batchNDT_attachement_file_name;   
  }
}
else
{
  $batchNDT_attachement_id                  =  $this->input->post('batchNDT_attachement_id');
  $batchNDT_attachement_type_name           =  $this->input->post('batchNDT_attachement_type_name');
  $batchNDT_attachement_file_name           =  $this->input->post('batchNDT_attachement_file_name');
  $batchNDT_old_attachement_file_name       =  $this->input->post('batchNDT_old_attachement_file_name');
}
$ci =&get_instance();

?>

<div class="modal-content">
  <div class="modal-header panel-heading clearfix">
    <h4 class="modal-title" id="myLargeModalLabel"><?php echo lang('mm_masters_batch_Modal_Attachement_title');?></h4>
  </div>
  <form ng-app="form-example" method="post" id="ajaxModelForm" enctype="multipart/form-data" action="javascript:" ui-jp="parsley">
    <div class="modal-body">
      <span id="modalMessage"></span>
      <!-- /.start form -->
      <div class="row">
        <div class="col-sm-4 col-xs-4">

          <div class="row">
            <div class="col-sm-12 col-xs-12">
              <div class="form-group <?PHP if(form_error('batchNDT_attachement_type_name')){ echo 'has-error';} ?>">
                <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_attachement_type_name');?></label>
                <input type="text" class="form-control" placeholder="<?php echo lang('mm_masters_batch_Modal_attachement_type_name');?>" id="batchNDT_attachement_type_name" name="batchNDT_attachement_type_name" value="<?php echo $batchNDT_attachement_type_name ;?>" autocomplete="off">
               <?PHP if(form_error('batchNDT_attachement_type_name')){ echo '<span class="help-block">'.form_error('batchNDT_attachement_type_name').'</span>';} ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 col-xs-12">
              <div class="form-group <?PHP if(form_error('batchNDT_attachement_file_name')){ echo 'has-error';} ?>">
              <label for="exampleInputEmail1"><?php echo lang('mm_masters_batch_Modal_attachement_file_name');?> <?php echo lang('mm_common_logo_size_label_500');?> </label>
                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                  <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                  <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new"><?php echo lang('mm_common_logo_name_label');?></span> <span class="fileinput-exists"><?php echo lang('mm_common_logo_change_label');?></span>
                  <input type="file" id="batchNDT_attachement_file_name" name="batchNDT_attachement_file_name" >
                  </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput"><?php echo lang('mm_masters_batch_Modal_attachement_file_name');?></a>
                </div>
                <?PHP if(form_error('batchNDT_attachement_file_name')){ echo '<span class="help-block">'.form_error('batchNDT_attachement_file_name').'</span>';} ?>
              </div>
            </div>
             
          </div>
        </div>
        <div class="col-sm-1 col-xs-1"></div>
        <div class="col-sm-7 col-xs-7">
          <div class="row">
            <div class="col-sm-12 col-xs-12">
            <h5 class="box-title m-b-0"><b><?php echo lang('mm_masters_batch_Modal_attachement_instructions_title');?></b></h5>
            <p class="text-muted"><?php echo lang('mm_masters_batch_Modal_attachement_instructions_text1');?></p>
            <p class="text-muted"><?php echo lang('mm_masters_batch_Modal_attachement_instructions_text2');?></p>
            <p class="text-muted"><?php echo lang('mm_masters_batch_Modal_attachement_instructions_text3');?></p>
            <p class="text-muted"><?php echo lang('mm_masters_batch_Modal_attachement_instructions_text4');?></p>
          </div>
        </div>
      </div>
        
      </div>
      <hr />
      <div class="text-center">
        <input type="hidden" name="batchID" value="<?php echo $batchID;?>" />
        <input type="hidden" name="batchNDT_attachement_id" value="<?php echo $batchNDT_attachement_id;?>">
        <input type="hidden" name="batchNDT_old_attachement_file_name" value="<?php echo $batchNDT_old_attachement_file_name;?>" />


        <input type="hidden" name="submit" value="1">

        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit"><?php echo lang('btn_save');?></button>
        <button type="submit" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal"><?php echo lang('btn_close_window');?></button>
      </div>
      <hr />
      <!-- /.end form -->
    </div>
  <?php echo form_close(); ?>
  <div class="row">
        <div class="col-sm-12">
          <div class="white-box">
            <h3 class="box-title m-b-0"><?php echo lang('mm_masters_batch_Modal_attachement_datatable_title');?></h3>
            <table id="myTable" class="table table-striped">
              <thead>
                <tr>
                  <th><?php echo lang('mm_masters_batch_Modal_attachement_datatable_sno');?></th>
                  <th><?php echo lang('mm_masters_batch_Modal_attachement_datatable_delete');?></th>
                  <th><?php echo lang('mm_masters_batch_Modal_attachement_datatable_filename');?></th>
                  <th><?php echo lang('mm_masters_batch_Modal_attachement_datatable_type');?></th>
                  <th><?php echo lang('mm_masters_batch_Modal_attachement_datatable_filesize');?></th>
                  <th><?php echo lang('mm_masters_batch_table_label_updateBy');?></th>
                  <th><?php echo lang('mm_masters_batch_table_label_updateon');?></th>
                </tr>
              </thead>
              <tbody id="attachDatatablevalue">
                <?php 
                if(isset($datatablevalue) && !empty($datatablevalue)){
                  $iValue = 1;
                  foreach($datatablevalue as $row){ 
                    ?>
                      <tr>
                        <td><?php echo $iValue++;?></td>
                        <td><?php echo get_buttons_new_only_Delete1($row['batchNDT_attachement_id'],'masters/Batch/getupdateNDTAttachementModal');?></td>
                        <td>
                        <a href="<?php echo config_item('image_url').$row['batchNDT_attachement_file_name'];?>" target="_blank" class="cursor" title="<?php echo $row['batchNDT_attachement_file_name'];?>" style="color:blue">
                        <?php echo (str_replace('application/','', $row['batchNDT_attachement_file_type']) == 'pdf') ? '<i class="fa fa-file-pdf-o"  aria-hidden="true"></i>' : '<i class="fa fa-picture-o" aria-hidden="true"></i>' ;?>&nbsp;&nbsp;<?php echo str_replace('attachementNDT/','', $row['batchNDT_attachement_file_name']);?></a></td>
                        <td><?php echo $row['batchNDT_attachement_type_name'];?></td>
                        <td><?php echo $row['batchNDT_attachement_file_size'];?></td>
                        <td><?php echo $row['firstname'];?></td>
                        <td><?php echo get_date_timeformat($row['batchNDT_attachement_updateOn']);?></td>
                      </tr>
                    <?php 
                  }
                } else{
                  ?>
                  <tr>
                    <td colspan="6" style="text-align:center"><b>No Data Available...</b></td>
                  </tr>
                  <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
</div>


      

                            
<script type="text/javascript">

      jQuery(document).ready(function() 
      {

        //$('.modal .select2').select2('disable');

        //$('.modal .select2').select2('disable');

        // When the form is submitted

        $("form#ajaxModelForm").submit(function()
        {
          //$("#shader").fadeIn();
          var formdata= new FormData($(this)[0]);
          $.ajax(
          {
            "url":"<?php echo site_url('masters/Batch/getupdateNDTAttachementModal'); ?>",
            "type":"POST",
            data:formdata,
            async:false,
            beforeSend: function() {
              //$('#CompanyModal').modal('hide');
              //$.blockUI({ message: '<h5><img src="<?php echo base_url(); ?>img/busy.gif" /> Just a moment...</h5>' }); 
              $('#attributeDetailsModal').block({ 
                message: '<h5><img src="<?php echo base_url(); ?>img/busy.gif" /> Just a moment...</h5>' ,
                centerY: false, 
                css: { 
                  top: '20%', 
                  right: '10px', 
                  border: 'none', 
                  padding: '5px', 
                } 
              });
            },
            success: function(html1) {
              //$('#attributeDetailsModal').unblock(); 
              //$('#attributeDetailsModal').html(html1);
              
              try 
                {
                  var parsedJson = JSON.parse(html1);
                  if(parsedJson.result == 'Success' || parsedJson.result == "Update"  || parsedJson.result == "ExistRecord")
                  {
                    var htmlText = '<div class="alert alert-'+parsedJson.res_type+' successmessage">'+parsedJson.res+'</div>';
                    $('#modalMessage').html(htmlText);
                    $('#attachDatatablevalue').html(parsedJson.datatablevalueForm);
                    $('#batchNDT_attachement_type_name').val('');
                    $('#batchNDT_attachement_file_name').val('');
                    $('[class="fileinput-filename"]').html('');
                    $('[data-provides="fileinput"]').removeClass( "fileinput input-group fileinput-exists" ).addClass( "fileinput fileinput-new input-group" );
                    //$('[data-trigger="fileinput"]').html('');
                    //$('#AcademicInformationModel').modal('toggle');
                     //$("[data-dismiss=modal]").trigger({ type: "click" });
                     //loadlabelDropDown();
                    //$("#shader").hide();
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
              }catch(e){
                $('#attributeVIDetailsModal').html(html1);
              }
            },
            error: function(xhr) { // if error occured
              //console.log(xhr);
              //$('#CompanyModal').modal('hide');
                alert("Error occured.please try again");
                //$('#CompanyModal').modal('show');
                //$('#attributeDetailsModal').html(xhr.statusText + xhr.responseText);
                $('#attributeDetailsModal').unblock();
            },
            complete: function() {
              //$('#attributeDetailsModal').unblock(); 
              //$('#CompanyModal').modal('show');
              $('#attributeDetailsModal').unblock(); 

              
            },
            /*
            success:function(html1)
            {
              try 
                {
                  var parsedJson = JSON.parse(html1);
                  if(parsedJson.result == 'Success' || parsedJson.result == "Update"  || parsedJson.result == "ExistRecord")
                  {
                    var htmlText = '<div class="alert alert-'+parsedJson.res_type+'" successmessage">'+parsedJson.res+'</div>';
                    $('#modalMessage').html(htmlText);
                    $('#attachDatatablevalue').html(parsedJson.datatablevalueForm);
                    $('#attachement_type_name').val('');
                    $('#attachement_file_name').val('');
                    $('[class="fileinput-filename"]').html('');
                    $('[data-provides="fileinput"]').removeClass( "fileinput input-group fileinput-exists" ).addClass( "fileinput fileinput-new input-group" );
                    //$('[data-trigger="fileinput"]').html('');
                    //$('#AcademicInformationModel').modal('toggle');
                     //$("[data-dismiss=modal]").trigger({ type: "click" });
                     //loadlabelDropDown();
                    //$("#shader").hide();
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
                } 
                catch(e) 
                {
                  $('#attributeVIDetailsModal').html(html1);
                  //$("#shader").hide();
                }

            },*/
            cache:false,
            contentType: false,
            processData:false
          });
          return false;
        });

/*
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
        */
    });
</script>