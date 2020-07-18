<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Staffs extends CI_Controller
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
        $view_data['top_tittle']			=	lang('mm_Hrm_staffs_manage_toptitle');
        $view_data['top_tittle_pergram']	=	lang('mm_Hrm_staffs_manage_pergram');

        $view_data['add_button_url']		=	'hrm/Staffs/addUpdateForm';
    	$view_data['pdf_url']				=	'hrm/Staffs/downloadPDF';
    	$view_data['pdf_fileName']			=	lang('mm_Hrm_staffs_manage_exportPDFFileName').date('d_m_Y');    	
    	$view_data['export_url']			=	'hrm/Staffs/exportExcel';
    	$view_data['export_fileName']		=	lang('mm_Hrm_staffs_manage_exportPDFFileName').date('d_m_Y');
    	
    	$view_data['datatable_url']			=	'hrm/Staffs/datatable';
    	$view_data['list_tittle']			=	lang('mm_Hrm_staffs_manage_list_title');
    	$view_data['list_tittle_small']		=	lang('mm_Hrm_staffs_manage_list_title_small');

    	$view_data['drop_menu_designation']	=	$this->mdropdown->drop_menu_designation();
    	$view_data['drop_menu_department']	=	$this->mdropdown->drop_menu_department();
    	
		$data = array(
                    'title'     	=> lang('manage_hrm_staffs_title_view'),
                    'content'   	=>$this->load->view('hrm/staffs/staffsDataList',$view_data,TRUE)                
                    );
        $this->load->view('base/template', $data); 
	}

	// datatable View
	// Last Updated by Vinitha 09/08/2016 
	function datatable1()
    {

    	$this->datatables->select('p.staffs_id, p.staffs_employee_id, p.staffs_employee_name, d.designation_name, p.staffs_gender, p.staffs_dob, p.staffs_doj,p.staffs_email,p.staffs_phone_number, GROUP_CONCAT(DISTINCT  sd.department_name ORDER BY sd.department_id DESC SEPARATOR ", ") DepartmentName,p.staffs_id as certificate,p.staffs_CWI, u.first_name, p.staffs_createOn,u1.first_name as firstname,p.staffs_updateOn',false)


        ->from('jr_staffs AS p')
        ->join('users AS u', 'u.id = p.staffs_createBy','left') 
        ->join('users AS u1', 'u1.id = p.staffs_updateBy','left') 
        ->join('jr_designation AS d', 'd.designation_id = p.staffs_designation','left') 
        ->join('jr_department AS sd', 'FIND_IN_SET(sd.department_id, p.staffs_department) > 0','left') 
        ->where('p.staffs_show_status', 1)
        ->group_by('p.staffs_id')
		->edit_column('p.staffs_id', get_buttons_new('$1','hrm/Staffs/'), 'p.staffs_id');
		//$this->datatables->edit_column('p.page_show_status', '$1', 'get_status(p.page_show_status)');

		$this->datatables->edit_column('certificate', '$1', 'get_resultCertificate(certificate)');
		$this->datatables->edit_column('p.staffs_dob', '$1', 'get_dateformat(p.staffs_dob)');
		$this->datatables->edit_column('p.staffs_doj', '$1', 'get_dateformat(p.staffs_doj)');
		//$this->datatables->edit_column('DepartmentName', '$1', 'get_dateformat(DepartmentName)');
		//$this->datatables->edit_column('p.staffs_passport_expiry_date', '$1', 'get_dateformat(p.staffs_passport_expiry_date)');
		//$this->datatables->edit_column('p.staffs_iqama_expairye_date', '$1', 'get_dateformat(p.staffs_iqama_expairye_date)');
		//$this->datatables->edit_column('p.staffs_resigned_date', '$1', 'get_dateformat(p.staffs_resigned_date)');
		//$this->datatables->edit_column('p.welder_photo', '$1', 'get_image_tag(p.welder_photo)');
		$this->datatables->edit_column('p.staffs_createOn', '$1', 'get_date_timeformat(p.staffs_createOn)');
		$this->datatables->edit_column('p.staffs_updateOn', '$1', 'get_date_timeformat(p.staffs_updateOn)');
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

		/*
			select CONCAT(we.welder_first_name, ' ', we.welder_first_name) AS name, we.welder_iqama_no, we.welder_no, we.welder_ref_no, ba.batch_wps, ba.batch_pqr_no, bap.welderPass_attProcess_name, bap.welderPass_attProcess_value, bap.welderPass_attProcessType_name, bap.welderPass_attProcessType_value, bap.welderPass_attPosition_name, bap.welderPass_attPosition_value, bap.welderPass_attPositionQul_name, bap.welderPass_attPositionQul_value, bap.welderPass_attJointType_name, bap.welderPass_attJointType_value, bap.welderPass_attPGrpNo_name, bap.welderPass_attPGrpNo_value, bap.welderPass_attTestDia_name, bap.welderPass_attTestDia_value, bap.welderPass_attTestThickness_name, bap.welderPass_attTestThickness_value, bap.welderPass_attRangeQul_name, bap.welderPass_attRangeQul_value, bap.welderPass_attFNo_name, bap.welderPass_attFNo_value, bap.welderPass_attRangeQul_value, bap.welderPass_attElectrodeClass_name, bap.welderPass_attElectrodeClass_value, bap.welderPass_attBacking_name, bap.welderPass_attBacking_value, wvi.vi_test_date, stf.staffs_employee_name, dsn.designation_name from jr_welder as we LEFT JOIN jr_batch as ba ON we.batchID = ba.batch_id  LEFT JOIN jr_welderpass as bap ON ba.batch_id = bap.batchID  LEFT JOIN jr_welder_vi as wvi ON we.welder_id = wvi.welderID  LEFT JOIN jr_staffs as stf ON wvi.vi_certified_welding_inspector = stf.user_id LEFT JOIN jr_designation as dsn ON stf.staffs_designation = dsn.designation_id;


		*/

		$fields_arrayPackage = array(
			'p.staffs_id','p.staffs_employee_id','p.staffs_employee_name','d.designation_name','p.staffs_gender','p.staffs_dob','p.staffs_doj','p.staffs_passport_no','p.staffs_passport_expiry_date','p.staffs_nationality','p.staffs_email','p.staffs_phone_number','p.staffs_address','GROUP_CONCAT(DISTINCT  sd.department_name ORDER BY sd.department_id DESC SEPARATOR ", ") DepartmentName','p.staffs_iqama_number','p.staffs_iqama_expairye_date','p.staffs_resigned_date','p.staffs_resigned_reason','p.staffs_id as attachment','p.staffs_id as certificate','p.staffs_CWI','u.first_name','p.staffs_createOn','u1.first_name as firstname','p.staffs_updateOn'
		);
		$join_arrayPackage = array(
			'jr_designation AS d' => 'd.designation_id = p.staffs_designation',
			'jr_department AS sd' => 'FIND_IN_SET(sd.department_id, p.staffs_department) > 0',
			'users AS u' => 'u.id = p.staffs_createBy',
			'users AS u1' => 'u1.id = p.staffs_updateBy',
		);
		$where_arrayPackage = array('p.staffs_show_status' =>'1');
		$orderPackage = $sidx.' '. $sord;
		$groupPackage = 'p.staffs_id';

		$count =   $this->mcommon->join_records_counts($fields_arrayPackage, 'jr_staffs as p', $join_arrayPackage, $where_arrayPackage, $groupPackage, $orderPackage);

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
		$dataTable_Details =   $this->mcommon->join_records_all($fields_arrayPackage, 'jr_staffs as p', $join_arrayPackage, $where_arrayPackage, $groupPackage, $orderPackage,'object');
		
		if (isset($dataTable_Details) && !empty($dataTable_Details)) {
			$i=0;
	        foreach ($dataTable_Details->result() as $dataDetail) {
	        	$responce->rows[$i]['id'] = $dataDetail->staffs_id;
	        	//$responce->rows[$i]['cell']= array($dataDetail->ndtContractor_id);	        	
	        	$responce->rows[$i]['cell']['staffs_id'] = get_buttons_new($dataDetail->staffs_id,'hrm/Staffs/');
	        	$responce->rows[$i]['cell']['staffs_employee_id'] = $dataDetail->staffs_employee_id;
	        	$responce->rows[$i]['cell']['staffs_employee_name'] = $dataDetail->staffs_employee_name;
	        	$responce->rows[$i]['cell']['designation_name'] = $dataDetail->designation_name;
	        	$responce->rows[$i]['cell']['staffs_gender'] = $dataDetail->staffs_gender;
	        	$responce->rows[$i]['cell']['staffs_dob'] = get_dateformat($dataDetail->staffs_dob);
	        	$responce->rows[$i]['cell']['staffs_doj'] = get_dateformat($dataDetail->staffs_doj);
	        	$responce->rows[$i]['cell']['staffs_passport_no'] = $dataDetail->staffs_passport_no;
	        	$responce->rows[$i]['cell']['staffs_passport_expiry_date'] = get_dateformat($dataDetail->staffs_passport_expiry_date);
	        	$responce->rows[$i]['cell']['staffs_nationality'] = $dataDetail->staffs_nationality;
	        	$responce->rows[$i]['cell']['staffs_email'] = $dataDetail->staffs_email;
	        	$responce->rows[$i]['cell']['staffs_phone_number'] = $dataDetail->staffs_phone_number;
	        	$responce->rows[$i]['cell']['staffs_address'] = $dataDetail->staffs_address;
	        	$responce->rows[$i]['cell']['DepartmentName'] = $dataDetail->DepartmentName;
	        	$responce->rows[$i]['cell']['staffs_iqama_number'] = $dataDetail->staffs_iqama_number;
	        	$responce->rows[$i]['cell']['staffs_iqama_expairye_date'] = get_dateformat($dataDetail->staffs_iqama_expairye_date);
	        	$responce->rows[$i]['cell']['staffs_resigned_date'] = get_dateformat($dataDetail->staffs_resigned_date);
	        	$responce->rows[$i]['cell']['staffs_resigned_reason'] = $dataDetail->staffs_resigned_reason;
	        	$responce->rows[$i]['cell']['attachment'] = get_resultCertificateAttachement($dataDetail->attachment);
	        	$responce->rows[$i]['cell']['certificate'] = get_resultCertificateDownload($dataDetail->certificate);
	        	$responce->rows[$i]['cell']['staffs_CWI'] = $dataDetail->staffs_CWI;
	        	$responce->rows[$i]['cell']['first_name'] = $dataDetail->first_name;
	        	$responce->rows[$i]['cell']['staffs_createOn'] = get_date_timeformat($dataDetail->staffs_createOn);
	        	$responce->rows[$i]['cell']['firstname'] = $dataDetail->firstname;
	        	$responce->rows[$i]['cell']['staffs_updateOn'] = get_date_timeformat($dataDetail->staffs_updateOn);
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
		dd('test');
        $view_data['top_tittle']			=	lang('mm_Hrm_staffs_manage_toptitle');
        $view_data['top_tittle_pergram']	=	lang('mm_Hrm_staffs_manage_pergram');

        $view_data['form_url']				=	'hrm/Staffs/create';
        $view_data['form_cancel_url']		=	'hrm/Staffs';
        $view_data['form_tittle']			=	lang('mm_Hrm_staffs_manage_form_title');
        $view_data['form_tittle_small']		=	lang('mm_Hrm_staffs_manage_form_title_small');
        $view_data['form_button_name']		=	lang('mm_Hrm_staffs_manage_form_button_name');

    	$view_data['drop_menu_designation']	=	$this->mdropdown->drop_menu_designation();
    	$view_data['drop_menu_department']	=	$this->mdropdown->drop_menu_department();
    	$view_data['user_menu_module']	=	$this->mdropdown->drop_menu_all_menuPage();
    	$view_data['user_groups']	=	$this->ion_auth->groups()->result_array();


    	/*





    	/*
		$fields_arrayPackage = array(
			'p.menu_module_id','p.menu_module_name','d.menu_page_id','d.menu_page_name'
		);
		$join_arrayPackage = array(
			'jr_menu_page AS d' => 'd.menu_module_id = p.menu_module_id',
		);
		$where_arrayPackage = array('p.menu_module_status' =>'1', 'd.menu_page_status' =>'1');
		$orderPackage = 'menu_module_position asc , menu_page_position asc ';
		$groupPackage = '';


    	$view_data['user_menu_module']  =   $this->mcommon->join_records_all($fields_arrayPackage, 'jr_menu_moudle as p', $join_arrayPackage, $where_arrayPackage, $groupPackage, $orderPackage,'object');

    	*/
		$data = array(
                    'title'     	=> lang('manage_hrm_staffs_title_create'),
                    'content'   	=>$this->load->view('hrm/staffs/staffsmanagement',$view_data,TRUE)                
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
			 $this->form_validation->set_rules('staffs_employee_id', lang('mm_Hrm_staffs_employee_id'), 'required');
			 $this->form_validation->set_rules('staffs_employee_name', lang('mm_Hrm_staffs_employee_name'), 'required');
			 $this->form_validation->set_rules('staffs_designation', lang('mm_Hrm_staffs_designation'), 'required');
			 $this->form_validation->set_rules('staffs_gender', lang('mm_Hrm_staffs_gender'), 'required');
			 $this->form_validation->set_rules('staffs_email', lang('mm_Hrm_staffs_email'), 'required');
			 $this->form_validation->set_rules('staffs_department[]', lang('mm_Hrm_staffs_department'), 'required');

            if ($this->form_validation->run() == true)
			{
				$value_array=array(
					'staffs_employee_id'			=>	$this->input->post('staffs_employee_id'),
					'staffs_employee_name'			=>	$this->input->post('staffs_employee_name'),
					'staffs_designation'  			=>	$this->input->post('staffs_designation'),
					'staffs_gender'  				=>	$this->input->post('staffs_gender'),
					'staffs_dob'					=>	($this->input->post('staffs_dob')!='') ? date('Y-m-d',strtotime($this->input->post('staffs_dob'))) : '',
					'staffs_doj'					=>	($this->input->post('staffs_doj')!='') ? date('Y-m-d',strtotime($this->input->post('staffs_doj'))) : '',
					'staffs_email'  				=>	$this->input->post('staffs_email'),
					'staffs_phone_number'			=>	($this->input->post('staffs_phone_number')!='') ? $this->input->post('staffs_phone_number') : '',
					'staffs_passport_no'			=>	($this->input->post('staffs_passport_no')!='') ? $this->input->post('staffs_passport_no') : '',
					'staffs_passport_expiry_date'	=>	($this->input->post('staffs_passport_expiry_date')!='') ? date('Y-m-d',strtotime($this->input->post('staffs_passport_expiry_date'))) : '',
					'staffs_nationality'			=>	($this->input->post('staffs_nationality')!='') ? $this->input->post('staffs_nationality') : '',
					'staffs_address'				=>	($this->input->post('staffs_address')!='') ? $this->input->post('staffs_address') : '',
					'staffs_iqama_number'			=>	($this->input->post('staffs_iqama_number')!='') ? $this->input->post('staffs_iqama_number') : '',
					'staffs_iqama_expairye_date'	=>	($this->input->post('staffs_iqama_expairye_date')!='') ? date('Y-m-d',strtotime($this->input->post('staffs_iqama_expairye_date'))) : '',
					'staffs_resigned_date'			=>	($this->input->post('staffs_resigned_date')!='') ? date('Y-m-d',strtotime($this->input->post('staffs_resigned_date'))) : '',
					'staffs_department'  			=>	implode(',',$this->input->post('staffs_department')),
					'staffs_CWI'					=>	($this->input->post('staffs_CWI')!='') ? $this->input->post('staffs_CWI') : '',
					'staffs_updateBy'	=>	$this->session->userdata('user_id'),
					'staffs_updateOn'	=>	date('Y-m-d H:i:s')
				);    
				if($this->input->post('staffs_id')!='')
				{
					$where_array=array(
						'staffs_id'			 =>	$this->input->post('staffs_id')
					);
					$resultupdate=$this->mcommon->common_edit('jr_staffs',$value_array,$where_array);
				}
				else
				{
					$value_array['staffs_createBy'] =  $this->session->userdata('user_id');    
					$value_array['staffs_createOn'] =  date('Y-m-d H:i:s');    
					$result=$this->mcommon->common_insert('jr_staffs',$value_array);
					
				}
			}		
		}

		if($result)
		{
			$this->session->set_flashdata('res', lang('common_message_create'));
			$this->session->set_flashdata('res_type', 'success');
			redirect(base_url().'hrm/Staffs');
		}
		if($resultupdate)
		{
			$this->session->set_flashdata('res', lang('common_message_update'));
			$this->session->set_flashdata('res_type', 'success');
			redirect(base_url().'hrm/Staffs');
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
			'staffs_id'=>$id
		);
		$data['value']=$this->mcommon->get_fulldata('jr_staffs',$where_array);
		
		$this->addUpdateForm($data);
	}

	// Delete 
	// Last Updated by Vinitha 09/08/2016
	public function delete($id)
	{   
		$where_array=array(
			'staffs_id'     =>$id
		);
		
       $delete=$this->mcommon->common_delete('jr_staffs',$where_array);
		if($delete)
		{
			$this->session->set_flashdata('res', lang('common_message_delete'));
			$this->session->set_flashdata('res_type', 'danger');
			redirect(base_url().'hrm/Staffs');
		}
		else
		{
			$this->index($data);
		}
	}

	public function delete($id)
	{   
		$where_array=array(
			'staffs_id'     =>$id
		);
		
       $delete=$this->mcommon->common_delete('jr_staffs',$where_array);
		if($delete)
		{
			$this->session->set_flashdata('res', lang('common_message_delete'));
			$this->session->set_flashdata('res_type', 'danger');
			redirect(base_url().'hrm/Staffs');
		}
		else
		{
			$this->index($data);
		}
	}

	
	

}



