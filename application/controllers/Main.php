<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('Config_model');

		$data['a'] = $this->Config_model->get();

		$this->view_header();
		$this->load->view('admin/template', $data);
		$this->load->view('template/footer');
	}

	public function view_header($page = 'home')
	{
		$this->load->model(['documentlevel', 'department', 'division']);
		$data['documents'] = $this->documentlevel->getDocumentLevel();
		$data['departments'] = $this->department->getDepartmentByPosition();
		$data['divisions'] = $this->division->getDivisions();
		$data['active'] = $page;

		$this->load->view('template/header', $data);
	}

	public function division_document($id, $type = 'ALL')
	{
		$this->load->model(['documentlevel', 'department', 'division', 'masterlist']);
		$data['div_name'] = $this->division->get_division_by_id($id)->div_name;
		$data['docs'] = $this->masterlist->get_all_document_by_division($id, $type);
		$data['types'] = $this->division->get_type_by_document($id);
		$data['active_type'] = $type;
		$data['id'] = $id;

		$this->view_header('division');
		$this->load->view('public/division', $data);
		$this->load->view('template/footer');
	}

	public function department_document($id, $type = 'ALL')
	{
		$this->load->model(['documentlevel', 'department', 'division', 'masterlist']);
		$data['department_name'] = $this->department->get_department_name_by_id($id)['dept_name'];
		$data['docs'] = $this->masterlist->get_all_document_by_department($id, $type);
		$data['types'] = $this->department->get_type_by_document($data['department_name']);
		$data['active_type'] = $type;
		$data['id'] = $id;

		$this->view_header('department');
		$this->load->view('public/department', $data);
		$this->load->view('template/footer');
	}

	public function document_level($type)
	{
		$this->load->model(['documentlevel', 'department', 'division', 'masterlist']);
		$data['document'] = $this->documentlevel->get_document_by_type($type);
		$data['docs'] = $this->masterlist->get_all_document_by_type($type);

		$this->view_header('document');
		$this->load->view('public/document_level', $data);
		$this->load->view('template/footer');
	}

	public function update_department()
	{
		$this->load->model('masterlist');

		foreach ($this->masterlist->get_distinct_department() as $department) {
			$this->masterlist->update_department($department->department);
		}
	}

	public function iso_document($filename = NULL)
	{
		$this->load->helper('file');
		$this->load->helper('download');

        $tofile= realpath('iso_documents/'.$filename);

		// echo get_mime_by_extension($tofile);

		if(get_mime_by_extension($tofile) <> 'application/pdf')
		{
			force_download($tofile, NULL);
		} else {
			header('Content-Type: application/pdf');
        	readfile($tofile);
		}
	}

	public function get_documents_ajax()
	{
		$this->load->model('masterlist');

		$query = $this->input->get('search[value]');
		$start = $this->input->get('start');
		$length = $this->input->get('length');
		$orderBy = $this->input->get('order[0][column]');
		$order = $this->input->get('order[0][dir]');

		switch ($orderBy) {
			case 0:
				$orderBy = 'docnum';
				break;
			case 1:
				$orderBy = 'documenttitle';
				break;
			case 2:
				$orderBy = 'documentdesc';
				break;
			case 3:
				$orderBy = 'div_name';
				break;
			case 4:
				$orderBy = 'dept_name';
				break;
			case 5:
				$orderBy = 'effectivitydate';
				break;
			default:
				$orderBy = 'effectivitydate';
				break;
		}

		$docs = $this->masterlist->get_documents_ajax($query, $start, $length, $orderBy, $order);

		foreach ($docs as $key => $value) {
			$value->docnum = "<a href=".site_url("iso/document/$value->filename")." target='_blank'>".$value->docnum."</a></td>";
			$value->effectivitydate = date('M. d, Y', strtotime($value->effectivitydate));
		}

		echo json_encode(array(
			'draw' => $this->input->get('draw'),
			'recordsTotal' => $this->masterlist->count_all_all(),
			'recordsFiltered' => $this->masterlist->get_documents_ajax_count($query, $start, $length, $orderBy, $order),
			'data' => $docs
		));
	}
}
