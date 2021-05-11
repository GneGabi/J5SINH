<?php include("head.php");

print ' <h1> Hírek </h1>
	<h2> Ide fognak kikerülni az újdonságok. </h2>';

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

$query = " INSERT INTO `Hirek` (`id`, `ember_id`, `hir`, `idopont`) 
		  VALUES (NULL, '".$row['id']."', '".$_GET['hir']."', CURRENT_TIMESTAMP);";

 
if ($result = $mysqli->query($query)){
	print '<br><br><br><br>Sikerült a rögzités!';
}else print 'Nem sikerült kérdést feltenni az adatbázisnak.';
unset ($_GET);
}
else print '<form><textarea row=3 col=40 name=hir> </textarea> <input type=submit></form>';

include("foot.php");

?>