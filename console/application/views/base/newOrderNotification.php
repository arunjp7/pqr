<?php
$check_order_cons_array = array('od_status' => '4','st_storeID'=>$this->session->userdata('st_storeID'));
$check_new_order=$this->mcommon->specific_record_counts('pzo_orders',$check_order_cons_array);
$new_orders_array_list=$this->mcommon->specific_fields_records_all('pzo_orders',$check_order_cons_array);
if($check_new_order>0)
{
  foreach ($new_orders_array_list as $key => $value) 
  {
    ?>
    <li> <a href="<?php echo base_url();?>order/Order/OrderDetails/<?php echo $value['od_id'];?>">
      <div>
        <p>New Order <strong>#<?php echo $value['od_id'];?></strong> <span class="pull-right text-muted"><?php echo number_format($value['od_grandTotal'],'2',',','3');?>&euro; </span> </p>
        <small><?php echo $value['od_date'];?></small>
      </div>
      </a> </li>
    <li class="divider"></li>
  <?php
  }
  ?>
<li> <a class="text-center" href="<?php echo base_url();?>order/Order"> <strong>See All Orders</strong> <i class="fa fa-angle-right"></i> </a> </li>
<?php
}
else
{
  ?>
  <li> <a href="javascript:void(0);">
      <div>
        <p>No new orders at this moment!</p>
        <small>Last updated: <?php echo date('Y-m-d H:i:s'); ?></small>
      </div>
      </a> </li>
    <li class="divider"></li>
  <?php
}
?>