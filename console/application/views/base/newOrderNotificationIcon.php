      <?php
      $check_order_cons_array = array('od_status' => '4','st_storeID'=>$this->session->userdata('st_storeID'));
      $check_new_order=$this->mcommon->specific_record_counts('pzo_orders',$check_order_cons_array);
      if($check_new_order>0)
      {
      ?>
      
          <span class="heartbit"></span><span class="point"></span>
      
     
      <?php
      }
      ?>