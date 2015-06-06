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
				  	}else{
					  	
					  	if(ctype_alnum($_POST['nick']) && ctype_alnum($_POST['pass'])){
					  	
					  		include_once ('../config/mysql.php');
					  		
							$sql = sprintf("SELECT * FROM users WHERE nick='".$_POST['nick']."' LIMIT 1");
							$result = $conn->query($sql);
					  		
							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {
									
									if(password_verify($_POST['pass'], $row['pass'])){
										echo('
										  <div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>  Zalogowano!</h3></div>
										  
											<div class="panel-body">
												
												<div class="alert alert-success" role="alert">
												  Pomyślnie się zalogowałeś! Przenoszenie do panelu administratora!
												</div>
											
											</div>
										</div>
										');
									  	$_SESSION['nickname'] = $_POST['nick'];
									  	echo('<meta http-equiv="refresh" content="2; url=index.php" />');
									  	$sql = "UPDATE `users` SET `lastLogin` = '".time()."' WHERE `nick` = '".$_POST['nick']."';";
									  	$conn->query($sql);
								  	}else{
									  	echo('
									  	
					  <div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>  Błędne dane!</h3></div>
					  
						<div class="panel-body">
							
							<div class="alert alert-danger" role="alert">
							  Podany użytkownik nie istnieje lub hasło się nie zgadza! <br>Spróbuj ponownie!3
							</div>
						
						</div>
					</div>
									  	
									  	');
									  	
									  	echo('<meta http-equiv="refresh" content="2; url=zaloguj.php" />');
									  	
								  	}
								}
							}else{
							  	echo('
							  	
								  <div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>  Błędne dane!</h3></div>
								  
									<div class="panel-body">
										
										<div class="alert alert-danger" role="alert">
							  Podany użytkownik nie istnieje lub hasło się nie zgadza! <br>Spróbuj ponownie!2
										</div>
									
									</div>
								</div>
							  	
							  	');
							  	
									  	echo('<meta http-equiv="refresh" content="2; url=zaloguj.php" />');
							}
						 }else{
						  	echo('
						  	
							  <div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>  Błędne dane!</h3></div>
							  
								<div class="panel-body">
									
									<div class="alert alert-danger" role="alert">
						  Podany użytkownik nie istnieje lub hasło się nie zgadza! <br>Spróbuj ponownie!1
									</div>
								
								</div>
							</div>
						  	
						  	');
						  	
								  	echo('<meta http-equiv="refresh" content="2; url=zaloguj.php" />');

						 }
				  	}
			  	}
			?>
	  </div>
	</div>
<?php
	require_once('../parts/footer.php');
?>