<?php
	include ('config/main.php');
	include ('config/mysql.php');
	include('payments/main.php');
	require_once('parts/header.php');
	
?>

	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>  Zakup usługi <b></b> na serwerze <b>SkyBlock</b> dla gracza <b><?php echo($_POST['nick'])?></b></h3></div>
			<div class="panel-body">
				<?php
					if(strlen($_POST['nick']) > 16){
						echo('<div class="alert alert-danger" role="alert">Podany nick jest za długi! Maksymalna długość to 16 znaków!</div>');
					}else{
						if(!ctype_alnum($_POST['code'])){
							echo('<div class="alert alert-danger" role="alert">Kod zawiera nie dozwolone znaki!</div>');	
						}else{
							if(!ctype_alnum($_POST['id'])){
								echo('<div class="alert alert-danger" role="alert">Nick zawiera nie dozwolone znaki!</div>');		
							}else{
						  		include_once ('config/mysql.php');
						  		
								$sql = "SELECT * FROM services WHERE id=" . $_POST['id'];
								$result = $conn->query($sql);
						  		
								if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()) {
										if(checkCode( $row['payment'], $_POST['code'], $row['acc_api'], $row['param'],$row['numer'] )){
											echo ('<div class="alert alert-success" role="alert">
												Podany kod jest prawidłowy... Aktywuję usługę!
											</div>');
										}else{
											echo ('<div class="alert alert-danger" role="alert">
												Podany kod jest nie poprawny lub usługa została nie prawidłowo skonfigurowana.<br>
												Spróbuj ponownie, może się pomyliłeś przepisując kod.
											</div>');
										}
									}
								}else{
									echo('<div class="alert alert-danger" role="alert">Usługa jest nie dostępna!</div>');											
								}
							}
						}
					}
				?>
			</div>
		</div>
	</div>

<?php
	require_once('parts/footer.php');
?>