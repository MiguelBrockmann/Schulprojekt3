<?php

class RecipeLine
{
    private const db = "src/database/link_localhost.db.php";
    private const table = "app_recipe_line";
    private const sql_err = "Ein SQL Error ist aufgetreten.";

    public function create($e)
    {
        include($this::db);
        $sql = "INSERT INTO ".$this::table." (ingredient_id, recipe_id, quantity, uom_id) VALUES
        (:ingredient_id, :recipe_id, :quantity, :uom_id)";
        $sth = $pdo->prepare($sql);
        return $sth->execute($e);
    }
    
    // deletes recipe record
    public function delete($id)
    {
        include($this::db);
        $sql = "DELETE FROM ".$this::table." WHERE id=:id";
        $sth = $pdo->prepare($sql);
        return $sth->execute(["id" => $id]);
    }

    // returns array of recipes
    public function get_lines_from($rid)
    {
        include($this::db);
        $sql = "SELECT arl.quantity, auom.suffix, auom.unit, ai.description FROM ".$this::table." arl 
        JOIN app_unitsofmeasure auom ON arl.uom_id=auom.id 
        JOIN app_ingredient ai ON arl.ingredient_id=ai.id 
        WHERE recipe_id=:rid";
        $sth = $pdo->prepare($sql);
        if($sth->execute(["rid" => $rid]) or die($this::sql_err))
        {return $sth->fetchAll();}
    }

    public function get_allergenes($rid)
    {
        include($this::db);
        $sql = "SELECT aa.description AS allergen, aa.icon FROM ".$this::table." arl 
        JOIN app_ingredient ai ON arl.ingredient_id=ai.id 
        JOIN app_allergen_map aam ON ai.id=aam.ingredient_id 
        JOIN app_allergen aa ON aam.allergen_id=aa.id 
        WHERE arl.recipe_id=:rid";
        $sth = $pdo->prepare($sql);
        if($sth->execute(["rid" => $rid]) or die($this::sql_err))
        {return $sth->fetchAll();}
    }
}