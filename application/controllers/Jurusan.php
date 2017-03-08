<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mjurusan','jurusan');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('jurusanview');
	}

	public function ajax_list()
	{
		$list = $this->jurusan->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $jurusan) {
			$no++;
			$row = array();
			
			$row[] = $jurusan->nama_jurusan;
			

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_jurusan('."'".$jurusan->jurusan_id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_jurusan('."'".$jurusan->jurusan_id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->jurusan->count_all(),
						"recordsFiltered" => $this->jurusan->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($jurusan_id)
	{
		$data = $this->jurusan->get_by_id($jurusan_id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$data = array(
				'nama_jurusan' => $this->input->post('nama_jurusan'),
			);
		$insert = $this->jurusan->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'nama_jurusan' => $this->input->post('nama_jurusan'),

			);
		$this->jurusan->update(array('jurusan_id' => $this->input->post('jurusan_id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($jurusan_id)
	{
		$this->jurusan->delete_by_id($jurusan_id);
		echo json_encode(array("status" => TRUE));
	}

}
