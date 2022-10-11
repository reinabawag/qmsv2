<<<<<<< HEAD
<?php 
/**
 * 
 */
class Masterlist extends CI_Model
{
	public $procedureid;
	public $documenttitle;
	public $documenttype;
	public $division;
	public $department;
	public $docnum;
	public $effectivitydate;
	public $status;
	public $filename;
	public $create_date;
	
	function __construct()
	{
		$this->load->database();
		$this->load->library('session');
	}

	public function insert($filename)
	{
		$this->documenttitle = $this->input->post('documenttitle');
		$this->documenttype = $this->input->post('documenttype');
		$this->division = $this->input->post('division');
		$this->department = $this->input->post('department');
		$this->docnum = $this->input->post('docnum');
		$this->effectivitydate = date('Y-m-d', strtotime($this->input->post('date')));
		$this->status = $this->input->post('status');
		$this->filename = $filename;

		return $this->db->insert('masterlist', $this);
	}

	public function get_all_document_by_type($type)
	{
		$this->db->join('documentlevel', 'documentlevel.recid = masterlist.documenttype');
		$this->db->join('awcci_department', 'awcci_department.deptid = masterlist.department');
		$this->db->join('awcci_division', 'awcci_division.divid = masterlist.division');

		if ( ! $this->session->has_userdata('userid') && $type != 'IM')
			$this->db->where('masterlist.effectivitydate <=', date('Y-m-d'));

		return $this->db->get_where('masterlist', ['documentlevel.documenttype' => $type, 'status' => 'active'])->result();

		die($this->db->last_query());
	}

	public function get_all_document_by_division($id, $type)
	{
		if ($type != 'ALL')
			$this->db->where('documentlevel.documenttype', $type);
		$this->db->join('documentlevel', 'documentlevel.recid = masterlist.documenttype');
		$this->db->join('awcci_department', 'awcci_department.deptid = masterlist.department');
		$this->db->join('awcci_division', 'awcci_division.divid = masterlist.division');

		if ( ! $this->session->has_userdata('userid') || $type != 'IM')
		$this->db->where('masterlist.effectivitydate <=', date('Y-m-d'));

		return $this->db->get_where('masterlist', ['awcci_division.divid' => $id, 'status' => 'active'])->result();

		die($this->db->last_query());
	}

	public function get_all_document_by_department($id, $type)
	{
		if ($type != 'ALL')
			$this->db->where('documentlevel.documenttype', $type);
		$this->db->select('procedureid, documenttitle, documentlevel.documentdesc, div_name, dept_name, docnum, effectivitydate, status, filename');
		$this->db->join('documentlevel', 'documentlevel.recid = masterlist.documenttype');
		$this->db->join('awcci_department', 'awcci_department.deptid = masterlist.department');
		$this->db->join('awcci_division', 'awcci_division.divid = masterlist.division');

		if ( ! $this->session->has_userdata('userid'))
			$this->db->where('masterlist.effectivitydate <=', date('Y-m-d'));

		return $this->db->get_where('masterlist', ['awcci_department.deptid' => $id, 'status' => 'active'])->result();

		die($this->db->last_query());
	}

	public function get_distinct_department()
	{
		$this->db->distinct();
		$this->db->select('department');
		return $this->db->get('masterlist')->result();
	}

	public function update_department($department)
	{
		$this->db->set('department', $this->get_department_id($department));
		$this->db->where('department', $department);
		return $this->db->update('masterlist'); 
	}

	public function get_department_id($department)
	{
		$this->db->select('deptid');
		return $this->db->get_where('awcci_department', ['dept_name' => $department])->row();
	}

	public function get_documents()
	{
		$this->db->join('documentlevel', 'documentlevel.recid = masterlist.documenttype');
		$this->db->join('awcci_department', 'awcci_department.deptid = masterlist.department');
		$this->db->join('awcci_division', 'awcci_division.divid = masterlist.division');
		$this->db->order_by('create_date', 'DESC');
		return $this->db->get('masterlist')->result();
	}

	public function get_documents_ajax($query, $start, $length, $orderBy, $order)
	{
		$this->db->join('documentlevel', 'documentlevel.recid = masterlist.documenttype');
		$this->db->join('awcci_department', 'awcci_department.deptid = masterlist.department');
		$this->db->join('awcci_division', 'awcci_division.divid = masterlist.division');
		$this->db->order_by($orderBy, $order);
		$this->db->limit($length, $start);

		// $this->db->where('documentlevel.documenttype <>', 'IM');

		$query = $this->db->select('*')->from('masterlist')
	        ->group_start()
	            ->where('status', 'Active')
				->where('masterlist.effectivitydate <=', date('Y-m-d'))
	        ->group_end()
	        ->group_start()
	            ->or_like(array('docnum'=> $query, 'documenttitle' => $query, 'documentdesc' => $query, 'div_name' => $query, 'dept_name' => $query, 'effectivitydate' => $query))
	        ->group_end()
		->get();	

		return $query->result();

		die($this->db->last_query());
	}

	public function get_documents_ajax_count($query, $start, $length, $orderBy, $order)
	{
		$this->db->join('documentlevel', 'documentlevel.recid = masterlist.documenttype');
		$this->db->join('awcci_department', 'awcci_department.deptid = masterlist.department');
		$this->db->join('awcci_division', 'awcci_division.divid = masterlist.division');
		$this->db->order_by($orderBy, $order);

		// $this->db->where('documentlevel.documenttype <>', 'IM');
		// $this->db->or_where('documentlevel.documenttype', 'IM');

		$query = $this->db->select('*')->from('masterlist')
	        ->group_start()
	            ->where('status', 'Active')
				->where('masterlist.effectivitydate <=', date('Y-m-d'))
	        ->group_end()
	        ->group_start()
	            ->or_like(array('docnum'=> $query, 'documenttitle' => $query, 'documentdesc' => $query, 'div_name' => $query, 'dept_name' => $query, 'effectivitydate' => $query))
	        ->group_end()
		->get();

		return count($query->result());
	}

	public function count_all_all()
	{
		$this->db->where('status', 'Active');
		$this->db->join('documentlevel', 'documentlevel.recid = masterlist.documenttype');
		$this->db->join('awcci_department', 'awcci_department.deptid = masterlist.department');
		$this->db->join('awcci_division', 'awcci_division.divid = masterlist.division');
		
		return $this->db->count_all_results('masterlist');
	}

	public function get_masterlist_by_id($id)
	{
		$this->db->where('procedureid', $id);
		return $this->db->get('masterlist')->row();
	}

	public function update_masterlist_by_id($data)
	{
		$this->db->where('procedureid', $data->procedureid);
		return $this->db->update('masterlist', $data);
	}

	public function update_masterlist_by_id_array($procedureid, $data, $filename)
	{
		$data['filename'] = $filename;
		$this->db->where('procedureid', $procedureid);
		$data['effectivitydate'] = date('Y-m-d', strtotime($data['effectivitydate']));
		// die($data['effectivitydate']);
		return $this->db->update('masterlist', $data);
	}

	public function delete($id)
	{
		return $this->db->delete('masterlist', ['procedureid' => $id]);
	}

	public function get_dates()
	{	
		$this->db->select('procedureid, effectivitydate');
		return $this->db->get('masterlist')->result();
	}

	public function update_date($procedureid, $date)
	{
		$this->db->where('procedureid', $procedureid);
		$this->db->update('masterlist', ['effectivitydate' => $date]);
	}
=======
<?php 
/**
 * 
 */
class Masterlist extends CI_Model
{
	public $procedureid;
	public $documenttitle;
	public $documenttype;
	public $division;
	public $department;
	public $docnum;
	public $effectivitydate;
	public $status;
	public $filename;
	public $create_date;
	
	function __construct()
	{
		$this->load->database();
		$this->load->library('session');
	}

	public function insert($filename)
	{
		$this->documenttitle = $this->input->post('documenttitle');
		$this->documenttype = $this->input->post('documenttype');
		$this->division = $this->input->post('division');
		$this->department = $this->input->post('department');
		$this->docnum = $this->input->post('docnum');
		$this->effectivitydate = date('Y-m-d', strtotime($this->input->post('date')));
		$this->status = $this->input->post('status');
		$this->filename = $filename;

		return $this->db->insert('masterlist', $this);
	}

	public function get_all_document_by_type($type)
	{
		$this->db->join('documentlevel', 'documentlevel.recid = masterlist.documenttype');
		$this->db->join('awcci_department', 'awcci_department.deptid = masterlist.department');
		$this->db->join('awcci_division', 'awcci_division.divid = masterlist.division');

		if ( ! $this->session->has_userdata('userid') && $type != 'IM')
			$this->db->where('masterlist.effectivitydate <=', date('Y-m-d'));

		return $this->db->get_where('masterlist', ['documentlevel.documenttype' => $type, 'status' => 'active'])->result();

		die($this->db->last_query());
	}

	public function get_all_document_by_division($id, $type)
	{
		if ($type != 'ALL')
			$this->db->where('documentlevel.documenttype', $type);
		$this->db->join('documentlevel', 'documentlevel.recid = masterlist.documenttype');
		$this->db->join('awcci_department', 'awcci_department.deptid = masterlist.department');
		$this->db->join('awcci_division', 'awcci_division.divid = masterlist.division');

		if ( ! $this->session->has_userdata('userid') || $type != 'IM')
		$this->db->where('masterlist.effectivitydate <=', date('Y-m-d'));

		return $this->db->get_where('masterlist', ['awcci_division.divid' => $id, 'status' => 'active'])->result();

		die($this->db->last_query());
	}

	public function get_all_document_by_department($id, $type)
	{
		if ($type != 'ALL')
			$this->db->where('documentlevel.documenttype', $type);
		$this->db->select('procedureid, documenttitle, documentlevel.documentdesc, div_name, dept_name, docnum, effectivitydate, status, filename');
		$this->db->join('documentlevel', 'documentlevel.recid = masterlist.documenttype');
		$this->db->join('awcci_department', 'awcci_department.deptid = masterlist.department');
		$this->db->join('awcci_division', 'awcci_division.divid = masterlist.division');

		if ( ! $this->session->has_userdata('userid'))
			$this->db->where('masterlist.effectivitydate <=', date('Y-m-d'));

		return $this->db->get_where('masterlist', ['awcci_department.deptid' => $id, 'status' => 'active'])->result();

		die($this->db->last_query());
	}

	public function get_distinct_department()
	{
		$this->db->distinct();
		$this->db->select('department');
		return $this->db->get('masterlist')->result();
	}

	public function update_department($department)
	{
		$this->db->set('department', $this->get_department_id($department));
		$this->db->where('department', $department);
		return $this->db->update('masterlist'); 
	}

	public function get_department_id($department)
	{
		$this->db->select('deptid');
		return $this->db->get_where('awcci_department', ['dept_name' => $department])->row();
	}

	public function get_documents()
	{
		$this->db->join('documentlevel', 'documentlevel.recid = masterlist.documenttype');
		$this->db->join('awcci_department', 'awcci_department.deptid = masterlist.department');
		$this->db->join('awcci_division', 'awcci_division.divid = masterlist.division');
		$this->db->order_by('create_date', 'DESC');
		return $this->db->get('masterlist')->result();
	}

	public function get_documents_ajax($query, $start, $length, $orderBy, $order)
	{
		$this->db->join('documentlevel', 'documentlevel.recid = masterlist.documenttype');
		$this->db->join('awcci_department', 'awcci_department.deptid = masterlist.department');
		$this->db->join('awcci_division', 'awcci_division.divid = masterlist.division');
		$this->db->order_by($orderBy, $order);
		$this->db->limit($length, $start);

		// $this->db->where('documentlevel.documenttype <>', 'IM');

		$query = $this->db->select('*')->from('masterlist')
	        ->group_start()
	            ->where('status', 'Active')
				->where('masterlist.effectivitydate <=', date('Y-m-d'))
	        ->group_end()
	        ->group_start()
	            ->or_like(array('docnum'=> $query, 'documenttitle' => $query, 'documentdesc' => $query, 'div_name' => $query, 'dept_name' => $query, 'effectivitydate' => $query))
	        ->group_end()
		->get();	

		return $query->result();

		die($this->db->last_query());
	}

	public function get_documents_ajax_count($query, $start, $length, $orderBy, $order)
	{
		$this->db->join('documentlevel', 'documentlevel.recid = masterlist.documenttype');
		$this->db->join('awcci_department', 'awcci_department.deptid = masterlist.department');
		$this->db->join('awcci_division', 'awcci_division.divid = masterlist.division');
		$this->db->order_by($orderBy, $order);

		// $this->db->where('documentlevel.documenttype <>', 'IM');
		$this->db->or_where('documentlevel.documenttype', 'IM');

		$query = $this->db->select('*')->from('masterlist')
	        ->group_start()
	            ->where('status', 'Active')
				->where('masterlist.effectivitydate <=', date('Y-m-d'))
	        ->group_end()
	        ->group_start()
	            ->or_like(array('docnum'=> $query, 'documenttitle' => $query, 'documentdesc' => $query, 'div_name' => $query, 'dept_name' => $query, 'effectivitydate' => $query))
	        ->group_end()
		->get();

		return count($query->result());
	}

	public function count_all_all()
	{
		$this->db->where('status', 'Active');
		$this->db->join('documentlevel', 'documentlevel.recid = masterlist.documenttype');
		$this->db->join('awcci_department', 'awcci_department.deptid = masterlist.department');
		$this->db->join('awcci_division', 'awcci_division.divid = masterlist.division');
		
		return $this->db->count_all_results('masterlist');
	}

	public function get_masterlist_by_id($id)
	{
		$this->db->where('procedureid', $id);
		return $this->db->get('masterlist')->row();
	}

	public function update_masterlist_by_id($data)
	{
		$this->db->where('procedureid', $data->procedureid);
		return $this->db->update('masterlist', $data);
	}

	public function update_masterlist_by_id_array($procedureid, $data, $filename)
	{
		$data['filename'] = $filename;
		$this->db->where('procedureid', $procedureid);
		$data['effectivitydate'] = date('Y-m-d', strtotime($data['effectivitydate']));
		// die($data['effectivitydate']);
		return $this->db->update('masterlist', $data);
	}

	public function delete($id)
	{
		return $this->db->delete('masterlist', ['procedureid' => $id]);
	}

	public function get_dates()
	{	
		$this->db->select('procedureid, effectivitydate');
		return $this->db->get('masterlist')->result();
	}

	public function update_date($procedureid, $date)
	{
		$this->db->where('procedureid', $procedureid);
		$this->db->update('masterlist', ['effectivitydate' => $date]);
	}
>>>>>>> 5bdee75a1b1e3b135bca891547a60b6454600854
}