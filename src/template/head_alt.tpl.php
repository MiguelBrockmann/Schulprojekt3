<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <link rel="stylesheet" href="http://localhost:8080/assets/font/GTWalsheimPro/gtwalsheimpro.font.css">
        <link rel="stylesheet" href="http://localhost:8080/assets/set/bootstrap-v5/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://localhost:8080/assets/css/app.min.css">

        <link rel="shortcut icon" href="http://localhost:8080/assets/image/favicon.png" type="image/x-icon">

        <title><?= $pagetitle; ?></title>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-lg">
                <a class="navbar-brand" href="http://localhost:8080/discover/">
                    <!-- <img src="http://localhost:8080/assets/image/logo/logo_white.png" alt="" height="18" class="d-inline-block"> -->
                    <h4 class="m-0 p-0" style="font-weight: 600; letter-spacing: -1px;">Chefkoch.de</h4>
                </a>

                <?php
                if(isset($_SESSION["USER_SESSION"]))
                {
                ?>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" href="http://localhost:8080/discover/">Rezepte</a>
                        <a class="nav-link" href="#">Top 10</a>
                        <a class="nav-link" href="http://localhost:8080/cookbook/">Mein Kochbuch</a>
                    </div>
                </div>

                <div class="d-flex">
                    <div id="app-navbar-search-box">
                        <form action="http://localhost:8080/search/" method="GET">
                            <div id="app-navbar-search" class="input-group">
                                <input type="text" class="form-control py-1 fs-7" id="navbar-search" name="q" placeholder="Suchen">
                                <button type="submit" class="btn btn-primary py-1" id="navbar-search-submit" value="1" name="qs">
                                    <img src="http://localhost:8080/assets/image/icon/ui/search.svg">
                                </button>
                            </div>
                        </form>
                    </div>

                    <form action="http://localhost:8080/write-recipe/" class="ms-3">
                        <button type="submit" class="btn btn-primary py-1 fs-7">Rezept erstellen</button>
                    </form>

                    <div id="app-navbar-menu" class="btn-group ms-3">
                        <button type="button" data-bs-toggle="dropdown" aria-expanded="false" class="px-0">
                            <img src="http://localhost:8080/assets/image/icon/ui/menu.svg">
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><h6 class="dropdown-header">Meine Küche</h6></li>
                            <li><a class="dropdown-item" href="http://localhost:8080/profile/">Mein Profil</a></li>
                            <li><a class="dropdown-item" href="http://localhost:8080/cookbook/">Mein Kochbuch</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="http://localhost:8080/settings/">Einstellungen</a></li>
                            <li><a class="dropdown-item" href="http://localhost:8080/logout/">Abmelden</a></li>
                        </ul>
                    </div>
                </div>
                <?php
                }
                else
                {
                ?>
                <div class="d-flex">
                    <a href="http://localhost:8080/signup/" class="btn btn-secondary py-1">Registrieren</a>
                    <a href="http://localhost:8080/login/" class="btn btn-primary py-1 ms-2">Anmelden</a>
                </div>
                <?php
                }
                ?>
            </div>
        </nav>

        <div id="app-content">