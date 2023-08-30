<div class="container">
    <div class="row" id="b2">
        <div class="col-md-6" id="lg">
            <?php
            if ($errors) {
            ?>
                <div class="w3-panel w3-blue w3-display-container">
                    <span onclick="this.parentElement.style.display='none'" style="cursor:pointer;" class="w3-button w3-large w3-display-topright">&times;</span>
                    <h3>Info!</h3>
                    <p><?= $errors ?></p>
                </div>
            <?php } ?>
            <a href="index.php?p=login" style="text-decoration:none;"><img src="<?= App::asset('/piecesJoints/images/cropped-2016-05-23.png'); ?>" alt="logo/GSI"></a>
        </div>
        <div class="col-md-6">
            <form action="" method="POST">
                <div>
                    <h3> <u>Inscription</u> </h3>
                </div>
                <?= $form->label('Nom'); ?><br><br>
                <?= $form->input('Inom'); ?><br><br>
                <?= $form->label('Prenom'); ?><br><br>
                <?= $form->input('Iprenom'); ?><br><br>
                <?= $form->label('E-mail'); ?><br><br>
                <?= $form->input('Imail', ['type' => 'email']); ?><br><br>
                <?= $form->label('Mot de pass'); ?><br><br>
                <?= $form->input('Ipass', ['type' => 'password'],null,8); ?><br><br>
                <?= $form->label('confirmer mot de passe'); ?><br><br>
                <?= $form->input('Icpass', ['type' => 'password'],null,8); ?><br><br>
                <?= $form->submit('Valider', 'Valider', 'but'); ?><br>
            </form><br>
        </div>
    </div>
</div>