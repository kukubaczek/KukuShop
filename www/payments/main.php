<?php
	function getOpis($payment){
		if($payment == "microsms"){
			echo('
					Płatności zapewnia firma MicroSMS.<br>
					Korzystanie z serwisu jest jednoznaczne z akceptacją regulaminów.<br>
					Jeśli nie dostałeś kodu zwrotnego w ciągu 30 minut skorzystaj z formularza reklamacyjnego.<br>
					<img src="http://microsms.pl/public/cms/img/banner.png" style="width: 100%;">
			');
		}else{
			echo('Wystąpił błąd w wyborze metody płatności!');
		}
	}
?>