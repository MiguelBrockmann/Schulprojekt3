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
require_once("src/class/user.cla.php");
$settings_user = new User();
$userdata = $settings_user->get($_SESSION["USER_SESSION"]);

$pagetitle = "Einstellungen";

include("src/template/head.tpl.php");
include("src/template/page/settings.tpl.php");
include("src/template/foot.tpl.php");