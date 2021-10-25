<?php
session_start();

function exit_to($err)
{
    header("Location: http://localhost:8080/profile/?node=".$err);
    exit;
}

if(!isset($_SESSION["USER_SESSION"]))
{exit_to(1199);}

require_once("src/php/get_userdata.php");

require_once("src/class/recipe_category.cla.php");
$category = new RecipeCategory();
$category = $category->get();
require_once("src/class/difficulty.cla.php");
$difficulty = new Difficulty();
$difficulty = $difficulty->get();
require_once("src/class/unitofmeasure.cla.php");
$units = new UnitOfMeasure();
$units = $units->get_all();
require_once("src/class/ingredient.cla.php");
$ingredients = new Ingredient();
$ingredients = $ingredients->get_all();

$pagetitle = "Rezept schreiben";

include("src/template/head.tpl.php");
include("src/template/page/create.tpl.php");
include("src/template/foot.tpl.php");