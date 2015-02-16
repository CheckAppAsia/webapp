<?php
require(APPPATH.'libraries/REST_Controller.php');
class Transactions extends REST_Controller {
	
	public function __construct() {
		parent::__construct();

		$this->load->model('pharmacy/transactions_model');
		$this->load->model('pharmacy/transactiondetails_model');
	}
	
	/**
	 * @param pharma_id int
	 * @param branch_id int
	 * @param provider_id int
	 * @param member_id int
	 * @param order_details json_encoded details
	 * 
	 * sample: ?pharma_id=1&provider_id=1&member_id=1&order_details=[{"product_id":1,"product_type":1,"qty":10000,"amount":1},{"product_id":2,"product_type":2,"qty":1000,"amount":2},{"product_id":3,"product_type":1,"qty":100,"amount":3},{"product_id":2,"product_type":2,"qty":10,"amount":4},{"product_id":1,"product_type":1,"qty":1,"amount":5}]
	 */
	public function create_post() {
		$data = array (
				'pharma_id' => $this->post('pharma_id'),
				'branch_id' => $this->post('branch_id'),
				'order_ref_no' => $this->generateRefNo(),
				'provider_id' => $this->post('provider_id'),
				'member_id' => $this->post('member_id'),
				'status' => TXN_PENDING,
				'date_created' => time()
		);
		
		$result = $this->transactions_model->create($data);
		
		if(is_bool($result))
			$this->response(array('status' => 'FALSE', 'message' => 'Transaction failed.'));
		
		$result = $this->saveDetails($data['order_ref_no'], $this->post('order_details'));
		
		if(is_bool($result))
			$this->response(array('status' => 'FALSE', 'message' => 'Transaction Details failed.'));
			
		$this->response(array('status' => 'TRUE', 'message' => 'Transaction Entered for Processing.', 'refNo' => $data['order_ref_no']));
	}
	
	private function saveDetails($refNo, $details) {
		$details = json_decode($details);
		
		$totalQty = 0;
		$totalAmt = 0;
		foreach($details as $det) {
			$det = (array) $det;
			$txnDet = array(
				'reference_no' => $refNo,
				'date_created' => time(),
				'product_id' => $det['product_id'],
				'product_type' => $det['product_type'],
				'qty' => $det['qty'],
				'amount' => $det['amount']
			);
			
			$result = $this->transactiondetails_model->create($txnDet);
			
			if(is_bool($result))
				return FALSE;
			
			$totalQty += $det['qty'];
			$totalAmt += $det['amount'];
		}
		
		$this->updateQtyAmount($refNo, $totalQty, $totalAmt);
		
		return;
	}
	
	private function updateQtyAmount($refNo, $qty, $amt) {
		$data = array (
				'total_qty' => $qty,
				'total_amt' => $amt
		);
		
		$this->transactions_model->update(array('order_ref_no' => $refNo), $data);
		
		return;
	}
	
	private function generateRefNo() {
		return 'PH'.time();
	}
	
	public function getByRefNo_get() {
		$txn = $this->transactions_model->read(array('order_ref_no' => $this->get('refNo')));
		
		if(!count($txn))
			$this->response(array('status' => 'FALSE', 'message' => 'No Existing Transaction.'));
		else {
			
			$details = $this->transactiondetails_model->read(array('reference_no' => $txn[0]->order_ref_no));
			
			$txn[0]->details = (array) $details;

			$this->response(array('status' => 'TRUE', 'message' => 'Existing Transaction', 'data' => $txn[0]));			
		}
	}
	
	public function getTxns_get() {
		$txns = $this->transactions_model->read(array('pharma_id' => $this->get('pharma_id'), 'branch_id' => $this->get('branch_id')));
				
		if(!count($txns))
			$this->response(array('status' => 'FALSE', 'message' => 'No Existing Transaction.'));
		else {
			
			$count = count($txns);
			for($i = 0; $i < $count; $i++) {
				$details = $this->transactiondetails_model->read(array('reference_no' => $txns[$i]->order_ref_no));
			
				$txns[$i]->details = (array) $details;
			}
			
			$this->response(array('status' => 'TRUE', 'message' => 'Existing Transaction', 'data' => $txns));			
		}
	}
	
	public function getTxnByStatus_get() {
		$txns = $this->transactions_model->read(array('status' => $this->get('status'), 'pharma_id' => $this->get('pharma_id'), 'branch_id' => $this->get('branch_id')));
		
		if(!count($txns))
			$this->response(array('status' => 'FALSE', 'message' => 'No Existing Transaction.'));
		else {
			$count = count($txns);
			for($i = 0; $i < $count; $i++) {
				$details = $this->transactiondetails_model->read(array('reference_no' => $txns[$i]->order_ref_no));
					
				$txns[$i]->details = (array) $details;
			}
			
			$this->response(array('status' => 'TRUE', 'message' => 'Existing Transaction', 'data' => $txns));
		}
	}
	
	public function updateTransactionStatus_post() {
		$data = array (
			'status' => $this->post('status'),
			'date_processed' => time()
		);
		
		$result = $this->transactions_model->update(array('order_ref_no' => $this->post('refNo')), $data);

		if(!$result)
			$this->response(array('status' => 'FALSE', 'message' => 'Error in updating Transaction status.'));
		
		$this->response(array('status' => 'TRUE', 'message' => 'Transaction status updated.'));
	}
}