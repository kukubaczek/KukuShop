<?php
	
	function getAddServer(){
		
		include('func/hasPerm.php');
		if(hasPermission("kukubaczek", "addServer")){
				
				
				
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
						// dodaj serwer do bazy danych
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
						    <input type="text" class="form-control" name="port_r" id="ip_serwera" placeholder="np.: 127.0.0.1">
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