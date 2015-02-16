<?php
class Test extends CA_Controller{

    public function __construct() {
		parent::__construct();
		
    }
    
	public function index() {
		$this->load->library('fpdf');
		
		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',16);
		$pdf->Cell(40,10,'Hello World!');
		$pdf->Output();
		die();
		// $res = Timeline::getPost(2,0,FALSE);
		
	}
	
}

/* End of file search.php */
/* Location: ./application/controllers/search.php */
