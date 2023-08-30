<div>
    <div class="w3-card-4" style="position:relative;padding:2%;color:white;width:100%;top:-10px">
        <center>
            <h1 style="font-size:3em;">Liste Inscriptions</h1><br>
            <p>Liste de tout les etudiants inscrit</p><br><br>
            <a class="w3-btn w3-transparent w3-border-left w3-border-round w3-border-white w3-text-white w3-xlarge " href="?p=index">Menu principal</a>
        </center>
    </div><br><br>
    <div class="row">
        <?php foreach ($list as $list) : ?>
            <div class="col-md-2">
                <div class="w3-blue" style="height:35vh">
                    <center><br>
                        <h1><?= $list->filiere ?></h1>
                    </center>
                </div>
                <div class="w3-blue w3-container">
                    <center>
                        <h4><a href="<?= $list->filieres ?>" class="w3-btn w3-circle w3-white">+</a></h4>
                    </center>        
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>