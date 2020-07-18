<?php
    $this->mcommon->getCheckUserPermissionHead('Equipment',true);
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
            if($this->mcommon->getISUserPermission('Equipment add and edit',$this->session->userdata('user_id'))){
              ?>
              <span class="pull-left">
                <a href="<?php echo base_url().$add_button_url;?>" class="btn btn-success waves-effect waves-light m-r-10 pull-right" ><?php echo lang('mm_masters_equipment_manage_form_add_button_name');?></a>
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
                if($this->mcommon->getISUserPermission('Equipment all details download excel',$this->session->userdata('user_id'))){
                  ?>
                  <button id="excel" class="btn btn-primary btn-addon m-b-sm pull-right"><i class="fa fa-file-excel-o"></i> <?php echo lang('helper_common_excel_label');?></button>
                  <?php
                }
                if($this->mcommon->getISUserPermission('Equipment all details download pdf',$this->session->userdata('user_id'))){
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
                //jQuery('#dataTableList2').jqGrid('setGridWidth', '1250'); // max width for grid
                

        },

        colModel:[
          {label:'<?php echo lang('mm_masters_equipment_table_label_equipment_SNo');?>' ,name:'category_name',index:'category_name', width:110, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
        <?php if($this->mcommon->getISUserPermission('Equipment add and edit',$this->session->userdata('user_id'))){?>
          {label:'<?php echo lang('common_table_label_edit_operation');?>' ,name:'edit_equipment_id',index:'edit_equipment_id', width:75, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
        <?php } if($this->mcommon->getISUserPermission('Equipment delete',$this->session->userdata('user_id'))){?>
          {label:'<?php echo lang('common_table_label_delete_operation');?>' ,name:'delete_equipment_id',index:'delete_equipment_id', width:75, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
        <?php }?>
           {label:'<?php echo lang('mm_masters_equipment_table_label_equipment_test_equipment');?>',name:'equipment_test_equipment',index:'equipment_test_equipment', width:200, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_masters_equipment_table_label_equipment_manufacturer');?>',name:'equipment_manufacturer',index:'equipment_manufacturer', width:200, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_masters_equipment_table_label_equipment_serial_number');?>',name:'equipment_serial_number',index:'equipment_serial_number', width:200, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_masters_equipment_table_label_equipment_asset_tag_number');?>',name:'equipment_asset_tag_number',index:'equipment_asset_tag_number', width:200, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_masters_equipment_table_label_equipment_calibration_report_number');?>',name:'equipment_calibration_report_number',index:'equipment_calibration_report_number', width:250, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_masters_equipment_table_label_equipment_recommended_rang');?>',name:'equipment_recommended_range',index:'equipment_recommended_range', width:200, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_masters_equipment_table_label_equipment_range');?>',name:'equipment_range',index:'equipment_range', width:100, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_masters_equipment_table_label_equipment_least_count');?>',name:'equipment_least_count',index:'equipment_least_count', width:150, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_masters_equipment_table_label_equipment_purpose');?>',name:'equipment_purpose',index:'equipment_purpose', width:150, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_masters_equipment_table_label_equipment_acceptance_criteria');?>',name:'equipment_acceptance_criteria',index:'equipment_acceptance_criteria', width:200, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_masters_equipment_table_label_equipment_calibrated_by');?>',name:'equipment_calibration_by',index:'equipment_calibration_by', width:150, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_masters_equipment_table_label_equipment_last_calibrated_date');?>',name:'equipment_calibration_date',index:'equipment_calibration_date', width:200, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_masters_equipment_table_label_equipment_calibrated_due_date');?>',name:'equipment_calibration_due_date',index:'equipment_calibration_due_date', width:200, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_masters_equipment_table_label_equipment_calibration_frequency_monts');?>',name:'equipment_calibration_frequency',index:'equipment_calibration_frequency', width:250, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_masters_equipment_table_label_equipment_alert_frequency_days');?>',name:'equipment_alert_frequency',index:'equipment_alert_frequency', width:200, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_masters_equipment_table_label_equipment_remarks');?>',name:'equipment_remarks',index:'equipment_remarks', width:100, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_masters_equipment_table_label_equipment_status');?>',name:'status_name',index:'status_name', width:75, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_masters_equipment_table_label_createBy');?>',name:'first_name',index:'first_name', width:150, sortable:false, hidden:true, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_masters_equipment_table_label_createOn');?>',name:'equipment_createOn',index:'equipment_createOn', width:150, sortable:false, hidden:true, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},    
          {label:'<?php echo lang('mm_masters_equipment_table_label_updateBy');?>',name:'firstname',index:'firstname', width:150, sortable:false, hidden:true, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},   
          {label:'<?php echo lang('mm_masters_equipment_table_label_updateon');?>',name:'equipment_updateOn',index:'equipment_updateOn', width:150, sortable:false, hidden:true, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}} 
        ],
        
        //postData: { page: 1,rows: 1},        
        rowNum:10,
        rowList:[10,25,50,100],
        pager: jQuery('#dataTablePager2'),
        sortname: 'equipment_id',
        viewrecords: true,
        sortorder: "desc",
        autowidth: true,
        //width:780,
        loadonce: true,
        shrinkToFit: false,
        forceFit:true,
        hoverrows: true, // true by default, can be switched to false if highlight on hover is not needed
        grouping:true,
        groupingView : {
          groupField : ['category_name'],
          groupColumnShow : [false],
          groupText : ['<b>Category : {0} </b>']

        },
        subGrid: true,
        emptyrecords: "No records to view",
        loadtext: "Loading...",
        colMenu:true,
        height:300,
        hoverrows: true,
        afterInsertRow : function(ids) {  // shows custom tooltip
          jQuery("#dataTableList2").addClass('dfdsgfsgfg');
        }, 

        /*subGridOptions: {
    "plusicon"  : "glyphicon glyphicon-plus",
    "minusicon" : "glyphicon glyphicon-minus",
    //"openicon"  : "ui-icon-arrowreturn-1-e"
  },*/

        subGridRowExpanded: function(subgrid_id, row_id) {
          // we pass two parameters
          // subgrid_id is a id of the div tag created whitin a table data
          // the id of this elemenet is a combination of the "sg_" + id of the row
          // the row_id is the id of the row
          // If we wan to pass additinal parameters to the url we can use
          // a method getRowData(row_id) - which returns associative array in type name-value
          // here we can easy construct the flowing
          var subgrid_table_id, pager_id;
          subgrid_table_id = subgrid_id+"_t";
          pager_id = "p_"+subgrid_table_id;
          var row_idValue = row_id;


          $("#"+subgrid_id).html("<table id='"+subgrid_table_id+"' class='scroll'></table><div id='"+pager_id+"' class='scroll'></div>");
          jQuery("#"+subgrid_table_id).jqGrid({
            url:'<?php echo base_url().$subGrid_datatable_url; ?>',
            datatype: "json",
            mtype: 'POST',
            altRows:true,
            onPaging : function() {
              //jQuery(this).setGridParam({datatype:'json'});
            },
            
            loadComplete: function () {
            //jQuery(this).css({'width': '1200px !important'});
                //jQuery('#dataTableList2').jqGrid('setGridWidth', '1250'); // max width for grid
                //jQuery('#dataTableList2'+row_id).addClass('rowExpired'); // max width for grid

                                           // $("#"+row_id).addClass("ui-state-rowexpired");


            },

            colModel:[
            <?php if($this->mcommon->getISUserPermission('Equipment Sub Grid add and edit',$this->session->userdata('user_id'))){?>
              {label:'<?php echo lang('common_table_label_edit_operation');?>' ,name:'edit_equipmentID',index:'edit_equipmentID', width:75, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
            <?php } if($this->mcommon->getISUserPermission('Equipment Sub Grid delete',$this->session->userdata('user_id'))){?>
              {label:'<?php echo lang('common_table_label_delete_operation');?>' ,name:'delete_equipmentID',index:'delete_equipmentID', width:75, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
            <?php }?>
               {label:'<?php echo lang('mm_masters_equipment_calibration_Modal_table_label_additionalData');?>',name:'additionalData',index:'additionalData', width:200, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
              {label:'<?php echo lang('mm_masters_equipment_calibration_Modal_table_label_pressureData');?>',name:'ressureData',index:'ressureData', width:200, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
              {label:'<?php echo lang('mm_masters_equipment_calibration_Modal_table_label_temperatureData');?>',name:'temperatureData',index:'temperatureData', width:200, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
              {label:'<?php echo lang('mm_masters_equipment_calibration_Modal_table_label_attachmentData');?>',name:'calibrationAttachment',index:'calibrationAttachment', width:200, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
              {label:'<?php echo lang('mm_masters_equipment_calibration_Modal_table_label_report_number');?>',name:'equipment_calibration_report_number',index:'equipment_calibration_report_number', width:200, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
              {label:'<?php echo lang('mm_masters_equipment_calibration_Modal_table_label_calibration_date');?>',name:'equipment_calibration_date',index:'equipment_calibration_date', width:150, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
              {label:'<?php echo lang('mm_masters_equipment_calibration_Modal_table_label_calibration_by');?>',name:'equipment_calibration_by',index:'equipment_calibration_by', width:150, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
              {label:'<?php echo lang('mm_masters_equipment_calibration_Modal_table_label_calibration_due_date');?>',name:'equipment_calibration_due_date',index:'equipment_calibration_due_date', width:200, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},

              {label:'<?php echo lang('mm_masters_equipment_calibration_Modal_table_label_createBy');?>',name:'first_name',index:'first_name', width:150, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
              {label:'<?php echo lang('mm_masters_equipment_calibration_Modal_table_label_createOn');?>',name:'equipment_calibration_createOn',index:'equipment_calibration_createOn', width:150,resizable: false},    
              {label:'<?php echo lang('mm_masters_equipment_calibration_Modal_table_label_updateBy');?>',name:'firstname',index:'firstname', width:150, sortable:false, hidden:true, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},   
              {label:'<?php echo lang('mm_masters_equipment_calibration_Modal_table_label_updateon');?>',name:'equipment_calibration_updateOn',index:'equipment_calibration_updateOn', width:150, sortable:false, hidden:true, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}} 

              ],
              postData: { 'equipmentID': row_id},        
              rowNum:5,
              rowList:[10,15,20,25],
              pager: pager_id,
              sortname: 'equipment_calibration_id',
              viewrecords: true,
              sortorder: "desc",
              autowidth: true,
              //width:780,
              loadonce: true,
              shrinkToFit: false,
              forceFit:true,
              hoverrows: true,
              height: '100%',
              toolbar: [true,"top"],
              emptyrecords: "No records to view",
              loadtext: "Loading...",
              colMenu:true,
              height:200  // true by default, can be switched to false if highlight on hover is not needed
          });
          //jQuery("#"+subgrid_table_id).jqGrid('navGrid',"#"+pager_id,{edit:false,add:false,del:false, search:false,refresh:false});


    var colModels = jQuery("#"+subgrid_table_id).jqGrid ('getGridParam', 'colModel');
    var remapColumns = jQuery("#"+subgrid_table_id).jqGrid ('getGridParam', 'remapColumns');

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

    jQuery("#"+subgrid_table_id).jqGrid(
      'navGrid',
      '#'+pager_id,
      {
        edit:false, add:false, del:false, search:true,refresh:true,
        beforeRefresh: function(){
          jQuery("#"+subgrid_table_id).jqGrid('setGridParam',{datatype:'json',page:1}).trigger('reloadGrid')}
      },
      {},{},{},{width:600}
    );

    jQuery("#"+subgrid_table_id).jqGrid('navButtonAdd','#'+pager_id,{ caption: "Reorder Columns", buttonicon : "octicon octicon-calendar",title: "Reorder Columns", onClickButton : function (){ jQuery("#"+subgrid_table_id).jqGrid('columnChooser') } });
        <?php if($this->mcommon->getISUserPermission('Equipment Sub Grid add and edit',$this->session->userdata('user_id'))){?>

          $("#t_"+subgrid_table_id).append('<a href="javascript:void(0)" class="btn btn-success waves-effect waves-light m-r-5 m-l-5 pull-left" data-toggle="modal" data-target=".bs-example-modal-lg" onclick="addcalibrationModal('+row_idValue+')" data-backdrop="static" data-keyboard="false"><?php echo lang('mm_masters_equipment_manage_form_subgrid_add_button_name');?></a>');
          <?php }?>
          /*$("#t_"+subgrid_table_id).append('<a href="javascript:void(0)" class="btn btn-success waves-effect waves-light m-r-5 m-l-5 pull-left" data-toggle="modal" data-target=".bs-example-modal-lg" onclick="batchNDTModal('+row_idValue+')" data-backdrop="static" data-keyboard="false">Add New Equipment'+row_idValue+'</a>');
          $("input","#t_"+subgrid_table_id).click(function(){
            alert("Hi! I'm added button at this toolbar");
          });*/


        },
        subGridRowColapsed: function(subgrid_id, row_id) {
          // this function is called before removing the data
          var subgrid_table_id;
          subgrid_table_id = subgrid_id+"_t";
          jQuery("#"+subgrid_table_id).remove();
        }

         
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
        { "numberOfColumns": 3, "titleText": "Check List", "startColumnName": "checkListReport" },
        { "numberOfColumns": 3, "titleText": "NDT", "startColumnName": "ndtRequest" }
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

  function addcalibrationModal(equipmentID)
  {
    $.ajax({
      type: "GET",
      url: "<?php echo site_url('masters/Equipment/getupdateCalibrationDetailsModal'); ?>", 
      data: { equipmentID:equipmentID},
      dataType:"html",
      success: function(html1)
      {
        //alert(html1);
        $('#commonDetailsModal').removeAttr('style');

        $('#commonDetailsModal').html(html1);
        //$('.select2').select2();


            /*var today = new Date();
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
            });*/

            $("#equipment_calibration_date").datepicker({
              todayHighlight: true,
              format: 'dd-mm-yyyy',
              autoclose:true,
              minDate: 0,
              onSelect: function (date) {
                  var date2 = $('#equipment_calibration_date').datepicker('getDate');
                  date2.setDate(date2.getDate() + 1);
                  console.log(date2);
                  $('#equipment_calibration_due_date').datepicker('setDate', date2);
                  //sets minDate to dt1 date + 1
                  $('#equipment_calibration_due_date').datepicker('option', 'minDate', date2);
              }
            });
            $('#equipment_calibration_due_date').datepicker({
                format: 'dd-mm-yyyy',
                autoclose:true,              
                onClose: function () {
                    var dt1 = $('#equipment_calibration_date').datepicker('getDate');
                    console.log(dt1);
                    var dt2 = $('#equipment_calibration_due_date').datepicker('getDate');
                    if (dt2 <= dt1) {
                        var minDate = $('#equipment_calibration_due_date').datepicker('option', 'minDate');
                        $('#equipment_calibration_due_date').datepicker('setDate', minDate);
                    }
                }
            });


/*

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
              });*/

              $('.datepicker-autoclose').keyup(function () {
                if (this.value.match(/[^0-9]/g)) {
                    this.value = this.value.replace(/[^0-9^-]/g, '');
                }
            });


      },
    });
  }

  function addEquipmentAdditionalDataModal(equipmentID)
  {
    $.ajax({
      type: "GET",
      url: "<?php echo site_url('masters/Equipment/getupdateEquipmentAdditionalDetailsModal'); ?>", 
      data: { equipmentCalibrationID:equipmentID},
      dataType:"html",
      success: function(html1)
      {
        //alert(html1);
        //$('#commonDetailsModal').removeAttr('style');

        $('#commonDetailsModal').html(html1);
        
      },
    });
  }

  function addEquipmentPressureDataModal(equipmentID)
  {
    $.ajax({
      type: "GET",
      url: "<?php echo site_url('masters/Equipment/getupdateEquipmentPressureDetailsModal'); ?>", 
      data: { equipmentCalibrationID:equipmentID},
      dataType:"html",
      success: function(html1)
      {
        //alert(html1);
        $('#commonDetailsModal').removeAttr('style');

        $('#commonDetailsModal').html(html1);


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

        $('.datepicker-autoclose1').datepicker({
          todayHighlight: true,
          format: 'dd-mm-yyyy',
          autoclose:true,
        });
        $('.datepicker-autoclose1').keyup(function () {
          if (this.value.match(/[^0-9]/g)) {
            this.value = this.value.replace(/[^0-9^-]/g, '');
          }
        });
        

      },
    });
  }

  function addEquipmentTemperatureDataModal(equipmentID)
  {
    $.ajax({
      type: "GET",
      url: "<?php echo site_url('masters/Equipment/getupdateEquipmentTemperatureDetailsModal'); ?>", 
      data: { equipmentCalibrationID:equipmentID},
      dataType:"html",
      success: function(html1)
      {
        //alert(html1);
        $('#commonDetailsModal').removeAttr('style');

        $('#commonDetailsModal').html(html1);


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

        $('.datepicker-autoclose1').datepicker({
          todayHighlight: true,
          format: 'dd-mm-yyyy',
          autoclose:true,
        });
        $('.datepicker-autoclose1').keyup(function () {
          if (this.value.match(/[^0-9]/g)) {
            this.value = this.value.replace(/[^0-9^-]/g, '');
          }
        });

      },
    });
  }



function equipmentAttachementModal(equipmentID){
  $.ajax({
    type: "GET",
    url: "<?php echo site_url('masters/Equipment/getupdateEquipmentAttachementModal'); ?>", 
    data: { equipmentCalibrationID:equipmentID},
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
          $('.select2').select2();
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
            $('.select2').select2();
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
            $('.select2').select2();

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


function conformboxdeleteCalibration(url)
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
        

  