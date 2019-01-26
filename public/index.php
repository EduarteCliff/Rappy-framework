<?php
	if(!file_exists("../config.php")){
		header("location:/install");
	}
?>
<!doctype html>

<html lang="zh">
	<head>
		<meta charset="utf-8">
		<title>恭喜 框架安装成功</title>
	</head>
	<body>
		<center>
			<h2>你已经完成安装oxdl frame</h2>
			<p>你现在可以删除index.php与install目录并开始开发了</p>
			<a href="//oxdl.cn">&copy; 2018-2019 oxdl. All Rights Reserved.</a>
          	<br>
<?php
	echo "<h2>功能测试</h2>";
	include "main.php";
	$sql = l_sql();
	$sql->query("CREATE TABLE `".$dbname."`.`test_class` ( `test` INT NOT NULL ) ENGINE = memory;",0);
	$sql->query("INSERT INTO `test_class`(`test`) VALUES (1)",0);
	$res = $sql->query("select count(*) from test_class where 1");
	if($res[0]>=1){
		echo "sql_query:<span style='color:green;'>ok</span>";
      	$sql->query("DROP TABLE `test1`.`test_class`",0);
	}
	else{
    	echo "sql_query:<span style='color:red;'>failed</span>";
    }
	echo "<br>";
	$recaptcha = l_recaptcha();
	if($recaptcha->v_recaptcha() == "Missing parameter"){
		if(isset($recaptcha_code) && $recaptcha_code != ""){
			echo "recaptcha_model:<span style='color:green;'>ok</span>";
		}
		else{
			echo "recaptcha_model:<span style='color:gray;'>not configured</span>";
		}
	}
	else{
		echo "recaptcha_model:<span style='color:red;'>failed</span>";
	}
    echo "<br>";
    $requrl = l_url();
    if($requrl->req("https://www.baidu.com","","GET")){
    	echo "http_req:<span style='color:green;'>ok</span>";
    }
    else{
        echo "http_req:<span style='color:red;'>failed</span>";
    }
?>
          </center>
	</body>
</html>