<!--
	oxdl_frame 核心
	ver 1.2
	date 2019/1/26
	
	请于文件最前端引用
-->
<?php
	require("../config.php");
	function l_sql(){
		global $sqlusr;
		global $sqlpwd;
		global $sqlloc;
		global $dbname;
		require("../class/class.sql.php");
		$sql = new sql();
		if(isset($sqlusr)){
			$sql->usr = $sqlusr;
			$sql->pwd = $sqlpwd;
			$sql->location = $sqlloc;
			if(isset($dbname)){
				$sql->db = $dbname;
			}
		}
      	return $sql;
	}
	function l_url(){
		if(!class_exists("url")){
			require("../class/class.url.php");
		}
		$requrl = new url();
		return $requrl;
	}
	function l_check_mobile(){
		require("../class/class.checkmobile.php");
		$check = new check();
		return $check;
	}
	function l_recaptcha(){
		global $recaptcha_code;
		require("../class/class.recaptcha.php");
		$recaptcha = new recaptcha();
		if(isset($recaptcha_code) && $recaptcha_code){
			$recaptcha->secret = $recaptcha_code;
		}
      	return $recaptcha;
	}
?>