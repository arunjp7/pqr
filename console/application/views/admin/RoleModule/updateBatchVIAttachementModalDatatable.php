<?php
  if(isset($datatablevalue) && !empty($datatablevalue)){
    $iValue = 1;
    foreach($datatablevalue as $row){ 
      ?>
        <tr>
          <td><?php echo $iValue++;?></td>
          <td><?php echo get_buttons_new_only_Delete1($row['batchVI_attachement_id'],'masters/Batch/getupdateVIAttachementModal');?></td>
          <td>
          <a href="<?php echo config_item('image_url').$row['batchVI_attachement_file_name'];?>" target="_blank" class="cursor" title="<?php echo $row['batchVI_attachement_file_name'];?>" style="color:blue">
          <?php echo (str_replace('application/','', $row['batchVI_attachement_file_type']) == 'pdf') ? '<i class="fa fa-file-pdf-o"  aria-hidden="true"></i>' : '<i class="fa fa-picture-o" aria-hidden="true"></i>' ;?>&nbsp;&nbsp;<?php echo str_replace('attachementVI/','', $row['batchVI_attachement_file_name']);?></a></td>
          <td><?php echo $row['batchVI_attachement_type_name'];?></td>
          <td><?php echo $row['batchVI_attachement_file_size'];?></td>
          <td><?php echo $row['firstname'];?></td>
          <td><?php echo get_date_timeformat($row['batchVI_attachement_updateOn']);?></td>
        </tr>
      <?php 
    }
} else{
    ?>
    <tr>
      <td colspan="6" style="text-align:center"><b>No Data Available...</b></td>
    </tr>
    <?php
}

?>