<?php 

class modelDutyIT{
    function getITDuty(){
        $json = file_get_contents('http://yth.go.th/yth-api/api.php?apikey=dkJNb3lzQlYzQzdHdVFqZzJ4Szlrdz09');
        $row = json_decode($json);
        $textmsg = $row[0]->staffname."\r\n"."ตำแหน่ง : ".$row[0]->staff_position."\r\n"."โทร : ".$row[0]->staff_tell;
        return $textmsg;
        //echo $row[0]->staff_id;
      }
}
