
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
  } );
  </script>
                   
  <div class="row">
    <div class="col-sm-12">
      <div class="white-box">
      <!--
        <h3 class="box-title m-b-0"><?php echo $list_tittle;?></h3>
        <p class="text-muted m-b-30"><?php echo $list_tittle_small;?></p>
      -->
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
          <?php 
              echo $this->table->generate(); 
          ?>
      </div>
    </div>
  </div>

  