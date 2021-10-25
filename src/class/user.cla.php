<?php

class User
{
    private const db = "src/database/link_localhost.db.php";
    private const table = "app_user";
    private const table2 = "app_recipe";
    private const table3 = "app_user_verify";
    private const sql_err = "Ein SQL Error ist aufgetreten.";

    // required params: [prename, surname, email, password]
    public function create($e)
    {
        include($this::db);
        $e += ["timestamp" => strtotime("now")];
        $sql = "INSERT INTO ".$this::table." (prename, surname, email, password, timestamp, username, uuid) VALUES
        (:prename, :surname, :email, :password, :timestamp, :username, :uuid)";
        $sth = $pdo->prepare($sql);
        return $sth->execute($e);
    }

    public function get_by_email($email, $field)
    {
        include($this::db);
        $sql = "SELECT ".$field." FROM ".$this::table." WHERE email=:email";
        $sth = $pdo->prepare($sql);
        if($sth->execute(["email" => $email]))
        {
            $output = $sth->fetch();
            return $output[$field];
        }
    }

    public function get($id)
    {
        include($this::db);
        $sql = "SELECT * FROM ".$this::table." WHERE id=:id";
        $sth = $pdo->prepare($sql);
        if($sth->execute(["id" => $id]))
        {return $sth->fetch();}
    }

    public function modify($q, $ph)
    {
        include($this::db);
        $sth = $pdo->prepare($q);
        return $sth->execute($ph);
    }

    public function suicide($uid)
    {
        include($this::db);
        $sql = "DELETE FROM ".$this::table." WHERE id=:uid;
        DELETE FROM ".$this::table2." WHERE creator_id=:uid;
        DELETE FROM app_follow WHERE followed_id=:uid OR follower_id=:uid;
        DELETE FROM app_cookbook WHERE user_id=:uid;
        DELETE FROM app_recipe_comment WHERE user_id=:uid;
        DELETE FROM app_recipe_valuation WHERE user_id=:uid;";
        return $pdo->prepare($sql)->execute(["uid" => $uid]);
    }

    // param email
    public function exists($email)
    {
        include($this::db);
        $sql = "SELECT id FROM ".$this::table." WHERE email=:email";
        $sth = $pdo->prepare($sql);
        if($sth->execute(["email" => $email]))
        {return $sth->rowCount() > 0;}
    }

    public function username_exists($username)
    {
        include($this::db);
        $sql = "SELECT id FROM ".$this::table." WHERE username=:username";
        $sth = $pdo->prepare($sql);
        if($sth->execute(["username" => $username]))
        {return $sth->rowCount() > 0;}
    }

    public function exists_by_id($id)
    {
        include($this::db);
        $sql = "SELECT email FROM ".$this::table." WHERE id=:id";
        $sth = $pdo->prepare($sql);
        if($sth->execute(["id" => $id]))
        {return $sth->rowCount() > 0;}
    }

    public function verify($email, $pass)
    {
        include($this::db);
        $sql = "SELECT password FROM ".$this::table." WHERE email=:email";
        $sth = $pdo->prepare($sql);
        if($sth->execute(["email" => $email]))
        {
            $pass_hash = $sth->fetch();
            $pass_hash = $pass_hash["password"];

            return password_verify($pass, $pass_hash);
        }
    }

    public function verify_by_id($id, $pass)
    {
        include($this::db);
        $sql = "SELECT password FROM ".$this::table." WHERE id=:id";
        $sth = $pdo->prepare($sql);
        if($sth->execute(["id" => $id]))
        {
            $pass_hash = $sth->fetch();
            $pass_hash = $pass_hash["password"];

            return password_verify($pass, $pass_hash);
        }
    }

    // param id = user id
    public function get_recipes($id)
    {
        include($this::db);
        $sql = "SELECT ar.id, ar.title, ar.image, ar.duration_work, 
        ar.timestamp, ad.difficulty FROM ".$this::table2." ar 
        JOIN app_difficulty ad ON ar.difficulty_id=ad.id 
        WHERE ar.creator_id=:creator_id ORDER BY ar.timestamp DESC";
        $sth = $pdo->prepare($sql);
        if($sth->execute(["creator_id" => $id]))
        {return $sth->fetchAll();}
    }

    public function get_id_by_uuid($uuid)
    {
        include($this::db);
        $sql = "SELECT id FROM ".$this::table." WHERE uuid=:uuid";
        $sth = $pdo->prepare($sql);
        if($sth->execute(["uuid" => $uuid]))
        {return $sth->fetch();}
    }

    public function verify_create($e)
    {
        include($this::db);
        $e += ["timestamp" => strtotime("now")];
        $sql = "INSERT INTO ".$this::table3." (user_id, token, code, timestamp) VALUES 
        (:user_id, :token, :code, :timestamp)";
        $sth = $pdo->prepare($sql);
        return $sth->execute($e);
    }

    public function token_exists($token)
    {
        include($this::db);
        $sql = "SELECT token FROM ".$this::table3." WHERE token=:token";
        $sth = $pdo->prepare($sql);
        if($sth->execute(["token" => $token]))
        {return $sth->rowCount() > 0;}
    }

    public function verify_code($code, $token)
    {
        include($this::db);
        $sql = "SELECT user_id, code FROM ".$this::table3." WHERE token=:token";
        $sth = $pdo->prepare($sql);
        if($sth->execute(["token" => $token]) or die($this::sql_err))
        {
            $fcode = $sth->fetch();
            if($fcode["code"] == $code)
            {return $fcode["user_id"];}
            else
            {return false;}
        }
    }

    public function is_verified($uid)
    {
        include($this::db);
        $sql = "SELECT id FROM ".$this::table3." WHERE user_id=:user_id";
        $sth = $pdo->prepare($sql);
        if($sth->execute(["user_id" => $uid]) or die($this::sql_err))
        {return $sth->rowCount() === 0;}
    }

    public function verify_success($code, $token)
    {
        include($this::db);
        $sql = "DELETE FROM ".$this::table3." WHERE code=:code AND token=:token";
        $sth = $pdo->prepare($sql);
        return $sth->execute(["code" => $code, "token" => $token]);
    }

    public function get_verify_token($uid)
    {
        include($this::db);
        $sql = "SELECT token FROM ".$this::table3." WHERE user_id=:uid";
        $sth = $pdo->prepare($sql);
        if($sth->execute(["uid" => $uid]))
        {$token = $sth->fetch();return $token["token"];}
    }

    public function get_verify_code($uid)
    {
        include($this::db);
        $sql = "SELECT code FROM ".$this::table3." WHERE user_id=:uid";
        $sth = $pdo->prepare($sql);
        if($sth->execute(["uid" => $uid]))
        {$code = $sth->fetch();return $code["code"];}
    }
}