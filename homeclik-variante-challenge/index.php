<?php 
    $title = "Accueil";
    require_once "commons/header.php"; 
?>
<div class="w3-center">
    <h2 id="title">Liste des clients</h2>
</div>
<div class="w3-center">
    <button class="w3-button w3-green w3-round-large" onclick="show_ajouter_client_modal();">Créer un nouveau client</button>
</div>
<div id="ajouter_client_modal" class="w3-modal" style="display: none;">
    <div class="w3-modal-content w3-animate-top w3-card-4" style="width: 1080px;">
        <header class="w3-container w3-red"> 
            <span onclick="document.getElementById('ajouter_client_modal').style.display='none';" class="w3-button w3-display-topright">&times;</span>
            <h2>Ajouter un client</h2>
        </header>
        <div class="w3-container">
            <form id="ajouter_client_form">
                <table id="ajouter_un_client" class="w3-table-all full">
                    <tbody>
                        <tr>
                            <th>Nom</th>
                            <td>
                                <input id="nom_client" class="full" type="text" name="nom" required/>
                            </td>
                        </tr>
                        <tr>
                            <th>Prénom</th>
                            <td>
                                <input id="prenom_client" class="full" type="text" name="prenom" required/>
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
                                        <option value="FR" selected>France</option>
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
                            </td>
                        </tr>
                        <tr>
                            <th>N° de téléphone Portable</th>
                            <td>
                                <input id="telephone" class="full" type="tel" name="telephone_portable" pattern="[0-9]{10}" required/>
                            </td>
                        </tr>
                        <tr>
                            <th>N° de téléphone fixe</th>
                            <td>
                                <input id="telephone_fixe" class="full" type="tel" name="telephone_fixe" pattern="[0-9]{10}" required/>
                            </td>
                        </tr>
                        <tr>
                            <th>Numéro de voie</th>
                            <td>
                                <input id="num_voie" class="full" type="number" name="num_voie" required/>
                            </td>
                        </tr>
                        <tr>
                            <th>Nom de voie</th>
                            <td>
                                <input id="nom_voie" class="full" type="text" name="nom_voie" required/>
                            </td>
                        </tr>
                        <tr>
                            <th>Numéro d'appartement</th>
                            <td>
                                <input id="num_apt" class="full" type="number" name="num_apt" required/>
                            </td>
                        </tr>
                        <tr>
                            <th>Code postal</th>
                            <td>
                                <input id="code_postal" class="full" type="text" name="code_postal" required/>
                            </td>
                        </tr>
                        <tr>
                            <th>Ville</th>
                            <td>
                                <input id="ville" class="full" type="text" name="ville" required/>
                            </td>
                        </tr>
                        <tr>
                            <th>Date de rendez-vous</th>
                            <td>
                                <input id="date_rdv" class="full" type="date" name="date_rdv" value="<?php echo date('Y-m-d', strtotime('tomorrow')); ?>" required/>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br/>
                <input type="submit" class="w3-button w3-light-green full" name="submit" value="Enregistrer le client ainsi que son rdv dans la base de données"/>
            </form>
        </div>
    </div>
</div>
<div id="modifier_client_modal" class="w3-modal" style="display: none;">
    <div class="w3-modal-content w3-animate-top w3-card-4" style="width: 1080px;">
        <header class="w3-container w3-red"> 
            <span onclick="document.getElementById('modifier_client_modal').style.display='none';" class="w3-button w3-display-topright">&times;</span>
            <h2>Modifier un client</h2>
        </header>
        <div class="w3-container">
            <form id="modifier_client_form">
                <input type="hidden" id="id_client_edit" name="id_client"/>
                <table id="modifier_un_client" class="w3-table-all full">
                    <tbody>
                        <tr>
                            <th>Nom</th>
                            <td>
                                <input id="nom_client_edit" class="full" type="text" name="nom" required/>
                            </td>
                        </tr>
                        <tr>
                            <th>Prénom</th>
                            <td>
                                <input id="prenom_client_edit" class="full" type="text" name="prenom" required/>
                            </td>
                        </tr>
                        <tr>
                            <th>Code pays</th>
                            <td>
                                <select id="code_pays_edit" class="full" name="code_pays" required>
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
                            </td>
                        </tr>
                        <tr>
                            <th>N° de téléphone Portable</th>
                            <td>
                                <input id="telephone_portable_edit" class="full" type="tel" name="telephone_portable" pattern="[0-9]{10}" required>
                            </td>
                        </tr>
                        <tr>
                            <th>N° de téléphone fixe</th>
                            <td>
                                <input id="telephone_fixe_edit" class="full" type="tel" name="telephone_fixe" pattern="[0-9]{10}" required>
                            </td>
                        </tr>
                        <tr>
                            <th>Numéro de voie</th>
                            <td>
                                <input id="num_voie_edit" class="full" type="number" name="num_voie" required>
                            </td>
                        </tr>
                        <tr>
                            <th>Nom de voie</th>
                            <td>
                                <input id="nom_voie_edit" class="full" type="text" name="nom_voie" required>
                            </td>
                        </tr>
                        <tr>
                            <th>Numéro d'appartement</th>
                            <td>
                                <input id="num_apt_edit" class="full" type="number" name="num_apt" required>
                            </td>
                        </tr>
                        <tr>
                            <th>Code postal</th>
                            <td>
                                <input id="code_postal_edit" class="full" type="text" name="code_postal" pattern="[0-9]{5}" required>
                            </td>
                        </tr>
                        <tr>
                            <th>Ville</th>
                            <td>
                                <input id="ville_edit" class="full" type="text" name="ville" required>
                            </td>
                        </tr>
                        <tr>
                            <th>Date de rendez-vous</th>
                            <td>
                                <input id="date_rdv_edit" class="full" type="date" name="date_rdv" required>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br/>
                <input type="submit" class="w3-button w3-light-green full" name="submit" value="Enregistrer le client ainsi que son rdv dans la base de données"/>
            </form>
        </div>
    </div>
</div>
<div id="supprimer_client_confirmation_modal" class="w3-modal" style="display: none;">
    <div class="w3-modal-content w3-animate-top w3-card-4">
        <header class="w3-container w3-red"> 
            <span onclick="document.getElementById('supprimer_client_confirmation_modal').style.display='none'" class="w3-button w3-display-topright">&times;</span>
            <h2>Etes-vous sûr de vouloir supprimer cet client ?</h2>
        </header>
        <div class="w3-container">
            <p>Cela entrainera aussi la suppression de tous les rdv passés et futurs pour cet client</p>
            <a id="supprimer_client_button" class="w3-red w3-center w3-button" style="width: 100%;" href="#">Confirmer la suppression</a>
        </div>
    </div>
</div>
<script>
    function show_suppression_client_confirmation_modal(id){
        document.getElementById('supprimer_client_button').setAttribute('onclick', 'supprimer_client(' + id+ ')');
        document.getElementById('supprimer_client_confirmation_modal').style.display='block';
        return false;
    }
    function supprimer_client(id){
        var formData2 = new FormData();
        formData2.append('id', id);
        var xhr2 = new XMLHttpRequest();
        xhr2.open("POST", "ajax_scripts/supprimer_un_client.php", true);
        xhr2.onreadystatechange = function() {
            if (xhr2.readyState == 4 && xhr2.status == 200) {
                if(JSON.parse(xhr2.responseText)['status_code'] == 1){
                    document.getElementById('supprimer_client_confirmation_modal').style.display='none';
                    Swal.fire(
                        {
                            title: "Client et RDV supprimés",
                            text: "Le client ainsi que son rdv ont bien été supprimés",
                            icon: "success",
                            confirmButtonText: "OK"
                        }
                    ).then(
                        function() {
                            window.location.href = "index.php";
                        }
                    );
                }else{
                    Swal.fire(
                        {
                            title: "Erreur",
                            text: "Une erreur est survenue lors de la suppression du client et du rdv, code d'erreur : "+JSON.parse(xhr2.responseText)['status_code'],
                            icon: "error",
                            confirmButtonText: "OK"
                        }
                    );
                }
            }
        };
        xhr2.send(formData2);
        return false;
    }
    function show_ajouter_client_modal(){
        document.getElementById('ajouter_client_modal').style.display='block';
        return false;
    }
    document.getElementById("ajouter_client_form").addEventListener("submit", function(e){
        e.preventDefault();
        var formData = new FormData(document.getElementById("ajouter_client_form"));
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax_scripts/ajouter_un_client.php", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                if(JSON.parse(xhr.responseText)['status_code'] == 4){
                    document.getElementById('ajouter_client_modal').style.display='none';
                    document.getElementById('ajouter_client_form').reset();
                    Swal.fire(
                        {
                            title: "Client et RDV ajoutés",
                            text: "Le client ainsi que son rdv ont bien été ajoutés",
                            icon: "success",
                            confirmButtonText: "OK"
                        }
                    ).then(
                        function() {
                            window.location.href = "index.php";
                        }
                    );
                }else{
                    Swal.fire(
                        {
                            title: "Erreur",
                            text: "Une erreur est survenue lors de l'ajout du client et du rdv, code d'erreur : "+JSON.parse(xhr.responseText)['status_code'],
                            icon: "error",
                            confirmButtonText: "OK"
                        }
                    );
                }
            }
        };
        xhr.send(formData);
    });
    function show_modifier_client_modal(id){
        document.getElementById('modifier_client_modal').style.display='block';
        get_client_data(id);
        return false;
    }
    function get_client_data(id){
        var xhr3 = new XMLHttpRequest();
        xhr3.open("GET", "ajax_scripts/modifier_un_client.php?id="+id, true);
        xhr3.onreadystatechange = function() {
            if (xhr3.readyState == 4 && xhr3.status == 200) {
                if(JSON.parse(xhr3.responseText)['status_code'] == 1){
                    var client = JSON.parse(xhr3.responseText);
                    document.getElementById('id_client_edit').value = id;
                    document.getElementById('nom_client_edit').value = client['nom'];
                    document.getElementById('prenom_client_edit').value = client['prenom'];
                    document.getElementById('telephone_portable_edit').value = client['telephone_portable'];
                    document.getElementById('telephone_fixe_edit').value = client['telephone_fixe'];
                    document.getElementById('code_pays_edit').value = client['code_pays'];
                    document.getElementById('num_voie_edit').value = client['num_voie'];
                    document.getElementById('nom_voie_edit').value = client['nom_voie'];
                    document.getElementById('num_apt_edit').value = client['num_apt'];
                    document.getElementById('code_postal_edit').value = client['code_postal'];
                    document.getElementById('ville_edit').value = client['ville'];
                    document.getElementById('date_rdv_edit').value = client['date_rdv'];
                }
                else{
                    Swal.fire(
                        {
                            title: "Erreur",
                            text: "Une erreur est survenue lors de la récupération des données du client, code d'erreur : "+JSON.parse(xhr3.responseText)['status_code'],
                            icon: "error",
                            confirmButtonText: "OK"
                        }
                    );
                }
            }
        };
        xhr3.send();
        return false;
    }
    document.getElementById("modifier_client_form").addEventListener("submit", function(e){
        e.preventDefault();
        var formData4 = new FormData(document.getElementById("modifier_client_form"));
        var xhr4 = new XMLHttpRequest();
        xhr4.open("POST", "ajax_scripts/modifier_un_client.php", true);
        xhr4.onreadystatechange = function() {
            if (xhr4.readyState == 4 && xhr4.status == 200) {
                if(JSON.parse(xhr4.responseText)['status_code'] != 5 && JSON.parse(xhr4.responseText)['status_code'] != 6){
                    document.getElementById('modifier_client_modal').style.display='none';
                    document.getElementById('modifier_client_form').reset();
                    Swal.fire(
                        {
                            title: "Client et RDV modifiés",
                            text: "Le client ainsi que son rdv ont bien été modifiés",
                            icon: "success",
                            confirmButtonText: "OK"
                        }
                    ).then(
                        function() {
                            window.location.href = "index.php";
                        }
                    );
                }else{
                    Swal.fire(
                        {
                            title: "Erreur",
                            text: "Une erreur est survenue lors de la modification du client et du rdv, code d'erreur : "+JSON.parse(xhr4.responseText)['status_code'],
                            icon: "error",
                            confirmButtonText: "OK"
                        }
                    );
                }
            }
        };
        xhr4.send(formData4);
    });
</script>
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
                echo '<td><a href="#" onclick="show_modifier_client_modal('.$row['id'].');"><i class="fa fa-pencil fa-2x"></i></a><br/><a href="#" onclick="show_suppression_client_confirmation_modal('.$row['id'].');"><i class="fa fa-trash fa-2x" style="color: darkred"></i></a></td>'."\n";
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