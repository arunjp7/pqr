<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');
		
	}
	public function index()
	{
		if(isset($_POST['confirm']))
		{

			$user = $this->ion_auth->user()->row();
			$order_array  = array(
									'st_storeID' => $this->session->userdata('storeid'), 
									'od_date' => date('Y-m-d H:i:s'), 
									'mov_id' => $this->session->userdata('mov'), 
									'od_userId' => $user->user_id, 
									'od_email' => $user->email, 
									'od_subTotal' => $this->webmodel->cartTotalWithoutDrivingCost(), 
									'od_totalTax' =>$this->webmodel->taxTotal(),
									'od_shippingCost'=>$this->webmodel->drivingCost(),
									'od_totalOffer'=>'3.00',
									'od_grandTotal'=>$this->webmodel->cartTotal(),
									'od_paymentMethod'=>$this->input->post('od_paymentMethod'),
									'od_deliveryMethod'=>'1',
									'od_paymentStatus'=>'1',
									'od_status'=>'4',
								 );
			$od_id=$this->mcommon->common_insert('pzo_orders',$order_array);
			if($od_id)
			{
				$cartitemss=$this->webmodel->getCartItems();
				foreach ($cartitemss as $key => $value) 
				{
					$order_item_entry = array(
												'od_id' => $od_id,
												'mCard_ID'=>$value->mCard_ID,
												'mCardRate_id'=>$value->mCardRate_id,
												'catSize_id'=>$value->catSize_id,
												'od_item_price'=>$value->cart_qty*$value->mCartRate_price,
												'od_item_qty'=>$value->cart_qty,
												'od_item_isCombo'=>'0',
												'od_item_offerAmount'=>'0',
												'od_item_tax'=>$value->item_tax_percentage,
												'od_item_taxAmount'=>$value->item_tax
											 );
					//var_dump($order_item_entry);
					$this->mcommon->common_insert('pzo_order_item',$order_item_entry);
					$where_array_del = array('cart_id' => $value->cart_id);
					$this->mcommon->common_delete('pzc_cart_item',$where_array_del);
				}
				
				
				$billing_info = array(
									'od_id' => $od_id, 
									'od_billing_firstName'=>$user->first_name,
									'od_billing_lastName'=>$user->last_name,
									'od_billing_area'=>$this->input->post('od_billing_area'),
									'od_billing_city'=>$this->input->post('od_billing_city'),
									'od_billing_zipcode'=>$this->input->post('od_billing_zipcode'),
									'od_billing_phone'=>$this->input->post('od_billing_phone')
								  );
				$this->mcommon->common_insert('pzo_billing_info',$billing_info);

				$delivery_info = array(
									'od_id' => $od_id, 
									'od_delivery_firstName'=>$user->first_name,
									'od_delivery_lastName'=>$user->last_name,
									'od_delivery_area'=>$this->input->post('od_billing_area'),
									'od_delivery_city'=>$this->input->post('od_billing_city'),
									'od_delivery_zipcode'=>$this->input->post('od_billing_zipcode'),
									'od_delivery_phone'=>$this->input->post('od_billing_phone')
								  );
				$this->mcommon->common_insert('pzo_delivery_info',$delivery_info);
				redirect('checkout/success/'.$od_id,'refresh');
			}

		}
		//GET SLIEDER IMAGES
		$view_data['categories']=$this->webmodel->getAllCategories();
		$view_data['cartitems']=$this->webmodel->getCartItems();
		$view_data['cart_total']=$this->webmodel->cartTotal();

		//USER ARRAY
		$user = $this->ion_auth->user()->row();
		$user_id=$user->user_id;
		$user_add_cons_array = array('user_id' => $user_id);
		$view_data['user_addresses']=$this->mcommon->specific_fields_records_all('users_address',$user_add_cons_array);
		$pay_types_cons_array = array('st_storeID' => $this->session->userdata('storeid'),'payment_status'=>'1');
		$view_data['payment_types']=$this->mcommon->specific_fields_records_all('pzm_payment_types',$pay_types_cons_array);
		
		$data = array(
	                    'title'     => lang('website_title'),
	                    'content'   =>$this->load->view('account/myaccount',$view_data,TRUE)                
	                    );
	    $this->load->view('base/checkout_template', $data); 
	}
	public function success()
	{

		$view_data['order_id']=$this->uri->segment('3');
		
		$data = array(
	                    'title'     => lang('website_title'),
	                    'content'   =>$this->load->view('checkout/success',$view_data,TRUE)                
	                    );
	    $this->load->view('base/front_template', $data); 
	}
	public function account()
	{
		$view_data['cartitems']=$this->webmodel->getCartItems();
		$this->_render_page('auth/login', $view_data);
	}
	public function delivery()
	{
		$view_data['cartitems']=$this->webmodel->getCartItems();
		$user = $this->ion_auth->user()->row();
		$user_id=$user->user_id;
		$where_array = array('user_id' => $user_id);
		$view_data['addresses']=$this->mcommon->specific_fields_records_all('users_address',$where_array);
		$this->_render_page('checkout/delivery', $view_data);
	}
	public function notfound()
	{
		//GET SLIEDER IMAGES
		$constraint_array_slider = array('sl_status' =>'1');
		$view_data['slides']=$this->mcommon->specific_fields_records_all('pzm_website_slider',$constraint_array_slider);
		$this->_render_page('account/404', $view_data);  
	}
	
	
	public function _render_page($view, $data=null, $returnhtml=false)//I think this makes more sense
	{

		$this->viewdata = (empty($data)) ? $this->data: $data;

		$view_html = $this->load->view($view, $this->viewdata, $returnhtml);

		if ($returnhtml) return $view_html;//This will return html on 3rd argument being true
	}
}