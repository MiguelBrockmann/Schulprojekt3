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

if(isset($_GET["id"]))
{$id = $_GET["id"];}
else
{$id = $_SESSION["USER_SESSION"];}

require_once("src/class/user.cla.php");
$profile_user = new User();
if($profile_user->exists_by_id($id) or header("Location: http://localhost:8080/profile404/"))
{$userinfo = $profile_user->get($id);}
    
require_once("src/class/follow.cla.php");
$follow = new Follow();

require_once("src/class/recipe.cla.php");
$recipe = new Recipe();

function format_ger($date)
{
    switch(date("m", $date))
    {
        case 1:
            return "Januar";
        case 2:
            return "Februar";
        case 3:
            return "März";
        case 4:
            return "April";
        case 5:
            return "Mai";
        case 6:
            return "Juni";
        case 7:
            return "Juli";
        case 8:
            return "August";
        case 9:
            return "September";
        case 10:
            return "Oktober";
        case 11:
            return "November";
        case 12:
            return "Dezember";
    }
}

$pagetitle = "Profil von ".$userinfo["prename"]." ".$userinfo["surname"];

include("src/template/head.tpl.php");
include("src/template/page/profile.tpl.php");
include("src/template/foot.tpl.php");