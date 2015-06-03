<?php
	include ('../config/main.php');
	include ('../config/mysql.php');
	require_once('../parts/header.php');
?>

	<div class="row">
	  <div class="panel panel-primary">
		  	<?php
			  	if(isset($_SESSION['nickname'])){
					
					echo('
		  <div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>  Wystąpił błąd!</h3></div>
		  
			<div class="panel-body">
				
				<div class="alert alert-danger" role="alert">
				  Jesteś już zalogowany!
				</div>
			
			</div>
		</div>
					');
					  	
			  	}else{
				  	if(!isset($_POST['nick']) || !isset($_POST['pass']) || $_POST['nick'] == "" || $_POST['pass'] == ""){
						echo('
						  <div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>  Wystąpił błąd!</h3></div>
						  
							<div class="panel-body">
								
								<div class="alert alert-danger" role="alert">
								  Nie podałeś danych do logowania! Spróbuj ponownie!
								</div>
							
							</div>
						</div>
						');
				  	}else{
					  	if($_POST['nick'] == "kukubaczek" &&  $_POST['pass'] == "12345"){
							echo('
							  <div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>  Zalogowano!</h3></div>
							  
								<div class="panel-body">
									
									<div class="alert alert-success" role="alert">
									  Pomyślnie się zalogowałeś!
									</div>
								
								</div>
							</div>
							');
						  	$_SESSION['nickname'] = "kukubaczek";
					  	}else{
						  	echo("złe dane!");
					  	}
				  	}
			  	}
			?>
	  </div>
	</div>
<?php
	require_once('../parts/footer.php');
?>