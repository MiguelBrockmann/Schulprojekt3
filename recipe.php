<?php
session_start();

function exit_to($err)
{
    header("Location: http://localhost:8080/login/?node=".$err);
    exit;
}

require_once("src/php/get_userdata.php");

if(!isset($_SESSION["USER_SESSION"]))
{exit_to(1199);}

if(isset($_GET["id"]))
{$id = $_GET["id"];}
else
{$id = 0;}

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

require_once("src/class/recipe.cla.php");
$recipe_temp = new Recipe();
if($recipe_temp->exists_by_id($id) or header("Location: http://localhost:8080/recipe404/"))
{$recipe = $recipe_temp->get($id);}

require_once("src/class/recipe_line.cla.php");
$recipe_line = new RecipeLine();
$recipe_lines = $recipe_line->get_lines_from($recipe["rid"]);
$recipe_allergen = $recipe_line->get_allergenes($recipe["rid"]);
// $recipe_foodvalue = $recipe_line->sum_foodvalues($recipe["rid"]);
require_once("src/class/comment.cla.php");
$comment = new Comment();
$comments = $comment->get($recipe["rid"]);
require_once("src/class/recipe_category.cla.php");
$category = new RecipeCategory();
$categories = $category->get_recipe_categories($recipe["rid"]);
require_once("src/class/recipe_valuation.cla.php");
$valuation = new RecipeValuation();
$valuation_average = $valuation->get_average($recipe["rid"]);
$valuation_count = $valuation->count($recipe["rid"]);

$pagetitle = $recipe["title"];

include("src/template/head.tpl.php");
include("src/template/page/recipe.tpl.php");
include("src/template/foot.tpl.php");