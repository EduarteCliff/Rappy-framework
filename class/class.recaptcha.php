<!--
	recaptcha China
	ver 1.0
	date 2019/1/26
-->
<?php
/*
	方法
	v_recaptcha();
*/
	class recaptcha{
		public $url = "https://www.recaptcha.net";
		public $secret;
		
		function __construct(){
          	$path = realpath($_SERVER['DOCUMENT_ROOT'] . "/../");
			if(!class_exists("url")){
				require("$path/class/class.url.php");
			}
		}
		
		function v_recaptcha(){
			if(isset($_POST["g-recaptcha-response"]) || $_GET["test"]){
				$url = new url();
				$value = $url->req("$this->url/recaptcha/api/siteverify","secret=$this->secret&response=" . $_POST["g-recaptcha-response"]);
				$value = json_decode($value,true);
				if($value["success"]){
					return true;
				}
				else{
					return false;
				}
			}
			return "Missing parameter";
		}
	}
?>
