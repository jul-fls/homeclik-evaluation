<?php 
    $title = "Accueil";
    require_once "commons/header.php"; 
?>
<div class="w3-center">
    <h2 id="title">Liste des clients</h2>
</div>
<div class="w3-center">
    <button class="w3-button w3-green w3-round-large" onclick="window.location.href='ajouter_un_client.php'">Créer un nouveau client</button>
</div>
<br/>
<table class="w3-table-all" id="tableau-liste-clients">
    <thead>
        <tr class="w3-blue">
            <th>N° de client</th>
            <th>Date de création</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>N° de téléphone portable</th>
            <th>N° de téléphone fixe</th>
            <th>Pays</th>
            <th>N° de voie</th>
            <th>Nom de voie</th>
            <th>N° d'appartement</th>
            <th>Code postal</th>
            <th>Ville</th>
            <th>Date de rendez-vous</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php
        function mb_ucfirst($string, $encoding){
            $firstChar = mb_substr($string, 0, 1, $encoding);
            $then = mb_substr($string, 1, null, $encoding);
            return mb_strtoupper($firstChar, $encoding) . $then;
        }
        require("commons/dbconfig.php");
        $sql = "SELECT clients.id, clients.date_creation, clients.nom, clients.prenom, clients.telephone_portable, clients.telephone_fixe, clients.code_pays, clients.num_voie, clients.nom_voie, clients.num_apt, clients.code_postal, clients.ville, rdv.date FROM clients LEFT JOIN rdv ON rdv.id_client = clients.id;";
        $stmt = mysqli_prepare($conn,$sql);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if(!$result){
            die("échec de la lecture des clients"); 
        }
        if(mysqli_num_rows($result)>0){
            while ($row = mysqli_fetch_assoc($result)){
                echo '<tr>'."\n";
                echo '<td>'.$row['id'].'</td>'."\n";
                echo '<td>'.date("d/m/Y", strtotime($row['date_creation'])).'</td>'."\n";
                echo '<td>'.mb_strtoupper($row['nom']).'</td>'."\n";
                echo '<td>'.mb_ucfirst($row['prenom'],'UTF-8').'</td>'."\n";
                echo '<td>'.$row['telephone_portable'].'</td>'."\n";
                echo '<td>'.$row['telephone_fixe'].'</td>'."\n";
                echo '<td>'.locale_get_display_region('sl-Latn-'.$row['code_pays'].'-nedis', 'fr').'</td>'."\n";
                echo '<td>'.$row['num_voie'].'</td>'."\n";
                echo '<td>'.$row['nom_voie'].'</td>'."\n";
                echo '<td>'.$row['num_apt'].'</td>'."\n";
                echo '<td>'.$row['code_postal'].'</td>'."\n";
                echo '<td>'.$row['ville'].'</td>'."\n";
                if($row['date'] != null){
                    $date = new DateTime($row['date']);
                    echo '<td>'.$date->format('d/m/Y').'</td>'."\n";
                }else{
                    echo '<td>Aucun rendez-vous</td>'."\n";
                }
                echo '<td><a href="modifier_un_client.php?id='.$row['id'].'"><i class="fa fa-pencil fa-2x"></i></a><br/><a href="supprimer_un_client.php?id='.$row['id'].'"><i class="fa fa-trash fa-2x" style="color: darkred"></i></a></td>'."\n";
                echo '</tr>'."\n";
            }
        }
    ?>
    </tbody>
</table>
<script>
    $nb_clients = <?=mysqli_num_rows($result)?>;
    if($nb_clients==1){
        document.getElementById('title').innerHTML = 'Liste de l\'unique client';
    }else if($nb_clients>1){
        document.getElementById('title').innerHTML = 'Liste des <b>'+$nb_clients+'</b> clients';
    }else{
        document.getElementById('title').innerHTML = 'Aucun client';
        document.getElementById('tableau-liste-clients').style.display = 'none';
    }
</script>
<?php require_once "commons/footer.php"; ?>