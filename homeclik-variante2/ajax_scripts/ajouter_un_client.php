<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['nom'])&&isset($_POST['prenom'])&&isset($_POST['code_pays'])&&isset($_POST['telephone_portable'])&&isset($_POST['telephone_fixe'])&&isset($_POST['num_voie'])&&isset($_POST['nom_voie'])&&isset($_POST['num_apt'])&&isset($_POST['code_postal'])&&isset($_POST['ville'])&&isset($_POST['date_rdv'])){
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
            $date_rdv = new DateTime($sanitized_date_rdv);
            $now = new DateTime();
            if($date_rdv>$now){
                require "../commons/dbconfig.php";
                $sql = 'INSERT IGNORE INTO clients (nom,prenom,code_pays,telephone_portable,telephone_fixe,num_voie,nom_voie,num_apt,code_postal,ville) VALUES(?,?,?,?,?,?,?,?,?,?)';
                $stmt = mysqli_prepare($conn,$sql);
                mysqli_stmt_bind_param($stmt, 'sssssisiss',$sanitized_nom,$sanitized_prenom,$sanitized_code_pays,$sanitized_telephone_portable,$sanitized_telephone_fixe,$sanitized_num_voie,$sanitized_nom_voie,$sanitized_num_apt,$sanitized_code_postal,$sanitized_ville);
                $status = mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $inserted_id_client = mysqli_insert_id($conn);
                if($conn->affected_rows==0){
                    $status_code = 1;
                }else if($conn->affected_rows==1){
                    $status_code = 2;
                    $sql1 = 'INSERT INTO rdv (id_client,date) VALUES(?,?)';
                    $stmt1 = mysqli_prepare($conn,$sql1);
                    mysqli_stmt_bind_param($stmt1, 'is',$inserted_id_client,$sanitized_date_rdv);
                    $status1 = mysqli_stmt_execute($stmt1);
                    $result1 = mysqli_stmt_get_result($stmt1);
                    if($conn->affected_rows==0){
                        $status_code = 3;
                    }else if($conn->affected_rows==1){
                        $status_code = 4;
                    }else{
                        $status_code = 5;
                    }
                }else{
                    $status_code = 6;
                }
            }else{
                $status_code = 0;
            }
            header('Content-Length: '.strlen($status_code));
            header('Content-type: application/json');
            echo json_encode(array("status_code"=>$status_code));
        }
        die();
    }else{
        //ne rien faire, méthode invalide
        die();
    }
?>