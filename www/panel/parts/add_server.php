<?php
	
	function getAddServer(){
		
		include('func/hasPerm.php');
		if(hasPermission("addServer")){
				
				
				
				if(isset($_POST['nazwa']) && ($_POST['nazwa'] == "" || $_POST['serv_id'] == "" || $_POST['serv_ip'] == "" || $_POST['port_q'] == "" || $_POST['port_r'] == "" || $_POST['pass_r'] == "")){
					
					echo('
							<div class="alert alert-danger" role="alert">
							  Zostawiłeś puste pola! Spróbuj ponownie!
							</div>
					');
					
					echoForm();					
				}else{
					if(!isset($_POST['nazwa'])){
						echoForm();
					}else{
						
						if(is_numeric($_POST['port_q']) && is_numeric($_POST['port_r'])){
							
							include('../config/mysql.php');
							
							$sql = sprintf("INSERT INTO servers (server_id, nazwa, ip, port_query, port_rcon, pasw_rcon)
							VALUES ('%s', '%s', '%s',  '%s',  '%s',  '%s')",
								@mysql_real_escape_string($_POST['serv_id']),
								@mysql_real_escape_string($_POST['nazwa']),
								@mysql_real_escape_string($_POST['serv_ip']),
								@mysql_real_escape_string($_POST['port_q']),
								@mysql_real_escape_string($_POST['port_r']),
								@mysql_real_escape_string($_POST['pass_r'])
								);
						
							if ($conn->query($sql) === TRUE) {
								echo('
										<div class="alert alert-success" role="alert">
										  Nowy serwer został dodany!<br>
										  Możesz teraz przystąpić do dodawania usług.
										</div>
								');
								
								echo('<meta http-equiv="refresh" content="3; url=index.php?page=serverList" />');
								
							} else {
								echo('
										<div class="alert alert-danger" role="alert">
										  Wystąpił błąd podczas dodawania wpisu do bazy danych!
										</div>
								');
							}
							
						}else{
							echo('
							
							<div class="alert alert-danger" role="alert">
							  Porty muszą być cyframi!
							</div>
							
							');
						}
						
						
					}
					
				}
				
		}else{
			echo('
			
					<div class="alert alert-danger" role="alert">
					 	Nie masz uprawnień do dodawania serwerów!
					</div>
			
			');
		}
	}
	
	function echoForm(){
		
					echo('
						<form action="index.php?page=serverAdd" method="POST">
						  <div class="form-group">
						    <label for="nazwa">Podaj nazwę serwera (max 16 znaków)</label>
						    <input type="text" class="form-control" name="nazwa" id="nazwa" placeholder="np.: Survival">
						  </div>
						  <div class="form-group">
						    <label for="id_serwera">Podaj identyfikator serwera (max 12 znaków)</label>
						    <input type="text" class="form-control" name="serv_id" id="id_serwera" placeholder="np.: surv">
						  </div>
						  <div class="form-group">
						    <label for="ip_serwera">Podaj IP serwera (cyferkowe)</label>
						    <input type="text" class="form-control" name="serv_ip" id="ip_serwera" placeholder="np.: 127.0.0.1">
						  </div>
						  <div class="form-group">
						    <label for="ip_serwera">Podaj port <b>QUERY</b> serwera (do statusu)</label>
						    <input type="text" class="form-control" name="port_q" id="ip_serwera" placeholder="np.: 25565">
						  </div>
						  <div class="form-group">
						    <label for="ip_serwera">Podaj port <b>RCON</b> serwera (do wykonywania komend)</label>
						    <input type="text" class="form-control" name="port_r" id="ip_serwera" placeholder="np.: 25575">
						  </div>
						  <div class="form-group">
						    <label for="ip_serwera">Podaj hasło <b>RCON</b> serwera (do wykonywania komend)</label>
						    <input type="text" class="form-control" name="pass_r" id="ip_serwera" placeholder="np.: i3Map01">
						  </div>
						  <button type="submit" class="btn btn-default" style="float: right;">Dodaj serwer</button>
						</form>
					');
		
	}
	
?>