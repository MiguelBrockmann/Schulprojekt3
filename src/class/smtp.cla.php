<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class SMTP
{
    // $e = subject, to
    public function send_email($e)
    {
        
        require("assets/set/SMTP/Exception.php");
        require("assets/set/SMTP/PHPMailer.php");
        require("assets/set/SMTP/SMTP.php");
        
        include("assets/set/SMTP/SMTP_config.php");
        
        $phs = [
            "NAME" => $e["param_name"],
            "CODE" => $e["param_code"]
        ];
    
        $body = file_get_contents('http://localhost:8080/assets/set/SMTP/template/verification.phtml');
        foreach($phs as $k=>$var)
        {
            $body = str_replace("{".strtoupper($k)."}", $var, $body);
        }

        $smtp = new PHPMailer();
        $smtp->isSMTP();

        $smtp->Host = $smtp_config["host"];
        $smtp->SMTPAuth = true;
        $smtp->SMTPSecure = $smtp_config["secure"];
        $smtp->Port = $smtp_config["port"];
        $smtp->Username = $smtp_config["user"];
        $smtp->Password = $smtp_config["pass"];

        $smtp->setFrom($smtp_config["user"], $smtp_config["display"]);
        $smtp->addAddress($e["to"]);
        
        $smtp->isHTML(true);
        $smtp->CharSet = 'UTF-8';
        $smtp->Encoding = 'base64';
        
        $smtp->Subject = $e["subject"];
        $smtp->Body = $body;

        return $smtp->send();
    } 
}