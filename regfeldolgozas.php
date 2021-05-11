<?php include("head.php");
/*print '
<form action=regfeldolgozas.php>
	<input type=text name=e-mail>
	<input type=text name=nev>
	<input type=submit value="regisztráció">
</form>';*/

$query = "SELECT * FROM `Emberek` WHERE `e-mail` LIKE '".$_GET['e-mail']."' ORDER BY `nev` ASC;";

if ($result = $mysqli->query($query))
	if ($result->num_rows >0)  
		print '<h2> Ez az e-mail cím már regsiztrálva van! </h2>';	
	else {

		$query = "INSERT INTO `Emberek` (`id`, `nev`, `start`, `nem`, `e-mail`, `admin`, `jelszo`) VALUES 
					(NULL, '".$_GET['nev']."', CURRENT_TIMESTAMP, '', '".$_GET['e-mail']."', 'r', '".$_GET['jelszo']."');";

		if ($result = $mysqli->query($query)) {
			print '<h2> Sikerült a regisztráció! </h2>';	
		} else print '<h2> Nem sikerült a regisztráció! </h2>';	
	}	
include("foot.php");

?>
