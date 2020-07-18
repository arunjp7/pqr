<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Equipment extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		if(isset($_POST['language']))
		{
			$selected_language=$this->input->post('language');
			$this->session->set_userdata(array('current_language' => $selected_language));
			$this->config->set_item('language', $this->session->userdata('current_language'));
		}
		if($this->session->userdata('current_language'))
		{
			$this->config->set_item('language', $this->session->userdata('current_language'));			
		}
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url'));
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');

		$this->load->helper('datatables_helper');
		$this->load->library('Datatables');
		$this->load->library('table');

		$this->load->library('upload');
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('login', 'refresh');
		}

		
		//Global $userdata =  $user->st_storeID;
		
	}

	// Form View
	// Last Updated by Vinitha 09/08/2016 
	public function index($view_data)
	{  
		$this->mcommon->getCheckUserPermissionHead('Equipment',true);
        $view_data['top_tittle']			=	lang('mm_masters_equipment_manage_toptitle');
        $view_data['top_tittle_pergram']	=	lang('mm_masters_equipment_manage_pergram');

        $view_data['add_button_url']		=	'masters/Equipment/addUpdateForm';
    	$view_data['pdf_url']				=	'masters/Equipment/downloadPDF';
    	$view_data['pdf_fileName']			=	lang('mm_masters_equipment_manage_exportPDFFileName').date('d_m_Y');    	
    	$view_data['export_url']			=	'masters/Equipment/exportExcel';
    	$view_data['export_fileName']		=	lang('mm_masters_equipment_manage_exportPDFFileName').date('d_m_Y');

    	$view_data['datatable_url']			=	'masters/Equipment/datatable';
    	$view_data['subGrid_datatable_url']	=	'masters/Equipment/datatableSubGrid';

    	$view_data['list_tittle']			=	lang('mm_masters_equipment_manage_list_title');
    	$view_data['list_tittle_small']		=	lang('mm_masters_equipment_manage_list_title_small');

		$data = array(
                    'title'     	=> lang('mm_masters_equipment_manage_view'),
                    'content'   	=>$this->load->view('masters/Equipment/equipmentDataList',$view_data,TRUE)                
                    );
        $this->load->view('base/template', $data); 
	}

	// datatable View
	// Last Updated by Vinitha 09/08/2016 
	function datatable1()
    {
    	$this->datatables->select('p.welder_id, p.welder_first_name, p.welder_last_name, p.welder_ref_no, p.welder_test_no, p.welder_no, p.welder_photo,p.welder_id as resultVi,p.welder_id as resultNDT,p.welder_id as resultAttachement,p.welder_id as resultPass,p.welder_id as resultWpQR, u.first_name, p.welder_createOn,u1.first_name as firstname,p.welder_updateOn')
        ->from('jr_welder AS p')
        ->join('users AS u', 'u.id = p.welder_createBy','left') 
        ->join('users AS u1', 'u1.id = p.welder_updateBy','left') 
        ->where('p.welder_show_status', 1)
		->edit_column('p.welder_id', get_buttons_new('$1','masters/Equipment/'), 'p.welder_id');
		//$this->datatables->edit_column('p.page_show_status', '$1', 'get_status(p.page_show_status)');

		$this->datatables->edit_column('resultVi', '$1', 'get_resultVI(resultVi)');
		$this->datatables->edit_column('resultNDT', '$1', 'get_resultNDT(resultNDT)');
		$this->datatables->edit_column('resultAttachement', '$1', 'get_resultAttachement(resultAttachement)');
		$this->datatables->edit_column('resultPass', '$1', 'get_resultPass(resultPass)');
		$this->datatables->edit_column('resultWpQR', '$1', 'get_resultWpQR(resultWpQR)');
		//$this->datatables->edit_column('resultCertification', '$1', 'get_resultCertification(resultCertification)');
		$this->datatables->edit_column('p.welder_photo', '$1', 'get_image_tag(p.welder_photo)');
		$this->datatables->edit_column('p.welder_createOn', '$1', 'get_date_timeformat(p.welder_createOn)');
		$this->datatables->edit_column('p.welder_updateOn', '$1', 'get_date_timeformat(p.welder_updateOn)');
        echo $this->datatables->generate();
    }


    // datatable View
	// Last Updated by Vinitha 09/08/2016 
	function datatable(){
        
        $page = $_POST['page']; // get the requested page
		$limit = $_POST['rows']; // get how many rows we want to have into the grid
		$sidx = $_POST['sidx']; // get index row - i.e. user click to sort
		$sord = $_POST['sord']; // get the direction
		if(!$sidx) $sidx =1;


		$fields_arrayPackage = array(
			'p.equipment_id','c.category_name','p.equipment_test_equipment','p.equipment_manufacturer','p.equipment_serial_number','p.equipment_asset_tag_number','ec.equipment_calibration_report_number','p.equipment_recommended_range','p.equipment_range','p.equipment_least_count','p.equipment_purpose','p.equipment_acceptance_criteria','ec.equipment_calibration_by','ec.equipment_calibration_date','ec.equipment_calibration_due_date','p.equipment_calibration_frequency','p.equipment_alert_frequency','p.equipment_remarks','s.status_name','u.first_name','p.equipment_createOn','u1.first_name as firstname','p.equipment_updateOn'
		);
		$join_arrayPackage = array(
			'jr_equipment_calibration AS ec' => 'ec.equipmentID = p.equipment_id',
			'jr_category AS c' => 'c.category_id = p.equipment_show_status',
			'jr_status AS s' => 's.status_id = p.equipment_status',
			'users AS u' => 'u.id = p.equipment_createBy',
			'users AS u1' => 'u1.id = p.equipment_updateBy',
		);
		//$where_arrayPackage = array('c.category_show_status' =>'1','s.status_show_status' =>'1');
		$where_arrayPackage = array();
		$orderPackage = $sidx.' '. $sord;

		$count =   $this->mcommon->join_records_counts($fields_arrayPackage, 'jr_equipment as p', $join_arrayPackage, $where_arrayPackage, '', $orderPackage);

		if( $count >0 ) {
			$total_pages = ceil($count/$limit);
		} else {
			$total_pages = 0;
		}
		if ($page > $total_pages) $page=$total_pages;
		$start = $limit*$page - $limit; // do not put $limit*($page - 1)

		$responce->page = $page;
		$responce->total = $total_pages;
		$responce->records = $count;
		$dataTable_Details =   $this->mcommon->join_records_all($fields_arrayPackage, 'jr_equipment as p', $join_arrayPackage, $where_arrayPackage, '', $orderPackage,'object');
		
		if (isset($dataTable_Details) && !empty($dataTable_Details)) {
			$i=0;
	        foreach ($dataTable_Details->result() as $dataDetail) {
	        	$responce->rows[$i]['id'] = $dataDetail->equipment_id;
	        	//$responce->rows[$i]['cell']= array($dataDetail->ndtContractor_id);
	        	$responce->rows[$i]['cell']['edit_equipment_id'] = get_buttons_new_only_Edit($dataDetail->equipment_id,'masters/Equipment/');
	        	$responce->rows[$i]['cell']['delete_equipment_id'] = get_buttons_new_only_Delete($dataDetail->equipment_id,'masters/Equipment/');
	        	$responce->rows[$i]['cell']['category_name'] = $dataDetail->category_name;
	        	$responce->rows[$i]['cell']['equipment_test_equipment'] = $dataDetail->equipment_test_equipment;
	        	$responce->rows[$i]['cell']['equipment_manufacturer'] = $dataDetail->equipment_manufacturer;
	        	$responce->rows[$i]['cell']['equipment_serial_number'] = $dataDetail->equipment_serial_number;

	        	$responce->rows[$i]['cell']['equipment_asset_tag_number'] = $dataDetail->equipment_asset_tag_number;
	        	$responce->rows[$i]['cell']['equipment_calibration_report_number'] = $dataDetail->equipment_calibration_report_number;
	        	$responce->rows[$i]['cell']['equipment_recommended_range'] = $dataDetail->equipment_recommended_range;
	        	$responce->rows[$i]['cell']['equipment_range'] = $dataDetail->equipment_range;
	        	$responce->rows[$i]['cell']['equipment_least_count'] = $dataDetail->equipment_least_count;
	        	$responce->rows[$i]['cell']['equipment_purpose'] = $dataDetail->equipment_purpose;
	        	$responce->rows[$i]['cell']['equipment_acceptance_criteria'] = $dataDetail->equipment_acceptance_criteria;
	        	$responce->rows[$i]['cell']['equipment_calibration_by'] = $dataDetail->equipment_calibration_by;
	        	$responce->rows[$i]['cell']['equipment_calibration_date'] = $dataDetail->equipment_calibration_date;
	        	$responce->rows[$i]['cell']['equipment_calibration_due_date'] = $dataDetail->equipment_calibration_due_date;
	        	$responce->rows[$i]['cell']['equipment_calibration_frequency'] = $dataDetail->equipment_calibration_frequency;
	        	$responce->rows[$i]['cell']['equipment_alert_frequency'] = $dataDetail->equipment_alert_frequency;
	        	$responce->rows[$i]['cell']['equipment_remarks'] = $dataDetail->equipment_remarks;
	        	$responce->rows[$i]['cell']['status_name'] = $dataDetail->status_name;
	        	$responce->rows[$i]['cell']['first_name'] = $dataDetail->first_name;
	        	$responce->rows[$i]['cell']['equipment_createOn'] = get_date_timeformat($dataDetail->equipment_createOn);
	        	$responce->rows[$i]['cell']['firstname'] = $dataDetail->firstname;
	        	$responce->rows[$i]['cell']['equipment_updateOn'] = get_date_timeformat($dataDetail->equipment_updateOn);
	    		$i++;
	        }
	        //$responce->userData['page'] = $responce->page;
	        //$responce->userData['totalPages'] = $responce->total;
	        $responce->userData->totalrecords = $responce->records;
	    }  
		echo json_encode($responce);
    }


    // datatable View
	// Last Updated by Vinitha 09/08/2016 
	function datatableSubGrid(){
        
        $page = $_POST['page']; // get the requested page
		$limit = $_POST['rows']; // get how many rows we want to have into the grid
		$sidx = $_POST['sidx']; // get index row - i.e. user click to sort
		$sord = $_POST['sord']; // get the direction
		$equipmentID = $_POST['equipmentID']; // get the direction
		if(!$sidx) $sidx =1;


		$fields_arrayPackage = array(
			'p.equipmentID','p.equipment_calibration_id','p.equipment_calibration_id as additionalData','p.equipment_calibration_id as ressureData','p.equipment_calibration_id as temperatureData','p.equipment_calibration_id as calibrationAttachment','p.equipment_calibration_report_number','p.equipment_calibration_date','p.equipment_calibration_by','p.equipment_calibration_due_date','u.first_name','p.equipment_calibration_createOn','u1.first_name as firstname','p.equipment_calibration_updateOn'
		);
		$join_arrayPackage = array(
			'users AS u' => 'u.id = p.equipment_calibration_createBy',
			'users AS u1' => 'u1.id = p.equipment_calibration_updateBy',
		);
		$where_arrayPackage = array('p.equipmentID' =>$equipmentID);
		$orderPackage = 'p.equipment_calibration_id '. $sord;

		$count =   $this->mcommon->join_records_counts($fields_arrayPackage, 'jr_equipment_calibration as p', $join_arrayPackage, $where_arrayPackage, '', $orderPackage);

		if( $count >0 ) {
			$total_pages = ceil($count/$limit);
		} else {
			$total_pages = 0;
		}
		if ($page > $total_pages) $page=$total_pages;
		$start = $limit*$page - $limit; // do not put $limit*($page - 1)

		$responce->page = $page;
		$responce->total = $total_pages;
		$responce->records = $count;
		$dataTable_Details =   $this->mcommon->join_records_all($fields_arrayPackage, 'jr_equipment_calibration as p', $join_arrayPackage, $where_arrayPackage, '', $orderPackage,'object');
		
		if (isset($dataTable_Details) && !empty($dataTable_Details)) {
			$i=0;
	        foreach ($dataTable_Details->result() as $dataDetail) {
	        	$responce->rows[$i]['id'] = $dataDetail->equipmentID;
	        	//$responce->rows[$i]['cell']= array($dataDetail->ndtContractor_id);


	        	$responce->rows[$i]['cell']['edit_equipmentID'] = get_buttons_new_edit_calibration($dataDetail->equipmentID,'masters/Equipment/');
	        	$responce->rows[$i]['cell']['delete_equipmentID'] = get_buttons_new_delete_calibration($dataDetail->equipmentID,'masters/Equipment/');
	        	$responce->rows[$i]['cell']['additionalData'] = get_equipmentAdditionalData($dataDetail->additionalData);
	        	$responce->rows[$i]['cell']['ressureData'] = get_equipmentPressureData($dataDetail->ressureData);
	        	$responce->rows[$i]['cell']['temperatureData'] = get_equipmentTemperatureData($dataDetail->temperatureData);
	        	$responce->rows[$i]['cell']['calibrationAttachment'] = get_equipmentCalibrationAttachement($dataDetail->calibrationAttachment);

	        	$responce->rows[$i]['cell']['equipment_calibration_report_number'] = $dataDetail->equipment_calibration_report_number;

	        	$responce->rows[$i]['cell']['equipment_calibration_date'] = get_dateformat($dataDetail->equipment_calibration_date);
	        	$responce->rows[$i]['cell']['equipment_calibration_by'] = $dataDetail->equipment_calibration_by;
	        	$responce->rows[$i]['cell']['equipment_calibration_due_date'] = get_dateformat($dataDetail->equipment_calibration_due_date);
	        	$responce->rows[$i]['cell']['first_name'] = $dataDetail->first_name;
	        	$responce->rows[$i]['cell']['equipment_calibration_createOn'] = get_date_timeformat($dataDetail->equipment_calibration_createOn);
	        	$responce->rows[$i]['cell']['firstname'] = $dataDetail->firstname;
	        	$responce->rows[$i]['cell']['equipment_calibration_updateOn'] = get_date_timeformat($dataDetail->equipment_calibration_updateOn);

	    		$i++;
	        }
	        //$responce->userData['page'] = $responce->page;
	        //$responce->userData['totalPages'] = $responce->total;
	        $responce->userData->totalrecords = $responce->records;
	    }  
		echo json_encode($responce);
    }

    // Form View
	// Last Updated by Vinitha 09/08/2016 
	public function addUpdateForm($view_data)
	{  
		$this->mcommon->getCheckUserPermissionHead('Equipment add and edit',true);
        $view_data['top_tittle']			=	lang('mm_masters_equipment_manage_toptitle');
        $view_data['top_tittle_pergram']	=	lang('mm_masters_equipment_manage_pergram');

        $view_data['form_url']				=	'masters/Equipment/create';
        $view_data['form_cancel_url']		=	'masters/Equipment';
        $view_data['form_tittle']			=	lang('mm_masters_equipment_manage_form_title');
        $view_data['form_tittle_small']		=	lang('mm_masters_equipment_manage_form_title_small');
        $view_data['form_button_name']		=	lang('mm_masters_equipment_manage_form_button_name');


    	$fields_arrayCategory = array(
    		'category_id as Key','category_name as Value'
    	);
		$whereArrCategory        = "category_show_status ='1'";

    	$view_data['drop_down_Category']	=	$this->mcommon->Dropdown('jr_category',$fields_arrayCategory,'',$whereArrCategory,'','`category_id` ASC ','');

    	//$table, $get_field, $joinArr='', $constraint_array='', $groupBy='', $orderby='', $limit='', $optionType=''


    	$fields_arrayStatus = array(
    		'status_id as Key','status_name as Value'
    	);
		$whereArrStatus        = "status_show_status ='1'";

    	$view_data['drop_down_Status']	=	$this->mcommon->Dropdown('jr_status',$fields_arrayStatus,'',$whereArrStatus,'','`status_id` ASC ','','1');
      
		$data = array(
                    'title'     	=> lang('mm_masters_equipment_manage_create'),
                    'content'   	=>$this->load->view('masters/Equipment/equipmentmanagement',$view_data,TRUE)                
                    );
        $this->load->view('base/template', $data); 
	}

	// create Form
	// Last Updated by Vinitha 09/08/2016 
	public function create()
	{		
        $user   = $this->ion_auth->user()->row();
		$this->mcommon->getCheckUserPermissionHead('Equipment add and edit',true);
        if(isset($_POST['submit']))
		{			
			 $this->form_validation->set_rules('equipment_category', lang('mm_masters_equipment_category'), 'required');
			 $this->form_validation->set_rules('equipment_serial_number', lang('mm_masters_equipment_serial_number'), 'required');
			 $this->form_validation->set_rules('equipment_test_equipment', lang('mm_masters_equipment_test_equipment'), 'required');
			 $this->form_validation->set_rules('equipment_manufacturer', lang('mm_masters_equipment_manufacturer'), 'required');
			 $this->form_validation->set_rules('equipment_asset_tag_number', lang('mm_masters_equipment_asset_tag_number'), 'required');

            if ($this->form_validation->run() == true)
			{
				$value_array=array(
					'equipment_category'				=>	$this->input->post('equipment_category'),
					'equipment_serial_number'			=>	$this->input->post('equipment_serial_number'),
					'equipment_calibration_frequency'	=>	($this->input->post('equipment_calibration_frequency')!='') ? $this->input->post('equipment_calibration_frequency') : '',
					'equipment_status'					=>	($this->input->post('equipment_status')!='') ? $this->input->post('equipment_status') : '',
					'equipment_test_equipment'  		=>	$this->input->post('equipment_test_equipment'),
					'equipment_recommended_range'		=>	($this->input->post('equipment_recommended_range')!='') ? $this->input->post('equipment_recommended_range') : '',
					'equipment_alert_frequency'			=>	($this->input->post('equipment_alert_frequency')!='') ? $this->input->post('equipment_alert_frequency') : '',
					'equipment_least_count'				=>	($this->input->post('equipment_least_count')!='') ? $this->input->post('equipment_least_count') : '',
					'equipment_manufacturer'  			=>	$this->input->post('equipment_manufacturer'),
					'equipment_range'					=>	($this->input->post('equipment_range')!='') ? $this->input->post('equipment_range') : '',
					'equipment_acceptance_criteria'		=>	($this->input->post('equipment_acceptance_criteria')!='') ? $this->input->post('equipment_acceptance_criteria') : '',
					'equipment_asset_tag_number'  		=>	$this->input->post('equipment_asset_tag_number'),
					'equipment_purpose'					=>	($this->input->post('equipment_purpose')!='') ? $this->input->post('equipment_purpose') : '',
					'equipment_remarks'					=>	($this->input->post('equipment_remarks')!='') ? $this->input->post('equipment_remarks') : '',
					'equipment_createBy'				=>	$this->session->userdata('user_id'),
					'equipment_createOn'				=>	date('Y-m-d H:i:s') 
				);



				if($this->input->post('equipment_id')!='')
				{
					$value_array['equipment_updateBy'] = $this->session->userdata('user_id');
					$value_array['equipment_updateOn'] = date('Y-m-d H:i:s');

					$where_array=array(
						'equipment_id'			 =>	$this->input->post('equipment_id')
					);
					$resultupdate=$this->mcommon->common_edit('jr_equipment',$value_array,$where_array);
				}
				else
				{
					$result=$this->mcommon->common_insert('jr_equipment',$value_array);
				}
			}		
		}

		if($result)
		{
			$this->session->set_flashdata('res', lang('common_message_create'));
			$this->session->set_flashdata('res_type', 'success');
			redirect(base_url().'masters/Equipment');
		}
		if($resultupdate)
		{
			$this->session->set_flashdata('res', lang('common_message_update'));
			$this->session->set_flashdata('res_type', 'success');
			redirect(base_url().'masters/Equipment');
		}
		else
		{
			$this->addUpdateForm($data);
		}
	}

	// Edit 
	// Last Updated by Vinitha 09/08/2016 
	public function operation($id)
	{
		$this->mcommon->getCheckUserPermissionHead('Equipment add and edit',true);

		$where_array=array(
			'equipment_id'=>$id
		);
		$data['value']=$this->mcommon->get_fulldata('jr_equipment',$where_array);
		
		$this->addUpdateForm($data);
	}

	// Delete 
	// Last Updated by Vinitha 09/08/2016
	public function delete($id)
	{   
		$this->mcommon->getCheckUserPermissionHead('Equipment delete',true);
		$where_array=array(
			'equipment_id'     =>$id
		);
		
       $delete=$this->mcommon->common_delete('jr_equipment',$where_array);
		if($delete)
		{
			$this->session->set_flashdata('res', lang('common_message_delete'));
			$this->session->set_flashdata('res_type', 'danger');
			redirect(base_url().'masters/Equipment');
		}
		else
		{
			$this->index($data);
		}
	}

	public function deleteCalibration($id)
	{   
		$where_array=array(
			'equipment_calibration_id'     =>$id
		);
		
       $delete=$this->mcommon->common_delete('jr_equipment_calibration',$where_array);
		if($delete)
		{
			$this->session->set_flashdata('res', lang('common_message_delete'));
			$this->session->set_flashdata('res_type', 'danger');
			redirect(base_url().'masters/Equipment');
		}
		else
		{
			$this->index($data);
		}
	}


	

	// Ajax ADD - VI Model Window 
    public function getupdateCalibrationDetailsModal()
    {    	
            parse_str($_POST['postdata'], $_POST);//This will convert the string to array
            if(isset($_POST['submit']))
            {
            	/*$this->form_validation->set_rules('check_number', 'Number', 'required');

                if ($this->form_validation->run() == TRUE)
                {*/



            	$value_array=array(
					'equipmentID'							=>	($this->input->post('equipmentID')!='') ? $this->input->post('equipmentID') : '',
					'equipment_calibration_report_number'	=>	($this->input->post('equipment_calibration_report_number')!='') ? $this->input->post('equipment_calibration_report_number') : '',
					'equipment_calibration_date'			=>	($this->input->post('equipment_calibration_date')!='') ? date('Y-m-d',strtotime($this->input->post('equipment_calibration_date'))) : '',
					'equipment_calibration_by'				=>	($this->input->post('equipment_calibration_by')!='') ? $this->input->post('equipment_calibration_by') : '',
					'equipment_calibration_due_date'		=>	($this->input->post('equipment_calibration_due_date')!='') ? date('Y-m-d',strtotime($this->input->post('equipment_calibration_due_date'))) : '',
					'equipment_calibration_by'			=>	($this->input->post('equipment_calibration_by')!='') ? $this->input->post('equipment_calibration_by') : '',

					'equipment_calibration_updateBy'		=>	$this->session->userdata('user_id'),
					'equipment_calibration_updateOn'		=>	date('Y-m-d H:i:s')
				);


            	$alreadyExistRecord	=	$this->mcommon->specific_record_counts('jr_equipment_calibration',array('equipmentID'=>$this->input->post('equipmentID'))); 

                if($this->input->post('equipment_calibration_id')!='')
				{
					$where_array=array(
						'equipment_calibration_id'			 =>	$this->input->post('equipment_calibration_id')
					);
					$resultupdate=$this->mcommon->common_edit('jr_equipment_calibration',$value_array,$where_array);
				}
				else
				{
					if($alreadyExistRecord == 0){
						$value_array['equipment_calibration_createBy'] = $this->session->userdata('user_id');
						$value_array['equipment_calibration_createOn'] = date('Y-m-d H:i:s');
					            
						$result=$this->mcommon->common_insert('jr_equipment_calibration',$value_array);
					} else {
						$resultExistRecord=1;
					}
				}
				
	            //}       
            }

            if($result){ 
            	$data=array(
					'result' 	=> 'Success',
					'res_type' 	=> 'success',
					'res' 	=> lang('common_message_create')
				);
                echo json_encode($data);
            }
            elseif($resultupdate){ 
            	$data=array(
					'result' 	=> 'Update',
					'res_type' 	=> 'success',
					'res' 	=> lang('common_message_update')
				);
                echo json_encode($data);
            }
            elseif($resultExistRecord) {
            	$data=array(
					'result' 	=> 'ExistRecord',
					'res_type' 	=> 'warning',
					'res' 	=> lang('common_message_existRecord')
				);
                echo json_encode($data);
                //Error ExistRecord
            }
            else
            {
            	if(isset($_GET['equipmentID'])){
            		$where_array=array(
						'equipmentID'=>$_GET['equipmentID']
					);
					$view_data['value']=$this->mcommon->get_fulldata('jr_equipment_calibration',$where_array);

            		$view_data['equipmentID'] = $_GET['equipmentID'];
            	}else{
            		$view_data['equipmentID'] = $this->input->post('equipmentID');
            	}
               echo $this->load->view('masters/Equipment/updateCalibrationModal', $view_data,TRUE);
            }
    }

    // Ajax ADD - VI Model Window 
    public function getupdateEquipmentAdditionalDetailsModal($id = '')
    {    	
        parse_str($_POST['postdata'], $_POST);//This will convert the string to array
        if(isset($_POST['submit']))
        {

        	if($this->input->post('equipment_additional_nominial_value')!='' || $this->input->post('equipment_additional_measured_value')!=''){

        		//$additionalrow = $this->input->post('additionalrow');
        		$this->mcommon->common_delete('jr_equipment_additional',array('equipmentCalibrationID' =>$this->input->post('equipmentCalibrationID')));
        		$equipmentAdditionalNominialValue = ($this->input->post('equipment_additional_nominial_value')!='') ? $this->input->post('equipment_additional_nominial_value') : '';
        		//for($i=0; $i < $additionalrow; $i++) { 

        		foreach ($equipmentAdditionalNominialValue as $key => $value) {

        			$value_array=array(
						'equipmentCalibrationID'							=>	($this->input->post('equipmentCalibrationID')!='') ? $this->input->post('equipmentCalibrationID') : '',
						'equipment_additional_nominial_value'	=>	($this->input->post('equipment_additional_nominial_value')[$key]!='') ? $this->input->post('equipment_additional_nominial_value')[$key] : '',

						'equipment_additional_measured_value'			=>	($this->input->post('equipment_additional_measured_value')[$key]!='') ? $this->input->post('equipment_additional_measured_value')[$key] : '',
						'equipment_additional_updateBy'		=>	$this->session->userdata('user_id'),
						'equipment_additional_updateOn'		=>	date('Y-m-d H:i:s')
					);

	                /*if($this->input->post('equipment_additional_id')[$i]!='')
					{
						
						$where_array=array(
							'equipment_additional_id'	=>	$this->input->post('equipment_additional_id')[$i]
						);
						$resultupdate=$this->mcommon->common_edit('jr_equipment_additional',$value_array,$where_array);
					}
					else
					{*/
						$value_array['equipment_additional_createBy'] = $this->session->userdata('user_id');
						$value_array['equipment_additional_createOn'] = date('Y-m-d H:i:s');
						            
						$result=$this->mcommon->common_insert('jr_equipment_additional',$value_array);
					//}
				}
			}
			
        }

        if($id != ''){
	        $delete=$this->mcommon->common_delete('jr_equipment_additional',array('equipment_additional_id' => $id));
		}


        $fields_arrayPackage = array(
			'p.equipment_additional_id','p.equipmentCalibrationID','p.equipment_additional_nominial_value','p.equipment_additional_measured_value'
		);
			//public function join_records_all($fields, $table, $joinArr, $constraint_array = '', $groupBy = '', $orderby = '', $limit='', $resultType='' )


		$data['datatablevalue'] =   $this->mcommon->join_records_all($fields_arrayPackage, 'jr_equipment_additional as p', '', '', '', '`p.equipment_additional_id` ASC ','','array');

				
	//}
		$view_data['datatablevalueForm'] = $this->load->view('masters/Equipment/updateAdditionalModalDatatable',$data,TRUE);

        if($result){ 
        	$view_data['result'] = 'Success';
        	$view_data['res_type'] = 'success';
        	$view_data['res'] = lang('common_message_create');
            echo json_encode($view_data);
        } elseif($resultupdate){             	
        	$view_data['result'] = 'Update';
        	$view_data['res_type'] = 'success';
        	$view_data['res'] = lang('common_message_update');
            echo json_encode($view_data);
        } elseif($delete) {            	       	
        	$view_data['result'] = 'Success';
        	$view_data['res_type'] = 'danger';
        	$view_data['res'] = lang('common_message_delete');
            echo json_encode($view_data);
        	//Error ExistRecord
        } elseif($resultExistRecord) {            	       	
        	$view_data['result'] = 'ExistRecord';
        	$view_data['res_type'] = 'warning';
        	$view_data['res'] = lang('common_message_existRecord');
            echo json_encode($view_data);
        	//Error ExistRecord
        } else{
        	if(isset($_GET['equipmentCalibrationID'])){
        		$where_array=array(
					'equipmentCalibrationID'=>$_GET['equipmentCalibrationID']
				);
				$view_data['value']=$this->mcommon->get_fulldataAll('jr_equipment_additional',$where_array);
        		$view_data['equipmentCalibrationID'] = $_GET['equipmentCalibrationID'];
        	}else{
        		$view_data['equipmentCalibrationID'] = $this->input->post('equipmentCalibrationID');
        	}
           echo $this->load->view('masters/Equipment/updateAdditionalDataModal', $view_data,TRUE);
        }
    }

    public function getAdditionalContent(){
		//$view_data['in']=$this->input->get('i')+1;
		$view_data['in']=$this->input->get('i');
		echo $this->load->view('masters/Equipment/updateAdditionalDataModalAddRow', $view_data,TRUE);
	}

	public function getupdateEquipmentPressureDetailsModal($id = '')
    {    	
        parse_str($_POST['postdata'], $_POST);//This will convert the string to array
        if(isset($_POST['submit1'])){

        	$value_array=array(
				'equipmentCalibrationID'							=>	($this->input->post('equipmentCalibrationID')!='') ? $this->input->post('equipmentCalibrationID') : '',
				'equipment_recorder_serial_no'	=>	($this->input->post('equipment_recorder_serial_no')!='') ? $this->input->post('equipment_recorder_serial_no') : '',
				'equipment_recorder_certificate_no'						=>	($this->input->post('equipment_recorder_certificate_no')!='') ? $this->input->post('equipment_recorder_certificate_no') : '',
				'equipment_recorder_date_of_issue'						=>	($this->input->post('equipment_recorder_date_of_issue')!='') ? date('Y-m-d',strtotime($this->input->post('equipment_recorder_date_of_issue'))) : '',
				'equipment_recorder_expiry_date'						=>	($this->input->post('equipment_recorder_expiry_date')!='') ? date('Y-m-d',strtotime($this->input->post('equipment_recorder_expiry_date'))) : '',

				'equipment_recorder_range'					=>	($this->input->post('equipment_recorder_range')!='') ? $this->input->post('equipment_recorder_range') : '',
				'equipment_recorder_zero'						=>	($this->input->post('equipment_recorder_zero')!='') ? $this->input->post('equipment_recorder_zero') : '',
				'equipment_recorder_updateBy'						=>	$this->session->userdata('user_id'),
				'equipment_recorder_updateOn'						=>	date('Y-m-d H:i:s')
			);


        	$alreadyExistRecord	=	$this->mcommon->specific_record_counts('jr_equipment_recorder',array('equipmentCalibrationID'=>$this->input->post('equipmentCalibrationID'))); 

            if($this->input->post('equipmentRecorderID')!='')
			{
				$where_array=array(
					'equipmentRecorderID'			 =>	$this->input->post('equipmentRecorderID')
				);
				$resultupdate=$this->mcommon->common_edit('jr_equipment_recorder',$value_array,$where_array);
			}
			else
			{
				if($alreadyExistRecord == 0){
					$value_array['equipment_recorder_createBy'] = $this->session->userdata('user_id');
					$value_array['equipmen_recordert_createOn'] = date('Y-m-d H:i:s');
				            
					$result=$this->mcommon->common_insert('jr_equipment_recorder',$value_array);
				} else {
					$resultExistRecord=1;
				}
			}
						
        }

        if(isset($_POST['submit'])){

        	if($this->input->post('equipment_pressure_input1')!='' || $this->input->post('equipment_pressure_output1')!='' || $this->input->post('equipment_pressure_error1')!='' || $this->input->post('equipment_pressure_input2')!='' || $this->input->post('equipment_pressure_output2')!='' || $this->input->post('equipment_pressure_error2')!=''){

        		//$additionalrow = $this->input->post('additionalrow');
        		$this->mcommon->common_delete('jr_equipment_pressure',array('equipmentCalibrationID' =>$this->input->post('equipmentCalibrationID')));
        		$equipmentPressureInput1Value = ($this->input->post('equipment_pressure_input1')!='') ? $this->input->post('equipment_pressure_input1') : '';
        		//for($i=0; $i < $additionalrow; $i++) { 

        		foreach ($equipmentPressureInput1Value as $key => $value) {

        			$value_array=array(
						'equipmentCalibrationID'							=>	($this->input->post('equipmentCalibrationID')!='') ? $this->input->post('equipmentCalibrationID') : '',
						'equipment_pressure_input1'	=>	($this->input->post('equipment_pressure_input1')[$key]!='') ? $this->input->post('equipment_pressure_input1')[$key] : '',
						'equipment_pressure_output1'			=>	($this->input->post('equipment_pressure_output1')[$key]!='') ? $this->input->post('equipment_pressure_output1')[$key] : '',
						'equipment_pressure_error1'			=>	($this->input->post('equipment_pressure_error1')[$key]!='') ? $this->input->post('equipment_pressure_error1')[$key] : '',
						'equipment_pressure_input2'			=>	($this->input->post('equipment_pressure_input2')[$key]!='') ? $this->input->post('equipment_pressure_input2')[$key] : '',
						'equipment_pressure_output2'			=>	($this->input->post('equipment_pressure_output2')[$key]!='') ? $this->input->post('equipment_pressure_output2')[$key] : '',
						'equipment_pressure_error2'			=>	($this->input->post('equipment_pressure_error2')[$key]!='') ? $this->input->post('equipment_pressure_error2')[$key] : '',
						'equipment_pressure_updateBy'		=>	$this->session->userdata('user_id'),
						'equipment_pressure_updateOn'		=>	date('Y-m-d H:i:s')
					);

	                /*if($this->input->post('equipment_additional_id')[$i]!='')
					{
						
						$where_array=array(
							'equipment_additional_id'	=>	$this->input->post('equipment_additional_id')[$i]
						);
						$resultupdate=$this->mcommon->common_edit('jr_equipment_additional',$value_array,$where_array);
					}
					else
					{*/
						$value_array['equipment_pressure_createBy'] = $this->session->userdata('user_id');
						$value_array['equipment_pressure_createOn'] = date('Y-m-d H:i:s');
						            
						$result=$this->mcommon->common_insert('jr_equipment_pressure',$value_array);
					//}
				}
			}
			
        }

        if($id != ''){
	        $delete=$this->mcommon->common_delete('jr_equipment_pressure',array('equipment_pressure_id' => $id));
		}


        $fields_arrayPackage = array(
			'p.equipment_pressure_id','p.equipment_pressure_input1','p.equipment_pressure_output1','p.equipment_pressure_error1','p.equipment_pressure_input2','p.equipment_pressure_output2','p.equipment_pressure_error2'
		);

			//public function join_records_all($fields, $table, $joinArr, $constraint_array = '', $groupBy = '', $orderby = '', $limit='', $resultType='' )


		$data['datatablevalue'] =   $this->mcommon->join_records_all($fields_arrayPackage, 'jr_equipment_pressure as p', '', '', '', '`p.equipment_pressure_id` ASC ','','array');

				
	//}
		$view_data['datatablevalueForm'] = $this->load->view('masters/Equipment/updatePressureModalDatatable',$data,TRUE);

        if($result){ 
        	$view_data['result'] = 'Success';
        	$view_data['res_type'] = 'success';
        	$view_data['res'] = lang('common_message_create');
            echo json_encode($view_data);
        } elseif($resultupdate){             	
        	$view_data['result'] = 'Update';
        	$view_data['res_type'] = 'success';
        	$view_data['res'] = lang('common_message_update');
            echo json_encode($view_data);
        } elseif($delete) {            	       	
        	$view_data['result'] = 'Success';
        	$view_data['res_type'] = 'danger';
        	$view_data['res'] = lang('common_message_delete');
            echo json_encode($view_data);
        	//Error ExistRecord
        } elseif($resultExistRecord) {            	       	
        	$view_data['result'] = 'ExistRecord';
        	$view_data['res_type'] = 'warning';
        	$view_data['res'] = lang('common_message_existRecord');
            echo json_encode($view_data);
        	//Error ExistRecord
        } else{
        	if(isset($_GET['equipmentCalibrationID'])){
        		$where_array=array(
					'equipmentCalibrationID'=>$_GET['equipmentCalibrationID']
				);
				$view_data['value']=$this->mcommon->get_fulldataAll('jr_equipment_pressure',$where_array);

				
				$view_data['valueRecorder']=$this->mcommon->get_fulldata('jr_equipment_recorder',$where_array);

        		$view_data['equipmentCalibrationID'] = $_GET['equipmentCalibrationID'];
        	}else{
        		$view_data['equipmentCalibrationID'] = $this->input->post('equipmentCalibrationID');
        	}
           echo $this->load->view('masters/Equipment/updatePressureDetailsDataModal', $view_data,TRUE);
        }
    }

    public function getPressureContent(){
		//$view_data['in']=$this->input->get('i')+1;
		$view_data['in']=$this->input->get('i');
		echo $this->load->view('masters/Equipment/updatePressureDetailsDataModalAddRow', $view_data,TRUE);
	}

	public function getupdateEquipmentTemperatureDetailsModal($id = '')
    {    	
        parse_str($_POST['postdata'], $_POST);//This will convert the string to array
        if(isset($_POST['submit1'])){

        	$value_array=array(
				'equipmentCalibrationID'							=>	($this->input->post('equipmentCalibrationID')!='') ? $this->input->post('equipmentCalibrationID') : '',
				'equipment_recorder_serial_no'	=>	($this->input->post('equipment_recorder_serial_no')!='') ? $this->input->post('equipment_recorder_serial_no') : '',
				'equipment_recorder_certificate_no'						=>	($this->input->post('equipment_recorder_certificate_no')!='') ? $this->input->post('equipment_recorder_certificate_no') : '',
				'equipment_recorder_date_of_issue'						=>	($this->input->post('equipment_recorder_date_of_issue')!='') ? date('Y-m-d',strtotime($this->input->post('equipment_recorder_date_of_issue'))) : '',
				'equipment_recorder_expiry_date'						=>	($this->input->post('equipment_recorder_expiry_date')!='') ? date('Y-m-d',strtotime($this->input->post('equipment_recorder_expiry_date'))) : '',

				'equipment_recorder_range'					=>	($this->input->post('equipment_recorder_range')!='') ? $this->input->post('equipment_recorder_range') : '',
				'equipment_recorder_zero'						=>	($this->input->post('equipment_recorder_zero')!='') ? $this->input->post('equipment_recorder_zero') : '',
				'equipment_recorder_updateBy'						=>	$this->session->userdata('user_id'),
				'equipment_recorder_updateOn'						=>	date('Y-m-d H:i:s')
			);


        	$alreadyExistRecord	=	$this->mcommon->specific_record_counts('jr_equipment_recorder',array('equipmentCalibrationID'=>$this->input->post('equipmentCalibrationID'))); 

            if($this->input->post('equipmentRecorderID')!='')
			{
				$where_array=array(
					'equipmentRecorderID'			 =>	$this->input->post('equipmentRecorderID')
				);
				$resultupdate=$this->mcommon->common_edit('jr_equipment_recorder',$value_array,$where_array);
			}
			else
			{
				if($alreadyExistRecord == 0){
					$value_array['equipment_recorder_createBy'] = $this->session->userdata('user_id');
					$value_array['equipmen_recordert_createOn'] = date('Y-m-d H:i:s');
				            
					$result=$this->mcommon->common_insert('jr_equipment_recorder',$value_array);
				} else {
					$resultExistRecord=1;
				}
			}
						
        }

        if(isset($_POST['submit'])){

        	if($this->input->post('equipment_temperature_degress')!='' || $this->input->post('equipment_temperature_ambient')!='' || $this->input->post('equipment_temperature_dergrees')!=''){

        		//$additionalrow = $this->input->post('additionalrow');
        		$this->mcommon->common_delete('jr_equipment_temperature',array('equipmentCalibrationID' =>$this->input->post('equipmentCalibrationID')));
        		$equipmentTemperatureDegressValue = ($this->input->post('equipment_temperature_degress')!='') ? $this->input->post('equipment_temperature_degress') : '';
        		//for($i=0; $i < $additionalrow; $i++) { 

        		foreach ($equipmentTemperatureDegressValue as $key => $value) {

        			$value_array=array(
						'equipmentCalibrationID'				=>	($this->input->post('equipmentCalibrationID')!='') ? $this->input->post('equipmentCalibrationID') : '',
						'equipment_temperature_degress'	=>	($this->input->post('equipment_temperature_degress')[$key]!='') ? $this->input->post('equipment_temperature_degress')[$key] : '',
						'equipment_temperature_ambient'			=>	($this->input->post('equipment_temperature_ambient')[$key]!='') ? $this->input->post('equipment_temperature_ambient')[$key] : '',
						'equipment_temperature_dergrees'			=>	($this->input->post('equipment_temperature_dergrees')[$key]!='') ? $this->input->post('equipment_temperature_dergrees')[$key] : '',
						'equipment_temperature_updateBy'		=>	$this->session->userdata('user_id'),
						'equipment_temperature_updateOn'		=>	date('Y-m-d H:i:s')
					);

	                /*if($this->input->post('equipment_additional_id')[$i]!='')
					{
						
						$where_array=array(
							'equipment_additional_id'	=>	$this->input->post('equipment_additional_id')[$i]
						);
						$resultupdate=$this->mcommon->common_edit('jr_equipment_additional',$value_array,$where_array);
					}
					else
					{*/
						$value_array['equipment_temperature_createBy'] = $this->session->userdata('user_id');
						$value_array['equipment_temperature_createOn'] = date('Y-m-d H:i:s');
						            
						$result=$this->mcommon->common_insert('jr_equipment_temperature',$value_array);
					//}
				}
			}
			
        }

        if($id != ''){
	        $delete=$this->mcommon->common_delete('jr_equipment_temperature',array('equipment_temperature_id' => $id));
		}


        $fields_arrayPackage = array(
			'p.equipment_temperature_id','p.equipment_temperature_degress','p.equipment_temperature_ambient','p.equipment_temperature_dergrees'
		);

			//public function join_records_all($fields, $table, $joinArr, $constraint_array = '', $groupBy = '', $orderby = '', $limit='', $resultType='' )


		$data['datatablevalue'] =   $this->mcommon->join_records_all($fields_arrayPackage, 'jr_equipment_temperature as p', '', '', '', '`p.equipment_temperature_id` ASC ','','array');

				
	//}
		$view_data['datatablevalueForm'] = $this->load->view('masters/Equipment/updateTemperatureModalDatatable',$data,TRUE);

        if($result){ 
        	$view_data['result'] = 'Success';
        	$view_data['res_type'] = 'success';
        	$view_data['res'] = lang('common_message_create');
            echo json_encode($view_data);
        } elseif($resultupdate){             	
        	$view_data['result'] = 'Update';
        	$view_data['res_type'] = 'success';
        	$view_data['res'] = lang('common_message_update');
            echo json_encode($view_data);
        } elseif($delete) {            	       	
        	$view_data['result'] = 'Success';
        	$view_data['res_type'] = 'danger';
        	$view_data['res'] = lang('common_message_delete');
            echo json_encode($view_data);
        	//Error ExistRecord
        } elseif($resultExistRecord) {            	       	
        	$view_data['result'] = 'ExistRecord';
        	$view_data['res_type'] = 'warning';
        	$view_data['res'] = lang('common_message_existRecord');
            echo json_encode($view_data);
        	//Error ExistRecord
        } else{
        	if(isset($_GET['equipmentCalibrationID'])){
        		$where_array=array(
					'equipmentCalibrationID'=>$_GET['equipmentCalibrationID']
				);
				$view_data['value']=$this->mcommon->get_fulldataAll('jr_equipment_temperature',$where_array);

				
				$view_data['valueRecorder']=$this->mcommon->get_fulldata('jr_equipment_recorder',$where_array);

        		$view_data['equipmentCalibrationID'] = $_GET['equipmentCalibrationID'];
        	}else{
        		$view_data['equipmentCalibrationID'] = $this->input->post('equipmentCalibrationID');
        	}
           echo $this->load->view('masters/Equipment/updateTemperatureDetailsDataModal', $view_data,TRUE);
        }
    }

    public function getTemperatureContent(){
		//$view_data['in']=$this->input->get('i')+1;
		$view_data['in']=$this->input->get('i');
		echo $this->load->view('masters/Equipment/updateTemperatureDetailsDataModalAddRow', $view_data,TRUE);
	}

	// Ajax ADD - Attachement Modal Window 
    public function getupdateEquipmentAttachementModal($id = '')
    {    	
            //parse_str($_POST['postdata'], $_POST);//This will convert the string to array
            if(isset($_POST['submit']))
            {

            	$value_array=array(
					'equipmentCalibrationID'				=>	($this->input->post('equipmentCalibrationID')!='') ? $this->input->post('equipmentCalibrationID') : '',
					'equipment_calibration_attachement_type_name'	=>	($this->input->post('equipment_calibration_attachement_type_name')!='') ? $this->input->post('equipment_calibration_attachement_type_name') : '',
					'equipment_calibration_attachement_updateBy'	=>	$this->session->userdata('user_id'),
					'equipment_calibration_attachement_updateOn'	=>	date('Y-m-d H:i:s') 
				);

				
				if($_FILES['equipment_calibration_attachement_file_name']['name']!='')
				{
					if (!file_exists(FCPATH.'/~cdn/attachementCalibration/'))
			        {
					    mkdir(FCPATH.'/~cdn/attachementCalibration/', 0777, true);
					}

					$config = array();
					$config['upload_path'] = '.././~cdn/attachementCalibration/';
					$config['allowed_types'] = 'gif|jpg|png|pdf';
					$config['max_size'] = '5000';
					$config['max_width'] = '3500';
					$config['max_height'] = '3500';
					$config['max_filename'] = '500';
					$config['overwrite'] = false;
					$this->upload->initialize($config);
					$this->load->library('image_lib');
					$this->load->library('upload', $config);
					$images = array();

					if($this->upload->do_upload('equipment_calibration_attachement_file_name'))
					{	
						$this->load->helper('inflector');
						$file_name = underscore($_FILES['equipment_calibration_attachement_file_name']['name']);
						$config['file_name'] = $file_name;
						$image_data['message'] = $this->upload->data(); 

						$_POST[equipment_calibration_attachement_file_name]="~cdn/attachementCalibration/".$image_data['message']['file_name'];
						$_POST[equipment_calibration_attachement_file_size]= $_FILES['equipment_calibration_attachement_file_name']['size'];
						$_POST[equipment_calibration_attachement_file_type]= $_FILES['equipment_calibration_attachement_file_name']['type'];
					} 
					else
					{
						$data['equipment_calibration_attachement_file_name'] = $this->upload->display_errors('<div class="alert alert-error">', '</div>');
						$this->form_validation->set_rules('equipment_calibration_attachement_file_name', $this->upload->display_errors(), 'required');                
					}	
				}
			
            	//$alreadyExistRecord	=	$this->mcommon->specific_record_counts('jr_welder_attachement',array('welderID'=>$this->input->post('welderID'))); 

                if($this->input->post('attachement_equipment_calibration_id')!='')
				{
					/*if($_FILES['attachement_file_name']['name']!='')
					{
	 					unlink(FCPATH .$this->input->post('old_attachement_file_name')); 
						$value_array = array_merge($value_array, array('attachement_file_name'=>$this->input->post('attachement_file_name')));
					}
					$where_array=array(
						'attachement_welder_id'		=>	$this->input->post('attachement_welder_id')
					);
					$resultupdate=$this->mcommon->common_edit('jr_welder_attachement',$value_array,$where_array);
					*/
					$resultupdate=1;
				}
				else
				{
					if($_FILES['equipment_calibration_attachement_file_name']['name']!=''){
						//if($alreadyExistRecord == '' && $alreadyExistRecord == 0 && $this->input->post('welderID')!=''){

							$value_array['equipment_calibration_attachement_file_name'] = ($this->input->post('equipment_calibration_attachement_file_name')!='') ? $this->input->post('equipment_calibration_attachement_file_name') : '';
							$value_array['equipment_calibration_attachement_file_size'] = ($this->input->post('equipment_calibration_attachement_file_size')!='') ? $this->input->post('equipment_calibration_attachement_file_size') : '';
							$value_array['equipment_calibration_attachement_file_type'] = ($this->input->post('equipment_calibration_attachement_file_type')!='') ? $this->input->post('equipment_calibration_attachement_file_type') : '';
							$value_array['equipment_calibration_attachement_createBy'] = $this->session->userdata('user_id');
							$value_array['equipment_calibration_attachement_createOn'] = date('Y-m-d H:i:s');
						            
							$result=$this->mcommon->common_insert('jr_equipment_calibration_attachement',$value_array);
						/*} else {
							$resultExistRecord=1;
						}*/
					}
				}
				
	            //}       
            }


            if($id != '')
			{
				$wheredelete_array=array(
					'attachement_equipment_calibration_id'     =>$id
				);
				$deleteImagePath	=	$this->mcommon->specific_row_value('jr_equipment_calibration_attachement',$wheredelete_array,'equipment_calibration_attachement_file_name');
		        $delete=$this->mcommon->common_delete('jr_equipment_calibration_attachement',$wheredelete_array);
		        if($delete){
		       		unlink(FCPATH .$deleteImagePath);
		        }
			}

            $view_data=array();
            //if(isset($_GET['welderID']) || isset($_POST['welderID'])){
				$fields_arrayPackage = array(
					'p.attachement_equipment_calibration_id','p.equipmentCalibrationID','p.equipment_calibration_attachement_type_name','p.equipment_calibration_attachement_file_name','p.equipment_calibration_attachement_file_type','p.equipment_calibration_attachement_file_size','u1.first_name as firstname','p.equipment_calibration_attachement_updateOn'
				);
				$data['datatablevalue'] =   $this->mcommon->join_records_all($fields_arrayPackage, 'jr_equipment_calibration_attachement as p', array('users AS u1' => 'u1.id = p.equipment_calibration_attachement_updateBy'), array('p.equipment_calibration_attachement_show_status' =>'1'), '', '`p.attachement_equipment_calibration_id` ASC ','','array');
        	//}
				$view_data['datatablevalueForm'] = $this->load->view('masters/Equipment/updateEquipmentAttachementModalDatatable',$data,TRUE);


            if($result){ 
            	$view_data['result'] = 'Success';
            	$view_data['res_type'] = 'success';
            	$view_data['res'] = lang('common_message_create');
                echo json_encode($view_data);
            } elseif($resultupdate){             	
            	$view_data['result'] = 'Update';
            	$view_data['res_type'] = 'success';
            	$view_data['res'] = lang('common_message_update');
                echo json_encode($view_data);
            } elseif($resultExistRecord) {            	       	
            	$view_data['result'] = 'ExistRecord';
            	$view_data['res_type'] = 'warning';
            	$view_data['res'] = lang('common_message_existRecord');
                echo json_encode($view_data);
            	//Error ExistRecord
            } elseif($delete) {            	       	
            	$view_data['result'] = 'Success';
            	$view_data['res_type'] = 'danger';
            	$view_data['res'] = lang('common_message_delete');
                echo json_encode($view_data);
            	//Error ExistRecord
            } else {
            	if(isset($_GET['equipmentCalibrationID'])){
            		//echo "dfsdfd";
            		/*$where_array=array(
						'welderID'=>$_GET['welderID']
					);
					$view_data['value']=$this->mcommon->get_fulldata('jr_welder_attachement',$where_array);
					*/
					/*$fields_arrayPackage = array(
						'p.attachement_welder_id','p.attachement_type_name','p.attachement_file_name','p.attachement_file_type','p.attachement_file_size','u1.first_name as firstname','p.attachement_updateOn'
					);
					$view_data['datatablevalue'] =   $this->mcommon->join_records_all($fields_arrayPackage, 'jr_welder_attachement as p', array('users AS u1' => 'u1.id = p.attachement_updateBy'), array('p.attachement_show_status' =>'1'), '', '`p.attachement_welder_id` ASC ','','array');*/
            		$view_data['equipmentCalibrationID'] = $_GET['equipmentCalibrationID'];
            	}else{
            		$view_data['equipmentCalibrationID'] = $this->input->post('equipmentCalibrationID');
            	}


            	/*echo "<pre>";
            	print_r($view_data);
            	echo "</pre>";
*/
                echo $this->load->view('masters/Equipment/updateEquipmentAttachementModal', $view_data,TRUE);
            }
    }




	// Ajax ADD - VI Model Window 
    public function getupdateAttributeVIModal()
    {    	
    	$fields_arrayCerIns = array(
    		'u.id as Key','s.staffs_employee_name as Value'
    	);
		$joinArrCerIns      = array(
			'users as u'    => " s.user_id = u.id AND u.active='1' ",
        );
		$whereArrCerIns        = "u.active='1'";

    	$view_data['drop_down_certified_welding_inspector']	=	$this->mcommon->Dropdown('jr_staffs as s',$fields_arrayCerIns,$joinArrCerIns,$whereArrCerIns,'','`u.id` ASC ','');

    	$fields_arrayndtcontractor = array(
    		'ndtContractor_id as Key','ndtContractor_name as Value'
    	);
		$whereArrndtcontractor        = "ndtContractor_show_status ='1'";

    	$view_data['drop_down_ndtcontractor']	=	$this->mcommon->Dropdown('jr_ndtcontractor',$fields_arrayndtcontractor,'',$whereArrndtcontractor,'','`ndtContractor_id` ASC ','');


    	$fields_arraytestresult = array(
    		'tr_id as Key','tr_name as Value'
    	);
		$whereArrtestresult        = "tr_show_status ='1'";

    	$view_data['drop_down_testresult']	=	$this->mcommon->Dropdown('jr_testresult',$fields_arraytestresult,'',$whereArrtestresult,'','`tr_id` ASC ','');

    	

            parse_str($_POST['postdata'], $_POST);//This will convert the string to array
            if(isset($_POST['submit']))
            {
            	/*$this->form_validation->set_rules('check_number', 'Number', 'required');

                if ($this->form_validation->run() == TRUE)
                {*/

            	$value_array=array(
					'welderID'							=>	($this->input->post('welderID')!='') ? $this->input->post('welderID') : '',
					'vi_certified_welding_inspector'	=>	($this->input->post('vi_certified_welding_inspector')!='') ? $this->input->post('vi_certified_welding_inspector') : '',
					'vi_weld_no'						=>	($this->input->post('vi_weld_no')!='') ? $this->input->post('vi_weld_no') : '',
					'vi_weld_thickness'					=>	($this->input->post('vi_weld_thickness')!='') ? $this->input->post('vi_weld_thickness') : '',
					'vi_ndt_contractor'					=>	($this->input->post('vi_ndt_contractor')!='') ? $this->input->post('vi_ndt_contractor') : '',

					'vi_test_date'						=>	($this->input->post('vi_test_date')!='') ? date('Y-m-d',strtotime($this->input->post('vi_test_date'))) : '',

					'vi_test_result'					=>	($this->input->post('vi_test_result')!='') ? $this->input->post('vi_test_result') : '',
					'vi_remarks'						=>	($this->input->post('vi_remarks')!='') ? $this->input->post('vi_remarks') : '',
					'vi_updateBy'						=>	$this->session->userdata('user_id'),
					'vi_updateOn'						=>	date('Y-m-d H:i:s')
				);


            	$alreadyExistRecord	=	$this->mcommon->specific_record_counts('jr_welder_vi',array('welderID'=>$this->input->post('welderID'))); 

                if($this->input->post('vi_welder_id')!='')
				{
					$where_array=array(
						'vi_welder_id'			 =>	$this->input->post('vi_welder_id')
					);
					$resultupdate=$this->mcommon->common_edit('jr_welder_vi',$value_array,$where_array);
				}
				else
				{
					if($alreadyExistRecord == 0){
						$value_array['vi_createBy'] = $this->session->userdata('user_id');
						$value_array['vi_createOn'] = date('Y-m-d H:i:s');
					            
						$result=$this->mcommon->common_insert('jr_welder_vi',$value_array);
					} else {
						$resultExistRecord=1;
					}
				}
				
	            //}       
            }

            if($result){ 
            	$data=array(
					'result' 	=> 'Success',
					'res_type' 	=> 'success',
					'res' 	=> lang('common_message_create')
				);
                echo json_encode($data);
            }
            elseif($resultupdate){ 
            	$data=array(
					'result' 	=> 'Update',
					'res_type' 	=> 'success',
					'res' 	=> lang('common_message_update')
				);
                echo json_encode($data);
            }
            elseif($resultExistRecord) {
            	$data=array(
					'result' 	=> 'ExistRecord',
					'res_type' 	=> 'warning',
					'res' 	=> lang('common_message_existRecord')
				);
                echo json_encode($data);
                //Error ExistRecord
            }
            else
            {
            	if(isset($_GET['welderID'])){
            		$where_array=array(
						'welderID'=>$_GET['welderID']
					);
					$view_data['value']=$this->mcommon->get_fulldata('jr_welder_vi',$where_array);

            		$view_data['welderID'] = $_GET['welderID'];
            	}else{
            		$view_data['welderID'] = $this->input->post('welderID');
            	}
               echo $this->load->view('masters/Equipment/updateAttributeVIModal', $view_data,TRUE);
            }
    }

    // Ajax ADD - NDTodel Window 
    public function getupdateAttributeNDTModal()
    {    	
    	$fields_arrayNDTType = array(
    		'ndttype_id as Key','ndttype_name as Value'
    	);
		$whereArrNDTType        = "ndttype_show_status ='1'";

    	$view_data['drop_down_ndttype']	=	$this->mcommon->Dropdown('jr_ndttype',$fields_arrayNDTType,'',$whereArrNDTType,'','`ndttype_id` ASC ','');


    	$fields_arraytestresult = array(
    		'tr_id as Key','tr_name as Value'
    	);
		$whereArrtestresult        = "tr_show_status ='1'";

    	$view_data['drop_down_testresult']	=	$this->mcommon->Dropdown('jr_testresult',$fields_arraytestresult,'',$whereArrtestresult,'','`tr_id` ASC ','');

    	

            parse_str($_POST['postdata'], $_POST);//This will convert the string to array
            if(isset($_POST['submit']))
            {
            	/*$this->form_validation->set_rules('check_number', 'Number', 'required');

                if ($this->form_validation->run() == TRUE)
                {*/

            	$value_array=array(
					'welderID'				=>	($this->input->post('welderID')!='') ? $this->input->post('welderID') : '',
					'ndt_type'				=>	($this->input->post('ndt_type')!='') ? $this->input->post('ndt_type') : '',
					'ndt_technician_name'	=>	($this->input->post('ndt_technician_name')!='') ? $this->input->post('ndt_technician_name') : '',
					'ndt_date'				=>	($this->input->post('ndt_date')!='') ? date('Y-m-d',strtotime($this->input->post('ndt_date'))) : '',
					'ndt_report_no'			=>	($this->input->post('ndt_report_no')!='') ? $this->input->post('ndt_report_no') : '',
					'ndt_issued_date'		=>	($this->input->post('ndt_issued_date')!='') ? date('Y-m-d',strtotime($this->input->post('ndt_issued_date'))) : '',

					'ndt_test_result'		=>	($this->input->post('ndt_test_result')!='') ? $this->input->post('ndt_test_result') : '',
					'ndt_remarks'			=>	($this->input->post('ndt_remarks')!='') ? $this->input->post('ndt_remarks') : '',
					'ndt_updateBy'			=>	$this->session->userdata('user_id'),
					'ndt_updateOn'			=>	date('Y-m-d H:i:s') 
				);


            	$alreadyExistRecord	=	$this->mcommon->specific_record_counts('jr_welder_ndt',array('welderID'=>$this->input->post('welderID'))); 

                if($this->input->post('ndt_welder_id')!='')
				{
					$where_array=array(
						'ndt_welder_id'		=>	$this->input->post('ndt_welder_id')
					);
					$resultupdate=$this->mcommon->common_edit('jr_welder_ndt',$value_array,$where_array);
				}
				else
				{
					if($alreadyExistRecord == 0){
						$value_array['ndt_createBy'] = $this->session->userdata('user_id');
						$value_array['ndt_createOn'] = date('Y-m-d H:i:s');
					            
						$result=$this->mcommon->common_insert('jr_welder_ndt',$value_array);
					} else {
						$resultExistRecord=1;
					}
				}
				
	            //}       
            }

            if($result){ 
            	$data=array(
					'result' 	=> 'Success',
					'res_type' 	=> 'success',
					'res' 	=> lang('common_message_create')
				);
                echo json_encode($data);
            }
            elseif($resultupdate){ 
            	$data=array(
					'result' 	=> 'Update',
					'res_type' 	=> 'success',
					'res' 	=> lang('common_message_update')
				);
                echo json_encode($data);
            }
            elseif($resultExistRecord) {
            	$data=array(
					'result' 	=> 'ExistRecord',
					'res_type' 	=> 'warning',
					'res' 	=> lang('common_message_existRecord')
				);
                echo json_encode($data);
                //Error ExistRecord
            }
            else
            {
            	if(isset($_GET['welderID'])){
            		$where_array=array(
						'welderID'=>$_GET['welderID']
					);
					$view_data['value']=$this->mcommon->get_fulldata('jr_welder_ndt',$where_array);

            		$view_data['welderID'] = $_GET['welderID'];
            	}else{
            		$view_data['welderID'] = $this->input->post('welderID');
            	}
               echo $this->load->view('masters/Equipment/updateAttributeNDTModal', $view_data,TRUE);
            }
    }
	

    // Ajax ADD - Attachement Modal Window 
    public function getupdateAttachementModal($id = '')
    {    	
            //parse_str($_POST['postdata'], $_POST);//This will convert the string to array
            if(isset($_POST['submit']))
            {
            	/*$this->form_validation->set_rules('check_number', 'Number', 'required');

                if ($this->form_validation->run() == TRUE)
                {*/

                	//welderID,attachement_welder_id,old_attachement_file_name,attachement_file_name,attachement_type_name


            	$value_array=array(
					'welderID'				=>	($this->input->post('welderID')!='') ? $this->input->post('welderID') : '',
					'attachement_type_name'	=>	($this->input->post('attachement_type_name')!='') ? $this->input->post('attachement_type_name') : '',
					'attachement_updateBy'	=>	$this->session->userdata('user_id'),
					'attachement_updateOn'	=>	date('Y-m-d H:i:s') 
				);

				
				if($_FILES['attachement_file_name']['name']!='')
				{
					$config = array();
					$config['upload_path'] = '.././Attachement/';
					$config['allowed_types'] = 'gif|jpg|png|pdf';
					$config['max_size'] = '5000';
					$config['max_width'] = '3500';
					$config['max_height'] = '3500';
					$config['max_filename'] = '500';
					$config['overwrite'] = false;
					$this->upload->initialize($config);
					$this->load->library('image_lib');
					$this->load->library('upload', $config);
					$images = array();

					if($this->upload->do_upload('attachement_file_name'))
					{	
						$this->load->helper('inflector');
						$file_name = underscore($_FILES['attachement_file_name']['name']);
						$config['file_name'] = $file_name;
						$image_data['message'] = $this->upload->data(); 

						$_POST[attachement_file_name]="attachement/".$image_data['message']['file_name'];
						$_POST[attachement_file_size]= $_FILES['attachement_file_name']['size'];
						$_POST[attachement_file_type]= $_FILES['attachement_file_name']['type'];
					} 
					else
					{
						$data['attachement_file_name'] = $this->upload->display_errors('<div class="alert alert-error">', '</div>');
						$this->form_validation->set_rules('attachement_file_name', $this->upload->display_errors(), 'required');                
					}	
				}
			
            	//$alreadyExistRecord	=	$this->mcommon->specific_record_counts('jr_welder_attachement',array('welderID'=>$this->input->post('welderID'))); 

                if($this->input->post('attachement_welder_id')!='')
				{
					/*if($_FILES['attachement_file_name']['name']!='')
					{
	 					unlink(FCPATH .$this->input->post('old_attachement_file_name')); 
						$value_array = array_merge($value_array, array('attachement_file_name'=>$this->input->post('attachement_file_name')));
					}
					$where_array=array(
						'attachement_welder_id'		=>	$this->input->post('attachement_welder_id')
					);
					$resultupdate=$this->mcommon->common_edit('jr_welder_attachement',$value_array,$where_array);
					*/
					$resultupdate=1;
				}
				else
				{
					if($_FILES['attachement_file_name']['name']!=''){
						//if($alreadyExistRecord == '' && $alreadyExistRecord == 0 && $this->input->post('welderID')!=''){

							$value_array['attachement_file_name'] = ($this->input->post('attachement_file_name')!='') ? $this->input->post('attachement_file_name') : '';
							$value_array['attachement_file_size'] = ($this->input->post('attachement_file_size')!='') ? $this->input->post('attachement_file_size') : '';
							$value_array['attachement_file_type'] = ($this->input->post('attachement_file_type')!='') ? $this->input->post('attachement_file_type') : '';
							$value_array['attachement_createBy'] = $this->session->userdata('user_id');
							$value_array['attachement_createOn'] = date('Y-m-d H:i:s');
						            
							$result=$this->mcommon->common_insert('jr_welder_attachement',$value_array);
						/*} else {
							$resultExistRecord=1;
						}*/
					}
				}
				
	            //}       
            }


            if($id != '')
			{
				$wheredelete_array=array(
					'attachement_welder_id'     =>$id
				);
				$deleteImagePath	=	$this->mcommon->specific_row_value('jr_welder_attachement',$wheredelete_array,'attachement_file_name');
		        $delete=$this->mcommon->common_delete('jr_welder_attachement',$wheredelete_array);
		        if($delete){
		       		unlink(FCPATH .$deleteImagePath);
		        }
			}

            $view_data=array();
            //if(isset($_GET['welderID']) || isset($_POST['welderID'])){
				$fields_arrayPackage = array(
					'p.attachement_welder_id','p.attachement_type_name','p.attachement_file_name','p.attachement_file_type','p.attachement_file_size','u1.first_name as firstname','p.attachement_updateOn'
				);
				$data['datatablevalue'] =   $this->mcommon->join_records_all($fields_arrayPackage, 'jr_welder_attachement as p', array('users AS u1' => 'u1.id = p.attachement_updateBy'), array('p.attachement_show_status' =>'1'), '', '`p.attachement_welder_id` ASC ','','array');
        	//}
				$view_data['datatablevalueForm'] = $this->load->view('masters/Equipment/updateAttachementModalDatatable',$data,TRUE);


            if($result){ 
            	$view_data['result'] = 'Success';
            	$view_data['res_type'] = 'success';
            	$view_data['res'] = lang('common_message_create');
                echo json_encode($view_data);
            } elseif($resultupdate){             	
            	$view_data['result'] = 'Update';
            	$view_data['res_type'] = 'success';
            	$view_data['res'] = lang('common_message_update');
                echo json_encode($view_data);
            } elseif($resultExistRecord) {            	       	
            	$view_data['result'] = 'ExistRecord';
            	$view_data['res_type'] = 'warning';
            	$view_data['res'] = lang('common_message_existRecord');
                echo json_encode($view_data);
            	//Error ExistRecord
            } elseif($delete) {            	       	
            	$view_data['result'] = 'Success';
            	$view_data['res_type'] = 'danger';
            	$view_data['res'] = lang('common_message_delete');
                echo json_encode($view_data);
            	//Error ExistRecord
            } else {
            	if(isset($_GET['welderID'])){
            		//echo "dfsdfd";
            		/*$where_array=array(
						'welderID'=>$_GET['welderID']
					);
					$view_data['value']=$this->mcommon->get_fulldata('jr_welder_attachement',$where_array);
					*/
					/*$fields_arrayPackage = array(
						'p.attachement_welder_id','p.attachement_type_name','p.attachement_file_name','p.attachement_file_type','p.attachement_file_size','u1.first_name as firstname','p.attachement_updateOn'
					);
					$view_data['datatablevalue'] =   $this->mcommon->join_records_all($fields_arrayPackage, 'jr_welder_attachement as p', array('users AS u1' => 'u1.id = p.attachement_updateBy'), array('p.attachement_show_status' =>'1'), '', '`p.attachement_welder_id` ASC ','','array');*/
            		$view_data['welderID'] = $_GET['welderID'];
            	}else{
            		$view_data['welderID'] = $this->input->post('welderID');
            	}


            	/*echo "<pre>";
            	print_r($view_data);
            	echo "</pre>";
*/
                echo $this->load->view('masters/Welder/updateAttachementModal', $view_data,TRUE);
            }
    }

}



