<?php
require_once 'config.php';
$decrypt = new Encrypt();
$json = file_get_contents('http://localhost/yth-api/api.php?apikey=dkJNb3lzQlYzQzdHdVFqZzJ4Szlrdz09');
$row = json_decode($decrypt->encrypt_decrypt('decrypt',$json));
print_r($row); 
