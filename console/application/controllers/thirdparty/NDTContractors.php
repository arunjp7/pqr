<?php defined('BASEPATH') OR exit('No direct script access allowed');

class NDTContractors extends CI_Controller
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
        $view_data['top_tittle']			=	lang('mm_thirdparty_ndtContractors_manage_toptitle');
        $view_data['top_tittle_pergram']	=	lang('mm_thirdparty_ndtContractors_manage_pergram');

        $view_data['add_button_url']		=	'thirdparty/NDTContractors/addUpdateForm';
    	$view_data['datatable_url']			=	'thirdparty/NDTContractors/datatable';
    	$view_data['pdf_url']				=	'thirdparty/NDTContractors/downloadPDF';
    	$view_data['pdf_fileName']			=	lang('mm_thirdparty_ndtContractors_exportPDFFileName').date('d_m_Y');    	
    	$view_data['export_url']			=	'thirdparty/NDTContractors/exportExcel';
    	$view_data['export_fileName']		=	lang('mm_thirdparty_ndtContractors_exportPDFFileName').date('d_m_Y');
    	
    	$view_data['datatable_url']			=	'thirdparty/NDTContractors/datatable';
    	$view_data['list_tittle']			=	lang('mm_thirdparty_ndtContractors_manage_list_title');
    	$view_data['list_tittle_small']		=	lang('mm_thirdparty_ndtContractors_manage_list_title_small');
    	
      
		$data = array(
                    'title'     	=> lang('mm_thirdparty_ndtContractors_manage_view'),
                    'content'   	=>$this->load->view('thirdparty/ndt/ndtContractorsDataList',$view_data,TRUE)                
                    );
        $this->load->view('base/template', $data); 
	}

	// datatable View
	// Last Updated by Vinitha 09/08/2016 
	function datatable1()
    {
    	$this->datatables->select('p.ndtContractors_id, p.ndtContractors_name, p.ndtContractors_email, p.ndtContractors_phone, p.ndtContractors_office_no, p.ndtContractors_fax, p.ndtContractors_website, p.ndtContractors_abbreviations, p.ndtContractors_address, u.first_name, p.ndtContractors_createOn,u1.first_name as firstname,p.ndtContractors_updateOn')
        ->from('jr_client AS p')
        ->join('users AS u', 'u.id = p.ndtContractors_createBy','left') 
        ->join('users AS u1', 'u1.id = p.ndtContractors_updateBy','left') 
        ->where('p.ndtContractors_show_status', 1)
		->edit_column('p.ndtContractors_id', get_buttons_new('$1','thirdparty/NDTContractors/'), 'p.ndtContractors_id');
		//$this->datatables->edit_column('p.page_show_status', '$1', 'get_status(p.page_show_status)');
		$this->datatables->edit_column('p.ndtContractors_createOn', '$1', 'get_date_timeformat(p.ndtContractors_createOn)');
		$this->datatables->edit_column('p.ndtContractors_updateOn', '$1', 'get_date_timeformat(p.ndtContractors_updateOn)');
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
			'p.ndtContractors_id','p.ndtContractors_name','p.ndtContractors_email','p.ndtContractors_phone','p.ndtContractors_office_no','p.ndtContractors_fax','p.ndtContractors_website','p.ndtContractors_abbreviations','p.ndtContractors_address','u.first_name','p.ndtContractors_createOn','u1.first_name as firstname','p.ndtContractors_updateOn'
		);
		$join_arrayPackage = array(
			'users AS u' => 'u.id = p.ndtContractors_createBy',
			'users AS u1' => 'u1.id = p.ndtContractors_updateBy',
		);
		$where_arrayPackage = array('p.ndtContractors_show_status' =>'1');
		$orderPackage = $sidx.' '. $sord;

		$count =   $this->mcommon->join_records_counts($fields_arrayPackage, 'jr_ndtcontractors as p', $join_arrayPackage, $where_arrayPackage, '', $orderPackage);

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
		$dataTable_Details =   $this->mcommon->join_records_all($fields_arrayPackage, 'jr_ndtcontractors as p', $join_arrayPackage, $where_arrayPackage, '', $orderPackage,'object');

		if (isset($dataTable_Details) && !empty($dataTable_Details)) {
			$i=0;
	        foreach ($dataTable_Details->result() as $dataDetail) {
	        	$responce->rows[$i]['id'] = $dataDetail->ndtContractors_id;
	        	//$responce->rows[$i]['cell']= array($dataDetail->ndtContractor_id);
	        	$responce->rows[$i]['cell']['ndtContractors_id'] = get_buttons_new($dataDetail->ndtContractors_id,'thirdparty/NDTContractors/');
	        	$responce->rows[$i]['cell']['ndtContractors_name'] = $dataDetail->ndtContractors_name;
	        	$responce->rows[$i]['cell']['ndtContractors_email'] = $dataDetail->ndtContractors_email;
	        	$responce->rows[$i]['cell']['ndtContractors_phone'] = $dataDetail->ndtContractors_phone;
	        	$responce->rows[$i]['cell']['ndtContractors_office_no'] = $dataDetail->ndtContractors_office_no;
	        	$responce->rows[$i]['cell']['ndtContractors_fax'] = $dataDetail->ndtContractors_fax;
	        	$responce->rows[$i]['cell']['ndtContractors_website'] = $dataDetail->ndtContractors_website;
	        	$responce->rows[$i]['cell']['ndtContractors_abbreviations'] = $dataDetail->ndtContractors_abbreviations;
	        	$responce->rows[$i]['cell']['ndtContractors_address'] = $dataDetail->ndtContractors_address;
	        	$responce->rows[$i]['cell']['first_name'] = $dataDetail->first_name;
	        	$responce->rows[$i]['cell']['ndtContractors_createOn'] = get_date_timeformat($dataDetail->ndtContractors_createOn);
	        	$responce->rows[$i]['cell']['firstname'] = $dataDetail->firstname;
	        	$responce->rows[$i]['cell']['ndtContractors_updateOn'] = get_date_timeformat($dataDetail->ndtContractors_updateOn);
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
        $view_data['top_tittle']			=	lang('mm_thirdparty_ndtContractors_manage_toptitle');
        $view_data['top_tittle_pergram']	=	lang('mm_thirdparty_ndtContractors_manage_pergram');

        $view_data['form_url']				=	'thirdparty/NDTContractors/create';
        $view_data['form_cancel_url']		=	'thirdparty/NDTContractors';

        $view_data['form_tittle']			=	lang('mm_thirdparty_ndtContractors_manage_form_title');
        $view_data['form_tittle_small']		=	lang('mm_thirdparty_ndtContractors_manage_form_title_small');
        $view_data['form_button_name']		=	lang('mm_thirdparty_ndtContractors_manage_form_button_name');

		$data = array(
                    'title'     	=> lang('mm_thirdparty_ndtContractors_manage_create'),
                    'content'   	=>$this->load->view('thirdparty/ndt/ndtContractorsmanagement',$view_data,TRUE)                
                    );
        $this->load->view('base/template', $data); 
	}

	// create Form
	// Last Updated by Vinitha 09/08/2016 
	public function create()
	{		
        $user   = $this->ion_auth->user()->row();
        if(isset($_POST['submit']))
		{			
			 $this->form_validation->set_rules('ndtContractors_name', lang('mm_thirdparty_ndtContractors_name'), 'required');
			 $this->form_validation->set_rules('ndtContractors_email', $this->lang->line('mm_thirdparty_ndtContractors_email'), 'required|valid_email');


            if ($this->form_validation->run() == true)
			{
				$value_array=array(
					'ndtContractors_name'		    =>	$this->input->post('ndtContractors_name'),
					'ndtContractors_email'			=>	$this->input->post('ndtContractors_email'),
					'ndtContractors_phone'=>	($this->input->post('ndtContractors_phone')!='') ? $this->input->post('ndtContractors_phone') : '',
					'ndtContractors_office_no'=>	($this->input->post('ndtContractors_office_no')!='') ? $this->input->post('ndtContractors_office_no') : '',
					'ndtContractors_fax'=>	($this->input->post('ndtContractors_fax')!='') ? $this->input->post('ndtContractors_fax') : '',
					'ndtContractors_website'=>	($this->input->post('ndtContractors_website')!='') ? $this->input->post('ndtContractors_website') : '',
					'ndtContractors_abbreviations'=>	($this->input->post('ndtContractors_abbreviations')!='') ? $this->input->post('ndtContractors_abbreviations') : '',
					'ndtContractors_address'=>	($this->input->post('ndtContractors_address')!='') ? $this->input->post('ndtContractors_address') : '',
					'ndtContractors_updateBy'			=>	$this->session->userdata('user_id'),
					'ndtContractors_updateOn'			=>	date('Y-m-d H:i:s')
				);
				if($this->input->post('ndtContractors_id')!='')
				{
					$where_array=array(
						'ndtContractors_id'				=>	$this->input->post('ndtContractors_id')
					);
					$resultupdate=$this->mcommon->common_edit('jr_ndtcontractors',$value_array,$where_array);
				}
				else
				{
					$value_array['ndtContractors_createBy'] =  $this->session->userdata('user_id');    
					$value_array['ndtContractors_createOn'] =  date('Y-m-d H:i:s'); 
					$result=$this->mcommon->common_insert('jr_ndtcontractors',$value_array);
				}
			}		
		}

		if($result)
		{
			$this->session->set_flashdata('res', lang('common_message_create'));
			$this->session->set_flashdata('res_type', 'success');
			redirect(base_url().'thirdparty/NDTContractors');
		}
		if($resultupdate)
		{
			$this->session->set_flashdata('res', lang('common_message_update'));
			$this->session->set_flashdata('res_type', 'success');
			redirect(base_url().'thirdparty/NDTContractors');
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
		$where_array=array(
			'ndtContractors_id'=>$id
		);
		$data['value']=$this->mcommon->get_fulldata('jr_ndtcontractors',$where_array);
		
		$this->addUpdateForm($data);
	}

	// Delete 
	// Last Updated by Vinitha 09/08/2016
	public function delete($id)
	{   
		$where_array=array(
			'ndtContractors_id'     =>$id
		);
		
       $delete=$this->mcommon->common_delete('jr_ndtcontractors',$where_array);
		if($delete)
		{
			$this->session->set_flashdata('res', lang('common_message_delete'));
			$this->session->set_flashdata('res_type', 'danger');
			redirect(base_url().'thirdparty/NDTContractors');
		}
		else
		{
			$this->index($data);
		}
	}
	

}



