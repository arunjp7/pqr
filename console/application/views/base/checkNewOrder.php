<?php
      $check_order_cons_array = array('od_status' => '4','st_storeID'=>$this->session->userdata('st_storeID'));
      $check_new_order=$this->mcommon->specific_record_counts('pzo_orders',$check_order_cons_array);
      if($check_new_order>0)
      {
      ?>
      
          <audio autoplay loop>
              <source src="<?php echo base_url();?>alert.wav" type="audio/wav">
          </audio>
      
      <!--[if IE]>
      <embed height='50' hidden="true" width='100' src='alert.wav'>
      <![endif]-->
      <?php
      }
      ?>