<div id="page-saved">
    <h4 class="page-headline">Gespeicherte Rezepte</h4>
    <?php
    foreach($recipes as $r)
    {
    ?>
    <div id="saved-recipes">
        <a href="http://localhost:8080/recipe/?id=<?= $r["rid"] ?>" class="no-link link-hover">
            <div class="mb-3 d-flex">
                <div class="saved-recipes-img" style="background-image: url('http://localhost:8080/assets/image/recipe/<?= $r["image"]; ?>');">
                </div>
                <div class="ms-3">
                    <h5 class="mb-0"><?= $r["title"]; ?></h5>
                    <span>von <?= $r["prename"]." ".$r["surname"]; ?></span>
                </div>
            </div>
        </a>
    </div>
    <?php
    }
    ?>
</div>