<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
		$this->load->model('common_model','mcommon',TRUE);
		$this->load->model('report_model','rmodel',TRUE);

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

	public function index()
	{  
		if(isset($_POST['daterangepicker_start']))
		{	
			$view_data['from_date']=$this->input->post('daterangepicker_start');
			$view_data['to_date']=$this->input->post('daterangepicker_end');
			$from_date=$this->input->post('daterangepicker_start');
			$to_date=$this->input->post('daterangepicker_end');
		}
		else
		{
			$view_data['from_date']=date('d/m/Y',strtotime(date('m/d/Y') . " -1 month"));
			$view_data['to_date']=date('d/m/Y');
			$to_date=date('d/m/Y');
	   		$from_date=date('d/m/Y',strtotime(date('m/d/Y') . " -1 month"));
			
		}
		//ORDER COUNT
		$view_data['orders_count']= 10;

		//ORDER AMOUNT
		$view_data['orders_amount']=20;

		//TAX AMOUNT
		$view_data['orders_tax']=30;
		
		/*
		//ORDER COUNT
		$order_cons_array = array('st_storeID' => $this->session->userdata('st_storeID'));
		$view_data['orders_count']=$this->rmodel->specific_record_counts('pzo_orders',$order_cons_array,'od_date',date('Y-m-d',strtotime(strtr($from_date, '/', '-'))),date('Y-m-d',strtotime(strtr($to_date, '/', '-'))));

		//ORDER AMOUNT
		$order_cons_array = array('st_storeID' => $this->session->userdata('st_storeID'));
		$view_data['orders_amount']=$this->rmodel->amount_sum('pzo_orders',$order_cons_array,'od_date',date('Y-m-d',strtotime(strtr($from_date, '/', '-'))),date('Y-m-d',strtotime(strtr($to_date, '/', '-'))),'od_grandTotal');

		//TAX AMOUNT
		$order_cons_array = array('st_storeID' => $this->session->userdata('st_storeID'));
		$view_data['orders_tax']=$this->rmodel->amount_sum('pzo_orders',$order_cons_array,'od_date',date('Y-m-d',strtotime(strtr($from_date, '/', '-'))),date('Y-m-d',strtotime(strtr($to_date, '/', '-'))),'od_totalTax');
		*/
		//CUSTOMER COUNTS
		$view_data['customer_count']=$this->rmodel->customer_counts(date('Y-m-d',strtotime(strtr($from_date, '/', '-'))),date('Y-m-d',strtotime(strtr($to_date, '/', '-'))));

		//$view_data['areawise']=$this->rmodel->areawise_sales($this->session->userdata('st_storeID'),'od_date',date('Y-m-d',strtotime(strtr($from_date, '/', '-'))),date('Y-m-d',strtotime(strtr($to_date, '/', '-'))));
		$view_data['areawise']=0;
		//ORDERS DATE ARRAY
		$from_date_plot=date('Y-m-d',strtotime(strtr($from_date, '/', '-')));
        $to_date_plot=date('Y-m-d',strtotime(strtr($to_date, '/', '-')));
        $startTime = strtotime( $from_date_plot.' 00:00:00' );
        $endTime = strtotime( $to_date_plot.' 23:00:00' );
        $ord_value=array();
        $ord_amout=array();
        $new_cus=array();
		for ($i = $startTime; $i <= $endTime; $i = $i + 86400) 
		{ 
			//$ord_value[date( 'Y-m-d', $i)] = $this->rmodel->specific_record_counts('pzo_orders',$order_cons_array,'od_date',date( 'Y-m-d', $i).' 00:00:00',date( 'Y-m-d', $i).' 23:59:59');
			$ord_value[date( 'Y-m-d', $i)] = 70;
			//$ord_amout[date( 'Y-m-d', $i)] = $this->rmodel->amount_sum('pzo_orders',$order_cons_array,'od_date',date( 'Y-m-d', $i).' 00:00:00',date( 'Y-m-d', $i).' 23:59:59','od_grandTotal');	
			$ord_amout[date( 'Y-m-d', $i)] = 20;	
			$new_cus[date( 'Y-m-d', $i)]=$this->rmodel->customer_counts(date( 'Y-m-d', $i).' 00:00:00',date( 'Y-m-d', $i).' 23:59:59');
		}
		$view_data['order_array_datewise']=$ord_value;
		$view_data['order_amount_datewise']=$ord_amout;
		$view_data['customers_datewise']=$new_cus;
		
		$data = array(
	                'title'     	=> lang('mm_dashboard'),
	                'content'   	=>$this->load->view('dashboard/dashboard',$view_data,TRUE)                
	                );
	    $this->load->view('base/base_dashboard', $data); 
	}

}
