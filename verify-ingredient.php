<?php
session_start();

$e = [
    "title" => $_POST["verify-ingredient"],
    "carbohydrates" => $_POST["verify-ingredient-carbohydrates"],
    "calories" => $_POST["verify-ingredient-calories"],
    "protein" => $_POST["verify-ingredient-protein"],
    "sugar" => $_POST["verify-ingredient-sugar"],
    "fat" => $_POST["verify-ingredient-fat"],
    "fattyacid" => $_POST["verify-ingredient-fatty-acid"],
    "fiber" => $_POST["verify-ingredient-fiber"],
    "salt" => $_POST["verify-ingredient-salt"]
];

function exit_to($err, $e)
{
    header("Location: http://localhost:8080/addingredient/?title=".$e["title"]."&carbohyd=".$e["carbohydrates"].
    "&calories=".$e["calories"]."&protein=".$e["protein"]."&sugar=".$e["sugar"]."&fat=".$e["fat"]."&fattyacid=".
    $e["fattyacid"]."&fiber=".$e["fiber"]."&salt=".$e["salt"]."&node=".$err);
    exit;
}

if(!isset($_SESSION["USER_SESSION"]))
{exit_to(1199);}

require_once("src/class/ingredient.cla.php");
$ingredient = new Ingredient();

if(isset($_POST["verify-ingredient-submit"]) or exit_to(1200, $e))
{if(isset($e["carbohydrates"]) && !empty($e["carbohydrates"]) or exit_to(1201, $e))
{if(isset($e["calories"]) && !empty($e["calories"]) or exit_to(1202, $e))
{if(isset($e["protein"]) && !empty($e["protein"]) or exit_to(1203, $e))
{if(isset($e["sugar"]) && !empty($e["sugar"]) or exit_to(1204, $e))
{if(isset($e["fat"]) && !empty($e["fat"]) or exit_to(1205, $e))
{if(isset($e["fattyacid"]) && !empty($e["fattyacid"]) or exit_to(1206, $e))
{if(isset($e["fiber"]) && !empty($e["fiber"]) or exit_to(1207, $e))
{if(isset($e["salt"]) && !empty($e["salt"]) or exit_to(1208, $e))
{
    if($ingredient->create([
        "title" => $e["title"],
        "carbohydrates" => $e["carbohydrates"],
        "calories" => $e["calories"],
        "protein" => $e["protein"],
        "sugar" => $e["sugar"],
        "fat" => $e["fat"],
        "fatty_acid" => $e["fattyacid"],
        "fiber" => $e["fiber"],
        "salt" => $e["salt"]
    ]) or exit_to(1209, $e));
    {
        header("Location: http://localhost:8080/addingredient/?success=true");
        exit;
    }
}}}}}}}}}