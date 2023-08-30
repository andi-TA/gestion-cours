<div>
    <header>
        <nav>
            <ul>
                <li><a href="#home"><b>Gestion | Cours</b></a></li>
                <li class="right"><a href="index.php?p=listeInscriptions" title="liste Inscriptions">listeInscriptions</a></li>
                <li class="right"><a href="index.php?p=AjoutCours" title="Ajouter Cours"> Cours</a></li>
                <li class="right"><a href="index.php?p=AjoutEtudiant" title="Ajouter Etudiant">Etudiant</a></li>
            </ul>
        </nav>
    </header><br><br>
    <div class="container-fluid">
        <div class="row  w3-container">
            <div class="col-md-3 w3-card-4 " style="display:flex;align-items:center;padding-left:5%;">
                <center>
                    <h1><img src="<?= App::asset('/piecesJoints/images/cropped-2016-05-23.png'); ?>" alt=""></h1>
                    <img src="<?= App::asset('/piecesJoints/images/icons8-user-50.png'); ?>" alt="" width="25"><br><br>
                    <button id="etudiant" class="w3-btn w3-white"> Etudiants</button><br><br>
                    <img src="<?= App::asset('/piecesJoints/images/ebook.png'); ?>" alt="" width="25"><br><br>
                    <button id="cours" class="w3-btn w3-white">Cours</button><br><br>
                    <img src="<?= App::asset('/piecesJoints/images/calendar.png'); ?>" alt="" width="25"><br><br>
                    <button id="optionSuple" class="w3-btn w3-white">Option supplémentaire</button><br><br>
                    <a class="" href="index.php?p=logout" title="déconnexion"><img src="<?= App::asset('/piecesJoints/images/icons8-shutdown-64.png'); ?>" alt="" width="50"></a><br><br>
                </center>
            </div>
            <div class="col-md-9">
                <div id="bloc1" class="w3-responsive">
                    <table class="w3-table w3-bordered">
                        <thead>
                            <tr class="w3-transparent">
                                <td>Nom</td>
                                <td>Prenom</td>
                                <td>Sexe</td>
                                <td>Date de naissance et lieu</td>
                                <td>Adresse</td>
                                <td>Numero</td>
                                <td>Filière</td>
                                <td>Editer Etudiants</td>
                                <td>Attribuer Cours</td>
                                <td>Supprimer étudiants</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($etudiants as $etudiant) : ?>
                                <?php
                                echo
                                "<tr>"
                                    . "<td>" . $etudiant->Nom . "</td>"
                                    . "<td>" . $etudiant->Prenom . "</td>"
                                    . "<td>" . $etudiant->Sexe . "</td>"
                                    . "<td>" . $etudiant->DateNaissance . '</br>' . $etudiant->LieuNaissance . "</td>"
                                    . "<td>" . $etudiant->Adresse . "</td>"
                                    . "<td>" . $etudiant->Numero . "</td>"
                                    . "<td>" . $etudiant->Filiere . "</td>"
                                    . "<td><a class='w3-btn w3-blue' href='{$etudiant->Url}' >Edit</a></td>"
                                    . "<td><a class='w3-btn w3-green' href='{$etudiant->Attribution}' >Attr</a></td>"
                                    . "<td><form action='?p=deleteEtudiant' method='post'><input type='hidden' name='id' value='{$etudiant->id}'><button style='padding:10px;' class='w3-btn w3-red' href='?p=deleteEtudiant&id={$etudiant->id}'>Sup</button></form></td>"
                                    . "</tr>";
                                ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div id="bloc2" class="w3-responsive">
                    <table class="w3-table w3-bordered">
                        <thead>
                            <tr>
                                <td>Cours </td>
                                <td>Professeures </td>
                                <td>Editer Cours</td>
                                <td>Supprimer Cours</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cours as $cour) : ?>
                                <?php
                                echo
                                "<tr>"
                                    . "<td>" . $cour->cours . "</td>"
                                    . "<td>" . $cour->Professeur . "</td>"
                                    . "<td><a class='w3-btn w3-blue' href={$cour->Url}>Edit</a></td>"
                                    . "<td><form action='?p=deleteCours' method='post'><input type='hidden' name='id' value='{$cour->id}'><button style='padding:10px;' class='w3-btn w3-red' href='?p=deleteCours&id={$cour->id}'>Sup</button></form></tr>"
                                    . "</tr>"
                                ?>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <div id="bloc3" class="row">
                    <div class="col-md-3">
                        <header class="w3-black w3-card-4" style="position:realtive;padding: 14.7%;width: 100%;text-align: center;font-size: 18px;">
                            <h4>Nombre etudiants</h4>
                        </header>
                        <section class="sec">
                            <?= "<h1 class='count'>" . count($etudiants) . "</h1>"; ?>
                        </section>
                        <footer class="w3-container w3-card-4">
                            <?= "<h2>" . count($etudiants) . ' ' . 'Etudiant' . "</h2>"; ?>
                        </footer>
                    </div>
                    <div class="col-md-3">
                        <header class="w3-black w3-card-4" style="position:realtive;padding: 15%;width: 100%;text-align: center;font-size: 18px;">
                            <h4>Nombre cours</h4>
                        </header>
                        <section class="sec">
                            <?= "<h1 class='count'>" . count($cours) . "</h1>"; ?>
                        </section>
                        <footer class="w3-container w3-card-4">
                            <?= "<h2>" . count($cours) . ' ' . 'Cours' . "</h2>"; ?>
                        </footer>
                    </div>
                    <div class="col-md-3">
                        <header class="w3-black w3-card-4" style="position:realtive;padding: 10%;width: 100%;text-align: center;font-size: 18px;">
                            <h4>Nombres inscription par cours</h4>
                        </header>
                        <section class="sec">
                            <?= "<h1 class='count'>" . count($inscrie) . "</h1>"; ?>
                        </section>
                        <footer class="w3-container w3-card-4">
                            <?= "<h2>" . count($inscrie) . ' ' . 'inscription' . "</h2>"; ?>
                        </footer>
                    </div>
                    <div class="col-md-3">
                        <header class="w3-black w3-card-4" style="position:realtive;padding: 15%;width: 100%;text-align: center;font-size: 18px;">
                            <h4>Etudiants | Cours</h4>
                        </header><br><br>
                        <section class="w3-container">
                            <ol type="circle">
                                <li>Cours n’ayant pas d'étudiants <br><br><br></li>
                                <li>les étudiants n’ayant pas de cours <br><br></li>
                                <p> Voir... </p>
                            </ol>
                        </section><br>
                        <footer class="w3-container w3-teal">
                            <a href="?p=etm" style='padding:6%' class="w3-btn w3-text-white"> Etudiant </a>
                            <a href="?p=cm" style='padding:6%' class="w3-btn w3-text-white"> Cours </a>
                        </footer>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>