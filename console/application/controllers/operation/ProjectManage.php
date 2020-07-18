<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ProjectManage extends CI_Controller
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
		$this->mcommon->getCheckUserPermissionHead('Project',true);
        $view_data['top_tittle']			=	lang('mm_masters_project_manage_toptitle');
        $view_data['top_tittle_pergram']	=	lang('mm_masters_project_manage_pergram');

        $view_data['add_button_url']		=	'operation/ProjectManage/addUpdateForm';
    	$view_data['datatable_url']			=	'operation/ProjectManage/datatable';
    	$view_data['pdf_url']				=	'operation/ProjectManage/downloadPDF';
    	$view_data['pdf_fileName']			=	lang('mm_masters_project_exportPDFFileName').date('d_m_Y');    	
    	$view_data['export_url']			=	'operation/ProjectManage/exportExcel';
    	$view_data['export_fileName']		=	lang('mm_masters_project_exportPDFFileName').date('d_m_Y');
    	
    	$view_data['datatable_url']			=	'operation/ProjectManage/datatable';
    	$view_data['list_tittle']			=	lang('mm_masters_project_manage_list_title');
    	$view_data['list_tittle_small']		=	lang('mm_masters_project_manage_list_title_small');
    	
      
		$data = array(
                    'title'     	=> lang('mm_masters_project_manage_view'),
                    'content'   	=>$this->load->view('operation/project/projectDataList',$view_data,TRUE)                
                    );
        $this->load->view('base/template', $data); 
	}

	// datatable View
	// Last Updated by Vinitha 09/08/2016 
	function datatable1()
    {
    	$this->datatables->select('p.project_id, p.project_no, p.project_name, p.project_client_name, p.project_request_number, u.first_name, p.project_createOn,u1.first_name as firstname,p.project_updateOn')
        ->from('jr_project AS p')
        ->join('users AS u', 'u.id = p.project_createBy','left') 
        ->join('users AS u1', 'u1.id = p.project_updateBy','left') 
        ->where('p.project_show_status', 1)
		->edit_column('p.project_id', get_buttons_new('$1','operation/ProjectManage/'), 'p.project_id');
		//$this->datatables->edit_column('p.page_show_status', '$1', 'get_status(p.page_show_status)');
		$this->datatables->edit_column('p.project_createOn', '$1', 'get_date_timeformat(p.project_createOn)');
		$this->datatables->edit_column('p.project_updateOn', '$1', 'get_date_timeformat(p.project_updateOn)');
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
			'p.project_id','p.project_no','p.project_name','c.client_name','p.project_request_number','u.first_name','p.project_createOn','u1.first_name as firstname','p.project_updateOn'
		);
		$join_arrayPackage = array(
			'users AS u' => 'u.id = p.project_createBy',
			'users AS u1' => 'u1.id = p.project_updateBy',
			'jr_client AS c' => 'c.client_id = p.project_client_name',
		);
		$where_arrayPackage = array('p.project_show_status' =>'1');
		$orderPackage = $sidx.' '. $sord;

		$count =   $this->mcommon->join_records_counts($fields_arrayPackage, 'jr_project as p', $join_arrayPackage, $where_arrayPackage, '', $orderPackage);

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
		$dataTable_Details =   $this->mcommon->join_records_all($fields_arrayPackage, 'jr_project as p', $join_arrayPackage, $where_arrayPackage, '', $orderPackage,'object');

		if (isset($dataTable_Details) && !empty($dataTable_Details)) {
			$i=0;
	        foreach ($dataTable_Details->result() as $dataDetail) {
	        	$responce->rows[$i]['id'] = $dataDetail->project_id;
	        	//$responce->rows[$i]['cell']= array($dataDetail->ndtContractor_id);
	        	$responce->rows[$i]['cell']['edit_project_id'] = get_buttons_new_only_Edit($dataDetail->project_id,'operation/ProjectManage/');
	        	$responce->rows[$i]['cell']['delete_project_id'] = get_buttons_new_only_Delete($dataDetail->project_id,'operation/ProjectManage/');
	        	$responce->rows[$i]['cell']['project_no'] = $dataDetail->project_no;
	        	$responce->rows[$i]['cell']['project_name'] = $dataDetail->project_name;
	        	$responce->rows[$i]['cell']['project_client_name'] = $dataDetail->client_name;
	        	$responce->rows[$i]['cell']['project_request_number'] = $dataDetail->project_request_number;
	        	$responce->rows[$i]['cell']['first_name'] = $dataDetail->first_name;
	        	$responce->rows[$i]['cell']['project_createOn'] = get_date_timeformat($dataDetail->project_createOn);
	        	$responce->rows[$i]['cell']['firstname'] = $dataDetail->firstname;
	        	$responce->rows[$i]['cell']['project_updateOn'] = get_date_timeformat($dataDetail->project_updateOn);
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
		$this->mcommon->getCheckUserPermissionHead('Project add and edit',true);

        $view_data['top_tittle']			=	lang('mm_masters_project_manage_toptitle');
        $view_data['top_tittle_pergram']	=	lang('mm_masters_project_manage_pergram');

        $view_data['form_url']				=	'operation/ProjectManage/create';
        $view_data['form_cancel_url']		=	'operation/ProjectManage';

        $view_data['form_tittle']			=	lang('mm_masters_project_manage_form_title');
        $view_data['form_tittle_small']		=	lang('mm_masters_project_manage_form_title_small');
        $view_data['form_button_name']		=	lang('mm_masters_project_manage_form_button_name');

        $fields_arrayCerIns = array(
    		'client_id as Key','client_name as Value'
    	);
		$whereArrCerIns        = "client_show_status ='1'";

    	$view_data['drop_down_client']	=	$this->mcommon->Dropdown('jr_client',$fields_arrayCerIns,'',$whereArrCerIns,'','`client_id` ASC ','');

		$data = array(
                    'title'     	=> lang('mm_masters_project_manage_create'),
                    'content'   	=>$this->load->view('operation/project/projectmanagement',$view_data,TRUE)                
                    );
        $this->load->view('base/template', $data); 
	}

	// create Form
	// Last Updated by Vinitha 09/08/2016 
	public function create()
	{		
        $user   = $this->ion_auth->user()->row();
		$this->mcommon->getCheckUserPermissionHead('Project add and edit',true);
        if(isset($_POST['submit']))
		{			
			 $this->form_validation->set_rules('project_no', lang('mm_masters_project_no'), 'required');
			 $this->form_validation->set_rules('project_name', lang('mm_masters_project_name'), 'required');
			 $this->form_validation->set_rules('project_client_name', lang('mm_masters_project_client_name'), 'required');
			 if($this->input->post('project_representative_email')!=''){

			 	$this->form_validation->set_rules('project_representative_email', lang('mm_masters_project_representative_email'), 'required|valid_email');
			 }


            if ($this->form_validation->run() == true)
			{
				$value_array=array(
					'project_no'		    				=>	$this->input->post('project_no'),
					'project_name'							=>	$this->input->post('project_name'),
					'project_client_name'					=>	$this->input->post('project_client_name'),
					'project_request_number'				=>	($this->input->post('project_request_number')!='') ? $this->input->post('project_request_number') : '',
					'project_representative_name'			=>	($this->input->post('project_representative_name')!='') ? $this->input->post('project_representative_name') : '',
					'project_representative_contact_no'		=>	($this->input->post('project_representative_contact_no')!='') ? $this->input->post('project_representative_contact_no') : '',
					'project_representative_alternate_contact_no' =>	($this->input->post('project_representative_alternate_contact_no')!='') ? $this->input->post('project_representative_alternate_contact_no') : '',
					'project_representative_email'				=>	($this->input->post('project_representative_email')!='') ? $this->input->post('project_representative_email') : '',
					'project_updateBy'			=>	$this->session->userdata('user_id'),
					'project_updateOn'			=>	date('Y-m-d H:i:s')
				);
				if($this->input->post('project_id')!='')
				{
					$where_array=array(
						'project_id'				=>	$this->input->post('project_id')
					);
					$resultupdate=$this->mcommon->common_edit('jr_project',$value_array,$where_array);
				}
				else
				{
					$value_array['project_createBy'] =  $this->session->userdata('user_id');    
					$value_array['project_createOn'] =  date('Y-m-d H:i:s'); 
					$result=$this->mcommon->common_insert('jr_project',$value_array);
				}
			}		
		}

		if($result)
		{
			$this->session->set_flashdata('res', lang('common_message_create'));
			$this->session->set_flashdata('res_type', 'success');
			redirect(base_url().'operation/ProjectManage');
		}
		if($resultupdate)
		{
			$this->session->set_flashdata('res', lang('common_message_update'));
			$this->session->set_flashdata('res_type', 'success');
			redirect(base_url().'operation/ProjectManage');
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
		$this->mcommon->getCheckUserPermissionHead('Project add and edit',true);
		$where_array=array(
			'project_id'=>$id
		);
		$data['value']=$this->mcommon->get_fulldata('jr_project',$where_array);
		
		$this->addUpdateForm($data);
	}

	// Delete 
	// Last Updated by Vinitha 09/08/2016
	public function delete($id)
	{   
		$this->mcommon->getCheckUserPermissionHead('Project delete',true);
		$where_array=array(
			'project_id'     =>$id
		);
		
       $delete=$this->mcommon->common_delete('jr_project',$where_array);
		if($delete)
		{
			$this->session->set_flashdata('res', lang('common_message_delete'));
			$this->session->set_flashdata('res_type', 'danger');
			redirect(base_url().'operation/ProjectManage');
		}
		else
		{
			$this->index($data);
		}
	}
	

}



