
  <!-- /Staert List -->
  <script type="text/javascript">
    $(document).ready(function() {
      var oTable = $('#example').dataTable( {
          "bProcessing": true,
          responsive: true,
          "sAjaxSource": '<?php echo base_url().$datatable_url; ?>',
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
<?php 
  if($list_button_showMultiple=='1')
  {
    ?>

 <div class="row">
    <div class="col-md-12 m-b-20">
      <a href="<?php echo base_url().'masters/FreeExtras';?>" class="btn btn-success waves-effect waves-light m-r-10 pull-right" ><?php echo lang('sub_masters_extra_price_FreeManage');?></a>
     <a href="<?php echo base_url().'masters/ExtraPrice';?>" class="btn btn-success waves-effect waves-light m-r-10 pull-right" ><?php echo lang('sub_masters_extra_price_Manage');?></a>
      <a href="<?php echo base_url().'masters/ExtraPrice/create';?>" class="btn btn-success waves-effect waves-light m-r-10 pull-right" ><?php echo lang('sub_masters_extra_price_Create');?></a>
      <a href="<?php echo base_url().'masters/ExtrasManagement/create';?>" class="btn btn-success waves-effect waves-light m-r-10 pull-right" ><?php echo lang('sub_masters_extras_manage');?></a>
      <a href="<?php echo base_url().'masters/ExtrasCategory/extra_catmanage';?>" class="btn btn-success waves-effect waves-light m-r-10 pull-right" ><?php echo lang('sub_masters_extra_catmanage');?></a>

    </div>
  </div>
      <?php 
      }
      ?>             
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
    </div>
  </div>

  