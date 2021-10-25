<?php

include("../database/link_localhost.db.php");

if(isset($_POST["search"]) or die("Anfrage konnte nicht verarbeitet werden."))
{
    $sql = "SELECT ar.id, ar.image, ar.title, au.prename, au.surname FROM app_recipe ar 
    JOIN app_user au ON ar.creator_id=au.id 
    WHERE title LIKE '%".$_POST["search"]."%' 
    LIMIT 5";
    $sth = $pdo->prepare($sql);
    if($sth->execute() or die("Fehler"))
    {
        if($sth->rowCount() > 0)
        {
            ?>
            <ul>
            <?php
            foreach($sth->fetchAll() as $recipe)
            {
                ?>
                <li class="search-result">
                    <a href="http://localhost:8080/recipe/?id=<?= $recipe["id"]; ?>">
                        <div>
                            <div class="search-result-img me-2" style="background-image: url('http://localhost:8080/assets/image/recipe/<?= $recipe["image"]; ?>');">
                            </div>
                            <div class="mb-1">
                                <?= $recipe["title"]; ?>
                                <span>von <?= $recipe["prename"]." ".$recipe["surname"]; ?></span>
                            </div>
                        </div>
                    </a>
                </li>
                <?php
            }
            ?>
            </ul>
            <?php
        }
        else
        {
            echo "Es konnte leider nichts mit dem Namen ".$_POST["search"]." gefunden werden.";
        }
    }
}