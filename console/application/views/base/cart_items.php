
<ul class="basic-list">
	                			
	<?php 
    if(empty($cartitems))
    {
      ?>
      <li class="text-center">
        <h1><div data-icon="A" class="linea-icon linea-ecommerce"></div></h1>
        Your cart is empty!
      </li>
      <?php
    }
		foreach ($cartitems as $keys => $citem) 
		{
		?>
    <li>
    	<div class="row">
    		<div class="col-md-2">
    			<a class="add-to-carts" data-mcardid="<?php echo $citem->mCard_ID;?>" data-catid="<?php echo $citem->cat_id;?>" data-catsizeid="<?php echo $citem->catSize_id;?>" href="javascript:void(0);" style="color: #03bb0a; font-size: 16px;">
  					<i data-icon="&#xe00d;" class="linea-icon linea-aerrow"></i>
      			</a> &nbsp;
      			<a href="javascript:void(0);" class="delete-from-cart" data-cartid="<?php echo $citem->cart_id;?>" class="text-red" style="color: #ff0000; font-size: 16px;">
      				<i data-icon="&#xe00c;" class=" linea-icon linea-aerrow"></i>
      			</a>
    		</div>
    		<div class="col-md-8">
    			<Strong><span class="label label-primary"><?php echo $citem->cart_qty;?></span> X <?php echo $citem->mCard_name;?></Strong><br>
    			<small><?php echo strip_tags($citem->mCard_description);?></small>
    		</div>
    		<div class="col-md-2 pull-right">
    			<small>&euro;<?php echo number_format($citem->cart_qty*$citem->mCartRate_price,'2',',','3');?></small>
    		</div>
    	</div>
    </li>
    <?php
	}
    ?>
</ul>
<hr />
<?php 
if(!empty($cartitems))
{
?>
<div class="pull-right m-t-30 text-right">
  <p>Inclusive of tax: <?php echo number_format($this->webmodel->taxTotal(),'2',',','3');?>&euro;</p>
  <p>Fahrkosten (+): <?php echo number_format($this->webmodel->drivingCost(),'2',',','3');?>&euro;</p>
  <p>Website Angebot (-): <?php echo number_format('3.00','2',',','3');?>&euro;</p>
  <hr>
  <h3><b>Total :</b> <?php echo number_format($this->webmodel->cartTotal()-'3.00','2',',','3');?>&euro;</h3>
</div>
<div class="row">
  <div class="col-md-12 text-center">
    <?php
      //CHECK MINIMUM ORDER VALUE
      if($this->webmodel->cartTotalWithoutDrivingCost() > $this->webmodel->mov())
      {
        if ($this->ion_auth->logged_in())
        {
        ?>
         <a href="<?php echo base_url();?>checkout/#/delivery" class="btn btn-primary btn-rounded waves-effect waves-light"><b class="text-white">Proceed to checkout</b></a>
        
        <?php
        }
        else
        {
          ?>
          <a href="<?php echo base_url();?>login" class="btn btn-primary btn-rounded waves-effect waves-light"><b class="text-white">Proceed to checkout</b></a>
          <?php
        }
      }
      else
      {
        ?>
        <p>Your order value must be greater than  <?php echo number_format($this->webmodel->mov(),'2',',','3');?>&euro; to proceed to checkout</p>
        <?php
      }
      ?>
      
  </div>
</div>
<?php
}
?>
<script type="text/javascript">
$( document ).ready(function() {
  $('.spinner').hide();
  
  $('.add-to-carts').on('click', function () {
        
        $('.spinner').show();
        var cart = $('.shopping-cart');
        //var imgtodrag = $('<img src="http://localhost/pizzawok/front/plugins/images/users/varun.jpg" />');;
        var mCard_ID =$(this).data('mcardid');
        var cat_id =$(this).data('catid');
        var catSize_id =$(this).data('catsizeid');
        console.log('wow'+cat_id);
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url();?>cart/addtocart',
            data: { 
                'mCard_ID': mCard_ID, 
                'cat_id': cat_id,
                'catSize_id': catSize_id
            },
            success: function(msg)
            {
              //flytobasket(imgtodrag,cart);

              var url = '<?php echo base_url();?>category/shoppingcart';
              $('#shoppingcart').load(url);
              $('.spinner').hide();
            }
        });


  });

  $('.delete-from-cart').on('click', function () {
        
        $('.spinner').show();
        var cart = $('.shopping-cart');
        //var imgtodrag = $('<img src="http://localhost/pizzawok/front/plugins/images/users/varun.jpg" />');;
        var cartid =$(this).data('cartid');
        console.log('wow'+cartid);
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url();?>cart/deletefromcart',
            data: { 
                'cartid': cartid
            },
            success: function(msg)
            {
              //flytobasket(imgtodrag,cart);

              var url = '<?php echo base_url();?>category/shoppingcart';
              $('#shoppingcart').load(url);
              $('.spinner').hide();
            }
        });


  });
 });
</script>