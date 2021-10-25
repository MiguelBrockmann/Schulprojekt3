<?php

class RecipeValuation
{
    private const db = "src/database/link_localhost.db.php";
    private const table = "app_recipe_valuation";
    private const sql_err = "Ein SQL Error ist aufgetreten.";

    public function create($e)
    {
        include($this::db);
        $sql = "INSERT INTO ".$this::table." (recipe_id, amount, user_id) VALUES
        (:recipe_id, :amount, :user_id)";
        $sth = $pdo->prepare($sql);
        return $sth->execute($e);
    }

    public function get_average($rid)
    {
        if($this->count($rid) > 0)
        {
            include($this::db);
            $sql = "SELECT amount FROM ".$this::table." WHERE recipe_id=:rid";
            $sth = $pdo->prepare($sql);
            if($sth->execute(["rid" => $rid]))
            {
                $i = 0;
                $average = 0;
                foreach($sth->fetchAll() as $a)
                {$average = $average+$a["amount"];$i++;}
                return $average/$i;
            }
        }
        else
        {return 0;}
    }

    public function count($rid)
    {
        include($this::db);
        $sql = "SELECT id FROM ".$this::table." WHERE recipe_id=:rid";
        $sth = $pdo->prepare($sql);
        if($sth->execute(["rid" => $rid]))
        {return $sth->rowCount();}
    }

    public function has_valuated($uid, $rid)
    {
        include($this::db);
        $sql = "SELECT id FROM ".$this::table." WHERE user_id=:uid AND recipe_id=:rid";
        $sth = $pdo->prepare($sql);
        if($sth->execute(["uid" => $uid, "rid" => $rid]))
        {return $sth->rowCount() > 0;}
    }
}