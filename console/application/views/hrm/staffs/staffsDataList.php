  <?php 
      $this->mcommon->getCheckUserPermissionHead('staffs',true);
?>
<div id="main-wrapper">
  <div class="text-center">

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
      <br/>
  </div>
        
  <div class="row">
    <div class="col-md-12">
        <div class="panel panel-white">
            <div class="panel-heading clearfix">
                <h4 class="panel-title"></h4>
            </div>
            <div class="panel-body">
              <div class="row">       
                <div class="col-md-12">  
                  <?php 
                    if($this->mcommon->getISUserPermission('Staffs add and edit',$this->session->userdata('user_id'))){
                      ?>
                      <span class="pull-left">
                        <a href="<?php echo base_url().$add_button_url;?>" class="btn btn-success waves-effect waves-light m-r-10 pull-right" ><?php echo lang('mm_masters_staffs_manage_form_add_button_name');?></a>
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
                      if($this->mcommon->getISUserPermission('Staffs all details download excel',$this->session->userdata('user_id'))){
                        ?>
                        <button id="excel" class="btn btn-primary btn-addon m-b-sm pull-right"><i class="fa fa-file-excel-o"></i> <?php echo lang('helper_common_excel_label');?></button>
                        <?php
                      }
                      if($this->mcommon->getISUserPermission('Staffs all details download pdf',$this->session->userdata('user_id'))){
                        ?>
                        <button id="pdf" class="btn btn-primary btn-addon m-b-sm pull-right m-r-10"><i class="fa fa-file-pdf-o"></i> <?php echo lang('helper_common_pdf_label');?></button>
                        <?php 
                      }
                    ?>
                  </span>
                </div>
            </div>

            <div class="mr-1">

              <table id="dataTableList2"></table>
              <div id="dataTablePager2"></div>
            </div>

    </div>
  </div>
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
          //jQuery('#dataTableList2').jqGrid('setGridWidth', '1250'); // max width for grid
        },

        colModel:[
        <?php if($this->mcommon->getISUserPermission('Staffs add and edit',$this->session->userdata('user_id'))){?>
          {label:'<?php echo lang('common_table_label_edit_operation');?>' ,name:'edit_staffs_id',index:'edit_staffs_id', width:75, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
        <?php } if($this->mcommon->getISUserPermission('Staffs delete',$this->session->userdata('user_id'))){?>
          {label:'<?php echo lang('common_table_label_delete_operation');?>' ,name:'delete_staffs_id',index:'delete_staffs_id', width:75, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          <?php }?>
          {label:'<?php echo lang('common_table_label_roles_operation');?>' ,name:'roles_staffs_id',index:'roles_staffs_id', width:150, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},

           {label:'<?php echo lang('mm_Hrm_staffs_table_label_staffs_employee_active');?>',name:'active',index:'active', width:150, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
           {label:'<?php echo lang('mm_Hrm_staffs_table_label_staffs_employee_id');?>',name:'staffs_employee_id',index:'staffs_employee_id', width:200, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_Hrm_staffs_table_label_staffs_employee_name');?>',name:'staffs_employee_name',index:'staffs_employee_name', width:250, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_Hrm_staffs_table_label_staffs_designation');?>',name:'designation_name',index:'designation_name', width:200, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_Hrm_staffs_table_label_role_designation');?>',name:'role',index:'role', width:150, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_Hrm_staffs_table_label_staffs_gender');?>',name:'staffs_gender',index:'staffs_gender', width:150, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_Hrm_staffs_table_label_staffs_dob');?>',name:'staffs_dob',index:'staffs_dob', width:150, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_Hrm_staffs_table_label_staffs_doj');?>',name:'staffs_doj',index:'staffs_doj', width:150, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_Hrm_staffs_table_label_staffs_passport_no');?>',name:'staffs_passport_no',index:'staffs_passport_no', width:150, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_Hrm_staffs_table_label_staffs_passport_expiry_date');?>',name:'staffs_passport_expiry_date',index:'staffs_passport_expiry_date', width:200, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_Hrm_staffs_table_label_staffs_nationality');?>',name:'staffs_nationality',index:'staffs_nationality', width:150, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_Hrm_staffs_table_label_staffs_email');?>',name:'staffs_email',index:'staffs_email', width:150, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_Hrm_staffs_table_label_staffs_phone_number');?>',name:'staffs_phone_number',index:'staffs_phone_number', width:150, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_Hrm_staffs_table_label_staffs_address');?>',name:'staffs_address',index:'staffs_address', width:150, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_Hrm_staffs_table_label_staffs_department');?>',name:'DepartmentName',index:'DepartmentName', width:150, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_Hrm_staffs_table_label_staffs_iqama_number');?>',name:'staffs_iqama_number',index:'staffs_iqama_number', width:150, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_Hrm_staffs_table_label_staffs_iqama_expairye_date');?>',name:'staffs_iqama_expairye_date',index:'staffs_iqama_expairye_date', width:170, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_Hrm_staffs_table_label_staffs_resigned_date');?>',name:'staffs_resigned_date',index:'staffs_resigned_date', width:150, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_Hrm_staffs_table_label_staffs_resigned_reason');?>',name:'staffs_resigned_reason',index:'staffs_resigned_reason', width:150, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_Hrm_staffs_table_label_staffs_certificate');?>',name:'certificate',index:'certificate', width:150, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}, align:'center'},
          {label:'<?php echo lang('mm_Hrm_staffs_table_label_staffs_attachement');?>',name:'attachment',index:'attachment', width:150, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}, align:'center'},
          {label:'<?php echo lang('mm_Hrm_staffs_table_label_staffs_CWI');?>',name:'staffs_CWI',index:'staffs_CWI', width:150, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_Hrm_staffs_table_label_createBy');?>',name:'first_name',index:'first_name', width:100, sortable:false, hidden:true, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_Hrm_staffs_table_label_createOn');?>',name:'staffs_createOn',index:'staffs_createOn', width:150, sortable:false, hidden:true, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},    
          {label:'<?php echo lang('mm_Hrm_staffs_table_label_updateBy');?>',name:'firstname',index:'firstname', width:100, sortable:false, hidden:true, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},   
          {label:'<?php echo lang('mm_Hrm_staffs_table_label_updateon');?>',name:'staffs_updateOn',index:'staffs_updateOn', width:150, sortable:false, hidden:true, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}} 
        ],
        
        //postData: { page: 1,rows: 1},        
        rowNum:10,
        rowList:[10,25,50,100],
        pager: jQuery('#dataTablePager2'),
        sortname: 'staffs_id',
        viewrecords: true,
        sortorder: "desc",
        autowidth: true,
        loadonce: true,
        shrinkToFit: false,
        forceFit:true,
        hoverrows: true, // true by default, can be switched to false if highlight on hover is not needed
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

    $("#pdf").on("click", function(){
      let date = new Date();
      month = '' + (date.getMonth() + 1),
      day = '' + date.getDate(),
      year = date.getFullYear();

      if (month.length < 2) month = '0' + month;
      if (day.length < 2) day = '0' + day;

      let dateValue = day+'_'+month+'_'+year;


        $("#dataTableList2").jqGrid("exportToPdf",{
          title: '<?php echo lang('mm_Hrm_staffs_manage_pdfTitle');?>',
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


             

function staffAttachementModal(staffsID){
  $.ajax({
    type: "GET",
    url: "<?php echo site_url('auth/getupdateAttachementModal'); ?>", 
    data: { staffsID:staffsID},
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
        

  