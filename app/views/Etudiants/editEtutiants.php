<?php
if ($errors)
    echo "<h1>" . $errors . "</h1>";
?>
<div id="deco">
    <h1 class="w3-jumbo">Mise à jours Etudiant.</h1>
</div>
<div class="w3-container">
    <form method="post"><br>
        <div class="w3-row">
            <div class="w3-col l6 w3-center ">
                <br><br>
                <?= $form->label('Nom'); ?><br><br>
                <?= $form->input('Anom', 'text', 'Nom'); ?><br><br>
                <?= $form->label('Prenom'); ?><br><br>
                <?= $form->input('Aprenom', 'text', ''); ?><br><br>
                <?= $form->label('Date et lieu de naissance'); ?><br><br>
                <?= $form->input('Adn', ['type' => 'date'], 'text', ''); ?>
                <?= $form->input('Aln'); ?><br><br>
                <br><br>
            </div>
            <div class="w3-col l6 w3-center w3-card-4"><br>
                <?= $form->label('Sexe'); ?><br><br>
                <?= $form->label('Male'); ?>
                <?= $form->input('sexe', ['type' => 'radio'], 'Male'); ?>
                <?= $form->label('Femelle'); ?>
                <?= $form->input('sexe', ['type' => 'radio'], 'Femelle'); ?><br><br>
                <?= $form->label('Numero'); ?><br><br>
                <?= $form->input('Anumero',['type'=>'text'],'Numero'); ?><br><br>
                <?= $form->label('Adresse'); ?><br><br>
                <?= $form->input('Aadresse', 'text', ''); ?><br><br>
                <?= $form->label('Filière'); ?><br><br>
                <?= $form->input('Afiliere', 'text', ''); ?><br><br>
                <?= $form->submit('Valider', 'Valider', "but", 'w3-btn w3-green'); ?>
                <a href="index.php?p=index" class="w3-btn w3-blue">Revenir</a><br><br>
            </div>
        </div>
    </form>
</div>