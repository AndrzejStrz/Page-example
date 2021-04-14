<?php
	
	$login="admin";
	$pass="admin";
	$dbhost= 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$baza ='moja_strona';
	$link = mysqli_connect($dbhost, $dbuser, $dbpass, $baza);

	if(!$link) echo 'przerwane polaczenie';
	if(!mysqli_select_db($link,$baza)) echo 'nie wybrano bazy';



		


?>