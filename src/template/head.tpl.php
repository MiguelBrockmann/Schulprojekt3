<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="http://localhost:8080/assets/font/Gilroy/gordita.font.css">
        <link rel="stylesheet" href="http://localhost:8080/assets/set/bootstrap-v5/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://localhost:8080/assets/css/app.min.css">
        <link rel="stylesheet" href="http://localhost:8080/assets/css/page.min.css">
        <link rel="stylesheet" href="http://localhost:8080/assets/css/app_mediaquery.min.css">

        <script src="http://localhost:8080/assets/set/jQuery-v3.6.0/jquery.min.js">
        </script>
        <script src="http://localhost:8080/src/js/livesearch.ajax.js">
        </script>
        <script src="http://localhost:8080/src/js/follow.ajax.js">
        </script>
        <script src="http://localhost:8080/src/js/saverecipe.ajax.js">
        </script>

        <link rel="shortcut icon" href="http://localhost:8080/assets/image/icon/favicon.png" type="image/x-icon">

        <title><?= $pagetitle; ?></title>
    </head>
    <body>
        <div id="app">
            <nav id="nav" class="navbar navbar-expand-lg">
                <div class="container-lg">
                    <a class="navbar-brand" href="http://localhost:8080/discover/">
                        <h4 class="m-0">MBEEZY pineapple the fruit dude</h4>
                    </a>

                    <div class="navbar-search px-5">
                        <input id="navbar-search-input" name="app-search" class="px-3 py-2" placeholder="Suche nach Rezepten, Köchen & mehr..." type="text">
                        <div id="search-results">
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="btn-group">
                            <button type="button" class="no-btn" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="navbar-profile">
                                    <img src="http://localhost:8080/assets/image/profile/<?= $user["picture"]; ?>">
                                    <span class="ms-2"><?= $user["prename"]; ?></span>
                                </div>
                            </button>
                            
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="http://localhost:8080/profile/">
                                        <div class="dropdown-profile">
                                            <img src="http://localhost:8080/assets/image/profile/<?= $user["picture"]; ?>">
                                            <div class="ms-2">
                                                <h6 class="m-0"><?= $user["prename"]." ".$user["surname"]; ?></h6>
                                                <span>Dein Profil ansehen</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li><h6 class="dropdown-header">Profil</h6></li>
                                <li>
                                    <a class="dropdown-item" href="http://localhost:8080/profile/">
                                        <img class="me-2" src="http://localhost:8080/assets/image/icon/ui/bar-myprofile.svg">
                                        Mein Profil
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="http://localhost:8080/profile/#recipes">
                                        <img class="me-2" src="http://localhost:8080/assets/image/icon/ui/bar-myrecipes.svg">
                                        Meine Rezepte
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="http://localhost:8080/create/">
                                        <img class="me-2" src="http://localhost:8080/assets/image/icon/ui/bar-create.svg">
                                        Rezept erstellen
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li><h6 class="dropdown-header">Einstellungen</h6></li>
                                <li>
                                    <a class="dropdown-item" href="http://localhost:8080/settings/">
                                        <img class="me-2" src="http://localhost:8080/assets/image/icon/ui/bar-settings.svg">
                                        Profil bearbeiten
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="http://localhost:8080/logout/">
                                        <img class="me-2" src="http://localhost:8080/assets/image/icon/ui/bar-logout.svg">
                                        Abmelden
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            
            <div id="con" class="my-4">
                <div class="container-lg">
                    <div id="bar">
                        <div class="bar-headline my-3">
                            <h4>Entdecken</h4>
                        </div>
                        <ul class="nav nav-pills flex-column mb-auto">
                            <li>
                                <a href="http://localhost:8080/discover/" class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == "discover.php"){echo "bar-active";} ?>">
                                <img src="http://localhost:8080/assets/image/icon/ui/bar-discover.svg" class="me-4">
                                Entdecken</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a href="http://localhost:8080/bestrated/" class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == "bestrated.php"){echo "bar-active";} ?>">
                                <img src="http://localhost:8080/assets/image/icon/ui/bar-rating.svg" class="me-4">
                                Top Bewertung</a>
                            </li> -->
                            <li>
                                <a href="http://localhost:8080/categories/" class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == "categories.php"){echo "bar-active";} ?>">
                                <img src="http://localhost:8080/assets/image/icon/ui/bar-category.svg" class="me-4">
                                Kategorien</a>
                            </li>
                            <li>
                                <a href="http://localhost:8080/filter/" class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == "filter.php"){echo "bar-active";} ?>">
                                <img src="http://localhost:8080/assets/image/icon/ui/bar-filter.svg" class="me-4">
                                Filter</a>
                            </li>
                        </ul>

                        <div class="bar-headline my-3">
                            <h4>Library</h4>
                        </div>
                        <ul class="nav nav-pills flex-column mb-auto">
                            <li>
                                <a href="http://localhost:8080/follows/" class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == "follows.php"){echo "bar-active";} ?>">
                                <img src="http://localhost:8080/assets/image/icon/ui/bar-ifollow.svg" class="me-4">
                                Abos</a>
                            </li>

                            <li>
                                <a href="http://localhost:8080/saved/" class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == "saved.php"){echo "bar-active";} ?>">
                                <img src="http://localhost:8080/assets/image/icon/ui/bar-saved.svg" class="me-4">
                                Gespeichert</a>
                            </li>

                            <li>
                                <a href="http://localhost:8080/profile/#recipes" class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == "profile.php"){echo "bar-active";} ?>">
                                <img src="http://localhost:8080/assets/image/icon/ui/bar-myrecipes.svg" class="me-4">
                                Meine Rezepte</a>
                            </li>
                        </ul>
                    </div>

                    <div id="canvas" class="ms-5">
                        <!-- ### TEMPLATE BEGIN -->