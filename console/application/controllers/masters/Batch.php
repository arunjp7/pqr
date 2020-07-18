<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Batch extends CI_Controller
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

	public function testReport($idVal)
	{  

								    	//$this->load->library('Pdf');

		//$this->mcommon->reportShow('application/views/masters/Batch/sample1.jrxml');


		//include_once('application/libraries/PHPJasperXML/class/tcpdf/tcpdf.php');
		//include_once("application/libraries/PHPJasperXML/class/PHPJasperXML.inc.php");
		//$this->load->library('Pdf');
		//$this->load->library('Pdf');
		//$this->load->library('PHPJasperXML/class/PHPJasperXML.inc');
		//$this->load->library('PHPJasperXML1');
		include_once('application/libraries/PHPJasperXML.php');

		
//include_once ('phpjasperxml_0.9d/setting.php');

		$server="localhost";
		$db="aljoysgroup";
		$user="root";
		$pass="";

		$PHPJasperXML = new PHPJasperXML();
		//$PHPJasperXML->debugsql=true;
		$PHPJasperXML->arrayParameter=array("id"=>$idVal);
		$PHPJasperXML->load_xml_file('application/views/masters/Batch/sample1.jrxml');
//WPQPass
		$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
		//$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file
		$PHPJasperXML->outpage("I", "Report.pdf");



	}

	public function WelderBulkReport($idVal)
	{  
		include_once('application/libraries/PHPJasperXML.php');
		$server	=	$this->db->hostname;
		$db 	=	$this->db->database;
		$user 	=	$this->db->username;
		$pass 	=	$this->db->password;

		$PHPJasperXML = new PHPJasperXML();
		//$PHPJasperXML->debugsql=true;
		$PHPJasperXML->arrayParameter=array("id"=>$idVal);
		$PHPJasperXML->load_xml_file('application/views/masters/Batch/WelderBulkReport.jrxml');
//WPQPass
		$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
		//$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file
		$PHPJasperXML->outpage("I", "WelderBulkReport.pdf");
	}

	// Form View
	// Last Updated by Vinitha 09/08/2016 
	public function index($view_data)
	{
		$this->mcommon->getCheckUserPermissionHead('Batch', true);		

        $view_data['top_tittle']			=	lang('mm_masters_batch_manage_toptitle');
        $view_data['top_tittle_pergram']	=	lang('mm_masters_batch_manage_pergram');

        $view_data['add_button_url']		=	'masters/Batch/addUpdateForm';
    	$view_data['pdf_url']				=	'masters/Batch/downloadPDF';
    	$view_data['pdf_fileName']			=	lang('mm_masters_batch_manage_exportPDFFileName').date('d_m_Y');    	
    	$view_data['export_url']			=	'masters/Batch/exportExcel';
    	$view_data['export_fileName']		=	lang('mm_masters_batch_manage_exportPDFFileName').date('d_m_Y');

    	$view_data['datatable_url']			=	'masters/Batch/datatable';
    	$view_data['list_tittle']			=	lang('mm_masters_batch_manage_list_title');
    	$view_data['list_tittle_small']		=	lang('mm_masters_batch_manage_list_title_small');

		$data = array(
                    'title'     	=> lang('mm_masters_batch_manage_view'),
                    'content'   	=>$this->load->view('masters/Batch/batchDataList',$view_data,TRUE)                
                    );
        $this->load->view('base/template', $data); 
	}

	// datatable View
	// Last Updated by Vinitha 09/08/2016 
	function datatable1()
    {
    	$this->datatables->select('p.batch_id, p.batch_name, s.services_name, p.batch_ref_no, p.batch_wps, p.batch_request_date, p.batch_acceptance_criteria, p.batch_client_specification,p.batch_id as welderDetails,p.batch_id as welderPass,p.batch_id as checkListReport,p.batch_id as checkListVi,p.batch_id as checkListAttachement,p.batch_id as ndtRequest,p.batch_id as ndt,p.batch_id as ndtAttachement,p.batch_id as qualificationRecord,p.batch_id as resultWPQ,p.batch_id as resultForm,p.batch_id as resultBulkReport,p.batch_id as attachementBatch,p.batch_id as resultIsOpen,p.batch_id as resultIsCompleted, u.first_name, p.batch_createOn,u1.first_name as firstname,p.batch_updateOn')
        ->from('jr_batch AS p')
        ->join('jr_services AS s', 's.services_id = p.batch_services','left') 
        ->join('users AS u', 'u.id = p.batch_createBy','left') 
        ->join('users AS u1', 'u1.id = p.batch_updateBy','left') 
        ->where('p.batch_show_status', 1)
		->edit_column('p.batch_id', get_buttons_new('$1','masters/Batch/'), 'p.batch_id');
		//$this->datatables->edit_column('p.page_show_status', '$1', 'get_status(p.page_show_status)');welderPass
		$this->datatables->edit_column('p.batch_request_date', '$1', 'get_dateformat(p.batch_request_date)');
		$this->datatables->edit_column('welderDetails', '$1', 'get_resultWelderDetails(welderDetails)');
		$this->datatables->edit_column('welderPass', '$1', 'get_resultWelderPass(welderPass)');
		$this->datatables->edit_column('checkListReport', '$1', 'get_resultCheckListReport(checkListReport)');
		$this->datatables->edit_column('checkListVi', '$1', 'get_resultCheckListVi(checkListVi)');
		$this->datatables->edit_column('checkListAttachement', '$1', 'get_resultCheckListAttachement(checkListAttachement)');
		$this->datatables->edit_column('ndtRequest', '$1', 'get_resultNDTRequest(ndtRequest)');
		$this->datatables->edit_column('ndt', '$1', 'get_NDT(ndt)');
		$this->datatables->edit_column('ndtAttachement', '$1', 'get_ndtAttachement(ndtAttachement)');
		$this->datatables->edit_column('qualificationRecord', '$1', 'get_resultQualificationRecord(qualificationRecord)');
		$this->datatables->edit_column('resultWPQ', '$1', 'get_resultResultWPQ(resultWPQ)');
		$this->datatables->edit_column('resultForm', '$1', 'get_resultResultForm(resultForm)');
		$this->datatables->edit_column('resultBulkReport', '$1', 'get_resultBulkReport(resultBulkReport)');
		$this->datatables->edit_column('attachementBatch', '$1', 'get_attachementBatch(attachementBatch)');
		$this->datatables->edit_column('resultIsOpen', '$1', 'get_resultIsOpen(resultIsOpen)');
		$this->datatables->edit_column('resultIsCompleted', '$1', 'get_resultIsCompleted(resultIsCompleted)');
		//$this->datatables->edit_column('resultCertification', '$1', 'get_resultCertification(resultCertification)');
		$this->datatables->edit_column('p.batch_createOn', '$1', 'get_date_timeformat(p.batch_createOn)');
		$this->datatables->edit_column('p.batch_updateOn', '$1', 'get_date_timeformat(p.batch_updateOn)');
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
			'p.batch_id','p.batch_name','s.services_name','p.batch_ref_no','p.batch_wps','p.batch_request_date','p.batch_acceptance_criteria','p.batch_id as welderDetails','p.batch_id as welderPass','p.batch_id as checkListReport','p.batch_id as checkListVi','p.batch_id as checkListAttachement','p.batch_id as ndtRequest','p.batch_id as ndt','p.batch_id as ndtAttachement','p.batch_id as qualificationRecord','p.batch_id as resultWPQ','p.batch_id as resultForm','p.batch_id as resultBulkReport','p.batch_id as attachementBatch','p.batch_id as resultIsOpen','p.batch_id as resultIsCompleted','u.first_name','p.batch_createOn','u1.first_name as firstname','p.batch_updateOn'
		);
		$join_arrayPackage = array(
			'jr_services AS s' => 's.services_id = p.batch_services',
			'users AS u' => 'u.id = p.batch_createBy',
			'users AS u1' => 'u1.id = p.batch_updateBy',
		);

		
		$getDesignation = $this->mcommon->getCheckUserDesignation();	
		if ($this->ion_auth->is_admin()) {
			$where_arrayPackage = array('p.batch_show_status' =>'1');
		} elseif ($getDesignation == 1) {
			$where_arrayPackage = array('p.batch_show_status' =>'1', 'p.jobNo' => $this->session->userdata('current_batch_id'));
		}

		$orderPackage = $sidx.' '. $sord;

		$count =   $this->mcommon->join_records_counts($fields_arrayPackage, 'jr_batch as p', $join_arrayPackage, $where_arrayPackage, '', $orderPackage);

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
		$dataTable_Details =   $this->mcommon->join_records_all($fields_arrayPackage, 'jr_batch as p', $join_arrayPackage, $where_arrayPackage, '', $orderPackage,'object');
		
		if (isset($dataTable_Details) && !empty($dataTable_Details)) {
			$i=0;
	        foreach ($dataTable_Details->result() as $dataDetail) {
	        	$responce->rows[$i]['id'] = $dataDetail->batch_id;
	        	//$responce->rows[$i]['cell']= array($dataDetail->ndtContractor_id);
	        	
	        	$responce->rows[$i]['cell']['edit_batch_id'] = get_buttons_new_only_Edit($dataDetail->batch_id,'masters/Batch/');
	        	$responce->rows[$i]['cell']['delete_batch_id'] = get_buttons_new_only_Delete($dataDetail->batch_id,'masters/Batch/');
	        	$responce->rows[$i]['cell']['batch_name'] = $dataDetail->batch_name;
	        	$responce->rows[$i]['cell']['services_name'] = $dataDetail->services_name;
	        	$responce->rows[$i]['cell']['batch_ref_no'] = $dataDetail->batch_ref_no;
	        	$responce->rows[$i]['cell']['batch_wps'] = $dataDetail->batch_wps;
	        	$responce->rows[$i]['cell']['batch_request_date'] = get_dateformat($dataDetail->batch_request_date);
	        	$responce->rows[$i]['cell']['batch_acceptance_criteria'] = $dataDetail->batch_acceptance_criteria;
	        	$responce->rows[$i]['cell']['batch_client_specification'] = $dataDetail->batch_client_specification;
	        	$responce->rows[$i]['cell']['welderDetails'] = get_resultWelderDetails($dataDetail->welderDetails);
	        	//$responce->rows[$i]['cell']['welderPass'] = get_resultWelderPass($dataDetail->welderPass);
	        	$responce->rows[$i]['cell']['checkListReport'] = get_resultCheckListReport($dataDetail->checkListReport);
	        	$responce->rows[$i]['cell']['checkListVi'] = get_resultCheckListVi($dataDetail->checkListVi);
	        	$responce->rows[$i]['cell']['checkListAttachement'] = get_resultCheckListAttachement($dataDetail->checkListAttachement);
	        	$responce->rows[$i]['cell']['ndtRequest'] = get_resultNDTRequest($dataDetail->ndtRequest);
	        	$responce->rows[$i]['cell']['ndt'] = get_NDT($dataDetail->ndt);
	        	$responce->rows[$i]['cell']['ndtAttachement'] = get_ndtAttachement($dataDetail->ndtAttachement);
	        	$responce->rows[$i]['cell']['qualificationRecord'] = get_resultQualificationRecord('masters/Batch/WPQReport/'.$dataDetail->qualificationRecord);
	        	$responce->rows[$i]['cell']['resultWPQ'] = get_resultResultWPQ($dataDetail->resultWPQ);
	        	$responce->rows[$i]['cell']['resultForm'] = get_resultResultForm($dataDetail->resultForm);
	        	$responce->rows[$i]['cell']['resultBulkReport'] = get_resultBulkReport('masters/Batch/WelderBulkReport/'.$dataDetail->resultBulkReport);
	        	$responce->rows[$i]['cell']['attachementBatch'] = get_attachementBatch($dataDetail->attachementBatch);
	        	$responce->rows[$i]['cell']['resultIsOpen'] = get_resultIsOpen($dataDetail->resultIsOpen);
	        	$responce->rows[$i]['cell']['resultIsCompleted'] = get_resultIsCompleted($dataDetail->resultIsCompleted);
	        	$responce->rows[$i]['cell']['first_name'] = $dataDetail->first_name;
	        	$responce->rows[$i]['cell']['batch_createOn'] = get_date_timeformat($dataDetail->batch_createOn);
	        	$responce->rows[$i]['cell']['firstname'] = $dataDetail->firstname;
	        	$responce->rows[$i]['cell']['batch_updateOn'] = get_date_timeformat($dataDetail->batch_updateOn);
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
		$this->mcommon->getCheckUserPermissionHead('Batch add and edit',true);
        $view_data['top_tittle']			=	lang('mm_masters_batch_manage_toptitle');
        $view_data['top_tittle_pergram']	=	lang('mm_masters_batch_manage_pergram');

        $view_data['form_url']				=	'masters/Batch/create';
        $view_data['form_cancel_url']		=	'masters/Batch';
        $view_data['form_tittle']			=	lang('mm_masters_batch_manage_form_title');
        $view_data['form_tittle_small']		=	lang('mm_masters_batch_manage_form_title_small');
        $view_data['form_button_name']		=	lang('mm_masters_batch_manage_form_button_name');

    	$fields_arrayServices = array(
    		'services_id as Key','services_name as Value'
    	);
		$whereArrServices        = "services_show_status ='1'";

    	$view_data['drop_down_Services']	=	$this->mcommon->Dropdown('jr_services',$fields_arrayServices,'',$whereArrServices,'','`services_id` ASC ','');


    	/*$fields_arraytestresult = array(
    		'project_id as Key','project_name as Value'
    	);
		$whereArrtestresult        = "project_show_status ='1'";

    	$view_data['drop_down_project']	=	$this->mcommon->Dropdown('jr_project',$fields_arraytestresult,'',$whereArrtestresult,'','`project_id` ASC ','');
		*/

    	$fields_arraytestresult = array(
    		'job_no_id as Key','job_no as Value'
    	);
		$whereArrtestresult        = "job_no_show_status ='1'";

    	$view_data['drop_down_job']	=	$this->mcommon->Dropdown('jr_job_no',$fields_arraytestresult,'',$whereArrtestresult,'','`job_no_id` ASC ','');

    	
    	$fields_arrayreportTemplate = array(
    		'report_template_id as Key','report_template_name as Value'
    	);
		$whereArrreportTemplate        = "report_template_show_status ='1'";

    	$view_data['drop_menu_reportTemplate']	=	$this->mcommon->Dropdown('jr_report_template',$fields_arrayreportTemplate,'',$whereArrreportTemplate,'','`report_template_id` ASC ','');

    	$nos=$this->constants->get_constant_no(); 
    	$view_data['batch_ref_no']				=	$nos['batch_ref_no'];

		$data = array(
                    'title'     	=> lang('mm_masters_batch_manage_create'),
                    'content'   	=>$this->load->view('masters/Batch/batchmanagement',$view_data,TRUE)                
                    );
        $this->load->view('base/template', $data); 
	}

	// Form View
	// Last Updated by Vinitha 09/08/2016 
	public function WPQReport($id)
	{  
        $view_data['top_tittle']			=	lang('mm_masters_batch_wpq_manage_toptitle');
        $view_data['top_tittle_pergram']	=	lang('mm_masters_batch_wpq_manage_pergram');

        $view_data['batchID']				=	$id;
        $view_data['form_url']				=	'masters/Batch/createWPQ';
        $view_data['form_url2']				=	'masters/Batch/create';
        $view_data['form_url3']				=	'masters/Batch/create';
        $view_data['form_cancel_url']		=	'masters/Batch';
        $view_data['form_tittle']			=	lang('mm_masters_batch_wpq_manage_form_title');
        $view_data['form_tittle_small']		=	lang('mm_masters_batch_wpq_manage_form_title_small');


		$fields_arrayPackage = array(
			'p.batchWPQ_id as static_form_id','p.batchForm_welding_processes_lbl', 'p.batchForm_welding_processes_val', 'p.batchForm_welding_processes_val1', 'p.batchForm_welding_processes_val2', 'p.batchForm_welding_processes_range', 'p.batchForm_welding_type_lbl', 'p.batchForm_welding_type_val', 'p.batchForm_welding_type_range', 'p.batchForm_pno_groupno_lbl', 'p.batchForm_pno_groupno_val_qnt', 'p.batchForm_pno_groupno_val', 'p.batchForm_pno_groupno_range', 'p.batchForm_test_specimen_lbl', 'p.batchForm_test_specimen_val', 'p.batchForm_test_specimen_range', 'p.batchForm_pipe_tube_lbl', 'p.batchForm_pipe_tube_val', 'p.batchForm_pipe_tube_range', 'p.batchForm_pipe_plate_lbl', 'p.batchForm_pipe_plate_val', 'p.batchForm_pipe_plate_val_qnt', 'p.batchForm_pipe_plate_range', 'p.batchForm_pno_groupno_val_qnt1', 'p.batchForm_pno_groupno_val1', 'p.batchForm_type_of_joint_lbl', 'p.batchForm_type_of_joint_val', 'p.batchForm_type_of_joint_range', 'p.batchForm_type_of_weld_lbl', 'p.batchForm_type_of_weld_val', 'p.batchForm_type_of_weld_range', 'p.batchForm_joint_backing_lbl', 'p.batchForm_joint_backing_val', 'p.batchForm_joint_backing_range', 'p.batchForm_filler_metal_spec_lbl', 'p.batchForm_filler_metal_spec_val', 'p.batchForm_filler_metal_spec_range', 'p.batchForm_filler_metal_aws_lbl', 'p.batchForm_filler_metal_aws_val', 'p.batchForm_filler_metal_aws_range', 'p.batchForm_filler_metal_fno_lbl', 'p.batchForm_filler_metal_fno_val', 'p.batchForm_filler_metal_fno_range', 'p.batchForm_filler_metal_brand_lbl', 'p.batchForm_filler_metal_brand_val', 'p.batchForm_filler_metal_brand_range', 'p.batchForm_deposit_weld_lbl', 'p.batchForm_deposit_weld_val', 'p.batchForm_deposit_weld_range', 'p.batchForm_consumable_insert_lbl', 'p.batchForm_consumable_insert_val', 'p.batchForm_consumable_insert_range', 'p.batchForm_filler_metal_product_lbl', 'p.batchForm_filler_metal_product_val', 'p.batchForm_filler_metal_product_range', 'p.batchForm_welding_position_lbl', 'p.batchForm_welding_position_val', 'p.batchForm_welding_position_range', 'p.batchForm_vertical_progression_lbl', 'p.batchForm_vertical_progression_val', 'p.batchForm_vertical_progression_range', 'p.batchForm_insert_gas_lbl', 'p.batchForm_insert_gas_val', 'p.batchForm_insert_gas_range', 'p.batchForm_transfer_mode_lbl', 'p.batchForm_transfer_mode_val', 'p.batchForm_transfer_mode_range', 'p.batchForm_current_type_lbl', 'p.batchForm_current_type_val', 'p.batchForm_current_type_range'
		);
		$join_arrayPackage = array();
		$where_arrayPackage = array('p.batchID' =>$id);
		$orderPackage = '';

		$view_data['staticFormDetails'] =   $this->mcommon->join_records_all($fields_arrayPackage, 'jr_batch_wpq_report as p', $join_arrayPackage, $where_arrayPackage, '', $orderPackage,'object');

		$fields_arrayTestResult = array(
			'p.batchWPQ_test_result_id', 'p.batchForm_visual_inspection_result_lbl', 'p.batchForm_visual_inspection_result_val', 'p.batchForm_visual_inspection_result_report', 'p.batchForm_radoigraphy_result_lbl', 'p.batchForm_radoigraphy_result_val', 'p.batchForm_radoigraphy_result_report', 'p.batchForm_bend_result_lbl', 'p.batchForm_bend_result_val', 'p.batchForm_bend_result_report', 'p.batchForm_fillet_fracture_result_lbl', 'p.batchForm_fillet_fracture_result_val', 'p.batchForm_fillet_fracture_result_report', 'p.batchForm_macro_examination_result_lbl', 'p.batchForm_macro_examination_result_val', 'p.batchForm_macro_examination_result_report', 'p.batchForm_other_test_result_lbl', 'p.batchForm_other_test_result_val', 'p.batchForm_other_test_result_report'
		);
		$join_arrayTestResult = array();
		$where_arrayTestResult = array('p.batchID' =>$id);
		$orderTestResult = '';

		$view_data['testResults'] =   $this->mcommon->join_records_all($fields_arrayTestResult, 'jr_batch_wpq_test_result as p', $join_arrayTestResult, $where_arrayTestResult, '', $orderTestResult,'object'
		);

		$fields_arrayAdditional = array(
			'p.batchWPQ_additional_notes','p.batchWPQ_additional_conducted_by','p.batchWPQ_additional_date');
		$join_arrayAdditional = array();
		$where_arrayAdditional = array('p.batchID' =>$id);
		$orderAdditional = '';

		$view_data['additionalDetails'] =   $this->mcommon->join_records_all($fields_arrayAdditional, 'jr_batch_wpq_additional as p', $join_arrayAdditional, $where_arrayAdditional, '', $orderAdditional,'object'
		);

    	/*
		$fields_arrayPackage = array(
			'p.static_form_id','p.staticForm_welding_variables','p.staticForm_quali_test','p.staticForm_quali_range','p.staticForm_type','p.staticForm_type_label','p.staticForm_type_label_value','p.staticForm_show_status'
		);
		$join_arrayPackage = array();
		$where_arrayPackage = array('p.staticForm_show_status' =>'1');
		$orderPackage = '';

		$view_data['staticFormDetails'] =   $this->mcommon->join_records_all($fields_arrayPackage, 'jr_wpq_static_form as p', $join_arrayPackage, $where_arrayPackage, '', $orderPackage,'object');

		$fields_arrayTestResult = array(
			'p.batchWPQ_test_result_id','p.batchWPQ_test_type1','p.batchWPQ_test_type1_result','p.batchWPQ_test_type2','p.batchWPQ_test_type2_result'
		);
		$join_arrayTestResult = array();
		$where_arrayTestResult = array('p.batchID' =>$id);
		$orderTestResult = '';

		$view_data['testResults'] =   $this->mcommon->join_records_all($fields_arrayTestResult, 'jr_batch_wpq_test_result as p', $join_arrayTestResult, $where_arrayTestResult, '', $orderTestResult,'object'
		);

		$fields_arrayAdditional = array(
			'p.batchWPQ_additional_notes','p.batchWPQ_additional_conducted_by','p.batchWPQ_additional_date');
		$join_arrayAdditional = array();
		$where_arrayAdditional = array('p.batchID' =>$id);
		$orderAdditional = '';

		$view_data['additionalDetails'] =   $this->mcommon->join_records_all($fields_arrayAdditional, 'jr_batch_wpq_additional as p', $join_arrayAdditional, $where_arrayAdditional, '', $orderAdditional,'object'
		);
		*/


		$data = array(
                    'title'     	=> lang('mm_masters_batch_wpq_manage_create'),
                    'content'   	=>$this->load->view('masters/Batch/batchWPQReportmanagement',$view_data,TRUE)                
                    );
        $this->load->view('base/template', $data); 
	}

	// Form View
	// Last Updated by Vinitha 09/08/2016 
	public function WPQReportAdd($id)
	{  
        $view_data['top_tittle']			=	lang('mm_masters_batch_wpq_manage_toptitle');
        $view_data['top_tittle_pergram']	=	lang('mm_masters_batch_wpq_manage_pergram');

        $view_data['batchID']				=	$id;
        $view_data['form_url']				=	'masters/Batch/createWPQ';
        $view_data['form_url2']				=	'masters/Batch/create';
        $view_data['form_url3']				=	'masters/Batch/create';
        $view_data['form_cancel_url']		=	'masters/Batch';
        $view_data['form_tittle']			=	lang('mm_masters_batch_wpq_manage_form_title');
        $view_data['form_tittle_small']		=	lang('mm_masters_batch_wpq_manage_form_title_small');
        
    	
		$fields_arrayPackage = array(
			'p.batchWPQ_id as static_form_id','p.batchForm_welding_processes_lbl', 'p.batchForm_welding_processes_val', 'p.batchForm_welding_processes_val1', 'p.batchForm_welding_processes_val2', 'p.batchForm_welding_processes_range', 'p.batchForm_welding_type_lbl', 'p.batchForm_welding_type_val', 'p.batchForm_welding_type_range', 'p.batchForm_pno_groupno_lbl', 'p.batchForm_pno_groupno_val_qnt', 'p.batchForm_pno_groupno_val', 'p.batchForm_pno_groupno_range', 'p.batchForm_test_specimen_lbl', 'p.batchForm_test_specimen_val', 'p.batchForm_test_specimen_range', 'p.batchForm_pipe_tube_lbl', 'p.batchForm_pipe_tube_val', 'p.batchForm_pipe_tube_range', 'p.batchForm_pipe_plate_lbl', 'p.batchForm_pipe_plate_val', 'p.batchForm_pipe_plate_val_qnt', 'p.batchForm_pipe_plate_range', 'p.batchForm_pno_groupno_val_qnt1', 'p.batchForm_pno_groupno_val1', 'p.batchForm_type_of_joint_lbl', 'p.batchForm_type_of_joint_val', 'p.batchForm_type_of_joint_range', 'p.batchForm_type_of_weld_lbl', 'p.batchForm_type_of_weld_val', 'p.batchForm_type_of_weld_range', 'p.batchForm_joint_backing_lbl', 'p.batchForm_joint_backing_val', 'p.batchForm_joint_backing_range', 'p.batchForm_filler_metal_spec_lbl', 'p.batchForm_filler_metal_spec_val', 'p.batchForm_filler_metal_spec_range', 'p.batchForm_filler_metal_aws_lbl', 'p.batchForm_filler_metal_aws_val', 'p.batchForm_filler_metal_aws_range', 'p.batchForm_filler_metal_fno_lbl', 'p.batchForm_filler_metal_fno_val', 'p.batchForm_filler_metal_fno_range', 'p.batchForm_filler_metal_brand_lbl', 'p.batchForm_filler_metal_brand_val', 'p.batchForm_filler_metal_brand_range', 'p.batchForm_deposit_weld_lbl', 'p.batchForm_deposit_weld_val', 'p.batchForm_deposit_weld_range', 'p.batchForm_consumable_insert_lbl', 'p.batchForm_consumable_insert_val', 'p.batchForm_consumable_insert_range', 'p.batchForm_filler_metal_product_lbl', 'p.batchForm_filler_metal_product_val', 'p.batchForm_filler_metal_product_range', 'p.batchForm_welding_position_lbl', 'p.batchForm_welding_position_val', 'p.batchForm_welding_position_range', 'p.batchForm_vertical_progression_lbl', 'p.batchForm_vertical_progression_val', 'p.batchForm_vertical_progression_range', 'p.batchForm_insert_gas_lbl', 'p.batchForm_insert_gas_val', 'p.batchForm_insert_gas_range', 'p.batchForm_transfer_mode_lbl', 'p.batchForm_transfer_mode_val', 'p.batchForm_transfer_mode_range', 'p.batchForm_current_type_lbl', 'p.batchForm_current_type_val', 'p.batchForm_current_type_range'
		);
		$join_arrayPackage = array();
		$where_arrayPackage = array('p.batchID' =>$id);
		$orderPackage = '';

		$view_data['staticFormDetails'] =   $this->mcommon->join_records_all($fields_arrayPackage, 'jr_batch_wpq_report as p', $join_arrayPackage, $where_arrayPackage, '', $orderPackage,'object');

		
		$fields_arrayTestResult = array(
			'p.batchWPQ_test_result_id', 'p.batchForm_visual_inspection_result_lbl', 'p.batchForm_visual_inspection_result_val', 'p.batchForm_visual_inspection_result_report', 'p.batchForm_radoigraphy_result_lbl', 'p.batchForm_radoigraphy_result_val', 'p.batchForm_radoigraphy_result_report', 'p.batchForm_bend_result_lbl', 'p.batchForm_bend_result_val', 'p.batchForm_bend_result_report', 'p.batchForm_fillet_fracture_result_lbl', 'p.batchForm_fillet_fracture_result_val', 'p.batchForm_fillet_fracture_result_report', 'p.batchForm_macro_examination_result_lbl', 'p.batchForm_macro_examination_result_val', 'p.batchForm_macro_examination_result_report', 'p.batchForm_other_test_result_lbl', 'p.batchForm_other_test_result_val', 'p.batchForm_other_test_result_report'
		);
		$join_arrayTestResult = array();
		$where_arrayTestResult = array('p.batchID' =>$id);
		$orderTestResult = '';

		$view_data['testResults'] =   $this->mcommon->join_records_all($fields_arrayTestResult, 'jr_batch_wpq_test_result as p', $join_arrayTestResult, $where_arrayTestResult, '', $orderTestResult,'object'
		);

		
		$fields_arrayAdditional = array(
			'p.batchWPQ_additional_notes','p.batchWPQ_additional_conducted_by','p.batchWPQ_additional_date');
		$join_arrayAdditional = array();
		$where_arrayAdditional = array('p.batchID' =>$id);
		$orderAdditional = '';

		$view_data['additionalDetails'] =   $this->mcommon->join_records_all($fields_arrayAdditional, 'jr_batch_wpq_additional as p', $join_arrayAdditional, $where_arrayAdditional, '', $orderAdditional,'object'
		);
		
		
		
	
		$data = array(
                    'title'     	=> lang('mm_masters_batch_wpq_manage_create'),
                    'content'   	=>$this->load->view('masters/Batch/batchWPQReportmanagement',$view_data,TRUE)                
                    );
        $this->load->view('base/template', $data); 
	}



	// create Form
	// Last Updated by Vinitha 09/08/2016 
	public function createWPQ()
	{		
        $user   = $this->ion_auth->user()->row();
        if(isset($_POST['submit']))
		{			
			
			$alreadyExistRecord	=	$this->mcommon->specific_record_counts('jr_batch_wpq_report',array('batchID'=>$this->input->post('batchID')));

			$staticFormId = $this->input->post('static_form_id');

			//$this->mcommon->common_delete('jr_batch_wpq_report',array('batchID'=>$this->input->post('batchID')));

			$batchFormWeldingPositionVal = '';

			if($this->input->post('batchForm_welding_processes_lbl')!='' ){
				$batchForm_welding_position_val = $this->input->post('batchForm_welding_position_val');
				if($batchForm_welding_position_val == '1g'){
					$batchFormWeldingPositionVal = '1G';
				} else if($batchForm_welding_position_val == '2g'){
					$batchFormWeldingPositionVal = '2G';
				} else if($batchForm_welding_position_val == '5g'){
					$batchFormWeldingPositionVal = '5G';
				} else if($batchForm_welding_position_val == '6g'){
					$batchFormWeldingPositionVal = '6G';
				} else if($batchForm_welding_position_val == '2gand5g'){
					$batchFormWeldingPositionVal = '2G and 5G';
				} else if($batchForm_welding_position_val == 'specialpositions'){
					$batchFormWeldingPositionVal = 'Special Positions (SP)';
				} else if($batchForm_welding_position_val == '3g'){
					$batchFormWeldingPositionVal = '3G';
				} else if($batchForm_welding_position_val == '4g'){
					$batchFormWeldingPositionVal = '4G';
				} else if($batchForm_welding_position_val == '3gand4g'){
					$batchFormWeldingPositionVal = '3G and 4G';
				} else if($batchForm_welding_position_val == '2g3gand4g'){
					$batchFormWeldingPositionVal = '2G, 3G and 4G';
				} else if($batchForm_welding_position_val == '1f'){
					$batchFormWeldingPositionVal = '1F';
				} else if($batchForm_welding_position_val == '2f'){
					$batchFormWeldingPositionVal = '2F';
				} else if($batchForm_welding_position_val == '2fr'){
					$batchFormWeldingPositionVal = '2FR';
				} else if($batchForm_welding_position_val == '4f'){
					$batchFormWeldingPositionVal = '4F';
				} else if($batchForm_welding_position_val == '5f'){
					$batchFormWeldingPositionVal = '5F';
				} else if($batchForm_welding_position_val == '3f'){
					$batchFormWeldingPositionVal = '3F';
				} else if($batchForm_welding_position_val == '4f'){
					$batchFormWeldingPositionVal = '4F';
				} else if($batchForm_welding_position_val == '3fand4f'){
					$batchFormWeldingPositionVal = '3F and 4F';
				}
			}

			$batchFormTestSpecimenVal = ($this->input->post('batchForm_test_specimen_val')!='') ? ucfirst($this->input->post('batchForm_test_specimen_val')) : '';
			$batchFormTypeOfWeldVal = ($this->input->post('batchForm_type_of_weld_val')!='') ? ucfirst($this->input->post('batchForm_type_of_weld_val')) : '';
			$batchFormVerticalProgressionRange = ($this->input->post('batchForm_vertical_progression_range')!='') ? ucfirst($this->input->post('batchForm_vertical_progression_range')) : '';
			$batchFormVerticalProgressionVal = ($this->input->post('batchForm_vertical_progression_val')!='') ? ucfirst($this->input->post('batchForm_vertical_progression_val')) : '';

			$value_array=array(
				'batchID'				=>	$this->input->post('batchID'),
				'batchForm_welding_processes_lbl'	=>	($this->input->post('batchForm_welding_processes_lbl')!='') ? $this->input->post('batchForm_welding_processes_lbl') : '',				
				'batchForm_welding_processes_val'	=>	($this->input->post('batchForm_welding_processes_val')!='') ? $this->input->post('batchForm_welding_processes_val') : '',
				'batchForm_welding_processes_val1'	=>	($this->input->post('batchForm_welding_processes_val1')!='') ? $this->input->post('batchForm_welding_processes_val1') : '',
				'batchForm_welding_processes_val2'	=>	($this->input->post('batchForm_welding_processes_val2')!='') ? $this->input->post('batchForm_welding_processes_val2') : '',
				'batchForm_welding_processes_range'	=>	($this->input->post('batchForm_welding_processes_range')!='') ? $this->input->post('batchForm_welding_processes_range') : '',
				'batchForm_welding_type_lbl'	=>	($this->input->post('batchForm_welding_type_lbl')!='') ? $this->input->post('batchForm_welding_type_lbl') : '',
				'batchForm_welding_type_val'	=>	($this->input->post('batchForm_welding_type_val')!='') ? $this->input->post('batchForm_welding_type_val') : '',
				'batchForm_welding_type_range'	=>	($this->input->post('batchForm_welding_type_range')!='') ? $this->input->post('batchForm_welding_type_range') : '',

				'batchForm_pno_groupno_lbl'	=>	($this->input->post('batchForm_pno_groupno_lbl')!='') ? $this->input->post('batchForm_pno_groupno_lbl') : '',
				'batchForm_pno_groupno_val'	=>	($this->input->post('batchForm_pno_groupno_val')!='') ? $this->input->post('batchForm_pno_groupno_val') : '',
				'batchForm_pno_groupno_val_qnt'	=>	($this->input->post('batchForm_pno_groupno_val_qnt')!='') ? $this->input->post('batchForm_pno_groupno_val_qnt') : '',				
				'batchForm_pno_groupno_range'	=>	($this->input->post('batchForm_pno_groupno_range')!='') ? $this->input->post('batchForm_pno_groupno_range') : '',
				'batchForm_test_specimen_lbl'	=>	($this->input->post('batchForm_test_specimen_lbl')!='') ? $this->input->post('batchForm_test_specimen_lbl') : '',
				'batchForm_test_specimen_val'	=>	$batchFormTestSpecimenVal,
				'batchForm_test_specimen_range'	=>	($this->input->post('batchForm_test_specimen_range')!='') ? $this->input->post('batchForm_test_specimen_range') : '',
				'batchForm_pipe_tube_lbl'	=>	($this->input->post('batchForm_pipe_tube_lbl')!='') ? $this->input->post('batchForm_pipe_tube_lbl') : '',
				'batchForm_pipe_tube_val'	=>	($this->input->post('batchForm_pipe_tube_val')!='') ? $this->input->post('batchForm_pipe_tube_val') : '',
				'batchForm_pipe_tube_range'	=>	($this->input->post('batchForm_pipe_tube_range')!='') ? $this->input->post('batchForm_pipe_tube_range') : '',
				'batchForm_pipe_plate_lbl'	=>	($this->input->post('batchForm_pipe_plate_lbl')!='') ? $this->input->post('batchForm_pipe_plate_lbl') : '',
				'batchForm_pipe_plate_val'	=>	($this->input->post('batchForm_pipe_plate_val')!='') ? $this->input->post('batchForm_pipe_plate_val') : '',
				'batchForm_pipe_plate_val_qnt'	=>	($this->input->post('batchForm_pipe_plate_val_qnt')!='') ? $this->input->post('batchForm_pipe_plate_val_qnt') : '',
				'batchForm_pipe_plate_range'	=>	($this->input->post('batchForm_pipe_plate_range')!='') ? $this->input->post('batchForm_pipe_plate_range') : '',
				'batchForm_pno_groupno_val1'	=>	($this->input->post('batchForm_pno_groupno_val1')!='') ? $this->input->post('batchForm_pno_groupno_val1') : '',
				'batchForm_pno_groupno_val_qnt1'	=>	($this->input->post('batchForm_pno_groupno_val_qnt1')!='') ? $this->input->post('batchForm_pno_groupno_val_qnt1') : '',				

				'batchForm_type_of_joint_lbl'	=>	($this->input->post('batchForm_type_of_joint_lbl')!='') ? $this->input->post('batchForm_type_of_joint_lbl') : '',
				'batchForm_type_of_joint_val'	=>	($this->input->post('batchForm_type_of_joint_val')!='') ? $this->input->post('batchForm_type_of_joint_val') : '',
				'batchForm_type_of_joint_range'	=>	($this->input->post('batchForm_type_of_joint_range')!='') ? $this->input->post('batchForm_type_of_joint_range') : '',
				'batchForm_type_of_weld_lbl'	=>	($this->input->post('batchForm_type_of_weld_lbl')!='') ? $this->input->post('batchForm_type_of_weld_lbl') : '',
				'batchForm_type_of_weld_val'	=>	$batchFormTypeOfWeldVal,
				'batchForm_type_of_weld_range'	=>	($this->input->post('batchForm_type_of_weld_range')!='') ? $this->input->post('batchForm_type_of_weld_range') : '',				
				'batchForm_joint_backing_lbl'	=>	($this->input->post('batchForm_joint_backing_lbl')!='') ? $this->input->post('batchForm_joint_backing_lbl') : '',
				'batchForm_joint_backing_val'	=>	($this->input->post('batchForm_joint_backing_val')!='') ? $this->input->post('batchForm_joint_backing_val') : '',
				'batchForm_joint_backing_range'	=>	($this->input->post('batchForm_joint_backing_range')!='') ? $this->input->post('batchForm_joint_backing_range') : '',
				'batchForm_filler_metal_spec_lbl'	=>	($this->input->post('batchForm_filler_metal_spec_lbl')!='') ? $this->input->post('batchForm_filler_metal_spec_lbl') : '',
				'batchForm_filler_metal_spec_val'	=>	($this->input->post('batchForm_filler_metal_spec_val')!='') ? $this->input->post('batchForm_filler_metal_spec_val') : '',
				'batchForm_filler_metal_spec_range'	=>	($this->input->post('batchForm_filler_metal_spec_range')!='') ? $this->input->post('batchForm_filler_metal_spec_range') : '',
				'batchForm_filler_metal_aws_lbl'	=>	($this->input->post('batchForm_filler_metal_aws_lbl')!='') ? $this->input->post('batchForm_filler_metal_aws_lbl') : '',
				'batchForm_filler_metal_aws_val'	=>	($this->input->post('batchForm_filler_metal_aws_val')!='') ? $this->input->post('batchForm_filler_metal_aws_val') : '',
				'batchForm_filler_metal_aws_range'	=>	($this->input->post('batchForm_filler_metal_aws_range')!='') ? $this->input->post('batchForm_filler_metal_aws_range') : '',
				'batchForm_filler_metal_fno_lbl'	=>	($this->input->post('batchForm_filler_metal_fno_lbl')!='') ? $this->input->post('batchForm_filler_metal_fno_lbl') : '',
				'batchForm_filler_metal_fno_val'	=>	($this->input->post('batchForm_filler_metal_fno_val')!='') ? $this->input->post('batchForm_filler_metal_fno_val') : '',
				'batchForm_filler_metal_fno_range'	=>	($this->input->post('batchForm_filler_metal_fno_range')!='') ? $this->input->post('batchForm_filler_metal_fno_range') : '',
				'batchForm_filler_metal_brand_lbl'	=>	($this->input->post('batchForm_filler_metal_brand_lbl')!='') ? $this->input->post('batchForm_filler_metal_brand_lbl') : '',
				'batchForm_filler_metal_brand_val'	=>	($this->input->post('batchForm_filler_metal_brand_val')!='') ? $this->input->post('batchForm_filler_metal_brand_val') : '',
				'batchForm_filler_metal_brand_range'	=>	($this->input->post('batchForm_filler_metal_brand_range')!='') ? $this->input->post('batchForm_filler_metal_brand_range') : '',
				'batchForm_deposit_weld_lbl'	=>	($this->input->post('batchForm_deposit_weld_lbl')!='') ? $this->input->post('batchForm_deposit_weld_lbl') : '',
				'batchForm_deposit_weld_val'	=>	($this->input->post('batchForm_deposit_weld_val')!='') ? $this->input->post('batchForm_deposit_weld_val') : '',
				'batchForm_deposit_weld_range'	=>	($this->input->post('batchForm_deposit_weld_range')!='') ? $this->input->post('batchForm_deposit_weld_range') : '',
				'batchForm_consumable_insert_lbl'	=>	($this->input->post('batchForm_consumable_insert_lbl')!='') ? $this->input->post('batchForm_consumable_insert_lbl') : '',
				'batchForm_consumable_insert_val'	=>	($this->input->post('batchForm_consumable_insert_val')!='') ? $this->input->post('batchForm_consumable_insert_val') : '',
				'batchForm_consumable_insert_range'	=>	($this->input->post('batchForm_consumable_insert_range')!='') ? $this->input->post('batchForm_consumable_insert_range') : '',
				'batchForm_filler_metal_product_lbl'	=>	($this->input->post('batchForm_filler_metal_product_lbl')!='') ? $this->input->post('batchForm_filler_metal_product_lbl') : '',
				'batchForm_filler_metal_product_val'	=>	($this->input->post('batchForm_filler_metal_product_val')!='') ? $this->input->post('batchForm_filler_metal_product_val') : '',
				'batchForm_filler_metal_product_range'	=>	($this->input->post('batchForm_filler_metal_product_range')!='') ? $this->input->post('batchForm_filler_metal_product_range') : '',
				'batchForm_welding_position_lbl'	=>	($this->input->post('batchForm_welding_position_lbl')!='') ? $this->input->post('batchForm_welding_position_lbl') : '',
				'batchForm_welding_position_val'	=>	$batchFormWeldingPositionVal,
				'batchForm_welding_position_range'	=>	($this->input->post('batchForm_welding_position_range')!='') ? $this->input->post('batchForm_welding_position_range') : '',
				'batchForm_vertical_progression_lbl'	=>	($this->input->post('batchForm_vertical_progression_lbl')!='') ? $this->input->post('batchForm_vertical_progression_lbl') : '',
				'batchForm_vertical_progression_val'	=>	$batchFormVerticalProgressionVal,
				'batchForm_vertical_progression_range'	=>	$batchFormVerticalProgressionRange,
				'batchForm_insert_gas_lbl'	=>	($this->input->post('batchForm_insert_gas_lbl')!='') ? $this->input->post('batchForm_insert_gas_lbl') : '',
				'batchForm_insert_gas_val'	=>	($this->input->post('batchForm_insert_gas_val')!='') ? $this->input->post('batchForm_insert_gas_val') : '',
				'batchForm_insert_gas_range'	=>	($this->input->post('batchForm_insert_gas_range')!='') ? $this->input->post('batchForm_insert_gas_range') : '',
				'batchForm_transfer_mode_lbl'	=>	($this->input->post('batchForm_transfer_mode_lbl')!='') ? $this->input->post('batchForm_transfer_mode_lbl') : '',
				'batchForm_transfer_mode_val'	=>	($this->input->post('batchForm_transfer_mode_val')!='') ? $this->input->post('batchForm_transfer_mode_val') : '',
				'batchForm_transfer_mode_range'	=>	($this->input->post('batchForm_transfer_mode_range')!='') ? $this->input->post('batchForm_transfer_mode_range') : '',
				'batchForm_current_type_lbl'	=>	($this->input->post('batchForm_current_type_lbl')!='') ? $this->input->post('batchForm_current_type_lbl') : '',
				'batchForm_current_type_val'	=>	($this->input->post('batchForm_current_type_val')!='') ? $this->input->post('batchForm_current_type_val') : '',
				'batchForm_current_type_range'	=>	($this->input->post('batchForm_current_type_range')!='') ? $this->input->post('batchForm_current_type_range') : '',
				'batchWPQ_updateBy'				=>	$this->session->userdata('user_id'),
				'batchWPQ_updateOn'				=>	date('Y-m-d H:i:s') 
			);


			/*
			foreach ($staticFormId as $key => $value) {
				$value_array=array(
					'batchID'				=>	$this->input->post('batchID'),
					'batchWPQ_welding_variables'	=>	($this->input->post('staticForm_welding_variables')[$key]!='') ? $this->input->post('staticForm_welding_variables')[$key] : '',
					'batchWPQ_quali_test'	=>	($this->input->post('staticForm_quali_test')[$key]!='') ? $this->input->post('staticForm_quali_test')[$key] : '',
					'batchWPQ_quali_range'	=>	($this->input->post('staticForm_quali_range')[$key]!='') ? $this->input->post('staticForm_quali_range')[$key] : '',
					'batchWPQ_quali_type'	=>	($this->input->post('staticForm_type')[$key]!='') ? $this->input->post('staticForm_type')[$key] : '',
					'batchWPQ_quali_type_label'	=>	($this->input->post('staticForm_type_label')[$key]!='') ? $this->input->post('staticForm_type_label')[$key] : '',
					'batchWPQ_quali_type_label_value'	=>	($this->input->post('staticForm_type_label_value')[$key]!='') ? $this->input->post('staticForm_type_label_value')[$key] : '',
					'batchWPQ_updateBy'				=>	$this->session->userdata('user_id'),
					'batchWPQ_updateOn'				=>	date('Y-m-d H:i:s') 
				);
			*/
				
			if($alreadyExistRecord > 0)
			{
				$where_array=array(
					'batchID'			 =>	$this->input->post('batchID')
				);
				$resultupdate=$this->mcommon->common_edit('jr_batch_wpq_report',$value_array,$where_array);
			}
			else
			{  
				$value_array['batchWPQ_createBy'] = $this->session->userdata('user_id');
				$value_array['batchWPQ_createOn'] = date('Y-m-d H:i:s');

				$result=$this->mcommon->common_insert('jr_batch_wpq_report',$value_array);
			}
			//}
		}

		if(isset($_POST['submit1']))
		{			
			
			$alreadyExistRecordTest	=	$this->mcommon->specific_record_counts('jr_batch_wpq_test_result',array('batchID'=>$this->input->post('batchID')));

			$batchWPQTestType = $this->input->post('batchWPQ_test_type1');

			//$this->mcommon->common_delete('jr_batch_wpq_test_result',array('batchID'=>$this->input->post('batchID')));

			/*foreach ($batchWPQTestType as $key => $value) {
				$value_array=array(
					'batchID'				=>	$this->input->post('batchID'),
					'batchWPQ_test_type1'	=>	($this->input->post('batchWPQ_test_type1')[$key]!='') ? $this->input->post('batchWPQ_test_type1')[$key] : '',
					'batchWPQ_test_type1_result'	=>	($this->input->post('batchWPQ_test_type1_result')[$key]!='') ? $this->input->post('batchWPQ_test_type1_result')[$key] : '',
					'batchWPQ_test_type2'	=>	($this->input->post('batchWPQ_test_type2')[$key]!='') ? $this->input->post('batchWPQ_test_type2')[$key] : '',
					'batchWPQ_test_type2_result'	=>	($this->input->post('batchWPQ_test_type2_result')[$key]!='') ? $this->input->post('batchWPQ_test_type2_result')[$key] : '',
					'batchWPQ_test_updateBy'				=>	$this->session->userdata('user_id'),
					'batchWPQ_test_updateOn'				=>	date('Y-m-d H:i:s') 
				);
				*/

				$value_arraytest=array(
					'batchID'				=>	$this->input->post('batchID'),
					'batchForm_visual_inspection_result_lbl'	=>	($this->input->post('batchForm_visual_inspection_result_lbl')!='') ? $this->input->post('batchForm_visual_inspection_result_lbl') : '',
					'batchForm_visual_inspection_result_val'	=>	($this->input->post('batchForm_visual_inspection_result_val')!='') ? $this->input->post('batchForm_visual_inspection_result_val') : '',
					'batchForm_visual_inspection_result_report'	=>	($this->input->post('batchForm_visual_inspection_result_report')!='') ? $this->input->post('batchForm_visual_inspection_result_report') : '',
					'batchForm_radoigraphy_result_lbl'	=>	($this->input->post('batchForm_radoigraphy_result_lbl')!='') ? $this->input->post('batchForm_radoigraphy_result_lbl') : '',
					'batchForm_radoigraphy_result_val'	=>	($this->input->post('batchForm_radoigraphy_result_val')!='') ? $this->input->post('batchForm_radoigraphy_result_val') : '',
					'batchForm_radoigraphy_result_report'	=>	($this->input->post('batchForm_radoigraphy_result_report')!='') ? $this->input->post('batchForm_radoigraphy_result_report') : '',
					'batchForm_bend_result_lbl'	=>	($this->input->post('batchForm_bend_result_lbl')!='') ? $this->input->post('batchForm_bend_result_lbl') : '',
					'batchForm_bend_result_val'	=>	($this->input->post('batchForm_bend_result_val')!='') ? $this->input->post('batchForm_bend_result_val') : '',
					'batchForm_bend_result_report'	=>	($this->input->post('batchForm_bend_result_report')!='') ? $this->input->post('batchForm_bend_result_report') : '',
					'batchForm_fillet_fracture_result_lbl'	=>	($this->input->post('batchForm_fillet_fracture_result_lbl')!='') ? $this->input->post('batchForm_fillet_fracture_result_lbl') : '',
					'batchForm_fillet_fracture_result_val'	=>	($this->input->post('batchForm_fillet_fracture_result_val')!='') ? $this->input->post('batchForm_fillet_fracture_result_val') : '',
					'batchForm_fillet_fracture_result_report'	=>	($this->input->post('batchForm_fillet_fracture_result_report')!='') ? $this->input->post('batchForm_fillet_fracture_result_report') : '',
					'batchForm_macro_examination_result_lbl'	=>	($this->input->post('batchForm_macro_examination_result_lbl')!='') ? $this->input->post('batchForm_macro_examination_result_lbl') : '',
					'batchForm_macro_examination_result_val'	=>	($this->input->post('batchForm_macro_examination_result_val')!='') ? $this->input->post('batchForm_macro_examination_result_val') : '',
					'batchForm_macro_examination_result_report'	=>	($this->input->post('batchForm_macro_examination_result_report')!='') ? $this->input->post('batchForm_macro_examination_result_report') : '',
					'batchForm_other_test_result_lbl'	=>	($this->input->post('batchForm_other_test_result_lbl')!='') ? $this->input->post('batchForm_other_test_result_lbl') : '',
					'batchForm_other_test_result_val'	=>	($this->input->post('batchForm_other_test_result_val')!='') ? $this->input->post('batchForm_other_test_result_val') : '',
					'batchForm_other_test_result_report'	=>	($this->input->post('batchForm_other_test_result_report')!='') ? $this->input->post('batchForm_other_test_result_report') : '',					
					'batchWPQ_test_updateBy'				=>	$this->session->userdata('user_id'),
					'batchWPQ_test_updateOn'				=>	date('Y-m-d H:i:s') 
				);

				
				if($alreadyExistRecord > 0)
				{

					$where_array=array(
						'batchID'			 =>	$this->input->post('batchID')
					);
					$resultupdate=$this->mcommon->common_edit('jr_batch_wpq_test_result',$value_arraytest,$where_array);
				}
				else
				{  
					$value_array['batchWPQ_test_createBy'] = $this->session->userdata('user_id');
					$value_array['batchWPQ_test_createOn'] = date('Y-m-d H:i:s');

					$result=$this->mcommon->common_insert('jr_batch_wpq_test_result',$value_arraytest);
				}
			//}
		}

		if(isset($_POST['submit2']))
		{			
			
			$alreadyExistRecord	=	$this->mcommon->specific_record_counts('jr_batch_wpq_additional',array('batchID'=>$this->input->post('batchID')));

			$value_array=array(
				'batchID'				=>	$this->input->post('batchID'),
				'batchWPQ_additional_notes'	=>	($this->input->post('batchWPQ_additional_notes')!='') ? $this->input->post('batchWPQ_additional_notes') : '',
				'batchWPQ_additional_conducted_by'	=>	($this->input->post('batchWPQ_additional_conducted_by')!='') ? $this->input->post('batchWPQ_additional_conducted_by') : '',
				'batchWPQ_additional_date'			=>	($this->input->post('batchWPQ_additional_date')!='') ? date('Y-m-d',strtotime($this->input->post('batchWPQ_additional_date'))) : '',
				'batchWPQ_additional_updateBy'				=>	$this->session->userdata('user_id'),
				'batchWPQ_additional_updateOn'				=>	date('Y-m-d H:i:s') 
			);

			
			if($alreadyExistRecord > 0)
			{
				$where_array=array(
					'batchID'			 =>	$this->input->post('batchID')
				);
				$resultupdate=$this->mcommon->common_edit('jr_batch_wpq_additional',$value_array,$where_array);
			}
			else
			{   
				$value_array['batchWPQ_additional_createBy'] = $this->session->userdata('user_id');
				$value_array['batchWPQ_additional_createOn'] = date('Y-m-d H:i:s');

				$result=$this->mcommon->common_insert('jr_batch_wpq_additional',$value_array);
			}
		
		}


		$data['id'] = $this->input->post('batchID');
		$batchID = $this->input->post('batchID');

		if($result)
		{
			$this->session->set_flashdata('res', lang('common_message_create'));
			$this->session->set_flashdata('res_type', 'success');
			//$this->WPQReport($data);
			redirect(base_url().'masters/Batch/WPQReportAdd/'.$batchID);
		}
		if($resultupdate)
		{
			$this->session->set_flashdata('res', lang('common_message_update'));
			$this->session->set_flashdata('res_type', 'success');
			//$this->WPQReport($data);
			redirect(base_url().'masters/Batch/WPQReportAdd/'.$batchID);
		}
		else
		{
			$data['id'] = $this->input->post('batchID');
			$this->WPQReportAdd($data);
		}
	}

	// create Form
	// Last Updated by Vinitha 09/08/2016 
	public function create()
	{		
        $user   = $this->ion_auth->user()->row();
		$this->mcommon->getCheckUserPermissionHead('Batch add and edit',true);
        if(isset($_POST['submit']))
		{			
			$this->form_validation->set_rules('batch_services', lang('mm_masters_batch_services'), 'required');
			$this->form_validation->set_rules('batch_ref_no', lang('mm_masters_batch_ref_no'), 'required');
			$this->form_validation->set_rules('batch_wps', lang('mm_masters_batch_wps'), 'required');
			$this->form_validation->set_rules('jobNo', lang('mm_masters_batch_wps'), 'required');
			
            if ($this->form_validation->run() == true)
			{
				$value_array=array(
					'jobNo'							=>	$this->input->post('jobNo'),
					'batch_services'				=>	$this->input->post('batch_services'),
					'batch_wps'						=>	$this->input->post('batch_wps'),
					'batch_client_specification'	=>	($this->input->post('batch_client_specification')!='') ? $this->input->post('batch_client_specification') : '',

					'batch_request_date'			=>	($this->input->post('batch_request_date')!='') ? date('Y-m-d',strtotime($this->input->post('batch_request_date'))) : '',
					'batch_project_clone'			=>	($this->input->post('batch_project_clone')!='') ? $this->input->post('batch_project_clone') : '',
					'batch_report_template'			=>	($this->input->post('batch_report_template')!='') ? $this->input->post('batch_report_template') : '',
					'batch_ref_no'  				=>	$this->input->post('batch_ref_no'),
					'batch_acceptance_criteria'		=>	($this->input->post('batch_acceptance_criteria')!='') ? $this->input->post('batch_acceptance_criteria') : '',
					'batch_location'				=>	($this->input->post('batch_location')!='') ? $this->input->post('batch_location') : '',
					'batch_pqr_no'					=>	($this->input->post('batch_pqr_no')!='') ? $this->input->post('batch_pqr_no') : '',
					'batch_name'					=>	($this->input->post('batch_name')!='') ? $this->input->post('batch_name') : '',
					'batch_updateBy'				=>	$this->session->userdata('user_id'),
					'batch_updateOn'				=>	date('Y-m-d H:i:s') 
				);


				if($this->input->post('batch_id')!='')
				{
					$where_array=array(
						'batch_id'			 =>	$this->input->post('batch_id')
					);
					$resultupdate=$this->mcommon->common_edit('jr_batc',$value_array,$where_array);
				}
				else
				{   
					$value_array['batch_createBy'] = $this->session->userdata('user_id');
					$value_array['batch_createOn'] = date('Y-m-d H:i:s');
   
					$result=$this->mcommon->common_insert('jr_batch',$value_array);

					if($result){
						$this->mcommon->common_edit_generatenumbers('all_no_generater',array('field'	=>'batch_ref_no'));
					}
				}
			}		
		}

		if($result)
		{
			$this->session->set_flashdata('res', lang('common_message_create'));
			$this->session->set_flashdata('res_type', 'success');
			redirect(base_url().'masters/Batch');
		}
		if($resultupdate)
		{
			$this->session->set_flashdata('res', lang('common_message_update'));
			$this->session->set_flashdata('res_type', 'success');
			redirect(base_url().'masters/Batch');
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
		$this->mcommon->getCheckUserPermissionHead('Batch add and edit',true);
		$where_array=array(
			'batch_id'=>$id
		);
		$data['value']=$this->mcommon->get_fulldata('jr_batch',$where_array);
		
		$this->addUpdateForm($data);
	}

	// Delete 
	// Last Updated by Vinitha 09/08/2016
	public function delete($id)
	{   
		$this->mcommon->getCheckUserPermissionHead('Batch delete',true);
		$where_array=array(
			'batch_id'     =>$id
		);
		
       $delete=$this->mcommon->common_delete('jr_batch',$where_array);
		if($delete)
		{
			$this->session->set_flashdata('res', lang('common_message_delete'));
			$this->session->set_flashdata('res_type', 'danger');
			redirect(base_url().'masters/Batch');
		}
		else
		{
			$this->index($data);
		}
	}


	// Ajax ADD - VI Model Window 
    public function getupdateWelderDetailsModal()
    {    	
    	$fields_arrayWelderDetailsCode = array(
    		's.welderDetailsCode_id as Key','s.welderDetailsCode_name as Value'
    	);
		$whereArrWelderDetailsCode        = "s.welderDetailsCode_show_status='1'";

    	$view_data['drop_down_welderDetailsCode']		=	$this->mcommon->Dropdown('jr_welderdetailscode as s',$fields_arrayWelderDetailsCode,'',$whereArrWelderDetailsCode,'','`s.welderDetailsCode_id` ASC ','');

    	$fields_arrayWeldprocess1 = array(
    		'weldProcess_id as Key','weldProcess_name as Value'
    	);
		$whereArrWeldprocess1        = "weldProcess_show_status ='1'";

    	$view_data['drop_down_Weldprocess1']			=	$this->mcommon->Dropdown('jr_weldprocess',$fields_arrayWeldprocess1,'',$whereArrWeldprocess1,'','`weldProcess_id` ASC ','');


    	$fields_arrayWeldprocess2 = array(
    		'weldProcess_id as Key','weldProcess_name as Value'
    	);
		$whereArrWeldprocess2        = "weldProcess_show_status ='1'";

    	$view_data['drop_down_Weldprocess2']			=	$this->mcommon->Dropdown('jr_weldprocess',$fields_arrayWeldprocess2,'',$whereArrWeldprocess2,'','`weldProcess_id` ASC ','');


    	$fields_arrayWeldposition = array(
    		'weldPosition_id as Key','weldPosition_name as Value'
    	);
		$whereArrWeldposition        = "weldPosition_show_status ='1'";

    	$view_data['drop_down_Weldposition']			=	$this->mcommon->Dropdown('jr_weldposition',$fields_arrayWeldposition,'',$whereArrWeldposition,'','`weldPosition_id` ASC ','');


    	$fields_arrayWeldprogression = array(
    		'weldVerticalProgression_id as Key','weldVerticalProgression_name as Value'
    	);
		$whereArrWeldprogression        = "weldVerticalProgression_show_status ='1'";

    	$view_data['drop_down_Weldprogression']			=	$this->mcommon->Dropdown('jr_weldverticalprogression',$fields_arrayWeldprogression,'',$whereArrWeldprogression,'','`weldVerticalProgression_id` ASC ','');


    	$fields_arrayWeldgroovetype = array(
    		'weldGrooveType_id as Key','weldGrooveType_name as Value'
    	);
		$whereArrWeldgroovetype        = "weldGrooveType_show_status ='1'";

    	$view_data['drop_down_WeldGrooveType']			=	$this->mcommon->Dropdown('jr_weldgroovetype',$fields_arrayWeldgroovetype,'',$whereArrWeldgroovetype,'','`weldGrooveType_id` ASC ','');

    	$fields_arrayWeldpenetration = array(
    		'weldPenetration_id as Key','weldPenetration_name as Value'
    	);
		$whereArrWeldpenetration        = "weldPenetration_show_status ='1'";

    	$view_data['drop_down_Weldpenetration']			=	$this->mcommon->Dropdown('jr_weldpenetration',$fields_arrayWeldpenetration,'',$whereArrWeldpenetration,'','`weldPenetration_id` ASC ','');


    	$fields_arrayWeldpolarity = array(
    		'weldPolarity_id as Key','weldPolarity_name as Value'
    	);
		$whereArrWeldpolarity        = "weldPolarity_show_status ='1'";

    	$view_data['drop_down_Weldpolarity']			=	$this->mcommon->Dropdown('jr_weldpolarity',$fields_arrayWeldpolarity,'',$whereArrWeldpolarity,'','`weldPolarity_id` ASC ','');

    	$fields_arrayWitnessedBy = array(
    		'u.id as Key','s.staffs_employee_name as Value'
    	);
		$joinArrWitnessedBy      = array(
			'users as u'    => " s.user_id = u.id AND u.active='1' ",
        );
		$whereArrWitnessedBy        = "u.active='1'";

    	$view_data['drop_down_WitnessedBy']				=	$this->mcommon->Dropdown('jr_staffs as s',$fields_arrayWitnessedBy,$joinArrWitnessedBy,$whereArrWitnessedBy,'','`u.id` ASC ','');

    	$view_data['drop_down_Backing']					=	$this->mcommon->drop_down_status(); 		
    	$view_data['drop_down_ConsumableInsert']		=	$this->mcommon->drop_down_status(); 		



            parse_str($_POST['postdata'], $_POST);//This will convert the string to array
            if(isset($_POST['submit']))
            {
            	/*$this->form_validation->set_rules('check_number', 'Number', 'required');

                if ($this->form_validation->run() == TRUE)
                {*/



            	$value_array=array(
					'batchID'							=>	($this->input->post('batchID')!='') ? $this->input->post('batchID') : '',
					'welderDetails_code'	=>	($this->input->post('welderDetails_code')!='') ? $this->input->post('welderDetails_code') : '',
					'welderDetails_welding_process1'						=>	($this->input->post('welderDetails_welding_process1')!='') ? $this->input->post('welderDetails_welding_process1') : '',

					'welderDetails_welding_process2'					=>	($this->input->post('welderDetails_welding_process2')!='') ? $this->input->post('welderDetails_welding_process2') : '',
					'welderDetails_position'					=>	($this->input->post('welderDetails_position')!='') ? $this->input->post('welderDetails_position') : '',


					'welderDetails_vertical_progression'					=>	($this->input->post('welderDetails_vertical_progression')!='') ? $this->input->post('welderDetails_vertical_progression') : '',
					'welderDetails_backing'						=>	($this->input->post('welderDetails_backing')!='') ? $this->input->post('welderDetails_backing') : '',
					'welderDetails_base_metal_spec'						=>	($this->input->post('welderDetails_base_metal_spec')!='') ? $this->input->post('welderDetails_base_metal_spec') : '',
					'welderDetails_pNumber'						=>	($this->input->post('welderDetails_pNumber')!='') ? $this->input->post('welderDetails_pNumber') : '',
					'welderDetails_pipe_thickness'						=>	($this->input->post('welderDetails_pipe_thickness')!='') ? $this->input->post('welderDetails_pipe_thickness') : '',
					'welderDetails_pipe_diaMeter'						=>	($this->input->post('welderDetails_pipe_diaMeter')!='') ? $this->input->post('welderDetails_pipe_diaMeter') : '',
					'welderDetails_plate_thickness'						=>	($this->input->post('welderDetails_plate_thickness')!='') ? $this->input->post('welderDetails_plate_thickness') : '',
					'welderDetails_joint_type'						=>	($this->input->post('welderDetails_joint_type')!='') ? $this->input->post('welderDetails_joint_type') : '',

					'welderDetails_groove_type'						=>	($this->input->post('welderDetails_groove_type')!='') ? $this->input->post('welderDetails_groove_type') : '',
					'welderDetails_weld_type'						=>	($this->input->post('welderDetails_weld_type')!='') ? $this->input->post('welderDetails_weld_type') : '',
					'welderDetails_filler_metal_spec'						=>	($this->input->post('welderDetails_filler_metal_spec')!='') ? $this->input->post('welderDetails_filler_metal_spec') : '',

					'welderDetails_fNo'						=>	($this->input->post('welderDetails_fNo')!='') ? $this->input->post('welderDetails_fNo') : '',
					'welderDetails_filler_metalDia'						=>	($this->input->post('welderDetails_filler_metalDia')!='') ? $this->input->post('welderDetails_filler_metalDia') : '',
					'welderDetails_consumable_insert'						=>	($this->input->post('welderDetails_consumable_insert')!='') ? $this->input->post('welderDetails_consumable_insert') : '',
					'welderDetails_penetration'						=>	($this->input->post('welderDetails_penetration')!='') ? $this->input->post('welderDetails_penetration') : '',
					'welderDetails_currrent_polarity'						=>	($this->input->post('welderDetails_currrent_polarity')!='') ? $this->input->post('welderDetails_currrent_polarity') : '',


					'welderDetails_shielding_gas1'						=>	($this->input->post('welderDetails_shielding_gas1')!='') ? $this->input->post('welderDetails_shielding_gas1') : '',
					'welderDetails_shielding_gas2'						=>	($this->input->post('welderDetails_shielding_gas2')!='') ? $this->input->post('welderDetails_shielding_gas2') : '',
					'welderDetails_shielding_gas_flow_rate'						=>	($this->input->post('welderDetails_shielding_gas_flow_rate')!='') ? $this->input->post('welderDetails_shielding_gas_flow_rate') : '',

					'welderDetails_root_shielding_gas'						=>	($this->input->post('welderDetails_root_shielding_gas')!='') ? $this->input->post('welderDetails_root_shielding_gas') : '',
					'welderDetails_tungsten_size'						=>	($this->input->post('welderDetails_tungsten_size')!='') ? $this->input->post('welderDetails_tungsten_size') : '',
					'welderDetails_WQT_witnessedBy'						=>	($this->input->post('welderDetails_WQT_witnessedBy')!='') ? $this->input->post('welderDetails_WQT_witnessedBy') : '',
					'welderDetails_amperage'						=>	($this->input->post('welderDetails_amperage')!='') ? $this->input->post('welderDetails_amperage') : '',
					'welderDetails_voltage'						=>	($this->input->post('welderDetails_voltage')!='') ? $this->input->post('welderDetails_voltage') : '',
					'welderDetails_electrode_class'						=>	($this->input->post('welderDetails_electrode_class')!='') ? $this->input->post('welderDetails_electrode_class') : '',
					'welderDetails_authorisedBy'						=>	($this->input->post('welderDetails_authorisedBy')!='') ? $this->input->post('welderDetails_authorisedBy') : '',


					'welderDetails_updateBy'						=>	$this->session->userdata('user_id'),
					'welderDetails_updateOn'						=>	date('Y-m-d H:i:s')
				);


            	$alreadyExistRecord	=	$this->mcommon->specific_record_counts('jr_welderdetails',array('batchID'=>$this->input->post('batchID'))); 

                if($this->input->post('batch_welderDetails_id')!='')
				{
					$where_array=array(
						'batch_welderDetails_id'			 =>	$this->input->post('batch_welderDetails_id')
					);
					$resultupdate=$this->mcommon->common_edit('jr_welderdetails',$value_array,$where_array);
				}
				else
				{
					if($alreadyExistRecord == 0){
						$value_array['welderDetails_createBy'] = $this->session->userdata('user_id');
						$value_array['welderDetails_createOn'] = date('Y-m-d H:i:s');
					            
						$result=$this->mcommon->common_insert('jr_welderdetails',$value_array);
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
            	if(isset($_GET['batchID'])){
            		$where_array=array(
						'batchID'=>$_GET['batchID']
					);
					$view_data['value']=$this->mcommon->get_fulldata('jr_welderdetails',$where_array);

            		$view_data['batchID'] = $_GET['batchID'];
            	}else{
            		$view_data['batchID'] = $this->input->post('batchID');
            	}
               echo $this->load->view('masters/Batch/updateWelderDetailsModal', $view_data,TRUE);
            }
    }

    // Ajax ADD - VI Model Window 
    public function getupdateWelderPassModal()
    {  
         parse_str($_POST['postdata'], $_POST);//This will convert the string to array
            if(isset($_POST['submit']))
            {
            	/*$this->form_validation->set_rules('check_number', 'Number', 'required');

                if ($this->form_validation->run() == TRUE)
                {*/



            	$value_array=array(
					'batchID'							=>	($this->input->post('batchID')!='') ? $this->input->post('batchID') : '',
					'welderPass_attProcess_name'	=>	($this->input->post('welderPass_attProcess_name')!='') ? $this->input->post('welderPass_attProcess_name') : '',
					'welderPass_attProcess_value'	=>	($this->input->post('welderPass_attProcess_value')!='') ? $this->input->post('welderPass_attProcess_value') : '',

					'welderPass_attProcessType_name'	=>	($this->input->post('welderPass_attProcessType_name')!='') ? $this->input->post('welderPass_attProcessType_name') : '',
					'welderPass_attProcessType_value'	=>	($this->input->post('welderPass_attProcessType_value')!='') ? $this->input->post('welderPass_attProcessType_value') : '',
					'welderPass_attPosition_name'	=>	($this->input->post('welderPass_attPosition_name')!='') ? $this->input->post('welderPass_attPosition_name') : '',
					'welderPass_attPosition_value'	=>	($this->input->post('welderPass_attPosition_value')!='') ? $this->input->post('welderPass_attPosition_value') : '',
					'welderPass_attPositionQul_name'	=>	($this->input->post('welderPass_attPositionQul_name')!='') ? $this->input->post('welderPass_attPositionQul_name') : '',
					'welderPass_attPositionQul_value'	=>	($this->input->post('welderPass_attPositionQul_value')!='') ? $this->input->post('welderPass_attPositionQul_value') : '',
					'welderPass_attJointType_name'	=>	($this->input->post('welderPass_attJointType_name')!='') ? $this->input->post('welderPass_attJointType_name') : '',
					'welderPass_attJointType_value'	=>	($this->input->post('welderPass_attJointType_value')!='') ? $this->input->post('welderPass_attJointType_value') : '',
					'welderPass_attTestThickness_name'	=>	($this->input->post('welderPass_attTestThickness_name')!='') ? $this->input->post('welderPass_attTestThickness_name') : '',
					'welderPass_attTestThickness_value'	=>	($this->input->post('welderPass_attTestThickness_value')!='') ? $this->input->post('welderPass_attTestThickness_value') : '',
					'welderPass_attTestDia_name'	=>	($this->input->post('welderPass_attTestDia_name')!='') ? $this->input->post('welderPass_attTestDia_name') : '',
					'welderPass_attTestDia_value'	=>	($this->input->post('welderPass_attTestDia_value')!='') ? $this->input->post('welderPass_attTestDia_value') : '',
					'welderPass_attRangeQul_name'	=>	($this->input->post('welderPass_attRangeQul_name')!='') ? $this->input->post('welderPass_attRangeQul_name') : '',
					'welderPass_attRangeQul_value'	=>	($this->input->post('welderPass_attRangeQul_value')!='') ? $this->input->post('welderPass_attRangeQul_value') : '',
					'welderPass_attPGrpNo_name'	=>	($this->input->post('welderPass_attPGrpNo_name')!='') ? $this->input->post('welderPass_attPGrpNo_name') : '',
					'welderPass_attPGrpNo_value'	=>	($this->input->post('welderPass_attPGrpNo_value')!='') ? $this->input->post('welderPass_attPGrpNo_value') : '',
					'welderPass_attElectrodeClass_name'	=>	($this->input->post('welderPass_attElectrodeClass_name')!='') ? $this->input->post('welderPass_attElectrodeClass_name') : '',
					'welderPass_attElectrodeClass_value'	=>	($this->input->post('welderPass_attElectrodeClass_value')!='') ? $this->input->post('welderPass_attElectrodeClass_value') : '',
					'welderPass_attFNo_name'	=>	($this->input->post('welderPass_attFNo_name')!='') ? $this->input->post('welderPass_attFNo_name') : '',
					'welderPass_attFNo_value'	=>	($this->input->post('welderPass_attFNo_value')!='') ? $this->input->post('welderPass_attFNo_value') : '',
					'welderPass_attContractorRep_name'	=>	($this->input->post('welderPass_attContractorRep_name')!='') ? $this->input->post('welderPass_attContractorRep_name') : '',
					'welderPass_attBacking_name'	=>	($this->input->post('welderPass_attBacking_name')!='') ? $this->input->post('welderPass_attBacking_name') : '',
					'welderPass_attBacking_value'	=>	($this->input->post('welderPass_attBacking_value')!='') ? $this->input->post('welderPass_attBacking_value') : '',
					'welderPass_updateBy'						=>	$this->session->userdata('user_id'),
					'welderPass_updateOn'						=>	date('Y-m-d H:i:s')
				);


            	$alreadyExistRecord	=	$this->mcommon->specific_record_counts('jr_welderpass',array('batchID'=>$this->input->post('batchID'))); 

                if($this->input->post('batch_welderPass_id')!='')
				{
					$where_array=array(
						'batch_welderPass_id'			 =>	$this->input->post('batch_welderPass_id')
					);
					$resultupdate=$this->mcommon->common_edit('jr_welderpass',$value_array,$where_array);
				}
				else
				{
					if($alreadyExistRecord == 0){
						$value_array['welderPass_createBy'] = $this->session->userdata('user_id');
						$value_array['welderPass_createOn'] = date('Y-m-d H:i:s');
					            
						$result=$this->mcommon->common_insert('jr_welderpass',$value_array);
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
            	if(isset($_GET['batchID'])){
            		$where_array=array(
						'batchID'=>$_GET['batchID']
					);
					$view_data['value']=$this->mcommon->get_fulldata('jr_welderpass',$where_array);

            		$view_data['batchID'] = $_GET['batchID'];
            	}else{
            		$view_data['batchID'] = $this->input->post('batchID');
            	}
               echo $this->load->view('masters/Batch/updateWelderPassModal', $view_data,TRUE);
            }
    }

    // Ajax ADD - VI Model Window 
    public function getupdateBatchVIModal()
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
    	

            parse_str($_POST['postdata'], $_POST);//This will convert the string to array
            if(isset($_POST['submit']))
            {
            	/*$this->form_validation->set_rules('check_number', 'Number', 'required');

                if ($this->form_validation->run() == TRUE)
                {*/

            	$value_array=array(
					'batchID'								=>	($this->input->post('batchID')!='') ? $this->input->post('batchID') : '',
					'batchVI_certified_welding_inspector'	=>	($this->input->post('batchVI_certified_welding_inspector')!='') ? $this->input->post('batchVI_certified_welding_inspector') : '',
					'batchVI_weld_thickness'				=>	($this->input->post('batchVI_weld_thickness')!='') ? $this->input->post('batchVI_weld_thickness') : '',
					'batchVI_ndt_contractor'				=>	($this->input->post('batchVI_ndt_contractor')!='') ? $this->input->post('batchVI_ndt_contractor') : '',
					'batchVI_remarks'						=>	($this->input->post('batchVI_remarks')!='') ? $this->input->post('batchVI_remarks') : '',
					'batchVI_updateBy'						=>	$this->session->userdata('user_id'),
					'batchVI_updateOn'						=>	date('Y-m-d H:i:s')
				);


            	$alreadyExistRecord	=	$this->mcommon->specific_record_counts('jr_batch_vi',array('batchID'=>$this->input->post('batchID'))); 

                if($this->input->post('batchVI_id')!='')
				{
					$where_array=array(
						'batchVI_id'			 =>	$this->input->post('batchVI_id')
					);
					$resultupdate=$this->mcommon->common_edit('jr_batch_vi',$value_array,$where_array);
				}
				else
				{
					if($alreadyExistRecord == 0){
						$value_array['batchVI_createBy'] = $this->session->userdata('user_id');
						$value_array['batchVI_createOn'] = date('Y-m-d H:i:s');
					            
						$result=$this->mcommon->common_insert('jr_batch_vi',$value_array);
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
            	if(isset($_GET['batchID'])){
            		$where_array=array(
						'batchID'=>$_GET['batchID']
					);
					$view_data['value']=$this->mcommon->get_fulldata('jr_batch_vi',$where_array);

            		$view_data['batchID'] = $_GET['batchID'];
            	}else{
            		$view_data['batchID'] = $this->input->post('batchID');
            	}
               echo $this->load->view('masters/Batch/updateBatchVIModal', $view_data,TRUE);
            }
    }


    // Ajax ADD - Attachement Modal Window 
    public function getupdateVIAttachementModal($id = '')
    {    	
            //parse_str($_POST['postdata'], $_POST);//This will convert the string to array
            if(isset($_POST['submit']))
            {
            	/*$this->form_validation->set_rules('check_number', 'Number', 'required');

                if ($this->form_validation->run() == TRUE)
                {*/

                	//welderID,attachement_welder_id,old_attachement_file_name,attachement_file_name,attachement_type_name


            	$value_array=array(
					'batchID'				=>	($this->input->post('batchID')!='') ? $this->input->post('batchID') : '',
					'batchVI_attachement_type_name'	=>	($this->input->post('batchVI_attachement_type_name')!='') ? $this->input->post('batchVI_attachement_type_name') : '',
					'batchVI_attachement_updateBy'	=>	$this->session->userdata('user_id'),
					'batchVI_attachement_updateOn'	=>	date('Y-m-d H:i:s') 
				);

				
				if($_FILES['batchVI_attachement_file_name']['name']!='')
				{
					$config = array();
					$config['upload_path'] = '.././attachementVI/';
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

					if($this->upload->do_upload('batchVI_attachement_file_name'))
					{	
						$this->load->helper('inflector');
						$file_name = underscore($_FILES['batchVI_attachement_file_name']['name']);
						$config['file_name'] = $file_name;
						$image_data['message'] = $this->upload->data(); 

						$_POST[batchVI_attachement_file_name]="attachementVI/".$image_data['message']['file_name'];
						$_POST[batchVI_attachement_file_size]= $_FILES['batchVI_attachement_file_name']['size'];
						$_POST[batchVI_attachement_file_type]= $_FILES['batchVI_attachement_file_name']['type'];
					} 
					else
					{
						$data['batchVI_attachement_file_name'] = $this->upload->display_errors('<div class="alert alert-error">', '</div>');
						$this->form_validation->set_rules('batchVI_attachement_file_name', $this->upload->display_errors(), 'required');                
					}	
				}
			
            	//$alreadyExistRecord	=	$this->mcommon->specific_record_counts('jr_welder_attachement',array('welderID'=>$this->input->post('welderID'))); 

                if($this->input->post('batchVI_attachement_id')!='')
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
					if($_FILES['batchVI_attachement_file_name']['name']!=''){
						//if($alreadyExistRecord == '' && $alreadyExistRecord == 0 && $this->input->post('welderID')!=''){

							$value_array['batchVI_attachement_file_name'] = ($this->input->post('batchVI_attachement_file_name')!='') ? $this->input->post('batchVI_attachement_file_name') : '';
							$value_array['batchVI_attachement_file_size'] = ($this->input->post('batchVI_attachement_file_size')!='') ? $this->input->post('batchVI_attachement_file_size') : '';
							$value_array['batchVI_attachement_file_type'] = ($this->input->post('batchVI_attachement_file_type')!='') ? $this->input->post('batchVI_attachement_file_type') : '';
							$value_array['batchVI_attachement_createBy'] = $this->session->userdata('user_id');
							$value_array['batchVI_attachement_createOn'] = date('Y-m-d H:i:s');
						            
							$result=$this->mcommon->common_insert('jr_batchvi_attachement',$value_array);
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
					'batchVI_attachement_id'     =>$id
				);
				$deleteImagePath	=	$this->mcommon->specific_row_value('jr_batchvi_attachement',$wheredelete_array,'batchVI_attachement_file_name');
		        $delete=$this->mcommon->common_delete('jr_batchvi_attachement',$wheredelete_array);
		        if($delete){
		       		unlink(FCPATH .$deleteImagePath);
		        }
			}

            $view_data=array();
            //if(isset($_GET['welderID']) || isset($_POST['welderID'])){
				$fields_arrayPackage = array(
					'p.batchVI_attachement_id','p.batchVI_attachement_type_name','p.batchVI_attachement_file_name','p.batchVI_attachement_file_type','p.batchVI_attachement_file_size','u1.first_name as firstname','p.batchVI_attachement_updateOn'
				);
				$data['datatablevalue'] =   $this->mcommon->join_records_all($fields_arrayPackage, 'jr_batchvi_attachement as p', array('users AS u1' => 'u1.id = p.batchVI_attachement_updateBy'), array('p.batchVI_attachement_show_status' =>'1'), '', '`p.batchVI_attachement_id` ASC ','','array');
        	//}
				$view_data['datatablevalueForm'] = $this->load->view('masters/Batch/updateBatchVIAttachementModalDatatable',$data,TRUE);


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
            	if(isset($_GET['batchID'])){
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
            		$view_data['batchID'] = $_GET['batchID'];
            	}else{
            		$view_data['batchID'] = $this->input->post('batchID');
            	}


            	/*echo "<pre>";
            	print_r($view_data);
            	echo "</pre>";
*/
                echo $this->load->view('masters/Batch/updateBatchVIAttachementModal', $view_data,TRUE);
            }
    }

    // Ajax ADD - NDTodel Window 
    public function getupdateBatchNDTModal()
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
					'batchID'					=>	($this->input->post('batchID')!='') ? $this->input->post('batchID') : '',
					'batchNDT_ndt_type'			=>	($this->input->post('batchNDT_ndt_type')!='') ? $this->input->post('batchNDT_ndt_type') : '',
					'batchNDT_technician_name'	=>	($this->input->post('batchNDT_technician_name')!='') ? $this->input->post('batchNDT_technician_name') : '',
					'batchNDT_date'				=>	($this->input->post('batchNDT_date')!='') ? date('Y-m-d',strtotime($this->input->post('batchNDT_date'))) : '',
					'batchNDT_issued_date'		=>	($this->input->post('batchNDT_issued_date')!='') ? date('Y-m-d',strtotime($this->input->post('batchNDT_issued_date'))) : '',

					'batchNDT_remarks'			=>	($this->input->post('batchNDT_remarks')!='') ? $this->input->post('batchNDT_remarks') : '',
					'batchNDT_updateBy'			=>	$this->session->userdata('user_id'),
					'batchNDT_updateOn'			=>	date('Y-m-d H:i:s') 
				);


            	$alreadyExistRecord	=	$this->mcommon->specific_record_counts('jr_batch_ndt',array('batchID'=>$this->input->post('batchID'))); 

                if($this->input->post('batchNDT_id')!='')
				{
					$where_array=array(
						'batchNDT_id'		=>	$this->input->post('batchNDT_id')
					);
					$resultupdate=$this->mcommon->common_edit('jr_batch_ndt',$value_array,$where_array);
				}
				else
				{
					if($alreadyExistRecord == 0){
						$value_array['batchNDT_createBy'] = $this->session->userdata('user_id');
						$value_array['batchNDT_createOn'] = date('Y-m-d H:i:s');
					            
						$result=$this->mcommon->common_insert('jr_batch_ndt',$value_array);
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
            	if(isset($_GET['batchID'])){
            		$where_array=array(
						'batchID'=>$_GET['batchID']
					);
					$view_data['value']=$this->mcommon->get_fulldata('jr_batch_ndt',$where_array);

            		$view_data['batchID'] = $_GET['batchID'];
            	}else{
            		$view_data['batchID'] = $this->input->post('batchID');
            	}
               echo $this->load->view('masters/Batch/updateBatchNDTModal', $view_data,TRUE);
            }
    }


    // Ajax ADD - Attachement Modal Window 
    public function getupdateNDTAttachementModal($id = '')
    {    	
            //parse_str($_POST['postdata'], $_POST);//This will convert the string to array
            if(isset($_POST['submit']))
            {
            	/*$this->form_validation->set_rules('check_number', 'Number', 'required');

                if ($this->form_validation->run() == TRUE)
                {*/

                	//welderID,attachement_welder_id,old_attachement_file_name,attachement_file_name,attachement_type_name


            	$value_array=array(
					'batchID'				=>	($this->input->post('batchID')!='') ? $this->input->post('batchID') : '',
					'batchNDT_attachement_type_name'	=>	($this->input->post('batchNDT_attachement_type_name')!='') ? $this->input->post('batchNDT_attachement_type_name') : '',
					'batchNDT_attachement_updateBy'	=>	$this->session->userdata('user_id'),
					'batchNDT_attachement_updateOn'	=>	date('Y-m-d H:i:s') 
				);

				
				if($_FILES['batchNDT_attachement_file_name']['name']!='')
				{
					$config = array();
					$config['upload_path'] = '.././attachementNDT/';
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

					if($this->upload->do_upload('batchNDT_attachement_file_name'))
					{	
						$this->load->helper('inflector');
						$file_name = underscore($_FILES['batchNDT_attachement_file_name']['name']);
						$config['file_name'] = $file_name;
						$image_data['message'] = $this->upload->data(); 

						$_POST[batchNDT_attachement_file_name]="attachementNDT/".$image_data['message']['file_name'];
						$_POST[batchNDT_attachement_file_size]= $_FILES['batchNDT_attachement_file_name']['size'];
						$_POST[batchNDT_attachement_file_type]= $_FILES['batchNDT_attachement_file_name']['type'];
					} 
					else
					{
						$data['batchNDT_attachement_file_name'] = $this->upload->display_errors('<div class="alert alert-error">', '</div>');
						$this->form_validation->set_rules('batchNDT_attachement_file_name', $this->upload->display_errors(), 'required');                
					}	
				}
			
            	//$alreadyExistRecord	=	$this->mcommon->specific_record_counts('jr_welder_attachement',array('welderID'=>$this->input->post('welderID'))); 

                if($this->input->post('batchNDT_attachement_id')!='')
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
					if($_FILES['batchNDT_attachement_file_name']['name']!=''){
						//if($alreadyExistRecord == '' && $alreadyExistRecord == 0 && $this->input->post('welderID')!=''){

							$value_array['batchNDT_attachement_file_name'] = ($this->input->post('batchNDT_attachement_file_name')!='') ? $this->input->post('batchNDT_attachement_file_name') : '';
							$value_array['batchNDT_attachement_file_size'] = ($this->input->post('batchNDT_attachement_file_size')!='') ? $this->input->post('batchNDT_attachement_file_size') : '';
							$value_array['batchNDT_attachement_file_type'] = ($this->input->post('batchNDT_attachement_file_type')!='') ? $this->input->post('batchNDT_attachement_file_type') : '';
							$value_array['batchNDT_attachement_createBy'] = $this->session->userdata('user_id');
							$value_array['batchNDT_attachement_createOn'] = date('Y-m-d H:i:s');
						            
							$result=$this->mcommon->common_insert('jr_batchndt_attachement',$value_array);
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
					'batchNDT_attachement_id'     =>$id
				);
				$deleteImagePath	=	$this->mcommon->specific_row_value('jr_batchndt_attachement',$wheredelete_array,'batchNDT_attachement_file_name');
		        $delete=$this->mcommon->common_delete('jr_batchndt_attachement',$wheredelete_array);
		        if($delete){
		       		unlink(FCPATH .$deleteImagePath);
		        }
			}

            $view_data=array();
            //if(isset($_GET['welderID']) || isset($_POST['welderID'])){
				$fields_arrayPackage = array(
					'p.batchNDT_attachement_id','p.batchNDT_attachement_type_name','p.batchNDT_attachement_file_name','p.batchNDT_attachement_file_type','p.batchNDT_attachement_file_size','u1.first_name as firstname','p.batchNDT_attachement_updateOn'
				);
				$data['datatablevalue'] =   $this->mcommon->join_records_all($fields_arrayPackage, 'jr_batchndt_attachement as p', array('users AS u1' => 'u1.id = p.batchNDT_attachement_updateBy'), array('p.batchNDT_attachement_show_status' =>'1'), '', '`p.batchNDT_attachement_id` ASC ','','array');
        	//}
				$view_data['datatablevalueForm'] = $this->load->view('masters/Batch/updateBatchNDTAttachementModalDatatable',$data,TRUE);


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
            	if(isset($_GET['batchID'])){
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
            		$view_data['batchID'] = $_GET['batchID'];
            	}else{
            		$view_data['batchID'] = $this->input->post('batchID');
            	}


            	/*echo "<pre>";
            	print_r($view_data);
            	echo "</pre>";
*/
                echo $this->load->view('masters/Batch/updateBatchNDTAttachementModal', $view_data,TRUE);
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
					'batchID'				=>	($this->input->post('batchID')!='') ? $this->input->post('batchID') : '',
					'batch_attachement_type_name'	=>	($this->input->post('batch_attachement_type_name')!='') ? $this->input->post('batch_attachement_type_name') : '',
					'batch_attachement_updateBy'	=>	$this->session->userdata('user_id'),
					'batch_attachement_updateOn'	=>	date('Y-m-d H:i:s') 
				);

				
				if($_FILES['batch_attachement_file_name']['name']!='')
				{
					$config = array();
					$config['upload_path'] = '.././attachementBatch/';
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

					if($this->upload->do_upload('batch_attachement_file_name'))
					{	
						$this->load->helper('inflector');
						$file_name = underscore($_FILES['batch_attachement_file_name']['name']);
						$config['file_name'] = $file_name;
						$image_data['message'] = $this->upload->data(); 

						$_POST[batch_attachement_file_name]="attachementBatch/".$image_data['message']['file_name'];
						$_POST[batch_attachement_file_size]= $_FILES['batch_attachement_file_name']['size'];
						$_POST[batch_attachement_file_type]= $_FILES['batch_attachement_file_name']['type'];
					} 
					else
					{
						$data['batch_attachement_file_name'] = $this->upload->display_errors('<div class="alert alert-error">', '</div>');
						$this->form_validation->set_rules('batch_attachement_file_name', $this->upload->display_errors(), 'required');                
					}	
				}
			
            	//$alreadyExistRecord	=	$this->mcommon->specific_record_counts('jr_welder_attachement',array('welderID'=>$this->input->post('welderID'))); 

                if($this->input->post('attachement_batch_id')!='')
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
					if($_FILES['batch_attachement_file_name']['name']!=''){
						//if($alreadyExistRecord == '' && $alreadyExistRecord == 0 && $this->input->post('welderID')!=''){

							$value_array['batch_attachement_file_name'] = ($this->input->post('batch_attachement_file_name')!='') ? $this->input->post('batch_attachement_file_name') : '';
							$value_array['batch_attachement_file_size'] = ($this->input->post('batch_attachement_file_size')!='') ? $this->input->post('batch_attachement_file_size') : '';
							$value_array['batch_attachement_file_type'] = ($this->input->post('batch_attachement_file_type')!='') ? $this->input->post('batch_attachement_file_type') : '';
							$value_array['batch_attachement_createBy'] = $this->session->userdata('user_id');
							$value_array['batch_attachement_createOn'] = date('Y-m-d H:i:s');
						            
							$result=$this->mcommon->common_insert('jr_batch_attachement',$value_array);
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
					'attachement_batch_id'     =>$id
				);
				$deleteImagePath	=	$this->mcommon->specific_row_value('jr_batch_attachement',$wheredelete_array,'batch_attachement_file_name');
		        $delete=$this->mcommon->common_delete('jr_batch_attachement',$wheredelete_array);
		        if($delete){
		       		unlink(FCPATH .$deleteImagePath);
		        }
			}

            $view_data=array();
            //if(isset($_GET['welderID']) || isset($_POST['welderID'])){
				$fields_arrayPackage = array(
					'p.attachement_batch_id','p.batch_attachement_type_name','p.batch_attachement_file_name','p.batch_attachement_file_type','p.batch_attachement_file_size','u1.first_name as firstname','p.batch_attachement_updateOn'
				);
				$data['datatablevalue'] =   $this->mcommon->join_records_all($fields_arrayPackage, 'jr_batch_attachement as p', array('users AS u1' => 'u1.id = p.batch_attachement_updateBy'), array('p.batch_attachement_show_status' =>'1'), '', '`p.attachement_batch_id` ASC ','','array');
        	//}
				$view_data['datatablevalueForm'] = $this->load->view('masters/Batch/updateBatchAttachementModalDatatable',$data,TRUE);


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
            	if(isset($_GET['batchID'])){
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
            		$view_data['batchID'] = $_GET['batchID'];
            	}else{
            		$view_data['batchID'] = $this->input->post('batchID');
            	}


            	/*echo "<pre>";
            	print_r($view_data);
            	echo "</pre>";
*/
                echo $this->load->view('masters/Batch/updateBatchAttachementModal', $view_data,TRUE);
            }
    }

}



