<?php defined('BASEPATH') OR exit('No direct script access allowed');

class JobNo extends CI_Controller
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
		//$this->load->model('M_dropdown',	'mdropdown',TRUE);

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
		$this->mcommon->getCheckUserPermissionHead('Job No',true);
        $view_data['top_tittle']			=	lang('mm_masters_jobno_manage_toptitle');
        $view_data['top_tittle_pergram']	=	lang('mm_masters_jobno_manage_pergram');

        $view_data['add_button_url']		=	'operation/JobNo/addUpdateForm';
    	$view_data['datatable_url']			=	'operation/JobNo/datatable';
    	$view_data['pdf_url']				=	'operation/JobNo/downloadPDF';
    	$view_data['pdf_fileName']			=	lang('mm_masters_jobno_exportPDFFileName').date('d_m_Y');    	
    	$view_data['export_url']			=	'operation/JobNo/exportExcel';
    	$view_data['export_fileName']		=	lang('mm_masters_jobno_exportPDFFileName').date('d_m_Y');
    	
    	$view_data['datatable_url']			=	'operation/JobNo/datatable';
    	$view_data['list_tittle']			=	lang('mm_masters_jobno_manage_list_title');
    	$view_data['list_tittle_small']		=	lang('mm_masters_jobno_manage_list_title_small');
    	
      
		$data = array(
                    'title'     	=> lang('mm_masters_jobno_manage_view'),
                    'content'   	=>$this->load->view('operation/jobno/jobnoDataList',$view_data,TRUE)                
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
		->edit_column('p.project_id', get_buttons_new('$1','operation/JobNo/'), 'p.project_id');
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
			'j.job_no_id','j.job_no','p.project_no','c.client_name','u.first_name','j.job_no_createOn','u1.first_name as firstname','j.job_no_updateOn'
		);
		$join_arrayPackage = array(
			'users AS u' => 'u.id = j.job_no_createBy',
			'users AS u1' => 'u1.id = j.job_no_updateBy',
			'jr_project AS p' => 'j.choose_project = p.project_id',
			'jr_client AS c' => 'p.project_client_name = c.client_id',
		);
		$where_arrayPackage = array('j.job_no_show_status' =>'1');
		$orderPackage = $sidx.' '. $sord;

		$count =   $this->mcommon->join_records_counts($fields_arrayPackage, 'jr_job_no as j', $join_arrayPackage, $where_arrayPackage, '', $orderPackage);

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
		$dataTable_Details =   $this->mcommon->join_records_all($fields_arrayPackage, 'jr_job_no as j', $join_arrayPackage, $where_arrayPackage, '', $orderPackage,'object');

		if (isset($dataTable_Details) && !empty($dataTable_Details)) {
			$i=0;
	        foreach ($dataTable_Details->result() as $dataDetail) {
	        	$responce->rows[$i]['id'] = $dataDetail->job_no_id;
	        	//$responce->rows[$i]['cell']= array($dataDetail->ndtContractor_id);
	        	$responce->rows[$i]['cell']['edit_job_no_id'] = get_buttons_new_only_Edit($dataDetail->job_no_id,'operation/JobNo/');
	        	$responce->rows[$i]['cell']['delete_job_no_id'] = get_buttons_new_only_Delete($dataDetail->job_no_id,'operation/JobNo/');
	        	$responce->rows[$i]['cell']['job_no'] = $dataDetail->job_no;
	        	$responce->rows[$i]['cell']['project_no'] = $dataDetail->project_no;
	        	$responce->rows[$i]['cell']['client_name'] = $dataDetail->client_name;
	        	$responce->rows[$i]['cell']['first_name'] = $dataDetail->first_name;
	        	$responce->rows[$i]['cell']['job_no_createOn'] = get_date_timeformat($dataDetail->job_no_createOn);
	        	$responce->rows[$i]['cell']['firstname'] = $dataDetail->firstname;
	        	$responce->rows[$i]['cell']['job_no_updateOn'] = get_date_timeformat($dataDetail->job_no_updateOn);
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
		$this->mcommon->getCheckUserPermissionHead('JobNo add and edit',true);
        $view_data['top_tittle']			=	lang('mm_masters_jobno_manage_toptitle');
        $view_data['top_tittle_pergram']	=	lang('mm_masters_jobno_manage_pergram');

        $view_data['form_url']				=	'operation/JobNo/create';
        $view_data['form_cancel_url']		=	'operation/JobNo';

        $view_data['form_tittle']			=	lang('mm_masters_jobno_manage_form_title');
        $view_data['form_tittle_small']		=	lang('mm_masters_jobno_manage_form_title_small');
        $view_data['form_button_name']		=	lang('mm_masters_jobno_manage_form_button_name');


        /*
        $fields_arrayCerIns = array(
    		'p.project_id as Key','CONCAT(p.project_no, " ( ", c.client_name, " )") as Value'
    	);
    	$join_arrayCerIns = array(
			'jr_client AS c' => 'p.project_client_name = c.client_id',
		);

		$whereArrCerIns        = "p.project_show_status ='1'";

    	$view_data['drop_down_project']	=	$this->mcommon->Dropdown('jr_project as p',$fields_arrayCerIns,$join_arrayCerIns,$whereArrCerIns,'','`p.project_id` ASC ','');
		*/
    	$view_data['drop_down_project']	=	$this->mdropdown->drop_menu_all_projects();

    	
		$data = array(
                    'title'     	=> lang('mm_masters_jobno_manage_create'),
                    'content'   	=>$this->load->view('operation/jobno/jobnomanagement',$view_data,TRUE)                
                    );
        $this->load->view('base/template', $data); 
	}

	// create Form
	// Last Updated by Vinitha 09/08/2016 
	public function create()
	{		
        $user   = $this->ion_auth->user()->row();
		$this->mcommon->getCheckUserPermissionHead('JobNo add and edit',true);
        if(isset($_POST['submit']))
		{			
			 $this->form_validation->set_rules('job_no', lang('mm_masters_job_no'), 'required');
			 $this->form_validation->set_rules('choose_project', lang('mm_masters_choose_project'), 'required');
			 


            if ($this->form_validation->run() == true)
			{
				$value_array=array(
					'job_no'		    		=>	$this->input->post('job_no'),
					'choose_project'			=>	$this->input->post('choose_project'),
					'job_no_updateBy'			=>	$this->session->userdata('user_id'),
					'job_no_updateOn'			=>	date('Y-m-d H:i:s')
				);
				if($this->input->post('job_no_id')!='')
				{
					$where_array=array(
						'job_no_id'				=>	$this->input->post('job_no_id')
					);
					$resultupdate=$this->mcommon->common_edit('jr_job_no',$value_array,$where_array);
				}
				else
				{
					$value_array['job_no_createBy'] =  $this->session->userdata('user_id');    
					$value_array['job_no_createOn'] =  date('Y-m-d H:i:s'); 
					$result=$this->mcommon->common_insert('jr_job_no',$value_array);
				}
			}		
		}

		if($result)
		{
			$this->session->set_flashdata('res', lang('common_message_create'));
			$this->session->set_flashdata('res_type', 'success');
			redirect(base_url().'operation/JobNo');
		}
		if($resultupdate)
		{
			$this->session->set_flashdata('res', lang('common_message_update'));
			$this->session->set_flashdata('res_type', 'success');
			redirect(base_url().'operation/JobNo');
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
		$this->mcommon->getCheckUserPermissionHead('JobNo add and edit',true);
		$where_array=array(
			'job_no_id'=>$id
		);
		$data['value']=$this->mcommon->get_fulldata('jr_job_no',$where_array);
		
		$this->addUpdateForm($data);
	}

	// Delete 
	// Last Updated by Vinitha 09/08/2016
	public function delete($id)
	{   
		$this->mcommon->getCheckUserPermissionHead('JobNo delete',true);
		$where_array=array(
			'job_no_id'     =>$id
		);
		
       $delete=$this->mcommon->common_delete('jr_job_no',$where_array);
		if($delete)
		{
			$this->session->set_flashdata('res', lang('common_message_delete'));
			$this->session->set_flashdata('res_type', 'danger');
			redirect(base_url().'operation/JobNo');
		}
		else
		{
			$this->index($data);
		}
	}
	

}



