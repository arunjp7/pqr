<?php 
header('Content-Encoding: UTF-8');
$filename = $export_filename.'.xls';
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Expires: 0");
?>




<?php 
if(isset($export_Details) && !empty($export_Details))
{
    $totalPrices = 0;
    ?>
    <table width="100%" cellspacing="10" cellpadding="10" rules="all" border="1px"  >
        <thead>
        <tr>
            <th style="width:5% !important"><?php echo lang('common_message_si_no');?></th>
            <th style="width:60% !important"><?php echo lang('mm_Hrm_ECContractor_name');?></th>
            <th style="width:35% !important"><?php echo lang('mm_Hrm_ECContractor_abbr');?></th>
        </tr>
        <?php 
        $i='1';
        foreach($export_Details->result() as $exportDetail)
        {
           ?>
            <tr>
                <td widt="5%" style="width:5% !important"><?php echo $i++;?></td>
                <td widt="60%" style="width:5% !important"><?php echo $exportDetail->ecContractor_name ;?></td>
                <td widt="35%" style="width:10% !important"><?php echo $exportDetail->ecContractor_abbr ;?></td>
            </tr>
           <?php
        }
        ?>
        </thead>
        <tfoot style="background: rgba(204, 204, 204, 0.24);color: #34425a;">
            <tr>
                <th colspan="3">&nbsp;</th>
            </tr>
        </tfoot>
    </table>  
    <?php 
    }
    else
    {
        ?>
        <br>
        <table width="100%" cellspacing="10" cellpadding="10" rules="all" border="1px"  >
            <tr>
                <th colspan="10"><center>No Records</center></th>
            </tr>
        </table>   
        <?php 
    }
    ?>


