<?php
require_once("src/class/user.cla.php");
$user = new User();
$user = $user->get($_SESSION["USER_SESSION"]);