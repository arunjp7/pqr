<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Radiographer1 extends CI_Controller
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
		$this->mcommon->getCheckUserPermissionHead('Radiographer first',true);
        $view_data['top_tittle']			=	lang('mm_masters_Radiographer1_manage_toptitle');
        $view_data['top_tittle_pergram']	=	lang('mm_masters_Radiographer1_manage_pergram');

        $view_data['add_button_url']		=	'master/Radiographer1/addUpdateForm';
    	$view_data['datatable_url']			=	'master/Radiographer1/datatable';
    	$view_data['pdf_url']				=	'master/Radiographer1/downloadPDF';
    	$view_data['pdf_fileName']			=	lang('mm_masters_Radiographer1_exportPDFFileName').date('d_m_Y');    	
    	$view_data['export_url']			=	'master/Radiographer1/exportExcel';
    	$view_data['export_fileName']		=	lang('mm_masters_Radiographer1_exportPDFFileName').date('d_m_Y');
    	
    	$view_data['datatable_url']			=	'master/Radiographer1/datatable';
    	$view_data['list_tittle']			=	lang('mm_masters_Radiographer1_manage_list_title');
    	$view_data['list_tittle_small']		=	lang('mm_masters_Radiographer1_manage_list_title_small');
    	
      
		$data = array(
                    'title'     	=> lang('mm_masters_Radiographer1_manage_view'),
                    'content'   	=>$this->load->view('master/Radiographer1/Radiographer1DataList',$view_data,TRUE)                
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
			'j.radiographer_first_id','j.radiographer_first_name','u.first_name','j.radiographer_first_createOn as createOn','u1.first_name as firstname','j.radiographer_first_updateOn as updateOn'
		);
		$join_arrayPackage = array(
			'users AS u' => 'u.id = j.radiographer_first_createBy',
			'users AS u1' => 'u1.id = j.radiographer_first_updateBy',
		);
		$where_arrayPackage = array('j.radiographer_first_show_status' =>'1');
		$orderPackage = $sidx.' '. $sord;

		$count =   $this->mcommon->join_records_counts($fields_arrayPackage, 'jr_radiographer_first as j', $join_arrayPackage, $where_arrayPackage, '', $orderPackage);

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
		$dataTable_Details =   $this->mcommon->join_records_all($fields_arrayPackage, 'jr_radiographer_first as j', $join_arrayPackage, $where_arrayPackage, '', $orderPackage,'object');

		if (isset($dataTable_Details) && !empty($dataTable_Details)) {
			$i=0;
	        foreach ($dataTable_Details->result() as $dataDetail) {
	        	$responce->rows[$i]['id'] = $dataDetail->radiographer_first_id;
	        	//$responce->rows[$i]['cell']= array($dataDetail->ndtContractor_id);
	        	$responce->rows[$i]['cell']['edit_radiographer_first_id'] = get_buttons_new_only_Edit($dataDetail->radiographer_first_id,'master/Radiographer1/');
	        	$responce->rows[$i]['cell']['delete_radiographer_first_id'] = get_buttons_new_only_Delete($dataDetail->radiographer_first_id,'master/Radiographer1/');
	        	$responce->rows[$i]['cell']['radiographer_first_name'] = $dataDetail->radiographer_first_name;
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
		$this->mcommon->getCheckUserPermissionHead('Radiographer first add and edit',true);
        $view_data['top_tittle']			=	lang('mm_masters_Radiographer1_manage_toptitle');
        $view_data['top_tittle_pergram']	=	lang('mm_masters_Radiographer1_manage_pergram');

        $view_data['form_url']				=	'master/Radiographer1/create';
        $view_data['form_cancel_url']		=	'master/Radiographer1';

        $view_data['form_tittle']			=	lang('mm_masters_Radiographer1_manage_form_title');
        $view_data['form_tittle_small']		=	lang('mm_masters_Radiographer1_manage_form_title_small');
        $view_data['form_button_name']		=	lang('mm_masters_Radiographer1_manage_form_button_name');
    	
		$data = array(
                    'title'     	=> lang('mm_masters_Radiographer1_manage_create'),
                    'content'   	=>$this->load->view('master/Radiographer1/Radiographer1management',$view_data,TRUE)                
                    );
        $this->load->view('base/template', $data); 
	}

	// create Form
	// Last Updated by Vinitha 09/08/2016 
	public function create()
	{		
        $user   = $this->ion_auth->user()->row();
		$this->mcommon->getCheckUserPermissionHead('Radiographer first add and edit',true);
        if(isset($_POST['submit']))
		{			
			 $this->form_validation->set_rules('radiographer_first_name', lang('mm_master_Radiographer1'), 'required');
			 


            if ($this->form_validation->run() == true)
			{
				$value_array=array(
					'radiographer_first_name'		    =>	$this->input->post('radiographer_first_name'),
					'radiographer_first_updateBy'			=>	$this->session->userdata('user_id'),
					'radiographer_first_updateOn'			=>	date('Y-m-d H:i:s')
				);
				if($this->input->post('radiographer_first_id')!='')
				{
					$where_array=array(
						'radiographer_first_id'		=>	$this->input->post('radiographer_first_id')
					);
					$resultupdate=$this->mcommon->common_edit('jr_radiographer_first',$value_array,$where_array);
				}
				else
				{
					$value_array['radiographer_first_createBy'] =  $this->session->userdata('user_id');    
					$value_array['radiographer_first_createOn'] =  date('Y-m-d H:i:s'); 
					$result=$this->mcommon->common_insert('jr_radiographer_first',$value_array);
				}
			}		
		}

		if($result)
		{
			$this->session->set_flashdata('res', lang('common_message_create'));
			$this->session->set_flashdata('res_type', 'success');
			redirect(base_url().'master/Radiographer1');
		}
		if($resultupdate)
		{
			$this->session->set_flashdata('res', lang('common_message_update'));
			$this->session->set_flashdata('res_type', 'success');
			redirect(base_url().'master/Radiographer1');
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
		$this->mcommon->getCheckUserPermissionHead('Radiographer first add and edit',true);
		$where_array=array(
			'radiographer_first_id'=>$id
		);
		$data['value']=$this->mcommon->get_fulldata('jr_radiographer_first',$where_array);
		
		$this->addUpdateForm($data);
	}

	// Delete 
	// Last Updated by Vinitha 09/08/2016
	public function delete($id)
	{   
		$this->mcommon->getCheckUserPermissionHead('Radiographer first delete',true);
		$where_array=array(
			'radiographer_first_id'     =>$id
		);
		
       $delete=$this->mcommon->common_delete('jr_radiographer_first',$where_array);
		if($delete)
		{
			$this->session->set_flashdata('res', lang('common_message_delete'));
			$this->session->set_flashdata('res_type', 'danger');
			redirect(base_url().'master/Radiographer1');
		}
		else
		{
			$this->index($data);
		}
	}
	

}



