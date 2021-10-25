<div id="page-filter">
    <h4 class="page-headline">Rezepte filtern</h4>

    <div id="filter-recipes-selection">
        <label class="form-label" for="">Kategorie</label>
        <select class="form-select form-select-sm" id="filter-select-category">
            <?php
            foreach($categories as $cat)
            {
            ?>
            <option value="<?= $cat["id"]; ?>"><?= $cat["description"]; ?></option>
            <?php
            }
            ?>
        </select>

        <label class="form-label mt-2" for="">Kalorien</label>
        <div class="input-group">
            <select class="form-select form-select-sm" id="">
                <option value="0">mehr als</option>
                <option value="1">weniger als</option>
                <option value="2">gleich</option>
            </select>
            <input class="form-control form-control-sm" type="number">
        </div>
        
        <label class="form-label mt-2" for="">Allergen</label>
        <select class="form-select form-select-sm" id="filter-select-allergen">
            <option value="0">mit</option>
            <option value="1">ohne</option>
        </select>

        <div class="my-2">
            <?php
            foreach($allergens as $al)
            {
            ?>
            <div class="form-check" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?= $al["description"]; ?>">
                <input class="form-check-input filter-option" name="filter-option" type="checkbox" style="background-image: url('http://localhost:8080/assets/image/icon/allergen/<?= $al["icon"]; ?>');">
            </div>
            <?php
            }
            ?>
        </div>
    </div>

    <div id="filter-recipes">
    Es wurden keine Filter übergeben.
    </div>
</div>