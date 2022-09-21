<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library(['user_agent', 'session']);

        $this->load->helper('typography');

        if ( ! $this->session->has_userdata('userid')) {
			redirect('login');
		}
    }

	public function index()
	{	
		$this->load->model(['masterlist']);
		$data['documents'] = $this->masterlist->get_documents();

		$this->header();
		$this->load->view('admin/index', $data);
		$this->load->view('template/footer');
	}

	public function header()
	{
		$this->load->model(['documentlevel', 'department', 'division']);
		$data['documents'] = $this->documentlevel->getDocumentLevel();
		$data['departments'] = $this->department->getDepartmentByPosition();
		$data['divisions'] = $this->division->getDivisions();
		$data['active'] = NULL;

		$this->load->view('template/header_admin', $data);
	}

	public function division()
	{
		$this->load->model(['division']);

		$data['divisions'] = $this->division->get_divisions();

		$this->header();
		$this->load->view('admin/division', $data);
		$this->load->view('template/footer');
	}

	public function create_division()
	{
		$this->load->model(['division']);
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['divisions'] = $this->division->get_divisions();

		$this->form_validation->set_rules('description', 'Description', 'required|max_length[25]');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('template/header_admin');
			$this->load->view('admin/division_new', $data);
			$this->load->view('template/footer');                    
		}
		else
		{
			$description = $this->input->post('description');

			if ($this->division->insert_division($description)) {
				$this->session->set_flashdata('msg', 'New Division Created!');
				redirect('division');
			}
		}		
	}

	public function update_division($id)
	{
		$this->load->model(['division']);
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['division'] = $this->division->get_division($id);

		$this->form_validation->set_rules('description', 'Description', 'required|max_length[25]');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('template/header_admin');
			$this->load->view('admin/division_update', $data);
			$this->load->view('template/footer');                    
		}
		else
		{
			$description = $this->input->post('description');

			if ($this->division->update_division($id, $description)) {
				$this->session->set_flashdata('msg', $data['division']->div_name." Updated!");
				redirect('division');
			}
		}
	}

	public function department()
	{
		$this->load->model('department');
		
		$data['departments'] = $this->department->get_departments();

		$this->header('department');
		$this->load->view('admin/department', $data);
		$this->load->view('template/footer');
	}

	public function create_department()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('department');

		$this->form_validation->set_rules('description', 'Description', 'required|max_length[25]');

		if ($this->form_validation->run() == FALSE)
		{
			$this->header();
			$this->load->view('admin/create_department');
			$this->load->view('template/footer');                 
		}
		else
		{
			$description = $this->input->post('description');

			if ($this->department->insert_department($description)) {
				$this->session->set_flashdata('msg', 'New Department Created!');
				redirect('department');
			}
		}		
	}

	public function update_department($id)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('department');

		$this->form_validation->set_rules('description', 'Description', 'required|max_length[25]');

		if ($this->form_validation->run() == FALSE)
		{
			$data['department'] = $this->department->get_department($id);

			$this->load->view('template/header_admin');
			$this->load->view('admin/update_department', $data);
			$this->load->view('template/footer');                 
		}
		else
		{
			$description = $this->input->post('description');

			if ($this->department->update_department($id)) {
				$this->session->set_flashdata('msg', 'Department Updated!');
				redirect('department');
			}
		}		
	}

	public function delete_department($id)
	{
		$this->load->model('department');

		if ($this->department->delete_department($id)) {
			$this->session->set_flashdata('msg', 'Department Removed!');
			redirect('department');
		}	
	}

	public function document()
	{	
		$this->load->model(['masterlist', 'documentLevel']);
		$data['documents'] = $this->documentLevel->get_documents();

		$this->header();
		$this->load->view('admin/document', $data);
		$this->load->view('template/footer');
	}

	public function document_update($id)
	{	
		$this->load->helper(['form']);
		$this->load->library('form_validation');
		$this->load->model(['documentLevel']);

		$this->form_validation->set_rules('description', 'Description', 'required|max_length[25]');
		$this->form_validation->set_rules('level', 'Document level', 'required|max_length[25]');
		$this->form_validation->set_rules('type', 'Document type', 'required|max_length[25]');

		if ($this->form_validation->run() == FALSE)
		{
			$data['document'] = $this->documentLevel->get_document($id);

			$this->header();
			$this->load->view('admin/document_update', $data);
			$this->load->view('template/footer');           
		}
		else
		{
			if ($this->documentLevel->update_document_level($id)) {
				$this->session->set_flashdata('msg', 'Document Level Updated!');
				redirect('document');
			}
		}
	}

	public function upload_template()
	{
		$data = array('error' => $this->upload->display_errors());

		$data['division'][''] = 'Please select division';
		foreach ($this->division->getDivisions() as $key => $value) {
		 	$data['division'][$value->divid] = $value->div_name;
		}

		$data['documenttype'][''] = 'Please select document type';
		foreach ($this->documentLevel->get_document_level() as $key => $value) {
		 	$data['documenttype'][$value->recid] = $value->documentdesc;
		}

		$data['department'][''] = 'Please select department';
		foreach ($this->department->getDepartmentByPosition() as $key => $value) {
		 	$data['department'][$value->deptid] = $value->dept_name;
		}

		$data['status']['Active'] = 'Active';
		$data['status']['Obsolete'] = 'Obsolete';

		$this->header();
		$this->load->view('admin/document_upload', $data);
		$this->load->view('template/footer');
	}

	public function document_upload()
	{
		$this->load->helper(['form']);
		$this->load->library('form_validation');
		$this->load->model(['documentLevel', 'division', 'department', 'masterlist']);

		$this->form_validation->set_rules('docnum', 'Document number', 'required|max_length[100]');
		$this->form_validation->set_rules('documenttitle', 'Document title', 'required|max_length[100]');
		$this->form_validation->set_rules('documenttype', 'Document type', 'required|max_length[100]');
		$this->form_validation->set_rules('division', 'Division', 'required|max_length[25]');
		$this->form_validation->set_rules('department', 'Department', 'required');
		$this->form_validation->set_rules('date', 'Date', 'required|max_length[25]');
		$this->form_validation->set_rules('status', 'Status', 'required');

		$config['upload_path'] = './iso_documents/';
		$config['allowed_types'] = 'pdf|xls|xlsx|doc|docx';
		$config['overwrite'] = TRUE;
		$config['file_size'] = 25000;

		$this->load->library('upload', $config);

		if ($this->form_validation->run() == FALSE)
		{
			$this->upload_template();
		}
		else
		{
			if (! $this->upload->do_upload('file')) {
				$this->upload_template();    
			} else {
				if ($this->masterlist->insert($this->upload->data('file_name'))) {
					$this->session->set_flashdata('msg', 'Document Uploaded!');
					redirect('admin');
				}
			}
		}
	}

	public function remove_file($procedureid)
	{
		$this->load->helper('file');
		$this->load->model('masterlist');
		$data = $this->masterlist->get_masterlist_by_id($procedureid);
		$filename = $data->filename;

		if (unlink('./iso_documents/'.$filename)) {
			$data->filename = '';
			if ($this->masterlist->update_masterlist_by_id($data)) {
				$this->session->set_flashdata('msg', 'Document uploaded successfully removed');
				redirect('admin/document/update/'.$procedureid);
			} else {
				$this->session->set_flashdata('msg', 'Error updating masterlist. File is removed');
				redirect('admin/document/update/'.$procedureid);
			}
		} else {
			$this->session->set_flashdata('msg', 'Error removing uploaded document');
				redirect('admin/document/update/'.$procedureid);
		}
	}

	public function masterlist_update($id)
	{
		$this->load->helper(['form']);
		$this->load->library(['form_validation']);
		$this->load->model(['documentLevel', 'division', 'department', 'masterlist']);

		$this->form_validation->set_rules('docnum', 'Document number', 'required|max_length[25]');
		$this->form_validation->set_rules('documenttitle', 'Document title', 'required|max_length[100]');
		$this->form_validation->set_rules('documenttype', 'Document type', 'required|max_length[25]');
		$this->form_validation->set_rules('division', 'Division', 'required|max_length[25]');
		$this->form_validation->set_rules('department', 'Department', 'required|max_length[60]');
		$this->form_validation->set_rules('effectivitydate', 'Date', 'required|max_length[25]');
		$this->form_validation->set_rules('status', 'Status', 'required');

		$config['upload_path'] = './iso_documents/';
		$config['allowed_types'] = 'pdf|xls|xlsx|doc|docx';
		$config['overwrite'] = TRUE;
		$config['file_size'] = 25000;

		$this->load->library('upload', $config);

		$data = array('masterlist' => $this->masterlist->get_masterlist_by_id($id));

		if ($this->form_validation->run() == FALSE)
		{
			$data['error'] = $this->upload->display_errors();

			$data['division'][''] = 'Please select division';
			foreach ($this->division->getDivisions() as $key => $value) {
			 	$data['division'][$value->divid] = $value->div_name;
			}

			$data['documenttype'][''] = 'Please select document type';
			foreach ($this->documentLevel->get_document_level() as $key => $value) {
			 	$data['documenttype'][$value->recid] = $value->documentdesc;
			}

			$data['department'][''] = 'Please select department';
			foreach ($this->department->getDepartmentByPosition() as $key => $value) {
			 	$data['department'][$value->deptid] = $value->dept_name;
			}

			$data['status']['Active'] = 'Active';
			$data['status']['Obsolete'] = 'Obsolete';

			$this->header();
			$this->load->view('admin/masterlist_update', $data);
			$this->load->view('template/footer');
		}
		else
		{
			if (! $this->upload->do_upload('file') && $data['masterlist']->filename == '') {
				$data['error'] = $this->upload->display_errors();

				$data['division'][''] = 'Please select division';
				foreach ($this->division->getDivisions() as $key => $value) {
				 	$data['division'][$value->divid] = $value->div_name;
				}

				$data['documenttype'][''] = 'Please select document type';
				foreach ($this->documentLevel->get_document_level() as $key => $value) {
				 	$data['documenttype'][$value->recid] = $value->documentdesc;
				}

				$data['department'][''] = 'Please select department';
				foreach ($this->department->getDepartmentByPosition() as $key => $value) {
				 	$data['department'][$value->deptid] = $value->dept_name;
				}

				$data['status']['Active'] = 'Active';
				$data['status']['Obsolete'] = 'Obsolete';

				$this->header();
				$this->load->view('admin/masterlist_update', $data);
				$this->load->view('template/footer');   
			} else {
				$filename = strlen($data['masterlist']->filename) > 0 ? $data['masterlist']->filename : $this->upload->data('file_name');
				if ($this->masterlist->update_masterlist_by_id_array($id, $this->input->post(), $filename)) {
					$this->session->set_flashdata('msg', 'Document Updated!');
					redirect('admin/document/update/'.$id);
				}
			}
		}
	}

	public function user()
	{
		$this->load->helper(['form']);
		
		$this->header();
		$this->load->view('admin/users');
		$this->load->view('template/footer');
	}

	public function document_type_create()
	{
		$this->load->helper(['form']);
		$this->load->library('form_validation');
		$this->load->model(['documentLevel']);

		$this->form_validation->set_rules('level', 'Document level', 'required|max_length[25]');
		$this->form_validation->set_rules('documentdesc', 'Description', 'required|max_length[25]');
		$this->form_validation->set_rules('documenttype', 'Document type', 'required|max_length[25]');

		if ($this->form_validation->run() == FALSE)
		{
			$data['level'][''] = 'Please select document level';
			$data['level']['Level 1'] = 'Level 1';
			$data['level']['Level 2'] = 'Level 2';
			$data['level']['Level 3'] = 'Level 3';
			$data['level']['Level 4'] = 'Level 4';

			$this->header();
			$this->load->view('admin/document_create', $data);
			$this->load->view('template/footer');           
		}
		else
		{
			if ($this->documentLevel->insert()) {
				$this->session->set_flashdata('msg', 'Document Level Created!');
				redirect('document');
			}
		}
	}

	public function delete_document($id)
	{
		$this->load->model('masterlist');

		if ($this->masterlist->delete($id)) {
			$this->session->set_flashdata('msg', 'Document Removed!');
			redirect('admin');
		}
	}

	public function config()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->model('config_model');

		$data['info'] = $this->config_model->get();

		$this->form_validation->set_rules('mission', 'Mission', 'required');
		$this->form_validation->set_rules('vission', 'Vission', 'required');
		$this->form_validation->set_rules('policy', 'Policy', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->header();
			$this->load->view('admin/config', $data);
			$this->load->view('template/footer');  
		} else {
			if ($this->config_model->set()) {
				redirect('main');
			}
		} 
	}

	public function date_correct()
	{
		$this->load->model('masterlist');

		$dates = $this->masterlist->get_dates();

		foreach ($dates as $key => $value) {
			$date = date('Y-m-d', strtotime($value->effectivitydate));
			echo $value->procedureid. " - ". $date.'</br>';
			$this->masterlist->update_date($value->procedureid, $date);
		}
	}
}
