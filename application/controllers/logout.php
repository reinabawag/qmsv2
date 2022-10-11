<<<<<<< HEAD
<?php
class Logout extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	public function index()
	{
		$this->session->sess_destroy();
		redirect('main');
	}
=======
<?php
class Logout extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	public function index()
	{
		$this->session->sess_destroy();
		redirect('main');
	}
>>>>>>> 5bdee75a1b1e3b135bca891547a60b6454600854
}