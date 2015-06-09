<?php
	$start = microtime();
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<!- TO DO: Dodać config i w tym zmianę nazwy >
		<title><?php echo($config['nazwa']. ' :: '.$config['slogan']);?></title>
		
		<!- KODOWANIE, STYL >
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel='stylesheet' type='text/css' href='style/main.css' />
		<link rel='stylesheet' type='text/css' href='style/tooltip.css' />
		<link rel='stylesheet' type='text/css' href='style/menu.css' />

		<!-- IPORT JEŻELI INCLUDE JEST DRUGIEGO RZĘDU -->

		<link rel='stylesheet' type='text/css' href='../style/main.css' />
		<link rel='stylesheet' type='text/css' href='../style/tooltip.css' />
		<link rel='stylesheet' type='text/css' href='../style/menu.css' />

		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

		<link rel='stylesheet' type='text/css' href='https://bootswatch.com/<?php echo($config['styl']); ?>/bootstrap.min.css' />
		
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	
	<script src="http://cookiealert.sruu.pl/CookieAlert-latest.min.js"></script>
	<script>CookieAlert.init();</script>
		
	</head>
	<body>
		<center>
			<div id="img_header"></div>
		</center>
		<div id="main">
			<div class='cssmenu'>
					<ul>
						<li class='active'><a href='<?php echo($config['root'].'index.php'); ?>'><span class="glyphicon glyphicon-home" aria-hidden="true"></span> <?php echo($config['nazwa']); ?></a></li>
						<!--
							
							Tutaj możesz dodać swoje zakładki
							
						<li><a href='#'>Facebook</a></li>
						<li><a href='#'>Forum</a></li>
						
						-->
						<?php
							if(isset($_SESSION['nickname'])){
								echo('<li><a href="'.$config['root'].'panel/index.php"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Panel</a></li>');
								echo('<li><a href="'.$config['root'].'panel/logout.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> '.$_SESSION['nickname'].'</a></li>');
							}
						?>
						<li class='last'><a href='#voucher_modal'>Użyj Voucher.</a></li>
					</ul>
			</div>