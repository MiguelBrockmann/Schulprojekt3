<?php

class Difficulty
{
    private const db = "src/database/link_localhost.db.php";
    private const table = "app_difficulty";
    private const sql_err = "Ein SQL Error ist aufgetreten.";

    // returns array of recipes
    public function get()
    {
        include($this::db);
        $sql = "SELECT * FROM ".$this::table." ORDER BY id";
        $sth = $pdo->prepare($sql);
        if($sth->execute())
        {return $sth->fetchAll();}
    }
}