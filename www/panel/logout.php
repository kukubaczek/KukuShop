<?php
	include ('../config/main.php');
	include ('../config/mysql.php');
	require_once('../parts/header.php');
?>

	<div class="row">
	  <div class="panel panel-primary">
		  	<?php
			  	if(!isset($_SESSION['nickname'])){
					
					echo('
		  <div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>  Wystąpił błąd!</h3></div>
		  
			<div class="panel-body">
				
				<div class="alert alert-danger" role="alert">
				  Nie jesteś zalogowany!
				</div>
			
			</div>
		</div>
					');
					  	
		  	}else{
			  		$_SESSION['nickname'] = "";
			  		unset($_SESSION['nickname']);
			  		session_destroy();
					echo('
		  <div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>  Wylogowno!</h3></div>
		  
			<div class="panel-body">
				
				<div class="alert alert-success" role="alert">
				  Zostałeś pomyślnie wylogowany! :)<br>
				  Przenoszenie do strony głównej!
				</div>
			
			</div>
		</div>
					');
					echo('<meta http-equiv="refresh" content="2; url=index.php" />');
			}

			?>
	  </div>
	</div>
<?php
	require_once('../parts/footer.php');
?>