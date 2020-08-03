  <?php
    $this->mcommon->getCheckUserPermissionHead('Cleaning Method',true);
  ?> 

  

<!-- content starts here -->
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
                    if($this->mcommon->getISUserPermission('Cleaning Method add and edit',$this->session->userdata('user_id'))){
                      ?>
                      <span class="pull-left">
                        <a href="<?php echo base_url().$add_button_url;?>" class="btn btn-sm btn-success waves-effect waves-light m-r-10 pull-right" ><?php echo lang('mm_masters_cleaning_manage_form_add_button_name');?></a>
                      </span>
                      <?php
                    }
                  ?>
                  <?php /* 
                          echo $this->table->generate(); */
                  ?>
                  <span class="pull-right">
                  <?php 
                    if($this->mcommon->getISUserPermission('Cleaning Method all details download excel',$this->session->userdata('user_id'))){
                      ?>
                      <button id="excel" class="btn-sm btn-primary btn-addon m-b-sm pull-right"><i class="fa fa-file-excel-o"></i> <?php echo lang('helper_common_excel_label');?></button> 
                      <?php
                    }
                    if($this->mcommon->getISUserPermission('Cleaning Method all details download pdf',$this->session->userdata('user_id'))){
                      ?>
                      <button id="pdf" class="btn-sm btn-primary btn-addon m-b-sm pull-right m-r-10"><i class="fa fa-file-pdf-o"></i> <?php echo lang('helper_common_pdf_label');?></button>
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
            <!-- Datatable  -->
            
              
        
        </div>
      </div>
    </div>

</div>

</div>

  

  <!-- /.end form -->

  <!-- /Start List -->
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
        <?php if($this->mcommon->getISUserPermission('Cleaning Method add and edit',$this->session->userdata('user_id'))){?>
          {label:'<?php echo lang('common_table_label_edit_operation');?>' ,name:'edit_cleaning_id',index:'edit_cleaning_id', width:120, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
        <?php } if($this->mcommon->getISUserPermission('Cleaning Method delete',$this->session->userdata('user_id'))){?>
          {label:'<?php echo lang('common_table_label_delete_operation');?>' ,name:'delete_cleaning_id',index:'delete_cleaning_id', width:120, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
        <?php }?>

           {label:'<?php echo lang('mm_masters_cleaning_table_label_cleaning_name');?>',name:'cleaning_name',index:'cleaning_name', width:200, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_masters_cleaning_table_label_createBy');?>',name:'first_name',index:'first_name', width:250, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_masters_cleaning_table_label_createOn');?>',name:'createOn',index:'createOn', width:250, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},    
          {label:'<?php echo lang('mm_masters_cleaning_table_label_updateBy');?>',name:'firstname',index:'firstname', width:250, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},   
          {label:'<?php echo lang('mm_masters_cleaning_table_label_updateon');?>',name:'updateOn',index:'updateOn', width:250, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}} 
        ],
        
        //postData: { page: 1,rows: 1},        
        rowNum:10,
        rowList:[10,25,50,100],
        pager: jQuery('#dataTablePager2'),
        sortname: 'cleaning_id',
        viewrecords: true,
        sortorder: "desc",
        autowidth: true,
        loadonce: true,
        shrinkToFit: false,
        forceFit:true,
        hoverrows: true, // true by default, can be switched to false if highlight on hover is not needed
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
          $("#dataTableList2").jqGrid("exportToPdf",{
            title: '<?php echo lang('mm_masters_cleaning_pdfTitle');?>',
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
        //$('#dataTableList2').jqGrid('exportToExcel');
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
 

  });
  </script>
        

  