<div>
    <div class="w3-container-fluid">
        <div class="w3-row">
            <div class="w3-col l6 w3-container">
                <div class="w3-row"><br><br>
                    <div class="w3-col l4">
                        <?php
                        if ($etudiant->Sexe === 'Male') {
                        ?>
                            <img class="w3-circle w3-card-4" src="<?= App::asset('/piecesJoints/images/img_avatar3.png'); ?>" width="200"><br><br>
                        <?php
                        } else {
                        ?>
                            <img class="w3-circle w3-card-4" src="<?= App::asset('/piecesJoints/images/img_avatar4.png'); ?>" width="200"><br><br>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="w3-col l8"><br>
                        <h2> <?= $etudiant->Nom ?> </h2><br>
                        <h2> <?= $etudiant->Prenom ?> </h2>
                    </div>
                </div><br><br>
                <div class="w3-container">
                    <h2> Filiere : <?= $etudiant->Filiere ?> </h2><br><br>
                    <h2> Numero Téléphone : <?= $etudiant->Numero ?> </h2><br><br>
                    <h2>
                        <a class="w3-btn w3-transparent w3-card-4 w3-text-white w3-xlarge " href="?p=index">Menu principal</a><br><br>
                    </h2>
                </div>
            </div>
            <div class="w3-col l6 w3-container">
                <?php if ($list) {
                ?>
                    <div>
                        <center>
                            <h1> <u> Années : <?= $list[0]->annee ?> </u> </h1>
                        </center>
                    </div><br><br>
                    <?php foreach ($list as $list) : ?>
                        <div class="w3-row">
                            <div class="w3-col l2">
                                <img src="<?= App::asset('/piecesJoints/images/online-course.png'); ?>" width="65" alt="">
                            </div>
                            <div class="w3-col l10">
                                <div class="w3-row">
                                    <div class="w3-col l6">
                                        <h2> Cours : <?= $list->cours ?> </h2>
                                    </div>
                                    <div class="w3-col l6">
                                        <form action='?p=deleteAttribution' method='post'><input type='hidden' name='Aid' value="<?= $list->id ?>"> <input type="hidden" name="idE" id="" value="<?= $_GET['id'] ?>"> <button class='w3-btn w3-red' href="?p=deleteAttribution&id={$list->id}">X</button></form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>