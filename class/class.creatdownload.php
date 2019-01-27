<?php
	class creatdownload{
		function output_file($location,$file_name){
			if(!file_exists($location)){
				return false;
			}
			$file = fopen($location,"rb");
			header("Content-type:application/octet-stream");
			header("Accept-Ranges:bytes");
			header("Accept-Length:".filesize($location));
			header("Content-Disposition:attachment;filename=".$file_name);
		}
		
		function output_image($img,$quality = 9){
			$info = getimagesize($img);
			$imgExt = image_type_to_extension($info[2],false);
			$fun = "imagecreatefrom{$imgExt}";
			$imgInfo = $fun($img);
			$mime = image_type_to_mime_type(exif_imagetype($img));
			header('Content-Type:'.$mime);
			if($imgExt != 'png') $quality *= 10;
			$getImgInfo = "image{$imgExt}";
			$getImgInfo($imgInfo, null, $quality);
			imagedestroy($imgInfo);
		}
	}
?>