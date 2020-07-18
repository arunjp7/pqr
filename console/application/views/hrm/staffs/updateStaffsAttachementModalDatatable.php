<?php
  if(isset($datatablevalue) && !empty($datatablevalue)){
    $iValue = 1;
    foreach($datatablevalue as $row){ 
      ?>
        <tr>
          <td><?php echo $iValue++;?></td>
          <td><?php echo get_buttons_new_only_Delete1($row['attachement_staffs_id'],'auth/getupdateAttachementModal');?></td>
          <td>
          <a href="<?php echo config_item('image_url').$row['staffs_attachement_file_name'];?>" target="_blank" class="cursor" title="<?php echo $row['staffs_attachement_file_name'];?>" style="color:blue">
          <?php echo (str_replace('application/','', $row['staffs_attachement_file_type']) == 'pdf') ? '<i class="fa fa-file-pdf-o"  aria-hidden="true"></i>' : '<i class="fa fa-picture-o" aria-hidden="true"></i>' ;?>&nbsp;&nbsp;<?php echo str_replace('~cdn/attachementStaffs/'.$row['user_id'].'/','', $row['staffs_attachement_file_name']);?></a></td>
          <td><?php echo $row['staffs_attachement_type_name'];?></td>
          <td><?php echo $row['staffs_attachement_file_size'];?></td>
          <td><?php echo $row['firstname'];?></td>
          <td><?php echo get_date_timeformat($row['staffs_attachement_updateOn']);?></td>
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