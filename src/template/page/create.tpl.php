<div id="page-create">
    <h4 class="page-headline">Rezept erstellen</h4>

    <div>
        <form action="http://localhost:8080/verify-recipe/" method="POST">
            <div id="recipe-create-info">
                <div class="row">
                    <div class="col">
                        <label for="create-recipe-name" class="form-label mb-0">Name</label>
                        <input type="text" class="form-control" id="create-recipe-name" name="create-recipe-name" autofocus>
                    </div>

                    <div class="col">
                        <label for="create-recipe-difficulty" class="form-label mb-0">Schwierigkeit</label>
                        <select class="form-select" id="create-recipe-difficulty" name="create-recipe-difficulty">
                            <?php
                            foreach($difficulty as $dif)
                            {
                            ?>
                                <option value="<?= $dif["id"]; ?>"><?= $dif["difficulty"]; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="mt-3 row">
                    <div class="col">
                        <label for="create-recipe-duration-work" class="form-label mb-0">Arbeitszeit in min.</label>
                        <input placeholder="optional" type="number" class="form-control" id="create-recipe-duration-work" name="create-recipe-duration-work">
                    </div>
                    <div class="col">
                        <label for="create-recipe-duration-rest" class="form-label mb-0">Ruhezeit in min.</label>
                        <input placeholder="optional" type="number" class="form-control" id="create-recipe-duration-rest" name="create-recipe-duration-rest">
                    </div>
                    <div class="col">
                        <label for="create-recipe-duration-cook" class="form-label mb-0">Koch-/Backzeit in min.</label>
                        <input placeholder="optional" type="number" class="form-control" id="create-recipe-duration-cook" name="create-recipe-duration-cook">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col">
                        <label for="create-recipe-category1" class="form-label mb-0">Kategorie 1</label>
                        <select class="form-select" id="create-recipe-category1" name="create-recipe-category1">
                            <option value="0">Bitte auswählen</option>
                            <?php
                            foreach($category as $cat)
                            {
                            ?>
                                <option value="<?= $cat["id"]; ?>"><?= $cat["description"]; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col">
                        <label for="create-recipe-category2" class="form-label mb-0">Kategorie 2</label>
                        <select class="form-select" id="create-recipe-category2" name="create-recipe-category2">
                            <option value="0">Bitte auswählen</option>
                            <?php
                            foreach($category as $cat)
                            {
                            ?>
                                <option value="<?= $cat["id"]; ?>"><?= $cat["description"]; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col">
                        <label for="create-recipe-category3" class="form-label mb-0">Kategorie 3</label>
                        <select class="form-select" id="create-recipe-category3" name="create-recipe-category3">
                            <option value="0">Bitte auswählen</option>
                            <?php
                            foreach($category as $cat)
                            {
                            ?>
                                <option value="<?= $cat["id"]; ?>"><?= $cat["description"]; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="mt-3">
                    <label for="create-recipe-text002" class="form-label mb-0">Zubereitung</label>
                    <textarea class="form-control" id="create-recipe-text002" name="create-recipe-text002" rows="4"></textarea>
                </div>

                <div class="mt-3">
                    <label for="create-recipe-text003" class="form-label mb-0">Tipp</label>
                    <textarea class="form-control" id="create-recipe-text003" name="create-recipe-text003" rows="4"></textarea>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col">
                    <h5>Infos</h5>
                    <div class="mb-0">
                        <label for="create-recipe-portions" class="form-label mb-0">Zutaten für Portionen</label>
                        <input type="number" class="form-control" id="create-recipe-portions" name="create-recipe-portions">
                    </div>

                    <div class="mt-3">
                        <label for="create-recipe-image" class="form-label mb-0">Bild</label>
                        <input type="file" class="form-control" id="create-recipe-image" name="create-recipe-image">
                    </div>
                    
                    <div class="mt-3">
                        <label for="create-recipe-carbohydrates" class="form-label mb-0">Kohlenhydrate</label>
                        <input type="number" placeholder="0,00g" class="form-control" id="create-recipe-carbohydrates" name="create-recipe-carbohydrates" step=".01">
                    </div>
                    
                    <div class="mt-3">
                        <label for="create-recipe-calories" class="form-label mb-0">Kalorien</label>
                        <input type="number" placeholder="0,00g" class="form-control" id="create-recipe-calories" name="create-recipe-calories" step=".01">
                    </div>
                    
                    <div class="mt-3">
                        <label for="create-recipe-protein" class="form-label mb-0">Eiweiß</label>
                        <input type="number" placeholder="0,00g" class="form-control" id="create-recipe-protein" name="create-recipe-protein" step=".01">
                    </div>
                    
                    <div class="mt-3">
                        <label for="create-recipe-sugar" class="form-label mb-0">Zucker</label>
                        <input type="number" placeholder="0,00g" class="form-control" id="create-recipe-sugar" name="create-recipe-sugar" step=".01">
                    </div>
                    
                    <div class="mt-3">
                        <label for="create-recipe-fat" class="form-label mb-0">Fett</label>
                        <input type="number" placeholder="0,00g" class="form-control" id="create-recipe-fat" name="create-recipe-fat" step=".01">
                    </div>
                    
                    <div class="mt-3">
                        <label for="create-recipe-fattyacid" class="form-label mb-0">Fettsäuren</label>
                        <input type="number" placeholder="0,00g" class="form-control" id="create-recipe-fattyacid" name="create-recipe-fattyacid" step=".01">
                    </div>
                    
                    <div class="mt-3">
                        <label for="create-recipe-salt" class="form-label mb-0">Salz</label>
                        <input type="number" placeholder="0,00g" class="form-control" id="create-recipe-salt" name="create-recipe-salt" step=".01">
                    </div>
                    
                    <div class="mt-3">
                        <label for="create-recipe-fiber" class="form-label mb-0">Ballaststoffe</label>
                        <input type="number" placeholder="0,00g" class="form-control" id="create-recipe-fiber" name="create-recipe-fiber" step=".01">
                    </div>
                </div>

                <div class="col">
                    <h5>Zutaten</h5>

                    <?php
                    for($i = 1; $i <= 15; $i++)
                    {
                    ?>
                    <label for="create-recipe-ingredient1" class="form-label mb-0">Zutat <?= $i; ?></label>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" id="create-recipe-ingredient<?= $i; ?>-quantity" name="create-recipe-ingredient<?= $i; ?>-quantity">

                        <select class="form-select" id="create-recipe-ingredient<?= $i; ?>-uom" name="create-recipe-ingredient<?= $i; ?>-uom">
                            <option value="0">- Bitte auswählen -</option>
                            <?php
                            foreach($units as $ut)
                            {
                            ?>
                                <option value="<?= $ut["id"]; ?>"><?= $ut["unit"]; ?> (<?= $ut["suffix"]; ?>)</option>
                            <?php
                            }
                            ?>
                        </select>

                        <select class="form-select" id="create-recipe-ingredient<?= $i; ?>" name="create-recipe-ingredient<?= $i; ?>">
                            <option value="0">- Bitte auswählen -</option>
                            <?php
                            foreach($ingredients as $ing)
                            {
                            ?>
                                <option value="<?= $ing["id"]; ?>"><?= $ing["description"]; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>

            <button type="submit" class="btn btn-black mt-3 w-100" name="create-recipe-submit">Erstellen</button>
        </form>
    </div>
</div>