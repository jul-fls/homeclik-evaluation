<?php
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
            if($date_rdv>$now){            
                require "../commons/dbconfig.php";
                $sql = 'UPDATE clients SET nom = ?, prenom = ?, code_pays = ?, telephone_portable = ?, telephone_fixe = ?, num_voie = ?, nom_voie = ?, num_apt = ?, code_postal = ?, ville = ? WHERE id = ?;';
                $stmt = mysqli_prepare($conn,$sql);
                mysqli_stmt_bind_param($stmt, 'sssssisissi',$sanitized_nom,$sanitized_prenom,$sanitized_code_pays,$sanitized_telephone_portable,$sanitized_telephone_fixe,$sanitized_num_voie,$sanitized_nom_voie,$sanitized_num_apt,$sanitized_code_postal,$sanitized_ville,$sanitized_id_client);
                $status = mysqli_stmt_execute($stmt);
                if($conn->affected_rows==0||$conn->affected_rows==1){
                    $status_code = 1;
                    $sql1 = 'UPDATE rdv SET date = ? WHERE id_client = ?';
                    $stmt1 = mysqli_prepare($conn,$sql1);
                    mysqli_stmt_bind_param($stmt1, 'si',$sanitized_date_rdv,$sanitized_id_client);
                    $status1 = mysqli_stmt_execute($stmt1);
                    $result1 = mysqli_stmt_get_result($stmt1);
                    if($conn->affected_rows==0){
                        $status_code = 2;
                    }else if($conn->affected_rows==1){
                        $status_code = 3;
                    }else{
                        $status_code = 4;
                    }
                }else{
                    $status_code = 5;
                }
            }else{
                $status_code = 6;
            }
        }
        header('Content-Length: '.strlen($status_code));
            header('Content-type: application/json');
            echo json_encode(array("status_code"=>$status_code));
        die();
    }else if($_SERVER['REQUEST_METHOD']=='GET'){
        if(isset($_GET['id'])){
            $sanitized_id_client = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
            require "../commons/dbconfig.php";
            $sql2 = "SELECT clients.id, clients.date_creation, clients.nom, clients.prenom, clients.telephone_portable, clients.telephone_fixe, clients.code_pays, clients.num_voie, clients.nom_voie, clients.num_apt, clients.code_postal, clients.ville, rdv.date FROM clients LEFT JOIN rdv ON rdv.id_client = clients.id WHERE clients.id = ? LIMIT 1;";
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
                        $date_creation = $row1['date_creation'];
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
            $data = array(
                'date_creation'=>$date_creation,
                'nom' => $nom,
                'prenom' => $prenom,
                'telephone_portable' => $telephone_portable,
                'telephone_fixe' => $telephone_fixe,
                'code_pays' => $code_pays,
                'num_voie' => $num_voie,
                'nom_voie' => $nom_voie,
                'num_apt' => $num_apt,
                'code_postal' => $code_postal,
                'ville' => $ville,
                'date_rdv' => $date,
                'status_code' => 1,
            );
            $response = json_encode($data);
            header('Content-Length: '.strlen($response));
            header('Content-type: application/json');
            echo $response;
        }
    }else{
        //ne rien faire, méthode invalide
        die();
    }
?>