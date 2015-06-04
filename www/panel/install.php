<?php
	return;
	require('../config/main.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<!- TO DO: Dodać config i w tym zmianę nazwy >
		<title>KukuShop :: Panel instalacji</title>
		
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
		<div id="main">
			<br><br><br><br><br><br><br><br><br><br><br>
			<div class="row">
			  <div class="col-xs-12 col-sm-6 col-md-3">
				  
				<div class="panel panel-primary">
					<div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>  Instalacja</h3></div>
					<div class="panel-body">
						1 z 3
					</div>
				</div>
				  
			  </div>
			  <div class="col-xs-6 col-md-9">
				  
				<div class="panel panel-primary">
					<div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>  Wybór bazy danych</h3></div>
					<div class="panel-body">
						1 z 3
					</div>
				</div>
				  
				  <?php
					  
					?>
				  
			  </div>
			</div>
		</div>
	</body>
</html>