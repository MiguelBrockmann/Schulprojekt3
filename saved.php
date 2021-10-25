<?php
session_start();

function exit_to($err)
{
    header("Location: http://localhost:8080/login/?node=".$err);
    exit;
}

require_once("src/php/get_userdata.php");

require_once("src/class/recipe.cla.php");
$recipe = new Recipe();
$recipes = $recipe->get_saved($_SESSION["USER_SESSION"]);

$pagetitle = "Gespeicherte Rezepte";

include("src/template/head.tpl.php");
include("src/template/page/saved.tpl.php");
include("src/template/foot.tpl.php");