<?php
session_start();

function exit_to($err)
{
    header("Location: http://localhost:8080/discover/?node=".$err);
    exit;
}

if(isset($_SESSION["USER_SESSION"]))
{exit_to(1199);}

if(isset($_GET["email"]))
{$getemail = $_GET["email"];$getautofocus1 = "";$getautofocus2 = "autofocus";}
else{$getemail = "";$getautofocus1 = "autofocus";$getautofocus2 = "";}

$pagetitle = "Login";

include("src/template/headoff.tpl.php");
include("src/template/page/login.tpl.php");
include("src/template/foot.tpl.php");