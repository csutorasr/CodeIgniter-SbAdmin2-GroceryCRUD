<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
	}

	/**
	 * This login method only serves to redirect a user to a 
	 * location once they have successfully logged in. It does
	 * not attempt to confirm that the user has permission to 
	 * be on the page they are being redirected to.
	 */
	public function login()
	{
		// Method should not be directly accessible
		if( $this->uri->uri_string() == 'auth/login')
			show_404();
		
		if ($this->is_logged_in())
		{
			$redirect_protocol = USE_SSL ? 'https' : NULL;
			redirect( site_url( $this->router->default_controller, $redirect_protocol ) );
		}

		if( strtolower( $_SERVER['REQUEST_METHOD'] ) == 'post' )
		{
			if (!$this->require_min_level(1))
			{
				$input = $this->input->post('login_string');
				$this->db->where('username', $input);
				$this->db->or_where('email', $input);
				$this->db->select('user_id');
				$user = $this->db->get('users')->row();
				if ($user != null)
				{
					$this->load->model('Notification');
					$notification = new Notification();
					$notification->add('Invalid login attempt.', '/notifications', 'sign-in-alt', 'warning', $user->user_id);
				}
			}
		}

		$this->setup_login_form();

		$html = $this->load->view('auth/page_header', '', TRUE);
		$html .= $this->load->view('auth/login_form', '', TRUE);
		$html .= $this->load->view('auth/page_footer', '', TRUE);

		echo $html;
	}

	public function logout()
	{
		$this->authentication->logout();

		// Set redirect protocol
		$redirect_protocol = USE_SSL ? 'https' : NULL;

		redirect( site_url( LOGIN_PAGE . '?' . AUTH_LOGOUT_PARAM . '=1', $redirect_protocol ) );
	}
}
