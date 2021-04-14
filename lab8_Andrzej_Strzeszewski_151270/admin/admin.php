<?php
function FormularzLogowania(){
	$wynik = '
	<center>
	<div class="logowanie">
	<h1 class="heading">Panel CMS:</h1>
	<div class="logowanie">
	<form method="post" name="LoginForm" entcype="multipart/form-data" action="'.$_SERVER['REQUEST_URI'].'">
	<table class="logowanie">
		<tr><td class="log4_t">[Email]</td><td><input type="text" name="Login" class="logowanie" /></td></tr>
		<tr><td class="log4_t">[Haslo]</td><td><input type="password" name="Haslo" class="logowanie" /></td></tr>
		<tr><td>&nbsp;</td><td><input type="submit" name="x1_submit" class="logowanie" value="Zaloguj" /></td></tr>
	</table>
	</form>
	</div>
	</div>
	</center>
	';
	echo $wynik;
}



function MenuAdmina(){
	include './cfg.php';
	$sql = "SELECT * FROM page_list LIMIT 100";
	if($result = mysqli_query($link, $sql)){
		if(mysqli_num_rows($result) > 0){
			echo '<center>';
			while($row = mysqli_fetch_array($result)){
				echo '<form method="post">';
				echo "<tr>";
				echo $row['id']." ".$row['page_title'];
				echo '<input type="submit" name="GuzikOpcjeEdycji"value="Edytuj"/>' ;
				echo '<input type="submit" name="GuzikUsun"value="Usun"/><br>' ;
				echo '<input type="hidden" id="SprawdzID" name="SprawdzID" value="'.$row['id'].'">';
				echo "</tr>";
				echo "</form>";
			}
			echo "<form method='post'><input type='submit'name='GuzikOpcjeDodaj' value='Dodaj'></form>";
			echo '</center>';
		} 
	}	

}

function WyswietlEdytor(){
	include("./cfg.php");
	$query='SELECT * FROM page_list WHERE id="'.$_SESSION["IdEdycji"].'" LIMIT 1';
	$result = mysqli_query($link,$query);
	$row = mysqli_fetch_array($result);
	if(isset($_POST['GuzikOpcjeEdycji'])){
		$wynik='<center><form method="post">
		<label for="tytul">Tytuł:</label><br>
		<input type="text" id="tytul" name="tytul" value="'.$row['page_title'].'"><br>
		<label for="tresc">Treść:</label><br>
		<textarea id="tresc" name="tresc" rows="15" cols="150">'.$row['page_content'].'</textarea><br>
		<input type="submit" name="GuzikEdycja" value="Zatwierdz edycję">
		</form></center>';
		return $wynik;
	}
	if(isset($_POST['GuzikOpcjeDodaj'])){
		$wynik='<center><form method="post">
		<label for="tytul">Tytul:</label><br>
		<input type="text" id="tytul" name="tytul" value=""><br>
		<label for="tresc">Tresc:</label><br>
		<textarea id="tresc" name="tresc" rows="4" cols="50"></textarea><br>
		<input type="submit" name="GuzikDodaj" value="Zatwierdz dodawanie">
		</form></center>';
		return $wynik;
	}
}


function EdytujPodstrone($Id,$title_new,$content_new){
	include("./cfg.php");
	$query="UPDATE page_list SET page_title='$title_new',page_content='$content_new' WHERE id='$Id' LIMIT 1";
	$result = mysqli_query($link,$query);
}
function DodajNowaPodstrone($title_new,$content_new){
	include("./cfg.php");
	$query="INSERT INTO page_list (page_title,page_content,status) VALUES ('$title_new','$content_new','1')";
	$result = mysqli_query($link,$query);
}
function UsunPodstrone($Id){
	include("./cfg.php");
	$query="DELETE FROM page_list WHERE id='$Id' ";
	$result = mysqli_query($link,$query);
}




if(isset($_POST['SprawdzID'])) { 
	$_SESSION["IdEdycji"]=$_POST['SprawdzID'];
} 

if(isset($_POST['GuzikEdycja'])) { 
  EdytujPodstrone($_SESSION["IdEdycji"],$_POST['tytul'],$_POST['tresc']);
} 

if(isset($_POST['GuzikDodaj'])) { 
  DodajNowaPodstrone($_POST['tytul'],$_POST['tresc']);
} 

if(isset($_POST['GuzikUsun'])) { 
	UsunPodstrone($_SESSION["IdEdycji"]);
}

if(isset($_POST['GuzikOpcjeEdycji']) or isset($_POST['GuzikOpcjeDodaj'])) { 
   echo WyswietlEdytor();
} 

session_start();
include("./cfg.php");
if(!empty($_POST["Login"]) && !empty($_POST["Haslo"])){
$_SESSION["Login"]=$_POST["Login"];
$_SESSION["Haslo"]=$_POST["Haslo"];
}

if($_SESSION["Login"] == $login && $_SESSION["Haslo"] == $pass){
	MenuAdmina();
}
else{
			
	FormularzLogowania();
}



?>