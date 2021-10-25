<?php
session_start();

function exit_to($err)
{
    header("Location: http://localhost:8080/verify-step/?token=".$_POST["verify-step-token"]."&node=".$err);
    exit;
}

if(isset($_SESSION["USER_SESSION"]))
{exit_to(1199);}

require_once("src/class/user.cla.php");
$user = new User();

$code = $_POST["verify-step-code"];
$token = $_POST["verify-step-token"];

if(isset($_POST["verify-step-submit"]) or exit_to(1200))
{
    if(isset($token) && isset($code) or exit_to(1201))
    {
        if(!empty($token) && !empty($code) or exit_to(1202))
        {
            if($uid = $user->verify_code($code, $token) or exit_to(1750))
            {
                if($user->verify_success($code, $token) or exit_to(1760))
                {
                    $_SESSION["USER_SESSION"] = $uid;
                    header("Location: http://localhost:8080/discover/");
                    exit;
                }
            }
        }
    }
}