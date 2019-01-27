<?php
/*
	方法
	req(url,传输数据,模式(GET/[POST]/PUT/DELETE))
*/
	class url{
		function req($url,$data,$method='post'){
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
			curl_setopt($ch,CURLOPT_HTTPHEADER,array("X-HTTP-Method-Override: $method"));
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			$document = curl_exec($ch);
			curl_close($ch);
			return $document;
		}
	}
?>