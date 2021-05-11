<?php include("head.php");
print '
<form action=regfeldolgozas.php>
	<input type=text name=e-mail>
	e-mail
	<br>
	<input type=text name=nev>
	név
	<br>
	<input type=password name=jelszo>
	jelszó
	<br>
	<input type=password name=jelszo2>
	jelszó mégegyszer
	<br>
	<input type=submit value="regisztráció">
</form>';

include("foot.php");

?>
