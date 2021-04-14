<?php
include 'zmienne_globalne.php';
echo "include dołącza plik<br>";
require_once('zmienne_globalne.php');
echo "<br>";

echo "Andrzej Strzeszewski $nr_indeksu grupa $nrGrupy";
echo "<br>";


if ($nrGrupy % 2) 
    echo "Moja grupa jest nieparzysta<br>";
elseif ($nrGrupy == 0) 
	echo "Jestem w zerowej grupie<br>";
else 
	echo "Moja grupa jest przysta<br>";

echo "<br>";

switch ($nr_indeksu) {
    case 151270:
        echo "Bardzo dobry student<br>";
        break;
    case 150044:
        echo "Bardzo zły student<br>";
        break;
    case 151028:
        echo "Taki sobie student<br>";
        break;
    case 150853:
    {
        echo "Do inżynierki nie przetrwa <br>";
        break;
	}
    default:
    {
        echo "O tym studencie nic nie wiem <br>";
        break;
	}
}
echo "<br>";
while ($palce_u_dloni > 0) {
    $palce_u_dloni -=  1;
    echo "Ucinamy jeden pauszek, zostało Ci ich $palce_u_dloni <br>";
}
echo "<br>";

for ($i = 1; $i <= 5; $i++) {
    $palce_u_dloni += 1;
    echo "Doklejamy paluszek, masz ich $palce_u_dloni<br>";
}
echo "<br>";


echo "Mam lat: " . $_GET["wiek"] . "<br>";

session_start();
$_SESSION["newsession"]="Test";

if(isset($_POST['username'])) 
    echo $_POST['username'];


 ?>

<form action="zadanie_lab_4.php" method="">
    <input type="text" name="wiek" placeholder="wiek"></input> 
    <input type="submit">Dodaj wiek do linku</input> 
</form>