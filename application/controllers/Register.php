<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	
	
	public function index()
	{
		if (isset($_POST['submit'])) {
			
		
			$f_data['name'] = $this->input->post('name');

			$f_data['email'] = $this->input->post('email');

			$f_data['address'] = $this->input->post('address');

			$f_data['mobile'] = $this->input->post('mobile');

			$f_data['dob'] = $this->input->post('dob');

			$f_data['password'] = $this->input->post('password');
			/*print_r($f_data);
			*/
		
			
				$this->db->insert('p_register', $f_data);
				$this->session->set_flashdata('up_msg','Register saved successfully.');
				redirect('register');
		}

		$this->load->view('header');
		$this->load->view('register');
		$this->load->view('footer');
	}
	public function edit($id){

		
		$email = $this->session->userdata('email');
		$password =  $this->session->userdata('password');
		// echo $password;

	    
		$data['res'] = $this->mdl_common->get_record('p_register', "email = '$email' AND password = '$password'")->result_array();
		


		
		if (isset($_POST['update'])) {


			$f_data['name'] = $this->input->post('name');

			$f_data['email'] = $this->input->post('email');

			$f_data['address'] = $this->input->post('address');

			$f_data['mobile'] = $this->input->post('mobile');

			$f_data['dob'] = $this->input->post('dob');

			$f_data['password'] = $this->input->post('password');


			$this->mdl_common->update_record('p_register','id = '.$id,$f_data);
			$this->session->set_flashdata('up_msg','update  successfully.');
			redirect('profile');
		}


		$this->load->view('header');
		$this->load->view('edit',$data);
		$this->load->view('footer');
	}
	public function delete($id){
	
			$this->mdl_common->delete_record('p_register','id = '.$id);
		
		
			redirect('home');

		
	}
	public function cancel(){
			
		
	}
	
	
}
