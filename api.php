<?php 

require_once 'model.php';
require_once 'config.php';
$getDataDutyIT = new getDataDutyIT();
$encrypt = new Encrypt();
     
    if(isset($_GET['apikey'])){
        $apikeyDecrypt = $encrypt->encrypt_decrypt('decrypt',$_GET['apikey']);
        switch ($apikeyDecrypt) {
            case 'getstaffnow':
                $data = $getDataDutyIT->getDutySatffNow();
                $jsonencrypt = $encrypt->encrypt_decrypt('encrypt',json_encode($data)) ;
                echo $jsonencrypt;
                break;
        }
    }

  // $encrypt->encrypt_decrypt('encrypt','getstaffnow'); //dkJNb3lzQlYzQzdHdVFqZzJ4Szlrdz09


?>