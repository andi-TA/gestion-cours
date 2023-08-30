<div id="b2">
    <div id='attr'>
        <div><br>
            <img src="<?= App::asset('/piecesJoints/images/cropped-2016-05-23.png'); ?>">
            <?php
            if ($errors != null) {
            ?>
                <div class="w3-panel w3-blue w3-display-container">
                    <span onclick="this.parentElement.style.display='none'" style="cursor:pointer;" class="w3-button w3-large w3-display-topright">&times;</span>
                    <h3>Info!</h3>
                    <p><?= $errors ?></p>
                </div>
            <?php } ?>
        </div><br>
        <div>
            <form method="POST">
                <h3> <?= $etudiant->Nom ?> <br> <?= $etudiant->Prenom ?> </h3>
                <?= $form1->input('Aeid', ['type' => 'hidden'], 'id', 'readOnly') ?><br><br>
                <?= $form1->label('Cours') ?><br><br>
                <select class="w3-select" name="Acid" id="sel1">
                    <?php foreach ($cours as $c) : ?>
                        <option value="<?= $c->id ?>"><?= $c->cours ?></option>
                    <?php endforeach; ?>
                </select><br><br>
                <?= $form->label('Années') ?><br><br>
                <select class="w3-select" name="annee" id="sel1">
                    <option value="1er Annee">1er Annee</option>
                    <option value="2eme Annee">2eme Annee</option>
                    <option value="3eme Annee">3eme Annee</option>
                    <option value="4eme Annee">4eme Annee</option>
                    <option value="5eme Annee">5eme Annee</option>
                </select><br><br><br>
                <?= $form1->submit('Attribuer', 'Attribuer', 'but', 'w3-btn w3-green') ?>
                <a class="w3-btn w3-text-white" href="index.php?p=index">Revenir</a>
            </form>
        </div>
    </div>
</div>