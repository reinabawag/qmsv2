<<<<<<< HEAD
<?php 

class documentLevel extends CI_Model
{
	public function getDocumentLevel()
	{
		$this->load->database();		
		$this->db->distinct();
		$this->db->where('level !=', 'Level 0');
		$this->db->select('level');
		$result = $this->db->get('documentlevel');

		return $result->result();
	}

	public function getByLevel($level)
	{
		$this->load->database();
		$this->db->where('level', $level);
		$this->db->order_by('documentdesc');
		$this->db->select('documenttype');
		$this->db->select('documentdesc');
		$result = $this->db->get('documentlevel');

		return $result->result();
	}

	public function get_document_by_type($type)
	{
		$this->load->database();

		$this->db->order_by('recid', 'DESC');
		$this->db->where('documenttype', $type);
		$result = $this->db->get('documentlevel');

		return $result->row_array();
	}

	public function get_type_by_document($id)
	{
		$this->load->database();

		$this->db->distinct();
		$this->db->where('awcci_division.divid', $id);
		$this->db->select('documenttype');
		$this->db->join('awcci_division', 'awcci_division.div_name = masterlist.division', 'inner');
		$result = $this->db->get('masterlist');

		return $result->result();
	}

	public function get_documents()
	{
		$this->load->database();	
		$this->db->where('level !=', 'Level 0');
		$result = $this->db->get('documentlevel');

		return $result->result();
	}

	public function get_document($id)
	{
		$this->load->database();
		$this->db->where('recid', $id);
		$this->db->where('level !=', 'Level 0');
		$result = $this->db->get('documentlevel');

		return $result->row();
	}

	public function update_document_level($id)
	{
		$this->load->database();

		$data = array(
			'level' => $this->input->post('level'),
			'documentdesc' => $this->input->post('description'),
			'documenttype' => $this->input->post('type')
		);

		$this->db->where('recid', $id);
		return $this->db->update('documentlevel', $data);
	}

	public function get_document_level()
	{
		$this->load->database();		
		$this->db->distinct();
		$this->db->where('level !=', 'Level 0');
		$result = $this->db->get('documentlevel');

		return $result->result();
	}

	public function insert()
	{
		$this->load->database();

		return $this->db->insert('documentlevel', $this->input->post());
	}
=======
<?php 

class documentLevel extends CI_Model
{
	public function getDocumentLevel()
	{
		$this->load->database();		
		$this->db->distinct();
		$this->db->where('level !=', 'Level 0');
		$this->db->select('level');
		$result = $this->db->get('documentlevel');

		return $result->result();
	}

	public function getByLevel($level)
	{
		$this->load->database();
		$this->db->where('level', $level);
		$this->db->order_by('documentdesc');
		$this->db->select('documenttype');
		$this->db->select('documentdesc');
		$result = $this->db->get('documentlevel');

		return $result->result();
	}

	public function get_document_by_type($type)
	{
		$this->load->database();

		$this->db->order_by('recid', 'DESC');
		$this->db->where('documenttype', $type);
		$result = $this->db->get('documentlevel');

		return $result->row_array();
	}

	public function get_type_by_document($id)
	{
		$this->load->database();

		$this->db->distinct();
		$this->db->where('awcci_division.divid', $id);
		$this->db->select('documenttype');
		$this->db->join('awcci_division', 'awcci_division.div_name = masterlist.division', 'inner');
		$result = $this->db->get('masterlist');

		return $result->result();
	}

	public function get_documents()
	{
		$this->load->database();	
		$this->db->where('level !=', 'Level 0');
		$result = $this->db->get('documentlevel');

		return $result->result();
	}

	public function get_document($id)
	{
		$this->load->database();
		$this->db->where('recid', $id);
		$this->db->where('level !=', 'Level 0');
		$result = $this->db->get('documentlevel');

		return $result->row();
	}

	public function update_document_level($id)
	{
		$this->load->database();

		$data = array(
			'level' => $this->input->post('level'),
			'documentdesc' => $this->input->post('description'),
			'documenttype' => $this->input->post('type')
		);

		$this->db->where('recid', $id);
		return $this->db->update('documentlevel', $data);
	}

	public function get_document_level()
	{
		$this->load->database();		
		$this->db->distinct();
		$this->db->where('level !=', 'Level 0');
		$result = $this->db->get('documentlevel');

		return $result->result();
	}

	public function insert()
	{
		$this->load->database();

		return $this->db->insert('documentlevel', $this->input->post());
	}
>>>>>>> 5bdee75a1b1e3b135bca891547a60b6454600854
}