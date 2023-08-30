<div id="b1">
    <div><br>
        <img src="<?= App::asset('/piecesJoints/images/cropped-2016-05-23.png'); ?>">
        <?php
        if ($errors) {
        ?>
            <div class="w3-panel w3-red w3-display-container">
                <span onclick="this.parentElement.style.display='none'" style="cursor: pointer;" class="w3-button w3-large w3-display-topright">&times;</span><br>
                <h4>Notice!</h4>
                <p><?= $errors ?></p>
            </div>
        <?php
        }
        ?>
    </div><br>
    <div>
        <form method="POST">
            <?= $form->label('E-mail') ?><br><br>
            <?= $form->input('Lmail', ['type' => 'email']) ?><br><br>
            <?= $form->label('Mot de passe') ?><br><br>
            <?= $form->input('Lpass', ['type' => 'password'], null, 8) ?><br><br>
            <?= $form->submit('Connexion', 'Connexion', 'but') ?>
        </form>
    </div>
    <div><br>
        <p>Pas de compt ? Veuillez vous <a href="index.php?p=administration.inscription">inscrire.</a> </hp>
    </div><br>
</div>