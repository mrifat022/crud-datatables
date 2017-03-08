<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bidangkeahlian extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mbidangkeahlian','bidangkeahlian');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('bidangkeahlianview');
	}

	public function ajax_list()
	{
		$list = $this->bidangkeahlian->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $bidangkeahlian) {
			$no++;
			$row = array();
			
			$row[] = $bidangkeahlian->nama_bidangkeahlian;
			

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_bidangkeahlian('."'".$bidangkeahlian->bidang_keahlian_id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_bidangkeahlian('."'".$bidangkeahlian->bidang_keahlian_id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->bidangkeahlian->count_all(),
						"recordsFiltered" => $this->bidangkeahlian->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($bidang_keahlian_id)
	{
		$data = $this->bidangkeahlian->get_by_id($bidang_keahlian_id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$data = array(
				'nama_bidangkeahlian' => $this->input->post('nama_bidangkeahlian'),
			);
		$insert = $this->bidangkeahlian->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'nama_bidangkeahlian' => $this->input->post('nama_bidangkeahlian'),

			);
		$this->bidangkeahlian->update(array('bidang_keahlian_id' => $this->input->post('bidang_keahlian_id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($bidang_keahlian_id)
	{
		$this->bidangkeahlian->delete_by_id($bidang_keahlian_id);
		echo json_encode(array("status" => TRUE));
	}

}
