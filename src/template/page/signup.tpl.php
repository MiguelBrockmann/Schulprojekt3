<div id="page-signup">
    <div class="p-4">
        <h4 class="page-headline text-center">Registrieren</h4>
        <form action="http://localhost:8080/verify-signup/" method="POST">
            <div class="row">
                <div class="col">
                    <label for="verify-signup-prename" class="form-label mb-0">Vorname</label>
                    <input type="text" class="form-control" id="verify-signup-prename" name="verify-signup-prename" autofocus>
                </div>

                <div class="col">
                    <label for="verify-signup-surname" class="form-label mb-0">Nachname</label>
                    <input type="text" class="form-control" id="verify-signup-surname" name="verify-signup-surname">
                </div>
            </div>
            
            <div class="mt-3">
                <label for="verify-signup-username" class="form-label mb-0">Benutzername</label>
                <input type="text" class="form-control" id="verify-signup-username" name="verify-signup-username">
            </div>
        
            <div class="mt-3">
                <label for="verify-signup-email" class="form-label mb-0">E-Mail</label>
                <input type="email" class="form-control" id="verify-signup-email" name="verify-signup-email">
            </div>

            <div class="mt-3">
                <label for="verify-signup-pass" class="form-label mb-0">Passwort</label>
                <input type="password" class="form-control" id="verify-signup-pass" name="verify-signup-pass">
            </div>

            <div class="form-check form-switch mt-3">
                <input class="form-check-input" type="checkbox" id="verify-signup-terms" name="verify-signup-terms">
                <label class="form-check-label" for="verify-signup-terms">Ich akzeptiere die AGB</label>
            </div>
            
            <button type="submit" class="btn btn-primary mt-3 d-block w-100" name="verify-signup-submit">Registrieren</button>
        </form>

        <a href="http://localhost:8080/login/" class="mt-3 no-link d-block">Du hast bereits ein Konto?</a>
    </div>
</div>