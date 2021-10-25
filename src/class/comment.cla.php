<?php

class Comment
{
    private const db = "src/database/link_localhost.db.php";
    private const table = "app_recipe_comment";
    private const sql_err = "Ein SQL Error ist aufgetreten.";

    // returns array of recipes
    public function get($rid)
    {
        include($this::db);
        $sql = "SELECT arco.id AS coid, arco.comment, arco.timestamp, au.id AS uid, au.picture, au.prename, 
        au.surname FROM ".$this::table." arco 
        JOIN app_user au ON arco.user_id=au.id 
        WHERE arco.recipe_id=:rid 
        ORDER BY timestamp DESC";
        $sth = $pdo->prepare($sql);
        if($sth->execute(["rid" => $rid]))
        {return $sth->fetchAll();}
    }

    public function count($rid)
    {
        include($this::db);
        $sql = "SELECT id FROM ".$this::table." WHERE recipe_id=:rid";
        $sth = $pdo->prepare($sql);
        if($sth->execute(["rid" => $rid]))
        {return $sth->rowCount();}
    }

    public function create($e)
    {
        include($this::db);
        $e += ["timestamp" => strtotime("now")];
        $sql = "INSERT INTO ".$this::table." (comment, timestamp, user_id, recipe_id) VALUES 
        (:comment, :timestamp, :user_id, :recipe_id)";
        $sth = $pdo->prepare($sql);
        return $sth->execute($e);
    }
}