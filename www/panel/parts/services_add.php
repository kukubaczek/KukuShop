<?php
	
	function getAddService(){
		
		include('func/hasPerm.php');
		if(hasPermission("addService")){
				
				
				
				if(isset($_POST['nazwa']) && ($_POST['nazwa'] == "" || $_POST['id_uslugi'] == "" || $_POST['serwer_id'] == "" || $_POST['opis'] == "" || $_POST['zdjecie'] == "" || $_POST['sms_tresc'] == "" || $_POST['sms_numer'] == "" || $_POST['sms_cena'] == "" || $_POST['api_konta'] == "" || $_POST['api_sms'] == "")){
					
					echo('
							<div class="alert alert-danger" role="alert">
							  Zostawiłeś puste pola! Spróbuj ponownie!
							</div>
					');
					
					echoServiceForm();					
				}else{
					if(!isset($_POST['nazwa'])){
						echoServiceForm();
					}else{
						
						if(ctype_alnum($_POST['nazwa'])){
							
							include('../config/mysql.php');
							
							$sql = "INSERT INTO services (server_id, nazwa, tresc, numer, koszt_sms, payment, acc_api, param, krotki_opis, img)
							VALUES ('".$_POST['serwer_id']."', '".$_POST['nazwa']."', '".$_POST['sms_tresc']."',  '".$_POST['sms_numer']."',  '".$_POST['sms_cena']."',  '".$_POST['payment_id']."',  '".$_POST['api_konta']."',  '".$_POST['api_sms']."',  '".$_POST['opis']."',  '".$_POST['zdjecie']."')";
						
							if ($conn->query($sql) === TRUE) {
								echo('
										<div class="alert alert-success" role="alert">
										  Usługa została dodana!<br>
										  Możesz teraz przystąpić do testowania!
										</div>
								');
								
								echo('<meta http-equiv="refresh" content="3; url=index.php" />');
								
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
							  Podałeś nie poprawne dane!
							</div>
							
							');
							
							echoServiceForm();
						}
						
						
					}
					
				}
				
		}else{
			echo('
			
					<div class="alert alert-danger" role="alert">
					 	Nie masz uprawnień do dodawania usług!
					</div>
			
			');
		}
	}
	
	function echoServiceForm(){
		
					echo('
						<form action="index.php?page=serviceAdd" method="POST">
						  <div class="form-group">
						    <label for="nazwa">Podaj nazwę usługi (max 16 znaków)</label>
						    <input type="text" class="form-control" name="nazwa" id="nazwa" placeholder="np.: VIP na 30 dni">
						  </div>
						  <div class="form-group">
						    <label for="id_uslugi">Podaj identyfikator usługi (max 12 znaków)</label>
						    <input type="text" class="form-control" name="id_uslugi" id="id_uslugi" placeholder="np.: vip30">
						  </div>
						<div class="form-group">
						  <label for="serwer_id">Wybierz serwer</label>
						  <select class="form-control" id="serwer_id" name="serwer_id">
						  	');
						  	
						  	//   <option>surv (Survival)</option>
						  	
							include ('../config/mysql.php');
						  	
							$list = "SELECT * FROM servers";
							$serwery = $conn->query($list);
					  		
							if ($serwery->num_rows > 0) {
								while($serwer = $serwery->fetch_assoc()) {
									echo('<option value="'.$serwer['server_id'].'">'.$serwer['id'].'. '.$serwer['server_id'].' ('.$serwer['nazwa'].')</option>');

								}
							}else{
								echo('Brak serwerów! Dodaj jakiś aby dodać usługę!');
							}
						    echo('
						  </select>
						</div>
						  <div class="form-group">
						    <label for="opis">Podaj krótki opis usługi</label>
						    <input type="text" class="form-control" name="opis" id="opis" placeholder="np.: Ranga VIP na wszystkie serwery na 30 dni.">
						  </div>
						  <div class="form-group">
						    <label for="zdjecie">Podaj link do obrazka usługi</label>
						    <input type="text" class="form-control" name="zdjecie" id="zdjecie" placeholder="np.: http://fireland.pl/images/svip.jpg">
						  </div>
						<div class="form-group">
						  <label for="sel1">Wybór płatności</label>
						  <select class="form-control" id="sel1" name="payment_id">
						  		<option value="microsms">MicroSMS.pl</option>
						  		<option value="profitsms">ProfitSMS.pl (OFF)</option>
						  		<option value="cashbill">CashBill.pl (OFF)</option>
						  		<option value="homepay">HomePay.pl (OFF)</option>
						  </select>
						</div>
						  <div class="form-group">
						    <label for="sms_tresc">Podaj treść SMS\'a</label>
						    <input type="text" class="form-control" name="sms_tresc" id="sms_tresc" placeholder="np.: AG.FL">
						  </div>
						  <div class="form-group">
						    <label for="sms_numer">Podaj numer</label>
						    <input type="text" class="form-control" name="sms_numer" id="sms_numer" placeholder="np.: 79480">
						  </div>
						  <div class="form-group">
						    <label for="sms_cena">Podaj cenę <b>brutto</b> SMS\'a</label>
						    <input type="text" class="form-control" name="sms_cena" id="sms_cena" placeholder="np.: 11.07">
						  </div>
						  <div class="form-group">
						    <label for="api_konta">Podaj kod API do konta (jeżeli Twoja metoda płatności tego nie wymaga wpisz "none")</label>
						    <input type="text" class="form-control" name="api_konta" id="api_konta" placeholder="np.: 0c8e712e0647823ac477932aa5a255e7">
						  </div>
						  <div class="form-group">
						    <label for="api_sms">Podaj kod API dla danego SMS\'a (jeżeli Twoja metoda płatności tego nie wymaga wpisz "none")</label>
						    <input type="text" class="form-control" name="api_sms" id="api_sms" placeholder="np.: iiivesxceffvqrglieaeqkflbtfvgrqu">
						  </div>
						  <button type="submit" class="btn btn-default" style="float: right;">Dodaj usługę</button>
						</form>
					');
		
	}
	
?>