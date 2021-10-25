<?php
$filter = $_POST["filter"];

if(!isset($filter))
{echo "Es wurden keine Filter übergeben.";exit;}

include("../database/link_localhost.db.php");

function trans_duration($d, $format = '%2d:%2d')
{
    if($d < 60)
    {return $d." Min.";}
    $h = floor($d / 60);
    $m = ($d % 60);
    if($m == 0)
    {return $h." Std.";}
    else
    {return sprintf($format, $h, $m);}
}

$filter_temp = array();

for($i = 0; $i < count($filter); $i++)
{
    if($filter[$i] == "true")
    {
        array_push($filter_temp, $i+1);
    }
}

$select = $_POST["select"];

if($select == 0 || $select == 1)
{
    if($select == 1)
    {
        $switch = "NOT";
    }
    else if($select == 0)
    {
        $switch = "";
    }

    if(empty($filter_temp))
    {echo "Es wurden keine Filter übergeben.";exit;}

    $sql = "SELECT ar.id, ar.title, ar.image, ar.duration_cook, ar.duration_rest, ar.duration_work, 
    ad.difficulty, au.prename, au.surname FROM app_recipe ar 
    JOIN app_difficulty ad ON ar.difficulty_id=ad.id
    JOIN app_user au ON ar.creator_id=au.id 
    JOIN app_recipe_line arl ON ar.id=arl.recipe_id 
    JOIN app_allergen_map aam ON arl.ingredient_id=aam.ingredient_id 
    JOIN app_allergen aa ON aam.allergen_id=aa.id 
    WHERE aa.id ".$switch." IN (".implode(",", $filter_temp).")";
    $sth = $pdo->prepare($sql);
    if($sth->execute() or die("SQL Error"))
    {
        if($sth->rowCount() > 0)
        {
            $output = $sth->fetchAll();
            
            $output = array_map("unserialize", array_unique(array_map("serialize", $output)));

            foreach($output as $r)
            {
            ?>

            <div>
                <a href="http://localhost:8080/recipe/?id=<?= $r["id"]; ?>" class="no-link">
                    <div>
                        <div class="discover-recipe-img" style="background-image: url('http://localhost:8080/assets/image/recipe/<?= $r["image"]; ?>');">
                        </div>
                        <div class="discover-recipe-info">
                            <div class="discover-recipe-title">
                                <h5 class="mt-2"><?= $r["title"]; ?></h5>
                                <span>von <?= $r["prename"]." ".$r["surname"]; ?></span>
                            </div>
                            <div class="discover-recipe-bubble">
                                <span class="bubble mt-2">
                                    <img src="http://localhost:8080/assets/image/icon/ui/clock.svg">
                                    <?= trans_duration($r["duration_work"]+$r["duration_rest"]+$r["duration_cook"], "%2d Std. %2d Min."); ?>
                                </span>
                                <span class="bubble mt-2 ms-2">
                                    <img src="http://localhost:8080/assets/image/icon/ui/difficulty.svg">
                                    <?= $r["difficulty"]; ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <?php
            }
        }
        else
        {
            echo "Keine Rezepte für diese Auswahl!";
        }
    }
}