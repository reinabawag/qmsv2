<?php 
/**
 * 
 */
class Division extends CI_Model
{
	
	function __construct()
	{
		$this->load->database();
	}

	public function getDivisions()
	{
		$this->load->database();

		$this->db->where('visible', true);
		$this->db->order_by('position', 'ASC');
		$this->db->select('divid');
		$this->db->select('div_name');
		$result = $this->db->get('awcci_division');

		return $result->result();
	}

	public function get_division_by_id($id)
	{
		$this->load->database();

		$this->db->select('div_name');
		return $this->db->get_where('awcci_division', ['divid' => $id, 'visible' => true])->row();
	}

	public function get_type_by_document($id)
	{
		$this->load->database();

		$this->db->distinct();
		$this->db->where('awcci_division.divid', $id);
		$this->db->where('masterlist.status', 'active');
		$this->db->select('documentlevel.recid, documentlevel.documenttype, documentdesc');
		$this->db->join('documentlevel', 'documentlevel.recid = masterlist.documenttype', 'inner');
		$this->db->join('awcci_division', 'awcci_division.divid = masterlist.division', 'inner');
		$result = $this->db->get('masterlist');

		return $result->result();
	}

	public function get_divisions()
	{
		return $this->db->get('awcci_division')->result();
	}

	public function get_division($id)
	{
		return $this->db->get_where('awcci_division', ['divid' => $id])->row();
	}

	public function insert_division($description)
	{
		return $this->db->insert('awcci_division', array('div_name' => $description, 'visible' => TRUE));
	}

	public function update_division($id, $description)
	{
		$this->db->where('divid', $id);
		return $this->db->update('awcci_division', ['div_name' => $description]);
	}
}