<?php
$register_form = true;
require_once "autoload.php";

$formname = $_POST["formname"];
$tablename = $_POST["tablename"];
$pkey = $_POST["pkey"];

if ( $formname == "registration_form" AND $_POST['registerbutton'] == "Register" )
{
    //controle of gebruiker al bestaat
    $sql = "SELECT * FROM user WHERE user_username='" . $_POST['user_username'] . "' ";
    $data = GetData($sql);
    if ( count($data) > 0 ) die("Deze gebruiker bestaat reeds! Gelieve een andere login te gebruiken.");

    //controle wachtwoord minimaal 8 tekens
    if ( strlen($_POST["user_password"]) < 8 ) die("Uw wachtwoord moet minstens 8 tekens bevatten!");

    //controle geldig e-mailadres
    if (!filter_var($_POST["user_email"], FILTER_VALIDATE_EMAIL)) die("Ongeldig email formaat voor login");

    //wachtwoord coderen
    $password_encrypted = password_hash ( $_POST["user_password"] , PASSWORD_DEFAULT );

    $sql = "INSERT INTO $tablename SET " .
                " user_voornaam='" . htmlentities($_POST['user_voornaam'], ENT_QUOTES) . "' , " .
                " user_naam='" . htmlentities($_POST['user_naam'], ENT_QUOTES) . "' , " .
                " user_email='" . htmlentities($_POST['user_email'], ENT_QUOTES) . "' , " .
                " user_date='" . htmlentities($_POST['user_date'], ENT_QUOTES) . "' , " .
                " user_username='" . $_POST['user_username'] . "' , " .
                " user_password='" . $password_encrypted . "'  " ;

    if ( ExecuteSQL($sql) )
    {
        $_SESSION["msg"][] = "Bedankt voor uw registratie!" ;

        if ( ControleLoginWachtwoord( $_POST["user_username"] , $_POST["user_password"]) )
        {
            header("Location: /wdev_jordi/groepswerk1/index.php");
        }
    }
    else
    {
        $_SESSION["msg"][] = "Sorry, er liep iets fout. Uw gegevens werden niet goed opgeslagen" ;
    }
}
?>