<?php
session_start();

function exit_to($err)
{
    header("Location: http://localhost:8080/settings/?node=".$err);
    exit;
}

if(!isset($_SESSION["USER_SESSION"]))
{exit_to(1199);}

require_once("src/class/user.cla.php");
$user = new User();

if(empty($_GET["verify"]))
{exit_to(1800);}

if($user->suicide($_SESSION["USER_SESSION"]))
{
    session_destroy();
    header("Location: http://localhost:8080/");
    exit;
}