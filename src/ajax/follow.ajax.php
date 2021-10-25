<?php

class Follow
{
    private const db = "../../src/database/link_localhost.db.php";
    private const table = "app_follow";
    private const sql_err = "Ein SQL Error ist aufgetreten.";

    public function follows($id, $id2)
    {
        include($this::db);
        $sql = "SELECT id FROM ".$this::table." WHERE followed_id=:followed AND follower_id=:follower";
        $sth = $pdo->prepare($sql);
        if($sth->execute(["followed" => $id, "follower" => $id2]))
        {return $sth->rowCount() > 0;}
    }

    public function delete($id, $id2)
    {
        include($this::db);
        $sql = "DELETE FROM ".$this::table." WHERE follower_id=:follower AND followed_id=:followed";
        $sth = $pdo->prepare($sql);
        if($sth->execute(["followed" => $id, "follower" => $id2]))
        {return $sth->rowCount() > 0;}
    }

    public function create($e)
    {
        include($this::db);
        $e += ["timestamp" => strtotime("now")];
        $sql = "INSERT INTO ".$this::table." (followed_id, follower_id, timestamp) VALUES 
        (:followed, :follower, :timestamp)";
        $sth = $pdo->prepare($sql);
        return $sth->execute($e);
    }
}

$follow = new Follow();
$followed = $_POST["followed"];
$follower = $_POST["follower"];

if(isset($followed) && !empty($followed))
{
    if(isset($follower) && !empty($follower))
    {
        if($follow->follows($followed, $follower))
        {
            $follow->delete($followed, $follower);
        }
        else
        {
            $follow->create([
                "followed" => $followed,
                "follower" => $follower
            ]);
        }
    }
}