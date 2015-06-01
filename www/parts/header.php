<?php
	include('config/main.php');
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
						<li class='active'><a href='#'><?php echo($config['nazwa']); ?></a></li>
						<!--
							
							Tutaj możesz dodać swoje zakładki
							
						<li><a href='#'>Facebook</a></li>
						<li><a href='#'>Forum</a></li>
						
						-->
						<li class='last'><a href='#voucher_modal'>Użyj Voucher.</a></li>
					</ul>
			</div>