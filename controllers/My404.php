<?php 
class My404 extends CI_Controller 
{
    public function __construct() 
    {
        parent::__construct(); 
    } 

    public function index() 
    { 
		$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

		if (false !== strpos($url,'admin')) 
		{
			$this->load->view('admin/error_404'); 
		} 
		else 
		{
			$this->load->view('error_404'); 
		}
    } 
} 
?>