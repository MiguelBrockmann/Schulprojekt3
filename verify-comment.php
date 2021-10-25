<?php
session_start();

function exit_to($err)
{
    header("Location: http://localhost:8080/login/?node=".$err);
    exit;
}

if(!isset($_SESSION["USER_SESSION"]))
{exit_to(1199);}

require_once("src/class/comment.cla.php");
$comment = new Comment();

$v_comment = $_POST["verify-comment"];
$v_recipe = $_POST["verify-comment-recipe"];

if(isset($v_recipe) && !empty($v_recipe) or exit_to(1200))
{
    if(isset($v_comment) && !empty($v_comment) or exit_to(1201))
    {
        if($comment->create([
            "comment" => $v_comment,
            "user_id" => $_SESSION["USER_SESSION"],
            "recipe_id" => $v_recipe
        ]) or exit_to(1202))
        {
            header("Location: http://localhost:8080/recipe/?id=".$v_recipe."#comments");
            exit;
        }
    }
}