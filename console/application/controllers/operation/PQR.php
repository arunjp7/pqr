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
	public function getFno($fno_id){
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

        if(isset($_POST['submit']))
		{			
			// company Details
			 $this->form_validation->set_rules('company_id', lang('mm_operation_pqr_company_name_label'), 'required');
			 $this->form_validation->set_rules('process_id', lang('mm_operation_pqr_welding_process_label'), 'required');
			 $this->form_validation->set_rules('type_id', lang('mm_operation_pqr_type_label'), 'required');
			 // Base Metals
			 $this->form_validation->set_rules('material_id', lang('mm_operation_pqr_material_spec_label'), 'required');
			 $this->form_validation->set_rules('to_material_id', lang('mm_operation_pqr_to_material_spec_label'), 'required');
			 $this->form_validation->set_rules('pno_id', lang('mm_operation_pqr_pno_label'), 'required');
			 $this->form_validation->set_rules('grp_no', lang('mm_operation_pqr_group_no_label'), 'required');
			 $this->form_validation->set_rules('to_pno_id', lang('mm_operation_pqr_to_pno_label'), 'required');
			 $this->form_validation->set_rules('to_grp_no', lang('mm_operation_pqr_to_group_no_label'), 'required');
			 $this->form_validation->set_rules('thickness_test_coupon', lang('mm_operation_pqr_thickness_test_label'), 'required');
			 $this->form_validation->set_rules('diameter_test_coupon', lang('mm_operation_pqr_diameter_test_label'), 'required');
			 $this->form_validation->set_rules('cast_no', lang('mm_operation_pqr_cast_no_label'), 'required');
			 // Filler Metals
			 $this->form_validation->set_rules('weld_metal_analysis_no', lang('mm_operation_pqr_weld_metal_analysis_no_label'), 'required');
			 $this->form_validation->set_rules('sizeof_filler_metal', lang('mm_operation_pqr_size_filler_metal_label'), 'required');
			 $this->form_validation->set_rules('f_no', lang('mm_operation_pqr_f_number_label'), 'required');
			 $this->form_validation->set_rules('sfa_id', lang('mm_operation_pqr_specification_no_label'), 'required');
			 $this->form_validation->set_rules('classfication_no', lang('mm_operation_pqr_aws_classfication_no_label'), 'required');
			 $this->form_validation->set_rules('filler_metal_product_form', lang('mm_operation_pqr_filler_metal_product_form_label'), 'required');
			 $this->form_validation->set_rules('electrode_brand_name', lang('mm_operation_pqr_electrode_brand_name_label'), 'required');
			 $this->form_validation->set_rules('lot_no', lang('mm_operation_pqr_lot_no_label'), 'required');
			 $this->form_validation->set_rules('deposited_weld_thickness', lang('mm_operation_pqr_deposited_weld_thickness_label'), 'required');
			 // Position
			 $this->form_validation->set_rules('position_groove', lang('mm_operation_pqr_position_groove_label'), 'required');
			 $this->form_validation->set_rules('weld_progression', lang('mm_operation_pqr_weld_progression_label'), 'required');
			 // $this->form_validation->set_rules('position_other', lang('mm_operation_pqr_f_number_label'), 'required');
			 // Preheat
			 $this->form_validation->set_rules('preheat_temp_min', lang('mm_operation_pqr_preheat_temp_min_label'), 'required');
			 $this->form_validation->set_rules('interpass_temp_max', lang('mm_operation_pqr_interpass_temp_max_label'), 'required');
			 // Post Weld Heat Treatment
			 $this->form_validation->set_rules('temp_range', lang('mm_operation_pqr_temp_range_label'), 'required');
			 $this->form_validation->set_rules('soak_period', lang('mm_operation_pqr_soak_period_label'), 'required');
			 $this->form_validation->set_rules('heating_rate', lang('mm_operation_pqr_heating_rate_label'), 'required');
			 $this->form_validation->set_rules('cooling_rate', lang('mm_operation_pqr_cooling_rate_label'), 'required');
			 // $this->form_validation->set_rules('post_heat_other', lang('mm_operation_pqr_interpass_temp_max_label'), 'required');
			 // Gas
			 $this->form_validation->set_rules('shielding_gas', lang('mm_operation_pqr_temp_range_label'), 'required');
			 $this->form_validation->set_rules('shielding_percent', lang('mm_operation_pqr_temp_range_label'), 'required');
			 $this->form_validation->set_rules('shielding_rate', lang('mm_operation_pqr_temp_range_label'), 'required');
			 // $this->form_validation->set_rules('backing_gas', lang('mm_operation_pqr_temp_range_label'), 'required');
			 // $this->form_validation->set_rules('backing_percent', lang('mm_operation_pqr_temp_range_label'), 'required');
			 // $this->form_validation->set_rules('backing_rate', lang('mm_operation_pqr_temp_range_label'), 'required');
			 // $this->form_validation->set_rules('trailing_gas', lang('mm_operation_pqr_temp_range_label'), 'required');
			 // $this->form_validation->set_rules('trailing_percent', lang('mm_operation_pqr_temp_range_label'), 'required');
			 // $this->form_validation->set_rules('trailing_rate', lang('mm_operation_pqr_temp_range_label'), 'required');
			 // Techique
			 $this->form_validation->set_rules('travel_speed', lang('mm_operation_pqr_travel_speed_label'), 'required');
			 $this->form_validation->set_rules('bead', lang('mm_operation_pqr_bead_label'), 'required');
			 $this->form_validation->set_rules('cup_size', lang('mm_operation_pqr_orifice_gascup_size_label'), 'required');
			 $this->form_validation->set_rules('per_side', lang('mm_operation_pqr_s_m_pass_per_side_label'), 'required');
			 $this->form_validation->set_rules('electrode', lang('mm_operation_pqr_s_m_electrode_label'), 'required');
			 $this->form_validation->set_rules('cleaing', lang('mm_operation_pqr_initial_interpass_clean_label'), 'required');
			 $this->form_validation->set_rules('tungesten_electrode', lang('mm_operation_pqr_tungsten_electrode_label'), 'required');
			 // Fillet Weld Test
			 $this->form_validation->set_rules('result_statificatory', lang('mm_operation_pqr_result_statisfactory_label'), 'required');
			 $this->form_validation->set_rules('penetration_into_partent_metal', lang('mm_operation_pqr_penetration_partent_metal_label'), 'required');

			$this->form_validation->set_rules('type_test', lang('mm_operation_pqr_type_of_test_label'), 'required');
			$this->form_validation->set_rules('deposit_analysis', lang('mm_operation_pqr_deposit_analysis_label'), 'required');
			$this->form_validation->set_rules('stamp_no', lang('mm_operation_pqr_welder_name_label'), 'required');
			$this->form_validation->set_rules('welder_staff_id', lang('mm_operation_pqr_stamp_no_label'), 'required');
			
            if ($this->form_validation->run() == true)
			{
				$value_array=array(
					'company_id' => $this->input->post('company_id'),
					'process_id' => $this->input->post('process_id'),
					'type_id' => $this->input->post('type_id'),
					'material_id' => $this->input->post('material_id'),
					'to_material_id' => $this->input->post('to_material_id'),
					'pno_id' => $this->input->post('pno_id'),
					'grp_no' => $this->input->post('grp_no'),
					'to_pno_id' => $this->input->post('to_pno_id'),
					'to_grp_no' => $this->input->post('to_grp_no'),
					'thickness_test_coupon' => $this->input->post('thickness_test_coupon'),
					'diameter_test_coupon' => $this->input->post('diameter_test_coupon'),
					'cast_no' => $this->input->post('cast_no'),
					'weld_metal_analysis_no' => $this->input->post('weld_metal_analysis_no'),
					'sizeof_filler_metal' => $this->input->post('sizeof_filler_metal'),
					'f_no' => $this->input->post('f_no'),
					'sfa_id' => $this->input->post('sfa_id'),
					'classfication_no' => $this->input->post('classfication_no'),
					'filler_metal_product_form' => $this->input->post('filler_metal_product_form'),
					'electrode_brand_name' => $this->input->post('electrode_brand_name'),
					'lot_no' => $this->input->post('lot_no'),
					'deposited_weld_thickness' => $this->input->post('deposited_weld_thickness'),
					'position_groove' => $this->input->post('position_groove'),
					'weld_progression' => $this->input->post('weld_progression'),
					'position_other' => $this->input->post('position_other'),
					'preheat_temp_min' => $this->input->post('preheat_temp_min'),
					'interpass_temp_max' => $this->input->post('interpass_temp_max'),
					'temp_range' => $this->input->post('temp_range'),
					'soak_period' => $this->input->post('soak_period'),
					'heating_rate' => $this->input->post('heating_rate'),
					'cooling_rate' => $this->input->post('cooling_rate'),
					'post_heat_other' => $this->input->post('post_heat_other'),
					'shielding_gas' => $this->input->post('shielding_gas'),
					'shielding_percent' => $this->input->post('shielding_percent'),
					'shielding_rate' => $this->input->post('shielding_rate'),
					'backing_gas' => $this->input->post('backing_gas'),
					'backing_percent' => $this->input->post('backing_percent'),
					'backing_rate' => $this->input->post('backing_rate'),
					'trailing_gas' => $this->input->post('trailing_gas'),
					'trailing_percent' => $this->input->post('trailing_percent'),
					'trailing_rate' => $this->input->post('trailing_rate'),
					'travel_speed' => $this->input->post('travel_speed'),
					'bead' => $this->input->post('bead'),
					'cup_size' => $this->input->post('cup_size'),
					'electrode' => $this->input->post('electrode'),
					'per_side' => $this->input->post('per_side'),
					'cleaing' => $this->input->post('cleaing'),
					'tungesten_electrode' => $this->input->post('tungesten_electrode'),
					'result_statificatory' => $this->input->post('result_statificatory'),
					'penetration_into_partent_metal' => $this->input->post('penetration_into_partent_metal'),
					'maro_result' => $this->input->post('maro_result'),
					'type_test' => $this->input->post('type_test'),
					'deposit_analysis' => $this->input->post('deposit_analysis'),
					'test_others' => $this->input->post('test_others'),
					'welder_staff_id' => $this->input->post('welder_staff_id'),
					'stamp_no' => $this->input->post('stamp_no'),
					'conducted_by' => $this->input->post('conducted_by'),
					'laboratory_test_1' => $this->input->post('laboratory_test_1'),
					'laboratory_test_2' => $this->input->post('laboratory_test_2'),
					'laboratory_test_3' => $this->input->post('laboratory_test_3'),
					'updateBy'			=>	$this->session->userdata('user_id'),
					'updateOn'			=>	date('Y-m-d H:i:s')
				);

				if($this->input->post('pqr_id')!='')
				{

					$where_array=array(
						'pqr_id'		=>	$this->input->post('pqr_id')
					);
					$resultupdate=$this->mcommon->common_edit('jr_pqr',$value_array,$where_array);
				}
				else
				{
					$value_array['createBy'] =  $this->session->userdata('user_id');    
					$value_array['createOn'] =  date('Y-m-d H:i:s');
					
					$result = $this->mcommon->common_insert('jr_pqr',$value_array);

					// update the pqrno by using last inserted id
					$pqrno_arr = array('pqr_no' => 'PQRNO'.$result);
					$pqr_where_arr = array('pqr_id' => $result);

					$pqrno_update = $this->mcommon->common_edit('jr_pqr',$pqrno_arr,$pqr_where_arr);	

					// Insert sub pqr table
					// tab name electrical
					$layer_arr = [];
					$layer_arr = $this->input->post("layer");
					foreach($layer_arr as $k => $layer_val){
						$jr_pqr_electrical_array = [];
						$jr_pqr_electrical_array = array(
							'pqr_id' => $result,
							'layer'          => $this->input->post("layer[$k]"),
							'typer_polority' => $this->input->post("typer_polority[$k]"),
							'current_amperage_range' => $this->input->post("current_amperage_range[$k]"),
							'current_voltage_range' => $this->input->post("current_voltage_range[$k]"),
							'travel_speed_range' => $this->input->post("travel_speed_range[$k]"),
							'heat_input' => $this->input->post("heat_input[$k]"),
							'updateBy'			=>	$this->session->userdata('user_id'),
							'updateOn'			=>	date('Y-m-d H:i:s'),
							'createBy' 		=>  $this->session->userdata('user_id'),
							'createOn'		 =>  date('Y-m-d H:i:s')
						);
						$pqr_electrical = $this->mcommon->common_insert('jr_pqr_electrical',$jr_pqr_electrical_array);
					}

					// Insert tensile_test
					$specimen_arr = [];
					$specimen_arr = $this->input->post("specimen_no");
					foreach($specimen_arr as $k => $specimen_val){

						$jr_pqr_tensile_test_array = [];
						$jr_pqr_tensile_test_array = array(
							'pqr_id' => $result,
							'specimen_no'          => $this->input->post("specimen_no[$k]"),
							'thickness' => $this->input->post("thickness[$k]"),
							'width' => $this->input->post("width[$k]"),
							'area' => $this->input->post("area[$k]"),
							'ultimate_tensile_load' => $this->input->post("ultimate_tensile_load[$k]"),
							'ultimate_tensile_strength' => $this->input->post("ultimate_tensile_strength[$k]"),
							'fracture_location' => $this->input->post("fracture_location[$k]"),
							'tensile_test_result' => $this->input->post("tensile_test_result[$k]"),
							'updateBy'			=>	$this->session->userdata('user_id'),
							'updateOn'			=>	date('Y-m-d H:i:s'),
							'createBy' 		=>  $this->session->userdata('user_id'),
							'createOn'		 =>  date('Y-m-d H:i:s')
						);
						$pqr_tensile_test = $this->mcommon->common_insert('jr_pqr_tensile_test',$jr_pqr_tensile_test_array);
					}

					// Insert tensile_test
					$figure_arr = [];
					$figure_arr = $this->input->post("type_and_figure_no");
					foreach($figure_arr as $k => $figure_val){

						$jr_pqr_guided_ben_array = [];
						$jr_pqr_guided_ben_array = array(
							'pqr_id' => $result,
							'type_and_figure_no'          => $this->input->post("type_and_figure_no[$k]"),
							'ben_test_result' => $this->input->post("ben_test_result[$k]"),
							'updateBy'			=>	$this->session->userdata('user_id'),
							'updateOn'			=>	date('Y-m-d H:i:s'),
							'createBy' 		=>  $this->session->userdata('user_id'),
							'createOn'		 =>  date('Y-m-d H:i:s')
						);
						$pqr_guided_ben_test = $this->mcommon->common_insert('jr_pqr_guided_ben_test',$jr_pqr_guided_ben_array);
					}

					// Insert touchness_test
					$touchness_arr = [];
					$touchness_arr = $this->input->post("touchness_specimen_no");
					foreach($touchness_arr as $k => $touchness_val){

						$jr_pqr_touchness_test_array = [];
						$jr_pqr_touchness_test_array = array(
							'pqr_id' => $result,
							'touchness_specimen_no'          => $this->input->post("touchness_specimen_no[$k]"),
							'notch_location' => $this->input->post("notch_location[$k]"),
							'notch_type' => $this->input->post("notch_type[$k]"),
							'test_temp' => $this->input->post("test_temp[$k]"),
							'impact_values' => $this->input->post("impact_values[$k]"),
							'lateral_exp_shear' => $this->input->post("lateral_exp_shear[$k]"),
							'lateral_exp_mils' => $this->input->post("lateral_exp_mils[$k]"),
							'drop_break' => $this->input->post("drop_break[$k]"),
							'drop_no_break' => $this->input->post("drop_no_break[$k]"),
							'updateBy'			=>	$this->session->userdata('user_id'),
							'updateOn'			=>	date('Y-m-d H:i:s'),
							'createBy' 		=>  $this->session->userdata('user_id'),
							'createOn'		 =>  date('Y-m-d H:i:s')
						);
						$jr_pqr_touchness_test = $this->mcommon->common_insert('jr_pqr_touchness_test',$jr_pqr_touchness_test_array);
					}
				}
			}		
		}
		if($result)
		{

			$this->session->set_flashdata('res', lang('common_message_create'));
			$this->session->set_flashdata('res_pqr', 'success');
			redirect(base_url().'operation/PQR');
		}
		if($resultupdate)
		{

			$this->session->set_flashdata('res', lang('common_message_update'));
			$this->session->set_flashdata('res_pqr', 'success');
			redirect(base_url().'operation/PQR');
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
	

}



