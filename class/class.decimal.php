<?php
	class decimal{
		function dec_bin($dec,$assoc = 1){
			$i = 1;
			while((int)$dec){
				$result[$i] = $dec & 1;
				$dec = $dec/2;
				$i++;
			}
			$result[$i] = "/0";
			$result[0] = $i-1;
			if($assoc){
				return $result;
			}
			else{
				$echo = 0;
				while($result[0]){
					$echo += $result[$i-$result[0]];
					$echo *= 10;
					$result[0]--;
				}
				return $echo;
			}
		}
	}
?>