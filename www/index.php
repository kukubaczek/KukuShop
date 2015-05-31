<?php
	include_once('parts/header.php');
?>

<div class="row">
	<div class="col-md-8 col-md-push-4">
		<div class="panel panel-primary">
			<div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>  Usługi możliwe do zakupienia</h3></div>
			<div class="panel-body">
			  <ul class="nav nav-pills">
			    <li class="active"><a data-toggle="pill" href="#surv">Survival</a></li>
			    <li><a data-toggle="pill" href="#sky">SkyBlock</a></li>
			  </ul>
			  
			  <div class="tab-content">
			    <div id="surv" class="tab-pane fade in active">
			      <h3>Survival</h3>
					<div class="row">
					  <div class="col-md-3"><center><img src="http://hydra-media.cursecdn.com/minecraft-pl.gamepedia.com/4/41/Chest.gif" width="140px"></center></div>
					  <div class="col-md-9">// Opis, cena, guzik do kupienia</div>
					</div>
					<div class="row">
					  <div class="col-md-3"><center><img src="http://i.imgur.com/XIjBaYX.gif" width="140px"></center></div>
					  <div class="col-md-9">// Opis, cena, guzik do kupienia</div>
					</div>
			    </div>
			    <div id="sky" class="tab-pane fade">
			      <h3>SkyBlock</h3>
					<div class="row">
					  <div class="col-md-3">// Obrazek</div>
					  <div class="col-md-9">// Opis, cena, guzik do kupienia</div>
					</div>
			    </div>
			  </div>
			</div>
		</div>
	</div>
	<div class="col-md-4 col-md-pull-8">
		
		<!- SERWERY >
		
		<div class="panel panel-primary">
			<div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>  Statystyki</h3></div>
			<div class="panel-body">
				Survival
				<div class="progress" style="height: 25px;">
					<div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%;">
					190/200
					</div>
				</div>
				SkyBlock
				<div class="progress" style="height: 25px;">
					<div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
					50/100
					</div>
				</div>
			</div>
		</div>
		
		<!- OSTATNIE ZAKUPY >
		
		<div class="panel panel-primary">
			<div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>  Ostatnie zakupy</h3></div>
			<div class="panel-body">
				<a class="tooltips" href="#"><img src="https://minotar.net/avatar/clone1018/37.png"><span>clone1018</span></a>
				<img src="https://minotar.net/avatar/kukubaczeek/37.png">
				<img src="https://minotar.net/avatar/xnerdian/37.png">
				<img src="https://minotar.net/avatar/skkf/37.png">
				<img src="https://minotar.net/avatar/minecraftblow/37.png">
				<img src="https://minotar.net/avatar/ReziPlayGames/37.png">
				<img src="https://minotar.net/avatar/viv0/37.png">
			</div>
		</div>
		
		
	</div>
</div>
<?php
	include_once('parts/footer.php');
?>