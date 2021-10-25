<?php
session_start();

function exit_to($err)
{
    header("Location: http://localhost:8080/recipe/?id=".$_POST["valuation-verify-recipe"]."&node=".$err);
    exit;
}

if(!isset($_SESSION["USER_SESSION"]))
{exit_to(1199);}

require_once("src/class/recipe_valuation.cla.php");
$valuation = new RecipeValuation();

$v_valuation = $_POST["valuation-verify"];
$v_recipe = $_POST["valuation-verify-recipe"];

if(isset($_POST["valuation-verify-submit"]) or exit_to(1200))
{
    if(isset($v_valuation))
    {
        if($v_valuation > 0 && $v_valuation <= 5)
        {
            if($valuation->create([
                "recipe_id" => $v_recipe,
                "amount" => $v_valuation,
                "user_id" => $_SESSION["USER_SESSION"]
            ]))
            {
                header("Location: http://localhost:8080/recipe/?id=".$v_recipe."#infos");
                exit;
            }
        }
    }
}