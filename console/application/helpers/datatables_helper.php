<?php 
function get_buttons_new($id, $url,$user_id)
{
    $ci= & get_instance();
    $html='<span class="actions">';
    $html .='<a href="'.  base_url(). $url.'operation/'.$id.'" title="'.lang('helper_common_edit_label').'"><i class="glyphicon glyphicon-pencil"></i></a> &nbsp;';
		$html .='<a  class="cursor" onclick=conformboxdelete("'.  base_url(). $url.'delete/'.$id.'") title="'.lang('helper_common_delete_label').'"><i  style="color:red;" class="glyphicon glyphicon-trash"></i></a>';
	$html.='</span>';
    return $html;
}

function get_buttons_new_edit_calibration($id, $url,$user_id)
{
    $ci= & get_instance();
    $html='<span class="actions">';
    $html .='<a href="javascript:void(0)" title="'.lang('helper_common_edit_label').'" data-toggle="modal" data-target=".bs-example-modal-lg" onclick="addcalibrationModal('.$id.')" data-backdrop="static" data-keyboard="false"><i class="glyphicon glyphicon-pencil"></i></a> &nbsp;';
	$html.='</span>';
    return $html;
}

function get_buttons_new_delete_calibration($id, $url,$user_id)
{
    $ci= & get_instance();
    $html='<span class="actions">';
	$html .='<a  class="cursor" onclick=conformboxdelete("'.  base_url(). $url.'deleteCalibration/'.$id.'") title="'.lang('helper_common_delete_label').'"><i  style="color:red;" class="glyphicon glyphicon-trash"></i></a>';
	$html.='</span>';
    return $html;
}

function get_buttons_new_only_Delete($id, $url,$user_id)
{
    $ci= & get_instance();
    $html='<span class="actions">';
	$html .='<a  class="cursor" onclick=conformboxdelete("'.  base_url(). $url.'delete/'.$id.'") title="'.lang('helper_common_delete_label').'"><i  style="color:red;" class="glyphicon glyphicon-trash"></i></a>';
	$html.='</span>';
    return $html;
}

function get_buttons_new_only_Edit($id, $url,$user_id)
{
    $ci= & get_instance();
    $html='<span class="actions">';
    $html .='<a href="'.  base_url(). $url.'operation/'.$id.'" title="'.lang('helper_common_edit_label').'"><i class="glyphicon glyphicon-pencil"></i></a> &nbsp;';
	$html.='</span>';
    return $html;
}

function get_buttons_new_only_Roles($id, $url,$user_id)
{
    $ci= & get_instance();
    $html='<span class="actions">';
    $html .='<a href="'.  base_url(). $url.'operationRoles/'.$id.'" title="'.lang('common_table_label_roles_operation').'"><i class="glyphicon glyphicon-th-large"></i></a> &nbsp;';
	$html.='</span>';
    return $html;
}
function get_ancharTagLink($url)
{
    $ci= & get_instance();
    $html='<span class="actions">';
    if($url != ''){
		//$html .='<a href="'.$url.'" target="_blank" class="cursor" title="'.$url.'"><i class="glyphicon glyphicon-eye-open"></i></a>';
		$html .='<a href="'.'//'.$url.'" target="_blank" class="cursor" title="'.$url.'">'.$url.'</a>';
	} else {
		$html .='';
	}
	$html.='</span>';
    return $html;
}



function get_buttons_new_only_Delete1($id, $url,$user_id)
{
    $ci= & get_instance();
    $html='<span class="actions">';
	$html .='<a  class="cursor" onclick=conformboxdeleteAttachment("'.  base_url(). $url.'/'.$id.'") title="'.lang('helper_common_delete_label').'"><i  style="color:red;" class="glyphicon glyphicon-trash"></i></a>';
	$html.='</span>';
    return $html;
}



function get_buttons_orderlists($id, $url,$user_id)
{
    $ci= & get_instance();
    $html='<span class="actions">';
    $html .='<a href="'.  base_url(). $url.'OrderDetails/'.$id.'" title="'.lang('helper_common_edit_label').'"><i class="fa fa-eye" style="font-size:20px;"></i></a> &nbsp;';
		$html .='<a  class="cursor" href="'.base_url(). $url.'printform/'.$id.'" title="'.lang('helper_common_print_label').'" target="_blank"><i  class="fa fa-print"  style="font-size:20px;"></i>  </a>';
	$html.='</span>';
    return $html;
}

function get_buttons_orderlists1($id, $url,$user_id)
{
    $ci= & get_instance();
    $html='<span class="actions">';
    $html .='<a href="'.  base_url(). $url.'OrderDetails/'.$id.'" title="'.lang('helper_common_edit_label').'"><i class="fa fa-eye" style="font-size:20px;"></i></a> &nbsp;';

	$html .='<a  class="cursor" href="'.base_url(). $url.'printform/'.$id.'" title="'.lang('helper_common_print_label').'" target="_blank"><i  class="fa fa-print"  style="font-size:20px;"></i>  </a>';

	$html .='&nbsp;<input id="closeButton'.$id.'" type="checkbox" name="pd_ids[]" value="'.$id.'" class="input-mini" onclick="proceedToOrder()"/>';

	$html.='</span>';
    return $html;
}




function get_status($status)
{
	$ci= & get_instance();

	if($status==1)
	{
   		return'<span class="label label-success">'.lang('helper_common_active_label').'</span>';
	}
	else 
	{
   		return'<span class="label label-danger"> '.lang('helper_common_inactive_label').' </span>';
	}
}

function get_resultVI($status)
{
	$ci= & get_instance();

    $html='<span class="actions">';
    $html .='<a href="javascript:void(0)" title="'.lang('mm_masters_welder_table_label_welder_results_vi').'"  data-toggle="modal" data-target=".bs-example-modal-lg" onclick="viAttributeModal('.$status.')" data-backdrop="static" data-keyboard="false"><i class="fa fa-files-o" style="font-size:20px;"></i></a> &nbsp;';
	$html.='</span>';
	return $html;
}

function get_resultNDT($status)
{	
	$ci= & get_instance();
	$html='<span class="actions">';
    $html .='<a href="javascript:void(0)" title="'.lang('mm_masters_welder_table_label_welder_results_NDT').'"  data-toggle="modal" data-target=".bs-example-modal-lg" onclick="ndtAttributeModal('.$status.')" data-backdrop="static" data-keyboard="false"><i class="fa fa-files-o" style="font-size:20px;"></i></a> &nbsp;';
	$html.='</span>';
	return $html;
}

function get_resultAttachement($status)
{	
	$ci= & get_instance();
	$html='<span class="actions">';
    //$html .='<a href="javascript:void(0)" title="'.lang('mm_masters_welder_table_label_welder_results_Attachement').'"  data-toggle="modal" data-target=".bs-example-modal-lg" onclick="weldAttachementModal('.$status.')" data-backdrop="static" data-keyboard="false"><i class="fa fa-paperclip" style="font-size:20px;"></i></a> &nbsp;';
    $html .='<a href="javascript:void(0)" title="'.lang('mm_masters_welder_table_label_welder_results_Attachement').'"   onclick="weldAttachementModal('.$status.')"><i class="fa fa-paperclip" style="font-size:20px;"></i></a> &nbsp;';
	$html.='</span>';
	return $html;
}

function get_resultCertificateAttachement($status)
{	
	$ci= & get_instance();
	$html='<span class="actions">';
    //$html .='<a href="javascript:void(0)" title="'.lang('mm_masters_welder_table_label_welder_results_Attachement').'"  data-toggle="modal" data-target=".bs-example-modal-lg" onclick="weldAttachementModal('.$status.')" data-backdrop="static" data-keyboard="false"><i class="fa fa-paperclip" style="font-size:20px;"></i></a> &nbsp;';
    $html .='<a href="javascript:void(0)" title="'.lang('mm_masters_welder_table_label_welder_results_Attachement').'"   onclick="staffAttachementModal('.$status.')" download><i class="fa fa-paperclip" style="font-size:20px;"></i></a> &nbsp;';
	$html.='</span>';
	return $html;
}

function get_resultCertificateDownload($status)
{	
	$ci= & get_instance();
	$html='<span class="actions">';
    //$html .='<a href="javascript:void(0)" title="'.lang('mm_masters_welder_table_label_welder_results_Attachement').'"  data-toggle="modal" data-target=".bs-example-modal-lg" onclick="weldAttachementModal('.$status.')" data-backdrop="static" data-keyboard="false"><i class="fa fa-paperclip" style="font-size:20px;"></i></a> &nbsp;';
    $html .='<a href="'.$status.'.zip" title="'.lang('mm_masters_welder_table_label_welder_results_Attachement').'"  download><i class="fa fa-download" style="font-size:20px;"></i></a> &nbsp;';
	$html.='</span>';
	return $html;
}



function get_resultPass($url)
{	
	$ci= & get_instance();
	$html='<span class="actions">';
    $html .='<a href="'.  base_url(). $url.'" title="'.lang('mm_masters_welder_table_label_welder_results_Pass').'" target="_blank"><i class="fa fa-print" style="font-size:20px;"></i></a> &nbsp;';
	$html.='</span>';
	return $html;
}

function get_resultWpQR($url)
{	
	$ci= & get_instance();
	$html='<span class="actions">';
    $html .='<a href="'.  base_url(). $url.'" title="'.lang('mm_masters_welder_table_label_welder_results_WPQR').'" target="_blank"><i class="fa fa-print" style="font-size:20px;"></i></a> &nbsp;';
	$html.='</span>';
	return $html;
}


function get_resultCertification($status)
{	
	$ci= & get_instance();
	$html='<span class="actions">';
    $html .='<a href="javascript:void(0)" title="'.lang('mm_masters_welder_table_label_welder_results_Certification').'"  data-toggle="modal" data-target=".bs-example-modal-lg" onclick="weldCertificationModal('.$status.')" data-backdrop="static" data-keyboard="false"><i class="fa fa-print" style="font-size:20px;"></i></a> &nbsp;';
	$html.='</span>';
	return $html;
}


function get_resultWelderDetails($status)
{	
	$ci= & get_instance();
	$html='<span class="actions">';
    $html .='<a href="javascript:void(0)" title="'.lang('mm_masters_batch_table_label_batch_welder_Details').'"  data-toggle="modal" data-target=".bs-example-modal-lg" onclick="batchWelderDetails('.$status.')" data-backdrop="static" data-keyboard="false"><i class="fa fa-files-o" style="font-size:20px;"></i></a> &nbsp;';
	$html.='</span>';
	return $html;
}

function get_resultWelderPass($status)
{	
	$ci= & get_instance();
	$html='<span class="actions">';
    $html .='<a href="javascript:void(0)" title="'.lang('mm_masters_batch_table_label_batch_welder_Pass').'"  data-toggle="modal" data-target=".bs-example-modal-lg" onclick="batchWelderPass('.$status.')" data-backdrop="static" data-keyboard="false"><i class="fa fa-files-o" style="font-size:20px;"></i></a> &nbsp;';
	$html.='</span>';
	return $html;
}

function get_resultCheckListReport($status)
{	
	$ci= & get_instance();
	$html='<span class="actions">';
    $html .='<a href="javascript:void(0)" title="'.lang('mm_masters_batch_table_label_batch_checklist_report').'"  data-toggle="modal" data-target=".bs-example-modal-lg" onclick="weldPassModal('.$status.')" data-backdrop="static" data-keyboard="false"><i class="fa fa-print" style="font-size:20px;"></i></a> &nbsp;';
	$html.='</span>';
	return $html;
}

function get_resultCheckListVi($status)
{	
	$ci= & get_instance();
	$html='<span class="actions">';
    $html .='<a href="javascript:void(0)" title="'.lang('mm_masters_batch_table_label_batch_checklist_vi').'"  data-toggle="modal" data-target=".bs-example-modal-lg" onclick="batchVIModal('.$status.')" data-backdrop="static" data-keyboard="false"><i class="fa fa-files-o" style="font-size:20px;"></i></a> &nbsp;';
	$html.='</span>';
	return $html;
}

function get_resultCheckListAttachement($status)
{	
	$ci= & get_instance();
	$html='<span class="actions">';
    $html .='<a href="javascript:void(0)" title="'.lang('mm_masters_batch_table_label_batch_checklist_Attachement').'"   onclick="batchVIAttachementModal('.$status.')"><i class="fa fa-paperclip" style="font-size:20px;"></i></a> &nbsp;';
	$html.='</span>';
	return $html;
}


function get_resultNDTRequest($status)
{	
	$ci= & get_instance();
	$html='<span class="actions">';
    $html .='<a href="javascript:void(0)" title="'.lang('mm_masters_batch_table_label_batch_NDT_request').'"  data-toggle="modal" data-target=".bs-example-modal-lg" onclick="weldPassModal('.$status.')" data-backdrop="static" data-keyboard="false"><i class="fa fa-print" style="font-size:20px;"></i></a> &nbsp;';
	$html.='</span>';
	return $html;
}

function get_NDT($status)
{	
	$ci= & get_instance();
	$html='<span class="actions">';
    $html .='<a href="javascript:void(0)" title="'.lang('mm_masters_batch_table_label_batch_NDT').'"  data-toggle="modal" data-target=".bs-example-modal-lg" onclick="batchNDTModal('.$status.')" data-backdrop="static" data-keyboard="false"><i class="fa fa-files-o" style="font-size:20px;"></i></a> &nbsp;';
	$html.='</span>';
	return $html;
}

function get_ndtAttachement($status)
{	
	$ci= & get_instance();
	$html='<span class="actions">';
    $html .='<a href="javascript:void(0)" title="'.lang('mm_masters_batch_table_label_batch_NDT_Attachement').'"   onclick="batchNDTAttachementModal('.$status.')"><i class="fa fa-paperclip" style="font-size:20px;"></i></a> &nbsp;';
	$html.='</span>';
	return $html;
}

function get_resultQualificationRecord($url)
{	
	$ci= & get_instance();
	$html='<span class="actions">';
    $html .='<a  href="'.  base_url(). $url.'" title="'.lang('mm_masters_batch_table_label_batch_qualification_record').'" target="_blank"><i class="fa fa-files-o" style="font-size:20px;"></i></a> &nbsp;';
	$html.='</span>';
	return $html;
}

function get_resultResultWPQ($status)
{	
	$ci= & get_instance();
	$html='<span class="actions">';
    $html .='<a href="javascript:void(0)" title="'.lang('mm_masters_batch_table_label_batch_WPQ').'"  data-toggle="modal" data-target=".bs-example-modal-lg" onclick="weldPassModal('.$status.')" data-backdrop="static" data-keyboard="false"><i class="fa fa-print" style="font-size:20px;"></i></a> &nbsp;';
	$html.='</span>';
	return $html;
}

function get_resultResultForm($status)
{	
	$ci= & get_instance();
	$html='<span class="actions">';
    $html .='<a href="javascript:void(0)" title="'.lang('mm_masters_batch_table_label_batch_form').'"  data-toggle="modal" data-target=".bs-example-modal-lg" onclick="weldPassModal('.$status.')" data-backdrop="static" data-keyboard="false">Form</a> &nbsp;';
	$html.='</span>';
	return $html;
}

function get_resultBulkReport($url)
{	

	$ci= & get_instance();
	$html='<span class="actions">';
    $html .='<a href="'.  base_url(). $url.'" title="'.lang('mm_masters_batch_table_label_batch_bulk_report').'" target="_blank"><i class="fa fa-print" style="font-size:20px;"></i></a> &nbsp;';
	$html.='</span>';
	return $html;
}

function get_attachementBatch($status)
{	
	$ci= & get_instance();
	$html='<span class="actions">';
    $html .='<a href="javascript:void(0)" title="'.lang('mm_masters_batch_table_label_batch_Attachement').'"   onclick="batchAttachementModal('.$status.')"><i class="fa fa-paperclip" style="font-size:20px;"></i></a> &nbsp;';
	$html.='</span>';
	return $html;
}

function get_resultIsOpen($status)
{	
	$ci= & get_instance();
	$html='<span class="actions">';
    $html .='<input type="checkbox" name="batchIsOpen" id="batchIsOpen" onclick="batchIsOpen('.$status.')" /> &nbsp;';
	$html.='</span>';
	return $html;
}

function get_resultIsCompleted($status)
{	
	$ci= & get_instance();
	$html='<span class="actions">';
    $html .='<input type="checkbox" name="batchIsCompleted" id="batchIsCompleted" onclick="batchCompleted('.$status.')" /> &nbsp;';
	$html.='</span>';
	return $html;
}


function get_equipmentAdditionalData($status)
{	
	$ci= & get_instance();
	$html='<span class="actions">';
    /*$html .='<a href="javascript:void(0)" title="'.lang('mm_masters__equipment_calibration_Modal_table_label_additionalData').'">'.lang('mm_masters__equipment_calibration_Modal_table_label_additionalData').'</a> &nbsp;';
    */
    $html .='<a href="javascript:void(0)" title="'.lang('mm_masters_equipment_calibration_Modal_table_label_additionalData').'" data-toggle="modal" data-target=".bs-example-modal-lg" data-backdrop="static" data-keyboard="false" onclick="addEquipmentAdditionalDataModal('.$status.')">'.lang('mm_masters_equipment_calibration_Modal_table_label_additionalData').'</a> &nbsp;';
	$html.='</span>';
	return $html;
}

function get_equipmentPressureData($status)
{	
	$ci= & get_instance();
	$html='<span class="actions">';
    /*$html .='<a href="javascript:void(0)" title="'.lang('mm_masters__equipment_calibration_Modal_table_label_additionalData').'">'.lang('mm_masters__equipment_calibration_Modal_table_label_additionalData').'</a> &nbsp;';
    */
    $html .='<a href="javascript:void(0)" title="'.lang('mm_masters_equipment_calibration_Modal_table_label_pressureData').'" data-toggle="modal" data-target=".bs-example-modal-lg" data-backdrop="static" data-keyboard="false" onclick="addEquipmentPressureDataModal('.$status.')">'.lang('mm_masters_equipment_calibration_Modal_table_label_pressureData').'</a> &nbsp;';
	$html.='</span>';
	return $html;
}

function get_equipmentTemperatureData($status)
{	
	$ci= & get_instance();
	$html='<span class="actions">';
    /*$html .='<a href="javascript:void(0)" title="'.lang('mm_masters__equipment_calibration_Modal_table_label_additionalData').'">'.lang('mm_masters__equipment_calibration_Modal_table_label_additionalData').'</a> &nbsp;';
    */
    $html .='<a href="javascript:void(0)" title="'.lang('mm_masters_equipment_calibration_Modal_table_label_temperatureData').'" data-toggle="modal" data-target=".bs-example-modal-lg" data-backdrop="static" data-keyboard="false" onclick="addEquipmentTemperatureDataModal('.$status.')">'.lang('mm_masters_equipment_calibration_Modal_table_label_temperatureData').'</a> &nbsp;';
	$html.='</span>';
	return $html;
}

function get_equipmentCalibrationAttachement($status)
{	
	$ci= & get_instance();
	$html='<span class="actions">';
    $html .='<a href="javascript:void(0)" title="'.lang('mm_masters_batch_table_label_batch_checklist_Attachement').'"   onclick="equipmentAttachementModal('.$status.')"><i class="fa fa-paperclip" style="font-size:20px;"></i></a> &nbsp;';
	$html.='</span>';
	return $html;
}



function get_number_format($value)
{
	$ci= & get_instance();

   	return number_format($value,'2',',','3').' &euro;';
}



function get_number_format_Change($value)
{
	$ci= & get_instance();

	$valueChange = explode(',',$value);

	$valueChangeReturn.='';
	
	foreach ($valueChange as $key => $values)
	{
   		$valueChangeReturn	.=	number_format($values,'2',',','3').' &euro; ';
	}

	return $valueChangeReturn;

   	//return number_format($value,'2',',','3').' &euro;';
}

function get_dot_to_number_format($value)
{
	$ci= & get_instance();

	return str_replace(array('.', ','), ',' , $value);

   	//return 'lll'.$value.number_format($value,'2','.','3');
}


function get_number_to_dot_format($value)
{
	$ci= & get_instance();

	return str_replace(array('.', ','), '.' , $value);

   	//return 'lll'.$value.number_format($value,'2','.','3');
}



function get_buttons_shows($status)
{
	$ci= & get_instance();

	if($status=='Neu')
	{
   		return'<span class="label label-success">'.$status.'</span>';
	}
	elseif($status=='Fertig')
	{
		return'<span class="label label-default">'.$status.'</span>';
	}
	elseif($status=='abgebrochen')
	{
		return'<span class="label label-danger">'.$status.'</span>';
	}
	elseif($status=='stornieren')
	{
		return'<span class="label label-warning">'.$status.'</span>';
	}

}

function get_user_status($status)
{
	$ci= & get_instance();

	if($status==1)
	{
   		return'<a href="'.base_url().'auth/deactivate/'.$id.'"><span class="label label-success">'.lang('helper_common_active_label').'</span></a>';
	}
	else 
	{
   		return'<a href="'.base_url().'auth/activate/'.$id.'"><span class="label label-danger"> '.lang('helper_common_inactive_label').' </span></a>';
	}
}

function get_holidaystatus($status)
{
	$ci= & get_instance();

	if($status==1)
	{
   		return'<span class="label label-primary">'.lang('helper_common_govtholiday_label').'</span>';
	}
	else 
	{
   		return'<span class="label label-info"> '.lang('helper_common_storeholiday_label').' </span>';
	}
}


function get_isFreestatus($status)
{
	$ci= & get_instance();

	if($status==1)
	{
   		return'<span class="label label-primary">'.lang('helper_common_yes_label').'</span>';
	}
	else 
	{
   		return'<span class="label label-info"> '.lang('helper_common_no_label').' </span>';
	}
}






function get_dateformat($datevalue)
{	
	if($datevalue != '0000-00-00')
	{
		return date("d M'y",strtotime($datevalue));
	}
	else
	{
		return '';
	}
}
function get_date_timeformat($datevalue)
{
	if($datevalue != '0000-00-00 00:00:00')
	{
		//return date("d M'y h:i A  ",strtotime($datevalue));
		return date("d M'y H:i",strtotime($datevalue));
	}else
	{
		return '';
	}
}

function get_image_tag($url)
{
    $ci= & get_instance();
    if($url!='')
    {
		$html .='<img src="'.config_item("image_url").$url.'" height="50"/>';
	}
	else
	{
		$html .='<img src="'.config_item("image_url").'~cdn/img/no-image.png" height="50" />';
	}
	return $html;
}

function get_optionStatus($status)
{
	$ci= & get_instance();

	if($status==1)
	{
   		return'<span class="label label-success">'.lang('helper_common_yes_label').'</span>';
	}
	else 
	{
   		return'<span class="label label-danger"> '.lang('helper_common_no_label').' </span>';
	}
}

function get_delivery_type_shows($delivery_type, $delivery_time)
{
	$ci= & get_instance();

	
   	$deliveryTypeLabel.=	lang($delivery_type);
	
	if($delivery_time != '')
	{
   		$deliveryTypeLabel	.=	' - '.$delivery_time;
	}
	
	return $deliveryTypeLabel;
}


