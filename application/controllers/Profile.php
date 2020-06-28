<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
{
	function Profile()
	{
		parent::__construct();
		if(!$this->session->userdata('email'))
		{
			redirect('login');
		}		
	}

/*=================================================================================
								edit profile
==================================================================================*/
	
	public function index()
	{
		$email = $this->session->userdata('email');
		$password =  $this->session->userdata('password');
		// echo $password;

	    
		$data['res'] = $this->mdl_common->get_record('p_register', "email = '$email' AND password = '$password'")->result_array();
	 //    echo "<pre>";
	 //    echo $this->db->last_query();
	 //    print_r($res);
		// die;


		$this->load->view('header');
		$this->load->view('profile',$data);
		$this->load->view('footer');
	}

	

}
