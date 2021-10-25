<div id="app-addingredient" class="w-100 my-4">
    <div class="container-sm p-4">
        <h4>Zutat hinzufügen</h4>

        <form action="http://localhost:8080/verify-ingredient/" method="POST">
            <div class="mt-3">
                <label for="verify-ingredient" class="form-label">Zutat</label>
                <input value="<?= $i_title; ?>" type="text" class="form-control" id="verify-ingredient" name="verify-ingredient" autofocus>
            </div>

            <div class="mt-3 row">
                <div class="col">
                    <label for="verify-ingredient-carbohydrates" class="form-label">Kohlenhydrate pro 100g</label>
                    <input value="<?= $i_carbohyd; ?>" type="number" class="form-control" id="verify-ingredient-carbohydrates" name="verify-ingredient-carbohydrates" step="0.01">
                </div>
            
                <div class="col">
                    <label for="verify-ingredient-calories" class="form-label">Brennwert (kcal) pro 100g</label>
                    <input value="<?= $i_calories; ?>" type="number" class="form-control" id="verify-ingredient-calories" name="verify-ingredient-calories" step="0.01">
                </div>
                
                <div class="col">
                    <label for="verify-ingredient-protein" class="form-label">Protein/Eiweiß pro 100g</label>
                    <input value="<?= $i_protein; ?>" type="number" class="form-control" id="verify-ingredient-protein" name="verify-ingredient-protein" step="0.01">
                </div>

                <div class="col">
                    <label for="verify-ingredient-sugar" class="form-label">Zucker pro 100g</label>
                    <input  value="<?= $i_sugar; ?>" type="number" class="form-control" id="verify-ingredient-sugar" name="verify-ingredient-sugar" step="0.01">
                </div>
            </div>

            <div class="mt-3 row">
                <div class="col">
                    <label for="verify-ingredient-fat" class="form-label">Fett pro 100g</label>
                    <input value="<?= $i_fat; ?>" type="number" class="form-control" id="verify-ingredient-fat" name="verify-ingredient-fat" step="0.01">
                </div>

                <div class="col">
                    <label for="verify-ingredient-fatty-acid" class="form-label">davon ges. Fettsäuren pro 100g</label>
                    <input value="<?= $i_fattyacid; ?>" type="number" class="form-control" id="verify-ingredient-fatty-acid" name="verify-ingredient-fatty-acid" step="0.01">
                </div>

                <div class="col">
                    <label for="verify-ingredient-fiber" class="form-label">Ballaststoffe pro 100g</label>
                    <input value="<?= $i_fiber; ?>" type="number" class="form-control" id="verify-ingredient-fiber" name="verify-ingredient-fiber" step="0.01">
                </div>

                <div class="col">
                    <label for="verify-ingredient-salt" class="form-label">Salz pro 100g</label>
                    <input value="<?= $i_salt; ?>" type="number" class="form-control" id="verify-ingredient-salt" name="verify-ingredient-salt" step=".01">
                </div>
            </div>

            <div class="mt-3">
                <button name="verify-ingredient-submit" class="btn btn-primary" type="submit">Hinzufügen</button>
            </div>
        </form>
    </div>
</div>