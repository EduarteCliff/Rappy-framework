<?php
/*
	方法
	ismoblie(); 手机浏览器
	iswx(); 微信浏览器
	isqq(); QQ浏览器
*/
	class check{
		function ismobile() {
			if (isset($_SERVER['HTTP_X_WAP_PROFILE'])) {
				return true;
			}
			if (isset($_SERVER['HTTP_VIA'])) { 
				return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
			}
			if (isset($_SERVER['HTTP_USER_AGENT'])) {
				$clientkeywords = array('nokia','sony','ericsson','mot','samsung','htc','sgh','lg','sharp','sie-','philips','panasonic','alcatel','lenovo','iphone','ipod','blackberry','meizu','android','netfront','symbian','ucweb','windowsce','palm','operamini','operamobi','openwave','nexusone','cldc','midp','wap','mobile','MicroMessenger');
			if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
				return true;
			} 
		} 
		if (isset ($_SERVER['HTTP_ACCEPT'])) {
			if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
				return true;
			} 
		} 
		  return false;
		}

		function is_wx(){
			if(strpos($_SERVER["HTTP_USER_AGENT"],"MicroMessenger")){
				return true;
			}
			if(preg_match('/QQBrowser/i',$_SERVER['HTTP_USER_AGENT'])){
				return true;
			}
			return false;
		}
		
		function is_qq(){
			if ( strpos($_SERVER['HTTP_USER_AGENT'],'QQ/') !== false ) {
				return true;
			}
			return false;
		}
	}