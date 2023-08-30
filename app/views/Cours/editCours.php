<div id="bl">
    <div class="container w3-card-4 test w3-round" style="width:auto;min-width:35%;">
        <div class="w3-container">
            <h1><u> Mise à jours Cours</u></h1>
        </div><br>
        <form action="" method="POST"><br>
            <?= $form->label('Cours') ?><br><br>
            <?= $form->input('Ccours', null, 'cours') ?><br><br>
            <?= $form->label('Professeur') ?><br><br>
            <?= $form->input('Cprof', null, 'Professeur') ?><br><br><br>
            <?= $form->submit('Valider', 'Avalider', null, 'w3-btn w3-green') ?>
            <a href="index.php?p=index" class="w3-btn w3-text-white">Revenir</a>
        </form><br><br>
    </div>
</div>