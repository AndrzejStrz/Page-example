<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="js/jqueryZdjecia.js"></script>
	<script src="js/usuwanieFormularza.js"></script>
	<link rel="stylesheet" href="css/style.css">
	<title>Największe budynki świata</title>
</head>
<body>
	<?php
		include 'php/showpage.php';

		
		error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
		if($_GET['idp'] != 'cms') echo PokazPodstrone(9);
		if($_GET['idp'] == '') echo PokazPodstrone(1);
		else if($_GET['idp'] == 'historia') echo PokazPodstrone(2);
		else if($_GET['idp'] == 'zdjecia') echo PokazPodstrone(3);
		else if($_GET['idp'] == 'filmy') echo PokazPodstrone(4);
		else if($_GET['idp'] == 'opinia') echo PokazPodstrone(5);
		else if($_GET['idp'] == 'formularz') include('contact.php');
		else if($_GET['idp'] == 'zrodla') echo PokazPodstrone(7);
		else if($_GET['idp'] == 'cms') include ('admin/admin.php');
		else if (!file_exists($strona)) echo PokazPodstrone(8);




		if($_GET['idp'] == 'zdjecia')
			echo "<script language=javascript> window.onload=ustawslajd(1); </script>";
	?>
</body>
</html>


