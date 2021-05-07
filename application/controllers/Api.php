<?php defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->model('api_model');
	}
	// Category Apis Start
	public function index()
	{
		$table = 'category';
		$data['category'] = $this->api_model->fetchall($table, 'id, category');
		echo json_encode($data['category']);
	}

	public function addcategory()
	{
		$table = 'category';
		$this->form_validation->set_rules('category', 'Category', 'required|min_length[5]');
		$array = [];
		if ($this->form_validation->run()) {
			$data = array(
				'category'	=>	$this->input->post('category')
			);

			if (isset($data) && !empty($data)) {
				$this->api_model->insertdata($table, $data);
				$array = ['status' => true, 'data' => $data, 'message' => 'Category Inserted'];
			} else {
				$array = ['status' => false, 'message' => 'Category Not Inserted'];
			}
		} else {

			if (form_error('category')) {
				$array = ['error' => false, 'message' => form_error('category')];
			}
		}
		echo json_encode($array);
	}

	public function fetchcategory($id = "")
	{
		$table = 'category';
		//if($this->input->post('id'))
		if (isset($id) && !empty($id)) {
			//$data = $this->api_model->fetchdata($table,$this->input->post('id'));
			$data = $this->api_model->fetchdata($table, $id, 'id, category');
			if (isset($data) && !empty($data)) {
				$array = ['status' => true, 'data' => $data];
			} else {
				$array = ['status' => false, 'message' => 'Category not found.'];
			}
			echo json_encode($array);
		} else {
			echo json_encode(['status' => false, 'message' => 'Category Id not found.']);
		}
	}

	public function updatecategory($id = '')
	{
		$table = 'category';
		$this->form_validation->set_rules('category', 'Category', 'required|min_length[5]');
		$array = [];
		if ($this->form_validation->run()) {
			$data = array(
				'category'	=>	$this->input->post('category')
			);

			//$this->api_model->updatedata($table, $data, $this->input->post('id'));


			if (isset($data) && !empty($data)) {
				$this->api_model->updatedata($table, $data, $id);
				$array = ['status' => true, 'data' => $data, 'message' => 'Category Updated'];
			} else {
				$array = ['status' => false, 'message' => 'Category Not Updated'];
			}
		} else {
			if (form_error('category')) {
				$array = ['error' => false, 'message' => form_error('category')];
			}
		}
		echo json_encode($array);
	}

	public function deletecategory($id = "")
	{
		$table = 'category';
		//if($this->input->post('id'))
		if (isset($id) && !empty($id)) {
			//if($this->api_model->deletedata($table,$this->input->post('id')))
			if ($this->api_model->deletedata($table, $id)) {
				$array = ['status' => true, 'message' => 'Category Deleted'];
			} else {
				$array = ['status' => false, 'message' => 'Category not found.'];
			}
			echo json_encode($array);
		}
	}

	//Category Apis End

	//Product Apis Start

	public function allproducts()
	{
		$table = 'products';
		$data['products'] = $this->api_model->fetchall($table, 'cid, product,cost');
		echo json_encode($data['products']);
	}

	public function addproduct()
	{
		$table = 'products';
		$this->form_validation->set_rules('cid', 'Category', 'required|numeric');
		$this->form_validation->set_rules('product', 'Product', 'required|min_length[5]');
		$this->form_validation->set_rules('cost', 'Cost', 'required|numeric');

		$array = [];
		if ($this->form_validation->run() == true) {
			$data = array(
				'cid'	=>	$this->input->post('cid'),
				'product'	=>	$this->input->post('product'),
				'cost' => $this->input->post('cost')
			);

			if (isset($data) && !empty($data)) {
				$this->api_model->insertdata($table, $data);
				$array = ['status' => true, 'data' => $data, 'message' => 'Product Inserted'];
			} else {
				$array = ['status' => false, 'message' => 'Product Not Inserted'];
			}
		} else {

			if (form_error('cid')) {
				$array = ['error' => false, 'message' => form_error('cid')];
			}

			if (form_error('product')) {
				$array = ['error' => false, 'message' => form_error('product')];
			}

			if (form_error('cost')) {
				$array = ['error' => false, 'message' => form_error('cost')];
			}
		}
		echo json_encode($array);
	}

	public function fetchproduct($id = "")
	{
		$table = 'products';
		//if($this->input->post('id'))
		if (isset($id) && !empty($id)) {
			//$data = $this->api_model->fetchdata($table,$this->input->post('id'));
			$data = $this->api_model->fetchdata($table, $id, 'id, cid, product, cost');
			if (isset($data) && !empty($data)) {
				$array = ['status' => true, 'data' => $data];
			} else {
				$array = ['status' => false, 'message' => 'Product Id not found.'];
			}
			echo json_encode($array);
		} else {
			echo json_encode(['status' => false, 'message' => 'Product Id not found.']);
		}
	}

	public function updateproduct($id = '')
	{
		$table = 'products';
		$this->form_validation->set_rules('cid', 'Category', 'required|numeric');
		$this->form_validation->set_rules('product', 'Product', 'required|min_length[5]');
		$this->form_validation->set_rules('cost', 'Cost', 'required|numeric');

		$array = [];
		if ($this->form_validation->run() == true) {
			$data = array(
				'cid'	=>	$this->input->post('cid'),
				'product'	=>	$this->input->post('product'),
				'cost' => $this->input->post('cost')
			);

			if (isset($data) && !empty($data)) {
				$this->api_model->updatedata($table, $data, $id);
				$array = ['status' => true, 'data' => $data, 'message' => 'Product Updated'];
			} else {
				$array = ['status' => false, 'message' => 'Product Not Updated'];
			}
		} else {
			if (form_error('cid')) {
				$array = ['error' => false, 'message' => form_error('cid')];
			}

			if (form_error('product')) {
				$array = ['error' => false, 'message' => form_error('product')];
			}

			if (form_error('cost')) {
				$array = ['error' => false, 'message' => form_error('cost')];
			}
		}
		echo json_encode($array);
	}

	public function deleteproduct($id = "")
	{
		$table = 'products';
		//if($this->input->post('id'))
		if (isset($id) && !empty($id)) {
			//if($this->api_model->deletedata($table,$this->input->post('id')))
			if ($this->api_model->deletedata($table, $id)) {
				$array = ['status' => true, 'message' => 'Product Deleted'];
			} else {
				$array = ['status' => false, 'message' => 'Product not found.'];
			}
			echo json_encode($array);
		}
	}

	//Product Apis End
}
