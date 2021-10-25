<?php
session_start();

function exit_to($err)
{
    header("Location: http://localhost:8080/login/?node=".$err);
    exit;
}

if(!isset($_SESSION["USER_SESSION"]))
{exit_to(1199);}

function trans_duration($d, $format = '%2d:%2d')
{
    if($d < 60)
    {return $d." Min.";}
    $h = floor($d / 60);
    $m = ($d % 60);
    if($m == 0)
    {return $h." Std.";}
    else
    {return sprintf($format, $h, $m);}
}

require_once("src/php/get_userdata.php");
require_once("src/class/recipe.cla.php");
require_once("src/class/recipe_category.cla.php");
$recipe = new Recipe();
$recipes = $recipe->get_by_category($_GET["id"]);
$category_title = new RecipeCategory();
$category_title = $category_title->get_field($_GET["id"], "description");

$pagetitle = $category_title;

include("src/template/head.tpl.php");
include("src/template/page/category.tpl.php");
include("src/template/foot.tpl.php");