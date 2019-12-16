<?php
$login_form = true;
require_once "autoload.php";

$formname = $_POST["formname"];
$buttonvalue = $_POST['loginbutton'];

if ( $formname == "login_form" AND $buttonvalue == "Log in" )
{
    if ( ControleLoginWachtwoord( $_POST['user_username'], $_POST['user_password'] ) )
    {
        $_SESSION["msg"][] = "Welcome back " . $_SESSION['user']['user_username'] . "!" ;
        header("Location: /groepswerk1/index.php");


    }
    else
    {
        $_SESSION["msg"][] = "Sorry! Wrong username or password!";
        header("Location: /groepswerk1/login.php");
    }
}
else
{
    $_SESSION["msg"][] = "Wrong formname or buttonvalue";
}

?>