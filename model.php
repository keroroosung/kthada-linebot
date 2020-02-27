<?php
require_once 'config.php';

class getData extends Query
{

}


class getDataHosxp extends queryHosXP
{
	
}

class getDataYTH extends queryYTH
{
	
}

class getDataDutyIT extends queryDutyIT
{
	function getDutySatffNow(){
		$query = new queryDutyIT();
		$datenow = date('Y-m-d');
		$sql = "SELECT ds.staff_id,concat(ds.staff_pname,ds.staff_fname,' ',ds.staff_lname) as staffname,ds.staff_position,ds.staff_tell,ds.staff_mail from duty d 
		LEFT JOIN duty_staff ds on d.duty_staff = ds.staff_id
		WHERE d.duty_date='$datenow' ";
		$row = $query->select($sql);
		return $row;
	}
}