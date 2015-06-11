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
	
	function checkCode( $payment, $code, $accToken, $smsToken ){
		if($payment == "microsms"){
			
			$handle = fopen("http://microsms.pl/api/check_multi.php?userid=" . $accToken . "&code=" . $code . '&serviceid=' . $smsToken, 'r');
			$check  = fgetcsv($handle, 1024);
			fclose($handle);
			
			if ($check[0] != 'E') {
				
				if ($check[0] == 1) {
					echo 'Zakupiłeś produkt!';
					return true;
					// 
					// Dalsza czesc Twojego kodu...
					//
				} else {
					echo 'Podany kod jest nieprawidlowy.';
					return false;
				}
			} else {
				echo 'Nieprawidlowo skonfigurowana usluga, skontaktuj sie z administratorem sklepu.';
				return false;
			}
			
		}else{
			echo('Wystąpił błąd w wyborze metody płatności!');
			return false;
		}
	}
?>