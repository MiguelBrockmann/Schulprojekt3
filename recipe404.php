<?php
session_start();

function exit_to($err)
{
    header("Location: http://localhost:8080/login/?node=".$err);
    exit;
}

if(!isset($_SESSION["USER_SESSION"]))
{exit_to(1199);}

require_once("src/php/get_userdata.php");

$pagetitle = "Rezept wurde nicht gefunden!";

include("src/template/head.tpl.php");
include("src/template/page/recipe404.tpl.php");
include("src/template/foot.tpl.php");