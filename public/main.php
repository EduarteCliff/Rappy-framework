<!--
	oxdl_frame 核心
	ver 1.2
	date 2019/1/26
	
	请于文件最前端引用
-->
<?php
	$path = realpath($_SERVER['DOCUMENT_ROOT'] . "/../");
	require("$path/config.php");
	function l_smtp(){
      	global $path;
      	global $smtpserver;
      	global $smtpport;
        global $smtpusr;
        global $smtppasswd;
        global $smtpname;
    	if(!class_exists("smtp")){
			require("$path/class/class.mail.php");
        }
      	$smtp = new smtp($smtpserver,$smtpport,true,$smtpusr,$smtppasswd);
      	$smtp->debug = false;
      	$smtp->frm = $smtpname;
      	return $smtp;
    }
	function l_sql(){
		global $path;
		global $sqlusr;
		global $sqlpwd;
		global $sqlloc;
		global $dbname;
      	if(!class_exists("sql")){
			require("$path/class/class.sql.php");
        }
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
		global $path;
		if(!class_exists("url")){
			require("$path/class/class.url.php");
		}
      	$requrl = new url();
		return $requrl;
	}
	function l_check_mobile(){
		global $path;
		if(!class_exists("check")){
			require("$path/class/class.checkmobile.php");
		}
		$check = new check();
		return $check;
	}
	function l_recaptcha(){
		global $path;
		global $recaptcha_code;
      	if(!class_exists("recaptcha")){
			require("$path/class/class.recaptcha.php");
        }
		$recaptcha = new recaptcha();
		if(isset($recaptcha_code) && $recaptcha_code){
			$recaptcha->secret = $recaptcha_code;
		}
      	return $recaptcha;
	}
?>
