<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_AuthController {
	protected $minRole = 'admin';
	protected $title = 'Users';

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}

	public function index()
	{
		$this->load->model('examples/validation_callables');
		$crud = new grocery_CRUD();
		$crud->set_table('users');
		$crud->set_subject('User');
		$crud->required_fields('username');
		$crud->columns('username','email','auth_level','banned','last_login');
		$crud->set_read_fields('username','email','auth_level','banned','last_login');
		$crud->fields('user_id','username','email','auth_level','passwd','created_at');
		$crud->display_as('username','Username')
			 ->display_as('email','E-mail')
			 ->display_as('auth_level','Auth level')
			 ->display_as('banned','Banned')
			 ->display_as('last_login','Time of last login');
		$crud->unset_clone();
		$crud->unset_edit();
		$crud->field_type('user_id', 'hidden');
		$crud->field_type('created_at', 'hidden');
		$crud->field_type('banned', 'true_false');
		$crud->set_rules('username', 'Username', 'max_length[12]|is_unique[users.username]');
		$crud->set_rules('passwd', 'Password', [
			'trim',
			'required',
			[ 
				'_check_password_strength', 
				[ $this->validation_callables, '_check_password_strength' ] 
			]
		]);
		$crud->field_type('passwd', 'password', '');
		$crud->set_rules('email', 'E-mail', 'trim|required|valid_email|is_unique[users.email]');
		$crud->field_type('email', 'email');
		$crud->set_rules('auth_level', 'Auth level', 'required|integer|in_list[1,6,9]');
		$crud->field_type('auth_level', 'dropdown', $this->config->config['levels_and_roles']);
		$crud->callback_before_insert(array($this,'encrypt_password_callback'));
		$crud->callback_before_update(array($this,'encrypt_password_callback'));
		$crud->add_action('Activate', '', '', 'fa-thumbs-up', array($this,'approve_action_button'));
		$output = (array) $crud->render();

		$this->renderView('crud', $output);
	}

	function encrypt_password_callback($user_data, $primary_key = null) {
		$this->load->model('examples/examples_model');
		$user_data['passwd']     = $this->authentication->hash_passwd($user_data['passwd']);
		var_dump($this->examples_model->get_unused_id());
		$user_data['user_id']    = $this->examples_model->get_unused_id();
		$user_data['created_at'] = date('Y-m-d H:i:s');
		return $user_data;
	}

	function approve_action_button($primary_key, $row)
	{
		return site_url('users/approve').'?userId='.$row->user_id;
	}

	public function approve()
	{
		$userId = $this->input->get('userId', TRUE);
		if ($userId !== NULL) 
		{
			$this->db->where('user_id', $userId);
			$this->db->select('banned');
			$user = $this->db->get('users')->row();
			if ($user === null)
			{
				show_error('Bad Request', 400, "User does not exists.");
			}
			else
			{
				if ($user->banned === '1')
				{
					$this->db->set('banned', '0');
					$this->db->update('users');
				}
				redirect(site_url('users/index'));
			}
		}
		else 
		{
			show_error('Bad Request', 400, "Missing parameter.");
		}
	}
}
