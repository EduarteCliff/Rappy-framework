<?php
	public $check_str = "^(.+)\\sand\\s(.+)|(.+)\\sor(.+)\\s$";
	public sql;
	
	class user{
		function __construct(){
			session_start();
			if(!class_exists("sql")){
				$this->sql = l_sql();
			}
		}
		
		function login($id,$passwd){
			if(preg_match($check_str,$id)){
				header("http/1.1 403 forbidden");
				exit;
			}
			$passwd = sha1($passwd);
			$result = $this->sql->query("select count(*) from usr where id = '".$id."' and passwd ='".$passwd."'");
			if($result[0]){
				$_SESSION["usr"] = $id;
				$_SESSION["pwd"] = $passwd;
				return true;
			}
			return false;
		}
		
		function session_check(){
			if(isset($_SESSION["usr"])){
				$result = $this->sql->query("select count(*) from usr where id = '".$_SESSION["usr"]."' and passwd ='".$_SESSION["pwd"]."'");
				if($result[0]){
					return true;
				}
				$_SESSION["usr"] = null;
				$_SESSION["pwd"] = null;
				return false;
			}
			return false;
		}
		
		function register($id,$passwd){
			if(preg_match($check_str,$id)){
				header("http/1.1 403 forbidden");
				exit;
			}
			$passwd = sha1($passwd);
			$this->sql->query("insert into 'usr'('id','passwd') VALUES ('".$id."','".$passwd."')",0);
			$result = $this->sql->query("select count(*) from usr where id = '".$id."' and passwd ='".$passwd."'");
			if($result[0]){
				$_SESSION["usr"] = $id;
				$_SESSION["pwd"] = $passwd;
				return true;
			}
			return false;
		}
		
		function change_passwd($id,$passwd){
			if(preg_match($check_str,$id)){
				header("http/1.1 403 forbidden");
				exit;
			}
			$passwd = sha1($passwd);
			$this->sql->query("update usr set passwd ='".$passwd."' where id = '".$id."'",0);
			return true;
		}
		
		function create_table(){
			global $dbname;
			$this->sql->query("create table '".$dbname."'.'usr'('id','passwd') engine = InnoDB;",0);
			return true;
		}
	}
?>