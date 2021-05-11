<!DOCTYPE HTML>
    <html>
        <head>
            <meta charset="UTF-8">
			<link rel="stylesheet" href="reset.css">
            <link rel="stylesheet" href="styles.css">
			<meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- ez a parancs azért van hogy jobban nézzen ki mobion -->
            <title>Gajdicsné Mándoki Gabriella</title>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
			<script> 
			$(document).ready(function(){
				$("#flip").click(function(){
					$("#panel").slideDown("slow");
				});
			});
			$(document).ready(function(){
				$("#flip2").hide();
  
					$("#almenu").click(function(){
					$("#flip2").show();
					$("#panel2").slideDown("slow");
				});
			});
			</script>
			<style> 
			#panel, #flip {
				padding: 5px;
				text-align: center;
				width:50%;
				background-color: #e5eecc;
				border: solid 1px #c3c3c3;
			}

			#panel {
				padding: 50px;
				display: none;
			}
			#panel2, #flip2 {
				padding: 5px;
				text-align: center;
				width:70%;
				background-color: #e5eecc;
				border: solid 1px #c3c3c3;
			}

			#panel2 {
			padding: 50px;
			display: none;
			}

</style>
        </head>
        <body>
			<div id="flip">Menü </div>
			<!--<div id="panel"><a href=bemutatkozas.php > Bemutatkozás </a><br>
			<a href=hirek.php > Hírek </a><br>
			<a href=velemenyek.php > Vélemények </a><br>
			<a href=login.php > Belépés </a><br>
			<a href=reg.php > Regisztráció </a></div>
			<div id="flip2"> Kommunikáció </div>
			<div id="panel2"><a href=bemutatkozas.php > Bemutatkozás </a><br>
			<div id="panel2"><a href=kapcsolat.php > Kapcsolat </a></div>-->
<?php

$mysqli = new mysqli("localhost", "dokszygabi", "MuSz4Si87", "dokszygabi");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$mysqli->set_charset("utf8mb4");	
	
			
$query = "SELECT * FROM `Menu` WHERE fomenu_id=0;";

 print '<div id=panel>';
if ($result = $mysqli->query($query)){
	while ($row = $result->fetch_array()){
	
	print '<a href=' .$row['link'].'>';
	print $row['neve'].  '</a><br>'."\n"; 
	
	}
}else print 'Nem sikerült kérdést feltenni az adatbázisnak.';
print '</div>'."\n";	

$query = "SELECT * FROM `Menu` WHERE fomenu_id=1;";

print '<div id="flip2">2Click to slide down panel</div>';

print '<div id=panel2>';
if ($result = $mysqli->query($query)){
	while ($row = $result->fetch_array()){
	
	print '<a href=' .$row['link'].'>';
	print $row['neve'].  '</a><br>'."\n";
	
	}
}else print 'Nem sikerült kérdést feltenni az adatbázisnak.';
print '</div>'."\n";		



//if ($_COOKIE['user']<>
?>