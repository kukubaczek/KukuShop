<?php

	function getStatus($adres, $port) {
        if($fp = @fsockopen("$adres",$port , $errno, $errstr, 2)) {
      	  return "1";
        } else {
      	  return "0";
        }
		fclose($fp);
	}

?>