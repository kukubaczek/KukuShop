<?php
	$start = microtime();
	session_start();
	if((!file_exists("../config/installed.lck") && !file_exists("/config/installed.lck"))){
		echo('<center>Panel nie jest zainstalowany!</center>');
		return ;
	}
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

		<link rel='stylesheet' type='text/css' href='https://bootswatch.com/<?php echo($config['styl']); ?>/bootstrap.min.css' />
		
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script><style></style>
		
	</head>
	<body>
		<center>
			<div id="img_header"></div>
		</center>
		<div id="main">
			<div class='cssmenu'>
					<ul>
						<li class='active'><a href='<?php echo($config['root'].'index.php'); ?>'><?php echo($config['nazwa']); ?></a></li>
						<!--
							
							Tutaj możesz dodać swoje zakładki
							
						<li><a href='#'>Facebook</a></li>
						<li><a href='#'>Forum</a></li>
						
						-->
						<?php
							if(isset($_SESSION['nickname'])){
								echo('<li><a href="'.$config['root'].'panel/index.php">Panel <span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a></li>');
								echo('<li><a href="'.$config['root'].'panel/logout.php">'.$_SESSION['nickname'].' <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a></li>');
							}
						?>
						<li class='last'><a href='#voucher_modal'>Użyj Voucher.</a></li>
					</ul>
			</div>