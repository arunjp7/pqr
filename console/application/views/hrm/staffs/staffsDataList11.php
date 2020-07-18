           
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
              <a href="<?php echo base_url().$add_button_url;?>" class="btn btn-success waves-effect waves-light m-r-10 pull-right" ><?php echo lang('mm_masters_staffs_manage_form_add_button_name');?></a>
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

        <table id="jqGrid"></table>
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

  revenuegridDataSource = [
        { InvoiceId: "1", InvoiceNo: "22222", Customer_Name: "Customer Name", InvoiceDate: "2007-10-01", SDM_Name: "test", note: "note", Final_Amount: "200.00" },
        { InvoiceId: "2", InvoiceNo: "22223", Customer_Name: "Customer Name", InvoiceDate: "2007-10-01", SDM_Name: "test", note: "note", Final_Amount: "200.00" },
  ];
        $(document).ready(function () {
$("#jqGrid").jqGrid({
data: revenuegridDataSource,
datatype: "local",
//height: 'auto',
//rowNum: 1,
//rowList: [10, 20, 30],
colNames: ['Invoice Id', 'InvoiceNo', 'Customer Name', 'InvoiceDate', 'SDM', 'From', 'To', 'Discount', 'Amount', 'Currency', 'Duration', 'Project Name', 'Recurring', 'Note'],//
colModel: [

{ name: 'InvoiceId', width: 100, hidden: true, key: true },
{ name: 'InvoiceNo', width: 66 },
{ name: 'Customer_Name', width: 251 },
{ name: 'InvoiceDate', width: 80, sorttype: 'date', formatter: 'date', formatoptions: { newformat: 'd M Y' }, datefmt: 'd-M-Y' },
{ name: 'SDM_Name', width: 111 },
{ name: 'From_Date', width: 80, sorttype: 'date', formatter: 'date', formatoptions: { newformat: 'd M Y' }, datefmt: 'd-M-Y' },
{ name: 'To_Date', width: 80, sorttype: 'date', formatter: 'date', formatoptions: { newformat: 'd M Y' }, datefmt: 'd-M-Y' },
{ name: 'Discount', width: 65, formatter: 'number', align: 'right', sorttype: 'number' },
{ name: 'Final_Amount', width: 65, formatter: 'number', align: 'right', sorttype: 'number' },
{ name: 'Currency', width: 80 },
{ name: 'Inv_Duration', width: 80 },
{ name: 'ProjectName', width: 100 },
{ name: 'Recurring', width: 50 },
{ name: 'Invoice_note', width: 240 }
],
//pager: '#dataTablePager2',
//rownumbers: true,
//viewrecords: true,
//sortname: 'name',
gridview: false,
//width: 1319,
//caption: "Search",
//subGrid: true,


rowNum:10,
        rowList:[10,25,50,100],
        pager: jQuery('#dataTablePager2'),
        sortname: 'name',
        viewrecords: true,
        sortorder: "desc",
        autowidth: true,
        loadonce: true,
        shrinkToFit: false,
        forceFit:true,
        hoverrows: true, // true by default, can be switched to false if highlight on hover is not needed


afterInsertRow: function (rowid, rowdata, rawdata) {
  alert("I'm afterInsertRow with id="+  rowid);
},
emptyrecords: "No records found.",


});
    jQuery("#jqGrid").jqGrid('navGrid','#dataTablePager2',{edit:false, add:false, del:false, search:false,refresh:false});

        });

             

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
        

  