<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ECContractor extends CI_Controller
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
		$this->mcommon->getCheckUserPermissionHead('Equipment Calibration Contractor',true);
        $view_data['top_tittle']			=	lang('mm_Hrm_ECContractor_manage_toptitle');
        $view_data['top_tittle_pergram']	=	lang('mm_Hrm_ECContractor_manage_pergram');

    	$view_data['add_button_url']		=	'thirdparty/ECContractor/addUpdateForm';
    	$view_data['pdf_url']				=	'thirdparty/ECContractor/downloadPDF';
    	$view_data['pdf_fileName']			=	lang('mm_Hrm_ECContractor_exportPDFFileName').date('d_m_Y');    	
    	$view_data['export_url']			=	'thirdparty/ECContractor/exportExcel';
    	$view_data['export_fileName']		=	lang('mm_Hrm_ECContractor_exportPDFFileName').date('d_m_Y');
    	$view_data['datatable_url']			=	'thirdparty/ECContractor/datatable';
    	$view_data['list_tittle']			=	lang('mm_Hrm_ECContractor_manage_list_title');
    	$view_data['list_tittle_small']		=	lang('mm_Hrm_ECContractor_manage_list_title_small');
		$data = array(
                    'title'     	=> lang('mm_Hrm_ECContractor_manage_view'),
                    'content'   	=>$this->load->view('thirdparty/ECContractor/ECContractorDataList',$view_data,TRUE)                
                    );
        $this->load->view('base/template', $data); 
	}

	// datatable View
	// Last Updated by Vinitha 09/08/2016 
	function datatable1()
    {
    	$this->datatables->select('p.ecContractor_id, p.ecContractor_name, p.ecContractor_abbr, u.first_name, p.ecContractor_createOn,u1.first_name as firstname,p.ecContractor_updateOn')
        ->from('jr_eccontractor as p')
        ->join('users AS u', 'u.id = p.ecContractor_createBy','left') 
        ->join('users AS u1', 'u1.id = p.ecContractor_updateBy','left') 
        ->where('p.ecContractor_show_status', 1)
		->edit_column('p.ecContractor_id', get_buttons_new('$1','thirdparty/ECContractor/'), 'p.ecContractor_id');
		//$this->datatables->edit_column('p.page_show_status', '$1', 'get_status(p.page_show_status)');
		$this->datatables->edit_column('p.ecContractor_createOn', '$1', 'get_date_timeformat(p.ecContractor_createOn)');
		$this->datatables->edit_column('p.ecContractor_updateOn', '$1', 'get_date_timeformat(p.ecContractor_updateOn)');
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
			'p.ecContractor_id','p.ecContractor_name','p.ecContractor_email','p.ecContractor_abbr','p.ecContractor_phone','p.ecContractor_office_no','p.ecContractor_fax','p.ecContractor_website','p.ecContractor_photo','p.ecContractor_address','u.first_name','p.ecContractor_createOn','u1.first_name as firstname','p.ecContractor_updateOn'
		);
		$join_arrayPackage = array(
			'users AS u' => 'u.id = p.ecContractor_createBy',
			'users AS u1' => 'u1.id = p.ecContractor_updateBy',
		);
		$where_arrayPackage = array('p.ecContractor_show_status' =>'1');
		$orderPackage = $sidx.' '. $sord;

		$count =   $this->mcommon->join_records_counts($fields_arrayPackage, 'jr_eccontractor as p', $join_arrayPackage, $where_arrayPackage, '', $orderPackage);

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
		$dataTable_Details =   $this->mcommon->join_records_all($fields_arrayPackage, 'jr_eccontractor as p', $join_arrayPackage, $where_arrayPackage, '', $orderPackage,'object');

		if (isset($dataTable_Details) && !empty($dataTable_Details)) {
			$i=0;
	        foreach ($dataTable_Details->result() as $dataDetail) {
	        	$responce->rows[$i]['id'] = $dataDetail->ecContractor_id;
	        	//$responce->rows[$i]['cell']= array($dataDetail->ecContractor_id);
	        	$responce->rows[$i]['cell']['edit_ecContractor_id'] = get_buttons_new_only_Edit($dataDetail->ecContractor_id,'thirdparty/ECContractor/');
	        	$responce->rows[$i]['cell']['delete_ecContractor_id'] = get_buttons_new_only_Delete($dataDetail->ecContractor_id,'thirdparty/ECContractor/');
	        	$responce->rows[$i]['cell']['ecContractor_name'] = $dataDetail->ecContractor_name;
	        	$responce->rows[$i]['cell']['ecContractor_email'] = $dataDetail->ecContractor_email;
	        	$responce->rows[$i]['cell']['ecContractor_abbr'] = $dataDetail->ecContractor_abbr;
	        	$responce->rows[$i]['cell']['ecContractor_phone'] = $dataDetail->ecContractor_abbr;
	        	$responce->rows[$i]['cell']['ecContractor_office_no'] = $dataDetail->ecContractor_abbr;
	        	$responce->rows[$i]['cell']['ecContractor_fax'] = $dataDetail->ecContractor_abbr;
	        	$responce->rows[$i]['cell']['ecContractor_website'] = get_ancharTagLink($dataDetail->ecContractor_website);
	        	$responce->rows[$i]['cell']['ecContractor_address'] = $dataDetail->ecContractor_address;
	        	$responce->rows[$i]['cell']['ecContractor_photo'] = get_image_tag($dataDetail->ecContractor_photo);	        	$responce->rows[$i]['cell']['first_name'] = $dataDetail->first_name;
	        	$responce->rows[$i]['cell']['ecContractor_createOn'] = get_date_timeformat($dataDetail->ecContractor_createOn);
	        	$responce->rows[$i]['cell']['firstname'] = $dataDetail->firstname;
	        	$responce->rows[$i]['cell']['ecContractor_updateOn'] = get_date_timeformat($dataDetail->ecContractor_updateOn);
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
		$this->mcommon->getCheckUserPermissionHead('ECContractor add and edit',true);
        $view_data['top_tittle']			=	lang('mm_Hrm_ECContractor_manage_toptitle');
        $view_data['top_tittle_pergram']	=	lang('mm_Hrm_ECContractor_manage_pergram');

        $view_data['form_url']				=	'thirdparty/ECContractor/create';
        $view_data['form_cancel_url']		=	'thirdparty/ECContractor';
        $view_data['form_tittle']			=	lang('mm_Hrm_ECContractor_manage_form_title');
        $view_data['form_tittle_small']		=	lang('mm_Hrm_ECContractor_manage_form_title_small');
        $view_data['form_button_name']		=	lang('mm_Hrm_ECContractor_manage_form_button_name');
    	
		$data = array(
                    'title'     	=> lang('mm_Hrm_ECContractor_manage_create'),
                    'content'   	=>$this->load->view('thirdparty/ECContractor/ECContractormanagement',$view_data,TRUE)                
                    );
        $this->load->view('base/template', $data); 
	}


	// create Form
	// Last Updated by Vinitha 09/08/2016 
	public function create()
	{		
        $user   = $this->ion_auth->user()->row();
		$this->mcommon->getCheckUserPermissionHead('ECContractor add and edit',true);
        if(isset($_POST['submit']))
		{			
			$this->form_validation->set_rules('ecContractor_name', lang('mm_Hrm_ECContractor_name'), 'required');
			$this->form_validation->set_rules('ecContractor_abbr', lang('mm_Hrm_ECContractor_abbr'), 'required');
			$this->form_validation->set_rules('ecContractor_email', $this->lang->line('mm_Hrm_ECContractor_email'), 'required|valid_email');

			if($_FILES['ecContractor_photo']['name']!='')
			{
				if (!file_exists(FCPATH.'/~cdn/photoECContractor/'))
		        {
				    mkdir(FCPATH.'/~cdn/photoECContractor/', 0777, true);
				}

				$config = array();
				$config['upload_path'] = '.././~cdn/photoECContractor/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '5000';
				$config['max_width'] = '3500';
				$config['max_height'] = '3500';
				$config['max_filename'] = '500';
				$config['overwrite'] = false;
				$this->upload->initialize($config);
				$this->load->library('image_lib');
				$this->load->library('upload', $config);

				if($this->upload->do_upload('ecContractor_photo'))
				{	
					$this->load->helper('inflector');
					$file_name = underscore($_FILES['ecContractor_photo']['name']);
					$config['file_name'] = $file_name;
					$image_data['message'] = $this->upload->data(); 

					$_POST[ecContractor_photo]="~cdn/photoECContractor/".$image_data['message']['file_name'];
				} 
				else
				{
					 $data['ecContractor_photo'] = $this->upload->display_errors('<div class="alert alert-error">', '</div>');
					 $this->form_validation->set_rules('ecContractor_photo', $this->upload->display_errors(), 'required');                
				}	
			}



            if ($this->form_validation->run() == true)
			{
				$value_array=array(
					'ecContractor_name'			=>	ucwords($this->input->post('ecContractor_name')),
					'ecContractor_abbr'			=>	$this->input->post('ecContractor_abbr'),
					'ecContractor_email'			=>	$this->input->post('ecContractor_email'),
					'ecContractor_phone'			=>	($this->input->post('ecContractor_phone')!='') ? $this->input->post('ecContractor_phone') : '',
					'ecContractor_office_no'		=>	($this->input->post('ecContractor_office_no')!='') ? $this->input->post('ecContractor_office_no') : '',
					'ecContractor_fax'				=>	($this->input->post('ecContractor_fax')!='') ? $this->input->post('ecContractor_fax') : '',
					'ecContractor_website'			=>	($this->input->post('ecContractor_website')!='') ? $this->input->post('ecContractor_website') : '',
					'ecContractor_address'			=>	($this->input->post('ecContractor_address')!='') ? $this->input->post('ecContractor_address') : '',
					'ecContractor_updateBy'		=>	$this->session->userdata('user_id'),
					'ecContractor_updateOn'		=>	date('Y-m-d H:i:s')
				);
				if($this->input->post('ecContractor_id')!='')
				{
					if($_FILES['ecContractor_photo']['name']!='')
					{
						unlink(FCPATH .$this->input->post('old_ecContractorphoto')); 
						$value_array = array_merge($value_array, array('ecContractor_photo'=>$this->input->post('ecContractor_photo')));
					}
					$where_array=array(
						'ecContractor_id'			=>	$this->input->post('ecContractor_id')
					);
					$resultupdate=$this->mcommon->common_edit('jr_eccontractor',$value_array,$where_array);
				}
				else
				{
					if($_FILES['ecContractor_photo']['name']!='')
					{
						$value_array['ecContractor_photo'] = $this->input->post('ecContractor_photo');
					}
					$value_array['ecContractor_createBy'] =  $this->session->userdata('user_id');    
					$value_array['ecContractor_createOn'] =  date('Y-m-d H:i:s'); 
					$result=$this->mcommon->common_insert('jr_eccontractor',$value_array);
				}
			}		
		}

		if($result)
		{
			$this->session->set_flashdata('res', lang('common_message_create'));
			$this->session->set_flashdata('res_type', 'success');
			redirect(base_url().'thirdparty/ECContractor');
		}
		if($resultupdate)
		{
			$this->session->set_flashdata('res', lang('common_message_update'));
			$this->session->set_flashdata('res_type', 'success');
			redirect(base_url().'thirdparty/ECContractor');
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
		$this->mcommon->getCheckUserPermissionHead('ECContractor add and edit',true);

		$where_array=array(
			'ecContractor_id'=>$id
		);
		$data['value']=$this->mcommon->get_fulldata('jr_eccontractor',$where_array);
		
		$this->addUpdateForm($data);
	}

	// Delete 
	// Last Updated by Vinitha 09/08/2016
	public function delete($id)
	{   
		$this->mcommon->getCheckUserPermissionHead('ECContractor delete',true);

		$where_array=array(
			'ecContractor_id'     =>$id
		);
		
       $delete=$this->mcommon->common_delete('jr_eccontractor',$where_array);
		if($delete)
		{
			$this->session->set_flashdata('res', lang('common_message_delete'));
			$this->session->set_flashdata('res_type', 'danger');
			redirect(base_url().'thirdparty/ECContractor');
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
			'p.ecContractor_name','p.ecContractor_abbr'
		);

		$view_data['pdf_Details'] =   $this->mcommon->join_records_all($fields_arrayPackage, 'jr_eccontractor as p', '', array('p.ecContractor_show_status' =>'1'), '', '`p.ecContractor_id` DESC ','object');
		$view_data['pdf_title'] = lang('mm_Hrm_ECContractor_pdfTitle');

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

		$html=$this->load->view('thirdparty/ECContractor/ECContractor_pdf', $view_data, TRUE);

		//echo "jjj".$html;
		
		//exit();
		// output the HTML content
		$pdf->writeHTML($html, true, false, false, false, '');

		//$pdf->writeHTML($tbl, true, false, false, false, '');

		//echo ";;;;".FCPATH;
		
		$fileName = lang('mm_Hrm_ECContractor_exportPDFFileName').date('d').'-'.date('m').'-'.date('Y').'.pdf';

		//$pdf->Output(FCPATH.$fileName, 'I');
		$pdf->Output($fileName, 'D');

		//$value_array['invoice_pdf_path'] = $fileName;

		//$this->index($data);
	}

	// EXCEL 
	// Last Updated by Vinitha 09/08/2016 
	public function exportExcel() {

		$fields_arrayPackage = array(
			'p.ecContractor_name','p.ecContractor_abbr'
		);

		$view_data['export_Details'] =   $this->mcommon->join_records_all($fields_arrayPackage, 'jr_eccontractor as p', '', array('p.ecContractor_show_status' =>'1'), '', '`p.ecContractor_id` DESC ','object');
		
		$view_data['export_filename'] = lang('mm_Hrm_ECContractor_exportPDFFileName').date('d').'-'.date('m').'-'.date('Y');

		$this->load->view( 'thirdparty/ECContractor/ECContractor_export', $view_data);

	}

	

}



