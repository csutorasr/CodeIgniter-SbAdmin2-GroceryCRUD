<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_AuthController {

	protected $title = 'Welcome';

	public function __construct()
	{
		parent::__construct();

		// Force SSL
		//$this->force_ssl();

		// Form and URL helpers always loaded (just for convenience)
		$this->load->helper('url');
		$this->load->helper('form');
	}

	public function index()
	{
		$this->renderView('welcome_message');
	}
}
