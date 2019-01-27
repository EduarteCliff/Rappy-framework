<?php
	if(isset($_POST["db_addr"])){
        $server = $_POST["smtpserver"];
		if($_POST["ssl"] == "ssl"){
			$smtpssl = "ssl";
		}
		elseif($_POST["ssl"] == "tls"){
			$smtpssl = "tls";
		}
		else{
			$smtpssl = null;
		}
		$value =	'<?php 
						$smtpssl = "' . $smtpssl . '";
						$sqlusr = "' . $_POST["db_usr"] . '";
						$sqlpwd = "' . $_POST["db_pwd"] . '";
						$sqlloc = "' . $_POST["db_addr"] . '";
						$dbname = "' . $_POST["db_name"] .'";
						$recaptcha_code = "' . $_POST["recaptcha"] . '";
						$smtpusr = "' . $_POST["smtpusr"] . '";
						$smtppasswd = "' . $_POST["smtppasswd"] . '";
						$smtpport = "' . $_POST["smtpport"] . '";
						$smtpname = "' . $_POST["smtpname"] . '";
						$smtpserver = "' . $server . '"; 
					?>';
		$file = fopen("../../config.php","w");
		fwrite($file,$value);
		fclose($file);
		header("location:/");
	}
?>
<!doctype html>

<html lang="zh">
	<head>
		<meta charset="utf-8">
		<title>安装程序</title>
	</head>
	<body>
		<center>
			<h2>此程序将会帮助你安装配置oxdl frame</h2>
			<p>请填写以下信息（带*为必填）</p>
			<form method="post">
				*数据库地址 : <input type = "text" required name="db_addr"><br>
				*数据库用户名 : <input type = "text" required name="db_usr"><br>
				*数据库密码 : <input type = "text" required name="db_pwd"><br>
				数据库名(默认) : <input type = "text" name="db_name"><br>
				recaptcha 密钥 : <input type = "text" name="recaptcha"><br>
              	*smtp服务器 : <input type = "text" required name="smtpserver"><input name="ssl" type="radio" value="ssl">ssl<input name="ssl" type="radio" value="tls">tls<br>
              	*smtp端口 : <input type = "text" required name="smtpport"><br>
              	*smtp用户名 : <input type = "text" required name="smtpusr"><br>
              	*smtp密码 : <input type = "text" required name="smtppasswd"><br>
              	*smtp发件人 : <input type = "text" required name="smtpname"><br>
				<br>
				<input type = "submit">
			</form>
			<a href="//oxdl.cn">&copy; 2018-2019 oxdl. All Rights Reserved.</a>
		</center>
	</body>
</html>