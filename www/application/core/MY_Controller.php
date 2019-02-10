<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'third_party/community_auth/core/Auth_Controller.php';

class MY_Controller extends Auth_Controller
{
	public function checkLogin($role = null)
	{
		if (!$this->is_logged_in() || ($role != null && !$this->require_role($role)))
		{
			$redirect_protocol = USE_SSL ? 'https' : NULL;
			redirect( site_url( LOGIN_PAGE, $redirect_protocol ) );
		}
		define('auth_role', $this->auth_role);
	}
}

class MY_AuthController extends MY_Controller
{
	protected $title = 'Dashboard';
	protected $vm;
	protected $minRole = null;
	public function _remap($method, $params = array())
	{
		if (method_exists($this, $method))
		{
			$this->checkLogin($this->minRole);
			return call_user_func_array(array($this, $method), $params);
		}
		show_404();
	}

	public function definePageViewData()
	{
		$this->load->model('Notification');
		$this->vm = new Notification();
		$this->vm->getCommonData();
	}

	public function renderView($view, $data = NULL)
	{
		$this->definePageViewData();
		$this->load->view('page_header', ['title' => $this->title, 'vm' => $this->vm]);
		$this->load->view($view, $data);
		$this->load->view('page_footer');
	}
}
