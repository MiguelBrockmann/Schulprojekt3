<?php
$dbhost = "127.0.0.1";
$dbname = "Rezepte";
$dbuser = "root";
$dbpass = "";
// $dbhost = "rdbms.strato.de";
// $dbname = "dbs4267707";
// $dbuser = "dbu1059977";
// $dbpass = "it1xNiklas0#";

try
{
    $pdo = new PDO("mysql:host=".$dbhost.";dbname=".$dbname, $dbuser, $dbpass);
}
catch(PDOException $e)
{
    echo 'Verbindung fehlgeschlagen: ' . $e->getMessage();
    exit;
}