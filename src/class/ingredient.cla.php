<?php

class Ingredient
{
    private const db = "src/database/link_localhost.db.php";
    private const table = "app_ingredient";
    private const table2 = "app_recipe_line";
    private const sql_err = "Ein SQL Error ist aufgetreten.";

    public function create($e)
    {
        include($this::db);
        $sql = "INSERT INTO ".$this::table." (description, carbohydrates, calories, protein, 
        sugar, fat, fatty_acid, fiber, salt) VALUES (:title, :carbohydrates, :calories, :protein, :sugar, :fat, 
        :fatty_acid, :fiber, :salt)";
        $sth = $pdo->prepare($sql);
        return $sth->execute($e);
    }

    // returns array of recipes
    public function get_all()
    {
        include($this::db);
        $sql = "SELECT id, description FROM ".$this::table." ORDER BY description ASC";
        $sth = $pdo->prepare($sql);
        if($sth->execute())
        {return $sth->fetchAll();}
    }

    // public function get_nutritional_values($rid)
    // {
    //     include($this::db);
    //     $sql = "SELECT * FROM ".$this::table2." 
    //     JOIN ".$this::table."  
    //     WHERE recipe_id=:rid";
    //     $sth = $pdo->prepare($sql);
    //     if($sth->execute())
    //     {

    //     }
    // }
}