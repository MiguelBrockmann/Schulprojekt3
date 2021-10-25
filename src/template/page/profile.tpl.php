<div id="page-profile">
    <div id="page-profile-head" class="py-3">
        <img class="d-block mx-auto" src="http://localhost:8080/assets/image/profile/<?= $userinfo["picture"]; ?>">
        <h3 class="mt-2 mb-0"><?= $userinfo["prename"]." ".$userinfo["surname"]; ?></h3>
        <span>@<?= $userinfo["username"]; ?></span>
    </div>

    <div id="page-profile-feed" class="d-flex mt-3">
        <div id="page-profile-feed-info">
            <div class="py-3 px-4">
                <h5>Über <?= $userinfo["prename"]; ?></h5>
                <div class="my-3">
                    <p><?= $userinfo["bio"]; ?></p>
                </div>
                
                <div id="member-since" class="mt-3">
                    <p>Beigetreten: <?= format_ger(date($userinfo["timestamp"]))." ".date("Y", $userinfo["timestamp"]); ?></p>
                </div>
            </div>

            <div class="py-3 px-4 mt-3">
                <div class="follower-info">
                    <span class="me-1 py-1"><a class="no-link" href="#recipes"><?= $recipe->count($userinfo["id"]); ?> <i>Rezepte</i></a></span>
                    <span id="follower" class="me-1 py-1 no-link" data-bs-toggle="modal" data-bs-target="#profile-follower-list"><?= $follow->count($userinfo["id"]); ?> <i>Follower</i></span>
                    <span id="followed" class="ms-1 py-1 no-link" data-bs-toggle="modal" data-bs-target="#profile-followed-list"><?= $follow->count2($userinfo["id"]); ?> <i>gefolgt</i></span>
                </div>
                
                <?php
                if($follow->follows($id))
                {
                    if($userinfo["id"] <> $_SESSION["USER_SESSION"])
                    {
                    ?>
                    <a id="following" fllwid="<?= $userinfo["id"]; ?>" fllwrid="<?= $_SESSION["USER_SESSION"]; ?>" class="follow-btn btn btn-secondary">Entfolgen</a>
                    <?php
                    }
                }
                else
                {
                    if($userinfo["id"] <> $_SESSION["USER_SESSION"])
                    {
                    ?>
                    <a id="following" fllwid="<?= $userinfo["id"]; ?>" fllwrid="<?= $_SESSION["USER_SESSION"]; ?>" class="follow-btn btn btn-green">Folgen</a>
                    <?php
                    }
                }
                ?>
            </div>
        </div>
        
        <div id="page-profile-feed-recipes" class="ms-3">
            <div id="recipes" class="p-3">
                <h5>Beiträge</h5>
            </div>
        
            <?php
            if($recipe->count($id) > 0)
            {
                $lu = $profile_user->get_recipes($userinfo["id"]);
                foreach($lu as $l)
                {
                ?>
                <div id="page-profile-feed-timeline" class="mt-3">
                    <div class="timeline-head">
                        <div>
                            <img class="me-2" src="http://localhost:8080/assets/image/profile/<?= $userinfo["picture"]; ?>">
                            <div>
                                <h6><i><?= $userinfo["prename"]; ?></i> hat ein neues Rezept erstellt</h6>
                                <span><?= date("d.m.Y", $l["timestamp"]); ?> um <?= date("H:i", $l["timestamp"]); ?> Uhr</span>
                            </div>
                        </div>
                    </div>

                    <div class="timeline-body">
                        <p><?= $l["title"]; ?></p>
                        <a href="http://localhost:8080/recipe/?id=<?= $l["id"]; ?>">
                            <img src="http://localhost:8080/assets/image/recipe/<?= $l["image"]; ?>">
                        </a>
                    </div>
                </div>
                <?php
                }
            }
            else
            {
            ?>
            <div class="mt-3 p-3">
                <p class="m-3"><?= $userinfo["prename"]; ?> hat noch keine Rezepte erstellt</p>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<div class="modal fade" id="profile-follower-list" tabindex="-1" aria-labelledby="profile-follower-list-title" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header px-4">
                <h5 class="modal-title page-headline" id="profile-follower-list-title">Follower von <?= $userinfo["prename"]; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Schließen"></button>
            </div>
            <div class="modal-body px-4 py-0">
                <?php
                if($follow->count($userinfo["id"]) > 0)
                {
                    foreach($follow->get_follower($userinfo["id"]) as $follower)
                    {
                        ?>
                        <div class="profile-follower">
                            <a class="no-link" href="http://localhost:8080/profile/?id=<?= $follower["id"]; ?>">
                                <div class="profile-follower">
                                    <img class="me-1" src="http://localhost:8080/assets/image/profile/<?= $follower["picture"]; ?>">    
                                    <?= $follower["prename"]." ".$follower["surname"]; ?>
                                </div>
                            </a>
                        </div>
                        <?php
                    }
                }
                else
                {
                    ?>
                    <p class="text-center mb-0"><?= $userinfo["prename"]; ?> hat noch keine Follower</p>
                    <?php
                }
                ?>
            </div>
            <div class="modal-footer px-4">
                <button type="button" class="btn btn-black" data-bs-dismiss="modal">Okay</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="profile-followed-list" tabindex="-1" aria-labelledby="profile-followed-list-title" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header px-4">
                <h5 class="modal-title page-headline" id="profile-followed-list-title"><?= $userinfo["prename"]; ?> folgt</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Schließen"></button>
            </div>
            <div class="modal-body px-4 py-0">
                <?php
                if($follow->count2($userinfo["id"]) > 0)
                {
                    foreach($follow->get_followed($userinfo["id"]) as $followed)
                    {
                        ?>
                        <div class="profile-follower">
                            <a class="no-link" href="http://localhost:8080/profile/?id=<?= $followed["id"]; ?>">
                                <div class="profile-follower">
                                    <img class="me-1" src="http://localhost:8080/assets/image/profile/<?= $followed["picture"]; ?>">    
                                    <?= $followed["prename"]." ".$followed["surname"]; ?>
                                </div>
                            </a>
                        </div>
                        <?php
                    }
                }
                else
                {
                    ?>
                    <p class="text-center mb-0"><?= $userinfo["prename"]; ?> hat noch niemandem gefolgt</p>
                    <?php
                }
                ?>
            </div>
            <div class="modal-footer px-4">
                <button type="button" class="btn btn-black" data-bs-dismiss="modal">Okay</button>
            </div>
        </div>
    </div>
</div>