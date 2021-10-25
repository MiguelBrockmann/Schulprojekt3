<?php

class Save
{
    private const db = "../../src/database/link_localhost.db.php";
    private const table2 = "app_cookbook";
    private const sql_err = "Ein SQL Error ist aufgetreten.";

    public function is_saved($rid, $uid)
    {
        include($this::db);
        $sql = "SELECT * FROM ".$this::table2." WHERE user_id=:uid AND recipe_id=:rid";
        $sth = $pdo->prepare($sql);
        if($sth->execute(["uid" => $uid, "rid" => $rid]))
        {return $sth->rowCount() > 0;}
    }

    public function save_recipe($rid, $uid)
    {
        include($this::db);
        $sql = "INSERT INTO ".$this::table2." (user_id, recipe_id) VALUES (:uid, :rid)";
        $sth = $pdo->prepare($sql);
        return $sth->execute(["uid" => $uid, "rid" => $rid]);
    }

    public function unsave_recipe($rid, $uid)
    {
        include($this::db);
        $sql = "DELETE FROM ".$this::table2." WHERE user_id=:uid AND recipe_id=:rid";
        $sth = $pdo->prepare($sql);
        return $sth->execute(["uid" => $uid, "rid" => $rid]);
    }
}

$save = new Save();
$user = $_POST["user"];
$recipe = $_POST["recipe"];

if(isset($user) && !empty($user))
{
    if(isset($recipe) && !empty($recipe))
    {
        if($save->is_saved($recipe, $user))
        {
            $save->unsave_recipe($recipe, $user);
        }
        else
        {
            $save->save_recipe($recipe, $user);
        }
    }
}