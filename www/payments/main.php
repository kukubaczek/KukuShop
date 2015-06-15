<?php
	
	function getOpis($payment){
		if($payment == "microsms"){
			echo('
					Płatności zapewnia firma MicroSMS.<br>
					Korzystanie z serwisu jest jednoznaczne z akceptacją regulaminów.<br>
					Jeśli nie dostałeś kodu zwrotnego w ciągu 30 minut skorzystaj z formularza reklamacyjnego.<br>
					<img src="http://microsms.pl/public/cms/img/banner.png" style="width: 100%;">
			');
		}else if( $payment == "profitsms" ){
			echo('
					Płatności zapewnia firma ProfitSMS.<br>
					Regulamin usług znajdziesz tutaj.<br>
					Jeśli nie dostałeś kodu zwrotnego w ciągu 30 minut skorzystaj z formularza reklamacyjnego.<br>
					<img src="payments/profitsms.jpg" style="width: 100%;">
			');
		}
		else{
			echo('Wystąpił błąd w wyborze metody płatności!');
		}
	}
	
	function checkCode( $payment, $code, $accToken, $smsToken, $number )
	{		
		if ( $payment == "microsms" ) {
			
			$handle = fopen( "http://microsms.pl/api/check.php?userid=" . $accToken . "&code=" . $code . '&serviceid=' . $smsToken . '&number=' . $number, 'r' );
			$check  = fgetcsv( $handle, 1024 );
			fclose( $handle );
			
			if ( $check[ 0 ] != 'E' ) {
				
				if ( $check[ 0 ] == 1 ) {
					return true;
				} //$check[ 0 ] == 1
				else {
					return false;
				}
			} //$check[ 0 ] != 'E'
			else {
				return false;
			}
			
		}else if( $payment == "profitsms" ){
			$handle = fopen("http://profitsms.pl/check.php?apiKey=".$accToken."&code=".$code."&smsNr=".$number, 'r' );
			$check  = fgetcsv( $handle, 1024 );
			fclose( $handle );
			if($check[0] == '1'){
				return true;
			}else{
				return false;
			}
			
		}
		else {
			return false;
		}
	}
?>