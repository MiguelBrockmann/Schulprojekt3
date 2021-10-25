<div id="page-login">
    <div class="p-4">
        <h4 class="page-headline text-center">Wir haben dir einen Code an deine E-Mail-Adresse geschickt</h4>
        <form action="http://localhost:8080/verify-verification/" method="POST">
            <div>
                <label for="verify-step-code" class="form-label mb-0">Code</label>
                <input type="text" class="form-control" id="verify-step-code" name="verify-step-code" autofocus>
            </div>

            <input type="hidden" name="verify-step-token" value="<?= $_GET["token"]; ?>">
            
            <button type="submit" class="btn btn-primary mt-3 d-block w-100" name="verify-step-submit">Verifizieren</button> 
        </form>
    </div>
</div>