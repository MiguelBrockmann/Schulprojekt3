<?php

class Recipe
{
    private const db = "src/database/link_localhost.db.php";
    private const table = "app_recipe";
    private const table2 = "app_cookbook";
    private const table3 = "app_follow";
    private const table4 = "app_allergen";
    private const sql_err = "Ein SQL Error ist aufgetreten.";

    // required params: [title, difficulty_id, creator_id, text001, text002, text003]
    public function create($e)
    {
        include($this::db);
        $e += ["timestamp" => strtotime("now")];
        $sql = "INSERT INTO ".$this::table." (uuid, title, difficulty_id, creator_id, duration_work, 
        duration_rest, duration_cook, timestamp, text002, text003, portions, carbohydrates, calories, protein,
        sugar, fat, fatty_acid, fiber, salt, image) VALUES
        (:uuid, :title, :difficulty_id, :creator_id, :duration_work, :duration_rest, :duration_cook, :timestamp, 
        :text002, :text003, :portions, :carbohydrates, :calories, :protein, :sugar, :fat, :fatty_acid, :fiber, :salt, 
        :image)";
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
    public function get($id)
    {
        include($this::db);
        $sql = "SELECT ar.id AS rid, ar.image, ar.title, ar.text001, ar.text002, ar.text003, ar.carbohydrates, 
        ar.calories, ar.protein, ar.sugar, ar.fat, ar.fatty_acid, ar.fiber, ar.salt, ar.timestamp, 
        ar.duration_work, ar.duration_rest, ar.duration_cook, au.id, au.prename, au.surname, au.picture, 
        ad.difficulty FROM ".$this::table." ar 
        JOIN app_user au ON ar.creator_id=au.id JOIN app_difficulty ad ON ar.difficulty_id=ad.id WHERE ar.id=:id";
        $sth = $pdo->prepare($sql);
        if($sth->execute(["id" => $id]) or die($this::sql_err))
        {return $sth->fetch();}
    }

    public function get_id_by_uuid($uuid)
    {
        include($this::db);
        $sql = "SELECT id FROM app_recipe WHERE uuid=:uuid";
        $sth = $pdo->prepare($sql);
        if($sth->execute(["uuid" => $uuid]) or die($this::sql_err))
        {
            $id = $sth->fetch();
            return $id["id"];
        }
    }

    public function get_all()
    {
        include($this::db);
        $sql = "SELECT ar.id, ar.title, ar.image, ar.duration_work, ar.duration_rest, ar.duration_cook, 
        ad.difficulty, au.prename, au.surname FROM ".$this::table." ar 
        JOIN app_user au ON ar.creator_id=au.id 
        JOIN app_difficulty ad ON ar.difficulty_id=ad.id 
        ORDER BY ar.timestamp DESC LIMIT 50";
        $sth = $pdo->prepare($sql);
        if($sth->execute() or die($this::sql_err))
        {return $sth->fetchAll();}
    }

    public function exists_by_id($id)
    {
        include($this::db);
        $sql = "SELECT title FROM ".$this::table." WHERE id=:id";
        $sth = $pdo->prepare($sql);
        if($sth->execute(["id" => $id]) or die($this::sql_err))
        {return $sth->rowCount() > 0;}
    }

    public function count($id)
    {
        include($this::db);
        $sql = "SELECT id FROM ".$this::table." WHERE creator_id=:id";
        $sth = $pdo->prepare($sql);
        if($sth->execute(["id" => $id]) or die($this::sql_err))
        {return $sth->rowCount();}
    }

    public function is_saved($rid)
    {
        include($this::db);
        $sql = "SELECT * FROM ".$this::table2." WHERE user_id=:uid AND recipe_id=:rid";
        $sth = $pdo->prepare($sql);
        if($sth->execute(["uid" => $_SESSION["USER_SESSION"], "rid" => $rid]) or die($this::sql_err))
        {return $sth->rowCount() > 0;}
    }

    public function save($rid)
    {
        include($this::db);
        $sql = "INSERT INTO ".$this::table2." (user_id, recipe_id) VALUES (:uid, :rid)";
        $sth = $pdo->prepare($sql);
        return $sth->execute(["uid" => $_SESSION["USER_SESSION"], "rid" => $rid]);
    }

    public function unsave($rid)
    {
        include($this::db);
        $sql = "DELETE FROM ".$this::table2." WHERE user_id=:uid AND recipe_id=:rid";
        $sth = $pdo->prepare($sql);
        return $sth->execute(["uid" => $_SESSION["USER_SESSION"], "rid" => $rid]);
    }

    public function get_saved($uid)
    {
        include($this::db);
        $sql = "SELECT au.prename, au.surname, ar.id AS rid, ar.title, ar.image FROM ".$this::table2." acb 
        JOIN app_recipe ar ON acb.recipe_id=ar.id 
        JOIN app_user au ON ar.creator_id=au.id 
        WHERE user_id=:uid";
        $sth = $pdo->prepare($sql);
        if($sth->execute(["uid" => $uid]) or die($this::sql_err))
        {return $sth->fetchAll();}
    }

    public function get_bestrated()
    {
        include($this::db);
        $sql = "SELECT ar.id, ar.title, ar.image, ar.duration_work, ar.duration_rest, ar.duration_cook, 
        ad.difficulty, au.prename, au.surname, AVG(arv.amount) AS amount FROM ".$this::table." ar 
        JOIN app_recipe_valuation arv ON ar.id=arv.recipe_id 
        JOIN app_user au ON ar.creator_id=au.id 
        JOIN app_difficulty ad ON ar.difficulty_id=ad.id 
        ORDER BY AVG(arv.amount) LIMIT 25";
        $sth = $pdo->prepare($sql);
        if($sth->execute() or die($this::sql_err))
        {return $sth->fetchAll();}
    }

    public function get_all_followed($id)
    {
        include($this::db);
        $sql = "SELECT ar.id, ar.title, ar.image, ar.duration_work, ar.duration_rest, ar.duration_cook, 
        ar.timestamp, ad.difficulty, au.prename, au.surname, au.picture FROM ".$this::table." ar 
        JOIN app_user au ON ar.creator_id=au.id 
        JOIN app_difficulty ad ON ar.difficulty_id=ad.id 
        WHERE ar.creator_id IN (SELECT flw.followed_id FROM ".$this::table3." flw WHERE flw.follower_id=:follower) 
        ORDER BY ar.timestamp DESC LIMIT 50";
        $sth = $pdo->prepare($sql);
        if($sth->execute(["follower" => $id]) or die($this::sql_err))
        {return $sth->fetchAll();}
    }

    public function get_by_category($cid)
    {
        include($this::db);
        $sql = "SELECT au.prename, au.surname, ar.id, ar.title, ar.image, arcm.category_id, 
        ar.duration_work, ar.duration_cook, ar.duration_rest, ad.difficulty FROM ".$this::table." ar 
        JOIN app_difficulty ad ON ar.difficulty_id=ad.id 
        JOIN app_user au ON ar.creator_id=au.id 
        JOIN app_recipe_category_map arcm ON ar.id=arcm.recipe_id
        WHERE arcm.category_id=?";
        $sth = $pdo->prepare($sql);
        if($sth->execute([$cid]) or die($this::sql_err))
        {return $sth->fetchAll();}
    }

    public function get_allergen()
    {
        include($this::db);
        $sql = "SELECT id, description, icon FROM ".$this::table4." ORDER BY id ASC";
        $sth = $pdo->prepare($sql);
        if($sth->execute())
        {return $sth->fetchAll();}
    }
}