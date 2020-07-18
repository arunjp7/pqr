<?php defined('BASEPATH') OR exit('No direct script access allowed');

class RoleModule extends CI_Controller
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
        $view_data['top_tittle']			=	lang('mm_masters_rolemodule_manage_toptitle');
        $view_data['top_tittle_pergram']	=	lang('mm_masters_rolemodule_manage_pergram');

        $view_data['add_button_url']		=	'admin/RoleModule/addUpdateForm';
    	$view_data['pdf_url']				=	'admin/RoleModule/downloadPDF';
    	$view_data['pdf_fileName']			=	lang('mm_masters_rolemodule_manage_exportPDFFileName').date('d_m_Y');    	
    	$view_data['export_url']			=	'admin/RoleModule/exportExcel';
    	$view_data['export_fileName']		=	lang('mm_masters_rolemodule_manage_exportPDFFileName').date('d_m_Y');

    	$view_data['datatable_url']			=	'admin/RoleModule/datatable';
    	$view_data['list_tittle']			=	lang('mm_masters_rolemodule_manage_list_title');
    	$view_data['list_tittle_small']		=	lang('mm_masters_rolemodule_manage_list_title_small');

		$data = array(
                    'title'     	=> lang('mm_masters_rolemodule_manage_view'),
                    'content'   	=>$this->load->view('admin/RoleModule/roleModuleDataList',$view_data,TRUE)                
                    );
        $this->load->view('base/template', $data); 
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
			'p.menu_id','p.menu_name','p.menu_area','p.menu_link','p.menu_position','p.menu_parent','p.menu_status','u.first_name','p.menu_createOn','u1.first_name as firstname','p.menu_updateOn'
		);
		$join_arrayPackage = array(
			'users AS u' => 'u.id = p.menu_createBy',
			'users AS u1' => 'u1.id = p.menu_updateBy',
		);
		//$where_arrayPackage = array('c.category_show_status' =>'1','s.status_show_status' =>'1');
		$where_arrayPackage = array('p.menu_parent' => '0','p.menu_status' => '1');
		$orderPackage = $sidx.' '. $sord;

		$count =   $this->mcommon->join_records_counts($fields_arrayPackage, 'jr_menu_module as p', $join_arrayPackage, $where_arrayPackage, '', $orderPackage);

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
		$dataTable_Details =   $this->mcommon->join_records_all($fields_arrayPackage, 'jr_menu_module as p', $join_arrayPackage, $where_arrayPackage, '', $orderPackage,'object');
		
		if (isset($dataTable_Details) && !empty($dataTable_Details)) {
			$i=0;
	        foreach ($dataTable_Details->result() as $dataDetail) {
	        	$responce->rows[$i]['id'] = $dataDetail->menu_id;
	        	//$responce->rows[$i]['cell']= array($dataDetail->ndtContractor_id);
	        	$responce->rows[$i]['cell']['edit_menu_id'] = get_buttons_new_only_Edit($dataDetail->menu_id,'admin/Equipment/');
	        	$responce->rows[$i]['cell']['delete_menu_id'] = get_buttons_new_only_Delete($dataDetail->menu_id,'admin/Equipment/');
	        	$responce->rows[$i]['cell']['menu_name'] = $dataDetail->menu_name;
	        	$responce->rows[$i]['cell']['menu_area'] = $dataDetail->menu_area;
	        	$responce->rows[$i]['cell']['menu_link'] = $dataDetail->menu_link;
	        	$responce->rows[$i]['cell']['menu_position'] = $dataDetail->menu_position;
	        	$responce->rows[$i]['cell']['first_name'] = $dataDetail->first_name;
	        	$responce->rows[$i]['cell']['menu_createOn'] = get_date_timeformat($dataDetail->menu_createOn);
	        	$responce->rows[$i]['cell']['firstname'] = $dataDetail->firstname;
	        	$responce->rows[$i]['cell']['menu_updateOn'] = get_date_timeformat($dataDetail->menu_updateOn);
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


	        	$responce->rows[$i]['cell']['edit_equipmentID'] = get_buttons_new_edit_calibration($dataDetail->equipmentID,'admin/Equipment/');
	        	$responce->rows[$i]['cell']['delete_equipmentID'] = get_buttons_new_delete_calibration($dataDetail->equipmentID,'admin/Equipment/');
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
        $view_data['top_tittle']			=	lang('mm_masters_rolemodule_manage_toptitle');
        $view_data['top_tittle_pergram']	=	lang('mm_masters_rolemodule_manage_pergram');

        $view_data['form_url']				=	'admin/RoleModule/create';
        $view_data['form_cancel_url']		=	'admin/RoleModule/';
        $view_data['form_tittle']			=	lang('mm_masters_rolemodule_manage_form_title');
        $view_data['form_tittle_small']		=	lang('mm_masters_rolemodule_manage_form_title_small');
        $view_data['form_button_name']		=	lang('mm_masters_rolemodule_manage_form_button_name');

        $view_data['user_group_menu_module']		=	$this->mdropdown->drop_menu_all_userGroupMenu();
    	$view_data['user_groups']			=	$this->ion_auth->groups()->result_array();
	


		

		$data = array(
                    'title'     	=> lang('mm_masters_rolemodule_manage_create'),
                    'content'   	=>$this->load->view('admin/RoleModule/roleModulemanagement',$view_data,TRUE)                
                    );
        $this->load->view('base/template', $data); 
	}

	// create Form
	// Last Updated by Vinitha 09/08/2016 
	public function create()
	{		
        $user   = $this->ion_auth->user()->row();
        if(isset($_POST['submit']))
		{			
			$this->form_validation->set_rules('name', lang('mm_masters_rolemodule_name'), 'required');
			$this->form_validation->set_rules('description', lang('mm_masters_rolemodule_description'), 'required');
			
            if ($this->form_validation->run() == true)
			{
				$value_array=array(
					'name'				=>	strtolower($this->input->post('name')),
					'description'		=>	$this->input->post('description'),
				);

				$moduleID = $this->input->post('module_id');

				
				if($this->input->post('id')!='')
				{
					$where_array=array(
						'id'			 =>	$this->input->post('id')
					);
					$resultupdate=$this->mcommon->common_edit1('groups',$value_array,$where_array);
					if($resultupdate){						
						$this->mcommon->common_delete('user_group_module', array('group_id'=>$this->input->post('id')));
						if(isset($moduleID)){
							foreach ($moduleID as $key => $value) {
								$value_array1=array(
									'group_id'		=>	$this->input->post('id'),
									'module_id'		=>	$value
								);
								$this->mcommon->common_insert('user_group_module',$value_array1);
							}
						}
					}
				}
				else
				{   
					$result=$this->mcommon->common_insert('groups',$value_array);
					if($result){						
						$this->mcommon->common_delete('user_group_module', array('group_id'=>$this->input->post('id')));
						if(isset($moduleID)){
							foreach ($moduleID as $key => $value) {
								$value_array1=array(
									'group_id'		=>	$this->input->post('id'),
									'module_id'		=>	$value
								);
								$this->mcommon->common_insert('user_group_module',$value_array1);
							}
						}
					}
				}
			}		
		}
		if($result)
		{
			$this->session->set_flashdata('res', lang('common_message_create'));
			$this->session->set_flashdata('res_type', 'success');
			redirect(base_url().'admin/RoleModule');
		}
		if($resultupdate)
		{
			$this->session->set_flashdata('res', lang('common_message_update'));
			$this->session->set_flashdata('res_type', 'success');
			redirect(base_url().'admin/RoleModule');
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
		$where_array=array(
			'id'=>$id
		);
		//$data['groupID']=$id;
		$data['groupID']='33';

		//$data['role_group']=$this->mcommon->get_fulldataAll('user_group_module',array('group_id' => $data['groupID']));
        $data['role_group']		=	$this->mdropdown->drop_menu_all_userGroupMenu();
		$this->addUpdateForm($data);
	}

	// Delete 
	// Last Updated by Vinitha 09/08/2016
	public function delete($id)
	{   
		$where_array=array(
			'id'     =>$id
		);
		
       $delete=$this->mcommon->common_delete('groups',$where_array);
		if($delete)
		{
			$this->session->set_flashdata('res', lang('common_message_delete'));
			$this->session->set_flashdata('res_type', 'danger');
			redirect(base_url().'admin/RoleModule');
		}
		else
		{
			$this->index($data);
		}
	}
}



