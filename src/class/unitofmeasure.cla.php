<?php

class UnitOfMeasure
{
    private const db = "src/database/link_localhost.db.php";
    private const table = "app_unitsofmeasure";
    private const sql_err = "Ein SQL Error ist aufgetreten.";

    // returns array of recipes
    public function get_all()
    {
        include($this::db);
        $sql = "SELECT * FROM ".$this::table." ORDER BY unit ASC";
        $sth = $pdo->prepare($sql);
        if($sth->execute())
        {return $sth->fetchAll();}
    }
}