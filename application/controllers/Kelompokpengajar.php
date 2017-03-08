<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelompokpengajar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mkelompokpengajar','kelompokpengajar');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('kelompokpengajarview');
	}

	public function ajax_list()
	{
		$list = $this->kelompokpengajar->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $kelompokpengajar) {
			$no++;
			$row = array();
			
			$row[] = $kelompokpengajar->nama_kelompok;
			

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_kelompokpengajar('."'".$kelompokpengajar->idkelompok_pengajar."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_kelompokpengajar('."'".$kelompokpengajar->idkelompok_pengajar."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->kelompokpengajar->count_all(),
						"recordsFiltered" => $this->kelompokpengajar->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($idkelompok_pengajar)
	{
		$data = $this->kelompokpengajar->get_by_id($idkelompok_pengajar);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$data = array(
				'nama_kelompok' => $this->input->post('nama_kelompok'),
			);
		$insert = $this->kelompokpengajar->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'nama_kelompok' => $this->input->post('nama_kelompok'),

			);
		$this->kelompokpengajar->update(array('idkelompok_pengajar' => $this->input->post('idkelompok_pengajar')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($idkelompok_pengajar)
	{
		$this->kelompokpengajar->delete_by_id($idkelompok_pengajar);
		echo json_encode(array("status" => TRUE));
	}

}
