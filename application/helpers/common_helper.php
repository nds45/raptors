<?php
/*=================================================================================
							Check if ajax request or not	
==================================================================================*/
function is_ajax()
{
	$C = & get_instance();
	
	if(!$C->input->is_ajax_request()) 
		exit('No direct script access allowed');
}

/*=====================================================
					Encode Key
=======================================================*/
function encode_url($str)
{
	$C = & get_instance();
	$encode_base64 = base64_encode($str);
	$encode_hex = bin2hex($encode_base64); 
	return $encode_hex;
}

/*=====================================================
					Decode Key
=======================================================*/
function decode_url($str)
{	
	$C = & get_instance();
	$decode_hex = hex2bin($str);
	$decode_base64= base64_decode($decode_hex);
	return $decode_base64;
}
/*=====================================================
					Bimnary to hexadecimal convert
=======================================================*/
if (!function_exists('hex2bin')) {
    function hex2bin($data) {
        static $old;
        if ($old === null) {
            $old = version_compare(PHP_VERSION, '5.2', '<');
        }
        $isobj = false;
        if (is_scalar($data) || (($isobj = is_object($data)) && method_exists($data, '__toString'))) {
            if ($isobj && $old) {
                ob_start();
                echo $data;
                $data = ob_get_clean();
            }
            else {
                $data = (string) $data;
            }
        }
        else {
            trigger_error(__FUNCTION__.'() expects parameter 1 to be string, ' . gettype($data) . ' given', E_USER_WARNING);
            return;//null in this case
        }
        $len = strlen($data);
        if ($len % 2) {
            trigger_error(__FUNCTION__.'(): Hexadecimal input string must have an even length', E_USER_WARNING);
            return false;
        }
        if (strspn($data, '0123456789abcdefABCDEF') != $len) {
            trigger_error(__FUNCTION__.'(): Input string must be hexadecimal string', E_USER_WARNING);
            return false;
        }
        return pack('H*', $data);
    }
}

?>