<?php
session_start();

function exit_to($err)
{
    header("Location: http://localhost:8080/create/?node=".$err);
    exit;
}

if(!isset($_SESSION["USER_SESSION"]))
{exit_to(1199);}

require_once("src/class/recipe.cla.php");
$recipe = new Recipe();
require_once("src/class/recipe_line.cla.php");
$recipe_line = new RecipeLine();
require_once("src/class/recipe_category.cla.php");
$recipe_category = new RecipeCategory();

if(isset($_POST["create-recipe-submit"]) or exit_to(1200))
{
    $name = $_POST["create-recipe-name"];
    $duration_work = $_POST["create-recipe-duration-work"];
    $duration_rest = $_POST["create-recipe-duration-rest"];
    $duration_cook = $_POST["create-recipe-duration-cook"];
    $category1 = $_POST["create-recipe-category1"];
    $category2 = $_POST["create-recipe-category2"];
    $category3 = $_POST["create-recipe-category3"];
    $difficulty = $_POST["create-recipe-difficulty"];
    $text001 = $_POST["create-recipe-text001"];
    $text002 = $_POST["create-recipe-text002"];
    $text003 = $_POST["create-recipe-text003"];
    $portions = $_POST["create-recipe-portions"];
    $carbohydrates = $_POST["create-recipe-carbohydrates"];
    $calories = $_POST["create-recipe-calories"];
    $protein = $_POST["create-recipe-protein"];
    $sugar = $_POST["create-recipe-sugar"];
    $fat = $_POST["create-recipe-fat"];
    $fattyacid = $_POST["create-recipe-fattyacid"];
    $fiber = $_POST["create-recipe-fiber"];
    $salt = $_POST["create-recipe-salt"];
    $uuid = uniqid("VAN");

    if(isset($name) && !empty($name) or exit_to(1201))
    {
        if(isset($portions) && !empty($portions) or exit_to(1202))
        {
            if(isset($difficulty) && !empty($difficulty) or exit_to(1204))
            {
                if($_FILES["create-recipe-img"]["size"] < pow(10,6) or exit_to(1350))
                {
                    $path = "assets/image/recipe/";
                    $new_file_name = uniqid().uniqid().uniqid().".jpg";
                    
                    move_uploaded_file($_FILES["create-recipe-img"]["tmp_name"], $path.$new_file_name);
                    $image = $new_file_name;
                }

                if($recipe->create([
                    "uuid" => $uuid,
                    "title" => $name,
                    "difficulty_id" => $difficulty,
                    "creator_id" => $_SESSION["USER_SESSION"],
                    "duration_work" => $duration_work,
                    "duration_rest" => $duration_rest,
                    "duration_cook" => $duration_cook,
                    "text002" => $text002,
                    "text003" => $text003,
                    "portions" => $portions,
                    "carbohydrates" => $carbohydrates,
                    "calories" => $calories,
                    "protein" => $protein,
                    "sugar" => $sugar,
                    "fat" => $fat,
                    "fatty_acid" => $fattyacid,
                    "fiber" => $fiber,
                    "salt" => $salt,
                    "image" => $image
                ]) or die($pdo->errorInfo()))
                {
                    $recipe_id = $recipe->get_id_by_uuid($uuid);

                    for($i = 0; $i < (count($_POST)-8); $i++)
                    {
                        if(isset($_POST["create-recipe-ingredient".$i]) && 
                        isset($_POST["create-recipe-ingredient".$i."-quantity"]))
                        {
                            if($_POST["create-recipe-ingredient".$i] <> 0 &&
                            $_POST["create-recipe-ingredient".$i."-uom"] <> 0 &&
                            $_POST["create-recipe-ingredient".$i."-quantity"] <> "")
                            {   
                                $recipe_line->create([
                                    "ingredient_id" => $_POST["create-recipe-ingredient".$i],
                                    "recipe_id" => $recipe_id,
                                    "quantity" => $_POST["create-recipe-ingredient".$i."-quantity"],
                                    "uom_id" => $_POST["create-recipe-ingredient".$i."-uom"],
                                ]);
                            }
                        }
                    }

                    if($category1 <> 0)
                    {
                        $recipe_category->create_mapping([
                            "recipe_id" => $recipe_id,
                            "category_id" => $category1
                        ]);
                    }

                    if($category2 <> 0)
                    {
                        $recipe_category->create_mapping([
                            "recipe_id" => $recipe_id,
                            "category_id" => $category2
                        ]);
                    }

                    if($category3 <> 0)
                    {
                        $recipe_category->create_mapping([
                            "recipe_id" => $recipe_id,
                            "category_id" => $category3
                        ]);
                    }

                    header("Location: http://localhost:8080/recipe/?id=".$recipe_id);
                    exit;
                }
            }
        }
    }
}