<div id="page-follows" class="d-flex">
    <div id="follow-recipes" class="me-3">
        <?php
        foreach($recipes as $r)
        {
            ?>
            <div id="page-profile-feed-timeline">
                <div class="timeline-head">
                    <div>
                        <img class="me-2" src="http://localhost:8080/assets/image/profile/<?= $r["picture"]; ?>">
                        <div>
                            <h6><i><?= $r["prename"]; ?></i> hat ein neues Rezept erstellt</h6>
                            <span><?= date("d.m.Y", $r["timestamp"]); ?> um <?= date("H:i", $r["timestamp"]); ?> Uhr</span>
                        </div>
                    </div>
                </div>

                <div class="timeline-body">
                    <p><?= $r["title"]; ?></p>
                    <a href="http://localhost:8080/recipe/?id=<?= $r["id"]; ?>">
                        <img src="http://localhost:8080/assets/image/recipe/<?= $r["image"]; ?>">
                    </a>
                </div>
            </div>
            <?php
        }
        ?>
    </div>

    <div id="follow-profiles">
        <div class="px-4 py-3">
            <h5>Du folgst</h5>

            <div>
            <?php
            if($follow->count2($_SESSION["USER_SESSION"]) > 0)
            {
                foreach($follow->get_followed($_SESSION["USER_SESSION"]) as $followed)
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
                <p class="mb-0">Du folgst noch niemanden</p>
                <?php
            }
            ?>
            </div>
        </div>
    </div>
</div>