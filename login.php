<?php include("head.php");
  print '<script type="text/javascript">
        function CheckAndSubmit() {
           alert("Próba");
		   var e-mail = document.getElementById ("e-mail");
            if (e-mail.value.length <= 0) {
                alert ("Az e-mail cím kitöltése kötelező!");
                return false;
            }
            var jelszo = document.getElementById ("jelszo");
                        if (jelszo.value.length <= 0) {
                alert ("A jelszó kitöltése kötelező!");
                return false;
            }
            return true ;
         }
    </script>';
print '
<form action=loginfeldolgoz.php onsubmit="alert("Próba2");">
	<input type=text name=e-mail>
	e-mail
	<br>
	<input type=password name=jelszo>
	jelszó
	<br>
	<input type=submit value="belépés">
</form>';

include("foot.php");

?>
