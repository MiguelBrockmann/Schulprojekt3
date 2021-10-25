<?php

class Follow
{
    private const db = "src/database/link_localhost.db.php";
    private const table = "app_follow";
    private const sql_err = "Ein SQL Error ist aufgetreten.";

    public function create($e)
    {
        include($this::db);
        $e += ["timestamp" => strtotime("now")];
        $sql = "INSERT INTO ".$this::table." (followed_id, follower_id, timestamp) VALUES 
        (:followed, :follower, :timestamp)";
        $sth = $pdo->prepare($sql);
        return $sth->execute($e);
    }
    
    public function follows($id)
    {
        include($this::db);
        $sql = "SELECT id FROM ".$this::table." WHERE followed_id=:followed AND follower_id=:follower";
        $sth = $pdo->prepare($sql);
        if($sth->execute(["followed" => $id, "follower" => $_SESSION["USER_SESSION"]]))
        {return $sth->rowCount() > 0;}
    }

    public function delete($id)
    {
        include($this::db);
        $sql = "DELETE FROM ".$this::table." WHERE follower_id=:follower AND followed_id=:followed";
        $sth = $pdo->prepare($sql);
        if($sth->execute(["followed" => $id, "follower" => $_SESSION["USER_SESSION"]]))
        {return $sth->rowCount() > 0;}
    }

    public function count($id)
    {
        include($this::db);
        $sql = "SELECT id FROM ".$this::table." WHERE followed_id=:followed";
        $sth = $pdo->prepare($sql);
        if($sth->execute(["followed" => $id]))
        {return $sth->rowCount();}
    }

    public function count2($id)
    {
        include($this::db);
        $sql = "SELECT id FROM ".$this::table." WHERE follower_id=:follower";
        $sth = $pdo->prepare($sql);
        if($sth->execute(["follower" => $id]))
        {return $sth->rowCount();}
    }

    public function get_follower($id)
    {
        include($this::db);
        $sql = "SELECT app_follow.follower_id, app_user.id, app_user.prename, app_user.surname, 
        app_user.picture FROM ".$this::table." JOIN app_user ON app_follow.follower_id=app_user.id 
        WHERE app_follow.followed_id=:id ORDER BY app_user.prename";
        $sth = $pdo->prepare($sql);
        if($sth->execute(["id" => $id]))
        {return $sth->fetchAll();}
    }

    public function get_followed($id)
    {
        include($this::db);
        $sql = "SELECT app_follow.followed_id, app_user.id, app_user.prename, app_user.surname, 
        app_user.picture FROM ".$this::table." JOIN app_user ON app_follow.followed_id=app_user.id 
        WHERE app_follow.follower_id=:id ORDER BY app_user.prename";
        $sth = $pdo->prepare($sql);
        if($sth->execute(["id" => $id]))
        {return $sth->fetchAll();}
    }

    public function get_field($id, $field)
    {
        include($this::db);
        $sql = "SELECT ".$field." FROM ".$this::table." WHERE follower_id=:id";
        $sth = $pdo->prepare($sql);
        if($sth->execute(["id" => $id]))
        {
            $output = $sth->fetch();
            return $output[$field];
        }
    }
}