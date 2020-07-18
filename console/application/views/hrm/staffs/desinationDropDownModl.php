<?php   
  $attrib = 'class="form-control select2" name="staffs_designation"  data-live-search="true" data-width="100%"  id="staffs_designation"';
  echo form_dropdown('staffs_designation', $drop_menu_designation, set_value('staffs_designation', (isset($staffs_designation)) ? $staffs_designation : ''), $attrib);
  ?>