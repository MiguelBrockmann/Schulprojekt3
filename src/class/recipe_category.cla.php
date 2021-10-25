<?php

class RecipeCategory
{
    private const db = "src/database/link_localhost.db.php";
    private const table = "app_recipe_category";
    private const table2 = "app_recipe_category_map";
    private const sql_err = "Ein SQL Error ist aufgetreten.";

    // returns array of recipes
    public function get()
    {
        include($this::db);
        $sql = "SELECT * FROM ".$this::table." ORDER BY description ASC";
        $sth = $pdo->prepare($sql);
        if($sth->execute())
        {return $sth->fetchAll();}
    }

    public function get_recipe_categories($rid)
    {
        include($this::db);
        $sql = "SELECT arc.description, arc.image FROM ".$this::table2." arcm 
        JOIN ".$this::table." arc ON arcm.category_id=arc.id 
        WHERE arcm.recipe_id=:rid";
        $sth = $pdo->prepare($sql);
        if($sth->execute(["rid" => $rid]) or die($this::sql_err))
        {return $sth->fetchAll();}
    }

    public function create_mapping($e)
    {
        include($this::db);
        $sql = "INSERT INTO ".$this::table2." (recipe_id, category_id) VALUES 
        (:recipe_id, :category_id)";
        $sth = $pdo->prepare($sql);
        return $sth->execute($e);
    }

    public function get_all_categories()
    {
        include($this::db);
        $sql = "SELECT id, description, image FROM ".$this::table." ORDER BY description";
        $sth = $pdo->prepare($sql);
        if($sth->execute())
        {return $sth->fetchAll();}
    }

    public function get_field($cid, $field)
    {
        include($this::db);
        $sql = "SELECT ".$field." FROM ".$this::table." WHERE id=?";
        $sth = $pdo->prepare($sql);
        if($sth->execute([$cid]))
        {
            $output = $sth->fetch();
            return $output[$field];
        }
    }
}