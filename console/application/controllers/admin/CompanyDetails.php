<?php defined('BASEPATH') OR exit('No direct script access allowed');

class CompanyDetails extends CI_Controller
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
		$this->mcommon->getCheckUserPermissionHead('Company Details',true);

        $view_data['top_tittle']			=	lang('mm_masters_companydetails_manage_toptitle');
        $view_data['top_tittle_pergram']	=	lang('mm_master_companydetails_manage_pergram');

        $view_data['add_button_url']		=	'admin/CompanyDetails/addUpdateForm';
    	$view_data['datatable_url']			=	'admin/CompanyDetails/datatable';
    	$view_data['pdf_url']				=	'admin/CompanyDetails/downloadPDF';
    	$view_data['pdf_fileName']			=	lang('mm_master_companydetails_exportPDFFileName').date('d_m_Y');    	
    	$view_data['export_url']			=	'admin/CompanyDetails/exportExcel';
    	$view_data['export_fileName']		=	lang('mm_master_companydetails_exportPDFFileName').date('d_m_Y');
    	
    	$view_data['datatable_url']			=	'admin/CompanyDetails/datatable';
    	$view_data['list_tittle']			=	lang('mm_master_companydetails_manage_list_title');
    	$view_data['list_tittle_small']		=	lang('mm_master_companydetails_manage_list_title_small');
    	
      
		$data = array(
                    'title'     	=> lang('mm_masters_companydetails_manage_view'),
                    'content'   	=>$this->load->view('admin/CompanyDetails/companyDetailsDataList',$view_data,TRUE)                
                    );
        $this->load->view('base/template', $data); 
	}

	// datatable View
	// Last Updated by Vinitha 09/08/2016 
	function datatable1()
    {
    	$this->datatables->select('p.company_id, p.company_name, p.company_email, p.contact_no, p.company_office_no, p.company_fax, p.company_website, p.company_abbreviations, p.company_address, u.first_name, p.createOn,u1.first_name as firstname,p.updateOn')
        ->from('jr_company_details AS p')
        ->join('users AS u', 'u.id = p.createBy','left') 
        ->join('users AS u1', 'u1.id = p.updateBy','left') 
        ->where('p.company_show_status', 1)
		->edit_column('p.company_id', get_buttons_new('$1','admin/CompanyDetails/'), 'p.company_id');
		//$this->datatables->edit_column('p.page_show_status', '$1', 'get_status(p.page_show_status)');
		$this->datatables->edit_column('p.company_website', '$1', 'get_ancharTagLink(p.company_website)');
		$this->datatables->edit_column('p.createOn', '$1', 'get_date_timeformat(p.createOn)');
		$this->datatables->edit_column('p.updateOn', '$1', 'get_date_timeformat(p.updateOn)');
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
			'p.company_id','p.company_name','p.company_email','p.contact_no', 'p.abbreviation','p.company_address','p.company_logo','u.first_name','p.createOn','u1.first_name as firstname','p.updateOn'
		);
		$join_arrayPackage = array(
			'users AS u' => 'u.id = p.createBy',
			'users AS u1' => 'u1.id = p.updateBy',
		);
		$where_arrayPackage = array('p.company_show_status' =>'1');
		$orderPackage = $sidx.' '. $sord;

		$count =   $this->mcommon->join_records_counts($fields_arrayPackage, 'jr_company_details as p', $join_arrayPackage, $where_arrayPackage, '', $orderPackage);

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
		$dataTable_Details =   $this->mcommon->join_records_all($fields_arrayPackage, 'jr_company_details as p', $join_arrayPackage, $where_arrayPackage, '', $orderPackage,'object');

		if (isset($dataTable_Details) && !empty($dataTable_Details)) {
			$i=0;
	        foreach ($dataTable_Details->result() as $dataDetail) {
	        	$responce->rows[$i]['id'] = $dataDetail->company_id;
	        	//$responce->rows[$i]['cell']= array($dataDetail->ndtContractor_id);
	        	$responce->rows[$i]['cell']['edit_company_id'] = get_buttons_new_only_Edit($dataDetail->company_id,'admin/CompanyDetails/');
	        	$responce->rows[$i]['cell']['delete_company_id'] = get_buttons_new_only_Delete($dataDetail->company_id,'admin/CompanyDetails/');
	        	$responce->rows[$i]['cell']['company_name'] = $dataDetail->company_name;
	        	$responce->rows[$i]['cell']['company_email'] = $dataDetail->company_email;
	        	$responce->rows[$i]['cell']['contact_no'] = $dataDetail->contact_no;
	        	$responce->rows[$i]['cell']['company_address'] = $dataDetail->company_address;
	        	$responce->rows[$i]['cell']['company_logo'] = get_image_tag($dataDetail->company_logo);
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
		$this->mcommon->getCheckUserPermissionHead('CompanyDetails add and edit',true);

        $view_data['top_tittle']			=	lang('mm_masters_companydetails_manage_toptitle');
        $view_data['top_tittle_pergram']	=	lang('mm_masters_companydetails_manage_pergram');

        $view_data['form_url']				=	'admin/CompanyDetails/create';
        $view_data['form_cancel_url']		=	'admin/CompanyDetails';

        $view_data['form_tittle']			=	lang('mm_masters_companydetails_manage_form_title');
        $view_data['form_tittle_small']		=	lang('mm_masters_companydetails_manage_form_title_small');
        $view_data['form_button_name']		=	lang('mm_masters_companydetails_manage_form_button_name');

		$data = array(
                    'title'     	=> lang('mm_masters_companydetails_manage_create'),
                    'content'   	=>$this->load->view('admin/CompanyDetails/companyDetailsmanagement',$view_data,TRUE)                
                    );
        $this->load->view('base/template', $data); 
	}

	// create Form
	// Last Updated by Vinitha 09/08/2016 
	public function create()
	{		
		
        $user   = $this->ion_auth->user()->row();
		$this->mcommon->getCheckUserPermissionHead('CompanyDetails add and edit',true);

        if(isset($_POST['submit']))
		{			

			 $this->form_validation->set_rules('company_name', lang('mm_masters_companydetails_company_name'), 'required');
			 $this->form_validation->set_rules('abbreviation', lang('mm_masters_companydetails_abbreviations'), 'required');
			 $this->form_validation->set_rules('contact_no', lang('mm_masters_companydetails_contact_no'), 'required');
			 $this->form_validation->set_rules('company_email', $this->lang->line('mm_master_company_email'), 'required|valid_email');
			 $this->form_validation->set_rules('company_address', lang('mm_master_company_address'), 'required');

			if($_FILES['company_logo']['name']!='')
			{
				if (!file_exists(FCPATH.'/~cdn/companyLogo/'))
		        {
				    mkdir(FCPATH.'/~cdn/companyLogo/', 0777, true);
				}

				$config = array();
				$config['upload_path'] = '.././~cdn/companyLogo/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '5000';
				$config['max_width'] = '3500';
				$config['max_height'] = '3500';
				$config['max_filename'] = '500';
				$config['overwrite'] = false;
				$this->upload->initialize($config);
				$this->load->library('image_lib');
				$this->load->library('upload', $config);

				if($this->upload->do_upload('company_logo'))	
				{	
					$this->load->helper('inflector');
					$file_name = underscore($_FILES['company_logo']['name']);
					$config['file_name'] = $file_name;
					$image_data['message'] = $this->upload->data(); 

					$_POST['company_logo']="~cdn/companyLogo/".$image_data['message']['file_name'];

				} 
				else
				{
					 $data['company_logo'] = $this->upload->display_errors('<div class="alert alert-error">', '</div>');
					 $this->form_validation->set_rules('company_logo', $this->upload->display_errors(), 'required');                
				}	
			}

            if ($this->form_validation->run() == true)
			{
				$value_array=array(
					'company_name'		    =>	ucwords($this->input->post('company_name')),
					'abbreviation'			=>	$this->input->post('abbreviation'),
					'contact_no'			=>	$this->input->post('contact_no'),
					'alternate_contact_no'	=>	($this->input->post('alternate_contact_no')!='') ? $this->input->post('alternate_contact_no') : '',
					'fax'					=>	($this->input->post('company_fax')!='') ? $this->input->post('company_fax') : '',
					'website'				=>	($this->input->post('company_website')!='') ? $this->input->post('company_website') : '',
					'company_email'			=>	$this->input->post('company_email'),
					'company_address'		=>	($this->input->post('company_address')!='') ? $this->input->post('company_address') : '',
					'updateBy'				=>	$this->session->userdata('user_id'),
					'updateOn'				=>	date('Y-m-d H:i:s')
				);
				if($this->input->post('company_id')!='')
				{
					if($_FILES['company_logo']['name']!='')
					{
						unlink(FCPATH .$this->input->post('old_companylogo')); 
						$value_array = array_merge($value_array, array('company_logo'=>$this->input->post('company_logo')));
					}
					$where_array=array(
						'company_id'				=>	$this->input->post('company_id')
					);
					$resultupdate=$this->mcommon->common_edit('jr_company_details',$value_array,$where_array);
				}
				else
				{
					if($_FILES['company_logo']['name']!='')
					{
						$value_array['company_logo'] = $this->input->post('company_logo');
					}
					$value_array['createBy'] =  $this->session->userdata('user_id');    
					$value_array['createOn'] =  date('Y-m-d H:i:s'); 
					$result=$this->mcommon->common_insert('jr_company_details',$value_array);
				}
			}	
				
		}

		if($result)
		{
			$this->session->set_flashdata('res', lang('common_message_create'));
			$this->session->set_flashdata('res_type', 'success');
			redirect(base_url().'admin/CompanyDetails');
		}
		if($resultupdate)
		{
			$this->session->set_flashdata('res', lang('common_message_update'));
			$this->session->set_flashdata('res_type', 'success');
			redirect(base_url().'admin/CompanyDetails');
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
		$this->mcommon->getCheckUserPermissionHead('CompanyDetails add and edit',true);
		$where_array=array(
			'company_id'=>$id
		);
		$data['value']=$this->mcommon->get_fulldata('jr_company_details',$where_array);
		
		$this->addUpdateForm($data);
	}

	// Delete 
	// Last Updated by Vinitha 09/08/2016
	public function delete($id)
	{   
		$this->mcommon->getCheckUserPermissionHead('Clients delete',true);
		$where_array=array(
			'company_id'     =>$id
		);
		
       $delete=$this->mcommon->common_delete('jr_company_details',$where_array);
		if($delete)
		{
			$this->session->set_flashdata('res', lang('common_message_delete'));
			$this->session->set_flashdata('res_type', 'danger');
			redirect(base_url().'admin/CompanyDetails');
		}
		else
		{
			$this->index($data);
		}
	}
	

}



