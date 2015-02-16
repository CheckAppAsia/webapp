<?php
require(APPPATH.'libraries/REST_Controller.php');
class Products extends REST_Controller {
	
	public function __construct() {
		parent::__construct();

		$this->load->model('pharmacy/branchproducts_model');
	}
	
	public function addMedicine_get() {
		$data = array (
				'pharma_branch_id' => $this->get('pharma_branch_id'),
				'product_type' => $this->get('product_type'),
				'medicine_id' => $this->get('medicine_id'),
				'stock_code' => $this->get('stock_code'),
				'stock_name' => $this->get('stock_name'),
				'stock_count' => $this->get('stock_count'),
				'status' => 0,
				'date_created' => time(),
				'created_by' => $this->get('created_by'),
		);
		
		$result = $this->branchproducts_model->create($data);
		
		if(is_bool($result))
			$this->response(array('status' => 'FALSE', 'message' => 'Branch Product Registration failed..'));
		else
			$this->response(array('status' => 'TRUE', 'message' => 'Pharmacy Branch Product Added.', 'id' => $result));
	}
	
	public function getProductsByType_get() {
		$pharma = $this->branchproducts_model->read(array('product_type' => $this->get('product_type')));
		
		if(count($pharma) > 0 )
			$this->response(array('status' => 'TRUE', 'message' => 'Existing Pharmacy Products', 'data' => $pharma));
		else
			$this->response(array('status' => 'FALSE', 'message' => 'No Existing Pharmacy Products.'));
	}
	
	public function getProducts_get() {
		$pharma = $this->branchproducts_model->read();
		
		if(count($pharma) > 0 )
			$this->response(array('status' => 'TRUE', 'message' => 'Existing Pharmacy Products', 'data' => $pharma));
		else
			$this->response(array('status' => 'FALSE', 'message' => 'No Existing Pharmacy Products.'));
	}
	
	public function getProductsByPharmaBranch_get() {
		$pharma = $this->branchproducts_model->read(array('pharma_branch_id' => $this->get('pharma_branch_id')));
		
		if(count($pharma) > 0 )
			$this->response(array('status' => 'TRUE', 'message' => 'Existing Pharmacy Products', 'data' => $pharma));
		else
			$this->response(array('status' => 'FALSE', 'message' => 'No Existing Pharmacy Products.'));
	}
	
	public function getProductById_get() {
		$pharma = $this->branchproducts_model->read(array('branch_product_id' => $this->get('id')));
		
		if(count($pharma) > 0 )
			$this->response(array('status' => 'TRUE', 'message' => 'Existing Pharmacy Product', 'data' => $pharma));
		else
			$this->response(array('status' => 'FALSE', 'message' => 'No Existing Pharmacy Product.'));
	}
	
	public function updateProductStatus_post() {
		$data = array (
			'status' => $this->post('status')
		);
		
		$result = $this->branchproducts_model->update(array('branch_product_id' => $this->post('id')), $data);

		if(!$result)
			$this->response(array('status' => 'FALSE', 'message' => 'Error in updating Pharmacy Product status.'));
		
		$this->response(array('status' => 'TRUE', 'message' => 'Pharmacy Product status updated.'));
	}
}