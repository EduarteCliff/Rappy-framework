<?php
	class need_login{
		public $usr;
		public $pwd;
		
		function create_loggedin_session(){
			$_SESSION["admin_usr"] = $this->usr;
			$_SESSION["admin_pwd"] = $this->pwd;
		}
		
		function is_logged_in(){
			if (isset($_SERVER['PHP_AUTH_USER']) || isset($_SERVER['PHP_AUTH_PW']){
				if($_SERVER['PHP_AUTH_USER'] == $this->usr && $_SERVER['PHP_AUTH_PW'] == $this->pwd){
					$this->create_loggedin_session();
					return true;
				}
			}
			elseif(isset($_SESSION["admin_usr"])){
				if($_SESSION["admin_usr"] == $this->usr && $_SESSION["admin_pwd"] == $this->pwd){
					return true;
				}
			}
			return false;
		}
		
		function we_need_login(){
			session_start();
			if(!($this->is_logged_in())){
				header("WWW-Authenticate:Basic realm=需要登陆");
				return false;
			}
			else{
				return true;
			}
		}
	}