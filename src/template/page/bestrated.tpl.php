<div id="page-discover">
    <h4 class="page-headline">Beste Bewertungen</h4>

    <div id="discover-recipes">
        <?php
        foreach($recipes as $r)
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
                                <?= $r["duration_work"]; ?> Min.
                            </span>
                            <span class="bubble mt-2 ms-2">
                                <img src="http://localhost:8080/assets/image/icon/ui/difficulty.svg">
                                <?= $r["difficulty"]; ?>
                            </span>
                            <span class="bubble mt-2 ms-2">
                                <img src="http://localhost:8080/assets/image/icon/ui/bar-rating.svg">
                                <?= number_format($r["amount"],1,",","."); ?>
                            </span>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <?php
        }
        ?>
    </div>
</div>