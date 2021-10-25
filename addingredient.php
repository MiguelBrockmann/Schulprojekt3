<?php
session_start();

function exit_to($err)
{
    header("Location: http://localhost:8080/login/?node=".$err);
    exit;
}

if(!isset($_SESSION["USER_SESSION"]))
{exit_to(1199);}

require_once("src/php/get_userdata.php");

require_once("src/class/ingredient.cla.php");
$ingredient = new Ingredient();

if(isset($_GET["title"]))
{$i_title=$_GET["title"];}else{$i_title="";}
if(isset($_GET["carbohyd"]))
{$i_carbohyd=$_GET["carbohyd"];}else{$i_carbohyd="";}
if(isset($_GET["calories"]))
{$i_calories=$_GET["calories"];}else{$i_calories="";}
if(isset($_GET["protein"]))
{$i_protein=$_GET["protein"];}else{$i_protein="";}
if(isset($_GET["sugar"]))
{$i_sugar=$_GET["sugar"];}else{$i_sugar="";}
if(isset($_GET["fat"]))
{$i_fat=$_GET["fat"];}else{$i_fat="";}
if(isset($_GET["fattyacid"]))
{$i_fattyacid=$_GET["fattyacid"];}else{$i_fattyacid="";}
if(isset($_GET["fiber"]))
{$i_fiber=$_GET["fiber"];}else{$i_fiber="";}
if(isset($_GET["salt"]))
{$i_salt=$_GET["salt"];}else{$i_salt="";}

$pagetitle = "Zutat hinzufügen";

include("src/template/head.tpl.php");
include("src/template/page/addingredient.tpl.php");
include("src/template/foot.tpl.php");