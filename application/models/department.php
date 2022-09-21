<?php 

class Department extends CI_Model
{
	
	function __construct()
	{
		# code...
	}

	public function getDepartmentByPosition()
	{
		$this->load->database();

		$this->db->where('visible', true);
		$this->db->order_by('position', 'ASC');
		$this->db->select('deptid');
		$this->db->select('dept_name');
		$result = $this->db->get('awcci_department');

		return $result->result();
	}

	public function get_department_name_by_id($id)
	{
		$this->load->database();

		$this->db->where('deptid', $id);
		$this->db->select('dept_name');
		$result = $this->db->get('awcci_department');

		return $result->row_array();
	}

	public function get_type_by_document($id)
	{
		$this->load->database();

		$this->db->distinct();
		$this->db->where('awcci_department.dept_name', $id);
		$this->db->where('masterlist.status', 'active');
		$this->db->select('documentlevel.documentdesc, documentlevel.documenttype');
		$this->db->join('documentlevel', 'documentlevel.recid = masterlist.documenttype');
		$this->db->join('awcci_department', 'awcci_department.deptid = masterlist.department', 'inner');
		$result = $this->db->get('masterlist');

		return $result->result();
	}

	public function insert_department()
	{
		$this->load->database();

		return $this->db->insert('awcci_department', ['dept_name' => $this->input->post('description'), 'visible' => TRUE]);
	}

	public function update_department($id)
	{
		$this->load->database();

		$this->db->where('deptid', $id);
		return $this->db->update('awcci_department', ['dept_name' => $this->input->post('description')]);
	}

	public function delete_department($id)
	{
		$this->load->database();

		$this->db->where('deptid', $id);
		return $this->db->update('awcci_department', ['visible' => FALSE]);
	}

	public function get_department($id)
	{
		$this->load->database();
		
		$this->db->where('deptid', $id);
		return $this->db->get('awcci_department')->row();
	}

	public function get_departments()
	{
		$this->load->database();
		
		return $this->db->get('awcci_department')->result();
	}
}