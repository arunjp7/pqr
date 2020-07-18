<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModule extends CI_Controller
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
		$this->mcommon->getCheckUserPermissionHead('Admin Role',true);
        $view_data['top_tittle']			=	lang('mm_masters_adminmodule_manage_toptitle');
        $view_data['top_tittle_pergram']	=	lang('mm_masters_adminmodule_manage_pergram');

        $view_data['add_button_url']		=	'admin/AdminModule/addUpdateForm';
    	$view_data['pdf_url']				=	'admin/AdminModule/downloadPDF';
    	$view_data['pdf_fileName']			=	lang('mm_masters_adminmodule_manage_exportPDFFileName').date('d_m_Y');    	
    	$view_data['export_url']			=	'admin/AdminModule/exportExcel';
    	$view_data['export_fileName']		=	lang('mm_masters_adminmodule_manage_exportPDFFileName').date('d_m_Y');

    	$view_data['datatable_url']			=	'admin/AdminModule/datatable';
    	$view_data['subGrid_datatable_url']			=	'admin/AdminModule/datatableSubGrid';

    	$view_data['list_tittle']			=	lang('mm_masters_adminmodule_manage_list_title');
    	$view_data['list_tittle_small']		=	lang('mm_masters_adminmodule_manage_list_title_small');
		$data = array(
                    'title'     	=> lang('mm_masters_adminmodule_manage_view'),
                    'content'   	=>$this->load->view('admin/AdminModule/adminModuleDataList',$view_data,TRUE)                
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
	        	$responce->rows[$i]['cell']['edit_menu_id'] = get_buttons_new_only_Edit($dataDetail->menu_id,'admin/AdminModule/');
	        	$responce->rows[$i]['cell']['delete_menu_id'] = get_buttons_new_only_Delete($dataDetail->menu_id,'admin/AdminModule/');
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
		$menuParentID = $_POST['menuParentID']; // get the direction
		if(!$sidx) $sidx =1;

		$fields_arrayPackage = array(
			'p.menu_id','p.menu_name','p.menu_area','p.menu_link','p.menu_position','p.menu_parent','p.menu_status','u.first_name','p.menu_createOn','u1.first_name as firstname','p.menu_updateOn'
		);
		$join_arrayPackage = array(
			'users AS u' => 'u.id = p.menu_createBy',
			'users AS u1' => 'u1.id = p.menu_updateBy',
		);
		//$where_arrayPackage = array('c.category_show_status' =>'1','s.status_show_status' =>'1');
		$where_arrayPackage = array('p.menu_parent' => $menuParentID,'p.menu_status' => '1');
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
	        	$responce->rows[$i]['cell']['edit_menu_id'] = get_buttons_new_only_Edit($dataDetail->menu_id,'admin/AdminModule/');
	        	$responce->rows[$i]['cell']['menu_name'] = $dataDetail->menu_name;
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


    // Form View
	// Last Updated by Vinitha 09/08/2016 
	public function addUpdateForm($view_data)
	{  
		$this->mcommon->getCheckUserPermissionHead('AdminRole add and edit',true);
        $view_data['top_tittle']			=	lang('mm_masters_adminmodule_manage_toptitle');
        $view_data['top_tittle_pergram']	=	lang('mm_masters_adminmodule_manage_pergram');

        $view_data['form_url']				=	'admin/AdminModule/create';
        $view_data['form_cancel_url']		=	'admin/AdminModule/';
        $view_data['form_tittle']			=	lang('mm_masters_adminmodule_manage_form_title');
        $view_data['form_tittle_small']		=	lang('mm_masters_adminmodule_manage_form_title_small');
        $view_data['form_button_name']		=	lang('mm_masters_adminmodule_manage_form_button_name');

    	$view_data['drop_menu_status']		=	$this->mcommon->drop_down_status();	

        $fields_arrayCerIns = array(
    		'menu_id as Key','menu_name as Value'
    	);
		$whereArrCerIns        = "menu_parent ='0' AND menu_status ='1'";

    	$view_data['drop_down_parent']	=	$this->mcommon->Dropdown('jr_menu_module',$fields_arrayCerIns,'',$whereArrCerIns,'','`menu_id` ASC ','', '1');	




		$data = array(
            'title'     	=> lang('mm_masters_adminmodule_manage_create'),
            'content'   	=>$this->load->view('admin/AdminModule/adminModulemanagement',$view_data,TRUE)
        );
        $this->load->view('base/template', $data); 
	}

	// create Form
	// Last Updated by Vinitha 09/08/2016 
	public function create()
	{		
        $user   = $this->ion_auth->user()->row();
		$this->mcommon->getCheckUserPermissionHead('AdminRole add and edit',true);
        if(isset($_POST['submit']))
		{		
			$this->form_validation->set_rules('menu_name', lang('mm_masters_adminmodule_menu_name'), 'required');
			$this->form_validation->set_rules('menu_area', lang('mm_masters_adminmodule_menu_area'), 'required');
			$this->form_validation->set_rules('menu_link', lang('mm_masters_adminmodule_menu_link'), 'required');
			//$this->form_validation->set_rules('menu_path', lang('mm_masters_adminmodule_menu_path'), 'required');
			//$this->form_validation->set_rules('menu_active_name', lang('mm_masters_adminmodule_menu_active_name'), 'required');
			$this->form_validation->set_rules('menu_position', lang('mm_masters_adminmodule_menu_position'), 'required');
			$this->form_validation->set_rules('top_menu_position', lang('mm_masters_adminmodule_menu_position_top'), 'required');
			$this->form_validation->set_rules('menu_parent', lang('mm_masters_adminmodule_menu_parent'), 'required');
			$this->form_validation->set_rules('menu_status', lang('mm_masters_adminmodule_menu_status'), 'required');
			
            if ($this->form_validation->run() == true)
			{
				$value_array=array(
					'menu_name'				=>	$this->input->post('menu_name'),
					'menu_area'				=>	$this->input->post('menu_area'),
					'menu_link'				=>	$this->input->post('menu_link'),
					'menu_path'				=>	$this->input->post('menu_path'),
					'menu_active_name'		=>	$this->input->post('menu_active_name'),
					'menu_position'			=>	$this->input->post('menu_position'),
					'top_menu_position'		=>	$this->input->post('top_menu_position'),
					'menu_parent'			=>	$this->input->post('menu_parent'),
					'menu_status'			=>	$this->input->post('menu_status'),
					'menu_updateBy'			=>	$this->session->userdata('user_id'),
					'menu_updateOn'			=>	date('Y-m-d H:i:s')
				);
				
				if($this->input->post('menu_id')!='')
				{
					$where_array=array(
						'menu_id'			 =>	$this->input->post('menu_id')
					);
					$resultupdate=$this->mcommon->common_edit1('jr_menu_module',$value_array,$where_array);
				}
				else
				{   
					$value_array['menu_createBy'] =  $this->session->userdata('user_id');    
					$value_array['menu_createOn'] =  date('Y-m-d H:i:s'); 
					$result=$this->mcommon->common_insert('jr_menu_module',$value_array);
				}
			}		
		}
		if($result)
		{
			$this->session->set_flashdata('res', lang('common_message_create'));
			$this->session->set_flashdata('res_type', 'success');
			redirect(base_url().'admin/AdminModule');
		}
		if($resultupdate)
		{
			$this->session->set_flashdata('res', lang('common_message_update'));
			$this->session->set_flashdata('res_type', 'success');
			redirect(base_url().'admin/AdminModule');
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
		$this->mcommon->getCheckUserPermissionHead('AdminRole add and edit',true);
		$where_array=array(
			'menu_id'=>$id
		);
		$data['value']=$this->mcommon->get_fulldata('jr_menu_module',$where_array);
		$data['groupID']=$id;
		
		$this->addUpdateForm($data);
	}

	// Delete 
	// Last Updated by Vinitha 09/08/2016
	public function delete($id)
	{   
		$this->mcommon->getCheckUserPermissionHead('AdminRole delete',true);
		$where_array=array(
			'menu_id'     =>$id
		);
		
       $delete=$this->mcommon->common_delete('jr_menu_module',$where_array);
		if($delete)
		{
			$this->session->set_flashdata('res', lang('common_message_delete'));
			$this->session->set_flashdata('res_type', 'danger');
			redirect(base_url().'admin/AdminModule');
		}
		else
		{
			$this->index($data);
		}
	}
}



