<div>
    <div class = "w3-card-4" style="position:relative;padding:4%;color:white;width:100%;top:-10px">
        <center>
            <h1 style="font-size:3em;">
               Les cours n’ayant pas d'étudiants
            </h1><br><br>
            <a class="w3-btn w3-transparent w3-border w3-border-white w3-text-white w3-xlarge " href="?p=index">Menu principale</a>
        </center>
    </div>
    <div class="w3-responsive"><br>
        <table class="w3-table w3-bordered">
            <thead>
                <tr>
                    <td>Cours</td>
                    <td>Professeur</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($nom as $nom) : ?>
                    <?php foreach ($nom as $cours) : ?>
                        <tr>
                            <td>
                                <h3 class="w3-serif w3-text-white"> <?= $cours->cours ?> </h3>
                            </td>
                            <td>
                                <h3 class="w3-serif w3-text-white"> <?= $cours->Professeur ?> </h3>
                            </td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>