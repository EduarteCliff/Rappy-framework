<?php
/** Rappy core
  *	usage:
  * require_once($_SERVER['DOCUMENT_ROOT'] ."/main.php");
  * version beta1.3
  * Email i@oxdl.cn
  * Do not use in production environment.
*/
	$path = realpath($_SERVER['DOCUMENT_ROOT'] . "/../");
	require("$path/config.php");
	function l_need_login(){
		global $path;
		if(!class_exists("decimal")){
			require("$path/class/class.needlogin.php");
		}
		$login = new need_login();
		return $login;
	}
	function l_dec(){
		global $path;
		if(!class_exists("decimal")){
			require("$path/class/class.decimal.php");
		}
		$dec = new decimal();
		return $dec;
	}
	function l_smtp(){
      	global $path;
      	global $smtpserver;
      	global $smtpport;
        global $smtpusr;
        global $smtppasswd;
        global $smtpname;
		global $smtpssl;
    	if(!class_exists("PHPMailer")){
			require("$path/class/class.sendmail.php");
			require("$path/class/class.smtp.php");
        }
      	$mail = new PHPMailer();
		$mail->isSMTP();
		$mail->SMTPAuth=true;
		$mail->Host = $smtpserver;
		if($smtpssl != ""){
			//ssl or tls
			$mail->SMTPSecure = $smtpssl;
		}
		$mail->Port = $smtpport;
		$mail->CharSet = 'UTF-8';
		$mail->FromName = $smtpname;
		$mail->Username = $smtpusr;
		$mail->Password = $smtppasswd;
		$mail->From = $smtpusr;
		$mail->isHTML(true);
		return $mail;
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