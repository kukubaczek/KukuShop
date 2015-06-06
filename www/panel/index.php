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
					<?php
						if(!isset($_SESSION['nickname'])){
							echo('Zaloguj się!');
						}else{
							echo('
							
						      <ul class="nav nav-pills nav-stacked">
						        <li class="'); 
						        
								if(!isset($_GET['page']) || $_GET['page'] == ""){
									echo('active');
								}
						        
						        echo('"><a href="index.php">Strona główna</a></li>
						        <li class="dropdown');
						        
						        if($_GET['page'] == "serverAdd"){
							        echo(' active');
							    }
						        
						        echo('">
						          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Serwery <span class="caret"></span></a>
						          <ul class="dropdown-menu">
						            <li><a href="#">Lista</a></li>
						            <li><a href="?page=serverAdd">Dodaj</a></li>
						            <li><a href="#">Edytuj</a></li>
						          </ul>
						        </li>
						        <li class="dropdown">
						          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Usługi <span class="caret"></span></a>
						          <ul class="dropdown-menu">
						            <li><a href="#">Dodaj</a></li>
						            <li><a href="#">Edytuj</a></li>
						          </ul>
						        </li>
						        
						        <!-- USTAWIENIA KONTA -->
						        <li class="dropdown');
						        
						        if($_GET['page'] == "changepass"){
							        echo(' active');
							    }
						        
						        echo('">
						          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Konto <span class="caret"></span></a>
						          <ul class="dropdown-menu">
						            <li><a href="?page=changepass">Zmień hasło</a></li>
						            <li><a href="logout.php">Wyloguj</a></li>
						          </ul>
						        </li>
						        
						        <!-- <li><a href="#">Wyloguj <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a></li> -->
						      </ul>
							
							');
						}
					?>
				</div>
		  </div>
	  </div>
	  <div class="col-md-9">
		  <div class="panel panel-primary">
			  	<?php
				  	if(!isset($_SESSION['nickname'])){
						
					echo('
					  <div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>  Brak uprawnień!</h3></div>
					  
						<div class="panel-body">
							
							<div class="alert alert-danger" role="alert">
							  Musisz być zalogowany, aby korzystać z tego panelu!<br> Przenoszenie do strony logowania...
							</div>
						
						</div>
					</div>
						');
						  
						echo('<meta http-equiv="refresh" content="2; url=zaloguj.php" />');
				  	}else{
					  	if(!isset($_GET['page']) || $_GET['page'] == ""){
							echo('
							  <div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>  Strona główna</h3></div>
							  
								<div class="panel-body">
									
									Witaj w panelu administratora!
								
								</div>
							</div>
								');
						}elseif($_GET['page'] == "serverAdd"){
							echo('
							  <div class="panel-heading">
									<ol class="breadcrumb">
									  <li><a>Serwery</a></li>
									  <li class="active">Dodaj</li>
									</ol>
								</div>		  
								<div class="panel-body">
									
									');
									
									include_once ('parts/add_server.php');
									getAddServer();
									
									echo('
								
								</div>
							</div>
								');
						}elseif($_GET['page'] == "changepass"){
							echo('
							  <div class="panel-heading">
							  <!-- <br><h3 class="panel-title"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>  Zmiana hasła</h3><br> -->
									<ol class="breadcrumb">
									  <li><a>Konto</a></li>
									  <li class="active">Zmiana hasła</li>
									</ol>
								</div>		  
								<div class="panel-body">
									
									');
									
									include_once ('parts/change_password.php');
									getChangePass();
									
									echo('
								
								</div>
							</div>
								');
						}
				  	}
				?>
		  </div>
	  </div>
	</div>
<?php
	require_once('../parts/footer.php');
?>