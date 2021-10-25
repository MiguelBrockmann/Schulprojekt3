<div id="page-categories">
    <h4 class="page-headline">Rezeptkategorien</h4>

    <div id="discover-categories">
    <?php
    foreach($recipe_categories as $rc)
    {
    ?>
        <div>
            <a href="http://localhost:8080/category/?id=<?= $rc["id"]; ?>" class="no-link">
                <div>
                    <div class="discover-category-img" style="background-image: url('http://localhost:8080/assets/image/category/<?= $rc["image"]; ?>');">
                    </div>
                    <div class="discover-recipe-info">
                        <div class="discover-recipe-title">
                            <h5 class="mt-2"><?= $rc["description"]; ?></h5>
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