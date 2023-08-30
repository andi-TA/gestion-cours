 <div id="bl">
     <div class="container w3-card-4 test w3-round" style="width:auto;min-width:35%;">
         <div class="w3-container">
             <h1> <u> Ajout Cours</u></h1>
             <?php
                if ($errors) {
                ?>
                 <div class="w3-panel w3-blue w3-display-container">
                     <span onclick="this.parentElement.style.display='none'" style="cursor:pointer;" class="w3-button w3-large w3-display-topright">&times;</span>
                     <h3> Enregistrement effectuer </h3>
                 </div>
             <?php } ?>
         </div>
         <form action="" method="POST"><br>
             <?= $form->label('Cours') ?><br><br>
             <?= $form->input('Ccours') ?><br><br>
             <?= $form->label('Professeur') ?><br><br>
             <?= $form->input('Cprof') ?><br><br>
             <?= $form->submit('Valider', 'Avalider', null, 'w3-btn w3-green') ?>
             <a href="index.php?p=index" class="w3-btn w3-text-white">Revenir</a>
         </form><br><br>
     </div>
 </div>