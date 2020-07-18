<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Welder extends CI_Controller
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
		$this->mcommon->getCheckUserPermissionHead('Welder',true);

        $view_data['top_tittle']			=	lang('mm_masters_welder_manage_toptitle');
        $view_data['top_tittle_pergram']	=	lang('mm_masters_welder_manage_pergram');

        $view_data['add_button_url']		=	'masters/Welder/addUpdateForm';
    	$view_data['pdf_url']				=	'masters/Welder/downloadPDF';
    	$view_data['pdf_fileName']			=	lang('mm_masters_welder_manage_exportPDFFileName').date('d_m_Y');    	
    	$view_data['export_url']			=	'masters/Welder/exportExcel';
    	$view_data['export_fileName']		=	lang('mm_masters_welder_manage_exportPDFFileName').date('d_m_Y');
    	$view_data['datatable_url']			=	'masters/Welder/datatable';
    	

    	$view_data['datatable_url']			=	'masters/Welder/datatable';
    	$view_data['list_tittle']			=	lang('mm_masters_welder_manage_list_title');
    	$view_data['list_tittle_small']		=	lang('mm_masters_welder_manage_list_title_small');
    	
		$data = array(
                    'title'     	=> lang('mm_masters_welder_manage_view'),
                    'content'   	=>$this->load->view('masters/Welder/welderDataList',$view_data,TRUE)                
                    );
        $this->load->view('base/template', $data); 
	}

	public function WelderWpQRPass($idVal)
	{  
		include_once('application/libraries/phPHPJasperXML.php');

		$server	=	$this->db->hostname;
		$db 	=	$this->db->database;
		$user 	=	$this->db->username;
		$pass 	=	$this->db->password;

		$PHPJasperXML = new PHPJasperXML();
		//$PHPJasperXML->debugsql=true;
		//$PHPJasperXML->arrayParameter=array("batch_id"=>$idVal);
		//$PHPJasperXML->load_xml_file('application/views/masters/Welder/WPQPass.jrxml');
		$PHPJasperXML->load_xml_file('application/views/masters/Welder/WQTReport.jrxml');
		//WPQPass
		$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
		//$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file
		$PHPJasperXML->outpage("I", "WPQPass.pdf");
	}

	public function WelderWpQRReport($idVal)
	{  
		include_once('application/libraries/PHPJasperXML.php');

		$server	=	$this->db->hostname;
		$db 	=	$this->db->database;
		$user 	=	$this->db->username;
		$pass 	=	$this->db->password;

		$PHPJasperXML = new PHPJasperXML();
		//$PHPJasperXML->debugsql=true;
		$PHPJasperXML->arrayParameter=array("id"=>$idVal);
		$PHPJasperXML->load_xml_file('application/views/masters/Welder/WQTReport.jrxml');
		//WPQPass
		$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
		//$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file
		$PHPJasperXML->outpage("I", "WQTReport.pdf");
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
		->edit_column('p.welder_id', get_buttons_new('$1','masters/Welder/'), 'p.welder_id');
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
			'p.welder_id','p.welder_first_name','p.welder_last_name','p.welder_ref_no','p.welder_test_no','p.welder_no','p.welder_photo','p.welder_id as resultVi','p.welder_id as resultNDT','p.welder_id as resultAttachement','p.welder_id as resultPass','p.welder_id as resultWpQR','u.first_name','p.welder_createOn','u1.first_name as firstname','p.welder_updateOn'
		);
		$join_arrayPackage = array(
			'users AS u' => 'u.id = p.welder_createBy',
			'users AS u1' => 'u1.id = p.welder_updateBy',
		);
		if ($this->ion_auth->is_admin()) {
			$where_arrayPackage = array('p.welder_show_status' =>'1');
		} elseif (!$this->ion_auth->in_group('wqt')) {
			$where_arrayPackage = array('p.welder_show_status' =>'1', 'p.batchID' => $this->session->userdata('user_id'));
		} else {
			$where_arrayPackage = array('p.welder_show_status' =>'1', 'p.batchID' =>$this->session->userdata('current_batch_id'));

		}

		$orderPackage = $sidx.' '. $sord;

		$count =   $this->mcommon->join_records_counts($fields_arrayPackage, 'jr_welder as p', $join_arrayPackage, $where_arrayPackage, '', $orderPackage);

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
		$dataTable_Details =   $this->mcommon->join_records_all($fields_arrayPackage, 'jr_welder as p', $join_arrayPackage, $where_arrayPackage, '', $orderPackage,'object');

		if (isset($dataTable_Details) && !empty($dataTable_Details)) {
			$i=0;
	        foreach ($dataTable_Details->result() as $dataDetail) {
	        	$responce->rows[$i]['id'] = $dataDetail->welder_id;
	        	//$responce->rows[$i]['cell']= array($dataDetail->ndtContractor_id);
	        	$responce->rows[$i]['cell']['edit_welder_id'] = get_buttons_new_only_Edit($dataDetail->welder_id,'masters/Welder/');
	        	$responce->rows[$i]['cell']['delete_welder_id'] = get_buttons_new_only_Delete($dataDetail->welder_id,'masters/Welder/');
	        	$responce->rows[$i]['cell']['welder_first_name'] = $dataDetail->welder_first_name;
	        	$responce->rows[$i]['cell']['welder_last_name'] = $dataDetail->welder_last_name;
	        	$responce->rows[$i]['cell']['welder_ref_no'] = $dataDetail->welder_ref_no;
	        	$responce->rows[$i]['cell']['welder_test_no'] = $dataDetail->welder_test_no;
	        	$responce->rows[$i]['cell']['welder_no'] = $dataDetail->welder_no;
	        	$responce->rows[$i]['cell']['welder_photo'] = get_image_tag($dataDetail->welder_photo);
	        	$responce->rows[$i]['cell']['resultVi'] = get_resultVI($dataDetail->resultVi);
	        	$responce->rows[$i]['cell']['resultNDT'] = get_resultNDT($dataDetail->resultNDT);
	        	$responce->rows[$i]['cell']['resultAttachement'] = get_resultAttachement($dataDetail->resultAttachement);
	        	$responce->rows[$i]['cell']['resultPass'] = get_resultPass('masters/Welder/WelderWpQRReport/'.$dataDetail->resultPass);
	        	$responce->rows[$i]['cell']['resultWpQR'] = get_resultWpQR('masters/Welder/WelderWpQRPass/'.$dataDetail->resultWpQR);
	        	$responce->rows[$i]['cell']['first_name'] = $dataDetail->first_name;
	        	$responce->rows[$i]['cell']['welder_createOn'] = get_date_timeformat($dataDetail->welder_createOn);
	        	$responce->rows[$i]['cell']['firstname'] = $dataDetail->firstname;
	        	$responce->rows[$i]['cell']['welder_updateOn'] = get_date_timeformat($dataDetail->welder_updateOn);
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
		$this->mcommon->getCheckUserPermissionHead('Welder add and edit',true);
        $view_data['top_tittle']			=	lang('mm_masters_welder_manage_toptitle');
        $view_data['top_tittle_pergram']	=	lang('mm_masters_welder_manage_pergram');

        $view_data['form_url']				=	'masters/Welder/create';
        $view_data['form_cancel_url']		=	'masters/Welder';
        $view_data['form_tittle']			=	lang('mm_masters_welder_manage_form_title');
        $view_data['form_tittle_small']		=	lang('mm_masters_welder_manage_form_title_small');
        $view_data['form_button_name']		=	lang('mm_masters_welder_manage_form_button_name');

    	$nos=$this->constants->get_constant_no(); 
    	$view_data['welder_ref_no']				=	$nos['welder_ref_no'];

		$data = array(
                    'title'     	=> lang('mm_masters_welder_manage_create'),
                    'content'   	=>$this->load->view('masters/Welder/weldermanagement',$view_data,TRUE)                
                    );
        $this->load->view('base/template', $data); 
	}

	// create Form
	// Last Updated by Vinitha 09/08/2016 
	public function create()
	{		
        $user   = $this->ion_auth->user()->row();
		$this->mcommon->getCheckUserPermissionHead('Welder add and edit',true);
        if(isset($_POST['submit']))
		{			
			 $this->form_validation->set_rules('welder_first_name', lang('mm_masters_welder_first_name'), 'required');
			 $this->form_validation->set_rules('welder_last_name', lang('mm_masters_welder_last_name'), 'required');
			 $this->form_validation->set_rules('welder_ref_no', lang('mm_masters_welder_ref_no'), 'required');
			 $this->form_validation->set_rules('welder_test_no', lang('mm_masters_welder_test_no'), 'required');
			 $this->form_validation->set_rules('welder_no', lang('mm_masters_welder_no'), 'required');

			if($_FILES['welder_photo']['name']!='')
			{
				$config = array();
				$config['upload_path'] = '.././slider/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '5000';
				$config['max_width'] = '3500';
				$config['max_height'] = '3500';
				$config['max_filename'] = '500';
				$config['overwrite'] = false;
				$this->upload->initialize($config);
				$this->load->library('image_lib');
				$this->load->library('upload', $config);

				if($this->upload->do_upload('welder_photo'))
				{	
					$this->load->helper('inflector');
					$file_name = underscore($_FILES['welder_photo']['name']);
					$config['file_name'] = $file_name;
					$image_data['message'] = $this->upload->data(); 

					$_POST[welder_photo]="slider/".$image_data['message']['file_name'];
				} 
				else
				{
					 $data['welder_photo'] = $this->upload->display_errors('<div class="alert alert-error">', '</div>');
					 $this->form_validation->set_rules('welder_photo', $this->upload->display_errors(), 'required');                
				}	
			}

			if($_FILES['welder_photo']['name']!='')
			{
				unlink(FCPATH .$this->input->post('old_welderphoto')); 
				$value_array = array_merge($value_array, array('welder_photo'=>$this->input->post('welder_photo')));
			}

            if ($this->form_validation->run() == true)
			{
				$value_array=array(
					'batchID'			=>	$this->session->userdata('current_batch_id'),
					'welder_first_name'	=>	$this->input->post('welder_first_name'),
					'welder_middle_name'	=>	($this->input->post('welder_middle_name')!='') ? $this->input->post('welder_middle_name') : '',
					'welder_last_name'	=>	$this->input->post('welder_last_name'),
					'welder_ref_no'		=>	$this->input->post('welder_ref_no'),
					'welder_test_no'	=>	$this->input->post('welder_test_no'),
					'welder_no'			=>	$this->input->post('welder_no'),
					'welder_photo'		=>	$this->input->post('welder_photo'),
					'welder_iqama_no'	=>	($this->input->post('welder_iqama_no')!='') ? $this->input->post('welder_iqama_no') : '',
					'welder_updateBy'	=>	$this->session->userdata('user_id'),
					'welder_updateOn'	=>	date('Y-m-d H:i:s')
				);
				if($this->input->post('welder_id')!='')
				{
					if($_FILES['welder_photo']['name']!='')
					{
	 					unlink(FCPATH .$this->input->post('old_welderphoto')); 
						$value_array = array_merge($value_array, array('welder_photo'=>$this->input->post('welder_photo')));
					}

					$where_array=array(
						'welder_id'			 =>	$this->input->post('welder_id')
					);
					$resultupdate=$this->mcommon->common_edit('jr_welder',$value_array,$where_array);
				}
				else
				{
					$value_array['welder_createBy'] = $this->session->userdata('user_id');             
					$value_array['welder_createOn'] = date('Y-m-d H:i:s');            
					$result=$this->mcommon->common_insert('jr_welder',$value_array);

					if($result){
						$this->mcommon->common_edit_generatenumbers('all_no_generater',array('field'	=>'welder_ref_no'));

						$fields_arrayBatchVI = array(
							'p.batchVI_certified_welding_inspector','p.batchVI_weld_thickness','p.batchVI_ndt_contractor','p.batchVI_remarks'
						);
						$dataBatchVIValueDetails =   $this->mcommon->join_records_all($fields_arrayBatchVI, 'jr_batch_vi as p', '', array('p.batchVI_show_status' =>'1','p.batchID' => $this->session->userdata('current_batch_id')), '', '`p.batchVI_id` ASC ','1','array');

						foreach($dataBatchVIValueDetails as $row){ 
							$value_arrayVi=array(
								'welderID'			=>	$result,
								'vi_certified_welding_inspector'	=>	($row['batchVI_certified_welding_inspector']!='') ? $row['batchVI_certified_welding_inspector'] : '',
								'vi_weld_thickness'	=>	($row['batchVI_weld_thickness']!='') ? $row['batchVI_weld_thickness'] : '',
								'vi_ndt_contractor'	=>	($row['batchVI_ndt_contractor']!='') ? $row['batchVI_ndt_contractor'] : '',
								'vi_remarks'	=>	($row['batchVI_remarks']!='') ? $row['batchVI_remarks'] : '',
								'vi_createBy'	=>	$this->session->userdata('user_id'),
								'vi_createOn'	=>	date('Y-m-d H:i:s'),
								'vi_updateBy'	=>	$this->session->userdata('user_id'),
								'vi_updateOn'	=>	date('Y-m-d H:i:s')
							);
							$this->mcommon->common_insert('jr_welder_vi',$value_arrayVi);
						}

						$fields_arrayBatchNDT = array(
							'p.batchNDT_ndt_type','p.batchNDT_technician_name','p.batchNDT_date','p.batchNDT_issued_date','p.batchNDT_remarks'
						);
						$dataBatchNDTValueDetails =   $this->mcommon->join_records_all($fields_arrayBatchNDT, 'jr_batch_ndt as p', '', array('p.batchNDT_show_status' =>'1','p.batchID' => $this->session->userdata('current_batch_id')), '', '`p.batchNDT_id` ASC ','1','array');

						foreach($dataBatchNDTValueDetails as $row){ 
							$value_arrayNDT=array(
								'welderID'			=>	$result,
								'ndt_type'	=>	($row['batchNDT_ndt_type']!='') ? $row['batchNDT_ndt_type'] : '',
								'ndt_technician_name'	=>	($row['batchNDT_technician_name']!='') ? $row['batchNDT_technician_name'] : '',
								'ndt_date'	=>	($row['batchVI_ndt_contractor']!='') ? date('Y-m-d',strtotime($row['batchNDT_date'])) : '',
								'ndt_issued_date'	=>	($row['batchVI_remarks']!='') ? date('Y-m-d',strtotime($row['batchNDT_issued_date'])) : '',
								'ndt_remarks'	=>	($row['batchNDT_remarks']!='') ? $row['batchNDT_remarks'] : '',
								'ndt_createBy'	=>	$this->session->userdata('user_id'),
								'ndt_createOn'	=>	date('Y-m-d H:i:s'),
								'ndt_updateBy'	=>	$this->session->userdata('user_id'),
								'ndt_updateOn'	=>	date('Y-m-d H:i:s')
							);
							$this->mcommon->common_insert('jr_welder_ndt',$value_arrayNDT);
						}
					}
				}
			}		
		}

		if($result)
		{
			$this->session->set_flashdata('res', lang('common_message_create'));
			$this->session->set_flashdata('res_type', 'success');
			redirect(base_url().'masters/Welder');
		}
		if($resultupdate)
		{
			$this->session->set_flashdata('res', lang('common_message_update'));
			$this->session->set_flashdata('res_type', 'success');
			redirect(base_url().'masters/Welder');
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
		$this->mcommon->getCheckUserPermissionHead('Welder add and edit',true);
		$where_array=array(
			'welder_id'=>$id
		);
		$data['value']=$this->mcommon->get_fulldata('jr_welder',$where_array);
		
		$this->addUpdateForm($data);
	}

	// Delete 
	// Last Updated by Vinitha 09/08/2016
	public function delete($id)
	{   
		$this->mcommon->getCheckUserPermissionHead('Welder delete',true);
		$where_array=array(
			'welder_id'     =>$id
		);
		
       $delete=$this->mcommon->common_delete('jr_welder',$where_array);
		if($delete)
		{
			$this->session->set_flashdata('res', lang('common_message_delete'));
			$this->session->set_flashdata('res_type', 'danger');
			redirect(base_url().'masters/Welder');
		}
		else
		{
			$this->index($data);
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
               echo $this->load->view('masters/Welder/updateAttributeVIModal', $view_data,TRUE);
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
               echo $this->load->view('masters/Welder/updateAttributeNDTModal', $view_data,TRUE);
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
				$view_data['datatablevalueForm'] = $this->load->view('masters/Welder/updateAttachementModalDatatable',$data,TRUE);


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



