<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ClientsManage extends CI_Controller
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
		$this->mcommon->getCheckUserPermissionHead('Clients',true);

        $view_data['top_tittle']			=	lang('mm_operation_client_manage_toptitle');
        $view_data['top_tittle_pergram']	=	lang('mm_operation_client_manage_pergram');

        $view_data['add_button_url']		=	'operation/ClientsManage/addUpdateForm';
    	$view_data['datatable_url']			=	'operation/ClientsManage/datatable';
    	$view_data['pdf_url']				=	'operation/ClientsManage/downloadPDF';
    	$view_data['pdf_fileName']			=	lang('mm_operation_client_exportPDFFileName').date('d_m_Y');    	
    	$view_data['export_url']			=	'operation/ClientsManage/exportExcel';
    	$view_data['export_fileName']		=	lang('mm_operation_client_exportPDFFileName').date('d_m_Y');
    	
    	$view_data['datatable_url']			=	'operation/ClientsManage/datatable';
    	$view_data['list_tittle']			=	lang('mm_operation_client_manage_list_title');
    	$view_data['list_tittle_small']		=	lang('mm_operation_client_manage_list_title_small');
    	
      
		$data = array(
                    'title'     	=> lang('mm_operation_client_manage_view'),
                    'content'   	=>$this->load->view('operation/client/clientDataList',$view_data,TRUE)                
                    );
        $this->load->view('base/template', $data); 
	}

	// datatable View
	// Last Updated by Vinitha 09/08/2016 
	function datatable1()
    {
    	$this->datatables->select('p.client_id, p.client_name, p.client_email, p.client_phone, p.client_office_no, p.client_fax, p.client_website, p.client_abbreviations, p.client_address, u.first_name, p.client_createOn,u1.first_name as firstname,p.client_updateOn')
        ->from('jr_client AS p')
        ->join('users AS u', 'u.id = p.client_createBy','left') 
        ->join('users AS u1', 'u1.id = p.client_updateBy','left') 
        ->where('p.client_show_status', 1)
		->edit_column('p.client_id', get_buttons_new('$1','operation/ClientsManage/'), 'p.client_id');
		//$this->datatables->edit_column('p.page_show_status', '$1', 'get_status(p.page_show_status)');
		$this->datatables->edit_column('p.client_website', '$1', 'get_ancharTagLink(p.client_website)');
		$this->datatables->edit_column('p.client_createOn', '$1', 'get_date_timeformat(p.client_createOn)');
		$this->datatables->edit_column('p.client_updateOn', '$1', 'get_date_timeformat(p.client_updateOn)');
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
			'p.client_id','p.client_name','p.client_email','p.client_phone','p.client_office_no','p.client_fax','p.client_website','p.client_abbreviations','p.client_address','p.client_photo','u.first_name','p.client_createOn','u1.first_name as firstname','p.client_updateOn'
		);
		$join_arrayPackage = array(
			'users AS u' => 'u.id = p.client_createBy',
			'users AS u1' => 'u1.id = p.client_updateBy',
		);
		$where_arrayPackage = array('p.client_show_status' =>'1');
		$orderPackage = $sidx.' '. $sord;

		$count =   $this->mcommon->join_records_counts($fields_arrayPackage, 'jr_client as p', $join_arrayPackage, $where_arrayPackage, '', $orderPackage);

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
		$dataTable_Details =   $this->mcommon->join_records_all($fields_arrayPackage, 'jr_client as p', $join_arrayPackage, $where_arrayPackage, '', $orderPackage,'object');

		if (isset($dataTable_Details) && !empty($dataTable_Details)) {
			$i=0;
	        foreach ($dataTable_Details->result() as $dataDetail) {
	        	$responce->rows[$i]['id'] = $dataDetail->client_id;
	        	//$responce->rows[$i]['cell']= array($dataDetail->ndtContractor_id);
	        	$responce->rows[$i]['cell']['edit_client_id'] = get_buttons_new_only_Edit($dataDetail->client_id,'operation/ClientsManage/');
	        	$responce->rows[$i]['cell']['delete_client_id'] = get_buttons_new_only_Delete($dataDetail->client_id,'operation/ClientsManage/');
	        	$responce->rows[$i]['cell']['client_name'] = $dataDetail->client_name;
	        	$responce->rows[$i]['cell']['client_email'] = $dataDetail->client_email;
	        	$responce->rows[$i]['cell']['client_abbreviations'] = $dataDetail->client_abbreviations;
	        	$responce->rows[$i]['cell']['client_phone'] = $dataDetail->client_phone;
	        	$responce->rows[$i]['cell']['client_office_no'] = $dataDetail->client_office_no;
	        	$responce->rows[$i]['cell']['client_fax'] = $dataDetail->client_fax;
	        	$responce->rows[$i]['cell']['client_website'] =  get_ancharTagLink($dataDetail->client_website);
	        	$responce->rows[$i]['cell']['client_address'] = $dataDetail->client_address;
	        	$responce->rows[$i]['cell']['client_photo'] = get_image_tag($dataDetail->client_photo);
	        	$responce->rows[$i]['cell']['first_name'] = $dataDetail->first_name;
	        	$responce->rows[$i]['cell']['client_createOn'] = get_date_timeformat($dataDetail->client_createOn);
	        	$responce->rows[$i]['cell']['firstname'] = $dataDetail->firstname;
	        	$responce->rows[$i]['cell']['client_updateOn'] = get_date_timeformat($dataDetail->client_updateOn);
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
		$this->mcommon->getCheckUserPermissionHead('Clients add and edit',true);

        $view_data['top_tittle']			=	lang('mm_operation_client_manage_toptitle');
        $view_data['top_tittle_pergram']	=	lang('mm_operation_client_manage_pergram');

        $view_data['form_url']				=	'operation/ClientsManage/create';
        $view_data['form_cancel_url']		=	'operation/ClientsManage';

        $view_data['form_tittle']			=	lang('mm_operation_client_manage_form_title');
        $view_data['form_tittle_small']		=	lang('mm_operation_client_manage_form_title_small');
        $view_data['form_button_name']		=	lang('mm_operation_client_manage_form_button_name');

		$data = array(
                    'title'     	=> lang('mm_operation_client_manage_create'),
                    'content'   	=>$this->load->view('operation/client/clientmanagement',$view_data,TRUE)                
                    );
        $this->load->view('base/template', $data); 
	}

	// create Form
	// Last Updated by Vinitha 09/08/2016 
	public function create()
	{		
        $user   = $this->ion_auth->user()->row();
		$this->mcommon->getCheckUserPermissionHead('Clients add and edit',true);

        if(isset($_POST['submit']))
		{			
			 $this->form_validation->set_rules('client_name', lang('mm_operation_client_name'), 'required');
			 $this->form_validation->set_rules('client_abbreviations', lang('mm_operation_client_abbreviations'), 'required');
			 $this->form_validation->set_rules('client_email', $this->lang->line('mm_operation_client_email'), 'required|valid_email');

			if($_FILES['client_photo']['name']!='')
			{
				if (!file_exists(FCPATH.'/~cdn/photoClient/'))
		        {
				    mkdir(FCPATH.'/~cdn/photoClient/', 0777, true);
				}

				$config = array();
				$config['upload_path'] = '.././~cdn/photoClient/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '5000';
				$config['max_width'] = '3500';
				$config['max_height'] = '3500';
				$config['max_filename'] = '500';
				$config['overwrite'] = false;
				$this->upload->initialize($config);
				$this->load->library('image_lib');
				$this->load->library('upload', $config);

				if($this->upload->do_upload('client_photo'))
				{	
					$this->load->helper('inflector');
					$file_name = underscore($_FILES['client_photo']['name']);
					$config['file_name'] = $file_name;
					$image_data['message'] = $this->upload->data(); 

					$_POST[client_photo]="~cdn/photoClient/".$image_data['message']['file_name'];
				} 
				else
				{
					 $data['client_photo'] = $this->upload->display_errors('<div class="alert alert-error">', '</div>');
					 $this->form_validation->set_rules('client_photo', $this->upload->display_errors(), 'required');                
				}	
			}


            if ($this->form_validation->run() == true)
			{
				$value_array=array(
					'client_name'		    =>	ucwords($this->input->post('client_name')),
					'client_email'			=>	$this->input->post('client_email'),
					'client_phone'=>	($this->input->post('client_phone')!='') ? $this->input->post('client_phone') : '',
					'client_office_no'=>	($this->input->post('client_office_no')!='') ? $this->input->post('client_office_no') : '',
					'client_fax'=>	($this->input->post('client_fax')!='') ? $this->input->post('client_fax') : '',
					'client_website'=>	($this->input->post('client_website')!='') ? $this->input->post('client_website') : '',
					'client_abbreviations'=>	($this->input->post('client_abbreviations')!='') ? $this->input->post('client_abbreviations') : '',
					'client_address'=>	($this->input->post('client_address')!='') ? $this->input->post('client_address') : '',
					'client_updateBy'			=>	$this->session->userdata('user_id'),
					'client_updateOn'			=>	date('Y-m-d H:i:s')
				);
				if($this->input->post('client_id')!='')
				{
					if($_FILES['client_photo']['name']!='')
					{
						unlink(FCPATH .$this->input->post('old_clientphoto')); 
						$value_array = array_merge($value_array, array('client_photo'=>$this->input->post('client_photo')));
					}
					$where_array=array(
						'client_id'				=>	$this->input->post('client_id')
					);
					$resultupdate=$this->mcommon->common_edit('jr_client',$value_array,$where_array);
				}
				else
				{
					if($_FILES['client_photo']['name']!='')
					{
						$value_array['client_photo'] = $this->input->post('client_photo');
					}
					$value_array['client_createBy'] =  $this->session->userdata('user_id');    
					$value_array['client_createOn'] =  date('Y-m-d H:i:s'); 
					$result=$this->mcommon->common_insert('jr_client',$value_array);
				}
			}		
		}

		if($result)
		{
			$this->session->set_flashdata('res', lang('common_message_create'));
			$this->session->set_flashdata('res_type', 'success');
			redirect(base_url().'operation/ClientsManage');
		}
		if($resultupdate)
		{
			$this->session->set_flashdata('res', lang('common_message_update'));
			$this->session->set_flashdata('res_type', 'success');
			redirect(base_url().'operation/ClientsManage');
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
		$this->mcommon->getCheckUserPermissionHead('Clients add and edit',true);
		$where_array=array(
			'client_id'=>$id
		);
		$data['value']=$this->mcommon->get_fulldata('jr_client',$where_array);
		
		$this->addUpdateForm($data);
	}

	// Delete 
	// Last Updated by Vinitha 09/08/2016
	public function delete($id)
	{   
		$this->mcommon->getCheckUserPermissionHead('Clients delete',true);
		$where_array=array(
			'client_id'     =>$id
		);
		
       $delete=$this->mcommon->common_delete('jr_client',$where_array);
		if($delete)
		{
			$this->session->set_flashdata('res', lang('common_message_delete'));
			$this->session->set_flashdata('res_type', 'danger');
			redirect(base_url().'operation/ClientsManage');
		}
		else
		{
			$this->index($data);
		}
	}
	

}



