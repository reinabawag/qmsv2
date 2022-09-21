<?php
class Login extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');

		if ($this->session->has_userdata('userid')) {
			redirect('admin');
		}
	}

	public function index()
	{
		$this->load->helper(['form']);
		$this->load->library(['form_validation']);
		$this->load->model('users');

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data['error'] = validation_errors();
			$this->load->view('public/login', $data);
		} else {
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));

			if ($user = $this->users->check_login($username, $password)) {
				$this->session->set_userdata($user);
				redirect('admin');
			} else {
				$data['error'] = '<p>Invalid login credentials!</p>';
				$this->load->view('public/login', $data);
			}
		}
	}
}