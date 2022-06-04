<?php
    $title = "Modifier un client";
    require "commons/header.php";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['nom'])&&isset($_POST['prenom'])&&isset($_POST['code_pays'])&&isset($_POST['telephone_portable'])&&isset($_POST['telephone_fixe'])&&isset($_POST['num_voie'])&&isset($_POST['nom_voie'])&&isset($_POST['num_apt'])&&isset($_POST['code_postal'])&&isset($_POST['ville'])&&isset($_POST['date_rdv'])&&isset($_POST['id_client'])){
            $sanitized_nom = filter_var($_POST['nom'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $sanitized_prenom = filter_var($_POST['prenom'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $sanitized_code_pays = filter_var($_POST['code_pays'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $sanitized_telephone_portable = filter_var($_POST['telephone_portable'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $sanitized_telephone_fixe = filter_var($_POST['telephone_fixe'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $sanitized_num_voie = filter_var($_POST['num_voie'],FILTER_SANITIZE_NUMBER_INT);
            $sanitized_nom_voie = filter_var($_POST['nom_voie'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $sanitized_num_apt = filter_var($_POST['num_apt'],FILTER_SANITIZE_NUMBER_INT) ?: 0;
            $sanitized_code_postal = filter_var($_POST['code_postal'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $sanitized_ville = filter_var($_POST['ville'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $sanitized_date_rdv = filter_var($_POST['date_rdv'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $sanitized_id_client = filter_var($_POST['id_client'],FILTER_SANITIZE_NUMBER_INT);
            $date_rdv = new DateTime($sanitized_date_rdv);
            $now = new DateTime();
            if($date_rdv<$now){
                echo '<h1><img src="resources/bad.png" width="5%" height="auto" /> La date n\'est pas dans le futur, merci de bien vouloir réessayer !</h1>';
                die();
            }
            
            require "commons/dbconfig.php";
            $sql = 'UPDATE clients SET nom = ?, prenom = ?, code_pays =?, telephone_portable = ?, telephone_fixe = ?, num_voie = ?, nom_voie = ?, num_apt = ?, code_postal = ?, ville = ? WHERE id = ?';
            $stmt = mysqli_prepare($conn,$sql);
            mysqli_stmt_bind_param($stmt, 'sssssisissi',$sanitized_nom,$sanitized_prenom,$sanitized_code_pays,$sanitized_telephone_portable,$sanitized_telephone_fixe,$sanitized_num_voie,$sanitized_nom_voie,$sanitized_num_apt,$sanitized_code_postal,$sanitized_ville,$sanitized_id_client);
            $status = mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $inserted_id_client = mysqli_insert_id($conn);
            if($conn->affected_rows==0||$conn->affected_rows==1){
                echo '<script>Swal.fire({title: "Client ajouté",text: "Le client a bien été mis à jour",icon: "success",confirmButtonText: "OK"}).then(function() {window.location.href = "index.php";});</script>';
                $sql1 = 'UPDATE rdv SET date = ? WHERE id_client = ?';
                $stmt1 = mysqli_prepare($conn,$sql1);
                mysqli_stmt_bind_param($stmt1, 'si',$sanitized_date_rdv,$sanitized_id_client);
                $status1 = mysqli_stmt_execute($stmt1);
                $result1 = mysqli_stmt_get_result($stmt1);
                if($conn->affected_rows==0||$conn->affected_rows==1){
                    echo '<script>Swal.fire({title: "Client mis à jour",text: "Le rdv du client a bien été mis à jour",icon: "success",confirmButtonText: "OK"}).then(function() {window.location.href = "index.php";});</script>';
                }else{
                    echo 'error='.mysqli_error($conn);
                    echo '<script>Swal.fire({title: "Erreur",text: "Un problème est survenu, merci de réessayer !",icon: "error",confirmButtonText: "OK"}).then(function() {window.location.href = "modifier_un_client.php";});</script>';
                }
            }else{
                echo 'error='.mysqli_error($conn);
                echo '<script>Swal.fire({title: "Erreur",text: "Un problème est survenu, merci de réessayer !",icon: "error",confirmButtonText: "OK"}).then(function() {window.location.href = "modifier_un_client.php";});</script>';
            }
        }
        die();
    }else if($_SERVER['REQUEST_METHOD']=='GET'){
        if(isset($_GET['id'])){
            $sanitized_id_client = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
            require "commons/dbconfig.php";
            $sql2 = "SELECT clients.id, clients.nom, clients.prenom, clients.telephone_portable, clients.telephone_fixe, clients.code_pays, clients.num_voie, clients.nom_voie, clients.num_apt, clients.code_postal, clients.ville, rdv.date FROM clients LEFT JOIN rdv ON rdv.id_client = clients.id WHERE clients.id = ?;";
            $stmt2 = mysqli_prepare($conn,$sql2);
            mysqli_stmt_bind_param($stmt2, 'i',$sanitized_id_client);
            $status2 = mysqli_stmt_execute($stmt2);
            $result2 = mysqli_stmt_get_result($stmt2);
            if(!$result2){
                die("échec de la lecture des clients"); 
            }
            if(mysqli_num_rows($result2)>0){
                while ($row1 = mysqli_fetch_assoc($result2)){
                    $nom = $row1['nom'];
                    $prenom = $row1['prenom'];
                    $telephone_portable = $row1['telephone_portable'];
                    $telephone_fixe = $row1['telephone_fixe'];
                    $code_pays = $row1['code_pays'];
                    $num_voie = $row1['num_voie'];
                    $nom_voie = $row1['nom_voie'];
                    $num_apt = $row1['num_apt'];
                    $code_postal = $row1['code_postal'];
                    $ville = $row1['ville'];
                    $date_rdv = $row1['date'];
                    if($row1['date'] != null){
                        $date = (new DateTime($row1['date']))->format('Y-m-d');
                    }else{
                        $date = "";
                    }
                }
            }
        }
        //execute le reste du code de la page
    }else{
        //ne rien faire, méthode invalide
        die();
    }
?>
<br/>

<form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
    <input type="hidden" name="id_client" value="<?=$sanitized_id_client?>"/>
    <table id="modifier_un_client" class="w3-table-all full">
        <tbody>
            <tr>
                <th>Nom</th>
                <td>
                    <input id="nom_client" class="full" type="text" name="nom" value="<?=$nom?>" required/>
                </td>
            </tr>
            <tr>
                <th>Prénom</th>
                <td>
                    <input id="prenom_client" class="full" type="text" name="prenom" value="<?=$prenom?>" required/>
                </td>
            </tr>
            <tr>
                <th>Code pays</th>
                <td>
                    <select id="code_pays" class="full" name="code_pays" required>
                        <optgroup label="A">
                            <option value="AF">Afghanistan</option>
                            <option value="ZA">Afrique du Sud</option>
                            <option value="AL">Albanie</option>
                            <option value="DZ">Algérie</option>
                            <option value="DE">Allemagne</option>
                            <option value="MK">Ancienne République yougoslave de Macédoine</option>
                            <option value="AD">Andorre</option>
                            <option value="AO">Angola</option>
                            <option value="AI">Anguilla</option>
                            <option value="AQ">Antarctique</option>
                            <option value="AG">Antigua-et-Barbuda</option>
                            <option value="AN">Antilles néerlandaises</option>
                            <option value="SA">Arabie saoudite</option>
                            <option value="AR">Argentine</option>
                            <option value="AM">Arménie</option>
                            <option value="AW">Aruba</option>
                            <option value="AU">Australie</option>
                            <option value="AT">Autriche</option>
                            <option value="AZ">Azerbaïdjan</option>
                        </optgroup>
                        <optgroup label="B">
                            <option value="BS">Bahamas</option>
                            <option value="BH">Bahreïn</option>
                            <option value="BD">Bangladesh</option>
                            <option value="BB">Barbade</option>
                            <option value="BE">Belgique</option>
                            <option value="BZ">Belize</option>
                            <option value="BJ">Bénin</option>
                            <option value="BM">Bermudes</option>
                            <option value="BT">Bhoutan</option>
                            <option value="BY">Biélorussie</option>
                            <option value="BO">Bolivie</option>
                            <option value="BA">Bosnie-et-Herzégovine</option>
                            <option value="BW">Botswana</option>
                            <option value="BR">Brésil</option>
                            <option value="BN">Brunei Darussalam</option>
                            <option value="BG">Bulgarie</option>
                            <option value="BF">Burkina Faso</option>
                            <option value="BI">Burundi</option>
                        </optgroup>
                        <optgroup label="C">
                            <option value="KH">Cambodge</option>
                            <option value="CM">Cameroun</option>
                            <option value="CA">Canada</option>
                            <option value="CV">Cap-Vert</option>
                            <option value="CL">Chili</option>
                            <option value="CN">Chine</option>
                            <option value="CY">Chypre</option>
                            <option value="CO">Colombie</option>
                            <option value="KM">Comores</option>
                            <option value="CG">Congo</option>
                            <option value="CR">Costa Rica</option>
                            <option value="CI">Côte d'Ivoire</option>
                            <option value="HR">Croatie</option>
                            <option value="CU">Cuba</option>
                        </optgroup>
                        <optgroup label="D">
                            <option value="DK">Danemark</option>
                            <option value="DJ">Djibouti</option>
                            <option value="DM">Dominique</option>
                        </optgroup>
                        <optgroup label="E">
                            <option value="EG">Égypte</option>
                            <option value="SV">El Salvador</option>
                            <option value="AE">Émirats arabes unis</option>
                            <option value="EC">Équateur</option>
                            <option value="ER">Érythrée</option>
                            <option value="ES">Espagne</option>
                            <option value="EE">Estonie</option>
                            <option value="FM">États fédérés de Micronésie</option>
                            <option value="US">États-Unis</option>
                            <option value="ET">Éthiopie</option>
                        </optgroup>
                        <optgroup label="F">
                            <option value="FJ">Fidji</option>
                            <option value="FI">Finlande</option>
                            <option value="FR">France</option>
                        </optgroup>
                        <optgroup label="G">
                            <option value="GA">Gabon</option>
                            <option value="GM">Gambie</option>
                            <option value="GE">Géorgie</option>
                            <option value="GS">Géorgie du Sud-et-les Îles Sandwich du Sud</option>
                            <option value="GH">Ghana</option>
                            <option value="GI">Gibraltar</option>
                            <option value="GR">Grèce</option>
                            <option value="GD">Grenade</option>
                            <option value="GL">Groenland</option>
                            <option value="GP">Guadeloupe</option>
                            <option value="GU">Guam</option>
                            <option value="GT">Guatemala</option>
                            <option value="GN">Guinée</option>
                            <option value="GQ">Guinée équatoriale</option>
                            <option value="GW">Guinée-Bissau</option>
                            <option value="GY">Guyane</option>
                            <option value="GF">Guyane française</option>
                        </optgroup>
                        <optgroup label="H">
                            <option value="HT">Haïti</option>
                            <option value="HN">Honduras</option>
                            <option value="HK">Hong Kong</option>
                            <option value="HU">Hongrie</option>
                        </optgroup>
                        <optgroup label="I">
                            <option value="BV">Ile Bouvet</option>
                            <option value="CX">Ile Christmas</option>
                            <option value="NF">Île Norfolk</option>
                            <option value="PN">Île Pitcairn</option>
                            <option value="AX">Iles Aland</option>
                            <option value="KY">Iles Cayman</option>
                            <option value="CC">Iles Cocos (Keeling)</option>
                            <option value="CK">Iles Cook</option>
                            <option value="FO">Îles Féroé</option>
                            <option value="HM">Îles Heard-et-MacDonald</option>
                            <option value="FK">Îles Malouines</option>
                            <option value="MP">Îles Mariannes du Nord</option>
                            <option value="MH">Îles Marshall</option>
                            <option value="UM">Îles mineures éloignées des États-Unis</option>
                            <option value="SB">Îles Salomon</option>
                            <option value="TC">Îles Turques-et-Caïques</option>
                            <option value="VG">Îles Vierges britanniques</option>
                            <option value="VI">Îles Vierges des États-Unis</option>
                            <option value="IN">Inde</option>
                            <option value="ID">Indonésie</option>
                            <option value="IQ">Iraq</option>
                            <option value="IE">Irlande</option>
                            <option value="IS">Islande</option>
                            <option value="IL">Israël</option>
                            <option value="IT">Italie</option>
                        </optgroup>
                        <optgroup label="J">
                            <option value="LY">Jamahiriya arabe libyenne</option>
                            <option value="JM">Jamaïque</option>
                            <option value="JP">Japon</option>
                            <option value="JO">Jordanie</option>
                        </optgroup>
                        <optgroup label="K">
                            <option value="KZ">Kazakhstan</option>
                            <option value="KE">Kenya</option>
                            <option value="KG">Kirghizistan</option>
                            <option value="KI">Kiribati</option>
                            <option value="KW">Koweït</option>
                        </optgroup>
                        <optgroup label="L">
                            <option value="LS">Lesotho</option>
                            <option value="LV">Lettonie</option>
                            <option value="LB">Liban</option>
                            <option value="LR">Libéria</option>
                            <option value="LI">Liechtenstein</option>
                            <option value="LT">Lituanie</option>
                            <option value="LU">Luxembourg</option>
                        </optgroup>
                        <optgroup label="M">
                            <option value="MO">Macao</option>
                            <option value="MG">Madagascar</option>
                            <option value="MY">Malaisie</option>
                            <option value="MW">Malawi</option>
                            <option value="MV">Maldives</option>
                            <option value="ML">Mali</option>
                            <option value="MT">Malte</option>
                            <option value="MA">Maroc</option>
                            <option value="MQ">Martinique</option>
                            <option value="MU">Maurice</option>
                            <option value="MR">Mauritanie</option>
                            <option value="YT">Mayotte</option>
                            <option value="MX">Mexique</option>
                            <option value="MC">Monaco</option>
                            <option value="MN">Mongolie</option>
                            <option value="MS">Montserrat</option>
                            <option value="MZ">Mozambique</option>
                            <option value="MM">Myanmar</option>
                        </optgroup>
                        <optgroup label="N">
                            <option value="NA">Namibie</option>
                            <option value="NR">Nauru</option>
                            <option value="NP">Népal</option>
                            <option value="NI">Nicaragua</option>
                            <option value="NE">Niger</option>
                            <option value="NG">Nigéria</option>
                            <option value="NU">Niué</option>
                            <option value="NO">Norvège</option>
                            <option value="NC">Nouvelle-Calédonie</option>
                            <option value="NZ">Nouvelle-Zélande</option>
                        </optgroup>
                        <optgroup label="O">
                            <option value="OM">Oman</option>
                            <option value="UG">Ouganda</option>
                            <option value="UZ">Ouzbékistan</option>
                        </optgroup>
                        <optgroup label="P">
                            <option value="PK">Pakistan</option>
                            <option value="PW">Palaos</option>
                            <option value="PA">Panama</option>
                            <option value="PG">Papouasie-Nouvelle-Guinée</option>
                            <option value="PY">Paraguay</option>
                            <option value="NL">Pays-Bas</option>
                            <option value="PE">Pérou</option>
                            <option value="PH">Philippines</option>
                            <option value="PL">Pologne</option>
                            <option value="PF">Polynésie française</option>
                            <option value="PR">Porto Rico</option>
                            <option value="PT">Portugal</option>
                            <option value="TW">Province chinoise de Taiwan</option>
                        </optgroup>
                        <optgroup label="Q">
                            <option value="QA">Qatar</option>
                        </optgroup>
                        <optgroup label="R">
                            <option value="SY">République arabe syrienne</option>
                            <option value="CF">République centrafricaine</option>
                            <option value="KR">République de Corée</option>
                            <option value="MD">République de Moldavie</option>
                            <option value="CD">République démocratique du Congo</option>
                            <option value="DO">République dominicaine</option>
                            <option value="IR">République islamique d'Iran</option>
                            <option value="KP">République populaire démocratique de Corée</option>
                            <option value="LA">République Populaire du Laos</option>
                            <option value="CZ">République tchèque</option>
                            <option value="TZ">République-Unie de Tanzanie</option>
                            <option value="RE">Réunion</option>
                            <option value="RO">Roumanie</option>
                            <option value="GB">Royaume-Uni</option>
                            <option value="RU">Russie</option>
                            <option value="RW">Rwanda</option>
                        </optgroup>
                        <optgroup label="S">
                            <option value="EH">Sahara occidental</option>
                            <option value="KN">Saint-Christophe-et-Niévès</option>
                            <option value="SM">Saint-Marin</option>
                            <option value="PM">Saint-Pierre-et-Miquelon</option>
                            <option value="VA">Saint-Siège (Cité du Vatican)</option>
                            <option value="VC">Saint-Vincent-et-les Grenadines</option>
                            <option value="SH">Sainte-Hélène</option>
                            <option value="LC">Sainte-Lucie</option>
                            <option value="WS">Samoa</option>
                            <option value="AS">Samoa américaines</option>
                            <option value="ST">Sao Tomé-et-Principe</option>
                            <option value="SN">Sénégal</option>
                            <option value="CS">Serbie-et-Monténégro</option>
                            <option value="SC">Seychelles</option>
                            <option value="SL">Sierra Leone</option>
                            <option value="SG">Singapour</option>
                            <option value="SK">Slovaquie</option>
                            <option value="SI">Slovénie</option>
                            <option value="SO">Somalie</option>
                            <option value="SD">Soudan</option>
                            <option value="LK">Sri Lanka</option>
                            <option value="SE">Suède</option>
                            <option value="CH">Suisse</option>
                            <option value="SR">Suriname</option>
                            <option value="SJ">Svalbard et Jan Mayen</option>
                            <option value="SZ">Swaziland</option>
                        </optgroup>
                        <optgroup label="T">
                            <option value="TJ">Tadjikistan</option>
                            <option value="TD">Tchad</option>
                            <option value="IO">Territoire britannique de l'océan Indien</option>
                            <option value="TF">Territoire Francais du Sud</option>
                            <option value="PS">Territoires palestiniens occupés</option>
                            <option value="TH">Thaïlande</option>
                            <option value="TL">Timor oriental</option>
                            <option value="TG">Togo</option>
                            <option value="TK">Tokelau</option>
                            <option value="TO">Tonga</option>
                            <option value="TT">Trinité-et-Tobago</option>
                            <option value="TN">Tunisie</option>
                            <option value="TM">Turkménistan</option>
                            <option value="TR">Turquie</option>
                            <option value="TV">Tuvalu</option>
                        </optgroup>
                        <optgroup label="U">
                            <option value="UA">Ukraine</option>
                            <option value="UY">Uruguay</option>
                        </optgroup>
                        <optgroup label="V">
                            <option value="VU">Vanuatu</option>
                            <option value="VE">Vénézuéla</option>
                            <option value="VN">Vietnam</option>
                        </optgroup>
                        <optgroup label="W">
                            <option value="WF">Wallis-et-Futuna</option>
                        </optgroup>
                        <optgroup label="Y">
                            <option value="YE">Yémen</option>
                        </optgroup>
                        <optgroup label="Z">
                            <option value="ZM">Zambie</option>
                            <option value="ZW">Zimbabwe</option>
                        </optgroup>
                    </select>
                    <script>
                        document.getElementById('code_pays').value = '<?=$code_pays; ?>';
                    </script>
                </td>
            </tr>
            <tr>
                <th>N° de téléphone Portable</th>
                <td>
                    <input id="telephone" class="full" type="tel" name="telephone_portable" pattern="[0-9]{10}" value="<?=$telephone_portable?>" required>
                </td>
            </tr>
            <tr>
                <th>N° de téléphone fixe</th>
                <td>
                    <input id="telephone_fixe" class="full" type="tel" name="telephone_fixe" pattern="[0-9]{10}" value="<?=$telephone_fixe?>" required>
                </td>
            </tr>
            <tr>
                <th>Numéro de voie</th>
                <td>
                    <input id="num_voie" class="full" type="number" name="num_voie" value="<?=$num_voie?>" required>
                </td>
            </tr>
            <tr>
                <th>Nom de voie</th>
                <td>
                    <input id="nom_voie" class="full" type="text" name="nom_voie" value="<?=$nom_voie?>" required>
                </td>
            </tr>
            <tr>
                <th>Numéro d'appartement</th>
                <td>
                    <input id="num_apt" class="full" type="number" name="num_apt" value="<?=$num_apt?>" required>
                </td>
            </tr>
            <tr>
                <th>Code postal</th>
                <td>
                    <input id="code_postal" class="full" type="text" name="code_postal" pattern="[0-9]{5}" value="<?=$code_postal?>" required>
                </td>
            </tr>
            <tr>
                <th>Ville</th>
                <td>
                    <input id="ville" class="full" type="text" name="ville" value="<?=$ville?>" required>
                </td>
            </tr>
            <tr>
                <th>Date de rendez-vous</th>
                <td>
                    <input id="date_rdv" class="full" type="date" name="date_rdv" value="<?=$date_rdv?>" required>
                </td>
            </tr>
        </tbody>
    </table>
    <br/>
    <input type="submit" class="w3-button w3-light-green full" name="submit" value="Enregistrer le client ainsi que son rdv dans la base de données"/>
</form>
<a href="index.php">
    <button class="w3-button w3-red full">Retour à l'accueil</button>
</a>
<?php require_once "commons/footer.php"; ?>