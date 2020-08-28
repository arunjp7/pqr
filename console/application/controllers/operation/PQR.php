<?php defined('BASEPATH') OR exit('No direct script access allowed');

class PQR extends CI_Controller
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
		$this->load->model('M_dropdown','mdropdown',TRUE);

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

		$this->mcommon->getCheckUserPermissionHead('PQR',true);
        $view_data['top_tittle']			=	lang('mm_masters_pqr_manage_toptitle');
        $view_data['top_tittle_pergram']	=	lang('mm_masters_pqr_manage_pergram');

        $view_data['add_button_url']		=	'operation/PQR/addUpdateForm';
    	$view_data['datatable_url']			=	'operation/PQR/datatable';
    	$view_data['pdf_url']				=	'operation/PQR/downloadPDF';
    	$view_data['pdf_fileName']			=	lang('mm_masters_pqr_exportPDFFileName').date('d_m_Y');    	
    	$view_data['export_url']			=	'operation/PQR/exportExcel';
    	$view_data['export_fileName']		=	lang('mm_masters_pqr_exportPDFFileName').date('d_m_Y');
    	
    	$view_data['datatable_url']			=	'operation/PQR/datatable';
    	$view_data['list_tittle']			=	lang('mm_masters_pqr_manage_list_title');
    	$view_data['list_tittle_small']		=	lang('mm_masters_pqr_manage_list_title_small');
    	
      
		$data = array(
                    'title'     	=> lang('mm_masters_pqr_manage_view'),
                    'content'   	=>$this->load->view('operation/PQR/PQRDataList',$view_data,TRUE)                
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
			'j.pqr_id','j.pqr_no','u.first_name','j.createOn as createOn','u1.first_name as firstname','j.updateOn as updateOn'
		);
		$join_arrayPackage = array(
			'users AS u' => 'u.id = j.createBy',
			'users AS u1' => 'u1.id = j.updateBy',
		);
		$where_arrayPackage = array('j.pqr_show_status' =>'1');
		$orderPackage = $sidx.' '. $sord;

		$count =   $this->mcommon->join_records_counts($fields_arrayPackage, 'jr_pqr as j', $join_arrayPackage, $where_arrayPackage, '', $orderPackage);

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
		$dataTable_Details =   $this->mcommon->join_records_all($fields_arrayPackage, 'jr_pqr as j', $join_arrayPackage, $where_arrayPackage, '', $orderPackage,'object');

		if (isset($dataTable_Details) && !empty($dataTable_Details)) {
			$i=0;
	        foreach ($dataTable_Details->result() as $dataDetail) {
	        	$responce->rows[$i]['id'] = $dataDetail->pqr_id;
	        	//$responce->rows[$i]['cell']= array($dataDetail->ndtContractor_id);
	        	$responce->rows[$i]['cell']['edit_pqr_id'] = get_buttons_new_only_Edit($dataDetail->pqr_id,'operation/PQR/');
	        	$responce->rows[$i]['cell']['view_pqr_id'] = get_buttons_new_only_View($dataDetail->pqr_id,'operation/PQR/');
	        	$responce->rows[$i]['cell']['delete_pqr_id'] = get_buttons_new_only_Delete($dataDetail->pqr_id,'operation/PQR/');
	        	$responce->rows[$i]['cell']['pqr_no'] = $dataDetail->pqr_no;
	        	$responce->rows[$i]['cell']['first_name'] = $dataDetail->first_name;
	        	$responce->rows[$i]['cell']['createOn'] = get_date_timeformat($dataDetail->createOn);
	        	$responce->rows[$i]['cell']['firstname'] = $dataDetail->firstname;
	        	$responce->rows[$i]['cell']['updateOn'] = get_date_timeformat($dataDetail->updateOn);
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
		$this->mcommon->getCheckUserPermissionHead('PQR add and edit',true);
        $view_data['top_tittle']			=	lang('mm_masters_pqr_manage_toptitle');
        $view_data['top_tittle_pergram']	=	lang('mm_masters_pqr_manage_pergram');

        $view_data['form_url']				=	'operation/PQR/create';
        

        $view_data['form_cancel_url']		=	'operation/PQR';

        $view_data['form_tittle']			=	lang('mm_masters_pqr_manage_form_title');
        $view_data['form_tittle_small']		=	lang('mm_masters_pqr_manage_form_title_small');
        $view_data['form_button_name']		=	lang('mm_masters_pqr_manage_form_button_name');

        $view_data['drop_menu_company']		=	$this->mdropdown->drop_menu_all_company();
        $view_data['drop_menu_process']		=	$this->mdropdown->drop_menu_process();
        $view_data['drop_menu_type']		=	$this->mdropdown->drop_menu_type();
        $view_data['drop_menu_code']		=	$this->mdropdown->drop_menu_code();
        $view_data['drop_menu_diameter']	=	$this->mdropdown->drop_menu_diameter();
        $view_data['drop_menu_pno']			=	$this->mdropdown->drop_menu_pno();
        $view_data['drop_menu_position']	=	$this->mdropdown->drop_menu_position();
        $view_data['drop_menu_sfa']			=	$this->mdropdown->drop_menu_sfa();
        $view_data['drop_menu_welder']		=	$this->mdropdown->drop_menu_welder();
        $view_data['drop_menu_material']	=	$this->mdropdown->drop_menu_material();
        $view_data['drop_menu_cup_size']	=	$this->mdropdown->drop_menu_cup_size();
        $view_data['drop_menu_cleaning']	=	$this->mdropdown->drop_menu_cleaning();
        $view_data['drop_menu_grade']		=	$this->mdropdown->drop_menu_grade();
        $view_data['drop_menu_applicable_code']	=	$this->mdropdown->drop_menu_applicable_code();
        $view_data['drop_menu_staff_welder']	=	$this->mdropdown->drop_menu_staff_welder();
        $view_data['drop_menu_fno']	=	$this->mdropdown->drop_menu_fno();

		$data = array(
                    'title'     	=> lang('mm_masters_pqr_manage_create'),
                    'content'   	=>$this->load->view('operation/PQR/PQRmanagement',$view_data,TRUE)                
                    );
        $this->load->view('base/template', $data); 
	}



	function maximumNameCheck($val){
		$this->form_validation->set_message('maximumNameCheck', $this->lang->line('form_validation_is_unique_name'));
		return FALSE;
	}
	// get group information by selecting pno_id
	public function getGroupNo($pno_id){
		$pno_id = $_POST['pno_id'];
		$drop_menu_group		=	$this->mdropdown->drop_menu_group($pno_id);
		echo json_encode($drop_menu_group);
	}

	// get group information by selecting group_no
	public function getGroupNoInfo($pno_id, $group_no){
		$pno_id = $_POST['pno_id'];
		$group_no = $_POST['group_no'];
		$drop_menu_group_info =	$this->mdropdown->drop_menu_group_info($pno_id, $group_no);
		echo json_encode($drop_menu_group_info);
	}

	// get F-No information
	public function getFno(){
		$fno_id = $_POST['fno_id'];
		$drop_menu_fnoInfo =	$this->mdropdown->drop_menu_fnoInfo($fno_id);
		echo json_encode($drop_menu_fnoInfo);
	}

	// create Form
	// Last Updated by Vinitha 09/08/2016 
	public function create()
	{		
        $user   = $this->ion_auth->user()->row();
		$this->mcommon->getCheckUserPermissionHead('PQR add and edit',true);
		
      			
		// Save Company Details Block
		if($_POST['blockname'] == 'companyDetails'){
			$value_array = array(
				'pqr_no' 			=> $_POST['pqr_no'],
				'inspection_date' 	=> date("Y-m-d", strtotime($_POST['inspection_date'])),
				'wps_no' 			=> $_POST['wps_no'],
				'process1' 			=> $_POST['process1'],
				'process2' 			=> $_POST['process2'],
				'process3' 			=> $_POST['process3'],
				'type_id' 			=> implode(',' , $_POST['type_id']),
				'code_id' 			=> implode(',' , $_POST['code_id']),
				'pqr_other' 		=> $_POST['pqr_other'],
				
			);
			$value_array['updateBy'] =  $this->session->userdata('user_id');    
			$value_array['updateOn'] =  date('Y-m-d H:i:s');

			if($_POST['pqr_id'] !='')
			{

				$where_array = array(
					'pqr_id'		=>	$_POST['pqr_id']
				);
				$resultupdate = $this->mcommon->common_edit('jr_pqr',$value_array,$where_array);
			
			}
			else
			{
				$value_array['createBy'] =  $this->session->userdata('user_id');    
				$value_array['createOn'] =  date('Y-m-d H:i:s');
				
				$result = $this->mcommon->common_insert('jr_pqr',$value_array);
			}	

		}

		// Save joints block
		if($_POST['blockname'] == "joints"){
			$value_array = array(
								'joints_a' => implode(',', $_POST['joints_A']),
								'joints_b' => implode(',', $_POST['joints_B']),
								'joints_c' => implode(',', $_POST['joints_C']),
								'joints_d' => implode(',', $_POST['joints_D']),
								'joints_other' => implode(',', $_POST['joints_other'])
							);
			$value_array['updateBy'] =  $this->session->userdata('user_id');    
			$value_array['updateOn'] =  date('Y-m-d H:i:s');
			
			if(isset($_POST['pqr_id'])){

				$where_array = array(
					'pqr_id'		=>	$_POST['pqr_id'],
				);
				
				$resultupdate = $this->mcommon->common_edit('jr_pqr',$value_array,$where_array);
			}
		}

		// if($_GET['blockname'] == 'jointimages'){
			
			

		// 	foreach($_FILES as $files){
		// 		if($files['name'] != ''){

		// 			if (!file_exists(FCPATH.'/~cdn/pqrjoints/'))
		// 	        {
		// 			    mkdir(FCPATH.'/~cdn/pqrjoints/', 0777, true);
		// 			}

		// 			$config = array();
		// 			$config['upload_path'] = '.././~cdn/pqrjoints/';
		// 			$config['allowed_types'] = 'gif|jpg|png';
		// 			$config['max_size'] = '5000';
		// 			$config['max_width'] = '3500';
		// 			$config['max_height'] = '3500';
		// 			$config['max_filename'] = '500';
		// 			$config['overwrite'] = false;
		// 			$this->upload->initialize($config);
		// 			$this->load->library('image_lib');
		// 			$this->load->library('upload', $config);

		// 			if($this->upload->do_upload($files))
		// 			{	
		// 				$this->load->helper('inflector');
		// 				$file_name = underscore($files['name']);
		// 				$config['file_name'] = $file_name;
		// 				$image_data['message'] = $this->upload->data(); 

		// 				echo "~cdn/pqrjoints/".$image_data['message']['file_name'];
		// 			} 
		// 			else
		// 			{
		// 				 // $data['company_logo'] = $this->upload->display_errors('<div class="alert alert-error">', '</div>');
		// 				 // $this->form_validation->set_rules('company_logo', $this->upload->display_errors(), 'required');        
		// 				 echo $this->upload->display_errors();
						        
		// 			}	
		// 		}
		// 	}
			
		// 	exit;

			
		// }

		// Save Base Metals
		if($_POST['blockname'] == 'basemetals'){
			
			$value_array = array(
				'company_id' => $_POST['company_id'],
                'pno_id' => $_POST['pno_id'],
                'to_pno_id' => $_POST['to_pno_id'],
                'group_no' => $_POST['group_no'],
                'to_group_no' => $_POST['to_group_no'],
                'material_spe' => $_POST['material_spe'],
                'to_material_spe' => $_POST['to_material_spe'],
                'thickness_test' => $_POST['thickness_test'],
                'tgu_no' => $_POST['tgu_no'],
                'to_tgu_no' => $_POST['to_tgu_no'],
                'base_heat_no' => $_POST['base_heat_no'],
                'base_to_heat_no' => $_POST['base_to_heat_no'],
                'diameter_id' => $_POST['diameter_id'],
                'base_others' => $_POST['base_others'],
                'base_to_others' => $_POST['base_to_others']
			);
			$value_array['updateBy'] =  $this->session->userdata('user_id');    
			$value_array['updateOn'] =  date('Y-m-d H:i:s');
			
			if($_POST['pqr_id'] !='')
			{

				$where_array = array(
					'pqr_id'		=>	$_POST['pqr_id']
				);
				$resultupdate = $this->mcommon->common_edit('jr_pqr',$value_array,$where_array);
			
			}

		}

		// Save Filler Metals block
		if($_POST['blockname'] == 'fillermetals'){
			$value_array = array(
				'fno_id' => implode('|', $_POST['fno_id']),
				'a_no' => implode('|', $_POST['a_no']),
				'sfa_no' => implode('|', $_POST['sfa_no']),
				'aws_classfication' => implode('|', $_POST['aws_classfication']),
				'size_filler_metal' => implode('|', $_POST['size_filler_metal']),
				'filler_metal_product' => implode('|', $_POST['filler_metal_product']),
				'filler_supply_metal' => implode('|', $_POST['filler_supply_metal']),
				'filler_flux_type' => implode('|', $_POST['filler_flux_type']),
				'filler_flux_trade' => implode('|', $_POST['filler_flux_trade']),
				'filler_electrode' => implode('|', $_POST['filler_electrode']),
				'filer_weld_thickness' => implode('|', $_POST['filer_weld_thickness']),
				'lot_no' => implode('|', $_POST['lot_no']),
				'fille_other' => implode('|', $_POST['fille_other']),
			);

			$value_array['updateBy'] =  $this->session->userdata('user_id');    
			$value_array['updateOn'] =  date('Y-m-d H:i:s');
			
			if($_POST['pqr_id'] !='')
			{

				$where_array = array(
					'pqr_id'		=>	$_POST['pqr_id']
				);
				$resultupdate = $this->mcommon->common_edit('jr_pqr',$value_array,$where_array);
			
			}
			
		}
		
		// Save position_preheat block
		if($_POST['blockname'] == 'position_preheat'){
			$value_array = array(
				'position_id' => $_POST['position_id'],
				'weld_progression' => $_POST['weld_progression'],
				'position_other' => $_POST['position_other'],
				'preheat_temp_min' => $_POST['preheat_temp_min'],
				'interpass_temp_max' => $_POST['interpass_temp_max']
			);
			$value_array['updateBy'] =  $this->session->userdata('user_id');    
			$value_array['updateOn'] =  date('Y-m-d H:i:s');
			
			if($_POST['pqr_id'] !='')
			{

				$where_array = array(
					'pqr_id'		=>	$_POST['pqr_id']
				);
				$resultupdate = $this->mcommon->common_edit('jr_pqr',$value_array,$where_array);
			
			}
		}

		// Save Gas block
		if($_POST['blockname'] == 'gasblock'){
			
			$value_array = array(
				'shielding_gas'=> $_POST['shielding_gas'],
				'shielding_percent'=> $_POST['shielding_percent'],
				'shielding_rate'=> $_POST['shielding_rate'],
				'backing_gas'=> $_POST['backing_gas'],
				'backing_percent'=> $_POST['backing_percent'],
				'backing_rate'=> $_POST['backing_rate'],
				'trailing_gas'=> $_POST['trailing_gas'],
				'trailing_percent'=> $_POST['trailing_percent'],
				'trailing_rate'=> $_POST['trailing_rate']
			);
			$value_array['updateBy'] =  $this->session->userdata('user_id');    
			$value_array['updateOn'] =  date('Y-m-d H:i:s');

			if($_POST['pqr_id'] !='')
			{
				$where_array = array(
					'pqr_id'		=>	$_POST['pqr_id']
				);
				$resultupdate = $this->mcommon->common_edit('jr_pqr',$value_array,$where_array);
			}
		}

		// Save Post Heat block
		if($_POST['blockname'] == 'postblock'){
			$value_array = array(
				'temp_range' => $_POST['temp_range'],
				'soak_period' => $_POST['soak_period'],
				'heat_rate_up_to' => $_POST['heat_rate_up_to'],
				'heat_rate_from' => $_POST['heat_rate_from'],
				'control_heat_rate' => $_POST['control_heat_rate'],
				'cooling_rate' => $_POST['cooling_rate'],
				'post_heat_other' => $_POST['post_heat_other']
			);
			$value_array['updateBy'] =  $this->session->userdata('user_id');    
			$value_array['updateOn'] =  date('Y-m-d H:i:s');
			
			if($_POST['pqr_id'] !='')
			{

				$where_array = array(
					'pqr_id'		=>	$_POST['pqr_id']
				);
				$resultupdate = $this->mcommon->common_edit('jr_pqr',$value_array,$where_array);
			
			}
		}

		// Save Electrical block
		if($_POST['blockname'] == 'electricalblock'){

			$value_array = array(
				'elec_current' => implode('|', $_POST['elec_current']),
				'elec_prolarity' => implode('|', $_POST['elec_prolarity']),
				'elec_amps' => implode('|', $_POST['elec_amps']),
				'elec_volts' => implode('|', $_POST['elec_volts']),
				'elec_arc' => implode('|', $_POST['elec_arc']),
				'elec_weld_bed' => implode('|', $_POST['elec_weld_bed']),
				'elec_waveform' => implode('|', $_POST['elec_waveform']),
				'elec_power' => implode('|', $_POST['elec_power']),
				'elec_type' => implode('|', $_POST['elec_type']),
				'elec_mode' => implode('|', $_POST['elec_mode']),
				'elec_size' => implode('|', $_POST['elec_size']),
				'elec_heat' => implode('|', $_POST['elec_heat']),
				'elec_other' => implode('|', $_POST['elec_other'])
			);
			$value_array['updateBy'] =  $this->session->userdata('user_id');    
			$value_array['updateOn'] =  date('Y-m-d H:i:s');
			
			if($_POST['pqr_id'] !='')
			{

				$where_array = array(
					'pqr_id'		=>	$_POST['pqr_id']
				);
				$resultupdate = $this->mcommon->common_edit('jr_pqr',$value_array,$where_array);
			}
		}

		// Save Techique block
		if($_POST['blockname'] == 'techinqueblock'){

			$value_array = array(
				'travel_speed' => $_POST['travel_speed'],
				'weave_bead' => $_POST['weave_bead'],
				'cupsize_id' => $_POST['cupsize_id'],
				'pass_per_side' => $_POST['pass_per_side'],
				's_m_electrode' => $_POST['s_m_electrode'],
				'work_distance' => $_POST['work_distance'],
				'cleaning_id' => $_POST['cleaning_id'],
				'thermal_process' => $_POST['thermal_process'],
				'techinqe_other' => $_POST['techinqe_other']
			);

			$value_array['updateBy'] =  $this->session->userdata('user_id');    
			$value_array['updateOn'] =  date('Y-m-d H:i:s');
			if($_POST['pqr_id'] !='')
			{
				$where_array = array(
					'pqr_id'		=>	$_POST['pqr_id']
				);
				$resultupdate = $this->mcommon->common_edit('jr_pqr',$value_array,$where_array);
			}
		}

		// Save Techique block
		if($_POST['blockname'] == 'weldingparametersblock'){
			$value_array = array(
				'layer' => implode(',', $_POST['layer']),
				'welder_process' => implode(',', $_POST['welder_process']),
				'classVal' => implode(',', $_POST['classVal']),
				'diameter' => implode(',', $_POST['diameter']),
				'typer_polority' => implode(',', $_POST['typer_polority']),
				'current_amperage_range' => implode(',', $_POST['current_amperage_range']),
				'current_voltage_range' => implode(',', $_POST['current_voltage_range']),
				'travel_speed_range' => implode(',', $_POST['travel_speed_range']),
				'heat_input' => implode(',', $_POST['heat_input'])
			);

			$value_array['updateBy'] =  $this->session->userdata('user_id');    
			$value_array['updateOn'] =  date('Y-m-d H:i:s');
			
			if($_POST['pqr_id'] !='')
			{
				$where_array = array(
					'pqr_id'		=>	$_POST['pqr_id']
				);
				$resultupdate = $this->mcommon->common_edit('jr_pqr',$value_array,$where_array);
			}
		}


		$data = [];

		if($result)
		{
			$data['success'] = 1;
			$data['id'] = $result;
			$data['msg'] = lang('common_message_create');

			echo json_encode($data);
			exit;
		}
		if($resultupdate)
		{
			if(isset($_POST['blockfinished']) && $_POST['blockfinished'] == 1){
				$this->session->set_flashdata('res', lang('common_message_update'));
				$this->session->set_flashdata('res_pqr', 'success');
				redirect(base_url().'operation/PQR');
			}else{
				$data['success'] = 1;
				echo json_encode($data);
				exit;
			}
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
		
		$this->mcommon->getCheckUserPermissionHead('PQR add and edit',true);
		$where_array=array(
			'pqr_id'=>$id
		);
		$data['value'] = $this->mcommon->get_fulldataAll('jr_pqr',$where_array);
		$this->addUpdateForm($data);
	}

	// Delete 
	// Last Updated by Vinitha 09/08/2016
	public function delete($id)
	{   
		$this->mcommon->getCheckUserPermissionHead('PQR delete',true);
		$where_array=array(
			'pqr_id'     =>$id
		);
		
       $delete=$this->mcommon->common_delete('jr_pqr',$where_array);
		if($delete)
		{
			$this->session->set_flashdata('res', lang('common_message_delete'));
			$this->session->set_flashdata('res_pqr', 'danger');
			redirect(base_url().'operation/PQR');
		}
		else
		{
			$this->index($data);
		}
	}
	
	// View data
	public function view($id){
		$this->mcommon->getCheckUserPermissionHead('PQR add and edit',true);

        $view_data['top_tittle']			=	lang('mm_masters_pqr_manage_toptitle');
        $view_data['top_tittle_pergram']	=	lang('mm_masters_pqr_manage_pergram');

        

        $view_data['form_cancel_url']		=	'operation/PQR';

        $view_data['form_tittle']			=	lang('mm_masters_pqr_manage_form_title');
        $view_data['form_tittle_small']		=	lang('mm_masters_pqr_manage_form_title_small');
        $view_data['form_button_name']		=	lang('mm_masters_pqr_manage_form_button_name');

      	$where_array=array(
			'pqr_id'=>$id
		);
		$view_data['value'] = $this->mcommon->get_fulldataAll('jr_pqr',$where_array);

		$data = array(
                    'title'     	=> lang('mm_masters_pqr_manage_create'),
                    'content'   	=>$this->load->view('operation/PQR/PQRView',$view_data,TRUE),
                    );

	

        $this->load->view('base/template', $data); 
	}
}