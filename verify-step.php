<?php
session_start();

function exit_to($err)
{
    header("Location: http://localhost:8080/signup/?node=".$err);
    exit;
}

if(isset($_SESSION["USER_SESSION"]))
{exit_to(1199);}

require_once("src/class/user.cla.php");
$user = new User();

if(!$user->token_exists($_GET["token"]))
{exit_to(1500);}

$pagetitle = "Verifizierung";

include("src/template/headoff.tpl.php");
include("src/template/page/verify-step.tpl.php");
include("src/template/foot.tpl.php");