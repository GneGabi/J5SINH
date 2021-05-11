<?php include("head.php");

print ' <h1> Vélemények </h1>
	<h2> Nem az én honlaponról, mert az tökéletes. </h2>';

$query = "SELECT * FROM `Emberek` WHERE `e-mail` ='".$_COOKIE['user']."'" ; /*mindenképpen legyen az e-mail cím az adatbázisban tárolva. */
print $query;

$result = $mysqli->query($query);
$row = $result->fetch_array(MYSQLI_ASSOC);
print $row['admin'];
if ($row['admin']!='r')
	die ('Önnek ehhez nincs joga! <a href=reg.php > Regisztráció </a><br>
								  <a href=login.php > Belépés </a>');
else print 'Ön regisztrált felhasználó!'	;

if ($_GET){

$query = " INSERT INTO `Velemenyek` (`id`, `ember_id`, `szoveg`, `idopont`) 
		  VALUES (NULL, '".$row['id']."', '".$_GET['velemeny']."', CURRENT_TIMESTAMP);";

 
if ($result = $mysqli->query($query)){
	print '<br><br><br><br>Sikerült a rögzités!';
}else print 'Nem sikerült kérdést feltenni az adatbázisnak.';
unset ($_GET);
}
else print '<form><textarea row=3 col=40 name=velemeny> </textarea> <input type=submit></form>';

include("foot.php");

?>