<div id="page-recipe">
    <div id="page-recipe-head" class="mb-3">
        <div id="page-recipe-img" style="background-image: url('http://localhost:8080/assets/image/recipe/<?= $recipe["image"]; ?>');">
        </div>

        <h3 class="my-3"><?= $recipe["title"]; ?></h3>

        <div class="d-flex px-4 py-1">
            <span class="bubble bubble-blue py-1 px-3 me-1">
                <img class="me-1" src="http://localhost:8080/assets/image/icon/ui/difficulty.svg">
                <?= $recipe["difficulty"]; ?>
            </span>
        </div>

        <div class="d-flex px-4 py-2">
            <?php
            if($recipe["duration_work"] <> 0)
            {
            ?>
            <span class="bubble bubble-blue py-1 px-3 me-1">
                <img class="me-1" src="http://localhost:8080/assets/image/icon/ui/clock.svg">
                <?= trans_duration($recipe["duration_work"], "%2d Std. %2d Min.")." Arbeitszeit"; ?>
            </span>
            <?php
            }
            
            if($recipe["duration_rest"] <> 0)
            {
            ?>
            <span class="bubble bubble-blue py-1 px-3 me-1">
                <img class="me-1" src="http://localhost:8080/assets/image/icon/ui/clock.svg">
                <?= trans_duration($recipe["duration_rest"], "%2d Std. %2d Min.")." Ruhezeit"; ?>
            </span>
            <?php
            }

            if($recipe["duration_cook"] <> 0)
            {
            ?>
            <span class="bubble bubble-blue py-1 px-3 me-1">
                <img class="me-1" src="http://localhost:8080/assets/image/icon/ui/clock.svg">
                <?= trans_duration($recipe["duration_cook"], "%2d Std. %2d Min.")." Koch-/Backzeit"; ?>
            </span>
            <?php
            }

            if($recipe["duration_cook"] <> 0 || $recipe["duration_work"] <> 0 || $recipe["duration_rest"] <> 0)
            {
            ?>
            <span class="bubble bubble-blue py-1 px-3 me-1">
                <img class="me-1" src="http://localhost:8080/assets/image/icon/ui/clock.svg">
                <?= trans_duration($recipe["duration_cook"]+$recipe["duration_work"]+$recipe["duration_rest"], "%2d Std. %2d Min")." gesamt"; ?>
            </span>
            <?php
            }
            ?>
        </div>

        <div class="d-flex px-4 pb-3">
            <?php
            foreach($categories as $cat)
            {
            ?>

            <span class="bubble bubble-primary py-1 px-3 me-1">
                <?= $cat["description"]; ?>
            </span>
            
            <?php
            }
            ?>
        </div>
    </div>

    <div id="page-recipe-body">
        <div class="px-4 py-3 mb-3">
            <h4 class="page-headline">Zutaten</h4>

            <table class="recipe-table ingredient-table">
                <tbody>
                <?php
                foreach($recipe_lines as $rl)
                {
                ?>
                    <tr>
                        <td><?= $rl["quantity"]." ".$rl["suffix"]; ?></td>
                        <td><?= $rl["description"]; ?></td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        </div>

        <div class="px-4 py-3 mb-3">
            <h4 class="page-headline">Zubereitung</h4>

            <?php
            if($recipe["text002"] <> "")
            {
            ?>
            
            <div class="mt-3">
                <p><?= nl2br($recipe["text002"]); ?></p>
            </div>

            <?php
            }

            if($recipe["text003"] <> "")
            {
            ?>
            
            <div class="mt-3">
                <h5 class="recipe-tip">Tipp</h5>
                <p class="mb-0"><?= nl2br($recipe["text003"]); ?></p>
            </div>

            <?php
            }
            ?>
        </div>

        <div class="px-4 py-3 mb-3">
            <div class="row">
                <div class="col">
                    <h4 class="page-headline">Allergene</h4>

                    <?php
                    if(count($recipe_allergen) > 0)
                    {
                        foreach($recipe_allergen as $ra)
                        {
                        ?>
                        <span class="me-2">
                            <img src="http://localhost:8080/assets/image/icon/allergen/<?= $ra["icon"]; ?>" height="38" title="<?= $ra["allergen"]; ?>" data-bs-toggle="tooltip" data-bs-placement="bottom">
                        </span>
                        <?php
                        }
                    }
                    else
                    {
                        ?>
                        <p>Keine Allergene für dieses Rezept.</p>
                        <?php
                    }
                    ?>
                </div>

                <div class="col">
                    <h4 class="page-headline">Nährwerte</h4>
                    <table class="recipe-table">
                        <tbody>
                            <tr class="tr-stripe">
                                <td class="tr-radius-tl tr-radius-bl">Brennwert</td>
                                <td class="tr-radius-tr tr-radius-br text-right"><?= number_format($recipe["calories"]*4.1868, 2, ",",".")." kJ/".number_format($recipe["calories"], 2, ",", "."); ?> kcal</td>
                            </tr>
                            <tr>
                                <td>Fett</td>
                                <td class="text-right"><?= number_format($recipe["fat"],2,",","."); ?> g</td>
                            </tr>
                            <tr>
                                <td>davon ges. Fettsäuren</td>
                                <td class="text-right"><?= number_format($recipe["fatty_acid"],2,",","."); ?> g</td>
                            </tr>
                            <tr class="tr-stripe">
                                <td class="tr-radius-tl">Kohlenhydrate</td>
                                <td class="tr-radius-tr text-right"><?= number_format($recipe["carbohydrates"],2,",","."); ?> g</td>
                            </tr>
                            <tr class="tr-stripe">
                                <td class="tr-radius-bl">davon Zucker</td>
                                <td class="tr-radius-br text-right"><?= number_format($recipe["sugar"],2,",","."); ?> g</td>
                            </tr>
                            <tr>
                                <td>Eiweiß</td>
                                <td class="text-right"><?= number_format($recipe["protein"],2,",","."); ?> g</td>
                            </tr>
                            <tr class="tr-stripe">
                                <td class="tr-radius-tl tr-radius-bl">Salz</td>
                                <td class="tr-radius-tr tr-radius-br text-right"><?= number_format($recipe["salt"],2,",","."); ?> g</td>
                            </tr>
                            <tr>
                                <td>Ballaststoffe</td>
                                <td class="text-right"><?= number_format($recipe["fiber"],2,",","."); ?> g</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="infos" class="px-4 py-3 mb-3">
            <h4 class="page-headline">Infos</h4>

            <div>
                <?php
                if($valuation_average <> 0)
                {
                    for($i = 1; $i <= round($valuation_average,0); $i++)
                    {
                    ?>
                        <img class="me-1" src="http://localhost:8080/assets/image/icon/ui/star_filled.svg" height="14">
                    <?php
                    }
                    for($i = 0; $i < (5 - round($valuation_average,0)); $i++)
                    {
                    ?>
                        <img class="me-1" src="http://localhost:8080/assets/image/icon/ui/star.svg" height="14">
                    <?php
                    }
                    ?>
                        <p class="ms-1 my-0"><strong><?= number_format($valuation_average, 1, ",", "."); ?></strong> (<?= $valuation_count; ?> Bewertungen)</p>
                <?php
                }
                else
                {
                ?>
                    <div class="app-recipe-valuations">
                        <p class="m-0">Noch keine Bewertungen.</p>
                    </div>
                <?php
                }
                ?>
                <hr>
                <?php
                if(!$valuation->has_valuated($_SESSION["USER_SESSION"], $recipe["rid"]))
                {
                ?>
                    <div class="app-recipe-valuation-form">
                        <form action="http://localhost:8080/verify-valuation/" method="POST">
                            <div class="mt-3 d-flex">
                                <div class="form-check">
                                    <input class="form-check-input app-valuation-radio" type="radio" name="valuation-verify" value="1">
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input app-valuation-radio" type="radio" name="valuation-verify" value="2">
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input app-valuation-radio" type="radio" name="valuation-verify" value="3">
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input app-valuation-radio" type="radio" name="valuation-verify" value="4">
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input app-valuation-radio" type="radio" name="valuation-verify" value="5">
                                </div>
                            </div>
                            <input type="hidden" name="valuation-verify-recipe" value="<?= $recipe["rid"]; ?>">
                            <button type="submit" class="btn btn-black mt-3" name="valuation-verify-submit">Abschicken</button>
                        </form>
                    </div>
                <?php
                }
                else
                {
                ?>
                    <p class="m-0">Du hast dieses Rezept bereits bewertet.</p>
                <?php
                }
                ?>
            </div>

            <div class="mt-3">
                <?php
                if(!$recipe_temp->is_saved($recipe["rid"]))
                {
                ?>

                <a id="save-recipe" u-target="<?= $_SESSION["USER_SESSION"]; ?>" r-target="<?= $recipe["rid"]; ?>" class="btn btn-black mt-3">
                    <img class="me-1" src="http://localhost:8080/assets/image/icon/ui/save.svg">
                    Rezept speichern
                </a>
                
                <?php
                }
                else
                {
                ?>

                <a id="save-recipe" u-target="<?= $_SESSION["USER_SESSION"]; ?>" r-target="<?= $recipe["rid"]; ?>" class="btn btn-secondary mt-3">
                    <img class="me-1" src="http://localhost:8080/assets/image/icon/ui/unsave.svg">
                    Gespeichert
                </a>

                <?php
                }
                ?>
            </div>

            <div class="mt-3">
                <h4>Rezept von</h4>

                <a class="no-link" href="http://localhost:8080/profile/?id=<?= $recipe["id"]; ?>">
                    <div class="recipe-creator">
                        <img class="me-2" src="http://localhost:8080/assets/image/profile/<?= $recipe["picture"]; ?>">
                        <span><?= $recipe["prename"]." ".$recipe["surname"]; ?></span>
                    </div>
                </a>
            </div>
        </div>

        <div id="comments" class="px-4 py-3 mt-3">
            <h4 class="page-headline">Kommentare</h4>
        
            <div>
                <form action="http://localhost:8080/verify-comment/" method="POST">
                    <textarea class="form-control" id="verify-comment" name="verify-comment" rows="2"></textarea>
                    <input type="hidden" name="verify-comment-recipe" value="<?= $recipe["rid"]; ?>">
                    <button class="btn btn-black mt-2">Kommentieren</button>
                </form>
            </div>

            <?php
            if($comment->count($recipe["rid"]) > 0)
            {
                foreach($comments as $c)
                {
            ?>
                <div class="recipe-comment px-3 py-2">
                    <div class="recipe-comment-head">
                        <a href="http://localhost:8080/profile/?id=<?= $c["uid"]; ?>" class="no-link">
                            <div class="recipe-comment-creator mb-2">
                                <img src="http://localhost:8080/assets/image/profile/<?= $c["picture"]; ?>" class="app-recipe-comment-picture me-1">
                                <span class="ms-1">
                                    <span class="recipe-comment-creator-name d-block"><?= $c["prename"]." ".$c["surname"]; ?></span>
                                    <span class="recipe-comment-creator-date d-block">am <?= date("d.m.Y", $c["timestamp"])." um ".date("H:i", $c["timestamp"]); ?> Uhr</span>
                                </span>
                            </div>
                        </a>
                    </div>
                    
                    <div class="px-2 py-3">
                        <p class="p-0 m-0"><?= $c["comment"]; ?></p>
                    </div>
                </div>
            <?php
                }
            }
            else
            {
            ?>
                <span class="mt-4 mb-2 d-block">Hier gibt es noch keine Kommentare.</span>
            <?php
            }
            ?>
        </div>
    </div>
</div>