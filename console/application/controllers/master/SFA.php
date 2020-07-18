<?php defined('BASEPATH') OR exit('No direct script access allowed');

class SFA extends CI_Controller
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

		$this->mcommon->getCheckUserPermissionHead('SFA',true);
        $view_data['top_tittle']			=	lang('mm_masters_sfa_manage_toptitle');
        $view_data['top_tittle_pergram']	=	lang('mm_masters_sfa_manage_pergram');

        $view_data['add_button_url']		=	'master/SFA/addUpdateForm';
    	$view_data['datatable_url']			=	'master/SFA/datatable';
    	$view_data['pdf_url']				=	'master/SFA/downloadPDF';
    	$view_data['pdf_fileName']			=	lang('mm_masters_sfa_exportPDFFileName').date('d_m_Y');    	
    	$view_data['export_url']			=	'master/SFA/exportExcel';
    	$view_data['export_fileName']		=	lang('mm_masters_sfa_exportPDFFileName').date('d_m_Y');
    	
    	$view_data['datatable_url']			=	'master/SFA/datatable';
    	$view_data['list_tittle']			=	lang('mm_masters_sfa_manage_list_title');
    	$view_data['list_tittle_small']		=	lang('mm_masters_sfa_manage_list_title_small');
    	
      
		$data = array(
                    'title'     	=> lang('mm_masters_sfa_manage_pergramable_code_manage_view'),
                    'content'   	=>$this->load->view('master/SFA/SFADataList',$view_data,TRUE)                
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
			'j.sfa_id','j.sfa_name','u.first_name','j.createOn as createOn','u1.first_name as firstname','j.updateOn as updateOn'
		);
		$join_arrayPackage = array(
			'users AS u' => 'u.id = j.createBy',
			'users AS u1' => 'u1.id = j.updateBy',
		);
		$where_arrayPackage = array('j.sfa_show_status' =>'1');
		$orderPackage = $sidx.' '. $sord;

		$count =   $this->mcommon->join_records_counts($fields_arrayPackage, 'jr_sfa as j', $join_arrayPackage, $where_arrayPackage, '', $orderPackage);

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
		$dataTable_Details =   $this->mcommon->join_records_all($fields_arrayPackage, 'jr_sfa as j', $join_arrayPackage, $where_arrayPackage, '', $orderPackage,'object');

		if (isset($dataTable_Details) && !empty($dataTable_Details)) {
			$i=0;
	        foreach ($dataTable_Details->result() as $dataDetail) {
	        	$responce->rows[$i]['id'] = $dataDetail->sfa_id;
	        	//$responce->rows[$i]['cell']= array($dataDetail->ndtContractor_id);
	        	$responce->rows[$i]['cell']['edit_sfa_id'] = get_buttons_new_only_Edit($dataDetail->sfa_id,'master/SFA/');
	        	$responce->rows[$i]['cell']['delete_sfa_id'] = get_buttons_new_only_Delete($dataDetail->sfa_id,'master/SFA/');
	        	$responce->rows[$i]['cell']['sfa_name'] = $dataDetail->sfa_name;
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
		$this->mcommon->getCheckUserPermissionHead('SFA add and edit',true);
        $view_data['top_tittle']			=	lang('mm_masters_sfa_manage_toptitle');
        $view_data['top_tittle_pergram']	=	lang('mm_masters_sfa_manage_pergram');

        $view_data['form_url']				=	'master/SFA/create';
        $view_data['form_cancel_url']		=	'master/SFA';

        $view_data['form_tittle']			=	lang('mm_masters_sfa_manage_form_title');
        $view_data['form_tittle_small']		=	lang('mm_masters_sfa_manage_form_title_small');
        $view_data['form_button_name']		=	lang('mm_masters_sfa_manage_form_button_name');
    	
		$data = array(
                    'title'     	=> lang('mm_masters_sfa_manage_create'),
                    'content'   	=>$this->load->view('master/SFA/SFAmanagement',$view_data,TRUE)                
                    );
        $this->load->view('base/template', $data); 
	}

	function maximumNameCheck($val){
		$this->form_validation->set_message('maximumNameCheck', $this->lang->line('form_validation_is_unique_name'));
		return FALSE;
	}

	// create Form
	// Last Updated by Vinitha 09/08/2016 
	public function create()
	{		
        $user   = $this->ion_auth->user()->row();
		$this->mcommon->getCheckUserPermissionHead('SFA add and edit',true);
        if(isset($_POST['submit']))
		{			
			 $this->form_validation->set_rules('sfa_name', lang('mm_masters_sfa_sfa_name'), 'required');
			 
			 $nameVal = $this->input->post('sfa_name');

			 $whereArrNameVal        = "sfa_name ='".$nameVal."'";

			 // Unique name validation
			 $resultCounteng = $this->mcommon->specific_record_counts('jr_sfa',$whereArrNameVal);
			 
			 if($resultCounteng > 0 && $this->input->post('sfa_id')==''){
				$this->form_validation->set_rules('sfa_name', $this->lang->line('form_validation_is_unique_name'), 'callback_maximumNameCheck'); 
			} 

            if ($this->form_validation->run() == true)
			{
				$value_array=array(
					'sfa_name'		    =>	$this->input->post('sfa_name'),
					'updateBy'			=>	$this->session->userdata('user_id'),
					'updateOn'			=>	date('Y-m-d H:i:s')
				);
				if($this->input->post('sfa_id')!='')
				{
					$where_array=array(
						'sfa_id'		=>	$this->input->post('sfa_id')
					);
					$resultupdate=$this->mcommon->common_edit('jr_sfa',$value_array,$where_array);
				}
				else
				{
					$value_array['createBy'] =  $this->session->userdata('user_id');    
					$value_array['createOn'] =  date('Y-m-d H:i:s'); 
					$result=$this->mcommon->common_insert('jr_sfa',$value_array);
				}
			}		
		}

		if($result)
		{
			$this->session->set_flashdata('res', lang('common_message_create'));
			$this->session->set_flashdata('res_sfa', 'success');
			redirect(base_url().'master/SFA');
		}
		if($resultupdate)
		{
			$this->session->set_flashdata('res', lang('common_message_update'));
			$this->session->set_flashdata('res_sfa', 'success');
			redirect(base_url().'master/SFA');
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
		$this->mcommon->getCheckUserPermissionHead('SFA add and edit',true);
		$where_array=array(
			'sfa_id'=>$id
		);
		$data['value']=$this->mcommon->get_fulldata('jr_sfa',$where_array);
		
		$this->addUpdateForm($data);
	}

	// Delete 
	// Last Updated by Vinitha 09/08/2016
	public function delete($id)
	{   
		$this->mcommon->getCheckUserPermissionHead('SFA delete',true);
		$where_array=array(
			'sfa_id'     =>$id
		);
		
       $delete=$this->mcommon->common_delete('jr_sfa',$where_array);
		if($delete)
		{
			$this->session->set_flashdata('res', lang('common_message_delete'));
			$this->session->set_flashdata('res_sfa', 'danger');
			redirect(base_url().'master/SFA');
		}
		else
		{
			$this->index($data);
		}
	}
	

}



