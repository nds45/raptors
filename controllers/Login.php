<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	
	public function index()
	{
		// if($this->session->userdata('id'))
			// redirect('admin/profile');
		

		if(isset($_POST['login']))
		{
			
			$email = $this->input->post('email');
			$pass = $this->input->post('password');

			/*$remember = $this->input->post('remember');
			$password = $this->input->post('password');*/
			
			$res = $this->mdl_common->get_record('p_register', "email = '$email' AND password = '$pass'")->row_array();
			/*echo $this->db->last_query().'<br>';
			echo '<pre>';print_r($res);die;*/
			if(!empty($res))
			{
				$userdata = array(
					'password'  => $res['password'],
					'email' => $res['email']
				);
				
				$this->session->set_userdata($userdata);
										
				redirect('profile');
			}
			else
			{
				$data['email'] = $this->input->post('email');
				$data['password'] = $this->input->post('password');
				// $data['error'] = "Username or password is wrong.";
				$this->session->set_flashdata('error','Username or password is wrong..');
				$this->load->view('header');
				$this->load->view('login');
				$this->load->view('footer');
			}
		}
		else
		{
			$data['email'] = $this->input->cookie('email', true);
			$data['password'] = $this->input->cookie('password', true);
			$this->session->set_flashdata('error','');
			$this->load->view('header');
			$this->load->view('login');
			$this->load->view('footer');
			// $this->load->view('login',$data);
		}





		


	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('Login');
	}
	
}
