<?php
class Orders extends CA_Controller{
	public $layout = 'pharmacy';
	
	public function __construct() {
		parent::__construct();
		// $this->requireLogin();
	}
		
	public function index($status = null){
		$this->load->config('checkapp_config');
		
		$txnWords = $this->config->item('txnWords');
		$orders = $this->getPharmacy_Transactions('getTxnByStatus', array('status' => TXN_PENDING, 'pharma_id' => $this->self['pharma_id'], 'branch_id' => $this->self['branch_id']));
	
		$this->carabiner->css('dashboard/pharmacy/overview.css');
		$this->carabiner->js('dashboard/pharmacy/overview.js');
		$this->render('dashboard/pharmacy/orders/index', array(
			'topnav' => 'top_pharmacy_orders',
			'orders' => $orders->data,
			'txnWords' => $txnWords
		));
    }
    
	public function cancelled(){
		$this->load->config('checkapp_config');
		
		$txnWords = $this->config->item('txnWords');
		$orders = $this->getPharmacy_Transactions('getTxnByStatus', array('status' => TXN_CANCEL, 'pharma_id' => $this->self['pharma_id'], 'branch_id' => $this->self['branch_id']));
		
		$this->carabiner->css('dashboard/pharmacy/overview.css');
		$this->carabiner->js('dashboard/pharmacy/overview.js');
		$this->render('dashboard/pharmacy/orders/cancelled_orders', array(
			'topnav' => 'top_pharmacy_orders',
			'orders' => $orders->data,
			'txnWords' => $txnWords
		));
    }
    
	public function processed(){
		$this->load->config('checkapp_config');
		
		$txnWords = $this->config->item('txnWords');
		$orders = $this->getPharmacy_Transactions('getTxnByStatus', array('status' => TXN_PROCESS, 'pharma_id' => $this->self['pharma_id'], 'branch_id' => $this->self['branch_id']));
		
		$this->carabiner->css('dashboard/pharmacy/overview.css');
		$this->carabiner->js('dashboard/pharmacy/overview.js');
		$this->render('dashboard/pharmacy/orders/processed_orders', array(
			'topnav' => 'top_pharmacy_orders',
			'orders' => $orders->data,
			'txnWords' => $txnWords
		));
    }
    
    public function view($refNo) {
    	$this->load->config('checkapp_config');
    	
    	$txnWords = $this->config->item('txnWords');
    	$order = $this->getPharmacy_Transactions('getByRefNo', array('refNo' => $refNo));
    	
    	if(isset($order->data->provider_id)) {
    		$provider = $this->getProvider('profile', array('user_id' => $order->data->provider_id));
    		
    		$order->data->provider = $provider->data;
    	}
    	
    	if(isset($order->data->member_id)) {
    		$member = $this->getMember('profile', array('id' => $order->data->member_id));
    		$order->data->member = $member->data;
    	}
    	
    	$this->carabiner->css('dashboard/pharmacy/overview.css');
    	$this->carabiner->js('dashboard/pharmacy/overview.js');
    	$this->render('dashboard/pharmacy/orders/view_order', array(
    			'order' => $order->data,
    			'txnWords' => $txnWords
    	));
    }

    public function process($refNo) {
    	$data = array (
    		'status' => TXN_PROCESS,
    		'refNo' => $refNo
    	);
    	
    	$this->postPharmacy_Transactions('updateTransactionStatus', $data);
    	
    	redirect('/dashboard/pharmacy/orders');
    }
    
    public function cancel($refNo) {
    	$data = array (
    		'status' => TXN_CANCEL,
    		'refNo' => $refNo
    	);
    	
    	$this->postPharmacy_Transactions('updateTransactionStatus', $data);
    	
    	redirect('/dashboard/pharmacy/orders');
    }
}