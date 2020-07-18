  <?php
    $this->mcommon->getCheckUserPermissionHead('NDT Contractor',true);
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
            if($this->mcommon->getISUserPermission('NDTContractor add and edit',$this->session->userdata('user_id'))){
              ?>
              <span class="pull-left">
                <a href="<?php echo base_url().$add_button_url;?>" class="btn btn-success waves-effect waves-light m-r-10 pull-right" ><?php echo lang('mm_Hrm_NDTContractor_manage_form_add_button_name');?></a>
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
                if($this->mcommon->getISUserPermission('NDTContractor all details download excel',$this->session->userdata('user_id'))){
                  ?>
                  <button id="excel" class="btn btn-primary btn-addon m-b-sm pull-right"><i class="fa fa-file-excel-o"></i> <?php echo lang('helper_common_excel_label');?></button>
                  <?php
                }
                if($this->mcommon->getISUserPermission('NDTContractor all details download pdf',$this->session->userdata('user_id'))){
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
        <?php if($this->mcommon->getISUserPermission('NDTContractor add and edit',$this->session->userdata('user_id'))){?>
          {label:'<?php echo lang('common_table_label_edit_operation');?>' ,name:'edit_ndtContractor_id',index:'edit_ndtContractor_id', width:75, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
        <?php } if($this->mcommon->getISUserPermission('NDTContractor delete',$this->session->userdata('user_id'))){?>
          {label:'<?php echo lang('common_table_label_delete_operation');?>' ,name:'delete_ndtContractor_id',index:'delete_ndtContractor_id', width:75, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
        <?php }?>
           {label:'<?php echo lang('mm_Hrm_NDTContractor_table_label_NDTContractor_name');?>',name:'ndtContractor_name',index:'ndtContractor_name', width:250, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_Hrm_NDTContractor_table_label_NDTContractor_email');?>',name:'ndtContractor_email',index:'ndtContractor_email', width:200, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_Hrm_NDTContractor_table_label_NDTContractor_abbr');?>',name:'ndtContractor_abbr',index:'ndtContractor_abbr', width:150, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},

          {label:'<?php echo lang('mm_Hrm_NDTContractor_table_label_NDTContractor_phone');?>',name:'ndtContractor_phone',index:'ndtContractor_phone', width:200, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_Hrm_NDTContractor_table_label_NDTContractor_office_no');?>',name:'ndtContractor_office_no',index:'ndtContractor_office_no', width:150, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          
          {label:'<?php echo lang('mm_Hrm_NDTContractor_table_label_NDTContractor_fax');?>',name:'ndtContractor_fax',index:'ndtContractor_fax', width:150, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_Hrm_NDTContractor_table_label_NDTContractor_website');?>',name:'ndtContractor_website',index:'ndtContractor_website', width:150, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}, align:'center'},
          {label:'<?php echo lang('mm_Hrm_NDTContractor_table_label_NDTContractor_photo');?>',name:'ndtContractor_photo',index:'ndtContractor_photo', width:150, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}, align:'center'},
          {label:'<?php echo lang('mm_Hrm_NDTContractor_table_label_NDTContractor_address');?>',name:'ndtContractor_address',index:'ndtContractor_address', width:150, sortable:false, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_Hrm_NDTContractor_table_label_createBy');?>',name:'first_name',index:'first_name', width:150, sortable:false, hidden:true, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},
          {label:'<?php echo lang('mm_Hrm_NDTContractor_table_label_createOn');?>',name:'ndtContractor_createOn',index:'ndtContractor_createOn', width:150, sortable:false, hidden:true, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},    
          {label:'<?php echo lang('mm_Hrm_NDTContractor_table_label_updateBy');?>',name:'firstname',index:'firstname', width:150, sortable:false, hidden:true, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}},   
          {label:'<?php echo lang('mm_Hrm_NDTContractor_table_label_updateon');?>',name:'ndtContractor_updateOn',index:'ndtContractor_updateOn', width:150, sortable:false, hidden:true, coloptions : {sorting:true, columns: true, filtering: true, grouping:true, freeze : true}} 
        ],
        
        //postData: { page: 1,rows: 1},        
        rowNum:10,
        rowList:[10,25,50,100],
        pager: jQuery('#dataTablePager2'),
        sortname: 'ndtContractor_id',
        viewrecords: true,
        sortorder: "desc",
        autowidth: true,
        loadonce: true,
        shrinkToFit: false,
        forceFit:true,
        emptyrecords: "No records to view",
        loadtext: "Loading...",
        colMenu:true,
        height:300,
        hoverrows: true, // true by default, can be switched to false if highlight on hover is not needed


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
          title: '<?php echo lang('mm_Hrm_NDTContractor_pdfTitle');?>',
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
  </script>
        

  