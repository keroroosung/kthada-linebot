<?php
date_default_timezone_set("Asia/Bangkok");
require_once 'model.php';
class database
{
	var $usrdb = 'sa';
	var $pwddb = 'sa';
	var $namedb = 'finyth';
	var $host = '172.16.46.6';

	function connectdb()
	{
		/*$con = mysql_connect($this->host, $this->usrdb, $this->pwddb);
		mysql_query("SET NAMES UTF8");
		$db = mysql_select_db($this->namedb, $con) or die("can't connect database");
		return;*/
		try {
			$con = new PDO(
				"mysql:host=$this->host;dbname=$this->namedb",
				"$this->usrdb",
				"$this->pwddb",
				array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
			);
			return $con;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
}

class databaseHosXp
{
	var $usrdb = 'sa';
	var $pwddb = 'sa';
	var $namedb = 'hos';
	var $host = '172.16.46.2';

	function connectdbHosXp()
	{
		/*$con = mysql_connect($this->host, $this->usrdb, $this->pwddb);
		mysql_query("SET NAMES UTF8");
		$db = mysql_select_db($this->namedb, $con) or die("can't connect database");
		return;*/
		try {
			$con = new PDO(
				"mysql:host=$this->host;dbname=$this->namedb",
				"$this->usrdb",
				"$this->pwddb",
				array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
			);
			return $con;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
}

class databaseYTH
{
	var $usrdb = 'sa';
	var $pwddb = 'sa';
	var $namedb = 'ythdb';
	var $host = '172.16.46.15';

	function connectdbYth()
	{
		/*$con = mysql_connect($this->host, $this->usrdb, $this->pwddb);
		mysql_query("SET NAMES UTF8");
		$db = mysql_select_db($this->namedb, $con) or die("can't connect database");
		return;*/
		try {
			$con = new PDO(
				"mysql:host=$this->host;dbname=$this->namedb",
				"$this->usrdb",
				"$this->pwddb",
				array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
			);
			return $con;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
}

class databaseDutyIT
{
	var $usrdb = 'sa';
	var $pwddb = 'sa';
	var $namedb = 'duty_it';
	var $host = '172.16.46.15';

	function connectdbDutyIT()
	{
		/*$con = mysql_connect($this->host, $this->usrdb, $this->pwddb);
		mysql_query("SET NAMES UTF8");
		$db = mysql_select_db($this->namedb, $con) or die("can't connect database");
		return;*/
		try {
			$con = new PDO(
				"mysql:host=$this->host;dbname=$this->namedb",
				"$this->usrdb",
				"$this->pwddb",
				array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
			);
			return $con;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
}


class query extends database
{
	function select($sql)
	{
		$pdo = $this->connectdb();
		$stmt = $pdo->query($sql);
		//$sql = mysql_query($sql);
		$data = array();
		while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
			$data[] = $row;
		}

		/*while ($row = mysql_fetch_object($sql)) {
			$data[] = $row;
		}*/
		return $data;
	}

	function sqlquery($sql)
	{
		try {
			$pdo = $this->connectdb();
			$stmt = $pdo->exec($sql);
			return true;
		} catch (PDOException $e) {
			return false;
		}
	}
}

class queryHosXP extends databaseHosXp
{
	function select($sql)
	{
		$pdo = $this->connectdbHosXp();
		$stmt = $pdo->query($sql);
		//$sql = mysql_query($sql);
		$data = array();
		while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
			$data[] = $row;
		}

		/*while ($row = mysql_fetch_object($sql)) {
			$data[] = $row;
		}*/
		return $data;
	}

	function sqlquery($sql)
	{
		try {
			$pdo = $this->connectdbHosXp();
			$stmt = $pdo->exec($sql);
			return true;
		} catch (PDOException $e) {
			return false;
		}
	}
}

class queryYTH extends databaseYTH
{
	function select($sql)
	{
		$pdo = $this->connectdbYth();
		$stmt = $pdo->query($sql);
		//$sql = mysql_query($sql);
		$data = array();
		while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
			$data[] = $row;
		}

		/*while ($row = mysql_fetch_object($sql)) {
			$data[] = $row;
		}*/
		return $data;
	}

	function sqlquery($sql)
	{
		try {
			$pdo = $this->connectdbYth();
			$stmt = $pdo->exec($sql);
			return true;
		} catch (PDOException $e) {
			return false;
		}
	}
}

class queryDutyIT extends databaseDutyIT
{
	function select($sql)
	{
		$pdo = $this->connectdbDutyIT();
		$stmt = $pdo->query($sql);
		//$sql = mysql_query($sql);
		$data = array();
		while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
			$data[] = $row;
		}

		/*while ($row = mysql_fetch_object($sql)) {
			$data[] = $row;
		}*/
		return $data;
	}

	function sqlquery($sql)
	{
		try {
			$pdo = $this->connectdbDutyIT();
			$stmt = $pdo->exec($sql);
			return true;
		} catch (PDOException $e) {
			return false;
		}
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





