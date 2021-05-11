<?php include("head.php");


$query = "SELECT * 
		FROM `Emberek` 
		WHERE `e-mail` LIKE '".$_GET['e-mail']."' AND admin<>'k' 
		ORDER BY `nev` ASC;";

 
if ($result = $mysqli->query($query)){
	if ($result->num_rows >0){  
		print 'Jó az e-mail cím!';
	
		$query = "SELECT * FROM `Emberek` WHERE `e-mail` LIKE '".$_GET['e-mail']."' AND `jelszo` LIKE '".$_GET['jelszo']."' ORDER BY `nev` ASC;";
		//print $query;
		//$result = $mysqli->query($query);
		if ($result = $mysqli->query($query)){
			if ($result->num_rows >0){
			//die '<h2> Nem jó a jelszó, de jó az e-mail cím! </h2>'; // Később jelszómódosítás!
				print 'Sikerült! ';
				setcookie ('user', $_GET['e-mail'], time()+3600, '/');
				print '<script LANGUAGE="JavaScript">  setTimeout(" window.location.href=\'' . 'index.php' . '\'",2000); </script>';}
		// else print '<h2> Sikerült bejelentkezni! </h2>';	
				else print 'Nem sikerült!' .$result->num_rows;}
	}		
	else 

		die ( '<h2> Ilyen e-mail címmel nem történt regisztráció! </h2> 
				<a href=login.php> <h3> Megpróbálja újra? </h3> </a>
				<a href=reg.php> <h3> Regisztráció </h3> </a>');
}
else 	
	die ( '<h2> Ilyen e-mail címmel nem történt regisztráció! </h2> 
			<a href=login.php> <h3> Megpróbálja újra? </h3> </a>
			<a href=reg.php> <h3> Regisztráció </h3> </a>');


		
include("foot.php");

?>