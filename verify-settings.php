<?php
session_start();

function exit_to($err)
{
    header("Location: http://localhost:8080/settings/?node=".$err);
    exit;
}

if(!isset($_SESSION["USER_SESSION"]))
{exit_to(1199);}

require_once("src/class/user.cla.php");
$user = new User();

if(isset($_POST["app-settings-submit"]))
{
    if(isset($_POST["app-settings-prename"]) && !empty($_POST["app-settings-prename"]))
    {
        if(isset($_POST["app-settings-surname"]) && !empty($_POST["app-settings-surname"]))
        {
            $e = [
                "prename" => ucfirst(strtolower($_POST["app-settings-prename"])),
                "surname" => ucfirst(strtolower($_POST["app-settings-surname"])),
                "id" => $_SESSION["USER_SESSION"]
            ];

            if($user->modify("UPDATE app_user SET prename=:prename, surname=:surname WHERE id=:id", $e))
            {
                header("Location: http://localhost:8080/profile/");
                exit;
            }
        }
    }
}
else if(isset($_POST["app-settings-bio-submit"]))
{
    if(isset($_POST["app-settings-bio"]) && !empty($_POST["app-settings-bio"]))
    {
        $e = [
            "bio" => $_POST["app-settings-bio"],
            "id" => $_SESSION["USER_SESSION"] 
        ];

        if($user->modify("UPDATE app_user SET bio=:bio WHERE id=:id", $e))
        {
            header("Location: http://localhost:8080/profile/");
            exit;
        }
    }
}
else if(isset($_POST["app-settings-pass-submit"]))
{
    if(isset($_POST["app-settings-pass-passold"]) && !empty($_POST["app-settings-pass-passold"]) or exit_to("P1200"))
    {
        if(isset($_POST["app-settings-pass-pass1"]) && !empty($_POST["app-settings-pass-pass1"]) or exit_to("P1201"))
        {
            if(isset($_POST["app-settings-pass-pass2"]) && !empty($_POST["app-settings-pass-pass2"]) or exit_to("P1202"))
            {
                if($user->verify_by_id($_SESSION["USER_SESSION"], $_POST["app-settings-pass-passold"]) or exit_to("P1203"))
                {
                    if($_POST["app-settings-pass-pass1"] === $_POST["app-settings-pass-pass2"] or exit_to("P1204"))
                    {
                        $e = [
                            "password" => password_hash($_POST["app-settings-pass-pass1"], PASSWORD_DEFAULT),
                            "id" => $_SESSION["USER_SESSION"]
                        ];

                        if($user->modify("UPDATE app_user SET password=:password WHERE id=:id", $e) or exit_to("P1205"))
                        {
                            header("Location: http://localhost:8080/profile/");
                            exit;
                        }
                    }
                }
            }
        }
    }
}
else if(isset($_POST["app-settings-image-submit"]))
{
    if(isset($_POST["app-settings-image"]) && !empty($_POST["app-settings-image"]))
    {
        
    }
}