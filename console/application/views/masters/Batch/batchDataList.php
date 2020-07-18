  <?php
    $this->mcommon->getCheckUserPermissionHead('Batch',true);
  ?>            
  <div class="row">

    <div class="col-sm-12">

      <div class="white-box">

      <?php
        if($this->session->flashdata('res'))
        {
          ?>
          <div class="alert alert-<?php echo $this->session->flashdata('res_type'); ?> successmessage">
            <a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?php   echo $this->session->flashdata('res'); ?>
          </div>
          <?php
        }
        ?>
        
        <div class="row m-b-10">
          <div class="col-sm-12">          
              <?php 
            if($this->mcommon->getISUserPermission('Batch add and edit',$this->session->userdata('user_id'))){
              ?>
              <span class="pull-left">
                <a href="<?php echo base_url().$add_button_url;?>" class="btn btn-success waves-effect waves-light m-r-10 pull-right" ><?php echo lang('mm_masters_batch_manage_form_add_button_name');?></a>
              </span>
              <?php
            }
          ?>
            <span class="pull-right"> 
              <!--<a href="<?php echo base_url().$export_url;?>" target="_blank" class="btn btn-primary btn-addon m-b-sm pull-right"> <i class="fa fa-file-excel-o"></i> <?php echo lang('helper_common_excel_label');?> </a>           <a href="<?php echo base_url().$pdf_url;?>" target="_blank" class="btn btn-primary btn-addon m-b-sm pull-right m-r-10"> <i class="fa fa-file-pdf-o"></i> <?php echo lang('helper_common_pdf_label');?> </a> 
              -->
              <!--
                <h3 class="box-title m-b-0"><?php echo $list_tittle;?></h3>
                <p class="text-muted m-b-30"><?php echo $list_tittle_small;?></p>
                -->
                  <?php /* 
                      echo $this->table->generate(); */
                  ?>
              <?php 
                if($this->mcommon->getISUserPermission('Batch all details download excel',$this->session->userdata('user_id'))){
                  ?>
                  <button id="excel" class="btn btn-primary btn-addon m-b-sm pull-right"><i class="fa fa-file-excel-o"></i> <?php echo lang('helper_common_excel_label');?></button>
                  <?php
                }
                if($this->mcommon->getISUserPermission('Batch all details download pdf',$this->session->userdata('user_id'))){
                  ?>
                  <button id="pdf" class="btn btn-primary btn-addon m-b-sm pull-right m-r-10"><i class="fa fa-file-pdf-o"></i> <?php echo lang('helper_common_pdf_label');?></button>
                  <?php 
                }
              ?>


            </span>
          </div>
        </div>

        <table id="dataTableList2"></table>
        <div id="dataTablePager2"></div>

      </div>
    </div>
  </div>


  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false" id="CompanyModal">
    <div class="modal-dialog modal-lg" id="commonDetailsModal"></div>
  </div>


  <!-- /.end form -->

  <!-- /Staert List -->
  <script type="text/javascript">
    $(document).ready(function() {


      jQuery("#dataTableList2").jqGrid({
        url:'<?php echo base_url().$datatable_url; ?>',
        datatype: "json",
        mtype: 'POST',
        altRows:true,
        onPaging : function() {
          //jQuery(this).setGridParam({datatype:'json'});
        },
        
        loadComplete: function () {
        //jQuery(this).css({'width': '1200px !important'});
            // jQuery('#dataTableList2').jqGrid('setGridWidth', '1250'); // max width for grid

        },

        colModel:[
        <?php if($this->mcommon->getISUserPermission('Batch add and edit',$this->session->userdata('user_id'))){?>
          {label:'<?php echo lang('common_table_label_edit_operation');?>' ,name:'edit_batch_id',index:'edit_batch_id', width:75, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
        <?php } if($this->mcommon->getISUserPermission('Batch delete',$this->session->userdata('user_id'))){?>
          {label:'<?php echo lang('common_table_label_delete_operation');?>' ,name:'delete_batch_id',index:'delete_batch_id', width:75, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
        <?php }?>
           {label:'<?php echo lang('mm_masters_batch_table_label_batch_name');?>',name:'batch_name',index:'batch_name', width:200, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_masters_batch_table_label_batch_service');?>',name:'services_name',index:'services_name', width:200, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_masters_batch_table_label_batch_ref_no');?>',name:'batch_ref_no',index:'batch_ref_no', width:200, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_masters_batch_table_label_batch_wps');?>',name:'batch_wps',index:'batch_wps', width:200, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_masters_batch_table_label_batch_request');?>',name:'batch_request_date',index:'batch_request_date', width:200, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_masters_batch_table_label_batch_acceptance_criteria');?>',name:'batch_acceptance_criteria',index:'batch_acceptance_criteria', width:170, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_masters_batch_table_label_batch_client_specification');?>',name:'batch_client_specification',index:'batch_client_specification', width:170, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}, align:'center'},

          /*{label:'<?php echo lang('mm_masters_batch_table_label_batch_welder_Details');?>',name:'welderDetails',index:'welderDetails', width:75,resizable: false},*/
          /*{label:'<?php echo lang('mm_masters_batch_table_label_batch_welder_Pass');?>',name:'welderPass',index:'welderPass', width:120, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}, align:'center'},*/
          /*{label:'<?php echo lang('mm_masters_batch_table_label_batch_checklist_report');?>',name:'checkListReport',index:'checkListReport', width:75,resizable: false},*/
        <?php if($this->mcommon->getISUserPermission('Batch Table Check list View',$this->session->userdata('user_id'))){?>
          {label:'<?php echo lang('mm_masters_batch_table_label_batch_checklist_vi');?>',name:'checkListVi',index:'checkListVi', width:100, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}, align:'center'},
          {label:'<?php echo lang('mm_masters_batch_table_label_batch_checklist_Attachement');?>',name:'checkListAttachement',index:'checkListAttachement', width:150, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}, align:'center'},
        <?php } ?>
          /*{label:'<?php echo lang('mm_masters_batch_table_label_batch_NDT_request');?>',name:'ndtRequest',index:'ndtRequest', width:75,resizable: false},*/
        <?php if($this->mcommon->getISUserPermission('Batch Table NDT View',$this->session->userdata('user_id'))){?>
          {label:'<?php echo lang('mm_masters_batch_table_label_batch_NDT');?>',name:'ndt',index:'ndt', width:100, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}, align:'center'},
          {label:'<?php echo lang('mm_masters_batch_table_label_batch_NDT_Attachement');?>',name:'ndtAttachement',index:'ndtAttachement', width:150, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}, align:'center'},
        <?php } if($this->mcommon->getISUserPermission('Batch Qualification Record View',$this->session->userdata('user_id'))){?>
          {label:'<?php echo lang('mm_masters_batch_table_label_batch_qualification_record');?>',name:'qualificationRecord',index:'qualificationRecord', width:180, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}, align:'center'},
        <?php }?>
          /*
          {label:'<?php echo lang('mm_masters_batch_table_label_batch_WPQ');?>',name:'resultWPQ',index:'resultWPQ', width:50,resizable: false},
          {label:'<?php echo lang('mm_masters_batch_table_label_batch_form');?>',name:'resultForm',index:'resultForm', width:50,resizable: false},*/
        <?php if($this->mcommon->getISUserPermission('Batch Bulk Report View',$this->session->userdata('user_id'))){?>
          {label:'<?php echo lang('mm_masters_batch_table_label_batch_bulk_report');?>',name:'resultBulkReport',index:'resultBulkReport', width:100, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}, align:'center'},
        <?php } if($this->mcommon->getISUserPermission('Batch Table Attachment View',$this->session->userdata('user_id'))){?>
          {label:'<?php echo lang('mm_masters_batch_table_label_batch_Attachement');?>',name:'attachementBatch',index:'attachementBatch', width:150, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}, align:'center'},
        <?php }?>
          {label:'<?php echo lang('mm_masters_batch_table_label_batch_is_open');?>',name:'resultIsOpen',index:'resultIsOpen', width:100, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}, align:'center'},
          {label:'<?php echo lang('mm_masters_batch_table_label_batch_is_completed');?>',name:'resultIsCompleted',index:'resultIsCompleted', width:150, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}, align:'center'},
          {label:'<?php echo lang('mm_masters_batch_table_label_createBy');?>',name:'first_name',index:'first_name', width:150, sortable:false, hidden:true, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_masters_batch_table_label_createOn');?>',name:'batch_createOn',index:'batch_createOn', width:150, sortable:false, hidden:true, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},    
          {label:'<?php echo lang('mm_masters_batch_table_label_updateBy');?>',name:'firstname',index:'firstname', width:150, sortable:false, hidden:true, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},   
          {label:'<?php echo lang('mm_masters_batch_table_label_updateon');?>',name:'batch_updateOn',index:'batch_updateOn', width:150, sortable:false, hidden:true, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}} 
        ],
        
        //postData: { page: 1,rows: 1},        
        rowNum:10,
        rowList:[10,25,50,100],
        pager: jQuery('#dataTablePager2'),
        sortname: 'batch_id',
        viewrecords: true,
        sortorder: "desc",
        autowidth: true,
        loadonce: true,
        shrinkToFit: false,
        forceFit:true,
        hoverrows: true, // true by default, can be switched to false if highlight on hover is not needed
        height: '600',
        gridview: true,
        altclass: 'JQGrid_AlternateRow',
        ignoreCase: true,
        emptyrecords: "No records to view",
        loadtext: "Loading...",
        colMenu:true,
        height:300
      });
      

    var colModels = jQuery("#dataTableList2").jqGrid ('getGridParam', 'colModel');
    var remapColumns = jQuery("#dataTableList2").jqGrid ('getGridParam', 'remapColumns');

    if(colModels){
      var allColModels = [];
      var showColModels = [];
      for (var colModelsIndex in colModels) {
        var colModel = colModels[colModelsIndex];
        allColModels.push(colModel.name);
        if(! colModel.hidden){
          showColModels.push(colModel.name);
        }
      }
      //jQuery("#dataTableList2").jqGrid('hideCol',allColModels);
      //jQuery("#dataTableList2").jqGrid('showCol',showColModels);
      //jQuery('#dataTableList2').jqGrid('remapColumns', colModels, true, false);          
    }

    jQuery("#dataTableList2").jqGrid(
      'navGrid',
      '#dataTablePager2',
      {
        edit:false, add:false, del:false, search:true,refresh:true,
        beforeRefresh: function(){
          jQuery("#dataTableList2").jqGrid('setGridParam',{datatype:'json',page:1}).trigger('reloadGrid')}
      },
      {},{},{},{width:600}
    );

    jQuery("#dataTableList2").jqGrid('navButtonAdd','#dataTablePager2',{ caption: "Reorder Columns", buttonicon : "octicon octicon-calendar",title: "Reorder Columns", onClickButton : function (){ jQuery("#dataTableList2").jqGrid('columnChooser') } });


    $('#dataTableList2').setGroupHeaders({
      useColSpanStyle: true,
      groupHeaders: [
        { "numberOfColumns": 2, "titleText": "Check List", "startColumnName": "checkListVi" },
        { "numberOfColumns": 2, "titleText": "NDT", "startColumnName": "ndt" }
      ]
    });


    $("#pdf").on("click", function(){
      let date = new Date();
      month = '' + (date.getMonth() + 1),
      day = '' + date.getDate(),
      year = date.getFullYear();

      if (month.length < 2) month = '0' + month;
      if (day.length < 2) day = '0' + day;

      let dateValue = day+'_'+month+'_'+year;


        $("#dataTableList2").jqGrid("exportToPdf",{
          title: '<?php echo lang('mm_masters_batch_manage_pdfTitle');?>',
          orientation: 'portrait',
          pageSize: 'A4',
          description: ' ', 
          customSettings: null,
          download: 'download',
          includeLabels : true,
          includeGroupHeader : true,
          includeFooter: false,
          fileName : "<?php echo $pdf_fileName;?>.pdf",
          onBeforeExport : function( doc ) {
            //doc.content[0].table.headerRows = 2;
            //doc.content[0].table = 1;
            var sheet = doc.content[2].table.body
            $(sheet).each( function (i,n) {
              var ii;
              if(sheet[i][0].text == 'Operation'){
                sheet[i][0] = 'S No';
              } else {
                sheet[i][0] = ''+i;
              }
            });
          },
        })

      });
      $("#excel").on("click", function(){
        $("#dataTableList2").jqGrid("exportToExcel",{
          includeLabels : true,
          includeGroupHeader : true,
          includeFooter: true,
          fileName : "<?php echo $export_fileName;?>.xlsx",
          onBeforeExport : function( xlsx ) {

            var sheet = xlsx.xl.worksheets['sheet1.xml'];
            // Loop over the cells in column `D`
            //console.log(sheet.data);
            $('row c[r^="A"]', sheet).each( function (i, n) {
              // Get the value and strip the non numeric characters
                             //console.log($(this).value());

              if($(this).text() == 'Operation'){
                $(this).text('S No');
              } else {
                $(this).text(''+i);
              }

              if ( $(this).text() == 'Operation' ) {
                // apply style definition 20 for the cell
                // we have 50 predefined styles
                //$(this).attr( 's', '1' );
                //$(this).attr( 's', '20' );
              }

            });
            //alert('wait');
          },
          maxlength : 40 // maxlength for visible string data 
        });

      }); 
  } );



  function batchWelderDetails(batchID)
{
    $.ajax({
        type: "GET",
        url: "<?php echo site_url('masters/Batch/getupdateWelderDetailsModal'); ?>", 
        data: { batchID:batchID},
        dataType:"html",
        success: function(html1)
        {
          //alert(html1);
            $('#commonDetailsModal').removeAttr('style');

            $('#commonDetailsModal').html(html1);
            $('#welderDetails_welding_process1').select2();
            $('#welderDetails_welding_process2').select2();
            $('#welderDetails_position').select2();
            $('#welderDetails_vertical_progression').select2();
            $('#welderDetails_backing').select2();
            $('#welderDetails_groove_type').select2();
            $('#welderDetails_consumable_insert').select2();
            $('#welderDetails_penetration').select2();
            $('#welderDetails_currrent_polarity').select2();
            $('#welderDetails_WQT_witnessedBy').select2();
            $('#welderDetails_code').select2();
        },
    });
}

  function batchWelderPass(batchID)
{
    $.ajax({
        type: "GET",
        url: "<?php echo site_url('masters/Batch/getupdateWelderPassModal'); ?>", 
        data: { batchID:batchID},
        dataType:"html",
        success: function(html1)
        {
          //alert(html1);
            $('#commonDetailsModal').css({"width":"1080px"});
            $('#commonDetailsModal').html(html1);
        },
    });
}


  function batchVIModal(batchID)
{
    $.ajax({
        type: "GET",
        url: "<?php echo site_url('masters/Batch/getupdateBatchVIModal'); ?>", 
        data: { batchID:batchID},
        dataType:"html",
        success: function(html1)
        {
          //alert(html1);
          $('#commonDetailsModal').removeAttr('style');

            $('#commonDetailsModal').html(html1);
            $('#batchVI_certified_welding_inspector').select2();
            $('#batchVI_ndt_contractor').select2();
        },
    });
    }
    


function batchVIAttachementModal(batchID){
  $.ajax({
    type: "GET",
    url: "<?php echo site_url('masters/Batch/getupdateVIAttachementModal'); ?>", 
    data: { batchID:batchID},
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
      $('#CompanyModal').modal('show');
                $('#commonDetailsModal').removeAttr('style');

      $('#commonDetailsModal').html(html1);
    },
    error: function(xhr) { // if error occured
      //console.log(xhr);
        alert("Error occured.please try again");
        //$('#CompanyModal').modal('show');
        //$('#attributeDetailsModal').html(xhr.statusText + xhr.responseText);
        //$.unblockUI();
        $('#CompanyModal').unblock();
    },
    complete: function() {
      $.unblockUI();
      //$('#CompanyModal').unblock();
    },
  });
}


function batchNDTModal(batchID)
{
    $.ajax({
        type: "GET",
        url: "<?php echo site_url('masters/Batch/getupdateBatchNDTModal'); ?>", 
        data: { batchID:batchID},
        dataType:"html",
        success: function(html1)
        {
          //alert(html1);
            $('#commonDetailsModal').removeAttr('style');

            $('#commonDetailsModal').html(html1);
            $('#batchNDT_ndt_type').select2();
            $('#batchNDT_ndt_type').select2();

            var today = new Date();
            $('.datepicker-autoclose').datepicker({
              todayHighlight: true,
              format: 'dd-mm-yyyy',
              autoclose:true,
              endDate: "today",
              maxDate: today
            }).on('changeDate', function (ev) {
              $(this).datepicker('hide');
            });
            $('.datepicker-autoclose').keyup(function () {
                if (this.value.match(/[^0-9]/g)) {
                    this.value = this.value.replace(/[^0-9^-]/g, '');
                }
            });
        },
    });
}


function batchNDTAttachementModal(batchID){
  $.ajax({
    type: "GET",
    url: "<?php echo site_url('masters/Batch/getupdateNDTAttachementModal'); ?>", 
    data: { batchID:batchID},
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
      $('#CompanyModal').modal('show');
                $('#commonDetailsModal').removeAttr('style');

      $('#commonDetailsModal').html(html1);
    },
    error: function(xhr) { // if error occured
      //console.log(xhr);
        alert("Error occured.please try again");
        //$('#CompanyModal').modal('show');
        //$('#attributeDetailsModal').html(xhr.statusText + xhr.responseText);
        //$.unblockUI();
        $('#CompanyModal').unblock();
    },
    complete: function() {
      $.unblockUI();
      //$('#CompanyModal').unblock();
    },
  });
}

function batchAttachementModal(batchID){
  $.ajax({
    type: "GET",
    url: "<?php echo site_url('masters/Batch/getupdateAttachementModal'); ?>", 
    data: { batchID:batchID},
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
      $('#CompanyModal').modal('show');
      $('#commonDetailsModal').html(html1);
    },
    error: function(xhr) { // if error occured
      //console.log(xhr);
        alert("Error occured.please try again");
        //$('#CompanyModal').modal('show');
        //$('#attributeDetailsModal').html(xhr.statusText + xhr.responseText);
        //$.unblockUI();
        $('#CompanyModal').unblock();
    },
    complete: function() {
      $.unblockUI();
      //$('#CompanyModal').unblock();
    },
  });
}
function weldPassModal(welderID){
  $.ajax({
    type: "GET",
    url: "<?php echo site_url('masters/Welder/getupdatePassModal'); ?>", 
    data: { welderID:welderID},
    dataType:"html",
    success: function(html1)
    {
      $('#attributeDetailsModal').html(html1);
    },
  });
}
function weldWpQRModal(welderID){
  $.ajax({
    type: "GET",
    url: "<?php echo site_url('masters/Welder/getupdateWPQRModal'); ?>", 
    data: { welderID:welderID},
    dataType:"html",
    success: function(html1)
    {
      $('#attributeDetailsModal').html(html1);
    },
  });
}
function weldCertificationModal(welderID){
  $.ajax({
    type: "GET",
    url: "<?php echo site_url('masters/Welder/getupdateCertificationModal'); ?>", 
    data: { welderID:welderID},
    dataType:"html",
    success: function(html1)
    {
      $('#attributeDetailsModal').html(html1);
    },
  });
}


function conformboxdeleteAttachment(url)
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
                            $('#attachDatatablevalue').html(parsedJson.datatablevalueForm);
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
        

  