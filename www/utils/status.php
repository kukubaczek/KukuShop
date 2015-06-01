<?php

	function getStatus($adres, $port) {
	      if($fp = @fsockopen("$adres",$port , $errno, $errstr, 2)) {
	    $online = "1";
	    fclose($fp);
	    } else {
	            if($fp = @fsockopen("$adres",$port , $errno, $errstr, 2)) {
	            $online = "1";
	            fclose($fp);
	            } else {
	            $online = "0";
	            }
	    }
	    return $online;
	}

?>