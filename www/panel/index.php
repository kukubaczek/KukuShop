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
					// Lista
				</div>
		  </div>
	  </div>
	  <div class="col-md-9">
		  <div class="panel panel-primary">
			  	<?php
				  	if(!isset($_SESSION['nickname'])){
						
						echo('
			  <div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>  Logowanie</h3></div>
			  
				<div class="panel-body">
					
					<form action="zaloguj.php" method="POST">
					  <div class="form-group">
					    <label for="exampleInputEmail1">Nick</label>
					    <input type="text" class="form-control" name="nick" id="exampleInputEmail1" placeholder="Podaj nick">
					  </div>
					  <div class="form-group">
					    <label for="exampleInputPassword1">Hasło</label>
					    <input type="password" class="form-control" name="pass" id="exampleInputPassword1" placeholder="Podaj hasło">
					  </div>
					  <button type="submit" class="btn btn-default" style="float: right;">Zaloguj się</button>
					</form>

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