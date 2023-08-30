<div id="deco" class="w3-container">
    <h1 class="w3-xxlarge">Ajout étudiant</h1>
</div>
<div class="w3-container">
    <form method="post"><br>
        <div class="w3-row">
            <div class="w3-col l6 w3-center ">
                <br><br>
                <?= $form->label('Nom'); ?><br><br>
                <?= $form->input('Anom', 'text', 'Nom'); ?><br><br>
                <?= $form->label('Prenom'); ?><br><br>
                <?= $form->input('Aprenom', 'text', 'Prenom'); ?><br><br>
                <?= $form->label('Date et lieu de naissance'); ?><br><br>
                <?= $form->input('Adn', ['type' => 'date'], 'DateNaissance'); ?>
                <?= $form->input('Aln', 'text', 'LieuNaissance'); ?><br><br>

                <?php
                if ($errors) {
                ?>
                <center>
                    <div class="w3-panel w3-blue w3-display-container" style="width:75%;">
                        <span onclick="this.parentElement.style.display='none'" style="cursor:pointer;" class="w3-button w3-large w3-display-topright">&times;</span>
                        <h3>Info!</h3>
                        <p><?= $errors ?></p>
                    </div>
                </center>
                <?php } ?>
            </div>
            <div class="w3-col l6 w3-center w3-card-4"><br>
                <?= $form->label('Sexe'); ?><br><br>
                <?= $form->label('Male'); ?>
                <?= $form->input('sexe', ['type' => 'radio'], 'Male'); ?>
                <?= $form->label('Femelle'); ?>
                <?= $form->input('sexe', ['type' => 'radio'], 'Femelle'); ?><br><br>
                <?= $form->label('Numero Tel',); ?><br><br>
                <?= $form->input('Anumero', ['type' => 'text'], 'Numero'); ?><br><br>
                <?= $form->label('Adresse'); ?><br><br>
                <?= $form->input('Aadresse', 'text', 'Adresse'); ?><br><br>
                <?= $form->label('Filière'); ?><br><br>
                <?= $form->input('Afiliere', 'text', 'Filiere'); ?><br><br>
                <?= $form->submit('Valider', 'Valider', "but", 'w3-btn w3-green'); ?>
                <a href="index.php?p=index" class="w3-btn w3-blue">Revenir</a><br><br>
            </div>
        </div>
    </form>
</div>