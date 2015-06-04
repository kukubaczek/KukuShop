<?php
	if(isset($_GET['pass'])){
		echo('HASHED: ' . password_hash($_GET['pass'], 1));
		echo('<br>');
		echo('VERIFIED: ' . password_verify('12345', password_hash($_GET['pass'], 1)));
	}else{
		echo('podaj hasło');
	}
?>