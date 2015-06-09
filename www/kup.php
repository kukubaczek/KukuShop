<?php
	include ('config/main.php');
	include ('config/mysql.php');
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
							if(!preg_match('#[a-zA-Z0-9_]+#', $_POST['nick'])){
								echo('<div class="alert alert-danger" role="alert">Nick zawiera nie dozwolone znaki!</div>');		
							}else{
								
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