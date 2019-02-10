<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifications extends MY_AuthController {

	protected $title = 'Notifications';

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
		$this->load->model('Notification');
	}

	public function index()
	{
		$vm = new Notification();
		$notifications = $vm->getList();
		$this->renderView('notifications', ['notifications' => $notifications]);
	}

	public function redirect($id = null)
	{
		if ($id === null)
		{
			redirect(site_url('notifications/index'));
		}
		else
		{
			$vm = new Notification();
			$notification = $vm->get($id);
			if ($notification == null)
			{
				redirect(site_url('notifications/index'));
			}
			else
			{
				redirect($notification->link);
			}
		}
	}
}
