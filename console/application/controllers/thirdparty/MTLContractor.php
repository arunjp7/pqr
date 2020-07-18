<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MTLContractor extends CI_Controller
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
		$this->mcommon->getCheckUserPermissionHead('Mechanical Testing Lab Contractors',true);
        $view_data['top_tittle']			=	lang('mm_Hrm_MTLContractor_manage_toptitle');
        $view_data['top_tittle_pergram']	=	lang('mm_Hrm_MTLContractor_manage_pergram');

    	$view_data['add_button_url']		=	'thirdparty/MTLContractor/addUpdateForm';
    	$view_data['pdf_url']				=	'thirdparty/MTLContractor/downloadPDF';
    	$view_data['pdf_fileName']			=	lang('mm_Hrm_MTLContractor_exportPDFFileName').date('d_m_Y');    	
    	$view_data['export_url']			=	'thirdparty/MTLContractor/exportExcel';
    	$view_data['export_fileName']		=	lang('mm_Hrm_MTLContractor_exportPDFFileName').date('d_m_Y');
    	$view_data['datatable_url']			=	'thirdparty/MTLContractor/datatable';
    	$view_data['list_tittle']			=	lang('mm_Hrm_MTLContractor_manage_list_title');
    	$view_data['list_tittle_small']		=	lang('mm_Hrm_MTLContractor_manage_list_title_small');
		$data = array(
                    'title'     	=> lang('mm_Hrm_MTLContractor_manage_view'),
                    'content'   	=>$this->load->view('thirdparty/MTLContractor/MTLContractorDataList',$view_data,TRUE)                
                    );
        $this->load->view('base/template', $data); 
	}

	// datatable View
	// Last Updated by Vinitha 09/08/2016 
	function datatable1()
    {
    	$this->datatables->select('p.mtlContractor_id, p.mtlContractor_name, p.mtlContractor_abbr, u.first_name, p.mtlContractor_createOn,u1.first_name as firstname,p.mtlContractor_updateOn')
        ->from('jr_mtlcontractor as p')
        ->join('users AS u', 'u.id = p.mtlContractor_createBy','left') 
        ->join('users AS u1', 'u1.id = p.mtlContractor_updateBy','left') 
        ->where('p.mtlContractor_show_status', 1)
		->edit_column('p.mtlContractor_id', get_buttons_new('$1','thirdparty/MTLContractor/'), 'p.mtlContractor_id');
		//$this->datatables->edit_column('p.page_show_status', '$1', 'get_status(p.page_show_status)');
		$this->datatables->edit_column('p.mtlContractor_createOn', '$1', 'get_date_timeformat(p.mtlContractor_createOn)');
		$this->datatables->edit_column('p.mtlContractor_updateOn', '$1', 'get_date_timeformat(p.mtlContractor_updateOn)');
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
			'p.mtlContractor_id','p.mtlContractor_name','p.mtlContractor_email','p.mtlContractor_abbr','p.mtlContractor_phone','p.mtlContractor_office_no','p.mtlContractor_fax','p.mtlContractor_website','p.mtlContractor_photo','p.mtlContractor_address','u.first_name','p.mtlContractor_createOn','u1.first_name as firstname','p.mtlContractor_updateOn'
		);
		$join_arrayPackage = array(
			'users AS u' => 'u.id = p.mtlContractor_createBy',
			'users AS u1' => 'u1.id = p.mtlContractor_updateBy',
		);
		$where_arrayPackage = array('p.mtlContractor_show_status' =>'1');
		$orderPackage = $sidx.' '. $sord;

		$count =   $this->mcommon->join_records_counts($fields_arrayPackage, 'jr_mtlcontractor as p', $join_arrayPackage, $where_arrayPackage, '', $orderPackage);

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
		$dataTable_Details =   $this->mcommon->join_records_all($fields_arrayPackage, 'jr_mtlcontractor as p', $join_arrayPackage, $where_arrayPackage, '', $orderPackage,'object');

		if (isset($dataTable_Details) && !empty($dataTable_Details)) {
			$i=0;
	        foreach ($dataTable_Details->result() as $dataDetail) {
	        	$responce->rows[$i]['id'] = $dataDetail->mtlContractor_id;
	        	//$responce->rows[$i]['cell']= array($dataDetail->mtlContractor_id);
	        	$responce->rows[$i]['cell']['edit_mtlContractor_id'] = get_buttons_new_only_Edit($dataDetail->mtlContractor_id,'thirdparty/MTLContractor/');
	        	$responce->rows[$i]['cell']['delete_mtlContractor_id'] = get_buttons_new_only_Delete($dataDetail->mtlContractor_id,'thirdparty/MTLContractor/');
	        	$responce->rows[$i]['cell']['mtlContractor_name'] = $dataDetail->mtlContractor_name;
	        	$responce->rows[$i]['cell']['mtlContractor_email'] = $dataDetail->mtlContractor_email;
	        	$responce->rows[$i]['cell']['mtlContractor_abbr'] = $dataDetail->mtlContractor_abbr;
	        	$responce->rows[$i]['cell']['mtlContractor_phone'] = $dataDetail->mtlContractor_abbr;
	        	$responce->rows[$i]['cell']['mtlContractor_office_no'] = $dataDetail->mtlContractor_abbr;
	        	$responce->rows[$i]['cell']['mtlContractor_fax'] = $dataDetail->mtlContractor_abbr;
	        	$responce->rows[$i]['cell']['mtlContractor_website'] = get_ancharTagLink($dataDetail->mtlContractor_website);
	        	$responce->rows[$i]['cell']['mtlContractor_address'] = $dataDetail->mtlContractor_address;
	        	$responce->rows[$i]['cell']['mtlContractor_photo'] = get_image_tag($dataDetail->mtlContractor_photo);	        	$responce->rows[$i]['cell']['first_name'] = $dataDetail->first_name;
	        	$responce->rows[$i]['cell']['mtlContractor_createOn'] = get_date_timeformat($dataDetail->mtlContractor_createOn);
	        	$responce->rows[$i]['cell']['firstname'] = $dataDetail->firstname;
	        	$responce->rows[$i]['cell']['mtlContractor_updateOn'] = get_date_timeformat($dataDetail->mtlContractor_updateOn);
	    		$i++;
	        }
	        //$responce->userData['page'] = $responce->page;
	        //$responce->userData['totalPages'] = $responce->total;
	        $responce->userData->totalrecords = $responce->records;
	    }  
		echo json_encode($responce);
    }

    public function addUpdateForm($view_data)
	{  
		$this->mcommon->getCheckUserPermissionHead('MTLContractor add and edit',true);
        $view_data['top_tittle']			=	lang('mm_Hrm_MTLContractor_manage_toptitle');
        $view_data['top_tittle_pergram']	=	lang('mm_Hrm_MTLContractor_manage_pergram');

        $view_data['form_url']				=	'thirdparty/MTLContractor/create';
        $view_data['form_cancel_url']		=	'thirdparty/MTLContractor';
        $view_data['form_tittle']			=	lang('mm_Hrm_MTLContractor_manage_form_title');
        $view_data['form_tittle_small']		=	lang('mm_Hrm_MTLContractor_manage_form_title_small');
        $view_data['form_button_name']		=	lang('mm_Hrm_MTLContractor_manage_form_button_name');
    	
		$data = array(
                    'title'     	=> lang('mm_Hrm_MTLContractor_manage_create'),
                    'content'   	=>$this->load->view('thirdparty/MTLContractor/MTLContractormanagement',$view_data,TRUE)                
                    );
        $this->load->view('base/template', $data); 
	}


	// create Form
	// Last Updated by Vinitha 09/08/2016 
	public function create()
	{		
        $user   = $this->ion_auth->user()->row();
		$this->mcommon->getCheckUserPermissionHead('MTLContractor add and edit',true);
        if(isset($_POST['submit']))
		{			
			$this->form_validation->set_rules('mtlContractor_name', lang('mm_Hrm_MTLContractor_name'), 'required');
			$this->form_validation->set_rules('mtlContractor_abbr', lang('mm_Hrm_MTLContractor_abbr'), 'required');
			$this->form_validation->set_rules('mtlContractor_email', $this->lang->line('mm_Hrm_MTLContractor_email'), 'required|valid_email');

			if($_FILES['mtlContractor_photo']['name']!='')
			{
				if (!file_exists(FCPATH.'/~cdn/photoMTLContractor/'))
		        {
				    mkdir(FCPATH.'/~cdn/photoMTLContractor/', 0777, true);
				}

				$config = array();
				$config['upload_path'] = '.././~cdn/photoMTLContractor/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '5000';
				$config['max_width'] = '3500';
				$config['max_height'] = '3500';
				$config['max_filename'] = '500';
				$config['overwrite'] = false;
				$this->upload->initialize($config);
				$this->load->library('image_lib');
				$this->load->library('upload', $config);

				if($this->upload->do_upload('mtlContractor_photo'))
				{	
					$this->load->helper('inflector');
					$file_name = underscore($_FILES['mtlContractor_photo']['name']);
					$config['file_name'] = $file_name;
					$image_data['message'] = $this->upload->data(); 

					$_POST[mtlContractor_photo]="~cdn/photoMTLContractor/".$image_data['message']['file_name'];
				} 
				else
				{
					 $data['mtlContractor_photo'] = $this->upload->display_errors('<div class="alert alert-error">', '</div>');
					 $this->form_validation->set_rules('mtlContractor_photo', $this->upload->display_errors(), 'required');                
				}	
			}



            if ($this->form_validation->run() == true)
			{
				$value_array=array(
					'mtlContractor_name'			=>	ucwords($this->input->post('mtlContractor_name')),
					'mtlContractor_abbr'			=>	$this->input->post('mtlContractor_abbr'),
					'mtlContractor_email'			=>	$this->input->post('mtlContractor_email'),
					'mtlContractor_phone'			=>	($this->input->post('mtlContractor_phone')!='') ? $this->input->post('mtlContractor_phone') : '',
					'mtlContractor_office_no'		=>	($this->input->post('mtlContractor_office_no')!='') ? $this->input->post('mtlContractor_office_no') : '',
					'mtlContractor_fax'				=>	($this->input->post('mtlContractor_fax')!='') ? $this->input->post('mtlContractor_fax') : '',
					'mtlContractor_website'			=>	($this->input->post('mtlContractor_website')!='') ? $this->input->post('mtlContractor_website') : '',
					'mtlContractor_address'			=>	($this->input->post('mtlContractor_address')!='') ? $this->input->post('mtlContractor_address') : '',
					'mtlContractor_updateBy'		=>	$this->session->userdata('user_id'),
					'mtlContractor_updateOn'		=>	date('Y-m-d H:i:s')
				);
				if($this->input->post('mtlContractor_id')!='')
				{
					if($_FILES['mtlContractor_photo']['name']!='')
					{
						unlink(FCPATH .$this->input->post('old_mtlContractorphoto')); 
						$value_array = array_merge($value_array, array('mtlContractor_photo'=>$this->input->post('mtlContractor_photo')));
					}
					$where_array=array(
						'mtlContractor_id'			=>	$this->input->post('mtlContractor_id')
					);
					$resultupdate=$this->mcommon->common_edit('jr_mtlcontractor',$value_array,$where_array);
				}
				else
				{
					if($_FILES['mtlContractor_photo']['name']!='')
					{
						$value_array['mtlContractor_photo'] = $this->input->post('mtlContractor_photo');
					}
					$value_array['mtlContractor_createBy'] =  $this->session->userdata('user_id');    
					$value_array['mtlContractor_createOn'] =  date('Y-m-d H:i:s'); 
					$result=$this->mcommon->common_insert('jr_mtlcontractor',$value_array);
				}
			}		
		}

		if($result)
		{
			$this->session->set_flashdata('res', lang('common_message_create'));
			$this->session->set_flashdata('res_type', 'success');
			redirect(base_url().'thirdparty/MTLContractor');
		}
		if($resultupdate)
		{
			$this->session->set_flashdata('res', lang('common_message_update'));
			$this->session->set_flashdata('res_type', 'success');
			redirect(base_url().'thirdparty/MTLContractor');
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
		$this->mcommon->getCheckUserPermissionHead('MTLContractor add and edit',true);
		$where_array=array(
			'mtlContractor_id'=>$id
		);
		$data['value']=$this->mcommon->get_fulldata('jr_mtlcontractor',$where_array);
		
		$this->addUpdateForm($data);
	}

	// Delete 
	// Last Updated by Vinitha 09/08/2016
	public function delete($id)
	{   
		$this->mcommon->getCheckUserPermissionHead('MTLContractor delete',true);
		$where_array=array(
			'ecContractor_id'     =>$id
		);
		
       $delete=$this->mcommon->common_delete('jr_mtlcontractor',$where_array);
		if($delete)
		{
			$this->session->set_flashdata('res', lang('common_message_delete'));
			$this->session->set_flashdata('res_type', 'danger');
			redirect(base_url().'thirdparty/MTLContractor');
		}
		else
		{
			$this->index($data);
		}
	}

	// PDF 
	// Last Updated by Vinitha 09/08/2016 
	public function downloadPDF() {

		$fields_arrayPackage = array(
			'p.mtlContractor_name','p.mtlContractor_abbr'
		);

		$view_data['pdf_Details'] =   $this->mcommon->join_records_all($fields_arrayPackage, 'jr_mtlcontractor as p', '', array('p.mtlContractor_show_status' =>'1'), '', '`p.mtlContractor_id` DESC ','object');
		$view_data['pdf_title'] = lang('mm_Hrm_MTLContractor_pdfTitle');

		/* End Login User Package Details Array*/


    	$this->load->library('Pdf');
		// create new PDF document
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Nicola Asuni');
		$pdf->SetTitle('TCPDF Example 002');
		$pdf->SetSubject('TCPDF Tutorial');
		$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

		// remove default header/footer
		$pdf->setPrintHeader(false);
		//$pdf->setPrintFooter(false);

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 004', PDF_HEADER_STRING);
		//$pdf->SetFooterData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 00', PDF_HEADER_STRING);



		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins('10', '10', '10');
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__).'/lang/eng.php')) 
		{
		    require_once(dirname(__FILE__).'/lang/eng.php');
		    $pdf->setLanguageArray($l);
		}

		// ---------------------------------------------------------
		// set font
		$pdf->SetFont('dejavusans', '', 10);

		// add a page
		$pdf->AddPage();
		// create some HTML content
		//OLD $html = '<strong>'.$user_first_name.' '.$user_last_name.'</strong><br>'.$user_comp_name.'</em><br>'.$user_comp_address.'<br>Contact: '.$user_comp_contact.'<br>Website: '.$user_comp_web.'<br><table>';
		//$html= '<div style="float:left;width:50%"></div>';
		//$html.= '<div style="float:right">'.$user_first_name.'</div><div style="clear:both"></div>';

		$html=$this->load->view('thirdparty/MTLContractor/MTLContractor_pdf', $view_data, TRUE);

		//echo "jjj".$html;
		
		//exit();
		// output the HTML content
		$pdf->writeHTML($html, true, false, false, false, '');

		//$pdf->writeHTML($tbl, true, false, false, false, '');

		//echo ";;;;".FCPATH;
		
		$fileName = lang('mm_Hrm_MTLContractor_exportPDFFileName').date('d').'-'.date('m').'-'.date('Y').'.pdf';

		//$pdf->Output(FCPATH.$fileName, 'I');
		$pdf->Output($fileName, 'D');

		//$value_array['invoice_pdf_path'] = $fileName;

		//$this->index($data);
	}

	// EXCEL 
	// Last Updated by Vinitha 09/08/2016 
	public function exportExcel() {

		$fields_arrayPackage = array(
			'p.mtlContractor_name','p.mtlContractor_abbr'
		);

		$view_data['export_Details'] =   $this->mcommon->join_records_all($fields_arrayPackage, 'jr_mtlcontractor as p', '', array('p.mtlContractor_show_status' =>'1'), '', '`p.mtlContractor_id` DESC ','object');
		
		$view_data['export_filename'] = lang('mm_Hrm_MTLContractor_exportPDFFileName').date('d').'-'.date('m').'-'.date('Y');

		$this->load->view( 'thirdparty/MTLContractor/MTLContractor_export', $view_data);

	}

	

}



