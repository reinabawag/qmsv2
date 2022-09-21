<?php
/**
 * Reinhard Cire E. Abawag Users Model February 02, 2020
 */
class Users extends CI_Model
{
	public $userid;
	public $username;
	public $password;
	public $fullname;
	public $userdesc;
	public $filename;
	public $online_users;
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function check_login($username, $password)
	{
		$this->db->where(['username' => $username, 'password' => $password]);
		return $this->db->get('users')->row_array();
	}
}