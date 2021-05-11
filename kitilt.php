<?php include("head.php");

print $_COOKIE['user'];

$query = "SELECT * FROM `Emberek` WHERE `e-mail` ='".$_COOKIE['user']."'" ;
print $query;

$result = $mysqli->query($query);
$row = $result->fetch_array(MYSQLI_ASSOC);
print $row['admin'];
if ($row['admin']!='i')
	die ('Önnek ehhez nincs joga!');
else print 'Ön adminisztrátor!'	;
?>
<script>
function myFunction() {
  var x = document.getElementById("Kuld");
    x.style.display = "block";
}
</script>

<style>
#Kuld {display:none;}
</style>
<?php
$query = "SELECT * FROM `Emberek` WHERE admin<>'k' ORDER BY `nev`";

print '<form method=POST> <select name=akik_kitiltandok onchange="myFunction();"> ';

if ($result = $mysqli->query($query)){
	while ($row = $result->fetch_array()){
	print '<option value='.$row['id']. '>';
	print $row['nev'].  '</option>';
	}
}else print 'Nem sikerült kérdést feltenni az adatbázisnak.';

print '</select>';
print '<input type=submit id=Kuld>';
print '</form>';

if ($_POST){
	
$query = "UPDATE `Emberek` SET `admin` = 'k' WHERE `Emberek`.`id` =".$_POST['akik_kitiltandok'];

if ($result = $mysqli->query($query)){
	print 'Sikerült kitiltani!';
}else print 'Nem sikerült kérdést feltenni az adatbázisnak.';
}
include("foot.php");

?>