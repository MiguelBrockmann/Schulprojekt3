<?php

include("src/database/link_localhost.db.php");

if(isset($_POST["submit"]))
{
    if(!empty($_POST["submit"]))
    {
        if(!empty($_POST["zutat"]))
        {
            $zutat = $_POST["zutat"];
            $submit = $_POST["submit"];

            $sql = "SELECT id FROM app_ingredient WHERE description=?";
            $sth = $pdo->prepare($sql);
            if($sth->execute([$zutat]))
            {
                if($sth->rowCount() > 0)
                {
                    header("Location: http://localhost:8080/zutaten/?error1=true");
                    exit;
                }
                else
                {
                    $sql = "INSERT INTO app_ingredient (description) VALUES (?)";
                    $sth = $pdo->prepare($sql);
                    if($sth->execute([$zutat]))
                    {
                        header("Location: http://localhost:8080/zutaten/?success=true");
                        exit;
                    }
                    else
                    {
                        header("Location: http://localhost:8080/zutaten/?error2=true");
                        exit;
                    }
                }
            }
            else
            {
                echo "asd";
            }
        }
        else
        {
            header("Location: http://localhost:8080/zutaten/?error=true");
            exit;
        }
    }
    else
    {
        header("Location: http://localhost:8080/zutaten/?error=true");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="zutat">
        <input type="submit" name="submit">
    </form>
</body>
</html>