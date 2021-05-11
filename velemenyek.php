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

$query = "SELECT * FROM `Velemenyek`;";

 
if ($result = $mysqli->query($query)){
	while ($row = $result->fetch_array()){
	print '<div class=velemeny>';
	$query = "SELECT * FROM `Emberek` WHERE id=".$row['ember_id']; 
	if ($result2 = $mysqli->query($query))
		$row2 = $result2->fetch_array();
	print 'Hozzászoló='.$row2['nev'].  '<br>';
	print $row['szoveg'].  '<br>';
	print $row['idopont'].  '<br>';
	print '</div>';
	}
}else print 'Nem sikerült kérdést feltenni az adatbázisnak.';

include("foot.php");

?>