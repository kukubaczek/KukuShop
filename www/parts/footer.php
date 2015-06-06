		</div> <!- MAIN  >
		<footer>
			<!-- ZAKAZ USUWANIE STOPKI! -->
			<center>Zasilane przez <a href="https://github.com/kukubaczek/KukuShop" style="color: #f4fbff;">KukuSMS</a> (v.<?php echo($config['ver'])?>) by <a href="http://fb.com/KukubaczekCraft" style="color: white;">Kukubaczek</a>.
			<br>
			
<?php
$koniec = microtime();
$start = explode(' ', $start);
$koniec = explode(' ', $koniec);
$roznica = ($koniec[0]+$koniec[1])-($start[0]+$start[1]);
// wyświetlenie wyniku
echo 'Wygenerowano w czasie '.$roznica.' sekundy.';
?>
			
			</center>
		</footer>
	</body>
</html>