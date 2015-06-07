<?php

	/*
	 *
	 *   Jeżeli nie radzisz sobie z instalacją skorzystaj z instalatora! (niedostępny - w trakcie pisania)
	 *
	 */

	// Dane do MySQL

	$db = array();	
	$db['host'] = 'localhost'; // IP połączenia z bazą danych
	$db['nick'] = 'root'; // Nazwa uzytkownika
	$db['pass'] = 'root'; // Haslo
	$db['db'] = 'KukuShop'; // Nazwa bazy danych
	
	
	// Tutaj nic nie ruszaj
	$conn = new mysqli($db['host'], $db['nick'], $db['pass'], $db['db']);
	if ($conn->connect_error) {
	    die("Nie udało sie polaczyc z baza danych.");
	} 

?>