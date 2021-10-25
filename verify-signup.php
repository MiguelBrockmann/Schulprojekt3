<?php
session_start();

function exit_to($err)
{
    header("Location: http://localhost:8080/signup/?node=".$err);
    exit;
}

if(isset($_SESSION["USER_SESSION"]))
{exit_to(1199);}

if(isset($_POST["verify-signup-submit"]) or exit_to(1200))
{
    $prename = $_POST["verify-signup-prename"];
    $surname = $_POST["verify-signup-surname"];
    $email = $_POST["verify-signup-email"];
    $pass = $_POST["verify-signup-pass"];
    $accept = $_POST["verify-signup-terms"];
    $username = $_POST["verify-signup-username"];

    if(isset($prename) && !empty($prename) or exit_to(1201))
    {
        if(isset($surname) && !empty($surname) or exit_to(1202))
        {
            if(isset($email) && !empty($email) or exit_to(1203))
            {
                if(isset($pass) && !empty($pass) or exit_to(1204))
                {
                    if(isset($username) && !empty($username) or exit_to(1212))
                    {
                        if(isset($accept) or exit_to(1205))
                        {
                            require_once("src/class/user.cla.php");
                            $user = new User();

                            if(!$user->exists($email) or exit_to(1206))
                            {
                                if(!$user->username_exists($username) or exit_to(1213))
                                {
                                    if(strlen($email) >= 6 && strlen($pass) >= 8 && strlen($email) >= 5 or exit_to(1207))
                                    {
                                        $uuid = uniqid();

                                        $e = [
                                            "prename" => ucfirst(strtolower(trim($prename))),
                                            "surname" => ucfirst(strtolower(trim($surname))),
                                            "email" => strtolower(trim($email)),
                                            "password" => password_hash($pass, PASSWORD_DEFAULT),
                                            "username" => strtolower(trim($username)),
                                            "uuid" => $uuid
                                        ];

                                        if($user->create($e) or exit_to(1780))
                                        {
                                            // $token = uniqid(uniqid());
                                            // $code = rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
                                            // $uid = $user->get_id_by_uuid($uuid);
                                            $uid = $user->get_by_email($email, "id");
                                            // if($user->verify_create(["user_id" => $uid["id"], "token" => $token, "code" => $code]) or exit_to(1790))
                                            // {
                                            //     require_once("src/class/SMTP.cla.php");
                                            //     $smtp = new SMTP();
                                            //     if($smtp->send_email([
                                            //         "subject" => "Dein Verifizierungscode",
                                            //         "to" => strtolower(trim($email)),
                                            //         "param_name" => ucfirst(strtolower(trim($prename))),
                                            //         "param_code" => $code
                                            //     ]) or exit_to(1800))
                                            //     {
                                                    // header("Location: http://localhost:8080/verify-step/?token=".$token);
                                                    // exit;

                                                    $_SESSION["USER_SESSION"] = $uid;
                                                    header("Location: http://localhost:8080/discover/");
                                                    exit;
                                            //     }
                                            // }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}