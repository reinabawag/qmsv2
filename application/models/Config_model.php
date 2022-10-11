<<<<<<< HEAD
<?php
/**
 * 
 */
class Config_model extends CI_Model
{
	public $mission;
	public $vission;
	public $policy;
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get()
	{
		return $this->db->get('config')->row();
	}

	public function set()
	{
		return $this->db->update('config', $this->input->post());
	}
=======
<?php
/**
 * 
 */
class Config_model extends CI_Model
{
	public $mission;
	public $vission;
	public $policy;
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get()
	{
		return $this->db->get('config')->row();
	}

	public function set()
	{
		return $this->db->update('config', $this->input->post());
	}
>>>>>>> 5bdee75a1b1e3b135bca891547a60b6454600854
}