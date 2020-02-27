<?php 

class modelDutyIT{
    function getITDuty(){
      $Encrypt = new Encrypt();
        $json = file_get_contents('http://yth.go.th/yth-api/api.php?apikey=dkJNb3lzQlYzQzdHdVFqZzJ4Szlrdz09');
        $row = json_decode($Encrypt->encrypt_decrypt('decrypt',$json));
        $textmsg = $row[0]->staffname."\r\n"."ตำแหน่ง : ".$row[0]->staff_position."\r\n"."โทร : ".$row[0]->staff_tell;
        return $textmsg;
        //echo $row[0]->staff_id;
      }
}


class Encrypt
{
	function encrypt_decrypt($action, $string)
	{
		$output = false;
		$encrypt_method = "AES-256-CBC";
		$secret_key = 'hos';
		$secret_iv = '11081';
		// hash
		$key = hash('sha256', $secret_key);
		// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
		$iv = substr(hash('sha256', $secret_iv), 0, 16);
		if ($action == 'encrypt') {
			$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
			$output = base64_encode($output);
		} else if ($action == 'decrypt') {
			$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
		}
		return $output;
	}
}   


