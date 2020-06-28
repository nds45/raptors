<?php

class Mdl_common extends CI_Model

{

	function Mdl_common()

	{

		date_default_timezone_set('Asia/Kuala_Lumpur');

	}

	

/*=================================================================================

							Check admin session 	

==================================================================================*/

	

	function checkAdminSession()

	{

		if(!$this->session->userdata('admin_id'))

			redirect('admin');

	}

	

/*=================================================================================

							Check user session 	

==================================================================================*/

	

	function checkUserSession()

	{

		if(!$this->session->userdata('user_id'))

			redirect('login');

	}

	

/*=================================================================================

								API Parameter Validation

==================================================================================*/



	function param_validation($paramarray, $data)

	{

		$NovalueParam = '';

		foreach($paramarray as $val)

		{

			if(!array_key_exists($val, $data))

			{

				$NovalueParam[] = $val;

			}

		}

		if(is_array($NovalueParam) && count($NovalueParam)>0)

		{

			$returnArr['error'] = true;

			$returnArr['message'] = 'Sorry, that is not valid input. You missed '.implode(',', $NovalueParam).' parameters';

			return $returnArr;

		}

		else

		{

			return false;

		}

	}



/*=================================================================================

							Upload file 	

==================================================================================*/

	

	function upload_file($uploadFile, $filetype, $folder, $fileName='')

	{

		$resultArr = array();

		

		$config['max_size'] = '1024000';

		if($filetype == 'img') 	$config['allowed_types'] = 'gif|jpg|png|jpeg';

		if($filetype == 'All') 	$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|zip|xls';

		if($filetype == 'csv') 	$config['allowed_types'] = 'csv';

		if($filetype == 'swf') 	$config['allowed_types'] = 'swf';

		if($filetype == 'mp3') 	$config['allowed_types'] = 'mp3|wma|wav|.ra|.ram|.rm|.mid|.ogg';

		if($filetype == 'html') 	$config['allowed_types'] = 'html|htm';

		

		if(strpos($folder,'application/views') !== FALSE)

			$config['upload_path'] = './'.$folder.'/';

		else

			$config['upload_path'] = './uploads/'.$folder.'/';



		if($fileName != "")

			$config['file_name'] = $fileName;

		

		$this->load->library('upload', $config);

		$this->upload->initialize($config);

		

		if(!$this->upload->do_upload($uploadFile))

		{

			$resultArr['success'] = false;

			$resultArr['error'] = $this->upload->display_errors();

		}	

		else	

		{

			$resArr = $this->upload->data();

			$resultArr['success'] = true;

			

			if(strpos($folder,'application/views') !== FALSE)

				$resultArr['path'] = $folder."/".$resArr['file_name'];

			else

				$resultArr['path'] = "uploads/".$folder."/".$resArr['file_name'];

		}

		return $resultArr;

	}

	

/*=================================================================================

							Pagination data

==================================================================================*/

	

	function pagination_data($str, $total_rows, $per_page, $js_function)

	{

		$config['base_url'] = base_url().$str;

        $config['total_rows'] = $total_rows;

        $config['per_page'] = $per_page;

		$config['next_link'] = '&gt;';

		$config['prev_link'] = '&lt;';

		$config['first_link'] = '&gt;&gt;';

		$config['last_link'] = '&lt;&lt;';

		

        $this->pagination->initialize($config);



        $jsFunction['name'] = $js_function;

        $jsFunction['params'] = array();

        $this->pagination->initialize_js_function($jsFunction);



        $data['base_url'] = $config['base_url'];

        $data['page_link'] = $this->pagination->create_js_links();

		

		return $data;

	}



/*=================================================================================

								generate_barcode

==================================================================================*/

	public function generate_code($code)

    {

       // $code = 'demo';

        //load library

        $this->load->library('zend');

        //load in folder Zend

        $this->zend->load('Zend/Barcode');

        //generate barcode

        $imageResource = Zend_Barcode::factory('code128', 'image', array('text'=>$code), array())->draw();

		$image_name = 'uploads/barcode/'.$code.'.png';

        imagepng($imageResource, $image_name);

		

		return $image_name;

    }

/*=================================================================================

								Send mail

==================================================================================*/

	

	function send_mail($toEmail, $subject, $mail_body, $fromEmail='', $fromName='', $ccEmails='')
	{
		$this->load->library('email');		

		if(!$fromEmail)
			$fromEmail = FROM_EMAIL;

		if(!$fromName)
			$fromName = PROJECT_NAME;
			
		$config['mailtype'] = 'html';
		$config['protocol'] = 'mail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$this->email->initialize($config);	

		$this->email->from($fromEmail , $fromName);

		$this->email->to($toEmail);

		$this->email->subject($subject);

		$this->email->message($mail_body);

		//$this->email->reply_to($replyToEmail,'');

		if($ccEmails != "")
			$this->email->cc($ccEmails);

		$aa = $this->email->send();

		return $aa;

		//return $this->email->print_debugger();

	}

/*=================================================================================

								Send mail BY MAILER LIbrary

==================================================================================*/

	

	function send_mailer($toEmail, $subject, $mail_body)

	{

		require APPPATH.'/libraries/PHPMailer/class.phpmailer.php';

		

		$fromEmail =FROM_EMAIL;

		$fromPass =FROM_PASS;

		$fromName = PROJECT_NAME;

		/*---------Using PHP MAILER Class-------------*/

		$mail = new PHPMailer();

		$mail->IsSMTP();                                      // set mailer to use SMTP

		$mail->SMTPAuth = true; // authentication enabled

		$mail->SMTPSecure = 'open'; // secure transfer enabled REQUIRED for Gmail

		$mail->Host = "104.37.187.62";

		$mail->Port = 25; 

		$mail->Username = $fromEmail;  // SMTP username

		$mail->Password = $fromPass; // SMTP password

		$mail->SetFrom($fromEmail,$fromName);

		$mail->AddAddress($toEmail, $fromName); //navadiyaparivar.guj@gmail.com

		//$mail->AddReplyTo("kirtitank921113@gmail","First Last");

		$mail->IsHTML(true);                                  // set email format to HTML

		$mail->Subject = $subject;

		$mail->Body    = $mail_body;

		//$mail->AddEmbeddedImage($mainpath.$filename, 'ID_Proof');

		$mail->Send();

			

	}

	

/*=================================================================================

							Send Push 	

==================================================================================*/

	

	/*function send_push($data, $message_array)

	{

		$device_type = $data['device_type'];

		$register_id = $data['register_id'];

		$token = $data['token'];

		$badge = $data['badge']+1;

		

		if($device_type == 2)

		{

			$apiKey = "AIzaSyBjkbXFwM6ccQz6gc6ZV79obslv9sXWdtc";	

			

			$registrationIDs = array($register_id);

			

			// Message to be sent

			//$message = "Push notification testing by hemal"; 

			

			// Set POST variables

			$url = 'https://android.googleapis.com/gcm/send';

			

			$fields = array(

							'registration_ids'  => $registrationIDs,

							'data'              => $message_array,

							);

			

			$headers = array( 

								'Authorization: key=' . $apiKey,

								'Content-Type: application/json'

							);

			

			// Open connection

			$ch = curl_init();

			

			// Set the url, number of POST vars, POST data

			curl_setopt( $ch, CURLOPT_URL, $url );

			

			curl_setopt( $ch, CURLOPT_POST, true );

			curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);

			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

			

			curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $fields ) );

			

			// Execute post

			$result = curl_exec($ch);

	

			// Close connection

			curl_close($ch);

		}

		else

		{

			// Using Autoload all classes are loaded on-demand

			require_once APPPATH.'/libraries/ApnsPHP/Autoload.php';

			

			// Instantiate a new ApnsPHP_Push object

			$push = new ApnsPHP_Push(

				ApnsPHP_Abstract::ENVIRONMENT_SANDBOX,

				//ApnsPHP_Abstract::ENVIRONMENT_PRODUCTION,

				APPPATH.'/libraries/ApnsPHP/leila_push_sandbox.pem'

				//APPPATH.'/libraries/ApnsPHP/echo_production.pem'

			);

			// Set the Root Certificate Autority to verify the Apple remote peer

			$push->setRootCertificationAuthority(APPPATH.'/libraries/ApnsPHP/leila_push_sandbox.pem');

			//$push->setRootCertificationAuthority(APPPATH.'/libraries/ApnsPHP/echo_production.pem');

						

			// Connect to the Apple Push Notification Service

			$push->connect();

			

			// Instantiate a new Message with a single recipient

			//	$message = new ApnsPHP_Message('f76db75030d7e4faa17bafe1016e4e7bcad47fbeeeab693d7c72ee6d649b0c2b');

			$message = new ApnsPHP_Message($token);

			

			// Set a custom identifier. To get back this identifier use the getCustomIdentifier() method

			// over a ApnsPHP_Message object retrieved with the getErrors() message.

			$message->setCustomIdentifier("Message-Badge-3");

			

			// Set badge icon to "3"

			$message->setBadge($badge);

			

			// Set a simple welcome text

			$message->setText($message_data);

			

			// Play the default sound

			$message->setSound();

			

			// Set a custom property

			$message->setCustomProperty('acme2', array('bang', 'whiz'));

			

			// Set another custom property

			$message->setCustomProperty('acme3', array('bing', 'bong'));

			

			// Set the expiry value to 30 seconds
			$message->setExpiry(30);

			

			// Add the message to the message queue

			$push->add($message);

			

			//echo "PPPPPP";

			

			// Send all messages in the message queue

			$push->send();

			

			// Disconnect from the Apple Push Notification Service

			$push->disconnect();

			

			// Examine the error message container

			$aErrorQueue = $push->getErrors();

			if (!empty($aErrorQueue)) 

			{

				//echo "aaaaaaaaaaaaaaaaaa<pre>";print_r($aErrorQueue);die;

			}

			else

			{

				$sql="update dr_push set badge=badge+1 where token='".$token."' ";

				$result = $this->db->query($sql);

			}

		}

	}*/

	

/*=================================================================================

								Send Push

==================================================================================*/



	public function send_push($token, $msg, $badge, $custom_msg)

	{

		header("Content-type: application/json; charset=utf-8;");

		// Using Autoload all classes are loaded on-demand

		require_once APPPATH.'/libraries/ApnsPHP/Autoload.php';

		

		// Instantiate a new ApnsPHP_Push object

		$push = new ApnsPHP_Push(

			//ApnsPHP_Abstract::ENVIRONMENT_SANDBOX,

			ApnsPHP_Abstract::ENVIRONMENT_PRODUCTION,

			//APPPATH.'/libraries/ApnsPHP/ss_push_sandbox.pem'

			APPPATH.'/libraries/ApnsPHP/ss_push_production.pem'

		);

		// Set the Root Certificate Autority to verify the Apple remote peer

		//$push->setRootCertificationAuthority(APPPATH.'/libraries/ApnsPHP/ss_push_sandbox.pem');

		$push->setRootCertificationAuthority(APPPATH.'/libraries/ApnsPHP/ss_push_production.pem');

		

		// Connect to the Apple Push Notification Service

		$push->connect();

		

		// Instantiate a new Message with a single recipient

		//$message = new ApnsPHP_Message('223eb502c158e7bda83128fbd966aa709fcf4b904399d7c01934f9a2f892a029');

		$message = new ApnsPHP_Message($token);

		// Set a custom identifier. To get back this identifier use the getCustomIdentifier() method

		// over a ApnsPHP_Message object retrieved with the getErrors() message.

		$message->setCustomIdentifier("Message-Badge-3");

		

		// Set badge icon to "3"

		$message->setBadge((int)$badge+1);

		

		// Set a simple welcome text

		$message->setText($msg);

		

		// Play the default sound

		$message->setSound();

		

		// Set a custom property

		if($custom_msg)

		{

			$message->setCustomProperty('custom_msg', json_encode($custom_msg, JSON_UNESCAPED_UNICODE));

		}

		// Set the expiry value to 30 seconds

		$message->setExpiry(30);

		// Add the message to the message queue

		$push->add($message);

		

		// Send all messages in the message queue

		$push->send();

		

		// Disconnect from the Apple Push Notification Service

		$push->disconnect();

		

		// Examine the error message container

		$aErrorQueue = $push->getErrors();

		//var_dump($aErrorQueue); die;

		return true;

	}

	

/*=================================================================================

								Send Push GCM / FCM

==================================================================================*/



	public function send_push_gcm($register_id, $msg)

	{

		$apiKey = "AIzaSyADL4Whs5JeIjT9S30ui0O7YciOzLvBVIo";

		

		$registrationIDs = array($register_id);

		

		// Message to be sent 

		

		//$url = 'https://android.googleapis.com/gcm/send';//GCM

		$url ="https://fcm.googleapis.com/fcm/send";//FCM

		

		$fields = array(

			//'to' => "kt",//either to or registration_ids

			'registration_ids'  => $registrationIDs,

			'data'              => $msg,

		);

		

		/*$fields = array(

        //'to' => "kt",//either to or registration_ids

        'registration_ids' => $registrationIDs,

			'data' => array(

					"message" => "hello",

					"id" => "2",

			),

		);*/

		/*echo "<pre>";

		echo json_encode( $fields );*/

		

		$headers = array( 

			'Authorization: key=' . $apiKey,

			'Content-Type: application/json'

		);

		

		// Open connection
		$ch = curl_init();

		

		// Set the url, number of POST vars, POST data

		curl_setopt( $ch, CURLOPT_URL, $url );

		

		curl_setopt( $ch, CURLOPT_POST, true );

		curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);

		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $fields ) );

		

		// Execute post

		$result = curl_exec($ch);

		// Close connection

		curl_close($ch);

		//echo "<pre>"; print_r($result);die;

	}



/*=================================================================================

						         Send Sms

==================================================================================*/

	function send_sms($from, $to, $msg)

	{

		try

		{

			/*$AccountSid = "AC41b9509bf11cb89b4063feab7bdc3ea0";

			$AuthToken = "0c1681f45b8e1863871e8bde5915ba14";*/

			

			$AccountSid = "ACc733dfe2c92390ca91bafb29d36057b0";

			$AuthToken = "339a4f1335e31e55cd97c9a3bbffd7dd";

			 

			$client = new Services_Twilio($AccountSid, $AuthToken);

	

			$message = $client->account->messages->create(array(

				"From" => "+18709050076",

				"To" => "+$to",

				"Body" => $msg,

			));

			if($message->sid)

				return TRUE;

			else

				return FALSE;

		}catch(Exception $e)

		{

			return false;

		}

	}



/*=================================================================================

						         Call Verification

==================================================================================*/



	function call_me($from, $to, $msg)

	{

		try

		{

			$AccountSid = "AC41b9509bf11cb89b4063feab7bdc3ea0";

			$AuthToken = "0c1681f45b8e1863871e8bde5915ba14";

			

			/*$AccountSid = "ACc733dfe2c92390ca91bafb29d36057b0";

			$AuthToken = "339a4f1335e31e55cd97c9a3bbffd7dd";*/

			 

			$client = new Services_Twilio($AccountSid, $AuthToken);

	

			$url = "http://twimlets.com/message";

			$message = $client->account->calls->create(

				"+17746332198",

				"+$to",

				$url."?Message=".urlencode($msg)

			);

			//echo '<pre>';print_r($message);

			if($message->sid)

				return TRUE;

			else

				return FALSE;

		}catch(Exception $e)

		{

			return false;

		}

		

	}

	

/*=================================================================================

								Generate password

==================================================================================*/

	

	function generate_password($length=9, $strength=0) 

	{

		$vowels = 'aeuy';

		$consonants = 'bdghjmnpqrstvz';

		if ($strength & 1) 

		{

			$consonants .= 'BDGHJLMNPQRSTVWXZ';

		}

		if ($strength & 2) 

		{

			$vowels .= "AEUY";

		}

		if ($strength & 4) 

		{

			$consonants .= '23456789';

		}

		if ($strength & 8) 

		{

			$consonants .= '@#$%';

		}

	 	

		$password = '';

		$alt = time() % 2;

		for ($i = 0; $i < $length; $i++) 

		{

			if ($alt == 1) 

			{

				$password .= $consonants[(rand() % strlen($consonants))];

				$alt = 0;

			} 

			else 

			{

				$password .= $vowels[(rand() % strlen($vowels))];

				$alt = 1;

			}

		}

		return $password;

	}

	

/*=================================================================================

								Get Record	

==================================================================================*/

	

	function execute_query($sql)

	{

		return $q = $this->db->query($sql);

	}

	

/*=================================================================================

								Get Record	

==================================================================================*/

	

	function get_record($table_name, $where='', $field='*')

	{

		$this->db->select($field, false);

		$this->db->from($table_name);

		

		if($where){

			if(is_array($where))

			{

				foreach($where as $key=>$val)

				{

					$this->db->where($key, $val);

				}

			}

			else

			{

				$this->db->where($where);

			}

		}

		$res=$this->db->get();

		return $res;

	}	

	

/*=================================================================================

								Insert Record	

==================================================================================*/

	

	function insert_record($table_name, $insert_data)

	{

		$this->db->insert($table_name, $insert_data);

		return $this->db->insert_id();

	}	

	

/*=================================================================================

								Update Record	

==================================================================================*/

	

	function update_record($table_name, $where, $update_data)

	{

		if(is_array($where))

		{

			foreach($where as $key=>$val)

			{

				$this->db->where($key, $val);

			}

		}

		else

		{

			$this->db->where($where);

		}

		return $this->db->update($table_name, $update_data);

	}	

	

/*=================================================================================

								Delete Record

==================================================================================*/

	

	function delete_record($table_name, $where)

	{

		if(is_array($where))

		{

			foreach($where as $key=>$val)

			{

				$this->db->where($key, $val);

			}

		}

		else

		{

			$this->db->where($where);

		}

		

		return $this->db->delete($table_name);

	}

	

/*=================================================================================

								Compress image	

==================================================================================*/

	

	function compress_image($source_url, $file_name,$destination_path, $quality) 
	{
		$info = getimagesize($source_url);
	 
		if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source_url);
		elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source_url);
		elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source_url);
	 
	 	$img_name = "image_".mt_rand(7000,999999999);
		$path = $file_name;
		$ext = pathinfo($path, PATHINFO_EXTENSION);
		$upload_img_name= $destination_path.$img_name.".".$ext;
		//save it
		imagejpeg($image, $upload_img_name, $quality);
	 
		//return destination file url
		return $upload_img_name;
	}
	/*=================================================================================

								Resize image	

==================================================================================*/

	function resize_image($tmp_name,$file_name,$destination_path,$new_height,$new_width)

	{

		

		$file = $tmp_name;

		$img_name = "image_".mt_rand(10000,999999999);

		$path = $file_name;

		$ext = pathinfo($path, PATHINFO_EXTENSION);

		$upload_img_name= $destination_path.$img_name.".".$ext;

	

	

		$source_properties = getimagesize($file);

		$image_type = $source_properties[2]; 

		

		//$image_type= strtolower($img_typ);

		

		if( $image_type == IMAGETYPE_JPEG ) {   

			$image_resource_id = imagecreatefromjpeg($file);  	

			$target_layer = $this->fn_resize($image_resource_id,$source_properties[0],$source_properties[1],$new_height,$new_width);

			imagejpeg($target_layer,$upload_img_name );

		}

		elseif( $image_type == IMAGETYPE_GIF )  {  

			$image_resource_id = imagecreatefromgif($file);

			$target_layer = $this->fn_resize($image_resource_id,$source_properties[0],$source_properties[1],$new_height,$new_width);

			imagegif($target_layer,$upload_img_name);

		}

		elseif( $image_type == IMAGETYPE_PNG ) {

			$image_resource_id = imagecreatefrompng($file); 

			$target_layer = $this->fn_resize($image_resource_id,$source_properties[0],$source_properties[1],$new_height,$new_width);

			imagepng($target_layer,$upload_img_name);

		}

		return $upload_img_name;

	

	}

	function fn_resize($image_resource_id,$width,$height,$new_height,$new_width)

	{

		$target_layer=imagecreatetruecolor($new_width,$new_height);

		imagecopyresampled($target_layer,$image_resource_id,0,0,0,0,$new_width,$new_height, $width,$height);

		return $target_layer;

	}

	

/*=================================================================================

								Sorting array	

==================================================================================*/

	

	function aasort(&$array, $key , $order) 

	{

        $sorter=array();

        $ret=array();

        reset($array);

        foreach($array as $ii => $va) 

		{

            $sorter[$ii]=$va[$key];

        }

		if($order == 'ASC')

       		asort($sorter);

		else

			arsort($sorter);

        foreach($sorter as $ii => $va) 

		{

            $ret[$ii]=$array[$ii];

        }

        return $array = array_values($ret);

    }

	

/*=================================================================================

								Get dupicate keys	

==================================================================================*/

	

	function get_dup_keys(array $array, $return_first = true, $return_by_key = true) 

	{

		$seen = array();

		$dups = array();

	

		foreach ($array as $k => $v) 

		{

			$vk = $return_by_key ? $v : 0;

			if (!array_key_exists($v, $seen)) 

			{

				$seen[$v] = $k;

				$dups[$vk][] = $seen[$v];

				continue;

			}

			if ($return_first && !array_key_exists($v, $dups)) 

			{

				$dups[$vk][] = $seen[$v];

			}

			$dups[$vk][] = $k;

		}

		return $return_by_key ? $dups : $dups[0];

	}

	

/*=================================================================================

								Time Format

==================================================================================*/

	function time_format($timestamp)

	{

		//type cast, current time, difference in timestamps

		$timestamp      = strtotime($timestamp);

		$timestamp      = (int) $timestamp;

		$current_time   = time();

		$diff           = $current_time - $timestamp;

	

		//intervals in seconds

		$intervals      = array (

			'year' => 31556926, 'month' => 2629744, 'week' => 604800, 'day' => 86400, 'hour' => 3600, 'minute'=> 60

		);

	

		//now we just find the difference

		if ($diff == 0) {

			return 'just now';

		}

	

		if ($diff < 60) {

			return $diff == 1 ? $diff . ' second ago' : $diff . ' seconds ago';

		}

	

		if ($diff >= 60 && $diff < $intervals['hour']) {

			$diff = floor($diff/$intervals['minute']);

			return $diff == 1 ? $diff . ' minute ago' : $diff . ' minutes ago';

		}

	

		if ($diff >= $intervals['hour'] && $diff < $intervals['day']) {

			$diff = floor($diff/$intervals['hour']);

			return $diff == 1 ? $diff . ' hour ago' : $diff . ' hours ago';

		}

	

		if ($diff >= $intervals['day'] && $diff < $intervals['week']) {

			$diff = floor($diff/$intervals['day']);

			return $diff == 1 ? $diff . ' day ago' : $diff . ' days ago';

		}

	

		if ($diff >= $intervals['week'] && $diff < $intervals['month']) {

			$diff = floor($diff/$intervals['week']);

			return $diff == 1 ? $diff . ' week ago' : $diff . ' weeks ago';

		}

	

		if ($diff >= $intervals['month'] && $diff < $intervals['year']) {

			$diff = floor($diff/$intervals['month']);

			return $diff == 1 ? $diff . ' month ago' : $diff . ' months ago';

		}

	

		if ($diff >= $intervals['year']) {

			$diff = floor($diff/$intervals['year']);

			return $diff == 1 ? $diff . ' year ago' : $diff . ' years ago';

		}

	}

/*=================================================================================

								Upload image

==================================================================================*/

	function upload_image($temp_file,$file_name,$upload_path)

	{

		$img_name = "image_".mt_rand(10000,999999999);

		$path = $file_name;

		$ext = pathinfo($path, PATHINFO_EXTENSION);

		$upload_img_name= $upload_path.$img_name.".".$ext;

		$uploaded_image = $img_name.".".$ext;

		move_uploaded_file($temp_file, $upload_img_name);

		return $upload_img_name;

	}

}

?>