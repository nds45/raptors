<?php
class Mdl_login extends CI_Model
{
	
/*=================================================================================
							 Change Password
==================================================================================*/
	
	function change_pwd($old_password, $new_password)
	{
		$this->db->where('password', encode_url($old_password));
		$this->db->where("admin_id", $this->session->userdata("admin_id"));
		$this->db->select('password');
		$prod = $this->db->get('admin');
		if($prod->row())
		{
			$db_array = array('password' => $new_password);
			$this->db->where("admin_id", $this->session->userdata("admin_id"));
			$this->db->update("admin", $db_array);
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

/*=================================================================================
								Forgot password
==================================================================================*/
	
	function forgot_password($email)
	{
		//Get email wise details
		$table_name = 'admin';
		$where = 'email = "'.$email.'"';
		
		$res = $this->mdl_common->get_record($table_name, $where)->row_array();
		
		//Update password
		$new_password = $this->mdl_common->generate_password();
		$new_password_md5 = encode_url($new_password);
		
		$data['password'] = $new_password_md5;
		$this->db->where("email", $email);
		$this->db->update("admin", $data);
		
		//Send mail
		$m_data['username'] = $res['username'];
		$m_data['new_password'] = $new_password;
		$m_data['subject'] = 'Forgot password';
		
		$html = $this->load->view('admin/mail/forgot_password', $m_data, true);
		$toEmail = $res['email'];
		$subject = 'Forgot password';
		$mail_body = $html;
		$fromEmail = FROM_EMAIL;
		$fromName = PROJECT_NAME;
		
		return $this->mdl_common->send_mail($toEmail, $subject, $mail_body, $fromEmail, $fromName);
	}	

/*=================================================================================
							Check admin old password
==================================================================================*/
	
	function check_admin_password($admin_id, $old_password)
	{
		$this->db->select("*");
		$this->db->from("admin");
		$this->db->where("admin_id = '".$admin_id."' AND password = '".md5($old_password)."'");
		
		$query = $this->db->get()->row_array();
		
		if(!empty($query))
			return "TRUE";
		else
			return "FALSE";
	}
	
/*=================================================================================
							Check admin email exist
==================================================================================*/
	
	function check_admin_email_exist($email)
	{
		$this->db->select("*");
		$this->db->from("admin");
		$this->db->where("email = '".$email."'");
		
		$query = $this->db->get()->row_array();
		
		if(!empty($query))
			return "TRUE";
		else
			return "FALSE";
	}
}