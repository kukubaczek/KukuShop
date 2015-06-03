<?php
	include ('../config/main.php');
	include ('../config/mysql.php');
	require_once('../parts/header.php');
?>

	<div class="row">
	  <div class="col-md-3">
		 <div class="panel panel-primary">
				<div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>  Panel zarządzania</h3></div>
				<div class="panel-body">
					// Logowanie
				</div>
		  </div>
	  </div>
	  <div class="col-md-9">
		  <div class="panel panel-primary">
			  	<?php
				  	if(!isset($_SESSION['nickname'])){
						
					echo('
					  <div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>  Wystąpił błąd!</h3></div>
					  
						<div class="panel-body">
							
							<div class="alert alert-danger" role="alert">
							  Musisz być zalogowany, aby korzystać z tego panelu! Przenoszenie do strony logowania...
							</div>
						
						</div>
					</div>
						');
						  
						echo('<meta http-equiv="refresh" content="2; url=zaloguj.php" />');
				  	}else{
						echo('
						  <div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>  Strona główna</h3></div>
						  
							<div class="panel-body">
								
								Witaj w panelu administratora!
							
							</div>
						</div>
							');
				  	}
				?>
		  </div>
	  </div>
	</div>
<?php
	require_once('../parts/footer.php');
?>