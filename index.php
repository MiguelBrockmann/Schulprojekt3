<?php
session_start();

function exit_to($err)
{
    header("Location: http://localhost:8080/discover/?node=".$err);
    exit;
}

if(isset($_SESSION["USER_SESSION"]))
{exit_to(1199);}

$pagetitle = "Chefkoch";

include("src/template/headoff.tpl.php");
include("src/template/page/index.tpl.php");
include("src/template/foot.tpl.php");