

<?php
// Last Updated by S.jegatheesh 06/08/2016 8:30 AM
if(isset($value) && !empty($value))
{
    foreach($value->result() as $row)
    {
      $holiday_id       = $row->holiday_id;
      $holiday_type     = $row->holiday_type;       
      $holiday_fromDate = $row->holiday_fromDate;       
      $holiday_toDate   = $row->holiday_toDate;       
      $holiday_name     = $row->holiday_name;       
      $holiday_message  = $row->holiday_message;       
      $holiday_status   = $row->holiday_status;       
    }
}
else
{
    $holiday_id         = $this->input->post('holiday_id');
    $holiday_type       = $this->input->post('holiday_type');
    $holiday_fromDate   = $this->input->post('holiday_fromDate');
    $holiday_toDate     = $this->input->post('holiday_toDate');
    $holiday_name       = $this->input->post('holiday_name');
    $holiday_message    = $this->input->post('holiday_message');
    $holiday_status     = $this->input->post('holiday_status');
}
?>
  <!-- /.start form -->
  <div class="row">
    <div class="col-md-12">
      <div class="white-box">
       <!--
        <h3 class="box-title m-b-0"><?php echo $form_tittle;?></h3>
        <p class="text-muted m-b-30 font-13"> <?php echo $form_tittle_small;?> </p>
        -->
        <?php
        if($this->session->flashdata('res'))
        {
          ?>
          <div class="alert alert-<?php echo $this->session->flashdata('res_type'); ?> successmessage">
            <?php   echo $this->session->flashdata('res'); ?>
          </div>
          <?php
        }
        ?>
        <?php
          if( isset($fromdate)  && $fromdate!='-1' )
          {
              $fromdate= ($fromdate!='' && $fromdate!='-1') ? date('Y-m-d',strtotime($fromdate)) : '-1';
          }
          else
          {
              $fromdate= '-1';
          }
          if( isset($todate) && $todate!='-1')
          {
              $todate= ($todate!='' && $todate!='-1') ? date('Y-m-d',strtotime($todate)) : '-1';
          }
          else
          {
              $todate= '-1';
          }

          if(isset($od_status))
          {
               $od_status= ($od_status!='' && $od_status!='-1') ? $od_status : '-1';
          }
          else
          {
              $od_status= '-1';
          }

          if(isset($od_deliveryMethod))
          {
               $od_deliveryMethod= ($od_deliveryMethod!='' && $od_deliveryMethod!='-1') ? $od_deliveryMethod : '-1';
          }
          else
          {
              $od_deliveryMethod= '-1';
          }
          ?>

        <div class="row">
          <div class="col-sm-12 col-xs-12">
            <?php echo form_open_multipart($form_url); ?>

              <div class="row">
                
                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('fromdate')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('manage_store_holiday_holiday_fromDate_label');?></label>
                    <div class="input-group">
                      <input type="text" class="form-control datepicker-autoclose"  name="fromdate"  placeholder="<?php echo lang('manage_store_holiday_holiday_fromDate_label');?>" value="<?php echo ($fromdate!='-1' && $fromdate!='0000-00-00') ? date('m/d/Y',strtotime($fromdate)) : '';?>"> 
                      <span class="input-group-addon"><i class="icon-calender"></i></span> 
                    </div>
                  </div>
                </div>

                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('todate')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('manage_store_holiday_holiday_toDate_label');?></label>
                    <div class="input-group">
                      <input type="text" class="form-control datepicker-autoclose"  name="todate"  placeholder="<?php echo lang('manage_store_holiday_holiday_toDate_label');?>" value="<?php echo ($todate!='-1' && $todate!='0000-00-00') ? date('m/d/Y',strtotime($todate)) : '';?>"> 

                      <span class="input-group-addon"><i class="icon-calender"></i></span> 
                    </div>
                  </div>
                </div>

                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('page_show_status')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('orders_mCard_table_label_orderstatus');?></label>
                      <select class="form-control select2" name="od_status">
                        <option value="-1"  <?php if($od_status=='-1'){?> selected <?php }?>><?php echo lang('mm_category_cat_Select_label');?></option> 
                      <?php 
                      foreach ($order_status as $key => $value)
                      {
                        ?>
                        <option value="<?php echo $value->status_id;?>" <?php if($value->status_id==$od_status){?> selected <?php }?>><?php echo $value->status_name;?></option>
                        <?php 
                      }
                      ?>
                      </select>
                  </div>
                </div>

                <div class="col-sm-3 col-xs-3">
                  <div class="form-group <?PHP if(form_error('page_show_status')){ echo 'has-error';} ?>">
                    <label for="exampleInputEmail1"><?php echo lang('orders_mCard_table_label_delivery_method');?></label>
                      <select class="form-control select2" name="od_deliveryMethod">

                        <option value="-1"  <?php if($od_deliveryMethod=='-1'){?> selected <?php }?>><?php echo lang('mm_category_cat_Select_label');?></option>                      
                        <option value="1" <?php if($od_deliveryMethod=='1'){?> selected <?php }?>><?php echo lang('Immediate');?></option>
                        <option value="2" <?php if($od_deliveryMethod=='2'){?> selected <?php }?>><?php echo lang('Später');?></option>
                        <option value="3" <?php if($od_deliveryMethod=='3'){?> selected <?php }?>><?php echo lang('SelfPickUp');?></option>
                                                
                      </select>
                  </div>
                </div>

              </div>

              <div class="text-center">
                <input type="hidden" name="holiday_id" value="<?php echo $holiday_id;?>">
                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="Submit"><?php echo lang('btn_search');?></button>
                <button type="submit" class="btn btn-inverse waves-effect waves-light"><?php echo lang('btn_Cancel');?></button>
              </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.end form -->

  <!-- /Staert List -->
  <script type="text/javascript">
    $(document).ready(function() {
      var oTable = $('#example').dataTable( {
          "bProcessing": true,
          responsive: true,
          "sAjaxSource": '<?php echo base_url().$datatable_url.'/'.$fromdate.'/'.$todate.'/'.$od_status.'/'.$od_deliveryMethod; ?>',
                  "bJQueryUI": true,
                  "sPaginationType": "full_numbers",
                  "iDisplayStart ":20,
                  "oLanguage": {
              "sProcessing": "<img src='<?php echo base_url(); ?>img/ajax-loader_dark.gif'>"
          },  
          "fnInitComplete": function() {
                  //oTable.fnAdjustColumnSizing();
           },
              'fnServerData': function(sSource, aoData, fnCallback)
              {
                $.ajax
                ({
                  'dataType': 'json',
                  'type'    : 'POST',
                  'url'     : sSource,
                  'data'    : aoData,
                  'success' : fnCallback
                });
              }
      } );
      //setInterval(function() {oTable.fnReloadAjax(null)}, 5000);
  } );
  </script>
                   
  <div class="row">
    <div class="col-sm-12">
    <?php
    if($this->session->flashdata('res'))
    {
      ?>
      <div class="alert alert-<?php echo $this->session->flashdata('res_type'); ?>">
        <?php   echo $this->session->flashdata('res'); ?>
      </div>
      <?php
    }
    ?>

    

      <div class="white-box">
        <div class="row"  >
          <div class="col-md-12">
              <div class="row">
                  <div class="col-md-10" >
                    <span style="display:none;" id="submitButton">
                        <button type="button" class="btn btn-primary btn-addon m-b-sm" data-toggle="modal" data-target=".bs-example-modal-lg" onclick="updateDeleteModal()"  data-backdrop="static" data-keyboard="false"><i class="fa fa-eye"></i> Check List </button>
                        <br><br>
                    </span>
                  </div>

                  <div class="col-md-2">
                      <a href="<?php echo base_url().$print_url.'/'.$fromdate.'/'.$todate.'/'.$od_status.'/'.$od_deliveryMethod;?>"   class="btn btn-primary btn-addon m-b-sm pull-right" ><i class="fa fa-print"></i> <?php echo lang('btn_print');?> </a>
                      <br><br>
                  </div>

              </div>
          </div>
        </div>

      <!--
        <h3 class="box-title m-b-0"><?php echo $list_tittle;?></h3>
        <p class="text-muted m-b-30"><?php echo $list_tittle_small;?></p>
        -->
        <?php 
        if($list_button_show=='1')
        {
          ?>
          <div class="text-right">
                <a href="<?php echo base_url().$list_button_url;?>" class="btn btn-primary waves-effect waves-light m-r-10"> <?php echo lang('btn_manage_viewlist');?> </a>
          </div>
          <?php 
        }
        ?>
        
          <?php 
              echo $this->table->generate(); 
          ?>
      </div>

      
      <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false" id="Company Modal">
          <div class="modal-dialog modal-lg" id="ProductDetailsTag">
          </div>
      </div>

    </div>
  </div>

  

  <script>
function proceedToOrder()
{
    if($('input[name="pd_ids[]"]:checked').length > 0)
    {
        $('#submitButton').css('display', 'block');
    }else
    {
        $('#submitButton').css('display', 'none');
    }
}

function updateDeleteModal()
{
    var tagGroup = new Array();
    $.each($("input[name='pd_ids[]']:checked"), function()
    {
        tagGroup.push($(this).val());
    });
     //alert('<?php echo site_url('order/Order/getupdateDeleteModal'); ?>');
    $.ajax({
        type: "GET",
        url: "<?php echo site_url('order/Order/getupdateDeleteModal'); ?>", 
        data: { tagGroup:tagGroup},
        dataType:"html",
        success: function(html1)
        {
          //alert(html1);
            $('#ProductDetailsTag').html(html1);
            $('#pd_modal').select2();
            

        },
    });
}

/*
function updateDelete(sucessUrl)
{
    var tagGroup = new Array();
    $.each($("input[name='pd_nos[]']:checked"), function()
    {
        tagGroup.push($(this).val());
    });


arguments = '1';

    if(arguments!= null)
      {
        if(window.confirm('Are you sure you want to delete???'))
        {
          $.ajax({
                type: "POST",
                url: "<?php echo site_url('product/Product/getupdateDelete'); ?>", 
                data: { tagGroup:tagGroup,sucessUrl:sucessUrl},
                dataType:"html",
                success: function(html1)
                {
                    window.location.href = "<?php echo site_url('product/Product/'); ?>"+html1;
                },
            });
        }
        else
        {
          event.cancelBubble = true;
          event.returnValue = false;
          return false;
        }
      }
      else
      {
        return false;
      }
      return;
}
*/

</script>
