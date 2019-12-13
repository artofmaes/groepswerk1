<?php
require_once "lib/autoload.php";
//Geef de header met de log in/register knop
BasicHead();
if ( ! isset($_SESSION['user']) AND ! $login_form AND ! $register_form AND ! $no_access)
{
    HomePage();
}else{
    HomePage2();
    ShowMessages();
}
NavBar();



BasicFooter();
?>
