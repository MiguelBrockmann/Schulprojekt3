<div id="page-login">
    <div class="p-4">
        <h4 class="page-headline text-center">Anmelden</h4>
        <form action="http://localhost:8080/verify-login/" method="POST">
            <div>
                <label for="verify-login-email" class="form-label mb-0">E-Mail</label>
                <input type="email" class="form-control" id="verify-login-email" name="verify-login-email" value="<?= $getemail; ?>" <?= $getautofocus1; ?>>
            </div>
            
            <div class="mt-3">
                <label for="verify-login-pass" class="form-label mb-0">Passwort</label>
                <input type="password" class="form-control" id="verify-login-pass" name="verify-login-pass" <?= $getautofocus2; ?>>
            </div>
            
            <button type="submit" class="btn btn-primary mt-3 d-block w-100" name="verify-login-submit">Anmelden</button> 
        </form>

        <a href="http://localhost:8080/signup/" class="mt-3 no-link d-block">Konto erstellen</a>
    </div>
</div>