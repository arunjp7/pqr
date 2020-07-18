<?php defined('BASEPATH') OR exit('No direct script access allowed');

class RoleGroup extends CI_Controller
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
		$this->mcommon->getCheckUserPermissionHead('Role Group',true);
        $view_data['top_tittle']			=	lang('mm_masters_rolegroup_manage_toptitle');
        $view_data['top_tittle_pergram']	=	lang('mm_masters_rolegroup_manage_pergram');

        $view_data['add_button_url']		=	'admin/RoleGroup/addUpdateForm';
    	$view_data['pdf_url']				=	'admin/RoleGroup/downloadPDF';
    	$view_data['pdf_fileName']			=	lang('mm_masters_rolegroup_manage_exportPDFFileName').date('d_m_Y');    	
    	$view_data['export_url']			=	'admin/RoleGroup/exportExcel';
    	$view_data['export_fileName']		=	lang('mm_masters_rolegroup_manage_exportPDFFileName').date('d_m_Y');

    	$view_data['datatable_url']			=	'admin/RoleGroup/datatable';
    	$view_data['list_tittle']			=	lang('mm_masters_rolegroup_manage_list_title');
    	$view_data['list_tittle_small']		=	lang('mm_masters_rolegroup_manage_list_title_small');

		$data = array(
                    'title'     	=> lang('mm_masters_rolegroup_manage_view'),
                    'content'   	=>$this->load->view('admin/RoleGroup/roleGroupDataList',$view_data,TRUE)                
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
			'id','name','description'
		);

		
		// $where_arrayPackage = array('id !=' => '1');
		

		$orderPackage = $sidx.' '. $sord;

		$count =   $this->mcommon->join_records_counts($fields_arrayPackage, 'groups', '', $where_arrayPackage, '', $orderPackage);

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
		$dataTable_Details =   $this->mcommon->join_records_all($fields_arrayPackage, 'groups', '', $where_arrayPackage, '', $orderPackage,'object');

		if (isset($dataTable_Details) && !empty($dataTable_Details)) {
			$i=0;
	        foreach ($dataTable_Details->result() as $dataDetail) {
	        	$responce->rows[$i]['id'] = $dataDetail->id;
	        	//$responce->rows[$i]['cell']= array($dataDetail->ndtContractor_id);
	        	
	        	$responce->rows[$i]['cell']['edit_id'] = get_buttons_new_only_Edit($dataDetail->id,'admin/RoleGroup/');
	        	$responce->rows[$i]['cell']['delete_id'] = get_buttons_new_only_Delete($dataDetail->id,'admin/RoleGroup/');
	        	$responce->rows[$i]['cell']['name'] = $dataDetail->name;
	        	$responce->rows[$i]['cell']['description'] = $dataDetail->description;
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
		$this->mcommon->getCheckUserPermissionHead('RoleGroup add and edit',true);
        $view_data['top_tittle']			=	lang('mm_masters_rolegroup_manage_toptitle');
        $view_data['top_tittle_pergram']	=	lang('mm_masters_rolegroup_manage_pergram');

        $view_data['form_url']				=	'admin/RoleGroup/create';
        $view_data['form_cancel_url']		=	'admin/RoleGroup/';
        $view_data['form_tittle']			=	lang('mm_masters_rolegroup_manage_form_title');
        $view_data['form_tittle_small']		=	lang('mm_masters_rolegroup_manage_form_title_small');
        $view_data['form_button_name']		=	lang('mm_masters_rolegroup_manage_form_button_name');

        $view_data['user_menu_module']		=	$this->mdropdown->drop_menu_all_menuPage();
    	$view_data['user_groups']			=	$this->ion_auth->groups()->result_array();
	

		$view_data['role_group']=$this->mcommon->get_fulldataAll('user_group_module',array('group_id' => $view_data['groupID']));

		

		$data = array(
                    'title'     	=> lang('mm_masters_rolegroup_manage_create'),
                    'content'   	=>$this->load->view('admin/RoleGroup/roleGroupmanagement',$view_data,TRUE)                
                    );
        $this->load->view('base/template', $data); 
	}

	// create Form
	// Last Updated by Vinitha 09/08/2016 
	public function create()
	{		
        $user   = $this->ion_auth->user()->row();
		$this->mcommon->getCheckUserPermissionHead('RoleGroup add and edit',true);
        if(isset($_POST['submit']))
		{			
			$this->form_validation->set_rules('name', lang('mm_masters_rolegroup_name'), 'required');
			$this->form_validation->set_rules('description', lang('mm_masters_rolegroup_description'), 'required');
			
            if ($this->form_validation->run() == true)
			{
				$value_array=array(
					'name'				=>	strtolower($this->input->post('name')),
					'description'		=>	$this->input->post('description'),
				);

				$moduleID = $this->input->post('module_id');

				
				if($this->input->post('id')!='')
				{
					$where_array=array(
						'id'			 =>	$this->input->post('id')
					);
					$resultupdate=$this->mcommon->common_edit1('groups',$value_array,$where_array);
					if($resultupdate){						
						$this->mcommon->common_delete('user_group_module', array('group_id'=>$this->input->post('id')));
						if(isset($moduleID)){
							foreach ($moduleID as $key => $value) {
								$value_array1=array(
									'group_id'		=>	$this->input->post('id'),
									'module_id'		=>	$value
								);
								$this->mcommon->common_insert('user_group_module',$value_array1);
							}
						}
					}
				}
				else
				{   
					$result=$this->mcommon->common_insert('groups',$value_array);
					if($result){						
						$this->mcommon->common_delete('user_group_module', array('group_id'=>$this->input->post('id')));
						if(isset($moduleID)){
							foreach ($moduleID as $key => $value) {
								$value_array1=array(
									'group_id'		=>	$this->input->post('id'),
									'module_id'		=>	$value
								);
								$this->mcommon->common_insert('user_group_module',$value_array1);
							}
						}
					}
				}
			}		
		}
		if($result)
		{
			$this->session->set_flashdata('res', lang('common_message_create'));
			$this->session->set_flashdata('res_type', 'success');
			redirect(base_url().'admin/RoleGroup');
		}
		if($resultupdate)
		{
			$this->session->set_flashdata('res', lang('common_message_update'));
			$this->session->set_flashdata('res_type', 'success');
			redirect(base_url().'admin/RoleGroup');
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
		$this->mcommon->getCheckUserPermissionHead('RoleGroup add and edit',true);
		$where_array=array(
			'id'=>$id
		);
		$data['value']=$this->mcommon->get_fulldata('groups',$where_array);
		$data['groupID']=$id;
		
		$this->addUpdateForm($data);
	}

	// Delete 
	// Last Updated by Vinitha 09/08/2016
	public function delete($id)
	{   
		$this->mcommon->getCheckUserPermissionHead('RoleGroup delete',true);
		$where_array=array(
			'id'     =>$id
		);
		
       $delete=$this->mcommon->common_delete('groups',$where_array);
		if($delete)
		{
			$this->session->set_flashdata('res', lang('common_message_delete'));
			$this->session->set_flashdata('res_type', 'danger');
			redirect(base_url().'admin/RoleGroup');
		}
		else
		{
			$this->index($data);
		}
	}


}



