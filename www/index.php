<?php
	include ('config/main.php');
	include ('config/mysql.php');
	require_once('parts/header.php');
?>

<div class="row">
	<div class="col-md-8 col-md-push-4">
		<div class="panel panel-primary">
			<div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>  Usługi możliwe do zakupienia</h3></div>
			<div class="panel-body">
			  <ul class="nav nav-pills">
				<?php
			  		include_once ('config/mysql.php');
			  		
					$sql = "SELECT * FROM servers";
					$result = $conn->query($sql);
			  		
					if ($result->num_rows > 0) {
						$num = 0;
						while($row = $result->fetch_assoc()) {
							if($num == 0){
								echo('<li class="active"><a data-toggle="pill" href="#'.$row['server_id'].'">'.$row['nazwa'].'</a></li>');	
								$num++;
							}else{
								echo('<li><a data-toggle="pill" href="#'.$row['server_id'].'">'.$row['nazwa'].'</a></li>');	
							}
						}
					 }else{
						 echo('Brak serwerów w bazie danych.');
					 }
			  		
				?>
			  </ul>
			  
			  <div class="tab-content" id="uslugi">
				  <?php	
						include('payments/main.php');
					  $result = $conn->query($sql);
					if ($result->num_rows > 0) {	
						$num = 0;					
						while($row = $result->fetch_assoc()) {
							echo('
							
								<div id="'.$row['server_id'].'" class="tab-pane fade in');
								
								if($num == 0){
									echo(' active');
									$num++;
								}
								
								$sql2 = "SELECT * FROM services WHERE server_id='".$row['server_id']."'";
								$result2 = $conn->query($sql2);
								
								echo('">
									<h2>'.$row['nazwa'].'</h2>									
									<div class="row">
								');
								if ($result2->num_rows > 0) {				
									while($usluga = $result2->fetch_assoc()) {
										
										
										echo('
										
										<div class="col-md-6">
											<div class="thumbnail">
												<img src="'.$usluga['img'].'" alt="'.$usluga['nazwa'].'" id="lista_img_uslug">
												<div class="caption">
													<h3>'.$usluga['nazwa'].'</h3>
													<p>'.$usluga['krotki_opis'].'</p>
													<p><span class="btn btn-info">Cena SMS: <b>'.$usluga['koszt_sms'].' zł</b></span> <button id="kupuje" type="button" class="btn btn-success" data-toggle="modal" data-target="#'.$row['server_id'].'-'.$usluga['id'].'"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Kup teraz</button></p>
												</div>
											</div>
										</div>
										
									  <!-- Modal -->
									  <div class="modal fade" id="'.$row['server_id'].'-'.$usluga['id'].'" role="dialog">
									    <div class="modal-dialog">
									    
									      <!-- Modal content-->
									      <div class="modal-content">
									        <div class="modal-header">
									          <button type="button" class="close" data-dismiss="modal">&times;</button>
									          <h4 class="modal-title">'.$usluga['nazwa'].' <small> Serwer: '.$row['nazwa'].'</small></h4>
									        </div>
									        <div class="modal-body">
									          <p>Aby zakupić usługę <b>'.$usluga['nazwa'].'</b> należy wysłać SMS o treści <b>'.$usluga['tresc'].'</b> pod numer <b>'.$usluga['numer'].'</b>. <br>Koszt brutto wysłania SMS\'a wynosi <b>'.$usluga['koszt_sms'].' zł.</b></p>
												<div class="row">
												  <div class="col-md-6">
														<form method="POST" action="kup.php">
														  <div class="form-group">
														    <label for="nick">Nick</label>
														    <input type="text" class="form-control" id="nick" name="nick" placeholder="Podaj nick" >
														  </div>
														  <div class="form-group">
														    <label for="code">Kod</label>
														    <input type="text" class="form-control" id="code" name="code" placeholder="Podaj kod z SMS\'a">
														  </div>
														    <input type="hidden" name="id" value="'.$usluga['id'].'">
														  <button type="submit" class="btn btn-default" style="float: right;">Zatwierdź</button>
														</form>
												  </div>
												  <div class="col-md-6">
												  	<img src="'.$usluga['img'].'" alt="'.$usluga['nazwa'].'" id="lista_img_uslug">
												  </div>
												</div><br><br><br>
												<div class="row">
													<div class="well well-sm" style="margin: auto 20px;">
														');
															getOpis($usluga['payment']);
														echo('
													</div>
												</div>							          
									        </div>
									        <div class="modal-footer">
									          <button type="button" class="btn btn-warning" data-dismiss="modal">Zamknij</button>
									        </div>
									      </div>
									      
									    </div>
									  </div>

										
										');
										
										
									}
								}else{
									echo('<div class="alert alert-warning" role="alert" style="margin: 10px;">Nie znaleziono aktywnych usług dla tego serwera!</div>');
								}
										
							echo('
									</div>
								</div>

							
							');

						}
					}else{
						echo('Brak serwerów w bazie danych.');
					}
				    ?>
			  </div>
			</div>
		</div>
	</div>
	<div class="col-md-4 col-md-pull-8">
		
		<!- SERWERY >
		
		<div class="panel panel-primary">
			<div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>  Statystyki</h3></div>
			<div class="panel-body">
			  <?php
					include "utils/status.php";
					
					$result = $conn->query($sql);
					
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							echo $row['nazwa'];
							if(getStatus($row['ip'], $row['port_query']) == 1){
								echo(' <span class="label label-success" id="statusek"> Online</span><br>');
							}else{
								echo(' <span class="label label-danger" id="statusek"> Offline</span><br>');
							}
					    } 
					 }else{
						 echo('Brak serwerów w bazie danych.');
					 }
				//	SkyBlock<br>
				//	<span class="label label-danger">Offline</span>
				?>
			</div>
		</div>
		
		<!- OSTATNIE ZAKUPY >
		
		<div class="panel panel-primary">
			<div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>  Ostatnie zakupy</h3></div>
			<div class="panel-body">
				<?php
					
			  		include_once ('config/mysql.php');
			  		
					$sql = "SELECT * FROM logi LIMIT 64";
					$result = $conn->query($sql);
			  		
					if ($result->num_rows > 0) {
						$num = 0;
						while($row = $result->fetch_assoc()) {
							echo('
								<a class="tooltips" href="#"><img src="https://minotar.net/avatar/'.$row['nick'].'/37.png"><span>Gracz: '.$row['nick'].'<br>Usługa: '.$row['usluga'].'<br>Serwer: '.$row['nazwa_serwera'].'<br>Data: N/A</span></a>
							');
						}
					 }else{
						 echo('Brak zakupionych usług.');
					 }
					
				?>
			</div>
		</div>
		
		
	</div>
</div>
<?php
	require_once('parts/footer.php');
?>