<div id="app-settings">
    <div>
        <h4 class="page-headline">Einstellungen</h4>
        <div class="row">
            <div class="col">
                <h5 class="mt-4">Kontoeinstellungen</h5>

                <form action="http://localhost:8080/verify-settings/" method="POST">
                    <div class="mt-3">
                        <label for="app-settings-prename" class="form-label">Vorname</label>
                        <input type="text" class="form-control" id="app-settings-prename" name="app-settings-prename" value="<?= $userdata["prename"]; ?>">
                    </div>

                    <div class="mt-3">
                        <label for="app-settings-surname" class="form-label">Nachname</label>
                        <input type="text" class="form-control" id="app-settings-surname" name="app-settings-surname" value="<?= $userdata["surname"]; ?>">
                    </div>

                    <button type="submit" class="btn btn-black mt-3" name="app-settings-submit">Aktualisieren</button>
                </form>
            </div>

            <div class="col">
                <h5 class="mt-4">Biographie</h5>

                <form action="http://localhost:8080/verify-settings/" method="POST">
                    <div class="mt-3">
                        <label for="app-settings-bio" class="form-label">Biographie</label>
                        <textarea class="form-control" id="app-settings-bio" name="app-settings-bio" rows="4"><?= $userdata["bio"]; ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-black mt-3" name="app-settings-bio-submit">Aktualisieren</button>
                </form>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col">
                <h5 class="mt-4">Passwort ändern</h5>

                <form action="http://localhost:8080/verify-settings/" method="POST">
                    <div class="mt-3">
                        <label for="app-settings-pass-passold" class="form-label">Altes Passwort</label>
                        <input type="password" class="form-control" id="app-settings-pass-passold" name="app-settings-pass-passold">
                    </div>

                    <div class="mt-3">
                        <label for="app-settings-pass-pass1" class="form-label">Neues Passwort</label>
                        <input type="password" class="form-control" id="app-settings-pass-pass1" name="app-settings-pass-pass1">
                    </div>

                    <div class="mt-3">
                        <label for="app-settings-pass-pass2" class="form-label">Neues Passwort erneut</label>
                        <input type="password" class="form-control" id="app-settings-pass-pass2" name="app-settings-pass-pass2">
                    </div>

                    <button type="submit" class="btn btn-black mt-3" name="app-settings-pass-submit">Aktualisieren</button>
                </form>
            </div>

            <div class="col">
                <h5 class="mt-4">Profilbild</h5>

                <form action="http://localhost:8080/verify-settings/" method="POST">
                    <div class="mt-3">
                        <label for="app-settings-image" class="form-label">Profilbild</label>
                        <input type="file" class="form-control" id="app-settings-image" name="app-settings-image">
                    </div>

                    <button type="submit" class="btn btn-black mt-3" name="app-settings-image-submit">Aktualisieren</button>
                </form>
            </div>
        </div>

        <hr>

        <div>
            <button class="btn btn-black d-block mb-3" type="button" data-bs-toggle="modal" data-bs-target="#settings-profile-data">Deine personenbezogenen Daten</button>
            <button class="btn btn-red d-block" type="button" data-bs-toggle="modal" data-bs-target="#settings-delete-profile">Profil löschen</button>
        </div>
    </div>
</div>

<div class="modal fade" id="settings-delete-profile" tabindex="-1" aria-labelledby="settings-delete-profile-title" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header px-4">
                <h5 class="modal-title page-headline" id="settings-delete-profile-title">Profil löschen?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Schließen"></button>
            </div>
            <div class="modal-body px-4 py-0">
                Durch das Löschen deines Profils werden sämtliche personenbezogende Daten von dir und alle deine Rezepte entgültig gelöscht.<br/>
                Die Aktion kann nicht rückgängig gemacht werden.<br/>
                Bist du dir sicher?<br/>
            </div>
            <div class="modal-footer px-4">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abbrechen</button>
                <a type="button" class="btn btn-red" href="http://localhost:8080/verify-suicide/?verify=true">Entgültig löschen</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="settings-profile-data" tabindex="-1" aria-labelledby="settings-profile-data" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header px-4">
                <h5 class="modal-title page-headline" id="settings-profile-data">Deine personenbezogenen Daten</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Schließen"></button>
            </div>
            <div class="modal-body px-4 py-0 user-data-overview">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Benutzername:</td>
                            <td><?= $userdata["username"]; ?></td>
                        </tr>
                        <tr>
                            <td>Vorname:</td>
                            <td><?= $userdata["prename"]; ?></td>
                        </tr>
                        <tr>
                            <td>Nachname:</td>
                            <td><?= $userdata["surname"]; ?></td>
                        </tr>
                        <tr>
                            <td>E-Mail-Adresse:</td>
                            <td><?= $userdata["email"]; ?></td>
                        </tr>
                        <tr>
                            <td>Aktuelle Biographie:</td>
                            <td><?= $userdata["bio"]; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer px-4">
                <button type="button" class="btn btn-black" data-bs-dismiss="modal">Okay</button>
            </div>
        </div>
    </div>
</div>