<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

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
        
        $this->load->helper('datatables_helper');
		$this->load->library('Datatables');
		$this->load->library('table');

		$this->load->model('common_model',	'mcommon',TRUE);
		$this->load->model('M_dropdown',	'mdropdown',TRUE);
				$this->load->library('upload');


		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');
	}

	// redirect if needed, otherwise display the user list
	public function index()
	{
		//$this->data['total_store'] = $this->mcommon->specific_record_counts('pz_store_setting',array('st_activeStatus'=>'1'));

		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('login', 'refresh');
		}
		elseif (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{

			// redirect them to the home page because they must be an administrator to view this
			//return show_error('You must be an administrator to view this page.');
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			//list the users
			$this->data['users'] = $this->ion_auth->users()->result();
			foreach ($this->data['users'] as $k => $user)
			{
				$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}
			//$this->_render_page('auth/index', $this->data);

			/*$this->data['top_tittle']			=	lang('mm_store_settings_top_title');
	        $this->data['top_tittle_pergram']	=	lang('mm_store_settings_pergram');

	        $this->data['form_url']				=	'settings/StoreSettings/update';
	        $this->data['form_tittle']			=	lang('mm_store_settings_form_title');
	        $this->data['form_tittle_small']		=	lang('mm_store_settings_form_title_small');
	        $this->data['form_button_name']		=	lang('mm_store_settings_form_button_name');

	    	$this->data['datatable_url']		=	'settings/StoreSettings/datatable';
	    	$this->data['list_tittle']		    =	lang('mm_store_settings_list_title');
	    	$this->data['list_tittle_small']	=	lang('mm_store_settings_list_title_small');

			$where_array=array(
				'st_storeID'=>$this->session->userdata{'st_storeID'}
			);
			$this->data['value']=$this->mcommon->get_fulldata('pz_store_setting',$where_array);

		    $data = array(
                    'title'     	=> lang('mm_store_settings_title_create'),
                    'content'   	=>$this->load->view('order/create_form',$this->data,TRUE)                
                    );
        	$this->load->view('base/template', $data);*/
        	redirect('dashboard','refresh');

		}
		else
		{
			// redirect them to the home page because they must be an administrator to view this
			//return show_error('You must be an administrator to view this page.');
			// set the flash data error message if there is one
			/*$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			//list the users
			$this->data['users'] = $this->ion_auth->users()->result();
			foreach ($this->data['users'] as $k => $user)
			{
				$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}
			//$this->_render_page('auth/index', $this->data);
			
			$data = array(
		                    'title'     => lang('dashboard_title'),
		                    'content'   =>$this->load->view('auth/index',$this->data,TRUE)                
		                    );
		    $this->load->view('base/base_form', $data); 
		    */
		    redirect('dashboard','refresh');
		}
	}

	// log the user in
	public function pagenotfound()
	{
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('login', 'refresh');
		}
		/*elseif (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			redirect('dashboard','refresh');
		}*/else {
			redirect('PageNotFound','refresh');
		}

	}

	// log the user in
	public function login()
	{

		$this->data['title'] = $this->lang->line('login_heading'). $this->session->tempdata('current_language');

		//validate form input
		$this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
		$this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');
		$this->form_validation->set_rules('userpermissin', 'Select', 'required');


		if ($this->form_validation->run() == true)
		{
			// check to see if the user is logging in
			// check for "remember me"
			$remember = (bool) $this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $this->input->post('userpermissin'), $remember))
			{
				//if the login is successful
				//redirect them back to the home page


				if($this->session->userdata('current_batch_id') == ''){
					$dropMenuAllHeaderProjects = $this->mdropdown->drop_menu_all_header_projects(1);
					foreach ($dropMenuAllHeaderProjects as $key => $value) {
		            	foreach ($value['sub'] as $key1 => $value1) {
		              		$this->session->set_userdata(array('current_batch_id' => $value1['batch_id']));
		              	}
		            }
				}

				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('/', 'refresh');
			}
			else
			{
				// if the login was un-successful
				//
				// redirect them back to the login page
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('login', 'refresh');
				$data = array(
		                    'title'     => "Aptitude Questions Creation",
		                    'content'   =>$this->load->view('auth/login',$this->data,TRUE)                
		                    );
		    	$this->load->view('base/base_login', $data); 
			}
		}
		else
		{

			// the user is not logging in so display the login page
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->data['user_groups']	=	$this->ion_auth->groups()->result_array();

			$this->data['identity'] = array('name' => 'identity',
				'id'    => 'identity',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('identity'),
			);
			$this->data['password'] = array('name' => 'password',
				'id'   => 'password',
				'type' => 'password',
			);

			$data = array(
		                    'title'     => "Aptitude Questions Creation",
		                    'content'   =>$this->load->view('auth/login',$this->data,TRUE)                
		                    );
		    $this->load->view('base/base_login', $data); 
		}
	}

	// log the user out
	public function logout()
	{
		$this->data['title'] = "Logout";

		// log the user out
		$logout = $this->ion_auth->logout();

		// redirect them to the login page
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect('login', 'refresh');
	}

	// change password
	public function change_password()
	{
		$this->data['top_tittle']			=	lang('mm_changepwd_top_title');
	    $this->data['top_tittle_pergram']	=	lang('mm_changepwd_pergram');

		$this->form_validation->set_rules('old', $this->lang->line('change_password_validation_old_password_label'), 'required');
		$this->form_validation->set_rules('new', $this->lang->line('change_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
		$this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login', 'refresh');
		}

		$user = $this->ion_auth->user()->row();

		if ($this->form_validation->run() == false)
		{
			// display the form
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
			$this->data['old_password'] = array(
				'name' => 'old',
				'id'   => 'old',
				'type' => 'password',
				'class' =>'form-control',
			);
			$this->data['new_password'] = array(
				'name'    => 'new',
				'id'      => 'new',
				'type'    => 'password',
				'class' =>'form-control',
				'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
			);
			$this->data['new_password_confirm'] = array(
				'name'    => 'new_confirm',
				'id'      => 'new_confirm',
				'type'    => 'password',
				'class' =>'form-control',
				'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
			);
			$this->data['user_id'] = array(
				'name'  => 'user_id',
				'id'    => 'user_id',
				'type'  => 'hidden',
				'value' => $user->id,
			);

			// render
			$data = array(
		                    'title'     => "",
		                    'content'   =>$this->load->view('auth/change_password',$this->data,TRUE)                
		                    );
		   $this->load->view('base/template', $data);
			//$this->_render_page('auth/change_password', $this->data);
		}
		else
		{
			$identity = $this->session->userdata('identity');

			$change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

			if ($change)
			{
				//if the password was successfully changed
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				$this->logout();
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('auth/change_password', 'refresh');
			}
		}
	}

	// forgot password
	public function forgot_password()
	{
		// setting validation rules by checking whether identity is username or email
		if($this->config->item('identity', 'ion_auth') != 'email' )
		{
		   $this->form_validation->set_rules('identity', $this->lang->line('forgot_password_identity_label'), 'required');
		}
		else
		{
		   $this->form_validation->set_rules('identity', $this->lang->line('forgot_password_validation_email_label'), 'required|valid_email');
		}


		if ($this->form_validation->run() == false)
		{
			$this->data['type'] = $this->config->item('identity','ion_auth');
			// setup the input
			$this->data['identity'] = array('name' => 'identity',
				'id' => 'identity',
			);

			if ( $this->config->item('identity', 'ion_auth') != 'email' ){
				$this->data['identity_label'] = $this->lang->line('forgot_password_identity_label');
			}
			else
			{
				$this->data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
			}

			// set any errors and display the form
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			//$this->_render_page('auth/forgot_password', $this->data);
			$data = array(
		                    'title'     => "",
		                    'content'   =>$this->load->view('auth/forgot_password',$this->data,TRUE)                
		                    );
		    $this->load->view('base/base_login', $data);
		}
		else
		{
			$identity_column = $this->config->item('identity','ion_auth');
			$identity = $this->ion_auth->where($identity_column, $this->input->post('identity'))->users()->row();

			if(empty($identity)) {

	            		if($this->config->item('identity', 'ion_auth') != 'email')
		            	{
		            		$this->ion_auth->set_error('forgot_password_identity_not_found');
		            	}
		            	else
		            	{
		            	   $this->ion_auth->set_error('forgot_password_email_not_found');
		            	}

		                $this->session->set_flashdata('message', $this->ion_auth->errors());
                		redirect("auth/forgot_password", 'refresh');
            		}

			// run the forgotten password method to email an activation code to the user
			$forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

			if ($forgotten)
			{
				// if there were no errors
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("auth/login", 'refresh'); //we should display a confirmation page here instead of the login page
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect("auth/forgot_password", 'refresh');
			}
		}
	}

	// reset password - final step for forgotten password
	public function reset_password($code = NULL)
	{
		if (!$code)
		{
			show_404();
		}

		$user = $this->ion_auth->forgotten_password_check($code);

		if ($user)
		{
			// if the code is valid then display the password reset form

			$this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
			$this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');

			if ($this->form_validation->run() == false)
			{
				// display the form

				// set the flash data error message if there is one
				$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

				$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
				$this->data['new_password'] = array(
					'name' => 'new',
					'id'   => 'new',
					'type' => 'password',
					'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
				);
				$this->data['new_password_confirm'] = array(
					'name'    => 'new_confirm',
					'id'      => 'new_confirm',
					'type'    => 'password',
					'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
				);
				$this->data['user_id'] = array(
					'name'  => 'user_id',
					'id'    => 'user_id',
					'type'  => 'hidden',
					'value' => $user->id,
				);
				$this->data['csrf'] = $this->_get_csrf_nonce();
				$this->data['code'] = $code;

				// render
				//$this->_render_page('auth/reset_password', $this->data);
				$data = array(
		                    'title'     => "",
		                    'content'   =>$this->load->view('auth/reset_password',$this->data,TRUE)                
		                    );
		    	$this->load->view('base/base_login', $data);
			}
			else
			{
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id'))
				{

					// something fishy might be up
					$this->ion_auth->clear_forgotten_password_code($code);

					show_error($this->lang->line('error_csrf'));

				}
				else
				{
					// finally change the password
					$identity = $user->{$this->config->item('identity', 'ion_auth')};

					$change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

					if ($change)
					{
						// if the password was successfully changed
						$this->session->set_flashdata('message', $this->ion_auth->messages());
						redirect("auth/login", 'refresh');
					}
					else
					{
						$this->session->set_flashdata('message', $this->ion_auth->errors());
						redirect('auth/reset_password/' . $code, 'refresh');
					}
				}
			}
		}
		else
		{
			// if the code is invalid then send them back to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("auth/forgot_password", 'refresh');
		}
	}


	// activate the user
	public function activate($id, $code=false)
	{
		if ($code !== false)
		{
			$activation = $this->ion_auth->activate($id, $code);
		}
		else if ($this->ion_auth->is_admin())
		{
			$activation = $this->ion_auth->activate($id);
		}

		if ($activation)
		{
			// redirect them to the auth page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("auth", 'refresh');
		}
		else
		{
			// redirect them to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("auth/forgot_password", 'refresh');
		}
	}

	// deactivate the user
	public function deactivate($id = NULL)
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			// redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');
		}

		$id = (int) $id;

		$this->load->library('form_validation');
		$this->form_validation->set_rules('confirm', $this->lang->line('deactivate_validation_confirm_label'), 'required');
		$this->form_validation->set_rules('id', $this->lang->line('deactivate_validation_user_id_label'), 'required|alpha_numeric');

		if ($this->form_validation->run() == FALSE)
		{
			// insert csrf check
			$this->data['csrf'] = $this->_get_csrf_nonce();
			$this->data['user'] = $this->ion_auth->user($id)->row();

			$this->_render_page('auth/deactivate_user', $this->data);
		}
		else
		{
			// do we really want to deactivate?
			if ($this->input->post('confirm') == 'yes')
			{
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
				{
					show_error($this->lang->line('error_csrf'));
				}

				// do we have the right userlevel?
				if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin())
				{
					$this->ion_auth->deactivate($id);
				}
			}

			// redirect them back to the auth page
			redirect('auth', 'refresh');
		}
	}

	// create a new user
	public function create_user()
    {
        $this->data['title']                =   $this->lang->line('create_user_heading');
        $this->data['top_tittle']			=	$this->lang->line('mm_user_top_title');
        $this->data['top_tittle_pergram']	=	$this->lang->line('mm_user_pergram');
      
    	
        if (!$this->ion_auth->logged_in())
        {
            redirect('auth', 'refresh');
        }
        

        $tables = $this->config->item('tables','ion_auth');
        $identity_column = $this->config->item('identity','ion_auth');
        $this->data['identity_column'] = $identity_column;

        // validate form input
        $this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required');
        $this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required');
        if($identity_column!=='email')
        {
            $this->form_validation->set_rules('identity',$this->lang->line('create_user_validation_identity_label'),'required|is_unique['.$tables['users'].'.'.$identity_column.']');
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email');
        }
        else
        {
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique[' . $tables['users'] . '.email]');
        }
        $this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'trim');
        $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

        $this->form_validation->set_rules('groups', $this->lang->line('create_user_validation_lname_label'), 'required');


        if ($this->form_validation->run() == true)
        {
            $email    = strtolower($this->input->post('email'));
            $identity = ($identity_column==='email') ? $email : $this->input->post('identity');
            $password = $this->input->post('password');

            $additional_data = array(
            	'username'   =>strtolower($this->input->post('email')),
                'first_name' => $this->input->post('first_name'),
                'last_name'  => $this->input->post('last_name'),
                'phone'      => $this->input->post('phone'),
                'st_storeID' => $this->session->userdata('st_storeID'),
                'groups'	 => $this->input->post('groups'),
            );
        }
        if ($this->form_validation->run() == true && $this->ion_auth->register($identity, $password, $email, $additional_data))
        {
            // check to see if we are creating the user
            // redirect them back to the admin page
            $this->session->set_flashdata('res', lang('common_message_create'));
			$this->session->set_flashdata('res_type', 'success');
            redirect("auth/create_user", 'refresh');
        }
        else
        {
            // display the create user form
            // set the flash data error message if there is one
           
            $this->data['first_name'] = array(
                'name'  => 'first_name',
                'id'    => 'first_name',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('first_name'),
            );
            $this->data['last_name'] = array(
                'name'  => 'last_name',
                'id'    => 'last_name',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('last_name'),
            );
            $this->data['identity'] = array(
                'name'  => 'identity',
                'id'    => 'identity',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('identity'),
            );
            $this->data['email'] = array(
                'name'  => 'email',
                'id'    => 'email',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('email'),
            );
           
            $this->data['phone'] = array(
                'name'  => 'phone',
                'id'    => 'phone',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('phone'),
            );
            $this->data['password'] = array(
                'name'  => 'password',
                'id'    => 'password',
                'type'  => 'password',
                'value' => $this->form_validation->set_value('password'),
            );
            $this->data['password_confirm'] = array(
                'name'  => 'password_confirm',
                'id'    => 'password_confirm',
                'type'  => 'password',
                'value' => $this->form_validation->set_value('password_confirm'),
            );


			$data = array(
		                    'title'     => "",
		                    'content'   =>$this->load->view('auth/create_user',$this->data,TRUE)                
		                    );
		    $this->load->view('base/template', $data); 
        }
    }

    // create a new user
	public function updateHeaderDropDown()
    {
    	if (!$this->ion_auth->logged_in())
        {
            redirect('auth', 'refresh');
        }

        if(isset($_GET['headerDropDownID'])){
        	$headerDropDownID = $_GET['headerDropDownID'];
			$this->session->set_userdata(array('current_batch_id' => $headerDropDownID));
			//$this->config->set_item('project_id', $this->session->userdata('current_project_id'));
    	}
    	return true;
    }

    // create a new user
	public function addUpdateForm($view_data)
    {
    	if (!$this->ion_auth->logged_in())
        {
            redirect('auth', 'refresh');
        }

        $this->mcommon->getCheckUserPermissionHead('Staffs add and edit',true);


        $view_data['top_tittle']			=	lang('mm_Hrm_staffs_manage_toptitle');
        $view_data['top_tittle_pergram']	=	lang('mm_Hrm_staffs_manage_pergram');

        $view_data['form_url']				=	'auth/create';
        $view_data['form_cancel_url']		=	'auth/staffsList';
        $view_data['form_tittle']			=	lang('mm_Hrm_staffs_manage_form_title');
        $view_data['form_tittle_small']		=	lang('mm_Hrm_staffs_manage_form_title_small');
        $view_data['form_button_name']		=	lang('mm_Hrm_staffs_manage_form_button_name');

    	$view_data['drop_menu_CWI']			=	$this->mcommon->drop_down_CWI();
    	$view_data['drop_menu_Staff']		=	$this->mcommon->drop_down_Staff();
    	$view_data['drop_menu_designation']	=	$this->mdropdown->drop_menu_designation();
    	$view_data['drop_menu_department']	=	$this->mdropdown->drop_menu_department();
    	$view_data['user_menu_module']		=	$this->mdropdown->drop_menu_all_menuPage();
    	$view_data['user_groups']			=	$this->ion_auth->groups()->result_array();

		$staffs_CWIVal = ($view_data['staffs_CWI']!= '') ? $view_data['staffs_CWI'] : 1; 	

    	$fields_arrayCertification = array(
    		'certification_id as Key','certification_body as Value'
    	);
		$whereArrCertification = "certification_show_status ='1' AND certification_body_type ='".$staffs_CWIVal."'";

    	$view_data['drop_down_certification']	=	$this->mcommon->Dropdown('jr_certification_body',$fields_arrayCertification,'',$whereArrCertification,'','`certification_id` ASC ','');



        $data = array(
                    'title'     	=> lang('manage_hrm_staffs_title_create'),
                    'content'   	=>$this->load->view('hrm/staffs/staffsmanagement',$view_data,TRUE)                
                    );
        $this->load->view('base/template', $data); 

        /*
        $this->data['title']                =   $this->lang->line('create_user_heading');
        $this->data['top_tittle']			=	$this->lang->line('mm_user_top_title');
        $this->data['top_tittle_pergram']	=	$this->lang->line('mm_user_pergram');
      
		$data = array(
	        'title'     => "",
	        'content'   =>$this->load->view('auth/create_user',$this->data,TRUE)                
	    );
	    $this->load->view('base/template', $data); 
    	*/
    }


    // create Form
	// Last Updated by Vinitha 09/08/2016 
	public function create()
	{		
        $user   = $this->ion_auth->user()->row();
        $this->mcommon->getCheckUserPermissionHead('Staffs add and edit',true);

        if(isset($_POST['submit']))
		{

			$this->form_validation->set_rules('staffs_employee_id', lang('mm_Hrm_staffs_employee_id'), 'required');
			$this->form_validation->set_rules('staffs_employee_name', lang('mm_Hrm_staffs_employee_name'), 'required');
			$this->form_validation->set_rules('staffs_employee_last_name', lang('mm_Hrm_staffs_employee_last_name'), 'required');
			$this->form_validation->set_rules('staffs_designation', lang('mm_Hrm_staffs_designation'), 'required');
			$this->form_validation->set_rules('staffs_gender', lang('mm_Hrm_staffs_gender'), 'required');
			//$this->form_validation->set_rules('staffs_email', lang('mm_Hrm_staffs_email'), 'required');
			//$this->form_validation->set_rules('staffs_department[]', lang('mm_Hrm_staffs_department'), 'required');

			
			if($_FILES['staffs_photo']['name']!='')
			{
				if (!file_exists(FCPATH.'/~cdn/photoStaffs/'))
		        {
				    mkdir(FCPATH.'/~cdn/photoStaffs/', 0777, true);
				}

				$config = array();
				$config['upload_path'] = '.././~cdn/photoStaffs/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '5000';
				$config['max_width'] = '3500';
				$config['max_height'] = '3500';
				$config['max_filename'] = '500';
				$config['overwrite'] = false;
				$this->upload->initialize($config);
				$this->load->library('image_lib');
				$this->load->library('upload', $config);

				if($this->upload->do_upload('staffs_photo'))
				{	
					$this->load->helper('inflector');
					$file_name = underscore($_FILES['staffs_photo']['name']);
					$config['file_name'] = $file_name;
					$image_data['message'] = $this->upload->data(); 

					$_POST[staffs_photo]="~cdn/photoStaffs/".$image_data['message']['file_name'];
				} 
				else
				{
					 $data['staffs_photo'] = $this->upload->display_errors('<div class="alert alert-error">', '</div>');
					 $this->form_validation->set_rules('staffs_photo', $this->upload->display_errors(), 'required');                
				}
			}

			if($_FILES['staffs_passport_attachment']['name']!='')
			{
				if (!file_exists(FCPATH.'/~cdn/passportAttachmentStaffs/'))
		        {
				    mkdir(FCPATH.'/~cdn/passportAttachmentStaffs/', 0777, true);
				}

				$config = array();
				$config['upload_path'] = '.././~cdn/passportAttachmentStaffs/';
				$config['allowed_types'] = 'gif|jpg|png|pdf';
				$config['max_size'] = '5000';
				$config['max_width'] = '3500';
				$config['max_height'] = '3500';
				$config['max_filename'] = '500';
				$config['overwrite'] = false;
				$this->upload->initialize($config);
				$this->load->library('image_lib');
				$this->load->library('upload', $config);

				if($this->upload->do_upload('staffs_passport_attachment'))
				{	
					$this->load->helper('inflector');
					$file_name = underscore($_FILES['staffs_passport_attachment']['name']);
					$config['file_name'] = $file_name;
					$image_data['message'] = $this->upload->data(); 

					$_POST[staffs_passport_attachment]="~cdn/passportAttachmentStaffs/".$image_data['message']['file_name'];
				} 
				else
				{
					$data['staffs_passport_attachment'] = $this->upload->display_errors('<div class="alert alert-error">', '</div>');
					$this->form_validation->set_rules('staffs_passport_attachment', $this->upload->display_errors(), 'required');                
				}
			}

			if($_FILES['staffs_iqama_attachment']['name']!='')
			{
				if (!file_exists(FCPATH.'/~cdn/iqamaAttachmentStaffs/'))
		        {
				    mkdir(FCPATH.'/~cdn/iqamaAttachmentStaffs/', 0777, true);
				}

				$config = array();
				$config['upload_path'] = '.././~cdn/iqamaAttachmentStaffs/';
				$config['allowed_types'] = 'gif|jpg|png|pdf';
				$config['max_size'] = '5000';
				$config['max_width'] = '3500';
				$config['max_height'] = '3500';
				$config['max_filename'] = '500';
				$config['overwrite'] = false;
				$this->upload->initialize($config);
				$this->load->library('image_lib');
				$this->load->library('upload', $config);

				if($this->upload->do_upload('staffs_iqama_attachment'))
				{	
					$this->load->helper('inflector');
					$file_name = underscore($_FILES['staffs_iqama_attachment']['name']);
					$config['file_name'] = $file_name;
					$image_data['message'] = $this->upload->data(); 

					$_POST[staffs_iqama_attachment]="~cdn/iqamaAttachmentStaffs/".$image_data['message']['file_name'];
				} 
				else
				{
					$data['staffs_iqama_attachment'] = $this->upload->display_errors('<div class="alert alert-error">', '</div>');
					$this->form_validation->set_rules('staffs_iqama_attachment', $this->upload->display_errors(), 'required');                
				}
			}

			if($_FILES['staffs_emplove_cv']['name']!='')
			{
				if (!file_exists(FCPATH.'/~cdn/emploveCVvStaffs/'))
		        {
				    mkdir(FCPATH.'/~cdn/emploveCVvStaffs/', 0777, true);
				}

				$config = array();
				$config['upload_path'] = '.././~cdn/emploveCVvStaffs/';
				$config['allowed_types'] = 'gif|jpg|png|pdf';
				$config['max_size'] = '5000';
				$config['max_width'] = '3500';
				$config['max_height'] = '3500';
				$config['max_filename'] = '500';
				$config['overwrite'] = false;
				$this->upload->initialize($config);
				$this->load->library('image_lib');
				$this->load->library('upload', $config);

				if($this->upload->do_upload('staffs_emplove_cv'))
				{	
					$this->load->helper('inflector');
					$file_name = underscore($_FILES['staffs_emplove_cv']['name']);
					$config['file_name'] = $file_name;
					$image_data['message'] = $this->upload->data(); 

					$_POST[staffs_emplove_cv]="~cdn/emploveCVvStaffs/".$image_data['message']['file_name'];
				} 
				else
				{
					$data['staffs_emplove_cv'] = $this->upload->display_errors('<div class="alert alert-error">', '</div>');
					$this->form_validation->set_rules('staffs_emplove_cv', $this->upload->display_errors(), 'required');                
				}
			}

			if($_FILES['staffs_cwi_attachment']['name']!='')
			{
				if (!file_exists(FCPATH.'/~cdn/cwiAttachmentStaffs/'))
		        {
				    mkdir(FCPATH.'/~cdn/cwiAttachmentStaffs/', 0777, true);
				}

				$config = array();
				$config['upload_path'] = '.././~cdn/cwiAttachmentStaffs/';
				$config['allowed_types'] = 'gif|jpg|png|pdf';
				$config['max_size'] = '5000';
				$config['max_width'] = '3500';
				$config['max_height'] = '3500';
				$config['max_filename'] = '500';
				$config['overwrite'] = false;
				$this->upload->initialize($config);
				$this->load->library('image_lib');
				$this->load->library('upload', $config);

				if($this->upload->do_upload('staffs_cwi_attachment'))
				{	
					$this->load->helper('inflector');
					$file_name = underscore($_FILES['staffs_cwi_attachment']['name']);
					$config['file_name'] = $file_name;
					$image_data['message'] = $this->upload->data(); 

					$_POST[staffs_cwi_attachment]="~cdn/cwiAttachmentStaffs/".$image_data['message']['file_name'];
				} 
				else
				{
					$data['staffs_cwi_attachment'] = $this->upload->display_errors('<div class="alert alert-error">', '</div>');
					$this->form_validation->set_rules('staffs_cwi_attachment', $this->upload->display_errors(), 'required');                
				}
			}


			if($_FILES['staffs_certificate_attachment']['name']!='')
			{
				if (!file_exists(FCPATH.'/~cdn/certificateAttachmentStaffs/'))
		        {
				    mkdir(FCPATH.'/~cdn/certificateAttachmentStaffs/', 0777, true);
				}

				$config = array();
				$config['upload_path'] = '.././~cdn/certificateAttachmentStaffs/';
				$config['allowed_types'] = 'gif|jpg|png|pdf';
				$config['max_size'] = '5000';
				$config['max_width'] = '3500';
				$config['max_height'] = '3500';
				$config['max_filename'] = '500';
				$config['overwrite'] = false;
				$this->upload->initialize($config);
				$this->load->library('image_lib');
				$this->load->library('upload', $config);

				if($this->upload->do_upload('staffs_certificate_attachment'))
				{	
					$this->load->helper('inflector');
					$file_name = underscore($_FILES['staffs_certificate_attachment']['name']);
					$config['file_name'] = $file_name;
					$image_data['message'] = $this->upload->data(); 

					$_POST[staffs_certificate_attachment]="~cdn/certificateAttachmentStaffs/".$image_data['message']['file_name'];
				} 
				else
				{
					$data['staffs_certificate_attachment'] = $this->upload->display_errors('<div class="alert alert-error">', '</div>');
					$this->form_validation->set_rules('staffs_certificate_attachment', $this->upload->display_errors(), 'required');                
				}
			}

			if($_FILES['staffs_resigned_attachment']['name']!='')
			{
				if (!file_exists(FCPATH.'/~cdn/resignedAttachmentStaffs/'))
		        {
				    mkdir(FCPATH.'/~cdn/resignedAttachmentStaffs/', 0777, true);
				}

				$config = array();
				$config['upload_path'] = '.././~cdn/resignedAttachmentStaffs/';
				$config['allowed_types'] = 'gif|jpg|png|pdf';
				$config['max_size'] = '5000';
				$config['max_width'] = '3500';
				$config['max_height'] = '3500';
				$config['max_filename'] = '500';
				$config['overwrite'] = false;
				$this->upload->initialize($config);
				$this->load->library('image_lib');
				$this->load->library('upload', $config);

				if($this->upload->do_upload('staffs_resigned_attachment'))
				{	
					$this->load->helper('inflector');
					$file_name = underscore($_FILES['staffs_resigned_attachment']['name']);
					$config['file_name'] = $file_name;
					$image_data['message'] = $this->upload->data(); 

					$_POST[staffs_resigned_attachment]="~cdn/resignedAttachmentStaffs/".$image_data['message']['file_name'];
				} 
				else
				{
					$data['staffs_resigned_attachment'] = $this->upload->display_errors('<div class="alert alert-error">', '</div>');
					$this->form_validation->set_rules('staffs_resigned_attachment', $this->upload->display_errors(), 'required');                
				}
			}			


			$tables = $this->config->item('tables','ion_auth');
	        $identity_column = $this->config->item('identity','ion_auth');
	        $data['identity_column'] = $identity_column;

	        if($this->input->post('user_id') == ''){
		        // validate form input
		        if($identity_column!=='email')
		        {
		            $this->form_validation->set_rules('identity',$this->lang->line('create_user_validation_identity_label'),'required|is_unique['.$tables['users'].'.'.$identity_column.']');
		            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email');
		        }
		        else
		        {
		            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique[' . $tables['users'] . '.email]');
		        }


	        	$this->form_validation->set_rules('user_doright[]', $this->lang->line('create_user_validation_groups_label'), 'required');
		    }

		    if ($this->input->post('user_id') != '' && $this->input->post('password') == '')
			{
	        	
	        } else {
	        	$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']');
	        	//$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
	        	//$this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');
	        }


	        if ($this->form_validation->run() == true)
	        {
	        	if($this->input->post('user_id') == ''){
		            $email    = strtolower($this->input->post('email'));
		            $identity = ($identity_column==='email') ? $email : $this->input->post('identity');
		            $password = $this->input->post('password');

		            $additional_data = array(
		            	'username'   =>strtolower($this->input->post('email')),
		                'first_name' => $this->input->post('staffs_employee_name'),
		                'last_name'  => $this->input->post('staffs_employee_last_name'),
		                'phone'      => ($this->input->post('staffs_phone_number')!='') ? $this->input->post('staffs_phone_number') : '',
		                'active'      => ($this->input->post('staffs_show_status')!='') ? $this->input->post('staffs_show_status') : '1',


		                //'st_storeID' => $this->session->userdata('st_storeID'),
		                //'groups'	 => $this->input->post('groups'),
		            );

		            if($_FILES['staffs_photo']['name']!='')
					{
						$additional_data['user_photo'] = $this->input->post('staffs_photo');
					}

		            $groups = array($this->input->post('user_doright'));

		            $inserID = $this->ion_auth->register($identity, $password, $email, $additional_data, $groups);
		        } else {
		        	$data = array(
						'first_name' => $this->input->post('staffs_employee_name'),
						'last_name'  => $this->input->post('staffs_employee_last_name'),
						'phone'      => ($this->input->post('staffs_phone_number')!='') ? $this->input->post('staffs_phone_number') : '',
						'active'      => ($this->input->post('staffs_show_status')!='') ? $this->input->post('staffs_show_status') : '1	',
					);

					if($_FILES['staffs_photo']['name']!='')
						{
							unlink(FCPATH .$this->input->post('old_staffsphoto')); 
							$data = array_merge($data, array('staffs_photo'=>$this->input->post('staffs_photo')));
						}

					// update the password if it was posted
					if ($this->input->post('password'))
					{
						$data['password'] = $this->input->post('password');
					}
					if($_FILES['staffs_photo']['name']!='')
					{
						$data['user_photo'] = $this->input->post('staffs_photo');
					}

					$inserID = $this->input->post('user_id');
					$this->ion_auth->update($inserID, $data);

		        }

	            
	            if ($inserID)
		        {
		            $value_array=array(
		            	'user_id'						=>  $inserID,

						'staffs_employee_id'			=>	$this->input->post('staffs_employee_id'),
						'staffs_employee_name'			=>	$this->input->post('staffs_employee_name'),
						'staffs_employee_middle_name'	=>	$this->input->post('staffs_employee_middle_name'),
						'staffs_employee_last_name'		=>	$this->input->post('staffs_employee_last_name'),
						'staffs_gender'  				=>	$this->input->post('staffs_gender'),
						'staffs_dob'					=>	($this->input->post('staffs_dob')!='') ? date('Y-m-d',strtotime($this->input->post('staffs_dob'))) : '',
						'staffs_nationality'			=>	($this->input->post('staffs_nationality')!='') ? $this->input->post('staffs_nationality') : '',

						
						'staffs_phone_number'			=>	($this->input->post('staffs_phone_number')!='') ? $this->input->post('staffs_phone_number') : '',
						'staffs_home_phone_number'			=>	($this->input->post('staffs_home_phone_number')!='') ? $this->input->post('staffs_home_phone_number') : '',
						'staffs_mobile_phone_number'			=>	($this->input->post('staffs_mobile_phone_number')!='') ? $this->input->post('staffs_mobile_phone_number') : '',
						'staffs_email'			=>	($this->input->post('staffs_email')!='') ? $this->input->post('staffs_email') : '',
						'staffs_alternative_email'	=>	($this->input->post('staffs_alternative_email')!='') ? $this->input->post('staffs_alternative_email') : '',
						'staffs_address'				=>	($this->input->post('staffs_address')!='') ? $this->input->post('staffs_address') : '',
						'staffs_home_address'				=>	($this->input->post('staffs_home_address')!='') ? $this->input->post('staffs_home_address') : '',

						'staffs_doj'					=>	($this->input->post('staffs_doj')!='') ? date('Y-m-d',strtotime($this->input->post('staffs_doj'))) : '',
						'staffs_designation'  			=>	$this->input->post('staffs_designation'),

						'staffs_passport_no'			=>	($this->input->post('staffs_passport_no')!='') ? $this->input->post('staffs_passport_no') : '',
						'staffs_passport_expiry_date'	=>	($this->input->post('staffs_passport_expiry_date')!='') ? date('Y-m-d',strtotime($this->input->post('staffs_passport_expiry_date'))) : '',

						'staffs_iqama_number'			=>	($this->input->post('staffs_iqama_number')!='') ? $this->input->post('staffs_iqama_number') : '',
						'staffs_iqama_expairye_date'	=>	($this->input->post('staffs_iqama_expairye_date')!='') ? date('Y-m-d',strtotime($this->input->post('staffs_iqama_expairye_date'))) : '',


						//'staffs_department'  			=>	implode(',',$this->input->post('staffs_department')),
						'staffs_CWI_body'					=>	($this->input->post('staffs_CWI')!='') ? $this->input->post('staffs_CWI') : '',
						'staffs_CWI'					=>	($this->input->post('staffs_CWI_body')!='') ? $this->input->post('staffs_CWI_body') : '',
						'staffs_CWI_no'					=>	($this->input->post('staffs_CWI_no')!='') ? $this->input->post('staffs_CWI_no') : '',
						'staffs_CWI_issued_date'		=>	($this->input->post('staffs_CWI_issued_date')!='') ? date('Y-m-d',strtotime($this->input->post('staffs_CWI_issued_date'))) : '',
						'staffs_CWI_date'				=>	($this->input->post('staffs_CWI_date')!='') ? date('Y-m-d',strtotime($this->input->post('staffs_CWI_date'))) : '',


						'staffs_certificate_no'			=>	($this->input->post('staffs_certificate_no')!='') ? $this->input->post('staffs_certificate_no') : '',
						'staffs_expiry_date'			=>	($this->input->post('staffs_expiry_date')!='') ? date('Y-m-d',strtotime($this->input->post('staffs_expiry_date'))) : '',
						'staffs_certificate_issued_by'	=>	($this->input->post('staffs_certificate_issued_by')!='') ? $this->input->post('staffs_certificate_issued_by') : '',


						'staffs_resigned_date'			=>	($this->input->post('staffs_resigned_date')!='') ? date('Y-m-d',strtotime($this->input->post('staffs_resigned_date'))) : '',
						'staffs_resigned_reason'			=>	($this->input->post('staffs_resigned_reason')!='') ? $this->input->post('staffs_resigned_reason') : '1',
						'staffs_show_status'			=>	($this->input->post('staffs_show_status')!='') ? $this->input->post('staffs_show_status') : '1',

						'staffs_updateBy'	=>	$this->session->userdata('user_id'),
						'staffs_updateOn'	=>	date('Y-m-d H:i:s')
					);

					$this->mcommon->common_delete('user_admin_group',array('user_id' => $inserID));
					$this->mcommon->common_delete('users_groups',array('user_id' => $inserID));

					foreach ($_POST['user_doright'] as $key => $value) 
					{
						if($_POST['user_doright'][$key] != ''){
							$value_array1=array(
								'user_id'			 =>	$inserID,
								'group_id'			 =>	$_POST['user_doright'][$key]
							);
							$this->mcommon->common_insert('user_admin_group',$value_array1);
							$this->mcommon->common_insert('users_groups',$value_array1);
						}

					}


					if($this->input->post('staffs_id')!='')
					{
						/*
						if($_FILES['staffs_attachment']['name']!='')
						{
							unlink(FCPATH .$this->input->post('old_staffsattachment')); 
							$value_array = array_merge($value_array, array('staffs_attachment'=>$this->input->post('staffs_attachment')));
						}
						*/

						if($_FILES['staffs_photo']['name']!='')
						{
							unlink(FCPATH .$this->input->post('old_staffsphoto')); 
							$value_array = array_merge($value_array, array('staffs_photo'=>$this->input->post('staffs_photo')));
						}
						if($_FILES['staffs_passport_attachment']['name']!='')
						{
							unlink(FCPATH .$this->input->post('old_staffspassportattachment')); 
							$value_array = array_merge($value_array, array('staffs_passport_attachment'=>$this->input->post('staffs_passport_attachment')));
						}
						if($_FILES['staffs_iqama_attachment']['name']!='')
						{
							unlink(FCPATH .$this->input->post('old_staffsiqamaattachment')); 
							$value_array = array_merge($value_array, array('staffs_iqama_attachment'=>$this->input->post('staffs_iqama_attachment')));
						}						
						if($_FILES['staffs_emplove_cv']['name']!='')
						{
							unlink(FCPATH .$this->input->post('old_staffsemplovecv')); 
							$value_array = array_merge($value_array, array('staffs_emplove_cv'=>$this->input->post('staffs_emplove_cv')));
						}												
						if($_FILES['staffs_cwi_attachment']['name']!='')
						{
							unlink(FCPATH .$this->input->post('old_staffscwiattachment')); 
							$value_array = array_merge($value_array, array('staffs_cwi_attachment'=>$this->input->post('staffs_cwi_attachment')));
						}																		
						if($_FILES['staffs_certificate_attachment']['name']!='')
						{
							unlink(FCPATH .$this->input->post('old_staffscertificateattachment')); 
							$value_array = array_merge($value_array, array('staffs_certificate_attachment'=>$this->input->post('staffs_certificate_attachment')));
						}																								
						if($_FILES['staffs_resigned_attachment']['name']!='')
						{
							unlink(FCPATH .$this->input->post('old_staffsresignedattachment')); 
							$value_array = array_merge($value_array, array('staffs_resigned_attachment'=>$this->input->post('staffs_resigned_attachment')));
						}

						$where_array=array(
							'staffs_id'			 =>	$this->input->post('staffs_id')
						);
						$resultupdate=$this->mcommon->common_edit('jr_staffs',$value_array,$where_array);

					}
					else
					{
						if($_FILES['staffs_photo']['name']!='')
						{
							$value_array['staffs_photo'] = $this->input->post('staffs_photo');
						}
						if($_FILES['staffs_passport_attachment']['name']!='')
						{
							$value_array['staffs_passport_attachment'] = $this->input->post('staffs_passport_attachment');
						}
						if($_FILES['staffs_iqama_attachment']['name']!='')
						{
							$value_array['staffs_iqama_attachment'] = $this->input->post('staffs_iqama_attachment');
						}						
						if($_FILES['staffs_emplove_cv']['name']!='')
						{
							$value_array['staffs_emplove_cv'] = $this->input->post('staffs_emplove_cv');
						}												
						if($_FILES['staffs_cwi_attachment']['name']!='')
						{
							$value_array['staffs_cwi_attachment'] = $this->input->post('staffs_cwi_attachment');
							//$value_array['staffs_cwi_attachment'] = '';
						}																		
						if($_FILES['staffs_certificate_attachment']['name']!='')
						{
							$value_array['staffs_certificate_attachment'] = $this->input->post('staffs_certificate_attachment');
						}																								
						if($_FILES['staffs_resigned_attachment']['name']!='')
						{
							$value_array['staffs_resigned_attachment'] = $this->input->post('staffs_resigned_attachment');
						}
						$value_array['staffs_createBy'] =  $this->session->userdata('user_id');    
						$value_array['staffs_createOn'] =  date('Y-m-d H:i:s');    
						$result=$this->mcommon->common_insert('jr_staffs',$value_array);
						
					}

		        }
			}
		}

		if($result)
		{
			$this->session->set_flashdata('res', lang('common_message_create'));
			$this->session->set_flashdata('res_type', 'success');
			redirect(base_url().'auth/staffsList');
		}
		if($resultupdate)
		{
			$this->session->set_flashdata('res', lang('common_message_update'));
			$this->session->set_flashdata('res_type', 'success');
			redirect(base_url().'auth/staffsList');
		}
		else
		{
			$this->addUpdateForm($data);
		}

	}

	// Form View
	// Last Updated by Vinitha 09/08/2016 
	public function staffsList($view_data)
	{  
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('login', 'refresh');
		}

		$this->mcommon->getCheckUserPermissionHead('staffs',true);

        $view_data['top_tittle']			=	lang('mm_Hrm_staffs_manage_toptitle');
        $view_data['top_tittle_pergram']	=	lang('mm_Hrm_staffs_manage_pergram');

        $view_data['add_button_url']		=	'auth/addUpdateForm';
    	$view_data['pdf_url']				=	'auth/downloadPDF';
    	$view_data['pdf_fileName']			=	lang('mm_Hrm_staffs_manage_exportPDFFileName').date('d_m_Y');    	
    	$view_data['export_url']			=	'auth/exportExcel';
    	$view_data['export_fileName']		=	lang('mm_Hrm_staffs_manage_exportPDFFileName').date('d_m_Y');
    	
    	$view_data['datatable_url']			=	'auth/datatableList';
    	$view_data['list_tittle']			=	lang('mm_Hrm_staffs_manage_list_title');
    	$view_data['list_tittle_small']		=	lang('mm_Hrm_staffs_manage_list_title_small');

    	
		$data = array(
                    'title'     	=> lang('manage_hrm_staffs_title_view'),
                    'content'   	=>$this->load->view('hrm/staffs/staffsDataList',$view_data,TRUE)                
                    );
        $this->load->view('base/template', $data); 
	}

	// datatable View
	// Last Updated by Vinitha 09/08/2016 
	function datatableList(){
        
        if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('login', 'refresh');
		}

        $page = $_POST['page']; // get the requested page
		$limit = $_POST['rows']; // get how many rows we want to have into the grid
		$sidx = $_POST['sidx']; // get index row - i.e. user click to sort
		$sord = $_POST['sord']; // get the direction
		if(!$sidx) $sidx =1;

		/*
			select CONCAT(we.welder_first_name, ' ', we.welder_first_name) AS name, we.welder_iqama_no, we.welder_no, we.welder_ref_no, ba.batch_wps, ba.batch_pqr_no, bap.welderPass_attProcess_name, bap.welderPass_attProcess_value, bap.welderPass_attProcessType_name, bap.welderPass_attProcessType_value, bap.welderPass_attPosition_name, bap.welderPass_attPosition_value, bap.welderPass_attPositionQul_name, bap.welderPass_attPositionQul_value, bap.welderPass_attJointType_name, bap.welderPass_attJointType_value, bap.welderPass_attPGrpNo_name, bap.welderPass_attPGrpNo_value, bap.welderPass_attTestDia_name, bap.welderPass_attTestDia_value, bap.welderPass_attTestThickness_name, bap.welderPass_attTestThickness_value, bap.welderPass_attRangeQul_name, bap.welderPass_attRangeQul_value, bap.welderPass_attFNo_name, bap.welderPass_attFNo_value, bap.welderPass_attRangeQul_value, bap.welderPass_attElectrodeClass_name, bap.welderPass_attElectrodeClass_value, bap.welderPass_attBacking_name, bap.welderPass_attBacking_value, wvi.vi_test_date, stf.staffs_employee_name, dsn.designation_name from jr_welder as we LEFT JOIN jr_batch as ba ON we.batchID = ba.batch_id  LEFT JOIN jr_welderpass as bap ON ba.batch_id = bap.batchID  LEFT JOIN jr_welder_vi as wvi ON we.welder_id = wvi.welderID  LEFT JOIN jr_staffs as stf ON wvi.vi_certified_welding_inspector = stf.user_id LEFT JOIN jr_designation as dsn ON stf.staffs_designation = dsn.designation_id;





			select CONCAT(we.welder_first_name, ' ', we.welder_first_name) AS name, we.welder_iqama_no, we.welder_no, we.welder_ref_no, ba.batch_wps, ba.batch_pqr_no, bap.welderPass_attProcess_name, bap.welderPass_attProcess_value, bap.welderPass_attProcessType_name, bap.welderPass_attProcessType_value, bap.welderPass_attPosition_name, bap.welderPass_attPosition_value, bap.welderPass_attPositionQul_name, bap.welderPass_attPositionQul_value, bap.welderPass_attJointType_name, bap.welderPass_attJointType_value, bap.welderPass_attPGrpNo_name, bap.welderPass_attPGrpNo_value, bap.welderPass_attTestDia_name, bap.welderPass_attTestDia_value, bap.welderPass_attTestThickness_name, bap.welderPass_attTestThickness_value, bap.welderPass_attRangeQul_name, bap.welderPass_attRangeQul_value, bap.welderPass_attFNo_name, bap.welderPass_attFNo_value, bap.welderPass_attRangeQul_value, bap.welderPass_attElectrodeClass_name, bap.welderPass_attElectrodeClass_value, bap.welderPass_attBacking_name, bap.welderPass_attBacking_value, wvi.vi_test_date, stf.staffs_employee_name, dsn.designation_name from jr_welder as we LEFT JOIN jr_batch as ba ON we.batchID = ba.batch_id  LEFT JOIN jr_welderpass as bap ON ba.batch_id = bap.batchID  LEFT JOIN jr_welder_vi as wvi ON we.welder_id = wvi.welderID  LEFT JOIN jr_staffs as stf ON wvi.vi_certified_welding_inspector = stf.user_id LEFT JOIN jr_designation as dsn ON stf.staffs_designation = dsn.designation_id;



			

			select CONCAT(we.welder_first_name, ' ', we.welder_first_name) AS name, we.welder_photo, we.welder_iqama_no, we.welder_no, we.welder_ref_no, wen.ndt_date, ndt.ndttype_name, wen.ndt_technician_name, wen.ndt_report_no, wen.ndt_issued_date from jr_welder as we LEFT JOIN jr_welder_ndt as wen ON we.welder_id = wen.welderID LEFT JOIN jr_ndttype as ndt ON wen.ndt_type = ndt.ndttype_id where we.batchID = batchID



			select CONCAT(we.welder_first_name, ' ', we.welder_first_name) AS name, we.welder_photo, we.welder_iqama_no, we.welder_no, we.welder_ref_no, wen.ndt_date, ndt.ndttype_name, wen.ndt_technician_name, wen.ndt_report_no, wen.ndt_issued_date, ttr.tr_name, wen.ndt_remarks, ba.batch_wps, ba.batch_pqr_no, ba.batch_location, wed.welderDetails_base_metal_spec, wed.welderDetails_joint_type, wed.welderDetails_weld_type, wed.welderDetails_authorisedBy, stf.staffs_employee_name, stfs.staffs_employee_name, bwpqa.batchWPQ_additional_notes, bwpqa.batchWPQ_additional_conducted_by, bwpqa.batchWPQ_additional_date from jr_welder as we LEFT JOIN jr_welder_ndt as wen ON we.welder_id = wen.welderID LEFT JOIN jr_ndttype as ndt ON wen.ndt_type = ndt.ndttype_id LEFT JOIN jr_testresult as ttr ON wen.ndt_test_result = ttr.tr_id LEFT JOIN jr_batch as ba ON we.batchID = ba.batch_id LEFT JOIN jr_welderdetails as wed ON ba.batch_id = wed.batchID LEFT JOIN jr_staffs as stf ON wed.welderDetails_WQT_witnessedBy = stf.user_id LEFT JOIN jr_welder_vi as wvi ON we.welder_id = wvi.welderID  LEFT JOIN jr_staffs as stfs ON wvi.vi_certified_welding_inspector = stfs.user_id  LEFT JOIN jr_batch_wpq_additional as bwpqa ON bwpqa.batchID = ba.batch_id where we.batchID = '';


			select CONCAT(we.welder_first_name, ' ', we.welder_first_name) AS name, we.welder_photo, we.welder_iqama_no, we.welder_no, we.welder_ref_no, wen.ndt_date, ndt.ndttype_name, wen.ndt_technician_name, wen.ndt_report_no, wen.ndt_issued_date, ttr.tr_name, wen.ndt_remarks, ba.batch_wps, ba.batch_pqr_no, ba.batch_location, wed.welderDetails_base_metal_spec, wed.welderDetails_joint_type, wed.welderDetails_weld_type, wed.welderDetails_authorisedBy, stf.staffs_employee_name, stfs.staffs_employee_name, bwpqa.batchWPQ_additional_notes, bwpqa.batchWPQ_additional_conducted_by, bwpqa.batchWPQ_additional_date, bwpq.batchWPQ_id, bwpq.batchWPQ_welding_variables, bwpq.batchWPQ_quali_test, bwpq.batchWPQ_quali_range, bwpq.batchWPQ_quali_type, bwpq.batchWPQ_quali_type_label, bwpq.batchWPQ_quali_type_label_value, bwpqt.batchWPQ_test_result_id, bwpqt.batchWPQ_test_type1, bwpqt.batchWPQ_test_type1_result from jr_welder as we LEFT JOIN jr_welder_ndt as wen ON we.welder_id = wen.welderID LEFT JOIN jr_ndttype as ndt ON wen.ndt_type = ndt.ndttype_id LEFT JOIN jr_testresult as ttr ON wen.ndt_test_result = ttr.tr_id LEFT JOIN jr_batch as ba ON we.batchID = ba.batch_id LEFT JOIN jr_welderdetails as wed ON ba.batch_id = wed.batchID LEFT JOIN jr_staffs as stf ON wed.welderDetails_WQT_witnessedBy = stf.user_id LEFT JOIN jr_welder_vi as wvi ON we.welder_id = wvi.welderID LEFT JOIN jr_staffs as stfs ON wvi.vi_certified_welding_inspector = stfs.user_id  LEFT JOIN jr_batch_wpq_additional as bwpqa ON bwpqa.batchID = ba.batch_id LEFT JOIN jr_batch_wpq_report as bwpq ON bwpq.batchID = ba.batch_id LEFT JOIN jr_batch_wpq_test_result as bwpqt ON bwpqt.batchID = ba.batch_id where we.batchID = batchID

			select bwpq.batchWPQ_id, bwpq.batchWPQ_welding_variables, bwpq.batchWPQ_quali_test, bwpq.batchWPQ_quali_range, bwpq.batchWPQ_quali_type, bwpq.batchWPQ_quali_type_label, bwpq.batchWPQ_quali_type_label_value from jr_batch_wpq_report as bwpq where bwpq.batchID = '';

			select bwpqt.batchWPQ_test_result_id, bwpqt.batchWPQ_test_type1, bwpqt.batchWPQ_test_type1_result from jr_batch_wpq_test_result as bwpqt where bwpqt.batchID = '';


		*/

		$fields_arrayPackage = array(
			'p.staffs_id','u2.active','p.user_id','p.staffs_employee_id','p.staffs_employee_name','d.designation_name','p.staffs_gender','p.staffs_dob','p.staffs_doj','p.staffs_passport_no','p.staffs_passport_expiry_date','p.staffs_nationality','p.staffs_phone_number','p.staffs_address','GROUP_CONCAT(DISTINCT  sd.department_name ORDER BY sd.department_id DESC SEPARATOR ", ") DepartmentName','p.staffs_iqama_number','p.staffs_iqama_expairye_date','p.staffs_resigned_date','p.staffs_resigned_reason','p.user_id as attachment','p.user_id as certificate','p.staffs_CWI','u.first_name','p.staffs_createOn','u1.first_name as firstname','p.staffs_updateOn','u2.email as staffs_email','GROUP_CONCAT(DISTINCT g.name ORDER BY g.id ASC SEPARATOR ", ") roleName'
		);
		$join_arrayPackage = array(
			'jr_designation AS d' => 'd.designation_id = p.staffs_designation',
			'jr_department AS sd' => 'FIND_IN_SET(sd.department_id, p.staffs_department) > 0',
			'user_admin_group AS ug' => 'ug.user_id = p.user_id',
			'groups AS g' => 'g.id = ug.group_id',
			'users AS u2' => 'u2.id = p.user_id',
			'users AS u' => 'u.id = p.staffs_createBy',
			'users AS u1' => 'u1.id = p.staffs_updateBy',
		);
		//$where_arrayPackage = array('ug.group_id !=' =>'1');
		$orderPackage = $sidx.' '. $sord;
		$groupPackage = 'ug.user_id';

		$count =   $this->mcommon->join_records_counts($fields_arrayPackage, 'jr_staffs as p', $join_arrayPackage, '', $groupPackage, $orderPackage);

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
		$dataTable_Details =   $this->mcommon->join_records_all($fields_arrayPackage, 'jr_staffs as p', $join_arrayPackage, '', $groupPackage, $orderPackage,'object');
		
		if (isset($dataTable_Details) && !empty($dataTable_Details)) {
			$i=0;
	        foreach ($dataTable_Details->result() as $dataDetail) {
	        	$responce->rows[$i]['id'] = $dataDetail->user_id;
	        	//$responce->rows[$i]['cell']= array($dataDetail->ndtContractor_id);	        	
	        	$responce->rows[$i]['cell']['edit_staffs_id'] = get_buttons_new_only_Edit($dataDetail->user_id,'auth/');
	        	$responce->rows[$i]['cell']['delete_staffs_id'] = get_buttons_new_only_Delete($dataDetail->user_id,'auth/');
	        	$responce->rows[$i]['cell']['roles_staffs_id'] = get_buttons_new_only_Roles($dataDetail->user_id,'auth/');
	        	$responce->rows[$i]['cell']['active'] = get_status($dataDetail->active);
	        	$responce->rows[$i]['cell']['staffs_employee_id'] = $dataDetail->staffs_employee_id;
	        	$responce->rows[$i]['cell']['staffs_employee_name'] = $dataDetail->staffs_employee_name;
	        	$responce->rows[$i]['cell']['designation_name'] = $dataDetail->designation_name;
	        	$responce->rows[$i]['cell']['role'] = $dataDetail->roleName;
	        	$responce->rows[$i]['cell']['staffs_gender'] = $dataDetail->staffs_gender;
	        	$responce->rows[$i]['cell']['staffs_dob'] = get_dateformat($dataDetail->staffs_dob);
	        	$responce->rows[$i]['cell']['staffs_doj'] = get_dateformat($dataDetail->staffs_doj);
	        	$responce->rows[$i]['cell']['staffs_passport_no'] = $dataDetail->staffs_passport_no;
	        	$responce->rows[$i]['cell']['staffs_passport_expiry_date'] = get_dateformat($dataDetail->staffs_passport_expiry_date);
	        	$responce->rows[$i]['cell']['staffs_nationality'] = $dataDetail->staffs_nationality;
	        	$responce->rows[$i]['cell']['staffs_email'] = $dataDetail->staffs_email;
	        	$responce->rows[$i]['cell']['staffs_phone_number'] = $dataDetail->staffs_phone_number;
	        	$responce->rows[$i]['cell']['staffs_address'] = $dataDetail->staffs_address;
	        	$responce->rows[$i]['cell']['DepartmentName'] = $dataDetail->DepartmentName;
	        	$responce->rows[$i]['cell']['staffs_iqama_number'] = $dataDetail->staffs_iqama_number;
	        	$responce->rows[$i]['cell']['staffs_iqama_expairye_date'] = get_dateformat($dataDetail->staffs_iqama_expairye_date);
	        	$responce->rows[$i]['cell']['staffs_resigned_date'] = get_dateformat($dataDetail->staffs_resigned_date);
	        	$responce->rows[$i]['cell']['staffs_resigned_reason'] = $dataDetail->staffs_resigned_reason;
	        	$responce->rows[$i]['cell']['attachment'] = get_resultCertificateAttachement($dataDetail->attachment);
	        	$responce->rows[$i]['cell']['certificate'] = get_resultCertificateDownload(base_url().'~cdn/attachementStaffs/'.$dataDetail->certificate);
	        	$responce->rows[$i]['cell']['staffs_CWI'] = $dataDetail->staffs_CWI;
	        	$responce->rows[$i]['cell']['first_name'] = $dataDetail->first_name;
	        	$responce->rows[$i]['cell']['staffs_createOn'] = get_date_timeformat($dataDetail->staffs_createOn);
	        	$responce->rows[$i]['cell']['firstname'] = $dataDetail->firstname;
	        	$responce->rows[$i]['cell']['staffs_updateOn'] = get_date_timeformat($dataDetail->staffs_updateOn);
	    		$i++;
	        }
	        //$responce->userData['page'] = $responce->page;
	        //$responce->userData['totalPages'] = $responce->total;
	        $responce->userData->totalrecords = $responce->records;
	    }  
		echo json_encode($responce);
    }

    public function operation($id)
	{
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('login', 'refresh');
		}

		$this->mcommon->getCheckUserPermissionHead('Staffs add and edit',true);


		$user = $this->ion_auth->user($id)->row();
		$currentGroups = $this->ion_auth->get_users_groups($id)->result();


		$data['user'] = $user;
		$data['groups'] = $currentGroups;

		$where_array=array(
			'user_id'=>$id
		);
		$data['value']=$this->mcommon->get_fulldata('jr_staffs',$where_array);
		$data['pageMenuModule']=$this->mcommon->get_fulldataAll('jr_staffs_menu_module',$where_array);
		$data['userGroupsModule']=$this->mcommon->get_fulldataAll('user_admin_group',$where_array);

		if(isset($data['value']) && !empty($data['value']))
		{
		    foreach($data['value']->result() as $row)
		    { 
				$data['staffs_CWI'] = $row->staffs_CWI_body;
		    }
		}

		$this->addUpdateForm($data);
	}

	// Form View
	// Last Updated by Vinitha 09/08/2016 
	public function addUpdateFormRoles($view_data)
	{  
		//$this->mcommon->getCheckUserPermissionHead('Staffs roles edit',true);
        $view_data['top_tittle']			=	lang('mm_masters_rolemodule_manage_toptitle');
        $view_data['top_tittle_pergram']	=	lang('mm_masters_rolemodule_manage_pergram');

        $view_data['form_url']				=	'auth/createRoles';
        $view_data['form_cancel_url']		=	'auth/staffsList';
        $view_data['form_tittle']			=	lang('mm_masters_rolemodule_manage_form_title');
        $view_data['form_tittle_small']		=	lang('mm_masters_rolemodule_manage_form_title_small');
        $view_data['form_button_name']		=	lang('mm_masters_rolemodule_manage_form_button_name');		

		$data = array(
                    'title'     	=> lang('mm_masters_rolemodule_manage_create'),
                    'content'   	=>$this->load->view('hrm/staffs/roleModulemanagement',$view_data,TRUE)                
                    );
        $this->load->view('base/template', $data); 
	}

	// create Form
	// Last Updated by Vinitha 09/08/2016 
	public function createRoles()
	{		
        $user   = $this->ion_auth->user()->row();
		//$this->mcommon->getCheckUserPermissionHead('Staffs roles edit',true);

        if(isset($_POST['submit']))
		{	
			if($this->input->post('id')!='')
			{
				$this->mcommon->common_delete('user_group_module', array('group_id'=>$this->input->post('id')));
				$moduleID = $this->input->post('module_id');
				if(isset($moduleID)){
					foreach ($moduleID as $key => $value) {
						foreach ($value as $key1 => $value1) {
							$value_array1=array(
								'group_id'		=>	$key,
								'module_id'		=>	$key1
							);
							$resultupdate = $this->mcommon->common_insert('user_group_module',$value_array1);
						}
					}
				}
			}
		}
		if($result)
		{
			$this->session->set_flashdata('res', lang('common_message_create'));
			$this->session->set_flashdata('res_type', 'success');
			redirect(base_url().'auth/staffsList');
		}
		if($resultupdate)
		{
			$this->session->set_flashdata('res', lang('common_message_update'));
			$this->session->set_flashdata('res_type', 'success');
			redirect(base_url().'auth/staffsList');
		}
		else
		{
			$this->addUpdateFormRoles($data);
		}
	}


	public function operationRoles($id)
	{
		//$this->mcommon->getCheckUserPermissionHead('Staffs roles edit',true);
        $data['user_group_menu_module']		=	$this->mdropdown->drop_menu_all_userGroupMenu($id);
        $data['id']		=	$id;
		$this->addUpdateFormRoles($data);
	}

    public function delete($id)
	{
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('login', 'refresh');
		}

		$this->mcommon->getCheckUserPermissionHead('Staffs delete',true);

		$where_array=array(
			'id'     =>$id
		);
		
       $delete=$this->mcommon->common_edit('users', array('active' => '0'),$where_array);
		if($delete)
		{
			$this->session->set_flashdata('res', lang('common_message_deactivate'));
			$this->session->set_flashdata('res_type', 'danger');
			redirect(base_url().'auth/staffsList');
		}
		else
		{
			$this->staffsList($data);
		}
	}

	// Last Updated by S.jegatheesh 08/08/2016 2:30 PM
	function getCertificationTypeDropdownBased()
    {
    	$certificationBody = $this->input->post('certificationBody');
        $fields_arrayCertification = array(
    		'certification_id as Key','certification_body as Value'
    	);
		$whereArrCertification = "certification_show_status ='1' AND certification_body_type ='".$certificationBody."'";

    	$drop_down_certification	=	$this->mcommon->Dropdown('jr_certification_body',$fields_arrayCertification,'',$whereArrCertification,'','`certification_id` ASC ','');

    	$attrib = 'class="form-control select2" name="staffs_CWI_body"  data-live-search="true" data-width="100%"  id="staffs_CWI_body"';
        $htmlCont.= form_dropdown('staffs_CWI_body', $drop_down_certification, set_value('staffs_CWI_body', (isset($staffs_CWI_body)) ? $staffs_CWI_body : ''), $attrib);
       
        echo $htmlCont;
    }


	 // Ajax ADD - VI Model Window 
    public function getAddUpdateDesignationModal($id = '')
    {    	
        parse_str($_POST['postdata'], $_POST);//This will convert the string to array
        if(isset($_POST['submit']))
        {

        	/*
        	$this->form_validation->set_rules('designation_name', lang('mm_Hrm_designation_name'), 'required');
			$this->form_validation->set_rules('designation_abbr', lang('mm_Hrm_designation_abbr'), 'required');

			if ($this->form_validation->run() == true)
			{*/

				$value_array=array(
					'designation_name'			=>	$this->input->post('designation_name'),
					'designation_abbr'			=>	$this->input->post('designation_abbr'),
					'designation_updateBy'		=>	$this->session->userdata('user_id'),
					'designation_updateOn'		=>	date('Y-m-d H:i:s')
				);
				if($this->input->post('designation_id')!='')
				{
					$where_array=array(
						'designation_id'			=>	$this->input->post('designation_id')
					);
					$resultupdate=$this->mcommon->common_edit('jr_designation',$value_array,$where_array);
				}
				else
				{
					$value_array['designation_createBy'] =  $this->session->userdata('user_id');    
					$value_array['designation_createOn'] =  date('Y-m-d H:i:s'); 					             
					$result=$this->mcommon->common_insert('jr_designation',$value_array);
				}
			//}
			
        }

        
		$data['drop_menu_designation']	=	$this->mdropdown->drop_menu_designation();
		$data['staffs_designation']	=	$this->input->post('selectedDesignationID');

		$view_data['datatablevalueForm'] = $this->load->view('hrm/staffs/desinationDropDownModl',$data,TRUE);

        if($result){ 
        	$view_data['result'] = 'Success';
        	$view_data['res_type'] = 'success';
        	$view_data['res'] = lang('common_message_create');
            echo json_encode($view_data);
        } elseif($resultupdate){             	
        	$view_data['result'] = 'Update';
        	$view_data['res_type'] = 'success';
        	$view_data['res'] = lang('common_message_update');
            echo json_encode($view_data);
        } elseif($delete) {            	       	
        	$view_data['result'] = 'Success';
        	$view_data['res_type'] = 'danger';
        	$view_data['res'] = lang('common_message_delete');
            echo json_encode($view_data);
        	//Error ExistRecord
        } elseif($resultExistRecord) {            	       	
        	$view_data['result'] = 'ExistRecord';
        	$view_data['res_type'] = 'warning';
        	$view_data['res'] = lang('common_message_existRecord');
            echo json_encode($view_data);
        	//Error ExistRecord
        } else{
        	if(isset($_GET['selectedDesignationID'])){
        		$where_array=array(
					'selectedDesignationID'=>$_GET['selectedDesignationID']
				);
				//$view_data['value']=$this->mcommon->get_fulldataAll('jr_equipment_additional',$where_array);
        		$view_data['selectedDesignationID'] = $_GET['selectedDesignationID'];
        	}else{
        		$view_data['selectedDesignationID'] = $this->input->post('selectedDesignationID');
        	}
           echo $this->load->view('hrm/staffs/addUpdateDesignationDataModal', $view_data,TRUE);
        }
    }

     // Ajax ADD - VI Model Window 
    public function getAddUpdateDepartmentModal($id = '')
    {    	
        parse_str($_POST['postdata'], $_POST);//This will convert the string to array
        if(isset($_POST['submit']))
        {

        	/*
        	$this->form_validation->set_rules('designation_name', lang('mm_Hrm_designation_name'), 'required');
			$this->form_validation->set_rules('designation_abbr', lang('mm_Hrm_designation_abbr'), 'required');

			if ($this->form_validation->run() == true)
			{*/

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
									'group_id'		=>	$result,
									'module_id'		=>	$value
								);
								$this->mcommon->common_insert('user_group_module',$value_array1);
							}
						}
					}
				}
			//}
			
        }

        
		$data['user_groups']			=	$this->ion_auth->groups()->result_array();
		$data['groups']					=	$this->input->post('selectedGroupsID');
		$data['user_id']				=	$this->input->post('userID');



		$view_data['datatablevalueForm'] = $this->load->view('hrm/staffs/departmentDropDownModl',$data,TRUE);

        if($result){ 
        	$view_data['result'] = 'Success';
        	$view_data['res_type'] = 'success';
        	$view_data['res'] = lang('common_message_create');
            echo json_encode($view_data);
        } elseif($resultupdate){             	
        	$view_data['result'] = 'Update';
        	$view_data['res_type'] = 'success';
        	$view_data['res'] = lang('common_message_update');
            echo json_encode($view_data);
        } elseif($delete) {            	       	
        	$view_data['result'] = 'Success';
        	$view_data['res_type'] = 'danger';
        	$view_data['res'] = lang('common_message_delete');
            echo json_encode($view_data);
        	//Error ExistRecord
        } elseif($resultExistRecord) {            	       	
        	$view_data['result'] = 'ExistRecord';
        	$view_data['res_type'] = 'warning';
        	$view_data['res'] = lang('common_message_existRecord');
            echo json_encode($view_data);
        	//Error ExistRecord
        } else{
        	if(isset($_GET['selectedGroupsID'])){
        		$where_array=array(
					'selectedGroupsID'=>$_GET['selectedGroupsID']
				);
				//$view_data['value']=$this->mcommon->get_fulldataAll('jr_equipment_additional',$where_array);
        		$view_data['selectedGroupsID'] = $_GET['selectedGroupsID'];
        		$view_data['userID'] = $_GET['userID'];
        	}else{
        		$view_data['selectedGroupsID'] = $this->input->post('selectedGroupsID');
        		$view_data['userID'] = $this->input->post('userID');
        	}


        $view_data['user_menu_module']		=	$this->mdropdown->drop_menu_all_menuPage();
	

		$view_data['role_group']=$this->mcommon->get_fulldataAll('user_group_module',array('group_id' => $view_data['groupID']));

           echo $this->load->view('hrm/staffs/addUpdateDepartmentDataModal', $view_data,TRUE);
        }
    }



	// Ajax ADD - Attachement Modal Window 
    public function getupdateAttachementModal($id = '')
    {    	
            //parse_str($_POST['postdata'], $_POST);//This will convert the string to array
            if(isset($_POST['submit']))
            {

            	$value_array=array(
					'user_id'				=>	($this->input->post('staffsID')!='') ? $this->input->post('staffsID') : '',
					'staffs_attachement_type_name'	=>	($this->input->post('staffs_attachement_type_name')!='') ? $this->input->post('staffs_attachement_type_name') : '',
					'staffs_attachement_updateBy'	=>	$this->session->userdata('user_id'),
					'staffs_attachement_updateOn'	=>	date('Y-m-d H:i:s') 
				);

				
				if($_FILES['staffs_attachement_file_name']['name']!='')
				{
					if (!file_exists(FCPATH.'/~cdn/attachementStaffs/'.$this->input->post('staffsID')))
			        {
					    mkdir(FCPATH.'/~cdn/attachementStaffs/'.$this->input->post('staffsID'), 0777, true);
					}

					$config = array();
					$config['upload_path'] = '.././~cdn/attachementStaffs/'.$this->input->post('staffsID').'/';
					$config['allowed_types'] = 'gif|jpg|png|pdf';
					$config['max_size'] = '5000';
					$config['max_width'] = '3500';
					$config['max_height'] = '3500';
					$config['max_filename'] = '500';
					$config['overwrite'] = false;
					$this->upload->initialize($config);
					$this->load->library('image_lib');
					$this->load->library('upload', $config);
					$images = array();

					if($this->upload->do_upload('staffs_attachement_file_name'))
					{	
						$this->load->helper('inflector');
						$file_name = underscore($_FILES['staffs_attachement_file_name']['name']);
						$config['file_name'] = $file_name;
						$image_data['message'] = $this->upload->data(); 

						$_POST[staffs_attachement_file_name]="~cdn/attachementStaffs/".$this->input->post('staffsID')."/".$image_data['message']['file_name'];
						$_POST[staffs_attachement_file_size]= $_FILES['staffs_attachement_file_name']['size'];
						$_POST[staffs_attachement_file_type]= $_FILES['staffs_attachement_file_name']['type'];
					} 
					else
					{
						$data['staffs_attachement_file_name'] = $this->upload->display_errors('<div class="alert alert-error">', '</div>');
						$this->form_validation->set_rules('staffs_attachement_file_name', $this->upload->display_errors(), 'required');                
					}	
				}
			
            	//$alreadyExistRecord	=	$this->mcommon->specific_record_counts('jr_welder_attachement',array('welderID'=>$this->input->post('welderID'))); 

                if($this->input->post('attachement_staffs_id')!='')
				{
					/*if($_FILES['attachement_file_name']['name']!='')
					{
	 					unlink(FCPATH .$this->input->post('old_attachement_file_name')); 
						$value_array = array_merge($value_array, array('attachement_file_name'=>$this->input->post('attachement_file_name')));
					}
					$where_array=array(
						'attachement_welder_id'		=>	$this->input->post('attachement_welder_id')
					);
					$resultupdate=$this->mcommon->common_edit('jr_welder_attachement',$value_array,$where_array);
					*/
					$resultupdate=1;
				}
				else
				{
					if($_FILES['staffs_attachement_file_name']['name']!=''){
						//if($alreadyExistRecord == '' && $alreadyExistRecord == 0 && $this->input->post('welderID')!=''){

							$value_array['staffs_attachement_file_name'] = ($this->input->post('staffs_attachement_file_name')!='') ? $this->input->post('staffs_attachement_file_name') : '';
							$value_array['staffs_attachement_file_size'] = ($this->input->post('staffs_attachement_file_size')!='') ? $this->input->post('staffs_attachement_file_size') : '';
							$value_array['staffs_attachement_file_type'] = ($this->input->post('staffs_attachement_file_type')!='') ? $this->input->post('staffs_attachement_file_type') : '';
							$value_array['staffs_attachement_createBy'] = $this->session->userdata('user_id');
							$value_array['staffs_attachement_createOn'] = date('Y-m-d H:i:s');
						            
							$result=$this->mcommon->common_insert('jr_staffs_attachement',$value_array);
						/*} else {
							$resultExistRecord=1;
						}*/
					}
				}
				
	            //}       
            }


            if($id != '')
			{
				$wheredelete_array=array(
					'attachement_staffs_id'     =>$id
				);
				$deleteImagePath	=	$this->mcommon->specific_row_value('jr_staffs_attachement',$wheredelete_array,'staffs_attachement_file_name');
		        $delete=$this->mcommon->common_delete('jr_staffs_attachement',$wheredelete_array);
		        if($delete){
		       		unlink(FCPATH .$deleteImagePath);
		        }
			}

            $view_data=array();
            //if(isset($_GET['welderID']) || isset($_POST['welderID'])){
				$fields_arrayPackage = array(
					'p.attachement_staffs_id','p.user_id','p.staffs_attachement_type_name','p.staffs_attachement_file_name','p.staffs_attachement_file_type','p.staffs_attachement_file_size','u1.first_name as firstname','p.staffs_attachement_updateOn'
				);
				$data['datatablevalue'] =   $this->mcommon->join_records_all($fields_arrayPackage, 'jr_staffs_attachement as p', array('users AS u1' => 'u1.id = p.staffs_attachement_updateBy'), array('p.staffs_attachement_show_status' =>'1'), '', '`p.attachement_staffs_id` ASC ','','array');
        	//}
				$view_data['datatablevalueForm'] = $this->load->view('hrm/staffs/updateStaffsAttachementModalDatatable',$data,TRUE);


            if($result){ 
            	$view_data['result'] = 'Success';
            	$view_data['res_type'] = 'success';
            	$view_data['res'] = lang('common_message_create');
                echo json_encode($view_data);
            } elseif($resultupdate){             	
            	$view_data['result'] = 'Update';
            	$view_data['res_type'] = 'success';
            	$view_data['res'] = lang('common_message_update');
                echo json_encode($view_data);
            } elseif($resultExistRecord) {            	       	
            	$view_data['result'] = 'ExistRecord';
            	$view_data['res_type'] = 'warning';
            	$view_data['res'] = lang('common_message_existRecord');
                echo json_encode($view_data);
            	//Error ExistRecord
            } elseif($delete) {            	       	
            	$view_data['result'] = 'Success';
            	$view_data['res_type'] = 'danger';
            	$view_data['res'] = lang('common_message_delete');
                echo json_encode($view_data);
            	//Error ExistRecord
            } else {
            	if(isset($_GET['staffsID'])){
            		//echo "dfsdfd";
            		/*$where_array=array(
						'welderID'=>$_GET['welderID']
					);
					$view_data['value']=$this->mcommon->get_fulldata('jr_welder_attachement',$where_array);
					*/
					/*$fields_arrayPackage = array(
						'p.attachement_welder_id','p.attachement_type_name','p.attachement_file_name','p.attachement_file_type','p.attachement_file_size','u1.first_name as firstname','p.attachement_updateOn'
					);
					$view_data['datatablevalue'] =   $this->mcommon->join_records_all($fields_arrayPackage, 'jr_welder_attachement as p', array('users AS u1' => 'u1.id = p.attachement_updateBy'), array('p.attachement_show_status' =>'1'), '', '`p.attachement_welder_id` ASC ','','array');*/
            		$view_data['staffsID'] = $_GET['staffsID'];
            	}else{
            		$view_data['staffsID'] = $this->input->post('staffsID');
            	}


            	/*echo "<pre>";
            	print_r($view_data);
            	echo "</pre>";
*/
                echo $this->load->view('hrm/staffs/updateStaffsAttachementModal', $view_data,TRUE);
            }
    }

    public function manage_user()
    {
    	
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('login', 'refresh');
		}
		
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			//list the users
			$this->data['users'] = $this->ion_auth->users()->result();
			foreach ($this->data['users'] as $k => $user)
			{
				$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}
		
			$this->data['top_tittle']			=	lang('mm_user_title_usermanage');
	        $this->data['top_tittle_pergram']	=	lang('mm_user_title_manage');

			$view_data['form_url']				=	'auth/create_user';
		

	    	$this->data['datatable_url']		=	'auth/datatable';
	    	$this->data['list_tittle']			=	lang('mm_user_list_title');
	    	$this->data['list_tittle_small']	=	lang('mm_user_list_title_small');

		    

	    	$tmpl = array ( 'table_open'  => '<table id="example" cellpadding="2" cellspacing="1" class="table table-striped">' );
			$this->table->set_template($tmpl); 

			$this->table->set_heading(
										lang('index_action_th'),
										lang('index_status_th'),
										lang('index_fname_th'),
										lang('index_lname_th'),
										lang('index_email_th'),
										lang('index_groups_th')
									);
		    $data = array(
                    'title'     	=> lang('mm_user_title_usermanage'),
                    'content'   	=>$this->load->view('auth/manage_user',$this->data,TRUE)                
                    );
        	$this->load->view('base/template', $data);
	
    }
    function datatable()
    {
    	$this->datatables->select('u.id, u.active, u.first_name, u.last_name, u.email,group_concat(g.name  separator ",") as `name`')
        ->from('users AS u')
        ->join('users_groups AS up', 'up.user_id = u.id','left')
        ->join('groups AS g', 'g.id = up.group_id','left')
        ->group_by('u.id')
        ->where('u.st_storeID', $this->session->userdata('st_storeID')) 
		->edit_column('u.id', get_buttons_new('$1','auth/'), 'u.id');
		$this->datatables->edit_column('u.active', '$1', 'get_user_status(u.active)');
		echo $this->datatables->generate();
    }

    public function operation1($id)
	{
		
		$this->data['title'] 				= $this->lang->line('edit_user_heading');
		 $this->data['top_tittle']			=	$this->lang->line('mm_user_manage_top_title');
        $this->data['top_tittle_pergram']	=	$this->lang->line('mm_user_manage_pergram');

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth', 'refresh');
		}

		$user = $this->ion_auth->user($id)->row();
		$groups=$this->ion_auth->groups()->result_array();
		$currentGroups = $this->ion_auth->get_users_groups($id)->result();

		// validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'required');
		$this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'required');
		$this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'required');
		
		if (isset($_POST) && !empty($_POST))
		{
			// do we have a valid request?
		 	/*if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
			{
				show_error($this->lang->line('error_csrf'));
			}
			*/


			// update the password if it was posted
			if ($this->input->post('password'))
			{
				$this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
				$this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');
			}

			if ($this->form_validation->run() === TRUE)
			{
				$data = array(
					'first_name' => $this->input->post('first_name'),
					'last_name'  => $this->input->post('last_name'),
					'phone'      => $this->input->post('phone'),
				);

				// update the password if it was posted
				if ($this->input->post('password'))
				{
					$data['password'] = $this->input->post('password');
				}


				// Only allow updating groups if user is admin
				if ($this->ion_auth->is_admin())
				{
					//Update the groups user belongs to
					$groupData = $this->input->post('groups');

					if (isset($groupData) && !empty($groupData)) {

						$this->ion_auth->remove_from_group('', $id);

						foreach ($groupData as $grp) {
							$this->ion_auth->add_to_group($grp, $id);
						}

					}
				}

			// check to see if we are updating the user
			   if($this->ion_auth->update($user->id, $data))
			    {
			    	// redirect them back to the admin page if admin, or to the base url if non admin
				    $this->session->set_flashdata('message', $this->ion_auth->messages() );
				    if ($this->ion_auth->is_admin())
					{
						redirect('auth/manage_user', 'refresh');
					}
					else
					{
						redirect('auth/manage_user', 'refresh');
					}

			    }
			    else
			    {
			    	// redirect them back to the admin page if admin, or to the base url if non admin
				    $this->session->set_flashdata('message', $this->ion_auth->errors() );
				    if ($this->ion_auth->is_admin())
					{
						redirect('auth/manage_user', 'refresh');
					}
					else
					{
						redirect('auth/manage_user', 'refresh');
					}

			    }

			}
		}

		// display the edit user form
		$this->data['csrf'] = $this->_get_csrf_nonce();

		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		// pass the user to the view
		$this->data['user'] = $user;
		$this->data['groups'] = $groups;
		$this->data['currentGroups'] = $currentGroups;

		$this->data['first_name'] = array(
			'name'  => 'first_name',
			'id'    => 'first_name',
			'type'  => 'text',
			'class' =>'form-control',
			'value' => $this->form_validation->set_value('first_name', $user->first_name),
			
		);
		$this->data['last_name'] = array(
			'name'  => 'last_name',
			'id'    => 'last_name',
			'type'  => 'text',
			'class' =>'form-control',
			'value' => $this->form_validation->set_value('last_name', $user->last_name),
			
		);
	
		$this->data['phone'] = array(
			'name'  => 'phone',
			'id'    => 'phone',
			'type'  => 'text',
			'class' =>'form-control',
			'value' => $this->form_validation->set_value('phone', $user->phone),
			
		);

		$this->data['email'] = array(
			'name'  => 'email',
			'id'    => 'email',
			'type'  => 'text',
			'class' =>'form-control',
			'readonly' =>'readonly',
			'value' => $this->form_validation->set_value('email', $user->email),

			
		);
		$this->data['password'] = array(
			'name' => 'password',
			'id'   => 'password',
			'type' => 'password',
			'class' =>'form-control'

		);
		$this->data['password_confirm'] = array(
			'name' => 'password_confirm',
			'id'   => 'password_confirm',
			'type' => 'password',
			'class' =>'form-control'
		);

		$data = array(
		                    'title'     => "",
		                    'content'   =>$this->load->view('auth/edit_user',$this->data,TRUE)                
		                    );
		$this->load->view('base/template', $data);
	}

  


	// edit a user
	/*
	public function edit_user($id)
	{
		$this->data['title'] = $this->lang->line('edit_user_heading');

		if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id)))
		{
			redirect('auth', 'refresh');
		}

		$user = $this->ion_auth->user($id)->row();
		$groups=$this->ion_auth->groups()->result_array();
		$currentGroups = $this->ion_auth->get_users_groups($id)->result();

		// validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'required');
		$this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'required');
		$this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'required');
		$this->form_validation->set_rules('company', $this->lang->line('edit_user_validation_company_label'), 'required');

		if (isset($_POST) && !empty($_POST))
		{
			// do we have a valid request?
			if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
			{
				show_error($this->lang->line('error_csrf'));
			}

			// update the password if it was posted
			if ($this->input->post('password'))
			{
				$this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
				$this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');
			}

			if ($this->form_validation->run() === TRUE)
			{
				$data = array(
					'first_name' => $this->input->post('first_name'),
					'last_name'  => $this->input->post('last_name'),
					'company'    => $this->input->post('company'),
					'phone'      => $this->input->post('phone'),
				);

				// update the password if it was posted
				if ($this->input->post('password'))
				{
					$data['password'] = $this->input->post('password');
				}



				// Only allow updating groups if user is admin
				if ($this->ion_auth->is_admin())
				{
					//Update the groups user belongs to
					$groupData = $this->input->post('groups');

					if (isset($groupData) && !empty($groupData)) {

						$this->ion_auth->remove_from_group('', $id);

						foreach ($groupData as $grp) {
							$this->ion_auth->add_to_group($grp, $id);
						}

					}
				}

			// check to see if we are updating the user
			   if($this->ion_auth->update($user->id, $data))
			    {
			    	// redirect them back to the admin page if admin, or to the base url if non admin
				    $this->session->set_flashdata('message', $this->ion_auth->messages() );
				    if ($this->ion_auth->is_admin())
					{
						redirect('auth', 'refresh');
					}
					else
					{
						redirect('/', 'refresh');
					}

			    }
			    else
			    {
			    	// redirect them back to the admin page if admin, or to the base url if non admin
				    $this->session->set_flashdata('message', $this->ion_auth->errors() );
				    if ($this->ion_auth->is_admin())
					{
						redirect('auth', 'refresh');
					}
					else
					{
						redirect('/', 'refresh');
					}

			    }

			}
		}

		// display the edit user form
		$this->data['csrf'] = $this->_get_csrf_nonce();

		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		// pass the user to the view
		$this->data['user'] = $user;
		$this->data['groups'] = $groups;
		$this->data['currentGroups'] = $currentGroups;

		$this->data['first_name'] = array(
			'name'  => 'first_name',
			'id'    => 'first_name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('first_name', $user->first_name),
		);
		$this->data['last_name'] = array(
			'name'  => 'last_name',
			'id'    => 'last_name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('last_name', $user->last_name),
		);
		$this->data['company'] = array(
			'name'  => 'company',
			'id'    => 'company',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('company', $user->company),
		);
		$this->data['phone'] = array(
			'name'  => 'phone',
			'id'    => 'phone',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('phone', $user->phone),
		);
		$this->data['password'] = array(
			'name' => 'password',
			'id'   => 'password',
			'type' => 'password'
		);
		$this->data['password_confirm'] = array(
			'name' => 'password_confirm',
			'id'   => 'password_confirm',
			'type' => 'password'
		);

		$this->_render_page('auth/edit_user', $this->data);
	}
	*/

	// create a new group
	public function create_group()
	{
		$this->data['title'] = $this->lang->line('create_group_title');

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}

		// validate form input
		$this->form_validation->set_rules('group_name', $this->lang->line('create_group_validation_name_label'), 'required|alpha_dash');

		if ($this->form_validation->run() == TRUE)
		{
			$new_group_id = $this->ion_auth->create_group($this->input->post('group_name'), $this->input->post('description'));
			if($new_group_id)
			{
				// check to see if we are creating the group
				// redirect them back to the admin page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("auth", 'refresh');
			}
		}
		else
		{
			// display the create group form
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['group_name'] = array(
				'name'  => 'group_name',
				'id'    => 'group_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('group_name'),
			);
			$this->data['description'] = array(
				'name'  => 'description',
				'id'    => 'description',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('description'),
			);

			$this->_render_page('auth/create_group', $this->data);
		}
	}

	// edit a group
	public function edit_group($id)
	{
		// bail if no group id given
		if(!$id || empty($id))
		{
			redirect('auth', 'refresh');
		}

		$this->data['title'] = $this->lang->line('edit_group_title');

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}

		$group = $this->ion_auth->group($id)->row();

		// validate form input
		$this->form_validation->set_rules('group_name', $this->lang->line('edit_group_validation_name_label'), 'required|alpha_dash');

		if (isset($_POST) && !empty($_POST))
		{
			if ($this->form_validation->run() === TRUE)
			{
				$group_update = $this->ion_auth->update_group($id, $_POST['group_name'], $_POST['group_description']);

				if($group_update)
				{
					$this->session->set_flashdata('message', $this->lang->line('edit_group_saved'));
				}
				else
				{
					$this->session->set_flashdata('message', $this->ion_auth->errors());
				}
				redirect("auth", 'refresh');
			}
		}

		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		// pass the user to the view
		$this->data['group'] = $group;

		$readonly = $this->config->item('admin_group', 'ion_auth') === $group->name ? 'readonly' : '';

		$this->data['group_name'] = array(
			'name'    => 'group_name',
			'id'      => 'group_name',
			'type'    => 'text',
			'value'   => $this->form_validation->set_value('group_name', $group->name),
			$readonly => $readonly,
		);
		$this->data['group_description'] = array(
			'name'  => 'group_description',
			'id'    => 'group_description',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('group_description', $group->description),
		);

		$this->_render_page('auth/edit_group', $this->data);
	}


	public function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key   = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
	}

	public function _valid_csrf_nonce()
	{
		if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE &&
			$this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function _render_page($view, $data=null, $returnhtml=false)//I think this makes more sense
	{

		$this->viewdata = (empty($data)) ? $this->data: $data;

		$view_html = $this->load->view($view, $this->viewdata, $returnhtml);

		if ($returnhtml) return $view_html;//This will return html on 3rd argument being true
	}

}
