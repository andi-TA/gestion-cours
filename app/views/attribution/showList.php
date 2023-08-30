<div>
    <div>
        <a class="w3-btn w3-transparent w3-border w3-border-round w3-border-white w3-text-white w3-xlarge " href="?p=index">Menu principal</a><br><br>
        <table id="tab">
            <thead>
                <tr>
                    <td>Nom</td>
                    <td>Prenom</td>
                    <td>Adresse</td>
                    <td>Numero</td>
                    <td>Filière</td>
                    <td>List Cours</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($list as $list) : ?>
                    <?php
                    echo
                    "<tr>"
                        . "<td>" . $list->Nom . "</td>"
                        . "<td>" . $list->Prenom . "</td>"
                        . "<td>" . $list->Adresse . "</td>"
                        . "<td>" . $list->Numero . "</td>"
                        . "<td>" . $list->Filiere . "</td>"
                        . "<td><a class='w3-btn w3-blue' href='?p=Lc&id={$list->id}' >cours</a></td>"
                        . "</tr>"
                    ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</div>