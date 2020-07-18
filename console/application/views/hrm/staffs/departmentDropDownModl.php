  <!--<select id="groups" name="groups" <?php if($user_id != '') { echo 'disabled="true"';}?> class="form-control select2 <?php if(form_error('groups')){ echo 'parsley-error';} ?>" data-live-search="true" data-width="100%">
    <?php 
      foreach ($user_groups as $key => $value)
      {
        if($value['id'] != '1'){
          ?>
          <option value="<?php echo $value['id'];?>" <?php if($value['id'] == $groups) { ?> selected <?php }?>><?php echo $value['description'];?></option>
          <?php
        }
      }
      ?>
  </select>-->
  <?php 
    foreach ($user_groups as $key => $value){
      if($value['id'] != '1'){
        ?>
        <div class="col-sm-12 col-xs-12">
          <div class="form-group">
            <input type="checkbox" name="user_doright[<?php echo $value['id'];?>]" class="js-switch" data-color="#99d683" data-secondary-color="#f96262" value="<?php echo $value['id'];?>" <?php if(in_array($value['id'], $user_dorights)){?> checked <?php }?>/> &nbsp; <label for="exampleInputEmail1"><?php echo ucwords($value['name']);?></label>
          </div>
        </div>
        <?php
      }
    }
  ?>

  
<style type="text/css">
  .panel-title .trigger:before {
    content: '\e082';
    font-family: 'Glyphicons Halflings';
    vertical-align: text-bottom;
  }

  .panel-title .trigger.collapsed:before {
    content: '\e081';
  }
</style>