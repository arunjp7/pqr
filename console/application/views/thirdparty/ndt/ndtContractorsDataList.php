           
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
            <span class="pull-left">
              <a href="<?php echo base_url().$add_button_url;?>" class="btn btn-success waves-effect waves-light m-r-10 pull-right" ><?php echo lang('mm_thirdparty_ndtContractors_manage_form_add_button_name');?></a>
            </span>
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

              <button id="excel" class="btn btn-primary btn-addon m-b-sm pull-right"><i class="fa fa-file-excel-o"></i> <?php echo lang('helper_common_excel_label');?></button>
              <button id="pdf" class="btn btn-primary btn-addon m-b-sm pull-right m-r-10"><i class="fa fa-file-pdf-o"></i> <?php echo lang('helper_common_pdf_label');?></button>
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
          {label:'<?php echo lang('mm_thirdparty_ndtContractors_table_label_operation');?>' ,name:'ndtContractors_id',index:'ndtContractors_id', width:120},
           {label:'<?php echo lang('mm_thirdparty_ndtContractors_table_label_ndtContractors_name');?>',name:'ndtContractors_name',index:'ndtContractors_name', width:150},
          {label:'<?php echo lang('mm_thirdparty_ndtContractors_table_label_ndtContractors_email');?>',name:'ndtContractors_email',index:'ndtContractors_email', width:200},
          {label:'<?php echo lang('mm_thirdparty_ndtContractors_table_label_ndtContractors_phone');?>',name:'ndtContractors_phone',index:'ndtContractors_phone', width:200,},
          {label:'<?php echo lang('mm_thirdparty_ndtContractors_table_label_ndtContractors_office_no');?>',name:'ndtContractors_office_no',index:'ndtContractors_office_no', width:150,},
          
          {label:'<?php echo lang('mm_thirdparty_ndtContractors_table_label_ndtContractors_fax');?>',name:'ndtContractors_fax',index:'ndtContractors_fax', width:150,},
          {label:'<?php echo lang('mm_thirdparty_ndtContractors_table_label_ndtContractors_website');?>',name:'ndtContractors_website',index:'ndtContractors_website', width:150,},
          {label:'<?php echo lang('mm_thirdparty_ndtContractors_table_label_ndtContractors_abbreviations');?>',name:'ndtContractors_abbreviations',index:'ndtContractors_abbreviations', width:150,},
          {label:'<?php echo lang('mm_thirdparty_ndtContractors_table_label_ndtContractors_address');?>',name:'ndtContractors_address',index:'ndtContractors_address', width:150,},


          
          {label:'<?php echo lang('mm_thirdparty_ndtContractors_table_label_createBy');?>',name:'first_name',index:'first_name', width:100,},
          {label:'<?php echo lang('mm_thirdparty_ndtContractors_table_label_createOn');?>',name:'ndtContractors_createOn',index:'ndtContractors_createOn', width:150},    
          {label:'<?php echo lang('mm_thirdparty_ndtContractors_table_label_updateBy');?>',name:'firstname',index:'firstname', width:100},   
          {label:'<?php echo lang('mm_thirdparty_ndtContractors_table_label_updateon');?>',name:'ndtContractors_updateOn',index:'ndtContractors_updateOn', width:150, sortable:false} 
        ],
        
        //postData: { page: 1,rows: 1},        
        rowNum:10,
        rowList:[10,25,50,100],
        pager: jQuery('#dataTablePager2'),
        sortname: 'ndtContractors_id',
        viewrecords: true,
        sortorder: "desc",
        autowidth: true,
        loadonce: true,
        shrinkToFit: false,
        forceFit:true,
        hoverrows: true, // true by default, can be switched to false if highlight on hover is not needed

    });
    jQuery("#dataTableList2").jqGrid('navGrid','#dataTablePager2',{edit:false, add:false, del:false, search:false,refresh:false});

    $("#pdf").on("click", function(){
        $("#dataTableList2").jqGrid("exportToPdf",{
          title: '<?php echo lang('mm_thirdparty_ndtContractors_pdfTitle');?>',
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
 

  } );
  </script>
        

  