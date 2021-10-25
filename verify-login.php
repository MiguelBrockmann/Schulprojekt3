<?php
session_start();

function exit_to($err)
{
    if($err == 1204)
    {
        header("Location: http://localhost:8080/login/?node=".$err."&email=".$_POST["verify-login-email"]);
        exit;
    }
    else
    {
        header("Location: http://localhost:8080/login/?node=".$err);
        exit;
    }
}

if(isset($_SESSION["USER_SESSION"]))
{exit_to(1199);}

if(isset($_POST["verify-login-submit"]) or exit_to(1200))
{
    $email = $_POST["verify-login-email"];
    $pass = $_POST["verify-login-pass"];

    if(isset($email) && !empty($email) or exit_to(1201))
    {
        if(isset($pass) && !empty($pass) or exit_to(1202))
        {
            require_once("src/class/user.cla.php");
            $user = new User();

            if($user->exists($email) or exit_to(1203))
            {
                if($user->verify($email, $pass) or exit_to(1204))
                {
                    // $_SESSION["USER_SESSION"] = $user->get_by_email($email, "id");

                    $uid = $user->get_by_email($email, "id");
                    if($user->is_verified($uid))
                    {
                        $_SESSION["USER_SESSION"] = $uid;
                        header("Location: http://localhost:8080/discover/");
                        exit;
                    }
                    else
                    {
                        // $userdata = $user->get($uid);
                        // require_once("src/class/smtp.cla.php");
                        // $smtp = new SMTP();
                        // if($smtp->send_email([
                        //     "subject" => "Dein Verifizierungscode",
                        //     "to" => $email,
                        //     "param_name" => $userdata["prename"],
                        //     "param_code" => $user->get_verify_code($uid)
                        // ]) or exit_to(1900))
                        // {
                            // $token = $user->get_verify_token($uid);
                            // header("Location: http://localhost:8080/verify-step/?token=".$token);
                            // exit;

                            $_SESSION["USER_SESSION"] = $uid;
                            header("Location: http://localhost:8080/discover/");
                            exit;
                        // }
                    }
                }
            }
        }
    }
}