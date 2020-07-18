<?php
// Codeigniter object initialized here 
//for call menu item based on item type in edit
$ci =&get_instance();
//Load model for menu item dropdown

?>
<style>
	body
	{
		height: 100%;
		font-family: "Roboto";
		font-size:13px;
		line-height:15px !important;
		font-weight:500;
	}

	th
	{
		font-size: 11px;
		font-weight: 800 !important;
		color: #333;
		text-align: center;
	}

	td
	{
		color: #000;
		font-size: 11px;
	}
	span 
	{
		font-size: 10px;
		margin: 0;
		padding: 0;
	}
	.bgcolorgray
	{
		background-color: #ccc;
		color:#000;
	}
	.bo-t
	{
		border-top: 1px solid #000;
	}
	.bo-b
	{
		border-bottom: 1px solid #000;
	}
	.bo-bb
	{
		border-bottom: 2px solid #000;
	}
	.bo-r
	{
		border-right: 1px solid #000;
	}
	.bo-l
	{
		border-left: 1px solid #000;
	}
</style> 

<table width="100%" cellspacing="0" cellpadding="0" rules="all" class="table" border="0">
  	<tr>
	    <td align="left">
			<table width="100%" cellspacing="0" cellpadding="5" border="0" rules="row" class="table">
	    		<tr class="bgcolorgray">
	    			<td align="center" class="bo-t bo-bb"><h2><?php echo $pdf_title;?></h2></td>
	    		</tr>
	    	</table>
	    </td>
  	</tr>

  	<tr>
	    <td align="left">
			<table width="100%" cellspacing="0" cellpadding="5" border="0" rules="row" class="table">
	    		<tr>
	    			<td align="center" class="">&nbsp;</td>
	    		</tr>
	    	</table>
	    </td>
  	</tr>




  <tr>
    <td>
		<table width="100%" height="600" cellspacing="0" cellpadding="10" border="0" rules="row" class="table">
          <tr class="bgcolorgray">
            <th width="9%" class="bo-t bo-r bo-l"><strong><?php echo lang('common_message_si_no');?></strong></th>
            <th width="60%" class="bo-t bo-r bo-l"><strong><?php echo lang('mm_Hrm_ECContractor_name');?></strong></th>
            <th width="31%" class="bo-t bo-r bo-l"><strong><?php echo lang('mm_Hrm_ECContractor_abbr');?></strong></th>
          </tr>
          <?php
			if(isset($pdf_Details) && !empty($pdf_Details))
			{
				$i=1;
		        foreach($pdf_Details->result() as $pdfDetail)
		        {
		      		?>
		      		<tr>
			            <td width="9%" class="bo-t bo-r bo-l"><?php echo $i++;?></td>
			            <td width="60%" class="bo-t bo-r bo-l"><?php echo $pdfDetail->ecContractor_name ;?></td>
			            <td width="31%" class="bo-t bo-r bo-l"><?php echo $pdfDetail->ecContractor_abbr ;?></td>
		            </tr>
		      		<?php
		        }
		    }
  			?>
        </table>
    </td>
  </tr>
  <tr>
    <td>
		<table width="100%" cellspacing="0" cellpadding="5" border="0" rules="row" class="table">
          <tr>
            <td colspan="5" align="left" class="bo-t" >&nbsp;</td>
          </tr>
        </table>
    </td>
  </tr>
<!--
  <tr>
    <td>
		<table width="100%" cellspacing="0" cellpadding="5" border="0" rules="row" class="table">
          <tr>
            <td colspan="5" align="left" class="bo-t bo-bb" ><strong> THIS IS COMPUTER GENERATED INVOICE DOES NOT REQUIRE SIGNATURE </strong>   </td>
          </tr>
        </table>
    </td>
  </tr>
-->
</table><br><br>
