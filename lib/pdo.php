<?php
function GetConnection()
{
    /*$dsn = "mysql:host=localhost;dbname=steden";
    $user = "root";
    $passwd = "Xrkwq349";*/

    $dsn = "mysql:host=185.115.218.166;dbname=wdev_";
    $user = "wdev_";
    $passwd = "";

    $pdo = new PDO($dsn, $user, $passwd);
    return $pdo;
}

function GetData( $sql )
{
    $pdo = GetConnection();

    $stm = $pdo->prepare($sql);
    $stm->execute();

    $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function ExecuteSQL( $sql )
{
    $pdo = GetConnection();

    $stm = $pdo->prepare($sql);

    if ( $stm->execute() ) return true;
    else return false;
}

