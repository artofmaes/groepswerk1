<?php
$login_form = true;
require_once "lib/autoload.php";

//redirect naar homepage als de gebruiker al ingelogd is
if ( isset($_SESSION['usr']) ) { $_SESSION["msg"][] = "U bent al ingelogd!"; header("Location: ../groepswerk1/index.php"); exit; }

BasicHead();
ShowMessages();
HomePage3();
print LoadTemplate("login");
BasicFooter();
        ?>
